<!-- Navbar -->
<nav class="navbar navbar-expand-lg position-absolute top-0 z-index-3 my-3 {{ (Request::is('static-sign-up') ? 'w-100 shadow-none  navbar-transparent mt-4' : 'blur blur-rounded shadow py-2 start-0 end-0 mx4') }}">
  <div class="container-fluid {{ (Request::is('static-sign-up') ? 'container' : 'container-fluid') }}">
    <a class="navbar-brand font-weight-bolder ms-lg-0 ms-3 {{ (Request::is('static-sign-up') ? 'text-white' : '') }}" href="{{ url('dashboard') }}">
      Telkom Akses Kedaton Dashboard
    </a>
    <button class="navbar-toggler shadow-none ms-2" type="button" data-bs-toggle="collapse" data-bs-target="#navigation" aria-controls="navigation" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon mt-2">
        <span class="navbar-toggler-bar bar1"></span>
        <span class="navbar-toggler-bar bar2"></span>
        <span class="navbar-toggler-bar bar3"></span>
      </span>
    </button>
    <div class="collapse navbar-collapse" id="navigation">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        @if (auth()->user())
            <li class="nav-item">
            <a class="nav-link d-flex align-items-center me-2 active" aria-current="page" href="{{ url('dashboard') }}">
                <i class="fa fa-chart-pie opacity-6 me-1 {{ (Request::is('static-sign-up') ? '' : 'text-dark') }}"></i>
                Dashboard
            </a>
            </li>
            <li class="nav-item">
            <a class="nav-link me-2" href="{{ url('profile') }}">
                <i class="fa fa-user opacity-6 me-1 {{ (Request::is('static-sign-up') ? '' : 'text-dark') }}"></i>
                Profile
            </a>
            </li>
        @endif
        <!-- Links moved from Footer -->
        <li class="nav-item">
          <span class="nav-link">|</span>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="https://www.telkom.co.id/sites" target="_blank">Telkom</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="https://telkomakses.co.id/" target="_blank">About Us</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="https://www.creative-tim.com/presentation" target="_blank">Team</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="https://www.creative-tim.com/templates" target="_blank">Products</a>
        </li>
      </ul>
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link me-2" href="{{ auth()->user() ? url('static-sign-up') : url('register') }}">
            <i class="fas fa-user-plus opacity-6 me-1 {{ (Request::is('static-sign-up') ? '' : 'text-dark') }}"></i>
            Sign Up
          </a>
        </li>
      </ul>
    </div>
  </div>
</nav>
<!-- End Navbar -->
