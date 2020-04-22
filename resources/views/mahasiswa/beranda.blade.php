@extends('mahasiswa.main_mahasiswa')
@section('title','BERANDA | SISTEM INFORMASI BIMBINGAN TUGAS AKHIR')

@section('beranda')
<div class="container">
    <div class="">
        <div class="row m-2 text-center">
            <div class="col-sm float-left">
                <div class="card mb-1">
                    <div class="card-body">
                        Hari <br>
                        30/50 <br>
                    </div>
                    <div class="card-header bg-light">
                        Waktu TA
                    </div>
                </div>
            </div>
            <div class="col-sm  float-left">
                <div class="card mb-1">
                    <div class="card-body">
                        {{$status}}
                    </div>
                    <div class="card-header bg-light">
                        Status
                    </div>
                </div>
            </div><div class="col-sm  float-left">
                <div class="card mb-1">
                    <div class="card-body">
                        <br>
                        {{$bimbingan}}
                    </div>
                    <div class="card-header bg-light">
                        Bimbingan
                    </div>
                </div>
            </div>
        </div>
        <div class="row m-2">
            <div class="col-sm  float-left">
                @include('fitur.pemberitahuan')
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
                'label': 'Progress Bimbingan',
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