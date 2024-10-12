@extends('layouts.app')

@section('title', 'Edit Kerjasamaku')

@section('content')
<div class="container py-5">
    <h2 class="text-center mb-4 fw-bold">Edit Kerjasamaku</h2>
    <div class="border-bottom border-3 border-primary w-25 mx-auto mb-5"></div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show mb-4" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if($errors->any())
        <div class="alert alert-danger alert-dismissible fade show mb-4" role="alert">
            <ul class="mb-0">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="card shadow-sm">
        <div class="card-body p-4">
            <form method="POST" action="{{ route('kerjasamaku.update', $kerjasama->id) }}">
                @csrf
                @method('PUT')

                <div class="row g-4">
                    <div class="col-md-6">
                        <label class="form-label fw-bold">User</label>
                        <select name="user_id" class="form-select" required>
                            <option value="{{ Auth::user()->id }}">{{ Auth::user()->name }}</option>
                        </select>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label fw-bold">Mitra</label>
                        <select name="mitra_id" class="form-select" required>
                            @foreach($mitras as $mitra)
                                <option value="{{ $mitra->id }}" {{ $kerjasama->mitra_id == $mitra->id ? 'selected' : '' }}>
                                    {{ $mitra->nama_mitra }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label fw-bold">Kecamatan</label>
                        <select name="kecamatan_id" class="form-select" required>
                            @foreach($kecamatans as $kecamatan)
                                <option value="{{ $kecamatan->id }}" {{ $kerjasama->kecamatan_id == $kecamatan->id ? 'selected' : '' }}>
                                    {{ $kecamatan->nama_kecamatan }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label fw-bold">Survey</label>
                        <select name="survey_id" id="survey_id" class="form-select" required>
                            @foreach($surveys as $survey)
                                <option value="{{ $survey->id }}" {{ $kerjasama->survey_id == $survey->id ? 'selected' : '' }}>
                                    {{ $survey->nama_survey }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label fw-bold">Subsurvey 1</label>
                        <select name="subsurvey1_id" id="subsurvey1_id" class="form-select">
                            @foreach($subsurvey1s as $subsurvey1)
                                <option value="{{ $subsurvey1->id }}" {{ $kerjasama->subsurvey1_id == $subsurvey1->id ? 'selected' : '' }}>
                                    {{ $subsurvey1->nama_subsurvey }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label fw-bold">Subsurvey 2</label>
                        <select name="subsurvey2_id" id="subsurvey2_id" class="form-select">
                            @foreach($subsurvey2s as $subsurvey2)
                                <option value="{{ $subsurvey2->id }}" {{ $kerjasama->subsurvey2_id == $subsurvey2->id ? 'selected' : '' }}>
                                    {{ $subsurvey2->nama_subsurvey2s }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label fw-bold">Jenis</label>
                        <select name="jenis_id" class="form-select" required>
                            @foreach($jenis as $j)
                                <option value="{{ $j->id }}" {{ $kerjasama->jenis_id == $j->id ? 'selected' : '' }}>
                                    {{ $j->nama_jenis }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label fw-bold">Tanggal</label>
                        <input name="date" type="date" class="form-control" value="{{ $kerjasama->date }}" required>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label fw-bold">Honor</label>
                        <div class="input-group">
                            <span class="input-group-text">Rp</span>
                            <input id="formatted_honor" type="text" class="form-control" value="{{ number_format($kerjasama->honor, 0, ',', '.') }}" required>
                        </div>
                        <input id="honor" name="honor" type="hidden" value="{{ $kerjasama->honor }}">
                    </div>

                    <div class="col-md-6">
                        <label class="form-label fw-bold">Periode</label>
                        <select name="bulan" class="form-select" required>
                            <option value="bulan" {{ $kerjasama->bulan == 'Bulan' ? 'selected' : '' }}>Bulan</option>
                            <option value="triwulan" {{ $kerjasama->bulan == 'Triwulan' ? 'selected' : '' }}>Triwulan</option>
                        </select>
                    </div>
                </div>

                <div class="text-center mt-4">
                    <button type="submit" class="btn btn-primary btn-lg px-5">Update Kerjasamaku</button>
                </div>
            </form>
        </div>
    </div>
</div>

@push('scripts')
<script>
    const formattedHonorInput = document.getElementById('formatted_honor');
    const honorInput = document.getElementById('honor');

    formattedHonorInput.addEventListener('input', function(e) {
        let value = e.target.value.replace(/[^,\d]/g, '').toString();

        if (value) {
            let formattedValue = formatRupiah(value);
            e.target.value = formattedValue;
        } else {
            e.target.value = '';
        }

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
