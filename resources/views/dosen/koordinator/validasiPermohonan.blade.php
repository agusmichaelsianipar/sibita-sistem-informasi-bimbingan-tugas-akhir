@extends('dosen.main_dosbing')
@section('title','MAHASISWA | SIBITA')

@section('beranda')
<div class="container">
    <h4>
        {{$title}}
    </h4>
    <form method="post">
        {{ csrf_field() }}
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                    <th scope="col">No</th>
                    <th scope="col">Mahasiswa</th>
                    <th scope="col">Dosen Pengaju</th>
                    <th scope="col">Aksi<br><input type="checkbox" class="selectall"></th>
                    </tr>
                </thead>
                <tbody>
                @foreach($pengajuan as $pengaju)
                    <tr>
                        <th scope="row">{{$nomor++}}</th>
                        <td>{{$pengaju->mahasiswa}}</td>
                        <td>{{$pengaju->dosen}} </td>
                        <td><input type="checkbox" name="ids[]" class="selectbox" value="{{$pengaju->id}}"></td>
                    </tr>
                @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th scope="col">N0</th>
                        <th scope="col">NAMA</th>
                        <th scope="col">Dosen Pengaju</th>
                        <th scope="col"><input type="checkbox" class="selectall2"></th>
                    </tr>
                </tfoot>
            </table>
            <label for="dateInput">Waktu Pelaksanaan</label>
            <input class="" type="date" name="waktuPelaksanaan" id="dateInput">
            <button id="tbl" class="btn btn-primary" formaction="/dosen/koordinator/konfirmasisemsid">ACC</button>
        </div>
    </form>
</div>
@endsection