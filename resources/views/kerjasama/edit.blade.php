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

        <div class="form-group mb-3">
            <label for="jenis_id">Jenis</label>
            <select name="jenis_id" id="jenis_id" class="form-select" required>
                @foreach($jenis as $j)
                    <option value="{{ $j->id }}" {{ $kerjasama->j_id == $j->id ? 'selected' : '' }}>
                        {{ $j->nama_jenis }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group mb-3">
            <label for="date">Date</label>
            <input type="date" name="date" id="date" class="form-control" value="{{ $kerjasama->date }}" required>
        </div>

        <div class="form-group mb-3">
            <label for="honor">Honor</label>
            <input type="number" name="honor" id="honor" class="form-control" value="{{ $kerjasama->honor }}" required>
        </div>

        <select name="bulan" id="bulan" class="form-select" required>
            <option value="bulan" {{ $kerjasama->bulan == 'bulan' ? 'selected' : '' }}>Bulan</option>
            <option value="triwulan" {{ $kerjasama->bulan == 'triwulan' ? 'selected' : '' }}>Triwulan</option>
        </select>



        <button type="submit" class="btn btn-primary">Perbarui Kerjasama</button>
    </form>
</div>
@endsection
