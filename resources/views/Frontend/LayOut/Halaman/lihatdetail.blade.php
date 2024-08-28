@extends('Frontend.LayOut.Halaman.welcome')

@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h2 class="text-center mb-0">Detail Perusahaan</h2>
                </div>
                <div class="card-body">
                    @if(isset($perusahaan))
                        <div class="row">
                            <div class="col-md-4">
                                @if($perusahaan->foto)
                                    <img src="{{ asset($perusahaan->foto) }}" alt="Logo Perusahaan" class="img-fluid rounded mb-3">
                                @endif
                            </div>
                            <div class="col-md-8">
                                <h3 class="text-primary">{{ $perusahaan->nama }}</h3>
                                <p><i class="fas fa-map-marker-alt"></i> {{ $perusahaan->alamat }}</p>
                                <p><i class="fas fa-phone"></i> {{ $perusahaan->telepon }}</p>
                                <p><i class="fas fa-envelope"></i> {{ $perusahaan->email }}</p>
                            </div>
                        </div>
                        
                        <hr>
                        
                        <h4 class="text-primary">Deskripsi Perusahaan</h4>
                        <p>{{ $perusahaan->deskripsi }}</p>
                        
                        @if($perusahaan->deskripsi1)
                            <h4 class="text-primary mt-4">Informasi Tambahan</h4>
                            <p>{{ $perusahaan->deskripsi1 }}</p>
                        @endif
                        
                        @if($perusahaan->deskripsi2)
                            <p>{{ $perusahaan->deskripsi2 }}</p>
                        @endif
                        
                        @if($perusahaan->deskripsi3)
                            <p>{{ $perusahaan->deskripsi3 }}</p>
                        @endif
                        
                        @if($perusahaan->foto1 || $perusahaan->foto2)
                            <h4 class="text-primary mt-4">Galeri Foto</h4>
                            <div class="row">
                                @if($perusahaan->foto1)
                                    <div class="col-md-6 mb-3">
                                        <img src="{{ asset($perusahaan->foto1) }}" alt="Foto Tambahan 1" class="img-fluid rounded">
                                    </div>
                                @endif
                                
                                @if($perusahaan->foto2)
                                    <div class="col-md-6 mb-3">
                                        <img src="{{ asset($perusahaan->foto2) }}" alt="Foto Tambahan 2" class="img-fluid rounded">
                                    </div>
                                @endif
                            </div>
                        @endif
                    @else
                        <p class="text-center">Data perusahaan tidak ditemukan.</p>
                    @endif
                </div>
                <div class="card-footer text-center">
                    <div class="row">
                        <div class="col-md-6">
                            @auth
                                @if(Auth::user()->role == 'user')
                                    <a href="{{ route('daftar.perusahaan', ['id' => $perusahaan->id]) }}" class="btn btn-success mb-3">
                                        <i class="fas fa-user-plus"></i> Daftar ke Perusahaan Ini
                                    </a>
                                @endif
                            @else
                                <a href="{{ route('login') }}" class="btn btn-info mb-3">
                                    <i class="fas fa-sign-in-alt"></i> Login untuk Mendaftar
                                </a>
                            @endauth
                        </div>
                        <div class="col-md-6">
                            <a href="{{ route('tampilkansemua') }}" class="btn btn-primary">
                                <i class="fas fa-arrow-left"></i> Kembali ke Daftar Perusahaan
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
