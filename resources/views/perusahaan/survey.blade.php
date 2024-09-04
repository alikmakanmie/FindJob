@extends('Frontend.LayOut.Halaman.welcome')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Survei Pendaftaran Perusahaan</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('daftar.storeSurvey') }}">
                        @csrf
                        
                        <div class="mb-3">
                            <label for="nama_perusahaan" class="form-label">Nama Perusahaan</label>
                            <input type="text" class="form-control" id="nama_perusahaan" name="nama_perusahaan" required>
                        </div>

                        <div class="mb-3">
                            <label for="deskripsi_perusahaan" class="form-label">Deskripsi Perusahaan</label>
                            <textarea class="form-control" id="deskripsi_perusahaan" name="deskripsi_perusahaan" rows="4" required placeholder="Jelaskan secara singkat tentang perusahaan Anda, termasuk visi, misi, dan nilai-nilai utama."></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="produk_layanan" class="form-label">Produk atau Layanan Utama</label>
                            <textarea class="form-control" id="produk_layanan" name="produk_layanan" rows="3" required placeholder="Sebutkan dan jelaskan produk atau layanan utama yang ditawarkan oleh perusahaan Anda."></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="target_pasar" class="form-label">Target Pasar</label>
                            <input type="text" class="form-control" id="target_pasar" name="target_pasar" required placeholder="Siapa target pasar utama perusahaan Anda?">
                        </div>

                        <div class="mb-3">
                            <label for="keunggulan_kompetitif" class="form-label">Keunggulan Kompetitif</label>
                            <textarea class="form-control" id="keunggulan_kompetitif" name="keunggulan_kompetitif" rows="3" required placeholder="Apa yang membedakan perusahaan Anda dari pesaing?"></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="rencana_pengembangan" class="form-label">Rencana Pengembangan</label>
                            <textarea class="form-control" id="rencana_pengembangan" name="rencana_pengembangan" rows="3" required placeholder="Bagaimana rencana pengembangan perusahaan Anda dalam 5 tahun ke depan?"></textarea>
                        </div>

                        <div class="mb-0">
                            <button type="submit" class="btn btn-primary">
                                Kirim Survei
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

