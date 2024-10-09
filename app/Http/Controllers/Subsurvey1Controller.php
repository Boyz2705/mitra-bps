<?php

namespace App\Http\Controllers;

use App\Models\Survey;
use App\Models\Subsurvey1;
use Illuminate\Http\Request;

class Subsurvey1Controller extends Controller
{
    // Menampilkan daftar Subsurvey1 beserta relasi ke Survey
    public function index()
    {
        $subsurvey1s = Subsurvey1::with('survey')->get(); // Mengambil data subsurvey1 beserta relasi ke Survey
        return view('subsurvey1s.index', compact('subsurvey1s'));
    }

    // Menampilkan form untuk membuat Subsurvey1 baru
    public function create()
    {
        $surveys = Survey::all(); // Mengambil semua survey untuk dropdown
        return view('subsurvey1s.create', compact('surveys')); // Menyediakan surveys untuk form create
    }

    // Menyimpan data Subsurvey1 baru
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'nama_subsurvey' => 'required|string|max:255',
            'id_survey' => 'required|exists:surveys,id', // Pastikan survey yang dipilih ada
        ]);

        // Membuat Subsurvey1 baru
        Subsurvey1::create($request->all());
        return redirect()->route('subsurvey1s.index')->with('success', 'Subsurvey1 berhasil dibuat');
    }

    // Menampilkan form edit untuk Subsurvey1
    public function edit($id)
    {
        // Gunakan findOrFail untuk mencari Subsurvey1 berdasarkan ID
        $subsurvey1 = Subsurvey1::findOrFail($id);
        $surveys = Survey::all(); // Mengambil semua survey untuk dropdown
        return view('subsurvey1s.edit', compact('subsurvey1', 'surveys'));
    }

    // Memperbarui Subsurvey1 yang ada
    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'nama_subsurvey' => 'required|string|max:255',
            'id_survey' => 'required|exists:surveys,id', // Validasi survey
        ]);

        // Cari Subsurvey1 berdasarkan ID
        $subsurvey1 = Subsurvey1::findOrFail($id);

        // Update data Subsurvey1
        $subsurvey1->update([
            'nama_subsurvey' => $request->input('nama_subsurvey'),
            'id_survey' => $request->input('id_survey'), // Pastikan survey diperbarui juga jika ada perubahan
        ]);

        // Redirect kembali ke halaman index dengan pesan sukses
        return redirect()->route('subsurvey1s.index')->with('success', 'Subsurvey1 berhasil diperbarui');
    }

    // Menghapus Subsurvey1
    public function destroy($id)
{
    // Cari Subsurvey1 berdasarkan ID
    $subsurvey1 = Subsurvey1::findOrFail($id);

    // Hapus Subsurvey1
    $subsurvey1->delete();

    // Redirect kembali ke halaman index dengan pesan sukses
    return redirect()->route('subsurvey1s.index')->with('success', 'Subsurvey1 berhasil dihapus');
}
}
