<?php

use Illuminate\Database\Seeder;

class HomePostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('home_posts')->insert([
            'titre' => 'Ouverture du site',
            'description' => '
Bienvenue !!!
Nous sommes très heureux de vous accueillir sur notre nouveau site : Follow My Student.
Vous devez lors de votre première connexion changer votre mot de passe et vérifier votre adresse email.
Ensuite, vous aurez accès à l\'ensemble des fonctionnalités du site...à vous de découvrir 😀!',
            'position' => 1,
            'created_at' => now()
        ]);
        DB::table('home_posts')->insert([
            'titre' => 'Le forum',
            'description' => '
Le forum est un lieu de partage et d\'échange. Veuillez d\'abord lire les règles !
Elles sont disponibles en cliquant sur ce card.',
            'lien' => 'http://followmystudent.test/front/forum/sujet/1',
            'position' => 2,
            'created_at' => now()
        ]);
    }
}
