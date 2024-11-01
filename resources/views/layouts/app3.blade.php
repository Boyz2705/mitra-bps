<!DOCTYPE html>
<html lang="en">
<head>
    <title>@yield('title', 'Mitraku')</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Stylesheets -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ asset('css3/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('css3/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css3/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css3/magnific-popup.css') }}">
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.png') }}">
    <link rel="stylesheet" href="{{ asset('css3/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('css3/style.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.3.2/css/buttons.dataTables.min.css">

    @stack('styles')
</head>
<body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light site-navbar-target" id="ftco-navbar">
        <div class="container">
            <a class="navbar-brand ps-3" href="/"><img class="img-fluid me-3" src="{{ URL::to('/assets/Mitrakudark.png') }}" style="width: 100px"></a>
            <button class="navbar-toggler js-fh5co-nav-toggle fh5co-nav-toggle" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="oi oi-menu"></span> Menu
            </button>

            <div class="collapse navbar-collapse" id="ftco-nav">
                <ul class="navbar-nav nav ml-auto">
                    <li class="nav-item"><a href="{{ url('/') }}" class="nav-link"><span>Home</span></a></li>
                    <li class="nav-item"><a href="{{ url('/') }}#about-section" class="nav-link"><span>About</span></a></li>
                    <li class="nav-item"><a href="{{ url('/kerjasamaku') }}" class="nav-link"><span>Kerjasamaku</span></a></li>
                    <li class="nav-item"><a href="{{ url('/mitraku') }}" class="nav-link"><span>Mitra</span></a></li>
                    <li class="nav-item dropdown">
                        @auth
                            <!-- Tampilkan nama user dengan gaya yang sesuai -->
                            <a class="nav-link dropdown-toggle fw-bold" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                {{ Auth::user()->name }}
                            </a>

                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                                <li>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>
                                </li>
                            </ul>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>

                        @else
                            <!-- Tampilkan link "Login" dengan styling sesuai dengan navbar -->
                            <a href="{{ route('login') }}" class="nav-link text-success fw-bold">
                                <span>Login</span>
                            </a>
                        @endauth
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Content Section -->
    <div class="container mt-5 pt-5">
        @yield('content')
    </div>

    <!-- Scripts -->
    <!-- Scripts -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script>
    $(document).ready(function() {
        try {
            $('#datatablesSimple').DataTable({
                pageLength: 10,
                language: {
                    search: "Cari:",
                    lengthMenu: "Tampilkan _MENU_ entri",
                    info: "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri",
                    paginate: {
                        previous: "Sebelumnya",
                        next: "Selanjutnya"
                    }
                }
            });
        } catch (error) {
            console.error('DataTables initialization error:', error);
        }
    });
</script>

@stack('scripts')


<script>
    document.addEventListener("DOMContentLoaded", function () {
    // Ambil tahun yang ingin digunakan untuk laporan
    const currentYear = new Date().getFullYear(); // Current year
    const nextYear = currentYear + 1; // Current year + 1

    // Fungsi AJAX untuk mendapatkan pivot report untuk tahun sekarang dan tahun depan
    Promise.all([
        fetch(`/kerjasamaku/pivot-report?year=${currentYear}`),
        fetch(`/kerjasamaku/pivot-report?year=${nextYear}`)
    ])
    .then(responses => Promise.all(responses.map(res => res.json())))
    .then(data => {
        const pivotDataCurrentYear = data[0].pivotData; // Data untuk tahun sekarang
        const pivotDataNextYear = data[1].pivotData; // Data untuk tahun depan

        // Format teks untuk ditampilkan di marquee dengan warna yang berbeda
        const reportText = `
            <span style="color: #007bff;">Tahun ${currentYear}</span> -
            <span style="color: #28a745;">Tepat Sasaran: ${pivotDataCurrentYear[1].count}</span> mitra,
            <span style="color: #dc3545;">Tidak Tepat Sasaran: ${pivotDataCurrentYear[0].count}</span> mitra |
            <span style="color: #007bff;">Tahun ${nextYear}</span> -
            <span style="color: #28a745;">Tepat Sasaran: ${pivotDataNextYear[1].count}</span> mitra,
            <span style="color: #dc3545;">Tidak Tepat Sasaran: ${pivotDataNextYear[0].count}</span> mitra
        `;

        // Tampilkan teks di dalam marquee
        document.getElementById("reportText").innerHTML = reportText;
    })
    .catch(error => console.error('Error fetching pivot report:', error));
});

</script>

@if (session('message'))
    <div class="alert alert-warning">
        {{ session('message') }}
    </div>
@endif

</body>
</html>
