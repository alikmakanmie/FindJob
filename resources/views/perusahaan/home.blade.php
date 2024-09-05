@extends('Frontend.LayOut.Halaman.welcome')

@section('content')
<div class="container bg-white p-4 rounded">
    <h1 class="mb-4">Data Perusahaan</h1>
    
            <tbody>
                @if(auth()->user()->role == 'admin')
                    @foreach($perusahaan as $p)
                    <tr>
                        <td>{{ $p->nama }}</td>
                        <td>{{ $p->alamat }}</td>
                        <td>{{ $p->email }}</td>
                        <td>{{ $p->telepon }}</td>
                        <td>{{ $p->industri }}</td>
                    </tr>
                    @endforeach
                @elseif(auth()->user()->role == 'perusahaan')
                    @foreach($perusahaan->where('user_id', auth()->id()) as $p)
                    <tr>
                        <td>{{ $p->nama }}</td>     
                        <td>{{ $p->alamat }}</td>
                        <td>{{ $p->email }}</td>
                        <td>{{ $p->telepon }}</td>
                        <td>{{ $p->industri }}</td>
                    </tr>
                    @endforeach
                @endif
            </tbody>

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
