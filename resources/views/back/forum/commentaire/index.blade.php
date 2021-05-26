@extends('layouts.templateBack')

@section('content')

    @include('back.alert')
    <div class="content">
        <div class="container-fluid">
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
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title ">Tous les commentaires</h4>
                        </div>
                        <div class="card-body">

                            <div>
                                <button style='margin-right:10px; float : right ;' type="submit"
                                        class="btn btn-danger delete_all"
                                        data-url="{{ url('commentaires-deleteselection') }}">
                                    Supprimer la séléction
                                </button>
                            </div>
                            <br/> <br/>
                            <div class="table-responsive">
                                <table id="table_id" class="table">
                                    <thead>
                                    <tr>
                                        <th>Réponse</th>
                                        <th>Utilisateur</th>
                                        <th>Sujet</th>
                                        <th>Crée le</th>
                                        <th>Actions</th>
                                        <th width="50px"><input type="checkbox" id="master"></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($commentaires as $c)
                                        <tr>
                                            <td>
                                                {{ $c->reponse }}
                                            </td>

                                            @if($c->user_id != null)
                                                <td>
                                                    @if ($c->user->statut == "eleve")

                                                        {{$c->user->eleve->nom }} {{$c->user->eleve->prenom }}
                                                    @elseif ($c->user->statut == "admin")
                                                        {{ $c->user->admin->nom }} {{ $c->user->admin->prenom }}
                                                    @endif
                                                </td>
                                            @else
                                                <td class="text-danger font-weight-bold"> Utilisateur Supprimé</td>
                                            @endif

                                            <td>{{ $c->sujet->titre }}</td>
                                            <td>
                                                {{ $c->created_at }}
                                            </td>
                                            <td>
                                                <a rel="tooltip" class="btn btn-linght"
                                                   href="{{ route('sujet.show', $c->sujet->id) }}"
                                                   data-original-title="" title="">
                                                    <i class="fas fa-eye"></i>
                                                    <div class="ripple-container"></div>
                                                </a>
                                                <div style="display: inline-flex;">
                                                    <a rel="tooltip" class="btn btn-linght"
                                                       href="{{route('commentaire.edit', $c->id)}}"
                                                       data-original-title="" title="">
                                                        <i class="fas fa-edit"></i>
                                                        <div class="ripple-container"></div>
                                                    </a>
                                                    <form action="{{route('commentaire.destroy', $c->id)}}"
                                                          method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" rel="tooltip"
                                                                class="btn  btn-linght btn-round"
                                                                onclick="return confirm('Es-tu sur de vouloir supprimer ce commentaire ?')">
                                                            <i class="fas fa-times"></i>
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                            <td>
                                                <input type="checkbox" class="sub_chk" data-id="{{$c->id}}">
                                            </td>
                                        </tr>
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
