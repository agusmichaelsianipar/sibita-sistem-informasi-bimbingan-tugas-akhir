<html>
    <head>
        <title>Tambah Dosen Pembimbing</title>

            <!-- Bootstrap -->
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

            <!-- Fontawesome Icon's  -->
            <script src="https://kit.fontawesome.com/b3830587bc.js" crossorigin="anonymous"></script>
            <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
            <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>
        
            <!-- Custom CSS        -->
            <link rel="stylesheet" type="text/css" href="{!! asset('assets/css/dosen.css') !!}">
    </head>
    <body>
        <div class="container">
            <br>
        <h2>Tambah Dosen Pembimbing</h2>
        <br> <br>
            <form method="post" action="{{ route('superadmin.tambahDosen') }}">
            {{ csrf_field() }}
                <div class="form-group">
                    <label for="nama">Nama Dosen</label>
                    <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan Nama Dosen">
                    @if ($errors->has('nama'))
                        <span class="text-danger">{{ $errors->first('nama') }}</span>
                    @endif                       
                </div>
                <div class="form-group">
                    <label for="email">Email Dosen</label>
                    <input type="text" class="form-control" id="email" name="email" placeholder="Masukkan Email Dosen">
                    @if ($errors->has('email'))
                        <span class="text-danger">{{ $errors->first('email') }}</span>
                    @endif                   
                </div>
                <div class="form-group">
                    <label for="password">Password Dosen</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan Password Dosen">
                    @if ($errors->has('password'))
                        <span class="text-danger">{{ $errors->first('password') }}</span>
                    @endif                   
                </div>
                <div class="form-group">
                    <label for="konfirmasi_password">Konfirmasi Password</label>
                    <input type="password" class="form-control" id="konfirmasi_password" name="konfirmasi_password" placeholder="Konfirmasi Password Dosen">
                    @if ($errors->has('konfirmasi_password'))
                        <span class="text-danger">{{ $errors->first('konfirmasi_password') }}</span>
                    @endif                   
                </div>
                <div class="form-group">
                    <label for="status">Status Dosen</label> <br>
                    <select id="status" name="status" height="100%">
                        <option value='' selected>Silahkan Tentukan Status Dosen</option>
                        <option value=0>Dosen Pembimbing</option>
                        <option value=1>Koordinator TA</option>
                    </select> <br>
                    @if ($errors->has('status'))
                        <span class="text-danger">{{ $errors->first('status') }}</span>
                    @endif                                                                
                </div>
                <div class="tombol">
                    <button type="submit" class="btn btn-outline-primary">Tambah Dosen</button>
                </div>                                
            </form>
        </div>
    </body>
</html>