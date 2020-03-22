<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>SIBITA | SISTEM INFORMASI BIMBINGAN TUGAS AKHIR</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                /* background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif; 
                font-weight: 100;
                height: 100vh;
                margin: 0; */
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif; 
                font-weight: 100;
                height: 100vh;
                margin-top: 50vh;
                margin-right:-10vw;
            }

            .title {
                font-size: 44px;
                margin-top:-5vw;
            }

            .judul{
                font-size: smaller;
            }
            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
                font-family: 'Raleway', sans-serif; 
            }

            .m-b-md {
                margin-bottom: 500px;
            }
            .logo{
                float:left;
                margin-left:-15vw;
                margin-top:1vw;
            }
            .logoi{
                height:15vw;
                width:15vw;
            }
            
            .btn a{
                text-decoration:none;
                color:black;
            }
            .btn a:hover{
                text-decoration:none;
                color:black;
            }
            
        </style>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    </head>
    <body>
        <div class="flex-center position-ref full-height">
            <div class="content">
                <div class="title m-b-md">
                <div class="logo">
                <img class="logoi" src="{!! asset('assets/image/logo-itera.png') !!}" alt="">
                </div>
                <div class="judul">
                SISTEM INFORMASI BIMBINGAN TUGAS AKHIR <br>
                PROGRAM STUDI TEKNIK INFORMATIKA <br>
                INSTITUT TEKNOLOGI SUMATERA
                </div>
                <button type="button" class="btn btn-success"><a text-decoration="none" class="lgnbtn" href="{{ route('mahasiswa.login') }}"><b>LOGIN</b></a></button>
                </div>

            </div>
            @if (Route::has('login'))
                <div class="top-right links">
                    @if (Auth::check())
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('mahasiswa.login') }}">Login</a>
                        <a href="{{ url('/register') }}">Register</a>
                    @endif
                </div>
            @endif

        </div>
    </body>
</html>
