<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <title>@yield('title')</title>

        <!-- Bootstrap -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

        <!-- Fontawesome Icon's  -->
        <script src="https://kit.fontawesome.com/b3830587bc.js" crossorigin="anonymous"></script>
        <link href="https://fonts.googleapis.com/css2?family=Capriola&display=swap" rel="stylesheet">
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>

        <!-- Custom CSS -->
        <link rel="stylesheet" type="text/css" href="{!! asset('assets/css/berandastyle.css') !!}">
        <link rel="stylesheet" type="text/css" href="{!! asset('assets/css/mahasiswa.css') !!}">
    </head>
    <body>
    
    <div class="wrapper">
    <div class="bgmhs"></div>
        <!-- Sidebar Holder -->
        <nav id="sidebar">
            <div class="sidebar-header">
                <h3>SIBITA MAHASISWA</h3>
            </div>

            <ul class="list-unstyled components">
                <li>
                    <a href="{{ route('mahasiswa.beranda') }}">Beranda</a>
                </li>
                <hr>
                @if (Auth::user()->status != -1)
                    @if (Auth::user()->status==2)
                    <li>
                        <a href="{{ route('mahasiswa.bimbingan') }}">Buku Kendali Bimbingan</a>
                    </li>    
                    @elseif(Auth::user()->status==1 || Auth::user()->status==0)
                    <li>
                        <a href="{{ route('mahasiswa.judul') }}">Pengajuan Judul</a>
                    </li>
                    @endif
                @endif
                <hr>
                <li>
                    <a href="{{ route('mahasiswa.profil') }}">Profil</a>
                </li>
                <li>
                <a href="{{ route('mahasiswa.logout') }}">
                    Sign Out
                </a>
                </li>
            </ul>
        </nav>

    <div id="content">

<nav class="navbar navbar-expand-lg navbar-light">
    <div class="container-fluid">
        <button type="button" id="sidebarCollapse" class="navbar-btn">
            <span></span>
            <span></span>
            <span></span>
        </button>

        <div class="container">
            <div class="logo">
                <img class="atas" src="{!! asset('assets/image/logo-itera.png') !!}" alt="">
            <div class="judul">
                <p class="top-title">SISTEM INFORMASI BIMBINGAN TUGAS AKHIR</p>
                <p class="top-title-2">PROGRAM STUDI TEKNIK INFORMATIKA</p>
                <p class="top-title-3">INSTITUT TEKNOLOGI SUMATERA</p>
            </div>
            </div>
        </div>
    </div>
    
</nav>


@yield('beranda')
    <!-- jQuery CDN - Slim version (=without AJAX) -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <!-- Popper.JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>

    <script type="text/javascript">
        $(document).ready(function () {
            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');
                $(this).toggleClass('active');
            });
        });
    </script>
    </body>
</html>
