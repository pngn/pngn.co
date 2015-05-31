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
Route::get('/', ['as' => 'home', 'uses' => 'LinksController@index']);
Route::get('shorten', ['as' => 'shorten', 'uses' => 'LinksController@store']);
Route::post('shorten', ['as' => 'shorten', 'uses' => 'LinksController@store']);

Route::get('/{hash}', ['as' => 'hash', 'uses' => 'LinksController@show']);

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
