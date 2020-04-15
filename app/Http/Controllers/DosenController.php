<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Pengjudul;
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
        $nomor=1;
        $judul = DB::table('pengjuduls')
                    ->where('cadosbing1', 'masayu.khodra@if.itera.ac.id')
                    ->orWhere('cadosbing2', 'meida.cahyo@if.itera.ac.id')
                    ->get();
        // dd($judul);

        $nama = DB::table("mahasiswas")->select('name','pengjuduls.id','pengjuduls.email','pengjuduls.judul1')
                    ->leftJoin('pengjuduls','mahasiswas.email','=','pengjuduls.email')->get();    
                                    
        // dd($nama);

        return view('pengjuduldosen',['nama' => $nama,'judul' => $judul,'nomor'=>$nomor]);
    }

    public function showJudul(pengjudul $judul){

        return view('dosen.detailJudul',['judul'=>$judul]);
    }
}
