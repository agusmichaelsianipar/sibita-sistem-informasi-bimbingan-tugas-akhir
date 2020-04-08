<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBimbingansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bimbingans', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->dateTime('waktu_bimbingan');
            $table->string('judul_bimbingan');
            $table->string('dosen_bimbingan');
            $table->string('mahasiswa_bimbingan');
            $table->text('catatan_bimbingan');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bimbingans');
    }
}
