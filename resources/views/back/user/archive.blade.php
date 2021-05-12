@extends('layouts.templateBack')


@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title ">Utilisateurs archivés</h4>
          </div>
          <div class="card-body">
            @if (session('status'))
            <div class="row">
              <div class="col-sm-12">
                <div class="alert alert-success">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">
                      <i class="fas fa-times"></i>
                    </span>
                  </button>
                  <span>{{ session('status') }}</span>
                </div>
              </div>
            </div>
            @endif
            @if($archived_users == 0)
            <div class="alert alert-success">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">
                </span>
              </button>
              <span>
                <center>{{ __('Il n\'y a aucun utilisateur archivés.') }}</center>
              </span>
            </div>
            @elseif($archived_users >= 1)
            <div>
              <a href="">
                <button style='margin-right:10px; float : right ;' type="submit" class="btn btn-danger delete_all" data-url="{{ url('users-deleteselection') }}">
                  Supprimer la séléction
                </button>
              </a>
            </div>
            <br /> <br />
            <div class="table-responsive">
              <table class="table" id="table_id">
                <thead>
                  <tr class="td-actions text-center">
                    <th>Nom</th>
                    <th>Prenom</th>
                    <th>Email</th>
                    <th>Date d'archivage</th>
                    <th>Actions</th>
                    <th><input type="checkbox" id="master"></th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($users as $user)
                  @if($user->archived == 1)
                  <tr class="text-center">
                    <td>
                      @if ($user->statut == "eleve")
                      {{$user->eleve->nom }}
                      @elseif ($user->statut == "admin")
                      {{ $user->admin->nom }}
                      @endif
                    </td>
                    <td>
                      @if ($user->statut == "eleve")
                      {{ $user->eleve->prenom }}
                      @elseif ($user->statut == "admin")
                      {{ $user->admin->prenom }}
                      @endif
                    </td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->archived_at }}</td>
                    @if ($user->traite == 0)
                    <td>
                      <div style="display: inline-flex;">
                        <a rel="tooltip" class="btn btn-linght" href="{{ route('users.show', $user) }}" data-original-title="" title="">
                          <i class="fas fa-eye"></i>
                          <div class="ripple-container"></div>
                        </a>
                        <form action="{{ route('user.archiver', $user) }}" method="post">
                          @csrf
                          @method('POST')
                          <button type="submit" rel="tooltip" class="btn  btn-linght btn-round" title="Ré-Activer l'utilisateur" onclick="return confirm('Est tu sur de vouloir réactiver cet utilisateur ? Il pourra à nouveau se connecter')">
                            <i class="fas fa-check"></i>
                          </button>
                        </form>
                        <form action="{{ route('users.destroy', $user->id) }}" method="post">
                          @csrf
                          @method('DELETE')
                          <button type="submit" rel="tooltip" class="btn  btn-linght btn-round" title="Supprimer l'utilisateur archiver" onclick="return confirm('Est tu sur de vouloir supprimer cette demande ?')">
                            <i class="fas fa-times"></i>
                          </button>
                        </form>
                      </div>
                    </td>
                    @endif
                    <td>
                      <input type="checkbox" class="sub_chk" data-id="{{$user->id}}">
                    </td>
                  </tr>
                  @endif
                  @endforeach
                  @endif
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
