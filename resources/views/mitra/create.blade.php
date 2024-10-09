@extends('admin.admin_assets')

@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Tambah Mitra</h1>
    <div class="card mt-4 mb-4">
        <div class="card-header">
            <i class="fas fa-plus me-1"></i>
            Form Tambah Mitra
        </div>
        <div class="card-body">
            @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
            @endif

            <form action="{{ route('mitra.store') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Nama Mitra</strong>
                            <input type="text" name="nama_mitra" class="form-control mt-2" placeholder="Nama Mitra" required>
                            @error('nama_mitra')
                                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group mt-2">
                            <strong>ID Sobat</strong>
                            <input type="text" name="sobat_id" class="form-control mt-2" placeholder="ID Sobat">
                            @error('sobat_id')
                                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group mt-2">
                            <strong>SATKER</strong>
                            <input type="text" name="satker" class="form-control mt-2" placeholder="SATKER">
                            @error('satker')
                                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group mt-2">
                            <strong>Kecamatan</strong>
                            <input type="text" name="kecamatan" class="form-control mt-2" placeholder="Kecamatan">
                            @error('kecamatan')
                                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group mt-2">
                            <strong>Kelurahan</strong>
                            <input type="text" name="kelurahan" class="form-control mt-2" placeholder="Kelurahan">
                            @error('kelurahan')
                                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group mt-2">
                            <strong>Jenis Kelamin:</strong>
                            <select name="jenis_kelamin" class="form-control mt-2" required>
                                <option value="">Pilih Jenis Kelamin</option>
                                <option value="Laki Laki">Laki-laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
                            @error('jenis_kelamin')
                                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group mt-2">
                            <strong>Email</strong>
                            <input type="email" name="email" class="form-control mt-2" placeholder="Email" required>
                            @error('email')
                                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group mt-2">
                            <strong>Posisi</strong>
                            <input type="text" name="posisi" class="form-control mt-2" placeholder="Posisi">
                            @error('posisi')
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
