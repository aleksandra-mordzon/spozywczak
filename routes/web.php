<?php
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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




Route::get('/products/{list}/{category?}', 'ProductsController@list')->where(['list' => 'new|sale|groceries|search']);


Route::get('/', 'ProductsController@index');
Route::get('/show/{slug}', 'ProductsController@show')->name('show');
Route::post('/', 'WriteOpinionController@store')->name('writeopinion');

Auth::routes(['verify' => true]);

Route::get('/email/verify', function () {
    return view('auth.verify');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();

    return redirect('/home');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();

    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');



Route::get('/home', 'HomeController@index')->name('home');
Route::post('/home', 'HomeController@editData')->name('editData');

Route::get('/cart','CartController@index')->name('cart');
Route::get('/cart/{rowId}/{qty}','CartController@add');

Route::get('/cart/info', 'InfoAndShipmentController@index')->name('info');
Route::post('/cart/info', 'InfoAndShipmentController@store')->name('storeinfo');

Route::get('/cart/summary', 'CartController@submit')->name('summary');
Route::get('/cart/success', 'CartController@paysuccess')->name('paysuccess');
Route::post('/cart', 'CartController@store')->name('store');
Route::delete('/cart/{product}', 'CartController@destroy')->name('destroy');

Route::get('/empty', function(){
    Cart::destroy();
});



