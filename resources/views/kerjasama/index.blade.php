@extends('admin.admin_assets')

@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Manage Kerjasama</h1>

    @if(session('success'))
        <div class="alert alert-success mb-1 mt-1">
            {{ session('success') }}
        </div>
    @endif

    <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#addKerjasamaModal">
        Tambah Kerjasama Baru
    </button>

    <div class="card mt-4 mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i> Daftar Kerjasama
        </div>

        <div class="card-body">
            <table class="table table-bordered" id="datatablesSimple">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>User</th>
                        <th>Mitra</th>
                        <th>Kecamatan</th>
                        <th>Survey</th>
                        <th>Subsurvey 1</th>
                        <th>Subsurvey 2</th>
                        <th>Jenis</th>
                        <th>Date</th>
                        <th>Honor</th>
                        <th>Bulan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($kerjasama as $k)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $k->user->name }}</td>
                            <td>{{ $k->mitra->nama_mitra }}</td>
                            <td>{{ $k->kecamatan->nama_kecamatan }}</td>
                            <td>{{ $k->survey->nama_survey }}</td>
                            <td>{{ $k->subsurvey1->nama_subsurvey ?? 'N/A' }}</td>
                            <td>{{ $k->subsurvey2->nama_subsurvey2s ?? 'N/A' }}</td>
                            <td>{{ $k->jenis->nama_jenis }}</td>
                            <td>{{ $k->date }}</td>
                            <td>{{ $k->honor }}</td>
                            <td>{{ $k->bulan }}</td>
                            <td>
                                <a href="{{ route('kerjasama.edit', $k->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('kerjasama.destroy', $k->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

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
                    <form method="POST" class="row g-3" action="{{ route('kerjasama.store') }}">
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
                                <select name="survey_id" class="form-select" required>
                                    @foreach($surveys as $survey)
                                        <option value="{{ $survey->id }}">{{ $survey->nama_survey }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-12">
                                <label class="form-label">Subsurvey 1</label>
                                <select name="subsurvey1_id" class="form-select" required>
                                    @foreach($subsurvey1s as $subsurvey1)
                                        <option value="{{ $subsurvey1->id }}">{{ $subsurvey1->nama_subsurvey }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-12">
                                <label class="form-label">Subsurvey 2</label>
                                <select name="subsurvey2_id" class="form-select" required>
                                    @foreach($subsurvey2s as $subsurvey2)
                                        <option value="{{ $subsurvey2->id }}">{{ $subsurvey2->nama_subsurvey2s }}</option>
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
                                <input name="honor" type="number" class="form-control" required>
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

@endsection

@if(session('alert'))
    <script>
        alert("{{ session('alert') }}");
    </script>
@endif
