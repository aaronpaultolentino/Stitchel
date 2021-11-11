<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can integrate API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// API Integrations Add/List/Delete
Route::group(['middleware' => [], 'prefix' => '/user', 'namespace' => 'AppIntegration'], function(){

	Route::get('type/mobileAppGmail', 'MobileIntegrationController@getMobileGmailCode')->name('api.getCode'); // http://localhost/api/v1/user/type/mobileAppGmail
	Route::get('/list', 'MobileIntegrationController@show')->name('api.show');
	Route::get('/delete/{id}', 'MobileIntegrationController@revokeToken')->name('api.revokeToken');

});

