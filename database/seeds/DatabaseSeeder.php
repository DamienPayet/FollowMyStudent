<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
  /**
  * Seed the application's database.
  *
  * @return void
  */
  public function run()
  {
    $this->call([
      QuestionnairePartSeeder::class,
      QuestionnaireQuestionSeeder::class,
      AdminSeeder::class,
      EleveSeeder::class,
      UserSeeder::class,
      ForumSeeder::class,
      OffreSeeder::class,
      HomePostSeeder::class
    ]);
  }
}
