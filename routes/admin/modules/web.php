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
Route::get('login', 'LoginController@index')->name('login');
Route::get('registration', 'RegistrationController@index')->name('register-user');
Route::get('signout', 'LoginController@signout')->name('signout');

Route::group(['prefix' => 'dashboard'], function(){
	Route::get('', 'AdminDashboardController@index')->name('home');
	});