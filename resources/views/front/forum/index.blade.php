@extends('layouts.templateFront')


@section('content')
<div class="wrapper">
  <div class="page-header page-header-small">
    <center>
      <img src="{{url('front/images/bg4.jpg')}}"></img>
    </center>
    <div class="content-center">
      <div class="container">
        <h1 class="title">Bienvenue sur le forum !</h1>
        <div class="text-center">
          {{ __('Besoin d\'aide? Une question? Ce forum est fait pour toi.') }}
        </div>
        <div class="text-center">
          {{ __('Avant toute chose, merci de lire, les ')}}
          <a href="#rules" data-toggle="tab">règles.</a>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="cd-section" id="features">
  <div class="text-center" style="margin : 20px">
    <a href="{{route('sujet.create')}}">
      <button type="submit" class="btn btn-primary btn-round btn-lg">
        Ajouter un sujet
      </button>
    </a>
  </div>
  <div class="container">
    @foreach ($section as $sections)

    <div class="features-8 section-image" style="background-image: url('front/images/bg6.jpg')">
      <div class="col-md-7 ml-auto mr-auto text-center">
        <h3 class="title">
          <i class="now-ui-icons now-ui-icons files_paper" style="width : 30px">
          </i>
          {{$sections->titre}}</h3>
        <h5 class="description"> {{$sections->description}}</h5>
      </div>
      <div class="container">
        <div class="row">
          @foreach ($sections->categories as $categorie)

          <div class="col-md-3">
            <div class="info text-center">
              <h5 class="btn btn-outline-primary btn-round btn-lg">
                <a href="{{route('sujet.index', $categorie->id, $sujets)}}">{{$categorie->nom}}</a>
              </h5>
            </div>
          </div>
          @endforeach

        </div>
      </div>
    </div>
    @endforeach

    <div class="wrapper">

      <div class="section-space"></div>

      <div class="container">
        <div class="row">
          <div class="col-md-3 ml-auto mr-auto text-center">

            <!-- -->
            <h3>Dernières catégories</h3>
            @foreach($categories as $categorie)
            <div class="blocktxt">
              <a href="{{route('sujet.index',$categorie->id, $sujets)}}" class="btn btn-link">{{$categorie->nom}}</a>
            </div>
            @endforeach
            <!-- -->
          </div>
          <div class="col-md-3 ml-auto mr-auto text-center">
            <h3>Sujets récents</h3>
            <div class="divline"></div>
            @foreach($sujets as $sujet)
            <div class="blocktxt">
              <a href="{{route('sujet.show', $sujet)}}" class="btn btn-link">{{$sujet->titre}}</a>
            </div>
            @endforeach
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="section-space"></div>
@endsection