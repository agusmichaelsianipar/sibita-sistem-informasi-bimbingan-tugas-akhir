@extends('dosen.main_dosbing')
@section('title','Mahasiswa | Sibita')

@section('beranda')


<div class="container">
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
    
                </td>
                <td>
    
                </td>
            </tr>    
            @endforeach
        </tbody>
    </table>

</div>




@endsection
