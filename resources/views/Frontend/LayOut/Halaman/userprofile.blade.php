@extends('Frontend.LayOut.Halaman.welcome')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Profil Pengguna</div>

                <div class="card-body">
                    <div class="row mb-3">
                        <label class="col-md-4 col-form-label text-md-end">Nama</label>
                        <div class="col-md-6">
                            <p class="form-control-static">{{ Auth::user()->name }}</p>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-md-4 col-form-label text-md-end">Email</label>
                        <div class="col-md-6">
                            <p class="form-control-static">{{ Auth::user()->email }}</p>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-md-4 col-form-label text-md-end">Bergabung Sejak</label>
                        <div class="col-md-6">
                            <p class="form-control-static">{{ Auth::user()->created_at->format('d M Y') }}</p>
                        </div>
                    </div>

                    <div class="row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <a href="#" class="btn btn-primary">Lengkapi Profil       </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
