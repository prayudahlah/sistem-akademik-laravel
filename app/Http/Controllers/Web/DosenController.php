<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Dosen;
use Illuminate\Http\Request;

class DosenController extends Controller
{
    public function index()
    {
        $dosen = Dosen::all();

        return view('dosen.index', compact('dosen'));
    }

    public function create()
    {
        return view('dosen.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nip' => 'required|unique:dosen,nip',
            'nama' => 'required|string|max:255',
            'alamat' => 'nullable|string',
        ], [
            'nip.unique' => 'NIP tersebut sudah terdaftar.',
        ]);

        Dosen::create([
            'nip' => $request->nip,
            'nama' => $request->nama,
            'alamat' => $request->alamat,
        ]);

        return redirect()->route('dosen.index')
            ->with('success', 'Data berhasil ditambahkan!');
    }

    public function show($nip)
    {
        $dosen = Dosen::findOrFail($nip);

        return view('dosen.show', compact('dosen'));
    }

    public function edit($nip)
    {
        $dosen = Dosen::findOrFail($nip);

        return view('dosen.edit', compact('dosen'));
    }

    public function update(Request $request, $nip)
    {
        $request->validate([
            'nip' => 'required|unique:dosen,nip,'.$nip.',nip',
            'nama' => 'required|string|max:255',
            'alamat' => 'nullable|string',
        ], [
            'nip.unique' => 'NIP tersebut sudah terdaftar.',
        ]);

        $dosen = Dosen::findOrFail($nip);
        $dosen->update([
            'nip' => $request->nip,
            'nama' => $request->nama,
            'alamat' => $request->alamat,
        ]);

        return redirect()->route('dosen.index')
            ->with('success', 'Data berhasil diupdate!');
    }

    public function destroy($nip)
    {
        $dosen = Dosen::findOrFail($nip);
        $dosen->delete();

        return redirect()->route('dosen.index')
            ->with('success', 'Data berhasil dihapus!');
    }
}
