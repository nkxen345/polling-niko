@extends('layouts.app')

@section('content')
<div class="container">

    <h2>Edit Polling</h2>

    <form action="{{ route('polls.update', $poll) }}" method="POST">
        @csrf
        @method('PUT')

        <!-- Judul Polling -->
        <div class="mb-4">
            <label class="block">Judul Polling</label>
            <input type="text" name="title" class="w-full border p-2" value="{{ $poll->title }}" required>
        </div>

        <!-- Deskripsi Polling -->
        <div class="mb-4">
            <label class="block">Deskripsi</label>
            <textarea name="description" class="w-full border p-2">{{ $poll->description }}</textarea>
        </div>

        <!-- Status Polling -->
        <div class="mb-4">
            <label class="block">Status</label>
            <select name="status" class="border p-2 w-full">
                <option value="1" {{ $poll->status ? 'selected' : '' }}>Aktif</option>
                <option value="0" {{ !$poll->status ? 'selected' : '' }}>Tidak Aktif</option>
            </select>
        </div>

        <!-- Edit Opsi Polling -->
        <h4 class="mt-4 mb-2">Opsi Polling</h4>
        @foreach ($poll->options as $option)
            <div class="mb-2">
                <label class="block">Opsi {{ $loop->iteration }}</label>
                <input type="text" name="options[{{ $option->id }}]" class="w-full border p-2" value="{{ $option->option_text }}" required>
            </div>
        @endforeach

        <div class="flex gap-2 mt-4">
            <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded-md hover:bg-green-700">
                Update Polling
            </button>

            <a href="{{ route('polls.index') }}" class="bg-gray-300 text-black px-4 py-2 rounded-md hover:bg-gray-400">
                Kembali
            </a>
        </div>
    </form>

</div>
@endsection
