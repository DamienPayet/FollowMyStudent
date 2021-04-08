@extends('layouts.templateFront')

@section('content')
<div class="section">
  <div class="container">
    <div id="offers">

      <div class="text-center" style="margin : 20px">
        <a href="{{route('sujet.create')}}">
          <button type="submit" class="btn btn-primary btn-round btn-lg">
            Créer un nouveau sujet
          </button>
        </a>
      </div>
      <div class="row">
        <div class="container">
          <div id="offers">
            <h1 class="nb-offer">
              Mes sujets
            </h1>
            <div class="offers-container tab">
              @foreach($sujets as $sujet)
              @if ($sujet->user_id == $user->id)
              <a href="{{ route('sujet.show', $sujet) }}" class="card">
                <div class="card-header">
                  <div class="card-info">
                    <h2><b>{{$sujet->titre}}</b></h2>
                  </div>
                  <div class="localisation">
                  </div>
                  <p class="time">Mise en ligne le {{ \Carbon\Carbon::parse($sujet->created_at)->format('d/m/Y')}} </p>
                  <div class="card-tags">
                    <ul>
                      <li>{{ $sujet->type }}</li>
                    </ul>
                  </div>
                </div>
                <div class="card-body">
                  <p>{{ \Illuminate\Support\Str::limit($sujet->description, 250, $end='...') }}</p>
                </div>
              </a>
              @endif
              @endforeach
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
</div>
</div>
</div>
</div>
<div class="section-space"></div>
@endsection