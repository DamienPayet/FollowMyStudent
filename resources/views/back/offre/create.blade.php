@extends('layouts.templateBack')

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
                <div class="col-md-12 ">
                  <a href="{{ route('offre.index') }}" class="btn btn-sm btn-secondary "><i class="fas fa-arrow-left"></i> Retour</a>
                </div>
              </div>
              <br>
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
                    <textarea name="description" rows="10" cols="78" placeholder="{{ __('Description') }}" required></textarea>
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
                    <select name="niveau" id="niveau" class="form-control"  required="true" aria-required="true">
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
              <!--Type contrat -->
              <div class="row">
                <label class="col-sm-2 col-form-label" for="input-niveau">Type de contrat</label>
                <div class="col-sm-7">
                  <div class="form-group{{ $errors->has('niveau') ? ' has-danger' : '' }}">
                    <select name="type" id="type" class="form-control"  required="true" aria-required="true">
                      <option value="" selected>Type de contrat</option>
                      <option value="CDD">CDD</option>
                      <option value="CDI">CDI</option>
                      <option value="Alternance">Apprentissage</option>
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
              <!-- Lien -->
              <div class="row">
                <label class="col-sm-2 col-form-label">{{ __('Lien') }}</label>
                <div class="col-sm-7">
                  <div class="form-group{{ $errors->has('lien') ? ' has-danger' : '' }}">
                    <input class="form-control{{ $errors->has('lien') ? ' is-invalid' : '' }}" name="lien" id="input-lien" type="text" placeholder="{{ __('Lien de l\'offre') }}" value="" />
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
                      <label id="filename" class="custom-file-label" for="validatedCustomFile">Choose file...</label>
                      @if ($errors->has('niveau'))
                      <span id="niveau-error" class="error text-danger">{{ $errors->first('fileUpload') }}</span>
                      @endif
                    </div>
                    <br>
                  </div>
                </div>
              </div>
              <div class="card-footer ml-auto mr-auto text-center )">
                <button type="submit" class="btn btn-success">{{ __('Ajouter l\'offre') }}</button>
              </div>
            </div>
          </div>

      </div>
      </form>
    </div>
  </div>
</div>
</div>

<script>
  // Script affichage du nom de fichier
  const fileSelector = document.getElementById('selector');
  fileSelector.addEventListener('change', (event) => {
    const fileList = event.target.files;
    document.getElementById('filename').innerHTML = fileList[0].name;
  });
</script>
@endsection