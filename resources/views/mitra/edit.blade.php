<!-- resources/views/mitra/edit.blade.php -->
@extends('admin.admin_assets')

@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Edit Mitra</h1>

    <!-- Tampilkan pesan status jika ada -->
    @if(session('success'))
        <div class="alert alert-success mb-1 mt-1">
            {{ session('success') }}
        </div>
    @endif

    <!-- Form edit mitra -->
    <form action="{{ route('mitra.update', $mitra->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group mb-3">
            <label for="nama_mitra">Nama Mitra</label>
            <input type="text" name="nama_mitra" id="nama_mitra" class="form-control" value="{{ $mitra->nama_mitra }}" required>
        </div>

        <div class="form-group mb-3">
            <label for="sobat_id">Sobat ID</label>
            <input type="text" name="sobat_id" id="sobat_id" class="form-control" value="{{ $mitra->sobat_id }}">
        </div>

        <div class="form-group mb-3">
            <label for="satker">Satker</label>
            <input type="text" name="satker" id="satker" class="form-control" value="{{ $mitra->satker }}">
        </div>

        <div class="form-group mb-3">
            <label for="kecamatan">Kecamatan</label>
            <input type="text" name="kecamatan" id="kecamatan" class="form-control" value="{{ $mitra->kecamatan }}">
        </div>

        <div class="form-group mb-3">
            <label for="kelurahan">Kelurahan</label>
            <input type="text" name="kelurahan" id="kelurahan" class="form-control" value="{{ $mitra->kelurahan }}">
        </div>

        <div class="form-group mb-3">
            <label for="jenis_kelamin">Jenis Kelamin</label>
            <select name="jenis_kelamin" id="jenis_kelamin" class="form-select" required>
                <option value="Laki-laki" {{ $mitra->jenis_kelamin == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                <option value="Perempuan" {{ $mitra->jenis_kelamin == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
            </select>
        </div>

        <div class="form-group mb-3">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" class="form-control" value="{{ $mitra->email }}" required>
        </div>

        <div class="form-group mb-3">
            <label for="posisi">Posisi</label>
            <input type="text" name="posisi" id="posisi" class="form-control" value="{{ $mitra->posisi }}">
        </div>

        <div class="form-group mb-3">
            <label for="kinerja">Kinerja</label>
            <select name="kinerja" id="kinerja" class="form-select" required>
                <option value="normal" {{ $mitra->kinerja == 'normal' ? 'selected' : '' }}>Normal</option>
                <option value="bagus" {{ $mitra->kinerja == 'bagus' ? 'selected' : '' }}>Bagus</option>
                <option value="jelek" {{ $mitra->kinerja == 'jelek' ? 'selected' : '' }}>Jelek</option>
                <option value="blacklist" {{ $mitra->kinerja == 'blacklist' ? 'selected' : '' }}>Blacklist</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Perbarui Mitra</button>
    </form>
</div>
@endsection
