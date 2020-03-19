<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMahasiswasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mahasiswas',function (Blueprint $table){
            $table->increments('id');
            $table->string('name');
            $table->string('nim');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('dosen_wali');
            $table->string('judul')->nullable();
            $table->string('email_dosbing1')->nullable();
            $table->string('email_dosbing2')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExist('mahasiswas');
    }
}
