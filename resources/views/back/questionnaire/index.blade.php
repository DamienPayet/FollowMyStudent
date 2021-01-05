@extends('layouts.templateBack')


@section('content')
    <link href="{{url('back/dist/css/dag.css')}}" rel="stylesheet"/>
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title ">Gestion Questionnaire </h4>
                        </div>
                        <br>
                        <div style="margin : 20px">
                            <a href="{{route('questionnaire.create')}}">
                                <button type="submit" class="btn btn-success">
                                    Ajouter une Section
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
                            @foreach($parts as $parti)
                                <li id="{{$parti->id}}" class="draggable" draggable="true">
                                    <div class="card-body">
                                        <div class="card">
                                            <div class="card-header card-header-primary">
                                                <a href="">
                                                    <button style='margin-right:10px; float : left ;'
                                                            class="btn btn-dark">
                                                        <i class="fas fa-arrows-alt-v " ></i>
                                                    </button>
                                                </a>
                                                <h4 class="card-title " style="text-align: center">{{$parti->titre}}</h4>
                                                <!--Bouton deroulement de la section -->
                                                <div id="btn_more_{{$parti->id}}">
                                                    <button onclick="down({{$parti->id}})"
                                                            style='margin-right:10px; float : right ;'
                                                            class="btn btn-secondary">
                                                        <i class="fas fa-caret-square-down"></i>
                                                    </button>
                                                </div>
                                                <!--Bouton enroulement de la section -->
                                                <div style="display: none" id="btn_less_{{$parti->id}}">
                                                    <button onclick="up({{$parti->id}})"
                                                            style='margin-right:10px; float : right ;'
                                                            class="btn btn-secondary">
                                                        <i class="fas fa-caret-square-up"></i>
                                                    </button>
                                                </div>
                                                <!--Bouton supression de la section -->
                                                <form action="{{ route('destroy.part', $parti->id) }}"
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
                                                <a href="{{ route('edit.part',  $parti->id) }}">
                                                    <button style='margin-right:10px; float : right ;'
                                                            class="btn btn-info">
                                                        <i class="fas fa-edit"></i>
                                                    </button>

                                                </a>

                                            </div>
                                            <div id="menu_{{$parti->id}}" style="display : none" class="card-body">

                                                <div>
                                                    <a href="{{route('create.question',$parti)}}">
                                                        <button style='margin-left:10px;' type="submit"
                                                                class="btn btn-primary">
                                                            Ajouter une question
                                                        </button>
                                                    </a>
                                                </div>
                                                <div>
                                                    <a href="{{route('questionnaire.create')}}">
                                                        <button style='margin-right:10px; float : right ;'
                                                                type="submit"
                                                                class="btn btn-danger">
                                                            Supprimer la séction
                                                        </button>
                                                    </a>
                                                </div>
                                                <br/> <br/>
                                                <div class="table-responsive">
                                                    <table class="table" id="table_id">
                                                        <thead>
                                                        <tr class="td-actions text-center">
                                                            <th>id</th>
                                                            <th>Question</th>
                                                            <th>Position</th>
                                                            <th>Actions</th>
                                                            <th><input type="checkbox" id="master"></th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        @foreach($parti->questions as $question)
                                                            <tr id="{{ $question->id }}" class="dragtb" draggable="true" class="text-center">
                                                                <td>{{ $question->id }}</td>
                                                                <td>{{$question->question}}</td>
                                                                <td>{{ $question->position }}</td>
                                                                <td>
                                                                    <div style="display: inline-flex;">
                                                                        <a rel="tooltip" class="btn btn-linght"
                                                                           href="{{ route('questionnaire.edit', $question->id) }}"
                                                                           data-original-title="" title="">
                                                                            <i class="fas fa-edit"></i>
                                                                            <div class="ripple-container"></div>
                                                                        </a>
                                                                        <form
                                                                            action="{{ route('questionnaire.destroy', $question) }}"
                                                                            method="post">
                                                                            @csrf
                                                                            @method('DELETE')
                                                                            <button type="submit" rel="tooltip"
                                                                                    class="btn  btn-linght btn-round"
                                                                                    onclick="return confirm('Est tu sur de vouloir supprimer cette question ?')">
                                                                                <i class="fas fa-times"></i>
                                                                            </button>
                                                                        </form>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <input type="checkbox" class="sub_chk"
                                                                           data-id="{{$question->id}}">
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
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
