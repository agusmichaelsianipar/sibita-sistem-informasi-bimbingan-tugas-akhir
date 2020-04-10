@extends('dosen.main_dosbing')
@section('title','Mahasiswa | Sibita')

@section('beranda')


<div class="container">
    @if(session('popMsg'))
        <div class="alert alert-danger">
            {{session('popMsg')}}
        </div>
    @endif
    <table class="table table-hover">
        <thead>
            <tr>
                <th>
                    No
                </th>
                <th>
                    Nama
                </th>
                <th>
                    Status & Pemberitahuan
                </th>
                <th>
                    Aksi
                </th>
            </tr>
        </thead>
        
        <tbody>
            @foreach($mahasiswas as $mahasiswa)
            <tr>
                <td>
                    {{$counter++}}
                </td>   
                <td>    
                    {{$mahasiswa['name']}}
                </td> 
                <td>
                    @if(is_null($mahasiswa['judul']))
                    <span class="status pengajuan">
                        Pengajuan
                    </span>
                    @else
                    <span class="status melaksanakan">
                        Melaksanakan TA
                    </span>
                    @endif
                </td>
                <td>
                    @if(is_null($mahasiswa['judul']))
                    <div class="btn btn-info m-1 p-1 btn-sm text-left cekPengajuan">
                        Cek Pengajuan
                    </div>
                    @else
                    <a href="/dosen/membimbing/yan@localhost.co">
                        <div class="btn btn-primary m-1 p-1 btn-sm text-left" onclick="this.parentElement.submit()">
                            Bimbingan
                        </div>
                    </a>
                    <a href="/dosen/ajukanseminar/yan@localhost.co">
                        <div class="btn btn-primary m-1 p-1 btn-sm text-left" onclick="this.parentElement.submit()">
                            Seminar
                        </div>
                    </a>
                    <a href="/dosen/ajukansidang/yan@localhost.co">
                        <div class="btn btn-primary m-1 p-1 btn-sm text-left" onclick="this.parentElement.submit()">
                            Sidang
                        </div>
                    </a>
                    @endif
                </td>
            </tr>    
            @endforeach
        </tbody>
    </table>

</div>




@endsection


<script>
    window.setTimeout(function(){
        $(".alert")[0].classList.add('collapse');
    }, 10000);
</script> 
