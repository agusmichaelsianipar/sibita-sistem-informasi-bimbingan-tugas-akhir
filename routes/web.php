<?php
use RealRashid\SweetAlert\Facades\Alert;

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
    Alert::success('Success Title', 'Success Message');
    return view('welcome');
});

Route::get('/exception/read',function(){
    Alert::error('Gagal', 'Success Message');
    return view('sign_up');
});

Route::get('/daftarta','GuestController@index');
Route::post('/daftar','GuestController@store');

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::prefix('mahasiswa')->group(function(){
    Route::get('/login','Auth\MahasiswaLoginController@showLoginForm')->name('mahasiswa.login');
    Route::post('/login','Auth\MahasiswaLoginController@login')->name('mahasiswa.login.submit');
    Route::get('/logout','Auth\MahasiswaLoginController@logout')->name('mahasiswa.logout');

    //Password Reset Route
    Route::post('/password/email','Auth\MahasiswaForgotPasswordController@sendResetLinkEmail')->name('mahasiswa.password.email');
    Route::get('/password/reset','Auth\MahasiswaForgotPasswordController@showLinkRequestForm')->name('mahasiswa.password.request');
    Route::post('/password/reset','Auth\MahasiswaResetPasswordController@reset')->name('mahasiswa.password.request');
    Route::get('/password/reset/{token}','Auth\MahasiswaResetPasswordController@showResetForm')->name('mahasiswa.password.reset');

    Route::get('/', 'MahasiswaController@index')->name('mahasiswa.dashboard');
    Route::get('/beranda', 'MahasiswaController@index')->name('mahasiswa.beranda');
    Route::get('/profil', 'MahasiswaController@showProfil')->name('mahasiswa.profil');
    Route::get('/bimbingan', 'MahasiswaController@showBimbingan')->name('mahasiswa.bimbingan');
    Route::post('/bimbingan/addSubm', 'MahasiswaController@storeSubm')->name('mahasiswa.tambahSubmission');
    Route::post('/bimbingan/delSubm', 'MahasiswaController@deleteSubm')->name('mahasiswa.hapusSubmission');
    Route::post('/bimbingan/edtSubm', 'MahasiswaController@editSubm')->name('mahasiswa.editSubmission');
    Route::get('/pengajuan-judul', 'MahasiswaController@showPengJudul')->name('mahasiswa.judul');
    Route::post('/pengajuan-judulta', 'MahasiswaController@storePengJudul');
});

    Route::prefix('dosen')->group(function(){
    Route::get('/login','Auth\DosenLoginController@showLoginForm')->name('dosen.login');
    Route::post('/login','Auth\DosenLoginController@login')->name('dosen.login.submit');
    Route::get('/logout','Auth\DosenLoginController@logout')->name('dosen.logout');

    //Password Reset Route
    Route::post('/password/email','Auth\DosenForgotPasswordController@sendResetLinkEmail')->name('dosen.password.email');
    Route::get('/password/reset','Auth\DosenForgotPasswordController@showLinkRequestForm')->name('dosen.password.request');
    Route::post('/password/reset','Auth\DosenResetPasswordController@reset')->name('dosen.password.request');
    Route::get('/password/reset/{token}','Auth\DosenResetPasswordController@showResetForm')->name('dosen.password.reset');

    Route::get('/', 'DosenController@index')->name('dosen.dashboard');
    Route::get('/profile', 'DosenController@profil')->name('dosen.profile');
    Route::get('/bimbingan', 'DosenController@bimbingan')->name('dosen.bimbingan');
    Route::get('/membimbing/{emailMhs}', 'DosenController@membimbing')->name('dosen.membimbing');
    Route::post('/tambahKartu', 'DosenController@addCard')->name('dosen.tambahKartu');
    Route::delete('/hapusKartu', 'DosenController@delCard')->name('dosen.hapusKartu');
    Route::get('/mahasiswa', 'DosenController@mahasiswa')->name('dosen.mahasiswa');
    Route::get('/judul', 'DosenController@judul')->name('dosen.judul');
    Route::get('/judul/{judul}', 'DosenController@showJudul');
    Route::get('/judul/{judul}/validasi', 'DosenController@validasiJudul');
    Route::post('/judul/{judul}/validasi/{attr}/{status}', 'DosenController@validasiJudul');
    Route::get('/koordinator/validasidaftar','KoordinatortaController@showRegistMahasiswa')->name('koorta.dataregist');
    Route::post('/koordinator/validasidaftar','KoordinatortaController@validasiRegistMahasiswa')->name('koorta.validregist');
    Route::get('/koordinator/validasimhs','KoordinatortaController@showJudulMahasiswa')->name('koorta.datajudulmhs');
    Route::get('/koordinator/detail/{judul}','KoordinatortaController@showDetailJudul')->name('koorta.detailjudulmhs');
    Route::get('/koordinator/dasborKoordinator','KoordinatortaController@dasborKoorta')->name('koorta.dasborKoorta');
    Route::get('/koordinator/sidang','KoordinatortaController@sidang')->name('koorta.sidang');
    Route::get('/koordinator/seminar','KoordinatortaController@seminar')->name('koorta.seminar');
    ROute::get('/koordinator/setupta', 'MasaTAController@interface')->name('koorta.setup');
    ROute::post('/koordinator/setmasa', 'MasaTAController@setmasa')->name('koorta.setmasa');
    Route::post('/koordinator/konfirmasisemsid','KoordinatortaController@konfirmasisemsid')->name('koorta.konfirmasisemsid');
    Route::post('/ajukan', 'PengajuanSemSidController@ajukan')->name('dosen.ajukanSemSed');
    Route::post('/koordinator/detail/{judul}/{opsi}','KoordinatortaController@validasiDetailJudul')->name('koorta.validjudulmhs');
    Route::post('/mahasiswa/action', 'DosenController@mhsActionHandler')->name('dosen.mahasiswa.actionHandler');
});

