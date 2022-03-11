<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
    return view('homepage');
});

Route::get('/homepage', function () {
    return view('homepage');
});

Route::get('/product', function () {
    return view('product');
});

Route::get('/order', function () {
    return view('order');
});

Route::get('/cart', function () {
    return view('cart');
});

Route::get('/aboutUs', function () {
    return view('aboutUs');
});

Route::get('/contactUs', function () {
    return view('contactUs');
});

Route::get('/checkout', function () {
    return view('checkout');
});

Route::get('/dashboard', function () {
    return view('admin/dashboard');
});

Route::get('/userProfile', function(){
    return view('userProfile');
});

Route::get('/editUserProfile', function(){
    return view('editUserProfile');
});


Route::get('/manageProducts', [App\Http\Controllers\ProductController::class, 'displayProducts'])->name('products');
Route::get('/addProductForm', [App\Http\Controllers\ProductController::class, 'displayaddProductForm'])->name('products');
Route::post('/addProduct', [App\Http\Controllers\ProductController::class, 'create'])->name('products');
Route::get('/deleteProduct/{id}', [App\Http\Controllers\ProductController::class, 'deleteProduct'])->name('products');
Route::get('/editProduct/{id}', [App\Http\Controllers\ProductController::class, 'editProduct'])->name('products');
Route::post('/updateProduct/{id}', [App\Http\Controllers\ProductController::class, 'update'])->name('products');
Route::get('/increaseQuantity/{id}', [App\Http\Controllers\ProductController::class, 'increaseQuantity'])->name('products');
Route::get('/decreaseQuantity/{id}', [App\Http\Controllers\ProductController::class, 'decreaseQuantity'])->name('products');
Route::get('/searchProducts/{search}', [App\Http\Controllers\ProductController::class, 'searchProducts'])->name('products');
Route::get('/searchProducts', [App\Http\Controllers\ProductController::class, 'displayProducts'])->name('products');


Route::get('/manageSuppliers', [App\Http\Controllers\SupplierController::class, 'displaySuppliers'])->name('suppliers');
Route::get('/addSupplierForm', [App\Http\Controllers\SupplierController::class, 'displayaddSupplierForm'])->name('suppliers');
Route::post('/addSupplier', [App\Http\Controllers\SupplierController::class, 'create'])->name('suppliers');
Route::get('/deleteSupplier/{id}', [App\Http\Controllers\SupplierController::class, 'deleteSupplier'])->name('suppliers');
Route::get('/editSupplier/{id}', [App\Http\Controllers\SupplierController::class, 'editSupplier'])->name('suppliers');
Route::post('/updateSupplier/{id}', [App\Http\Controllers\SupplierController::class, 'update'])->name('suppliers');
Route::get('/searchSuppliers/{search}', [App\Http\Controllers\SupplierController::class, 'searchSuppliers'])->name('suppliers');
Route::get('/searchSuppliers', [App\Http\Controllers\SupplierController::class, 'displaySuppliers'])->name('suppliers');


Route::get('/search/{search}', [App\Http\Controllers\ProductController::class, 'search'])->name('products');

Route::get('/test', [App\Http\Controllers\ProductController::class, 'test'])->name('products');




Route::get('cart/{Product_ID}', 'App\Http\Controllers\ProductController@addToCart');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('cart/delete/{Product_ID}', 'App\Http\Controllers\ProductController@removeCartProducts');
Route::get('cart/update/{Product_ID}', 'App\Http\Contorllers\ProductController@updateCartProducts');

Route::get('cart/increaseCartQuantity/{Product_ID}', 'App\Http\Controllers\ProductController@IncreaseCartProducts');
Route::get('cart/decreaseCartQuantity/{Product_ID}', 'App\Http\Controllers\ProductController@DecreaseCartProducts');
Route::get('checkout/proceedtocheckout','App\Http\Controllers\ProductController@proceedToCheckout');
Route::post('updateUser/{id}', 'App\Http\Controllers\UserController@updateUser');