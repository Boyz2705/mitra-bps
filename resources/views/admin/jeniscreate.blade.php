@extends('admin.admin_assets')

@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">{{ isset($jenis) ? 'Edit Jenis' : 'Tambah Jenis Baru' }}</h1>

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

    <!-- Form untuk menambahkan atau mengedit jenis -->
    <div class="card mt-4 mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i> {{ isset($Jenis) ? 'Form Edit Jenis' : 'Form Tambah Jenis' }}
        </div>

        <div class="card-body">
            <form action="{{ isset($jenis) ? route('jenis.update', $jenis->id) : route('jenis.store') }}" method="POST">
                @csrf
                @if(isset($jenis))
                    @method('PUT')
                @endif

                <!-- Input Nama Jenis -->
                <div class="mb-3">
                    <label for="nama_jenis" class="form-label">Nama Jenis</label>
                    <input type="text" class="form-control" id="nama_jenis" name="nama_jenis" value="{{ isset($jenis) ? $jenis->nama_jenis : old('nama_jenis') }}" required>
                </div>

                <!-- Tombol Submit -->
                <button type="submit" class="btn btn-success">
                    {{ isset($jenis) ? 'Update Jenis' : 'Tambah Jenis' }}
                </button>
                <a href="{{ route('jenis.index') }}" class="btn btn-secondary">Kembali</a>
            </form>
        </div>
    </div>
</div>
@endsection
