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

    <div class="container">
        <div class="row">

            <div class="col-md-10 ml-auto mr-auto">
                <h2 class="title text-center">Derniers sujets</h2>

                <br />
                @foreach($categorie->sujets as $sujet)
                <div class="card card-plain card-blog">

                    <div class="row">
                        <div class="col-md-4">
                            <div class="card-image">
                                <img class="img img-raised rounded" alt="Raised Image" src="../../images/ryan.jpg" />
                            </div>
                        </div>
                        <div class="col-md-8">
                            <h3 class="card-title">
                                <a href="#more">{{$sujet->titre}}</a>
                            </h3>
                            <p class="card-description">
                                {{ \Illuminate\Support\Str::limit($sujet->description, 250, $end='...') }}
                            </p>

                            <div class="author">
                                <span style="float:left;"> <img src="../../images/default-avatar.png" alt="Thumbnail Image" class="rounded-circle img-raised" width=30>
                                    {{$sujet->user_id}}</span> <span class="text-muted" style="float:right;">Créé le {{ \Carbon\Carbon::parse($sujet->created_at)->format('d/m/Y')}}</span>`
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>

        </div>

    </div>
</div>

<div class="section-space"></div>

@endsection