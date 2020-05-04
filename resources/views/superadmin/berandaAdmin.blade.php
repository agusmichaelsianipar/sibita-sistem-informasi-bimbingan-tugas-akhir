@extends('superadmin.main_superadmin')
@section('title','ADMIN | SISTEM INFORMASI BIMBINGAN TUGAS AKHIR')

@section('beranda')
<div class="container">
@if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif
  <form method="post">
    {{ csrf_field() }}
    <div class="table-responsive">
        <table class="table table-bordered">
            <div class="tambahdosen">
                <a class="btn btn-outline-primary" href="/superadmin/tambahmahasiswa/" role="button"><i class="fas fa-plus"></i>   Tambah Mahasiswa</a>
            </div>
            <br>
            <thead>
                <tr>
                <th scope="col">NIM</th>
                <th scope="col">NAMA</th>
                <th scope="col">Dosen Wali</th>
                <th scope="col">Judul TA</th>
                <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
            @foreach($mhs as $mahasiswa)
            <tr>
                <td>{{$mahasiswa->nim}}</td>
                <td>{{$mahasiswa->name}}</td>
                <td>{{$mahasiswa->dosen_wali}}</td>
                <td>{{$mahasiswa->judul}}</td>
                <td>
                    <div class="editdosen  d-inline">
                        <a href="/superadmin/{{$mahasiswa->id}}/ubahmahasiswa" class="btn btn-success btn-sm">Ubah</a>
                    </div>
                    <form class="form-inline" action="/superadmin/{{$mahasiswa->id}}" method="post">
                        {{ method_field('delete') }}
                        {{ csrf_field() }}  
                    <div class="hapusdosen  d-inline">
                        <button scope="row" class="btn btn-danger btn-sm">Hapus</button>
                    </div>    
                    </form>
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</form>
</div>

@endsection