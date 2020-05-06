<?php

namespace App\Http\Controllers;

use App\MasaTA;
use Illuminate\Http\Request;

class MasaTAController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:dosen');
    }

    public function setmasa(Request $request)
    {
        if($this->isAvailable()){
            return redirect()->route('koorta.dasborKoorta')->with([
                'popMsg' => 'Terdapat masa TA yang sedang berlangsung'
            ]);
        }

        $this->validate($request,[
            'nama' => 'required',
            'start' => 'required',
            'end' => 'required'
        ]);

        $a = new MasaTA;
        $a->nama = $request['nama'];
        $a->mulai = $request['start'];
        $a->selesai = $request['end'];
        $a->status = 1;
        $a->save();

        return redirect()->route('koorta.dasborKoorta')->with([
            'popMsg' => 'Berhasil menambahkan masa TA',
            'popMsgLv' => 'alert-success'
        ]);
    }


    public function interface()
    {
        if($this->isAvailable()){
            return redirect()->route('koorta.dasborKoorta')->with([
                'popMsg' => 'Terdapat masa TA yang sedang berlangsung'
            ]);
        }

        return view('dosen.koordinator.setupTa')->with([
            'popMsg' => FALSE,
        ]);
    }

    public function isAvailable(){
        return (MasaTA::where('status', '1')->first() == null)? FALSE : 
                TRUE;
    }

    public function getStartDate()
    {
        return (MasaTA::where('status', '1')->first() == null)? 0 : 
                (MasaTA::where('status', '1')->first()->mulai);
    }

    public function getEndDate()
    {
        return (MasaTA::where('status', '1')->first() == null)? 0 : 
                (MasaTA::where('status', '1')->first()->selesai);
    }
}
