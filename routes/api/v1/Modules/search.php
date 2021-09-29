<?php

use Illuminate\Support\Facades\Route;
use\App\Http\Controller\SearchController;

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

Route::group(['middleware' => [], 'prefix' => 'search', 'namespace' => 'Search'], function(){

	Route::get('', 'SearchController@search')->name('api.search');
	Route::get('{id}', 'SearchController@searchById')->name('api.searchById');
});
