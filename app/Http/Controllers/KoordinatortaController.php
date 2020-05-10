<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\ErrorFormRequest;
use App\Pengjudul;
use App\Pengajudul;
use App\Guest;
use App\Mahasiswa;
use App\Dosen;
use App\notifikasi;
use Auth;
use App\Http\Controllers\NotifikasiController;
use App\PengajuanSemSid;

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
        if(Auth::user()->status){
            $nomor=1;
            $guests = Guest::all();
            $maha=DB::table("mahasiswas")->where('status', -1)->get();
            return view('dosen.tampilDaftarCaMhs',['guest'=>$maha,'nomor'=>$nomor]);
        }
        else
            return redirect('/dosen/profile')->with('dosbing');
    }
    public function validasiRegistMahasiswa(Request $request){
        $ids=$request->get('ids');
        $idm=count($ids);
        // for($i=0;$i<$idm;$i++){
            foreach($ids as $idt){
            $nama=DB::table("mahasiswas")->select('name')->where('id', $idt)->get();
            $email=DB::table("mahasiswas")->select('email')->where('id', $idt)->get();

            // Update data mahasiswa
            $cek = Mahasiswa::where('id', $idt)
                    ->update([
                        'status' => 0
                    ]);

            //Hapus Data Guests
            if($cek){
                $notif = new NotifikasiController;
                // Notifikasi ke mahasiswa
                $notif->createNotif(
                    "Selamat ".$nama."! Permohonan TA anda telah disetujui. Silakan melakukan pengajuan judul dan dosen pembimbing.",
                    $email,
                    route('mahasiswa.judul')
                );
                // guest::destroy($tamu[$i]->id);
            }

        }
            return redirect('/dosen/koordinator/validasidaftar')->with('status','Sukses Menambahkan Mahasiswa');
        
    }
    public function showJudulMahasiswa()
    {
        if(Auth::user()->status){
            $nomor=1;
            $nama = DB::table("pengajuduls")
                    ->leftJoin('mahasiswas','pengajuduls.email','=','mahasiswas.email')->get();
            return view('dosen.tampilDaftarJudul',['nama'=>$nama,'nomor'=>$nomor]);
        }
        else
            return redirect('/dosen/profile')->with('dosbing');
    }
    public function showDetailJudul(pengjudul $judul)
    {
        
            $nama = DB::table("mahasiswas")->where('email', $judul->email)->get();
            $emaildosbing = array($judul->cadosbing11,$judul->cadosbing12,$judul->cadosbing13,$judul->cadosbing21,$judul->cadosbing22,$judul->cadosbing23);
            $namadosbing = array(6);
            for($i=0;$i<6;$i++){
                $namados=DB::table("dosens")->get();
                foreach($namados as $nados){
                    if($nados->email==$emaildosbing[$i]){
                        $namadosbing[$i]=$nados->name;
                    }
                }
            } 
        return view('dosen.detailJudulKoorta',['judul'=>$judul,'mahasiswa'=>$nama,'dosen'=>$namadosbing]);
    }

    public function validasiDetailJudul(ErrorFormRequest $request, pengjudul $judul,$opsi)
    {
        //Update data Judul dan Dosen Pembimbing ke Tabel Mahasiswas
        if($opsi==1){
            $this->validate($request,[
                'cadosbing1_1' => 'required',
                'cadosbing1_2' => 'required',
            ]);        
    
            $cek=mahasiswa::where('email',$judul->email)
                ->update([
                    'judul' => $request->judul_1,
                    'email_dosbing1' => $request->cadosbing1_1,
                    'email_dosbing2' => $request->cadosbing1_2,
                ]);
        }elseif($opsi==2){
            $this->validate($request,[
                'cadosbing2_1' => 'required',
                'cadosbing2_2' => 'required',
            ]);        
    
            $cek=mahasiswa::where('email',$judul->email)
                ->update([
                    'judul' => $request->judul_2,
                    'email_dosbing1' => $request->cadosbing2_1,
                    'email_dosbing2' => $request->cadosbing2_2,
                ]);
        }

        if($cek){
            //Hapus Data Pengajuan Judul dari Tabel Pengajuduls
            pengajudul::destroy($judul->id);
        }

        return redirect('/dosen/koordinator/validasimhs')->with('status','Sukses Update Data Dosen Pembimbing dan Judul Mahasiswa');

    }

    public function dasborKoorta(){
        // Guest yang memohon validasi
        $count = Guest::all()->count();

        // Ambil notifikasi
        $notif = new NotifikasiController;
        $notif = $notif->getMyNotif(auth()->user()->email);

        $masaTa = new MasaTAController;
        
        if(!$masaTa->isAvailable()){
            $pengaturan = FALSE;
        }else{
            $pengaturan = [
                'start' => $masaTa->getStartDate(),
                'end' => $masaTa->getEndDate()
            ];
        }
        
        $pengajuan = new PengajuanSemSidController;
        return view('dosen.koordinator.dasborKoorta')->with([
            'popMsg' => (session('popMsg')!=NULL)? session('popMsg') : FALSE,
            'countPermohonanValidasi' => $count,
            'notif' => $notif,
            'countPengSeminar' => $pengajuan->getPengSeminarCount(),
            'countPengSidang' => $pengajuan->getPengSidangCount(),
            'pengaturan' => $pengaturan
        ]);
    }
    
    public function sidang()
    {
        $pengajuan = PengajuanSemSid::where('tipe_pengajuan', '1')->get();
        $pengajuan = DB::table('pengajuan_sem_sids')->
                join('dosens', 'pengajuan_sem_sids.pengaju', '=', 'dosens.email')->
                join('mahasiswas', 'pengajuan_sem_sids.mahasiswa', '=', 'mahasiswas.email')->
                select('dosens.name as dosen',
                        'mahasiswas.name as mahasiswa',
                        'pengajuan_sem_sids.id as id',
                        'pengajuan_sem_sids.status as status')
                -> where('pengajuan_sem_sids.tipe_pengajuan', '=', '2')
                -> where('pengajuan_sem_sids.status', '=', '0')
                ->get();

        return view('dosen.koordinator.validasiPermohonan')->with([
            'title' => 'Konfirmasi pengajuan sidang',
            'pengajuan' => $pengajuan,
            'nomor' => 1
        ]);
    }

    public function seminar()
    {
        $pengajuan = PengajuanSemSid::where('tipe_pengajuan', '1')->get();
        $pengajuan = DB::table('pengajuan_sem_sids')->
                join('dosens', 'pengajuan_sem_sids.pengaju', '=', 'dosens.email')->
                join('mahasiswas', 'pengajuan_sem_sids.mahasiswa', '=', 'mahasiswas.email')->
                select('dosens.name as dosen',
                        'mahasiswas.name as mahasiswa',
                        'pengajuan_sem_sids.id as id',
                        'pengajuan_sem_sids.status as status')
                -> where('pengajuan_sem_sids.tipe_pengajuan', '1')
                -> where('pengajuan_sem_sids.status', '=', '0')
                ->get();

        return view('dosen.koordinator.validasiPermohonan')->with([
            'title' => 'Konfirmasi pengajuan seminar',
            'pengajuan' => $pengajuan,
            'nomor' => 1
        ]);
    }


    public function konfirmasisemsid(Request $request)
    {
        $ids=$request->get('ids');

        if($ids==null){
            $ids = [];
        }

        for($i=0;$i<count($ids);$i++){
            $konfirmasi = 
            PengajuanSemSid::where('id', $ids[$i])->update([
                'status' => '1',
                'waktu_pelaksanaan' => $request['waktu_pelaksanaan']
            ]);
            $aju = PengajuanSemSid::where('id', $ids[$i])->first();
        
            $tipe = $aju->tipe_pengajuan;
            if($tipe==1) $tipe = 'seminar';
            else if($tipe==2) $tipe = 'sidang';

            $notif = new NotifikasiController;
            $notif->createNotif(
                "Pengajuan ".$tipe."telah disetujui oleh koordinator!",
                $aju->mahasiswa,
                "#"
            );

            $notif->createNotif(
                "Pengajuan ".$tipe." untuk ".
                Mahasiswa::where('email', $aju->mahasiswa)->first()->name.
                " telah disetujui oleh koordinator!",
                $aju->pengaju,
                "#"
            );
        }

        

        return redirect()->route('koorta.sidang')->with([

        ]);
    }

}
