@extends('layout/main_dosbing')
@section('title','Sibita - Selamat datang dosen pembimbing')
@section('bar')
    <div class="navbarberanda">
        <div class="container">
            <div class="wrapbar">
                <div class="conbar">
                    <a href="{{ url('/') }}"><p><i class="fas fa-home"></i> Beranda</p></a>
                </div>
                    <div class="bartitle-2"><a href="{{ url('/sign-up') }}"><p>Sign-Up <i class="fas fa-clipboard-list"></i></p></a></div>    
                    <div class="bartitle-2"><a href="{{ url('/login') }}"><p>Sign-In <i class="fas fa-sign-in-alt"></i></p></a></div>
            </div>
        </div>

    </div>
@endsection