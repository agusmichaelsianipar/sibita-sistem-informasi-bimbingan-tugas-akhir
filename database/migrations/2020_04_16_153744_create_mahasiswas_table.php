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
            $table->bigInteger('id');
            $table->index('id');
            $table->string('name');
            $table->string('nim');
            $table->string('email',255);
            $table->primary('email');
            $table->string('password');
            $table->string('dosen_wali');
            $table->string('judul')->nullable();
            $table->string('email_dosbing1',255)->nullable();
            $table->index('email_dosbing1');
            $table->foreign('email_dosbing1')->references('email')->on('dosens');
            $table->string('email_dosbing2',255)->nullable();
            $table->index('email_dosbing2');
            $table->foreign('email_dosbing2')->references('email')->on('dosens');
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
