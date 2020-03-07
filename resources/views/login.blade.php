@extends('layout/main')
@section('title','SISTEM INFORMASI BIMBINGAN TUGAS AKHIR')
@section('bar')
    <div class="navbarberanda">
        <div class="container">
            <div class="wrapbar">
                <div class="conbar">
                <i class="fas fa-arrow-left"></i>
                </div>
                <div class="bartitle">
                    <p>SIGN-IN <i class="fas fa-sign-in-alt"></i></p>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('containing')
    <div class="kotak_login">
        <p class="login_label"><i class="fas fa-user-circle fa-4x"></i></p>
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