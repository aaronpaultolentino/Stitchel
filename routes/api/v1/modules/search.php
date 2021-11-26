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
//webSearch
Route::group(['middleware' => ['web'], 'prefix' => 'search', 'namespace' => 'Search'], function(){
	Route::get('{query?}', 'SearchController@search')->name('api.searchById');
});

//mobileSearch
Route::group(['middleware' => ['auth:api'], 'prefix' => 'mobilesearch', 'namespace' => 'Search'], function(){
	Route::get('{query?}', 'SearchController@mobileSearch')->name('api.searchById');
});
