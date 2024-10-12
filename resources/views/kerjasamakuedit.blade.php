@extends('layouts.app')

@section('title', 'Edit Kerjasamaku')

@section('content')
    <h2 class="text-center mb-4"><strong>Edit Kerjasamaku</strong></h2>
    <div class="border-custom mb-4"></div>

    {{-- Alert jika berhasil --}}
    @if(session('success'))
        <div class="alert alert-success mb-4">
            {{ session('success') }}
        </div>
    @endif

    <form method="POST" action="{{ route('kerjasamaku.update', $kerjasama->id) }}">
        @csrf
        @method('PUT') {{-- Gunakan metode PUT untuk update data --}}

        <div class="row g-3">
            <div class="col-md-6">
                <label class="form-label">Mitra</label>
                <select name="mitra_id" class="form-select" required>
                    @foreach($mitras as $mitra)
                        <option value="{{ $mitra->id }}" {{ $kerjasama->mitra_id == $mitra->id ? 'selected' : '' }}>
                            {{ $mitra->nama_mitra }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="col-md-6">
                <label class="form-label">Kecamatan</label>
                <select name="kecamatan_id" class="form-select" required>
                    @foreach($kecamatans as $kecamatan)
                        <option value="{{ $kecamatan->id }}" {{ $kerjasama->kecamatan_id == $kecamatan->id ? 'selected' : '' }}>
                            {{ $kecamatan->nama_kecamatan }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="col-md-6">
                <label class="form-label">Survey</label>
                <select name="survey_id" id="survey_id" class="form-select" required>
                    @foreach($surveys as $survey)
                        <option value="{{ $survey->id }}" {{ $kerjasama->survey_id == $survey->id ? 'selected' : '' }}>
                            {{ $survey->nama_survey }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="col-md-6">
                <label class="form-label">Subsurvey 1</label>
                <select name="subsurvey1_id" id="subsurvey1_id" class="form-select">
                    @foreach($subsurvey1s as $subsurvey1)
                        <option value="{{ $subsurvey1->id }}" {{ $kerjasama->subsurvey1_id == $subsurvey1->id ? 'selected' : '' }}>
                            {{ $subsurvey1->nama_subsurvey }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="col-md-6">
                <label class="form-label">Subsurvey 2</label>
                <select name="subsurvey2_id" id="subsurvey2_id" class="form-select">
                    @foreach($subsurvey2s as $subsurvey2)
                        <option value="{{ $subsurvey2->id }}" {{ $kerjasama->subsurvey2_id == $subsurvey2->id ? 'selected' : '' }}>
                            {{ $subsurvey2->nama_subsurvey2s }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="col-md-6">
                <label class="form-label">Jenis</label>
                <select name="jenis_id" class="form-select" required>
                    @foreach($jenis as $j)
                        <option value="{{ $j->id }}" {{ $kerjasama->jenis_id == $j->id ? 'selected' : '' }}>
                            {{ $j->nama_jenis }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="col-md-6">
                <label class="form-label">Tanggal</label>
                <input name="date" type="date" class="form-control" value="{{ $kerjasama->date }}" required>
            </div>

            <div class="col-md-6">
                <label class="form-label">Honor</label>
                <input id="formatted_honor" type="text" class="form-control" value="{{ number_format($kerjasama->honor, 0, ',', '.') }}" required>
                <input id="honor" name="honor" type="hidden" value="{{ $kerjasama->honor }}">
            </div>

            <div class="col-md-6">
                <label class="form-label">Periode</label>
                <select name="bulan" class="form-select" required>
                    <option value="Bulan" {{ $kerjasama->bulan == 'Bulan' ? 'selected' : '' }}>Bulan</option>
                    <option value="Triwulan" {{ $kerjasama->bulan == 'Triwulan' ? 'selected' : '' }}>Triwulan</option>
                </select>
            </div>
        </div>

        <button type="submit" class="btn btn-success mt-3">Update</button>
    </form>

    @push('scripts')
        <script>
            const formattedHonorInput = document.getElementById('formatted_honor');
            const honorInput = document.getElementById('honor');

            formattedHonorInput.addEventListener('input', function(e) {
                let value = e.target.value.replace(/[^,\d]/g, '').toString(); // Hanya ambil angka

                if (value) {
                    // Format rupiah
                    let formattedValue = formatRupiah(value);
                    e.target.value = formattedValue;
                } else {
                    e.target.value = '';
                }

                // Simpan nilai asli ke hidden input
                honorInput.value = value;
            });

            function formatRupiah(value) {
                let numberString = value.replace(/[^,\d]/g, '').toString(),
                    split = numberString.split(','),
                    sisa = split[0].length % 3,
                    rupiah = split[0].substr(0, sisa),
                    ribuan = split[0].substr(sisa).match(/\d{3}/gi);

                if (ribuan) {
                    let separator = sisa ? '.' : '';
                    rupiah += separator + ribuan.join('.');
                }

                return rupiah;
            }
        </script>
    @endpush
@endsection
