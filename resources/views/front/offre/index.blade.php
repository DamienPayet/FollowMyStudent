@extends('layouts.templateFront')

@section('content')
<div class="section">
  <div class="container">
    <div id="offers">
      <h1 class="nb-offer"><br>
        Les <b>offres</b> disponibles
      </h1>
      <div class="offers-container tab">
        @foreach ($offres as $offre)
        <a href="{{ route('offre_front_show', $offre) }}" class="card" data-statuts="no_started" data-oscore="1" data-message="">
          <div class="card-header">
            <div class="card-info">
              <h2 class="title">{{$offre->titre}}</h2>
            </div>
            <div class="localisation" style="font-size: 0.9em;">
              <p><i class="now-ui-icons location_pin"></i> {{ $offre->lieu }}</p>
            </div>
            <p class="time">Mise en ligne le {{ \Carbon\Carbon::parse($offre->created_at)->format('d/m/Y')}} </p>
            <div class="card-tags">
              <ul>
                <li>{{ $offre->type }}</li>
              </ul>
            </div>
          </div>
          <div class="card-body">
            <p>{{ \Illuminate\Support\Str::limit($offre->description, 250, $end='...') }}</p>
          </div>
        </a>
        @endforeach
      </div>
      {{ $offres->links() }}
    </div>
  </div>
  <div class="container">
    <div id="offers">
      <h1 class="nb-offer"><br>
        Les <b>plus populaires</b>
      </h1>
      <div class="offers-container tab">
        @foreach ($pop_offres as $offre)
        <a href="{{ route('offre_front_show', $offre) }}" class="card" data-statuts="no_started" data-oscore="1" data-message="">
          <div class="card-header">
            <div class="card-info">
              <h2 class="title">{{$offre->titre}}</h2>
            </div>
            <div class="localisation" style="font-size: 0.9em;">
              <p><i class="now-ui-icons location_pin"></i> {{ $offre->lieu }}</p>
            </div>
            <p class="time">Mise en ligne le {{ \Carbon\Carbon::parse($offre->created_at)->format('d/m/Y')}} </p>
            <div class="card-tags">
              <ul>
                <li>{{ $offre->type }}</li>
              </ul>
            </div>
          </div>
          <div class="card-body">
            <p>{{ \Illuminate\Support\Str::limit($offre->description, 250, $end='...') }}</p>
          </div>
        </a>
        @endforeach
      </div>
    </div>
  </div>
</div>
@endsection