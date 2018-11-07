<nav class="navbar navbar-static-top" role="navigation">
  <!-- Sidebar toggle button-->
  <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
    <span class="sr-only">Toggle navigation</span>
  </a>
  <!-- Navbar Right Menu -->
  <div class="navbar-custom-menu">
    <ul class="nav navbar-nav">
      <!-- User Account Menu -->
      <li class="dropdown user user-menu">
        <!-- Menu Toggle Button -->
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
          <!-- The user image in the navbar-->
          <img src="{{ asset('img/users/user.png') }}" class="user-image" alt="Imagen Usuario">
          <!-- hidden-xs hides the username on small devices so only the image appears. -->
          <span class="hidden-xs">{{ auth()->user()->nickname }}</span>
        </a>
        <ul class="dropdown-menu">
          <!-- The user image in the menu -->
          <li class="user-header">
            <img src="{{ asset('img/users/user.png') }}" class="img-circle" alt="Imagen Usuario">

            <p>
              {{ auth()->user()->nombre}} <br>
              <span class="label label-primary">{{ auth()->user()->rol }}</span>
              <small>{{ Carbon\Carbon::now()->toFormattedDateString() }}</small>
            </p>
          </li>
          <!-- Menu Footer-->
          <li class="user-footer">
            <div class="pull-left">
              <a href="{{ route('users.perfil') }}" class="btn btn-info btn-flat"><i class="fa fa-user"></i> Perfil</a>
            </div>
            <div class="pull-right">
              <a href="{{ route('logout') }}" class="btn btn-danger btn-flat"
                  onclick="event.preventDefault();
                           document.getElementById('logout-form').submit();">
                  <i class="fa fa-sign-out"></i> Salir
              </a>

              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  {{ csrf_field() }}
              </form>
            </div>
          </li>
        </ul>
      </li>
      <!-- Control Sidebar Toggle Button -->
      <li>
        <a href="#" data-toggle="control-sidebar"><i class="fa fa-info-circle"></i></a>
      </li>
    </ul>
  </div>
</nav>