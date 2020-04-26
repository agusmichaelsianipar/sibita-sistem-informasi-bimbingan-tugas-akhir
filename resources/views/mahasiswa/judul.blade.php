@extends('mahasiswa.main_mahasiswa')
@section('title','PENGAJUAN JUDUL | SISTEM INFORMASI BIMBINGAN TUGAS AKHIR')

@section('beranda')
<h2>Halaman Pengajuan Judul</h2>
<form method="post" action="/mahasiswa/pengajuan-judulta">
            {{ csrf_field() }}
                <div class="form-group">
                    <label for="judul1">Judul 1</label>
                    <input type="text" class="form-control" id="judul1" placeholder="Masukkan Usulan Judul Pertama Tugas Akhir Anda" name="judul_1">
                    @if ($errors->has('judul_1'))
                        <span class="text-danger">{{ $errors->first('judul_1') }}</span>
                    @endif                       
                </div>
                <div class="form-group">
                        <label for="deskripsi_judul_1">Deskripsi Singkat Tentang Judul 1</label>
                        <textarea class="form-control" id="deskripsi_judul-1" rows="4" name="deskripsi_judul_1" placeholder="Silahkan Jelaskan Secara Singkat Tentang Judul Yang Anda Ajukan"></textarea>
                        @if ($errors->has('deskripsi_judul_1'))
                        <span class="text-danger">{{ $errors->first('deskripsi_judul_1') }}</span>
                    @endif 
                    </div>
                    <div class="form-group">
                    <label for="semester">Dosen Pembimbing I</label> <br>
                    <select id="semester" name="cadosbing1_1" height="100%">
                        <option value='' selected>Pilih Calon Dosen Pembimbing 1</option>
                        <option value="agus@dosen.com">Dr. Masayu Leylia Khodra, ST., MT.</option>
                        <option value="rajif.agung@if.itera.ac.id">Rajif Agung Yunmar, S.Kom., M.Cs.</option>
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
                    @if ($errors->has('cadosbing1_1'))
                        <span class="text-danger">{{ $errors->first('cadosbing1_1') }}</span>
                    @endif                      
                    <br> <br>
                        <select id="semester" name="cadosbing1_2" height="100%">
                        <option value='' selected>Pilih Calon Dosen Pembimbing 1</option>
                        <option value="agus@dosen.com">Dr. Masayu Leylia Khodra, ST., MT.</option>
                        <option value="rajif.agung@if.itera.ac.id">Rajif Agung Yunmar, S.Kom., M.Cs.</option>
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
                    @if ($errors->has('cadosbing1_2'))
                        <span class="text-danger">{{ $errors->first('cadosbing1_2') }}</span>
                    @endif                      <br> <br>
                    <select id="semester" name="cadosbing1_3" height="100%">
                        <option value='' selected>Pilih Calon Dosen Pembimbing 1</option>
                        <option value="agus@dosen.com">Dr. Masayu Leylia Khodra, ST., MT.</option>
                        <option value="rajif.agung@if.itera.ac.id">Rajif Agung Yunmar, S.Kom., M.Cs.</option>
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
                    @if ($errors->has('cadosbing1_3'))
                        <span class="text-danger">{{ $errors->first('cadosbing1_3') }}</span>
                    @endif                      
                    <br> <br>
                </div>                                     
                <div class="form-group">
                    <label for="judul2">Judul 2</label>
                    <input type="text" class="form-control" id="judul2" placeholder="Masukkan Usulan Judul Kedua Tugas Akhir Anda" name="judul_2">
                    @if ($errors->has('judul_2'))
                        <span class="text-danger">{{ $errors->first('judul_2') }}</span>
                    @endif                     
                </div>
                <div class="form-group">
                        <label for="deskripsi_judul_2">Deskripsi Singkat Tentang Judul 2</label>
                        <textarea class="form-control" id="deskripsi_judul-2" rows="4" name="deskripsi_judul_2" placeholder="Silahkan Jelaskan Secara Singkat Tentang Judul Yang Anda Ajukan"></textarea>
                        @if ($errors->has('deskripsi_judul_2'))
                        <span class="text-danger">{{ $errors->first('deskripsi_judul_2') }}</span>
                    @endif                     
                    </div>               
                <div class="form-group">
                    <label for="semester">Dosen Pembimbing II</label> <br>
                    <select id="semester" name="cadosbing2_1" height="100%">
                        <option value='' selected>Pilih Calon Dosen Pembimbing 2</option>
                        <option value="agus@dosen.com">Dr. Masayu Leylia Khodra, ST., MT.</option>
                        <option value="rajif.agung@if.itera.ac.id">Rajif Agung Yunmar, S.Kom., M.Cs.</option>
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
                    @if ($errors->has('cadosbing2_1'))
                        <span class="text-danger">{{ $errors->first('cadosbing2_1') }}</span>
                    @endif                       
                    <br> <br>
                    <select id="semester" name="cadosbing2_2" height="100%">
                        <option value='' selected>Pilih Calon Dosen Pembimbing 2</option>
                        <option value="agus@dosen.com">Dr. Masayu Leylia Khodra, ST., MT.</option>
                        <option value="rajif.agung@if.itera.ac.id">Rajif Agung Yunmar, S.Kom., M.Cs.</option>
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
                    @if ($errors->has('cadosbing2_2'))
                        <span class="text-danger">{{ $errors->first('cadosbing2_2') }}</span>
                    @endif  
                    <br> <br>
                    <select id="semester" name="cadosbing2_3" height="100%">
                        <option value='' selected>Pilih Calon Dosen Pembimbing 2</option>
                        <option value="agus@dosen.com">Dr. Masayu Leylia Khodra, ST., MT.</option>
                        <option value="rajif.agung@if.itera.ac.id">Rajif Agung Yunmar, S.Kom., M.Cs.</option>
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
                    @if ($errors->has('cadosbing2_3'))
                        <span class="text-danger">{{ $errors->first('cadosbing2_3') }}</span>
                    @endif                       
                     <br> <br>                                             
                </div>
                <button type="submit" class="btn btn-primary">Ajukan</button>
                </form>        

@endsection