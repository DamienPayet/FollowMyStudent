@extends('layouts.templateFront')

@section('content')
    <div class="section" id="carousel">
        <div class="container">
            <div class="title text-center h1-seo">
                <h4>Bienvenue !</h4>
            </div>
            @if (Auth::user()->email_verified_at == null)
                <div class="alert alert-warning" role="alert">
                    <div class="container">
                        <div class="alert-icon">
                            <i class="now-ui-icons travel_info"></i>
                        </div>
                        Tu dois valider ton email pour accéder à toutes les fonctionnalités.
                        <a href="{{ route('front.users.edit', Auth::user()->id) }}">Accéder</a>
                    </div>
                </div>
            @endif

        </div>
        <div class="container">
            <div class="offers-container tab">
                @foreach($post as $p)
                    

                    <a href="#" class="card">
                        <div class="card-header">
                            <div class="card-info">
                                <h2 class="title">{{$p->titre}}</h2>
                            </div>
                            <div class="localisation" style="font-size: 0.9em;">
                                <p><i class="now-ui-icons location_pin"></i> {{$p->titre}}</p>
                            </div>
                            <p class="time">Mise en ligne

                            <div class="card-tags">
                                <ul>
                                    <li>{{$p->titre}}</li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-body">
                            <p>{{ \Illuminate\Support\Str::limit($p->titre, 250, $end='...') }}</p>
                        </div>
                    </a>

                @endforeach
            </div>
        </div>
    </div>
@endsection
