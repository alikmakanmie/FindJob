@extends('Frontend.LayOut.Halaman.welcome')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Daftar Akun Pengguna</div>

                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Peran</th>
                                <th>Tanggal Daftar</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                            <tr>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    @if($user->role == 'admin')
                                        Admin
                                    @elseif($user->role == 'user')
                                        Pengguna
                                    @elseif($user->role == 'perusahaan')
                                        Perusahaan
                                    @else
                                        {{ ucfirst($user->role) }}
                                    @endif
                                </td>
                                <td>{{ $user->created_at->format('d-m-Y H:i') }}</td>
                                <td>
                                    @if($user->role == 'user')
                                    <form action="{{ route('admin.upgradeRole', $user->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit" class="btn btn-sm btn-primary">Upgrade ke Perusahaan</button>
                                    </form>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection