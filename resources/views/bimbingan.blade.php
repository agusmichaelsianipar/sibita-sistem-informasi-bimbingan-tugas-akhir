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
                    <div>Waktu Bimbingan:
                        <p>
                            {{$daftar['waktu']}}
                        </p>
                    </div>
                    <div>Dosen pembimbing:
                        <p>
                            {{$daftar['dosen']}}
                        </p>
                    </div>
                    <div>Catatan bimbingan:
                        <p>
                            {{$daftar['catatan']}}
                        </p> 
                    </div>
                </div>
                <div>
                    <div>
                        Submission 1 
                        <button type="button" onclick="tambahLink()">
                            Tambah Link
                        </button>
                    </div>
                </div>
            </div>
        </div>
     
        @endforeach

</div>

<script type="text/javascript">
    function tambahLink(){
        alert('link!');
    }
</script>
@endsection