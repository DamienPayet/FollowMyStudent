@extends('layouts.templateBack')


@section('content')
@include('back.alert')

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title ">Tous les avatars</h4>
                    </div>
                    <div class="card-body">
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
                        <div>
                            <a href="{{route('avatar.create')}}">
                                <button style='margin-left:10px;' type="submit" class="btn btn-primary">
                                    Ajouter un avatar
                                </button>
                            </a>
                            <button style='margin-right:10px; float : right ;' type="submit" class="btn btn-danger delete_all" data-url="{{ url('avatars-deleteselection') }}">
                                Supprimer la séléction
                            </button>
                        </div>
                        <br /> <br />
                        <table class="table" id="table_id">
                            <thead>
                                <tr class="td-actions text-center">
                                    <th>Nom</th>
                                    <th>Aperçu</th>
                                    <th>Actions</th>
                                    <th><input type="checkbox" id="master"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($images as $image)
                                <tr class="text-center">
                                    <td>{{ $image->getFilename() }}</td>
                                    <td> <img src="{{ asset('front/images/avatars/' . $image->getFilename()) }}" width="100" height="100">
                                    </td>
                                    <td>
                                        <div style="display: inline-flex;">
                                            <a rel="tooltip" class="btn btn-linght" href="{{ asset('front/images/avatars/' . $image->getFilename()) }}" target="blank">
                                                <i class="fas fa-eye"></i>
                                                <div class="ripple-container"></div>
                                            </a>
                                            <form action="{{route('avatar.destroy', $image->getFilename() )}}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" rel="tooltip" class="btn  btn-linght btn-round" onclick="return confirm('Est tu sur de vouloir supprimer cet avatar ?')">
                                                    <i class="fas fa-times"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                    <td>
                                        <input type="checkbox" class="sub_chk" data-id="{{$image->getFilename() }}">
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
@endsection