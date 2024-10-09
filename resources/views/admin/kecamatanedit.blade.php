@extends('admin.admin_assets')

@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">{{ isset($kecamatan) ? 'Edit Kecamatan' : 'Tambah Kecamatan Baru' }}</h1>

    <!-- Tampilkan pesan validasi jika ada -->
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Form untuk menambahkan atau mengedit kecamatan -->
    <div class="card mt-4 mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i> {{ isset($kecamatan) ? 'Form Edit Kecamatan' : 'Form Tambah Kecamatan' }}
        </div>

        <div class="card-body">
            <form action="{{ isset($kecamatan) ? route('kecamatan.update', $kecamatan->id) : route('kecamatan.store') }}" method="POST">
                @csrf
                @if(isset($kecamatan))
                    @method('PUT')
                @endif

                <!-- Input Nama Kecamatan -->
                <div class="mb-3">
                    <label for="nama_kecamatan" class="form-label">Nama Kecamatan</label>
                    <input type="text" class="form-control" id="nama_kecamatan" name="nama_kecamatan" value="{{ isset($kecamatan) ? $kecamatan->nama_kecamatan : old('nama_kecamatan') }}" required>
                </div>

                <!-- Tombol Submit -->
                <button type="submit" class="btn btn-success">
                    {{ isset($kecamatan) ? 'Update Kecamatan' : 'Tambah Kecamatan' }}
                </button>
                <a href="{{ route('kecamatan.index') }}" class="btn btn-secondary">Kembali</a>
            </form>
        </div>
    </div>
</div>
@endsection
