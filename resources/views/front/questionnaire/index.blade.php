@extends('layouts.templateFront')

@section('content')
<div class="section">
    <div class="container">
        <div id="offers">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body ">
                            @if ($user->qreponses->count() == 0)
                            <div class="alert alert-danger" role="alert">
                                <div class="container">
                                    <div class="alert-icon">
                                        <i class="now-ui-icons travel_info"></i>
                                    </div>
                                    <center>OUPS! Tu n'as pas encore répondu au questionnaire.</center>
                                </div>
                            </div>

                            @elseif ($user->qreponses->count() < $question->count())
                            <div class="alert alert-warning" role="alert">
                                <div class="container">
                                    <div class="alert-icon">
                                        <i class="now-ui-icons travel_info"></i>
                                    </div>
                                    <center>ATTENTION! Tu n'a pas terminé le questionnaire.</center>
                                </div>
                            </div>
                            @elseif ($user->qreponses->count() == $question->count())
                            <div class="alert alert-success" role="alert">
                                <div class="container">
                                    <div class="alert-icon">
                                        <i class="now-ui-icons travel_info"></i>
                                    </div>
                                    <center>PARFAIT! Tu as répondu à toutes les questions.</center>
                                </div>
                            </div>
                            @endif
                            <h1 class="nb-offer"><br>
                                Le <b>Questionnaire</b>
                            </h1>
                            <center>
                                <p><b>Répondre aux questions ci après est essentiel pour nous.</br>Tes réponses vont nous permettre de receuillir certaines informations afin de faire évoluer la formation ASI.
                                        </br>Tout cela dans le but de répondre aux besoins d'un métier qui évolue chaque jours.
                                    </b></p>
                            </center>
                            <div id="acceuil">
                                <br>
                                <div class="container-fluid">
                                    <!-- <div class="text-center" style="margin : 20px">

                                        <div class="text-center">
                                            <img style="width : 20% ;" src="{{url('front/images/v2.png')}}">
                                        </div>

                                    </div>-->
                                    <div class="container">
                                        @if ($user->qreponses->count() == 0)
                                        <div class="row">
                                            <div class="col text-center">
                                                <a href="{{route('questions')}}">
                                                    <button type="submit" class="btn btn-primary btn-round btn-lg">
                                                        Démarrer
                                                    </button>
                                                </a>
                                            </div>
                                        </div>
                                        @elseif ($user->qreponses->count() < $question->count())
                                        <div class="row">
                                            <div class="col text-center">
                                                <a href="{{route('questions')}}">
                                                    <button type="submit" class="btn btn-primary btn-round btn-lg">
                                                        Reprendre là où je me suis arreté
                                                    </button>
                                                </a>
                                            </div>
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
