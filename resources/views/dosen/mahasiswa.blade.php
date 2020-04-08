@extends('dosen.main_dosbing')
@section('title','Mahasiswa | Sibita')

@section('beranda')
@foreach($mahasiswas as $mahasiswa)
<div class="mahasiswas-container">
    <div class="mahasiswa-card">
        <div class="mcard-name">
            {{$mahasiswa['name']}}
        </div>
    </div>
</div>
@endforeach



@endsection
