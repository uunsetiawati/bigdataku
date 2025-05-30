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
	<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>

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
					<a href="<?=site_url('pelatihan')?>" class="list-item" id="accordionParent2">
						<div class="list-media">	
							<i class="icon ion-ios-star bg-yellow"></i>
						</div>
						<div class="list-label">
							<div class="list-title" data-target="#accordionTwo1">Pelatihan</div>
							<div class="list-after"><i class="icon ion-ios-arrow-forward"></i></div>
						</div>
					</a>
				</li>	
				<li>				
					<a href="<?=site_url('tp/viewdatatp')?>" class="list-item" id="accordionParent2">
						<div class="list-media">	
							<i class="icon ion-ios-browsers bg-green"></i>
						</div>
						<div class="list-label">
							<div class="list-title" data-target="#accordionTwo1">TP</div>
							<div class="list-after"><i class="icon ion-ios-arrow-forward"></i></div>
						</div>
					</a>
				</li>			
				<li>				
					<a href="<?=site_url('laporan/laporan')?>" class="list-item" id="accordionParent2">
						<div class="list-media">	
							<i class="icon ion-ios-document bg-purple"></i>
						</div>
						<div class="list-label">
							<div class="list-title" data-target="#accordionTwo1">LAPORAN</div>
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
					<a href="<?=site_url('auth/logout')?>" class="list-item">
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
					<a href="<?=site_url('kode')?>" class="toolbar-link">
						<i class="icon ion-ios-browsers"></i>
					</a>
				</li>
				<li class="toolbar-item">
					<a href="<?=site_url('dashboard')?>" class="toolbar-link toolbar-link-active">
						<i class="icon ion-ios-home"></i>
					</a>
				</li>
				
				<li class="toolbar-item">
					<a href="<?=site_url('pelatihan')?>" class="toolbar-link">
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