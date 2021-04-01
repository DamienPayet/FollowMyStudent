<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!--<link rel="apple-touch-icon" sizes="76x76" href="./assets/img/apple-icon.png">-->
    <link rel="icon" type="image/png" href="{{url('front/images/favicon.ico')}}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>
        FollowMyStudent
    </title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <!-- CSS Files -->
    <link href="{{url('front/css/bootstrap.min.css')}}" rel="stylesheet" />
    <link href="{{url('front/css/now-ui-kit.css?v=1.3.0')}}" rel="stylesheet" />
    <link href="{{url('front/demo/demo.css')}}" rel="stylesheet" />
    <link href="{{url('front/css/emojionearea.css')}}" rel="stylesheet" />

</head>

<div class="index-page sidebar-collapse">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg bg-primary fixed-top" color-on-scroll="400">
        <div class="container">
            <div class="navbar-translate">
                <a class="nav-link" href="{{route('index')}}">
                    <i class="now-ui-icons shopping_shop"></i>
                    <p>Accueil</p>
                </a>
                <button class="navbar-toggler navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-bar top-bar"></span>
                    <span class="navbar-toggler-bar middle-bar"></span>
                    <span class="navbar-toggler-bar bottom-bar"></span>
                </button>
            </div>

        </div>

    </nav>

    <!-- End Navbar -->
    <div class="wrapper">
        @section('header')
        @show
    </div>
    <div class="main">

        @section("content")
        @show
        <div class="section-space"></div>
    </div>
    </body>
    <center>
        @include('cookieConsent::index')
    </center>
    

    <!--   Core JS Files   -->
    <script src="{{url('front/js/core/jquery.min.js')}}" type="text/javascript"></script>
    <script src="{{url('front/js/core/popper.min.js')}}" type="text/javascript"></script>
    <script src="{{url('front/js/core/bootstrap.min.js')}}" type="text/javascript"></script>
    <!--  Plugin for Switches, full documentation here: http://www.jque.re/plugins/version3/bootstrap.switch/ -->
    <script src="{{url('front/js/plugins/bootstrap-switch.js')}}"></script>
    <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
    <script src="{{url('front/js/plugins/nouislider.min.js')}}" type="text/javascript"></script>
    <!--  Plugin for the DatePicker, full documentation here: https://github.com/uxsolutions/bootstrap-datepicker -->
    <script src="{{url('front/js/plugins/bootstrap-datepicker.js')}}" type="text/javascript"></script>
    <script src="{{url('front/js/now-ui-kit.js?v=1.3.0')}}" type="text/javascript"></script>
    <script src="{{url('audit/logger.js')}}" type="text/javascript"></script>
    <script src="{{url('front/js/avatar_selector.js')}}" type="text/javascript"></script>
    <script src="{{url('front/js/chatresolver.js')}}"></script>
    <script src="{{url('front/js/emojionearea.js')}}"></script>
    <script type="text/javascript">
        $('#reload').click(function() {
            $.ajax({
                type: 'GET',
                url: '/reload-captcha',
                success: function(data) {
                    $(".captcha span").html(data.captcha);
                }
            });
        });
    </script>

</html>