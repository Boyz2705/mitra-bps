<!-- resources/views/kerjasamaku.blade.php -->
@extends('layouts.app')

@section('title', 'Kerjasamaku')

@section('content')
    <h2 class="text-center mb-4"><strong>Kerjasamaku</strong></h2>
    <div class="border-custom mb-4"></div>

    {{-- <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#addKerjasamaModal">
        Tambah Kerjasama Baru
    </button> --}}
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
                            <td><strong>{{ $key + 1 }}</strong></td>
                            <td>{{ $k->mitra->nama_mitra }}</td>
                            <td>{{ $k->kecamatan->nama_kecamatan }}</td>
                            <td>{{ $k->survey->nama_survey }}</td>
                            <td>{{ $k->subsurvey1 ? $k->subsurvey1->nama_subsurvey : '-' }}</td>
                            <td>{{ $k->subsurvey2 ? $k->subsurvey2->nama_subsurvey2s : '-' }}</td>
                            <td>{{ $k->jenis ? $k->jenis->nama_jenis : '-' }}</td>
                            <td>{{ \Carbon\Carbon::parse($k->date)->format('d-m-Y') }}</td>
                            <td><strong>{{ number_format($k->honor, 0, ',', '.') }}</strong></td>
                            <td>{{ $k->bulan }}</td>
                            <td><a href="{{ route('kerjasamaku.edit', $k->id) }}" class="btn btn-warning btn-sm">Edit</a></td>
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

<!-- Modal Tambah Kerjasama -->
<div class="modal fade" id="addKerjasamaModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            @auth
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Form Tambah Kerjasama</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-4">
                    <form method="POST" class="row g-3" action="{{ route('mulaikerjasama.store') }}">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <label class="form-label">User</label>
                                <select name="user_id" class="form-select" required>
                                    <option value="{{ Auth::user()->id }}" readonly>{{ Auth::user()->name }}</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Email</label>
                                <select name="email" class="form-select" readonly>
                                    <option value="{{ Auth::user()->email }}" readonly>{{ Auth::user()->email }}</option>
                                </select>
                            </div>
                            <div class="col-md-12">
                                <label class="form-label">Mitra</label>
                                <select name="mitra_id" class="form-select" required>
                                    @foreach($mitras as $mitra)
                                        <option value="{{ $mitra->id }}">{{ $mitra->nama_mitra }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-12">
                                <label class="form-label">Kecamatan</label>
                                <select name="kecamatan_id" class="form-select" required>
                                    @foreach($kecamatans as $kecamatan)
                                        <option value="{{ $kecamatan->id }}">{{ $kecamatan->nama_kecamatan }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-12">
                                <label class="form-label">Survey</label>
                                <select name="survey_id" id="survey_id" class="form-select" required>
                                    <option value="" disabled selected>Pilih Survey</option>
                                    @foreach($surveys as $survey)
                                        <option value="{{ $survey->id }}">{{ $survey->nama_survey }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-12">
                                <label class="form-label">Subsurvey 1</label>
                                <select name="subsurvey1_id" id="subsurvey1_id" class="form-select" required>
                                    <option value="" disabled selected>Pilih Subsurvey 1</option>
                                    @foreach($subsurvey1s as $subsurvey1)
                                        <option value="{{ $subsurvey1->id }}" data-survey="{{ $subsurvey1->id_survey }}">{{ $subsurvey1->nama_subsurvey }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-12">
                                <label class="form-label">Subsurvey 2</label>
                                <select name="subsurvey2_id" id="subsurvey2_id" class="form-select" required>
                                    <option value="" disabled selected>Pilih Subsurvey 2</option>
                                    @foreach($subsurvey2s as $subsurvey2)
                                        <option value="{{ $subsurvey2->id }}" data-subsurvey1="{{ $subsurvey2->id_subsurvey1 }}">{{ $subsurvey2->nama_subsurvey2s }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-12">
                                <label class="form-label">Jenis</label>
                                <select name="jenis_id" class="form-select" required>
                                    @foreach($jenis as $j)
                                        <option value="{{ $j->id }}">{{ $j->nama_jenis }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Tanggal</label>
                                <input name="date" type="date" class="form-control" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Honor</label>
                                <input id="formatted_honor" type="text" class="form-control" required>
                                <input id="honor" name="honor" type="hidden">
                            </div>
                            <div class="col-md-12">
                                <label class="form-label">Periode</label>
                                <select name="bulan" class="form-select" required>
                                    <option value="Bulan">Bulan</option>
                                    <option value="Triwulan">Triwulan</option>
                                </select>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-success">Submit</button>
                    </form>
                </div>
            @else
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Anda Harus Login Terlebih Dahulu</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-4">
                    <a href="{{ route('login') }}"><button class="btn btn-success">Login</button></a>
                </div>
            @endauth
        </div>
    </div>
</div>

<script>
    const formattedHonorInput = document.getElementById('formatted_honor');
    const honorInput = document.getElementById('honor');

    formattedHonorInput.addEventListener('input', function(e) {
        let value = e.target.value.replace(/[^,\d]/g, '').toString(); // Hanya ambil angka

        if (value) {
            // Format rupiah
            let formattedValue = formatRupiah(value);
            e.target.value = formattedValue;
        } else {
            e.target.value = '';
        }

        // Simpan nilai asli ke hidden input
        honorInput.value = value;
    });

    function formatRupiah(value) {
        let numberString = value.replace(/[^,\d]/g, '').toString(),
            split = numberString.split(','),
            sisa = split[0].length % 3,
            rupiah = split[0].substr(0, sisa),
            ribuan = split[0].substr(sisa).match(/\d{3}/gi);

        // Menambahkan titik jika ada ribuan
        if (ribuan) {
            let separator = sisa ? '.' : '';
            rupiah += separator + ribuan.join('.');
        }

        return rupiah;
    }
</script>

<script>
$(document).ready(function() {
    // Filter subsurvey1 based on survey
    $('#survey_id').on('change', function() {
        var surveyId = $(this).val();

        // Reset subsurvey1 and subsurvey2
        $('#subsurvey1_id').val('').find('option').hide().filter('[value=""]').show();
        $('#subsurvey2_id').val('').find('option').hide().filter('[value=""]').show();

        // Show relevant subsurvey1 options
        $('#subsurvey1_id option').each(function() {
            if ($(this).data('survey') == surveyId) {
                $(this).show();
            }
        });
    });

    // Filter subsurvey2 based on subsurvey1
    $('#subsurvey1_id').on('change', function() {
        var subsurvey1Id = $(this).val();

        // Reset and hide all options in subsurvey2
        $('#subsurvey2_id').val('').find('option').hide().filter('[value=""]').show();

        // Show relevant subsurvey2 options
        $('#subsurvey2_id option').each(function() {
            if ($(this).data('subsurvey1') == subsurvey1Id) {
                $(this).show();
            }
        });
    });
});
</script>


@if(session('alert'))
    <script>
        alert("{{ session('alert') }}");
    </script>
@endif

@endsection
