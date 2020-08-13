<?php

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

Route::get('/', function () {
    return view('master');
});

Route::get('/location','LocationController@index');
Route::get('/location/create', 'LocationController@create');
Route::post('/location', 'LocationController@store');
Route::get('/location/{location_id}/edit', 'LocationController@edit');
Route::put('/location/{location_id}', 'LocationController@update');
Route::delete('/location/{location_id}', 'LocationController@destroy');

Route::get('/employe','EmployeController@index');
Route::get('/employe/create', 'EmployeController@create');
Route::post('/employe', 'EmployeController@store');
Route::get('/employe/{employe_id}/edit', 'EmployeController@edit');
Route::put('/employe/{employe_id}', 'EmployeController@update');
Route::delete('/employe/{employe_id}', 'EmployeController@destroy');
Route::get('/employe/search', 'EmployeController@search');
