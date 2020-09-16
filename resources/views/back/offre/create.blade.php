@extends('layouts.templateFront')

@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <form method="post" action="{{ route('offre.store') }}" autocomplete="off" class="form-horizontal" enctype="multipart/form-data" accept-charset="utf-8">
          @csrf
          @method('post')
          <div class="card ">
            <div class="card-header card-header-primary">
              <h4 class="card-title">{{ __('Ajouter une offre') }}</h4>
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
                    <input class="form-control{{ $errors->has('titre') ? ' is-invalid' : '' }}" name="titre" id="input-titre" type="text" placeholder="{{ __('Titre') }}" value="" required="true" aria-required="true" />
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
                    <textarea name="description" rows="10" cols="80" placeholder="{{ __('Description') }}" required></textarea>
                    <!--<input class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" name="description" id="input-descr" type="texte" placeholder="{{ __('Description') }}" value="" required />-->
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
                    <select name="niveau" id="niveau" class="form-control">
                    <option value="" selected>Sélectionner un niveau...</option>
                      <option value="Bac">Bac</option>
                      <option value="BTS">BTS</option>
                      <option value="Licence">Licence</option>
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
                    <input class="form-control{{ $errors->has('lieu') ? ' is-invalid' : '' }}" name="lieu" id="input-lieu" type="text" placeholder="{{ __('Lieu') }}" value="" required="true" aria-required="true" />
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
                    <input class="form-control{{ $errors->has('entreprise') ? ' is-invalid' : '' }}" name="entreprise" id="input-entreprise" type="text" placeholder="{{ __('Entreprise') }}" value="" required="true" aria-required="true" />
                    @if ($errors->has('entreprise'))
                    <span id="entreprise-error" class="error text-danger" for="input-entreprise">{{ $errors->first('entreprise') }}</span>
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
                    <!-- Upload  -->
                    <input class="form-control {{ $errors->has('image') ? 'is-invalid' : '' }}" type="file" accept="application/pdf" name="fileUpload" id="fileUpload" value="{{ old('fileUpload') }}">
                    <label for="fileUpload" id="file-drag">
                      <div id="start">
                        <div>Sélectionner un fichier</div>
                        <span id="fileUpload" class="btn btn-primary">{{ __('Sélectionner un fichier') }}</span>
                        <br>
                        @if ($errors->has('niveau'))
                        <span id="niveau-error" class="error text-danger">{{ $errors->first('fileUpload') }}</span>
                        @endif
                      </div>
                    </label>
                  </div>
                </div>
                </label>
              </div>
              <!-- Fin pdf-->


            </div>
            <div class="card-footer ml-auto mr-auto">
              <button type="submit" class="btn btn-primary">{{ __('Ajouter l\'offre') }}</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection