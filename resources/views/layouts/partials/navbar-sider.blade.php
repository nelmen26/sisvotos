<section class="sidebar">

  <!-- Sidebar user panel (optional) -->
  <div class="user-panel">
    <div class="pull-left image">
      <img src="{{ asset('img/users/user.png') }}" class="img-circle" alt="Imagen Usuario">
    </div>
    <div class="pull-left info">
      <p>{{ auth()->user()->nombre }}</p>
      <!-- Status -->
      <a href="{{ route('users.perfil') }}"><i class="fa fa-circle text-success"></i> En linea</a>
    </div>
  </div>

  <!-- Sidebar Menu -->
  <ul class="sidebar-menu" data-widget="tree">
    <li class="header">MENU PRINCIPAL</li>
    <!-- Optionally, you can add icons to the links -->
    <li class="{{ active('home') }}">
      <a href="{{ url('/home') }}">
        <i class="fa fa-dashboard"></i> <span>PANEL DE CONTROL</span>
      </a>
    </li>
    <li class="{{ active('registros') }}">
      <a href="{{ route('registros.index') }}">
        <i class="fa fa-check-circle"></i> <span>REGISTRO DE VOTOS</span>
      </a>
    </li>
    @if(auth()->user()->rol == 'admin' || auth()->user()->rol == 'encargado')
    <li class="{{ active('resultados') }}">
      <a href="{{ route('resultados.index') }}">
        <i class="fa fa-pie-chart"></i> <span>RESULTADOS</span>
      </a>
    </li>
    <li class="{{ active('resultados/candidatos') }}">
      <a href="{{ route('resultados.candidatos') }}">
        <i class="fa fa-user"></i> <span>CANDIDATOS</span>
      </a>
    </li>
    @endif
    @if(auth()->user()->rol=='admin')
    <li class="treeview {{ active('configuracion/*') }}">
      <a href="#"><i class="fa fa-cogs"></i> <span>CONFIGURACIONES</span>
        <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
      </a>
      <ul class="treeview-menu">
        <li class="{{ active('configuracion/tipos') }}">
          <a href="{{ route('tipos.index') }}">
            <i class="fa fa-list"></i> Cargos a Eleccion
          </a>
        </li>
        <li class="{{ active('configuracion/recintos') }}">
          <a href="{{ route('recintos.index') }}">
            <i class="fa fa-building"></i> Recintos
          </a>
        </li>
        <li class="{{ active('configuracion/mesas') }}">
          <a href="{{ route('mesas.index') }}">
            <i class="fa fa-th"></i> Mesas
          </a>
        </li>
        <li class="{{ active('configuracion/candidatos') }}">
          <a href="{{ route('candidatos.index') }}">
            <i class="fa fa-user"></i> Candidatos
          </a>
        </li>
        <li class="{{ active('configuracion/users') }}">
          <a href="{{ route('users.index') }}">
            <i class="fa fa-users"></i> Usuarios
          </a>
        </li>
      </ul>
    </li>
    @endif
  </ul>
  <!-- /.sidebar-menu -->
</section>
<!-- /.sidebar -->