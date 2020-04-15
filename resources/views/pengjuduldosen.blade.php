@extends('main_dosbing')
@section('title','JUDUL | SISTEM INFORMASI BIMBINGAN TUGAS AKHIR')

@section('beranda')
<h2>Data Mahasiswa Yang Mengajukan Judul dan Dosen Pembimbing</h2>

<!-- @foreach($nama as $nam =>$n)
{{$n->name}}
@endforeach -->

<div class="table-responsive">
  <table class="table">
    <thead>
        <tr>
        <th scope="col">No</th>
        <th scope="col">Nama</th>
        <th scope="col">Email</th>
        <th scope="col">Judul</th>
        <th scope="col">Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($nama as $nam =>$n)
    <tr>
      <th scope="row">{{$nomor++}}</th>
        <td>{{$n->name}}</td>
      <td>{{$n->email}}</td>
      <td>{{$n->judul1}}</td>
      <td><a href="/dosen/judul/{{$n->id}}" class="btn btn-info btn-sm">Detail</a></td>
    </tr>
        @endforeach      
  </tbody>
  </table>
</div>
@endsection