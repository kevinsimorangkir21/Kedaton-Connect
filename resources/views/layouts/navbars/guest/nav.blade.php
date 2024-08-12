<!-- Bootstrap CSS -->
<link href="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/css/bootstrap.min.css" rel="stylesheet">

<!-- Bootstrap Bundle with Popper (includes Bootstrap's JavaScript and Popper.js) -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg position-absolute top-0 z-index-3 my-3 {{ (Request::is('static-sign-up') ? 'w-100 shadow-none  navbar-transparent mt-4' : 'blur blur-rounded shadow py-2 start-0 end-0 mx4') }}">
  <div class="container-fluid {{ (Request::is('static-sign-up') ? 'container' : 'container-fluid') }}">
    <a class="navbar-brand font-weight-bolder ms-lg-0 ms-3 d-flex align-items-center {{ (Request::is('static-sign-up') ? 'text-white' : '') }}" href="{{ url('dashboard') }}">
      <img src="../assets/img/telkom1.png" alt="Logo" class="me-2" style="height: 30px;">
      Kedaton Connect
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
          <a class="nav-link" href="#" data-bs-toggle="modal" data-bs-target="#developerModal">Developer</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
<!-- End Navbar -->



<!-- Modal -->
<div class="modal fade" id="developerModal" tabindex="-1" aria-labelledby="developerModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="developerModalLabel">Developer Information</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body text-center">
        <div class="row">
          <!-- Developer 1 -->
          <div class="col-md-6 mb-3">
            <img src="../assets/img/KEVINS.jpg" alt="Developer 1 Photo" class="img-fluid rounded-circle mb-1" style="max-width: 150px;">
            <h4>Developer 1 Name</h4>
            <p>Brief description or role of Developer 1.</p>
          </div>
          <!-- Developer 2 -->
          <div class="col-md-6 mb-3">
            <img src="path-to-developer2-photo.jpg" alt="Developer 2 Photo" class="img-fluid rounded-circle mb-2" style="max-width: 150px;">
            <h4>Developer 2 Name</h4>
            <p>Brief description or role of Developer 2.</p>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!-- End Modal -->


<script>
  document.addEventListener('DOMContentLoaded', function () {
  var myModal = new bootstrap.Modal(document.getElementById('developerModal'), {});
});

</script>

