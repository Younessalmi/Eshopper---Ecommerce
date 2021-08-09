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

Route::get('/', "App\Http\Controllers\ProduitController@index");
Route::get('/single-product/{id}', "App\Http\Controllers\ProduitController@show");




Route::get('/carti', "App\Http\Controllers\CartController@index");
Route::get('/remove/{id}', "App\Http\Controllers\CartController@destroy");
Route::get('/cart/{id}', "App\Http\Controllers\CartController@AddToCart");
Route::get('/add/{id}', "App\Http\Controllers\CartController@AddToCart");
Route::post('/update', "App\Http\Controllers\CartController@update");
Route::get('/category/{id}', "App\Http\Controllers\CategoryController@index");


Route::get('/cart', function () { return view('cart'); });
Route::get('/checkout', function () { return view('checkout'); });
Route::get('/product-details', function () { return view('product-details'); });
Route::group(['prefix' => 'admin'], function () { Voyager::routes(); });
