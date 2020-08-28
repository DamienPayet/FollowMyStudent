<?php

use Illuminate\Database\Seeder;

class QuestionnaireQuestionSeeder extends Seeder
{
  /**
  * Run the database seeds.
  *
  * @return void
  */
  public function run()
  {
    DB::table('questionnaire_questions')->insert([
      'question'=> 'Dénomination, raison sociale :',
      'part_id'=> '1',
    ]);
    DB::table('questionnaire_questions')->insert([
      'question'=> 'Effectifs de votre entreprise :',
      'part_id'=> '1',
    ]);
    DB::table('questionnaire_questions')->insert([
      'question'=> 'Effectifs du site sur lequel vous travaillez
      (si votre entreprise appartient à un grand groupe) :
      ',
      'part_id'=> '1',
    ]);
    DB::table('questionnaire_questions')->insert([
      'question'=> 'Secteur d’activité de votre entreprise :',
      'part_id'=> '1',
    ]);
    DB::table('questionnaire_questions')->insert([
      'question'=> 'Activité de votre entreprise :',
      'part_id'=> '1',
    ]);
    DB::table('questionnaire_questions')->insert([
      'question'=> 'Combien de temps a duré la période de recherche de votre premier emploi ?',
      'part_id'=> '2',
    ]);
    DB::table('questionnaire_questions')->insert([
      'question'=> 'A quelle date avez-vous eu votre premier emploi ?',
      'part_id'=> '2',
    ]);
    DB::table('questionnaire_questions')->insert([
      'question'=> 'Sous quel type de contrat (CDI, CDD …..) ?',
      'part_id'=> '2',
    ]);
    DB::table('questionnaire_questions')->insert([
      'question'=> 'Quel est votre statut (Cadre, agent de maîtrise, …….) ?',
      'part_id'=> '2',
    ]);
    DB::table('questionnaire_questions')->insert([
      'question'=> 'Quel est votre salaire annuel BRUT ?',
      'part_id'=> '2',
    ]);
    DB::table('questionnaire_questions')->insert([
      'question'=> 'Avez-vous créé votre entreprise ? Depuis quand ? Quel type d’entreprise ?',
      'part_id'=> '2',
    ]);
    DB::table('questionnaire_questions')->insert([
      'question'=> 'Etes-vous associé de votre entreprise ? ',
      'part_id'=> '2',
    ]);
    DB::table('questionnaire_questions')->insert([
      'question'=> 'Quelle est la désignation de votre métier / de votre (vos) fonctions ? ',
      'part_id'=> '2',
    ]);
    DB::table('questionnaire_questions')->insert([
      'question'=> 'Quelles sont vos activités les plus fréquentes ? Activité 1 ? Activité 2 ?',
      'part_id'=> '2',
    ]);
    DB::table('questionnaire_questions')->insert([
      'question'=> 'Une habilitation est-elle nécessaire dans votre métier ? ',
      'part_id'=> '2',
    ]);
    DB::table('questionnaire_questions')->insert([
      'question'=> 'Quel est votre niveau d’autonomie ? ',
      'part_id'=> '2',
    ]);
    DB::table('questionnaire_questions')->insert([
      'question'=> 'Quelle est la nature de vos responsabilités ?',
      'part_id'=> '2',
    ]);
    DB::table('questionnaire_questions')->insert([
      'question'=> 'Quel est votre niveau hiérarchique ?',
      'part_id'=> '2',
    ]);
    DB::table('questionnaire_questions')->insert([
      'question'=> 'Quelle est la fonction de votre supérieur hiérarchique ?',
      'part_id'=> '2',
    ]);
    DB::table('questionnaire_questions')->insert([
      'question'=> 'Avec quel service travaillez-vous le plus ?',
      'part_id'=> '2',
    ]);
    DB::table('questionnaire_questions')->insert([
      'question'=> 'Où vous situez-vous dans l’organigramme de l’entreprise ?',
      'part_id'=> '2',
    ]);
    DB::table('questionnaire_questions')->insert([
      'question'=> 'Etes-vous en contact direct avec le client ? seul ou sous responsabilité ?',
      'part_id'=> '2',
    ]);
    DB::table('questionnaire_questions')->insert([
    'question'=> 'Combien de temps a duré la période de recherche de votre premier emploi ?',
    'part_id'=> '3',
  ]);
  DB::table('questionnaire_questions')->insert([
    'question'=> 'A quelle date avez-vous eu votre premier emploi ?',
    'part_id'=> '3',
  ]);
  DB::table('questionnaire_questions')->insert([
    'question'=> 'Sous quel type de contrat (CDI, CDD …..) ?',
    'part_id'=> '3',
  ]);
  DB::table('questionnaire_questions')->insert([
    'question'=> 'Quel est votre statut (Cadre, agent de maîtrise, …….) ?',
    'part_id'=> '3',
  ]);
  DB::table('questionnaire_questions')->insert([
    'question'=> 'Quel est votre salaire annuel BRUT ?',
    'part_id'=> '3',
  ]);
  DB::table('questionnaire_questions')->insert([
    'question'=> 'Avez-vous créé votre entreprise ? Depuis quand ? Quel type d’entreprise ?',
    'part_id'=> '3',
  ]);
  DB::table('questionnaire_questions')->insert([
    'question'=> 'Etes-vous associé de votre entreprise ? ',
    'part_id'=> '3',
  ]);
  DB::table('questionnaire_questions')->insert([
    'question'=> 'Quelle est la désignation de votre métier / de votre (vos) fonctions ? ',
    'part_id'=> '3',
  ]);
  DB::table('questionnaire_questions')->insert([
    'question'=> 'Quelles sont vos activités les plus fréquentes ? Activité 1 ? Activité 2 ?',
    'part_id'=> '3',
  ]);
  DB::table('questionnaire_questions')->insert([
    'question'=> 'Une habilitation est-elle nécessaire dans votre métier ? ',
    'part_id'=> '3',
  ]);
  DB::table('questionnaire_questions')->insert([
    'question'=> 'Quel est votre niveau d’autonomie ? ',
    'part_id'=> '3',
  ]);
  DB::table('questionnaire_questions')->insert([
    'question'=> 'Quelle est la nature de vos responsabilités ?',
    'part_id'=> '3',
  ]);
  DB::table('questionnaire_questions')->insert([
    'question'=> 'Quel est votre niveau hiérarchique ?',
    'part_id'=> '3',
  ]);
  DB::table('questionnaire_questions')->insert([
    'question'=> 'Quelle est la fonction de votre supérieur hiérarchique ?',
    'part_id'=> '3',
  ]);
  DB::table('questionnaire_questions')->insert([
    'question'=> 'Avec quel service travaillez-vous le plus ?',
    'part_id'=> '3',
  ]);
  DB::table('questionnaire_questions')->insert([
    'question'=> 'Où vous situez-vous dans l’organigramme de l’entreprise ?',
    'part_id'=> '3',
  ]);
  DB::table('questionnaire_questions')->insert([
    'question'=> 'Etes-vous en contact direct avec le client ? seul ou sous responsabilité ?',
    'part_id'=> '3',
  ]);
    DB::table('questionnaire_questions')->insert([
      'question'=> 'Que vous a-t-il manqué en termes de contenus ou de méthodes ?',
      'part_id'=> '4',
    ]);
    DB::table('questionnaire_questions')->insert([
      'question'=> 'Avez-vous passé d’autres certifications, homologations, ou formations ? Si oui, les compétences ou connaissances acquises en ASI étaient-elles nécessaires et suffisantes ?',
      'part_id'=> '4',
    ]);
    DB::table('questionnaire_questions')->insert([
      'question'=> 'En quoi jugez-vous cette certification pertinente au vu de votre métier ?',
      'part_id'=> '4',
    ]);
    DB::table('questionnaire_questions')->insert([
      'question'=> 'En quoi cette certification ne s’intègre-t-elle pas dans votre champ activité professionnel ?',
      'part_id'=> '4',
    ]);
    DB::table('questionnaire_questions')->insert([
      'question'=> 'Pensez-vous être surqualifié par rapport à l’emploi que vous occupez ?',
      'part_id'=> '4',
    ]);
    DB::table('questionnaire_questions')->insert([
      'question'=> 'Sur les pages suivantes, figure le référentiel de compétences de ASI Indiquez les compétences que vous mettez le plus souvent en œuvre',
      'part_id'=> '5',
    ]);
    DB::table('questionnaire_questions')->insert([
      'question'=> 'Pensez-vous exercer un métier conforme à ce qui vous a poussé à entrer dans la formation ?',
      'part_id'=> '6',
    ]);

    DB::table('questionnaire_questions')->insert([
      'question'=> 'Pensez-vous exercer un métier conforme à ce que vous espériez en sortant de  la formation ?',
      'part_id'=> '6',
    ]);
    DB::table('questionnaire_questions')->insert([
      'question'=> 'Quelle modification à apporter à la formation ASI vous semble judicieuse ?',
      'part_id'=> '7',
    ]);
  }
}
