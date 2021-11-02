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

Route::group(['prefix' => 'integrations'], function(){
	Route::get('', 'IntegrationsController@index')
			->name('integrations')
			->middleware('auth');

	Route::get('type/gmail', 'IntegrationsController@getGmailCode')->name('gmail.getCode');
	Route::get('type/jira', 'IntegrationsController@getJiraCode')->name('jira.getCode');
	Route::get('type/slack', 'IntegrationsController@getSlackCode')->name('slack.getCode');
	Route::post('gmail/{id}', 'IntegrationsController@revokeToken')->name('gmail.revokeToken');
	Route::post('jira/{id}', 'IntegrationsController@revokeToken')->name('jira.revokeToken');
	Route::post('slack/{id}', 'IntegrationsController@slackRevokeToken')->name('slack.slackRevokeToken');
});
