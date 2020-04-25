@extends('superadmin.main_superadmin')
@section('title','ADMIN | SISTEM INFORMASI BIMBINGAN TUGAS AKHIR')

@section('beranda')
<h2>Data Dosen Pembimbing</h2>
@if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif
<div class="tabled">
@foreach($dosen as $dosbing)
    <div class="nomordosen">
        {{$nomor++}}
    </div>
    <div class="nama">
        {{$dosbing->name}}
    </div>
    <div class="statusdosen">
        @if($dosbing->status)
            Koordinator TA
        @else
            Dosen Pembimbing
        @endif
    </div>
    <div class="editdosen  d-inline">
        <a href="/superadmin/aturdosbing/{{$dosbing->id}}/ubah" class="btn btn-success btn-sm">Ubah</a>
    </div>    
    <form action="/superadmin/aturdosbing/{{$dosbing->id}}" method="post">
            {{ method_field('delete') }}
            {{ csrf_field() }}
    <div class="hapusdosen  d-inline">
        <button class="btn btn-danger btn-sm">Hapus</button>
    </div>    
    </form>
@endforeach
</div>
<div class="tambahdosen">
    <a class="btn btn-primary" href="{{ route('superadmin.tambahDosbing') }}" role="button"><i class="fas fa-plus"></i>   Tambah Dosen</a>
</div>
@endsection