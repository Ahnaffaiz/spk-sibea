<div class="main-sidebar">
    <aside id="sidebar-wrapper">
      <div class="sidebar-brand">
        <a href="">Skripsi Sibea</a>
      </div>
      <div class="sidebar-brand sidebar-brand-sm">
        <a href="">SS</a>
      </div>
      <ul class="sidebar-menu">
          <li class="active"><a class="nav-link" href="{{route('admin.beasiswa')}}"><i class="far fa-square"></i> <span>Beasiswa</span></a></li>
          <li class="nav-item dropdown">
            <a href="#" class="nav-link has-dropdown"><i class="fas fa-fire"></i><span>Scoring</span></a>
            <ul class="dropdown-menu">
              <li><a class="nav-link" href="index-0.html">AHP</a></li>
              <li><a class="nav-link" href="index.html">PROMETHEE II</a></li>
            </ul>
          </li>
          <li class="nav-item dropdown">
            <a href="#" class="nav-link has-dropdown"><i class="fas fa-fire"></i><span>Kriteria</span></a>
            <ul class="dropdown-menu">
              <li><a class="nav-link" href="index-0.html">Daftar Kriteria</a></li>
              <li><a class="nav-link" href="index.html">Bobot</a></li>
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