<?php

namespace App\Http\Controllers;

use App\Models\Survey;
use Illuminate\Http\Request;

class SurveyController extends Controller
{
    public function index()
    {
        $surveys = Survey::all();
        return view('surveys.index', compact('surveys'));
    }

    public function create()
    {
        return view('surveys.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_survey' => 'required|string|max:255',
        ]);

        Survey::create($request->all());
        return redirect()->route('surveys.index')->with('success', 'Survey berhasil dibuat');
    }

    public function edit($id)
{
    // Gunakan findOrFail untuk mencari survey dengan ID
    $survey = Survey::findOrFail($id);
    return view('surveys.edit', compact('survey'));
}

public function update(Request $request, $id)
{
    // Validasi input
    $request->validate([
        'nama_survey' => 'required|string|max:255',
    ]);

    // Cari survey berdasarkan ID
    $survey = Survey::findOrFail($id);

    // Update survey dengan data baru
    $survey->update([
        'nama_survey' => $request->input('nama_survey'),
    ]);

    // Redirect kembali ke halaman index dengan pesan sukses
    return redirect()->route('surveys.index')->with('success', 'Survey berhasil diperbarui');
}



    public function destroy($id)
    {
    $survey = Survey::findOrFail($id); // Pastikan ID ditemukan
    $survey->delete(); // Hapus survey dari database

    return redirect()->route('surveys.index')->with('success', 'Survey berhasil dihapus');
    }
}
