@extends('dosen.main_dosbing')
@section('title','PROFIL | SISTEM INFORMASI BIMBINGAN TUGAS AKHIR')

@section('beranda')
@if (session('status'))
    <div class="alert alert-danger">
        {{ session('status') }}
    </div>
@endif
<div class="container">
    <h4>Profil Dosen</h4>
    <hr>
    <table class="table table-sm-responsive" style="overflow-x:auto; max-width:500px">
        <tbody>
            <tr>
                <td class="col-sm-3 text-right" scope="row">E-mail</td>
                <td class="col-sm-9">{{Auth::user()->email}}</td>
            </tr>
            <tr>
                <td class="col-sm-3 text-right" scope="row">Nama</td>
                <td class="col-sm-9">{{Auth::user()->name}}</td>
            </tr>
            <tr>
                <td class="col-sm-3 text-right" scope="row">Status</td>
                <td class="col-sm-9">{{$datum['status']}}</td>
            </tr>
        </tbody>

    </table>
</div>

@endsection