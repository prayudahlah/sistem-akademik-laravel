@extends('layout.app')

@section('title', 'Tambah Perkuliahan')

@section('content')
<div class="mb-8">
    <h1 class="text-3xl font-bold text-gray-800 mb-2">Tambah Perkuliahan Baru</h1>
    <div class="h-1 w-20 bg-blue-500 rounded"></div>
</div>

<a href="{{ route('perkuliahan.index') }}"
   class="inline-flex items-center gap-2 bg-gray-500 hover:bg-gray-600 text-white font-medium py-2 px-4 rounded-lg transition duration-200 mb-6">
    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
    </svg>
    Kembali
</a>

<form action="{{ route('perkuliahan.store') }}" method="POST"
      class="bg-white rounded-lg shadow-md p-6 max-w-2xl">
    @csrf

    <div class="mb-5">
        <label for="nim" class="block text-gray-700 font-semibold mb-2">
            Mahasiswa <span class="text-red-500">*</span>
        </label>
        <select name="nim"
                id="nim"
                class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 @error('nim') border-red-500 @else border-gray-300 @enderror"
                required>
            <option value="">-- Pilih Mahasiswa --</option>
            @foreach($mahasiswa as $mhs)
                <option value="{{ $mhs->nim }}" {{ old('nim') == $mhs->nim ? 'selected' : '' }}>
                    {{ $mhs->nim }} - {{ $mhs->nama }}
                </option>
            @endforeach
        </select>
        @error('nim')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    <div class="mb-5">
        <label for="nip" class="block text-gray-700 font-semibold mb-2">
            Dosen Pengampu <span class="text-red-500">*</span>
        </label>
        <select name="nip"
                id="nip"
                class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 @error('nip') border-red-500 @else border-gray-300 @enderror"
                required>
            <option value="">-- Pilih Dosen --</option>
            @foreach($dosen as $dsn)
                <option value="{{ $dsn->nip }}" {{ old('nip') == $dsn->nip ? 'selected' : '' }}>
                    {{ $dsn->nip }} - {{ $dsn->nama }}
                </option>
            @endforeach
        </select>
        @error('nip')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    <div class="mb-5">
        <label for="kode" class="block text-gray-700 font-semibold mb-2">
            Mata Kuliah <span class="text-red-500">*</span>
        </label>
        <select name="kode"
                id="kode"
                class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 @error('kode') border-red-500 @else border-gray-300 @enderror"
                required>
            <option value="">-- Pilih Mata Kuliah --</option>
            @foreach($mata_kuliah as $mk)
                <option value="{{ $mk->kode }}" {{ old('kode') == $mk->kode ? 'selected' : '' }}>
                    {{ $mk->kode }} - {{ $mk->matkul }}
                </option>
            @endforeach
        </select>
        @error('kode')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    <div class="mb-6">
        <label for="nilai" class="block text-gray-700 font-semibold mb-2">
            Nilai <span class="text-red-500">*</span>
        </label>
        <input type="text"
               name="nilai"
               id="nilai"
               value="{{ old('nilai') }}"
               class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 @error('nilai') border-red-500 @else border-gray-300 @enderror"
               placeholder="Contoh: A, B, C, D, E"
               maxlength="2"
               required>
        @error('nilai')
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
