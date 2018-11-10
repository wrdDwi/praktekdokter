<?php

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
 */
Route::post('login', 'UserController@login');
Route::post('register', 'UserController@register');

Route::group(['middleware' => 'auth:api'], function () {
    Route::post('details', 'UserController@details');
});

Route::get('obat', 'ObatController@index');
Route::get('obat/{id}', 'ObatController@show');
Route::post('obat/save', 'ObatController@insert');
Route::put('obat/{id}', 'ObatController@update');
Route::delete('obat/{id}', 'ObatController@delete');

Route::get('pasien', 'PasiensController@index');
Route::get('pasien/{id}', 'PasiensController@show');
Route::post('pasien/save', 'PasiensController@insert');
Route::put('pasien/{id}', 'PasiensController@update');
Route::delete('pasien/{id}', 'PasiensController@delete');

Route::get('satuan', 'SatuanController@index');
Route::get('satuan/{id}', 'SatuanController@edit');
Route::post('satuan/save', 'SatuanController@store');
Route::put('satuan/{id}', 'SatuanController@update');
Route::delete('satuan/{id}', 'SatuanController@destroy');

Route::get('jampraktek', 'JamPraktekController@index');
Route::get('jampraktek/{id}', 'JamPraktekController@edit');
Route::post('jampraktek/save', 'JamPraktekController@store');
Route::put('jampraktek/{id}', 'JamPraktekController@update');
Route::delete('jampraktek/{id}', 'JamPraktekController@destroy');

Route::get('jenisobat', 'JenisObatController@index');
Route::get('jenisobat/{id}', 'JenisObatController@edit');
Route::post('jenisobat/save', 'JenisObatController@store');
Route::put('jenisobat/{id}', 'JenisObatController@update');
Route::delete('jenisobat/{id}', 'JenisObatController@destroy');
