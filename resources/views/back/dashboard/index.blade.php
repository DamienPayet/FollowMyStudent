@extends('layouts.templateBack')


@section('content')

    <div class="container-fluid">
        <!-- Info boxes -->
        <div class="row">

            <div class="col-12 col-sm-6 col-md-3">
              <a href="{{route('offre.index')}}" class="nav-link">
                <div class="info-box">
                    <span class="info-box-icon bg-info elevation-1"><i class="fas fa-globe-europe"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Offres en ligne</span>
                        <span class="info-box-number">
                  {{$offres->count()}}
                </span>
                    </div>

                    <!-- /.info-box-content -->
                </div></a>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-12 col-sm-6 col-md-3">
              <a href="{{route('reponse.index')}}" class="nav-link">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-thumbs-up"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Questionnaire complété</span>
                        <span class="info-box-number">{{$nbruse}}</span>
                    </div>
                    <!-- /.info-box-content -->
                </div></a>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->

            <!-- fix for small devices only -->
            <div class="clearfix hidden-md-up"></div>

            <div class="col-12 col-sm-6 col-md-3">
              <a href="{{route('contact.index')}}" class="nav-link">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-success elevation-1"><i class="fas fa-question-circle"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Demande de contact</span>
                        <span class="info-box-number">{{$contact->count()}}</span>
                    </div>
                    <!-- /.info-box-content -->
                </div></a>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-12 col-sm-6 col-md-3">
              <a href="{{route('users.index')}}" class="nav-link">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-user"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Nombre d'utilisateurs</span>
                        <span class="info-box-number"> {{$utilisateurs->count()}}</span>
                    </div>
                    <!-- /.info-box-content -->
                </div></a>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->


        <!-- TABLE: LATEST ORDERS -->
        <div class="card">
            <div class="card-header border-transparent">
                <h3 class="card-title">Derniers accès</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table m-0">
                        <thead>
                        <tr>
                            <th>Utilisateur</th>
                            <th>URL</th>
                            <th>IP</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php($counter = 0 )
                        @foreach($log as $loged)
                            @php($counter++)
                            @if($counter <= 10)
                                <tr>
                                    <td>
                                      @if ($loged->user->statut == "eleve")
                                        {{ $loged->user->eleve->prenom }}
                                      @elseif ($loged->user->statut == "admin")
                                        {{ $loged->user->admin->prenom }}
                                      @endif

                                      @if ($loged->user->statut == "eleve")
                                        {{ $loged->user->eleve->nom }}
                                      @elseif ($loged->user->statut == "admin")
                                        {{ $loged->user->admin->nom }}
                                      @endif
                                    </td>
                                    <td><span class="badge badge-success">{{$loged->url}}</span></td>
                                    <td class="text-warning">
                                        <div class="sparkbar" data-color="#00a65a" data-height="20">
                                            {{$loged->ip}}
                                        </div>
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- /.card -->
    </div>
    <!-- /.col -->



@endsection
