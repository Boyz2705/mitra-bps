@extends('admin.admin_assets')

@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Manage Subsurvey1s</h1>

    @if(session('success'))
        <div class="alert alert-success mb-1 mt-1">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('subsurvey1s.create') }}" class="btn btn-primary mb-3">Tambah Subsurvey1 Baru</a>

    <div class="card mt-4 mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i> Daftar Subsurvey1s
        </div>

        <div class="card-body">
            <table class="table table-bordered" id="datatablesSimple">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nama Subsurvey1</th>
                        <th>Nama Survey</th> <!-- Relasi ke Survey -->
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($subsurvey1s as $subsurvey1)
                    <tr>
                        <td>{{ $subsurvey1->id }}</td>
                        <td>{{ $subsurvey1->nama_subsurvey }}</td>
                        <td>{{ $subsurvey1->survey->nama_survey }}</td> <!-- Menampilkan nama survey dari relasi -->
                        <td>
                            <a href="{{ route('subsurvey1s.edit', $subsurvey1->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('subsurvey1s.destroy', $subsurvey1->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus Subsurvey1 ini?')">Hapus</button>
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
