@extends('layouts.templateBack')


@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <form method="post" action="{{ route('questionnaire.store') }}" autocomplete="off" class="form-horizontal"
                          enctype="multipart/form-data" accept-charset="utf-8">
                        @csrf
                        @method('post')
                        <div class="card ">
                            <div class="card-header card-header-primary">
                                <h4 class="card-title">Ajouter une question</h4>
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
                                <!-- Question  -->
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">Question :</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                            <input
                                                class="form-control{{ $errors->has('question') ? ' is-invalid' : '' }}"
                                                name="question" id="input-titre" type="text" placeholder="Question "
                                                value="" required="true" aria-required="true"/>
                                            @if ($errors->has('name'))
                                                <span id="titre-error" class="error text-danger"
                                                      for="input-titre">{{ $errors->first('titre') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <!-- Sous Question -->

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">sous question ?</label>
                                    <div class="col-sm-10">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" onclick="verif()" id="ck1">
                                            <label class="form-check-label" for="gridCheck1">
                                                Oui
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <!-- qUESTION SELECTOR -->

                                <div id="selector" style="display:none" class="row">
                                    <label class="col-sm-2 col-form-label">sous question de :</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('description') ? ' has-danger' : '' }}">
                                            <select class="form-control" name="sous-question" id="select">
                                                <option value="" selected>...</option>
                                                @foreach($questions as $question)
                                                    <option value="{{$question->id}}">{{$question->question}}</option>
                                                @endforeach
                                            </select> <!--<input class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" name="description" id="input-descr" type="texte" placeholder="{{ __('Description') }}" value="" required />-->
                                            @if ($errors->has('description'))
                                                <span id="description-error" class="error text-danger"
                                                      for="input-descr">{{ $errors->first('description') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer ml-auto mr-auto text-center )">
                                    <button name="id" value="{{$part->id}}" type="submit" class="btn btn-success">{{ __('Ajouter l\'offre') }}</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        function verif(){
            ckbox = document.getElementById('ck1');
            div = document.getElementById('selector');
            if(ckbox.checked == false){
                div.style = "display : none";
                document.getElementById('select').options[0].selected  = true;
            }else{
                div.style = "display : flex";
            }
        }
    </script>
@endsection
