<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
  /**
  * Run the migrations.
  *
  * @return void
  */
  public function up()
  {
    Schema::create('users', function (Blueprint $table) {
      $table->id();
      $table->string('email')->unique();
      $table->string('image_profil')->default('default.png');
      $table->enum('statut', array ('eleve', 'admin'))->default('eleve');
      $table->bigInteger('eleve_id')->unsigned()->nullable();
      $table->bigInteger('administrateur_id')->unsigned()->nullable();
      $table->timestamp('email_verified_at')->nullable();
      $table->string('password');
      $table->timestamp('password_change_at')->nullable();
      $table->boolean('archived')->nullable()->default(0);
      $table->timestamp('archived_at')->nullable();
      $table->rememberToken();
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
    Schema::dropIfExists('users');
  }
}
