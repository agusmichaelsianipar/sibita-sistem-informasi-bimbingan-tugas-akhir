<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mahasiswa;
use App\bimbingan;
use App\submissions;
use App\Dosen;
use Carbon;

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
    public function membimbing($emailMhs)
    {
        $mahasiswa = mahasiswa::where('email', $emailMhs)->first();

        if(is_null($mahasiswa)){
            return redirect()->route('dosen.mahasiswa')->with('popMsg', "Mahasiswa tidak ditemukan!");
        }else{
            $mahasiswa = $mahasiswa->toArray();
        }
        
        if(is_null($mahasiswa['judul'])){
            return redirect()->route('dosen.mahasiswa')->with('popMsg', $mahasiswa['name']." belum dapat mengikuti bimbingan!");
        }else{
            $dosbing1 = dosen::where('email', $mahasiswa['email_dosbing1'])->first();
            $dosbing2 = dosen::where('email', $mahasiswa['email_dosbing2'])->first();

            $raw_kartuBimbingans = bimbingan::where('mahasiswa_bimbingan', $emailMhs)->get()->toArray();

            $kartuBimbingans = [];
            foreach($raw_kartuBimbingans as $raw_kartuBimbingan){
                $tmp_kartuBimbingan = [];

                $tmp_submissions = [];
                $raw_submissions = submissions::where('bimbingan_parent', $raw_kartuBimbingan['id'])->get()->toArray();
                foreach($raw_submissions as $raw_submission){
                    $tmp_submission = $raw_submission;
                    array_push($tmp_submissions, $tmp_submission);
                }
                $tmp_kartuBimbingan = $raw_kartuBimbingan;
                $tmp_submissions = array("submissions"=>$tmp_submissions);
                $tmp_kartuBimbingan = array_merge($tmp_kartuBimbingan, $tmp_submissions);

                array_push($kartuBimbingans, $tmp_kartuBimbingan);
            }
            return view('dosen.membimbing', ["kartuBimbingans"=>$kartuBimbingans, "mahasiswa"=>$mahasiswa, "dosbing"=>[$dosbing1, $dosbing2]]);
        }
    }

    public function ajukansidang($emailMhs)
    {
        $mahasiswa = mahasiswa::where('email', $emailMhs)->first();

        if(is_null($mahasiswa)){
            return view('dosen.ajukansidang', ['mahasiswa'=>FALSE, 'popMsg'=>"Mahasiswa tidak ditemukan!"]);
        }else{
            $mahasiswa = $mahasiswa->toArray();
        }

        if(is_null($mahasiswa['judul'])){
            return redirect()->route('dosen.ajukansidang')->with('popMsg', $mahasiswa['name']." belum dapat mengikuti bimbingan!");
        }else{
            return view('dosen.ajukansidang', ['mahasiswa'=>$mahasiswa]);
        }

    }

    public function ajukanseminar($emailMhs)
    {
        $mahasiswa = mahasiswa::where('email', $emailMhs)->first();

        if(is_null($mahasiswa)){
            return view('dosen.ajukanseminar', ['mahasiswa'=>FALSE, 'popMsg'=>"Mahasiswa tidak ditemukan!"]);
        }else{
            $mahasiswa = $mahasiswa->toArray();
        }

        if(is_null($mahasiswa['judul'])){
            return redirect()->route('dosen.ajukanseminar')->with('popMsg', $mahasiswa['name']." belum dapat mengikuti bimbingan!");
        }else{
            return view('dosen.ajukanseminar', ['mahasiswa'=>$mahasiswa]);
        }
    }

    public function addCard(Request $request){
        $this->validate($request, [
            'txtNewJudulKartu'=> 'required',
            'txtNewCatatanKartu' => 'required',
            'emailMhs' => 'required'
        ]);
        $newbimbingan = new bimbingan;
        $newbimbingan->waktu_bimbingan = Carbon\Carbon::now()->toDateTimeString();
        $newbimbingan->dosen_bimbingan = auth()->user()->email;
        $newbimbingan->mahasiswa_bimbingan = $request->emailMhs;
        $newbimbingan->judul_bimbingan = $request->txtNewJudulKartu;
        $newbimbingan->catatan_bimbingan = $request->txtNewCatatanKartu;

        $cek = $newbimbingan->save();

        if($cek){
            return redirect()->route('dosen.membimbing', ['$emailMhs'=>$request['emailMhs']]);
        }
    }

    public function delCard(Request $request){
        $hapusKartu = bimbingan::where('id', $request['idKartu'])->delete();
        
        if($hapusKartu){
            return redirect()->route('dosen.membimbing', ['$emailMhs'=>$request['emailMhs']]);
        }
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
        
        /*
        echo "<pre>";
        print_r($raw_mahasiswa);
        echo "</pre>";
        */

        return view('dosen.mahasiswa', ["mahasiswas"=>$raw_mahasiswa, "counter"=>1]);
    }
}

