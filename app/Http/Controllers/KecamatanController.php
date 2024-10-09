<?php

namespace App\Http\Controllers;

use App\Models\Kecamatan;
use Illuminate\Http\Request;

class KecamatanController extends Controller
{
    /**
     * Tampilkan daftar kecamatan.
     */
    public function index()
    {
        // Ambil semua data kecamatan dari database
        $kecamatans = Kecamatan::all();

        // Kirim data ke view
        return view('admin.kecamatan', compact('kecamatans'));
    }

    /**
     * Tampilkan form untuk membuat kecamatan baru.
     */
    public function create()
    {
        return view('admin.kecamatanedit'); // Sesuaikan dengan folder view Anda
    }

    /**
     * Simpan data kecamatan baru ke database.
     */
    public function store(Request $request)
    {
        // Validasi data
        $validatedData = $request->validate([
            'nama_kecamatan' => 'required|string|max:255',
        ]);

        // Buat kecamatan baru
        Kecamatan::create($validatedData);

        // Redirect ke halaman daftar kecamatan
        return redirect()->route('kecamatan.index')->with('success', 'Kecamatan berhasil ditambahkan.');
    }

    /**
     * Tampilkan detail kecamatan tertentu.
     */
    public function show($id)
    {
        // Cari kecamatan berdasarkan ID
        $kecamatan = Kecamatan::findOrFail($id);

        return view('admin.kecamatan_show', compact('kecamatan')); // Sesuaikan dengan folder view Anda
    }

    /**
     * Tampilkan form untuk mengedit data kecamatan.
     */
    public function edit($id)
    {
        // Cari kecamatan berdasarkan ID
        $kecamatan = Kecamatan::findOrFail($id);

        return view('admin.kecamatanedit', compact('kecamatan')); // Sesuaikan dengan folder view Anda
    }

    /**
     * Update data kecamatan di database.
     */
    public function update(Request $request, $id)
    {
        // Validasi data
        $validatedData = $request->validate([
            'nama_kecamatan' => 'required|string|max:255',
        ]);

        // Cari kecamatan berdasarkan ID dan update datanya
        $kecamatan = Kecamatan::findOrFail($id);
        $kecamatan->update($validatedData);

        // Redirect ke halaman daftar kecamatan
        return redirect()->route('kecamatan.index')->with('success', 'Kecamatan berhasil diperbarui.');
    }

    /**
     * Hapus data kecamatan dari database.
     */
    public function destroy($id)
    {
        // Cari kecamatan berdasarkan ID dan hapus datanya
        $kecamatan = Kecamatan::findOrFail($id);
        $kecamatan->delete();

        // Redirect ke halaman daftar kecamatan
        return redirect()->route('kecamatan.index')->with('success', 'Kecamatan berhasil dihapus.');
    }
}
