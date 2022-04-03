<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Str;
use App\Http\Controllers\ForgotPasswordController;
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

Route::get('/home', function () {
    return view('homepage');
});

Route::get('/homepage', function () {
    return view('homepage');
});

Route::get('/product', function () {
    return view('product');
});

Route::get('/plants', function () {
    return view('productPlants');
});

Route::get('/pots', function () {
    return view('productPots');
});

Route::get('/soils', function () {
    return view('productSoils');
});

Route::get('/order', function () {
    return view('order');
});

Route::get('/cart', function () {
    return view('cart');
});
Route::get('/item', function () {
    return view('item');
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

Route::get('/newFormPassword', function(){
    return view('newFormPassword');
});

Route::get('/editUserProfile', function(){
    return view('editUserProfile');
});

Route::get('/editPassword', function(){
    return view('editPassword');
});

Route::get('/manageAdmin', function(){
    return view('manageAdmin');
});

// Route::get('/reset-password/{token}', function ($token) {
//     return view('forgotPasswordForm', ['token' => $token]);
// })->middleware('guest')->name('password.reset');

Route::get('/forgotPasswordLink/{token}', [App\Http\Controllers\ResetPasswordController::class, 'showResetForm'])->name('forgotPasswordLink');

Route::get('/adminProfile', function(){
    return view('adminProfile');
});


Route::get('/forgotPasswordLink', function () {
    return view('forgotPasswordLink');
})->middleware('guest')->name('password.request');

///Reset password link
Route::post('/forgot-password', function (Request $request) {
    $request->validate(['email' => 'required|email']);
 
    $status = Password::sendResetLink($request->only('email'));
 
    return $status === Password::RESET_LINK_SENT
    ? back()->with(['status' => __($status)])
    : back()->withErrors(['email' => __($status)]);
})->middleware('guest')->name('password.email');

///Reset Password form update
Route::post('/reset-password', function (Request $request) {
    $request->validate(['token' => 'required','email' => 'required|email','password' => 'required|min:8|confirmed',]);
 
    $status = Password::reset(
        $request->only('email', 'password', 'password_confirmation', 'token'),
        function ($user, $password) {
        $user->forceFill(['password' => Hash::make($password)])->setRememberToken(Str::random(60));
 
        $user->save();
 
        event(new PasswordReset($user));
        }
    );
 
    return $status===Password::PASSWORD_RESET
    ? redirect()->route('homepage')->with('status', __($status))
    : back()->withErrors(['email' => [__($status)]]);
})->middleware('guest')->name('password.update');
///------------------------------------------------------------------------

Route::get('/manageProducts', [App\Http\Controllers\ProductController::class, 'displayProducts'])->name('products');
Route::get('/addProductForm', [App\Http\Controllers\ProductController::class, 'displayaddProductForm'])->name('products');
Route::post('/addProduct', [App\Http\Controllers\ProductController::class, 'create'])->name('products');
Route::get('/deleteProduct/{id}', [App\Http\Controllers\ProductController::class, 'deleteProduct'])->name('products');
Route::get('/editProduct/{id}', [App\Http\Controllers\ProductController::class, 'editProduct'])->name('products');
Route::post('/updateProduct/{id}', [App\Http\Controllers\ProductController::class, 'update'])->name('products');
Route::post('/updateStatus/{id}', [App\Http\Controllers\OrderController::class, 'updateS'])->name('orders');
Route::get('/increaseQuantity/{id}', [App\Http\Controllers\ProductController::class, 'increaseQuantity'])->name('products');
Route::get('/decreaseQuantity/{id}', [App\Http\Controllers\ProductController::class, 'decreaseQuantity'])->name('products');
Route::get('/changeQuantity/{id}/{quantity}', [App\Http\Controllers\ProductController::class, 'changeQuantity'])->name('products');
Route::get('/searchProducts/{search}', [App\Http\Controllers\ProductController::class, 'searchProducts'])->name('products');
Route::get('/searchProducts', [App\Http\Controllers\ProductController::class, 'displayProducts'])->name('products');

Route::get('/manageOrders', [App\Http\Controllers\OrderController::class, 'displayadminManageOrders'])->name('orders');
Route::get('/acceptOrder/{id}/{dateS}/{dateE}/{time}', [App\Http\Controllers\OrderController::class, 'acceptOrder'])->name('orders');
Route::get('/denyOrder/{id}/{reason}', [App\Http\Controllers\OrderController::class, 'denyOrder'])->name('orders');
Route::get('/completeOrder/{id}', [App\Http\Controllers\OrderController::class, 'completeOrder'])->name('orders');
Route::get('/changeQuantityAdmin/{id}/{quantity}', [App\Http\Controllers\OrderController::class, 'changeQuantityAdmin'])->name('orders');

Route::get('/manageSuppliers', [App\Http\Controllers\SupplierController::class, 'displaySuppliers'])->name('suppliers');
Route::get('/addSupplierForm', [App\Http\Controllers\SupplierController::class, 'displayaddSupplierForm'])->name('suppliers');
Route::post('/addSupplier', [App\Http\Controllers\SupplierController::class, 'create'])->name('suppliers');
Route::get('/deleteSupplier/{id}', [App\Http\Controllers\SupplierController::class, 'deleteSupplier'])->name('suppliers');
Route::get('/editSupplier/{id}', [App\Http\Controllers\SupplierController::class, 'editSupplier'])->name('suppliers');
Route::post('/updateSupplier/{id}', [App\Http\Controllers\SupplierController::class, 'update'])->name('suppliers');
Route::get('/searchSuppliers/{search}', [App\Http\Controllers\SupplierController::class, 'searchSuppliers'])->name('suppliers');
Route::get('/searchSuppliers', [App\Http\Controllers\SupplierController::class, 'displaySuppliers'])->name('suppliers');


Route::get('search/{search}', [App\Http\Controllers\ProductController::class, 'search'])->name('products');

Route::get('/test', [App\Http\Controllers\ProductController::class, 'test'])->name('products');


Route::get('/acceptOrderNotification/{id}/{dateS}/{dateE}/{time}', [App\Http\Controllers\NotificationController::class, 'acceptOrderNotification'])->name('notification');
Route::get('/denyOrderNotification/{id}/{reason}', [App\Http\Controllers\NotificationController::class, 'denyOrderNotification'])->name('notification');
Route::get('/completeOrderNotification/{id}', [App\Http\Controllers\NotificationController::class, 'completeOrderNotification'])->name('notification');
Route::get('/deleteNotification/{id}', [App\Http\Controllers\NotificationController::class, 'deleteNotification'])->name('notification');


Route::get('cart/{Product_ID}', 'App\Http\Controllers\ProductController@addToCart');
Route::get('/item/{Product_ID}', 'App\Http\Controllers\ProductController@exploreProduct');


Auth::routes();

Route::get('/homepage', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/forgotPasswordForm',[App\Http\Controllers\HomeController::class, 'forgotPasswordForm'])->name('forgotPasswordForm');

Route::middleware(['auth', 'isAdmin'])->group(function () {
    Route::get('/admin', function () {
      return view('admin.dashboard');
    })->name('dashboard');
  });

// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('cart/delete/{Product_ID}', 'App\Http\Controllers\ProductController@removeCartProducts');
Route::get('cart/update/{Product_ID}', 'App\Http\Contorllers\ProductController@updateCartProducts');

Route::get('cart/increaseCartQuantity/{Product_ID}', 'App\Http\Controllers\ProductController@IncreaseCartProducts');
Route::get('cart/decreaseCartQuantity/{Product_ID}', 'App\Http\Controllers\ProductController@DecreaseCartProducts');
Route::get('checkout/proceedtocheckout','App\Http\Controllers\ProductController@proceedToCheckout');
Route::post('updateUser/{id}', 'App\Http\Controllers\UserController@updateUser');
Route::post('updateUserProfile/{id}','App\Http\Controllers\UserController@updateUserProfile');

Route::post('/checkout', [OrderController::class, 'store']);

Route::post('/changePassword',[App\Http\Controllers\UserController::class,'changePassword'])->name('changePassword');

Route::get('/editSupplier/{id}', [App\Http\Controllers\SupplierController::class,'editSupplier'])->name('editSupplier');



Route::post('updateUserProfile/{id}','App\Http\Controllers\UserController@update');


Route::post('/changePassword',[App\Http\Controllers\UserController::class,'changePassword'])->name('changePassword');
Route::post('/resetPassword', [App\Http\Controllers\Auth\ForgotPasswordController::class, 'resetPassword'])->name('resetPassword');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('/checkout', [OrderController::class, 'store']);


Route::post('/messages', function(Request $request) {
    // TODO: validate incoming params first!

    $url = "https://messages-sandbox.nexmo.com/v0.1/messages";
    $params = ["to" => ["type" => "whatsapp", "number" => $request->input('number')],
        "from" => ["type" => "whatsapp", "number" => "601160651997"],
        "message" => [
            "content" => [
                "type" => "text",
                "text" => "Hello from Vonage and Laravel :) Please reply to this message with a number between 1 and 100"
            ]
        ]
    ];
    $headers = ["Authorization" => "Basic " . base64_encode(env('NEXMO_API_KEY') . ":" . env('NEXMO_API_SECRET'))];

    $client = new \GuzzleHttp\Client();
    $response = $client->request('POST', $url, ["headers" => $headers, "json" => $params]);
    $data = $response->getBody();
    Log::Info($data);

    return view('thanks');
});

// admin routes

Route::get('/manageAdmin', [AdminController::class, 'getAllAdmins']);

Route::get('/addNewAdmin', [AdminController::class, 'create']);


