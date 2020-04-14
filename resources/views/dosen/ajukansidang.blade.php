@extends('dosen.main_dosbing')
@section('title','Ajukan Sidang | SISTEM INFORMASI BIMBINGAN TUGAS AKHIR')

@section('beranda')

<div class="container">
    @if($popMsg)
    <div class="alert alert-danger">
        {{$popMsg}}
    </div>
    @endif
    <h4>
        Mengajukan Sidang Mahasiswa
    </h4>
    <h4>
        This feature is coming soon
    </h4>
    <p>
        Data mahasiswa:
        @if($mahasiswa)
            @foreach($mahasiswa as $field)
                <br>{{$field}}
            @endforeach
        @endif
    </p>
</div>
    
        
@endsection