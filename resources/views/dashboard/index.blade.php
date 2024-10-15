@extends('Frontend.LayOut.dashboard')
@section('content')
<main class="main users chart-page" id="skip-target">
      <div class="container">
        <h2 class="main-title">Dashboard</h2>
        <div class="row stat-cards">
        
         
             
           
        <div class="row">
          <div class="col-lg-12">
            <div class="chart">
              <canvas id="myChart" aria-label="Statistik situs" role="img"></canvas>
            </div>
            <div class="users-table table-wrapper">
              <table class="posts-table">
                <thead>
                  <tr class="users-table-info">
                    <th>
                      <label class="users-table__checkbox ms-20">
                        <input type="checkbox" class="check-all">Thumbnail
                      </label>
                    </th>
                    <th>Judul</th>
                    <th>Penulis</th>
                    <th>Status</th>
                    <th>Tanggal</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>
                      <label class="users-table__checkbox">
                        <input type="checkbox" class="check">
                        <div class="categories-table-img">
                          <picture><source srcset="./img/categories/01.webp" type="image/webp"><img src="./img/categories/01.jpg" alt="kategori"></picture>
                        </div>
                      </label>
                    </td>
                    <td>
                      Memulai blog perjalanan Anda dengan Vasco
                    </td>
                    <td>
                      <div class="pages-table-img">
                        <picture><source srcset="./img/avatar/avatar-face-04.webp" type="image/webp"><img src="./img/avatar/avatar-face-04.png" alt="Nama Pengguna"></picture>
                        Jenny Wilson
                      </div>
                    </td>
                    <td><span class="badge-pending">Tertunda</span></td>
                    <td>17.04.2021</td>
                    <td>
                      <span class="p-relative">
                        <button class="dropdown-btn transparent-btn" type="button" title="Info lebih lanjut">
                          <div class="sr-only">Info lebih lanjut</div>
                          <i data-feather="more-horizontal" aria-hidden="true"></i>
                        </button>
                        <ul class="users-item-dropdown dropdown">
                          <li><a href="{{asset('backend/elegant')}}##">Edit</a></li>
                          <li><a href="{{asset('backend/elegant')}}##">Edit cepat</a></li>
                          <li><a href="{{asset('backend/elegant')}}##">Hapus</a></li>
                        </ul>
                      </span>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
          <div class="col-lg-3">

           
          </div>
        </div>
      </div>
    </main>
@endsection
