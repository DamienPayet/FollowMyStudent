<?php

use Illuminate\Database\Seeder;

class QuestionnairePartSeeder extends Seeder
{
  /**
  * Run the database seeds.
  *
  * @return void
  */
  public function run()
  {
    DB::table('questionnaire_parts')->insert([
      'titre'=> 'Votre employeur',
        'position' => 1
    ]);
    DB::table('questionnaire_parts')->insert([
      'titre'=> 'Votre premier emploi',
        'position' => 2
    ]);
    DB::table('questionnaire_parts')->insert([
      'titre'=> 'Votre emploi actuel',
        'position' => 3
    ]);
    DB::table('questionnaire_parts')->insert([
      'titre'=> 'La formation ASI',
        'position' => 4
    ]);
    DB::table('questionnaire_parts')->insert([
      'titre'=> 'Vos compétences',
        'position' => 5
    ]);
    DB::table('questionnaire_parts')->insert([
      'titre'=> 'Votre ressenti',
        'position' => 6
    ]);
    DB::table('questionnaire_parts')->insert([
      'titre'=> 'Votre avis',
        'position' => 7
    ]);
  }
}
