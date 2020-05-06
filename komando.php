<?php
use App\Dosen;

$dosen = [
    ["agus@dosen.com", "Dr. Masayu Leylia Khodra, ST., MT."],
    ["michael@dosen.com", "Rajif Agung Yunmar, S.Kom., M.Cs."],
    ["raidah.hanifah@if.itera.ac.id", "Raidah Hanifah, S.T., M.T."],
    ["rahman.indra@if.itera.ac.id", "Rahman Indra Kesuma, S.Kom., M.Cs."],
    ["hafiz.budi@if.itera.ac.id", "Hafiz Budi Firmansyah, S.Kom., M.Sc."],
    ["imam.ekowicaksono@if.itera.ac.id", "Imam Ekowicaksono, S.Si., M.Si"],
    ["arkham.zahri@if.itera.ac.id", "Arkham Zahri Rakhman, S.Kom., M.Eng."],
    ["wayan.wiprayoga@if.itera.ac.id", "I Wayan Wiprayoga Wisesa, S.Kom., M.Kom"],
    ["ahmad.luky@if.itera.ac.id", "Ahmad Luky Ramdani, S.Komp., M.Kom."],
    ["amirul.iqbal@if.itera.ac.id", "Amirul Iqbal, S.Kom., M.Eng"],
    ["martin.clinton@if.itera.ac.id", "Martin Clinton Tosima Manullang, S.T., M.T."],
    ["meida.cahyo@if.itera.ac.id", "Meida Cahyo Untoro, S.Kom.,M.Kom."],
];

for($i=0; $i<count($dosen); $i++){
    $tmpDos = new Dosen;
    $tmpDos->email = $dosen[$i][0];
    $tmpDos->name = $dosen[$i][1];
    $tmpDos->status = '0';
    $tmpDos->password = Hash::make("123123123");
    $tmpDos->save();
    
}