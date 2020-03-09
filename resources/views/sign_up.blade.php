@extends('layout/main')
@section('title','SISTEM INFORMASI BIMBINGAN TUGAS AKHIR')
@section('bar')
    <div class="navbarberanda">
        <div class="container">
            <div class="wrapbar">
                <div class="conbar">
                <a href="{{ url('/') }}"><i class="fas fa-arrow-left"></i></a>
                </div>
                <div class="bartitle">
                    <p>SIGN-UP <i class="fas fa-clipboard-list"></i></p>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('containing')
    <div class="kotak_login">
        <p class="login_label"><i class="fas fa-user-plus fa-4x"></i></p>
        <form>
            <div class="form-group">
                <input type="text" class="form-control" id="exampleInputName"  placeholder="Username">
                <small id="emailHelp" class="form-text text-muted">Please insert your fullname.</small>
            </div>
            <div class="form-group">
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Email">
                <small id="emailHelp" class="form-text text-muted">Please insert your email.</small>
            </div>
            <div class="form-group">
                <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                <small id="emailHelp" class="form-text text-muted">Please insert your password.</small>
            </div>
            <div class="form-group">
                <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Retype Your Password">
                <small id="emailHelp" class="form-text text-muted">Please retype your password.</small>
            </div>
            <br>
            <center>
                <button type="submit" class="btn btn-primary">SIGN-UP</button>
            </center>
        </form>
    </div>
    @endsection