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
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Tepat Sasaran (≤ 4 juta)</td>
                        <td>{{ $pivotData[1]['count'] ?? 0 }}</td>

                    </tr>
                    <tr>
                        <td>Tidak Tepat Sasaran (> 4 juta)</td>
                        <td>{{ $pivotData[0]['count'] ?? 0 }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>



</div>


@endsection
