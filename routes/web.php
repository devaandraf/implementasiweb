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

?>