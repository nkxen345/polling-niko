@extends('layouts.app')

@section('content')
<div class="container">

    <h2>Buat Polling Baru</h2>

    <form action="{{ route('polls.store') }}" method="POST">
        @csrf

        <div class="mb-4">
            <label class="block">Judul Polling</label>
            <input type="text" name="title" class="w-full border p-2" required>
        </div>

        <div class="mb-4">
            <label class="block">Deskripsi</label>
            <textarea name="description" class="w-full border p-2"></textarea>
        </div>

        <div class="mb-4">
            <label class="block">Status</label>
            <select name="status" class="border p-2 w-full">
                <option value="1">Aktif</option>
                <option value="0">Tidak Aktif</option>
            </select>
        </div>

        <hr>
        <h4>Opsi Polling</h4>
        <div id="options-container">
            <div class="mb-2">
                <input type="text" name="options[]" class="border p-2 w-full" placeholder="Opsi 1" required>
            </div>
            <div class="mb-2">
                <input type="text" name="options[]" class="border p-2 w-full" placeholder="Opsi 2" required>
            </div>
        </div>

        <button type="button" id="add-option" class="bg-gray-200 px-3 py-1 rounded mb-3">Tambah Opsi</button>

        <br>
        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Buat Polling</button>
    </form>

</div>

<script>
    document.getElementById('add-option').addEventListener('click', function() {
        const container = document.getElementById('options-container');
        const count = container.querySelectorAll('input').length + 1;
        const div = document.createElement('div');
        div.classList.add('mb-2');
        div.innerHTML = `<input type="text" name="options[]" class="border p-2 w-full" placeholder="Opsi ${count}" required>`;
        container.appendChild(div);
    });
</script>
@endsection
