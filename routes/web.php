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
    return view('home');
});

Auth::routes();

Route::get('/dashboard', 'DashboardController@index')->name('dashboard');


Route::get('/projects/{project}', 'ProjectsController@show');
Route::get('/files/{file}', 'FilesController@show');
Route::patch('/files/settings/{file}', 'FileSettingsController@update');
Route::post('/files/new', 'FilesController@store');
Route::post('/file-version/new', 'FileVersionsController@store');
Route::get('/team', 'TeamsController@create');
Route::post('/team', 'TeamsController@store');
Route::post('/clients', 'ClientsController@store');
