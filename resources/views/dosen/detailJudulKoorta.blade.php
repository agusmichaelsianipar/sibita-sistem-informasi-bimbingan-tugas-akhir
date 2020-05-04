@extends('dosen.main_dosbing')
@section('title','JUDUL | SISTEM INFORMASI BIMBINGAN TUGAS AKHIR')

@section('beranda')
<div class="container">
    <div class="row row-cols-1 row-cols-md-2">
        <div class="col mb-4">
            <div class="card">
                @foreach($mahasiswa as $mhs)
                    <div class="card-body">
                        <form action="/dosen/koordinator/detail/{{$judul->id}}/{{$opsi=1}}" class="save" method="post">
                        {{ csrf_field() }}
                            <div class="form-group">
                                <input disabled type="text" class="form-control" id="nama" value="{{$mhs->name}}" name="nama">
                            </div>
                            <div class="form-group">
                                <input disabled type="text" class="form-control" id="nim" value="{{$mhs->nim}}" name="nim">
                            </div>
                            <div class="form-group">
                                <input disabled type="text" class="form-control" id="dosenwali" value="{{$mhs->dosen_wali}}" name="dosenwali">
                            </div>
                            <div class="form-group">
                                <input disabled type="text" class="form-control" id="judul1" value="{{$judul->judul1}}" name="judul_1">
                            </div>
                            <div class="form-group">
                                <textarea class="form-control" id="deskripsi_judul-1" rows="4" name="deskripsi_judul_1" disabled>{{$judul->desjudul1}}</textarea>
                            </div>
                            <div class="form-group">
                            <label for="semesterr">Dosen Pembimbing I</label> <br>
                                <select id="semesterr" name="cadosbing1_1" height="100%">
                                    <option value='' selected>Pilih Calon Dosen Pembimbing 1</option>
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
                                    @if ($errors->has('cadosbing1_1'))
                                        <span class="text-danger">{{ $errors->first('cadosbing1_1') }}</span>
                                    @endif                             
                            </div>
                            <div class="form-group">
                            <label for="semesterr">Dosen Pembimbing II</label> <br>
                                <select id="semesterr" name="cadosbing1_2" height="100%">
                                    <option value='' selected>Pilih Calon Dosen Pembimbing 2</option>
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
                                    @if ($errors->has('cadosbing1_2'))
                                        <span class="text-danger">{{ $errors->first('cadosbing1_2') }}</span>
                                    @endif                                
                            </div>
                            <div class="row">
                                <div class="form-group col">
                                    <input disabled type="text" class="form-control" id="semesterr" value="{{$dosen[0]}}" name="cadosbing11">
                                </div>
                                <div class="form-group col">
                                    @if($judul->statusdosbing11)
                                        <span class="badge badge-success">Calon Dosen Pembimbing Pertama Menyetujui</span>
                                    @else
                                        <span class="badge badge-danger">Calon Dosen Pembimbing Pertama Tidak Menyetujui</span>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col">
                                    <input disabled type="text" class="form-control" id="semesterr" value="{{$dosen[1]}}" name="cadosbing12">
                                </div>
                                <div class="form-group col">
                                @if($judul->statusdosbing12)
                                        <span class="badge badge-success">Calon Dosen Pembimbing Kedua Menyetujui</span>
                                @else
                                        <span class="badge badge-danger">Calon Dosen Pembimbing Kedua Tidak Menyetujui</span>
                                @endif
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col">
                                    <input disabled type="text" class="form-control" id="semesterr" value="{{$dosen[2]}}" name="cadosbing13">
                                </div>
                                <div class="form-group col">
                                @if($judul->statusdosbing13)
                                        <span class="badge badge-success">Calon Dosen Pembimbing Ketiga Menyetujui</span>
                                @else
                                        <span class="badge badge-danger">Calon Dosen Pembimbing Ketiga Tidak Menyetujui</span>
                                @endif
                                </div>
                            </div>
                            <div class="card">
                                <button for="save" type="submit" class="btn btn-outline-primary">Pilih Judul 1</button>
                            </div>
                        </form>
                    </div>     
                @endforeach
            </div>
        </div>
        <div class="col mb-4">
            <div class="card">
                @foreach($mahasiswa as $mhs)
                    <div class="card-body">
                        <form action="/dosen/koordinator/detail/{{$judul->id}}/{{$opsi=2}}" id="save2" method="post">
                        {{ csrf_field() }}
                            <div class="form-group">
                                <input disabled type="text" class="form-control" id="nama" value="{{$mhs->name}}" name="nama">
                            </div>
                            <div class="form-group">
                                <input disabled type="text" class="form-control" id="nim" value="{{$mhs->nim}}" name="nim">
                            </div>
                            <div class="form-group">
                                <input disabled type="text" class="form-control" id="dosenwali" value="{{$mhs->dosen_wali}}" name="dosenwali">
                            </div>
                            <div class="form-group">
                                <input disabled type="text" class="form-control" id="judul2" value="{{$judul->judul2}}" name="judul_2">
                            </div>
                            <div class="form-group">
                                <textarea class="form-control" id="deskripsi_judul_2" rows="4" name="deskripsi_judul_2" disabled>{{$judul->desjudul2}}</textarea>
                            </div>
                            <div class="form-group">
                            <label for="semesterr">Dosen Pembimbing I</label> <br>
                                <select id="semesterr" name="cadosbing2_1" height="100%">
                                    <option value='' selected>Pilih Calon Dosen Pembimbing 1</option>
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
                                    @if ($errors->has('cadosbing2_1'))
                                        <span class="text-danger">{{ $errors->first('cadosbing2_1') }}</span>
                                    @endif                                
                            </div>
                            <div class="form-group">
                            <label for="semesterr">Dosen Pembimbing II</label> <br>
                                <select id="semesterr" name="cadosbing2_2" height="100%">
                                    <option value='' selected>Pilih Calon Dosen Pembimbing 2</option>
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
                                    @if ($errors->has('cadosbing2_2'))
                                        <span class="text-danger">{{ $errors->first('cadosbing2_2') }}</span>
                                    @endif                                
                            </div>
                            <div class="row">
                                <div class="form-group col">
                                    <input disabled type="text" class="form-control" id="semesterr" value="{{$dosen[3]}}" name="cadosbing21">
                                </div>
                                <div class="form-group col">
                                @if($judul->statusdosbing21)
                                        <span class="badge badge-success">Calon Dosen Pembimbing Pertama Menyetujui</span>
                                @else
                                        <span class="badge badge-danger">Calon Dosen Pembimbing Pertama Tidak Menyetujui</span>
                                @endif
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col">
                                    <input disabled type="text" class="form-control" id="semesterr" value="{{$dosen[4]}}" name="cadosbing22">
                                </div>
                                <div class="form-group col">
                                @if($judul->statusdosbing22)
                                        <span class="badge badge-success">Calon Dosen Pembimbing Kedua Menyetujui</span>
                                @else
                                        <span class="badge badge-danger">Calon Dosen Pembimbing Kedua Tidak Menyetujui</span>
                                </div>
                                @endif
                            </div>
                            <div class="row">
                                <div class="form-group col">
                                    <input disabled type="text" class="form-control" id="semesterr" value="{{$dosen[5]}}" name="cadosbing23">
                                </div>
                                <div class="form-group col">
                                @if($judul->statusdosbing23)
                                        <span class="badge badge-success">Calon Dosen Pembimbing Ketiga Menyetujui</span>
                                @else
                                        <span class="badge badge-danger">Calon Dosen Pembimbing Ketiga Tidak Menyetujui</span>
                                @endif
                                </div>
                            </div>
                            <div class="card">
                                <button for="save2" type="submit" class="btn btn-outline-primary">Pilih Judul 2</button>
                            </div>
                        </form>
                    </div>     
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection