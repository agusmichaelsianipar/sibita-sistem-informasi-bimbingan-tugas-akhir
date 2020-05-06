@extends('dosen.main_dosbing')
@section('title')
Setup Masa TA | SISTEM INFORMASI BIMBINGAN TUGAS AKHIR'
@endsection
@section('beranda')

<div class="container">
    <h4>Setup Masa TA</h4>
    @if($popMsg)
    <div class="alert alert-danger">
        {{$popMsg}}
    </div>
    @endif
    <div class="container">
        <form  method="POST" action="{{route('koorta.setmasa')}}">
            {{ csrf_field() }}
        <table class="table" style="max-width: 600px">
            <tr>
                <th scope="row">Nama masa</th>
                <td>
                    <input class="" type="text" name="nama" id="nama" placeholder="Masa TA 2019/2020">
                </td>
            </tr>
            <tr>
                <th scope="row">Waktu Mulai</th>
                <td>
                    <input type="date" name="start" id="start">
                </td>
            </tr>
            <tr>
                <th scope="row">Waktu Selesai</th>
                <td>
                    <input class="" type="date" name="end" id="end" >
                </td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <button class="btn btn-primary" type="submit">Simpan</button>
                </td>
            </tr>
        </table>
        </form>
    </div>
</div>
    
        
@endsection