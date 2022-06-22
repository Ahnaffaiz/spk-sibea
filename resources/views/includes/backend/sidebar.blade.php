<div class="main-sidebar">
    <aside id="sidebar-wrapper">
      <div class="sidebar-brand">
        <a href="">Skripsi Sibea</a>
      </div>
      <div class="sidebar-brand sidebar-brand-sm">
        <a href="">SF</a>
      </div>
      <ul class="sidebar-menu">
          <li class="@yield('beasiswa-active')"><a class="nav-link" href="{{route('admin.beasiswa')}}"><i class="fas fa-graduation-cap"></i> <span>Beasiswa</span></a></li>
          <li class="nav-item dropdown @yield('kriteria-active')">
            <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span>Kriteria</span></a>
            <ul class="dropdown-menu">
              <li class="@yield('kriteria-promethee-active')"><a class="nav-link" href="{{route('admin.kriteria-promethee')}}">Promethee II</a></li>
              <li class="@yield('kriteria-ahp-active')"><a class="nav-link" href="{{route('admin.kriteria-ahp')}}">AHP</a></li>
            </ul>
          </li>
          <li class="@yield('pendaftar-active')"><a class="nav-link" href="{{route('admin.pendaftar')}}"><i class="fas fa-users"></i> <span>Pendaftar</span></a></li>
          <li class="@yield('skoring-active')"><a class="nav-link" href="{{route('admin.skoring')}}"><i class="fas fa-sort-numeric-down"></i></i> <span>Skoring</span></a></li>
        </ul>

        <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
          <form action="{{route('logout')}}" method="POST">
            @csrf
            <button type="submit" class="btn btn-primary btn-lg btn-block btn-icon-split">
              <i class="fas fa-rocket"></i> Logout
            </button>
          </form>
        </div>
    </aside>
  </div>