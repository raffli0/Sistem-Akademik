<?php

namespace App\Http\Controllers;

use App\Models\Jurusan;
use Illuminate\Http\Request;

class JurusanController extends Controller
{
    public function index()
    {
        $jurusan = Jurusan::paginate(10);
        return view('jurusan.index', compact('jurusan'));
    }

    public function create()
    {
        return view('jurusan.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_jurusan' => 'required|string|max:255',
            'akreditasi' => 'required|string|max:50'
        ]);

        Jurusan::create($validated);
        return redirect()->route('jurusan.index')->with('success', 'Jurusan berhasil ditambahkan');
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        $jurusan = Jurusan::findOrFail($id);
        return view('jurusan.edit', compact('jurusan'));
    }

    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'nama_jurusan' => 'required|string|max:255',
            'akreditasi' => 'required|string|max:50'
        ]);

        $jurusan = Jurusan::findOrFail($id);
        $jurusan->update($validated);
        return redirect()->route('jurusan.index')->with('success', 'Jurusan berhasil diubah');
    }

    public function destroy(string $id)
    {
        $jurusan = Jurusan::findOrFail($id);
        $jurusan->delete();
        return redirect()->route('jurusan.index')->with('success', 'Jurusan berhasil dihapus');
    }
}
