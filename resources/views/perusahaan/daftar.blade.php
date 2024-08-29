@extends('Frontend.LayOut.Halaman.welcome')

@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h2 class="text-center mb-0">Daftar Sebagai Perusahaan</h2>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.store') }}" method="POST">
                        @csrf
                        <div class="form-group mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" required>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" required>
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        </div>
                        <div class="form-group mb-3">
                            <label for="pesan" class="form-label">Pesan untuk Admin</label>
                            <textarea class="form-control @error('pesan') is-invalid @enderror" id="pesan" name="pesan" rows="3" required>{{ old('pesan') }}</textarea>
                            @error('pesan')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        @if(session('success'))
                            <div class="alert alert-success" role="alert">
                                {{ session('success') }}
                            </div>
                            <script>
                                // Kirim notifikasi ke admin
                                $.ajax({
                                    url: '{{ route("admin.notify") }}',
                                    method: 'POST',
                                    data: {
                                        _token: '{{ csrf_token() }}',
                                        message: 'Ada permintaan pendaftaran perusahaan baru'
                                    },
                                    success: function(response) {
                                        console.log('Notifikasi berhasil dikirim ke admin');
                                    },
                                    error: function(xhr, status, error) {
                                        console.error('Gagal mengirim notifikasi ke admin');
                                    }
                                });
                            </script>
                        @endif
                        <input type="hidden" name="user_id" value="{{ Auth::id() }}">
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary">Ajukan Pendaftaran</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection