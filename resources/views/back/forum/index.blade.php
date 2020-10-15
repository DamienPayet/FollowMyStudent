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
                    <center>
                        <div style="margin : 20px">
                            <a href="{{route('forum.create')}}">
                                <button type="submit" class="btn btn-success">
                                    Ajouter une Section
                                </button>
                            </a>
                        </div>
                    </center>
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
                    <!-- Section -->
                    @foreach ($sections as $section)
                    <div class="card-body">
                        <div class="card">
                            <div class="card-header card-header-primary">
                                <h4 class="card-title"><strong>{{$section->titre}}</strong></h4>
                                <!--Bouton deroulement de la section -->
                                <div id="btn_more_section{{$section->id}}">
                                    <button onclick="down({{$section->id}},'section')" style='margin-right:10px; float : right ;' class="btn btn-secondary">
                                        <i class="fas fa-caret-square-down"></i>
                                    </button>
                                </div>
                                <!--Bouton enroulement de la section -->
                                <div style="display: none" id="btn_less_section{{$section->id}}">
                                    <button onclick="up({{$section->id}},'section')" style='margin-right:10px; float : right ;' class="btn btn-secondary">
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
                                <br />
                                <span>{{ \Illuminate\Support\Str::limit($section->description, 100, $end='...') }}</span>

                            </div>
                            <!-- Catégorie -->
                            <div id="section_{{$section->id}}" style="display : none" class="card-body">
                                <center>
                                    <div class="card-header card-header-primary ">
                                        <a href="{{route('categorie.create',$section->id)}}">
                                            <button style='margin-left:10px;' type="submit" class="btn btn-primary">
                                                Ajouter une Catégorie
                                            </button>
                                        </a>
                                    </div>
                                </center>
                                @foreach($section->categories as $categorie)
                                <div class="card">
                                    <div class="info-box  bg-info">
                                        <span class="info-box-icon"><i class="fas fa-tag"></i></span>
                                        <div class="info-box-content">
                                            <span class="info-box-text">
                                                <h4 class="card-title">
                                                    {{$categorie->nom}}
                                                </h4>
                                            </span>
                                        </div>
                                        <!-- /.info-box-content -->
                                        <!--Bouton supression de la section -->
                                        <form action="{{ route('categorie.destroy', $categorie->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button onclick="return confirm(' ❌ Est tu sur de vouloir supprimer cette categorie ? Continuer ❓')" style='margin-right:10px; float : right ;' class="btn btn-danger">
                                                <i class="fas fa-times-circle"></i>
                                            </button>
                                        </form>
                                        <!--Bouton edit de la section -->
                                        <a href="{{ route('categorie.edit',  $categorie->id) }}">
                                            <button style='margin-right:10px; float : right ;' class="btn btn-info">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                        </a>
                                        <!--Bouton deroulement de la section -->
                                        <div id="btn_more_categorie{{$categorie->id}}">
                                            <button onclick="down({{$categorie->id}},'categorie')" style='margin-right:10px; float : right ;' class="btn btn-secondary">
                                                <i class="fas fa-caret-square-down"></i>
                                            </button>
                                        </div>
                                        <!--Bouton enroulement de la section -->
                                        <div style="display: none" id="btn_less_categorie{{$categorie->id}}">
                                            <button onclick="up({{$categorie->id}},'categorie')" style='margin-right:10px; float : right ;' class="btn btn-secondary">
                                                <i class="fas fa-caret-square-up"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <!-- /Catégorie -->
                                    <!-- Sujet -->
                                    <div id="categorie_{{$categorie->id}}" style="display : none" class="card-body">
                                        @if($categorie->sujets->isEmpty())
                                        <center>
                                            <div class="info-box mb-3 bg-danger card-header-primary">
                                                <div class="info-box-content">
                                                    <span class="info-box-text">Pas de sujet !</span>
                                                </div>
                                                <!-- /.info-box-content -->
                                            </div>
                                            <div class="card-header card-header-primary ">
                                                <a href="{{route('sujet.create')}}">
                                                    <button style='margin-left:10px;' type="submit" class="btn btn-primary">
                                                        Créer un sujet
                                                    </button>
                                                </a>
                                            </div>
                                        </center>
                                        @else
                                        <div class="table-responsive">
                                            <h5 class="text-center">Les sujets</h5>
                                            <table class="table" id="table_id">
                                                <thead>
                                                    <tr class="td-actions text-center">
                                                        <th>id</th>
                                                        <th>Sujet</th>
                                                        <th>Date de création</th>
                                                        <th>Actions</th>
                                                        <th><input type="checkbox" id="master"></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($categorie->sujets as $sujet)
                                                    <tr class="text-center">
                                                        <td>{{ $sujet->id }}</td>
                                                        <td>{{$sujet->titre}}</td>
                                                        <td>{{ $sujet->created_at }}</td>
                                                        <td>
                                                            <div style="display: inline-flex;">
                                                                <a rel="tooltip" class="btn btn-linght" href="{{ route('categorie.edit', $categorie->id) }}" data-original-title="" title="">
                                                                    <i class="fas fa-edit"></i>
                                                                    <div class="ripple-container"></div>
                                                                </a>
                                                                <form action="{{ route('categorie.destroy', $categorie) }}" method="post">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button type="submit" rel="tooltip" class="btn  btn-linght btn-round" onclick="return confirm('Est tu sur de vouloir supprimer cette catégorie ?')">
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
                                        @endif
                                    </div>
                                </div>

                                @endforeach
                            </div>
                            <!-- /Sujet -->
                        </div>
                    </div>
                    @endforeach
                    <!-- /Section -->
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function down(id, type) {

        switch (type) {
            case "section":
                objet = document.getElementById('section_' + id);
                btn_more = document.getElementById('btn_more_section' + id);
                btn_less = document.getElementById('btn_less_section' + id);
                break;
            case "categorie":
                objet = document.getElementById('categorie_' + id);
                btn_more = document.getElementById('btn_more_categorie' + id);
                btn_less = document.getElementById('btn_less_categorie' + id);
                break;
            case "sujet":
                objet = document.getElementById('sujet_' + id);
                btn_more = document.getElementById('btn_more_sujet' + id);
                btn_less = document.getElementById('btn_less_sujet' + id);
                break;
        }
        objet.style = "display : block";
        btn_more.style = "display : none";
        btn_less.style = "display : block";
    }

    function up(id, type) {
        console.log("chupa me");
        switch (type) {
            case "section":
                objet = document.getElementById('section_' + id);
                btn_more = document.getElementById('btn_more_section' + id);
                btn_less = document.getElementById('btn_less_section' + id);
                break;
            case "categorie":
                objet = document.getElementById('categorie_' + id);
                btn_more = document.getElementById('btn_more_categorie' + id);
                btn_less = document.getElementById('btn_less_categorie' + id);
                break;
            case "sujet":
                objet = document.getElementById('sujet_' + id);
                btn_more = document.getElementById('btn_more_sujet' + id);
                btn_less = document.getElementById('btn_less_sujet' + id);
                break;
        }
        objet.style = "display : none";
        btn_more.style = "display : block";
        btn_less.style = "display : none";
    }
</script>
@endsection