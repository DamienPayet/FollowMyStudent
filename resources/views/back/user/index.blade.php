@extends('layouts.templateBack')

@section('content')

@include('back.alert')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title ">Tous les utilisateurs</h4>
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
            @if($archived_users >= 1)
            <div class="alert alert-info">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">
                </span>
              </button>
              <span>
                <center>{{ __('Il existes des utilisateurs archivés.') }}
                  <a rel="tooltip" class="btn btn-linght" href="{{route('archive.index')}}" data-original-title="" title="">
                    <i class="fas fa-eye"></i> Consulter
                    <div class="ripple-container"></div>
                  </a>
                </center>
              </span>
            </div>
            @endif
            <div>
              <a href="{{route('users.create')}}">
                <button style='margin-left:10px;' type="submit" class="btn btn-primary">
                  Ajouter un Utilisateur
                </button>
              </a>
              <button style='margin-right:10px; float : right ;' type="submit" class="btn btn-danger delete_all" data-url="{{ url('users-deleteselection') }}">
                Supprimer la séléction
              </button>
            </div>
            <br /> <br />
            <div class="table-responsive">
              <table id="table_id" class="table">
                <thead>
                  <tr>
                    <th>Prénom</th>
                    <th>Nom</th>
                    <th>Email</th>
                    <th>Photo de profil</th>
                    <th>Statut</th>
                    <th>Actions</th>
                    <th width="50px"><input type="checkbox" id="master"></th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($user as $u)
                  @if($u->archived == 0)
                  <tr>
                    <td>
                      @if ($u->statut == "eleve")
                      {{ $u->eleve->prenom }}
                      @elseif ($u->statut == "admin")
                      {{ $u->admin->prenom }}
                      @endif
                    </td>
                    <td>
                      @if ($u->statut == "eleve")
                      {{$u->eleve->nom }}
                      @elseif ($u->statut == "admin")
                      {{ $u->admin->nom }}
                      @endif
                    </td>
                    <td>{{ $u->email }}</td>
                    <td><img src="{{url($u->image_profil)}}" class="img-size-50 img-circle mr-3"></td>
                    <td>
                      @if ($u->statut == "eleve")
                      <span class="badge badge-success">{{ $u->statut }}
                    </td></span>
                    @elseif ($u->statut == "admin")
                    <span class="badge badge-danger">{{ $u->statut }}</td></span>
                    @endif
                    <td>
                      <div style="display: inline-flex;">
                        <a rel="tooltip" class="btn btn-linght" href="{{route('users.show', $u->id)}}" data-original-title="" title="">
                          <i class="fas fa-eye"></i>
                          <div class="ripple-container"></div>
                        </a>
                        <a rel="tooltip" class="btn btn-linght" href="{{route('users.edit', $u->id)}}" data-original-title="" title="">
                          <i class="fas fa-edit"></i>
                          <div class="ripple-container"></div>
                        </a>
                        @if ($u->id != auth()->id())
                        <form action="{{ route('user.archiver', $u) }}" method="post">
                          @csrf
                          @method('POST')
                          <button type="submit" rel="tooltip" class="btn  btn-linght btn-round" onclick="return confirm('Est tu sur de vouloir archiver cet utilisateur? Il ne pourra plus se connecter au site.')">
                            <i class="fas fa-check"></i>
                          </button>
                        </form>
                        <form action="{{route('users.destroy', $u->id)}}" method="post">
                          @csrf
                          @method('DELETE')
                          <button type="submit" rel="tooltip" class="btn  btn-linght btn-round" onclick="return confirm('Es-tu sur de vouloir supprimer cet utilisateur ?')">
                            <i class="fas fa-times"></i>
                          </button>
                        </form>
                        @endif
                      </div>
                    </td>
                    <td>
                      @if ($u->id != auth()->id())
                      <input type="checkbox" class="sub_chk" data-id="{{$u->id}}">
                      @endif
                    </td>
                  </tr>
                  @endif
                  @endforeach
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