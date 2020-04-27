@extends('dosen.main_dosbing')
@section('title','PROFIL | SISTEM INFORMASI BIMBINGAN TUGAS AKHIR')

@section('beranda')
<div class="container">
    <h3>Profil</h3>
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