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

Route::get('/barang/list', 'BarangController@index');
Route::get('/barang/add', 'BarangController@input');
Route::post('/barang/add', 'BarangController@prosesInput');
Route::get('/satuan/list', 'SatuanController@index');
Route::get('/satuan/add', 'SatuanController@input');
Route::post('/satuan/add', 'SatuanController@prosesInput');
Route::get('/satuan/{id}', 'SatuanController@dataById');
Route::patch('/satuan/update/{id}', 'SatuanController@prosesUpdate');
Route::delete('/satuan/delete/{id}', 'SatuanController@prosesDelete');
Route::get('/satuan/search/{key}', 'SatuanController@prosesDelete');
