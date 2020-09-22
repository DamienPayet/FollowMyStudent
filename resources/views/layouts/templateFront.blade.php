<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
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
</head>

<body class="index-page sidebar-collapse">
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg bg-primary fixed-top  " id="example-navbar-success" color-on-scroll="400">
    <div class="container">
      <div class="navbar-translate">

        <ul class="nav navbar-nav navbar-right">
          <!-- Authentication Links -->
          @if (Auth::guest())
          <li><a href="{{ url('/login') }}">Login</a></li>
          <!--<li><a href="{{ url('/register') }}">Register</a></li> -->
          @else
          <li class="dropdown">
            <p style="color:white">Bienvenue,</p>
            <a href="User" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
              {{Auth::user()->name }} <span class="caret"></span>
            </a>
            <ul class="dropdown-menu" role="menu">
              <li>
                <a class="dropdown-item" href="Profil">Mon profil<div class="ripple-container"></div></a>
              </li>
              <li>
                <a class="dropdown-item" href="Logout" onclick="event.preventDefault();document.getElementById('logout-form').submit();"> Déconnexion </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  {{ csrf_field() }}
                </form>
              </li>
            </ul>
          </li>
          @endif
        </ul>
      </div>
      <div class="collapse navbar-collapse justify-content-end" id="navigation" data-nav-image="./assets/img/blurred-image-1.jpg">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="{{route('index')}}">
              <i class="now-ui-icons shopping_shop"></i>
              <p>Accueil</p>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('offre_front_index')}}">
              <i class="now-ui-icons business_briefcase-24"></i>
              <p>Les Offres</p>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('questionnaire')}}">
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
                <i class="now-ui-icons business_chart-pie-36"></i> Acceuil
              </a>
              <a class="dropdown-item" target="_blank" href="{{route('forum_mesSujets')}}">
                <i class="now-ui-icons design_bullet-list-67"></i> Mes Sujets
              </a>
            </div>

          </li>

          <li class="nav-item">
            <a class="nav-link" href="https://twitter.com/CreativeTim">
              <i class="fas fa-envelope"></i>
              <p>0</p>
            </a>
          </li>
          @if(Auth::user()->administrateur_id)
          <li class="nav-item">
            <a class="nav-link" href="{{route('back')}}">
              <i class="now-ui-icons ui-2_settings-90"></i>
              <p>Administration</p>
            </a>
          </li>
          @endif
          <!--    <li class="nav-item">
          <a class="nav-link btn btn-neutral" href="https://www.creative-tim.com/product/now-ui-kit-pro" target="_blank">
          <i class="now-ui-icons arrows-1_share-66"></i>
          <p>Upgrade to PRO</p>
        </a>
      </li>
      <li class="nav-item">
      <a class="nav-link" rel="tooltip" title="Follow us on Twitter" data-placement="bottom" href="https://twitter.com/CreativeTim" target="_blank">
      <i class="fab fa-twitter"></i>
      <p class="d-lg-none d-xl-none">Twitter</p>
    </a>
  </li>
  <li class="nav-item">
  <a class="nav-link" rel="tooltip" title="Like us on Facebook" data-placement="bottom" href="https://www.facebook.com/CreativeTim" target="_blank">
  <i class="fab fa-facebook-square"></i>
  <p class="d-lg-none d-xl-none">Facebook</p>
</a>
</li>
<li class="nav-item">
<a class="nav-link" rel="tooltip" title="Follow us on Instagram" data-placement="bottom" href="https://www.instagram.com/CreativeTimOfficial" target="_blank">
<i class="fab fa-instagram"></i>
<p class="d-lg-none d-xl-none">Instagram</p>
</a>
</li>-->
        </ul>
      </div>
    </div>
  </nav>
  <!-- End Navbar -->
  <div class="wrapper">
    @section('header')
    @show

    <div class="main">
      @section("content")

      @show
    </div>
    <footer class="footer" data-background-color="black">
      <div class=" container ">
        <nav>
          <!--    <ul>
        <li>
        <a href="https://www.creative-tim.com">
        Creative Tim
      </a>
    </li>
    <li>
    <a href="http://presentation.creative-tim.com">
    About Us
  </a>
</li>
<li>
<a href="http://blog.creative-tim.com">
Blog
</a>
</li>
</ul>-->
        </nav>
        <div class="copyright" id="copyright">
          &copy;
          <script>
            document.getElementById('copyright').appendChild(document.createTextNode(new Date().getFullYear()))
          </script>, Designed by
          <a href="" target="_blank">Damso</a>. Coded by
          <a href="" target="_blank">Florent / Hugo / Damien</a>.
        </div>
      </div>
    </footer>
    <!--   Core JS Files   -->
    <script src="{{url('front/js/core/jquery.min.js')}}" type="text/javascript"></script>
    <script src="{{url('front/js/core/popper.min.js')}}" type="text/javascript"></script>
    <script src="{{url('front/js/core/bootstrap.min.js')}}" type="text/javascript"></script>
    <!--  Plugin for Switches, full documentation here: http://www.jque.re/plugins/version3/bootstrap.switch/ -->
    <!--<script src="{{url('front/js/plugins/bootstrap-switch.js')}}"></script>-->
    <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
    <script src="{{url('front/js/plugins/nouislider.min.js')}}" type="text/javascript"></script>
    <!--  Plugin for the DatePicker, full documentation here: https://github.com/uxsolutions/bootstrap-datepicker -->
    <script src="{{url('front/js/plugins/bootstrap-datepicker.js')}}" type="text/javascript"></script>

    <script>
      $(document).ready(function() {
        // the body of this function is in assets/js/now-ui-kit.js
        nowuiKit.initSliders();
      });

      function scrollToDownload() {

        if ($('.section-download').length != 0) {
          $("html, body").animate({
            scrollTop: $('.section-download').offset().top
          }, 1000);
        }
      }
    </script>
</body>

</html>