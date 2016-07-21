<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/import', 'ImportController@import');
Route::get('/tracks', 'TrackController@index');
Route::get('/manufacturers', 'ManufacturerController@index');
Route::get('/labels', 'LabelController@index');
Route::get('/home', 'HomeController@index');

