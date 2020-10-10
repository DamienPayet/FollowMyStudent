@extends('layouts.templateFront')

@section('content')
<div class="content">
  <div class="section section-about-us">
    <div class="container">
      <div class="col-md-12 text-left">
        <a href="{{ route('offre_front_index') }}" class="btn btn-primary btn-round">{{ __('Retour à la liste') }}</a>
      </div>
      <div class="row">
        <div class="col-md-8 ml-auto mr-auto">
          <h3 class="title"><center>{{$offre->titre}}</center></h3>
          <pre style="white-space: pre-wrap;">
          <h5 class="description">{{$offre->description }}</h5>
          </pre>
        </div>
      </div>
    </div>
    <div class="section section-team text-center">
      <div class="container">
        <h2 class="title">Informations</h2>
        <div class="team">
          <div class="row">
            <div class="col-md-3">
              <div class="team-player">
                <i class="now-ui-icons education_hat" style="width : 30px"></i>
                <p class="category text-muted">{{ __('Niveau requis') }}</p>
                <p class="description">{{ $offre->niveau }}</p>
              </div>
            </div>
            <div class="col-md-3">
              <div class="team-player">
                <i class="now-ui-icons location_pin" style="width : 30px"></i>
                <p class="category text-muted">{{ __('Secteur') }}</p>
                <p class="description">{{ $offre->lieu }}</p>
              </div>
            </div>
            <div class="col-md-3">
              <div class="team-player">
                <i class="now-ui-icons files_box" style="width : 30px"></i>
                <p class="category text-muted">{{ __('Fiche PDF') }}</p>
                <p class="description">
                  <a href="{{ asset($offre->pdf) }}" target="_blank">Ouvrir</a></p>
              </div>
            </div>
            <div class="col-md-3">
              <div class="team-player">
                <i class="now-ui-icons education_paper" style="width : 30px"></i>
                <p class="category text-muted">{{ __('Accéder à l\'offre') }}</p>
                <p class="description">
                  <a href="{{ asset($offre->pdf) }}" target="_blank">Ouvrir</a></p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection