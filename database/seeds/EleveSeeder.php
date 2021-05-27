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
        'nom'=> 'Démonstration',
        'prenom'=> 'Eleve',
      ]);
    }
}
