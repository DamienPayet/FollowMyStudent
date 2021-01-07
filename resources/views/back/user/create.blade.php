@extends('layouts.templateBack')
@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <text style='margin-left:10px;color:red;'>* Champs obligatoires</text>
        <br>
        <div class="card ">
          <div class="card-body ">
            <div class="row">
              <div class="col-md-12 ">
                <a href="{{ route('users.index') }}" class="btn btn-sm btn-secondary "><i class="fas fa-arrow-left"></i> Retour</a>
              </div>
            </div>
            <br>
            @if ($errors->any())
            <div class="alert alert-danger">
              <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
              </ul>
            </div>
            @endif


            <form style='margin-left:10px;' method="POST" action="{{route('users.store')}}" enctype="multipart/form-data">
              @csrf
              <div class="form-group">
                <label for="nom">Nom *</label>
                <input type="text" class="form-control" id="nom" name="nom" placeholder="Entrer le nom" value="{{ old('nom') }}">
              </div>
              <div class="form-group">
                <label for="nom">Prénom *</label>
                <input type="text" class="form-control" id="prenom" name="prenom" placeholder="Entrer le prénom" value="{{ old('prenom') }}">
              </div>
              <div class="form-group">
                <label for="email">Email *</label>
                <input type="text" class="form-control" id="email" name="email" placeholder="Entrer l'email" value="{{ old('email') }}">
              </div>
              <div class="form-group">
                <label for="mdp">Mot de Passe *</label>
                <input type="password" class="form-control" id="mdp" name="mdp" placeholder="Entrer le mot de passe" value="{{ old('mdp') }}">
              </div>
              <div class="form-group">
                <label for="statut">Statut *</label>
                <select class="form-control" id="statut" name="statut">
                  @if (old('statut') == "eleve")
                  <option value="eleve">Élève</option>
                  @elseif (old('statut') == "admin")
                  <option value="admin">Administrateur</option>
                  @endif
                  <option value="eleve">Élève</option>
                  <option value="admin">Administrateur</option>
                </select>
              </div>
              <!-- Avatar -->
              <div class="form-group avatar">
                <label class="col-sm-2 col-form-label">Avatar</label>
                <div class="ml-auto mr-auto text-center">
                  <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#myModal">
                    Avatars disponibles
                  </button>
                  <input hidden id="imagechoisie" name="imagechoisie" type="text">
                  <br>
                </div>
              </div>
              <!-- Fin  Avatar -->
              <div class="card-footer ml-auto mr-auto text-center">
                <button type="submit" class="btn btn-success">Créer</button>
              </div>
          </div>
        </div>
      </div>
      </form>
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
<script>
  const fileSelector = document.getElementById('selector');
  fileSelector.addEventListener('change', (event) => {
    const fileList = event.target.files;
    document.getElementById('filename').innerHTML = fileList[0].name;
  });
</script>

@endsection