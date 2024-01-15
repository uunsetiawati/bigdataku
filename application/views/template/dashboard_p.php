<!DOCTYPE html>
<html lang="zxx">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="icon" href="<?=base_url('assets/images/logoupt.png')?>">
	<title>BIGDATA UPT</title>

	<link href="https://fonts.googleapis.com/css?family=Roboto:400,500,700,900&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" href="<?=base_url('assets/css/bootstrap.min.css')?>">
	<link rel="stylesheet" href="<?=base_url('assets/css/ionicons.min.css')?>">
	<link rel="stylesheet" href="<?=base_url('assets/css/fakeLoader.css')?>">
	<link rel="stylesheet" href="<?=base_url('assets/css/swiper.min.css')?>">
	<link rel="stylesheet" href="<?=base_url('assets/css/style.css')?>">
	

	<!-- jQuery -->
    <script type="text/javascript"
        src="https://code.jquery.com/jquery-3.5.1.js">
    </script>

    <!-- DataTables CSS -->
    <link rel="stylesheet" href=
"https://cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css">

    <!-- DataTables JS -->
    <script src=
"https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js">
    </script>
	<style>
		.form-control2 {
		font-family: system-ui, sans-serif;
		font-size: 1rem;
		font-weight: 400;
		line-height: 1.1;
		display: grid;
		grid-template-columns: 1em auto;
		gap: 0.5em;
		}
		
		input[type="checkbox"] {
		/* Add if not using autoprefixer */
		-webkit-appearance: none;
		/* Remove most all native input styles */
		appearance: none;
		/* For iOS < 15 */
		background-color: var(--form-background);
		/* Not removed via appearance */
		margin: 0;

		font: inherit;
		color: currentColor;
		width: 1.15em;
		height: 1.15em;
		border: 0.15em solid currentColor;
		border-radius: 0.15em;
		transform: translateY(-0.075em);

		display: grid;
		place-content: center;
		}

		input[type="checkbox"]::before {
		content: "";
		width: 0.65em;
		height: 0.65em;
		clip-path: polygon(14% 44%, 0 65%, 50% 100%, 100% 16%, 80% 0%, 43% 62%);
		transform: scale(0);
		transform-origin: bottom left;
		transition: 120ms transform ease-in-out;
		box-shadow: inset 1em 1em var(--form-control-color);
		/* Windows High Contrast Mode */
		background-color: CanvasText;
		}

		input[type="checkbox"]:checked::before {
		transform: scale(1);
		}

		input[type="checkbox"]:focus {
		outline: max(2px, 0.15em) solid currentColor;
		outline-offset: max(2px, 0.15em);
		}
	</style>   
</head>
<body>
	
	<!-- fakeloader -->
	<!-- <div class="fakeLoader"></div> -->
	<!-- end fakeloader -->
	
	<!-- navbar -->
	<div class="navbar navbar-home navbar-highlight">
		<div class="left">
			<!-- <a href="#menu" class="link menu-link"><i class="icon ion-ios-menu"></i></a> -->
			<!-- <img src="<?=base_url('assets/images/logoupt.png')?>" width="100px"> -->
		</div>
		<div class="title">
			UPT PELATIHAN KOPERASI DAN UKM PROVINSI JAWA TIMUR
		</div>
		<div class="right">
			<!-- <a href="<?=site_url('auth/logout')?>" class="title">Keluar <i class="icon ion-ios-log-out"></i></a> -->
		</div>
	</div>
	<!-- end navbar -->
	

	<!-- page wrapper -->
	<div class="page-wrapper">

		<!-- separator -->
		<div class="separator-small"></div>
		<!-- end separator -->

		<?= $contents?>			

		

		

	</div>
	<!-- end page wrapper -->

	<!-- toolbar bottom -->
	<!-- <div class="toolbar">
		<div class="container">
			<ul class="toolbar-bottom toolbar-wrap">
				<li class="toolbar-item">
					<a href="index.html" class="toolbar-link toolbar-link-active">
						<i class="icon ion-ios-home"></i>
					</a>
				</li>
				<li class="toolbar-item">
					<a href="features.html" class="toolbar-link">
						<i class="icon ion-ios-star"></i>
					</a>
				</li>
				<li class="toolbar-item">
					<a href="pages.html" class="toolbar-link">
						<i class="icon ion-ios-browsers"></i>
					</a>
				</li>
				<li class="toolbar-item">
					<a href="apps.html" class="toolbar-link">
						<i class="icon ion-ios-apps"></i>
					</a>
				</li>
			</ul>
		</div>
	</div> -->
	<!-- end toolbar bottom -->
	<hr>

	<!-- footer -->
	<div class="footer">
		<div class="container">
			<div class="content-box shadow-sm">
				<h4 class="mb-1">Follow Us</h4>
				<!-- <span>Mobile Template</span> -->

				<!-- separator -->
				<div class="separator-small"></div>
				<!-- end separator -->

				<div class="social-media-icon">
					<ul>
						<li><a href="https://facebook.com/uptpkukmjatim/"><i class="icon ion-logo-facebook bg-facebook"></i></a></li>
						<li><a href="https://www.instagram.com/uptkukmjatim/"><i class="icon ion-logo-instagram bg-instagram"></i></a></li>
						<li><a href="https://www.youtube.com/@UPTPKUKMJATIM"><i class="icon ion-logo-youtube bg-youtube"></i></a></li>
						<li><a href="https://wa.me/6281331220006"><i class="icon ion-logo-whatsapp bg-whatsapp"></i></a></li>
					</ul>
				</div>

				<!-- separator -->
				<div class="separator-small"></div>
				<!-- end separator -->

				<p class="made-by text-small">Made With <i class="icon ion-ios-heart"></i> UPTKUKM JATIM</p>
			</div>
		</div>
	</div>

	<!-- end footer -->

	<!-- <script src="<?=base_url('assets/js/jquery-3.4.1.min.js')?>"></script> -->
	<script src="<?=base_url('assets/js/bootstrap.bundle.min.js')?>"></script>
	<script src="<?=base_url('assets/js/fakeLoader.js')?>"></script>
	<script src="<?=base_url('assets/js/swiper.min.js')?>"></script>
	<script src="<?=base_url('assets/js/jquery.big-slide.js')?>"></script>
	<script src="<?=base_url('assets/js/main.js')?>"></script>

</body>
</html>