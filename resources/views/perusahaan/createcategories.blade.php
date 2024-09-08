@extends('Frontend.LayOut.Halaman.welcome')

@section('content')
<form action="{{ route('categories.store') }}" method="POST" class="p-4 shadow rounded bg-white">
    @csrf
    <h4 class="text-center mb-4">Tambah Kategori Baru</h4>
    <div class="mb-3">
        <label for="nama_kategori" class="form-label">Nama Kategori:</label>
        <input type="text" class="form-control" id="nama_kategori" name="nama_kategori" placeholder="Masukkan nama kategori" required>
    </div>
    <div class="d-flex justify-content-center">
        <button type="submit" class="btn btn-primary">Tambah Kategori</button>
    </div>
</form>
@endsection