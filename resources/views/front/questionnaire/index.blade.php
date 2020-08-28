@extends('layouts.templateFront')


@section('content')

  <div class="section section-notifications">
    <!-- Si le user a deja repondue au questionnaire-->
    <div class="alert alert-success" role="alert">
      <div class="container">
        <div class="alert-icon">
          <i class="now-ui-icons ui-2_like"></i>
        </div>
        <strong>Well done!</strong> You successfully read this important alert message.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">
            <i class="now-ui-icons ui-1_simple-remove"></i>
          </span>
        </button>
      </div>
    </div>
    <!-- Si le user n'a pas repondue au questionnaire-->
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
          <button type="button" class="btn btn-lg btn-warning" onclick="startquest()" >Démmarer le questionnaire</button>
        </div>
      </div>
    </div>
  <script src="{{url('front/js/questionnaire.js')}}" type="text/javascript"></script>
  </div>
@endsection
