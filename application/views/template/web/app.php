<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>SMK YAPIN 02 SETU</title>

	<!-- Favicon -->
	<link rel="shortcut icon" href="<?=base_url("assets/joli/img/twh.png")?>" type="image/x-icon">

	<!-- Font awesome -->
	<link href="<?=base_url("assets/versity/css/font-awesome.css")?>" rel="stylesheet">
	<!-- Bootstrap -->
	<link href="<?=base_url("assets/versity/css/bootstrap.css")?>" rel="stylesheet">
	<!-- Slick slider -->
	<link rel="stylesheet" type="text/css" href="<?=base_url("assets/versity/css/slick.css")?>">
	<!-- Fancybox slider -->
	<link rel="stylesheet" href="<?=base_url("assets/versity/css/jquery.fancybox.css")?>" type="text/css"
		media="screen" />
	<!-- Theme color -->
	<link id="switcher" href="<?=base_url("assets/versity/css/theme-color/default-theme.css")?>" rel="stylesheet">

	<!-- Main style sheet -->
	<link href="<?=base_url("assets/versity/css/style.css")?>" rel="stylesheet">

	<!-- Google Fonts -->
	<link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Roboto:400,400italic,300,300italic,500,700' rel='stylesheet'
		type='text/css'>


</head>

<body>

	<!--START SCROLL TOP BUTTON -->
	<a class="scrollToTop" href="#">
		<i class="fa fa-angle-up"></i>
	</a>
	<!-- END SCROLL TOP BUTTON -->

	<!-- Start header  -->
	<header id="mu-header">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 col-md-12">
					<div class="mu-header-area">
						<div class="row">
							<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
								<div class="mu-header-top-left">
									<div class="mu-top-email">
										<i class="fa fa-envelope"></i>
										<span>yapin_02setu@yahoo.co.id</span>
									</div>
									<div class="mu-top-phone">
										<i class="fa fa-phone"></i>
										<span>(021) 8260 8294</span>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</header>
	<!-- End header  -->

	<!-- Start menu -->
	<section id="mu-menu">
		<nav class="navbar navbar-default" role="navigation">
			<div class="container">
				<div class="navbar-header">
					<!-- FOR MOBILE VIEW COLLAPSED BUTTON -->
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
						aria-expanded="false" aria-controls="navbar">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<!-- LOGO -->
					<!-- TEXT BASED LOGO -->
					<a class="navbar-brand" href="index.html"><i class="fa fa-university"></i><span>SMK YAPIN 02
							SETU</span></a>
					<!-- IMG BASED LOGO  -->
					<!-- <a class="navbar-brand" href="index.html"><img src="assets/img/logo.png" alt="logo"></a> -->
				</div>
				<div id="navbar" class="navbar-collapse collapse">
					<ul id="top-menu" class="nav navbar-nav navbar-right main-nav">
						<li <?=$menu == "home" ? "class='active'" : null?>><a href="<?=base_url("home")?>">Beranda</a>
						</li>

						<li <?=$menu == "history" ? "class='active'" : null?>><a
								href="<?=base_url("history")?>">Sejarah</a>
						</li>

						<li <?=$menu == "vimission" ? "class='active'" : null?>><a
								href="<?=base_url("vimission")?>">Visi &
								Misi</a></li>
						<li <?=$menu == "register" ? "class='active'" : null?>><a
								href="<?=base_url("register")?>">Pendaftaran</a>
						</li>

						<li <?=$menu == "contact" ? "class='active'" : null?>><a
								href="<?=base_url("login")?>">Masuk</a>
						</li>
					</ul>
				</div>
				<!--/.nav-collapse -->
			</div>
		</nav>
	</section>
	<!-- End menu -->

	<?php $this->load->view($view)?>

	<!-- Start footer -->
	<footer id="mu-footer">
		<!-- start footer top -->
		<div class="mu-footer-top">
			<div class="container">
				<div class="mu-footer-top-area">
					<div class="row">
						<div class="col-lg-3 col-md-3 col-sm-3">
							<div class="mu-footer-widget">
								<h4>Informasi</h4>
								<ul>
									<li><a href="<?=base_url("register")?>">Pendaftaran</a></li>
									<li><a href="<?=base_url("vimission")?>">Visi & Misi</a></li>
									<li><a href="<?=base_url("history")?>">Sejarah</a></li>
								</ul>
							</div>
						</div>
						<div class="col-lg-3 col-md-3 col-sm-3">
							<div class="mu-footer-widget">
								<h4>Kontak</h4>
								<address>
									<p>RAYA KUD NO. 68</p>
									<p>Desa/Kelurahan Lubangbuaya, Kec. Setu, Kab. Bekasi</p>
									<p>Prov. Jawa Barat - 17350</p>
								</address>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- end footer top -->
		<!-- start footer bottom -->
		<div class="mu-footer-bottom">
			<div class="container">
				<div class="mu-footer-bottom-area">
					<p>&copy; SMK YAPIN 02 SETU 2020</p>
				</div>
			</div>
		</div>
		<!-- end footer bottom -->
	</footer>
	<!-- End footer -->

	<!-- jQuery library -->
	<script src="<?=base_url("assets/versity/js/jquery.min.js")?>"></script>
	<script type="text/javascript" src="<?=base_url("assets/joli/js/jquery/jquery-ui.min.js")?>"></script>
	<script type="text/javascript" src="<?=base_url("assets/joli/js/bootstrap/bootstrap-datepicker.js")?>"></script>
	<!-- Include all compiled plugins (below), or include individual files as needed -->
	<script src="<?=base_url("assets/versity/js/bootstrap.js")?>"></script>
	<!-- Slick slider -->
	<script type="text/javascript" src="<?=base_url("assets/versity/js/slick.js")?>"></script>
	<!-- Counter -->
	<script type="text/javascript" src="<?=base_url("assets/versity/js/waypoints.js")?>"></script>
	<script type="text/javascript" src="<?=base_url("assets/versity/js/jquery.counterup.js")?>"></script>
	<!-- Mixit slider -->
	<script type="text/javascript" src="<?=base_url("assets/versity/js/jquery.mixitup.js")?>"></script>
	<!-- Add fancyBox -->
	<script type="text/javascript" src="<?=base_url("assets/versity/js/jquery.fancybox.pack.js")?>"></script>

	<!-- Custom js -->
	<script src="<?=base_url("assets/versity/js/custom.js")?>"></script>
	<script type="text/javascript" src="<?=base_url("assets/joli/js/maskedinput/jquery.maskedinput.min.js")?>"></script>
	<script type="text/javascript" src="<?=base_url("assets/custom/js/ajax/ajaxRequest.js")?>"></script>
	<script type="text/javascript" src="<?=base_url("assets/custom/js/actions/errorHandler.js")?>"></script>
    <script type="text/javascript" src="<?=base_url("assets/custom/js/actions/formActions.js")?>"></script>
	<script>
		$("#birth_date").datepicker();
		$("input.mask_phone").mask("9999-9999-9999");

		$(".action-create").on("submit", function(e) {
			e.preventDefault();
			let el = $(this);
			let url = el.data("action");
			let data = new FormData(el[0]);
			reqFormData(url, "POST", data, (err, response) => {
				if(response) {
					if($.isEmptyObject(response.errors)) {
						alert("Pendaftaran Berhasil");
						document.getElementById("contactform").reset();
					}else{
						errorHandler(response.errors);
					}
				} else {
					console.log("error: ", err);
				}
			});
		});
	</script>

	<style>
		.form-error {
			color: red;
		}
		.overlay {
			position: absolute;
			height: 354px;
			width: 100%;
			background: rgba(0,0,0,0.5);
			margin-top: -100px;
		}
	</style>
</body>

</html>