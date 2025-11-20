<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl">Edit Polling</h2>
    </x-slot>

    <form action="{{ route('polls.update', $poll->id) }}" method="POST" class="p-6">
        @csrf
        @method('PUT')

        <label>Judul</label>
        <input type="text" name="title" value="{{ $poll->title }}" class="border w-full p-2" required>

        <label class="mt-3">Deskripsi</label>
        <textarea name="description" class="border w-full p-2">{{ $poll->description }}</textarea>

        <label class="mt-3">Status</label>
        <select name="status" class="border p-2">
            <option value="1" {{ $poll->status ? 'selected' : '' }}>Aktif</option>
            <option value="0" {{ !$poll->status ? 'selected' : '' }}>Tidak Aktif</option>
        </select>

        <button class="mt-4 bg-green-600 px-4 py-2 text-white rounded">Update</button>
    </form>
</x-app-layout>
