<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Foreignekey extends Migration
{
  /**
  * Run the migrations.
  *
  * @return void
  */
  public function up()
  {
    Schema::table('users', function (Blueprint $table) {
      $table->foreign('eleve_id')->references('id')->on('eleves')->onDelete('cascade');
    });
    Schema::table('users', function (Blueprint $table) {
      $table->foreign('responsable_id')->references('id')->on('responsables')->onDelete('cascade');
    });
    Schema::table('users', function (Blueprint $table) {
      $table->foreign('administrateur_id')->references('id')->on('admins')->onDelete('cascade');
    });
    Schema::table('questionnaire_questions', function (Blueprint $table) {
      $table->foreign('part_id')->references('id')->on('questionnaire_parts')->onDelete('cascade');
    });
    Schema::table('questionnaire_reponses', function (Blueprint $table) {
      $table->foreign('question_id')->references('id')->on('questionnaire_questions')->onDelete('cascade');
    });
    Schema::table('sujets', function (Blueprint $table) {
      $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
    });
    Schema::table('sujets', function (Blueprint $table) {
      $table->foreign('categorie_id')->references('id')->on('sujet_categories')->onDelete('cascade');
    });
    Schema::table('sujet_reponses', function (Blueprint $table) {
      $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
    });
    Schema::table('sujet_reponses', function (Blueprint $table) {
      $table->foreign('sujet_id')->references('id')->on('sujets')->onDelete('cascade');
    });
    Schema::table('audit_actions', function (Blueprint $table) {
      $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
    });

  }

  /**
  * Reverse the migrations.
  *
  * @return void
  */
  public function down()
  {
    //
  }
}
