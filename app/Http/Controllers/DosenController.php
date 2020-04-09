<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mahasiswa;

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
        return view('dosen.beranda');
    }
    public function profil()
    {
        return view('dosen.profil');
    }
    public function bimbingan()
    {
        return view('dosen.bimbingan');
    }
    public function judul()
    {
        return view('dosen.pengjudul');
    }
    public function mahasiswa(){
        $raw_mahasiswa = mahasiswa::where(function($query){
            $query->where('email_dosbing1', auth()->user()->email)
            ->orWhere('email_dosbing2', auth()->user()->email);
        })->get();

        $raw_mahasiswa = $raw_mahasiswa->toArray();

        echo "<pre>";
        print_r($raw_mahasiswa);
        echo "</pre>";
        return view('dosen.mahasiswa', ["mahasiswas"=>$raw_mahasiswa, "counter"=>1]);
    }
}

