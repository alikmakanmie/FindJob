@extends('Frontend.LayOut.Halaman.welcome')

@section('content')
<div class="container">
    <h2>Notifikasi</h2>
    @forelse(Auth::user()->notifications as $notification)
        <div class="alert alert-info">
            <a href="{{ route('notifications.show', $notification->id) }}">
                {{ $notification->data['message'] ?? 'Tidak ada pesan' }}
            </a>
            <small class="float-right">{{ $notification->created_at->diffForHumans() }}</small>
        </div>
    @empty
        <p>Tidak ada notifikasi.</p>
    @endforelse
</div>
@endsection
