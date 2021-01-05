@extends('layouts.templateBack')

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title ">utilisateur n°{{$user->id}}</h4>
                    </div>
                    <div class="card-body ">
                        <div class="row">
                            <div class="col-md-12 ">
                                <a href="{{ route('users.index') }}" class="btn btn-sm btn-secondary "><i class="fas fa-arrow-left"></i> Retour</a>
                            </div>
                        </div>
                        <!-- Nom -->
                        <div class="row">
                            <label class="col-sm-2 col-form-label">{{ __('Nom') }}</label>
                            <div class="col-sm-7">
                                <div class="form-group">
                                    @if ($user->statut == "eleve")
                                    <div class="form-control" name="nom" id="nom" type="texte" style="background-color : #ececec;">{{ $user->eleve->nom }}</div>
                                    @elseif ($user->statut == "admin")
                                    <div class="form-control" name="nom" id="nom" type="texte" style="background-color : #ececec;">{{ $user->admin->nom }}</div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <!-- Fin Nom -->
                        <!-- Prénom -->
                        <div class="row">
                            <label class="col-sm-2 col-form-label">{{ __('Prénom') }}</label>
                            <div class="col-sm-7">
                                <div class="form-group">
                                    @if ($user->statut == "eleve")
                                    <div class="form-control" name="nom" id="nom" type="texte" style="background-color : #ececec;">{{ $user->eleve->prenom }}</div>
                                    @elseif ($user->statut == "admin")
                                    <div class="form-control" name="nom" id="nom" type="texte" style="background-color : #ececec;">{{ $user->admin->prenom }}</div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <!-- Fin Prénom -->
                        <!-- Email -->
                        <div class="row">
                            <label class="col-sm-2 col-form-label">{{ __('Adresse Email') }}</label>
                            <div class="col-sm-7">
                                <div class="form-group">
                                    <div class="form-control" name="email" id="email" type="email" style="background-color : #ececec;">{{ $user->email }}</div>
                                </div>
                            </div>
                        </div>
                        <!-- Fin Email -->
                        <!-- Statut -->
                        <div class="row">
                            <label class="col-sm-2 col-form-label">{{ __('Statut') }}</label>
                            <div class="col-sm-7">
                                <div class="form-group">
                                    <div class="form-control" name="telephone" id="telephone" type="tel" style="background-color : #ececec;">{{ $user->statut }}</div>
                                </div>
                            </div>
                        </div>
                        <!-- Fin Statut -->
                        <!-- Avatar -->
                        <div class="row">
                            <label class="col-sm-2 col-form-label">Avatar</label>
                            <div class="col-sm-7">
                                <div class="form-group">
                                    <center>
                                        <img src="{{url($user->image_profil)}}" class="img-size-50 img-circle mr-3">
                                    </center>
                                </div>
                            </div>

                        </div>
                        <!-- Fin Avatar -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection