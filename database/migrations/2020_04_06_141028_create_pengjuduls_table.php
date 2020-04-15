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
            $table->string('cadosbing1',255);
            $table->index('cadosbing1');
            $table->string('cadosbing2',255);
            $table->index('cadosbing2');
            $table->string('cadosbing3',255);
            $table->index('cadosbing3');
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
            $table->dropIndex('cadosbing1');
            $table->dropIndex('cadosbing2');
            $table->dropIndex('cadosbing3');
            $table->dropColumn('email');
        });

    }
}
