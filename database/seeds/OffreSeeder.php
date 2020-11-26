<?php

use Illuminate\Database\Seeder;

class OffreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('offres')->insert([
            'titre' => 'ALTERNANCE - TECHNICIEN INFORMATIQUE - H/F',
            'description' => 'Dans le cadre du développement du Groupe, nous recherchons notre prochain(e) Technicien Informatique en Alternance (H/F).

            Rattaché(e) au Directeur des Systèmes d’Informations du Groupe, vous aurez l’opportunité de travailler sur les missions suivantes, couvrant l’ensemble de nos sites :
            
            Assistance et dépannage matériel ;
            Suivi des incidents en collaboration avec nos partenaires (problèmes réseau, maintenance logicielle, etc.) ;
            Mise à disposition des outils informatiques auprès des utilisateurs (déploiement, gestion du parc, utilisation bureautique) ;
            Participation à des projets d’entreprise au sein d’une équipe ;
            Suivi du respect des règles d\'utilisation.',
            'niveau' => 'BAC',
            'type' => 'Alternance',
            'lieu' => 'Besançon',
            'entreprise' => 'Groupe Chopard Automobile',
            'nb_vue' => 0,
            'valide' => true,
            'user_id' => 1,
            'created_at' => now()
        ]);
        DB::table('offres')->insert([
            'titre' => 'TECHNICIEN INFORMATIQUE - H/F',
            'description' => 'Soleo saepe ante oculos ponere, idque libenter crebris usurpare sermonibus, omnis nostrorum imperatorum, omnis exterarum gentium potentissimorumque populorum, omnis clarissimorum regum res gestas /
            - cum tuis nec contentionum magnitudine nec numero proeliorum nec varietate
            - regionum nec celeritate conficiendi nec dissimilitudine bellorum posse conferri; 
            nec vero disiunctissimas terras citius passibus cuiusquam potuisse peragrari, quam tuis non dicam cursibus, sed victoriis lustratae sunt.',
            'niveau' => 'BTS',
            'type' => 'CDI',
            'lieu' => 'Dole',
            'entreprise' => 'XEFI',
            'nb_vue' => 0,
            'valide' => true,
            'user_id' => 1,
            'created_at' => now()
        ]);
        DB::table('offres')->insert([
            'titre' => 'ALTERNANCE - DEV INFORMATIQUE - H/F',
            'description' => 'Dans le cadre du développement du Groupe, nous recherchons notre prochain(e) Développeur Informatique en Alternance (H/F).

            Rattaché(e) au Directeur des Systèmes d’Informations du Groupe, vous aurez l’opportunité de travailler sur les missions suivantes, couvrant l’ensemble de nos sites :
            
            Assistance et dépannage matériel ;
            Suivi des incidents en collaboration avec nos partenaires (problèmes réseau, maintenance logicielle, etc.) ;
            Mise à disposition des outils informatiques auprès des utilisateurs (déploiement, gestion du parc, utilisation bureautique) ;
            Participation à des projets d’entreprise au sein d’une équipe ;
            Suivi du respect des règles d\'utilisation.',
            'niveau' => 'BTS',
            'type' => 'CDI',
            'lieu' => 'Besançon',
            'entreprise' => 'CFI',
            'nb_vue' => 0,
            'valide' => true,
            'user_id' => 1,
            'created_at' => now()
        ]);
        DB::table('offres')->insert([
            'titre' => 'EXPERT INFORMATIQUE - H/F',
            'description' => 'Soleo saepe ante oculos ponere, idque libenter crebris usurpare sermonibus, omnis nostrorum imperatorum, omnis exterarum gentium potentissimorumque populorum, omnis clarissimorum regum res gestas /
            - cum tuis nec contentionum magnitudine nec numero proeliorum nec varietate
            - regionum nec celeritate conficiendi nec dissimilitudine bellorum posse conferri; 
            nec vero disiunctissimas terras citius passibus cuiusquam potuisse peragrari, quam tuis non dicam cursibus, sed victoriis lustratae sunt.',
            'niveau' => 'Licence',
            'type' => 'CDD',
            'lieu' => 'Paris',
            'entreprise' => 'Leffe',
            'nb_vue' => 0,
            'valide' => true,
            'user_id' => 1,
            'created_at' => now()
        ]);
    }
}
