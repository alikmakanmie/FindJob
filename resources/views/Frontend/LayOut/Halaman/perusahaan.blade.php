@extends('Frontend.LayOut.Halaman.welcome')

@section('content')
<section class="about_section layout_padding" style="background-color: #e6f2ff;">
    <div class="container">
      <div class="row">
        @if(isset($perusahaan) && count($perusahaan) > 0)
          @foreach($perusahaan as $p)
            <div class="col-md-4 mb-4">
              <div class="card h-100 shadow">
                <div class="card-img-top" style="height: 200px; overflow: hidden;">
                  @if($p->foto)
                    <img src="{{ asset(''. $p->foto) }}" alt="{{ $p->nama }}" class="img-fluid" style="width: 100%; height: 100%; object-fit: cover;">
                  @else
                    <div class="bg-secondary text-white d-flex align-items-center justify-content-center h-100">
                      <span>Tidak ada foto</span>
                    </div>
                  @endif
                </div>
                <div class="card-body d-flex flex-column">
                  <h5 class="card-title" style="color: black;">{{ $p->nama }}</h5>
                  <p class="card-text flex-grow-1" style="color: black;">{{ Str::limit($p->deskripsi, 100) }}</p>
                  {{-- <a href="{{ route('perusahaan.detail', $p->id) }}" class="btn btn-primary mt-auto">Lihat Detail</a> --}}
                </div>
              </div>
            </div>
          @endforeach
        @else
          <div class="col-12 text-center">
            <p>Tidak ada data perusahaan yang tersedia saat ini.</p>
          </div>
        @endif
      </div>
    
    </div>
    </div>
  </section>
@endsection
