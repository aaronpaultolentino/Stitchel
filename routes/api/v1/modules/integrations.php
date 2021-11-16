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

// API Integrations Gmail
Route::group(['middleware' => [], 'prefix' => '/integrations', 'namespace' => 'AppIntegration'], function(){

	Route::get('code/gmail', 'MobileGmailIntegrationController@getMobileGetUrl')->name('api.getUrl');
	Route::get('type/mobileAppGmail', 'MobileGmailIntegrationController@getMobileGmailCode')->name('api.getCode'); // http://localhost/api/v1/user/type/mobileAppGmail
	Route::get('gmail/all', 'MobileGmailIntegrationController@show')->name('api.show');
	Route::delete('/delete/{id}', 'MobileGmailIntegrationController@revokeToken')->name('api.revokeToken');
});

//API Integrations Jira
Route::group(['middleware' => [], 'prefix' => '/integrations', 'namespace' => 'AppIntegration'], function(){

	Route::get('code/jira', 'MobileJiraIntegrationController@getMobileGetUrl')->name('api.getUrl');
	Route::get('type/mobileAppJira', 'MobileJiraIntegrationController@getMobileJiraCode')->name('api.getCode'); // http://localhost/api/v1/user/type/mobileAppJira
	Route::get('jira/all', 'MobileJiraIntegrationController@show')->name('api.show');
	Route::delete('/delete/{id}', 'MobileJiraIntegrationController@revokeToken')->name('api.revokeToken');
});
	
