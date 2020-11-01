@extends('layouts.templateFront')

@section('content')
<div class="section" id="carousel">
  <div class="container">
    <div class="title text-center h1-seo">
      <h4>Bienvenue !</h4>
    </div>
    <div class="row justify-content-center">

      <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#carouselExampleIndicators" data-slide-to="0" class=""></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="1" class=""></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="2" class="active"></li>
        </ol>
        <div class="carousel-inner" role="listbox">
          <div class="carousel-item">
            <img class="d-block" src="front/images/bg1.jpg" alt="First slide">
            <div class="carousel-caption d-none d-md-block">
              <h5>Nature, United States</h5>
            </div>
          </div>
          <div class="carousel-item">
            <img class="d-block" src="front/images/bg3.jpg" alt="Second slide">
            <div class="carousel-caption d-none d-md-block">
              <h5>Somewhere Beyond, United States</h5>
            </div>
          </div>
          <div class="carousel-item active">
            <img class="d-block" src="front/images/bg4.jpg" alt="Third slide">
            <div class="carousel-caption d-none d-md-block">
              <h5>Yellowstone National Park, United States</h5>
            </div>
          </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
          <i class="now-ui-icons arrows-1_minimal-left"></i>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
          <i class="now-ui-icons arrows-1_minimal-right"></i>
        </a>
      </div>

    </div>
  </div>
</div>
@endsection