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
          <li class="@yield('kriteria-active')"><a class="nav-link" href="{{route('admin.kriteria')}}"><i class="fas fa-star"></i> <span>Kriteria</span></a></li>
          <li class="@yield('pendaftar-active')"><a class="nav-link" href="{{route('admin.pendaftar')}}"><i class="fas fa-users"></i> <span>Pendaftar</span></a></li>
          <li class="nav-item dropdown">
            <a href="#" class="nav-link has-dropdown"><i class="fas fa-fire"></i><span>Scoring</span></a>
            <ul class="dropdown-menu">
              <li><a class="nav-link" href="index-0.html">AHP</a></li>
              <li><a class="nav-link" href="index.html">PROMETHEE II</a></li>
            </ul>
          </li>
          
          
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