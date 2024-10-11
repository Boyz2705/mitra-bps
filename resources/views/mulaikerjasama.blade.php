@extends('layouts.app')

@section('title', 'Form Tambah Kerjasama')

@section('content')

<div class="container mt-5">
    @auth
        <h2 class="text-center mb-4"><strong>Mulai Kerjasama</strong></h2>
        <form id="kerjasamaForm" method="POST" action="{{ route('mulaikerjasama.store') }}">
            @csrf
            <table class="table table-bordered">
                <tr>
                    <th>User</th>
                    <td>
                        <select name="user_id" class="form-select" required>
                            <option value="{{ Auth::user()->id }}">{{ Auth::user()->name }}</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <th>Mitra</th>
                    <td>
                        <select name="mitra_id" class="form-select" required>
                            @foreach($mitras as $mitra)
                                <option value="{{ $mitra->id }}">{{ $mitra->nama_mitra }}</option>
                            @endforeach
                        </select>
                    </td>
                </tr>
                <tr>
                    <th>Kecamatan</th>
                    <td>
                        <select name="kecamatan_id" class="form-select" required>
                            @foreach($kecamatans as $kecamatan)
                                <option value="{{ $kecamatan->id }}">{{ $kecamatan->nama_kecamatan }}</option>
                            @endforeach
                        </select>
                    </td>
                </tr>
                <tr>
                    <th>Survey</th>
                    <td>
                        <select name="survey_id" id="survey_id" class="form-select" required>
                            <option value="" disabled selected>Pilih Survey</option>
                            @foreach($surveys as $survey)
                                <option value="{{ $survey->id }}">{{ $survey->nama_survey }}</option>
                            @endforeach
                        </select>
                    </td>
                </tr>
                <tr>
                    <th>Subsurvey 1</th>
                    <td>
                        <select name="subsurvey1_id" id="subsurvey1_id" class="form-select" required>
                            <option value="" disabled selected>Pilih Subsurvey 1</option>
                            @foreach($subsurvey1s as $subsurvey1)
                                <option value="{{ $subsurvey1->id }}">{{ $subsurvey1->nama_subsurvey }}</option>
                            @endforeach
                        </select>
                    </td>
                </tr>
                <tr>
                    <th>Subsurvey 2</th>
                    <td>
                        <select name="subsurvey2_id" id="subsurvey2_id" class="form-select" required>
                            <option value="" disabled selected>Pilih Subsurvey 2</option>
                            @foreach($subsurvey2s as $subsurvey2)
                                <option value="{{ $subsurvey2->id }}">{{ $subsurvey2->nama_subsurvey2s }}</option>
                            @endforeach
                        </select>
                    </td>
                </tr>
                <tr>
                    <th>Jenis</th>
                    <td>
                        <select name="jenis_id" class="form-select" required>
                            @foreach($jenis as $j)
                                <option value="{{ $j->id }}">{{ $j->nama_jenis }}</option>
                            @endforeach
                        </select>
                    </td>
                </tr>
                <tr>
                    <th>Tanggal</th>
                    <td>
                        <input name="date" type="date" class="form-control" required>
                    </td>
                </tr>
                <tr>
                    <th>Honor</th>
                    <td>
                        <input id="formatted_honor" type="text" class="form-control" required>
                        <input id="honor" name="honor" type="hidden">
                    </td>
                </tr>
                <tr>
                    <th>Periode</th>
                    <td>
                        <select name="bulan" class="form-select" required>
                            <option value="Bulan">Bulan</option>
                            <option value="Triwulan">Triwulan</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" class="text-center">
                        <button type="submit" class="btn btn-success">Submit</button>
                    </td>
                </tr>
            </table>
        </form>
    @else
        <h2>Anda Harus Login Terlebih Dahulu</h2>
        <a href="{{ route('login') }}"><button class="btn btn-primary">Login</button></a>
    @endauth
</div>

<div class="mb-4"></div>

<script>
    document.getElementById('kerjasamaForm').addEventListener('submit', function() {
        const formattedHonor = document.getElementById('formatted_honor').value;
        document.getElementById('honor').value = formattedHonor; // Mengisi nilai ke input hidden
    });
</script>

@endsection
