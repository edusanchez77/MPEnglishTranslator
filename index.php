<?php
	require_once("funcionesBD.php");
	session_start();

	date_default_timezone_set('America/Argentina/Cordoba');

?>
<!DOCTYPE html>
<html lang="zxx">

<head>
  <meta charset="utf-8">
  <title>MP - English Translator</title>

  <!-- mobile responsive meta -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <link  rel="icon"   href="images/icono.ico" type="image/ico" />
  
  <!-- ** Plugins Needed for the Project ** -->
  <!-- Alertify -->
  <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
  <!-- Default theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css"/>
<!-- Semantic UI theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/semantic.min.css"/>
<!-- Bootstrap theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css"/>
  <!-- Bootstrap -->
  <link rel="stylesheet" href="plugins/bootstrap/bootstrap.min.css">
	<!-- FontAwesome -->
  <link rel="stylesheet" href="plugins/fontawesome/font-awesome.min.css">
	<!-- Animation -->
	<link rel="stylesheet" href="plugins/animate.css">
	<!-- Prettyphoto -->
	<link rel="stylesheet" href="plugins/prettyPhoto.css">
	<!-- Owl Carousel -->
	<link rel="stylesheet" href="plugins/owl/owl.carousel.css">
	<link rel="stylesheet" href="plugins/owl/owl.theme.css">
	    <!-- Owl-Carousel -->
		<link rel="stylesheet" href="css/owl.carousel.css" >
		<link rel="stylesheet" href="css/owl.theme.css" >
    <link rel="stylesheet" href="css/owl.transitions.css" >
	<!-- Flexslider -->
	<link rel="stylesheet" href="plugins/flex-slider/flexslider.css">
	<!-- Flexslider -->
	<link rel="stylesheet" href="plugins/cd-hero/cd-hero.css">
	<!-- Style Swicther -->
	<link id="style-switch" href="css/presets/preset7.css" media="screen" rel="stylesheet" type="text/css">

	<script defer src="https://use.fontawesome.com/releases/v5.0.8/js/brands.js" integrity="sha384-sCI3dTBIJuqT6AwL++zH7qL8ZdKaHpxU43dDt9SyOzimtQ9eyRhkG3B7KMl6AO19" crossorigin="anonymous"></script>
<script defer src="https://use.fontawesome.com/releases/v5.0.8/js/fontawesome.js" integrity="sha384-7ox8Q2yzO/uWircfojVuCQOZl+ZZBg2D2J5nkpLqzH1HY0C1dHlTKIbpRz/LG23c" crossorigin="anonymous"></script>

	<!-- HTML5 shim, for IE6-8 support of HTML5 elements. All other JS at the end of file. -->
    <!--[if lt IE 9]>
      <script src="plugins/html5shiv.js"></script>
      <script src="plugins/respond.min.js"></script>
    <![endif]-->

  <!-- Main Stylesheet -->
  <link href="css/style.css" rel="stylesheet">
  
  <!--Favicon-->
	<link rel="icon" href="img/favicon/favicon-32x32.png" type="image/x-icon" />
	<link rel="apple-touch-icon-precomposed" sizes="144x144" href="img/favicon/favicon-144x144.png">
	<link rel="apple-touch-icon-precomposed" sizes="72x72" href="img/favicon/favicon-72x72.png">
	<link rel="apple-touch-icon-precomposed" href="img/favicon/favicon-54x54.png">

</head>

<body>

	<!-- Style switcher start -->
	<!-- <div class="style-switch-wrapper">
		<div class="style-switch-button">
			<i class="fa fa-sliders"></i>
		</div>
		<h3>Style Options</h3>
		<button id="preset1" class="btn btn-sm btn-primary"></button>
		<button id="preset2" class="btn btn-sm btn-primary"></button>
		<button id="preset3" class="btn btn-sm btn-primary"></button>
		<button id="preset4" class="btn btn-sm btn-primary"></button>
		<button id="preset5" class="btn btn-sm btn-primary"></button>
		<button id="preset6" class="btn btn-sm btn-primary"></button>
		<button id="preset7" class="btn btn-sm btn-primary"></button>
		<br/><br/>
		<a class="btn btn-sm btn-primary close-styler float-right">Close X</a>
	</div> -->
	<!-- Style switcher end -->

	<div class="body-inner">

