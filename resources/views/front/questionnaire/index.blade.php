@extends('layouts.templateFront')

@section('content')
<div class="section">
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div id="acceuil">
                        <br>
                        <!-- Si le user n'a pas repondue au questionnaire-->
                        @if ($user->qreponses->count() == $question->count())
                        <!-- Si le user a deja repondue au questionnaire-->
                        <div class="container-fluid">
                                <div class="text-center" style="margin : 20px">
                                    <div class="alert alert-success" role="alert">
                                        <div class="container">
                                            <div class="alert-icon">
                                                <i class="now-ui-icons ui-2_like"></i>
                                            </div>
                                            <strong>Parfait!</strong> Votre questionnaire est complet.
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">
                                                    <i class="now-ui-icons ui-1_simple-remove"></i>
                                                </span>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="text-center">
                                        <img style="width : 20% ;" src="{{url('front/images/v2.png')}}">
                                    </div>
                                    @elseif ($user->qreponses->count() == 0)
                                    <div class="alert alert-danger" role="alert">
                                        <div class="container">
                                            <div class="alert-icon">
                                                <i class="now-ui-icons objects_support-17"></i>
                                            </div>
                                            <strong>Attention!</strong> Tu n'as pas encore répondu au questionnaire.
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">
                                                    <i class="now-ui-icons ui-1_simple-remove"></i>
                                                </span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="container">

                                    <div class="row">
                                        <div class="col text-center">
                                            <button type="button" class="btn btn-lg btn-warning" onclick="startquest()">
                                                Démarrer le questionnaire
                                            </button>
                                        </div>
                                    </div>

                                    @else

                                    <div class="alert alert-danger" role="alert">
                                        <div class="container">
                                            <div class="alert-icon">
                                                <i class="now-ui-icons objects_support-17"></i>
                                            </div>
                                            <strong>Attention !</strong> Vous n'avez pas terminé le questionnaire .
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">
                                                    <i class="now-ui-icons ui-1_simple-remove"></i>
                                                </span>
                                            </button>
                                        </div>
                                    </div>

                                    <div class="container">
                                        <div class="row">
                                            <div class="col text-center">
                                                <button type="button" class="btn btn-lg btn-warning" onclick="startquest()">
                                                    Reprendre là où je me suis arreté
                                                </button>
                                            </div>
                                        </div>
                                    </div>

                                    @endif
                                    <div class="section-space"></div>
                                    <div class="section-space"></div>
                                    <div class="section-space"></div>
                                    <script>
                                        var obj = JSON.parse('<?php echo json_encode($user) ?>');
                                    </script>

                                    <script src="{{url('front/js/questionnaire.js')}}" type="text/javascript"></script>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection