@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="text-xl font-bold mb-3">Tambah Pertanyaan untuk: {{ $poll->title }}</h2>

    <form action="{{ route('questions.store') }}" method="POST">
        @csrf

        <input type="hidden" name="poll_id" value="{{ $poll->id }}">

        <label>Pertanyaan:</label>
        <input type="text" name="question_text" class="border p-2 w-full mb-3">

        <button class="bg-blue-500 text-white p-2 rounded">Simpan Pertanyaan</button>
    </form>
</div>
@endsection
