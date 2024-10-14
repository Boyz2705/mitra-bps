<!-- resources/views/kerjasamaku.blade.php -->
@extends('layouts.app')

@section('title', 'Semua Kerjasama')

@section('content')
    <h2 class="text-center mb-4"><strong>Semua Kerjasama</strong></h2>
    <div class="border-custom mb-4"></div>

    @if(session('success'))
        <div class="alert alert-success mb-4">
            {{ session('success') }}
        </div>
    @endif

    @if($kerjasama->isEmpty())
        <div class="alert alert-warning mb-4">
            No kerjasama found.
        </div>
    @else
        <div class="table-responsive">
            <table class="table table-bordered" id="datatablesSimple">
                <thead class="thead-dark">
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
                    </tr>
                </thead>
                <tbody>
                    @foreach($kerjasama as $key => $k)
                        <tr>
                            <td><strong>{{ $key + 1 }}</strong></td>
                            <td>{{ $k->user->name }}</td>
                            <td>{{ $k->mitra->nama_mitra }}</td>
                            <td>{{ $k->kecamatan->nama_kecamatan }}</td>
                            <td>{{ $k->survey->nama_survey }}</td>
                            <td>{{ $k->subsurvey1 ? $k->subsurvey1->nama_subsurvey : '-' }}</td>
                            <td>{{ $k->subsurvey2 ? $k->subsurvey2->nama_subsurvey2s : '-' }}</td>
                            <td>{{ $k->jenis ? $k->jenis->nama_jenis : '-' }}</td>
                            <td>{{ \Carbon\Carbon::parse($k->date)->format('d-m-Y') }}</td>
                            <td><strong>{{ number_format($k->honor, 0, ',', '.') }}</strong></td>
                            <td>{{ $k->bulan }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif

@push('scripts')
<script>
    $(document).ready(function() {
        $('#datatablesSimple').DataTable();
    });
</script>
@endpush

@endsection
