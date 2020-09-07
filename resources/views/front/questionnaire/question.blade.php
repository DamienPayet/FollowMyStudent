@extends('layouts.templateFront')


@section('content')

  <div class="col-md-10 ml-auto col-xl-6 mr-auto">
    <p class="category">Tabs with Icons on Card</p>
    <!-- Nav tabs -->
    <div class="card">
      <div class="card-header">
        <ul class="nav nav-tabs justify-content-center" role="tablist">
          <li class="nav-item">
            <a class="nav-link active" data-toggle="tab" href="#home" role="tab">
              <i class="now-ui-icons objects_umbrella-13"></i> Home
            </a>
          </li>
        </ul>
      </div>
      <div class="card-body">
        <!-- Tab panes -->
        <div class="tab-content text-center">
          <div class="tab-pane active" id="home" role="tabpanel">
            <p>I think that’s a responsibility that I have, to push possibilities, to show people, this is the level that things could be at. So when you get something that has the name Kanye West on it, it’s supposed to be pushing the furthest possibilities. I will be the leader of a company that ends up being worth billions of dollars, because I got the answers. I understand culture. I am the nucleus.</p>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="section" >
    <div class="container">
      <h3 class="title">Typography</h3>
      <div id="typography">
        <div class="row">
          <div class="col-md-12">
            <div class="typography-line">
              <h1>
                <span>Header 1</span>The Life of Now UI Kit </h1>
              </div>
              <div class="typography-line">
                <h2>
                  <span>Header 2</span>The Life of Now UI Kit</h2>
                </div>
                <div class="typography-line">
                  <h3>
                    <span>Header 3</span>The Life of Now UI Kit</h3>
                  </div>
                  <div class="typography-line">
                    <h4>
                      <span>Header 4</span>The Life of Now UI Kit</h4>
                    </div>
                    <div id='test' class="typography-line">
                      <h5>
                        <span>Header 5</span>The Life of Now UI Kit</h5>
                      </div>
                      <div class="typography-line">
                        <h6>
                          <span>Header 6</span>The Life of Now UI Kit</h6>
                        </div>
                        <div class="typography-line">
                          <p>
                            <span>Paragraph</span>
                            I will be the leader of a company that ends up being worth billions of dollars, because I got the answers. I understand culture. I am the nucleus. I think that’s a responsibility that I have, to push possibilities, to show people, this is the level that things could be at.
                          </p>
                        </div>
                        <div class="typography-line">
                          <span>Quote</span>
                          <blockquote>
                            <p class="blockquote blockquote-primary">
                              "I will be the leader of a company that ends up being worth billions of dollars, because I got the answers. I understand culture. I am the nucleus. I think that’s a responsibility that I have, to push possibilities, to show people, this is the level that things could be at."
                              <br>
                              <br>
                              <small>
                                - Noaa
                              </small>
                            </p>
                          </blockquote>
                        </div>
                        <div class="typography-line">
                          <span>Muted Text</span>
                          <p class="text-muted">
                            I will be the leader of a company that ends up being worth billions of dollars, because I got the answers...
                          </p>
                        </div>
                        <div class="typography-line">
                          <span>Primary Text</span>
                          <p class="text-primary">
                            I will be the leader of a company that ends up being worth billions of dollars, because I got the answers...</p>
                          </div>
                          <div class="typography-line">
                            <span>Info Text</span>
                            <p class="text-info">
                              I will be the leader of a company that ends up being worth billions of dollars, because I got the answers... </p>
                            </div>
                            <div class="typography-line">
                              <span>Success Text</span>
                              <p class="text-success">
                                I will be the leader of a company that ends up being worth billions of dollars, because I got the answers... </p>
                              </div>
                              <div class="typography-line">
                                <span>Warning Text</span>
                                <p class="text-warning">
                                  I will be the leader of a company that ends up being worth billions of dollars, because I got the answers...
                                </p>
                              </div>
                              <div class="typography-line">
                                <span>Danger Text</span>
                                <p class="text-danger">
                                  I will be the leader of a company that ends up being worth billions of dollars, because I got the answers... </p>
                                </div>
                                <div class="typography-line">
                                  <h2>
                                    <span>Small Tag</span>
                                    Header with small subtitle
                                    <br>
                                    <small>Use "small" tag for the headers</small>
                                  </h2>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="space-50"></div>
                          <div id="images">
                            <h4>Images</h4>
                            <div class="row">
                              <div class="col-sm-2">
                                <p class="category">Image</p>
                                <img src="./assets/img/julie.jpg" alt="Rounded Image" class="rounded">
                              </div>
                              <div class="col-sm-2">
                                <p class="category">Circle Image</p>
                                <img src="./assets/img/julie.jpg" alt="Circle Image" class="rounded-circle">
                              </div>
                              <div class="col-sm-2">
                                <p class="category">Raised</p>
                                <img src="./assets/img/julie.jpg" alt="Raised Image" class="rounded img-raised">
                              </div>
                              <div class="col-sm-2">
                                <p class="category">Circle Raised</p>
                                <img src="./assets/img/julie.jpg" alt="Thumbnail Image" class="rounded-circle img-raised">
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <script src="{{url('front/js/questionnaire.js')}}" type="text/javascript"></script>
                    @endsection
