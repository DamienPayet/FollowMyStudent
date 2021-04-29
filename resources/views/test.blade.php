<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>FMS / Questionnaire</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{url('/front/questionnaire/lib/fontawesome-free/css/all.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{url('/front/questionnaire/css/adminlte.min.css')}}">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <img width="100%" src="{{url("/front/images/v2.png")}}">
    </aside>

    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Questionnaire suivi des anciens éléves</h1>
                    </div>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <!-- left column -->
                    <div class="col-md-12">
                        <!-- general form elements -->
                        @foreach($part as $par)


                            <fieldset class="field" id="{{$par->position}}">
                                <div class="card card-green">
                                    <div class="card-header">
                                        <h3 class="card-title">Patie {{$par->position}} / {{$part->count()}}</h3>
                                    </div>
                                    <div class="card-body">


                                        <form class="quest_{{$par->position}}" id="{{$par->position}}">

                                            <input type="hidden" id="info_{{$par->position}}" value="{{$par->id}}"
                                                   name="part">
                                            @foreach($par->questions as $question)

                                                <div class="form-group">
                                                    <label
                                                        for="question_{{$question->id}}">{{$question->question}}</label>
                                                    <input class=" form-control question_{{$par->position}}"
                                                           type="text"
                                                           name="question_{{$question->id}}"
                                                           id="question_{{$question->id}}" required/>
                                                </div>
                                            @endforeach
                                            <div class="text-center">
                                                <button class="btn btn-info" type="submit" id="btn_next" href="#next"
                                                        role="menuitem">Suivant
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </fieldset>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
    </div>
    <footer class="main-footer">
        <div class="float-right d-none d-sm-block">
            <b>Version</b>1.0.0
        </div>
        <strong>Copyright &copy; 2020-2021 <a href="https://adminlte.io">FMS</a>.</strong> All rights reserved.
    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
<script src="{{url('/front/questionnaire/lib/jquery/jquery.min.js')}}"></script>
<script src="{{url('/front/questionnaire/lib/validate/jquery.validate.js')}}"></script>
<script src="{{url('/front/questionnaire/lib/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{url('/front/questionnaire/lib/js/adminlte.min.js')}}"></script>
<script src="{{url('/front/questionnaire/js/main.js')}}"></script>

</body>
</html>

