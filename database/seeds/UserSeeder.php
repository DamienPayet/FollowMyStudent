<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    DB::table('users')->insert([
      'email' => 'julian.courbez@gmail.com',
      'password' => bcrypt('suFRqHT2E-6'),
      'statut' => 'admin',
      'image_profil' => 'images/default-admin.png',
      'email_verified_at' => now(),
      'password_change_at' => now(),
      'administrateur_id' => 1
    ]);
    DB::table('users')->insert([
      'email' => 'spernelle@gmail.com',
      'password' => bcrypt('y&jU8Ww&Cg6'),
      'statut' => 'admin',
      'image_profil' => 'images/default-admin.png',
      'email_verified_at' => now(),
      'password_change_at' => now(),
      'administrateur_id' => 2
    ]);
    DB::table('users')->insert([
      'email' => 'admin@gmail.com',
      'password' => bcrypt('admin'),
      'statut' => 'admin',
      'image_profil' => 'images/default-admin.png',
      'email_verified_at' => now(),
      'password_change_at' => now(),
      'administrateur_id' => 3
    ]);
    DB::table('users')->insert([
      'email' => 'eleve@gmail.com',
      'password' => bcrypt('eleve'),
      'statut' => 'eleve',
      'image_profil' => 'images/default.png',
      'eleve_id' => 1
    ]);
    
  }
}
