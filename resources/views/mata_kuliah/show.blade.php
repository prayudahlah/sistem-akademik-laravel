@extends('layout.app')

@section('title', 'Detail Mata Kuliah')

@section('content')
<div class="mb-6">
    <h1 class="text-3xl font-bold text-gray-800 mb-2">Detail Mata Kuliah</h1>
    <div class="h-1 w-20 bg-blue-500 rounded"></div>
</div>

<a href="{{ route('mata-kuliah.index') }}"
   class="inline-flex items-center gap-2 bg-gray-500 hover:bg-gray-600 text-white font-medium py-2 px-4 rounded-lg transition duration-200 mb-6">
    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
    </svg>
    Kembali ke Daftar
</a>

<div class="bg-white rounded-lg shadow-md overflow-hidden max-w-2xl">
    <div class="border-b border-gray-200 bg-gray-50 px-6 py-4">
        <h2 class="text-xl font-semibold text-gray-800">Informasi Mata Kuliah</h2>
    </div>
    <div class="p-6 space-y-4">
        <div class="flex flex-col sm:flex-row sm:items-center py-3 border-b border-gray-100">
            <div class="sm:w-32 font-semibold text-gray-700">Kode MK</div>
            <div class="text-gray-900">{{ $mata_kuliah->kode }}</div>
        </div>
        <div class="flex flex-col sm:flex-row sm:items-center py-3 border-b border-gray-100">
            <div class="sm:w-32 font-semibold text-gray-700">Nama Mata Kuliah</div>
            <div class="text-gray-900">{{ $mata_kuliah->matkul }}</div>
        </div>
        <div class="flex flex-col sm:flex-row sm:items-center py-3 border-b border-gray-100">
            <div class="sm:w-32 font-semibold text-gray-700">SKS</div>
            <div class="text-gray-900">{{ $mata_kuliah->sks }}</div>
        </div>
        <div class="flex flex-col sm:flex-row sm:items-center py-3">
            <div class="sm:w-32 font-semibold text-gray-700">Semester</div>
            <div class="text-gray-900">{{ $mata_kuliah->smt }}</div>
        </div>
    </div>
</div>
@endsection
