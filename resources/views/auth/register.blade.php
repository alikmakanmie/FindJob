@extends('Frontend.LayOut.Halaman.welcome')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Daftar</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}" id="registerForm">
                        @csrf

                        <div class="mb-3">
                            <label for="name" class="form-label">Nama</label>
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Alamat Email</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">Kata Sandi</label>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="password-confirm" class="form-label">Konfirmasi Kata Sandi</label>
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                        </div>
                        
                        <div class="mb-0">
                            <button type="submit" class="btn btn-primary">
                                Daftar
                            </button>
                        </div>
                        
                        <div class="mt-3 text-center">
                            <p>Sudah punya akun?</p>
                            <a href="{{ route('login') }}" class="btn btn-secondary">
                                Masuk
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script src="{{ asset('js/app.js') }}"></script>
<script>
    $(document).ready(function() {
        $('#registerForm').submit(function(e) {
            e.preventDefault();
            
            $.ajax({
                url: $(this).attr('action'),
                method: 'POST',
                data: $(this).serialize(),
                success: function(response) {
                    // Redirect ke halaman verifikasi kode
                    window.location.href = '{{ route("verification.code") }}';
                },
                error: function(xhr) {
                    // Tampilkan pesan error jika ada
                    alert('Terjadi kesalahan saat mendaftar. Silakan coba lagi.');
                }
            });
        });
    });
</script>
@endpush
