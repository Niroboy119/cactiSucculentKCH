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

Route::get('/homepage', function () {
    return view('homepage');
});

Route::get('/product', function () {
    return view('product');
});

Route::get('/cart', function () {
    return view('cart');
});

Route::get('/aboutUs', function () {
    return view('aboutUs');
});
Route::get('/manageProducts', [App\Http\Controllers\ProductController::class, 'displayProducts'])->name('products');
Route::get('/addProductForm', [App\Http\Controllers\ProductController::class, 'displayaddProductForm'])->name('products');
Route::post('/addProduct', [App\Http\Controllers\ProductController::class, 'create'])->name('products');

Route::get('/manageSuppliers', [App\Http\Controllers\SupplierController::class, 'display'])->name('suppliers');
Route::post('/addSupplier', [App\Http\Controllers\SupplierController::class, 'create'])->name('suppliers');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
