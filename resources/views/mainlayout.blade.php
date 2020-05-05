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
        <link href="{!! asset('assets/css/mahasiswa.css') !!}" rel="stylesheet" type="text/css">
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
    </div>

    </div>

@yield('beranda')
    </body>
</html>