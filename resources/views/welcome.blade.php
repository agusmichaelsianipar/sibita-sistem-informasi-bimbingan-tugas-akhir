@extends('mainlayout')

@section('beranda')
        <div class="container">
        <div class="dosen">
            <a href="{{ route('dosen.login') }}" class="button2">DOSEN</a>
            </div>
    <div class="keterangan">
            <div class="daftar">
            <a href="/daftarta" class="button1">DAFTAR</a>
            </div>
            <div class="logoo">
                <img class="centerr" src="{!! asset('assets/image/logo-itera.png') !!}">
            </div>
            <div class="deskripsi">
                Selamat Datang Di SIBITA <br>
                Sistem Informasi Bimbingan Tugas Akhir Adalah Media <br> yang Mempertemukan 
                Mahasiswa dan Dosen Secara Daring dan memfasilitas Dosen dan Mahasiswa
                melakukan bimbingan secara Daring.  
            </div>
            <div class="login">
            <a href="{{ route('mahasiswa.login') }}" class="button1">MASUK</a>
            </div>
    </div>
    </div>
    <br><br><br><br><br><br><br><br><br><br><br><br><br>

            <!-- </div>
            @if (Route::has('login'))
                <div class="top-right links">
                    @if (Auth::check())
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('mahasiswa.login') }}">Login</a>
                        <a href="#">Register</a> -->
                        <!-- {{ url('/register') }} -->
                        <!-- @endif
                </div>
            @endif

        </div>  -->
@endsection