@extends('layouts.templateBack')
@section('content')


    @include('back.alert')
    <!--
<a href="/download">
    <button style='margin-left:10px;' type="submit" class="btn btn-primary">
        Exporter les logs
    </button>
</a> -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title ">Tous les logs</h4>
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
                            <div>
                                <a href="{{route('log.export')}}">
                                    <button style='margin-left:10px;' type="submit" class="btn btn-primary">
                                        Exporter les logs
                                    </button>
                                </a>
                                <button style='margin-right:10px; float : right ;' type="submit"
                                        class="btn btn-danger delete_all" data-url="{{ url('logs-deleteselection') }}">
                                    Supprimer la séléction
                                </button>
                            </div>
                            <br/> <br/>

                            <div class="table-responsive">

                                <table id="table_id" class="table">
                                    <thead>
                                    <tr>
                                        <th>Action</th>
                                        <th>URL</th>
                                        <th>Méthode</th>
                                        <th>IP</th>
                                        <th width="300px">User Agent</th>
                                        <th>Utilisateur</th>
                                        <th>Date</th>
                                        <th>Action</th>
                                        <th width="50px"><input type="checkbox" id="master"></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($logs as $log)
                                        <tr>
                                            <td>{{ $log->subject }}</td>
                                            <td class="text-success">{{ $log->url }}</td>
                                            <td><label class="label label-info">{{ $log->method }}</label></td>
                                            <td class="text-warning">{{ $log->ip }}</td>
                                            <td class="text-danger">{{ $log->agent }}</td>

                                            @if($log->user_id != null)
                                                <td>
                                                    @if ($log->user->statut == "eleve")
                                                        {{ $log->user->eleve->prenom }}
                                                    @elseif ($log->user->statut == "admin")
                                                        {{ $log->user->admin->prenom }}
                                                    @endif

                                                    @if ($log->user->statut == "eleve")
                                                        {{ $log->user->eleve->nom }}
                                                    @elseif ($log->user->statut == "admin")
                                                        {{ $log->user->admin->nom }}
                                                    @endif
                                                </td>
                                            @else
                                                <td class="text-danger font-weight-bold">
                                                    Utilisateur Supprimé
                                                </td>
                                            @endif

                                            <td>
                                                {{ \Carbon\Carbon::parse($log->created_at)->format('d/m/Y  H:i:s')}}
                                            </td>
                                            <td>
                                                <div style="display: inline-flex;">
                                                    <form action="{{route('log.destroy', $log->id)}}" method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" rel="tooltip"
                                                                class="btn  btn-linght btn-round"
                                                                onclick="return confirm('Est tu sur de vouloir supprimer ce log ?')">
                                                            <i class="fas fa-times"></i>
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                            <td>
                                                <input type="checkbox" class="sub_chk" data-id="{{$log->id}}">
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
