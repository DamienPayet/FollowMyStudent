<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="colorlib.com">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign Up Form</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="{{url('/front/questionnaire/fonts/material-icon/css/material-design-iconic-font.min.css')}}">

    <!-- Main css -->
    <link rel="stylesheet" href="{{url('/front/questionnaire/css/style.css')}}">
</head>

<body>

<div class="main">

    <div class="container">
        <div class="signup-content">
            <div class="signup-desc">
                <div class="signup-desc-content">
                    <h2><span>Questionnaire</span>ASI</h2>
                    <p class="title">Bienvenue dans le questionnaire</p>
                    <p class="title">Merci de veiller a entierement completer le questionnaire</p>

                    <img src="{{url('/front')}}" alt="" class="signup-img">
                </div>
            </div>
            <div class="signup-form-conent">
                <form method="get" id="signup-form" action="{{route('response_store')}}" class="signup-form" enctype="multipart/form-data">
                    @foreach($part as $par)
                    <h3></h3>

                    <fieldset>
                        <span class="step-current">Step {{$par->position}} / {{$part->count()}}</span>
                        @foreach($par->questions as $question)
                        <div class="form-group">
                            <input type="text" name="question_{{$question->id}}" id="question_{{$question->id}}" required/>
                            <label for="question_{{$question->id}}">{{$question->question}}</label>
                        </div>
                            @for($i = 0 ; $i < strlen($question->question)/25 ; $i++)
                                <br>
                            @endfor
                        @endforeach
                    </fieldset>
                    @endforeach

                </form>
            </div>
        </div>
    </div>

</div>

<!-- JS -->
<script src="{{url('/front/questionnaire/vendor/jquery/jquery.min.js')}}"></script>
<script src="{{url('/front/questionnaire/vendor/jquery-validation/dist/jquery.validate.min.js')}}"></script>
<script src="{{url('/front/questionnaire/vendor/jquery-validation/dist/additional-methods.min.js')}}"></script>
<script src="{{url('/front/questionnaire/vendor/jquery-steps/jquery.steps.min.js')}}"></script>
<script src="{{url('/front/questionnaire/js/main.js')}}"></script>
</body>

</html>
