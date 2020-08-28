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
      'titre'=> 'Votre employeur'
    ]);
    DB::table('questionnaire_parts')->insert([
      'titre'=> 'Votre premier emploi'
    ]);
    DB::table('questionnaire_parts')->insert([
      'titre'=> 'Votre emploi actuel'
    ]);
    DB::table('questionnaire_parts')->insert([
      'titre'=> 'La formation ASI'
    ]);
    DB::table('questionnaire_parts')->insert([
      'titre'=> 'Vos compétences'
    ]);
    DB::table('questionnaire_parts')->insert([
      'titre'=> 'Votre ressenti'
    ]);
    DB::table('questionnaire_parts')->insert([
      'titre'=> 'Votre avis'
    ]);
  }
}
