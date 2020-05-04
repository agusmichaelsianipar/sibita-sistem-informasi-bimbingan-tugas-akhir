<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\ErrorFormRequest;
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
            return redirect('/dosen/profile')->with('status','Maaf Anda Bukan Seorang Koordinator Tugas Akhir Prodi');
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
            return redirect('/dosen/profile')->with('status','Maaf Anda Bukan Seorang Koordinator Tugas Akhir Prodi');
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
        // dd($judul);

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

    public function destroy($id)
    {
        //
    }
}
