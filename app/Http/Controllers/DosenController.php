<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Pengjudul;
use App\Pengajudul;
use App\Mahasiswa;
use App\bimbingan;
use App\submissions;
use App\Dosen;
use App\Http\Controllers\NotifikasiController;
use Carbon;
use Auth;
use App\MasaTA;
use App\Http\Controllers\PengajuanSemSidController;
use App\PengajuanSemSid;

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
        
        $bimbList = bimbingan::where('dosen_bimbingan', Auth::user()->email)->get();
        $bimbTimes = [];
        foreach($bimbList as $bimb){
            array_push($bimbTimes, explode(" ",$bimb->waktu_bimbingan)[0]);
        }

        //Ambil masa TA yang berlaku
        $m = MasaTA::all()->first();
        if(isset($m->id)){
            $notif = new NotifikasiController;
            $notif = $notif->getMyNotif(auth()->user()->email);
            return view('dosen.beranda',['jmlPemohon'=>$this->getJumlahPemohon(),
                                        'jmlMhs'=>$this->getJumlahMhs(),
                                        'notif' =>$notif,
                                        'bimbinganTimes' => $bimbTimes,
                                        'masaTA' => MasaTA::all()->first()->toJSON()
                                        ]);
        }else{
            $notif = new NotifikasiController;
            $notif = $notif->getMyNotif(auth()->user()->email);
            return view('dosen.beranda',['jmlPemohon'=>$this->getJumlahPemohon(),
                                    'jmlMhs'=>$this->getJumlahMhs(),
                                    'notif' =>$notif,
                                    'bimbinganTimes' => $bimbTimes,
                                    'masaTA' => 'null',
                                    ]);
        }
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
        if(session('dosbing')){
            Alert::warning('Akses Ditolak','Maaf Anda Bukan Seorang Koordinator Tugas Akhir Prodi');
        }
        return view('dosen.profil', ['datum'=>$a]);
    }
    public function bimbingan()
    {
        return view('dosen.bimbingan');
    }
    public function membimbing($emailMhs)
    {
        $mahasiswa = mahasiswa::where('email', $emailMhs)->first();

        // apakah mahasiswa tersebut ada (ini hanya fitur mencegah error)
        if(is_null($mahasiswa)){
            return redirect()->route('dosen.mahasiswa')->with('popMsg', "Mahasiswa tidak ditemukan!");
        }else{
            $mahasiswa = $mahasiswa->toArray();
        }
        
        if(is_null($mahasiswa['judul']) || $mahasiswa['status']!=2){
            echo "okeo ke";
            return redirect()->route('dosen.mahasiswa')->with([
                    'popMsg'=> $mahasiswa['name']." belum dapat mengikuti bimbingan! Judul belum disetujui"
                ]);
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


    public function mhsActionHandler(Request $request){
        switch ($request['actionName']) {
            case 'bimbingan':
                return $this->membimbing($request['emailMhs']);
                break;
            case 'seminar':
                $s = new PengajuanSemSidController;
                return $s->ajukanSeminar($request['emailMhs']);
                break;
            case 'sidang':
                $s = new PengajuanSemSidController;
                return $s->ajukanSidang($request['emailMhs']);
                break;
            default:
                # code...
                break;
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
            $a->createNotif("Sebuah kartu bimbingan baru \"".$request->txtNewJudulKartu."\" telah dibuat oleh ".auth()->user()->name."!",
                            $request->emailMhs,
                            route('mahasiswa.bimbingan'));
            
            $a->createNotif("Sebuah kartu bimbingan baru \"".$request->txtNewJudulKartu.
                            "\" untuk ".mahasiswa::where('email', $request->emailMhs)->first()->name." telah dibuat oleh ".auth()->user()->name."!",
                            mahasiswa::where('email', $request->emailMhs)->first()->email_dosbing1,
                            "#"); 
                               
            $a->createNotif("Sebuah kartu bimbingan baru \"".$request->txtNewJudulKartu.
                            "\" untuk ".mahasiswa::where('email', $request->emailMhs)->first()->name." telah dibuat oleh ".auth()->user()->name."!",
                            mahasiswa::where('email', $request->emailMhs)->first()->email_dosbing2,
                            "#"); 
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
        $dosen=Auth::user();
        $juduls = Pengajudul::all();
        $nomor=1;
        $nama = DB::table("pengajuduls")
                ->where('cadosbing11', '=', $dosen->email)
                ->orWhere('cadosbing12', '=', $dosen->email)
                ->orWhere('cadosbing13', '=', $dosen->email)
                ->orWhere('cadosbing21', '=', $dosen->email)
                ->orWhere('cadosbing22', '=', $dosen->email)
                ->orWhere('cadosbing23', '=', $dosen->email)
                ->leftJoin('mahasiswas','pengajuduls.email','=','mahasiswas.email')->get();    
                                   
        return view('pengjuduldosen',['nama' => $nama,'nomor'=>$nomor]);
    }

    public function showJudul(pengjudul $judul){
        // dd($judul);
        return view('dosen.detailJudul',['judul'=>$judul]);

    }

    public function mahasiswa(){
        $raw_mahasiswa = mahasiswa::where(function($query){
            $query->where('email_dosbing1', auth()->user()->email)
            ->orWhere('email_dosbing2', auth()->user()->email);
        })->get();

        $raw_mahasiswa = $raw_mahasiswa->toArray();

        for($i=0; $i<count($raw_mahasiswa); $i++){
            $s = $raw_mahasiswa[$i]['status'];
            if($s==0) $s = "Akun Baru";
            else if($s==-1) $s="Menunggu Persetujuan";
            else if($s==1) $s="Pengajuan judul";
            else if($s==2) $s="Peserta TA";
            else $s="";
            $raw_mahasiswa[$i]['status']=$s;
        }
        
        return view('dosen.mahasiswa')->with([
                "mahasiswas"=>$raw_mahasiswa,
                "counter"=>1
            ]);
    }

    //Tambahkan kolom statusjudul di table pengajuduls
    public function validasiJudul(pengjudul $judul,$attr,$status){
        pengjudul::where('id',$judul->id)
        ->update([
            $attr=> $status
        ]);
        $nomor=1;
        $dosen=Auth::user();
        $nama = DB::table("pengajuduls")
                ->where('cadosbing11', '=', $dosen->email)
                ->orWhere('cadosbing12', '=', $dosen->email)
                ->orWhere('cadosbing13', '=', $dosen->email)
                ->orWhere('cadosbing21', '=', $dosen->email)
                ->orWhere('cadosbing22', '=', $dosen->email)
                ->orWhere('cadosbing23', '=', $dosen->email)
                ->leftJoin('mahasiswas','pengajuduls.email','=','mahasiswas.email')->get();
        return redirect()->route('dosen.judul',['nama' => $nama,'nomor'=>$nomor]);
    }

    public function getJumlahPemohon(){
        $dosen = auth()->user()->email;
        $a = pengjudul::where(function ($query) use ($dosen){
            $query->where('cadosbing11', '=', $dosen)
            ->orWhere('cadosbing12', '=', $dosen)
            ->orWhere('cadosbing13', '=', $dosen)
            ->orWhere('cadosbing21', '=', $dosen)
            ->orWhere('cadosbing22', '=', $dosen)
            ->orWhere('cadosbing23', '=', $dosen);
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

