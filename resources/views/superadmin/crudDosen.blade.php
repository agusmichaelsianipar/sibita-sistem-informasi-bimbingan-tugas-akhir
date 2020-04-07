@extends('superadmin.main_superadmin')
@section('title','ADMIN | SISTEM INFORMASI BIMBINGAN TUGAS AKHIR')

@section('beranda')
<h2>Data Dosen Pembimbing</h2>
<div class="tabled">
@foreach($dosen as $dosbing)
    <div class="nama">
        {{$dosbing->name}}
    </div>
    <div class="emaildosen">
        {{$dosbing->email}}
    </div>
    <div class="statusdosen">
        @if($dosbing->status)
            Koordinator TA
        @else
            Dosen Pembimbing
        @endif
    </div>
    <div class="editdosen">
        <span class="badge badge-success">Edit</span>
    </div>
    <div class="hapusdosen">
        <span class="badge badge-danger">Hapus</span>
    </div>
@endforeach
</div>
<div class="tambahdosen">
    <button type="button" class="btn btn-primary">
    <i class="fas fa-plus" style="color:black;"></i>  Tambah Dosen 
    </button>
</div>
@endsection