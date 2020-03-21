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

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::prefix('mahasiswa')->group(function(){
    Route::get('/login','Auth\MahasiswaLoginController@showLoginForm')->name('mahasiswa.login');
    Route::post('/login','Auth\MahasiswaLoginController@login')->name('mahasiswa.login.submit');
    Route::get('/', 'MahasiswaController@index')->name('mahasiswa.dashboard');
    Route::get('/beranda', 'MahasiswaController@index')->name('mahasiswa.beranda');
    Route::get('/profil', 'MahasiswaController@showProfil')->name('mahasiswa.profil');
    Route::get('/bimbingan', 'MahasiswaController@showBimbingan')->name('mahasiswa.bimbingan');
    Route::get('/pengajuan-judul', 'MahasiswaController@showPengJudul')->name('mahasiswa.judul');
});

Route::prefix('dosen')->group(function(){
    Route::get('/login','Auth\DosenLoginController@showLoginForm')->name('dosen.login');
    Route::post('/login','Auth\DosenLoginController@login')->name('dosen.login.submit');
    Route::get('/', 'DosenController@index')->name('dosen.dashboard');
});

Route::prefix('superadmin')->group(function(){
    Route::get('/login','Auth\SuperadminLoginController@showLoginForm')->name('superadmin.login');
    Route::post('/login','Auth\SuperadminLoginController@login')->name('superadmin.login.submit');
    Route::get('/', 'SuperadminController@index')->name('superadmin.dashboard');
});

