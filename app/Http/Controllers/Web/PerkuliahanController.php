<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Dosen;
use App\Models\Mahasiswa;
use App\Models\MataKuliah;
use App\Models\Perkuliahan;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class PerkuliahanController extends Controller
{
    public function index()
    {
        $kuliah = Perkuliahan::with(['mahasiswa', 'dosen', 'mata_kuliah'])->get();

        return view('perkuliahan.index', compact('kuliah'));
    }

    public function create()
    {
        $mahasiswa = Mahasiswa::all();
        $dosen = Dosen::all();
        $mata_kuliah = MataKuliah::all();

        return view('perkuliahan.create', compact('mahasiswa', 'dosen', 'mata_kuliah'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nim' => 'required|exists:mahasiswa,nim',
            'nip' => 'required|exists:dosen,nip',
            'kode' => 'required|exists:mata_kuliah,kode',
            'nilai' => 'required|string|max:2',
            'nim' => [
                'required',
                Rule::unique('perkuliahan')->where(function ($query) use ($request) {
                    return $query->where('nip', $request->nip)
                        ->where('kode', $request->kode);
                }),
            ],
        ], [
            'nim.unique' => 'Kombinasi mahasiswa, dosen, dan mata kuliah sudah ada.',
        ]);

        Perkuliahan::create([
            'nim' => $request->nim,
            'nip' => $request->nip,
            'kode' => $request->kode,
            'nilai' => $request->nilai,
        ]);

        return redirect()->route('perkuliahan.index')
            ->with('success', 'Data berhasil ditambahkan!');
    }

    public function show($id)
    {
        $kuliah = Perkuliahan::with(['mahasiswa', 'dosen', 'mata_kuliah'])->findOrFail($id);

        return view('perkuliahan.show', compact('kuliah'));
    }

    public function edit($id)
    {
        $kuliah = Perkuliahan::findOrFail($id);
        $mahasiswa = Mahasiswa::all();
        $dosen = Dosen::all();
        $mata_kuliah = MataKuliah::all();

        return view('perkuliahan.edit', compact('kuliah', 'mahasiswa', 'dosen', 'mata_kuliah'));
    }

    public function update(Request $request, $id)
    {
        $kuliah = Perkuliahan::findOrFail($id);

        $request->validate([
            'nim' => 'required|exists:mahasiswa,nim',
            'nip' => 'required|exists:dosen,nip',
            'kode' => 'required|exists:mata_kuliah,kode',
            'nilai' => 'required|string|max:2',
            'nim' => [
                'required',
                Rule::unique('perkuliahan')->where(function ($query) use ($request) {
                    return $query->where('nip', $request->nip)
                        ->where('kode', $request->kode);
                })->ignore($kuliah->id),
            ],
        ], [
            'nim.unique' => 'Kombinasi mahasiswa, dosen, dan mata kuliah sudah ada.',
        ]);

        $kuliah->update([
            'nim' => $request->nim,
            'nip' => $request->nip,
            'kode' => $request->kode,
            'nilai' => $request->nilai,
        ]);

        return redirect()->route('perkuliahan.index')
            ->with('success', 'Data berhasil diupdate!');
    }

    public function destroy($id)
    {
        $kuliah = Perkuliahan::findOrFail($id);
        $kuliah->delete();

        return redirect()->route('perkuliahan.index')
            ->with('success', 'Data berhasil dihapus!');
    }
}
