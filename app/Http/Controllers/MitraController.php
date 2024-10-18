<?php

namespace App\Http\Controllers;

use App\Models\Mitra;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\MitrasImport;
use Maatwebsite\Excel\Validators\ValidationException;

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
    public function index2()
    {
        // Ambil semua data mitra dari database
        $mitras = Mitra::all();

        // Kirim data ke view
        return view('mitra', compact('mitras'));
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
            'jenis_kelamin' => 'required|string|max:255', // Validasi untuk jenis kelamin
            'email' => 'required|email|unique:mitras,email',
            'posisi' => 'nullable|string|max:255',
            'kinerja' => 'nullable|string|max:255',
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
        // Cari mitra berdasarkan ID
        $mitra = Mitra::findOrFail($id);

        // Validasi data
        $validatedData = $request->validate([
            'nama_mitra' => 'required|string|max:255',
            'sobat_id' => 'nullable|string|max:255',
            'satker' => 'nullable|string|max:255',
            'kecamatan' => 'nullable|string|max:255',
            'kelurahan' => 'nullable|string|max:255',
            'jenis_kelamin' => 'required|string|max:255', // Validasi untuk jenis kelamin
            'email' => 'required|email|unique:mitras,email,' . $mitra->id, // Memperbolehkan email yang sama
            'posisi' => 'nullable|string|max:255',
            'kinerja' => 'nullable|string|max:255',
        ]);

        // Update data mitra
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

    public function showImportForm()
    {
        return view('mitras.import');
    }

    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls',
        ]);

        $file = $request->file('file');

        try {
            Excel::import(new MitrasImport, $file);
            return redirect()->back()->with('success', 'Data berhasil diimpor.');
        } catch (ValidationException $e) {
            $failures = $e->failures();
            $errors = [];
            foreach ($failures as $failure) {
                $errors[] = "Baris {$failure->row()}: {$failure->errors()[0]}";
            }
            return redirect()->back()->withErrors($errors);
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }
}
