<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DosenController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:dosen');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('beranda_dosen');
    }
    public function profil()
    {
        return view('profil_dosen');
    }
    public function bimbingan()
    {
        return view('dosenbimbingan');
    }
    public function judul()
    {
        return view('pengjuduldosen');
    }
}
