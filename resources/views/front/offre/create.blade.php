@extends('layouts.templateFront')

@section('content')
<div class="section">
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
                            <form method="post" action="{{url('captcha-offre-validation')}}">
                                {{ csrf_field() }}
                                <!-- Titre -->
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Titre') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group">
                                            <input class="form-control{{ $errors->has('titre') ? ' is-invalid' : '' }}" placeholder="Titre de l'offre" name="titre" id="input-titre" type="texte" value="{{old('titre')}}" required="true" aria-required="true" />
                                            @if ($errors->has('titre'))
                                            <span id="titre-error" class="error text-danger" for="input-titre">{{ $errors->first('titre') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <!-- Fin titre -->
                                <!-- description -->
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Description') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group">
                                            <textarea class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" name="description" placeholder="Description de l'offre..." id="input-description" type="text" value="{{old('description')}}" required="true" aria-required="true" rows="10">{{old('description') }}</textarea>
                                            @if ($errors->has('description'))
                                            <span id="description-error" class="error text-danger" for="input-description">{{ $errors->first('description') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <!-- Fin description -->
                                <!-- Niveau -->
                                <div class="row">
                                    <label class="col-sm-2 col-form-label" for="input-niveau">{{ __(' Niveau') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('niveau') ? ' has-danger' : '' }}">
                                            <select name="niveau" id="niveau" class="form-control" value="{{old('niveau')}}">
                                                <option value="{{old('niveau')}}">Sélectionner un niveau...</option>
                                                <option value="Bac" {{ old('niveau') == 'Bac' ? 'selected' : '' }}>Bac</option>
                                                <option value="BTS" {{ old('niveau') == 'BTS' ? 'selected' : '' }}>BTS</option>
                                                <option value="Licence" {{ old('niveau') == 'Licence' ? 'selected' : '' }}>Licence</option>
                                                <option value="Master" {{ old('niveau') == 'Master' ? 'selected' : '' }}>Master</option>
                                            </select> @if ($errors->has('niveau'))
                                            <span id="niveau-error" class="error text-danger" for="input-niveau">{{ $errors->first('niveau') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <!--Type contrat -->
                                <div class="row">
                                    <label class="col-sm-2 col-form-label" for="input-niveau">Type de contrat</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('niveau') ? ' has-danger' : '' }}">
                                            <select name="type" id="type" class="form-control" value="{{old('type')}}">
                                                <option value="" selected>Type de contrat</option>
                                                <option value="CDD" {{ old('type') == 'CDD' ? 'selected' : '' }}>CDD</option>
                                                <option value="CDI" {{ old('type') == 'CDI' ? 'selected' : '' }}>CDI</option>
                                                <option value="Alternance" {{ old('type') == 'Alternance' ? 'selected' : '' }}>Apprentissage</option>
                                            </select> @if ($errors->has('niveau'))
                                            <span id="niveau-error" class="error text-danger" for="input-niveau">{{ $errors->first('niveau') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <!-- Lieu -->
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Lieu') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('lieu') ? ' has-danger' : '' }}">
                                            <input class="form-control{{ $errors->has('lieu') ? ' is-invalid' : '' }}" name="lieu" id="input-lieu" type="text" placeholder="{{ __('Lieu') }}" value="{{old('lieu')}}" required="true" aria-required="true" />
                                            @if ($errors->has('lieu'))
                                            <span id="lieu-error" class="error text-danger" for="input-lieu">{{ $errors->first('lieu') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <!-- Entreprise -->
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Entreprise') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('entreprise') ? ' has-danger' : '' }}">
                                            <input class="form-control{{ $errors->has('entreprise') ? ' is-invalid' : '' }}" name="entreprise" id="input-entreprise" type="text" placeholder="{{ __('Entreprise') }}" value="{{old('entreprise')}}" required="true" aria-required="true" />
                                            @if ($errors->has('entreprise'))
                                            <span id="entreprise-error" class="error text-danger" for="input-entreprise">{{ $errors->first('entreprise') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <!-- Lien -->
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Lien') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('lien') ? ' has-danger' : '' }}">
                                            <input class="form-control{{ $errors->has('lien') ? ' is-invalid' : '' }}" name="lien" id="input-lien" type="text" placeholder="{{ __('Lien de l\'offre') }}" value="{{old('lien')}}" />
                                            @if ($errors->has('lien'))
                                            <span id="entreprise-error" class="error text-danger" for="input-lien">{{ $errors->first('lien') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <!-- PDF -->
                                <div class="row">
                                    <label class="col-sm-2 col-form-label" for="input-pdf">{{ __('PDF') }}</label>
                                    <div class="col-sm-7">
                                        @csrf
                                        <div class="form-group{{ $errors->has('pdf') ? ' has-danger' : '' }}">
                                            <div class="custom-file">
                                                <input id="selector" type="file" class="custom-file-input {{ $errors->has('image') ? 'is-invalid' : '' }}" accept="application/pdf" name="fileUpload" id="fileUpload" value="{{ old('fileUpload') }}">
                                                <label id="filename" class="custom-file-label" for="validatedCustomFile">Choisir un fichier...</label>
                                                @if ($errors->has('niveau'))
                                                <span id="niveau-error" class="error text-danger">{{ $errors->first('fileUpload') }}</span>
                                                @endif
                                            </div>
                                            <br>
                                        </div>
                                    </div>
                                </div>
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
                                            <input id="captcha" type="text" class="form-control" placeholder="Enter les caractères" name="captcha">
                                        </div>
                                    </div>
                                </div>
                                <!-- Fin Captcha -->
                              
                                <div class="card-footer ml-auto mr-auto text-center">
                                    <button type="submit" name="send" class="btn btn-primary btn-round">Envoyer</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection