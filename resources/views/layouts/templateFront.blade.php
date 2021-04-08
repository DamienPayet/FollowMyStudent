<!DOCTYPE html>
<html lang="fr">

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
            <div class="collapse navbar-collapse justify-content-end" id="navigation" data-nav-image="/front/images/blurred-image-1.jpg">
                <ul class="navbar-nav">
                    @if (Auth::guest())
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('mentions.rgpd')}}">
                            <i class="now-ui-icons business_bank"></i>
                            <p>RGPD</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('contact.create')}}">
                            <i class="now-ui-icons files_paper"></i>
                            <p>Contact</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('/login')}}">
                            <i class="now-ui-icons users_single-02"></i>
                            <p>Login</p>
                        </a>
                    </li>
                    @endif
                    @if (!Auth::guest())
                    @if (Auth::user()->email_verified_at != null && Auth::user()->statut == "eleve" || Auth::user()->email_verified_at != null && Auth::user()->statut == "admin")
                    @if (Auth::user()->password_change_at != null)

                    <li class="nav-item">
                        <a class="nav-link" href="{{route('offre_front_index')}}">
                            <i class="now-ui-icons business_briefcase-24"></i>
                            <p>Les Offres</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('index_questionnaire')}}">
                            <i class="now-ui-icons files_paper"></i>
                            <p>Questionnaire</p>
                        </a>
                    </li>
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" id="navbarDropdownMenuLink1" data-toggle="dropdown">
                            <i class="now-ui-icons education_paper"></i>
                            <p>Forum</p>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink1">
                            <a class="dropdown-item" href="{{route('forum')}}">
                                <i class="now-ui-icons shopping_shop"></i> Accueil
                            </a>
                            <a class="dropdown-item" href="{{route('forum_mesSujets',Auth::user()->id)}}">

                                <i class="now-ui-icons education_agenda-bookmark"></i> Mes Sujets
                            </a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('ajaxRequest.index')}}">
                            <i class="now-ui-icons ui-1_email-85"></i>
                            <p id="envelope">0</p>
                        </a>
                    </li>
                    @if(Auth::user()->statut == 'admin')
                    <li class="nav-item">
                        <a class="nav-link" target="_blank" href="{{route('indexback')}}">
                            <i class="now-ui-icons ui-2_settings-90"></i>
                            <p>Administration</p>
                        </a>
                    </li>
                    @endif
                    @endif
                    @endif
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" id="navbarDropdownMenuLink1" data-toggle="dropdown">
                            <i class="now-ui-icons users_single-02"></i>
                            @if (Auth::user()->statut == "eleve")
                            <p> {{Auth::user()->eleve->prenom}} {{Auth::user()->eleve->nom }}</p>
                            @elseif (Auth::user()->statut == "admin")
                            <p> {{Auth::user()->admin->prenom}} {{Auth::user()->admin->nom }}</p>
                            @endif
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink1">
                            <a class="dropdown-item" href="{{ route('front.users.edit', Auth::user()->id) }}">
                                <i class="now-ui-icons ui-1_settings-gear-63"></i> Mon profil
                            </a>
                            <a class="dropdown-item" href="Logout" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                <i class="now-ui-icons media-1_button-power"></i> Déconnexion </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                            </a>
                    </li>

                    @endif
                </ul>
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
    <div class="section-space"></div>

    <div class="section-space"></div>

    <footer class="footer footer-big" data-background-color="black">
        <div class="container">

            @if (Auth::guest() || !Auth::guest() && Auth::user()->email_verified_at != null && Auth::user()->statut == "eleve" || Auth::user()->email_verified_at != null && Auth::user()->statut == "admin")
            <div class="content" style="padding: 1em;">
                <div class="row">

                    <div class="col-md-2">
                        <h5 style="color: var(--primary-color);">Mentions légales</h5>
                        <ul class="links-vertical">
                            <li>
                                <a href="{{route('mentions.rgpd')}}">
                                    RGPD
                                </a>
                            </li>

                        </ul>
                    </div>
                    <div class="col-md-2">
                        <h5 style="color: var(--primary-color);">Contact</h5>

                        <ul class="links-vertical">
                            <li>
                                <a href="{{route('contact.create')}}">
                                    Nous contacter
                                </a>
                            </li>
                        </ul>
                    </div>
                    @endif
                    <div class="col-md-2">
                    </div> 
                    @if (Auth::user()->password_change_at != null || Auth::user()->email_verified_at != null)

                    <div class="col-md-1" style="text-align: center;">
                        <img src="/front/images/favicon.ico" alt>
                    </div>@endif
                    <hr>
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

    </footer>

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
    <!-- <script src="{{url('audit/logger.js')}}" type="text/javascript"></script>-->
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
    @section('script')
    @show

</html>