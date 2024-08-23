@extends('Frontend.LayOut.Halaman.welcome')

@section('content')
<div class="container">
    <h2>Data Perusahaan</h2>
    
    @if(count($perusahaan) > 0)
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Nama Perusahaan</th>
                    <th>Alamat</th>
                    <th>Nomor Telepon</th>
                    <th>Email</th>
                </tr>
            </thead>
            <tbody>
                @foreach($perusahaan as $p)
                    <tr>
                        <td>{{ $p->nama }}</td>
                        <td>{{ $p->alamat }}</td>
                        <td>{{ $p->telepon }}</td>
                        <td>{{ $p->email }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>Belum ada data perusahaan yang dimasukkan.</p>
    @endif
    
    <a href="{{ route('perusahaan.create') }}" class="btn btn-primary">Tambah Data Perusahaan</a>
</div>
@endsection
