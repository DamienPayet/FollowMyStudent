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
        <th>Actions</th>
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
          <td><img src="{{url($u->image_profil)}}" class="img-size-50 img-circle mr-3"></td>
          <td>{{ $u->statut }}</td>
          <td>
            <div style="display: inline-flex;">
              <a rel="tooltip" class="btn btn-linght" href="{{route('users.edit', $u->id)}}" data-original-title="" title="">
                <i class="fas fa-eye"></i>
                <div class="ripple-container"></div>
              </a>
              <a rel="tooltip" class="btn btn-linght" href="{{route('users.edit', $u->id)}}" data-original-title="" title="">
                <i class="fas fa-edit"></i>
                <div class="ripple-container"></div>
              </a>
              <form action="{{route('users.destroy', $u->id)}}" method="post">
                @csrf
                @method('DELETE')
                <button type="submit" rel="tooltip" class="btn  btn-linght btn-round" onclick="return confirm('Est tu sur de vouloir supprimer cette offre ?')">
                  <i class="fas fa-times"></i>
                </button>
              </form>
            </div>
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>
@endsection
