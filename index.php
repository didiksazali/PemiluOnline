<!--A Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<?php 
include 'koneksi.php';
error_reporting(0);
?>
<!DOCTYPE HTML>
<html>
<head>
<title>Pemilu Online</title>
<!-- for-mobile-apps -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Election Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- //for-mobile-apps -->
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
<link href='//fonts.googleapis.com/css?family=Raleway:400,100,200,300,500,600,700,800,900' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="css/style.css">
<link rel="stylesheet" href="css/flexslider.css" type="text/css" media="screen" />
<link rel="stylesheet" type="text/css" href="css/alertify.min.css">
<link rel="stylesheet" type="text/css" href="css/themes/default.css">
<link rel="stylesheet" type="text/css" href="css/themes/semantic.css">
<!---strat-slider---->
<script type="text/javascript" src="js/jquery.1.11.3.min.js"></script>
<script type="text/javascript" src="js/alertify.min.js"></script>
<script type="text/javascript" src="js/skrip.js"></script>

<script type="text/javascript" src="./admin/fusion/JS/jquery.fusioncharts.js"></script>
<!---//-slider---->
</head>
<body>
<!-- header -->
	<div class="header_bg">
		<div class="container">
			<!-----start-header----->
			<div class="header">
				<div class="logo">
					<a href="index.html"><img src="images/logo.png" alt=" " /></a>
				</div>
				<nav class="navbar navbar-default">
					<!-- Brand and toggle get grouped for better mobile display -->
					<div class="navbar-header">
					  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					  </button>
					</div>

					<!-- Collect the nav links, forms, and other content for toggling -->
					<div class="collapse navbar-collapse nav-wil" id="bs-example-navbar-collapse-1">
						<ul class="nav navbar-nav">
							<li><a href="index.php">Beranda</a></li>
							<li><a href="#">Visi Misi</a></li>
							<li><a href="?menu=pemilihan">Pemilihan</a></li>
							<li><a href="?menu=hasil">Hasil</a></li>
							<li><a href="?menu=ask">Pertanyaan</a></li>
							<li><a href="#admin" data-toggle="modal">Admin</a></li>
							<div class="modal fade" id="admin">
								<div class="modal-dialog modal-md">
									<div class="modal-content">
									<form action="ceklogin.php" method="post">
										<div class="modal-header">
											<div class="modal-title">
												Login Admin
											</div>
										</div>
										<div class="modal-body">
											<div class="form-horizontal">
												<div class="form-group">
													<label class="control-label col-sm-3">Username</label>
													<div class="input-group col-sm-6">
														<div class="input-group-addon">
															<span class="glyphicon glyphicon-user"></span>
														</div>
														<input type="text" name="username" class="form-control" placeholder="username">
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-sm-3">Password</label>
													<div class="input-group col-sm-6">
														<div class="input-group-addon">
															<span class="glyphicon glyphicon-user"></span>
														</div>
														<input type="password" name="password" class="form-control" placeholder="Password">
													</div>
												</div>
											</div>
										</div>
										<div class="modal-footer">
											<button class="btn btn-primary" type="submit">Masuk</button><button class="btn btn-danger" type="button" data-dismiss="modal">Tutup</button>
										</div>
									</form>
									</div>
								</div>
							</div>
						</ul>
					</div><!-- /.navbar-collapse -->	
					
				</nav>
			</div>
		</div>
	</div>
	<div class="header_bottom">
	</div>
<!-- //end-header -->

	
<!-- //banner-bottom -->
<!-- body_grids -->

                       <?php 
						if($_GET[menu]=='hasil')
						{
							include "hasil.php";
						}
						else if($_GET[menu]=='ask')
						{
							include "ask.php";
						}
						else if($_GET[menu]=='pemilihan')
						{
							include "milih.php";
						}
						else 
						 echo	'<div class="banner">
		<div class="container">
				<section class="slider">
					<div class="flexslider">
						<ul class="slides">
							<li>
								<div class="banner-info">
									<div class="dummy_text">
										<h1 style="color:black;">Selamat Datang di Sistem Pemilihan Umum Ketua BEM POLBENG
										</h1>
										</h1>
									</div>
								</div>
							</li>
							
							
						</ul>
					</div>
				</section>
			</div>
				<script defer src="js/jquery.flexslider.js"></script>
				<script type="text/javascript">
					$(window).load(function(){
					  $(".flexslider").flexslider({
						animation: "slide",
						start: function(slider){
						  $("body").removeClass("loading");
						}
					  });
					});
				 </script>
	</div>
	<div class="banner-bottom1">
		<div class="banner-bottom1-grids">
			<div class="col-md-4 banner-bottom1-left banner-bottom1-left1">
				<div class="banner-bottom1-lft">
					<span class="glyphicon glyphicon-refresh" aria-hidden="true"></span>
					<h3>Up to Date</h3>
					<p>Proses pemungutan suara yang sangat cepat </p>
				</div>
			</div>
			<div class="col-md-4 banner-bottom1-left">
				<div class="banner-bottom1-lft">
					<span class="glyphicon glyphicon-thumbs-up" aria-hidden="true"></span>
					<h3>Accessibility</h3>
					<p>Berikan Suaramu dimanapun kamu berada</p>
				</div>
			</div>
			<div class="col-md-4 banner-bottom1-left banner-bottom1-left2">
				<div class="banner-bottom1-lft">
					<span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span>
					<h3>Complete Information</h3>
					<p>Informasi pemilu yang cepat dan lengkap</p>
				</div>
			</div>
			<div class="clearfix"> </div>
		</div>
	</div>'; 
						?>
<!-- //banner-bottom1 -->
<!-- banner-bottom -->	


	
<!-- //body_grids -->
<!-- footer-top -->
	
<!-- //footer-top -->
<!-- footer -->
	<div class="footer">
		<div class="container">
			
				
			<div class="footer-copy">
				<p>&copy 2017 Election. All rights reserved | Design by <a href="http://w3layouts.com">W3layouts.</a></p>
				<p>Developed by <a href="#">Admin Super</a></p>
			</div>
		</div>
	</div>
<!-- //footer -->
		<!-- scroll_top_btn -->
		<script type="text/javascript" src="js/move-top.js"></script>
		<script type="text/javascript" src="js/easing.js"></script>
	    <script type="text/javascript">
			$(document).ready(function() {
			
				var defaults = {
		  			containerID: 'toTop', // fading element id
					containerHoverID: 'toTopHover', // fading element hover id
					scrollSpeed: 1200,
					easingType: 'linear' 
		 		};
				
				
				$().UItoTop({ easingType: 'easeOutQuart' });
				
			});
		</script>
		 <a href="#" id="toTop" style="display: block;"><span id="toTopHover" style="opacity: 1;"></span></a>
		<!--end scroll_top_btn -->
<!-- for bootstrap working -->
	 <script type="text/javascript" src="js/bootstrap-3.1.1.min.js"></script>
<!-- //for bootstrap working -->
</body>
</html>