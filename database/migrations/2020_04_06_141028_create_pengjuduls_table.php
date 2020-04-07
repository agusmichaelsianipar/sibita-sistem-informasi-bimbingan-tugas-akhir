<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePengjudulsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengjuduls', function (Blueprint $table) {
            $table->increments('id');
            $table->string('email',255);
            $table->index('email');
            $table->foreign('email')->references('email')->on('mahasiswas');
            $table->string('judul1',200)->unique();
            $table->text('des_judul1');
            $table->string('judul2',200)->unique();
            $table->text('des_judul2');
            $table->string('cadosbing1_1');
            $table->string('cadosbing1_2');
            $table->string('cadosbing1_3');
            $table->string('cadosbing2_1');
            $table->string('cadosbing2_2');
            $table->string('cadosbing2_3');
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
        Schema::dropIfExists('pengjuduls',function (Blueprint $table){
            $table->dropForeign('email');
            $table->dropIndex('email');
            $table->dropColumn('email');
        });

    }
}
