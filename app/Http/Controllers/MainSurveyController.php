<?php

namespace App\Http\Controllers;

use App\Models\MainSurvey;
use Illuminate\Http\Request;

class MainSurveyController extends Controller
{
    public function index()
    {
        $mainsurveys = MainSurvey::all();
        return view('mainsurveys.index', compact('mainsurveys'));
    }

    public function create()
    {
        return view('mainsurveys.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_survey' => 'required|string|max:255',
        ]);

        MainSurvey::create($request->all());
        return redirect()->route('mainsurveys.index')->with('success', 'Main Survey berhasil dibuat');
    }

    public function edit($id)
{
    // Gunakan findOrFail untuk mencari survey dengan ID
    $mainsurvey = MainSurvey::findOrFail($id);
    return view('mainsurveys.edit', compact('mainsurvey'));
}

public function update(Request $request, $id)
{
    // Validasi input
    $request->validate([
        'nama_survey' => 'required|string|max:255',
    ]);

    // Cari survey berdasarkan ID
    $mainsurvey = MainSurvey::findOrFail($id);

    // Update survey dengan data baru
    $mainsurvey->update([
        'nama_survey' => $request->input('nama_survey'),
    ]);

    // Redirect kembali ke halaman index dengan pesan sukses
    return redirect()->route('mainsurveys.index')->with('success', 'Main Survey berhasil diperbarui');
}



    public function destroy($id)
    {
    $mainsurvey = MainSurvey::findOrFail($id); // Pastikan ID ditemukan
    $mainsurvey->delete(); // Hapus survey dari database

    return redirect()->route('mainsurveys.index')->with('success', 'Main Survey berhasil dihapus');
    }
}
