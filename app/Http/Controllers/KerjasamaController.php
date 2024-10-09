<?php

namespace App\Http\Controllers;

use App\Models\Jenis;
use App\Models\Kerjasama;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Mitra;
use App\Models\Kecamatan;
use App\Models\Subsurvey1;
use App\Models\Subsurvey2;
use App\Models\Survey;
use App\Models\User;

class KerjasamaController extends Controller
{
    public function index()
{
    $kerjasama = Kerjasama::with(['user', 'mitra', 'kecamatan', 'survey','subsurvey1','subsurvey2'])->orderBy('date', 'desc')->get();
    $users = User::all();
    $mitras = Mitra::all();
    $kecamatans = Kecamatan::all();
    $surveys = Survey::all();
    $subsurvey1s = Subsurvey1::all(); // Subsurvey1
    $subsurvey2s = Subsurvey2::all(); // Subsurvey2
    $jenis = Jenis::all(); // Jenis

    return view('kerjasama.index', compact('kerjasama', 'mitras', 'kecamatans', 'surveys', 'subsurvey1s', 'subsurvey2s', 'jenis'));
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

    // KerjasamaController.php

public function edit($id)
{
    $kerjasama = Kerjasama::findOrFail($id);
    $users = User::all();
    $mitras = Mitra::all();
    $kecamatans = Kecamatan::all();
    $surveys = Survey::all();
    $subsurvey1s = Subsurvey1::all();
    $subsurvey2s = Subsurvey2::all();
    $jenis = Jenis::all();

    return view('kerjasama.edit', compact('kerjasama', 'users', 'mitras', 'kecamatans', 'surveys', 'subsurvey1s', 'subsurvey2s', 'jenis'));
}

public function update(Request $request, $id)
{
    $kerjasama = Kerjasama::findOrFail($id); // Load model berdasarkan ID

    // Lakukan validasi data
    $data = $request->validate([
        'user_id' => 'required|exists:users,id',
        'mitra_id' => 'required|exists:mitras,id',
        'kecamatan_id' => 'required|exists:kecamatans,id',
        'survey_id' => 'required|exists:surveys,id',
        'subsurvey1_id' => 'nullable|exists:subsurvey1s,id',
        'subsurvey2_id' => 'nullable|exists:subsurvey2s,id',
        'jenis_id' => 'required|exists:jenis,id',
        'date' => 'required|date',
        'honor' => 'required|integer',
        'bulan' => 'required|string|in:bulan,triwulan',
    ]);

    // Update model dengan data yang divalidasi
    $kerjasama->update($data);

    // Redirect dengan pesan sukses
    return redirect()->route('kerjasama.index')->with('success', 'Kerjasama updated successfully.');
}

public function destroy($id)
{

    $kerjasama = Kerjasama::findOrFail($id);
    $kerjasama->delete();

    return redirect()->route('kerjasama.index')->with('statusdel', 'Kerjasama deleted successfully.');
}
}
