@extends('layouts.templateFront')


@section('content')
<div class="section">
<p style="margin: 50px 0 10px 0;"></p>

    <div class="container card">
        <h3 class="title card-header" style="font-size: 2.2em; color: var(--primary-color); text-align: center;align-items: center;justify-content: center;">A propos de nous...</h3><br>
        <div ng-bind-html="rgpdHTML"><br></div>

        <p><b style=" font-size: 1.2em; color: var(--primary-color); text-align: center;align-items: center;justify-content: center;display: block;">Qui sommes nous ?</b>
            <br>
            <br>
        <p style="margin: 10px 0 10px 0;">Ce site a été réalisé par les personnes suivantes :</p><br>
        <li style="list-style: none;text-align:center;">Hugo BUFFARD - Développement du site : <br></li>
        <br>
        <li style="list-style: none;text-align:center;margin: 10px 0 10px 0;"> <i class="fab fa-linkedin"></i> <a href="https://fr.linkedin.com/in/hugo-buffard-39992b187" target="_blank">Linkedin</a></li>
        <br>
        <li style="list-style: none;text-align:center;margin: 10px 0 10px 0;">Damien PAYET - Développement du site : <br></li>
        <br>
        <li style="list-style: none;text-align:center;margin: 10px 0 10px 0;"> <i class="fab fa-linkedin"></i> <a href="https://fr.linkedin.com/in/damien-payet-1b7b43183" target="_blank">Linkedin</a> / <i class="fas fa-folder-open"></i> <a href="https://pfo.hacktive.live/" target="_blank">Portefolio</a></li>
        <br>
        <li style="list-style: none;text-align:center;margin: 10px 0 10px 0;">Florent PELLETIER - Développement du site et Gestion de projet : <br></li>
        <br>
        <li style="list-style: none;text-align:center;margin: 10px 0 10px 0;"> <i class="fab fa-linkedin"></i> <a href="https://fr.linkedin.com/in/florent-pelletier-8a4516151" target="_blank">Linkedin</a></li>
        <br>
        <br> <p style="margin: 10px 0 10px 0;"></p>
        <p><b style=" font-size: 1.2em; color: var(--primary-color); text-align: center;align-items: center;justify-content: center;margin: 10px 0 10px 0;display: block;">Contexte</b>
            <br>
            <br>
        <p style="margin: 5px 0 10px 0;">Follow My Student a été réalisé dans le cadre du projet pédagogique de deuxième année pour la licence ASI.
        </p>
        
    </div>
    <p style="margin: 100px 0 10px 0;"></p>

    @endsection