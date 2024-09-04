@extends('Frontend.LayOut.Halaman.welcome')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card shadow">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">Data Survey Perusahaan</h4>
                </div>
                <div class="card-body">
                    @if($survey)
                        <table class="table table-bordered">
                            <tr>
                                <th>Nama Perusahaan</th>
                                <td>{{ $survey->nama_perusahaan }}</td>
                            </tr>
                            <tr>
                                <th>Deskripsi Perusahaan</th>
                                <td>{{ $survey->deskripsi_perusahaan }}</td>
                            </tr>
                            <tr>
                                <th>Produk/Layanan</th>
                                <td>{{ $survey->produk_layanan }}</td>
                            </tr>
                            <tr>
                                <th>Target Pasar</th>
                                <td>{{ $survey->target_pasar }}</td>
                            </tr>
                            <tr>
                                <th>Keunggulan Kompetitif</th>
                                <td>{{ $survey->keunggulan_kompetitif }}</td>
                            </tr>
                            <tr>
                                <th>Rencana Pengembangan</th>
                                <td>{{ $survey->rencana_pengembangan }}</td>
                            </tr>
                        </table>
                        <div class="mt-3">
                            <a href="{{ route('admin.permintaan') }}" class="btn btn-secondary">Kembali</a>
                        </div>
                    @else
                        <p class="text-center">Data survey tidak ditemukan.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
