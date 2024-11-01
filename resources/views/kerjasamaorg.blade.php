@extends('layouts.app3')

@section('title', 'Semua Kerjasama')

@section('content')
<div class="text-center mb-4">
    <!-- Marquee untuk menampilkan pivot report -->
    <marquee id="pivotMarquee" behavior="scroll" direction="left" scrollamount="10" style="background-color: #ffffff; padding: 10px; width: 100%;">
        <span id="reportText" style="font-size: 1.5rem; font-weight: bold;"></span>
    </marquee>
</div>


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
                        <th>Survey Utama</th>
                        <th>Survey</th>
                        <th>Subsurvey 1</th>
                        <th>Subsurvey 2</th>
                        <th>Jenis</th>
                        <th>Periode Pelaksanaan</th>
                        <th>Tanggal Pelaksanaan</th>
                        <th>Honor</th>
                        <th>Tanggal Bayar</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($kerjasama as $key => $k)
                        <tr>
                            <td><strong>{{ $key + 1 }}</strong></td>
                            <td>{{ $k->user->name }}</td>
                            <td>{{ $k->mitra->nama_mitra }}</td>
                            <td>{{ $k->kecamatan->nama_kecamatan }}</td>
                            <td>{{ $k->mainsurvey->nama_survey }}</td>
                            <td>{{ $k->survey->nama_survey }}</td>
                            <td>{{ $k->subsurvey1 ? $k->subsurvey1->nama_subsurvey : '-' }}</td>
                            <td>{{ $k->subsurvey2 ? $k->subsurvey2->nama_subsurvey2s : '-' }}</td>
                            <td>{{ $k->jenis ? $k->jenis->nama_jenis : '-' }}</td>
                            <td>{{ $k->bulan }}</td>
                            <td>{{ \Carbon\Carbon::parse($k->date)->format('d-m-Y') }}</td>
                            <td><strong>{{ number_format($k->honor, 0, ',', '.') }}</strong></td>
                            <td>{{ \Carbon\Carbon::parse($k->datebayar)->format('d-m-Y') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif

@endsection
