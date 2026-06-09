@extends('layout.app')

@section('title', 'Edit Mata Kuliah')

@section('content')
<div class="mb-8">
    <h1 class="text-3xl font-bold text-gray-800 mb-2">Edit Mata Kuliah</h1>
    <div class="h-1 w-20 bg-yellow-500 rounded"></div>
</div>

<a href="{{ route('mata-kuliah.index') }}"
   class="inline-flex items-center gap-2 bg-gray-500 hover:bg-gray-600 text-white font-medium py-2 px-4 rounded-lg transition duration-200 mb-6">
    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
    </svg>
    Kembali
</a>

<form action="{{ route('mata-kuliah.update', $mata_kuliah->kode) }}" method="POST"
      class="bg-white rounded-lg shadow-md p-6 max-w-2xl">
    @csrf
    @method('PUT')

    <div class="mb-5">
        <label for="kode" class="block text-gray-700 font-semibold mb-2">
            Kode MK <span class="text-red-500">*</span>
        </label>
        <input type="text"
               name="kode"
               id="kode"
               value="{{ old('kode', $mata_kuliah->kode) }}"
               class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-500 @error('kode') border-red-500 @else border-gray-300 @enderror"
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
               value="{{ old('matkul', $mata_kuliah->matkul) }}"
               class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-500 @error('matkul') border-red-500 @else border-gray-300 @enderror"
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
                   value="{{ old('sks', $mata_kuliah->sks) }}"
                   min="1"
                   max="10"
                   class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-500 @error('sks') border-red-500 @else border-gray-300 @enderror"
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
                   value="{{ old('smt', $mata_kuliah->smt) }}"
                   min="1"
                   max="8"
                   class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-500 @error('smt') border-red-500 @else border-gray-300 @enderror"
                   required>
            @error('smt')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>
    </div>

    <div class="flex gap-3">
        <button type="submit"
                class="bg-yellow-500 hover:bg-yellow-600 text-white font-semibold py-2 px-6 rounded-lg transition duration-200">
            Update Data
        </button>
        <a href="{{ route('mata-kuliah.index') }}"
           class="bg-gray-300 hover:bg-gray-400 text-gray-700 font-semibold py-2 px-6 rounded-lg transition duration-200">
            Batal
        </a>
    </div>
</form>
@endsection
