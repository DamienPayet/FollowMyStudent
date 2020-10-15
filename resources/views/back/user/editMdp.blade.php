@extends('layouts.templateBack')
@section('title')
   Ajouter un nouveau MDP
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

<form style='margin-left:10px;' method="POST" action="{{route('users.updateMdp', $user->id)}}" enctype="multipart/form-data">
@csrf
@method('PUT')
  <div class="form-group">
    <label for="mdp">Mot de Passe *</label>
    <input type="password" class="form-control" id="mdp" name="mdp" placeholder="Entrer le nouveau mot de passe" value="{{ old('mdp') }}">
  </div>
    <button style='margin-bottom:10px;' type="submit" class="btn btn-primary">
        Modifier
    </button>
  </form>
@endsection
