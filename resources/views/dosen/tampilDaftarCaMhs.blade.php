@extends('dosen.main_dosbing')
@section('title','MAHASISWA | SIBITA')

@section('beranda')
<div class="container">
  <h4>Pengajuan Mengikuti TA / Validasi akun mahasiswa</h4>
  <hr>
  <form method="post">
    {{ csrf_field() }}
<div class="table-responsive">
  <table class="table table-bordered">
    <thead>
        <tr>
          <th scope="col">N0</th>
          <th scope="col">NAMA</th>
          <th scope="col">NIM</th>
          <th scope="col">Dosen Wali</th>
          <th scope="col">Semester</th>
          <th scope="col">Aksi<br><input type="checkbox" class="selectall"></th>
        </tr>
    </thead>
    <tbody>
    @foreach($guest as $tamu)
      <tr>
      <th scope="row">{{$nomor++}}</th>
        <td>{{$tamu->nama}}</td>
        <td>{{$tamu->nim}}</td>
        <td>{{$tamu->dosenwali}}</td>
        <td>{{$tamu->semester}}</td>
        <td><input type="checkbox" name="ids[]" class="selectbox" value="{{$tamu->id}}"></td>
      </tr>
      @endforeach
    </tbody>
    <tfoot>
      <tr>
        <th scope="col">N0</th>
        <th scope="col">NAMA</th>
        <th scope="col">NIM</th>
        <th scope="col">Dosen Wali</th>
        <th scope="col">Semester</th>
        <th scope="col"><input type="checkbox" class="selectall2"></th>
      </tr>
    </tfoot>
  </table>
  <button id="tbl" class="btn btn-primary" formaction="/dosen/koordinator/validasidaftar">ACC</button>
</div>
</form>
</div>
@endsection