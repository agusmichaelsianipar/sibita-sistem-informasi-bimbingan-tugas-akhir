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
        return view('bimbingan');
    }
    public function showPengJudul()
    {
        return view('judul');
    }    
}
