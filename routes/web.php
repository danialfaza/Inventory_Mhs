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

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/fakultas', 'FakultasController@index');
	Route::post('/fakultas/add', 'FakultasController@add');
	Route::get('/fakultas/{id}/delete','FakultasController@delete');
	Route::get('/fakultas/{id}/edit', 'FakultasController@edit');
	Route::post('/fakultas/{id}/update', 'FakultasController@update');

	Route::get('/jurusan', 'JurusanController@index');
	Route::post('/jurusan/add', 'JurusanController@add');
	Route::get('/jurusan/{id}/delete','JurusanController@delete');
	Route::get('/jurusan/{id}/edit', 'JurusanController@edit');
	Route::post('/jurusan/{id}/update', 'JurusanController@update');
	Route::get('/jurusan/search', 'JurusanController@search');
