<!DOCTYPE html>
<html lang="en">
<head>
    <title>@yield('title', 'Mitraku')</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

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

    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.3.2/css/buttons.dataTables.min.css">

    @stack('styles')
</head>
<body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light site-navbar-target" id="ftco-navbar">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">Mitraku<span></span></a>
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
                        @if (Auth::check())
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <span><b>{{ Auth::user()->name }}</b></span>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                                <li>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>
                                </li>
                            </ul>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
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

    <!-- Content Section -->
    <div class="container mt-5 pt-5">
        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.2/js/dataTables.buttons.min.js"></script>

    @stack('scripts')

</body>
</html>
