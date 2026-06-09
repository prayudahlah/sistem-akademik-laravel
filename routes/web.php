<?php

use App\Http\Controllers\Web\DosenController;
use App\Http\Controllers\Web\MahasiswaController;
use App\Http\Controllers\Web\MataKuliahController;
use App\Http\Controllers\Web\PerkuliahanController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('mahasiswa.index');
});

Route::resource('mahasiswa', MahasiswaController::class)->parameter('mahasiswa', 'nim');
Route::resource('dosen', DosenController::class)->parameter('dosen', 'nip');
Route::resource('mata-kuliah', MataKuliahController::class)->parameter('mata_kuliah', 'kode');
Route::resource('perkuliahan', PerkuliahanController::class);
