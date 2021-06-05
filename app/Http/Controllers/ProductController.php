<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Facades\Auth;
use Mollie\Laravel\Facades\Mollie;
use App\Services\Cart;
use finfo;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index','show']);
    }

    function index()
    {

        return view('products.index', ['products' => Product::paginate(2)]);
    }

    public function addToCart(Request $request, Cart $cart)
    {
        $product = Product::findorfail($request->product_id);

        $cart->add(Auth::id(), [
            'id' => $product->id,
            'name' => $product->name,
            'type' => $product->type,
            'price' => $product->price,
            'quantity' => 1,
        ]);

        return redirect()->back()->withInput();
    }

    public function getOrder(Order $order){
        return view('products.order', [
            'order' => $order,
        ]);
    }

    public function order(Request $request, Cart $cart)
    {
        $shoppingCart = $cart->get(Auth::id());

        if (!$shoppingCart->hasItems()){
            return redirect()->route('products.index');
        }

        $orderData = $request->validate([
            'fname' => 'required',
            'lname' => 'required',
            'street' => 'required',
            'housenumber' => 'required',
            'city' => 'required'
        ]);

        $order = Order::create($orderData);

        foreach($shoppingCart->items as $item){

            $product = Product::find($item->id);
            $quantity = $product->quantity;

            if($quantity < $item->quantity)
            {
               $item->quantity = $quantity;
               return redirect()->back()->withInput();
            }

            $product->quantity = $quantity - $item->quantity;

            $product->save();

            $order->orderItems()->create(
            [
                'product_id' => $item->id,
                'quantity' => $item->quantity
            ]);
        }

        $payment = Mollie::api()->payments->create([
            "amount" => [
                "currency" => "EUR",
                "value" => number_format((float)$shoppingCart->getTotal() / 100, 2, '.', ''),
            ],
            "description" => "Order #" . $order->id,
            "redirectUrl" => route('products.order', $order->id),
            "webhookUrl" => route('webhooks.mollie'),
            "metadata" => [
                "order_id" => $order->id,
            ],
        ]);

        $cart->clear(Auth::id());

        return redirect($payment->getCheckoutUrl(), 303);
    }

    public function webhook(Request $request) {
        $paymentId = $request->input('id');
        $payment = Mollie::api()->payments->get($paymentId);

        $order = Order::findorfail($payment->metadata->order_id);

        $order->status = $payment->status;
        $order->save();
    }


    public function orderOverview($id)
    {
        $overview = OrderItem::where('product_id', $id)->get();

        return view('products.orderoverview', ['overviewData' => $overview]);
    }

    function show($id, Cart $cart)
    {
        $user_cart = null;

        if(Auth::check()) 
        {
            $user_cart = $cart->get(Auth::id());
        }

        return view('products.detail', ['productDetail' => Product::find($id), 'cart' => $user_cart]);
    }

    function create()
    {
        return view('products.create');
    }

    function store(Request $request)
    {
        $storeProduct = $request->validate([
            'name' => 'required',
            'type' => 'required',
            'price' => 'required',
            'quantity' => 'required'
        ]);

        $product = new Product;

        $product->name = $request->name;
        $product->type = $request->type;
        $product->quantity = $request->quantity;
        $product->price = $request->price;

        $image_file = $request->file('image');

        if(isset($image_file))
        {
            $contents = $image_file->openFile()->fread($image_file->getSize());
            $product->image = $contents;
        }

        $product->save();

        return redirect('/products');
    }

    function getImage($id)
    {
        $product = Product::findOrFail($id);
        if(isset($product->image))
        {
            return response()->make($product->image, 200, array(
                'Content-Type' => (new finfo(FILEINFO_MIME))->buffer($product->image)
            ));
        }
        else
        {
            return response()->noContent();
        }
    }

    function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('products.edit', ['productDetail' => $product]);
    }

    function update(Request $request, $id)
    {
        $updateProduct = $request->validate([
            'Name' => 'required',
            'Type' => 'required',
            'Price' => 'required',
            'Quantity' => 'required'
        ]);

        Product::whereId($id)->update($updateProduct);
        return redirect()->route('products.show', $id);
    }

    function destroy($id)
    {
        Product::whereId($id)->delete();
        return redirect()->route('products.index');
    }
} ?>
