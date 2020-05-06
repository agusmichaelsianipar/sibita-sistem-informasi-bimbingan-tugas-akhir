@extends('dosen.main_dosbing')
@section('title')
Dasbor Koordinator | SISTEM INFORMASI BIMBINGAN TUGAS AKHIR'
@endsection
@section('beranda')

<div class="container">
    @if($popMsg)
    <div class="alert alert-danger">
        {{$popMsg}}
    </div>
    @endif
    
    <div class="">
        <div class="row mx-2 my-0">
            <div class="col mx-2 my-0">
                <div class="row mx-2 my-0">
                    <div class="col mx-2 my-0">
                        <h5>
                            Dasbor Koordinator TA
                        </h5>
                    </div>
                </div>
            </div>
        </div>
        <div class="row m-2">
            <div class="col m-2">
                <div class="row m-2">
                    <div class="col sm">
                        <div class="card mb-1 ">
                            <div class="card-body mx-2 p-3 ">
                            @if ($pengaturan==FALSE)
                                <div class="text-center text-danger">
                                    Tidak Ada Masa TA yang Berlaku
                                </div>
                            @else
                                <div class="container row m-0">
                                    <div class="col m-0">
                                        <table class="table sm p-1">
                                            <thead>
                                                <tr class="p-1">
                                                    <td>Mulai</td>
                                                    <td>Selesai</td>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr class="p-1">
                                                    <td>{{$pengaturan['start']}}</td>
                                                    <td>{{$pengaturan['end']}}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="col">

                                    </div>
                                </div>
                            @endif
                            </div>
                            <a href="{{route('koorta.setup')}}">
                                <div class="card-header p-2 text-white bg-secondary">
                                    Pengaturan Masa TA
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row m-2">
            <!--kiri-->
            <div class="col m-2 text-center">
                <div class="row m-2">
                    <div class="col-sm float-left">
                        <!-- Permintaan Validasi -->
                        <div class="card mb-1">
                            <div class="card-body">
                                {{$countPermohonanValidasi}}
                            </div>
                            <a href="{{route('koorta.validregist')}}">
                                <div class="card-header bg-light">
                                    Permohonan Validasi Akun
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-sm  float-left">
                        <!-- Notif Mahasiswa tertolak --
                        <div class="card mb-1">
                            <div class="card-body">
                                <br>
                            </div>
                            <div class="card-header bg-light">
                                Mahasiswa Tertolak
                            </div>
                        </div>
                        --> 
                    </div>
                </div>
                <div class="row m-2">
                    <div class="col-sm float-left">
                        <!-- Permintaan Sidang -->
                        <div class="card mb-1">
                            <div class="card-body">
                                {{$countPengSidang}}
                            </div>
                            <a href="{{route('koorta.sidang')}}">
                                <div class="card-header bg-light">
                                    Permohonan Sidang
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-sm float-left">
                        <!-- Permintaan Seminar -->
                        <div class="card mb-1">
                            <div class="card-body">
                                {{$countPengSeminar}}
                            </div>
                            <a href="{{route('koorta.seminar')}}">
                                <div class="card-header bg-light">
                                    Permohonan Seminar
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="row m-2">
                    <div class="col-sm  float-left">
                        <!-- Notif Mahasiswa suspend --
                        <div class="card mb-1">
                            <div class="card-body">
                                <br>
                            </div>
                            <div class="card-header bg-light">
                                Mahasiswa Suspend
                            </div>
                        </div-->
                    </div>
                </div>
            </div>
            <!--kanan-->
            <div class="col m-2">
                <div class="col-sm  float-left">
                    @include('fitur.pemberitahuan')
                </div>
            </div>
        </div>
    </div>

    



    <!-- Notif Pengajuan Seminar/Sidang -->

</div>
    
        
@endsection