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

Route::get('/', 'PagesController@getIndex')->name('home');

Route::get('/shop', 'ProductsController@getIndex')->name('shop.index');

Route::get('/add-music-to-cart/{id}', [
    'uses' => 'ProductsController@getAddToCart',
    'as' => 'product.addToCart'
]);

Route::get('/shopping-cart/', [
    'uses' => 'ProductsController@getCart',
    'as' => 'product.shoppingCart'
]);

Route::get('/contact', 'PagesController@getContact');
Route::get('/about', 'PagesController@getAbout');
Route::get('/profile, UserController@getProfile');

Auth::routes();
Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');

Route::group(['middleware' => ['App\Http\Middleware\AdminMiddleware']], function () {
    Route::get('/admin', 'Admin\AdminController@index');
    Route::resource('users', 'UserController');
    Route::resource('products', 'ProductsController');
});