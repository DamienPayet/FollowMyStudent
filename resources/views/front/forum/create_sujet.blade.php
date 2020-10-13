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
                        <form method="post" action="{{ route('sujet.create') }}" autocomplete="off" class="form-horizontal" enctype="multipart/form-data" accept-charset="utf-8">
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
                                <label class="col-sm-2 col-form-label">{{ __('Titre') }}</label>
                                <div class="col-sm-7">
                                    <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                        <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="Nom" name="name" id="input-name" type="text" value="" required="true" aria-required="true" />
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
                                    <textarea name="message" class="form-control" id="message" rows="6"></textarea>
                                        <label class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="email" name="email" id="input-email" type="email" value="" required="true" aria-required="true" />
                                        @if ($errors->has('email'))
                                        <span id="email-error" class="error text-danger" for="input-email">{{ $errors->first('email') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <!-- Fin -->
                            <!-- username -->

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