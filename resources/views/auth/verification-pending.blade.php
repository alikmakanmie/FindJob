@extends('Frontend.LayOut.Halaman.welcome')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Verifikasi Email Diperlukan') }}</div>

                <div class="card-body">
                    <p>{{ __('Terima kasih telah mendaftar! Sebelum melanjutkan, silakan periksa email Anda untuk link verifikasi.') }}</p>
                    <p>{{ __('Jika Anda belum menerima email, ') }}</p>
                    <form class="d-inline" method="POST" action="{{ route('verification.send') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('klik di sini untuk meminta link verifikasi baru') }}</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
