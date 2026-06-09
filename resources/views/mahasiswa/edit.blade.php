@extends('layout.app')

@section('title', 'Edit Mahasiswa')

@section('content')
<div class="mb-8">
    <h1 class="text-3xl font-bold text-gray-800 mb-2">Edit Mahasiswa</h1>
    <div class="h-1 w-20 bg-yellow-500 rounded"></div>
</div>

<a href="{{ route('mahasiswa.index') }}"
   class="inline-flex items-center gap-2 bg-gray-500 hover:bg-gray-600 text-white font-medium py-2 px-4 rounded-lg transition duration-200 mb-6">
    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
    </svg>
    Kembali
</a>

<form action="{{ route('mahasiswa.update', $mahasiswa->nim) }}" method="POST"
      class="bg-white rounded-lg shadow-md p-6 max-w-2xl">
    @csrf
    @method('PUT')

    <div class="mb-5">
        <label for="nim" class="block text-gray-700 font-semibold mb-2">
            NIM <span class="text-red-500">*</span>
        </label>
        <input type="text"
               name="nim"
               id="nim"
               value="{{ old('nim', $mahasiswa->nim) }}"
               class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-500 @error('nim') border-red-500 @else border-gray-300 @enderror"
               required>
        @error('nim')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    <div class="mb-5">
        <label for="nama" class="block text-gray-700 font-semibold mb-2">
            Nama Lengkap <span class="text-red-500">*</span>
        </label>
        <input type="text"
               name="nama"
               id="nama"
               value="{{ old('nama', $mahasiswa->nama) }}"
               class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-500 @error('nama') border-red-500 @else border-gray-300 @enderror"
               required>
        @error('nama')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    <div class="mb-6">
        <label for="alamat" class="block text-gray-700 font-semibold mb-2">
            Alamat
        </label>
        <textarea name="alamat"
                  id="alamat"
                  rows="3"
                  class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-500">{{ old('alamat', $mahasiswa->alamat) }}</textarea>
        @error('alamat')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    <div class="flex gap-3">
        <button type="submit"
                class="bg-yellow-500 hover:bg-yellow-600 text-white font-semibold py-2 px-6 rounded-lg transition duration-200">
            Update Data
        </button>
        <a href="{{ route('mahasiswa.index') }}"
           class="bg-gray-300 hover:bg-gray-400 text-gray-700 font-semibold py-2 px-6 rounded-lg transition duration-200">
            Batal
        </a>
    </div>
</form>
@endsection
