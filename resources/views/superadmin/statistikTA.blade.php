@extends('superadmin.main_superadmin')
@section('title','ADMIN | SISTEM INFORMASI BIMBINGAN TUGAS AKHIR')

@section('beranda')

<div section="container mw-75">
    <h3>Statistik pelaksanaan TA</h3>

    <div class="infoBox card bg-light m-1">
        <div class="card-header">
            Informasi Mahasiswa
        </div>
        <div class="card-body">
            <h5 class="card-title">Jumlah peserta aktif</h5>    
            <p class="card-text">
                Jumlah peserta aktif: {{$data['mahasiswa']['jumlahPeserta']}}
            </p>
        </div>
    </div>

    <div class="infoBox card bg-light m-1">
        <div class="card-header">
            Informasi Dosen Pembimbing
        </div>
        <div class="card-body">
            <h5 class="card-title">Jumlah dosen pembimbing</h5>    
            <p class="card-text">
                Jumlah dosen pembimbing: {{$data['dosen']['jumlahDosen']}}
            </p>
        </div>
    </div>

</div>
@endsection