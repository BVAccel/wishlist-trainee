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

Route::get('/', function () {
    return view('welcome');
});
Auth::routes();
Route::get('/home', 'HomeController@index');

Route::group( ['prefix' => 'api'], function() {
	Route::group( ['prefix' => 'v1', 'middleware' => 'verify' ], function() {
		Route::get( 'setup', 'UserController@create' );
		Route::post( 'wishlist', 'WishListController@create' );
		Route::get( 'wishlist', 'WishListController@view');
		Route::post( 'wishlist/{id}/product/{product_id}', 'WishListController@addItem' );
		Route::post( 'wishlist/{id}/variant/{variant_id}', 'WishListController@addItemVariant' );
	});
});