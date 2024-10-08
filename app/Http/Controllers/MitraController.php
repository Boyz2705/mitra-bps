<?php

namespace App\Http\Controllers;

use App\Models\Mitra;
use Illuminate\Http\Request;

class MitraController extends Controller
{
    /**
     * Tampilkan daftar mitra.
     */
    public function index()
    {
        // Ambil semua data mitra dari database
        $mitras = Mitra::all();

        // Kirim data ke view
        return view('mitra.index', compact('mitras'));
    }

    /**
     * Tampilkan form untuk membuat mitra baru.
     */
    public function create()
    {
        return view('mitra.create');
    }

    /**
     * Simpan data mitra baru ke database.
     */
    public function store(Request $request)
    {
        // Validasi data
        $validatedData = $request->validate([
            'nama_mitra' => 'required|string|max:255',
            'sobat_id' => 'nullable|string|max:255',
            'satker' => 'nullable|string|max:255',
            'kecamatan' => 'nullable|string|max:255',
            'kelurahan' => 'nullable|string|max:255',
            'L, P' => 'required|string|in:L,P',
            'email' => 'required|email|unique:mitras,email',
            'posisi' => 'nullable|string|max:255',
        ]);

        // Buat mitra baru
        Mitra::create($validatedData);

        // Redirect ke halaman daftar mitra
        return redirect()->route('mitra.index')->with('success', 'Mitra berhasil ditambahkan.');
    }

    /**
     * Tampilkan detail mitra tertentu.
     */
    public function show($id)
    {
        // Cari mitra berdasarkan ID
        $mitra = Mitra::findOrFail($id);

        return view('mitra.show', compact('mitra'));
    }

    /**
     * Tampilkan form untuk mengedit data mitra.
     */
    public function edit($id)
    {
        // Cari mitra berdasarkan ID
        $mitra = Mitra::findOrFail($id);

        return view('mitra.edit', compact('mitra'));
    }

    /**
     * Update data mitra di database.
     */
    public function update(Request $request, $id)
    {
        // Validasi data
        $validatedData = $request->validate([
            'nama_mitra' => 'required|string|max:255',
            'sobat_id' => 'nullable|string|max:255',
            'satker' => 'nullable|string|max:255',
            'kecamatan' => 'nullable|string|max:255',
            'kelurahan' => 'nullable|string|max:255',
            'L, P' => 'required|string|in:L,P',
            'email' => 'required|email|unique:mitras,email,' . $id,
            'posisi' => 'nullable|string|max:255',
        ]);

        // Cari mitra berdasarkan ID dan update datanya
        $mitra = Mitra::findOrFail($id);
        $mitra->update($validatedData);

        // Redirect ke halaman daftar mitra
        return redirect()->route('mitra.index')->with('success', 'Data mitra berhasil diperbarui.');
    }

    /**
     * Hapus data mitra dari database.
     */
    public function destroy($id)
    {
        // Cari mitra berdasarkan ID dan hapus datanya
        $mitra = Mitra::findOrFail($id);
        $mitra->delete();

        // Redirect ke halaman daftar mitra
        return redirect()->route('mitra.index')->with('success', 'Mitra berhasil dihapus.');
    }
}
