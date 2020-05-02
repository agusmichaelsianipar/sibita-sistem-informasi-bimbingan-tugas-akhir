@extends('dosen.main_dosbing')
@section('title','JUDUL MAHASISWA | SIBITA')

@section('beranda')
<h4>DATA JUDUL MAHASISWA</h4>
<h4>YANG MENGAJUKAN JUDUL</h4>
<div class="container">
<div class="table-responsive">
  <table class="table">
    <thead>
        <tr>
          <th scope="col">No</th>
          <th scope="col">Nama</th>
          <th scope="col">Judul 1</th>
          <th scope="col">Judul 2</th>
          <th scope="col">Aksi</th>
        </tr>
    </thead>
    <tbody>
    @foreach($nama as $judul)
      <tr>
      <th scope="row">{{$nomor++}}</th>
        <td>{{$judul->name}}</td>
        <td>{{$judul->judul1}}</td>
        <td>{{$judul->judul2}}</td>
        <td><a href="/dosen/koordinator/detail/{{$judul->id}}" class="btn btn-info btn-sm">Detail</a></td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
</div>
@endsection