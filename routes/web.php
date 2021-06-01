<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\NewsletterController;


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

Route::get('/privacy', function()
{
    return view('/about/privacy');
});

Route::post('/products/cart', [ProductController::class, 'addToCart'])->name('products.cart');

Route::post('/products/order', [ProductController::class, 'order'])->name('products.order');

Route::post('/products/order/{order}', [ProductController::class, 'getOrder'])->name('products.order.create');

Route::post('/webhooks/mollie', [ProductController::class, 'webhook'])->name('webhook.mollie');

require __DIR__.'/auth.php';
