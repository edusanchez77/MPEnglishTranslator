<?php
    session_start();
    require_once("constantes.php");
	require_once("funcionesBD.php");
	date_default_timezone_set('America/Argentina/Cordoba');

	$vConexion = conexionBD(DATABASE['DNS'], DATABASE['USUARIO'], DATABASE['PASSWORD']);
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
	<!-- Flexslider -->
	<link rel="stylesheet" href="plugins/flex-slider/flexslider.css">
	<!-- Flexslider -->
	<link rel="stylesheet" href="plugins/cd-hero/cd-hero.css">
	<!-- Style Swicther -->
	<link id="style-switch" href="css/presets/preset7.css" media="screen" rel="stylesheet" type="text/css">

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
	<div class="style-switch-wrapper">
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
	</div>
	<!-- Style switcher end -->

	<div class="body-inner">

<!-- Header start -->
<?php
require('header.php');
?>
<!--/ Header end -->

<div id="banner-area">
	<img src="images/banner/banner3.jpg" alt="" />
	<div class="parallax-overlay"></div>
	<!-- Subpage title start -->
	<div class="banner-title-content">
		<div class="text-center">
			<h2>Agencias</h2>
			<nav aria-label="breadcrumb">
				<ol class="breadcrumb justify-content-center">
					<li class="breadcrumb-item"><a href="#">Home</a></li>
					<li class="breadcrumb-item text-white" aria-current="page">Agencias</li>
				</ol>
			</nav>
		</div>
	</div><!-- Subpage title end -->
</div><!-- Banner area end -->

