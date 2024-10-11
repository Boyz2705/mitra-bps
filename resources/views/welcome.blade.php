<!DOCTYPE html>
<html lang="en">
<head>
	<title>Mitraku</title>
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
	<section id="home-section" class="hero">
		<div class="home-slider owl-carousel">
			<div class="slider-item">
				<div class="overlay"></div>
				<div class="container-fluid px-md-0">
					<div class="row d-md-flex no-gutters slider-text align-items-end justify-content-end" data-scrollax-parent="true">
						<div class="one-third order-md-last img" style="background-image:url(images/1.png);">
							<div class="overlay"></div>
							<div class="overlay-1"></div>
						</div>
						<div class="one-forth d-flex  align-items-center ftco-animate" data-scrollax=" properties: { translateY: '70%' }">
							<div class="text" style="display: flex; justify-content: space-between; align-items: center;">
                                <div>
                                    <span class="subheading">Selamat Datang di</span>
                                    <h1 class="mb-4 mt-3">Mitraku<span> <span>BPS</span></h1>
                                    <h5> <b> Website Kemitraan </b></h5>
                                    <b class="subheading">BPS Kota Surabaya</b>
                                    <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addKerjasamaModal">Mulai Kerjasama</a>
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
						<div class="one-third order-md-last img" style="background-image:url(images/2.png);">
							<div class="overlay"></div>
							<div class="overlay-1"></div>
						</div>
						<div class="one-forth d-flex align-items-center ftco-animate" data-scrollax=" properties: { translateY: '70%' }">
							<div class="text">
								<span class="subheading">Quality Control &amp; Management Website</span>
								<h1 class="mb-4 mt-3">We Cares <span>Our Team</span></h1>
                                <b class="subheading">BPS Kota Surabaya</b>
								<a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addKerjasamaModal">Mulai Kerjasama</a>
            					<a href="#" class="btn btn-primary btn-outline-primary">Lihat Kerjasama</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section class="ftco-about ftco-section ftco-no-pt ftco-no-pb" id="about-section" style="margin-top: 30px;">
		<div class="container">
			<div class="row d-flex no-gutters">
				<div class="col-md-6 col-lg-5 d-flex">
					<div class="img-about img d-flex align-items-stretch">
						<div class="overlay"></div>
						<div class="img d-flex align-self-stretch align-items-center" style="background-image: url('assets/MITRA1.jpg');">
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

	<footer class="ftco-footer ftco-section">
		<div class="container">
			<div class="row mb-5">
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
                        <form method="POST" class="row g-3" action="{{ route('kerjasama.storeuser') }}">
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

	<!-- loader -->
	{{-- <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div> --}}

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
</body>
</html>
