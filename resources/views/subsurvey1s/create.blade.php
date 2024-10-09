@extends('admin.admin_assets')

@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Tambah Subsurvey1</h1>

    <div class="card mt-4 mb-4">
        <div class="card-header">
            <i class="fas fa-plus me-1"></i> Form Tambah Subsurvey1
        </div>

        <div class="card-body">
            <form action="{{ route('subsurvey1s.store') }}" method="POST">
                @csrf

                <div class="form-group mt-2">
                    <label for="nama_subsurvey"><strong>Nama Subsurvey1</strong></label>
                    <input type="text" name="nama_subsurvey" class="form-control mt-2" id="nama_subsurvey" required>
                    @error('nama_subsurvey')
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

                <button type="submit" class="btn btn-primary mt-3">Simpan</button>
            </form>
        </div>
    </div>
</div>
@endsection
