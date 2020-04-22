<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Pengjudul;
use App\Mahasiswa;
use App\bimbingan;
use App\submissions;
use App\Dosen;
use App\Http\Controllers\NotifikasiController;
use Carbon;
use Auth;


class DosenController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {;
        $this->middleware('auth:dosen');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $notif = new NotifikasiController;
        $notif = $notif->getMyNotif(auth()->user()->email);
        return view('dosen.beranda',['jmlPemohon'=>$this->getJumlahPemohon(),
                                    'jmlMhs'=>$this->getJumlahMhs(),
                                    'notif' =>$notif,
                                    ]);
    }
    public function profil()
    {
        $status = Auth::user()->status;
        if($status==0){
            $status = "Pembimbing";
        }else if($status==1){
            $status = "Koordinator";
        }

        $a=[
            'status'=>$status,
        ];
        $datum = [
            'rule'=>'dosen',
            'profile'=>$a
        ];
        return view('dosen.profil', ['datum'=>$a]);
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
            return view('dosen.ajukansidang', ['mahasiswa'=>$mahasiswa, 'popMsg'=>FALSE]);
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
            return view('dosen.ajukanseminar', ['mahasiswa'=>$mahasiswa, 'popMsg'=>FALSE]);
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
            //create notification
            $a = new NotifikasiController;
            $a->createNotif("Sebuah kartu bimbingan baru, ".$request->txtNewJudulKartu." telah dibuat oleh ".auth()->user()->name."!",
                            $request->emailMhs,
                            route('mahasiswa.bimbingan'));
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

    public function mahasiswa(){
        $raw_mahasiswa = mahasiswa::where(function($query){
            $query->where('email_dosbing1', auth()->user()->email)
            ->orWhere('email_dosbing2', auth()->user()->email);
        })->get();

        $raw_mahasiswa = $raw_mahasiswa->toArray();

        return view('dosen.mahasiswa', ["mahasiswas"=>$raw_mahasiswa, "counter"=>1]);

    }

    public function getJumlahPemohon(){
        $dosen = auth()->user()->email;
        $a = pengjudul::where(function ($query) use ($dosen){
            $query->where('cadosbing1_1', '=', $dosen)
            ->orWhere('cadosbing1_2', '=', $dosen)
            ->orWhere('cadosbing1_3', '=', $dosen)
            ->orWhere('cadosbing2_1', '=', $dosen)
            ->orWhere('cadosbing2_2', '=', $dosen)
            ->orWhere('cadosbing2_3', '=', $dosen);
        })->get()->count();
        
        return $a;
    }


    public function getJumlahMhs(){
        $dosen = auth()->user()->email;
        $a = mahasiswa::where(function ($query) use ($dosen){
            $query->where('email_dosbing1', '=', $dosen)
            ->orWhere('email_dosbing2', '=', $dosen);
        })->get()->count();
        
        return $a;
    }
}

