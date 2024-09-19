@extends('Frontend.LayOut.Halaman.welcome')
            

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Pertanyaan') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('perusahaan.storeAnswer', $question->id) }}">
                        @csrf

                        <div class="form-group">
                            <label for="question">{{ __('Pertanyaan') }}</label>
                            <input id="question" type="text" class="form-control @error('question') is-invalid @enderror" name="question" value="{{ $question->pertanyaan }}" required autocomplete="off" readonly>

                            @error('question')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="answer">{{ __('Jawaban') }}</label>
                            <textarea id="answer" class="form-control @error('answer') is-invalid @enderror" name="answer" required>{{ old('answer') }}</textarea>

                            @error('answer')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group mb-0">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Simpan') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
