<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePengajudulsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengajuduls', function (Blueprint $table) {
            $table->increments('id');
            $table->string('email',255);
            $table->index('email');
            $table->foreign('email')->references('email')->on('mahasiswas');

            $table->string('judul1',191)->unique();
            $table->text('desjudul1');
            $table->boolean('statusjudul1')->nullable();
            
            $table->string('cadosbing11',255);
            $table->index('cadosbing11');
            $table->foreign('cadosbing11')->references('email')->on('dosens');
            $table->boolean('statusdosbing11')->nullable();
            
            $table->string('cadosbing12',255);
            $table->index('cadosbing12');
            $table->foreign('cadosbing12')->references('email')->on('dosens');
            $table->boolean('statusdosbing12')->nullable();
            
            $table->string('cadosbing13',255);
            $table->index('cadosbing13');
            $table->foreign('cadosbing13')->references('email')->on('dosens');
            $table->boolean('statusdosbing13')->nullable();
            

            $table->string('judul2',191)->unique();
            $table->text('desjudul2');
            $table->boolean('statusjudul2')->nullable();
            
            $table->string('cadosbing21',255);
            $table->index('cadosbing21');
            $table->foreign('cadosbing21')->references('email')->on('dosens');
            $table->boolean('statusdosbing21')->nullable();
            
            $table->string('cadosbing22',255);
            $table->index('cadosbing22');
            $table->foreign('cadosbing22')->references('email')->on('dosens');
            $table->boolean('statusdosbing22')->nullable();
            
            $table->string('cadosbing23',255);
            $table->index('cadosbing23');
            $table->foreign('cadosbing23')->references('email')->on('dosens');
            $table->boolean('statusdosbing23')->nullable();
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
        
        Schema::dropIfExists('pengajuduls',function (Blueprint $table){
            $table->dropForeign('email');
            $table->dropIndex('email');
            $table->dropIndex('cadosbing11');
            $table->dropIndex('cadosbing12');
            $table->dropIndex('cadosbing13');
            $table->dropIndex('cadosbing21');
            $table->dropIndex('cadosbing22');
            $table->dropIndex('cadosbing23');
            $table->dropColumn('email');
        });
    }
}