Route::prefix('superadmin')->group(function(){
    Route::get('/login','Auth\SuperadminLoginController@showLoginForm')->name('superadmin.login');
    Route::post('/login','Auth\SuperadminLoginController@login')->name('superadmin.login.submit');
    Route::get('/logout','Auth\SuperadminLoginController@logout')->name('superadmin.logout');

    //Password Reset Route
    Route::post('/password/email','Auth\SuperadminForgotPasswordController@sendResetLinkEmail')->name('superadmin.password.email');
    Route::get('/password/reset','Auth\SuperadminForgotPasswordController@showLinkRequestForm')->name('superadmin.password.request');
    Route::post('/password/reset','Auth\SuperadminResetPasswordController@reset')->name('superadmin.password.request');
    Route::get('/password/reset/{token}','Auth\SuperadminResetPasswordController@showResetForm')->name('superadmin.password.reset');

    Route::get('/', 'SuperadminController@index')->name('superadmin.beranda');
    Route::get('/aturdosbing', 'SuperadminController@aturDosen')->name('superadmin.aturDosbing');
    Route::delete('/aturdosbing/{dosen}', 'SuperadminController@destroyDosen');
    Route::delete('/{mahasiswa}', 'SuperadminController@destroyMahasiswa');
    Route::get('/aturdosbing/{dosen}/ubah', 'SuperadminController@editDosen');
    Route::patch('/aturdosbing/{dosen}', 'SuperadminController@updateDosen');
    Route::get('/tambahdosen','SuperadminController@tambahDosen')->name('superadmin.tambahDosbing');
    Route::get('/tambahmahasiswa','SuperadminController@tambahMahasiswa')->name('superadmin.tambahMahasiswa');
    Route::post('/tambahmahasiswa','SuperadminController@inputTambahMahasiswa')->name('superadmin.ITambahMahasiswa');
    Route::get('/{mahasiswa}/ubahmahasiswa','SuperadminController@ubahMahasiswa')->name('superadmin.ubahMahasiswa');
    Route::patch('/{mahasiswa}/ubahmahasiswa','SuperadminController@inputUbahMahasiswa')->name('superadmin.IUbahMahasiswa');
    Route::post('/tambahdosbing','SuperadminController@storeDosen')->name('superadmin.tambahDosen');
    Route::get('/aturkoorta', 'SuperadminController@aturKoorTA')->name('superadmin.aturKoorTA');
    Route::patch('/aturkoorta/{dosen}', 'SuperadminController@updateKoorTA');
    Route::get('/statistikTA', 'SuperadminController@statistikTA')->name('superadmin.statistikTA');

});

Route::prefix('notif')->group(function(){
    Route::patch('/pin/{notifikasi}', 'NotifikasiController@pin');
    Route::patch('/destroy/{notifikasi}', 'NotifikasiController@destroy');
    
});

Route::get('/reset','GuestController@resetpass');