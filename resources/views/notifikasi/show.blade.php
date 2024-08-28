@extends('Frontend.LayOut.Halaman.welcome')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Detail Notifikasi</div>

                <div class="card-body">
                    @if($notification)
                       
                        <p>{{ $notification->data['massage'] ?? 'Tidak ada pesan tambahan'}}</p>
                        <p class="card-text">
                            <small class="text-muted">Diterima: {{ $notification->created_at->format('d M Y H:i') }}</small>
                        </p>

                        @if(Auth::user()->role == 'admin' && isset($notification->data['type']) && $notification->data['type'] == 'NewCompanyRegistration')
                            <form action="{{ route('admin.updateUserRole', $notification->data['user_id']) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label for="role">Ubah Role Pengguna:</label>
                                    <select name="role" id="role" class="form-control">
                                        <option value="user">User</option>
                                        <option value="perusahaan">Perusahaan</option>
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-primary mt-3">Perbarui Role</button>
                            </form>
                        @endif

                        @if(Auth::user()->role == 'admin' && isset($notification->data['type']) && $notification->data['type'] == 'NewCompanyRegistration')
                            <form action="{{ route('admin.updateUserRole', $notification->data['user_id']) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label for="role">Ubah Role Pengguna:</label>
                                    <select name="role" id="role" class="form-control">
                                        <option value="user">User</option>
                                        <option value="perusahaan">Perusahaan</option>
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-primary mt-3">Perbarui Role</button>
                            </form>
                        @endif

                        @if(!$notification->read_at)
                            <form action="{{ route('notifications.markAsRead', $notification->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-secondary mt-3">Tandai Sudah Dibaca</button>
                            </form>
                        @endif
                    @else
                        <p>Notifikasi tidak ditemukan.</p>
                    @endif

                    <a href="{{ route('notifications.index') }}" class="btn btn-link mt-3">Kembali ke Daftar Notifikasi</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
