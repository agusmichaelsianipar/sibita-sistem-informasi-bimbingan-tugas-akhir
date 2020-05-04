@if(isset($notif))
<div class="card bg-light mb-1">
    <div class="card-header btn bg-light text-left">
        Pemberitahuan 
        <span class="  border rounded-pill px-2
                    @if($notif->count()!=0)
                        bg-info text-white
                    @endif">
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
                    <input type="hidden" name="from" value="mahasiswa.dashboard">
                </form>
                <form id="del{{$pemberitahuan['id']}}"
                        class="d-none"
                        action="/notif/destroy/{{$pemberitahuan->id}}"
                        method="post">
                    {{ method_field('patch') }}
                    {{ csrf_field() }}
                    <input type="hidden" name="from" value="mahasiswa.dashboard">
                </form>
                <div class="col-10 m-0 p-0 btn-sm">
                    <small>{{$pemberitahuan->created_at}}</small>
                </div>
                <div class="col-1 m-0 p-0 btn btn-sm
                    @if($pemberitahuan->pin==1)
                            bg-success text-white
                    @endif" 
                    onclick="document.getElementById('pin{{$pemberitahuan->id}}').submit()">
                    <small>pin</small>
                </div>
                <div role="button" class="col-1 m-0 p-0 clickAble btn btn-sm"
                    onclick="document.getElementById('del{{$pemberitahuan->id}}').submit()">
                    <small>del</small>
                </div>
            </div>
            <div class="row m-0 p-0">
                <a href="{{$pemberitahuan->notif_goto}}" target="_self">
                    {{$pemberitahuan->notif_text}}
                </a>
            </div>
        </li>
        @endforeach
    </ul>
</div>
@endif