@extends('Frontend.LayOut.Halaman.welcome')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Profil Pengguna</div>

                <div class="card-body">
                    <div class="row mb-3">
                        <label class="col-md-4 col-form-label text-md-end">Nama</label>
                        <div class="col-md-6">
                            <p class="form-control-static">{{ optional(Auth::user()->pengguna)->nama_lengkap ?? '' }}</p>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-md-4 col-form-label text-md-end">Email</label>
                        <div class="col-md-6">
                            <p class="form-control-static">{{ Auth::user()->email }}</p>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-md-4 col-form-label text-md-end">Bergabung Sejak</label>
                        <div class="col-md-6">
                            <p class="form-control-static">{{ Auth::user()->created_at->format('d M Y') }}</p>
                        </div>
                    </div>

                    @if (!is_null(optional(Auth::user()->pengguna)->nama_lengkap) && !is_null(optional(Auth::user()->pengguna)->alamat) && !is_null(optional(Auth::user()->pengguna)->nomor_telepon) && !is_null(optional(Auth::user()->pengguna)->tanggal_lahir) && !is_null(optional(Auth::user()->pengguna)->jenis_kelamin))
                    <div class="row mb-3">
                        <label class="col-md-4 col-form-label text-md-end">Alamat</label>
                        <div class="col-md-6">
                            <p class="form-control-static">{{ optional(Auth::user()->pengguna)->alamat }}</p>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-md-4 col-form-label text-md-end">Nomor Telepon</label>
                        <div class="col-md-6">
                            <p class="form-control-static">{{ optional(Auth::user()->pengguna)->nomor_telepon }}</p>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-md-4 col-form-label text-md-end">Tanggal Lahir</label>
                        <div class="col-md-6">
                            <p class="form-control-static">{{ optional(Auth::user()->pengguna)->tanggal_lahir ?? '' }}</p>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-md-4 col-form-label text-md-end">Jenis Kelamin</label>
                        <div class="col-md-6">
                            <p class="form-control-static">{{ optional(Auth::user()->pengguna)->jenis_kelamin }}</p>
                        </div>
                    </div>
                    @endif

                    @if (is_null(optional(Auth::user()->pengguna)->nama_lengkap) || is_null(optional(Auth::user()->pengguna)->alamat) || is_null(optional(Auth::user()->pengguna)->nomor_telepon) || is_null(optional(Auth::user()->pengguna)->tanggal_lahir) || is_null(optional(Auth::user()->pengguna)->jenis_kelamin))
                    <form method="POST" action="{{ route('user.updateProfile') }}">
                        @csrf
                        <div class="row mb-3">
                            <label class="col-md-4 col-form-label text-md-end">Nama <span class="text-danger">*</span></label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="nama_lengkap" value="{{ old('nama_lengkap', optional(Auth::user()->pengguna)->nama_lengkap ?? '') }}" required>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-md-4 col-form-label text-md-end">Alamat <span class="text-danger">*</span></label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="alamat" value="{{ old('alamat', optional(Auth::user()->pengguna)->alamat ?? '') }}" required>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-md-4 col-form-label text-md-end">Nomor Telepon <span class="text-danger">*</span></label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="nomor_telepon" value="{{ old('nomor_telepon', optional(Auth::user()->pengguna)->nomor_telepon ?? '') }}" required>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-md-4 col-form-label text-md-end">Tanggal Lahir <span class="text-danger">*</span></label>
                            <div class="col-md-6">
                                <input type="date" class="form-control" name="tanggal_lahir" value="{{ old('tanggal_lahir', optional(Auth::user()->pengguna)->tanggal_lahir ?? '') }}" required>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-md-4 col-form-label text-md-end">Foto <span class="text-danger">*</span></label>
                            <div class="col-md-6">
                                <input type="file" class="form-control" name="foto" accept="image/*" required>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-md-4 col-form-label text-md-end">Foto KTP <span class="text-danger">*</span></label>
                            <div class="col-md-6">
                                <input type="file" class="form-control" name="foto_ktp" accept="image/*" required>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-md-4 col-form-label text-md-end">Jenis Kelamin <span class="text-danger">*</span></label>
                            <div class="col-md-6">
                                <select class="form-control" name="jenis_kelamin" required>
                                    <option value="">Pilih jenis kelamin</option>
                                    <option value="laki-laki" {{ old('jenis_kelamin', optional(Auth::user()->pengguna)->jenis_kelamin ?? '') == 'laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                                    <option value="perempuan" {{ old('jenis_kelamin', optional(Auth::user()->pengguna)->jenis_kelamin ?? '') == 'perempuan' ? 'selected' : '' }}>Perempuan</option>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-md-4 col-form-label text-md-end">Status Pekerjaan <span class="text-danger">*</span></label>
                            <div class="col-md-6">
                                <select class="form-control" name="survey_questions[status_pekerjaan]" required>
                                    <option value="">Pilih status pekerjaan</option>
                                    <option value="pelajar">Pelajar/Mahasiswa</option>
                                    <option value="wiraswasta">Wiraswasta</option>
                                </select>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-md-4 col-form-label text-md-end">Bidang Pekerjaan <span class="text-danger">*</span></label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="survey_questions[bidang_pekerjaan]" placeholder="Contoh: Teknologi Informasi, Kesehatan, Pendidikan, dll." required>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-md-4 col-form-label text-md-end">Pengalaman Kerja <span class="text-danger">*</span></label>
                            <div class="col-md-6">
                                <select class="form-control" name="survey_questions[pengalaman_kerja]" required>
                                    <option value="">Pilih pengalaman kerja</option>
                                    <option value="0-1">0-1 tahun</option>
                                    <option value="1-3">1-3 tahun</option>
                                    <option value="3-5">3-5 tahun</option>
                                    <option value="5+">Lebih dari 5 tahun</option>
                                </select>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-md-4 col-form-label text-md-end">Pendapatan Bulanan <span class="text-danger">*</span></label>
                            <div class="col-md-6">
                                <select class="form-control" name="survey_questions[pendapatan_bulanan]" required>
                                    <option value="">Pilih rentang pendapatan</option>
                                    <option value="<3jt">Kurang dari 3 juta</option>
                                    <option value="3-5jt">3 - 5 juta</option>
                                    <option value="5-10jt">5 - 10 juta</option>
                                    <option value="10jt+">Lebih dari 10 juta</option>
                                </select>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-md-4 col-form-label text-md-end">Keterampilan <span class="text-danger">*</span></label>
                            <div class="col-md-6">
                                <textarea class="form-control" name="survey_questions[keterampilan]" rows="3" placeholder="Masukkan keterampilan Anda, pisahkan dengan koma" required></textarea>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </div>
                    </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection