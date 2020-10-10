@extends('layouts.templateBack')

@section('title')
Gestion Utilisateurs
@endsection

@section('content')

  <a href="{{route('users.create')}}">
      <button style='margin-left:10px;' type="submit" class="btn btn-primary">
      Ajouter un Utilisateur
      </button>
  </a>

  <br/>  <br/>

  <table id="table_id" class="table">
    <thead>
      <tr>
        <th>id</th>
        <th>Prénom</th>
        <th>Nom</th>
        <th>Email</th>
        <th>Photo de profil</th>
        <th>Statut</th>
        <th>Option</th>
      </tr>
    </thead>
    <tbody>
  @foreach ($user as $u)
    <tr>
      <td>{{ $u->id }}</td>
      <td>.
        {{-- @if ($u->statut == "eleve")
{{ dd($u->eleve()->prenom) }}
      @elseif ($u->statut == "admin")
      @endif --}}
    </td>
    <td>
      .
  </td>
      <td>{{ $u->email }}</td>
      <td><img src="uploads/avatars/{{$u->image_profil}}" class="img-size-50 img-circle mr-3"></td>
      <td>{{ $u->statut }}</td>
      <td>.</td>
    </tr>
  @endforeach
    </tbody>
  </table>
@endsection
