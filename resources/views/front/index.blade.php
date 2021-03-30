@extends('layouts.templateFront')

@section('content')
<div class="section" id="carousel">
    @if (Auth::user()->email_verified_at == null)
    <div class="alert alert-warning" role="alert" style="text-align: center;">
        <div class="container">
            <div class="alert-icon">
                <i class="now-ui-icons travel_info"></i>
            </div>
            Tu dois valider ton email pour débloquer l'ensemble des fonctionnalités.
            <a href="{{ route('front.users.edit', Auth::user()->id) }}">C'est parti !</a>
        </div>
    </div>
    @endif
    <div id="offers">

        <h1 class="nb-offer"><br>
            Bienvenue sur <b>F</b>ollow <b>M</b>y <b>S</b>tudent !
        </h1>
    </div>

    <div class="container" style="width: 40rem;">
        <h1 class="text-center" style="font-size: 1.6em;">Nos derniers posts :</h1>
        <br>
        @foreach($post as $p)
        @if(isset($p->lien))
        <a href="{{$p->lien}}" class="card" style="color:black;  text-decoration: none;">
            @else
            <div class="card">
                @endif
                <h1 class="card-header text-center" style="font-size: 1.6em;text-align: center;">{{$p->titre}}</h1>

                <div class="card-body">
                    @if(isset($p->image))
                    <img class="card-img-top" src="{{$p->image}}" alt="Card image cap">
                    @endif
                    @if(isset($p->description))
                    <pre style="white-space: pre-wrap;">
                    {{$p->description}}
                    </pre>
                    @endif

                </div>
                @if(isset($p->lien))

        </a>

        @else
        <pre class="text-center">
        Publié le {{date('d-m-Y', strtotime($p->created_at))}}

        </pre>
    </div>
    @endif
    @endforeach

</div>
</div>
@endsection