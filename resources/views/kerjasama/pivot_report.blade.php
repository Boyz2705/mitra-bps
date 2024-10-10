@extends('admin.admin_assets')

@section('content')
<div class="container-fluid px-4">
    <h2 class="mt-4">Mitra Sasaran Pivot Report - Tahun {{ $year }}</h2>

    <form action="{{ route('kerjasama.pivot_report') }}" method="GET" class="mb-4">
        <div class="form-group">
            <label for="year">Pilih Tahun:</label>
            <select name="year" id="year" class="form-select">
                @for ($i = date('Y'); $i >= 2020; $i--)
                    <option value="{{ $i }}" {{ $year == $i ? 'selected' : '' }}>{{ $i }}</option>
                @endfor
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Lihat Laporan</button>
    </form>

    <div class="card">
        <div class="card-header">
            <h5 class="card-title">Ringkasan Data</h5>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Kategori</th>
                        <th>Jumlah</th>
                        <th>Total Honor</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Tepat Sasaran (≤ 4 juta)</td>
                        <td>{{ $pivotData[1]['count'] ?? 0 }}</td>
                        <td>Rp {{ number_format($pivotData[1]['total_honor'] ?? 0, 0, ',', '.') }}</td>
                    </tr>
                    <tr>
                        <td>Tidak Tepat Sasaran (> 4 juta)</td>
                        <td>{{ $pivotData[0]['count'] ?? 0 }}</td>
                        <td>Rp {{ number_format($pivotData[0]['total_honor'] ?? 0, 0, ',', '.') }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Chart Container -->
    <div class="card mt-4">
        <div class="card-header">
            <h5 class="card-title">Grafik Laporan</h5>
        </div>
        <div class="card-body">
            <canvas id="pivotChart" width="100" height="100"></canvas> <!-- Ukuran chart lebih kecil -->
        </div>
    </div>
</div>

<!-- Chart Script -->
<script>
    const ctx = document.getElementById('pivotChart').getContext('2d');
    const pivotChart = new Chart(ctx, {
        type: 'pie', // Ubah jenis chart menjadi 'pie'
        data: {
            labels: ['Tepat Sasaran (≤ 4 juta)', 'Tidak Tepat Sasaran (> 4 juta)'],
            datasets: [{
                label: 'Total Honor',
                data: [
                    {{ $pivotData[1]['total_honor'] ?? 0 }},
                    {{ $pivotData[0]['total_honor'] ?? 0 }}
                ],
                backgroundColor: [
                    'rgba(75, 192, 192, 0.6)', // Warna untuk "Tepat Sasaran"
                    'rgba(255, 99, 132, 0.6)'   // Warna untuk "Tidak Tepat Sasaran"
                ],
                borderColor: [
                    'rgba(75, 192, 192, 1)',
                    'rgba(255, 99, 132, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            responsive: true, // Membuat grafik responsif
            plugins: {
                legend: {
                    display: true,
                    position: 'top'
                },
                tooltip: {
                    callbacks: {
                        label: function(tooltipItem) {
                            return `${tooltipItem.label}: Rp ${tooltipItem.raw.toLocaleString()}`; // Format currency
                        }
                    }
                }
            }
        }
    });
</script>
@endsection
