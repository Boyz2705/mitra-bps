@extends('admin.admin_assets')

@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">My Kerjasama</h1>

    <!-- Tampilkan pesan status jika ada -->
    @if(session('success'))
        <div class="alert alert-success mb-1 mt-1">
            {{ session('success') }}
        </div>
    @endif

    @if($kerjasama->isEmpty())
        <div class="alert alert-warning mb-1 mt-1">
            No kerjasama found.
        </div>
    @else
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>User</th>
                    <th>Mitra</th>
                    <th>Kecamatan</th>
                    <th>Survey</th>
                    <th>Subsurvey 1</th>
                    <th>Subsurvey 2</th>
                    <th>Jenis</th>
                    <th>Tanggal</th>
                    <th>Honor</th>
                    <th>Periode</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($kerjasama as $key => $k)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $k->user->name }}</td>
                    <td>{{ $k->mitra->nama_mitra }}</td>
                    <td>{{ $k->kecamatan->nama_kecamatan }}</td>
                    <td>{{ $k->survey->nama_survey }}</td>
                    <td>{{ $k->subsurvey1 ? $k->subsurvey1->nama_subsurvey : '-' }}</td>
                    <td>{{ $k->subsurvey2 ? $k->subsurvey2->nama_subsurvey2s : '-' }}</td>
                    <td>{{ $k->jenis ? $k->jenis->nama_jenis : '-' }}</td>
                    <td>{{ \Carbon\Carbon::parse($k->date)->format('d-m-Y') }}</td>
                    <td>{{ $k->honor }}</td>
                    <td>{{ $k->bulan }}</td>
                    <td>
                        <a href="{{ route('kerjasama.edit', $k->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('kerjasama.destroy', $k->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this kerjasama?');">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection
