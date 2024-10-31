@extends('layouts.app2')

@section('title', 'Form Tambah Kerjasama')

@section('content')

<div class="container mt-2">
    @auth
        <h2 class="text-center mb-4"><strong>Mulai Kerjasama</strong></h2>
        <form id="kerjasamaForm" method="POST" action="{{ route('mulaikerjasama.store') }}">
            @csrf
            <table class="table table-bordered">
                <tr>
                    <th>User</th>
                    <td>
                        <select name="user_id" class="form-select" required>
                            <option value="{{ Auth::user()->id }}">{{ Auth::user()->name }}</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <th>Mitra</th>
                    <td>
                        <select name="mitra_id" class="form-select select2" required>
                            <option value="">Select Mitra</option>
                            @foreach($mitras as $mitra)
                                <option value="{{ $mitra->id }}">{{ $mitra->nama_mitra }}</option>
                            @endforeach
                        </select>
                    </td>
                </tr>
                <tr>
                    <th>Kecamatan</th>
                    <td>
                        <select name="kecamatan_id" class="form-select select2" required>
                            <option value="">Select Kecamatan</option>
                            @foreach($kecamatans as $kecamatan)
                                <option value="{{ $kecamatan->id }}">{{ $kecamatan->nama_kecamatan }}</option>
                            @endforeach
                        </select>
                    </td>
                </tr>
                <tr>
                    <th>Survey</th>
                    <td>
                        <select name="survey_id" id="survey_id" class="form-select" required>
                            <option value="" disabled selected>Pilih Survey</option>
                            @foreach($surveys as $survey)
                                <option value="{{ $survey->id }}">{{ $survey->nama_survey }}</option>
                            @endforeach
                        </select>
                    </td>
                </tr>
                <tr>
                    <th>Subsurvey 1</th>
                    <td>
                        <select name="subsurvey1_id" id="subsurvey1_id" class="form-select" required>
                            <option value="" disabled selected>Pilih Subsurvey 1</option>
                            @foreach($subsurvey1s as $subsurvey1)
                                <option value="{{ $subsurvey1->id }}">{{ $subsurvey1->nama_subsurvey }}</option>
                            @endforeach
                        </select>
                    </td>
                </tr>
                <tr>
                    <th>Subsurvey 2</th>
                    <td>
                        <select name="subsurvey2_id" id="subsurvey2_id" class="form-select" required>
                            <option value="" disabled selected>Pilih Subsurvey 2</option>
                            @foreach($subsurvey2s as $subsurvey2)
                                <option value="{{ $subsurvey2->id }}">{{ $subsurvey2->nama_subsurvey2s }}</option>
                            @endforeach
                        </select>
                    </td>
                </tr>
                <tr>
                    <th>Jenis</th>
                    <td>
                        <select name="jenis_id" class="form-select" required>
                            @foreach($jenis as $j)
                                <option value="{{ $j->id }}">{{ $j->nama_jenis }}</option>
                            @endforeach
                        </select>
                    </td>
                </tr>
                <tr>
                    <th>Periode Pelaksanaan</th>
                    <td>
                        <select id="periode-select" name="periode" class="form-select" required onchange="showOptions()">
                            <option value="">Pilih Periode</option>
                            <option value="Bulan">Bulan</option>
                            <option value="Triwulan">Triwulan</option>
                        </select>

                        <select id="bulan-select" name="bulan" class="form-select mt-2" style="display: none;">
                            <option value="Januari">Januari</option>
                            <option value="Februari">Februari</option>
                            <option value="Maret">Maret</option>
                            <option value="April">April</option>
                            <option value="Mei">Mei</option>
                            <option value="Juni">Juni</option>
                            <option value="Juli">Juli</option>
                            <option value="Agustus">Agustus</option>
                            <option value="September">September</option>
                            <option value="Oktober">Oktober</option>
                            <option value="November">November</option>
                            <option value="Desember">Desember</option>
                        </select>

                        <select id="triwulan-select" name="bulan" class="form-select mt-2" style="display: none;">
                            <option value="Jan-Mar">Jan-Mar</option>
                            <option value="Apr-Jun">Apr-Jun</option>
                            <option value="Jul-Sep">Jul-Sep</option>
                            <option value="Okt-Des">Okt-Des</option>
                        </select>
                    </td>
                </tr>

                <tr>
                    <th>Honor</th>
                    <td>
                        <input id="formatted_honor" type="text" class="form-control" required>
                        <input id="honor" name="honor" type="hidden">
                    </td>
                </tr>
                <tr>
                    <th>Tanggal Bayar</th>
                    <td>
                        <input name="date" type="date" class="form-control" required>
                    </td>
                </tr>

                <tr>
                    <td colspan="2" class="text-center">
                        <button type="submit" class="btn btn-success">Submit</button>
                    </td>
                </tr>
            </table>
        </form>
    @else
        <h2>Anda Harus Login Terlebih Dahulu</h2>
        <a href="{{ route('login') }}"><button class="btn btn-primary">Login</button></a>
    @endauth
</div>

<div class="mb-4"></div>

<script>
    document.getElementById('kerjasamaForm').addEventListener('submit', function(e) {
        e.preventDefault();

        const formattedHonor = document.getElementById('formatted_honor').value;
        document.getElementById('honor').value = formattedHonor.replace(/\D/g, '');

        let formData = new FormData(this);

        fetch("{{ route('mulaikerjasama.store') }}", {
            method: 'POST',
            body: formData,
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                'Accept': 'application/json'
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data.warning) {
                if (confirm(data.message)) {
                    // User memilih untuk melanjutkan
                    formData.append('confirm', 'true');
                    return fetch("{{ route('mulaikerjasama.store') }}", {
                        method: 'POST',
                        body: formData,
                        headers: {
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                            'Accept': 'application/json'
                        }
                    });
                } else {
                    // User memilih untuk tidak melanjutkan
                    return Promise.reject('User cancelled');
                }
            } else {
                // Tidak ada warning, proses normal
                return Promise.resolve(data);
            }
        })
        .then(data => {
            if (data.success) {
                // Tampilkan notifikasi atau pesan sukses di halaman
                let successMessage = document.createElement('div');
                successMessage.className = 'alert alert-success';
                successMessage.textContent = data.message;
                document.getElementById('kerjasamaForm').after(successMessage);

                // Redirect otomatis setelah 1 detik
                setTimeout(function() {
                    window.location.href = "{{ route('kerjasamaku.index') }}";
                }, 1000);
            } else {
                // Tangani jika data.success tidak ada
                let errorMessage = document.createElement('div');
                errorMessage.className = 'alert alert-danger';
                errorMessage.textContent = data.message || 'Terjadi kesalahan.';
                document.getElementById('kerjasamaForm').after(errorMessage);
            }
        })
        .catch(error => {
            console.error('Error:', error);
        });
    });
</script>


<script>
document.getElementById('formatted_honor').addEventListener('input', function(e) {
    let value = e.target.value;

    // Hapus semua karakter non-digit (kecuali angka)
    value = value.replace(/\D/g, '');

    // Tambahkan titik sebagai pemisah ribuan
    value = value.replace(/\B(?=(\d{3})+(?!\d))/g, '.');

    // Tampilkan hasil terformat ke dalam input 'formatted_honor'
    e.target.value = value;

    // Simpan nilai asli (tanpa titik) ke dalam input tersembunyi 'honor'
    document.getElementById('honor').value = value.replace(/\./g, '');
});
</script>

<script>
    function showOptions() {
        const periodeSelect = document.getElementById('periode-select');
        const bulanSelect = document.getElementById('bulan-select');
        const triwulanSelect = document.getElementById('triwulan-select');

        if (periodeSelect.value === "Bulan") {
            bulanSelect.style.display = "block";
            triwulanSelect.style.display = "none";
        } else if (periodeSelect.value === "Triwulan") {
            triwulanSelect.style.display = "block";
            bulanSelect.style.display = "none";
        } else {
            bulanSelect.style.display = "none";
            triwulanSelect.style.display = "none";
        }
    }
    </script>
@endsection
