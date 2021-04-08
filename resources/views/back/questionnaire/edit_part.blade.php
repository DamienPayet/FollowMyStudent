@extends('layouts.templateBack')


@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <form method="post" action="{{ route('update.part',$part->id) }}" autocomplete="off" class="form-horizontal"
                          enctype="multipart/form-data" accept-charset="utf-8">
                        @csrf
                        @method('post')
                        <div class="card ">
                            <div class="card-header card-header-primary">
                                <h4 class="card-title">Modifier une section</h4>
                                <p class="card-category"></p>
                            </div>
                            <!-- Retour -->
                            <div class="card-body ">
                                <div class="row">
                                    <div class="col-md-12 ">
                                        <a href="{{ route('questionnaire.index') }}" class="btn btn-sm btn-secondary "><i
                                                class="fas fa-arrow-left"></i> Retour</a>
                                    </div>
                                </div>
                                <br>
                                <!-- section  -->
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">Nom de la section :</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                            <input
                                                class="form-control{{ $errors->has('section') ? ' is-invalid' : '' }}"
                                                name="section" id="input-titre" type="text" placeholder="Question "
                                                value="{{$part->titre}}" required="true" aria-required="true"/>
                                            @if ($errors->has('name'))
                                                <span id="titre-error" class="error text-danger"
                                                      for="input-titre">{{ $errors->first('section') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="card-footer ml-auto mr-auto text-center )">
                                    <button type="submit" class="btn btn-success">Modifier la section</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