<!-- Main container start -->
<section id="main-container">
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<h3 class="title-border">Agencias</h3>
				<!-- accordion -->
				<div class="accordion" id="accordion">

					<?php
						$vAgencia = getAgencia($vConexion);
						for($i=0; $i<count($vAgencia); $i++){
							$name = "collapse".$i;
					?>
					<div class="card border rounded mb-2">
						<div class="card-header p-0">
							<a class="h4 collapsed mb-0 font-weight-bold text-uppercase d-block p-2 pl-5" data-toggle="collapse"
								data-target="#<?php echo $name ?>" aria-expanded="true" aria-controls="<?php echo $name ?>"><?php echo $vAgencia[$i]['age_nombre'] ?></a>
						</div>
						<div id="<?php echo $name ?>" class="collapse" data-parent="#accordion">
							<div class="card-body">
								<p><strong>Dirección: </strong><?php echo $vAgencia[$i]['age_direccion'] ?></p>
								<p><strong>Teléfono: </strong><?php echo $vAgencia[$i]['age_telefono'] ?></p>
								<p><strong>E-mail: </strong><?php echo $vAgencia[$i]['age_email'] ?></p>
								<div class="row">
									<div class="col-6"><p><button class="btn btn-secondary solid" onclick=editarAgencia(<?php echo $vAgencia[$i]['age_id'] ?>)>Editar Agencia &nbsp;&nbsp;</i></button></p></div>
									<div class="col-6"><p><button class="btn btn-info solid" onclick=cargarAgencias(<?php echo $vAgencia[$i]['age_palabraEnEs'].",".$vAgencia[$i]['age_palabraEsEn'].",".$vAgencia[$i]['age_horaEnEs'].",".$vAgencia[$i]['age_horaEsEn'].",".$vAgencia[$i]['age_periodoPago'].",".$vAgencia[$i]['age_id'] ?>) >Ver info &nbsp;&nbsp;<i class="fa fa-long-arrow-right"></i></button></p></div>
								</div>
							</div>
						</div>
					</div>
					
					<!--/ Panel 1 end-->
					<?php
						}
					?>
	
				</div>
				<!--/ Accordion end -->

				<div class="gap-20"></div>
				<p><button class="btn btn-primary solid" data-toggle="modal" data-target="#modalAddAgencia">Agregar Agencia &nbsp;&nbsp;<i class="fa fa-long-arrow-right"></i></button></p>

				<div class="gap-40"></div>
				<!-- Modal -->
				<div class="modal fade" id="modalAddAgencia" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
					<div class="modal-dialog modal-dialog-centered" role="document">
						<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="modalAddAgencia">Cargar Agencia</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<form>
								<div class="form-group">
									<input type="text" class="form-control" id="nombreAgencia" aria-describedby="emailHelp" placeholder="Nombre">
								</div>
								<div class="form-group">
									<input type="text" class="form-control" id="direccionAgencia" placeholder="Dirección">
								</div>
								<div class="form-group">
									<input type="text" class="form-control" id="telefonoAgencia" placeholder="Teléfono">
								</div>
								<div class="form-group">
									<input type="text" class="form-control" id="mailAgencia" placeholder="E-mail">
								</div>
								<div class="form-group">
									<input type="text" min="0" class="form-control" id="periodoPagoAgencia" placeholder="Período de pago">
								</div>
								<div class="form-group">
									<div class="row justify-content-center">
										<div class="col-6">
											<p>Tarifa por palabra</p>
											<div class="input-group input-group-sm mb-3">
												<label for="tarifa1">EN > SP: &nbsp;&nbsp;</label>
												<div class="input-group-prepend">
													<span class="input-group-text" id="inputGroup-sizing-sm">$</span>
												</div>
												<input type="number" min="0" step=".01" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm" id="tarifa1">
											</div>
											<div class="input-group input-group-sm mb-3">
												<label for="tarifa2">SP > EN: &nbsp;&nbsp;</label>
												<div class="input-group-prepend">
													<span class="input-group-text" id="inputGroup-sizing-sm">$</span>
												</div>
												<input type="number" min="0" step=".01" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm" id="tarifa2">
											</div>
										</div>
										<div class="col-6">
											<p>Tarifa por hora</p>
											<div class="input-group input-group-sm mb-3">
												<label for="tarifa3">EN > SP: &nbsp;&nbsp;</label>
												<div class="input-group-prepend">
													<span class="input-group-text" id="inputGroup-sizing-sm">$</span>
												</div>
												<input type="number" min="0" step=".01" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm" id="tarifa3">
											</div>
											<div class="input-group input-group-sm mb-3">
												<label for="tarifa4">SP > EN: &nbsp;&nbsp;</label>
												<div class="input-group-prepend">
													<span class="input-group-text" id="inputGroup-sizing-sm">$</span>
												</div>
												<input type="number" min="0" step=".01" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm" id="tarifa4">
											</div>
										</div>
									</div>
								</div>
							</form>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
							<button type="button" class="btn btn-info" id="guardarAgencia">Guardar</button>
						</div>
						</div>
					</div>
				</div>
				<!-- Fin Modal -->

				<!-- Modal Editar Agencia -->
				<div class="modal fade" id="modalEditAgencia" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
					<div class="modal-dialog modal-dialog-centered" role="document">
						<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLongTitle">Cargar Agencia</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<form>
								<input type="hidden" name="" id="editIdAgencia">
								<div class="form-group">
									<input type="text" class="form-control" id="editNombreAgencia" aria-describedby="emailHelp" placeholder="Nombre">
								</div>
								<div class="form-group">
									<input type="text" class="form-control" id="editDireccionAgencia" placeholder="Dirección">
								</div>
								<div class="form-group">
									<input type="text" class="form-control" id="editTelefonoAgencia" placeholder="Teléfono">
								</div>
								<div class="form-group">
									<input type="text" class="form-control" id="editMailAgencia" placeholder="Email">
								</div>
								<div class="input-group input-group-sm">
									<p>Período de pago (en días)&nbsp;&nbsp;</p>
									<input type="text" min="0" class="form-control" id="editPeriodoPagoAgencia" placeholder="Período de pago">
								</div>
								<div class="form-group">
									<div class="row justify-content-center">
										<div class="col-6">
											<p>Tarifa por palabra</p>
											<div class="input-group input-group-sm mb-3">
												<label for="tarifa1">EN > SP: &nbsp;&nbsp;</label>
												<div class="input-group-prepend">
													<span class="input-group-text" id="inputGroup-sizing-sm">$</span>
												</div>
												<input type="number" min="0" step=".01" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm" id="editarTarifa1">
											</div>
											<div class="input-group input-group-sm mb-3">
												<label for="tarifa2">SP > EN: &nbsp;&nbsp;</label>
												<div class="input-group-prepend">
													<span class="input-group-text" id="inputGroup-sizing-sm">$</span>
												</div>
												<input type="number" min="0" step=".01" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm" id="editarTarifa2">
											</div>
										</div>
										<div class="col-6">
											<p>Tarifa por hora</p>
											<div class="input-group input-group-sm mb-3">
												<label for="tarifa3">EN > SP: &nbsp;&nbsp;</label>
												<div class="input-group-prepend">
													<span class="input-group-text" id="inputGroup-sizing-sm">$</span>
												</div>
												<input type="number" min="0" step=".01" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm" id="editarTarifa3">
											</div>
											<div class="input-group input-group-sm mb-3">
												<label for="tarifa4">SP > EN: &nbsp;&nbsp;</label>
												<div class="input-group-prepend">
													<span class="input-group-text" id="inputGroup-sizing-sm">$</span>
												</div>
												<input type="number" min="0" step=".01" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm" id="editarTarifa4">
											</div>
										</div>
									</div>
								</div>
							</form>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
							<button type="button" class="btn btn-info" id="updateAgencia">Guardar</button>
						</div>
						</div>
					</div>
				</div>
				<!-- Fin Modal -->

				<!-- Counter Strat -->
				<!--<h3 class="title-border">Estadisticas</h3>
				<div class="ts_counter elements p-0">
					<div class="row text-center">
						<div class="facts three col-md-3 col-sm-6">
							<span class="facts-icon"><i class="fa fa-suitcase"></i></span>
							<div class="facts-num">
								<span class="counter">869</span>
							</div>
							<h3>Proyectos</h3>
						</div>

						<div class="facts two col-md-3 col-sm-6">
							<span class="facts-icon"><i class="fa fa-usd"></i></span>
							<div class="facts-num">
								<span class="counter">1277</span>
							</div>
							<h3>Ganancia</h3>
						</div>

						
					</div>
				</div>-->
				<!--/ Counter end -->
			</div>
			<!--/ Col end -->

			<div class="col-md-6">

				<h3 class="title-border">Facturación</h3>
				<div class="widget widget-tab">
					<ul class="nav nav-tabs">
						<li class="nav-item"><a class="nav-link active" href="#tab1" data-toggle="tab">Tarifas</a></li>
						<li class="nav-item"><a class="nav-link" href="#tab2" data-toggle="tab">Período de Pago</a></li>
					</ul>
					<div class="tab-content">
						<div class="tab-pane active" id="tab1">
							<p id=tarifas>Info sobre tarifas</p>
						</div>
						<div class="tab-pane" id="tab2">
							<p id="periodoPago">Info sobre período de pago</p>
						</div>
					</div>
				</div><!-- End default tabs -->
				<div class="gap-40"></div>

				<h3 class="title-border">Contactos</h3>
				<!-- Testimonial start-->
				<div class="testimonial elements">
					<div class="row">
						<div id="testimonial-carousel" class="owl-carousel owl-theme text-center testimonial-slide">
							<div class="item">
								<div class="testimonial-content">
									<p>
										Info de los contactos
									</p>
								</div>
							</div>
						</div>
						<!--/ Testimonial carousel end-->
					</div>
					<div class="gap-40"></div>
					<p id="buttonContacto"></p>
				</div>
				<!--/ Testimonial end-->

				<!-- Modal Agregar Contacto -->
				<div class="modal fade" id="modalAddContact" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
					<div class="modal-dialog modal-dialog-centered" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title" id="exampleModalLongTitle">Agregar Contacto</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">
								<form>
									<div class="form-group">
										<input type="hidden" class="form-control" name="" id="addContactoIdAgencia">
									</div>
									<div class="form-group">
										<input type="text" class="form-control" id="addNombreContacto" aria-describedby="emailHelp" placeholder="Nombre y Apellido">
									</div>
									<div class="form-group">
										<select name="" id="addPuestoContacto" class="form-control">
											<option value="">Puesto</option>
											<option value="PM">PM</option>
											<option value="TR">TR</option>
											<option value="ED">ED</option>
										</select>
									</div>
									<div class="form-group">
										<input type="text" class="form-control" id="addSkypeContacto" placeholder="Skype">
									</div>
									<div class="form-group">
										<input type="text" class="form-control" id="addTelefonoContacto" placeholder="Teléfono">
									</div>
								</form>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
								<button type="button" class="btn btn-info" onclick=cargarContacto()>Guardar</button>
							</div>
						</div>
					</div>
				</div>
				<!-- Fin Modal -->

				<!-- Modal Editar Contacto -->
				<div class="modal fade" id="modalEditContact" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
					<div class="modal-dialog modal-dialog-centered" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title" id="exampleModalLongTitle">Editar Contacto</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">
								<form>
									<div class="form-group">
										<input type="hidden" class="form-control" name="" id="editIdContacto">
									</div>
									<div class="form-group">
										<input type="text" class="form-control" id="editNombreContacto" aria-describedby="emailHelp" placeholder="Nombre y Apellido">
									</div>
									<div class="form-group">
										<select name="" id="editPuestoContacto" class="form-control">
											<option value="">Puesto</option>
											<option value="PM">PM</option>
											<option value="TR">TR</option>
											<option value="ED">ED</option>
										</select>
									</div>
									<div class="form-group">
										<input type="text" class="form-control" id="editSkypeContacto" placeholder="Skype">
									</div>
									<div class="form-group">
										<input type="text" class="form-control" id="editTelefonoContacto" placeholder="Teléfono">
									</div>
								</form>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
								<button type="button" class="btn btn-info" onclick=cargarContacto('edit')>Guardar</button>
							</div>
						</div>
					</div>
				</div>
				<!-- Fin Modal -->
			</div>
			<!--/ Col end -->
		</div><!-- Content row  end -->
	</div>
	<!--/ container end -->
</section>
<!--/ Main container end -->

	<?php
		include('footer.php');
		include('copyright.php');
	?>

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