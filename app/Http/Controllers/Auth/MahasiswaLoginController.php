<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Controllers\Controller;
use Auth;
class MahasiswaLoginController extends Controller
{
    public function __construct(){
        $this->middleware('guest:mahasiswa',['except'=>['logout']]);
    }

    public function showLoginForm(){
        if(session('gagal')){
            Alert::error('Login Gagal','Terdapat Kesalahan Pada Email atau Password Anda');
        }
        if(session('sukses')){
            Alert::success('Sukses Daftar','Berhasil Ditambahkan! Silahkan Login');
        }

        return view('auth.mahasiswa-login');

    }
    public function login(Request $request){
        //Validate the form data
        $this->validate($request, [
            'email' => 'required|email',
            'password'=>'required|min:9'
        ]);
        
        //Attempt to log the user in
        if(Auth::guard('mahasiswa')->attempt(['email'=>$request->email,'password'=>$request->password],$request->remember)){
        //If Succesfull, then redirect to their intended location
        return redirect()->intended(route('mahasiswa.dashboard'));
        }

        //If Unsuccesfull, then redirect back to the login with the form data
        return redirect()->back()->withInput($request->only('email','remember'))->with('gagal','Gagal Ditambahkan!');
    }

    public function logout()
    {
        Auth::guard('mahasiswa')->logout();

        return redirect('/');
    }
}
