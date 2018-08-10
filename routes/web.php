<?php

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

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('main');

Route::get('/news', function () {
    return view('site.news');
})->name('news');

Route::get('/cart', 'CartController@index')->name('cart');

Route::get('deleteFromCart/{rowId}', 'CartController@delete')->name('deleteFromCart');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('products', 'ProductController');

Route::get('/catalog', 'CatalogController@showProductsCatalog')->name('catalog');

Route::post('/addCart', 'CartController@add');

Route::get('/orders', 'OrderController@index')->name('orders');

Route::post('/sort', 'CatalogController@sort');

Route::post('acceptOrder', 'OrderController@storeOrder');

Route::get('confirmOrder/{id}', 'OrderController@confirmOrder')->name('confirmOrder');

Route::post('sort_by_category', 'ProductController@sort');

Route::get('/{name}', 'CatalogController@show')->name('showCategory');