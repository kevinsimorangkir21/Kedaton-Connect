@extends('layouts.user_type.guest')

@section('content')

<main class="main-content mt-0">
  <section>
    <div class="page-header min-vh-75">
      <div class="container">
        <div class="row">
          <div class="col-xl-4 col-lg-5 col-md-6 d-flex flex-column mx-auto">
            <div class="card card-plain mt-8">
              <div class="card-header pb-0 text-left bg-transparent">
                <h3 class="font-weight-bolder text-info text-gradient bg" id="animatedTextContainer">
                  <span id="animatedText"></span>
                </h3>
                <p class="mb-0">Create a new account<br></p>
                <p class="mb-0">Or Sign in with your account</p>
              </div>
              <div class="card-body">
                <form role="form" method="POST" action="/session">
                  @csrf
                  <label for="email">Email</label>
                  <div class="mb-3">
                    <input type="email" class="form-control" name="email" id="email" placeholder="Email" aria-label="Email" aria-describedby="email-addon" required>
                    <span id="emailError" class="text-danger text-xs mt-2" style="display: none;">Please enter a valid email address.</span>
                    @error('email')
                      <p class="text-danger text-xs mt-2">{{ $message }}</p>
                    @enderror
                  </div>
                  <label for="password">Password</label>
                  <div class="mb-3 position-relative">
                    <input type="password" class="form-control" name="password" id="password" placeholder="Password" aria-label="Password" aria-describedby="password-addon">
                    <span class="password-toggle" onclick="togglePassword()">
                      <i id="passwordIcon" class="fa fa-eye"></i>
                    </span>
                    @error('password')
                      <p class="text-danger text-xs mt-2">{{ $message }}</p>
                    @enderror
                  </div>
                  <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" id="rememberMe" checked="">
                    <label class="form-check-label" for="rememberMe">Remember me</label>
                  </div>
                  <div class="text-center">
                    <button type="submit" class="btn bg-gradient-red w-100 mt-4 mb-0">Sign in</button>
                  </div>

                </form>
              </div>
              <div class="card-footer text-center pt-0 px-lg-2 px-1">
                <small class="text-muted">Forgot your password? Reset your password 
                  <a href="/login/forgot-password" class="text-info text-gradient font-weight-bold">here</a>
                </small>
                <p class="mb-4 text-sm mx-auto">
                  Don't have an account?
                  <a href="register" class="text-info text-gradient font-weight-bold">Sign up</a>
                </p>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="oblique position-absolute top-0 h-100 d-md-block d-none me-n8">
              <div class="oblique-image bg-cover position-absolute fixed-top ms-auto h-100 z-index-0 ms-n6" id="slideShow" style="background-image:url('../assets/img/curved-images/gambar1.jpg')"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</main>

<!-- Tambahkan JavaScript untuk animasi teks dengan efek menulis -->
<script>
  document.addEventListener("DOMContentLoaded", function() {
    const texts = ["Welcome Back", "Selamat Datang", "Tabik Pun"];
    let index = 0;
    let charIndex = 0;
    const element = document.getElementById("animatedText");
    const typingSpeed = 100; // Kecepatan mengetik
    const erasingSpeed = 50; // Kecepatan menghapus
    const newTextDelay = 1500; // Delay sebelum teks baru dimulai

    function typeText() {
      if (charIndex < texts[index].length) {
        element.textContent += texts[index].charAt(charIndex);
        charIndex++;
        setTimeout(typeText, typingSpeed);
      } else {
        setTimeout(eraseText, newTextDelay);
      }
    }

    function eraseText() {
      if (charIndex > 0) {
        element.textContent = texts[index].substring(0, charIndex - 1);
        charIndex--;
        setTimeout(eraseText, erasingSpeed);
      } else {
        index = (index + 1) % texts.length;
        setTimeout(typeText, typingSpeed + 500);
      }
    }

    setTimeout(typeText, newTextDelay + 250);

    // Gambar slide otomatis
    const images = [
      "../assets/img/curved-images/gambar1.jpg",
      "../assets/img/curved-images/gambar2.jpg",
      "../assets/img/curved-images/gambar3.jpg"
    ];
    let slideIndex = 0;
    const slideElement = document.getElementById("slideShow");
    const slideInterval = 5000; // Interval slide 5 detik

    function changeSlide() {
      slideElement.style.backgroundImage = `url(${images[slideIndex]})`;
      slideIndex = (slideIndex + 1) % images.length;
    }

    setInterval(changeSlide, slideInterval);
  });

  function togglePassword() {
    const passwordField = document.getElementById('password');
    const passwordIcon = document.getElementById('passwordIcon');
    if (passwordField.type === 'password') {
      passwordField.type = 'text';
      passwordIcon.classList.remove('fa-eye');
      passwordIcon.classList.add('fa-eye-slash');
    } else {
      passwordField.type = 'password';
      passwordIcon.classList.remove('fa-eye-slash');
      passwordIcon.classList.add('fa-eye');
    }
  }

  document.getElementById('email').addEventListener('input', function() {
    const emailInput = this;
    const emailError = document.getElementById('emailError');
    if (emailInput.validity.valid) {
      emailError.style.display = 'none';
    } else {
      emailError.style.display = 'block';
    }
  });
</script>

<!-- Tambahkan CSS untuk mencegah elemen bergerak -->
<style>
  #animatedTextContainer {
    height: 1.5em; /* Tinggi tetap sesuai ukuran font */
    display: inline-block;
    line-height: 1.5em; /* Sesuaikan ketinggian baris */
    white-space: nowrap; /* Mencegah teks terpotong jika terlalu panjang */
    overflow: hidden; /* Sembunyikan teks yang terlalu panjang */
  }

  #animatedText {
    display: inline-block;
    padding-right: 0.1em;
    color:red; /* Sedikit ruang untuk memastikan tidak ada penggeseran */
  }

  .bg-gradient-red {
    background: linear-gradient(310deg, #f44336, #e53935); /* Gradasi warna merah */
    color: #fff;
  }

  .password-toggle {
    position: absolute;
    top: 50%;
    right: 10px;
    transform: translateY(-50%);
    cursor: pointer;
  }

  .oblique-image {
    background-size: cover;
    background-position: center;
    transition: background-image 0.5s ease-in-out;
  }
</style>

@endsection
