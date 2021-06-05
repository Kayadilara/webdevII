<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\ContactController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::resource('news', NewsController::class);

Route::resource('products', ProductController::class);

Route::get('/products/image/{id}', [ProductController::class, 'getImage'])->name('products.getImage');

Route::post('/newsletter', [NewsletterController::class, 'store'])->name('newsletter');

Route::get('/about', function()
{
    return view('/about/about');
});

Route::get('/sponsors', function()
{
    return view('/about/sponsors');
});

Route::get('/contact', function()
{
    return view('/about/contact');
});

Route::post('/contact', [ContactController::class, 'mail'])->name('contact.form');

Route::get('/privacy', function()
{
    return view('/about/privacy');
});

Route::post('/products/cart', [ProductController::class, 'addToCart'])->name('products.cart');

Route::get('/products/cart/clear', [ProductController::class, 'clearCart'])->name('products.cart.clear');

Route::get('/products/cart/remove/{id}', [ProductController::class, 'removeFromCart'])->name('products.cart.remove');

Route::get('/products/order/{order}', [ProductController::class, 'getOrder'])->name('products.order');

Route::post('/products/order', [ProductController::class, 'order'])->name('products.order.create');

Route::post('/webhooks/mollie', [ProductController::class, 'webhook'])->name('webhooks.mollie');

Route::post('/products/checkout', [ProductController::class, 'checkout'])->name('products.checkout');

Route::get('/products/orderoverview/{id}', [ProductController::class, 'orderOverview'])->name('products.orderoverview');

Route::get('/products/category/{id}', [ProductController::class, 'filterCategory'])->name('products.category');

require __DIR__.'/auth.php';
