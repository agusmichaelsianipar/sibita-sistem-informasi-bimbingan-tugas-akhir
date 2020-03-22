<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:mahasiswa');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('beranda_mahasiswa');
    }
    public function showProfil()
    {
        return view('profil_mahasiswa');
    }
    public function showBimbingan()
    {
        /*
            lakukan kueri mengambil bimbingan dari database
        */

        //data sementara untuk testing
        $kartu1 = array("id"=>"1", "judul"=>"Bimbingan 1", "waktu"=>"Senin, 23 Maret 2020 09:00 ", "dosen"=>"Hafiz Budi", "catatan"=>"Sebuah catatan", "submission"=>"link");
        $kartu2 = array("id"=>"2", "judul"=>"Bimbingan 2", "waktu"=>"Senin, 23 Maret 2020 09:00 ", "dosen"=>"Hafiz Budi", "catatan"=>"Sebuah catatan", "submission"=>"link");

        $daftarBimbingan = array($kartu1, $kartu2);
        return view('bimbingan', ['daftarBimbingan'=>$daftarBimbingan]);
    }
    public function showPengJudul()
    {
        return view('judul');
    }    
}
