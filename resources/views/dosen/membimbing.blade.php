@extends('dosen.main_dosbing')
@section('title','Halaman Bimbingan Mahasiswa | SISTEM INFORMASI BIMBINGAN TUGAS AKHIR')

@section('beranda')

<div class="container infoBoxHolder">
    <h3>Bimbingan Mahasiswa</h3>
    <div class="bimbingan-mhsInfo">
        <div class="infoBox">
            <div class="">Nama
                <p>
                    {{$mahasiswa['name']}}
                </p>
            </div>
            <div class="">NIM
                <p>
                    {{$mahasiswa['nim']}}
                </p>
            </div>
            <div class="">Judul TA
                <p>
                    {{$mahasiswa['judul']}}
                </p>
            </div>
        </div>
        <div class="infoBox" >
            <div class="">Dosen wali
                <p>
                    {{$mahasiswa['dosen_wali']}}
                </p>
            </div>
            <div class="">Dosen pembimbing TA
                <p>
                    @foreach($dosbing as $dos)
                        Dosbing I: {{$dos['name']}} <br>
                    @endforeach
                </p>
            </div>
        </div>
        
    </div>
</div>


<div class="container kartuBimbinganBox">
    <table class="table table-hover table-borderless" id="tabelKartuBimbingan">
        <thead class="table-bordered">
            <tr>
                <th>
                    Kartu Bimbingan
                </th>
                <th>
                    <div data-toggle="collapse" data-target="#formKartuBaru" class="btn btn-primary btn-sm text-left d-inline-block float-right" onclick="buatKartuBtnToggle(this)">
                            Buat kartu
                    </div>
                </th>
                <script>
                    function buatKartuBtnToggle(a){
                        if(a.innerText==="Buat kartu"){
                            a.classList.remove("btn-primary");
                            a.classList.add("btn-secondary");
                            a.innerText = "Batal buat kartu"
                        }else if(a.innerText==="Batal buat kartu"){
                            a.classList.remove("btn-secondary");
                            a.classList.add("btn-primary");
                            a.innerText = "Buat kartu"
                        }
                    }
                </script>    
            </tr>
        </thead>
        <tbody>
            <tr class="m-0 p-0" >
                <td class="p-0 m-0" colspan="2">
                    <div class="container-fluid kartu-bimbingan collapse m-1 p-1" id="formKartuBaru">
                        <form action="{{route('dosen.tambahKartu')}} " method="POST">
                            {{ csrf_field() }}
                            <div class="form-group container d-inline-block o-hidden">
                                <input type="hidden" name="emailMhs" value="{{$mahasiswa['email']}}">
                                <input type="submit" value="Simpan Kartu" class="btn btn-primary btn-sm text-left float-right" onclick="">
                            </div>
                            <div class="form-group m-1 p-1">
                                <label for="newJudulKartu">Judul Bimbingan: </label>
                                <input class="form-control" type="text" name="txtNewJudulKartu" id="newJudulKartu">
                            </div>
                            <div class="form-group m-1 p-1">
                                <label for="newCatatanBimbingan">Catatan bimbingan:</label>
                                <textarea class="form-control" id="newCatatanBimbingan" name="txtNewCatatanKartu" rows="5"></textarea>
                            </div>
                        </form>
                    </div>
                </td>
            </tr>
            @foreach($kartuBimbingans as $kartuBimbingan)
                <tr class="m-auto">
                <td colspan="2" class="p-1">
                    <div class="container-fluid kartu-bimbingan p-1" >
                        <div class="judul-kartu overflow-hidden" data-toggle="collapse" data-target="#kb{{$kartuBimbingan['id']}}" >
                            <div class="d-inline p-auto m-1 float-left">
                                <h5 >{{$kartuBimbingan['judul_bimbingan']}}</h5>
                            </div>
                            <div class="d-inline p-auto m-1 float-right" data-toggle="" data-target="">
                                <form action="{{route('dosen.hapusKartu')}}" method="POST">
                                    {{method_field('delete')}}
                                    {{csrf_field()}}
                                    <input type="hidden" name="emailMhs" value="{{$mahasiswa['email']}}">
                                    <input type="hidden" name="idKartu" value="{{$kartuBimbingan['id']}}">
                                    <div class="btn btn-danger btn-sm text-left " onClick="if(confirm('Konfirmasi menghapus kartu bimbingan'))this.parentElement.submit()">
                                        Hapus
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="konten-bimbingan collapse" id="kb{{$kartuBimbingan['id']}}">
                            <div>
                                <div class="kb-s1">
                                    <div class="kb-ch1">Waktu Bimbingan:
                                        <p>
                                            {{$kartuBimbingan['waktu_bimbingan']}}
                                        </p>
                                    </div>
                                    <div class="kb-ch1">Dosen pembimbing:
                                        <p>
                                            {{$kartuBimbingan['dosen_bimbingan']}}
                                        </p>
                                    </div>
                                </div>
                                <div class="kb-s2">
                                    <div class="kb-ch2">Catatan bimbingan:
                                        <p>
                                            {{$kartuBimbingan['catatan_bimbingan']}}
                                        </p> 
                                    </div>
                                </div>
                                <div class="kb-s2">
                                    Sisipan:
                                    <div id="subm-holder1">
                                        <!--
                                            Loop kalau sudah ada sisipan
                                        -->                
                                        @foreach($kartuBimbingan['submissions'] as $submission)
                                        <div class="subm-box">
                                            <div>
                                                <div class="subm-link">
                                                    <a href="{{$submission['link']}}" target="blank">
                                                        <div >
                                                            {{$submission['link_name']}}
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </td>    
                </tr>
            @endforeach
        </tbody>
    </table>
</div>


@endsection