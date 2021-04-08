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
            'image'=>'front/images/categories/FORUM.jpg',
            'section_id' => 1,
            'nb_vue' => 0,
            'created_at' => now()
        ]);
        DB::table('sujet_categories')->insert([
            'nom' => 'Études',
            'image'=>'front/images/categories/learning-concept.png',
            'section_id' => 1,
            'nb_vue' => 0,
            'created_at' => now()
        ]);
        DB::table('sujet_categories')->insert([
            'nom' => 'BlaBla',
            'image'=>'front/images/categories/blabla.jpeg',
            'section_id' => 1,
            'nb_vue' => 0,
            'created_at' => now()
        ]);
        DB::table('sujet_categories')->insert([
            'nom' => 'Divers',
            'image'=>'front/images/categories/divers.png',
            'section_id' => 1,
            'nb_vue' => 0,
            'created_at' => now()
        ]);
        DB::table('sujet_categories')->insert([
            'nom' => 'Windows',
            'image'=>'front/images/categories/windows.png',
            'section_id' => 2,
            'nb_vue' => 0,
            'created_at' => now()
        ]);
        DB::table('sujet_categories')->insert([
            'nom' => 'Linux',
            'image'=>'front/images/categories/linux.png',
            'section_id' => 2,
            'nb_vue' => 0,
            'created_at' => now()
        ]);
        DB::table('sujet_categories')->insert([
            'nom' => 'OS Divers',
            'image'=>'front/images/categories/ciscso.png',
            'section_id' => 2,
            'nb_vue' => 0,
            'created_at' => now()
        ]);
        DB::table('sujet_categories')->insert([
            'nom' => 'Divers',
            'image'=>'front/images/categories/divers.png',
            'section_id' => 2,
            'nb_vue' => 0,
            'created_at' => now()
        ]);
        DB::table('sujet_categories')->insert([
            'nom' => 'C/C++',
            'image'=>'front/images/categories/1200px-ISO_C++_Logo.svg.png',
            'section_id' => 3,
            'nb_vue' => 0,
            'created_at' => now()
        ]);
        DB::table('sujet_categories')->insert([
            'nom' => 'Divers',
            'image'=>'front/images/categories/ProgrammingLanguage1-1.jpg',
            'section_id' => 3,
            'nb_vue' => 0,
            'created_at' => now()
        ]);
        DB::table('sujet_categories')->insert([
            'nom' => 'Java',
            'image'=>'front/images/categories/java.png',
            'section_id' => 3,
            'nb_vue' => 0,
            'created_at' => now()
        ]);
        DB::table('sujet_categories')->insert([
            'nom' => 'Framework Web',
            'image'=>'front/images/categories/framework.png',
            'section_id' => 3,
            'nb_vue' => 0,
            'created_at' => now()
        ]);
        DB::table('sujets')->insert([
            'titre' => 'Les règles du forum',
            'description'=>'Ce forum est avant tout un espace d\'expression ouvert à tous.


Ici, la liberté d\'expression est de mise à condition de respecter des règles de bonne conduite.
            
            
Merci donc de respecter certaines règles et de bannir les propos suivants:
            
* Propos relevant de la diffamation, de l\'injure ou de propos grossiers.
* Propos cautionnant des actes illicites ou dangereux.
* Propos à caractère sexuel, politique, raciste et tout propos de nature à porter atteinte à une personne quelle qu\'elle soit.
            
Les personnes postant ou encourageant ce genre de messages encourront le risque de se faire bannir intégralement et sans avertissement du présent forum.
            
            
De manière générale le forum est un lieu de discussion ouvert à tous sur lequel tous les sujets peuvent être abordés, dans la mesure de leur intérêt général.
            
            
Soigner son orthographe et éviter d\'écrire en majuscule, sont des marques de respect pour ceux qui lisent.
            
            
Ne pas non plus se formaliser avec les accords de grammaire, mais y faire attention est un bien pour tous.
            
            
Dans un souci de bonne humeur, de convivialité et de bonne ambiance générale, merci de respecter ces quelques règles élémentaires.',
            'type' => 'Discussion',
            'categorie_id' => 1,
            'user_id' => 1,
            'resolue' => 1,
            'nb_vue' => 0,
            'created_at' => now()
        ]);
    }
}
