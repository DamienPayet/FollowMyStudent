@extends('layouts.app', ['class' => 'off-canvas-sidebar', 'activePage' => 'Nos offres > Détail', 'title' => __('Nos offres')])

@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title ">{{ __('Détails de l\'offre >') }} {{ $offre->titre }}</h4>
          </div>
          <!-- Retour -->
          <div class="card-body ">
            <div class="row">
              <div class="col-md-12 text-right">
                <a href="{{ route('offres.index') }}" class="btn btn-sm btn-primary">{{ __('Retour à la liste') }}</a>
              </div>
            </div>
            <div class="card-body">
              <h3 class=" text-primary">
                <center> {{ __('Description') }}</center>
              </h3>
              <pre width="1">{{ $offre->description }}</pre>
              <center>
                <h3 class=" text-primary">
                  {{ __('Niveau') }}
                </h3>
                <p>{{ $offre->niveau }}</p>
                <h3 class=" text-primary">
                  {{ __('PDF de l\'offre') }}
                </h3>
                <p><a href="{{ asset($offre->pdf) }}" target="_blank">Ouvrir</a></p>
                <h3 class=" text-primary">
                  {{ __('Coordonnées de l\'entreprise') }}</h3>
              </center>
              <div class="row">
                <div class="col-12 text-left">
                  <i class="fa fa-briefcase" style="font-size:24px"></i>
                  {{ __(' :  ') }}{{ $offre->entreprise->nom }}</div>
              </div>
              <div class="row">
                <div class="col-12 text-left">
                  <i class="fa fa-location-arrow" style="font-size:24px"></i>
                  {{ __(' :  ') }} {{ $offre->entreprise->adresse }}</div>
              </div>
              <div class="row">
                <div class="col-12 text-left">
                  <i class="fa fa-phone" style="font-size:24px"></i>
                  <a href="tel:+{{ $offre->entreprise->telephone }}">
                    {{ __(' :  ') }} {{$offre->entreprise->telephone }}</a></div>
              </div>
              <div class="row">
                <div class="col-12 text-left">
                  <i class="fa fa-at" style="font-size:24px"></i>
                  <a href="mailto:{{ $offre->entreprise->contact }}">
                    {{ __(' :  ') }} {{$offre->entreprise->contact }}</a></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  @endsection