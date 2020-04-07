<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
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
        //$kartuBimbingan = DB::select("SELECT * FROM bimbingan_cards WHERE 'mahasiswa_bimbingan' = ".auth()->user()->id);
        $kartuBimbingan = DB::table('bimbingan_cards')->where('mahasiswa_bimbingan', auth()->user()->id)->get()->toArray();
        //$submissions = DB::table('submissions_list')->where('bimbingan_parent', $kartuBimbingan[''])
        //after i learn about the Eloquent
        $bimbingans = bimbingan::where('dosen_bimbingan', auth()->user()-id)->get();

        //data sementara untuk testing
        $link1 = array('link'=>'https://oke.id', 'linkname'=>'Revisi ke sekian');
        $link2 = array('link'=>'https://eko.id', 'linkname'=>'Revisi ke sekuan');
        $kartu1 = array("id"=>"1", "judul"=>"Bimbingan 1", "waktu"=>"Senin, 23 Maret 2020 09:00 ", "dosen"=>"Hafiz Budi", "catatan"=>"Sebuah catatan", "submissions"=>[$link1, $link2]);
        
        $kartu2 = array("id"=>"2", "judul"=>"Bimbingan 2", "waktu"=>"Senin, 23 Maret 2020 09:00 ", "dosen"=>"Hafiz Budi", "catatan"=>"Sebuah catatan", "submissions"=>[]);
        
        $daftarBimbingan = array($kartu1, $kartu2);
        //return view('bimbingan', ['daftarBimbingan'=>$daftarBimbingan, 'mahasiswaId'=>auth()->user()->id, '']);
        foreach($kartuBimbingan as $aa){
            //echo $aa;
        }
    }
    public function showPengJudul()
    {
        return view('judul');
    }
    public function storeSubm(Request $request){
        /*
        #TODO
        Do query to database submissions
        */

        // Verifying the inputs
        $this->validate($request, [
            'txtLink' => 'required',
            'txtLinkName' => 'required',
            'txtOwner' => 'required'
        ]);
        
        $txtLink = $request['txtLink'];
        $txtLinkName = $request['txtLinkName'];
        $txtOwner = $request['txtOwner'];
        
        echo $txtLink."</br>".$txtLinkName."</br>".$txtOwner;
        
        // add the submissions to submissions_list
        DB::table('submissions_list')->insert([
            'link' => $txtLink,
            'link_name' => $txtLinkName,
            'owner_mhs' => $txtOwner
        ]);

        return redirect('/mahasiswa/bimbingan');
    }
    
}
