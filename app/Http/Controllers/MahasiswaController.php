<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\Validation\Validator;
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
    
}
