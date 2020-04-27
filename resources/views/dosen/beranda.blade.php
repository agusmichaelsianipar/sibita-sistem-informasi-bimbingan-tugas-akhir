@extends('dosen.main_dosbing')
@section('title','BERANDA | SISTEM INFORMASI BIMBINGAN TUGAS AKHIR')

@section('beranda')
@if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif
<div class="container">
    <div class="">
        <div class="row m-2 text-center">
            <div class="col-sm float-left">
                <div class="card mb-1">
                    <div class="card-body">
                        <br>
                        {{$jmlPemohon}}
                        <br>
                    </div>
                    <div class="card-header bg-light">
                        Permohonan
                    </div>
                </div>
            </div>
            <div class="col-sm  float-left">
                <div class="card mb-1">
                    <div class="card-body">
                        <br>
                        {{$jmlMhs}}
                        <br>
                    </div>
                    <div class="card-header bg-light">
                        Mahasiswa Aktif
                    </div>
                </div>
            </div><div class="col-sm  float-left">
                <div class="card mb-1">
                    <div class="card-body">
                        <div>Hari</div>
                        <div id="waktuTAV"></div>
                    </div>
                    <div class="card-header bg-light">
                        Waktu TA
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

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
<script src="{!! asset('assets/js/Chart.bundle.js') !!}"></script>
<script src="{!! asset('assets/js/Chart.bundle.min.js') !!}"></script>
<script type="text/javascript">
    var masaTA = {!!json_encode($masaTA)!!};
    masaTA = JSON.parse(masaTA);
    
    //Setup Variable
    waktuSekarang = new Date();
    waktuMulai = new Date(Date.parse(masaTA.mulai));
    waktuSelesai = new Date(Date.parse(masaTA.selesai));
    durasiT = waktuSelesai.getYear()-waktuMulai.getYear();
    durasiB = (waktuSelesai.getMonth()-waktuMulai.getMonth()) + durasiT*12;
    bulanMulai = waktuMulai.getMonth();


    //Setup window Waktu TA
    $("#waktuTAV").text(function(){
        return (Math.round((waktuSekarang-waktuMulai)/86400000)).toString()+" / ".toString()+
                (Math.round((waktuSelesai-waktuMulai)/86400000)).toString();
    });


    //setup Chart
    listBulan=['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul',
                'Agu', 'Sep', 'Okt', 'Nov', 'Des'];
    
    
    bimbTimes = {!!json_encode($bimbinganTimes)!!};
    
    bimbTimes.forEach((e, i) => {
        bimbTimes[i] = [parseInt(e.split('-')[0]), parseInt(e.split('-')[1])];
    });
    
    tmpBimb = [];
    for(i=0; i<=bimbTimes[bimbTimes.length-1][0]-bimbTimes[0][0]; i++){
        tmpBimbT = [];
        bimbTimes.forEach(e => {
            if(e[0]==bimbTimes[i][0]){
                tmpBimbT.push(e);

            }
        });
        tmpBimb.push(tmpBimbT);

    }
    tmpBimbNew = [];
    for(i=0; i<tmpBimb.length; i++){
        tmpBimbNew = tmpBimbNew.concat(tmpBimb[i]);
    }

    jmlPBln = [];
    for(i=bulanMulai; i<=durasiB+bulanMulai; i++){
        jmlPBln.push([i,0]);
    }

    for(i=0; i<jmlPBln.length; i++){
        for(j=0; j<tmpBimbNew.length; j++){
            if(jmlPBln[i][0]==tmpBimbNew[j][1]){
                jmlPBln[i][1]++;
            }
        }
    }

    chartData = [];
    for(i=0; i<jmlPBln.length; i++){
        chartData.push(jmlPBln[i][1]);
    }

    chartLabel=[''];
    for(b=bulanMulai; b<=durasiB+bulanMulai; b++){
        chartLabel.push(listBulan[b%12]);
    }

    var ctx = document.getElementById('progresMhs');
    var myChart = new Chart(ctx, {
        type: 'line',
        data: {
            'labels':chartLabel,
            'datasets':[{
                'label': 'Progress Bimbingan',
                'data': chartData,
                'fill': false,
                'borderColor': 'rgb(75, 100, 100)',
                'lineTension': 0.1
            }]
        },
        options: {}
    });
</script>

@endsection