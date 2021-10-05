<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
<style type="text/css">
	<style type="text/css">
  @import url('https://fonts.googleapis.com/css?family=Roboto:300,400,400i,500');

.body {
  overflow-x: hidden;
  font-family: 'Roboto', sans-serif;
  font-size: 16px;
}

/* Toggle Styles */

#viewport {
  padding-left: 250px;
  -webkit-transition: all 0.5s ease;
  -moz-transition: all 0.5s ease;
  -o-transition: all 0.5s ease;
  transition: all 0.5s ease;
}

#content {
  width: 100%;
  position: relative;
  margin-right: 0;
}

/* Sidebar Styles */

#sidebar {
  z-index: 1000;
  position: fixed;
  left: 250px;
  width: 250px;
  height: 100%;
  margin-left: -250px;
  overflow-y: auto;
  background: #37474F;
  -webkit-transition: all 0.5s ease;
  -moz-transition: all 0.5s ease;
  -o-transition: all 0.5s ease;
  transition: all 0.5s ease;
}

#sidebar header {
  background-color: #263238;
  font-size: 20px;
  line-height: 52px;
  text-align: center;
}

#sidebar header a {
  color: #fff;
  display: block;
  text-decoration: none;
}

#sidebar header a:hover {
  color: #fff;
}

#sidebar .nav{
  display: block;
  
}

#sidebar .nav a{
  background: none;
  border-bottom: 1px solid #455A64;
  color: #CFD8DC;
  font-size: 14px;
  padding: 16px 24px;
}

#sidebar .nav a:hover{
  background: none;
  color: #ECEFF1;
}

#sidebar .nav a i{
  margin-right: 16px;
}  

.navbar-right {
    float: right!important;
    margin-right: -1500px;
}
</style>
<div id="viewport">
   <!-- Sidebar -->
   <div id="sidebar">
      <header>
         <a href="#">Stitchel</a>
      </header>
      <<ul class="nav {{ request()->is('admin/home*') ? 'active' : '' }}">
          <li class="nav-item {{ request()->is('admin/home*') ? 'active' : '' }}">
          <a class=" nav-link" href="{{ route('home') }}"> <i class="zmdi zmdi-calendar"></i> Dashboard
            </a>
          </li>
         <li class="nav-item {{ request()->is('admin/integrations*') ? 'active' : '' }}">
          <a class=" nav-link {{ request()->is('admin/integrations*') ? 'active' : '' }}" href="{{ route('integrations.index') }}"> <i class="zmdi zmdi-calendar"></i> Integrations
            </a>
          </li>
         </li>
         <li class="nav-item {{ request()->is('admin/profiles*') ? 'active' : '' }}">
          <a class=" nav-link {{ request()->is('admin/profiles*') ? 'active' : '' }}" href="{{ route('profiles.index') }}"> <i class="zmdi zmdi-calendar"></i> Profiles
            </a>
          </li>
         <li class="nav-item {{ request()->is('admin/myplan*') ? 'active' : '' }}">
          <a class=" nav-link {{ request()->is('admin/myplan*') ? 'active' : '' }}" href="{{ route('myplan.index') }}"> <i class="zmdi zmdi-calendar"></i> My Plan
            </a>
          </li>
      </ul>
   </div>
   <!-- Content -->
   <div id="content">
   <nav class="navbar navbar-default">
      <div class="container-fluid">
         <ul class="nav navbar-nav navbar-right" style="display: block;">
            <li>
               <a href="#"><i class="bi bi-person-circle"></i>
               </a>
            </li>
            <li><a href="#">Test User</a></li>
         </ul>
      </div>
   </nav>
    <script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
    </script>