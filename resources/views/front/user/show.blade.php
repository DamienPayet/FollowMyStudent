@extends('layouts.templateFront')

@section('content')
<div class="content">
    <div class="section section-about-us">
        <div class="container">
            <div class="col-md-12 text-left">
                <a href="{{ route('index') }}" class="btn btn-primary btn-round">{{ __('Retour à l\'accueil') }}</a>
            </div>
            <div id="inputs">
                <h4>Modifier mon profil</h4>
                <p class="category"><small>Dernière mise à jour {{ $user->updated_at->diffForHumans() }}</small></p>
                <form method="post" action="route('users.update', $user)">
                    {{ csrf_field() }}
                    {{ method_field('patch') }}

                    <div class="col-sm-6 col-lg-3 text-center">
                        <div class="form-group">
                            <input type="text" value="{{ $user->name }}" name="name" class="form-control" />
                        </div>
                    </div>

                    <div class="col-sm-6 col-lg-3 text-center">
                        <div class="form-group">
                            <input type="text" value="{{ $user->email }}" name="email" class="form-control" />
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-3 text-center">
                        <div class="form-group">
                            <input type="password" placeholder="Mot de passe" name="password" class="form-control" />
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-3 text-center">
                        <div class="form-group">
                            <input type="password" placeholder="Confirmation mot de passe" name="password_confirmation" class="form-control" />
                        </div>
                    </div>
                    <button type="submit">Send</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection