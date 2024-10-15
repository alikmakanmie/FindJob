<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>FindJob Dashboard</title>
  <!-- Favicon -->
  <link rel="shortcut icon" href="{{asset('backend/elegant/img/svg/logo.svg')}}" type="image/x-icon">
  <!-- Custom styles -->
  <link rel="stylesheet" href="{{asset('backend/elegant/css/style.min.css')}}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background-color: #f4f6f9;
    }
    .sidebar {
      background-color: #0056b3;
      min-height: 100vh;
      padding-top: 20px;
    }
    .sidebar .nav-link {
      color: #ffffff;
      padding: 10px 20px;
      margin-bottom: 5px;
    }
    .sidebar .nav-link:hover {
      background-color: #007bff;
    }
    .sidebar .nav-link.active {
      background-color: #007bff;
    }
    .content {
      padding: 20px;
    }
    .navbar-brand {
      color: #ffffff !important;
      font-size: 1.5rem;
      font-weight: bold;
    }
    .user-dropdown {
      cursor: pointer;
    }
    .profile-image {
      width: 40px;
      height: 40px;
      object-fit: cover;
    }

    .main-wrapper {
      display: flex;
    }

    .page-wrapper {
      flex-grow: 1;
      padding: 20px;
      background-color: #f8f9fa;
    }

    .navbar-light {
      background-color: #ffffff;
      box-shadow: 0 2px 4px rgba(0,0,0,.1);
    }

    .card {
      border: none;
      box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
    }

    .form-control {
      border-radius: 0.25rem;
    }

    .btn-primary {
      background-color: #007bff;
      border-color: #007bff;
    }

    .btn-primary:hover {
      background-color: #0056b3;
      border-color: #0056b3;
    }
  </style>

  @stack('styles')

</head>

<body>
  <div class="layer"></div>
  <!-- ! Body -->
  <a class="skip-link sr-only" "#skip-target">Skip to content</a>
  <div class="page-flex">
    <!-- ! Sidebar -->
    @include('Frontend.LayOut.sidebar')
    <div class="main-wrapper">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container-fluid">
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
              <li class="nav-item dropdown user-dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <img src="{{ asset('/user/download.png') }}" alt="User" class="rounded-circle mr-2" style="width: 30px; height: 30px; object-fit: cover;">
                  Pengguna Biasa
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="#"><i class="fas fa-user-circle mr-2"></i>Profil</a>
                  <a class="dropdown-item" href="#"><i class="fas fa-cog mr-2"></i>Pengaturan</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="#"><i class="fas fa-sign-out-alt mr-2"></i>Keluar</a>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </nav>

      <!-- ! Page content -->
      <div class="page-wrapper">
        <div class="container-fluid">
          <h2 class="mb-4">Profil Pengguna</h2>
          @yield('content')
        </div>
      </div>
      <!-- ! Footer -->
    </div>
  </div>

  <script src="{{asset('backend/elegant/plugins/feather.min.js')}}"></script>
  <script src="{{asset('backend/elegant/js/script.js')}}"></script>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  @stack('scripts')
</body>

</html>
