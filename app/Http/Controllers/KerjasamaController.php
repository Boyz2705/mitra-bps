<?php

namespace App\Http\Controllers;

use App\Models\Kerjasama;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KerjasamaController extends Controller
{
    public function index()
    {
        $kerjasama = Kerjasama::with(['user', 'mitra', 'kecamatan', 'survey', 'subsurvey1', 'subsurvey2', 'jenis'])
            ->orderBy('date', 'desc')
            ->get();

        return view('admin.kerjasama', [
            'kerjasama' => $kerjasama,
        ]);
    }

    public function create()
    {
        // Logic to show the form for creating a new Kerjasama
    }

    public function store(Request $request)
    {
        Kerjasama::create($request->validate([
            'user_id' => 'required|exists:users,id',
            'mitra_id' => 'required|exists:mitras,id',
            'kecamatan_id' => 'required|exists:kecamatans,id',
            'survey_id' => 'required|exists:surveys,id',
            'subsurvey1_id' => 'required|exists:subsurvey1s,id',
            'subsurvey2_id' => 'required|exists:subsurvey2s,id',
            'jenis_id' => 'required|exists:jenis,id',
            'date' => 'required|date',
            'honor' => 'required|integer',
            'bulan' => 'required|string',
        ]));

        return redirect()->route('kerjasama.index')->with('status', 'Kerjasama created successfully.');
    }

    public function show(Kerjasama $kerjasama)
    {
        return view('admin.kerjasama_show', [
            'kerjasama' => $kerjasama,
        ]);
    }

    public function edit(Kerjasama $kerjasama)
    {
        return view('admin.kerjasama_edit', [
            'kerjasama' => $kerjasama,
        ]);
    }

    public function update(Request $request, Kerjasama $kerjasama)
    {
        $kerjasama->update($request->validate([
            'user_id' => 'required|exists:users,id',
            'mitra_id' => 'required|exists:mitras,id',
            'kecamatan_id' => 'required|exists:kecamatans,id',
            'survey_id' => 'required|exists:surveys,id',
            'subsurvey1_id' => 'required|exists:subsurvey1s,id',
            'subsurvey2_id' => 'required|exists:subsurvey2s,id',
            'jenis_id' => 'required|exists:jenis,id',
            'date' => 'required|date',
            'honor' => 'required|integer',
            'bulan' => 'required|string',
        ]));

        return redirect()->route('kerjasama.index')->with('status', 'Kerjasama updated successfully.');
    }

    public function destroy(Kerjasama $kerjasama)
    {
        $kerjasama->delete();
        return redirect()->route('kerjasama.index')->with('statusdel', 'Kerjasama deleted successfully.');
    }
}
