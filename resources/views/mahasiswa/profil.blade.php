@extends('mahasiswa.main_mahasiswa')
@section('title','PROFILE | SISTEM INFORMASI BIMBINGAN TUGAS AKHIR')

@section('beranda')

<div class="container">
    <h4>Profil</h4>
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
                <td class="col-sm-3 text-right" scope="row">NIM</td>
                <td class="col-sm-9">{{$datum['nim']}}</td>
            </tr>
            <tr>
                <td class="col-sm-3 text-right" scope="row">Dosen Wali</td>
                <td class="col-sm-9">{{$datum['dosen_wali']}}</td>
            </tr>
            <tr>
                <td class="col-sm-3 text-right" scope="row">Dosbing I</td>
                <td class="col-sm-9">{{$datum['dosbing_1']}}</td>
            </tr>
            <tr>
                <td class="col-sm-3 text-right" scope="row">Dosbing II</td>
                <td class="col-sm-9">{{$datum['dosbing_2']}}</td>
            </tr>
        </tbody>

    </table>
</div>
@endsection