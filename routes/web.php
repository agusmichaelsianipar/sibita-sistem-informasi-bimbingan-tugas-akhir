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

Route::get('/daftarta','GuestController@index');
Route::post('/daftar','GuestController@store');

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
    Route::post('/pengajuan-judulta', 'MahasiswaController@storePengJudul');
});

Route::prefix('dosen')->group(function(){
    Route::get('/login','Auth\DosenLoginController@showLoginForm')->name('dosen.login');
    Route::post('/login','Auth\DosenLoginController@login')->name('dosen.login.submit');
    Route::get('/', 'DosenController@index')->name('dosen.dashboard');
    Route::get('/profile', 'DosenController@profil')->name('dosen.profile');
    Route::get('/bimbingan', 'DosenController@bimbingan')->name('dosen.bimbingan');
    Route::get('/judul', 'DosenController@judul')->name('dosen.judul');
});

Route::prefix('superadmin')->group(function(){
    Route::get('/login','Auth\SuperadminLoginController@showLoginForm')->name('superadmin.login');
    Route::post('/login','Auth\SuperadminLoginController@login')->name('superadmin.login.submit');
    Route::get('/', 'SuperadminController@index')->name('superadmin.beranda');
    Route::get('/aturdosbing', 'SuperadminController@aturDosen')->name('superadmin.aturDosbing');
    Route::delete('/aturdosbing/{dosen}', 'SuperadminController@destroyDosen');
    Route::get('/aturdosbing/{dosen}/ubah', 'SuperadminController@editDosen');
    Route::get('/tambahdosen','SuperadminController@tambahDosen')->name('superadmin.tambahDosbing');
    Route::post('/tambahdosbing','SuperadminController@storeDosen')->name('superadmin.tambahDosen');
    Route::get('/aturkoorta', 'SuperadminController@aturKoorTA')->name('superadmin.aturKoorTA');
});