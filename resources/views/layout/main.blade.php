<html>
    <head>
        <title>@yield('title')</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="{!! asset('assets/css/berandastyle.css') !!}">
    <script src="https://kit.fontawesome.com/b3830587bc.js" crossorigin="anonymous"></script>
    </head>
    <body>
        <div class="container">
        <div class="wrapjudul">
            <div class="logo">
                    <img class="atas" src="{!! asset('assets/image/logo-itera.png') !!}" alt="">
                </div>
                <div class="judul">
                <p class="top-title">SISTEM INFORMASI BIMBINGAN TUGAS AKHIR</p>
                <p class="top-title-2">PROGRAM STUDI TEKNIK INFORMATIKA</p>
                <p class="top-title-3">INSTITUT TEKNOLOGI SUMATERA</p>
                </div>
        </div>
        </div>

    @yield('bar')

    @yield('containing')

    </body>
</html>