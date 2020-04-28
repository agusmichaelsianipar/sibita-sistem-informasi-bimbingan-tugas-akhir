@extends('dosen.main_dosbing')
@section('title','VALIDASI | SISTEM INFORMASI BIMBINGAN TUGAS AKHIR')

@section('beranda')
  <div class="container">
      @php($attr =null)
        @if((Auth::user()->email==$judul->cadosbing11)&&($judul->statusdosbing11==null))
          @php($atr = 'dosbing11')
        @elseif((Auth::user()->email==$judul->cadosbing12)&&($judul->statusdosbing12==null))
          @php($atr = 'dosbing12')
        @elseif(Auth::user()->email==$judul->cadosbing13)
          @php($atr = 'dosbing13') 
        @endif
      @php($attr ='status'.$atr)

      @php($attr2 =null)
      @if($judul->judul2)
        @if((Auth::user()->email==$judul->cadosbing21)&&($judul->statusdosbing21==null))
          @php($atr2 = 'dosbing21')
        @elseif((Auth::user()->email==$judul->cadosbing22)&&($judul->statusdosbing22==null))
          @php($atr2 = 'dosbing22')
        @elseif((Auth::user()->email==$judul->cadosbing23)&&($judul->statusdosbing22==null))
          @php($atr2 = 'dosbing23')
        @endif
      @php($attr2 ='status'.$atr2)
      @endif
      
      <div class="row row-cols-1 row-cols-md-2">
  <div class="col mb-4">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">{{$judul->judul1}}</h5>
          <p class="card-text">{{$judul->desjudul1}}</p>
        <h6 class="card-subtitle mb-2 text-muted">{{$judul->email}}</h6>
          <h6 class="card-subtitle mb-2 text-muted">{{$attr}}</h6>
          <div class="btn-group mr-2" role="group" aria-label="Basic example">
          <form action="/dosen/judul/{{$judul->id}}/validasi/{{$attr}}/{{$status=1}}" method="post">
            {{ csrf_field() }}
            <div class="btn btn-success d-inline">
              <button class="btn btn-succes btn-sm">Setuju</button>
            </div>    
            </form>
          </div>  
          <div class="btn-group mr-2" role="group" aria-label="Basic example">
            <form action="/dosen/judul/{{$judul->id}}/validasi/{{$attr}}/{{$status=0}}" method="post">
            {{ csrf_field() }}
            <div class="btn btn-danger d-inline">
              <button class="btn btn-succes btn-sm">Tidak Setuju</button>
            </div>    
            </form>
          </div>          
      </div>
    </div>
  </div>
      @if($judul->judul2)
      <div class="col mb-4">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">{{$judul->judul2}}</h5>
        <p class="card-text">{{$judul->desjudul2}}</p>
        <h6 class="card-subtitle mb-2 text-muted">{{$judul->email}}</h6>
          <h6 class="card-subtitle mb-2 text-muted">{{$attr2}}</h6>
          @if($judul->$attr2==null)
          <div class="btn-group mr-2" role="group" aria-label="Basic example">
          <form action="/dosen/judul/{{$judul->id}}/validasi/{{$attr2}}/{{$status=1}}" method="post">
              {{ csrf_field() }}
              <div class="btn btn-success d-inline">
                <button class="btn btn-succes btn-sm">Setuju</button>
              </div>    
            </form>
            </div>
          <div class="btn-group mr-2" role="group" aria-label="Basic example">
            <form action="/dosen/judul/{{$judul->id}}/validasi/{{$attr2}}/{{$status=0}}" method="post">
              {{ csrf_field() }}
              <div class="btn btn-danger d-inline">
                <button class="btn btn-succes btn-sm">Tidak Setuju</button>
              </div>    
            </form>   
            </div>
            @else
          <div class="btn-group mr-2" role="group" aria-label="Basic example">
            <form action="" method="post">
              {{ csrf_field() }}
              <div class="btn btn-danger d-inline">
                <button class="btn btn-info btn-sm" disabled>Menunggu Persetujuan Koordinator TA</button>
              </div>    
            </form>
          @endif
      </div>
    </div>
  </div>
      @endif
    </div>

</div>
@endsection


