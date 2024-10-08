@extends('admin.admin_assets')

@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Manage Mitra</h1>

    <!-- Tampilkan pesan status jika ada -->
    @if(session('success'))
        <div class="alert alert-success mb-1 mt-1">
            {{ session('success') }}
        </div>
    @endif

    <!-- Tampilkan tombol untuk menambah mitra baru -->
    <a href="{{ route('mitra.create') }}" class="btn btn-primary mb-3">Tambah Mitra Baru</a>

    <!-- Tabel daftar mitra -->
    <div class="card mt-4 mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i> Daftar Mitra
        </div>

        <div class="card-body">
            <table class="table table-bordered" id="datatablesSimple">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nama Mitra</th>
                        <th>Sobat ID</th>
                        <th>Satker</th>
                        <th>Kecamatan</th>
                        <th>Kelurahan</th>
                        <th>Jenis Kelamin</th>
                        <th>Email</th>
                        <th>Posisi</th>
                        <th>Kinerja</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($mitras as $mitra)
                    <tr>
                        <td>{{ $mitra->id }}</td>
                        <td>{{ $mitra->nama_mitra }}</td>
                        <td>{{ $mitra->sobat_id }}</td>
                        <td>{{ $mitra->satker }}</td>
                        <td>{{ $mitra->kecamatan }}</td>
                        <td>{{ $mitra->kelurahan }}</td>
                        <td>{{ $mitra->jenis_kelamin }}</td>
                        <td>{{ $mitra->email }}</td>
                        <td>{{ $mitra->posisi }}</td>
                        <td>{{ $mitra->kinerja }}</td>
                        <td>
                            <a href="{{ route('mitra.edit', $mitra->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('mitra.destroy', $mitra->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus mitra ini?')">Hapus</button>
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

@if(session('alert'))
    <script>
        alert("{{ session('alert') }}");
    </script>
@endif
