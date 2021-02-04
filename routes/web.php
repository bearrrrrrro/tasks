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
    return view('welcome');
});

Route::get('/tasks', 'TasksController@get');

Route::post('/tasks/submit', 'TasksController@create');
Route::get('/tasks/delete/{id}', 'TasksController@delete');
Route::get('/tasks/check/{id}', 'TasksController@check');
Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();