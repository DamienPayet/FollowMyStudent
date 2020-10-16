@extends('layouts.templateBack')


@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <form method="post" action="{{ route('section.store') }}" autocomplete="off" class="form-horizontal" enctype="multipart/form-data" accept-charset="utf-8">
                    @csrf
                    @method('post')
                    <div class="card ">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title">Ajouter une section</h4>
                            <p class="card-category"></p>
                        </div>
                        <!-- Retour -->
                        <div class="card-body ">
                            <div class="row">
                                <div class="col-md-12 ">
                                    <a href="{{ url()->previous() }}" class="btn btn-sm btn-secondary "><i class="fas fa-arrow-left"></i> Retour</a>
                                </div>
                            </div>
                            <br>
                            <!-- section  -->
                            <div class="row">
                                <label class="col-sm-2 col-form-label">Nom de la section :</label>
                                <div class="col-sm-7">
                                    <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                        <input class="form-control{{ $errors->has('section') ? ' is-invalid' : '' }}" name="section" id="input-section" type="text" placeholder="Section " value="" required="true" aria-required="true" />
                                        @if ($errors->has('name'))
                                        <span id="section-error" class="error text-danger" for="input-section">{{ $errors->first('section') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <!-- description sectin -->
                            <div class="row">
                                <label class="col-sm-2 col-form-label">Description de la section :</label>
                                <div class="col-sm-7">
                                    <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                        <input class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" name="description" id="input-description" type="text" placeholder="Description " value="" required="true" aria-required="true" />
                                        @if ($errors->has('name'))
                                        <span id="description-error" class="error text-danger" for="input-description">{{ $errors->first('description') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer ml-auto mr-auto text-center )">
                                <button  type="submit" class="btn btn-success">Ajouter la section</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection