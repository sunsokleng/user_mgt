<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblNationaluser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nationaluser',function(Blueprint$table){
            $table->increments('id');
            $table->integer('national_id');
            $table->string('englishname');
            $table->string('khmername');
            $table->string('username');
            $table->string('aliasname');
            $table->integer('position_id');
            $table->integer('officename_id');
            $table->string('telephone');
            $table->string('modules');
            $table->date('date_firstupdate')->nullable();
            $table->date('date_secondupdate')->nullable();
            $table->string('comments');
            $table->string('image')->nullable();
            $table->boolean('active');
            $table->softDeletes();
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
        Schema::dropIfExists('nationaluser');
    }
}
