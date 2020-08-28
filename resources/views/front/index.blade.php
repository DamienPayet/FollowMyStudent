@extends('layouts.templateFront')

@section('header')
  <div class="page-header clear-filter" filter-color="orange">
    <div class="page-header-image" data-parallax="true" style="background-image:url('./assets/img/header.jpg');">
    </div>
    <div class="container">
      <div class="content-center brand">
        <img class="n-logo" src="./assets/img/now-logo.png" alt="">
        <h1 class="h1-seo">FollowMyStudent</h1>
        <h3>Lycee Pasteur Mont Roland</h3>
        <img src="{{url('front/images/pmr.png')}}"></img>
      </div>
    </div>
  </div>
@endsection

@section('content')
  <div class="section section-pagination">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <h4>Progress Bars</h4>
          <div class="progress-container">
            <span class="progress-badge">Default</span>
            <div class="progress">
              <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 25%;">
                <span class="progress-value">25%</span>
              </div>
            </div>
          </div>
          <div class="progress-container progress-primary">
            <span class="progress-badge">Primary</span>
            <div class="progress">
              <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;">
                <span class="progress-value">60%</span>
              </div>
            </div>
          </div>
          <br>
          <h4>Navigation Pills</h4>
          <ul class="nav nav-pills nav-pills-primary nav-pills-just-icons" role="tablist">
            <li class="nav-item">
              <a class="nav-link" data-toggle="tab" href="#active" role="tablist">
                <i class="far fa-gem"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" data-toggle="tab" href="#link" role="tablist">
                <i class="fa fa-thermometer-full"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-toggle="tab" href="#link" role="tablist">
                <i class="fa fa-suitcase"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link disabled" data-toggle="tab" href="#disabled" role="tablist">
                <i class="fa fa-exclamation"></i>
              </a>
            </li>
          </ul>
        </div>
        <div class="col-sm-6">
          <h4>Pagination</h4>
          <ul class="pagination pagination-primary">
            <li class="page-item active">
              <a class="page-link" href="#">1</a>
            </li>
            <li class="page-item">
              <a class="page-link" href="#link">2</a>
            </li>
            <li class="page-item">
              <a class="page-link" href="#link">3</a>
            </li>
            <li class="page-item">
              <a class="page-link" href="#link">4</a>
            </li>
            <li class="page-item">
              <a class="page-link" href="#link">5</a>
            </li>
          </ul>
          <ul class="pagination">
            <li class="page-item">
              <a class="page-link" href="#link" aria-label="Previous">
                <span aria-hidden="true"><i class="fa fa-angle-double-left" aria-hidden="true"></i></span>
              </a>
            </li>
            <li class="page-item">
              <a class="page-link" href="#link">1</a>
            </li>
            <li class="page-item active">
              <a class="page-link" href="#link">2</a>
            </li>
            <li class="page-item">
              <a class="page-link" href="#link">3</a>
            </li>
            <li class="page-item">
              <a class="page-link" href="#link" aria-label="Next">
                <span aria-hidden="true"><i class="fa fa-angle-double-right" aria-hidden="true"></i></span>
              </a>
            </li>
          </ul>
          <br>
          <h4>Labels</h4>
          <span class="badge badge-default">Default</span>
          <span class="badge badge-primary">Primary</span>
          <span class="badge badge-success">Success</span>
          <span class="badge badge-info">Info</span>
          <span class="badge badge-warning">Warning</span>
          <span class="badge badge-danger">Danger</span>
          <span class="badge badge-neutral">Neutral</span>
        </div>
      </div>
      <br>
      <div class="space"></div>
      <h4>Notifications</h4>
    </div>
  </div>
  <div class="section section-notifications">
    <div class="alert alert-success" role="alert">
      <div class="container">
        <div class="alert-icon">
          <i class="now-ui-icons ui-2_like"></i>
        </div>
        <strong>Well done!</strong> You successfully read this important alert message.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">
            <i class="now-ui-icons ui-1_simple-remove"></i>
          </span>
        </button>
      </div>
    </div>
    <div class="alert alert-info" role="alert">
      <div class="container">
        <div class="alert-icon">
          <i class="now-ui-icons travel_info"></i>
        </div>
        <strong>Heads up!</strong> This alert needs your attention, but it's not super important.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">
            <i class="now-ui-icons ui-1_simple-remove"></i>
          </span>
        </button>
      </div>
    </div>
    <div class="alert alert-warning" role="alert">
      <div class="container">
        <div class="alert-icon">
          <i class="now-ui-icons ui-1_bell-53"></i>
        </div>
        <strong>Warning!</strong> Better check yourself, you're not looking too good.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">
            <i class="now-ui-icons ui-1_simple-remove"></i>
          </span>
        </button>
      </div>
    </div>
    <div class="alert alert-danger" role="alert">
      <div class="container">
        <div class="alert-icon">
          <i class="now-ui-icons objects_support-17"></i>
        </div>
        <strong>Oh snap!</strong> Change a few things up and try submitting again.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">
            <i class="now-ui-icons ui-1_simple-remove"></i>
          </span>
        </button>
      </div>
    </div>
  </div>  <div class="section section-pagination">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <h4>Progress Bars</h4>
            <div class="progress-container">
              <span class="progress-badge">Default</span>
              <div class="progress">
                <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 25%;">
                  <span class="progress-value">25%</span>
                </div>
              </div>
            </div>
            <div class="progress-container progress-primary">
              <span class="progress-badge">Primary</span>
              <div class="progress">
                <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;">
                  <span class="progress-value">60%</span>
                </div>
              </div>
            </div>
            <br>
            <h4>Navigation Pills</h4>
            <ul class="nav nav-pills nav-pills-primary nav-pills-just-icons" role="tablist">
              <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#active" role="tablist">
                  <i class="far fa-gem"></i>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" data-toggle="tab" href="#link" role="tablist">
                  <i class="fa fa-thermometer-full"></i>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#link" role="tablist">
                  <i class="fa fa-suitcase"></i>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link disabled" data-toggle="tab" href="#disabled" role="tablist">
                  <i class="fa fa-exclamation"></i>
                </a>
              </li>
            </ul>
          </div>
          <div class="col-sm-6">
            <h4>Pagination</h4>
            <ul class="pagination pagination-primary">
              <li class="page-item active">
                <a class="page-link" href="#">1</a>
              </li>
              <li class="page-item">
                <a class="page-link" href="#link">2</a>
              </li>
              <li class="page-item">
                <a class="page-link" href="#link">3</a>
              </li>
              <li class="page-item">
                <a class="page-link" href="#link">4</a>
              </li>
              <li class="page-item">
                <a class="page-link" href="#link">5</a>
              </li>
            </ul>
            <ul class="pagination">
              <li class="page-item">
                <a class="page-link" href="#link" aria-label="Previous">
                  <span aria-hidden="true"><i class="fa fa-angle-double-left" aria-hidden="true"></i></span>
                </a>
              </li>
              <li class="page-item">
                <a class="page-link" href="#link">1</a>
              </li>
              <li class="page-item active">
                <a class="page-link" href="#link">2</a>
              </li>
              <li class="page-item">
                <a class="page-link" href="#link">3</a>
              </li>
              <li class="page-item">
                <a class="page-link" href="#link" aria-label="Next">
                  <span aria-hidden="true"><i class="fa fa-angle-double-right" aria-hidden="true"></i></span>
                </a>
              </li>
            </ul>
            <br>
            <h4>Labels</h4>
            <span class="badge badge-default">Default</span>
            <span class="badge badge-primary">Primary</span>
            <span class="badge badge-success">Success</span>
            <span class="badge badge-info">Info</span>
            <span class="badge badge-warning">Warning</span>
            <span class="badge badge-danger">Danger</span>
            <span class="badge badge-neutral">Neutral</span>
          </div>
        </div>
        <br>
        <div class="space"></div>
        <h4>Notifications</h4>
      </div>
    </div>
    <div class="section section-notifications">
      <div class="alert alert-success" role="alert">
        <div class="container">
          <div class="alert-icon">
            <i class="now-ui-icons ui-2_like"></i>
          </div>
          <strong>Well done!</strong> You successfully read this important alert message.
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">
              <i class="now-ui-icons ui-1_simple-remove"></i>
            </span>
          </button>
        </div>
      </div>
      <div class="alert alert-info" role="alert">
        <div class="container">
          <div class="alert-icon">
            <i class="now-ui-icons travel_info"></i>
          </div>
          <strong>Heads up!</strong> This alert needs your attention, but it's not super important.
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">
              <i class="now-ui-icons ui-1_simple-remove"></i>
            </span>
          </button>
        </div>
      </div>
      <div class="alert alert-warning" role="alert">
        <div class="container">
          <div class="alert-icon">
            <i class="now-ui-icons ui-1_bell-53"></i>
          </div>
          <strong>Warning!</strong> Better check yourself, you're not looking too good.
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">
              <i class="now-ui-icons ui-1_simple-remove"></i>
            </span>
          </button>
        </div>
      </div>
      <div class="alert alert-danger" role="alert">
        <div class="container">
          <div class="alert-icon">
            <i class="now-ui-icons objects_support-17"></i>
          </div>
          <strong>Oh snap!</strong> Change a few things up and try submitting again.
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">
              <i class="now-ui-icons ui-1_simple-remove"></i>
            </span>
          </button>
        </div>
      </div>
    </div>
@endsection
