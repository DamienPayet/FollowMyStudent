@extends('layouts.templateBack')

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title ">Demande n°{{$contact->id}}</h4>
                    </div>
                    <div class="card-body ">
                        <div class="row">
                            <div class="col-md-12 ">
                                <a href="{{ route('contact.index') }}" class="btn btn-sm btn-secondary "><i class="fas fa-arrow-left"></i> Retour</a>
                            </div>
                        </div>
                        <!-- Traité -->
                        <div class="row">
                            <label class="col-sm-2 col-form-label">{{ __('Traité') }}</label>
                            <div class="col-sm-7">
                                <div class="form-group">
                                    <div class="form-control" name="nom" id="nom" type="texte" style="background-color : #ececec;">{{ $contact->traite }}</div>
                                </div>
                            </div>
                        </div>
                        <!-- Fin Traité -->
                        <!-- Nom -->
                        <div class="row">
                            <label class="col-sm-2 col-form-label">{{ __('Nom du demandeur') }}</label>
                            <div class="col-sm-7">
                                <div class="form-group">
                                    <div class="form-control" name="nom" id="nom" type="texte" style="background-color : #ececec;">{{ $contact->nom }}</div>
                                </div>
                            </div>
                        </div>
                        <!-- Fin Nom -->
                        <!-- Prénom -->
                        <div class="row">
                            <label class="col-sm-2 col-form-label">{{ __('Prénom du demandeur') }}</label>
                            <div class="col-sm-7">
                                <div class="form-group">
                                    <div class="form-control" name="prenom" id="prenom" type="texte" style="background-color : #ececec;">{{ $contact->prenom }}</div>
                                </div>
                            </div>
                        </div>
                        <!-- Fin Prénom -->
                        <!-- Téléphone -->
                        <div class="row">
                            <label class="col-sm-2 col-form-label">{{ __('Téléphone') }}</label>
                            <div class="col-sm-7">
                                <div class="form-group">
                                    <div class="form-control" name="telephone" id="telephone" type="tel" style="background-color : #ececec;">{{ $contact->telephone }}</div>
                                </div>
                            </div>
                        </div>
                        <!-- Fin Téléphone -->
                        <!-- Email -->
                        <div class="row">
                            <label class="col-sm-2 col-form-label">{{ __('Adresse Email') }}</label>
                            <div class="col-sm-7">
                                <div class="form-group">
                                    <div class="form-control" name="email" id="email" type="email" style="background-color : #ececec;">{{ $contact->email }}</div>
                                </div>
                            </div>
                        </div>
                        <!-- Fin Email -->
                        <!-- Sujet -->
                        <div class="row">
                            <label class="col-sm-2 col-form-label">{{ __('Sujet de la demande') }}</label>
                            <div class="col-sm-7">
                                <div class="form-group">
                                    <div class="form-control" name="sujet" id="sujet" type="texte" style="background-color : #ececec;">{{ $contact->sujet }}</div>
                                </div>
                            </div>
                        </div>
                        <!-- Fin Sujet -->
                        <!-- Message -->
                        <div class="row">
                            <label class="col-sm-2 col-form-label">{{ __('Message') }}</label>
                            <div class="col-sm-7">
                                <div class="form-group">
                                    <textarea readonly="yes" class="form-control" name="message" id="message" type="texte" rows="10" cols="78" style="background-color : #ececec;">{{ $contact->message }}></textarea>
                                </div>
                            </div>
                        </div>
                        <!-- Fin Message -->
                        <!-- Date de création -->
                        <div class="row">
                            <label class="col-sm-2 col-form-label">{{ __('Date de création') }}</label>
                            <div class="col-sm-7">
                                <div class="form-group">
                                    <div class="form-control" name="date" id="date" type="date" style="background-color : #ececec;">{{ $contact->created_at }}</div>
                                </div>
                            </div>
                        </div>
                        <!-- Fin Date de création -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection