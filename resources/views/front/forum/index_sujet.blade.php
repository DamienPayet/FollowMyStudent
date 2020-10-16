@extends('layouts.templateFront')


@section('content')
<div class="wrapper">
    <div class="page-header page-header-small">
        <center>
            <img src="{{url('front/images/bg4.jpg')}}"></img>
        </center>
        <div class="content-center">
            <div class="container">
                <h1 class="title">{{$categorie->nom}}</h1>
                <div class="text-center ">
                    {{ __('Bienvenue sur cette catégorie ! N\'hésite pas à ajouter un sujet.') }}
                </div>

            </div>
        </div>
    </div>
</div>
<div class="blogs-3">
    @if($categorie->sujets->count() != 0)
    <div class="text-center" style="margin : 20px">
        <a href="{{route('sujet.create')}}">
            <button type="submit" class="btn btn-primary btn-round btn-lg">
                Ajouter un sujet
            </button>
        </a>
    </div>
    @endif
    <div class="container">
        <div class="row">
            <div class="col-md-10 ml-auto mr-auto">
                @if($categorie->sujets->count() == 0)
                <div class="section-space"></div>
                <div class="alert alert-danger" role="alert">
                    <div class="container">
                        <div class="alert-icon">
                            <i class="now-ui-icons objects_support-17"></i>
                        </div>
                        <strong>Oups!</strong> Il n'existe aucun sujet dans cette catégorie.
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">
                                <i class="now-ui-icons ui-1_simple-remove"></i>
                            </span>
                        </button>
                    </div>
                </div>
                <div class="text-center" style="margin : 20px">
                    <a href="{{route('sujet.create')}}">
                        <button type="submit" class="btn btn-primary btn-round btn-lg">
                            Ajouter un sujet
                        </button>
                    </a>
                </div>
                @else
                <h2 class="title text-center">Derniers sujets</h2>
                <br />
                <div class="row">
                    @foreach($categorie->sujets as $sujet)
                    <div class="col-md-4">
                        <div class="card card-blog" style="block-size: 400px;">
                            <div class="card-body">
                                <div>
                                    @if ($sujet->type == "Question")
                                    @if ($sujet->resolue == "0")
                                    <div>
                                        <p style="text-align:left;" class="category text-primary">{{$sujet->type}}
                                            <span style="float:right;" class="badge badge-danger">
                                                Ouverte
                                            </span>
                                        </p>
                                    </div>
                                    @elseif ($sujet->resolue == "1")
                                    <p style="text-align:left;" class="category text-primary">{{$sujet->type}}
                                        <span style="float:right;" class="badge badge-success">
                                            Résolue
                                        </span>
                                    </p>
                                    @endif
                                    @elseif ($sujet->type == "Discusion")
                                    <p style="text-align:left;" class="category text-primary">{{$sujet->type}} </p>
                                    @endif
                                    <h6 class="card-title" style="position: relative;">
                                        <a href="{{route('sujet.show', $sujet)}}">{{$sujet->titre}}</a>
                                    </h6>
                                </div>
                                <p class="card-description" style="top: 30%;position:absolute;">
                                    {{ \Illuminate\Support\Str::limit($sujet->description, 95, $end='...') }}
                                </p>
                                <div class="card-footer">
                                    <div class="author" style="bottom: 10%;position:absolute;">
                                        <img src="../../images/default-avatar.png" alt="Thumbnail Image" class="rounded-circle img-raised" width=30>
                                        @if ($sujet->user->statut == "eleve")
                                        <span class="badge badge-default">
                                            {{$sujet->user->eleve->prenom}} {{ $sujet->user->eleve->nom }}
                                        </span>
                                        @elseif ($sujet->user->statut == "admin")
                                        <span class="badge badge-warning">
                                            {{$sujet->user->admin->prenom}} {{ $sujet->user->admin->nom }}
                                        </span>
                                        @endif
                                    </div>
                                    <h6 class="text-center" style="bottom: 0;position:absolute;left:0;right:0;margin-left:auto;margin-right:auto;">
                                        <i class="now-ui-icons ui-1_calendar-60"></i> {{ \Carbon\Carbon::parse($sujet->created_at)->format('d/m/Y')}}
                                    </h6>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
<div class="section-space"></div>
@endsection