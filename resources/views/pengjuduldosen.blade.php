@extends('dosen.main_dosbing')
@section('title','JUDUL | SISTEM INFORMASI BIMBINGAN TUGAS AKHIR')

@section('beranda')
<div class="container">
<h2 class="jud">Data Mahasiswa Yang Mengajukan Judul dan Dosen Pembimbing</h2>
@foreach($nama as $name)
    @if(Auth::user()->email==$name->cadosbing11&&$name->statusdosbing11==null)
      @php($atr = 'cadosbing11')
    @elseif(Auth::user()->email==$name->cadosbing12)
      @php($atr = 'cadosbing12')
    @elseif(Auth::user()->email==$name->cadosbing13)
      @php($atr = 'cadosbing13')
    @endif
@endforeach

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
      @foreach($nama as $nam =>$n)
      <tr>
      <th scope="row">{{$nomor++}}</th>
        <td>{{$n->name}}</td>
        <td>{{$n->judul1}}</td>
        <td>        
          @if(!$n->judul2)
            -
          @else
            {{$n->judul2}}
          @endif</td>
        <td><a href="/dosen/judul/{{$n->id}}" class="btn btn-info btn-sm">Detail</a></td>
      </tr>
      @endforeach      
    </tbody>
  </table>
</div>
</div>
@endsection