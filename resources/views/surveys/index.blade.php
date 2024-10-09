@extends('admin.admin_assets')

@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Manage Surveys</h1>

    <!-- Tampilkan pesan status jika ada -->
    @if(session('success'))
        <div class="alert alert-success mb-1 mt-1">
            {{ session('success') }}
        </div>
    @endif

    <!-- Tampilkan tombol untuk menambah survey baru -->
    <a href="{{ route('surveys.create') }}" class="btn btn-primary mb-3">Tambah Survey Baru</a>

    <!-- Tabel daftar survey -->
    <div class="card mt-4 mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i> Daftar Survey
        </div>

        <div class="card-body">
            <table class="table table-bordered" id="datatablesSimple">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nama Survey</th>
                        <th>Tanggal Dibuat</th>
                        <th>Tanggal Diperbarui</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($surveys as $survey)
                    <tr>
                        <td>{{ $survey->id }}</td>
                        <td>{{ $survey->nama_survey }}</td>
                        <td>{{ $survey->created_at }}</td>
                        <td>{{ $survey->updated_at }}</td>
                        <td>
                            <a href="{{ route('surveys.edit', $survey->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('surveys.destroy', $survey->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus survey ini?')">Hapus</button>
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
