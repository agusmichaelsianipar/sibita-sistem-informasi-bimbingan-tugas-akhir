@extends('mahasiswa.main_mahasiswa')
@section('title','BERANDA | SISTEM INFORMASI BIMBINGAN TUGAS AKHIR')

@section('beranda')
<div class="container">
    <div class="">
        <div class="row m-2 text-center">
            <div class="col-sm float-left">
                <div class="card mb-1">
                    <div class="card-body">
                        <div>Hari</div>
                        <div  id="waktuTAV"></div>
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
                    <div class="card-body" id="jmlBimbinganV">
                        <div id="jmlBimbinganV">{{$bimbingan}}</div>
                        <div>Kartu</div>
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
    
    
    durasiB+bulanMulai

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

    data=undefined;
</script>
@endsection