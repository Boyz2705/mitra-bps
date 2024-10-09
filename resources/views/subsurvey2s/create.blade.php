@extends('admin.admin_assets')

@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Tambah Subsurvey2</h1>

    <div class="card mt-4 mb-4">
        <div class="card-header">
            <i class="fas fa-plus me-1"></i> Form Tambah Subsurvey2
        </div>

        <div class="card-body">
            <form action="{{ route('subsurvey2s.store') }}" method="POST">
                @csrf

                <div class="form-group mt-2">
                    <label for="nama_subsurvey2s"><strong>Nama Subsurvey2</strong></label>
                    <input type="text" name="nama_subsurvey2s" class="form-control mt-2" id="nama_subsurvey2s" required>
                    @error('nama_subsurvey2s')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group mt-2">
                    <label for="id_survey"><strong>Pilih Survey</strong></label>
                    <select name="id_survey" class="form-control mt-2" id="id_survey" required>
                        @foreach($surveys as $survey)
                            <option value="{{ $survey->id }}">{{ $survey->nama_survey }}</option>
                        @endforeach
                    </select>
                    @error('id_survey')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group mt-2">
                    <label for="id_subsurvey1"><strong>Pilih Subsurvey1</strong></label>
                    <select name="id_subsurvey1" class="form-control mt-2" id="id_subsurvey1" required>
                        @foreach($subsurvey1s as $subsurvey1)
                            <option value="{{ $subsurvey1->id }}">{{ $subsurvey1->nama_subsurvey }}</option>
                        @endforeach
                    </select>
                    @error('id_subsurvey1')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary mt-3">Simpan</button>
            </form>
        </div>
    </div>
</div>
@endsection
