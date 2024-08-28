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
                    <form action="{{ route('admin.permintaan') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" required autofocus>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="message">Pesan untuk Admin</label>
                            <textarea class="form-control @error('message') is-invalid @enderror" id="message" name="message" rows="3" required>{{ old('message') }}</textarea>
                            @error('message')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <input type="hidden" name="role" value="perusahaan">
                        <input type="hidden" name="status" value="pending">
                        <input type="hidden" name="type" value="NewCompanyRegistration">
                        <input type="hidden" name="notifiable_type" value="App\Models\User">
                        <input type="hidden" name="notifiable_id" value="{{ Auth::id() }}">
                        <input type="hidden" name="data" value="{{ json_encode(['user_name' => Auth::user()->name]) }}">
                        <button type="submit" class="btn btn-primary">Ajukan Pendaftaran</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection