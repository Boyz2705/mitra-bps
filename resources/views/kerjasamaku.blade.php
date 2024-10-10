<!DOCTYPE html>
<html lang="en">
<head>
    <title>Pram</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css3/animate.css">
    <link rel="stylesheet" href="css3/owl.carousel.min.css">
    <link rel="stylesheet" href="css3/owl.theme.default.min.css">
    <link rel="stylesheet" href="css3/magnific-popup.css">
    <link rel="icon" type="image/x-icon" href="./favicon.png" />
    <link rel="stylesheet" href="css3/flaticon.css">
    <link rel="stylesheet" href="css3/style.css">
</head>
<body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">

    <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light site-navbar-target" id="ftco-navbar">
        <div class="container">
            <a class="navbar-brand" href="index.html">Mitraku<span></span></a>
            <button class="navbar-toggler js-fh5co-nav-toggle fh5co-nav-toggle" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="oi oi-menu"></span> Menu
            </button>

            <div class="collapse navbar-collapse" id="ftco-nav">
                <ul class="navbar-nav nav ml-auto">
                    <li class="nav-item"><a href="{{ url('/') }}" class="nav-link"><span>Home</span></a></li>
                    <li class="nav-item"><a href="{{ url('/') }}#about-section" class="nav-link"><span>About</span></a></li>
                    <li class="nav-item"><a href="{{ url('/kerjasamaku') }}" class="nav-link"><span>Kerjasamaku</span></a></li>
                    <li class="nav-item"><a href="{{ url('/mitra') }}" class="nav-link"><span>Mitra</span></a></li>
                    <li class="nav-item">
                        @if (Auth::check())
                            <a href="#user-section" class="nav-link">
                                <span><b>{{ Auth::user()->name }}</b></span>
                            </a>
                        @else
                            <a href="{{ route('login') }}" class="nav-link">
                                <span>Login</span>
                            </a>
                        @endif
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Tambahkan kelas mt-5 untuk memberi margin atas -->
        <div class="container mt-5 pt-5">
        <h2 class="text-center mb-4"><strong>Kerjasamaku</strong></h2>
        <div class="border-custom mb-4"></div>
       
       {{-- //search branch --}}
    
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
                <table class="table table-striped table-hover custom-table"> <!-- Perbaikan di sini -->
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
                                <td style="color: black;"><strong>{{ $key + 1 }}</strong></td> <!-- Bold pada nomor -->
                                <td style="color: black">{{ $k->user->name }}</td> <!-- Warna hijau untuk user -->
                                <td style="color: black;">{{ $k->mitra->nama_mitra }}</td> <!-- Warna hitam untuk mitra -->
                                <td style="color: black;">{{ $k->kecamatan->nama_kecamatan }}</td> <!-- Warna hitam untuk kecamatan -->
                                <td style="color: black;">{{ $k->survey->nama_survey }}</td> <!-- Warna hitam untuk survey -->
                                <td style="color: black;">{{ $k->subsurvey1 ? $k->subsurvey1->nama_subsurvey : '-' }}</td> <!-- Hitam untuk subsurvey 1 -->
                                <td style="color: black;">{{ $k->subsurvey2 ? $k->subsurvey2->nama_subsurvey2s : '-' }}</td> <!-- Hitam untuk subsurvey 2 -->
                                <td style="color: black;">{{ $k->jenis ? $k->jenis->nama_jenis : '-' }}</td> <!-- Hitam untuk jenis -->
                                <td style="color: black;">{{ \Carbon\Carbon::parse($k->date)->format('d-m-Y') }}</td> <!-- Warna hitam untuk tanggal -->
                                <td style="color: red;"><strong>{{ number_format($k->honor, 0, ',', '.') }}</strong></td> <!-- Warna merah untuk honor -->
                                <td style="color: darkgreen;">{{ $k->bulan }}</td> <!-- Warna hijau gelap untuk periode -->
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>
    
    @push('styles')
    <style>
        .table-responsive {
            overflow-x: auto;
        }
        .table {
            width: 100%;
            max-width: 100%;
            margin-bottom: 1rem;
            background-color: transparent;
        }
        .table th,
        .table td {
            padding: 0.75rem;
            vertical-align: top;
            border-top: 1px solid #dee2e6;
        }
        .table thead th {
            vertical-align: bottom;
            border-bottom: 2px solid #dee2e6;
        }
        .table tbody + tbody {
            border-top: 2px solid #dee2e6;
        }
        .table-striped tbody tr:nth-of-type(odd) {
            background-color: rgba(0, 0, 0, 0.05);
        }
        .table-hover tbody tr:hover {
            background-color: rgba(0, 0, 0, 0.075);
        }
        .thead-dark th {
            color: #fff;
            background-color: #343a40;
            border-color: #454d55;
        }
        .alert {
            position: relative;
            padding: 0.75rem 1.25rem;
            margin-bottom: 1rem;
            border: 1px solid transparent;
            border-radius: 0.25rem;
        }
        .alert-success {
            color: #155724;
            background-color: #d4edda;
            border-color: #c3e6cb;
        }
        .alert-warning {
            color: #856404;
            background-color: #fff3cd;
            border-color: #ffeeba;
        }
    
        /* Tabel khusus */
        .custom-table {
            border-collapse: collapse; /* Gabungkan batas sel tabel */
            width: 100%;
            background-color: #fff;
        }
        
        .custom-table th, .custom-table th {
            border: 4px solid black; /* Warna garis biru */
            padding: 2px;
            text-align: center; /* Rata tengah teks */
        }
        
        .custom-table th {
            background-color: darkslategrey; /* Background header hitam */
            color: white; /* Warna teks header putih */
        }
        
        
    /* Search bar styling */
  
    .input-group {
        max-width: 400px;
        margin: 0 auto; /* Tengah secara horizontal */
    }



    .input-group-text {
        background-color: black; /* Warna latar belakang biru */
        border: 2px solid black; /* Warna border biru */
        border-radius: 0 30px 30px 0; /* Membuat ujung kanan bulat */
        color: white; /* Warna ikon */
        cursor: pointer;
    }

    .input-group-text i {
        font-size: 16px; /* Ukuran ikon */
    }

    /* Untuk tampilan hover di input field */
    .form-control:focus {
        border-color: #34495e; /* Warna border saat focus */
        box-shadow: none; /* Hilangkan shadow default */
    }
       
    
       
    
    </style>
</body>
</html>
