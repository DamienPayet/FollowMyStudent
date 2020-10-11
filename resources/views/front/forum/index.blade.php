@extends('layouts.templateFront')


@section('content')
<div class="wrapper">
  <div class="page-header page-header-small">
    <center>
      <img src="{{url('front/images/bg4.jpg')}}"></img>
    </center>
    <div class="content-center">
      <div class="container">
        <h1 class="title">Bienvenue sur le forum !</h1>
        <div class="text-center">
          {{ __('Besoin d\'aide? Une question? Ce forum est fait pour toi.') }}
        </div>
        <div class="text-center">
          {{ __('Avant toute chose, merci de lire, les ')}}
          <a href="#rules" data-toggle="tab">règles.</a>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="cd-section" id="features">
  <div class="container">
  @foreach ($section as $sections)
    <div class="features-8 section-image" style="background-image: url('front/images/bg6.jpg')">
      <div class="col-md-8 ml-auto mr-auto text-center">
        <h2 class="title">
          <i class="now-ui-icons now-ui-icons files_paper" style="width : 30px">
          </i>
          {{$sections->titre}}</h2>
        <h4 class="description"> {{$sections->description}}</h4>
      </div>
      <div class="container">
        <div class="row">
          <div class="col-md-3">
            <div class="card">
              <div class="card-image">
                <img src="front/images/bg7.jpg" class="rounded" alt="">
              </div>
              <div class="info text-center">
                <div class="icon">
                  <i class="now-ui-icons ui-1_email-85"></i>
                </div>
                <h4 class="info-title">Orientation</h4>
                <p class="description">If you get a reply, further follow-ups are automatically stopped.</p>
              </div>
            </div>
          </div>

          <div class="col-md-3">
            <div class="card">
              <div class="card-image">
                <img src="assets/img/bg26.jpg" class="rounded" alt="">
              </div>
              <div class="info text-center">
                <div class="icon">
                  <i class="now-ui-icons ui-1_calendar-60"></i>
                </div>
                <h4 class="info-title">Mes expériences</h4>
                <p class="description">Just set a number of days that you want send a follow-up. </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    @endforeach

    <div class="wrapper">
      <div class="section-space"></div>

      <div class="container">
        <div class="row">
          <div class="col-md-3 ml-auto mr-auto text-center">

            <!-- -->
            <h3>Dernières catégories</h3>
            <div class="blocktxt">
              <a href="#" class="btn btn-link">Java</a>
            </div>
            <div class="blocktxt">
              <a href="#" class="btn btn-link">AD</a>
            </div>
            <div class="blocktxt">
              <a href="#" class="btn btn-link">Laravel</a>
            </div>
            <!-- -->
          </div>
          <div class="col-md-3 ml-auto mr-auto text-center">
            <h3>Sujets récents</h3>
            <div class="divline"></div>
            <div class="blocktxt">
              <a href="#" class="btn btn-link">This Dock Turns Your iPhone Into a Bedside Lamp</a>
            </div>
            <div class="blocktxt">
              <a href="#" class="btn btn-link">Who Wins in the Battle for Power on the Internet?</a>
            </div>
            <div class="blocktxt">
              <a href="#" class="btn btn-link">Sony QX10: A Funky, Overpriced Lens Camera for Your Smartphone</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="wrapper">
    <div class="section-space"></div>

    @endsection