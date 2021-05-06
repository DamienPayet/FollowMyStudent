@extends('layouts.templateFront')

@section('content')
<div class="section">
    <div class="content">
        <br>
        <h1 class="text-center" style="font-size: 1.8em;">Nouvelle demande de contact</h1>
    </div>
    <div class="section">
        <div class="container">
            <div class="content">
                <div class="container-fluid">
                    <div class="row">

                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-body ">
                                    <!-- Success message -->
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
                                    <form method="post" action="{{url('captcha-contact-validation')}}">
                                        {{ csrf_field() }}
                                        <!-- Nom - Prénom -->
                                        <div class="row">
                                            <label class="col-sm-2 col-form-label">{{ __('Nom') }}</label>
                                            <div class="col-sm-7">
                                                @if (!Auth::guest())
                                                @if (Auth::user()->statut == "eleve")
                                                <div class="form-control" name="user_name" id="user_name" type="texte" data-user_name="{{Auth::user()->eleve->nom}}" required="true" aria-required="true" style="background-color : #ececec;">{{Auth::user()->eleve->nom}}</div>
                                                @elseif (Auth::user()->statut == "admin")
                                                <div class="form-control" name="user_name" id="user_name" type="texte" data-user_name="{{Auth::user()->admin->nom}}" required="true" aria-required="true" style="background-color : #ececec;">{{Auth::user()->admin->nom}}</div>
                                                @endif
                                                <input hidden id="nom" name="nom" type="text">
                                                @elseif(Auth::guest())
                                                <div class="form-group">
                                                    <input class="form-control{{ $errors->has('nom') ? ' is-invalid' : '' }}" placeholder="Nom" name="nom" id="input-nom" type="texte" value="{{old('nom')}}" required="true" aria-required="true" />
                                                    @if ($errors->has('nom'))
                                                    <span id="nom-error" class="error text-danger" for="input-nom">{{ $errors->first('nom') }}</span>
                                                    @endif
                                                </div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label class="col-sm-2 col-form-label">{{ __('Prénom') }}</label>
                                            <div class="col-sm-7">
                                                @if (!Auth::guest())
                                                @if (Auth::user()->statut == "eleve")
                                                <div class="form-control" name="user_surname" id="user_surname" type="texte" data-user_surname="{{Auth::user()->eleve->prenom}}" required="true" aria-required="true" style="background-color : #ececec;">{{Auth::user()->eleve->prenom}}</div>
                                                @elseif (Auth::user()->statut == "admin")
                                                <div class="form-control" name="user_surname" id="user_surname" type="texte" data-user_surname="{{Auth::user()->admin->prenom}}" required="true" aria-required="true" style="background-color : #ececec;">{{Auth::user()->admin->prenom}}</div>
                                                @endif
                                                <input hidden id="prenom" name="prenom" type="text">
                                                @elseif(Auth::guest())
                                                <div class="form-group">
                                                    <input class="form-control{{ $errors->has('prenom') ? ' is-invalid' : '' }}" placeholder="Prénom" name="prenom" id="input-prenom" type="texte" value="{{old('prenom')}}" required="true" aria-required="true" />
                                                    @if ($errors->has('prenom'))
                                                    <span id="prenom-error" class="error text-danger" for="input-prenom">{{ $errors->first('prenom') }}</span>
                                                    @endif
                                                </div>
                                                @endif
                                            </div>
                                        </div>
                                        <!-- Fin Nom - Prénom -->
                                        <!-- Adresse email -->
                                        <div class="row">
                                            <label class="col-sm-2 col-form-label">{{ __('Adresse email') }}</label>
                                            <div class="col-sm-7">
                                                @if (!Auth::guest())
                                                <div class="form-control" name="user_email" id="user_email" type="texte" data-user_email="{{$user->email}}" required="true" aria-required="true" style="background-color : #ececec;">{{$user->email}}</div>
                                                <input hidden id="email" name="email" type="text">
                                                @elseif(Auth::guest())
                                                <div class="form-group">
                                                    <input class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="Email" name="email" id="input-email" type="email" value="{{old('email')}}" required="true" aria-required="true" />
                                                    @if ($errors->has('email'))
                                                    <span id="email-error" class="error text-danger" for="input-email">{{ $errors->first('email') }}</span>
                                                    @endif
                                                </div>
                                                @endif
                                            </div>
                                        </div>
                                        <!-- Fin Adresse email -->
                                        <!-- Telephone -->
                                        <div class="row">
                                            <label class="col-sm-2 col-form-label">{{ __('Telephone') }}</label>
                                            <div class="col-sm-7">
                                                <div class="form-group">
                                                    <input class="form-control{{ $errors->has('telephone') ? ' is-invalid' : '' }}" placeholder="telephone" name="telephone" id="input-telephone" type="tel" value="{{old('telephone')}}" />
                                                    @if ($errors->has('telephone'))
                                                    <span id="telephone-error" class="error text-danger" for="input-telephone">{{ $errors->first('telephone') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Fin Telephone -->
                                        <!-- Sujet -->
                                        <div class="row">
                                            <label class="col-sm-2 col-form-label">{{ __('Sujet') }}</label>
                                            <div class="col-sm-7">
                                                <div class="form-group">
                                                    <input class="form-control{{ $errors->has('sujet') ? ' is-invalid' : '' }}" placeholder="sujet" name="sujet" id="input-sujet" type="text" value="{{old('sujet')}}" required="true" aria-required="true" />
                                                    @if ($errors->has('sujet'))
                                                    <span id="sujet-error" class="error text-danger" for="input-sujet">{{ $errors->first('sujet') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Fin Sujet -->
                                        <!-- Message -->
                                        <div class="row">
                                            <label class="col-sm-2 col-form-label">{{ __('Message') }}</label>
                                            <div class="col-sm-7">
                                                <div class="form-group">
                                                    <textarea class="form-control{{ $errors->has('message') ? ' is-invalid' : '' }}" placeholder="Message..." name="message" id="input-message" type="text" value="" required="true" aria-required="true" style="resize:both">{{old('message') }}</textarea>
                                                    @if ($errors->has('message'))
                                                    <span id="message-error" class="error text-danger" for="input-message">{{ $errors->first('message') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Fin Message -->
                                        <!-- Captcha -->
                                        <div class="row">
                                            <label class="col-sm-2 col-form-label">{{ __('Captcha') }}</label>
                                            <div class="col-sm-7">
                                                <div class="captcha text-center">
                                                    <span>{!! captcha_img() !!}</span>

                                                    <button type="button" class="btn btn-danger" class="reload" id="reload">
                                                        &#x21bb;
                                                    </button>
                                                </div>
                                                <div class="form-group">
                                                    <input id="captcha" type="captcha" placeholder="Entrer les caractères" class="form-control" class="form-control @error('captcha') is-invalid @enderror" name="captcha" required>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Fin Captcha -->

                                        <div class="card-footer ml-auto mr-auto text-center">
                                            <button type="submit" onclick="GetUserDetailsContact()" name="send" class="btn btn-primary btn-round">Envoyer</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection