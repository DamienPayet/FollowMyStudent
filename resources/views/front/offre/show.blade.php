@extends('layouts.templateFront')

@section('content')

<div class="section">
  <div class="content">
    <div class="container-fluid">
      <div class="row">
          <div class="col-md-12 text-left">
            <a href="{{ route('offre_front_index') }}" class="btn btn-primary btn-round">{{ __('Retour à la liste') }}</a>
        </div>
        <!-- Container descriptiion -->
        <div class="container">
          <center>
            <div class="col-sm-50">
              <div class="card">
                <div class="card-block">
                  <div class="card-header">
                    <ul class="nav nav-tabs nav-tabs-neutral justify-content-center" role="tablist" data-background-color="orange">
                      <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="offre" role="tab">{{ __('Détails de l\'offre : ') }}{{$offre->titre}}</a>
                      </li>
                    </ul>
                  </div>
          </center>
            <div class="card-body">
              <!-- Tab panes -->
              
              <div class="tab-content">
                <div class="tab-pane active" id="offre" role="tabpanel" style="display: inline-block" >
          <p style="word-break: break-all;display: inline-block">{{$offre->description }}</p>
        </div>
      </div>
    </div>
 

<!-- Fin Container descriptiion -->
<!-- Container autre -->
<div class="container">
  <center>
    <div class="row col d-flex justify-content-center">
      <!-- Colonne niveau -->
      <div class="col-sm-3">
        <div class="card">
          <div class="card-block">
            <h4 class="card-title">{{ __('Niveau requis') }}</h4>
            <span class="badge badge-warning">{{ $offre->niveau }}</span>
          </div>
        </div>
      </div>
      <!-- Colonne lieu -->
      <div class="col-sm-3">
        <div class="card">
          <div class="card-block">
            <h4 class="card-title">{{ __('Secteur') }}</h4>
            <span class="badge badge-warning">{{ $offre->lieu }}</span>
          </div>
        </div>
      </div>
    </div>
    <!-- Container liens -->
    <div class="container">
      <div class="row col d-flex justify-content-center">
        <!-- Colonne PDF -->
        <div class="col-sm-3">
          <div class="card">
            <div class="card-block">
              <h4 class="card-title">{{ __('Ficher PDF') }}</h4>
              <h6 class="btn btn-link btn-info"><a href="{{ asset($offre->pdf) }}" target="_blank">Ouvrir</a></h6>
            </div>
          </div>
        </div>
        <!-- Colonne postuler -->
        <div class="col-sm-3">
          <div class="card">
            <div class="card-block">
              <h4 class="card-title"> {{ __('Postuler') }}
              </h4>
              <h6 class="btn btn-link btn-info"><a href="lalalal" target="_blank">Je suis intéressé</a></h6>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Fin Container liens -->
  </center>
</div>
<!-- Fin Container autre -->
</div>
</div>
@endsection