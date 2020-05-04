@extends('dosen.main_dosbing')
@section('title','MAHASISWA | SIBITA')

@section('beranda')
<div class="container">
<div class="table-responsive">
  <table class="table table-bordered">
    <thead>
        <tr>
          <th scope="col">N0</th>
          <th scope="col">NAMA</th>
          <th scope="col">NIM</th>
          <th scope="col">Dosen Wali</th>
          <th scope="col">Semester</th>
          <th scope="col">Aksi</th>
        </tr>
    </thead>
    <tbody>
      <tr>
      <th scope="row">1</th>
        <td>Agus Keren</td>
        <td>Kepo Bat Sih</td>
        <td>Dosen Paling Keren</td>
        <td>7</td>
        <td><input type="checkbox"></td>
      </tr>
    </tbody>
    
  </table>
</div>
</div>
@endsection