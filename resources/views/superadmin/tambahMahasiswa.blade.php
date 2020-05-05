@extends('superadmin.main_superadmin')
@section('title','ADMIN | SISTEM INFORMASI BIMBINGAN TUGAS AKHIR')

@section('beranda')

<div class="container">
        <h2>Tambah Mahasiswa</h2>
        <br> <br>
            <form method="post" action="/superadmin/tambahmahasiswa/">
            {{ csrf_field() }}
                <div class="form-group">
                    <label for="nama">Nama Mahasiswa</label>
                    <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan Nama Mahasiswa" value="{{ old('nama') }}">
                    @if ($errors->has('nama'))
                        <span class="text-danger">{{ $errors->first('nama') }}</span>
                    @endif                       
                </div>
                <div class="form-group">
                    <label for="nama">NIM Mahasiswa</label>
                    <input type="text" class="form-control" id="nim" name="nim" placeholder="Masukkan NIM Mahasiswa" value="{{ old('nim') }}">
                    @if ($errors->has('nim'))
                        <span class="text-danger">{{ $errors->first('nim') }}</span>
                    @endif                       
                </div>
                <div class="form-group">
                    <label for="email">Email Mahasiswa</label>
                    <input type="text" class="form-control" id="email" name="email" placeholder="Masukkan Email Mahasiswa" value="{{ old('email') }}">
                    @if ($errors->has('email'))
                        <span class="text-danger">{{ $errors->first('email') }}</span>
                    @endif                   
                </div>
                <div class="form-group">
                    <label for="password">Password Mahasiswa</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan Password Mahasiswa">
                    @if ($errors->has('password'))
                        <span class="text-danger">{{ $errors->first('password') }}</span>
                    @endif                   
                </div>
                <div class="form-group">
                    <label for="konfirmasi_password">Konfirmasi Password</label>
                    <input type="password" class="form-control" id="konfirmasi_password" name="konfirmasi_password" placeholder="Konfirmasi Password Mahasiswa">
                    @if ($errors->has('konfirmasi_password'))
                        <span class="text-danger">{{ $errors->first('konfirmasi_password') }}</span>
                    @endif
                </div>
                    <div class="form-group">
                    <label for="semester">Dosen Wali</label> <br>
                    <select id="semester" name="dosen_wali" height="100%">
                        <option value='' selected>Pilih Dosen Wali</option>
                        <option value="agus@dosen.com">Dr. Masayu Leylia Khodra, ST., MT.</option>
                        <option value="michael@dosen.com">Rajif Agung Yunmar, S.Kom., M.Cs.</option>
                        <option value="raidah.hanifah@if.itera.ac.id">Raidah Hanifah, S.T., M.T.</option>
                        <option value="rahman.indra@if.itera.ac.id">Rahman Indra Kesuma, S.Kom., M.Cs.</option>
                        <option value="hafiz.budi@if.itera.ac.id">Hafiz Budi Firmansyah, S.Kom., M.Sc.</option>
                        <option value="imam.ekowicaksono@if.itera.ac.id">Imam Ekowicaksono, S.Si., M.Si</option>
                        <option value="arkham.zahri@if.itera.ac.id">Arkham Zahri Rakhman, S.Kom., M.Eng.</option>
                        <option value="wayan.wiprayoga@if.itera.ac.id">I Wayan Wiprayoga Wisesa, S.Kom., M.Kom</option>
                        <option value="ahmad.luky@if.itera.ac.id">Ahmad Luky Ramdani, S.Komp., M.Kom.</option>
                        <option value="amirul.iqbal@if.itera.ac.id">Amirul Iqbal, S.Kom., M.Eng</option>
                        <option value="martin.clinton@if.itera.ac.id">Martin Clinton Tosima Manullang, S.T., M.T.</option>
                        <option value="meida.cahyo@if.itera.ac.id">Meida Cahyo Untoro, S.Kom.,M.Kom.</option>
                    </select> <br>
                    @if ($errors->has('dosen_wali'))
                        <span class="text-danger">{{ $errors->first('dosen_wali') }}</span>
                    @endif                                                                           
                </div>
                <div class="tombol">
                    <button type="submit" class="btn btn-outline-primary">Tambah Dosen</button>
                </div>                                
            </form>
        </div>
@endsection