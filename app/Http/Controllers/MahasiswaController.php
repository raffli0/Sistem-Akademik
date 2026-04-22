<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\Jurusan;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    public function index(Request $request) // Tambahkan parameter Request
    {
        // Ambil input pencarian
        $search = $request->input('search');

        // Query Mahasiswa dengan relasi jurusan
        $mahasiswa = Mahasiswa::with('jurusan')
            ->when($search, function ($query) use ($search) {
                return $query->where('nama', 'like', "%{$search}%")
                             ->orWhere('nim', 'like', "%{$search}%");
            })
            ->latest() // Urutkan dari yang terbaru ditambahkan
            ->paginate(10)
            ->withQueryString(); // Menjaga parameter 'search' tetap ada di URL pagination

        return view('mahasiswa.index', compact('mahasiswa'));
    }

    public function create()
    {
        $jurusan = Jurusan::all();
        return view('mahasiswa.create', compact('jurusan'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nim' => 'required|string|unique:mahasiswa,nim',
            'nama' => 'required|string|max:255',
            'id_jurusan' => 'required|exists:jurusan,id_jurusan'
        ]);

        Mahasiswa::create($validated);
        return redirect()->route('mahasiswa.index')->with('success', 'Mahasiswa berhasil ditambahkan');
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        // Gunakan parameter $id yang sesuai dengan primary key di database (id_mahasiswa)
        $mahasiswa = Mahasiswa::findOrFail($id);
        $jurusan = Jurusan::all();
        return view('mahasiswa.edit', compact('mahasiswa', 'jurusan'));
    }

    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            // Validasi unique NIM mengabaikan ID mahasiswa yang sedang diedit
            'nim' => 'required|string|unique:mahasiswa,nim,' . $id . ',id_mahasiswa',
            'nama' => 'required|string|max:255',
            'id_jurusan' => 'required|exists:jurusan,id_jurusan'
        ]);

        $mahasiswa = Mahasiswa::findOrFail($id);
        $mahasiswa->update($validated);
        return redirect()->route('mahasiswa.index')->with('success', 'Mahasiswa berhasil diubah');
    }

    public function destroy(string $id)
    {
        $mahasiswa = Mahasiswa::findOrFail($id);
        $mahasiswa->delete();
        return redirect()->route('mahasiswa.index')->with('success', 'Mahasiswa berhasil dihapus');
    }
}