<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>DETAIIL JUDUL</title>
  </head>
  <body>
  <div class="container">
  {{$judul}}
      @if($judul->statusjudul1==null)
        @if(Auth::user()->email==$judul->cadosbing11)
          @php($atr = 'dosbing11')
        @elseif(Auth::user()->email==$judul->cadosbing12)
          @php($atr = 'dosbing12')
        @elseif(Auth::user()->email==$judul->cadosbing13)
          @php($atr = 'dosbing13') 
        @endif
      @endif
      @php($attr ='status'.$atr)
    <div class="card" style="width: 18rem;">
      <div class="card-body">
          <h5 class="card-title">{{$judul->judul1}}</h5>
          <h6 class="card-subtitle mb-2 text-muted">{{$judul->email}}</h6>
          <h6 class="card-subtitle mb-2 text-muted">{{$attr}}</h6>
          {{$attr}}
          <p class="card-text">{{$judul->des_judul1}}</p>
          <a href="/dosen/judul/{{$judul->id}}/validasi/{{$attr}}" class="card-link">Setuju</a>
          <a href="/dosen/judul/{{$judul->id}}/validasi" class="card-link">Tidak Setuju</a>
      </div>
      @if($judul->judul2)
    <div class="card " style="width: 18rem;">
      <div class="card-body">
          <h5 class="card-title">{{$judul->judul2}}</h5>
          <h6 class="card-subtitle mb-2 text-muted">{{$judul->email}}</h6>
          <p class="card-text">{{$judul->des_judul2}}</p>
          <a href="/dosen/judul/{{$judul->id}}/validasi/$attr" class="card-link">Setuju</a>
          <a href="/dosen/judul/{{$judul->id}}/validasi" class="card-link">Tidak Setuju</a>
      </div>
      </div>
      @endif
</div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>