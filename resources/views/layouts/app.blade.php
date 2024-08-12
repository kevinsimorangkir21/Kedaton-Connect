<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/ico" href="../assets/img/telkom1.png">
  <title>Kedaton Connect | Telkom Lampung</title>
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <link href="../assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <link href="../assets/css/soft-ui-dashboard.css?v=1.0.3" rel="stylesheet" />
  <link rel="stylesheet" href="{{ asset('css/dashboard1.css') }}">
  <link rel="stylesheet" href="https://cdn.datatables.net/2.0.7/css/dataTables.dataTables.css"/>
  <link rel="stylesheet" href="https://cdn.datatables.net/responsive/3.0.2/css/responsive.dataTables.min.css"/>
  <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
  <script src="https://cdn.datatables.net/2.0.7/js/dataTables.js"></script>
  <script src="https://cdn.datatables.net/responsive/3.0.2/js/dataTables.responsive.min.js"></script>

  <!-- GSAP -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.2/gsap.min.js"></script>

  <!-- Preloader styles -->
  <!-- Preloader styles -->
<!-- Preloader styles -->
<style>
  #preloader {
    position: fixed;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 1); /* Background changed to black */
    z-index: 9999;
    display: flex;
    justify-content: center;
    align-items: center;
  }
  .loader img {
    width: 200px; /* Adjust the size of your logo to be bigger */
    height: auto;
  }
</style>

</head>

<body class="g-sidenav-show bg-gray-100">
  <!-- Preloader -->
  <div id="preloader">
    <div class="loader">
      <img src="../assets/img/telkomakses-logo.png" alt="Telkom Akses Logo" id="logo">
    </div>
  </div>

  @auth
    @yield('auth')
  @endauth
  @guest
    @yield('guest')
  @endguest

  @if(session()->has('success'))
    <div x-data="{ show: true}"
        x-init="setTimeout(() => show = false, 4000)"
        x-show="show"
        class="position-fixed bg-success rounded right-3 text-sm py-2 px-4">
      <p class="m-0">{{ session('success')}}</p>
    </div>
  @endif

  <!-- Core JS Files -->
  <script src="../assets/js/core/popper.min.js"></script>
  <script src="../assets/js/core/bootstrap.min.js"></script>
  <script src="../assets/js/plugins/fullcalendar.min.js"></script>
  <script src="../assets/js/plugins/chartjs.min.js"></script>
  <script src="../assets/js/plugins/jquery.js"></script>
  <script src="../assets/js/plugins/datalabels.js"></script>
  <script src="../assets/js/plugins/datatables.js"></script>
  @stack('rtl')
  @stack('dashboard')
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <script src="../assets/js/soft-ui-dashboard.min.js?v=1.0.3"></script>

  <script>
    // GSAP animation for the logo
    gsap.from("#logo", {
      duration: 1.5,
      scale: 0.5,
      opacity: 0,
      ease: "back.out(1.7)",
      onComplete: function() {
        // Fade out and hide preloader after animation completes
        gsap.to("#preloader", {
          duration: 1,
          opacity: 0,
          display: "none",
          delay: 0.5 // Delay to make sure the animation is visible before hiding
        });
      }
    });

    // Optionally, you can hide the preloader if the page loads slowly
    window.addEventListener('load', function () {
      setTimeout(function () {
        var preloader = document.getElementById('preloader');
        if (preloader) {
          gsap.to(preloader, {
            duration: 1,
            opacity: 0,
            display: "none"
          });
        }
      }, 500); // Adjust delay as needed
    });
  </script>
</body>

</html>
