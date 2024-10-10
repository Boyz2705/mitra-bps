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