<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNotifikasisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /*
        notif_owner >> email pemilik email
        notif_text >> teks notifikasi
        notif_goto >> link rujukan
        */

         Schema::create('notifikasis', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('notif_owner');
            $table->string('notif_text');
            $table->string('notif_goto');
            $table->boolean('pin');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('notifikasis');
    }
}
