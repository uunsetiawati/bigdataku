<!DOCTYPE html>
<html lang="zxx">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="icon" href="<?=base_url('assets/images/favicon.png')?>">
	<title>Maxui</title>

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
	<div class="navbar">
		<div class="left">
			<a href="" class="link link-back"><i class="icon ion-ios-arrow-back"></i></a>
		</div>
		<div class="title">
			Oops!
		</div>
		<div class="right">
			
		</div>
	</div>
	<!-- end navbar -->

	<!-- pages wrapper -->
	<div class="pages-wrapper">

		<!-- separator -->
		<div class="separator-large"></div>
		<!-- end separator -->
		
		<!-- page not found -->
		<div class="page-not-found text-center">
			<div class="container">

				<h2 class="text-extra-large">404</h2>
				<h5 class="mb-2">Page not Found</h5>
				<p class="text-small"> The page you looking for is not found. Return to the homepage or contact us</p>

				<div class="button-default">
					<div class="row">
						<div class="col-6">
							<a href="<?=site_url('home')?>" class="button">Home</a>
						</div>
						<div class="col-6">
							<a href="" class="button button-outline">Contact Us</a>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- end page not found -->

	</div>
	<!-- end pages wrapper -->

	<script src="<?=base_url('assets/js/jquery-3.4.1.min.js')?>"></script>
	<script src="<?=base_url('assets/js/bootstrap.bundle.min.js')?>"></script>
	<script src="<?=base_url('assets/js/fakeLoader.js')?>"></script>
	<script src="<?=base_url('assets/js/swiper.min.js')?>"></script>
	<script src="<?=base_url('assets/js/main.js')?>"></script>

</body>
</html>