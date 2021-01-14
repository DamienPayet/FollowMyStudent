<?php

use Illuminate\Database\Seeder;

class ForumSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sections')->insert([
            'titre' => 'Général',
            'description' => 'Posez vos questions d\'ordre générale, sur un métier, la poursuitre d\'étude..',
            'nb_vue' => 0,
            'created_at' => now()
        ]);
        DB::table('sections')->insert([
            'titre' => 'Réseaux',
            'description' => 'Ici, voici tout ce qui se rapporte au réseaux.',
            'nb_vue' => 0,
            'created_at' => now()
        ]);
        DB::table('sections')->insert([
            'titre' => 'Développement',
            'description' => 'Une question, un problème de développement ? Pose tes questions !',
            'nb_vue' => 0,
            'created_at' => now()
        ]);
        DB::table('sujet_categories')->insert([
            'nom' => 'Forum',
            'image'=>'images/contact-us.png',
            'section_id' => 1,
            'nb_vue' => 0,
            'created_at' => now()
        ]);
        DB::table('sujet_categories')->insert([
            'nom' => 'Études',
            'image'=>'images/contact-us.png',
            'section_id' => 1,
            'nb_vue' => 0,
            'created_at' => now()
        ]);
        DB::table('sujet_categories')->insert([
            'nom' => 'BlaBla',
            'image'=>'images/contact-us.png',
            'section_id' => 1,
            'nb_vue' => 0,
            'created_at' => now()
        ]);
        DB::table('sujet_categories')->insert([
            'nom' => 'Divers',
            'image'=>'images/contact-us.png',
            'section_id' => 1,
            'nb_vue' => 0,
            'created_at' => now()
        ]);
        DB::table('sujet_categories')->insert([
            'nom' => 'Windows',
            'image'=>'images/contact-us.png',
            'section_id' => 2,
            'nb_vue' => 0,
            'created_at' => now()
        ]);
        DB::table('sujet_categories')->insert([
            'nom' => 'Linux',
            'image'=>'images/contact-us.png',
            'section_id' => 2,
            'nb_vue' => 0,
            'created_at' => now()
        ]);
        DB::table('sujet_categories')->insert([
            'nom' => 'OS Divers',
            'image'=>'images/contact-us.png',
            'section_id' => 2,
            'nb_vue' => 0,
            'created_at' => now()
        ]);
        DB::table('sujet_categories')->insert([
            'nom' => 'Divers',
            'image'=>'images/contact-us.png',
            'section_id' => 2,
            'nb_vue' => 0,
            'created_at' => now()
        ]);
        DB::table('sujet_categories')->insert([
            'nom' => 'C/C++',
            'image'=>'images/contact-us.png',
            'section_id' => 3,
            'nb_vue' => 0,
            'created_at' => now()
        ]);
        DB::table('sujet_categories')->insert([
            'nom' => 'Divers',
            'image'=>'images/contact-us.png',
            'section_id' => 3,
            'nb_vue' => 0,
            'created_at' => now()
        ]);
        DB::table('sujet_categories')->insert([
            'nom' => 'Java',
            'image'=>'images/contact-us.png',
            'section_id' => 3,
            'nb_vue' => 0,
            'created_at' => now()
        ]);
        DB::table('sujet_categories')->insert([
            'nom' => 'Framework Web',
            'image'=>'images/contact-us.png',
            'section_id' => 3,
            'nb_vue' => 0,
            'created_at' => now()
        ]);
    }
}
