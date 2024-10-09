<?php

namespace App\Http\Controllers;

use App\Models\Survey;
use App\Models\Subsurvey1;
use App\Models\Subsurvey2;
use Illuminate\Http\Request;

class Subsurvey2Controller extends Controller
{
    // Menampilkan daftar Subsurvey2 beserta relasi ke Survey dan Subsurvey1
    public function index()
    {
        $subsurvey2s = Subsurvey2::with(['survey', 'subsurvey1'])->get(); // Mengambil data Subsurvey2 beserta relasi ke Survey dan Subsurvey1
        return view('subsurvey2s.index', compact('subsurvey2s'));
    }

    // Menampilkan form untuk membuat Subsurvey2 baru
    public function create()
    {
        $surveys = Survey::all(); // Mengambil semua survey untuk dropdown
        $subsurvey1s = Subsurvey1::all(); // Mengambil semua Subsurvey1 untuk dropdown
        return view('subsurvey2s.create', compact('surveys', 'subsurvey1s')); // Menyediakan surveys dan subsurvey1s untuk form create
    }

    // Menyimpan data Subsurvey2 baru
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'nama_subsurvey2s' => 'required|string|max:255',
            'id_survey' => 'required|exists:surveys,id',
            'id_subsurvey1' => 'required|exists:subsurvey1s,id',
        ]);

        // Membuat Subsurvey2 baru
        Subsurvey2::create($request->all());
        return redirect()->route('subsurvey2s.index')->with('success', 'Subsurvey2 berhasil dibuat');
    }

    // Menampilkan form edit untuk Subsurvey2
    public function edit($id)
    {
        // Gunakan findOrFail untuk mencari Subsurvey2 berdasarkan ID
        $subsurvey2 = Subsurvey2::findOrFail($id);
        $surveys = Survey::all(); // Mengambil semua survey untuk dropdown
        $subsurvey1s = Subsurvey1::all(); // Mengambil semua Subsurvey1 untuk dropdown
        return view('subsurvey2s.edit', compact('subsurvey2', 'surveys', 'subsurvey1s'));
    }

    // Memperbarui Subsurvey2 yang ada
    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'nama_subsurvey2s' => 'required|string|max:255',
            'id_survey' => 'required|exists:surveys,id',
            'id_subsurvey1' => 'required|exists:subsurvey1s,id',
        ]);

        // Cari Subsurvey2 berdasarkan ID
        $subsurvey2 = Subsurvey2::findOrFail($id);

        // Update data Subsurvey2
        $subsurvey2->update([
            'nama_subsurvey2s' => $request->input('nama_subsurvey2s'),
            'id_survey' => $request->input('id_survey'),
            'id_subsurvey1' => $request->input('id_subsurvey1'),
        ]);

        // Redirect kembali ke halaman index dengan pesan sukses
        return redirect()->route('subsurvey2s.index')->with('success', 'Subsurvey2 berhasil diperbarui');
    }

    // Menghapus Subsurvey2
    public function destroy($id)
    {
        $subsurvey2 = Subsurvey2::findOrFail($id);
        $subsurvey2->delete();

        return redirect()->route('subsurvey2s.index')->with('success', 'Subsurvey2 berhasil dihapus');
    }
}
