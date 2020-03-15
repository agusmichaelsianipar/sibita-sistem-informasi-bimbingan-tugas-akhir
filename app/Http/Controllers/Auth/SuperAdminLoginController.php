<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

class SuperAdminLoginController extends Controller
{
    public function __construct(){
        $this->middleware('guest:super_admin');
    }
    public function showLoginForm(){
        return view('auth.superadmin-login');
    }

    public function login(Request $request){
        //Validate the form data
        $this->validate($request,[
            'email'     => 'required|email',
            'password'  => 'required|min:8'
        ]);

        //Attempt to log the user in
        
        if (Auth::guard('super_admin')->attempt(['email'=>$request->email,'password'=>$request->password],$request->remember)) {
        //if successful, then redirect to their located intended
            return redirect()->intended(route('superadmins.dashboard'));            
        }

        //if unsuccesful, then redirect back to the login with the form data
        return redirect()->back()->withInput($request->only('email','remember'));
    }
}
