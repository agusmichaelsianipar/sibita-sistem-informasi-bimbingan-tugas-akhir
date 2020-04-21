<?php

namespace App\Http\Controllers;

use App\notifikasi;
use Illuminate\Http\Request;

class NotifikasiController extends Controller
{
    function __construct(){

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createNotif($notif_text_, $notif_owner_, $notif_goto_)
    {
        echo ($notif_goto_);
        $notif = new notifikasi;
        $notif->notif_text = $notif_text_;
        $notif->notif_owner = $notif_owner_;
        $notif->notif_goto = $notif_goto_;

        $notif->save();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\notifikasi  $notifikasi
     * @return \Illuminate\Http\Response
     */
    public function getMyNotif($email)
    {
        return notifikasi::where('notif_owner', $email);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\notifikasi  $notifikasi
     * @return \Illuminate\Http\Response
     */
    public function destroy(notifikasi $notifikasi, Request $request)
    {
        //
        echo "Notif tobe destroyed".$notifikasi->id;
        notifikasi::destroy($notifikasi->id);

        return redirect()->route($request['from']);
    }

    public function pin(notifikasi $notifikasi, Request  $request){
        echo "Notif tobe pinned: ".$notifikasi->id;
        if($notifikasi->pin==0){
            //toggle pin status
            notifikasi::where('id', $notifikasi->id)
            ->update([
                'pin' =>1,
            ]);
        }else if($notifikasi->pin==1){
            //toggle pin status
            notifikasi::where('id', $notifikasi->id)
            ->update([
                'pin' =>0,
            ]);
        }else{
            //if not 0 or not 1, it may be null, so set pin to 1
            notifikasi::where('id', $notifikasi->id)
            ->update([
                'pin' =>1,
            ]);
        }

        return redirect()->route($request['from']);
    }
}
