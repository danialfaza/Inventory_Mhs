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


Route::get('/login','AuthController@login')->name('login');
Route::post('/postLogin','AuthController@postLogin');
Route::get('/logout','AuthController@logout');

Route::group(['middleware' => ['auth','roleCheck:admin']], function()
{
	Route::get('/fakultas','FakultasController@index');
	Route::get('/fakultas/tambahFakultas', 'FakultasController@tambahFakultas');
	Route::post('/fakultas/createFakultas', 'FakultasController@createFakultas');
	Route::get('/fakultas/{id}/edit', 'FakultasController@editFakultas');
	Route::post('/fakultas/{id}/update', 'FakultasController@updateFakultas');
	Route::get('/fakultas/{id}/delete', 'FakultasController@deleteFakultas');
	

	Route::get('/jurusan','JurusanController@index');
	Route::get('/jurusan/search', 'JurusanController@search');
	Route::get('/jurusan/tambahJurusan', 'JurusanController@tambahJurusan');
	Route::post('/jurusan/createJurusan', 'JurusanController@createJurusan');
	Route::get('/jurusan/{id}/edit', 'JurusanController@editJurusan');
	Route::post('/jurusan/{id}/update', 'JurusanController@updateJurusan');
	Route::get('/jurusan/{id}/delete', 'JurusanController@deleteJurusan');

	Route::get('/ruangan','RuanganController@index');
	Route::get('/ruangan/tambahRuangan', 'RuanganController@tambahRuangan');
	Route::post('/ruangan/createRuangan', 'RuanganController@createRuangan');
	Route::get('/ruangan/{id}/edit', 'RuanganController@editRuangan');
	Route::post('/ruangan/{id}/update', 'RuanganController@updateRuangan');
	Route::get('/ruangan/{id}/delete', 'RuanganController@deleteRuangan');
});

Route::group(['middleware' => ['auth','roleCheck:admin,staff']], function()
{
	Route::get('/dashboard','HalamanController@index');
	Route::get('/barang','BarangController@index');
	Route::get('/barang/tambahBarang', 'BarangController@tambahBarang');
	Route::post('/barang/createBarang', 'BarangController@createBarang');
	Route::get('/barang/{id}/edit', 'BarangController@editBarang');
	Route::post('/barang/{id}/update', 'BarangController@updateBarang');
	Route::get('/barang/{id}/delete', 'BarangController@deleteBarang');
	Route::get('/barang/export_excel','BarangController@export_excel');
});

?>