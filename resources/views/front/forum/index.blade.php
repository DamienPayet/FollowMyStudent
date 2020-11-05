@extends('layouts.templateFront')


@section('content')
<div class="wrapper">
  <div class="page-header page-header-small">
    <center>
      <img src="{{url('front/images/bg4.jpg')}}"></img>
    </center>
    <div class="content-center">
      <div class="container">
        <h1 class="title" style="font-size: 4.2em;">Bienvenue sur le forum !</h1>
        <br>
        <div class="text-center" style="font-size: 1.2em;">
          {{ __('Besoin d\'aide? Une question? Ce forum est fait pour toi.') }}
        </div>
        <br> <br>


        <div class="text-center" style="font-size: 1.5em;">
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
    @if ($sections->categories->count() != 0)
    <div class="features-8 section-image" style="background-image: url('front/images/bg6.jpg')">
      <div class="col-md-7 ml-auto mr-auto text-center">
        <h3 class="title" style="font-size: 2.2em; color: var(--primary-color);">
          <i class="now-ui-icons now-ui-icons files_paper" style="width : 30px">
          </i>
          {{$sections->titre}}</h3><br>
        <h5 class="description"> {{$sections->description}}</h5>
      </div><br>
      <div class="container">
        <div class="categories-container tab">

          @foreach ($sections->categories as $categorie)
          <a href="{{ route('sujet.index', $categorie->id, $sujets) }}" class="card" style=" width: 130px;height: 50px; text-align: center;align-items: center;
    justify-content: center;">
            {{$categorie->nom}}
          </a>
          @endforeach
        </div>
        @endif
      </div>
    </div>
    @endforeach

    <div class="wrapper">
      <div class="section-space"></div>
      <div class="container">
        <div class="row">
          <div class="col-md-3 ml-auto mr-auto text-center">
            <h3 style="font-size: 1.8em;">Dernières catégories</h3><br>
            @foreach($categories as $categorie)
            <div class="categories-container tab">
              <a href="{{route('sujet.index',$categorie->id, $sujets)}}" class="card" style=" width: 200px;height: 50px;align-items: center;
    justify-content: center;">{{$categorie->nom}}</a>
            </div>
            @endforeach
            <!-- -->
          </div>
          <div class="col-md-3 ml-auto mr-auto text-center">
            <h3 style="font-size: 1.8em;">Sujets les plus récents</h3><br>
            @foreach($sujets as $sujet)
            <div class="categories-container tab">
              <a href="{{route('sujet.show', $sujet)}}" class="card" style=" width: 200px;height: 50px;align-items: center;
    justify-content: center;">{{$sujet->titre}}</a>
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