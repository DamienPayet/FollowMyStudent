@extends('layouts.templateFront')

@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="col-md-12 text-left">
      <a href="{{ route('index') }}" class="btn btn-primary btn-round">{{ __('Retour à l\'accueil') }}</a>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="card ">
          <div class="card-body ">
            <form method="post" action="{{ route('users.update', $user) }}" autocomplete="off" class="form-horizontal" enctype="multipart/form-data" accept-charset="utf-8">
              {{ csrf_field() }}
              {{ method_field('patch') }}
              <div class="row">
                <div class="col-md-12 ">
                  <a href="{{ route('index') }}" class="btn btn-sm btn-secondary "><i class="fas fa-arrow-left"></i> Retour</a>
                </div>
              </div>
              @if(session()->has('message'))
              <div class="alert alert-success">
                {{ session()->get('message') }}
              </div>
              @endif
              <br>
              <!-- username -->
              <div class="row">
                <label class="col-sm-2 col-form-label">{{ __('Nom d\'utilisateur') }}</label>
                <div class="col-sm-7">
                  <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                    <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="Nom" name="name" id="input-name" type="text" value="{{$user->name}}" required="true" aria-required="true" />
                    @if ($errors->has('name'))
                    <span id="titre-name" class="error text-danger" for="input-name">{{ $errors->first('name') }}</span>
                    @endif
                  </div>
                </div>
              </div>
              <!-- Fin -->
              <!-- username -->
              <div class="row">
                <label class="col-sm-2 col-form-label">{{ __('Adresse email') }}</label>
                <div class="col-sm-7">
                  <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                    <input class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="email" name="email" id="input-email" type="email" value="{{$user->email}}" required="true" aria-required="true" />
                    @if ($errors->has('email'))
                    <span id="email-error" class="error text-danger" for="input-email">{{ $errors->first('email') }}</span>
                    @endif
                  </div>
                </div>
              </div>
              <!-- Fin -->
              <!-- username -->
              <div class="row">
                <label class="col-sm-2 col-form-label">{{ __('Mot de passe') }}</label>
                <div class="col-sm-7">
                  <div class="form-group{{ $errors->has('password') ? ' has-danger' : '' }}">
                    <input class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="Mot de passe" name="password" id="input-password" type="password" value="" required="true" aria-required="true" />
                    @if ($errors->has('password'))
                    <span id="password-error" class="error text-danger" for="input-password">{{ $errors->first('password') }}</span>
                    @endif
                  </div>
                </div>
              </div>
              <!-- Fin -->
              <!-- username -->
              <div class="row">
                <label class="col-sm-2 col-form-label">{{ __('Confirmation mot de passe') }}</label>
                <div class="col-sm-7">
                  <div class="form-group{{ $errors->has('password_confirmation') ? ' has-danger' : '' }}">
                    <input class="form-control{{ $errors->has('password_confirmation') ? ' is-invalid' : '' }}" placeholder="Confirmation mot de passe" name="password_confirmation" id="input-password_confirmation" type="password" value="" required="true" aria-required="true" />
                    @if ($errors->has('password_confirmation'))
                    <span id="password_confirmation-error" class="error text-danger" for="input-password_confirmation">{{ $errors->first('password_confirmation') }}</span>
                    @endif
                  </div>
                </div>
              </div>
              <!-- Fin -->
              <div class="card-footer ml-auto mr-auto text-center )">
                <button type="submit" class="btn btn-success btn-round">Modifier mon profil</button>
              </div>

            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection