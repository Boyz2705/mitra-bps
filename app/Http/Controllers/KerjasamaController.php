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
use App\Models\MitraSasaranPivot;
use Illuminate\Support\Facades\DB;

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

public function index3()
{
    // Ambil user yang sedang login
    $userId = Auth::id();

    // Filter kerjasama berdasarkan user yang login
    $kerjasama = Kerjasama::with(['user', 'mitra', 'kecamatan', 'survey','subsurvey1','subsurvey2'])
        ->where('user_id', $userId) // Filter berdasarkan user_id
        ->orderBy('date', 'desc')
        ->get();

    // Ambil data terkait lainnya
    $mitras = Mitra::all();
    $kecamatans = Kecamatan::all();
    $surveys = Survey::all();
    $subsurvey1s = Subsurvey1::all(); // Subsurvey1
    $subsurvey2s = Subsurvey2::all(); // Subsurvey2
    $jenis = Jenis::all(); // Jenis

    return view('kerjasamaku', compact('kerjasama', 'mitras', 'kecamatans', 'surveys', 'subsurvey1s', 'subsurvey2s', 'jenis'));
}

public function index5()
{
    $mitras = Mitra::all();
    $kecamatans = Kecamatan::all();
    $surveys = Survey::all();
    $subsurvey1s = Subsurvey1::all();
    $subsurvey2s = Subsurvey2::all();
    $jenis = Jenis::all();

    return view('welcome', compact('mitras', 'kecamatans', 'surveys', 'subsurvey1s', 'subsurvey2s', 'jenis'));
}


public function index4()
{
    $kerjasama = Kerjasama::with(['user', 'mitra', 'kecamatan', 'survey','subsurvey1','subsurvey2'])->orderBy('date', 'desc')->get();
    $users = User::all();
    $mitras = Mitra::all();
    $kecamatans = Kecamatan::all();
    $surveys = Survey::all();
    $subsurvey1s = Subsurvey1::all(); // Subsurvey1
    $subsurvey2s = Subsurvey2::all(); // Subsurvey2
    $jenis = Jenis::all(); // Jenis

    return view('kerjasamaorg', compact('kerjasama', 'mitras', 'kecamatans', 'surveys', 'subsurvey1s', 'subsurvey2s', 'jenis'));
}

// Example: KerjasamaController.php

public function index2()
{
    $kerjasama = Kerjasama::with(['user', 'mitra', 'kecamatan', 'survey', 'subsurvey1', 'subsurvey2'])
        ->orderBy('date', 'desc')
        ->get();

    $users = User::all();
    $mitras = Mitra::all();
    $kecamatans = Kecamatan::all();
    $surveys = Survey::all();
    $subsurvey1s = Subsurvey1::all();
    $subsurvey2s = Subsurvey2::all();
    $jenis = Jenis::all();

    // Fetch Kerjasama tidak tepat sasaran
    $currentYear = date('Y');
    $kerjasamaTidakTepatSasaran = DB::table('kerjasamas')
        ->select(
            'kerjasamas.id', // Include the primary key
            'kerjasamas.mitra_id',
            'kerjasamas.date',
            'kerjasamas.honor',
            'mitras.nama_mitra as mitra_name'
        )
        ->join('mitras', 'kerjasamas.mitra_id', '=', 'mitras.id')
        ->whereYear('kerjasamas.date', $currentYear)
        ->groupBy(
            'kerjasamas.id', // Include all non-aggregated columns
            'kerjasamas.mitra_id',
            'kerjasamas.date',
            'kerjasamas.honor',
            'mitras.nama_mitra'
        )
        ->havingRaw('SUM(kerjasamas.honor) > ?', [4000000])
        ->get();

    return view('kerjasama.index2', compact(
        'kerjasama', // Corrected from 'kerjasamas' to 'kerjasama'
        'mitras',
        'kecamatans',
        'surveys',
        'subsurvey1s',
        'subsurvey2s',
        'jenis',
        'kerjasamaTidakTepatSasaran'
    ));
}


    public function create()
    {
        // Logic to show the form for creating a new Kerjasama
    }

    public function store(Request $request)
    {
        $data = $request->validate([
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
        ]);

        $kerjasama = Kerjasama::create($data);

        $this->updateMitraSasaranPivot($kerjasama);

        return redirect()->route('kerjasama.index')->with('status', 'Kerjasama created successfully.');
    }

    public function storeuser(Request $request)
{
    $data = $request->validate([
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
    ]);

    // Check if mitra is already used in the current month
    $currentMonth = date('Y-m');
    $existingKerjasama = Kerjasama::where('mitra_id', $data['mitra_id'])
        ->whereRaw("DATE_FORMAT(date, '%Y-%m') = ?", [$currentMonth])
        ->first();

    if ($existingKerjasama) {
        $user = User::find($existingKerjasama->user_id);
        return response()->json([
            'warning' => true,
            'message' => "Mitra sudah dipakai pada bulan ini oleh {$user->name}. Apakah Anda ingin melanjutkan?",
            'data' => $data
        ]);
    }

    // If mitra is not used or user confirms, create the kerjasama
    $kerjasama = Kerjasama::create($data);
    $this->updateMitraSasaranPivot($kerjasama);

    return response()->json([
        'success' => true,
        'message' => 'Kerjasama created successfully.',
        'redirect' => route('kerjasama.index')
    ]);
}


    public function show(Kerjasama $kerjasama)
    {
        return view('admin.kerjasama_show', [
            'kerjasama' => $kerjasama,
        ]);
    }

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
    $this->updateMitraSasaranPivot($kerjasama);
    // Redirect dengan pesan sukses
    return redirect()->route('kerjasama.index')->with('success', 'Kerjasama updated successfully.');
}



public function destroy($id)
{

    $kerjasama = Kerjasama::findOrFail($id);
    $kerjasama->delete();
    $this->updateMitraSasaranPivot($kerjasama);
    return redirect()->route('kerjasama.index')->with('statusdel', 'Kerjasama deleted successfully.');
}


    public function kerjasama()
{
    // Ambil semua data kerjasama untuk user yang sedang login
    $kerjasama = Kerjasama::with(['mitra', 'kecamatan', 'survey', 'subsurvey1', 'subsurvey2'])
        ->where('user_id', Auth::id()) // Filter berdasarkan user yang sedang login
        ->orderBy('date', 'desc') // Urutkan berdasarkan tanggal
        ->get();

    // Kembalikan view dengan data kerjasama
    return view('mykerjasama', [
        'kerjasama' => $kerjasama,

    ]);
}

public function pivotReport(Request $request)
{
    $year = $request->input('year', date('Y'));

    // Dapatkan data mitra berdasarkan tahun
    $mitraData = MitraSasaranPivot::where('tahun', $year)
        ->selectRaw('mitra_id, bulan, tepat_sasaran, SUM(total_honor) as total_honor')
        ->groupBy('mitra_id', 'bulan', 'tepat_sasaran')
        ->get();

    // Pivot data untuk menyimpan hasil
    $pivotData = [
        1 => ['count' => 0, 'total_honor' => 0], // Tepat sasaran
        0 => ['count' => 0, 'total_honor' => 0]  // Tidak tepat sasaran
    ];

    // Kumpulkan data setiap mitra per bulan
    $mitraSasaran = [];

    foreach ($mitraData as $data) {
        if (!isset($mitraSasaran[$data->mitra_id])) {
            $mitraSasaran[$data->mitra_id] = ['tepat_sasaran' => true, 'total_honor' => 0];
        }

        // Cek apakah bulan tertentu total honor lebih dari 4 juta (tidak tepat sasaran)
        if ($data->total_honor > 4000000) {
            $mitraSasaran[$data->mitra_id]['tepat_sasaran'] = false; // Tidak tepat sasaran
        }

        // Tambahkan total honor untuk mitra ini
        $mitraSasaran[$data->mitra_id]['total_honor'] += $data->total_honor;
    }

    // Proses data untuk hitung jumlah tepat/tidak tepat sasaran
    foreach ($mitraSasaran as $mitra) {
        if ($mitra['tepat_sasaran']) {
            $pivotData[1]['count']++;
            $pivotData[1]['total_honor'] += $mitra['total_honor'];
        } else {
            $pivotData[0]['count']++;
            $pivotData[0]['total_honor'] += $mitra['total_honor'];
        }
    }

    // Kembalikan ke view
    return view('kerjasama.pivot_report', compact('pivotData', 'year'));
}

public function pivotMonthlyReport(Request $request)
{
    $year = $request->input('year', date('Y'));
    $month = $request->input('month', null); // Pastikan ini ada

    // Dapatkan data mitra berdasarkan tahun dan bulan jika bulan dipilih
    $query = MitraSasaranPivot::where('tahun', $year);

    if ($month) {
        $query->where('bulan', $month);
    }

    $mitraData = $query
        ->selectRaw('mitra_id, bulan, tepat_sasaran, SUM(total_honor) as total_honor')
        ->groupBy('mitra_id', 'bulan', 'tepat_sasaran')
        ->get();

    // Pivot data untuk menyimpan hasil
    $pivotDataMonthly = [
        1 => ['count' => 0, 'total_honor' => 0], // Tepat sasaran
        0 => ['count' => 0, 'total_honor' => 0]  // Tidak tepat sasaran
    ];

    // Kumpulkan data setiap mitra per bulan
    $mitraSasaran = [];

    foreach ($mitraData as $data) {
        if (!isset($mitraSasaran[$data->mitra_id])) {
            $mitraSasaran[$data->mitra_id] = ['tepat_sasaran' => true, 'total_honor' => 0];
        }

        // Cek apakah total honor lebih dari 4 juta (tidak tepat sasaran)
        if ($data->total_honor > 4000000) {
            $mitraSasaran[$data->mitra_id]['tepat_sasaran'] = false; // Tidak tepat sasaran
        }

        // Tambahkan total honor untuk mitra ini
        $mitraSasaran[$data->mitra_id]['total_honor'] += $data->total_honor;
    }

    // Proses data untuk hitung jumlah tepat/tidak tepat sasaran
    foreach ($mitraSasaran as $mitra) {
        if ($mitra['tepat_sasaran']) {
            $pivotDataMonthly[1]['count']++;
            $pivotDataMonthly[1]['total_honor'] += $mitra['total_honor'];
        } else {
            $pivotDataMonthly[0]['count']++;
            $pivotDataMonthly[0]['total_honor'] += $mitra['total_honor'];
        }
    }

    // Kembalikan ke view
    return view('kerjasama.pivot_report', compact('pivotDataMonthly', 'year', 'month'));
}


private function updateMitraSasaranPivot(Kerjasama $kerjasama)
{
    $year = date('Y', strtotime($kerjasama->date));
    $month = date('m', strtotime($kerjasama->date));

    $totalHonor = Kerjasama::where('mitra_id', $kerjasama->mitra_id)
        ->whereYear('date', $year)
        ->whereMonth('date', $month)
        ->sum('honor');

    MitraSasaranPivot::updateOrCreate(
        ['mitra_id' => $kerjasama->mitra_id, 'tahun' => $year, 'bulan' => $month],
        [
            'tepat_sasaran' => $totalHonor <= 4000000,
            'total_honor' => $totalHonor
        ]
    );
}

}
