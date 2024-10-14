@extends('admin.admin_assets')

@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Dashboard Kerjasama</h1>

    <!-- Kerjasama Tidak Tepat Sasaran Section -->
    <div class="card mt-4">
        <div class="card-header">
            <h3 class="card-title">Kerjasama Tidak Tepat Sasaran (Tahun {{ date('Y') }})</h3>
        </div>
        <div class="card-body">
            @if($kerjasamaTidakTepatSasaran->count() > 0)
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Mitra ID</th>
                                <th>Mitra Name</th>
                                <th>Month</th>
                                <th>Total Honor</th>
                                <th>Kerjasama IDs</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($kerjasamaTidakTepatSasaran as $kerjasama)
                                <tr>
                                    <td>{{ $kerjasama->mitra_id ?? 'N/A' }}</td>
                                    <td>{{ $kerjasama->mitra_name ?? 'N/A' }}</td>
                                    <td>{{ $kerjasama->month ?? 'N/A' }}</td>
                                    <td>{{ isset($kerjasama->total_honor) ? 'Rp ' . number_format($kerjasama->total_honor, 0, ',', '.') : 'N/A' }}</td>
                                    <td>{{ $kerjasama->kerjasama_ids ?? 'N/A' }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <div class="alert alert-info" role="alert">
                    Tidak ada kerjasama yang tidak tepat sasaran untuk tahun ini.
                </div>
            @endif
        </div>
    </div>
</div>
@endsection

@if(session('alert'))
    <script>
        alert("{{ session('alert') }}");
    </script>
@endif
