@extends('layouts.templateBack')

@section('title')
Gestion Utilisateurs
@endsection

@section('content')

@include('back.alert')

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
          <td>
            @if ($u->statut == "eleve")
              {{ $u->eleve->prenom }}
            @elseif ($u->statut == "admin")
              {{ $u->admin->prenom }}
            @endif
          </td>
          <td>
            @if ($u->statut == "eleve")
              {{ $u->eleve->nom }}
            @elseif ($u->statut == "admin")
              {{ $u->admin->nom }}
            @endif
          </td>
          <td>{{ $u->email }}</td>
          <td><img src="uploads/avatars/{{$u->image_profil}}" class="img-size-50 img-circle mr-3"></td>
          <td>{{ $u->statut }}</td>
          <td>
            <form action="{{route('users.edit', $u->id)}}" method="POST">
                @csrf
                @method('GET')
              <button type="submit" rel="tooltip" class="btn btn-success btn-round">
                  <i class="material-icons">Modifier</i>
              </button>
            </form>
            <form action="{{route('users.destroy', $u->id)}}" method="POST">
                @csrf
                @method('DELETE')
              <button type="submit" rel="tooltip" class="btn btn-danger btn-round">
                  <i class="material-icons">Supprimer</i>
              </button>
            </form>
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>
@endsection
