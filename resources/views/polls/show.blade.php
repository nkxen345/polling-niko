@extends('layouts.app')

@section('content')
<div class="container">

    <h2>{{ $poll->title }}</h2>
    <p>{{ $poll->description }}</p>

    <hr>

    <h4>Pilih Jawaban:</h4>

    @if (session('success'))
        <div class="alert alert-success mt-2">{{ session('success') }}</div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger mt-2">{{ session('error') }}</div>
    @endif

    <div class="mb-3">
        @foreach ($poll->options as $option)
            <form action="{{ route('polls.vote', $poll) }}" method="POST" class="d-inline-block me-2 mb-2">
                @csrf
                <input type="hidden" name="option_id" value="{{ $option->id }}">
                <button type="submit" class="btn btn-primary">
                    {{ $option->option_text }} - Vote
                </button>
            </form>
        @endforeach
    </div>

    <hr>

    <h4>Hasil Sementara:</h4>
    @foreach ($poll->options as $option)
        <p>{{ $option->option_text }} — <b>{{ $option->votes }} suara</b></p>
    @endforeach

    <a href="{{ route('polls.index') }}" class="btn btn-secondary mt-3">Kembali ke Daftar Polling</a>

</div>
@endsection
