@extends('Frontend.LayOut.Halaman.welcome')

@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-header">
                    <h2 class="text-center">Detail Perusahaan</h2>
                </div>
                <div class="card-body">
                    @if(isset($perusahaan))
                        <h3>{{ $perusahaan->nama }}</h3>
                        <hr>
                        <p><strong>Alamat:</strong> {{ $perusahaan->alamat }}</p>
                        <p><strong>Telepon:</strong> {{ $perusahaan->telepon }}</p>
                        <p><strong>Email:</strong> {{ $perusahaan->email }}</p>
                        <p><strong>Deskripsi:</strong> {{ $perusahaan->deskripsi }}</p>
                        
                        @if($perusahaan->foto)
                            <img src="{{ asset('storage/'.$perusahaan->foto) }}" alt="Foto Perusahaan" class="img-fluid mt-3">
                        @endif
                        
                        @if($perusahaan->deskripsi1)
                            <p><strong>Informasi Tambahan 1:</strong> {{ $perusahaan->deskripsi1 }}</p>
                        @endif
                        
                        @if($perusahaan->deskripsi2)
                            <p><strong>Informasi Tambahan 2:</strong> {{ $perusahaan->deskripsi2 }}</p>
                        @endif
                        
                        @if($perusahaan->deskripsi3)
                            <p><strong>Informasi Tambahan 3:</strong> {{ $perusahaan->deskripsi3 }}</p>
                        @endif
                        
                        @if($perusahaan->foto1)
                            <img src="{{ asset('storage/'.$perusahaan->foto1) }}" alt="Foto Tambahan 1" class="img-fluid mt-3">
                        @endif
                        
                        @if($perusahaan->foto2)
                            <img src="{{ asset('storage/'.$perusahaan->foto2) }}" alt="Foto Tambahan 2" class="img-fluid mt-3">
                        @endif
                    @else
                        <p class="text-center">Data perusahaan tidak ditemukan.</p>
                    @endif
                </div>
                <div class="card-footer text-center">
                    <a href="{{ route('perusahaan.index') }}" class="btn btn-primary">Kembali ke Daftar Perusahaan</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
