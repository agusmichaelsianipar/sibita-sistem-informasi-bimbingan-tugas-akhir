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
use App\bimbingan;
use App\submissions;

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
        
        return view('bimbingan', ['kartuBimbingans'=>$kartuBimbingans, 'mahasiswaId'=>auth()->user()->id, '']);
        
    }

    public function showPengJudul()
    {
        return view('judul');
    }
<<<<<<< HEAD

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

=======
  
>>>>>>> b9f7c411b3d05787ee896a0e81f0afd905d7e9ff
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
<<<<<<< HEAD
    
=======
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
>>>>>>> b9f7c411b3d05787ee896a0e81f0afd905d7e9ff
}
