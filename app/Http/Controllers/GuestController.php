<?php

namespace App\Http\Controllers;

use App\Guest;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use App\Http\Requests\ErrorFormRequest;
use Illuminate\Support\Facades\Hash;

class GuestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('sign_up');
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
        $this->validate($request,[
            'nama' => 'required',
            'nim' => 'min:8|required',
            'email'=> 'required|unique:guests,email|email',
            'password' => 'min:8|required_with:pass_konfirm|same:pass_konfirm',
            'pass_konfirm' => 'min:8',
            'dosen_wali' => 'required',
            'semester' => 'required',
        ]);

        $guest = new Guest;
        $guest->nama = $request->nama;
        $guest->nim = $request->nim;
        $guest->email = $request->email;
        $guest->password = Hash::make($request->password);
        $guest->dosenwali = $request->dosen_wali;
        $guest->semester = $request->semester;

        $cek = $guest->save();

        if($cek){
            return redirect('/daftarta')->with('status','Sukses! Silahkan Menunggu Persetujuan Koordinator TA');
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
