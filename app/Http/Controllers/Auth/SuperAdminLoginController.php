<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
class SuperadminLoginController extends Controller
{
    public function __construct(){
        $this->middleware('guest:superadmin');
    }

    public function showLoginForm(){
        return view('auth.superadmin-login');
    }

    public function login(Request $request){

        //Validate the form data
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);
        //Attempt to log the user in
        if(Auth::guard('superadmin')->attempt(['email'=>$request->email,'password'=>$request->password],$request->remember)){
            //If succesfull, then redirect to their intended location
            return redirect()->intended(route('superadmin.dashboard'));
        }

        //If unsuccesfull, then redirect back to the login with the form data
        return redirect()->back()->withInput($request->only('email','remember'));


    }
}
