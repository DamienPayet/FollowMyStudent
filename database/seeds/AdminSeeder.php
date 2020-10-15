<?php

use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('admins')->insert([
        'nom'=> 'Courbez',
        'prenom'=> 'Julian',
      ]);
      DB::table('admins')->insert([
        'nom'=> 'admin',
        'prenom'=> 'admin',
      ]);
    }
}
