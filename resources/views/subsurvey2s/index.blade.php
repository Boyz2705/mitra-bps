@extends('admin.admin_assets')

@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Manage Subsurvey2s</h1>

    @if(session('success'))
        <div class="alert alert-success mb-1 mt-1">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('subsurvey2s.create') }}" class="btn btn-primary mb-3">Tambah Subsurvey2 Baru</a>

    <div class="card mt-4 mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i> Daftar Subsurvey2s
        </div>

        <div class="card-body">
            <table class="table table-bordered" id="datatablesSimple">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nama Subsurvey2</th>
                        <th>Nama Survey</th> <!-- Relasi ke Survey -->
                        <th>Nama Subsurvey1</th> <!-- Relasi ke Subsurvey1 -->
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($subsurvey2s as $subsurvey2)
                    <tr>
                        <td>{{ $subsurvey2->id }}</td>
                        <td>{{ $subsurvey2->nama_subsurvey2s }}</td>
                        <td>{{ $subsurvey2->survey->nama_survey }}</td> <!-- Menampilkan nama survey -->
                        <td>{{ $subsurvey2->subsurvey1->nama_subsurvey }}</td> <!-- Menampilkan nama Subsurvey1 -->
                        <td>
                            <a href="{{ route('subsurvey2s.edit', $subsurvey2->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('subsurvey2s.destroy', $subsurvey2->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus Subsurvey2 ini?')">Hapus</button>
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
