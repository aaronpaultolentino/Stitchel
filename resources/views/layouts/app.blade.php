<!--

=========================================================
* Argon Dashboard - v1.1.0
=========================================================

* Product Page: https://www.creative-tim.com/product/argon-dashboard
* Copyright 2019 Creative Tim (https://www.creative-tim.com)
* Licensed under MIT (https://github.com/creativetimofficial/argon-dashboard/blob/master/LICENSE.md)

* Coded by Creative Tim

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software. -->
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>
    {{ config('app.name') }}
  </title>
  <!-- Favicon -->
  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
  <!-- Icons -->
  <link href="{{ url('argon/assets/js/plugins/nucleo/css/nucleo.css') }}" rel="stylesheet" />
<script src="https://kit.fontawesome.com/2a3479ee76.js" crossorigin="anonymous"></script>
  <!-- CSS Files -->
  <link href="{{ url('argon/assets/css/argon-dashboard.css?v=1.1.0&ev_version=1&ev_version=1') }}" rel="stylesheet" />
  <link href="{{ url('argon/assets/css/main.css') }}" rel="stylesheet" />
  <link href="{{ url('css/global.css?v='.time()) }}" rel="stylesheet" />
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta name="url" content="{{ url('') }}">
  <meta name="theme-color" content="#5e72e4">
  @yield('style')
  @stack('styles')

  <style type="text/css">
    #myBtn {
      display: none;
      position: fixed;
      bottom: 10px;
      right: 20px;
      z-index: 99;
      cursor: pointer;
      padding: 15px;
      border-radius: 4px;
    }

    .accordion-button{
    position:relative;
    display:flex;
    align-items:center;
    width:100%;
    padding:1rem 1.25rem;
    font-size:1rem;
    color:#212529;
    text-align:left;
    background-color:#fff;
    border:0;
    border-radius:0;
    overflow-anchor:none;
    transition:color .15s ease-in-out,background-color .15s ease-in-out,border-color .15s ease-in-out,box-shadow .15s ease-in-out,border-radius .15s ease
}
@media (prefers-reduced-motion:reduce){
    .accordion-button{
        transition:none
    }
}
.accordion-button:not(.collapsed){
    color:#0c63e4;
    background-color:#e7f1ff;
    box-shadow:inset 0 -1px 0 rgba(0,0,0,.125)
}
.accordion-button:not(.collapsed)::after{
    background-image:url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16' fill='%230c63e4'%3e%3cpath fill-rule='evenodd' d='M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z'/%3e%3c/svg%3e");
    transform:rotate(-180deg)
}
.accordion-button::after{
    flex-shrink:0;
    width:1.25rem;
    height:1.25rem;
    margin-left:auto;
    content:"";
    background-image:url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16' fill='%23212529'%3e%3cpath fill-rule='evenodd' d='M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z'/%3e%3c/svg%3e");
    background-repeat:no-repeat;
    background-size:1.25rem;
    transition:transform .2s ease-in-out
}
@media (prefers-reduced-motion:reduce){
    .accordion-button::after{
        transition:none
    }
}
.accordion-button:hover{
    z-index:2
}
.accordion-button:focus{
    z-index:3;
    border-color:#86b7fe;
    outline:0;
    box-shadow:0 0 0 .25rem rgba(13,110,253,.25)
}
.accordion-header{
    margin-bottom:0
}
.accordion-item{
    background-color:#fff;
    border:1px solid rgba(0,0,0,.125)
}
.accordion-item:first-of-type{
    border-top-left-radius:.25rem;
    border-top-right-radius:.25rem
}
.accordion-item:first-of-type .accordion-button{
    border-top-left-radius:calc(.25rem - 1px);
    border-top-right-radius:calc(.25rem - 1px)
}
.accordion-item:not(:first-of-type){
    border-top:0
}
.accordion-item:last-of-type{
    border-bottom-right-radius:.25rem;
    border-bottom-left-radius:.25rem
}
.accordion-item:last-of-type .accordion-button.collapsed{
    border-bottom-right-radius:calc(.25rem - 1px);
    border-bottom-left-radius:calc(.25rem - 1px)
}
.accordion-item:last-of-type .accordion-collapse{
    border-bottom-right-radius:.25rem;
    border-bottom-left-radius:.25rem
}
.accordion-body{
    padding:1rem 1.25rem
}
.accordion-flush .accordion-collapse{
    border-width:0
}
.accordion-flush .accordion-item{
    border-right:0;
    border-left:0;
    border-radius:0
}
.accordion-flush .accordion-item:first-child{
    border-top:0
}
.accordion-flush .accordion-item:last-child{
    border-bottom:0
}
.accordion-flush .accordion-item .accordion-button{
    border-radius:0
}
  </style>
</head>

<body class="">
  <nav class="navbar navbar-vertical fixed-left navbar-expand-md navbar-light bg-white" id="sidenav-main" style="z-index: 5">
    <div class="container-fluid">
      <!-- Toggler -->
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <!-- Brand -->
      <a class="navbar-brand navbar-brand-dashboard" href="{{ url('/') }}">
        <x-logo color="#566BD9"></x-logo>
      </a>
      <!-- Collapse -->
      <div class="collapse navbar-collapse" id="sidenav-collapse-main">
        <!-- Collapse header -->
        <div class="navbar-collapse-header d-md-none">
          <div class="row">
            <div class="col-6 collapse-brand">
              <!-- <a href="./index.html">
                <img src="{{ url('argon/assets/img/brand/blue.png') }}">
              </a> -->
            </div>
            <div class="col-6 collapse-close">
              <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle sidenav">
                <span></span>
                <span></span>
              </button>
            </div>
          </div>
        </div>
        <!-- Form -->
        <form class="mt-4 mb-3 d-md-none">
          <div class="input-group input-group-rounded input-group-merge">
            <input type="search" class="form-control form-control-rounded form-control-prepended" placeholder="Search" aria-label="Search">
            <div class="input-group-prepend">
              <div class="input-group-text">
                <span class="fa fa-search"></span>
              </div>
            </div>
          </div>
        </form>
        <!-- Navigation -->
        @include('layouts.navigation.navigation')
      </div>
    </div>
  </nav>
  <div class="main-content">
   <!-- Navbar -->
@include('layouts.navigation.topnavigation')
 <!-- End Navbar -->
    <!-- Header -->
    <div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
      <div class="container-fluid">
        <div class="header-body mt--4">
          <hr class="mb-3 mt-1" style="border-top: 2px solid rgb(255 255 255 / 10%);">
          <div class="row align-items-center">
              <div class="col-6">
                @php
                  $routeNameIndex = 0;
                  if(count(explode('.', \Request::route()->getName())) > 2){
                    $routeNameIndex = count(explode('.', \Request::route()->getName())) - 2;
                  }
                @endphp
                <h6 class="h2 text-white d-inline-block mb-0 ">{{ isset($pageName) ? $pageName : ucwords(str_replace('_', ' ',str_replace('-',' ',explode('.', \Request::route()->getName())[$routeNameIndex])))}}</h6>
                
              </div>
              <div class="col-6 text-right">
                @yield('form_button')          
              </div>
          </div>
          @yield('header')
        </div>
      </div>
    </div>
    <div class="container-fluid mt--7">
      @yield('content')
      <!-- Footer -->
      <footer class="footer">
        <div class="row align-items-center justify-content-xl-between">
          <div class="col-xl-6">
            <div class="copyright text-center text-xl-left text-muted">
              <x-copyright-text></x-copyright-text>
            </div>
      </footer>
    </div>
  </div>
  <button onclick="topFunction()" id="myBtn" class="btn btn-info" title="Go to top">
  <i class="fa fa-arrow-up"></i>
    Top
  </button>

  <script>
  //Get the button

  // When the user scrolls down 20px from the top of the document, show the button
  window.onscroll = function() {scrollFunction()};

  function scrollFunction() {
    if (document.body.scrollTop > 100 || document.documentElement.scrollTop > 100) {
      $('#myBtn').fadeIn();
    } else {
      $('#myBtn').fadeOut();
    }
  }

  // When the user clicks on the button, scroll to the top of the document
  function topFunction() {
    // document.body.scrollTop = 0;
    // document.documentElement.scrollTop = 0;
    window.scrollTo({top: 0, behavior: 'smooth'});
  }
  </script>
  <!--   Core   -->
  <script src="{{ url('argon/assets/js/plugins/jquery/dist/jquery.min.js') }}"></script>
  <script src="{{ url('argon/assets/js/plugins/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
  <!--   Optional JS   -->
  @stack('optional_scripts')
 
  <script src="{{ url('js/global.js?v='.time()) }}"></script>
  <script src="https://cdn.trackjs.com/agent/v3/latest/t.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
  @yield('script')
  <script>
    window.TrackJS &&
      TrackJS.install({
        token: "ee6fab19c5a04ac1a32a645abde4613a",
        application: "argon-dashboard-free"
      });
  </script>
  @stack('scripts')
</body>

</html>