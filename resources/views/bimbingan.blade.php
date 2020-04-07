@extends('main_mahasiswa')
@section('title','KENDALI BIMBINGAN | SISTEM INFORMASI BIMBINGAN TUGAS AKHIR')

@section('beranda')
<h2>Kartu Kendali Bimbingan</h2>
<hr>

<div class="container">

        @foreach($kartuBimbingans as $kartuBimbingan)
        <div class="container-fluid kartu-bimbingan">
            <div class="judul-kartu" data-toggle="collapse" data-target="#kb{{$kartuBimbingan['id']}}">
                <h5>{{$kartuBimbingan['judul_bimbingan']}}</h5>
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
                                <div class="subm-link">
                                    <a href="{{$submission['link']}}" target="blank">
                                        <div >
                                            {{$submission['link_name']}}
                                        </div>
                                    </a>
                                </div>
                                <div class="clickAble subm-edt" data-toggle="collapse" data-target="#edtSubm{{$submission['id']}}">
                                    Edit
                                </div>
                                <div class="subm-edt">
                                    |
                                </div>
                                <div class="subm-edt clickAble" onclick="if(confirm('Yakin ingin menghapus submission ini?')) document.getElementById('submHapus{{$submission['id']}}').submit()">
                                    <form hidden action="{{route('mahasiswa.hapusSubmission')}}" method="POST" id="submHapus{{$submission['id']}}">
                                        {{ csrf_field() }}
                                        <Input type="hidden" name="txtSubmId" value="{{$submission['id']}}">        
                                    </form>
                                    Delete
                                </div>
                                <div class="collapse subm-link" id="edtSubm{{$submission['id']}}">
                                    <form action="{{route('mahasiswa.editSubmission')}}" method="post" id="mhsEdtSubm{{$submission['id']}}">
                                        {{ csrf_field() }}
                                        <input type="hidden" name="txtBimbinganParent" value="{{$kartuBimbingan['id']}}">
                                        <label for="txtLink">Link: </label>
                                        <input class="form-control" type="text" name="txtLink" id="txtLink">
                                        <label for="txtLinkName">Nama:</label>
                                        <input class="form-control" type="text" name="txtLinkName" id="txtLinkText">
                                        <div class="subm-edt clickAble" data-toggle="collapse" data-target="#edtSubm{{$submission['id']}}">
                                            Batal
                                        </div>
                                        <div class="subm-edt">
                                            |
                                        </div>
                                        <div class="subm-edt clickAble" onClick="document.getElementById('mhsEdtSubm{{$submission['id']}}').submit()">
                                            Kirim
                                        </div>
                                    </form>
                                </div>
                            </div>
                            @endforeach
                            
                            <div class="subm-box">
                                <div class="clickAble" data-toggle="collapse" data-target="#adSubm{{$kartuBimbingan['id']}}">
                                    Tambah Link
                                </div>
                                <div class="collapse" id="adSubm{{$kartuBimbingan['id']}}">
                                    <form action="{{route('mahasiswa.tambahSubmission')}}" method="post" id="bimbAddSubm{{$kartuBimbingan['id']}}">
                                        {{ csrf_field() }}
                                        <input type="hidden" name="txtBimbinganOwner" value="{{$kartuBimbingan['id']}}">
                                        <label for="txtLink">Link: </label>
                                        <input class="form-control" type="text" name="txtLink" id="txtLink">
                                        <label for="txtLinkName">Nama:</label>
                                        <input class="form-control" type="text" name="txtLinkName" id="txtLinkText">
                                        <div class="subm-edt clickAble" data-toggle="collapse" data-target="#adSubm{{$kartuBimbingan['id']}}">
                                            Batal
                                        </div>
                                        <div class="subm-edt">
                                            |
                                        </div>
                                        <div class="subm-edt clickAble" onClick="document.getElementById('mhsAddSubm{{$kartuBimbingan['id']}}').submit()">
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