@extends('layouts.templateFront')
@section('content')
<div class="section">
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body ">
                            <form method="post" action="{{ url('captcha-user-validation', $user) }}" autocomplete="off" class="form-horizontal" enctype="multipart/form-data" accept-charset="utf-8">
                                {{ csrf_field() }}
                                {{ method_field('patch') }}
                                <div class="row">
                                    <div class="col-md-12 ">
                                        <a href="{{ route('index') }}" class="btn btn-sm btn-secondary "><i class="fas fa-arrow-left"></i> Retour</a>
                                    </div>
                                </div>
                                @if ( $user->email_verified_at == null && $user->statut == "eleve" || $user->email_verified_at == null && $user->statut == "admin")
                                <div class="alert alert-warning" role="alert">
                                    <div class="container">
                                        <div class="alert-icon">
                                            <i class="now-ui-icons travel_info"></i>
                                        </div> Tu dois changer ton mot de passe et valider ton email pour accéder à toutes les fonctionnalités.
                                    </div>
                                </div>
                                @endif
                                <br>
                                @if(session()->has('message'))
                                <div class="alert alert-success">
                                    {{ session()->get('message') }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">
                                            <i class="now-ui-icons ui-1_simple-remove"></i>
                                        </span>
                                    </button>
                                </div>
                                @elseif(session()->has('errors'))
                                <div class="alert alert-danger" role="alert">
                                    @foreach($errors->all() as $error)
                                    {{$error}}
                                    <br>
                                    @endforeach
                                </div>
                                @elseif(session()->has('unchange'))
                                <div class="alert alert-warning" role="alert">
                                    {{ session()->get('unchange') }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">
                                            <i class="now-ui-icons ui-1_simple-remove"></i>
                                        </span>
                                    </button>
                                </div>
                                @endif
                                <br>
                                <!-- Nom - Prénom -->
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Nom') }}</label>
                                    <div class="col-md-7 ">
                                        @if ($user->statut == "eleve")
                                        <div class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" readonly="readonly" style="background-color : #ececec;">{{Auth::user()->eleve->nom}}</div>
                                        @elseif ($user->statut == "admin")
                                        <div class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" readonly="readonly" style="background-color : #ececec;">{{Auth::user()->admin->nom}}</div>
                                        @endif
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Prénom') }}</label>
                                    <div class="col-md-7 ">
                                        @if ($user->statut == "eleve")
                                        <div class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" readonly="readonly" style="background-color : #ececec;">{{Auth::user()->eleve->prenom}}</div>
                                        @elseif ($user->statut == "admin")
                                        <div class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" readonly="readonly" style="background-color : #ececec;">{{Auth::user()->admin->prenom}}</div>
                                        @endif
                                    </div>
                                </div>
                                <!-- Fin Nom - Prénom -->
                                <!-- Adresse email -->
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Adresse email') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group">
                                            <input class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="email" name="email" id="input-email" type="email" value="{{$user->email}}" required="true" aria-required="true" />
                                            @if ($errors->has('email'))
                                            <span id="email-error" class="error text-danger" for="input-email">{{ $errors->first('email') }}</span>
                                            @endif
                                        </div>
                                        @if ( $user->email_verified_at != null && $user->statut == "eleve" || $user->email_verified_at != null && $user->statut == "admin")
                                        <div class="card-footer ml-auto mr-auto text-center">
                                            <p class="btn btn-sm btn-secondary "><i class="fas fa-check"></i> Email vérifié</p>
                                        </div>
                                        @endif
                                    </div>
                                </div>
                                <!-- Fin Adresse email -->
                                <!-- Avatar actuel -->
                                <div class="row avatar">
                                    <label class="col-sm-2 col-form-label">{{ __('Avatar actuel') }}</label>
                                    <div class="col-sm-7 text-center">
                                        <div class="form-group ml-auto mr-auto text-center text-center" style="width: 110px; height: 100px;">
                                            <img class="form-control  text-center  img-raised" name="image_profil" id="input-image_profil" style="width: 110px;
height: 100px;" src="{{url($user->image_profil)}}" value="{{$user->image_profil}}" required="true" aria-required="true">

                                        </div>
                                    </div>
                                </div>
                                <!-- Fin Avatar actuel -->
                                <!-- Changement Avatar -->
                                <div class="row avatar">
                                    <label class="col-sm-2 col-form-label">Changement d'avatar</label>
                                    <div class="col-sm-7 text-center">
                                        <div class="card-footer ml-auto mr-auto text-center">
                                            @if ( $user->email_verified_at == null && $user->statut == "eleve" || $user->email_verified_at == null && $user->statut == "admin")
                                            <button class="btn btn-primary" type="button" disabled>
                                                Avatars disponibles
                                            </button>
                                            @elseif ( $user->email_verified_at != null && $user->statut == "eleve" || $user->email_verified_at != null && $user->statut == "admin" )
                                            <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#myModal">
                                                Avatars disponibles
                                            </button>
                                            @endif
                                        </div>
                                        <input hidden id="imagechoisie" name="imagechoisie" type="text">
                                        <br>
                                    </div>
                                </div>
                                <!-- Fin Changement Avatar -->
                                <!-- Mot de passe  -->
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Mot de passe') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group">
                                            <input class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="Mot de passe" name="password" id="input-password" type="password" requierd="true" value="" aria-required="true" />
                                            @if ($errors->has('password'))
                                            <!-- <span id="password-error" class="error text-danger" for="input-password">{{ $errors->first('password') }}</span>-->
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <!-- Fin Mot de passe-->
                                <!-- Confirmation Mot de passe -->
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Confirmation mot de passe') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group">
                                            <input class="form-control{{ $errors->has('password_confirmation') ? ' is-invalid' : '' }}" placeholder="Confirmation mot de passe" name="password_confirmation" id="input-password_confirmation" type="password" value="" aria-required="true" />
                                            @if ($errors->has('password_confirmation'))
                                            <!--<span id="password_confirmation-error" class="error text-danger" for="input-password_confirmation">{{ $errors->first('password_confirmation') }}</span>-->
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <!-- Fin Confirmation Mot de passe -->
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
                                            <input id="captcha" type="text" class="form-control" placeholder="Enter les caractères" name="captcha" required>
                                        </div>
                                    </div>
                                </div>
                                <!-- Validation -->
                                @if ($user->email_verified_at != null && $user->statut == "eleve" || $user->statut == "admin" && $user->email_verified_at != null)
                                <div class="card-footer ml-auto mr-auto text-center">
                                    <button type="submit" class="btn btn-primary btn-round">Modifier mon profil
                                    </button>
                                </div>
                                <!-- Fin Validation -->
                                @endif
                                @if ( $user->email_verified_at == null && $user->statut == "eleve" || $user->email_verified_at == null && $user->statut == "admin")
                                <div class="card-footer ml-auto mr-auto text-center">
                                    <button type="submit" rel="tooltip" class="btn  btn-linght btn-round" style="background-color: #FF3636;">
                                        <i class="fas fa-times"></i> {{ __('Valider') }}
                                    </button>
                                </div>
                                @endif

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header justify-content-center">

                <h4 class="title title-up">Choisir une image</h4>
            </div>
            <div class="modal-body" style="overflow:auto;max-height:calc(90vh - 125px);">
                <ul>
                    @foreach ($images as $image)
                    <li style="width:80px;display:inline-block;margin:5px 0px;">
                        <input type="radio" id="{{$image->getFilename()}}" value="{{$image->getFilename()}}" name="new_avatar">
                        <img src="{{ asset('front/images/avatars/' . $image->getFilename()) }}" width="50" height="50">
                    </li>
                    @endforeach
                </ul>
            </div>
            <div class="modal-footer">
                <a href="#" id="modal_button" class="btn btn-success success">Valider</a>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Annuler</button>
            </div>
        </div>
    </div>
</div>
@endsection