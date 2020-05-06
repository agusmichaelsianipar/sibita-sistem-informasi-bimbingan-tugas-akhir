<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMasaTAsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('masa_t_as', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('nama', 100);
            $table->date('mulai');
            $table->date('selesai');
            /*
            1 > aktif
            2 > selesai
            */
            $table->smallInteger('status');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('masa_t_as');
    }
}
