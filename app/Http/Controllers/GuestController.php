<?php

namespace App\Http\Controllers;

use App\Guest;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use App\Http\Requests\ErrorFormRequest;
use Illuminate\Support\Facades\Hash;
use App\Exceptions\CustomException;
use Exception;
use App\Mahasiswa;
use App\Dosen;
// use UxWeb\SweetAlert\SweetAlert as Alert;
use RealRashid\SweetAlert\Facades\Alert;
// use Alert;

class GuestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
        
        $dosens = Dosen::all();
        
        if(session('gagal')){
            Alert::error('Gagal Melakukan Pendaftaran','Akun Mungkin Sudah Ada Silahkan Hubungi Koordinator TA');
        }
        return view('sign_up')->with([
            'dosens' => $dosens
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ErrorFormRequest $request)
    {
        $validasi=$this->validate($request,[
            'nama' => 'required',
            'nim' => 'min:8|required',
            'email'=> 'required|unique:guests,email|email',
            'password' => 'min:8|required_with:pass_konfirm|same:pass_konfirm',
            'pass_konfirm' => 'min:8',
            'dosen_wali' => 'required',
            'semester' => 'required',
        ]);

            function maxID(){
                $maha=Mahasiswa::all();
                $max=0;
                foreach($maha as $mahas){
                    if($mahas->id > $max){
                        $max=$mahas->id;
                    }
                }
                return $max;
            }
            $IDmax=maxID();
            $IDmax=$IDmax+1;
    
            try{
            $mhs = new Mahasiswa;
            $mhs->id = $IDmax;
            $mhs->name = $request->nama;
            $mhs->nim = $request->nim;
            $mhs->email = $request->email;
            $mhs->dosen_wali = $request->dosen_wali;
            $mhs->password = Hash::make($request->password);
            $mhs->status = -1;  //statusnya menunggu validasi
            $cek2 = $mhs->save();
            if($cek2){
                return redirect('/mahasiswa/login')->with('sukses','Berhasil Ditambahkan! Silahkan Login');
                //Harusnya langsung login
            }

            }catch(Exception $exception){
            throw new CustomException($exception->getMessage());
            }
    


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Guest  $guest
     * @return \Illuminate\Http\Response
     */
    public function show(Guest $guest)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Guest  $guest
     * @return \Illuminate\Http\Response
     */
    public function edit(Guest $guest)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Guest  $guest
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Guest $guest)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Guest  $guest
     * @return \Illuminate\Http\Response
     */
    public function destroy(Guest $guest)
    {
        //
    }
}

// php artisan vendor:publish --provider="RealRashid\SweetAlert\SweetAlertServiceProvider