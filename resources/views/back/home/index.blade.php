@extends('layouts.templateBack')


@section('content')
    <link href="{{url('back/dist/css/dag.css')}}" rel="stylesheet"/>
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
                            <h4 class="card-title ">Gestion de la page d'acceuil </h4>
                        </div>
                        <br>
                        <div style="margin : 20px">
                            <a href="{{route('home.create')}}">
                                <button type="submit" class="btn btn-success">
                                    Créer un post
                                </button>
                            </a>
                        </div>

                        <ul>
                            @foreach($post as $p)
                                <li id="{{$p->id}}" class="draggable" draggable="true">
                                    <div class="card-body">
                                        <div class="card">
                                            <div class="card-header card-header-primary">
                                                <a href="">
                                                    <button style='margin-right:10px; float : left ;'
                                                            class="btn btn-dark">
                                                        <i class="fas fa-arrows-alt-v "></i>
                                                    </button>
                                                </a>
                                                <h4 class="card-title "
                                                    style="text-align: center">{{$p->titre}}</h4>
                                                <!--Bouton supression de la section -->
                                                <form action="{{ route('home.destroy', $p->id) }}"
                                                      method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button
                                                        onclick="return confirm(' ❌ Es tu sur de vouloir supprimer ce post ❓')"
                                                        style='margin-right:10px; float : right ;'
                                                        class="btn btn-danger">
                                                        <i class="fas fa-times-circle"></i>
                                                    </button>
                                                </form>
                                                <!--Bouton edit de la section -->
                                                <a href="{{ route('home.edit',  $p->id) }}">
                                                    <button style='margin-right:10px; float : right ;'
                                                            class="btn btn-info">
                                                        <i class="fas fa-edit"></i>
                                                    </button>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{url('back/js/DragAndDrop.js')}}" type="text/javascript"></script>
@endsection
