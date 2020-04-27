<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePengajuanSemSidsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengajuan_sem_sids', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            //tipe pengajuan: 1=seminar, 2=sidang
            $table->integer('tipe_pengajuan');
            $table->string('pengaju', 255)->references('email')->on('dosens');
            $table->string('mahasiswa', 255)->references('email')->on('mahasiswas');
            //status pengajuan: -1=ditolak, 1=disetujui, 0=menunggu
            $table->integer('status');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pengajuan_sem_sids');
    }
}
