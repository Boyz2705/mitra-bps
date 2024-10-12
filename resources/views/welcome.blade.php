<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Mitraku</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900" rel="stylesheet">

        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

        <!-- CSS Libraries -->
        <link rel="stylesheet" href="css3/animate.css">
        <link rel="stylesheet" href="css3/owl.carousel.min.css">
        <link rel="stylesheet" href="css3/owl.theme.default.min.css">
        <link rel="stylesheet" href="css3/magnific-popup.css">
        <link rel="icon" type="image/x-icon" href="./favicon.png" />

        <link rel="stylesheet" href="css3/flaticon.css">
        <link rel="stylesheet" href="css3/style.css">


        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/css/bootstrap.min.css">



    </head>
<body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">

	<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light site-navbar-target" id="ftco-navbar">
		<div class="container">
            <a class="navbar-brand ps-3" href="/"><img class="img-fluid me-3" src="{{ URL::to('/assets/Mitrakudark.png') }}" style="width: 100px"></a>
			<button class="navbar-toggler js-fh5co-nav-toggle fh5co-nav-toggle" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
				<span class="oi oi-menu"></span> Menu
			</button>

			<div class="collapse navbar-collapse" id="ftco-nav">
				<ul class="navbar-nav nav ml-auto">
					<li class="nav-item"><a href="{{ url('/') }}" class="nav-link"><span>Home</span></a></li>
					<li class="nav-item"><a href="#about-section" class="nav-link"><span>About</span></a></li>
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
	<section id="home-section" class="hero">
		<div class="home-slider owl-carousel">
            <div class="slider-item">
                <div class="overlay"></div>
                <div class="container-fluid px-md-0">
                    <div class="row d-md-flex no-gutters slider-text align-items-end justify-content-end" data-scrollax-parent="true">
                        <!-- Background image fixed -->
                        <div class="one-third order-md-last img" style="background-image: url('{{ asset('assets/bg3.png') }}');">
                            <div class="overlay"></div>
                            <div class="overlay-1"></div>
                        </div>
                        <div class="one-forth d-flex align-items-center ftco-animate" data-scrollax=" properties: { translateY: '70%' }">
                            <div class="text" style="display: flex; justify-content: space-between; align-items: center;">
                                <div>
                                    <span class="subheading">Selamat Datang di</span>
                                    <h1 class="mb-4 mt-3">Mitraku<span> <span>BPS</span></h1>
                                    <h5> <b> Website Kemitraan </b></h5>
                                    <b class="subheading">BPS Kota Surabaya</b>
                                    <a href="/mulaikerjasama" class="btn btn-primary" style="background-color:  #175e69">Mulai Kerjasama</a>
                                    <a href="/kerjasamaorg" class="btn btn-primary btn-outline-primary">Lihat Kerjasama</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="slider-item" style="margin-bottom: 200px;">
                <div class="overlay"></div>
                <div class="container-fluid px-md-0">
                    <div class="row d-flex no-gutters slider-text align-items-end justify-content-end" data-scrollax-parent="true">
                        <!-- Background image unchanged -->
                        <div class="one-third order-md-last img" style="background-image: url('{{ asset('assets/bg2.png') }}');">
                            <div class="overlay"></div>
                            <div class="overlay-1"></div>
                        </div>
                        <div class="one-forth d-flex align-items-center ftco-animate" data-scrollax=" properties: { translateY: '70%' }">
                            <div class="text">
                                <span class="subheading">Quality Control &amp; Management Website</span>
                                <h1 class="mb-4 mt-3">We Cares <span>Our Team</span></h1>
                                <b class="subheading">BPS Kota Surabaya</b>
                                <a href="/mulaikerjasama" class="btn btn-primary" style="background-color:  #175e69" >Mulai Kerjasama</a>
                                <a href="/kerjasamaorg" class="btn btn-primary btn-outline-primary">Lihat Kerjasama</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

		</div>
	</section>
	<section class="ftco-about ftco-section ftco-no-pt ftco-no-pb" id="about-section" style="margin-top: 70px; , margin-bottom: 70px " >
		<div class="container">
			<div class="row d-flex no-gutters">
				<div class="col-md-6 col-lg-5 d-flex">
					<div class="img-about img d-flex align-items-stretch">
						<div class="overlay"></div>
						<div class="img d-flex align-self-stretch align-items-center" style="background-image: url('assets/MITRA1.png');">
						</div>
					</div>
				</div>
				<div class="col-md-6 col-lg-7 pl-md-4 pl-lg-5 py-5">
					<div class="py-md-5">
						<div class="row justify-content-start pb-3">
							<div class="col-md-12 heading-section ftco-animate">
								<span class="subheading">Our Teams</span>
								<h2 class="mb-4" style="font-size: 34px; text-transform: capitalize;">About Us</h2>
								<p>"Mitraku adalah platform kemitraan yang dikembangkan oleh BPS Kota Surabaya, dirancang untuk memonitor dan mengelola kemitraan secara efektif. Website ini menyediakan antarmuka yang terstruktur untuk memantau aktivitas mitra, memastikan komunikasi dan kolaborasi yang lancar antar pemangku kepentingan, serta meningkatkan transparansi dan efisiensi operasional dalam layanan statistik." </p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<footer class="ftco-footer ftco-section" style="margin-top: 70px">
		<div class="container">
			<div class="row mb-1">
				<div class="col-md">
					<div class="ftco-footer-widget mb-4">
						<h2 class="ftco-heading-2">Mitraku BPS</h2>
						<p>"Mitraku merupakan inisiatif dari BPS Kota Surabaya, diciptakan untuk mengawasi dan mengelola kemitraan secara efisien. Situs ini menyediakan antarmuka yang terorganisir untuk mengawasi kegiatan mitra, menjamin komunikasi yang baik dan kolaborasi antara semua pihak terkait, serta meningkatkan transparansi dan efisiensi dalam layanan statistik."</p>
						<p><a href="#" class="btn btn-primary">Learn more</a></p>
					</div>
				</div>
				<div class="col-md">
				</div>
				<div class="col-md">
					<div class="ftco-footer-widget mb-4">
						<h2 class="ftco-heading-2">Have a Questions?</h2>
						<div class="block-23 mb-3">
							<ul>
								<li><span class="icon fa fa-map marker"></span><span class="text">Jl. Ahmad Yani No.152E, Gayungan, Kec. Gayungan, Surabaya, Jawa Timur 60235</span></li>
								<li><a href="#"><span class="icon fa fa-phone"></span><span class="text">0318296692 </span></a></li>
								<li><a href="#"><span class="icon fa fa-paper-plane pr-4"></span><span class="text">bps3578@bps.go.id   </span></a></li>
							</ul>
						</div>
						<ul class="ftco-footer-social list-unstyled mt-6">
							<li class="ftco-animate"><a href="https://www.instagram.com/bpskotasurabaya/"><span class="fa fa-instagram"></span> </a> <p class="text"> bpskotasurabaya</p></li>
						</ul>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12 text-center">
					<p>
						Copyright &copy;<script>document.write(new Date().getFullYear());</script> <div><b>Pram,Febry,Jimmy,Rifky</b></div>
					</p>
				</div>
			</div>
		</div>
	</footer>



	<script src="js3/jquery.min.js"></script>
	<script src="js3/jquery-migrate-3.0.1.min.js"></script>
	<script src="js3/popper.min.js"></script>
	<script src="js3/bootstrap.min.js"></script>
	<script src="js3/jquery.easing.1.3.js"></script>
	<script src="js3/jquery.waypoints.min.js"></script>
	<script src="js3/jquery.stellar.min.js"></script>
	<script src="js3/owl.carousel.min.js"></script>
	<script src="js3/jquery.magnific-popup.min.js"></script>
	<script src="js3/jquery.animateNumber.min.js"></script>
	<script src="js3/scrollax.min.js"></script>
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
	<script src="js3/google-map.js"></script>
	<script src="js3/main.js"></script>
	<script src="js3/mengambil.js"></script>

	<!-- Tambahkan script Bootstrap di sini -->
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>

	<!-- Tambahkan script inisialisasi modal -->
	<script>
	document.addEventListener('DOMContentLoaded', function() {
		var myModal = new bootstrap.Modal(document.getElementById('addKerjasamaModal'));
		var modalToggle = document.querySelector('[data-bs-toggle="modal"][data-bs-target="#addKerjasamaModal"]');
		modalToggle.addEventListener('click', function(event) {
			event.preventDefault();
			myModal.show();
		});
	});
	</script>

@if (session('message'))
<div class="alert alert-warning">
    {{ session('message') }}
</div>
@endif

</body>
</html>
