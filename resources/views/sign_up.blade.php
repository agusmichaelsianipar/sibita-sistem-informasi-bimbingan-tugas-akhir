@extends('mainlayout')
@section('beranda')
@if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif
<div class="container">
    <div class="row">
        <div class="col-6">
            <div class="isi">
            <h2 class="mt-3">Form Tambah Data Guest</h1>

            <form method="post" action="/daftar">
            {{ csrf_field() }}
                <div class="form-group">
                    <label for="nama">Nama</label>
                    <input type="text" class="form-control" id="nama" placeholder="Masukkan Nama" name="nama">
                    @if ($errors->has('nama'))
                        <span class="text-danger">{{ $errors->first('nama') }}</span>
                    @endif   
                </div>
                <div class="form-group">
                    <label for="nim">NIM</label>
                    <input type="text" class="form-control" id="nim" placeholder="Masukkan NIM" name="nim">
                    @if ($errors->has('nim'))
                        <span class="text-danger">{{ $errors->first('nim') }}</span>
                    @endif                     
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" class="form-control" id="email" placeholder="Masukkan Email" name="email">
                    @if ($errors->has('email'))
                        <span class="text-danger">{{ $errors->first('email') }}</span>
                    @endif                       
                </div>
                <div class="form-group">
                    <label for="password">Kata Sandi</label>
                    <input type="password" class="form-control" id="password" placeholder="Masukkan Kata Sandi" name="password">
                    @if ($errors->has('password'))
                        <span class="text-danger">{{ $errors->first('password') }}</span>
                    @endif                    
                </div>
                <div class="form-group">
                    <label for="pass_konfirm">Konfirmasikan Kata Sandi</label>
                    <input type="password" class="form-control" id="pass_konfirm" placeholder="Masukkan Kembali Kata Sandi" name="pass_konfirm">
                </div>
                <div class="form-group">
                    <label for="dosenwali">Dosen Wali</label>
                    <br>
                    <select id="semester" name="dosen_wali" id="dosenwali" height="100%">
                        <option value='' selected>Pilih dosen wali</option>
                        @include('fitur.dosenOption')
                    </select>
                    @if ($errors->has('dosen_wali'))
                        <span class="text-danger">{{ $errors->first('dosen_wali') }}</span>
                    @endif                         
                </div>
                <div class="form-group">
                    <label for="semester">Semester</label> <br>
                    <select id="semester" name="semester" height="100%">
                        <option value='' selected>Pilih Semester</option>
                        <option value=7>Tujuh (7)</option>
                        <option value=8>Delapan (8)</option>
                        <option value=9>Sembilan (9)</option>
                        <option value=10>Sepuluh (10)</option>
                        <option value=11>Sebelas (11)</option>
                        <option value=12>Duabelas (12)</option>
                        <option value=13>Tigabelas (13)</option>
                    </select> <br>
                    @if ($errors->has('semester'))
                        <span class="text-danger">{{ $errors->first('semester') }}</span>
                    @endif                                                
                </div>                

                <button type="submit" class="btn btn-primary">Daftar TA</button>
                </form>
                </div>        
        </div>
    </div>
    <br><br><br><br><br><br><br>
</div>
@include('sweetalert::alert', ['cdn' => "https://cdn.jsdelivr.net/npm/sweetalert2@9"])
    @endsection