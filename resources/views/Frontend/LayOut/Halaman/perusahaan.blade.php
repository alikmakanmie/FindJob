@extends('Frontend.LayOut.Halaman.welcome')

@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <div class="edge-box">
                <h2 class="text-center mb-4">Daftar Perusahaan</h2>
                
                @if(isset($perusahaans) && $perusahaans->count() > 0)
                    <div class="row">
                        @foreach($perusahaans as $perusahaan)
                            <div class="col-md-4 mb-4">
                                <div class="card h-100 shadow-sm">
                                    <img src="{{ asset('storage/'.$perusahaan->foto) }}" class="card-img-top" alt="{{ $perusahaan->nama }}">
                                    <div class="card-body">
                                        <h5 class="card-title font-weight-bold">{{ $perusahaan->nama }}</h5>
                                        <p class="card-text text-muted">{{ Str::limit($perusahaan->deskripsi, 100) }}</p>
                                    </div>
                                    {{-- <div class="card-footer bg-transparent border-0">
                                        <a href="{{ route('perusahaan.detail', $perusahaan->id) }}" class="btn btn-primary btn-sm btn-block">Lihat Detail</a>
                                    </div> --}}
                                </div>
                            </div>
                        @endforeach
                    </div>
                    
                    <div class="d-flex justify-content-center mt-4">
                        {{ $perusahaans->links() }}
                    </div>
                @else
                    <div class="alert alert-info text-center" role="alert">
                        Tidak ada data perusahaan yang tersedia saat ini.
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
