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
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>

        <!-- Custom CSS -->
        <link rel="stylesheet" type="text/css" href="{!! asset('assets/css/berandastyle.css') !!}">
        <link rel="stylesheet" type="text/css" href="{!! asset('assets/css/mahasiswa.css') !!}">
        <link rel="stylesheet" type="text/css" href="{!! asset('assets/css/dosbing.css') !!}">

        <!-- Chart.js -->
        
    </head>
    <body>
    
    <div class="wrapper">
        <!-- Sidebar Holder -->
        <nav id="sidebar">
            <div class="sidebar-header">
                <h3>SIBITA DOSEN PEMBIMBING</h3>
            </div>

            <ul class="list-unstyled components">
                <li>
                    <a href="{{ route('dosen.dashboard') }}">Beranda</a>
                </li>
                <li>
                    <a href="{{ route('dosen.mahasiswa') }}">Bimbingan Mahasiswa</a>
                </li>
                <li>
                    <a href="{{ route('dosen.judul') }}">Pengajuan Judul</a>
                </li>
                @if(Auth::user()->status==1)
                <hr>
                <div class="container">
                    <small>Perangkat Koordinator</small>
                </div>
                <li>
                    <a href="{{route('koorta.pengaturanta')}}">Pengaturan Masa TA</a>
                </li>
                <li>
                    <a href="{{ route('koorta.dataregist') }}">Data Mahasiswa Pengaju TA</a>
                </li>
                <li>
                    <a href="{{ route('koorta.datajudulmhs') }}">Data Judul Mahasiswa</a>
                </li>
                @endif
                <hr>
                <li>
                    <a href="{{ route('dosen.profile') }}">Profil</a>
                </li>
                <li>
                <a href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                    Sign out
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
                </li>
            </ul>
        </nav>

    <div id="content">

<nav class="navbar navbar-expand-lg navbar-light bg-light">
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
</div>
</div>

    <!-- jQuery CDN - Slim version (=without AJAX) -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <!-- Popper.JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');
                $(this).toggleClass('active');
            });
        });

        $('.selectall').click(function(){
            $('.selectbox').prop('checked',$(this).prop('checked'));
            $('.selectall2').prop('checked',$(this).prop('checked'));
        })
        $('.selectall2').click(function(){
            $('.selectbox').prop('checked',$(this).prop('checked'));
            $('.selectall').prop('checked',$(this).prop('checked'));
        })
        $('.selectbox').change(function(){
            var total = $('.selectbox').length;
            var number = $('.selectbox.checked').length;
            if(total ==number){
                $('.selectall').prop('checked',true);
                $('.selectall2').prop('checked',true);
            }else{
                $('.selectall').prop('checked',false);
                $('.selectall2').prop('checked',false);
            }
        })
    </script>
    </body>
</html>