@extends('mahasiswa.main_mahasiswa')
@section('title','PROFILE | SISTEM INFORMASI BIMBINGAN TUGAS AKHIR')

@section('beranda')

<div class="container">
    <h4>Profil 
        @if($datum['rule']==='mahasiswa')
            Mahasiswa
        @elseif($datum['rule']==='dosen')
            Dosen Pembimbing
        @endif
    </h4>
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
            @includeWhen($datum['rule']==='mahasiswa', 'mahasiswa.profiledata', ['mahasiswa' => $datum['profile']])
            @includeWhen($datum['rule']==='dosen', '', ['dosen' => $datum['profile']])

        </tbody>
    </table>
</div>
@endsection