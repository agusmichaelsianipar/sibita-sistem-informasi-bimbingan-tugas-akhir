<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>SIBITA | SISTEM INFORMASI BIMBINGAN TUGAS AKHIR</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link href="{!! asset('assets/css/welcome.css') !!}" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css2?family=Capriola&display=swap" rel="stylesheet">  
        <script>
        var jumboHeight = $('.jumbotron').outerHeight();
            function parallax(){
                var scrolled = $(window).scrollTop();
                $('.bg').css('height', (jumboHeight-scrolled) + 'px');
            }

            $(window).scroll(function(e){
                parallax();
            });

        </script>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    </head>
    <body>
        <div class="container">
        <div class="bg"></div>
    <div class="jumbo affix">
      <h1>SIBITA ITERA</h1>
      <p class="lead">SISTEM INFORMASI BIMBINGAN TUGAS AKHIR<br>INSTITUT TEKNOLOGI SUMATERA</p>
            <div class="dosen">
            <a href="{{ route('dosen.login') }}" class="button2">DOSEN</a>
            </div>
    </div>

    <div class="keterangan">
            <div class="logo">
                <img class="center" src="{!! asset('assets/image/logo-itera.png') !!}">
            </div>
            <div class="daftar">
            <a href="/daftarta" class="button1">DAFTAR</a>
            </div>
            <div class="deskripsi">
                Selamat Datang Di SIBITA <br>
                Sistem Informasi Bimbingan Tugas Akhir Adalah Media <br> yang Mempertemukan 
                Mahasiswa dan Dosen Secara Daring dan memfasilitas Dosen dan Mahasiswa
                melakukan bimbingan secara Daring.  
            </div>
            <div class="login">
            <a href="{{ route('mahasiswa.login') }}" class="button1">MASUK</a>
            </div>
    </div>
    </div>
    <br><br><br><br><br><br><br><br><br><br><br><br><br>

            </div>
            @if (Route::has('login'))
                <div class="top-right links">
                    @if (Auth::check())
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('mahasiswa.login') }}">Login</a>
                        <a href="#">Register</a>
                        <!-- {{ url('/register') }} -->
                        <!-- @endif
                </div>
            @endif

        </div>  -->
    </body>
</html>
