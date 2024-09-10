@extends('Frontend.LayOut.Halaman.welcome')

@section('content')
<div class="container bg-white p-4 rounded">
    <h2 class="mb-4">Perusahaan dalam Kategori: {{ $kategori->name }}</h2>
    
    @foreach($perusahaan as $p)
        <div class="card mb-3">
            <div class="card-body">
                <h5>{{ $p->nama }}</h5>
                <p>{{ $p->deskripsi }}</p>
                <a href="{{ route('perusahaan.show', $p->id) }}" class="btn btn-secondary">Lihat Detail</a>
            </div>
        </div>
    @endforeach

    <div class="mt-4">
        {{ $perusahaan->links() }}
    </div>
</div>
@endsection
