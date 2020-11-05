<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOffresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('offres', function (Blueprint $table) {
            $table->id();
            $table->string('titre');
            $table->longText('description');
            $table->enum('niveau', array ('Bac', 'BTS','Licence'));
            $table->enum('type', array ('CDD', 'CDI','Alternance'));
            $table->string('pdf')->nullable();
            $table->string('lien')->nullable();
            $table->string('lieu');
            $table->string('entreprise');
            $table->string('nb_vue');
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
        Schema::dropIfExists('offres');
    }
}
