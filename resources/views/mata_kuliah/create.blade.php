@extends('layout.app')

@section('title', 'Tambah Mata Kuliah')

@section('content')
<div class="mb-8">
    <h1 class="text-3xl font-bold text-gray-800 mb-2">Tambah Mata Kuliah Baru</h1>
    <div class="h-1 w-20 bg-blue-500 rounded"></div>
</div>

<a href="{{ route('mata-kuliah.index') }}"
   class="inline-flex items-center gap-2 bg-gray-500 hover:bg-gray-600 text-white font-medium py-2 px-4 rounded-lg transition duration-200 mb-6">
    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
    </svg>
    Kembali
</a>

<form action="{{ route('mata-kuliah.store') }}" method="POST"
      class="bg-white rounded-lg shadow-md p-6 max-w-2xl">
    @csrf

    <div class="mb-5">
        <label for="kode" class="block text-gray-700 font-semibold mb-2">
            Kode MK <span class="text-red-500">*</span>
        </label>
        <input type="text"
               name="kode"
               id="kode"
               value="{{ old('kode') }}"
               class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 @error('kode') border-red-500 @else border-gray-300 @enderror"
               placeholder="Contoh: TI001"
               required>
        @error('kode')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    <div class="mb-5">
        <label for="matkul" class="block text-gray-700 font-semibold mb-2">
            Nama Mata Kuliah <span class="text-red-500">*</span>
        </label>
        <input type="text"
               name="matkul"
               id="matkul"
               value="{{ old('matkul') }}"
               class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 @error('matkul') border-red-500 @else border-gray-300 @enderror"
               placeholder="Contoh: Algoritma dan Pemrograman"
               required>
        @error('matkul')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    <div class="grid grid-cols-2 gap-4 mb-6">
        <div>
            <label for="sks" class="block text-gray-700 font-semibold mb-2">
                SKS <span class="text-red-500">*</span>
            </label>
            <input type="number"
                   name="sks"
                   id="sks"
                   value="{{ old('sks') }}"
                   min="1"
                   max="10"
                   class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 @error('sks') border-red-500 @else border-gray-300 @enderror"
                   required>
            @error('sks')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>
        <div>
            <label for="smt" class="block text-gray-700 font-semibold mb-2">
                Semester <span class="text-red-500">*</span>
            </label>
            <input type="number"
                   name="smt"
                   id="smt"
                   value="{{ old('smt') }}"
                   min="1"
                   max="8"
                   class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 @error('smt') border-red-500 @else border-gray-300 @enderror"
                   required>
            @error('smt')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>
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
