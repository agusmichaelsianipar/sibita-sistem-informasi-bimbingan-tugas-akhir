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

Route::get('/','BerandaController@home');
Route::get('/login','BerandaController@f_login');
Route::get('/sign-up','BerandaController@f_sign_up');
Route::get('/mahasiswa','MahasiswaController@index');
Route::get('/dosbing','DosbingController@index');
Route::get('/kordta','KordtaController@index');

