<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Auth;
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
        
        $raw_kartuBimbingans = bimbingan::where('mahasiswa_bimbingan', Auth::user()->email)->get()->toArray();

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

    public function deleteSubm(Request $request){
        $this->validate($request, [
            'txtSubmId' => 'required'
        ]);
        $txtSubmId = $request['txtSubmId'];
        
        DB::table('submissions')->where('id', $txtSubmId)->delete();
        return redirect('/mahasiswa/bimbingan');
    }
    
}
