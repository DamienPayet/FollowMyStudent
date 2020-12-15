@extends('layouts.templateBack')


@section('content')
    <link href="{{url('back/dist/css/dag.css')}}" rel="stylesheet"/>
    <div class="content">
        <div class="container-fluid">
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
                        @if (session('status'))
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="alert alert-success">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">
                                        <i class="now-ui-icons ui-1_simple-remove"></i>
                                    </span>
                                        </button>
                                        <span>{{ session('status') }}</span>
                                    </div>
                                </div>
                            </div>
                        @endif
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
                                                <!--Bouton deroulement de la section -->
                                                <div id="btn_more_{{$p->id}}">
                                                    <button onclick="down({{$p->id}})"
                                                            style='margin-right:10px; float : right ;'
                                                            class="btn btn-secondary">
                                                        <i class="fas fa-caret-square-down"></i>
                                                    </button>
                                                </div>
                                                <!--Bouton enroulement de la section -->
                                                <div style="display: none" id="btn_less_{{$p->id}}">
                                                    <button onclick="up({{$p->id}})"
                                                            style='margin-right:10px; float : right ;'
                                                            class="btn btn-secondary">
                                                        <i class="fas fa-caret-square-up"></i>
                                                    </button>
                                                </div>
                                                <!--Bouton supression de la section -->
                                                <form action="{{ route('destroy.part', $p->id) }}"
                                                      method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button
                                                        onclick="return confirm(' ❌ Est tu sur de vouloir supprimer cette section ?❌ \n ⭕Cela entrainera la supression de toutes les questions contenues dans celle-ci⭕ \n ⛔Continuer ❓')"
                                                        style='margin-right:10px; float : right ;'
                                                        class="btn btn-danger">
                                                        <i class="fas fa-times-circle"></i>
                                                    </button>
                                                </form>
                                                <!--Bouton edit de la section -->
                                                <a href="{{ route('edit.part',  $p->id) }}">
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
    <script>

        downed = false;

        function down(id) {
            downed = true;
            menu = document.getElementById('menu_' + id);
            btn_more = document.getElementById('btn_more_' + id);
            btn_less = document.getElementById('btn_less_' + id);
            menu.style = "display : block";
            btn_more.style = "display : none";
            btn_less.style = "display : block";
        }

        function up(id) {
            downed = false;
            menu = document.getElementById('menu_' + id);
            btn_more = document.getElementById('btn_more_' + id);
            btn_less = document.getElementById('btn_less_' + id);
            menu.style = "display : none";
            btn_more.style = "display : block";
            btn_less.style = "display : none";
        }
    </script>
    <script src="{{url('back/js/DragAndDrop.js')}}" type="text/javascript"></script>
@endsection
