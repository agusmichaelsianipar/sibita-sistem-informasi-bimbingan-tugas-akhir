<?php

namespace App\Http\Controllers;

use App\Mahasiswa;
use App\Pengjudul;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use App\Http\Requests\ErrorFormRequest;
use Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\Validation\Validator;
use App\Http\Controllers\NotifikasiController;
use App\bimbingan;
use App\submissions;
use App\Dosen;
use App\MasaTA;

class MahasiswaController extends Controller
{
    /**https://stackoverflow.com/questions/3653882/how-to-count-days-between-two-dates-in-php
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
        //ambil notifikasi
        $notif = new NotifikasiController;
        $notif = $notif->getMyNotif(auth()->user()->email);

        //cek status
        $s = Auth::user()->status;
        if($s==0) $s = "validasi akun";
        else if($s==1) $s="Pengajuan judul";
        else if($s==2) $s="Peserta TA";
        else $s="";

        //Jumlah bimbingan
        $bimbList = bimbingan::where('mahasiswa_bimbingan', Auth::user()->email)->get();

        //Ambil jumlah bimbingan tiap waktu, untuk dikirim
        $bimbTimes = [];
        foreach($bimbList as $bimb){
            array_push($bimbTimes, explode(" ",$bimb->waktu_bimbingan)[0]);
        }
        
        //Masa TA
        $m = MasaTA::all()->first()->toArray();
        
        $sisa = abs(strtotime($m['mulai'])-strtotime(date('Y/m/d')))/86400;
        $total = abs(strtotime($m['mulai'])-strtotime($m['selesai']))/86400;
        $m = [
            'mulai' => $m['mulai'],
            'selesai' => $m['selesai'],
            'total' => $total,
            'sisa' => $sisa
        ];
        
        return view('mahasiswa.beranda',    ['notif' =>$notif,
                                            'status' => $s,
                                            'bimbingan' => $bimbList,
                                            'bimbinganTimes' => $bimbTimes,
                                            'masa'=>$m,
                                            'masaTA' => MasaTA::all()->first()->toJSON()
                                            ]);

    }
    public function showProfil()
    {
        $dosbing_1 = Dosen::where('email', Auth::user()->email_dosbing1)->first();
        $dosbing_2 = Dosen::where('email', Auth::user()->email_dosbing2)->first();
        
        if(isset($dosbing_1)){
            $dosbing_1 = $dosbing_1->name;
        }else{
            $dosbing_1='';
        }
        if(isset($dosbing_2)){
            $dosbing_2 = $dosbing_2->name;
        }else{
            $dosbing_2='';
        } 

        $a=['nim'=>Auth::user()->nim,
            'dosen_wali'=>Auth::user()->dosen_wali,
            'dosbing_1'=>$dosbing_1,
            'dosbing_2'=>$dosbing_2,
        ];

        $datum = [
            'profile'=>$a
        ];
        return view('mahasiswa.profil', ['datum'=>$a]);
    }

    public function getMyBimbingans($email){

    }
    
    public function showBimbingan()
    {
        /*
            lakukan kueri mengambil bimbingan dari database
        */
        //after i learn about the Eloquent
        
        $raw_kartuBimbingans = bimbingan::where('mahasiswa_bimbingan', auth()->user()->email)->get()->toArray();

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
        
        return view('mahasiswa.bimbingan', ['kartuBimbingans'=>$kartuBimbingans, 'mahasiswaId'=>auth()->user()->id, '']);
        
    }

    public function showPengJudul()
    {
        return view('mahasiswa.judul');
    }
  
    public function storeSubm(Request $request){
        //Input verify
        $this->validate($request,[
            'txtBimbinganOwner' => 'required',
            'txtLink' => 'required',
            'txtLinkName' => 'required'
        ]);
        
        //Store to database, masih menggunakan Query Builder
        DB::table('submissions')->insert([
            'bimbingan_parent' => $request->txtBimbinganOwner,
            'link' => $request->txtLink,
            'link_name' => $request->txtLinkName
        ]);

        return redirect('/mahasiswa/bimbingan');
    }

    public function deleteSubm(Request $request){
        $this->validate($request, [
            'txtSubmId' => 'required'
        ]);
        
        DB::table('submissions')->where('id', $request['txtSubmId'])->delete();
        return redirect('/mahasiswa/bimbingan');
    }

    public function editSubm(Request $request){
        $this->validate($request, [
            'txtSubmId' => 'required',
            'txtLink' => 'required',
            'txtLinkName' => 'required'
        ]);

        DB::table('submissions')->where('id', $request['txtSubmId'])->update([
            'link' => $request['txtLink'],
            'link_name' => $request['txtLinkName']
        ]);
        
        return redirect('/mahasiswa/bimbingan');
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
        $judul->desjudul1 = $request->deskripsi_judul_1;
        $judul->cadosbing1 = $request->cadosbing1_1;
        $judul->cadosbing2 = $request->cadosbing1_2;
        $judul->cadosbing3 = $request->cadosbing1_3;
        $cek = $judul->save();

        $judul2 = new Pengjudul;
        $judul2->email = Auth::user()->email;
        $judul2->judul1 = $request->judul_2;
        $judul2->desjudul1 = $request->deskripsi_judul_2;
        $judul2->cadosbing1 = $request->cadosbing2_1;
        $judul2->cadosbing2 = $request->cadosbing2_2;
        $judul2->cadosbing3 = $request->cadosbing2_3;
        $cek2 = $judul2->save();

        if($cek&&$cek2){
            return redirect('/mahasiswa/pengajuan-judul');
        }

    }

}
