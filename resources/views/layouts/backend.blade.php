@include('includes.backend.header')

<body>
  <div id="app">
    <div class="main-wrapper">
      <div class="navbar-bg"></div>
      @include('includes.backend.navbar')
      @include('includes.backend.sidebar')
      

      <!-- Main Content -->
      @yield('content')
      {{-- <footer class="main-footer">
        <div class="footer-left">
          Copyright &copy; 2018 <div class="bullet"></div> Design By <a href="https://nauval.in/">Muhamad Nauval Azhar</a>
        </div>
        <div class="footer-right">
          2.3.0
        </div>
      </footer> --}}
    </div>
  </div>
  @include('includes.backend.scripts')
</body>
</html>
