@extends('dosen.main_dosbing')
@section('title')
Ajukan {{$tipePengajuan}} | SISTEM INFORMASI BIMBINGAN TUGAS AKHIR'
@endsection

@section('beranda')

<div class="container">
    @if($popMsg)
    <div class="alert alert-danger">
        {{$popMsg}}
    </div>
    @endif
    <div>
        <h6>Mengajukan mahasiswa berikut untuk melakukan {{$tipePengajuan}}.</h6>
        <div class="card mb-1" style="max-width:500px">
            <div class="card-body" >
                <table class="table table-md table-md-responsive m-0">
                    <tbody>
                        <tr>
                            <td>Nama </td>
                            <td>{{$mahasiswa['name']}}</td>
                        </tr>
                        <tr>
                            <td>NIM </td>
                            <td>{{$mahasiswa['nim']}}</td>
                        </tr>
                        <tr>
                            <td>Judul TA </td>
                            <td>{{$mahasiswa['judul']}}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <form action="{{route('dosen.ajukanSemSed')}}" class="d-none" method="POST" id="ajukan{{$tipePengajuan}}Btn">
                {{ csrf_field() }}
                <input type="hidden" name="emailMhs" value="{{$mahasiswa['email']}}">
                <input type="hidden" name="emailDosen" value="{{Auth::user()->email}}">
                <input type="hidden" name="actionName" value="{{$tipePengajuan}}">
            </form>
            <div class="card-header bg-light">
                <button type="button" class="btn btn-sm float-right m-1" style="background-color:#67b2b8" onclick="document.getElementById('ajukan{{$tipePengajuan}}Btn').submit()">
                    Ajukan
                </button>
                <a href="{{route('dosen.mahasiswa')}}">
                    <div type="button" class="btn btn-sm float-right m-1" style="background-color:#dc6595">
                        Batal
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>
    
        
@endsection