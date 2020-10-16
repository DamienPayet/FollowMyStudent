@extends('layouts.templateBack')
@section('title')
   Modifier un utilisateur
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

<form style='margin-left:10px;' method="POST" action="{{route('users.update', $user->id)}}" enctype="multipart/form-data">
@csrf
@method('PUT')
  <div class="form-group">
    <label for="nom">Nom *</label>
    <input type="text" class="form-control" id="nom" name="nom" placeholder="Entrer le nom" value="@if ($user->statut == "eleve"){{ $user->eleve->nom }}@elseif ($user->statut == "admin"){{ $user->admin->nom }}@endif">
  </div>
  <div class="form-group">
    <label for="nom">Prénom *</label>
    <input type="text" class="form-control" id="prenom" name="prenom" placeholder="Entrer le prénom" value="@if ($user->statut == "eleve"){{ $user->eleve->prenom }}@elseif ($user->statut == "admin"){{ $user->admin->prenom }}@endif">
  </div>
  <div class="form-group">
    <label for="email">Email *</label>
    <input type="text" class="form-control" id="email" name="email" placeholder="Entrer l'email" value="{{$user->email}}">
  </div>
  <div class="form-group">
    <label for="statut">Statut *</label>
    <select class="form-control" id="statut" name="statut">
      @if ($user->statut == "eleve")
        <option value="eleve">Élève</option>
      @elseif ($user->statut == "admin")
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
        Modifier
    </button>
  </form>

  <form style='margin-left:10px;' action="{{route('users.editMdp', $user->id)}}" method="POST">
      @csrf
      @method('GET')
    <button type="submit" rel="tooltip" class="btn btn-success btn-round">
        Mettre un nouveau MDP
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
