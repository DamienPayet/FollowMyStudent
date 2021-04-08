@extends('layouts.templateBack')


@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <form method="post" action="{{ route('update.quest',$question) }}" autocomplete="off"
                          class="form-horizontal"
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
                                        <a href="{{ route('questionnaire.index') }}"
                                           class="btn btn-sm btn-secondary "><i
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
                                                value="{{$question->question}}" required="true" aria-required="true"/>
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
                                            <input class="form-check-input"
                                                   @if($question->questionnaire_question_id != "") checked="true"
                                                   @endif type="checkbox" onchange="verif()" id="ck1">
                                            <label class="form-check-label" for="gridCheck1">
                                                Oui
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <!-- qUESTION SELECTOR -->
                                <div id="selector" @if($question->questionnaire_question_id == "") style="display:none"
                                     @endif class="row">
                                    <label class="col-sm-2 col-form-label">sous question de :</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('description') ? ' has-danger' : '' }}">
                                            <select class="form-control" name="sous-question" id="select">
                                                @if($question->questionnaire_question_id != "")
                                                    @foreach($questions as $questiona)
                                                        <script> //console.log({{$question->questionnaire_question_id }})</script>
                                                        @if($question->questionnaire_question_id == $questiona->id)

                                                            <option value="{{$questiona->id}}"
                                                                    selected>{{$questiona->question}}</option>
                                                        @else
                                                            <option
                                                                value="{{$questiona->id}}">{{$questiona->question}}</option>
                                                        @endif
                                                    @endforeach
                                                @else
                                                    <option value="" selected>...</option>
                                                    @foreach($questions as $question)
                                                        <option
                                                            value="{{$question->id}}">{{$question->question}}</option>
                                                    @endforeach
                                                @endif
                                            </select> <!--<input class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" name="description" id="input-descr" type="texte" placeholder="{{ __('Description') }}" value="" required />-->
                                            @if ($errors->has('description'))
                                                <span id="description-error" class="error text-danger"
                                                      for="input-descr">{{ $errors->first('description') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer ml-auto mr-auto text-center )">
                                    <button value="{{$question->questionnaire_part_id}}" name="id" type="submit"
                                            class="btn btn-success">Modifier la question
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        function verif() {
            ckbox = document.getElementById('ck1');
            div = document.getElementById('selector');
            if (ckbox.checked == false) {
                div.style = "display : none";
                document.getElementById('select').value = "";
            } else {
                div.style = "display : flex";
            }
        }
    </script>
@endsection
