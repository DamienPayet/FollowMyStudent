<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="../front/images/pmr.png">
    <link rel="icon" type="image/png" href="../front/images/logo-glpmr.svg">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>
        {{ __('FollowMyStudent - Réinitialisation mot de passe') }}
    </title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <!-- CSS Files -->
    <link href="../front/css/bootstrap.min.css" rel="stylesheet" />
    <link href="../front/css/login.css" rel="stylesheet" />
    <!--   Core JS Files   -->
    <script src="../front/js/core/jquery.min.js" type="text/javascript"></script>
    <script src="../front/js/core/popper.min.js" type="text/javascript"></script>
    <script src="../front/js/core/bootstrap.min.js" type="text/javascript"></script>
    <!--  Plugin for Switches, full documentation here: http://www.jque.re/plugins/version3/bootstrap.switch/ -->
    <script src="../front/js/plugins/bootstrap-switch.js"></script>
    <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
    <script src="../front/js/plugins/nouislider.min.js" type="text/javascript"></script>
    <!--  Plugin for the DatePicker, full documentation here: https://github.com/uxsolutions/bootstrap-datepicker -->
    <script src="../front/js/plugins/bootstrap-datepicker.js" type="text/javascript"></script>
    <!--  Google Maps Plugin    
  <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>-->
    <!-- Control Center for Now Ui Kit: parallax effects, scripts for the example pages etc -->
    <script src="../front/js/now-ui-kit.js?v=1.3.0" type="text/javascript"></script>
</head>

<body class="login-page sidebar-collapse">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg bg-primary fixed-top navbar-transparent" color-on-scroll="200" style="background-color:transparent!important;">
        <div class="container" style="height: 70%;">

            <div class="dropdown button-dropdown">
                <a href="{{route('index')}}" class="dropdown-toggle" id="navbarDropdown" data-toggle="dropdown">
                    <span class="button-bar"></span>
                    <span class="button-bar"></span>
                    <span class="button-bar"></span>
                </a>

            </div>
            <div class="navbar-translate">
            <a class="navbar-brand" href="{{route('index')}}" rel="tooltip" title="Bienvenue sur Follow My Student !" data-placement="bottom">
                    Follow My Student
                </a>
                <button class="navbar-toggler navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-bar top-bar"></span>
                    <span class="navbar-toggler-bar middle-bar"></span>
                    <span class="navbar-toggler-bar bottom-bar"></span>
                </button>
            </div>
            <div class="collapse navbar-collapse justify-content-end" id="navigation" data-nav-image="../assets/img/blurred-image-1.jpg" style="background: linear-gradient(#38422b 0%, #000 80%);">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" rel="tooltip" title="Suis nous Twitter" data-placement="bottom" href="https://twitter.com/pmr_dole" target="_blank">
                            <i class="fab fa-twitter"></i>
                            <p class="d-lg-none d-xl-none">Twitter</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" rel="tooltip" title="Rejoins nous sur Facebook" data-placement="bottom" href="https://www.facebook.com/lycee.pasteurmontroland" target="_blank">
                            <i class="fab fa-facebook-square"></i>
                            <p class="d-lg-none d-xl-none">Facebook</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" rel="tooltip" title="Rendez vous sur Instagram" data-placement="bottom" href="https://www.instagram.com/mont.roland/" target="_blank">
                            <i class="fab fa-instagram"></i>
                            <p class="d-lg-none d-xl-none">Instagram</p>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- End Navbar -->

    <div class="page-header clear-filter" filter-color="yellow">
        <div class="page-header-image" style="background-image:url(../front/images/software-engineer.png)"></div>
        <!-- <a href="https://iconscout.com/illustrations/developer-team" target="_blank">Developer Team Illustration</a> by <a href="https://iconscout.com/contributors/delesign" target="_blank">Delesign Graphics</a>-->
        <div class="content">
            <div class="container">
                <div class="col-md-4 ml-auto mr-auto">
                    <div class="card card-login card-plain">
                        <div class="card-header text-center">
                            <div class="logo-container">
                                <img src="../front/images/favicon.ico" alt>
                            </div>
                        </div>
                        @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                        @endif
                        @if(session()->has('errors'))
                        <div class="alert alert-danger" role="alert">
                            @foreach($errors->all() as $error)
                            {{$error}}
                            <br>
                            @endforeach
                        </div>
                        @endif
                        <div class="card-body">
                            <form method="POST" action="{{ route('password.email') }}">
                                @csrf
                                <!-- Email -->
                                <div class="input-group no-border input-lg">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="now-ui-icons users_circle-08"></i>
                                        </span>
                                    </div>
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Email">
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <!-- Captcha -->
                                <div class="captcha text-center">
                                    <span>{!! captcha_img() !!}</span>
                                    <button type="button" class="btn btn-danger btn-round" class="reload" id="reload">
                                        &#x21bb;
                                    </button>
                                </div>
                                <script>
                                    $('#reload').click(function() {
                                        console.log("ici");
                                        $.ajax({
                                            type: 'GET',
                                            url: '/reload-captcha',
                                            success: function(data) {
                                                console.log(data.captcha);
                                                $(".captcha span").html(data.captcha);
                                            }
                                        });
                                    });
                                </script>
                                <div class="input-group no-border input-lg">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="now-ui-icons text_caps-small"></i>
                                        </span>
                                    </div>
                                    <input type="captcha" placeholder="Captcha" class="form-control" class="form-control @error('captcha') is-invalid @enderror" name="captcha" required>
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <!-- -->
                        </div>
                        <!-- Login -->
                        <div class="card-footer text-center">
                            <button type="submit" class="btn btn-primary btn-round btn-lg btn-block">{{ __('Envoyer') }}</button>
                            <div class="pull-right">
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <footer class="footer">
            <div class=" container ">
                <nav>
                    <ul>
                        <li>
                            <a href="http://www.pasteurmontroland.com/">
                                GLPMR Dole
                            </a>
                        </li>
                        <li>
                            <a href="{{route('mentions.rgpd')}}">
                                RGPD
                            </a>
                        </li>
                        <li>
                            <a href="{{route('contact.create')}}">
                                Nous contacter
                            </a>
                        </li>

                    </ul>
                </nav>
                <div class="copyright" id="copyright">
                    &copy;
                    <script>
                        document.getElementById('copyright').appendChild(document.createTextNode(new Date().getFullYear()))
                    </script>
                </div>
            </div>
        </footer>
    </div>
    <script src="{{url('audit/logger.js')}}" type="text/javascript"></script>




</body>