@extends('Frontend.LayOut.Halaman.welcome')

@section('content')
<div class="container mt-5">
    <div class="card">
        <div class="card-header bg-primary text-white">
            <h2 class="mb-0">Tambah Pertanyaan untuk {{ $perusahaan->nama }}</h2>
        </div>
        <div class="card-body">
            <form action="{{ route('perusahaan.storeQuestion', $perusahaan) }}" method="POST">
                @csrf
                <div id="pertanyaan-container">
                    @for($i = 1; $i <= 1; $i++)
                        <div class="form-group mb-3">
                            <label for="pertanyaan{{ $i }}" class="form-label">Pertanyaan {{ $i }}:</label>
                            <input type="text" class="form-control" id="pertanyaan{{ $i }}" name="pertanyaan[]" required>
                        </div>
                    @endfor
                </div>
                <button type="button" class="btn btn-secondary" id="tambah-pertanyaan">Tambah Pertanyaan</button>
                <button type="submit" class="btn btn-success">Simpan Pertanyaan</button>
            </form>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        let pertanyaanCount = 3;
        const pertanyaanContainer = document.getElementById('pertanyaan-container');
        const tambahPertanyaanButton = document.getElementById('tambah-pertanyaan');

        tambahPertanyaanButton.addEventListener('click', function () {
            const newPertanyaanDiv = document.createElement('div');
            newPertanyaanDiv.classList.add('form-group', 'mb-3');
            newPertanyaanDiv.innerHTML = `
                <label for="pertanyaan${pertanyaanCount}" class="form-label">Pertanyaan ${pertanyaanCount + 1}:</label>
                <input type="text" class="form-control" id="pertanyaan${pertanyaanCount}" name="pertanyaan[]">
            `;
            pertanyaanContainer.appendChild(newPertanyaanDiv);
            pertanyaanCount++;
        });
    });
</script>
@endsection
