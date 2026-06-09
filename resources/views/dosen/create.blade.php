@extends('layout.app')

@section('title', 'Tambah Dosen')

@section('content')
<div class="mb-8">
    <h1 class="text-3xl font-bold text-gray-800 mb-2">Tambah Dosen Baru</h1>
    <div class="h-1 w-20 bg-blue-500 rounded"></div>
</div>

<a href="{{ route('dosen.index') }}"
   class="inline-flex items-center gap-2 bg-gray-500 hover:bg-gray-600 text-white font-medium py-2 px-4 rounded-lg transition duration-200 mb-6">
    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
    </svg>
    Kembali
</a>

<form action="{{ route('dosen.store') }}" method="POST"
      class="bg-white rounded-lg shadow-md p-6 max-w-2xl">
    @csrf

    <div class="mb-5">
        <label for="nip" class="block text-gray-700 font-semibold mb-2">
            NIP <span class="text-red-500">*</span>
        </label>
        <input type="text"
               name="nip"
               id="nip"
               value="{{ old('nip') }}"
               class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 @error('nip') border-red-500 @else border-gray-300 @enderror"
               placeholder="Contoh: 19850101202001"
               required>
        @error('nip')
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
               value="{{ old('nama') }}"
               class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 @error('nama') border-red-500 @else border-gray-300 @enderror"
               placeholder="Masukkan nama lengkap"
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
                  class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                  placeholder="Masukkan alamat (opsional)">{{ old('alamat') }}</textarea>
        @error('alamat')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    <div class="flex gap-3">
        <button type="submit"
                class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-6 rounded-lg transition duration-200 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
            Simpan Data
        </button>
        <button type="reset"
                class="bg-gray-300 hover:bg-gray-400 text-gray-700 font-semibold py-2 px-6 rounded-lg transition duration-200">
            Reset
        </button>
    </div>
</form>
@endsection
