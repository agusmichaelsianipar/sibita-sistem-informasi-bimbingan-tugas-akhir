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


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::prefix('mahasiswas')->group(function(){
    Route::get('/login','Auth\MahasiswaLoginController@showLoginForm')->name('mahasiswas.login');
    Route::post('/login','Auth\MahasiswaLoginController@login')->name('mahasiswas.login.submit');
    Route::get('/', 'MahasiswasController@index')->name('mahasiswas.dashboard');
});

Route::prefix('superadmins')->group(function(){
    Route::get('/login','Auth\SuperAdminLoginController@showLoginForm')->name('superadmins.login');
    Route::post('/login','Auth\SuperAdminLoginController@login')->name('superadmins.login.submit');
    Route::get('/', 'SuperAdminsController@index')->name('superadmins.dashboard');
});

Route::prefix('dosbingkoortas')->group(function(){
    Route::get('/login','Auth\DosbingKoorTALoginController@showLoginForm')->name('dosbingkoortas.login');
    Route::post('/login','Auth\DosbingKoorTALoginController@login')->name('dosbingkoortas.login.submit');
    Route::get('/', 'DosbingKoorTasController@index')->name('dosbingkoortas.dashboard');
});

