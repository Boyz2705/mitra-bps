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

    <div class="container mt-5 pt-5">
        <h2 class="text-center mb-4"><strong>Daftar Mitra</strong></h2>
        <div class="border-custom mb-5"></div>

            <!-- Minimalist Search Bar (Visual Only) -->
    <div class="row justify-content-center mb-4">
        <div class="col-md-6">
            <div class="input-group">
                <input type="text" class="form-control" placeholder="Cari mitra..." aria-label="Cari mitra">
                <div class="input-group-append">
                    <button class="btn btn-outline-secondary" type="button">
                        <i class="fa fa-search"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
        
        @if($mitras->isEmpty())
            <div class="alert alert-warning mb-4">Tidak ada mitra yang ditemukan.</div>
        @else
            <div class="table-responsive">
                <table class="table table-striped table-hover custom-table">
                    <thead class="thead-dark">
                        <tr>
                            <th>No</th>
                            <th>Nama Mitra</th>
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
                                <td style="color: black;"><strong>{{ $key + 1 }}</strong></td>
                                <td style="color: black;">{{ $mitra->nama_mitra }}</td>
                                <td style="color: black;">{{ $mitra->kecamatan }}</td>
                                <td style="color: black;">{{ $mitra->kelurahan }}</td>
                                <td style="color: black;">{{ $mitra->email }}</td>
                                <td style="color: black;">{{ $mitra->posisi }}</td>
                                <td style="color: black;">{{ $mitra->kinerja }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>
</div>

    @push('styles')
    <style>
        .custom-margin {
    margin-top: 500px; /* Ganti dengan nilai yang Anda inginkan */
}
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
        
        .custom-table th, .custom-table td {
            border: 4px solid black; /* Warna garis */
            padding: 2px;
            text-align: center; /* Rata tengah teks */
        }
        
        .custom-table th {
            background-color: darkslategrey; /* Background header */
            color: white; /* Warna teks header putih */
        }

        .border-custom {
        border-bottom: 2px solid #007bff;
        width: 50px;
        margin: 0 auto;
    }
    .custom-table {
        /* Your existing table styles */
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
</body>
</html>