<!-- Header start -->
<?php
require('header.php');
?>
<!--/ Header end -->

<!-- Slider start -->
<!-- Slider start -->
<section id="home" class="p-0">
	<div id="main-slide" class="ts-flex-slider">
		<div class="flexSlideshow flexslider">
			<ul class="slides">
				<li>
					<div class="overlay2">
						<img class="" src="images/slider/bg1.jpg" alt="slider">
					</div>
					<div class="flex-caption slider-content">
						<div class="col-md-12 text-center">
							<h3 class="animated2">
								Los escritores hacen la literatura nacional
							</h3>
							<h2 class="animated3">
								y los traductores hacen<br>la literatura universal
							</h2>
						</div>
					</div>
				</li>
				
			</ul>
		</div>
	</div>
	<!--/ Main slider end -->
</section>
<!--/ Slider end -->

<!-- Features start -->
<section id="feature-center" class="feature-center">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
                <div class="section-title text-center">
					<h3 id="partnerTitulo">Nos caracterizamos por:</h3>
					<p></p>
                </div>
            </div>
			<div class="col-md-3 col-sm-6 wow fadeInDown" data-wow-delay=".5s">
				<div class="feature-center-content text-center">
					<span class="feature-center-icon"><i class="fa fa-check-circle"></i></span>
					<p></p>
					<h3>Responsabilidad</h3>
				</div>
			</div>
			<!--/ End first features -->

			<div class="col-md-3 col-sm-6 wow fadeInDown" data-wow-delay=".8s">
				<div class="feature-center-content text-center">
					<span class="feature-center-icon"><i class="fa fa-exchange element-icon"></i></span>
					<p></p>
					<h3>Compromiso</h3>
				</div>
			</div>
			<!--/ End Second features -->

			<div class="col-md-3 col-sm-6 wow fadeInDown" data-wow-delay="1.1s">
				<div class="feature-center-content text-center">
					<span class="feature-center-icon"><i class="fa fa-certificate"></i></span>
					<p></p>
					<h3>Calidad</h3>
				</div>
			</div>
			<!--/ End Third features -->

			<div class="col-md-3 col-sm-6 wow fadeInDown" data-wow-delay="1.4s">
				<div class="feature-center-content text-center">
					<span class="feature-center-icon"><i class="fa fa-users"></i></span>
					<p></p>
					<h3>Profesionalismo</h3>
				</div>
			</div>
		</div>
		<!--/ 1st row end -->

	</div>
	<!--/ Container end -->
</section>
<!--/ Features end -->


<!-- Testimonial start-->
<div class="testimonial parallax parallax3">
	<div class="parallax-overlay"></div>
	<div class="container">
		<div class="row">
			<div class="col-sm-4 border-right">
				<div class="item">
					<div class="row">
						<div class="col-3">
							<i class="fa fa-envelope" id="iconParallax"></i>
						</div>
						<div class="col-6">
							<p>Escribinos<br><span>info@MPenglishTranslator.com.ar</span></p>
						</div>
						<div class="col-3"></div>
					</div>
				</div>
			</div>
			<div class="col-sm-4 border-right">
				<div class="item">
					<div class="row">
						<div class="col-2 colCel"></div>
						<div class="col-3">
							<i class="fa fa-phone" id="iconParallax"></i>
						</div>
						<div class="col-6">
							<p>Llamanos<br><span>+(54) 351 239 2893</span></p>
						</div>
						<div class="col-1"></div>
					</div>
				</div>
			</div>
			<div class="col-sm-4">
				<div class="item">
					<div class="item">
						<div class="row">
							<div class="col-1 colCel"></div>
							<div class="col-3">
								<i class="fa fa-edit" id="iconParallax"></i>
							</div>
							<div class="col-8">
								<p>Utilizá nuestro formulario web para realizar una consulta</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!--/  Container end-->
</div>
	<!--/ Testimonial end-->

	
