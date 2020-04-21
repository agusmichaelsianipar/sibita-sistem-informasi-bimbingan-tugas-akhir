@extends('dosen.main_dosbing')
@section('title','BERANDA | SISTEM INFORMASI BIMBINGAN TUGAS AKHIR')

@section('beranda')

<div class="container">
    <div class="">
        <div class="row m-2 text-center">
            <div class="col-sm float-left">
                <div class="card mb-1">
                    <div class="card-body">
                        <br>
                        <h3>{{$jmlPemohon}}</h3>
                        <br>
                    </div>
                    <div class="card-header bg-light">
                        Permohonan Judul & Dosbing
                    </div>
                </div>
            </div>
            <div class="col-sm  float-left">
                <div class="card mb-1">
                    <div class="card-body">
                        <br>
                        <h3>{{$jmlMhs}}</h3>
                        <br>
                    </div>
                    <div class="card-header bg-light">
                        Mahasiswa Peserta TA Aktif
                    </div>
                </div>
            </div><div class="col-sm  float-left">
                <div class="card mb-1">
                    <div class="card-body">
                        <br>
                        <h3>{{$jmlMhs}}</h3>
                        <br>
                    </div>
                    <div class="card-header bg-light">
                        Mahasiswa Peserta TA Aktif
                    </div>
                </div>
            </div>
        </div>
        <div class="row m-2">
            <div class="col-sm  float-left">
                <div class="card bg-light mb-1">
                    <div class="card-header btn bg-light text-left">
                        Pemberitahuan
                    </div>
                    <ul class="list-group list-group text-dark overflow-auto" id="listNotif" style="max-height: 300px;">
                        <li class="list-group-item">
                            Pemberitahuan 1
                        </li>
                        <li class="list-group-item">
                            Pemberitahuan 2
                        </li>
                        <li class="list-group-item">
                                Pemberitahuan 2
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-sm  float-left">
                <div class="card bg-light">
                    <div class="card-header">
                        Progress Mahasiswa
                    </div>
                    <canvas id="progresMhs" style="max-width:600px; max-height:300px"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>


<script src="{!! asset('assets/js/Chart.bundle.js') !!}"></script>
<script src="{!! asset('assets/js/Chart.bundle.min.js') !!}"></script>
<script type="text/javascript">
    var ctx = document.getElementById('progresMhs');
    var myChart = new Chart(ctx, {
        type: 'line',
        data: {
            'labels':['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul'],
            'datasets':[{
                'label': 'Bimbingan mahasiswa',
                'data': [3, 5, 3, 6],
                'fill': false,
                'borderColor': 'rgb(75, 100, 100)',
                'lineTension': 0.1
            }]
        },
        options: {}
    });
</script>

@endsection