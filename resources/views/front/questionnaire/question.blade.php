<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>FMS - Questionnaire</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{url('/front/questionnaire/lib/fontawesome-free/css/all.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{url('/front/questionnaire/css/adminlte.min.css')}}">
    <link rel="stylesheet" href="{{url('/front/questionnaire/css/adminlte.css')}}">
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4 text-center"><br>
            <a href="{{route('index')}}">
                <button style='margin-left:10px;' type="submit" class="btn btn-primary">
                    Accueil
                </button>
            </a><br><br>
            <img width="50%" src="{{url("/front/images/v2.png")}}">
        </aside>

        <div class="content-wrapper">
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-7">
                            <h1 id="titre">Questionnaire de suivi des anciens éléves ASI</h1>
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

                                            <input type="hidden" id="info_{{$par->position}}" value="{{$par->id}}" name="part">
                                            @foreach($par->questions as $question)

                                            <div class="form-group">
                                                <label for="question_{{$question->id}}">{{$question->question}}</label>
                                                <input class=" form-control question_{{$par->position}}" type="text" name="question_{{$question->id}}" id="question_{{$question->id}}" required />
                                            </div>
                                            @endforeach
                                            <div class="text-center">
                                                <button class="btn btn-info" type="submit" id="btn_next" href="#next" role="menuitem">Suivant
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
                <a href="{{route('mentions.apropos')}}">

                    <div class="copyright" id="copyright" style="padding: 1em;">
                        &copy;
                        <script>
                            document.getElementById('copyright').appendChild(document.createTextNode(new Date().getFullYear()))
                        </script>
                        FollowMyStudent.
                    </div>
                </a>
            </div>
            <strong></strong> <a href="{{route('contact.create')}}">
                <strong> Nous contacter</strong>
            </a> -
            <a href="{{route('mentions.rgpd')}}">
                <strong>RGPD</strong>
            </a>

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
