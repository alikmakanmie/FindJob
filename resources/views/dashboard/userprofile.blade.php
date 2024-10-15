@extends('Frontend.LayOut.dashboard')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">Profil Pengguna</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <!-- Kolom Kiri: Foto Profil dan Informasi Dasar -->
                        <div class="col-md-4 text-center">
                            <div class="mb-4">
                                <img src="{{ asset('/user/download.png') }}" alt="Foto Profil" class="img-fluid rounded-circle profile-image mb-3" style="width: 200px; height: 200px; object-fit: cover; border: 3px solid #007bff;">
                                <div>
                                    <label for="ganti_foto" class="btn btn-outline-primary btn-sm">
                                        <i class="fas fa-camera mr-2"></i>Ganti Foto
                                    </label>
                                    <input id="ganti_foto" type="file" name="foto" class="d-none">
                                </div>
                            </div>
                            <div class="info-basic bg-light p-3 rounded">
                                <p class="mb-1"><strong>Nama:</strong> {{ $nama ?? 'zaelikha' }}</p>
                                <p class="mb-1"><strong>Email:</strong> {{ $email ?? 'pengguna@example.com' }}</p>
                                <p class="mb-0"><strong>Bergabung Sejak:</strong> {{ $bergabung_sejak ?? '03 Oct 2024' }}</p>
                            </div>
                        </div>
                        
                        <!-- Kolom Kanan: Form Input -->
                        <div class="col-md-8">
                            <form action="#" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="nama_lengkap"><i class="fas fa-user mr-2"></i>Nama Lengkap</label>
                                    <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" value="{{ $nama_lengkap ?? 'zaelikha' }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="alamat"><i class="fas fa-map-marker-alt mr-2"></i>Alamat</label>
                                    <input type="text" class="form-control" id="alamat" name="alamat" value="{{ $alamat ?? 'talang' }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="nomor_telepon"><i class="fas fa-phone mr-2"></i>Nomor Telepon</label>
                                    <input type="tel" class="form-control" id="nomor_telepon" name="nomor_telepon" value="{{ $nomor_telepon ?? '085175171350' }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="tanggal_lahir"><i class="fas fa-calendar-alt mr-2"></i>Tanggal Lahir</label>
                                    <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" required>
                                </div>
                                <div class="form-group">
                                    <label for="jenis_kelamin"><i class="fas fa-venus-mars mr-2"></i>Jenis Kelamin</label>
                                    <select class="form-control" id="jenis_kelamin" name="jenis_kelamin" required>
                                        <option value="Laki-laki">Laki-laki</option>
                                        <option value="Perempuan">Perempuan</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="foto_ktp"><i class="fas fa-id-card mr-2"></i>Foto KTP</label>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="foto_ktp" name="foto_ktp" required>
                                        <label class="custom-file-label" for="foto_ktp">Pilih file</label>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary btn-block mt-4">
                                    <i class="fas fa-save mr-2"></i>Simpan Profil
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
    .form-control {
        border-radius: 0.25rem;
        padding: 0.375rem 0.75rem;
    }
    .btn-primary {
        background-color: #007bff;
        border-color: #007bff;
    }
    .btn-primary:hover {
        background-color: #0056b3;
        border-color: #0056b3;
    }
    .custom-file-label::after {
        content: "Pilih";
    }
</style>
@endpush

@push('scripts')
<script>
    $('.custom-file-input').on('change', function() {
        let fileName = $(this).val().split('\\').pop();
        $(this).next('.custom-file-label').addClass("selected").html(fileName);
    });
</script>
@endpush
