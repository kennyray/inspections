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

Route::get('/', 'HomeController@index');

Route::get('/businesses', 'BusinessesController@index');

Route::get('/businesses/region/{region}', 'BusinessesController@region');

Route::get('/business/{business}', 'BusinessesController@detail');

Route::get('/inspection/{inspection}', 'InspectionsController@index');
