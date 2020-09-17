@extends('layouts.templateFront')

@section('content')
<div class="section">
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="card-body">
            <div class="row">
              <div class="col-md-12 text-left">
                <h6> <span class="badge badge-default">{{ __('Détails de l\'offre :') }} {{ $offre->titre }}</span></h6>
    
              </div>
              <div class="col-md-12 text-right">
                <a href="{{ route('offre_front_index') }}" class="btn btn-primary btn-outline-primary btn-round">{{ __('Retour à la liste') }}</a>
              </div>
            </div>
            <!-- Retour -->
            <div class="card-body">
              <div class="row">

              </div>
              <div class="card-body">
                <h5 class=" text-primary">
                  <center> {{ __('Description') }}</center>
                </h5>
                <p>{{ $offre->description }}</p>
                <center>
                  <h5 class=" text-primary">
                    {{ __('Niveau') }}
                  </h5>
                  <span class="badge badge-primary">{{ $offre->niveau }}</span>
                  <h5 class=" text-primary">
                    {{ __('PDF de l\'offre') }}
                  </h5>
                  <p><a href="{{ asset($offre->pdf) }}" target="_blank" >Ouvrir</a></p>
                  <h5 class=" text-primary">
                    {{ __('Lien de l\'offre') }}
                  </h5>
                  <h6 class="btn btn-link btn-info"><a href="lalalal" target="_blank">Ouvrir</a></h6>
                  <p></p>
                </center>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  @endsection