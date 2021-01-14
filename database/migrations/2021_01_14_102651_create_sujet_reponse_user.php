<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSujetReponseUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sujet_reponse_user', function (Blueprint $table) {
          $table->id();
          $table->bigInteger('user_id')->unsigned()->nullable();
          $table->bigInteger('sujet_reponse_id')->unsigned()->nullable();
          $table->boolean('like')->default(false);
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
        Schema::dropIfExists('sujet_reponse_user');
    }
}
