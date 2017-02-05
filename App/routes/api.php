<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:api');

Route::group( ['prefix' => 'v1', 'middleware' => 'verify' ], function() {
	Route::post( 'wishlist', 'WishListController@create' );
	Route::get( 'wishlist/{id}', 'WishListController@detail');
	Route::get( 'wishlist', 'WishListController@view');
	// Route::get( 'setup', 'UserController@create' );
	Route::post( 'wishlist/{id}/product/{product_id}', 'WishListController@addItem' );
	Route::post( 'wishlist/{id}/variant/{variant_id}', 'WishListController@addItemVariant' );
});