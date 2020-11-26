@extends('layouts.templateFront')

@section('content')
<div class="content">
  <div class="section section-about-us">
    <div class="container">
      <div class="col-md-12 text-center">
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
          <div class="row col-md-10 ml-auto mr-auto">
            <div class="col-md-3 card">
              <div class="team-player"><br>
                <i class="now-ui-icons education_hat" style="width: 30px"></i>
                <p class="description">{{ __('Niveau requis') }}</p><br>
                <p class="description btn badge badge-default">{{ $offre->niveau }}</p><br>
                <pre style="white-space: pre-wrap;">
              </div>
            </div>
            <div class="col-md-4 card">
              <div class="team-player"><br>
                <i class="now-ui-icons education_hat" style="width: 30px"></i>
                <p class="description">{{ __('Entreprise') }}</p><br>
                <p class="description btn badge badge-default">{{ $offre->entreprise }}</p><br>
                <pre style="white-space: pre-wrap;">
              </div>
            </div>
            <div class="col-md-3 card">
              <div class="team-player"><br>
                <i class="now-ui-icons location_pin" style="width: 30px"></i>
                <p class="description ">{{ __('Secteur') }}</p><br>
                <p class="description  btn badge badge-default">{{ $offre->lieu }}</p><br>
                <pre style="white-space: pre-wrap;">
              </div>
            </div>

          </div>
          <!---->
          <div class="row col-md-8 ml-auto mr-auto">
            <div class="col-md-4 card" >
              <div class="team-player"><br>
                <i class="now-ui-icons files_box" style="width: 30px"></i>
                <p class="description">{{ __('Fiche PDF') }}</p><br>
                @if($offre->pdf != null)
                <p class="description">
                  <a href="{{ asset($offre->pdf) }}" class="btn badge badge-default" target="_blank">Ouvrir</a>
                </p>
                @elseif($offre->pdf == null)
                <p class="description btn badge badge-default" style="background-color:#d0d2cd">Pas de pdf</p><br>
                @endif
              </div>
            </div>
            <div class="col-md-4 card">
              <div class="team-player"><br>
                <i class="now-ui-icons education_paper" style="width: 30px"></i>
                <p class="description">{{ __('Accéder à l\'offre') }}</p><br>
                @if($offre->pdf != null)
                <p class="description">
                  <a href="{{ asset($offre->pdf) }}" class="btn badge badge-default" target="_blank">Ouvrir</a>
                </p>
                @elseif($offre->pdf == null)
                <p class="description btn badge badge-default" style="background-color:#d0d2cd">Pas de lien</p>
                @endif
                <pre style="white-space: pre-wrap;">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection