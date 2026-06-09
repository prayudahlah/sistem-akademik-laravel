<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\MataKuliah;
use Illuminate\Http\Request;

class MataKuliahController extends Controller
{
    public function index()
    {
        $mata_kuliah = MataKuliah::all();

        return view('mata_kuliah.index', compact('mata_kuliah'));
    }

    public function create()
    {
        return view('mata_kuliah.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode' => 'required|unique:mata_kuliah,kode',
            'matkul' => 'required|string|max:255',
            'sks' => 'required|integer|min:1|max:10',
            'smt' => 'required|integer|min:1|max:8',
        ], [
            'kode.unique' => 'Kode mata kuliah tersebut sudah terdaftar.',
        ]);

        MataKuliah::create([
            'kode' => $request->kode,
            'matkul' => $request->matkul,
            'sks' => $request->sks,
            'smt' => $request->smt,
        ]);

        return redirect()->route('mata_kuliah.index')
            ->with('success', 'Data berhasil ditambahkan!');
    }

    public function show($kode)
    {
        $mata_kuliah = MataKuliah::findOrFail($kode);

        return view('mata_kuliah.show', compact('mata_kuliah'));
    }

    public function edit($kode)
    {
        $mata_kuliah = MataKuliah::findOrFail($kode);

        return view('mata_kuliah.edit', compact('mata_kuliah'));
    }

    public function update(Request $request, $kode)
    {
        $request->validate([
            'kode' => 'required|unique:mata_kuliah,kode,'.$kode.',kode',
            'matkul' => 'required|string|max:255',
            'sks' => 'required|integer|min:1|max:10',
            'smt' => 'required|integer|min:1|max:8',
        ], [
            'kode.unique' => 'Kode mata kuliah tersebut sudah terdaftar.',
        ]);

        $mata_kuliah = MataKuliah::findOrFail($kode);
        $mata_kuliah->update([
            'kode' => $request->kode,
            'matkul' => $request->matkul,
            'sks' => $request->sks,
            'smt' => $request->smt,
        ]);

        return redirect()->route('mata_kuliah.index')
            ->with('success', 'Data berhasil diupdate!');
    }

    public function destroy($kode)
    {
        $mata_kuliah = MataKuliah::findOrFail($kode);
        $mata_kuliah->delete();

        return redirect()->route('mata_kuliah.index')
            ->with('success', 'Data berhasil dihapus!');
    }
}
