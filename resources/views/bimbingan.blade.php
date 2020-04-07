@extends('main_mahasiswa')
@section('title','KENDALI BIMBINGAN | SISTEM INFORMASI BIMBINGAN TUGAS AKHIR')

@section('beranda')
<h2>Kartu Kendali Bimbingan</h2>
<hr>

<div class="container">

        @foreach($daftarBimbingan as $daftar)
        <div class="container-fluid kartu-bimbingan">
            <div class="judul-kartu" data-toggle="collapse" data-target="#kb{{$daftar['id']}}">
                <h5>{{$daftar['judul_bimbingan']}}</h5>
            </div>
            <div class="konten-bimbingan collapse" id="kb{{$daftar['id']}}">
                <div>
                    <div class="kb-s1">
                        <div class="kb-ch1">Waktu Bimbingan:
                            <p>
                                {{$daftar['waktu_bimbingan']}}
                            </p>
                        </div>
                        <div class="kb-ch1">Dosen pembimbing:
                            <p>
                                {{$daftar['dosen_bimbingan']}}
                            </p>
                        </div>
                    </div>
                    <div class="kb-s2">
                        <div class="kb-ch2">Catatan bimbingan:
                            <p>
                                {{$daftar['catatan_bimbingan']}}
                            </p> 
                        </div>
                    </div>
                    <div class="kb-s2">
                        Sisipan:
                        <div id="subm-holder1">
                            <!--
                                Loop kalau sudah ada sisipan
                            -->                
                            @foreach($daftar['submissions'] as $submission)
                            <div class="subm-box">
                                <div class="subm-link">
                                    <a href="{{$submission['link']}}" target="blank">
                                        <div >
                                            {{$submission['linkname']}}
                                        </div>
                                    </a>
                                </div>
                                <div class="subm-edt clickAble" onclick="editLink()">
                                    Edit
                                </div>
                                <div class="subm-edt">
                                    |
                                </div>
                                <div class="subm-edt clickAble" onclick="hapusLink(this)">
                                    Delete
                                </div>
                            </div>
                            @endforeach
                            
                            <div class="subm-box">
                                <div class="clickAble" data-toggle="collapse" data-target="#adSubm">
                                    Tambah Link
                                </div>
                                <div class="collapse" id="adSubm">
                                    <form action="{{route('mahasiswa.tambahSubmission')}}" method="post" id="mhsAddSubm{{$mahasiswaId}}">
                                        {{ csrf_field() }}
                                        <input type="hidden" name="txtBimbinganOwner" value="{{$mahasiswaId}}">
                                        <label for="txtLink">Link: </label>
                                        <input class="form-control" type="text" name="txtLink" id="txtLink">
                                        <label for="txtLinkName">Nama:</label>
                                        <input class="form-control" type="text" name="txtLinkName" id="txtLinkText">
                                        <div class="subm-edt clickAble" data-toggle="collapse" data-target="#adSubm">
                                            Batal
                                        </div>
                                        <div class="subm-edt">
                                            |
                                        </div>
                                        <div class="subm-edt clickAble" onClick="document.getElementById('mhsAddSubm{{$mahasiswaId}}').submit()">
                                            Kirim
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    
</div>
@endsection

<script type="text/javascript">
    function ubahKeList(box){
        box = box.parentElement.parentElement;
        console.log(box);
        //link = box.innerHTML.getElementById('link');
        console.log(link);
    }
    function hapusLink(target){
        //code 
        console.log("Menghapus Link");
        if(confirm("Ingin menghapus Link?")){
            target.parentElement.remove();
        }
    }
    function editLink(){
        //code here
    }
</script>

<!--
<div class="subm-box">
                                <form action="#">
                                    <div class="subm-link">
                                        <input type="text">
                                    </div>
                                    <div class="subm-edt">
                                        <button type="button" class="button">
                                            Submit
                                        </button>
                                    </div>
                                </form>
                            </div>
-->