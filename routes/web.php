<?php
use Gloudemans\Shoppingcart\Facades\Cart;

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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::post('/home', 'HomeController@editData')->name('editData');

Route::get('/cart','CartController@index')->name('cart')->middleware('auth');;
Route::get('/cart/{rowId}/{qty}','CartController@add')->middleware('auth');;

Route::get('/cart/info', 'InfoAndShipmentController@index')->name('info')->middleware('auth');;
Route::post('/cart/info', 'InfoAndShipmentController@store')->name('storeinfo')->middleware('auth');;

Route::get('/cart/summary', 'CartController@submit')->name('summary')->middleware('auth');;
Route::get('/cart/success', 'CartController@paysuccess')->name('paysuccess')->middleware('auth');;
Route::get('/cart/error', 'CartController@payerror')->name('payerror')->middleware('auth');;
Route::post('/cart', 'CartController@store')->name('store')->middleware('auth');;
Route::delete('/cart/{product}', 'CartController@destroy')->name('destroy')->middleware('auth');;

Route::get('/empty', function(){
    Cart::destroy();
});



