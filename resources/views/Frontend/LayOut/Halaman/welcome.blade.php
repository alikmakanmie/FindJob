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
  <link rel="shortcut icon" href="{{ asset('/assets/images/favicon.png') }}" type="">

  <title> Finexo </title>

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
          FindJob
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
          <li class="nav-item">
            <a class="nav-link" href="{{ asset('/assets/about.html') }}"> About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ asset('/assets/service.html') }}">Services</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ asset('/assets/why.html') }}">Why Us</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ asset('/assets/team.html') }}">Team</a>
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
                @if(Auth::user()->role == 'admin')
                  <a class="dropdown-item" href="{{ route('admin.store') }}">Lihat Data Perusahaan</a>
                @endif
                @if(Auth::user()->role == 'perusahaan')
                  <a class="dropdown-item" href="{{ route('perusahaan.create') }}">Tambah Data Perusahaan</a>
                  <a class="dropdown-item" href="{{ route('perusahaan.index') }}">Lihat Data Perusahaan</a>
                @endif
                <div class="dropdown-divider"></div>
                <form action="{{ route('logout') }}" method="POST" class="d-inline">
                  @csrf
                  <button type="submit" class="dropdown-item">Keluar</button>
                </form>
              </div>
            </li>
          @endauth
          @auth
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="notificationDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fa fa-bell"></i>
                <span class="badge badge-danger">{{ Auth::user()->unreadNotifications->count() }}</span>
              </a>
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="notificationDropdown" style="max-height: 300px; overflow-y: auto;">
                @forelse(Auth::user()->unreadNotifications->take(10) as $notification)
                  <a class="dropdown-item font-weight-bold" href="{{ route('notifications.show', $notification->id) }}">
                    @if(Auth::user()->role == 'admin' && isset($notification->data['type']) && $notification->data['type'] == 'NewCompanyRegistration')
                      <span class="text-danger">Permintaan Update Role:</span>
                    @endif
                    {{ Str::limit($notification->data['message'] ?? 'Tidak ada pesan', 50) }}
                    <small class="text-muted d-block">{{ $notification->created_at->diffForHumans() }}</small>
                  </a>
                @empty
                  <span class="dropdown-item">Tidak ada notifikasi baru</span>
                @endforelse
                @if(Auth::user()->unreadNotifications->count() > 0)
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item text-center" href="{{ route('notifications.index') }}">Lihat Semua Notifikasi</a>
                @endif
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
  <!-- End Google Map -->
  

</body>

</html>