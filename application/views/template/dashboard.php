<!DOCTYPE html>
<html lang="zxx">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="icon" href="<?=base_url('assets/images/favicon.png')?>">
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
   
</head>
<body>
	
	<!-- fakeloader -->
	<!-- <div class="fakeLoader"></div> -->
	<!-- end fakeloader -->
	
	<!-- navbar -->
	<div class="navbar navbar-home navbar-highlight">
		<div class="left">
			<a href="#menu" class="link menu-link"><i class="icon ion-ios-menu"></i></a>
		</div>
		<div class="title">
			BIGDATA UPTPKUKM JATIM
		</div>
		<div class="right">
			<a href="<?=site_url('auth/logout')?>" class="title">Keluar <i class="icon ion-ios-log-out"></i></a>
		</div>
	</div>
	<!-- end navbar -->

	<!-- sidebar -->
	<div class="side-overlay"></div>
	<div id="menu" class="panel sidebar" role="navigation">

		<!-- separator -->
		<div class="separator-large"></div>
		<!-- end separator -->

		<div class="list-view list-separate-two list-colored">
			<ul>
				<li>
					<a href="<?=site_url('dashboard');?>" class="list-item" id="accordionParent2">
						<div class="list-media">
							<i class="icon ion-ios-home bg-blue"></i>
						</div>
						<div class="list-label">
							<div class="list-title" data-target="#accordionTwo1">Home</div>
							<div class="list-after"><i class="icon ion-ios-arrow-forward"></i></div>
						</div>						
					</a>
				</li>
				<li>
					<div class="accordion-item">
						<a href="#">
						<div class="list-item" data-toggle="collapse" data-target="#accordionTwo1">
							<div class="list-media">
								<i class="icon ion-ios-home bg-blue"></i>
							</div>
							<div class="list-label">
								<div class="list-title">Master</div>
								<div class="list-after"><i class="icon ion-ios-arrow-down" data-target="#accordionTwo1"></i></div>
							</div>						
						</div>
						</a>
						<a href="<?=site_url('kode')?>">						
						<div id="accordionTwo1" class="accordion-body collapse" data-parent="#accordionParent2">
							<div class="list-item">
								<div class="list-label">
									<div class="accordion-content">
										<div class="list-title">Kode Kegiatan</div>
									</div>
									<div class="list-after"><i class="icon ion-ios-arrow-forward" data-target="#accordionTwo1"></i></div>
								</div>
							</div>
						</div>
						</a>
						<a href="<?=site_url('pelatihan')?>">						
						<div id="accordionTwo1" class="accordion-body collapse" data-parent="#accordionParent2">
							<div class="list-item">
								<div class="list-label">
									<div class="accordion-content">
										<div class="list-title">Data Pelatihan</div>
									</div>
									<div class="list-after"><i class="icon ion-ios-arrow-forward" data-target="#accordionTwo1"></i></div>
								</div>
							</div>
						</div>
						</a>
						<a href="<?=site_url('legalitas')?>">						
						<div id="accordionTwo1" class="accordion-body collapse" data-parent="#accordionParent2">
							<div class="list-item">
								<div class="list-label">
									<div class="accordion-content">
										<div class="list-title">Legalitas Usaha</div>
									</div>
									<div class="list-after"><i class="icon ion-ios-arrow-forward" data-target="#accordionTwo1"></i></div>
								</div>
							</div>
						</div>
						</a>
						<a href="<?=site_url('sertifikasi')?>">						
						<div id="accordionTwo1" class="accordion-body collapse" data-parent="#accordionParent2">
							<div class="list-item">
								<div class="list-label">
									<div class="accordion-content">
										<div class="list-title">Sertifikasi</div>
									</div>
									<div class="list-after"><i class="icon ion-ios-arrow-forward" data-target="#accordionTwo1"></i></div>
								</div>
							</div>
						</div>
						</a>
						<a href="<?=site_url('sektorusaha')?>">						
						<div id="accordionTwo1" class="accordion-body collapse" data-parent="#accordionParent2">
							<div class="list-item">
								<div class="list-label">
									<div class="accordion-content">
										<div class="list-title">Sektor Usaha</div>
									</div>
									<div class="list-after"><i class="icon ion-ios-arrow-forward" data-target="#accordionTwo1"></i></div>
								</div>
							</div>
						</div>
						</a>
						<a href="<?=site_url('jenisproduk')?>">						
						<div id="accordionTwo1" class="accordion-body collapse" data-parent="#accordionParent2">
							<div class="list-item">
								<div class="list-label">
									<div class="accordion-content">
										<div class="list-title">Jenis Produk UKM</div>
									</div>
									<div class="list-after"><i class="icon ion-ios-arrow-forward" data-target="#accordionTwo1"></i></div>
								</div>
							</div>
						</div>
						</a>
						<a href="<?=site_url('pemasaran')?>">						
						<div id="accordionTwo1" class="accordion-body collapse" data-parent="#accordionParent2">
							<div class="list-item">
								<div class="list-label">
									<div class="accordion-content">
										<div class="list-title">Pemasaran UKM</div>
									</div>
									<div class="list-after"><i class="icon ion-ios-arrow-forward" data-target="#accordionTwo1"></i></div>
								</div>
							</div>
						</div>
						</a>
						<a href="<?=site_url('bentukkoperasi')?>">						
						<div id="accordionTwo1" class="accordion-body collapse" data-parent="#accordionParent2">
							<div class="list-item">
								<div class="list-label">
									<div class="accordion-content">
										<div class="list-title">Bentuk Koperasi</div>
									</div>
									<div class="list-after"><i class="icon ion-ios-arrow-forward" data-target="#accordionTwo1"></i></div>
								</div>
							</div>
						</div>
						</a>
						<a href="<?=site_url('kelompokkoperasi')?>">						
						<div id="accordionTwo1" class="accordion-body collapse" data-parent="#accordionParent2">
							<div class="list-item">
								<div class="list-label">
									<div class="accordion-content">
										<div class="list-title">Kelompok Koperasi</div>
									</div>
									<div class="list-after"><i class="icon ion-ios-arrow-forward" data-target="#accordionTwo1"></i></div>
								</div>
							</div>
						</div>
						</a>
					</div>
				</li>								
				<li>
					<a href="pages.html" class="list-item">
						<div class="list-media">
							<i class="icon ion-ios-browsers bg-green"></i>
						</div>
						<div class="list-label">
							<div class="list-title">Pages</div>
							<div class="list-after"><i class="icon ion-ios-arrow-forward"></i></div>
						</div>
					</a>
				</li>
				<li>
					<a href="apps.html" class="list-item">
						<div class="list-media">
							<i class="icon ion-ios-apps bg-yellow"></i>
						</div>
						<div class="list-label">
							<div class="list-title">Apps</div>
							<div class="list-after"><i class="icon ion-ios-arrow-forward"></i></div>
						</div>
					</a>
				</li>
				<li>
					<a href="sign-in.html" class="list-item">
						<div class="list-media">
							<i class="icon ion-ios-log-in bg-purple"></i>
						</div>
						<div class="list-label">
							<div class="list-title">Sign In</div>
							<div class="list-after"><i class="icon ion-ios-arrow-forward"></i></div>
						</div>
					</a>
				</li>
				<li>
					<a href="settings.html" class="list-item">
						<div class="list-media">
							<i class="icon ion-ios-settings bg-orange"></i>
						</div>
						<div class="list-label">
							<div class="list-title">Settings</div>
							<div class="list-after"><i class="icon ion-ios-arrow-forward"></i></div>
						</div>
					</a>
				</li>
			</ul>
		</div>

		<!-- separator -->
		<div class="separator-large"></div>
		<!-- end separator -->

		<div class="list-view list-separate-two list-colored">
			<ul>
				<li>
					<a href="about-us.html" class="list-item">
						<div class="list-media">
							<i class="icon ion-ios-information-circle bg-lime"></i>
						</div>
						<div class="list-label">
							<div class="list-title">About</div>
							<div class="list-after"><i class="icon ion-ios-arrow-forward"></i></div>
						</div>
					</a>
				</li>
				<li>
					<a href="privacy.html" class="list-item">
						<div class="list-media">
							<i class="icon ion-ios-lock bg-blue"></i>
						</div>
						<div class="list-label">
							<div class="list-title">Privacy</div>
							<div class="list-after"><i class="icon ion-ios-arrow-forward"></i></div>
						</div>
					</a>
				</li>
				<li>
					<a href="#" class="list-item">
						<div class="list-media">
							<i class="icon ion-ios-power bg-red"></i>
						</div>
						<div class="list-label">
							<div class="list-title">Logout</div>
							<div class="list-after"><i class="icon ion-ios-arrow-forward"></i></div>
						</div>
					</a>
				</li>
			</ul>
		</div>

		<!-- separator -->
		<div class="separator-large"></div>
		<!-- end separator -->

	</div>
	<!-- end sidebar -->

	<!-- page wrapper -->
	<div class="page-wrapper">

		<!-- separator -->
		<div class="separator-large"></div>
		<!-- end separator -->

		<?= $contents?>			

		<!-- separator -->
		<div class="separator-small"></div>
		<!-- end separator -->	

		

	</div>
	<!-- end page wrapper -->

	<!-- toolbar bottom -->
	<div class="toolbar">
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
	</div>
	<!-- end toolbar bottom -->

	<!-- <script src="<?=base_url('assets/js/jquery-3.4.1.min.js')?>"></script> -->
	<script src="<?=base_url('assets/js/bootstrap.bundle.min.js')?>"></script>
	<script src="<?=base_url('assets/js/fakeLoader.js')?>"></script>
	<script src="<?=base_url('assets/js/swiper.min.js')?>"></script>
	<script src="<?=base_url('assets/js/jquery.big-slide.js')?>"></script>
	<script src="<?=base_url('assets/js/main.js')?>"></script>

</body>
</html>