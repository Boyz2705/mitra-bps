@extends('admin.admin_assets')

@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Edit Subsurvey1</h1>

    <div class="card mt-4 mb-4">
        <div class="card-header">
            <i class="fas fa-edit me-1"></i> Form Edit Subsurvey1
        </div>

        <div class="card-body">
            <form action="{{ route('subsurvey1s.update', $subsurvey1->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group mt-2">
                    <label for="nama_subsurvey"><strong>Nama Subsurvey1</strong></label>
                    <input type="text" name="nama_subsurvey" class="form-control mt-2" id="nama_subsurvey" value="{{ old('nama_subsurvey', $subsurvey1->nama_subsurvey) }}" required>
                    @error('nama_subsurvey')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group mt-2">
                    <label for="id_survey"><strong>Pilih Survey</strong></label>
                    <select name="id_survey" class="form-control mt-2" id="id_survey" required>
                        @foreach($surveys as $survey)
                            <option value="{{ $survey->id }}" {{ $survey->id == $subsurvey1->id_survey ? 'selected' : '' }}>
                                {{ $survey->nama_survey }}
                            </option>
                        @endforeach
                    </select>
                    @error('id_survey')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary mt-3">Perbarui</button>
            </form>

        </div>
    </div>
</div>
@endsection
