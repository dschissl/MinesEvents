<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
  Redirect::to/('/');
*/

Route::pattern('id', '[0-9]+');


//HOME CONTROLLER
Route::get('/', 'HomeController@showHome');

Route::post('filter','HomeController@filterHome');

Route::get('about', 'HomeController@showAbout');

//EVENT CONTROLLER
Route::get('newevent', 'EventController@showNewEvent');

Route::get('eventcreated', 'EventController@action_createevent');

Route::get('events/{id}', 'EventController@showDetail');

Route::get('deleteevent/{id}', 'EventController@action_deleteevent');

//ACCOUNT CONTROLLER
Route::get('newaccount', 'AccountController@showNewAccount');

Route::get('account', 'AccountController@showAccount');

Route::post('accountcreated', 'AccountController@action_createaccount');

Route::post('authenticate', 'AccountController@action_authenticate');

Route::post('logout', 'AccountController@action_logout');

Route::get('changepassword','AccountController@changePassword');
