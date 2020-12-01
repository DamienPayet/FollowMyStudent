<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
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

</head>

<body class="index-page sidebar-collapse">
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
							<i class="now-ui-icons design_bullet-list-67"></i>
							<p>Forum</p>
						</a>
						<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink1">
							<a class="dropdown-item" href="{{route('forum')}}">
								<i class="now-ui-icons business_chart-pie-36"></i> Accueil
							</a>
							<a class="dropdown-item" target="_blank" href="{{route('forum_mesSujets')}}">
								<i class="now-ui-icons design_bullet-list-67"></i> Mes Sujets
							</a>
						</div>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="{{route('ajaxRequest.index')}}">
							<i class="fas fa-envelope"></i>
							<p>0</p>
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
					<li class="nav-item dropdown">
						<a href="#" class="nav-link dropdown-toggle" id="navbarDropdownMenuLink1" data-toggle="dropdown">
							<i class="now-ui-icons design_app"></i>
							@if (Auth::user()->statut == "eleve")
							<p> {{Auth::user()->eleve->prenom}} {{Auth::user()->eleve->nom }}</p>
							@elseif (Auth::user()->statut == "admin")
							<p> {{Auth::user()->admin->prenom}} {{Auth::user()->admin->nom }}</p>
							@endif
						</a>
						<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink1">
							<a class="dropdown-item" href="{{ route('front.users.edit', Auth::user()->id) }}">
								<i class="now-ui-icons business_chart-pie-36"></i> Mon profil
							</a>
							<a class="dropdown-item" href="Logout" onclick="event.preventDefault();document.getElementById('logout-form').submit();"> Déconnexion </a>
							<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
								{{ csrf_field() }}
							</form>
							</a>
						</div>
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

	</div>
	<footer class="footer footer-big" data-background-color="black">
		<div class="container">

			<div class="content">
				<div class="row">
					<div class="col-md-2">
						<h5 style="color: var(--primary-color);">A propos</h5>
						<ul class="links-vertical">
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
					</div>
					<div class="col-md-2">
						<h5 style="color: var(--primary-color);">Les offres</h5>
						<ul class="links-vertical">
							<li>
								<a href="{{route('offre_front_index')}}">
									Consulter
								</a>
							</li>
						</ul>
					</div>
					<div class="col-md-2">
						<h5 style="color: var(--primary-color);">Le forum</h5>
						<ul class="links-vertical">
							<li>
								<a href="#pablo">
									Les règles
								</a>
							</li>
							<li>
								<a href="{{route('forum')}}">
									Accueil
								</a>
							</li>
							<li>
								<a href="#pablo">
									Mes sujets
								</a>
							</li>
						</ul>
					</div>
					<div class="col-md-4">
						<h5 style="color: var(--primary-color);">Suis nous !</h5>
						<ul class="social-buttons">
							<li>
								<a class="nav-link" rel="tooltip" title="Suivez nous sur Twitter" data-placement="bottom" href="https://twitter.com/pmr_dole" target="_blank">
									<i class="fab fa-twitter"></i>
									<p class="d-lg-none d-xl-none">Twitter</p>
								</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" rel="tooltip" title="Venez sur Facebook" data-placement="bottom" href="https://www.facebook.com/lycee.pasteurmontroland" target="_blank">
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

						<h5><small>Les nombres ne mentent pas...</small></h5>
						<h5>7777<small class="text-muted">Offres disponibles</small></h5>
						<h5>1.423.183 <small class="text-muted">Échanges</small></h5>
					</div>
				</div>
			</div>

			<hr>

			<div class="copyright" id="copyright">
				&copy;
				<script>
					document.getElementById('copyright').appendChild(document.createTextNode(new Date().getFullYear()))
				</script>
				Coded by <a href="" target="_blank">Damien, Hugo et Florent</a>.
			</div>
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
	<script src="{{url('audit/logger.js')}}" type="text/javascript"></script>
	<script src="{{url('front/js/avatar_selector.js')}}" type="text/javascript"></script>
</body>
<script type="text/javascript">
    $('#reload').click(function () {
        $.ajax({
            type: 'GET',
            url: '/reload-captcha',
            success: function (data) {
                $(".captcha span").html(data.captcha);
            }
        });
    });

</script>
</html>"
