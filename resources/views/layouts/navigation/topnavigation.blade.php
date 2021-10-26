 <link rel="stylesheet" type="text/css" href="{{ url('css/topnavigation.css') }}">
 <!-- Navbar -->
    <nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
      <div class="container-fluid">
        <form class=" navbar-search-active navbar-search mr-3 d-md-flex">
            <div class="input-group input-group-alternative" id="global-search-container">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-search text-success" aria-hidden="true"></i></span>
              </div>
              <input class="form-control" placeholder="Search" type="text" id="search" autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false" >
              <div style="min-width: 38px">
                <div class="input-group-prepend object-hidden" id="global-search-cancel">
                  <span class="input-group-text"><i class="fas fa-times mt-2 text-warning" aria-hidden="true"></i></span>
                </div>  
              </div>
            </div>
              <div class="tab-pane tab-example-result fade show active d-none" role="tabpanel" aria-labelledby="table-component-tab" id="global-search-result">
               <div class="table-responsive" style="max-height: 400px;">
                  <div>
                     <div class="table align-items-center">
                        <div id="search-list-body" style="overflow: hidden;">
                        </div>
                     </div>
                  </div>
               </div>
            </div>
        </form>
        <!-- User -->
        <ul class="navbar-nav align-items-center d-none d-md-flex">
          <li class="nav-item dropdown">
            <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <div class="media align-items-center">
                <span class="avatar avatar-sm rounded-circle">
                    <i class="fas fa-user"></i>
                </span>
                <div class="media-body ml-2 d-none d-lg-block">
                  <span class="mb-0 text-sm  font-weight-bold">
                    {{ auth()->user()->name }}
                    <br />
                    <!-- <p style="font-size:12px;text-align: center;margin-bottom: 0px;">{{ auth()->user()[0] }}</p> -->
                  </span>
                </div>
              </div>
            </a>
            <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
              <div class=" dropdown-header noti-title">
                <h6 class="text-overflow m-0">Welcome!</h6>
              </div>
              <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="{{ url('/') }}">
                <i class="fa-fw text-left fa fa-search text-orange"></i>
                <span>Search</span>
              </a>
                <a class="dropdown-item" href="{{ route('integrations') }}">
                <i class="fa-fw text-left fas fa-users text-yellow"></i>
                <span>Integrations</span>
              </a>
                <a class="dropdown-item" href="{{ route('profile') }}">
                <i class="fa-fw text-left fas fa-user text-success"></i>
                <span>Profile</span>
              </a>
              <a class="dropdown-item" href="{{ route('myplan') }}">            
                <i class="fa-fw text-left fas fa-calendar text-red"></i>
                <span>My Plan</span>
              </a>
               <a class="dropdown-item" href="{{ route('myplan') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                <i class="fas fa-fw fa-sign-out-alt"></i>
                <form id="logout-form" action="{{ route('logout') }}" method="" style="display: none;">
                    @csrf
                </form>
                <span>Logout</span>
              </a>
            </div>
          </li>
        </ul>
      </div>
    </nav>
   <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
   <script src="{{url('js/extension/choices.js')}}"></script>
   <script type="text/javascript" src="{{ url('js/Foundation/Search.js') }}"></script>
   <script src="{{ url('argon/assets/js/plugins/jquery/dist/jquery.min.js') }}"></script>
   <script src="{{ url('argon/assets/js/plugins/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <!-- End Navbar -->
