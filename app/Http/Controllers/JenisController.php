<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jenis;

class JenisController extends Controller
{
    public function index()
    {
        // Ambil semua data jenis dari database
        $jenis = Jenis::all();

        // Kirim data ke view
        return view('admin.jenis', compact('jenis'));
    }

    /**
     * Tampilkan form untuk membuat jenis baru.
     */
    public function create()
    {
        return view('admin.jeniscreate'); // Sesuaikan dengan folder view Anda
    }

    /**
     * Simpan data jenis baru ke database.
     */
    public function store(Request $request)
    {
        // Validasi data
        $validatedData = $request->validate([
            'nama_jenis' => 'required|string|max:255',
        ]);

        // Buat jenis baru
        Jenis::create($validatedData);

        // Redirect ke halaman daftar jenis
        return redirect()->route('jenis.index')->with('success', 'Jenis berhasil ditambahkan.');
    }

    /**
     * Tampilkan detail jenis tertentu.
     */
    public function show($id)
    {
        // Cari jenis berdasarkan ID
        $jenis = Jenis::findOrFail($id);

        return view('admin.jenis_show', compact('jenis')); // Sesuaikan dengan folder view Anda
    }

    /**
     * Tampilkan form untuk mengedit data jenis.
     */
    public function edit($id)
    {
        // Cari jenis berdasarkan ID
        $jenis = Jenis::findOrFail($id);

        return view('admin.jeniscreate', compact('jenis')); // Sesuaikan dengan folder view Anda
    }

    /**
     * Update data jenis di database.
     */
    public function update(Request $request, $id)
    {
        // Validasi data
        $validatedData = $request->validate([
            'nama_jenis' => 'required|string|max:255',
        ]);

        // Cari jenis berdasarkan ID dan update datanya
        $jenis = Jenis::findOrFail($id);
        $jenis->update($validatedData);

        // Redirect ke halaman daftar jenis
        return redirect()->route('jenis.index')->with('success', 'Jenis berhasil diperbarui.');
    }

    /**
     * Hapus data jenis dari database.
     */
    public function destroy($id)
    {
        // Cari jenis berdasarkan ID dan hapus datanya
        $jenis = Jenis::findOrFail($id);
        $jenis->delete();

        // Redirect ke halaman daftar Jenis
        return redirect()->route('jenis.index')->with('success', 'Jenis berhasil dihapus.');
    }
}
