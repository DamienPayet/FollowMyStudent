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
            'nb_vue' => 5,
            'valide' => true,
            'user_id' => 1,
            'created_at' => now()
        ]);
        DB::table('offres')->insert([
            'titre' => 'Technicien informatique itinérant H/F',
            'description' => 'Et si vous mettiez votre optimisme au service de la plus belle des causes : La santé et le bien-être de tous ? En tant qu\'expert en solutions informatiques liées à la Santé, le Groupe Pharmagest (1070 collaborateurs et 148 millions d\'euros de CA), filiale de La Coopérative Welcoop, est un acteur incontournable de l\'innovation au service des professionnels de santé et des patients
            Au cœur des mutations du système de santé, le Groupe Pharmagest est à la pointe de tous les défis technologiques allant du logiciel métier du pharmacien, à la digitalisation du point de vente, en passant par le suivi des patients grâce notamment à l\'intelligence artificielle et aux objets connectés
            La Coopérative Welcoop créée en 1935 (1 600 collaborateurs, 3 800 pharmaciens coopérateurs, 300 millions d’euros de CA) n’a eu de cesse de faire évoluer ses domaines d’activités pour offrir aux patients le meilleur de la Santé.
            Elle est au cœur de tous les défis en la matière : de la e-santé via l’intelligence artificielle, au maintien à domicile des patients, aux produits de santé et de bien-être, en passant par la fluidité des données de santé sécurisées,…
            La Coopérative Welcoop est aujourd’hui la 1ère plateforme de santé avec l’ensemble de ses entités qui forment un écosystème unique en France et à l’International.Ce que nous vous proposons : - Un secteur d’activité tourné vers l’avenir (la Santé),
            Une entreprise pérenne, innovante et reconnue sur son marché,
            Un parcours d’intégration pour vous offrir toutes les chances de réussite,
            Des perspectives d’évolution et de mobilité interne réelles,
            Un management de proximité et une ambiance conviviale,
            Des valeurs fortes : Anticipation, Expertise, Proximité et Optimisme ; une fierté d’appartenance à un groupe créatif, solidaire et audacieux,
            Rattaché (e) à notre agence régionale de Dijon, vous vous interviendrez dans l’installation et le paramétrage des matériels informatiques de nos clients pharmaciens. Vous effectuerez également, sur site ou par téléphone, des dépannages ou des visites préventives techniques.
            Acteur / actrice de terrain, idéalement situé(e) sur le secteur géographique d’affectation, et en tant que partenaire de confiance, vous aiderez les clients dans la prise en main de leurs outils et serez à leurs côtés sur le plan du suivi et de la maintenance ; tout ceci en lien étroit avec l’équipe commerciale et avec le soutien de notre service client/support national.
            
            A propos de vous :
            Vous voulez exprimer votre sens du partage et vous sentir chaque jour utile ? Mettez votre savoir-faire et votre personnalité au service de celles et ceux qui font avancer la Santé.
            De formation Bac +2 minimum (BTS, IUT) vous êtes doté(e) de solides connaissances en gestion et en informatique (réseaux, logiciels, systèmes d’exploitation,…).
            
            Vos atouts pour réussir :
            Votre organisation et votre autonomie
            Votre sens du service client
            Votre esprit de synthèse
            Votre réactivité et votre pédagogie.',
            'niveau' => 'BTS',
            'type' => 'CDI',
            'lieu' => 'Besançon',
            'entreprise' => 'La Coopérative Welcoop',
            'nb_vue' => 4,
            'valide' => true,
            'user_id' => 1,
            'created_at' => now()
        ]);
        DB::table('offres')->insert([
            'titre' => 'Conception et développement d\'application informatique H/F',
            'description' => 'Conception et développement des applications qui ne sont plus maintenables à ce jour (conçues en langage VB6) avec l\'arrivée de Windows 10.
            En lien directement avec les utilisateurs, vous aurez en charge le projet de la phase de définition du besoin jusqu\'à la mise en production et vous assurerez la phase de post démarrage.
            Vous serez également force de proposition dans la solution que vous proposerai au client afin de gagner en performance et en productivité.
            
            Profil
            Formation BAC + 5 Informatique
            
            Autonomie
            Rigueur
            Force de proposition
            
            Durée du contrat
            6 mois
            
            Localisation du poste
            Pays
            Europe, France, Franche-Comté, Haute Saône (70)
            
            Ville
            Vesoul
            Critères candidat
            Niveau de diplôme préparé
            Bac+5
            
            Langues
            Français (C1 - Courant (3,5 - 4,4 Bright))',
            'niveau' => 'BTS',
            'type' => 'CDD',
            'lieu' => 'Vesoul',
            'entreprise' => 'PSAPeugeotCitroen',
            'nb_vue' => 3,
            'valide' => true,
            'user_id' => 1,
            'created_at' => now()
        ]);
        DB::table('offres')->insert([
            'titre' => 'DEVELOPPEUR INFORMATIQUE - H/F',
            'description' => 'Nous recherchons un(e) Développeur informatique C#/.NET pour notre société K Services qui possède plusieurs sites e-commerce dont les domaines d\'activité sont le jardin, la piscine et la décoration d\'intérieur.
            Voici notre site : https://www.kservices.fr
            
            En rejoignant notre équipe informatique composée de 2 personnes, vos missions principales seront les suivantes :
            
            · Développer des applications pour la gestion des commandes, du service client, de la préparation de commandes,
            
            · Déployer vos solutions en environnements de production,
            
            · Participer à la formation des utilisateurs.
            
            Profil recherché :
            
            Vous disposez d’au minimum 1 année d’expérience sur un poste similaire, notamment en développement des technologies .net (C#,VB .Net,).
            
            Vous avez également des connaissances en modélisation et utilisation de bases de données.
            
            Vous êtes autonome, rigoureux et faites preuve d’initiative.
            
            Contrat et rémunération :
            
            Durée de travail : 39h hebdomadaire.
            
            Rémunération : 2000 € brut mensuel (peut être variable selon expérience)
            
            Avantages : Chèques déjeuners, Mutuelle prise en charge à 100% par la société, possibilité de télétravailler ponctuellement.
            
            Type d\'emploi : CDD d’1 an à pourvoir dès que possible.
            
            Ce poste vous correspond et vous intéresse ? Transmettez-nous vite votre candidature !
            
            Durée du contrat : 12 mois
            
            Type d\'emploi : Temps plein, CDD
            
            Salaire : à partir de 2 000,00€ par mois
            
            Avantages :
            
            Titre-restaurant
            Travail à Distance
            Horaires :
            
            Du Lundi au Vendredi
            Travail en journée
            Mesures COVID-19:
            Toutes les mesures sanitaires sont misent en place pour assurer la santé et la sécurité des salariés.
            
            Expérience:
            
            Développeur informatique h/f ou similaire: 1 an (Requis)
            Télétravail:
            
            Oui, parfois.',
            'niveau' => 'Licence',
            'type' => 'CDD',
            'lieu' => 'Beaufort',
            'entreprise' => 'K Services',
            'nb_vue' => 2,
            'valide' => true,
            'user_id' => 1,
            'created_at' => now()
        ]);
        DB::table('offres')->insert([
            'titre' => 'Chef de Projet IT',
            'description' => '30 ans d’expérience au service des entreprises et collectivités de Saône et Loire.
            Walpi accompagne ses clients dans la transformation numérique à travers son offre globale d’équipement et de service. Concentrez-vous sur votre activité !
            
            Walpi est votre interlocuteur unique faisant appel à ses Experts Métiers pour vous accompagner dans vos choix et pour assurer le suivi technique.
            
            En 30 ans, nous avons développé nos compétences à travers 8 domaines d’activité.
            
            Travail en équipe avec les différents services de l\'entreprise (Commerce - Service Technique - ADV - Communication)
            
            Former les Ambassadeurs aux produits IT proposés par l\'entreprise.
            
            Accompagner les Ambassadeurs Walpi en rdv clients (R1/R2/R3)
            
            Apporter les préconisations techniques lors des RDV en fonction des besoins clients.
            
            Faire évoluer l\'offre en relation avec nos fournisseurs.
            
            Rédaction des offres commerciales avec les Ambassadeurs Walpi.
            
            Assurer le bonne réalisation des installations clients en relation avec le service technique et le service administratif.
            
            Mettre les actions nécessaires en place pour atteindre les objectfis fixés par l\'entreprise.
            
            Niveau d`\'étude : Bac+2
            
            Expérience : 5 ans ou plus de le domaine Informatique et ou Telecom
            
            Compétences :
            
            Travail en équipe
            
            Connaissance Techniques IT
            
            Sens de l\'organisation',
            'niveau' => 'Licence',
            'type' => 'CDI',
            'lieu' => 'Montceau les Mines',
            'entreprise' => 'Hexapage',
            'nb_vue' => 1,
            'valide' => true,
            'user_id' => 1,
            'created_at' => now()
        ]);
    }
}
