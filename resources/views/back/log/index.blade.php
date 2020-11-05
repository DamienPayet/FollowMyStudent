@extends('layouts.templateBack')
@section('title')
    Gestion des logs
@stop

@section('content')


    @include('back.alert')
    <a href="/download">
        <button style='margin-left:10px;' type="submit" class="btn btn-primary">
            Exporter les logs
        </button>
    </a>

    <br/><br/>

    <table id="table_id" class="table">
        <thead>
        <tr>
            <th>id</th>
            <th>Action</th>
            <th>Ip</th>
            <th>City</th>
            <th>Country</th>
            <th>Navigateur</th>
            <th>More</th>
            <th>Utilisateur</th>
            <th>Date</th>
        </tr>
        </thead>
        <tbody>
        @foreach($logs as $log)
            <tr>
                <td>{{$log->id}}</td>
                <td>{{$log->action}}</td>
                <td>{{$log->ip}}</td>
                <td>{{$log->city}}</td>
                <td>{{$log->country}}</td>
                <td>{{$log->navigateur}}</td>
                <td>{{$log->more}}</td>
                <td>{{$log->user_id}}</td>
                <td>{{$log->created_at}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection
