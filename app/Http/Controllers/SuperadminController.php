<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use App\Http\Requests\ErrorFormRequest;
use Illuminate\Support\Facades\Hash;
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
        $nomor=1;
        return view('superadmin.crudDosen',['dosen'=>$dosen,'nomor'=>$nomor]);
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
        $dosen->password = Hash::make($request->password);
        $dosen->status = $request->status;

        $cek = $dosen->save();

        if($cek){
            return redirect('/superadmin/aturdosbing')->with('status','Data Dosen Berhasil Ditambahkann!');
        }      
    }

    public function destroyDosen(dosen $dosen){
        dosen::destroy($dosen->id);

        return redirect('/superadmin/aturdosbing')->with('status','Data Dosen Berhasil Dihapus!');
    }    

    public function editDosen(dosen $dosen){
        return view('superadmin.ubahDosen',['dosen'=>$dosen]);
    }

    public function updateDosen(ErrorFormRequest $request, dosen $dosen){

        $this->validate($request,[
            'nama' => 'required',
            'email' => 'required|email',
            'password'=> 'min:8|required_with:konfirmasi_password|same:konfirmasi_password',
            'konfirmasi_password' => 'min:8',
            'status' => 'required',
        ]);        

        dosen::where('id',$dosen->id)
            ->update([
                'name' => $request->nama,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'status' => $request->status,
            ]);

        return redirect('/superadmin/aturdosbing')->with('status','Data Dosen Berhasil Diubah!');
    }

    public function aturKoorTA(){
        $dosen = Dosen::all();
        $nomor=1;
        return view('superadmin.updateKoorTA',['dosen'=>$dosen,'nomor'=>$nomor]);
    }

    public function updateKoorTA(ErrorFormRequest $request, dosen $dosen){

        if($dosen->status){
            dosen::where('id',$dosen->id)
            ->update([
                'status' => 0,
            ]);
        }else{
            dosen::where('id',$dosen->id)
            ->update([
                'status' => 1,
            ]);
        }
        
        return redirect('/superadmin/aturkoorta')->with('status','Data Koordinator Berhasil Dihapus!');
    }
}
