@extends('Frontend.LayOut.Halaman.welcome')

@section('content')
<div class="container-fluid mt-5">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card shadow">
                <div class="card-header bg-primary text-white">
                    <h2 class="text-center mb-0">Detail Perusahaan</h2>
                </div>
                <div class="card-body">
                    @if(isset($perusahaan))
                        <div class="row">
                            <div class="col-md-4">
                                @if($perusahaan->foto)
                                    <img src="{{ asset($perusahaan->foto) }}" alt="Logo Perusahaan" class="img-fluid rounded mb-3 shadow">
                                @endif
                            </div>
                            <div class="col-md-8">
                                <h3 class="text-primary">{{ $perusahaan->nama }}</h3>
                                    <p><i class="fas fa-map-marker-alt mr-2"></i> {{ $perusahaan->alamat }}</p>
                                <p><i class="fas fa-phone mr-2"></i> {{ $perusahaan->telepon }}</p>
                                <p><i class="fas fa-envelope mr-2"></i> {{ $perusahaan->email }}</p>
                            </div>
                        </div>
                        
                        <hr>
                        
                        <h4 class="text-primary">Deskripsi Perusahaan</h4>
                        <p class="lead">{{ $perusahaan->deskripsi }}</p>
                        
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
                                        <img src="{{ asset($perusahaan->foto1) }}" alt="Foto Tambahan 1" class="img-fluid rounded shadow">
                                    </div>
                                @endif
                                
                                @if($perusahaan->foto2)
                                    <div class="col-md-6 mb-3">
                                        <img src="{{ asset($perusahaan->foto2) }}" alt="Foto Tambahan 2" class="img-fluid rounded shadow">
                                    </div>
                                @endif
                            </div>
                        @endif
                    @else
                        <p class="text-center lead">Data perusahaan tidak ditemukan.</p>
                    @endif
                </div>
                <!-- Bagian Komentar -->
                <div class="mt-5 px-4">
                    <h4 class="text-primary">Komentar</h4>
                    
                    <!-- Form untuk menambahkan komentar baru -->
                    @auth
                        <form action="{{ route('komentar.store') }}" method="POST" class="mb-4">
                            @csrf
                            <input type="hidden" name="perusahaan_id" value="{{ $perusahaan->id }}">
                            <div class="form-group">
                                <textarea name="content" class="form-control" rows="3" placeholder="Tulis komentar Anda di sini..." required></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary mt-2">Kirim Komentar</button>
                        </form>
                    @else
                        <p class="alert alert-info">Silakan <a href="{{ route('login') }}" class="alert-link">login</a> untuk menambahkan komentar.</p>
                    @endauth

                    <!-- Daftar komentar yang ada -->
                    @if(isset($comments) && $comments->count() > 0)
                        @foreach($comments as $comment)
                            <div class="card mb-3">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $comment->user->name }}</h5>
                                    <h6 class="card-subtitle mb-2 text-muted">{{ $comment->created_at->diffForHumans() }}</h6>
                                    <p class="card-text">{{ $comment->content }}</p>
                                    @if(auth()->check() && (auth()->user()->id == $comment->user_id || auth()->user()->role == 'admin'))
                                        <form action="{{ route('komentar.destroy', $comment->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus komentar ini?')">Hapus</button>
                                        </form>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    @else
                        <p>Belum ada komentar untuk perusahaan ini.</p>
                    @endif
                </div>
                <div class="card-footer text-center">
                    <div class="row">
                        <div class="col-md-6">
                            @auth
                                @if(Auth::user()->role == 'user')
                                    <a href="{{ route('perusahaan.showQuestion', ['perusahaan_id' => $perusahaan->id]) }}" class="btn btn-success btn-lg mb-3">
                                        <i class="fas fa-user-plus mr-2"></i> Daftar ke Perusahaan Ini
                                    </a>
                                @endif
                            @else
                                <a href="{{ route('login') }}" class="btn btn-info btn-lg mb-3">
                                    <i class="fas fa-sign-in-alt mr-2"></i> Login untuk Mendaftar
                                </a>
                            @endauth
                        </div>
                        <div class="col-md-6">
                            <a href="{{ route('tampilkansemua') }}" class="btn btn-primary btn-lg">
                                <i class="fas fa-arrow-left mr-2"></i> Kembali ke Daftar Perusahaan
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
