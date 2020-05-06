@extends('dosen.main_dosbing')
@section('title','Mahasiswa | Sibita')

@section('beranda')


<div class="container">
    <h4>Bimbingan Mahasiswa</h4>
    <hr>
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
                    <span class="status">
                        {{$mahasiswa['status']}}
                    </span>
                </td>
                <td>
                    @if($mahasiswa['status']=='Menunggu Persetujuan')
                    <div class="btn btn-info m-1 p-1 btn-sm text-left cekPengajuan">
                        Cek Pengajuan
                    </div>
                    @else
                    <form id="actionHandlerForm" class="d-none" action="{{route('dosen.mahasiswa.actionHandler')}}" method="POST">
                        {{ csrf_field() }}
                        <input id="actionName" type="hidden" name="actionName" value="action">
                        <input type="hidden" name="emailMhs" value="{{$mahasiswa['email']}}">
                    </form>
                    <div class="btn btn-primary m-1 p-1 btn-sm text-left"
                        onclick="{getElementById('actionName').setAttribute('value', 'bimbingan');
                                    document.getElementById('actionHandlerForm').submit();}">
                        Bimbingan
                    </div>
                    <div class="btn btn-primary m-1 p-1 btn-sm text-left"
                        onclick="{getElementById('actionName').setAttribute('value', 'seminar');
                                    document.getElementById('actionHandlerForm').submit();}">
                        Seminar
                    </div>
                    <div class="btn btn-primary m-1 p-1 btn-sm text-left"
                        onclick="{getElementById('actionName').setAttribute('value', 'sidang');
                                    document.getElementById('actionHandlerForm').submit();}">
                        Sidang
                    </div>
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
