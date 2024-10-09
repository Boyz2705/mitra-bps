@extends('admin.admin_assets')

@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Manage Kecamatan</h1>

    <!-- Tampilkan pesan status jika ada -->
    @if(session('status'))
        <div class="alert alert-success mb-1 mt-1">
            {{ session('status') }}
        </div>
    @endif

    @if(session('statusdel'))
        <div class="alert alert-danger mb-1 mt-1">
            {{ session('statusdel') }}
        </div>
    @endif

    <!-- Tampilkan tombol untuk menambah kecamatan baru -->
    <a href="{{ route('kecamatan.create') }}" class="btn btn-primary mb-3">Tambah Kecamatan Baru</a>

    <!-- Tabel daftar kecamatan -->
    <div class="card mt-4 mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i> Daftar Kecamatan
        </div>

        <div class="card-body">
            <table class="table table-bordered" id="datatablesSimple">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nama Kecamatan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($kecamatans as $kecamatan)
                    <tr>
                        <td>{{ $kecamatan->id }}</td>
                        <td>{{ $kecamatan->nama_kecamatan }}</td>
                        <td>
                            <a href="{{ route('kecamatan.edit', $kecamatan->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('kecamatan.destroy', $kecamatan->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus kecamatan ini?')">Hapus</button>
                            </form>
                            
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
