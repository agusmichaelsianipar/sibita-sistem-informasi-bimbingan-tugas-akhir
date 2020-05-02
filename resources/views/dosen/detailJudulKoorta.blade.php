@extends('dosen.main_dosbing')
@section('title','JUDUL | SISTEM INFORMASI BIMBINGAN TUGAS AKHIR')

@section('beranda')
<div class="container">
    <div class="row row-cols-1 row-cols-md-2">
        <div class="col mb-4">
            <div class="card">
                @foreach($mahasiswa as $mhs)
                    <div class="card-body">
                        <form action="">
                        {{ csrf_field() }}
                            <div class="form-group">
                                <input disabled type="text" class="form-control" id="nama" value="{{$mhs->name}}" name="nama">
                            </div>
                            <div class="form-group">
                                <input disabled type="text" class="form-control" id="nim" value="{{$mhs->nim}}" name="nim">
                            </div>
                            <div class="form-group">
                                <input disabled type="text" class="form-control" id="dosenwali" value="{{$mhs->dosen_wali}}" name="dosenwali">
                            </div>
                            <div class="form-group">
                                <input disabled type="text" class="form-control" id="judul1" value="{{$judul->judul1}}" name="judul_1">
                            </div>
                            <div class="form-group">
                                <textarea class="form-control" id="deskripsi_judul-1" rows="4" name="deskripsi_judul_1" disabled>{{$judul->desjudul1}}</textarea>
                            </div>
                            <div class="row">
                                <div class="form-group col">
                                    <input disabled type="text" class="form-control" id="cadosbing11" value="{{$judul->cadosbing11}}" name="cadosbing11">
                                </div>
                                <div class="form-group col">
                                    @if($judul->statusdosbing11)
                                        <span class="badge badge-success">Disetujui</span>
                                    @else
                                        <span class="badge badge-danger">Tidak Disetujui</span>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col">
                                    <input disabled type="text" class="form-control" id="cadosbing12" value="{{$judul->cadosbing12}}" name="cadosbing12">
                                </div>
                                <div class="form-group col">
                                    @if($judul->statusdosbing12)
                                        <span class="badge badge-success">Disetujui</span>
                                    @else
                                        <span class="badge badge-danger">Tidak Disetujui</span>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col">
                                    <input disabled type="text" class="form-control" id="cadosbing13" value="{{$judul->cadosbing13}}" name="cadosbing13">
                                </div>
                                <div class="form-group col">
                                    @if($judul->statusdosbing13)
                                        <span class="badge badge-success">Disetujui</span>
                                    @else
                                        <span class="badge badge-danger">Tidak Disetujui</span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <input disabled type="text" class="form-control" id="judul2" value="{{$judul->judul2}}" name="judul_2">
                            </div>
                            <div class="form-group">
                                <textarea class="form-control" id="deskripsi_judul_2" rows="4" name="deskripsi_judul_2" disabled>{{$judul->desjudul2}}</textarea>
                            </div>
                            <div class="row">
                                <div class="form-group col">
                                    <input disabled type="text" class="form-control" id="cadosbing21" value="{{$judul->cadosbing21}}" name="cadosbing21">
                                </div>
                                <div class="form-group col">
                                    @if($judul->statusdosbing21)
                                        <span class="badge badge-success">Disetujui</span>
                                    @else
                                        <span class="badge badge-danger">Tidak Disetujui</span>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col">
                                    <input disabled type="text" class="form-control" id="cadosbin22" value="{{$judul->cadosbing22}}" name="cadosbing22">
                                </div>
                                <div class="form-group col">
                                    @if($judul->statusdosbing22)
                                        <span class="badge badge-success">Disetujui</span>
                                    @else
                                        <span class="badge badge-danger">Tidak Disetujui</span>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col">
                                    <input disabled type="text" class="form-control" id="cadosbing23" value="{{$judul->cadosbing23}}" name="cadosbing23">
                                </div>
                                <div class="form-group col">
                                    @if($judul->statusdosbing23)
                                        <span class="badge badge-success">Disetujui</span>
                                    @else
                                        <span class="badge badge-danger">Tidak Disetujui</span>
                                    @endif
                                </div>
                            </div>

                        </form>
                    </div>     
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection