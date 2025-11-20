@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4">

    <div class="flex justify-between items-center mb-4">
        <h2 class="text-2xl font-bold">Daftar Polling</h2>
        <!-- Tombol + Buat Polling Baru dengan teks kuning -->
        <a href="{{ route('polls.create') }}" class="bg-blue-500 hover:bg-blue-600 text-yellow-500 px-4 py-2 rounded">
            + Buat Polling Baru
        </a>
    </div>

    <div class="overflow-x-auto">
        <table class="min-w-full border border-gray-200">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-4 py-2 border text-left">Judul</th>
                    <th class="px-4 py-2 border text-left">Status</th>
                    <th class="px-4 py-2 border text-left">Dibuat</th>
                    <th class="px-4 py-2 border text-left">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($polls as $poll)
                <tr class="border-t hover:bg-gray-50">
                    <td class="px-4 py-2 border">{{ $poll->title }}</td>
                    <td class="px-4 py-2 border">
                        @if ($poll->status == 1)
                            <span class="bg-green-100 text-green-800 px-2 py-1 rounded-full text-sm">Aktif</span>
                        @else
                            <span class="bg-gray-200 text-gray-700 px-2 py-1 rounded-full text-sm">Tidak Aktif</span>
                        @endif
                    </td>
                    <td class="px-4 py-2 border">{{ $poll->created_at->format('d M Y') }}</td>
                    <td class="px-4 py-2 border">
                        <div class="flex flex-wrap gap-2">
                            <!-- Tombol dengan teks hitam -->
                            <a href="{{ route('polls.show', $poll) }}" class="bg-blue-100 hover:bg-blue-200 text-black px-3 py-1 rounded text-sm">Lihat</a>
                            <a href="{{ route('polls.edit', $poll) }}" class="bg-yellow-100 hover:bg-yellow-200 text-black px-3 py-1 rounded text-sm">Edit</a>
                            <form action="{{ route('polls.destroy', $poll) }}" method="POST" onsubmit="return confirm('Hapus polling ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-100 hover:bg-red-200 text-black px-3 py-1 rounded text-sm">Hapus</button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</div>
@endsection
