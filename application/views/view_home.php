<!DOCTYPE html>
<html lang="zxx">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="icon" href="<?=base_url('assets/images/favicon.png')?>">
	<title>BIGDATA UPT</title>

	<link href="https://fonts.googleapis.com/css?family=Roboto:400,500,700,900&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="<?=base_url('assets/css/bootstrap.min.css')?>">
	<link rel="stylesheet" href="<?=base_url('assets/css/ionicons.min.css')?>">
	<link rel="stylesheet" href="<?=base_url('assets/css/fakeLoader.css')?>">
	<link rel="stylesheet" href="<?=base_url('assets/css/swiper.min.css')?>">
	<link rel="stylesheet" href="<?=base_url('assets/css/style.css')?>">

</head>
<body>
	
	<!-- fakeloader -->
	<div class="fakeLoader"></div>
	<!-- end fakeloader -->
	
	<!-- navbar -->
	<div class="navbar navbar-home navbar-highlight">
		<div class="left">
			<img src="<?=base_url('assets/images/favicon.png')?>">
		</div>
		<div class="title">
			BIGDATA UPTPKUKM JATIM
		</div>
		<div class="right">
			<a href="<?=site_url('auth/login')?>" class="title">Masuk <i class="icon ion-ios-log-in"></i></a>
		</div>
	</div>
	<!-- end navbar -->

	

	<!-- page wrapper -->
	<div class="page-wrapper">

		<!-- separator -->
		<div class="separator-small"></div>
		<!-- end separator -->

		<!-- feature list -->
		<div class="feature-list">
			<div class="swiper-container swiper-style-full">
				<div class="swiper-wrapper">
					<div class="swiper-slide">
						<div class="content bg-lightblue">
							<div class="wrap-icon">
								<i class="icon ion-ios-brush bg-blue"></i>
							</div>
							<div class="text">
								<h5>Pelatihan Online</h5>
								<p>Pelatihan yang dilaksanakan secara daring melalui aplikasi Zoom Meeting</p>
							</div>
						</div>
					</div>
					<div class="swiper-slide">
						<div class="content bg-lightgreen">
							<div class="wrap-icon">
								<i class="icon ion-ios-checkbox bg-green"></i>
							</div>
							<div class="text">
								<h5>Pelatihan Offline</h5>
								<p>Pelatihan yang dilaksanakan secara klasikal di masing-masing daerah dan terbatas kuota peserta</p>
							</div>
						</div>
					</div>
					<div class="swiper-slide">
						<div class="content bg-lightred">
							<div class="wrap-icon">
								<i class="icon ion-ios-keypad bg-red"></i>
							</div>
							<div class="text">
								<h5>Webinar</h5>
								<p>Dilaksanakan dengan memanfaatkan aplikasi Zoom Meeting dan Streaming Youtube dengan kapasitas tak terbatas.</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- feature list -->

		<!-- separator -->
		<div class="separator-large"></div>
		<!-- end separator -->

		<!-- intro app -->
		<div class="intro-app">
			<div class="container">
				<div class="intro-content">
					<div class="mask"></div>
					<img src="<?=base_url('assets/images/intro.jpg')?>" alt="image-demo">
					<div class="caption">
						<h4 class="text-white mb-1">Welcome to BIG DATA</h4>
						<p class="text-white">UPT Pelatihan Koperasi dan UKM Provinsi Jawa Timur</p>
					</div>
				</div>
			</div>
		</div>
		<!-- end intro app -->
		

		<!-- separator -->
		<div class="separator-large"></div>
		<!-- end separator -->

		<!-- counter -->
		<div class="counter">
			<div class="container">
				<div class="row">
					<div class="col-6">
						<div class="content bg-blue text-center">
							<h3 class="color-white"><?=$online?></h3>
							<h5 class="color-white">PESERTA PELATIHAN ONLINE</h5>
						</div>
					</div>
					<div class="col-6">
						<div class="content bg-red text-center">
							<h3 class="color-white"><?=$offline?></h3>
							<h5 class="color-white">PESERTA PELATIHAN OFFLINE</h5>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-6">
						<div class="content bg-yellow text-center">
							<h3 class="color-white"><?=$total?></h3>
							<h5 class="color-white">PESERTA PELATIHAN</h5>
						</div>
					</div>
					<div class="col-6">
						<div class="content bg-purple text-center">
							<h3 class="color-white"><?=$webinar?></h3>
							<h5 class="color-white">WEBINAR</h5>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- end counter -->			

		<!-- separator -->
		<div class="separator-small"></div>
		<!-- end separator -->	

		<!-- footer -->
		<div class="footer">
			<div class="container">
				<div class="content-box shadow-sm">
					<h4 class="mb-1">UPTPKUKMJATIM</h4>
					<!-- <span>UPTPKUKMJATIM</span> -->

					<!-- separator -->
					<div class="separator-small"></div>
					<!-- end separator -->

					<div class="social-media-icon">
						<ul>
							<li><a href="https://www.facebook.com/uptpkukmjatim/" target="_blank"><i class="icon ion-logo-facebook bg-facebook"></i></a></li>
							<li><a href="https://www.instagram.com/uptkukmjatim/" target="_blank"><i class="icon ion-logo-instagram bg-instagram"></i></a></li>
							<li><a href="https://www.youtube.com/@UPTPKUKMJATIM" target="_blank"><i class="icon ion-logo-youtube bg-youtube"></i></a></li>
							<li><a href="https://wa.me/6281331220006" target="_blank"><i class="icon ion-logo-whatsapp bg-whatsapp"></i></a></li>
						</ul>
					</div>

					<!-- separator -->
					<div class="separator-small"></div>
					<!-- end separator -->

					<p class="made-by text-small">Made With <i class="icon ion-ios-heart"></i> IT UPT</p>
				</div>
			</div>
		</div>
		<!-- end footer -->

		<!-- separator -->
		<div class="separator-large"></div>
		<!-- end separator -->

	</div>
	<!-- end page wrapper -->

	

	<script src="<?=base_url('assets/js/jquery-3.4.1.min.js')?>"></script>
	<script src="<?=base_url('assets/js/bootstrap.bundle.min.js')?>"></script>
	<script src="<?=base_url('assets/js/fakeLoader.js')?>"></script>
	<script src="<?=base_url('assets/js/swiper.min.js')?>"></script>
	<script src="<?=base_url('assets/js/jquery.big-slide.js')?>"></script>
	<script src="<?=base_url('assets/js/main.js')?>"></script>

</body>
</html>