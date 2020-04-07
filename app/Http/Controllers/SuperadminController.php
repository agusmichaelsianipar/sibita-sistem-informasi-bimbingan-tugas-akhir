<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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

    public function aturKoorTA(){
        return view('superadmin.updateKoorTA');
    }
}
