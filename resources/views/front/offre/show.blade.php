@extends('layouts.templateFront')

@section('content')
<div class="content">
  <div class="section section-about-us">
    <div class="container">
      <div class="col-md-12 text-left">
        <a href="{{ route('offre_front_index') }}" class="btn btn-primary btn-round">{{ __('Retour à la liste') }}</a>
      </div>
      <div class="card">
        <div class="col-md-8 ml-auto mr-auto">
          <h3 class="title card-header" style="font-size: 1.9em;">
            <center>{{$offre->titre}}</center>
          </h3>
          <pre style="white-space: pre-wrap;">
          <pre style="white-space: pre-wrap;">
          <h5 class="description">{{$offre->description }}</h5>
          </pre>
        </div>
      </div>
    <div class="text-center">
        <h2 class="title" style="font-size: 1.9em;">Informations</h2><br>
        <div class="team">
          <div class="row">
            <div class="col-md-2 card">
              <div class="team-player"><br>
                <i class="now-ui-icons education_hat" style="width: 30px"></i>
                <p class="category text-muted">{{ __('Niveau requis') }}</p><br>
                <p class="description btn">{{ $offre->niveau }}</p><br>
              </div>
            </div>
            <div class="col-md-2 card">
              <div class="team-player"><br>
                <i class="now-ui-icons location_pin" style="width: 30px"></i>
                <p class="category text-muted">{{ __('Secteur') }}</p><br>
                <p class="description  btn">{{ $offre->lieu }}</p><br>
              </div>
            </div>
            <div class="col-md-2 card">
              <div class="team-player"><br>
                <i class="now-ui-icons files_box" style="width: 30px"></i>
                <p class="category text-muted">{{ __('Fiche PDF') }}</p><br>
                <p class="description">
                  <a href="{{ asset($offre->pdf) }}" class="btn btn-link" target="_blank">Ouvrir</a></p><br>
              </div>
            </div>
            <div class="col-md-2 card">
              <div class="team-player"><br>
                <i class="now-ui-icons education_paper" style="width: 30px"></i>
                <p class="category text-muted">{{ __('Accéder à l\'offre') }}</p><br>
                <p class="description">
                  <a href="{{ asset($offre->pdf) }}" class="btn btn-link" target="_blank">Ouvrir</a></p><br>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection