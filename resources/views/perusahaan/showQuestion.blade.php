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

                    @if(isset($questions) && $questions->isNotEmpty())
                        @foreach($questions as $question)
                        <form method="POST" action="{{ route('perusahaan.storeAnswer', $question->pertanyaan) }}">
                            @csrf

                            <div class="form-group">
                                <label for="question">{{ __('Pertanyaan') }}</label>
                                <input id="question" type="text" class="form-control" name="question" value="{{ $question->pertanyaan }}" readonly>

                                @error('question')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="answer">{{ __('Jawaban') }}</label>
                                <textarea id="answer" class="form-control" name="answer" required></textarea>

                                @error('answer')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Simpan') }}
                                </button>
                            </div>
                        </form>
                        @endforeach
                    @else
                        <div class="alert alert-warning" role="alert">
                            Pertanyaan tidak ditemukan.
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
