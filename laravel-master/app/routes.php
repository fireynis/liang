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
*/

//Route::get('/', function() {return View::make('hello');});
Route::get('/', 'PageController@showHome');
Route::get('/search', 'PageController@showSearch');
Route::get('/description', 'PageController@showDescription');
Route::get('/uses', 'PageController@showUses');
Route::get('/positionmapping', 'PageController@getPositionMapping');
Route::get('/test', function() {});

Route::post('/quicksearch', 'SearchController@quickSearch');
Route::post('/advancedsearch', 'SearchController@advancedSearch');
