@extends('layouts.templateBack')


@section('content')
<link href="{{url('back/dist/css/dag.css')}}" rel="stylesheet" />
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title ">Gestion des réponses </h4>
                    </div>
                    <br>
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
                    <button data-href="/download" id="export" style='margin-right:10px;' class="btn btn-success btn-sm" onclick="exportTasks(event.target);"><i class="fas fa-edit"></i> Exporter les données</button>
                    <script>
                 function exportTasks(_this) {
                    let _url = $(_this).data('href');
            window.location.href = _url;
                }
                </script>
                   
                    <ul>
                        @foreach($questions as $question)

                        <li id="{{$question->id}}" class="draggable" draggable="true">
                            <div class="card-body">
                                <div class="card">
                                    <div class="card-header card-header-primary">

                                        <h4 class="card-title " style="text-align: center">{{$question->question}}</h4>
                                        <!--Bouton deroulement de la section -->
                                        <div id="btn_more_{{$question->id}}">
                                            <button onclick="down({{$question->id}})" style='margin-right:10px; float : right ;' class="btn btn-secondary">
                                                <i class="fas fa-caret-square-down"></i>
                                            </button>
                                        </div>
                                        <!--Bouton enroulement de la section -->
                                        <div style="display: none" id="btn_less_{{$question->id}}">
                                            <button onclick="up({{$question->id}})" style='margin-right:10px; float : right ;' class="btn btn-secondary">
                                                <i class="fas fa-caret-square-up"></i>
                                            </button>
                                        </div>
                                    </div>

                                    @foreach($question->reponses as $rep)


                                    <div id="menu_{{$question->id}}" style="display : none" class="card-body">
                                        <br /> <br />
                                        <div class="table-responsive">
                                            <table class="table" id="table_id">
                                                <thead>
                                                    <tr class="td-actions text-center">
                                                        <th>id</th>
                                                        <th>Réponse</th>
                                                        <th>Utilisateur</th>
                                                        <th>Date</th>

                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr id="{{ $question->id }}" class="dragtb" draggable="true" class="text-center">
                                                        <td>{{$rep->id}}</td>
                                                        <td>{{$rep->reponse}}</td>
                                                        @if ($rep->user->statut == "eleve")
                                                        <td> {{ $rep->user->eleve->nom }} {{ $rep->user->eleve->prenom }}</td>
                                                        @elseif ($rep->user->statut == "admin")
                                                        <td> {{ $rep->user->admin->nom }} {{ $rep->user->admin->prenom }}</td>
                                                        @endif
                                                        <td>{{$rep->created_at}}</td>

                                                    </tr>

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    @endforeach





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
@endsection