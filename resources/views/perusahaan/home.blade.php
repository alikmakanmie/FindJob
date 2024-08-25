@extends('Frontend.LayOut.Halaman.welcome')

@section('content')
<div class="container bg-white p-4 rounded">
    <h1 class="mb-4">Data Perusahaan</h1>
    
    @if(isset($perusahaan) && $perusahaan->count() > 0)
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Nama Perusahaan</th>
                    <th>Alamat</th>
                    <th>Email</th>
                    <th>Telepon</th>
                    <th>Industri</th>
                </tr>
            </thead>
            <tbody>
                @foreach($perusahaan as $p)
                <tr>
                    <td>{{ $p->nama }}</td>
                    <td>{{ $p->alamat }}</td>
                    <td>{{ $p->email }}</td>
                    <td>{{ $p->telepon }}</td>
                    <td>{{ $p->industri }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>Tidak ada data perusahaan yang tersedia saat ini.</p>
    @endif
</div>

@if(session('success'))
    <div class="alert alert-success mt-3">
        {{ session('success') }}
    </div>
@endif

@if(session('error'))
    <div class="alert alert-danger mt-3">
        {{ session('error') }}
    </div>
@endif

@if($errors->any())
    <div class="alert alert-danger mt-3">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
@endsection
