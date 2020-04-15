@extends('superadmin.main_superadmin')
@section('title','ADMIN | SISTEM INFORMASI BIMBINGAN TUGAS AKHIR')

@section('beranda')
<h2>Atur Koordinator Tugas Akhir</h2>
<br>

<div class="tabled">
@foreach($dosen as $dosbing)
    <div class="nomordosen">
        {{$nomor++}}
    </div>
    <div class="nama">
        {{$dosbing->name}}
    </div>
    <div class="koorta">
        @if($dosbing->status)
            Koordinator TA
        @else
            Dosen Pembimbing
        @endif
    </div>
    <div class="setkoorta">
        @if($dosbing->status)
        <form action="/superadmin/aturkoorta/{{$dosbing->id}}" method="post">
            {{ method_field('patch') }}
            {{ csrf_field() }}        
            <button class="btn btn-danger btn-sm">Unset Koordinator TA</button>
        </form>
        @else
        <form action="/superadmin/aturkoorta/{{$dosbing->id}}" method="post">
            {{ method_field('patch') }}
            {{ csrf_field() }}  
        <button class="btn btn-success btn-sm">Set Sebagai Koordinator TA</button>
        </form>
        @endif
        
    </div>
    <br>    
@endforeach

@endsection