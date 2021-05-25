<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Product;
use finfo;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index','show']);
    }

    function index()
    {
        return view('products.index', ['products' => Product::orderBy('updated_at','desc')
                                                            ->take(20)
                                                            ->get()]);

    }

    function show($id)
    {
        return view('products.detail', ['productDetail' => Product::find($id)]);
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
}
