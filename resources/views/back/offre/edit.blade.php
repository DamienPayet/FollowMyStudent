@extends('layouts.templateBack')

@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <form method="post" action="{{ route('offre.update', $offre) }}" autocomplete="off" class="form-horizontal" enctype="multipart/form-data" accept-charset="utf-8">
          @csrf
          @method('put')
          <div class="card ">
            <div class="card-header card-header-primary">
              <h4 class="card-title">{{ __('Édition d\'une offre') }}</h4>
              <p class="card-category"></p>
            </div>
            <!-- Retour -->
            <div class="card-body ">
              <div class="row">
                <div class="col-md-12 text-right">
                  <a href="{{ route('offre.index') }}" class="btn btn-sm btn-primary">{{ __('Retour à la liste') }}</a>
                </div>
              </div>
              <!-- Titre -->
              <div class="row">
                <label class="col-sm-2 col-form-label">{{ __('Titre') }}</label>
                <div class="col-sm-7">
                  <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                    <input class="form-control{{ $errors->has('titre') ? ' is-invalid' : '' }}" name="titre" id="input-titre" type="text" placeholder="{{ __('Titre') }}" value="{{ old('titre', $offre->titre) }}" required="true" aria-required="true" />
                    @if ($errors->has('name'))
                    <span id="titre-error" class="error text-danger" for="input-titre">{{ $errors->first('titre') }}</span>
                    @endif
                  </div>
                </div>
              </div>
              <!-- Description -->
              <div class="row">
                <label class="col-sm-2 col-form-label">{{ __('Description') }}</label>
                <div class="col-sm-7">
                  <div class="form-group{{ $errors->has('description') ? ' has-danger' : '' }}">
                    <textarea name="description" rows="15" cols="80" placeholder="{{ __('Description') }}" required>{{ old('description', $offre->description) }}</textarea>

                    <!--<input class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" name="description" id="input-descr" type="texte" placeholder="{{ __('Email') }}" value="{{ old('description', $offre->description) }}" required />-->
                    @if ($errors->has('description'))
                    <span id="description-error" class="error text-danger" for="input-descr">{{ $errors->first('description') }}</span>
                    @endif
                  </div>
                </div>
              </div>
              <!-- Niveau -->
              <div class="row">
                <label class="col-sm-2 col-form-label" for="input-niveau">{{ __(' Niveau') }}</label>
                <div class="col-sm-7">
                  <div class="form-group{{ $errors->has('niveau') ? ' has-danger' : '' }}">
                    <input class="form-control{{ $errors->has('niveau') ? ' is-invalid' : '' }}" input type="text" name="niveau" id="input-niveau" placeholder="{{ __('Niveau') }}" value="{{ old('niveau', $offre->niveau) }}" required />
                    @if ($errors->has('niveau'))
                    <span id="niveau-error" class="error text-danger" for="input-niveau">{{ $errors->first('niveau') }}</span>
                    @endif
                  </div>
                </div>
              </div>
              <!-- PDF -->
              <div class="row">
                <label class="col-sm-2 col-form-label" for="input-pdf">{{ __('PDF') }}</label>
                <div class="col-sm-7">
                  @csrf
                  <div class="form-group">
                    <div class="form-group{{ $errors->has('pdf') ? ' has-danger' : '' }}">
                      <!-- Création d'un lien vers le pdf -->
                      <label for="aperçu" id="file-drag">
                        <div class="card shadow">
                          <div class="card-body">
                            <a href="{{ asset($offre->pdf) }}" target="_blank">Aperçu PDF existant</a>
                          </div>
                        </div>
                      </label>
                      <!-- Fin aperçu -->
                      <!-- Upload -->
                      <input class="form-control {{ $errors->has('image') ? 'is-invalid' : '' }}" type="file" accept="application/pdf" name="fileUpload" id="fileUpload" value="{{ old('fileUpload') }}">
                      <label for="fileUpload" id="file-drag">
                        <div id="start">
                          <div>Sélectionner un fichier</div>
                          <span id="fileUpload" class="btn btn-primary">{{ __('Sélectionner un nouveau fichier') }}</span>
                          <br>
                          @if ($errors->has('fileUpload'))
                          <span id="niveau-error" class="error text-danger">{{ $errors->first('fileUpload') }}</span>
                          @endif
                        </div>
                      </label>
                      <!-- Fin upload -->
                    </div>
                  </div>
                </div>
                </label>
              </div>
            </div>
            <div class="card-footer ml-auto mr-auto">
              <button type="submit" class="btn btn-primary">{{ __('Mettre à jour') }}</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection