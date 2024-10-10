@extends('admin.admin_assets')

@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Tambah Survey</h1>
    <div class="card mt-4 mb-4">
        <div class="card-header">
            <i class="fas fa-plus me-1"></i>
            Tambah Survey
        </div>
        <div class="card-body">
            @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
            @endif

            <form action="{{ route('surveys.store') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Nama Survey</strong>
                            <input type="text" name="nama_survey" class="form-control mt-2" placeholder="Nama Survey" required>
                            @error('nama_survey')
                                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary mt-3">Simpan</button>
            </form>
        </div>
    </div>
</div>
@endsection
