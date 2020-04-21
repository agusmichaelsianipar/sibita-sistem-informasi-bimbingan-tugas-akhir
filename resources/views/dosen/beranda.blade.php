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
                        <span class="bg-light border rounded-pill px-2">
                            {{$notif->count()}}
                        </span>
                    </div>
                    <ul class="list-group list-group text-dark overflow-auto" id="listNotif" style="max-height: 300px;">
                        @foreach($notif->get()->sortByDesc('pin') as $pemberitahuan)
                        <li class="list-group-item container">
                            <div class="row m-0 p-0">
                                <form id="pin{{$pemberitahuan['id']}}"
                                        class="d-none"
                                        action="/notif/pin/{{$pemberitahuan->id}}"
                                        method="post">
                                    {{ method_field('patch') }}
                                    {{ csrf_field() }}
                                    <input type="hidden" name="from" value="dosen.dashboard">
                                </form>
                                <form id="del{{$pemberitahuan['id']}}"
                                        class="d-none"
                                        action="/notif/destroy/{{$pemberitahuan->id}}"
                                        method="post">
                                    {{ method_field('patch') }}
                                    {{ csrf_field() }}
                                    <input type="hidden" name="from" value="dosen.dashboard">
                                </form>
                                <div class="col-10 m-0 p-0 btn-sm">
                                    <small>{{$pemberitahuan->created_at}}</small>
                                </div>
                                <div class="col-1 m-0 p-0 btn btn-sm
                                    @if($pemberitahuan->pin==1)
                                            bg-success text-white
                                    @endif" 
                                    onclick="document.getElementById('pin{{$pemberitahuan->id}}').submit()">
                                    <small>p</small>
                                </div>
                                <div role="button" class="col-1 m-0 p-0 clickAble btn btn-sm"
                                    onclick="document.getElementById('del{{$pemberitahuan->id}}').submit()">
                                    <small>x</small>
                                </div>
                            </div>
                            <div class="row m-0 p-0">
                                <a href="{{$pemberitahuan->notif_goto}}" target="_self">
                                    {{$pemberitahuan->notif_text}}
                                </a>
                            </div>
                        </li>
                        @endforeach
                        <li class="list-group-item container">
                            
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