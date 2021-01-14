<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSujetReponsesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sujet_reponses', function (Blueprint $table) {
            $table->id();
            $table->longText('reponse');
            $table->bigInteger('user_id')->unsigned()->nullable();
            $table->bigInteger('sujet_id')->unsigned()->nullable();
            $table->integer('nb_vue');
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
        Schema::dropIfExists('sujet_reponses');
    }
}
