@extends('admin.admin_assets')

@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Edit Survey</h1>

    <!-- Tampilkan pesan status jika ada -->
    @if(session('success'))
        <div class="alert alert-success mb-1 mt-1">
            {{ session('success') }}
        </div>
    @endif

    <!-- Debugging untuk memastikan ID survey tersedia -->
    <p>ID Survey: {{ $survey->id }}</p> <!-- Tambahkan ini untuk melihat ID Survey -->

    <div class="card mt-4 mb-4">
        <div class="card-header">
            <i class="fas fa-edit me-1"></i> Form Edit Survey
        </div>

        <div class="card-body">
            <form action="{{ route('surveys.update', $survey->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group mt-2">
                    <label for="nama_survey"><strong>Nama Survey</strong></label>
                    <input type="text" name="nama_survey" class="form-control mt-2" id="nama_survey" value="{{ old('nama_survey', $survey->nama_survey) }}" required>
                    @error('nama_survey')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary mt-3">Perbarui</button>
            </form>

        </div>
    </div>
</div>
@endsection
