<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

//User sign up
Route::group(['prefix' => '/user', 'namespace' => 'Auth'], function(){
	Route::get('all', 'UserController@index')->name('api.index');
	Route::post('signup', 'UserController@signup')->name('api.signup');
});



//User Find All | Logout
Route::group(['middleware' => ['auth:api'], 'prefix' => '/user', 'namespace' => 'Auth'], function(){
	Route::get('logout', 'UserController@logout')->name('api.logout');
});

