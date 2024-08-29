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
                    @if($users->isEmpty())
                        <p class="text-center">Tidak ada permintaan upgrade role saat ini.</p>
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
                                    @foreach($users as $user)
                                    <tr>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->created_at->format('d M Y, H:i') }}</td>
                                        <td>
                                            <span class="badge bg-warning">Menunggu</span>
                                        </td>
                                        <td>
                                            <form action="{{ route('admin.approve', $user->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('PUT')
                                                <button type="submit" class="btn btn-sm btn-success">Setujui</button>
                                            </form>
                                            <form action="{{ route('admin.reject', $user->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('PUT')
                                                <button type="submit" class="btn btn-sm btn-danger">Tolak</button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        @if($users instanceof \Illuminate\Pagination\LengthAwarePaginator)
                            <div class="d-flex justify-content-center mt-4">
                                {{ $users->links() }}
                            </div>
                        @endif
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
