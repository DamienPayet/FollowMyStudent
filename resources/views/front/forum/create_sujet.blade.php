@extends('layouts.templateFront')

@section('content')
<div class="section">
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card ">
                        <div class="card-body ">
                            @if(session()->has('errors'))
                            <div class="alert alert-danger" role="alert">
                                @foreach($errors->all() as $error)
                                {{$error}}
                                <br>
                                @endforeach
                            </div>
                            @endif
                            <form method="post" action="{{url('captcha-sujet-validation')}}">

                                {{ csrf_field() }}
                                {{ method_field('post') }}
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
                                <!-- titre -->
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Titre') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group">
                                            <input class="form-control{{ $errors->has('titre') ? ' is-invalid' : '' }}" placeholder="Titre" name="titre" id="titre" type="text" value="{{ old('titre') }}" required="true" aria-required="true" />
                                            @if ($errors->has('titre'))
                                            <span id="titre-name" class="error text-danger" for="titre">{{ $errors->first('titre') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <!-- Fin -->
                                <!-- Description -->
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Description du sujet') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group">
                                            <textarea name="description" class="form-control" placeholder="Saisir la description du sujet..." name="description" id="description" type="text" value="{{ old('description') }}" required="true" aria-required="true">{{ old('description') }}</textarea>
                                            @if ($errors->has('description'))
                                            <span id="description-error" class="error text-danger" for="description">{{ $errors->first('description') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div><br>
                                <!-- Fin -->
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('categorie') ? ' has-danger' : '' }}">
                                            <select name="categorie" id="categorie->id" class="selectpicker form-control edit" data-live-search="true" style="width:100%" required="true" aria-required="true">
                                                <option value="" selected>Sélectionner une catégorie</option>
                                                @foreach($categorie as $cat)
                                                <option value="{{$cat->id}}" {{ (old("categorie") == $cat->id ? "selected":"") }}> {{$cat->section->titre}} - {{$cat->nom}} </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <!-- Fin -->
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('type') ? ' has-danger' : '' }}">

                                            <select name="type" id="type" class="selectpicker form-control edit" data-live-search="true" style="width:100%" required="true" aria-required="true">
                                                <option value="" selected>Sélectionner le type</option>
                                                <option value="Discussion" {{ old('type') == 'Discussion' ? 'selected' : '' }}>Discussion</option>
                                                <option value="Question" {{ old('type') == 'Question' ? 'selected' : '' }}>Question</option>

                                            </select>
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
                                            <input id="captcha" type="captcha" placeholder="Enter les caractères" class="form-control" class="form-control @error('captcha') is-invalid @enderror" name="captcha" required>
                                        </div>
                                    </div>
                                </div>
                                <!-- Fin Captcha -->
                                <div class="card-footer ml-auto mr-auto text-center">
                                    <button type="submit" class="btn btn-info">Ajouter</button>
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