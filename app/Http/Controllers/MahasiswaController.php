<?php

namespace App\Http\Controllers;

use App\Mahasiswa;
use App\Pengjudul;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use App\Http\Requests\ErrorFormRequest;
use Auth;

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
    public function storePengJudul(ErrorFormRequest $request){
        $this->validate($request,[
            'judul_1' => 'required',
            'deskripsi_judul_1' => 'required',
            'judul_2'=> 'required',
            'deskripsi_judul_2' => 'required',
            'cadosbing1_1' => 'required',
            'cadosbing1_2' => 'required',
            'cadosbing1_3' => 'required',
            'cadosbing2_1' => 'required',
            'cadosbing2_2' => 'required',
            'cadosbing2_3' => 'required',
        ]);
        
        $judul = new Pengjudul;
        $judul->email = Auth::user()->email;
        $judul->judul1 = $request->judul_1;
        $judul->des_judul1 = $request->deskripsi_judul_1;
        $judul->judul2 = $request->judul_2;
        $judul->des_judul2 = $request->deskripsi_judul_2;
        $judul->cadosbing1_1 = $request->cadosbing1_1;
        $judul->cadosbing1_2 = $request->cadosbing1_2;
        $judul->cadosbing1_3 = $request->cadosbing1_3;
        $judul->cadosbing2_1 = $request->cadosbing2_1;
        $judul->cadosbing2_2 = $request->cadosbing2_2;
        $judul->cadosbing2_3 = $request->cadosbing2_3;

        $cek = $judul->save();

        if($cek){
            return redirect('/mahasiswa/pengajuan-judul');
        }

    }    
}
