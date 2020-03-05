@extends('layout/main')

@section('title','SISTEM INFORMASI BIMBINGAN TUGAS AKHIR')

@section('containing')
    <div class="kotak_login">
        <p class="login_label">SIBITA LOGIN</p>
        <form>
            <div class="form-group">
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Email">
                <small id="emailHelp" class="form-text text-muted">Make sure you're email is a registered email.</small>
            </div>
            <div class="form-group">
                <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
            </div>
            <br>
            <center>
                <button type="submit" class="btn btn-primary">LOGIN</button>
            </center>
        </form>
        <p class="label_l_password"><a href="#" class="label_l_password">Lupa Password</a></p>
    </div>
    @endsection