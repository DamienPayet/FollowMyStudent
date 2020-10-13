<?php

use Illuminate\Database\Seeder;

class EleveSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('eleves')->insert([
        'nom'=> 'Buffard',
        'prenom'=> 'Hugo',
      ]);
      DB::table('eleves')->insert([
        'nom'=> 'Pelletier',
        'prenom'=> 'Florent',
      ]);
      DB::table('eleves')->insert([
        'nom'=> 'Payet',
        'prenom'=> 'Damien',
      ]);
      DB::table('eleves')->insert([
        'nom'=> 'eleve',
        'prenom'=> 'eleve',
      ]);
    }
}
