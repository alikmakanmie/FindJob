@extends('Frontend.LayOut.Halaman.welcome')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <a href="{{ route('perusahaan.create') }}">Input Data Perusahaan</a>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('perusahaan.store') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="row mb-3">
                            <label for="nama" class="col-md-4 col-form-label text-md-end">Nama Perusahaan</label>
                            <div class="col-md-6">
                                <input id="nama" type="text" class="form-control" name="nama" required autofocus>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="alamat" class="col-md-4 col-form-label text-md-end">Alamat</label>
                            <div class="col-md-6">
                                <input id="nama" type="alamat" class="form-control" name="alamat" required autofocus>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="telepon" class="col-md-4 col-form-label text-md-end">Nomor Telepon</label>
                            <div class="col-md-6">
                                <input id="telepon" type="tel" class="form-control" name="telepon" required>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">Email</label>
                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" required>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="deskripsi" class="col-md-4 col-form-label text-md-end">Deskripsi</label>
                            <div class="col-md-6">
                                <textarea id="deskripsi" class="form-control" name="deskripsi" rows="4" required></textarea>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="foto" class="col-md-4 col-form-label text-md-end">Foto Perusahaan</label>
                            <div class="col-md-6">
                                <input id="foto" type="file" class="form-control" name="foto" required>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="deskripsi1" class="col-md-4 col-form-label text-md-end">Deskripsi Tambahan 1</label>
                            <div class="col-md-6">
                                <textarea id="deskripsi1" class="form-control" name="deskripsi1" rows="3"></textarea>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="deskripsi2" class="col-md-4 col-form-label text-md-end">Deskripsi Tambahan 2</label>
                            <div class="col-md-6">
                                <textarea id="deskripsi2" class="form-control" name="deskripsi2" rows="3"></textarea>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="deskripsi3" class="col-md-4 col-form-label text-md-end">Deskripsi Tambahan 3</label>
                            <div class="col-md-6">
                                <textarea id="deskripsi3" class="form-control" name="deskripsi3" rows="3"></textarea>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="foto1" class="col-md-4 col-form-label text-md-end">Foto Tambahan 1</label>
                            <div class="col-md-6">
                                <input id="foto1" type="file" class="form-control" name="foto1">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="foto2" class="col-md-4 col-form-label text-md-end">Foto Tambahan 2</label>
                            <div class="col-md-6">
                                <input id="foto2" type="file" class="form-control" name="foto2">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="kategori_id" class="col-md-4 col-form-label text-md-end">Kategori <span class="text-danger">*</span></label>
                            <div class="col-md-6">
                                <select class="form-control" id="kategori_id" name="kategori_id">
                                    <option value="">Silakan pilih</option>                        
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Simpan
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
