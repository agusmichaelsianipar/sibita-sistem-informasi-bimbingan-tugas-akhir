@extends('main_mahasiswa')
@section('title','PROFILE | SISTEM INFORMASI BIMBINGAN TUGAS AKHIR')

@section('beranda')
<h2>Ini Profil Mahasiswa</h2>

<div class="panel-body">
    Hello {{Auth::user()->name}}
</div>
@endsection