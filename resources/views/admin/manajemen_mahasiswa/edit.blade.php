@extends('template.template_admin')

@section('content')
<div class="max-w-lg mx-auto bg-white p-6 rounded-xl shadow">

    <h2 class="text-xl font-bold mb-4">Edit Mahasiswa</h2>

    <form action="{{ route('manajemen_mahasiswa.edit', $mahasiswa->nim) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>NIM</label>
            <input type="text" name="nim" value="{{ $mahasiswa->nim }}" class="w-full border p-2 rounded">
        </div>

        <div class="mb-3">
            <label>Username</label>
            <input type="text" name="username" value="{{ $mahasiswa->username }}" class="w-full border p-2 rounded">
        </div>

        <div class="mb-3">
            <label>Password (opsional)</label>
            <input type="password" name="password" class="w-full border p-2 rounded">
        </div>

        <button class="bg-yellow-500 text-white px-4 py-2 rounded">
            Update
        </button>
    </form>

</div>
@endsection