<!-- Clients -->
<section class="py-5">
    <div class="container">
      	<div class="row">
		  	<div class="col-md-12">
                <div class="section-title text-center">
					<h3 id="partnerTitulo">Algunos de nuestros clientes</h3>
                </div>
            </div>
        	<div class="col-md-4 col-sm-6 partnerCel partnerLogo">
				<img class="img-fluid d-block mx-auto" src="images/clients/bn/baquero.png" alt="">
			</div>
			<div class="col-md-4 col-sm-6 partnerCel">
				<img class="img-fluid d-block mx-auto" src="images/clients/bn/type.png" alt="">
			</div>
			<div class="col-md-4 col-sm-6 partnerCel">
				<img class="img-fluid d-block mx-auto" src="images/clients/bn/win.png" alt="">
			</div>
			<div class="col-md-4 col-sm-6 partnerCel">
				<img class="img-fluid d-block mx-auto" src="images/clients/bn/terra.png" alt="">
			</div>
			<div class="col-md-4 col-sm-6 partnerCel">
				<img class="img-fluid d-block mx-auto" src="images/clients/bn/spanish.png" alt="">
			</div>
			<div class="col-md-4 col-sm-6 partnerCel">
				<img class="img-fluid d-block mx-auto" src="images/clients/bn/patagonia.png" alt="">
			</div>
      	</div>
    </div>
</section>
    


	<?php
		include('footer.php');
		include('copyright.php');
	?>

<div id="modalLogin" class="modal fade">
	<div class="modal-dialog modal-login">
		<div class="modal-content">
			<div class="modal-header">
				<div class="avatar">
					<!-- <img src="http://tutorwebdesign.com/snippets/images/userlist.jpg" alt="Avatar"> -->
					<img src="images/login/login.jpg" alt="Avatar">
				</div>				
				<h4 class="modal-title">Login</h4>	
			</div>
			<div class="modal-body">
				<!-- <div class="form-group">
					<input type="text" class="form-control" name="username" placeholder="Username" required="required">		
				</div> -->
				<div class="form-group">
					<input type="password" class="form-control" name="password" id="passwordLogin" placeholder="Password" required="required">	
				</div>        
				<div class="form-group">
					
					<!-- <i class=" fa fa-trash" id="btnLogin"></i> -->
				</div>
				<button class="btn btn-primary btn-lg btn-block" onclick="login()">Login</button>
			</div>
			<!-- <div class="modal-footer">
				<a href="#">Olvidé mi password</a>
			</div> -->
		</div>
	</div>
</div> 
	

</div><!-- Body inner end -->


<!-- Alertify -->
<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
<!-- jQuery -->
<script src="plugins/jQuery/jquery.min.js"></script>
<!-- Bootstrap JS -->
<script src="plugins/bootstrap/bootstrap.min.js"></script>
<!-- Style Switcher -->
<script type="text/javascript" src="plugins/style-switcher.js"></script>
<!-- Owl Carousel -->
<script type="text/javascript" src="plugins/owl/owl.carousel.js"></script>
<!-- PrettyPhoto -->
<script type="text/javascript" src="plugins/jquery.prettyPhoto.js"></script>
<!-- Bxslider -->
<script type="text/javascript" src="plugins/flex-slider/jquery.flexslider.js"></script>
<!-- CD Hero slider -->
<script type="text/javascript" src="plugins/cd-hero/cd-hero.js"></script>
<!-- Isotope -->
<script type="text/javascript" src="plugins/isotope.js"></script>
<script type="text/javascript" src="plugins/ini.isotope.js"></script>
<!-- Wow Animation -->
<script type="text/javascript" src="plugins/wow.min.js"></script>
<!-- Eeasing -->
<script type="text/javascript" src="plugins/jquery.easing.1.3.js"></script>
<!-- Counter -->
<script type="text/javascript" src="plugins/jquery.counterup.min.js"></script>
<!-- Waypoints -->
<script type="text/javascript" src="plugins/waypoints.min.js"></script>
<!-- google map -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCcABaamniA6OL5YvYSpB3pFMNrXwXnLwU&libraries=places"></script>
<script src="plugins/google-map/gmap.js"></script>

<!-- Main Script -->
<script src="js/script.js"></script>

</body>

</html>