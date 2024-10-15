<!DOCTYPE html>
<html>

<head>
  <!-- Basic -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <!-- Site Metas -->
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="" />

  <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
  <link rel="shortcut icon" href="{{ asset('/assets/images/favicon.png') }}" type="">

  <title> CareerSky </title>

  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="{{ asset('/assets/css/bootstrap.css') }}" />

  <!-- fonts style -->
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700;900&display=swap" rel="stylesheet">

  <!--owl slider stylesheet -->
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />

  <!-- font awesome style -->
  <link href="{{ asset('/assets/css/font-awesome.min.css') }}" rel="stylesheet" />

  <!-- Custom styles for this template -->
  <link href="{{ asset('/assets/css/style.css') }}" rel="stylesheet" />
  <!-- responsive style -->
  <link href="{{ asset('/assets/css/responsive.css') }}" rel="stylesheet" />

  <style>
html {
  scroll-behavior: smooth;
}

@media screen and (prefers-reduced-motion: reduce) {
  html {
    scroll-behavior: auto;
  }
}
</style>

</head>

<body>
<div class="hero_area">

<div class="hero_bg_box">
  <div class="bg_img_box">
    <img src="{{ asset('/assets/images/hero-bg.png') }}" alt="">
  </div>
</div>

<!-- header section strats -->
<header class="header_section">
  <div class="container-fluid">
    <nav class="navbar navbar-expand-lg custom_nav-container ">
      <a class="navbar-brand" href="{{ route('index') }}">
        <span>
        CareerSky
        </span>
      </a>

      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class=""> </span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav  ">
          <li class="nav-item active">
            <a class="nav-link" href="{{ route('index') }}">Home <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="kategoriDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Kategori
            </a>
            <div class="dropdown-menu" aria-labelledby="kategoriDropdown">
              @foreach(\App\Models\categories::all() as $kategori)
                <a class="dropdown-item" href="{{ route('perusahaankategori', $kategori->id) }}">{{ $kategori->name }}</a>
              @endforeach
            </div>
          </li>
          @guest
            <li class="nav-item">
              <a class="nav-link" href="{{ route('login') }}"> <i class="fa fa-user" aria-hidden="true"></i> Login</a>
            </li>
          @endguest
          @auth
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fa fa-user" aria-hidden="true"></i> Profil ({{ Auth::user()->role }})
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                @if(Auth::user()->role != 'admin')
                  <a class="dropdown-item" href="{{ route('userprofile') }}">Lihat Profil</a>
                @endif
                @if(Auth::user()->role == 'admin')
                  <a class="dropdown-item" href="{{ route('admin.akun') }}">Daftar Akun Pengguna</a>
                @endif
                @if(Auth::user()->role == 'admin')
                  <a class="dropdown-item" href="{{ route('perusahaan.create') }}">Tambah Data</a>
                @endif
                @if(Auth::user()->role == 'admin' || Auth::user()->role == 'perusahaan')
                  <a class="dropdown-item" href="{{ route('perusahaan.index') }}">Lihat Data Perusahaan</a>
                @endif
                @if(Auth::user()->role == 'admin')
                  <a class="dropdown-item" href="{{ route('admin.permintaan') }}">Lihat Permintaan</a>
                @endif
                @if(Auth::user()->role == 'perusahaan')
                  <a class="dropdown-item" href="{{ route('perusahaan.create') }}">Tambah Data Perusahaan</a>
                @endif
                <div class="dropdown-divider"></div>
                <form action="{{ route('logout') }}" method="POST" class="d-inline">
                  @csrf
                  <button type="submit" class="dropdown-item">Keluar</button>
                </form>
              </div>
            </li>
          @endauth

          <form class="form-inline">
            <button class="btn  my-2 my-sm-0 nav_search-btn" type="submit">
              <i class="fa fa-search" aria-hidden="true"></i>
            </button>
          </form>
        
        </ul>
      </div>
    </nav>
  </div>
</header>
<!-- end header section -->

  @yield('content')

  <!-- jQery -->
  <script type="text/javascript" src="{{ asset('assets/js/jquery-3.4.1.min.js') }}"></script>
  <!-- popper js -->
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
  </script>
  <!-- bootstrap js -->
  <script type="text/javascript" src="{{ asset('assets/js/bootstrap.js') }}"></script>
  <!-- owl slider -->
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js">
  </script>
  <!-- custom js -->
  <script type="text/javascript" src="{{ asset('assets/js/custom.js') }}"></script>
  <!-- Google Map -->
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCh39n5U-4IoWpsVGUHWdqB6puEkhRLdmI&callback=myMap">
  </script>
  <!-- End Google Map -->\
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      // Fungsi untuk scroll halus
      function smoothScroll(target, duration) {
        var targetElement = document.querySelector(target);
        var targetPosition = targetElement.getBoundingClientRect().top + window.pageYOffset;
        var startPosition = window.pageYOffset;
        var distance = targetPosition - startPosition;
        var startTime = null;

        function animation(currentTime) {
          if (startTime === null) startTime = currentTime;
          var timeElapsed = currentTime - startTime;
          var run = ease(timeElapsed, startPosition, distance, duration);
          window.scrollTo(0, run);
          if (timeElapsed < duration) requestAnimationFrame(animation);
        }

        function ease(t, b, c, d) {
          t /= d / 2;
          if (t < 1) return c / 2 * t * t + b;
          t--;
          return -c / 2 * (t * (t - 2) - 1) + b;
        }

        requestAnimationFrame(animation);
      }

      // Fungsi untuk highlight section
      function highlightSection(targetElement) {
        targetElement.style.transition = 'background-color 0.3s ease-in-out';
        targetElement.style.backgroundColor = '#ffff99'; // Warna highlight
        setTimeout(() => {
          targetElement.style.backgroundColor = ''; // Kembali ke warna asli
        }, 1000);
      }

      // Event listener untuk semua tautan dengan hash
      document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function(e) {
          e.preventDefault();
          var target = this.getAttribute('href');
          var targetElement = document.querySelector(target);
          
          if (targetElement) {
            smoothScroll(target, 800);
            setTimeout(() => highlightSection(targetElement), 800);
          }
        });
      });

      // Mendukung navigasi keyboard
      document.addEventListener('keydown', function(e) {
        if (e.key === 'Enter' && e.target.tagName === 'A' && e.target.getAttribute('href').startsWith('#')) {
          e.preventDefault();
          var target = e.target.getAttribute('href');
          var targetElement = document.querySelector(target);
          
          if (targetElement) {
            smoothScroll(target, 800);
            setTimeout(() => highlightSection(targetElement), 800);
          }
        }
      });
    });
  </script>
  
  

</body>

</html>