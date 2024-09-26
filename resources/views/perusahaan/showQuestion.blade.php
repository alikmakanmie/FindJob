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
                        <form method="POST" action="{{ route('perusahaan.storeAnswer') }}">
                            @csrf

                            @foreach($questions as $question)
                            <div class="form-group mb-4">
                                <label for="question_{{ $question->id }}">{{ __('Pertanyaan') }}</label>
                                <input id="question_{{ $question->id }}" type="text" class="form-control" value="{{ $question->pertanyaan }}" readonly>

                                <label for="answer_{{ $question->id }}" class="mt-2">{{ __('Jawaban') }}</label>
                                <textarea id="answer_{{ $question->id }}" class="form-control" name="jawaban[{{ $question->id }}]" required></textarea>

                                @error('jawaban.' . $question->id)
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            @endforeach

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Simpan Semua Jawaban') }}
                                </button>
                            </div>
                        </form>
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
