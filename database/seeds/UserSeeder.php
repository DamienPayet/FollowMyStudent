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
      'email' => 'admin@gmail.com',
      'password' => bcrypt('admin'),
      'statut' => 'admin',
      'image_profil' => 'images/default-admin.png',
      'email_verified_at' => now(),
      'administrateur_id' => 1
    ]);
    DB::table('users')->insert([
      'email' => 'florent@gmail.com',
      'password' => bcrypt('florent'),
      'statut' => 'eleve',
      'image_profil' => 'images/default.png',
      'eleve_id' => 1
    ]);
    DB::table('users')->insert([
      'email' => 'hugo@gmail.com',
      'password' => bcrypt('hugo'),
      'statut' => 'eleve',
      'image_profil' => 'images/default.png',
      'eleve_id' => 2
    ]);
    DB::table('users')->insert([
      'email' => 'damien@gmail.com',
      'password' => bcrypt('damien'),
      'statut' => 'eleve',
      'image_profil' => 'images/default.png',
      'eleve_id' => 3
    ]);
    DB::table('users')->insert([
      'email' => 'julian@gmail.com',
      'password' => bcrypt('julian'),
      'statut' => 'admin',
      'image_profil' => 'images/default-admin.png',
      'email_verified_at' => now(),
      'administrateur_id' => 2
    ]);
    DB::table('users')->insert([
      'email' => 'eleve@gmail.com',
      'password' => bcrypt('eleve'),
      'statut' => 'eleve',
      'image_profil' => 'images/default.png',
      'eleve_id' => 4
    ]);
    
  }
}
