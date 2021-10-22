 <!-- Navbar -->
    <nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
      <div class="container-fluid">
        <form class="navbar-search navbar-search-dark form-inline mr-3 d-md-flex">
          <div class="form-group mb-0">
            <div class="tab-pane tab-example-result fade show active object-hidden" role="tabpanel" aria-labelledby="table-component-tab" id="global-search-result">
              <div class="table-responsive">
                <div>
                  <table class="table align-items-center">
                    <tbody class="list">
                    </tbody>
                  </table>
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
    <!-- End Navbar -->
