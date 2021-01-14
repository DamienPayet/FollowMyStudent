@extends('layouts.templateBack')

@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <form method="post" action="{{ route('avatar.store') }}" autocomplete="off" class="form-horizontal" enctype="multipart/form-data" accept-charset="utf-8">
          @csrf
          @method('post')
          <div class="card ">
            <div class="card-header card-header-primary">
              <h4 class="card-title">{{ __('Ajouter un avatar') }}</h4>
              <p class="card-category"></p>
            </div>
            <!-- Retour -->
            <div class="card-body ">
              <div class="row">
                <div class="col-md-12 ">
                  <a href="{{ route('avatar.index') }}" class="btn btn-sm btn-secondary "><i class="fas fa-arrow-left"></i> Retour</a>
                </div>
              </div>
              <br>
              <!-- Avatar -->
              <div class="row">
                <label class="col-sm-2 col-form-label" for="input-pdf">{{ __('Avatar') }}</label>
                <div class="col-sm-7">
                  @csrf
                  <div class="form-group{{ $errors->has('avatar') ? ' has-danger' : '' }}">
                    <div class="custom-file">
                      <input id="selector" type="file" class="custom-file-input {{ $errors->has('image') ? 'is-invalid' : '' }}" accept=".png,.jpg,.jpeg,.svg" name="fileUpload" id="fileUpload" value="{{ old('fileUpload') }}">
                      <label id="filename" class="custom-file-label" for="validatedCustomFile">Choisir un fichier...</label>
                      @if ($errors->has('avatar'))
                      <span id="avatar-error" class="error text-danger">{{ $errors->first('fileUpload') }}</span>
                      @endif
                    </div>
                    <br>
                  </div>
                </div>
              </div>
              <div class="card-footer ml-auto mr-auto text-center )">
                <button type="submit" class="btn btn-success">{{ __('Ajouter l\'avatar') }}</button>
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