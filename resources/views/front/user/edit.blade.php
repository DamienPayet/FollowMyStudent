@extends('layouts.templateFront')
@section('content')
    <div class="section">
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body ">
                                <form method="post" action="{{ route('front.users.update', $user) }}" autocomplete="off"
                                      class="form-horizontal" enctype="multipart/form-data" accept-charset="utf-8">
                                    {{ csrf_field() }}
                                    {{ method_field('patch') }}
                                    <div class="row">
                                        <div class="col-md-12 ">
                                            <a href="{{ route('index') }}" class="btn btn-sm btn-secondary "><i
                                                    class="fas fa-arrow-left"></i> Retour</a>
                                        </div>
                                    </div>
                                    @if(session()->has('message'))
                                        <div class="alert alert-success">
                                            {{ session()->get('message') }}
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
                                    <br>
                                    <!-- Nom - Prénom -->
                                    <div class="row">
                                        <label class="col-sm-2 col-form-label">{{ __('Nom') }}</label>
                                        <div class="col-md-7 ">
                                            <div class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                                                 style="  background-color : #ececec;">{{Auth::user()->eleve->nom}}</div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <label class="col-sm-2 col-form-label">{{ __('Prénom') }}</label>
                                        <div class="col-md-7 ">
                                            <div class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                                                 style="  background-color : #ececec;">{{Auth::user()->eleve->prenom}}</div>
                                        </div>
                                    </div>
                                    <!-- Fin Nom - Prénom -->
                                    <!-- Adresse email -->
                                    <div class="row">
                                        <label class="col-sm-2 col-form-label">{{ __('Adresse email') }}</label>
                                        <div class="col-sm-7">
                                            <div class="form-group">
                                                <input
                                                    class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                                    placeholder="email" name="email" id="input-email" type="email"
                                                    value="{{$user->email}}" required="true" aria-required="true"/>
                                                @if ($errors->has('email'))
                                                    <span id="email-error" class="error text-danger"
                                                          for="input-email">{{ $errors->first('email') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Fin Adresse email -->
                                    <!-- Avatar actuel -->
                                    <div class="row avatar">
                                        <label class="col-sm-2 col-form-label">{{ __('Avatar actuel') }}</label>
                                        <div class="col-sm-7 text-center">
                                            <div class="form-group ml-auto mr-auto text-center text-center" style="width: 110px; height: 100px;">
                                                <img class="form-control  text-center " name="image_profil"
                                                     id="input-image_profil" src="{{url($user->image_profil)}}"
                                                     value="{{$user->image_profil}}" required="true"
                                                     aria-required="true">

                                            </div>
                                        </div>
                                    </div>
                                    <!-- Fin Avatar actuel -->
                                    <!-- Changement Avatar -->
                                    <div class="row avatar">
                                        <label class="col-sm-2 col-form-label">Changement d'avatar</label>
                                        <div class="col-sm-7 text-center">
                                            <div class="card-footer ml-auto mr-auto text-center">
                                                <button class="btn btn-primary" type="button" data-toggle="modal"
                                                        data-target="#myModal">
                                                    Avatars disponibles
                                                </button>
                                            </div>
                                            <br>
                                            <!--for preview purpose -->
                                        <!--
                    <div class="form-group{{ $errors->has('preview-img') ? ' has-danger' : '' }}" style="width: 100px; height: 100px;">
                      <img class="text-center form-control{{ $errors->has('preview-img') ? ' is-invalid' : '' }}" name="preview-img" id="preview-img" src="#" value="" aria-required="true">
                      @if ($errors->has('preview-img'))
                                            <span id="preview-img-error" class="error text-danger" for="input-preview-img">{{ $errors->first('preview-img') }}</span>
                      @endif
                                            </div>-->
                                            <!--for preview purpose -->
                                        </div>
                                    </div>
                                    <!-- Fin Changement Avatar -->
                                    <!-- Mot de passe  -->
                                    <div class="row">
                                        <label class="col-sm-2 col-form-label">{{ __('Mot de passe') }}</label>
                                        <div class="col-sm-7">
                                            <div class="form-group">
                                                <input
                                                    class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                                    placeholder="Mot de passe" name="password" id="input-password"
                                                    type="password" requierd="true" value="" aria-required="true"/>
                                            @if ($errors->has('password'))
                                                <!-- <span id="password-error" class="error text-danger" for="input-password">{{ $errors->first('password') }}</span>-->
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Fin Mot de passe-->
                                    <!-- Confirmation Mot de passe -->
                                    <div class="row">
                                        <label
                                            class="col-sm-2 col-form-label">{{ __('Confirmation mot de passe') }}</label>
                                        <div class="col-sm-7">
                                            <div class="form-group">
                                                <input
                                                    class="form-control{{ $errors->has('password_confirmation') ? ' is-invalid' : '' }}"
                                                    placeholder="Confirmation mot de passe" name="password_confirmation"
                                                    id="input-password_confirmation" type="password" value=""
                                                    aria-required="true"/>
                                            @if ($errors->has('password_confirmation'))
                                                <!--<span id="password_confirmation-error" class="error text-danger" for="input-password_confirmation">{{ $errors->first('password_confirmation') }}</span>-->
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Fin Confirmation Mot de passe -->
                                    <!-- Validation -->
                                    <div class="card-footer ml-auto mr-auto text-center">
                                        <button type="submit" class="btn btn-primary btn-round">Modifier mon profil
                                        </button>
                                    </div>
                                    <!-- Fin Validation -->
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
         style="display: none;" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header justify-content-center">

                    <h4 class="title title-up">Choisir une image</h4>
                </div>
                <div class="modal-body" style="overflow:auto;max-height:calc(37vh - 125px);">
                    <ul>
                        @foreach ($images as $image)
                            <li style="width:80px;display:inline-block;margin:5px 0px;">
                                <input type="radio" id="{{$image->getFilename()}}" value="{{$image->getFilename()}}"
                                       name="new_avatar">
                                <img src="{{ asset('front/images/avatars/' . $image->getFilename()) }}" width="50"
                                     height="50">
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
