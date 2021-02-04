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
                        <h4 class="card-title ">Tout les logs</h4>
                    </div>
                    <div class="card-body">
                        <table id="table_id" class="table">
                            <thead>
                                <tr>
                                    <th>id</th>
                                    <th>Action</th>
                                    <th>URL</th>
                                    <th>Méthode</th>
                                    <th>Adresse IP</th>
                                    <th width="300px">User Agent</th>
                                    <th>Utilisateur</th>
                                    <th>Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($logs as $log)
                                <tr>
                                    <td>{{$log->id}}</td>
                                    <td>{{ $log->subject }}</td>
                                    <td class="text-success">{{ $log->url }}</td>
                                    <td><label class="label label-info">{{ $log->method }}</label></td>
                                    <td class="text-warning">{{ $log->ip }}</td>
                                    <td class="text-danger">{{ $log->agent }}</td>
                                    <td>{{$log->user_id}}</td>
                                    <td>{{$log->created_at}}</td>
                                    <td>
                                        <div style="display: inline-flex;">
                                            <form action="{{route('log.destroy', $log->id)}}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" rel="tooltip" class="btn  btn-linght btn-round" onclick="return confirm('Est tu sur de vouloir supprimer ce log ?')">
                                                    <i class="fas fa-times"></i>
                                                </button>
                                            </form>
                                        </div>
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
    @endsection