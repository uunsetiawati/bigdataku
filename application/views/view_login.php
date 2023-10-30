<!DOCTYPE html>
<html lang="zxx">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="icon" href="<?=base_url('assets/images/favicon.png')?>">
	<title>BIGDATA</title>

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
			<a href="<?=site_url('home')?>" class="link link-back"><i class="icon ion-ios-arrow-back"></i></a>
		</div>
		<div class="title">
			Masuk
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
		
		<!-- sign in -->
		<div class="sign in">
			<div class="container">
				<form action="<?= site_url('auth/process') ?>" method="post" id="FormLogin" class="form-fill">
					<div class="form-wrapper">
						<div class="input-wrap">
							<input class="forminput" type="email" name="username" placeholder="Email">
						</div>
						<div class="input-wrap">
							<input type="password" name="password" placeholder="Password">
						</div>
					</div>
					<div class="button-default">
						<button type="submit" name="login" class="button">Masuk</button>
					</div>
				</form>

				<!-- separator -->
				<div class="separator-medium"></div>
				<!-- end separator -->

				<div class="link-forgot text-center text-small">
					<a href="https://wa.me/6285235142348" target="_blank" class="color-theme">Lupa Password?</a>
				</div>				

				<!-- separator -->
				<div class="separator-large"></div>
				<!-- end separator -->

				<!-- <div class="sign-with">
					<ul>
						<li>
							<a href="<?=site_url('auth/google')?>"><i class="icon ion-logo-google mr-2"></i>Google</a>
						</li>
					</ul>
				</div> -->
			</div>
		</div>
		<!-- end sign in -->

	</div>
	<!-- end pages wrapper -->

	<script src="<?=base_url('assets/js/jquery-3.4.1.min.js')?>"></script>
	<script src="<?=base_url('assets/js/bootstrap.bundle.min.js')?>"></script>
	<script src="<?=base_url('assets/js/fakeLoader.js')?>"></script>
	<script src="<?=base_url('assets/js/swiper.min.js')?>"></script>
	<script src="<?=base_url('assets/js/main.js')?>"></script>

	<script type="text/javascript">
    $(document).ready(function() {
      $('#FormLogin').validate({
        rules: {
          email: {
            required: true,
            email: true,
          },
          password: {
            required: true,
            minlength: 8
          },
        },
        messages: {
          email: {
            required: "Masukkan Email dengan benar",
            email: "Masukkan Email dengan benar"
          },
          password: {
            required: "Masukkan Password",
            minlength: "Password Setidaknya 8 karakter"
          },
        },
        errorElement: 'span',
        errorPlacement: function(error, element) {
          error.addClass('invalid-feedback');
          element.closest('.form-group').append(error);
        },
        highlight: function(element, errorClass, validClass) {
          $(element).addClass('is-invalid');
        },
        unhighlight: function(element, errorClass, validClass) {
          $(element).removeClass('is-invalid');
        }
      });
    });
  </script>
  <script type="text/javascript">
    $(document).ready(function() {
      $("form").on("submit", function() {
        $("#pageloader").fadeIn(3000);
      }); //submit
    }); //document ready
  </script>

</body>
</html>