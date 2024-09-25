@extends('Frontend.LayOut.Halaman.welcome')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Verifikasi Email Berhasil') }}</div>

                <div class="card-body">
                    <div class="alert alert-success" role="alert">
                        {{ __('Email Anda sudah diverifikasi.') }}
                    </div>
                    <p>{{ __('Sekarang Anda dapat menggunakan semua fitur akun Anda.') }}</p>
                    <a href="{{ route('userprofile') }}" class="btn btn-primary">{{ __('Lanjut ke Beranda') }}</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
