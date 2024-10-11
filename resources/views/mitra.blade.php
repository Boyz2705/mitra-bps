@extends('layouts.app')

@section('title', 'Mitra')

@section('content')
<div class="container">
    <h2 class="text-center mb-4"><strong>Daftar Mitra</strong></h2>
    <div class="border-custom mb-5"></div>

        @if($mitras->isEmpty())
            <div class="alert alert-warning mb-4">Tidak ada mitra yang ditemukan.</div>
        @else
            <div class="table-responsive">
                <table class="table table-bordered" id="datatablesSimple">
                    <thead class="thead-dark">
                        <tr>
                            <th>No</th>
                            <th>Nama Mitra</th>
                            <th>Sobat ID</th>
                            <th>Kecamatan</th>
                            <th>Kelurahan</th>
                            <th>Email</th>
                            <th>Posisi</th>
                            <th>Kinerja</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($mitras as $key => $mitra)
                            <tr>
                                <td><strong>{{ $key + 1 }}</strong></td>
                                <td>{{ $mitra->nama_mitra }}</td>
                                <td>{{ $mitra->sobat_id }}</td>
                                <td>{{ $mitra->kecamatan }}</td>
                                <td>{{ $mitra->kelurahan }}</td>
                                <td>{{ $mitra->email }}</td>
                                <td>{{ $mitra->posisi }}</td>
                                <td>{{ $mitra->kinerja }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>
@endsection

@push('styles')
<style>
    .custom-margin {
        margin-top: 500px; /* Sesuaikan nilai sesuai kebutuhan */
    }
    .table-responsive {
        overflow-x: auto;
    }
    .table th, .table td {
        padding: 0.75rem;
        vertical-align: top;
        border-top: 1px solid #dee2e6;
    }
    .thead-dark th {
        color: #fff;
        background-color: #343a40;
        border-color: #454d55;
    }
    .alert-warning {
        color: #856404;
        background-color: #fff3cd;
        border-color: #ffeeba;
    }
    .border-custom {
        border-bottom: 2px solid #007bff;
        width: 50px;
        margin: 0 auto;
    }
    .input-group .form-control {
        border-right: none;
    }
    .input-group .btn {
        border-left: none;
        background-color: #fff;
    }
    .input-group .btn:hover {
        background-color: #f8f9fa;
    }
</style>
@endpush

@push('scripts')
<script>
    $(document).ready(function() {
        $('#datatablesSimple').DataTable();
    });
</script>
@endpush
