@extends('Frontend.LayOut.Halaman.welcome')

@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-lg-8">
            <!-- Detail Perusahaan -->
            @if(isset($company))
                <article>
                    <header class="mb-4">
                        <h1 class="fw-bolder mb-1">{{ $company->name }}</h1>
                        <div class="text-muted fst-italic mb-2">Diposting pada {{ $company->created_at->format('d F Y') }}</div>
                        <a class="badge bg-secondary text-decoration-none link-light" href="#!">Industri</a>
                    </header>
                    
                    <!-- Preview image -->
                    <figure class="mb-4">
                        <img class="img-fluid rounded" src="{{ asset($company->foto) }}" alt="{{ $company->nama }}" />
                    </figure>
                    
                    <!-- Deskripsi Perusahaan -->
                    <section class="mb-5">
                        <h2 class="fw-bolder mb-4 mt-5">Tentang Perusahaan</h2>
                        <p class="fs-5 mb-4">{{ $company->deskripsi }}</p>
                        
                        @if($company->deskripsi1)
                            <p class="fs-5 mb-4">{{ $company->deskripsi1 }}</p>
                        @endif
                        
                        @if($company->deskripsi2)
                            <p class="fs-5 mb-4">{{ $company->deskripsi2 }}</p>
                        @endif
                        
                        @if($company->deskripsi3)
                            <p class="fs-5 mb-4">{{ $company->deskripsi3 }}</p>
                        @endif
                    </section>
                </article>
                
                <!-- Galeri Foto -->
                @if($company->foto1 || $company->foto2)
                    <section class="mb-5">
                        <h2 class="fw-bolder mb-4">Galeri Foto</h2>
                        <div class="row">
                            @if($company->foto1)
                                <div class="col-md-6 mb-4">
                                    <img class="img-fluid rounded" src="{{ asset($company->foto1) }}" alt="Foto Tambahan 1" />
                                </div>
                            @endif
                            @if($company->foto2)
                                <div class="col-md-6 mb-4">
                                    <img class="img-fluid rounded" src="{{ asset($company->foto2) }}" alt="Foto Tambahan 2" />
                                </div>
                            @endif
                        </div>
                    </section>
                @endif
            @else
                <div class="alert alert-info" role="alert">
                    Data perusahaan tidak ditemukan.
                </div>
            @endif
        </div>
        
        <!-- Sidebar -->
        <div class="col-lg-4">
            <div class="card mb-4">
                <div class="card-header">Informasi Kontak</div>
                <div class="card-body">
                    <ul class="list-unstyled mb-0">
                        <li class="mb-2"><i class="fas fa-map-marker-alt me-2"></i>{{ $company->alamat }}</li>
                        <li class="mb-2"><i class="fas fa-phone me-2"></i>{{ $company->telepon }}</li>
                        <li class="mb-2"><i class="fas fa-envelope me-2"></i>{{ $company->email }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
