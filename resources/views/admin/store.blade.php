@extends('Frontend.LayOut.Halaman.welcome')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h2 class="mb-0 text-center">Data Perusahaan yang Dibuat Admin</h2>
                </div>
                <div class="card-body bg-white">
                    @if(count($perusahaan) > 0)
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead-light">
                                    <tr>
                                        <th class="text-center">No.</th>
                                        <th>Nama Perusahaan</th>
                                        <th>Alamat</th>
                                        <th>Nomor Telepon</th>
                                        <th>Email</th>
                                        <th class="text-center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($perusahaan as $index => $p)
                                        <tr>
                                            <td class="text-center">{{ $index + 1 }}</td>
                                            <td>{{ $p->nama }}</td>
                                            <td>{{ $p->alamat }}</td>
                                            <td>{{ $p->telepon }}</td>
                                            <td>{{ $p->email }}</td>
                                            <td class="text-center">
                                                <a href="{{ route('perusahaan.edit', $p->id) }}" class="btn btn-sm btn-warning mr-2">
                                                    <i class="fa fa-edit"></i> Edit
                                                </a>
                                                <form action="{{ route('perusahaan.destroy', $p->id) }}" method="POST" class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                                        <i class="fa fa-trash"></i> Hapus
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <div class="alert alert-info text-center">
                            <i class="fa fa-info-circle mr-2"></i>Belum ada data perusahaan yang dimasukkan oleh admin.
                        </div>
                    @endif
                    
                    <div class="text-center mt-4">
                        <a href="{{ route('perusahaan.create') }}" class="btn btn-primary">
                            <i class="fa fa-plus-circle mr-2"></i>Tambah Data Perusahaan Baru
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection