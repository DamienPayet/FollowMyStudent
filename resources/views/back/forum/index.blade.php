@extends('layouts.templateBack')


@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title ">Gestion du forum </h4>
                    </div>
                    <br>
                    <div style="margin : 20px">
                        <a href="{{route('forum.create')}}">
                            <button type="submit" class="btn btn-success">
                                Ajouter une Section pour le forum
                            </button>
                        </a>
                        <a href="{{route('forum.create')}}">
                            <button type="submit" class="btn btn-success">
                                Ajouter une catégorie
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
                    @foreach ($sections as $section)
                    <div class="card-body">
                        <div class="card">
                            <div class="card-header card-header-primary">
                                <h4 class="card-title">{{$section->titre}}</h4><br />
                                <p>{{ \Illuminate\Support\Str::limit($section->description, 50, $end='...') }}</p>

                                <!--Bouton deroulement de la section -->
                                <div id="btn_more_{{$section->id}}">
                                    <button onclick="down({{$section->id}})" style='margin-right:10px; float : right ;' class="btn btn-secondary">
                                        <i class="fas fa-caret-square-down"></i>
                                    </button>
                                </div>
                                <!--Bouton enroulement de la section -->
                                <div style="display: none" id="btn_less_{{$section->id}}">
                                    <button onclick="up({{$section->id}})" style='margin-right:10px; float : right ;' class="btn btn-secondary">
                                        <i class="fas fa-caret-square-up"></i>
                                    </button>
                                </div>
                                <!--Bouton supression de la section -->
                                <form action="{{ route('forum.destroy', $section->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button onclick="return confirm(' ❌ Est tu sur de vouloir supprimer cette section ? Continuer ❓')" style='margin-right:10px; float : right ;' class="btn btn-danger">
                                        <i class="fas fa-times-circle"></i>
                                    </button>
                                </form>
                                <!--Bouton edit de la section -->
                                <a href="{{ route('forum.edit',  $section->id) }}">
                                    <button style='margin-right:10px; float : right ;' class="btn btn-info">
                                        <i class="fas fa-edit"></i>
                                    </button>

                                </a>

                            </div>
                            <!-- -->
                            <div id="menu_{{$section->id}}" style="display : none" class="card-body">

                                <div>
                                    <a href="{{route('create.question',$sujet)}}">
                                        <button style='margin-left:10px;' type="submit" class="btn btn-primary">
                                            Ajouter une Catégorie
                                        </button>
                                    </a>
                                </div>
                                <div>
                                    <a href="{{route('questionnaire.create')}}">
                                        <button style='margin-right:10px; float : right ;' type="submit" class="btn btn-danger">
                                            Supprimer la Catégorie
                                        </button>
                                    </a>
                                </div>
                                <br /> <br />
                                <div class="table-responsive">
                                    <table class="table" id="table_id">
                                        <thead>
                                            <tr class="td-actions text-center">
                                                <th>id</th>
                                                <th>Question</th>
                                                <th>Date de création</th>
                                                <th>Actions</th>
                                                <th><input type="checkbox" id="master"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($section->categories as $categorie)
                                            <tr class="text-center">
                                                <td>{{ $categorie->id }}</td>
                                                <td>{{$categorie->nom}}</td>
                                                <td>{{ $categorie->created_at }}</td>
                                                <td>
                                                    <div style="display: inline-flex;">
                                                        <a rel="tooltip" class="btn btn-linght" href="{{ route('categorie.edit', $categorie->id) }}" data-original-title="" title="">
                                                            <i class="fas fa-edit"></i>
                                                            <div class="ripple-container"></div>
                                                        </a>
                                                        <form action="{{ route('categorie.destroy', $categorie) }}" method="post">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" rel="tooltip" class="btn  btn-linght btn-round" onclick="return confirm('Est tu sur de vouloir supprimer cette offre ?')">
                                                                <i class="fas fa-times"></i>
                                                            </button>
                                                        </form>
                                                    </div>
                                                </td>
                                                <td>
                                                    <input type="checkbox" class="sub_chk" data-id="{{$categorie->id}}">
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function down(id) {
        menu = document.getElementById('menu_' + id);
        btn_more = document.getElementById('btn_more_' + id);
        btn_less = document.getElementById('btn_less_' + id);
        menu.style = "display : block";
        btn_more.style = "display : none";
        btn_less.style = "display : block";
    }

    function up(id) {
        menu = document.getElementById('menu_' + id);
        btn_more = document.getElementById('btn_more_' + id);
        btn_less = document.getElementById('btn_less_' + id);
        menu.style = "display : none";
        btn_more.style = "display : block";
        btn_less.style = "display : none";
    }
</script>
@endsection