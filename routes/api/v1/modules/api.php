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

//User
Route::group(['middleware' => ['auth:api'], 'prefix' => '/user', 'namespace' => 'Auth'], function(){
	Route::get('/login', 'LoginController@login')
		->name('api.login');
	Route::get('/all', 'UserController@index')
		->name('api.index');

});

