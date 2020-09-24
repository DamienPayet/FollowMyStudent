@extends('layouts.templateFront')

@section('content')
<div class="section">
  <p class="category">
    <center>Voici les offres disponibles :</center>
  </p>
  <div class="container">
    <div class="row">
      @foreach ($offres as $offre)
      <div class="col-sm-4">
        <div class="card">
          <div class="card-block">
            <div class="card-header">
              <ul class="nav nav-tabs nav-tabs-neutral justify-content-center" role="tablist" data-background-color="black">
                <li class="nav-item">
                  <a class="nav-link active" data-toggle="tab" href="offre" role="tab">{{$offre->titre}}</a>
                </li>

              </ul>
            </div>
            <div class="card-body">
              <!-- Tab panes -->
              <div class="tab-content text-center">
                <div class="tab-pane active" id="offre" role="tabpanel">

                  <p> {{ \Illuminate\Support\Str::limit($offre->description, 150, $end='...') }}
                    <a rel="tooltip" href="{{ route('offre_front_show', $offre) }}" data-original-title="" title="">
                      {{ 'Afficher plus' }}
                    </a></p>
                  <span class="badge badge-success">{{ $offre->type }}</span>
                  <span class="badge badge-success">{{ $offre->niveau }}</span>
                  <span class="badge badge-success">{{ $offre->lieu }}</span>
                </div>
              </div>
            </div>
            <p class="card-text"><small class="text-muted">
                <center>Mise en ligne le {{ \Carbon\Carbon::parse($offre->created_at)->format('d/m/Y')}}
                </center>
              </small></p>
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</div>
@endsection