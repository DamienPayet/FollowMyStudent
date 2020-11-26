@extends('layouts.templateFront')

@section('content')
<div class="section">
  <div class="container">
    <div id="offers">
      <div class="text-center" style="margin : 20px">
      @if(session()->has('success'))
      <div class="alert alert-success">
        {{ session()->get('success') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">
            <i class="now-ui-icons ui-1_simple-remove"></i>
          </span>
        </button>
      </div>
      @endif
      @if(session()->has('errors'))
      <div class="alert alert-danger" role="alert">
        @foreach($errors->all() as $error)
        {{$error}}
        <br>
        @endforeach
      </div>
      @endif
        <a href="{{route('offre_front_create')}}">
          <button type="submit" class="btn btn-primary btn-round btn-lg">
            Ajouter une offre
          </button>
        </a>
      </div>
      <h1 class="nb-offer"><br>
        Les <b>offres</b> disponibles
      </h1>
      <div class="offers-container tab">
        @foreach ($offres as $offre)
        @if($offre->valide == 1)
        <a href="{{ route('offre_front_show', $offre) }}" class="card">
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
        @endif
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
        <a href="{{ route('offre_front_show', $offre) }}" class="card">
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