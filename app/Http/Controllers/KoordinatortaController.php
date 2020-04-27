<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Pengjudul;
use App\Pengajudul;
use App\Mahasiswa;
use App\Dosen;
use Auth;

class KoordinatortaController extends Controller
{
    public function __construct()
    {;
        $this->middleware('auth:dosen');
    }
    public function index()
    {
        //
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function showRegistMahasiswa()
    {
        if(Auth::user()->status)
            return view('dosen.tampilDaftarCaMhs');
        else
            return redirect('/dosen')->with('status','Maaf Anda Bukan Seorang Koordinator Tugas Akhir Prodi');
    }
    public function showJudulMahasiswa()
    {
        if(Auth::user()->status)
            return view('dosen.tampilDaftarJudul');
        else
            return redirect('/dosen')->with('status','Maaf Anda Bukan Seorang Koordinator Tugas Akhir Prodi');
    }
    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
