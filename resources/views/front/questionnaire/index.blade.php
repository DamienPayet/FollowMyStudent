@extends('layouts.templateFront')


@section('content')

  <div id="acceuil" class="section section-notifications">
    <br>
    <br>
    <!-- Si le user n'a pas repondue au questionnaire-->
    @if ($user->qreponses->count() == $question->count())
      <!-- Si le user a deja repondue au questionnaire-->

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
    @elseif ($user->qreponses->count() == 0)

      <div class="alert alert-danger" role="alert">
        <div class="container">
          <div class="alert-icon">
            <i class="now-ui-icons objects_support-17"></i>
          </div>
          <strong>Attention !</strong> Vous n'avez pas encore repondue au questionnaire .
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
            <button type="button" class="btn btn-lg btn-warning" onclick="startquest()" >Démarer le questionnaire</button>
          </div>
        </div>
      </div>
    @else
      <div class="alert alert-danger" role="alert">
        <div class="container">
          <div class="alert-icon">
            <i class="now-ui-icons objects_support-17"></i>
          </div>
          <strong>Attention !</strong> Vous n'avez pas terminer le questionnaire .
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
            <button type="button" class="btn btn-lg btn-warning" onclick="startquest()" >Reprendre là où je me suis arreté</button>
          </div>
        </div>
      </div>
    @endif
    <script>
    var obj = JSON.parse('<?php echo json_encode($user) ?>');
    </script>

    <script src="{{url('front/js/questionnaire.js')}}" type="text/javascript"></script>
  </div>
@endsection
