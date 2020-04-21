<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLdosensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ldosens', function (Blueprint $table) {
            $table->bigInteger('id');
            $table->index('id');
            $table->string('name');
            $table->string('email',255);
            $table->primary('email');
            $table->string('password');
            $table->boolean('status');
            $table->integer('jlhmhs')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
        Schema::rename('ldosens', 'dosens');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dosens');
    }
}
