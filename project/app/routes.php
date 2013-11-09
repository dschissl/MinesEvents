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


Route::get('/', 'HomeController@showHome');

Route::get('newevent', 'EventController@showNewEvent');

Route::get('events/{id}', 'EventController@showDetail');
