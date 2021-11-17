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

Route::get('/register', 'AuthController@register')->name('register');
Route::post('/register', 'AuthController@storeUser');
Route::get('/login', 'AuthController@login')->name('login');
Route::post('/login', 'AuthController@authenticate');

Route::get('logout', 'AuthController@logout')->name('logout');



Route::group(['prefix' => 'dashboard'], function(){
	Route::get('', 'DashboardController@index')
			->name('Dashboard')
			->middleware('auth');
	});
