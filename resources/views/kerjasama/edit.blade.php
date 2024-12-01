<!-- resources/views/kerjasama/edit.blade.php -->

@extends('admin.admin_assets')
@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Edit Kerjasama</h1>

    <!-- Tampilkan pesan status jika ada -->
    @if(session('success'))
        <div class="alert alert-success mb-1 mt-1">
            {{ session('success') }}
        </div>
    @endif

    <!-- Form edit kerjasama -->
    <form action="{{ route('kerjasama.update', $kerjasama->id) }}" method="POST">
        @csrf
        @method('PUT')

        <!-- Pilihan User -->
        <div class="form-group mb-3">
            <label for="user_id">User</label>
            <select name="user_id" id="user_id" class="form-select" required>
                @foreach($users as $user)
                    <option value="{{ $user->id }}" {{ $kerjasama->user_id == $user->id ? 'selected' : '' }}>
                        {{ $user->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Pilihan Mitra -->
        <div class="form-group mb-3">
            <label for="mitra_id">Mitra</label>
            <select name="mitra_id" id="mitra_id" class="form-select" required>
                @foreach($mitras as $mitra)
                    <option value="{{ $mitra->id }}" {{ $kerjasama->mitra_id == $mitra->id ? 'selected' : '' }}>
                        {{ $mitra->nama_mitra }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Pilihan Kecamatan -->
        <div class="form-group mb-3">
            <label for="kecamatan_id">Kecamatan</label>
            <select name="kecamatan_id" id="kecamatan_id" class="form-select" required>
                @foreach($kecamatans as $kecamatan)
                    <option value="{{ $kecamatan->id }}" {{ $kerjasama->kecamatan_id == $kecamatan->id ? 'selected' : '' }}>
                        {{ $kecamatan->nama_kecamatan }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Pilihan Survey -->
        <div class="form-group mb-3">
            <label for="survey_id">Survey Utama</label>
            <select name="mainsurvey_id" id="mainsurvey_id" class="form-select" required>
                @foreach($mainsurveys as $mainsurvey)
                    <option value="{{ $mainsurvey->id }}" {{ $kerjasama->mainsurvey_id == $mainsurvey->id ? 'selected' : '' }}>
                        {{ $mainsurvey->nama_survey }}
                    </option>
                @endforeach
            </select>
        </div>
        <!-- Pilihan Survey -->
        <div class="form-group mb-3">
            <label for="survey_id">Survey</label>
            <select name="survey_id" id="survey_id" class="form-select" required>
                @foreach($surveys as $survey)
                    <option value="{{ $survey->id }}" {{ $kerjasama->survey_id == $survey->id ? 'selected' : '' }}>
                        {{ $survey->nama_survey }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Pilihan Subsurvey 1 -->
        <div class="form-group mb-3">
            <label for="subsurvey1_id">Subsurvey 1</label>
            <select name="subsurvey1_id" id="subsurvey1_id" class="form-select">
                @foreach($subsurvey1s as $subsurvey1)
                    <option value="{{ $subsurvey1->id }}" {{ $kerjasama->subsurvey1_id == $subsurvey1->id ? 'selected' : '' }}>
                        {{ $subsurvey1->nama_subsurvey }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Pilihan Subsurvey 2 -->
        <div class="form-group mb-3">
            <label for="subsurvey2_id">Subsurvey 2</label>
            <select name="subsurvey2_id" id="subsurvey2_id" class="form-select">
                @foreach($subsurvey2s as $subsurvey2)
                    <option value="{{ $subsurvey2->id }}" {{ $kerjasama->subsurvey2_id == $subsurvey2->id ? 'selected' : '' }}>
                        {{ $subsurvey2->nama_subsurvey2s }}
                    </option>
                @endforeach
            </select>
        </div>


        <!-- Pilihan Jenis -->
        <div class="form-group mb-3">
            <label for="jenis_id">Jenis</label>
            <select name="jenis_id" id="jenis_id" class="form-select" required>
                @foreach($jenis as $j)
                    <option value="{{ $j->id }}" {{ $kerjasama->jenis_id == $j->id ? 'selected' : '' }}>
                        {{ $j->nama_jenis }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Date -->
        <div class="form-group mb-3">
            <label for="date">Tanggal Pelaksanaan</label>
            <input type="date" name="date" id="date" class="form-control" value="{{ old('date', $kerjasama->date) }}" required>
        </div>

        <!-- Date Bayar -->
        <div class="form-group mb-3">
            <label for="datebayar">Tanggal Bayar</label>
            <input type="date" name="datebayar" id="datebayar" class="form-control" value="{{ old('datebayar', $kerjasama->datebayar) }}" required>
        </div>

        <!-- Honor -->
        <div class="form-group mb-3">
            <label for="honor">Honor</label>
            <input type="number" name="honor" id="honor" class="form-control" value="{{ old('honor', $kerjasama->honor) }}" required>
        </div>

        <!-- Pilihan Periode Pelaksanaan -->
        <div class="form-group mb-3">
            <label for="bulan">Periode</label>
            <select name="bulan" id="bulan" class="form-select" required>
                <option value="Januari" {{ $kerjasama->bulan == 'Januari' ? 'selected' : '' }}>Januari</option>
                <option value="Februari" {{ $kerjasama->bulan == 'Februari' ? 'selected' : '' }}>Februari</option>
                <option value="Maret" {{ $kerjasama->bulan == 'Maret' ? 'selected' : '' }}>Maret</option>
                <option value="April" {{ $kerjasama->bulan == 'April' ? 'selected' : '' }}>April</option>
                <option value="Mei" {{ $kerjasama->bulan == 'Mei' ? 'selected' : '' }}>Mei</option>
                <option value="Juni" {{ $kerjasama->bulan == 'Juni' ? 'selected' : '' }}>Juni</option>
                <option value="Juli" {{ $kerjasama->bulan == 'Juli' ? 'selected' : '' }}>Juli</option>
                <option value="Agustus" {{ $kerjasama->bulan == 'Agustus' ? 'selected' : '' }}>Agustus</option>
                <option value="September" {{ $kerjasama->bulan == 'September' ? 'selected' : '' }}>September</option>
                <option value="Oktober" {{ $kerjasama->bulan == 'Oktober' ? 'selected' : '' }}>Oktober</option>
                <option value="November" {{ $kerjasama->bulan == 'November' ? 'selected' : '' }}>November</option>
                <option value="Desember" {{ $kerjasama->bulan == 'Desember' ? 'selected' : '' }}>Desember</option>
                <option value="Jan-Mar" {{ $kerjasama->bulan == 'Jan-Mar' ? 'selected' : '' }}>Q1 (Jan - Mar)</option>
                <option value="Apr-Jun" {{ $kerjasama->bulan == 'Apr-Jun' ? 'selected' : '' }}>Q2 (Apr - Jun)</option>
                <option value="Jul-Sep" {{ $kerjasama->bulan == 'Jul-Sep' ? 'selected' : '' }}>Q3 (Jul - Sep)</option>
                <option value="Okt-Des" {{ $kerjasama->bulan == 'Okt-Des' ? 'selected' : '' }}>Q4 (Okt - Des)</option>
            </select>
        </div>


        <button type="submit" class="btn btn-primary">Perbarui Kerjasama</button>
    </form>
</div>

@endsection
