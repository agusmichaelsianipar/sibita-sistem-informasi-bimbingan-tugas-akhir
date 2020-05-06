@extends('dosen.main_dosbing')
@section('title','Ajukan Seminar | SISTEM INFORMASI BIMBINGAN TUGAS AKHIR')

@section('beranda')

<div class="container">
    <div>
        <h5>Status pengajuan</h5>
        @if($popMsg)
        <div class="alert alert-{{$popLevel}}">
            {{$popMsg}}
        </div>
        @endif
        <hr>
        <div class="card mb-1" style="max-width:800px">
            <div class="card-body" >
                <table class="table table-md table-md-responsive m-0">
                    <tbody>
                        <tr>
                            <td class="col-sm-3 text-right" scope="row">Nama Mahasiswa</td>
                            <td class="col-sm-9">{{$pengajuan['namaMhs']}}</td>
                        </tr>
                        <tr>
                            <td class="col-sm-3 text-right" scope="row">Tanggal Pengajuan</td>
                            <td class="col-sm-9">{{$pengajuan['tanggal']}}</td>
                        </tr>
                        <tr>
                            <td class="col-sm-3 text-right" scope="row">Jenis Pengajuan</td>
                            <td class="col-sm-9">
                                @if($pengajuan['jenis']==1)
                                    Seminar
                                @elseif($pengajuan['jenis']==2)
                                    Sidang
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td class="col-sm-3 text-right" scope="row">Status Pengajuan</td>
                            <td class="col-sm-9">
                                @if($pengajuan['status']==0)
                                    Menunggu
                                @elseif($pengajuan['status']==1)
                                    Disetujui
                                @elseif($pengajuan['status']==-1)
                                    Ditolak
                                @elseif($pengajuan['status']==2)
                                    Selesai
                                @endif
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <!--div class="card-header bg-light">
            </div-->
        </div>
    </div>
</div>
    
        
@endsection