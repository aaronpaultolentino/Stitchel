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

//API Integrations Gmail
Route::group(['middleware' => ['auth:api'], 'prefix' => '/integrations', 'namespace' => 'AppIntegration'], function(){

	Route::get('code/gmail', 'MobileGmailIntegrationController@getMobileGetUrl')->name('api.getUrl');
	Route::get('gmail/all', 'MobileGmailIntegrationController@show')->name('api.show');
	Route::delete('/delete/{id}', 'MobileGmailIntegrationController@revokeToken')->name('api.revokeToken');	
});

//API Integrations Jira
Route::group(['middleware' => ['auth:api'], 'prefix' => '/integrations', 'namespace' => 'AppIntegration'], function(){

	Route::get('code/jira', 'MobileJiraIntegrationController@getMobileGetUrl')->name('api.getUrl');
	Route::get('jira/all', 'MobileJiraIntegrationController@show')->name('api.show');
	Route::delete('/delete/{id}', 'MobileJiraIntegrationController@revokeToken')->name('api.revokeToken');
});


//API Integrations Slack
Route::group(['middleware' => ['auth:api'], 'prefix' => '/integrations', 'namespace' => 'AppIntegration'], function(){

	Route::get('code/slack', 'MobileSlackIntegrationController@getMobileGetUrl')->name('api.getUrl');
	Route::get('slack/all', 'MobileSlackIntegrationController@show')->name('api.show');
	Route::delete('/delete/{id}', 'MobileSlackIntegrationController@revokeToken')->name('api.revokeToken');
});

//Redirect URL
Route::group(['middleware' => ['web'],'prefix' => '/integrations', 'namespace' => 'AppIntegration'], function(){
	Route::get('type/mobileAppGmail', 'MobileGmailIntegrationController@getMobileGmailCode')->name('api.getCode'); // http://localhost/api/v1/user/type/mobileAppGmail
	Route::get('type/mobileAppJira', 'MobileJiraIntegrationController@getMobileJiraCode')->name('api.getCode'); // http://localhost/api/v1/user/type/mobileAppJira
	Route::get('type/mobileAppSlack', 'MobileSlackIntegrationController@getMobileSlackCode')->name('api.getCode'); // http://localhost/api/v1/user/type/mobileAppSlack
});
	
