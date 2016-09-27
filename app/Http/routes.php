<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/



Route::get('/create', 'Admin\ProductsController@create');

Route::get('/add-to-cart/{id}', [
	'uses'=>'Admin\ProductsController@AddtoCart',
	'as'=>'AddtoCart']);

Route::get('/cart/add-to-cart', [
	'uses'=>'Admin\ProductsController@getCart',
	'as'=>'getCart']);

Route::group(['middleware' => 'guest'], function () {
	
	Route::get('/', 'CommonController@index');
	Route::get('register', 'UsersController@register');
});



Route::group(['middleware' => 'auth'], function () {
	
	
});