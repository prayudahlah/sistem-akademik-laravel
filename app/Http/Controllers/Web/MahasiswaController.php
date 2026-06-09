<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    public function index()
    {
        $mahasiswa = Mahasiswa::all();

        return view('mahasiswa.index', compact('mahasiswa'));
    }

    public function create()
    {
        return view('mahasiswa.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nim' => 'required|unique:mahasiswa,nim',
            'nama' => 'required|string|max:255',
            'alamat' => 'nullable|string',
        ], [
            'nim.unique' => 'NIM tersebut sudah terdaftar.',
        ]);

        Mahasiswa::create([
            'nim' => $request->nim,
            'nama' => $request->nama,
            'alamat' => $request->alamat,
        ]);

        return redirect()->route('mahasiswa.index')
            ->with('success', 'Data berhasil ditambahkan!');
    }

    // Menampilkan detail satu data (GET /mahasiswa/{id})
    public function show($id)
    {
        $mahasiswa = Mahasiswa::findOrFail($id);

        return view('mahasiswa.show', compact('mahasiswa'));
    }

    // Menampilkan form edit (GET /mahasiswa/{id}/edit)
    public function edit($id)
    {
        $mahasiswa = Mahasiswa::findOrFail($id);

        return view('mahasiswa.edit', compact('mahasiswa'));
    }

    // Mengupdate data (PUT /mahasiswa/{id})
    public function update(Request $request, $id)
    {
        $request->validate([
            'nim' => 'required|unique:mahasiswa,nim,'.$id.',nim',
            'nama' => 'required|string|max:255',
            'alamat' => 'nullable|string',
        ], [
            'nim.unique' => 'NIM tersebut sudah terdaftar.',
        ]);

        $mahasiswa = Mahasiswa::findOrFail($id);
        $mahasiswa->update([
            'nim' => $request->nim,
            'nama' => $request->nama,
            'alamat' => $request->alamat,
        ]);

        return redirect()->route('mahasiswa.index')
            ->with('success', 'Data berhasil diupdate!');
    }

    // Menghapus data (DELETE /mahasiswa/{id})
    public function destroy($id)
    {
        $mahasiswa = Mahasiswa::findOrFail($id);
        $mahasiswa->delete();

        return redirect()->route('mahasiswa.index')
            ->with('success', 'Data berhasil dihapus!');
    }
}
