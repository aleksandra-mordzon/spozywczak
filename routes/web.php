<?php

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





Route::get('/products/{list}', 'ProductsController@list')->where(['list' => 'new|sale|groceries|hygiene_products']);
Route::get('/products/search', 'ProductsController@search');

Route::get('/', 'ProductsController@index');
Route::get('/show/{slug}', 'ProductsController@show');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
