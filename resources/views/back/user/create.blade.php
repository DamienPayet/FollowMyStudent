@extends('layouts.templateBack')
@section('title')
   Ajouter un utilisateur
@stop

@section('content')

<text style='margin-left:10px;color:red;'>* Champs obligatoires</text>
<br> </br>

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
  <div class="form-group">
    <label for="statut">Photo</label>
    <div class="custom-file">
      <input type="file" class="custom-file-input" id="selector" name="image_profil">
      <label class="custom-file-label" id="filename" for="validatedCustomFile">Choisir une photo</label>
    </div>
  </div>
    <button style='margin-bottom:10px;' type="submit" class="btn btn-primary">
        Créer
    </button>


  </form>

  <script>
  const fileSelector = document.getElementById('selector');
fileSelector.addEventListener('change', (event) => {
  const fileList = event.target.files;
  document.getElementById('filename').innerHTML = fileList[0].name;
});
</script>

@endsection
