@extends('Frontend.LayOut.Halaman.welcome')

@section('content')
<div class="row mb-3">
    <div class="col-md-6 offset-md-3">
        <form action="{{ route('admin.akun') }}" method="GET" class="form-inline">
            <div class="input-group w-100">
                <input type="text" name="search" class="form-control" placeholder="Cari pengguna..." value="{{ request('search') }}">
                <div class="input-group-append">
                    <button type="submit" class="btn btn-primary">Cari</button>
                </div>
            </div>
        </form>
    </div>
</div>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Hasil Pencarian Akun Pengguna</div>
                <div class="card-body">
                    @if($users->isEmpty())
                        <p class="text-center">Tidak ada akun pengguna yang cocok dengan pencarian Anda.</p>
                    @else
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Tanggal Registrasi</th>
                                    <th>Peran</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $user)
                                <tr>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->created_at->format('d-m-Y H:i') }}</td>
                                    <td>{{ ucfirst($user->role) }}</td>
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
                        {{ $users->links() }}
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection