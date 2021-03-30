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
            'description' => 'Le passage de Lorem Ipsum standard, utilisé depuis 1500
Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
            'position' => 1,
            'created_at' => now()
        ]);
        DB::table('home_posts')->insert([
            'titre' => 'Le forum',
            'description' => 'Après avoir confirmé votre adresse email, vous aurez accès au forum ainsi qu\'a toute les autres fonctionnalité du site.
Le forum est un lieu de partage et d\'échange. Veuillez d\'abord lire les règles !
Les règles sont disponibles en cliquant sur ce card.',
            'lien' => 'http://followmystudent.test/front/forum/sujet/1',
            'position' => 2,
            'created_at' => now()
        ]);
    }
}
