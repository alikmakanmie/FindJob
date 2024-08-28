@extends('Frontend.LayOut.Halaman.welcome')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card shadow">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">Permintaan Upgrade Role</h4>
                </div>
                <div class="card-body">
                    @if($permintaan->isEmpty())
                        <div class="alert alert-info text-center" role="alert">
                            <i class="fa fa-info-circle mr-2"></i>Tidak ada permintaan upgrade role saat ini.
                        </div>
                    @else
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead class="thead-light">
                                    <tr>
                                        <th>Nama Pengguna</th>
                                        <th>Email</th>
                                        <th>Tanggal Permintaan</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($permintaan as $req)
                                    <tr>
                                        <td>{{ $req->data['user_name'] ?? 'Tidak tersedia' }}</td>
                                        <td>{{ $req->data['user_email'] ?? 'Tidak tersedia' }}</td>
                                        <td>{{ $req->created_at->format('d M Y, H:i') }}</td>
                                        <td>
                                            @if($req->read_at)
                                                <span class="badge badge-success">Sudah Diproses</span>
                                            @else
                                                <span class="badge badge-warning">Menunggu</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if($user->role === 'user')
                                            <form action="{{ route('admin.upgradeRole', $user) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('PUT')
                                                <button type="submit" class="btn btn-sm btn-primary">Upgrade ke Perusahaan</button>
                                            </form>
                                        @elseif($user->role === 'perusahaan')
                                            <form action="{{ route('admin.downgradeRole', $user) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('PUT')
                                                <button type="submit" class="btn btn-sm btn-warning">Downgrade ke User</button>
                                            </form>
                                        @endif
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="d-flex justify-content-center mt-4">
                            {{ $permintaan->links() }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
