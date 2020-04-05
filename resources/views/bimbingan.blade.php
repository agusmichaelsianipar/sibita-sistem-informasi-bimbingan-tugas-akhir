@extends('main_mahasiswa')
@section('title','KENDALI BIMBINGAN | SISTEM INFORMASI BIMBINGAN TUGAS AKHIR')

@section('beranda')
<h2>Kartu Kendali Bimbingan</h2>
<hr>

<div class="container">

        @foreach($daftarBimbingan as $daftar)
        <div class="container-fluid kartu-bimbingan">
            <div class="judul-kartu" data-toggle="collapse" data-target="#kb{{$daftar['id']}}">
                <h5>{{$daftar['judul']}}</h5>
            </div>
            <div class="konten-bimbingan collapse" id="kb{{$daftar['id']}}">
                <div>
                    <div class="kb-s1">
                        <div class="kb-ch1">Waktu Bimbingan:
                            <p>
                                {{$daftar['waktu']}}
                            </p>
                        </div>
                        <div class="kb-ch1">Dosen pembimbing:
                            <p>
                                {{$daftar['dosen']}}
                            </p>
                        </div>
                    </div>
                    <div class="kb-s2">
                        <div class="kb-ch2">Catatan bimbingan:
                            <p>
                                {{$daftar['catatan']}}
                            </p> 
                        </div>
                    </div>
                    <div>
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
                                <div class="subm-edt" onclick="editLink()">
                                    Edit
                                </div>
                                <div class="subm-edt notClickable">
                                    |
                                </div>
                                <div class="subm-edt" onclick="hapusLink(this)">
                                    Delete
                                </div>
                            </div>
                            @endforeach
                            <button type="button" onclick="tambahLink(this)">
                                Tambah Link
                            </button>
                            
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
     
        @endforeach

</div>

<script type="text/javascript">
    function tambahLink(tombol){
        console.log("Menambah Link");

        submHolder = tombol.parentElement;
        tombol.remove();

        submHolder.innerHTML = submHolder.innerHTML + (
            "<div class='subm-box'>"+
                "<label for='txtLink'>Link: </label>"+
                "<input class='form-control' type='text' id='txtLink'>"+
                "<label for='txtLinktext'>Label: </label>"+
                "<input class='form-control' type='text' id='txtLinktext'>"+
                "<div class='subm-edt' onclick=tambahLinkOk(this)>"+
                    "Ok" +
                "</div>"+
                "<div class='subm-edt notClickable'>"+
                    " | " +
                "</div>"+
                "<div class='subm-edt' onClick=tambahLinkCancel(this)>"+
                    "Cancel" +
                "</div>"+
            "</div>"
        );

    }
    
    function tambahLinkCancel(object){
        console.log("Menambah Link Dibatalkan");

        submBox = object.parentElement;
        submHolder = submBox.parentElement;

        submBox.remove();

        submHolder.innerHTML = submHolder.innerHTML + (
                            "<button type='button' onclick='tambahLink(this)'>"+
                                "Tambah Link"+
                            "</button>"
        );
    }

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

    function tambahLinkOk(box){
        //code Here
        console.log("Link Ditambah");
        link = box.parentNode.getElementsByTagName('input')[0].value;
        label = box.parentNode.getElementsByTagName('input')[1].value;
        box.parentElement.innerHTML = (""+
                                "<div class='subm-link'>"+
                                    "<a href='"+link+"' target='blank'>"+
                                        "<div >"+
                                            label+
                                        "</div>"+
                                    "</a>"+
                                "</div>"+
                                "<div class='subm-edt' onclick='editLink()'>Edit</div>" +
                                "<div class='subm-edt notClickable'> | </div>" +
                                "<div class='subm-edt' onclick='hapusLink()'>Delete</div>"
            );


        submHolder.parentElement.innerHTML += "<button type='button' onclick='tambahLink(this)'>Tambah Link</button>";
    }
</script>
@endsection

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

