<?php

namespace App\Http\Controllers;

use App\Models\Matakuliah;
use App\Models\Jurusan;
use Illuminate\Http\Request;

class MatakuliahController extends Controller
{
    public function index()
    {
        $matakuliah = Matakuliah::with('jurusan')->paginate(10);
        return view('matakuliah.index', compact('matakuliah'));
    }

    public function create()
    {
        $jurusan = Jurusan::all();
        return view('matakuliah.create', compact('jurusan'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_matakuliah' => 'required|string|max:255',
            'sks' => 'required|integer|min:1',
            'id_jurusan' => 'required|exists:jurusan,id_jurusan'
        ]);

        Matakuliah::create($validated);
        return redirect()->route('matakuliah.index')->with('success', 'Matakuliah berhasil ditambahkan');
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        $matakuliah = Matakuliah::findOrFail($id);
        $jurusan = Jurusan::all();
        return view('matakuliah.edit', compact('matakuliah', 'jurusan'));
    }

    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'nama_matakuliah' => 'required|string|max:255',
            'sks' => 'required|integer|min:1',
            'id_jurusan' => 'required|exists:jurusan,id_jurusan'
        ]);

        $matakuliah = Matakuliah::findOrFail($id);
        $matakuliah->update($validated);
        return redirect()->route('matakuliah.index')->with('success', 'Matakuliah berhasil diubah');
    }

    public function destroy(string $id)
    {
        $matakuliah = Matakuliah::findOrFail($id);
        $matakuliah->delete();
        return redirect()->route('matakuliah.index')->with('success', 'Matakuliah berhasil dihapus');
    }
}
