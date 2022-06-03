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
Route::get('/barang/{id}', 'BarangController@dataById');
Route::patch('/barang/update/{id}', 'BarangController@prosesUpdate');
Route::delete('/barang/delete/{id}', 'BarangController@prosesDelete');

Route::get('/barang-masuk', 'MasukController@index');
Route::get('/barang-masuk/list', 'MasukController@index');
Route::get('/barang-masuk/add', 'MasukController@barangmasuk')->name('barangmasuk');
Route::post('/barang-masuk/add', 'MasukController@prosesInput');
Route::get('/join', 'BarangController@join');

Route::get('/barang-keluar/add', 'KeluarController@barangkeluar')->name('barangkeluar');
Route::get('/findstok', 'KeluarController@findstok')->name('findstok');
Route::post('/barang-keluar/add', 'TransaksiController@prosesInput');
Route::get('/barang-keluar/list', 'TransaksiController@index');
Route::get('/barang-keluar/detail/{id}', 'TransaksiController@Outdetail');
Route::get('/report/out-detail/{id}', 'TransaksiController@reportOutDetail');

Route::get('/satuan/list', 'SatuanController@index');
Route::get('/satuan/add', 'SatuanController@input');
Route::post('/satuan/add', 'SatuanController@prosesInput');
Route::get('/satuan/{id}', 'SatuanController@dataById');
Route::patch('/satuan/update/{id}', 'SatuanController@prosesUpdate');
Route::delete('/satuan/delete/{id}', 'SatuanController@prosesDelete');
