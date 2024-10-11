<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/x-icon" href="/assets/admin_fav.png">
    <title>Logbook Admin</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('css2/styles-admin.css') }}">
    <link rel="stylesheet" href="{{ asset('css/cssku.css') }}">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.3.2/css/buttons.dataTables.min.css">
        <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap JS (untuk modal) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- FontAwesome -->
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
</head>
@if (Route::has('login'))
<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark" style="background-color: #203826;">
        <!-- Navbar Brand-->
        <a class="navbar-brand ps-3" href="/adm"><img class="img-fluid me-3" src="{{ URL::to('/assets/Mitraku.png') }}" style="width: 100px">Admin</a>
        <!-- Sidebar Toggle-->
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle"><i class="fas fa-bars"></i></button>
        <!-- Navbar-->
        <ul class="navbar-nav ms-auto me-3 me-lg-4">
            @auth
            <li class="nav-item dropdown">
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                {{ Auth::user()->name }}
                </a>

                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </li>
            @endauth
        </ul>
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" style="background-color: #082a11;" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <a class="nav-link" href="/kerjatidaktepat">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Dashboard
                        </a>
                        <a class="nav-link" href="/kerjasama/pivot-report">
                            <div class="sb-nav-link-icon"><i class="fa-solid fa-table"></i></div>
                            Pivot Report
                        </a>
                        <a class="nav-link" href="/kerjatidaktepat">
                            <div class="sb-nav-link-icon"><i class="fa-brands fa-stack-overflow"></i></div>
                            Kerjasama Tidak Tepat
                        </a>
                        <a class="nav-link" href="/kerjasama">
                            <div class="sb-nav-link-icon"><i class="fa-solid fa-users"></i></div>
                            Kerjasama
                        </a>
                        <a class="nav-link" href="/mitra">
                            <div class="sb-nav-link-icon"><i class="fa-solid fa-handshake"></i></div>
                            Mitra
                        </a>
                        <a class="nav-link" href="/surveys">
                            <div class="sb-nav-link-icon"><i class="fa-solid fa-clipboard-list"></i></div>
                            Survey
                        </a>
                        <a class="nav-link" href="/subsurvey1s">
                            <div class="sb-nav-link-icon"><i class="fa-solid fa-clipboard-list"></i></div>
                            Sub Survey 1
                        </a>
                        <a class="nav-link" href="/subsurvey2s">
                            <div class="sb-nav-link-icon"><i class="fa-solid fa-clipboard-list"></i></div>
                            Sub Survey 2
                        </a>
                        <a class="nav-link" href="{{ route('user.index') }}">
                            <div class="sb-nav-link-icon"><i class="fa-solid fa-user"></i></div>
                            User
                        </a>
                        <a class="nav-link" href="{{ route('kecamatan.index') }}">
                            <div class="sb-nav-link-icon"><i class="fa-solid fa-location-dot"></i></div>
                            Kecamatan
                        </a>
                        <a class="nav-link" href="{{ route('jenis.index') }}">
                            <div class="sb-nav-link-icon"><i class="fa-solid fa-hurricane"></i></div>
                            Jenis
                        </a>
                    </div>
                </div>
                <div class="sb-sidenav-footer">
                    <div class="small">Logged in as:</div>
                    {{ auth::user()->name }}
                </div>
            </nav>
        </div>

        <!-- main content -->
        <div id="layoutSidenav_content">
            <main>
                @yield('content')
            </main>
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid px-4">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright &copy; SiBook2024</div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    @endif

   <!-- Bootstrap JS -->
   <script src="{{ asset('assets/js/bootstrap.js') }}"></script>

   <!-- jQuery -->
   <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

   <!-- DataTables JS -->
   <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
   <script src="https://cdn.datatables.net/buttons/2.3.2/js/dataTables.buttons.min.js"></script>

   <!-- Sidebar Toggle Script -->
   <script>
       document.getElementById('sidebarToggle').addEventListener('click', function() {
           document.body.classList.toggle('sb-sidenav-toggled');
       });
   </script>

   <!-- Inisialisasi DataTables -->
   <script>
    $(document).ready(function() {
        $('#datatablesSimple').DataTable({
            "pagingType": "full_numbers",
            "order": [[ 3, "desc" ]] // Kolom ke-4 untuk pengurutan berdasarkan tanggal
        });
    });
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
