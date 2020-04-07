<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use App\Http\Requests\ErrorFormRequest;
use App\Dosen;

class SuperadminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:superadmin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('superadmin.berandaAdmin');
    }

    public function aturDosen(){
        $dosen = Dosen::all();

        return view('superadmin.crudDosen',['dosen'=>$dosen]);
    }
    
    public function tambahDosen(){
        return view('superadmin.tambahDosen');
    }

    public function storeDosen(ErrorFormRequest $request){
        $this->validate($request,[
            'nama' => 'required',
            'email' => 'required|unique:dosens,email|email',
            'password'=> 'min:8|required_with:konfirmasi_password|same:konfirmasi_password',
            'konfirmasi_password' => 'min:8',
            'status' => 'required',
        ]);
        
        $dosen = new Dosen;
        $dosen->name = $request->nama;
        $dosen->email = $request->email;
        $dosen->password = $request->password;
        $dosen->status = $request->status;

        $cek = $dosen->save();

        if($cek){
            return redirect('/superadmin/aturdosbing');
        }      
    }

    public function aturKoorTA(){
        return view('superadmin.updateKoorTA');
    }
}
