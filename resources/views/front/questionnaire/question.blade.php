<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="colorlib.com">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign Up Form</title>

    <!-- Font Icon -->
    <link rel="stylesheet"
          href="{{url('front/questionnaire/fonts/material-icon/css/material-design-iconic-font.min.css')}}">
    <link rel="stylesheet" href="{{url('front/questionnaire/css/style.css')}}">
</head>
<body>

<div class="main">
    <label id="startval" style="display: none ">{{$startInt}}</label>
    <div class="container">
        <h2>Questionnaire ASI</h2>
        <form method="POST" id="signup-form" class="signup-form" enctype="multipart/form-data">
            @foreach($part as $partie)
                <h3>
                    {{$partie->titre}}
                </h3>
                <fieldset>
                    <div class="question_div">
                        @foreach($partie->questions as $question)
                            <div class="form-group">
                                <label class="label_question">{{$question->question}}</label>
                                <input class="part_{{$partie->position}}" type="text" name="{{$partie->position}}"
                                       id="{{$question->id}}" placeholder="{{$question->question}}"/>
                            </div>
                        @endforeach
                    </div>
                </fieldset>
            @endforeach
            <h3>
                FIN
            </h3>
            <fieldset>
                <div class="question_div">
                    <div class="form-group">
                        <label styleclass="label_question" style="
    text-align: center;
    font-size: xxx-large;
    color: #1ed760;
">Merci d'avoir participé au questionnaire.</label>
                        <label styleclass="label_question" style="
    text-align: center;
    font-size: x-large;
    color: #1ed760;
">Cliquer sur finish pour retourner a la page d'acceuil.</label>
                    </div>
                </div>
            </fieldset>
        </form>

    </div>

</div>

<!-- JS -->
<script src="{{url('front/questionnaire/vendor/jquery/jquery.min.js')}}"></script>
<script src="{{url('front/questionnaire/vendor/jquery-validation/dist/jquery.validate.min.js')}}"></script>
<script src="{{url('front/questionnaire/vendor/jquery-validation/dist/additional-methods.min.js')}}"></script>
<script src="{{url('front/questionnaire/vendor/jquery-steps/jquery.steps.min.js')}}"></script>
<script src="{{url('front/questionnaire/js/main.js')}}"></script>
<script src="{{url('front/js/questionnaire.js')}}" type="text/javascript"></script>
</body>
</html>

