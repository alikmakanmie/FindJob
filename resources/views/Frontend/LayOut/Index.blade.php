@extends('Frontend.LayOut.Layout')
 
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Daftar Pengguna</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('penggunas.create') }}"> Tambah Pengguna Baru</a>
            </div>
        </div>
    </div>
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
   
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Nomor Telepon</th>
            <th0px">Aksi</th>
        </tr>
        @foreach ($penggunas as $pengguna)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $pengguna->nama }}</td>
            <td>{{ $pengguna->nomor_telepon }}</td>
            <td>
                <form action="{{ route('penggunas.destroy',$pengguna->id) }}" method="POST">
   
                    <a class="btn btn-info" href="{{ route('penggunas.show',$pengguna->id) }}">Lihat</a>
    
                    <a class="btn btn-primary" href="{{ route('penggunas.edit',$pengguna->id) }}">Edit</a>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
  
    {!! $penggunas->links() !!}
      
@endsection