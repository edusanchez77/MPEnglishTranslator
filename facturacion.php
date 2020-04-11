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
  <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/semantic.min.css"/>
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
			<h2>Facturación</h2>
			<nav aria-label="breadcrumb">
				<ol class="breadcrumb justify-content-center">
					<li class="breadcrumb-item"><a href="#">Home</a></li>
					<li class="breadcrumb-item text-white" aria-current="page">Facturación</li>
				</ol>
			</nav>
		</div>
	</div><!-- Subpage title end -->
</div><!-- Banner area end -->

<!-- Main container start -->
<section id="main-container">
	<div class="container">

		<div class="row landing-tab">
			 <!-- Listado de Agencias  -->
			<div class="col-md-4 col-sm-6">
				<div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
				<?php
					  $vAgencias = getAgencia($vConexion);
					  for($i=0; $i<count($vAgencias); $i++){
						  if($i == 0){
							  $vActive = "active";
						  }
						  else{
							  $vActive = null;
						  }
				?>
					<a class="animated fadeIn nav-link <?php echo $vActive ?> py-4 d-flex align-items-center" data-toggle="pill" href="<?php echo "#tab_".($i+1) ?>"
						role="tab" aria-selected="true">
						<i class="fa fa-university mr-4"></i>
						<span class="h4 mb-0 font-weight-bold"><?php echo $vAgencias[$i]['age_nombre'] ?></span>
					</a>
					<?php
					  }
					?>
				</div>
			</div>

			 <!-- Listado de Facturacion  -->
			<div class="col-md-6 col-sm-6">
				<div class="tab-content" id="v-pills-tabContent">
				<?php
					  //$vAgencias = getAgencia($vConexion);
					for($i=0; $i<count($vAgencias); $i++){
						$vFacturacion = getFacturacion($vConexion, $vAgencias[$i]['age_id']);
						if($i == 0){
						    $vActive = "active";
						}else{
							$vActive = null;
						}
						
				?>
				<div class="tab-pane pl-sm-3 fade <?php echo $vActive ?> show animated fadeInLeft" id="<?php echo "tab_".($i+1) ?>" role="tabpanel">
					<div class="table-responsive">
						<table class="table">
							<thead class="thead-dark">
							    <tr>
									<th scope="col">Período</th>
									<th scope="col">Importe</th>
									<th scope="col">Facturado</th>
									<th scope="col">Opciones</th>
								</tr>
							</thead>
							<tbody>
								<?php
									if(count($vFacturacion) == 0){
										$noProyectos = "No hay facturación para esta agencia.";
									}else{
										$noProyectos = null;
									}
									for($j=0; $j<count($vFacturacion); $j++){
										$trId = "fc".$vFacturacion[$j]['fc_id'];
										$iconFc = "icon".$vFacturacion[$j]['fc_id'];
										if($vFacturacion[$j]['fc_check_cobro'] == 'Y'){
											$vClass = "table-success";
											$vClassIcon = "fa fa-check";
											$vCheck = "N";
										}else{
											$vClass = "";
											$vClassIcon = "fa fa-times";
											$vCheck = "Y";
										}
										$newDate = date("M  Y", strtotime($vFacturacion[$j]['fc_month']));
								?>
								<tr class="<?php echo $vClass ?>" id="<?php echo $trId ?>">
									<td><?php echo $newDate ?></td>
									<td><?php echo "$".$vFacturacion[$j]['fc_importe'] ?></td>
									<td>
										<i id="<?php echo $iconFc ?>" class="<?php echo $vClassIcon ?>" onclick="chargedFact(<?php echo $vFacturacion[$j]['fc_id'] ?>,'<?php echo $vCheck ?>')"></i>&nbsp;&nbsp;&nbsp;
									</td>
									<td>
										<i class="fa fa-edit" onclick="getFacturacion('<?php echo $vFacturacion[$j]['fc_id'] ?>','<?php echo $vAgencias[$i]['age_nombre'] ?>')"></i>&nbsp;&nbsp;&nbsp;
										<i class="fa fa-trash"  onclick="deletedFacturacion(<?php echo $vFacturacion[$j]['fc_id'] ?>)"></i>
									</td>
								</tr>
								<?php
									}
								?>
							</tbody>
						</table>
					</div>
					<?php echo $noProyectos ?><br><br>
					<p>
						<a href="#" class="btn btn-primary solid" onclick="abrirModalAddFacturacion('<?php echo $vAgencias[$i]['age_id'] ?>','<?php echo $vAgencias[$i]['age_nombre'] ?>')" >Cargar Facturación &nbsp;&nbsp;
							<i class="fa fa-long-arrow-right"></i>
						</a>
					</p>
				</div>
				<?php
					  }
				?>
				</div>
			</div>
		</div>
		<!--/ Content row end -->
	</div>
	<!--/ 1st container end -->


	<div class="gap-60"></div>


	
</section>
<!--/ Main container end -->

	<?php
		include('footer.php');
		include('copyright.php');
	?>

</div><!-- Body inner end -->

<!-- Modal Agregar Facturacion -->
<div class="modal fade" id="modalAddFacturacion" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
		<div class="modal-header">
			<h5 class="modal-title" id="exampleModalLongTitle">Cargar Facturación</h5>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			<span aria-hidden="true">&times;</span>
			</button>
		</div>
		<div class="modal-body">
			<form>
				<div class="input-group input-group-sm mb-3">
					<label for="">Agencia: &nbsp;&nbsp;</label>
					<input type="text" class="form-control" id="inputAgenciaFacturacion" disabled>
					<input type="hidden" name="" id="inputIdAgenciaFacturacion">
				</div>
				<div class="form-group">
					<div class="row justify-content-center">
						<div class="col-6">
							<div class="input-group input-group-sm mb-3">
								<label for="">Fecha: &nbsp;&nbsp;</label>
								<input type="date" min="0" step=".01" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm" id="inputFechaFacturacion">
							</div>
						</div>
						<div class="col-6">
							<div class="input-group input-group-sm mb-3">
								<div class="input-group-prepend">
									<span class="input-group-text" id="inputGroup-sizing-sm">$</span>
								</div>
								<input type="number" min="0" step=".01" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm" id="inputImporteFacturacion" placeholder="Importe">
							</div>
						</div>
					</div>
				</div>
				
			</form>
		</div>
		<div class="modal-footer">
			<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
			<button type="button" class="btn btn-info" id="guardarProyecto" onclick=cargarFacturacion()>Guardar</button>
		</div>
		</div>
	</div>
</div>
<!-- Fin Modal Agregar Facturacion -->

<!-- Modal Editar Facturacion -->
<div class="modal fade" id="modalEditFacturacion" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
		<div class="modal-header">
			<h5 class="modal-title" id="exampleModalLongTitle">Editar Facturación</h5>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			<span aria-hidden="true">&times;</span>
			</button>
		</div>
		<div class="modal-body">
			<form>
				<div class="input-group input-group-sm mb-3">
					<label for="">Agencia: &nbsp;&nbsp;</label>
					<input type="text" class="form-control" id="editAgenciaFacturacion" disabled>
					<input type="hidden" name="" id="editIdFacturacion">
				</div>
				<div class="form-group">
					<div class="row justify-content-center">
						<div class="col-6">
							<div class="input-group input-group-sm mb-3">
								<label for="">Fecha: &nbsp;&nbsp;</label>
								<input type="date" min="0" step=".01" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm" id="editFechaFacturacion">
							</div>
						</div>
						<div class="col-6">
							<div class="input-group input-group-sm mb-3">
								<div class="input-group-prepend">
									<span class="input-group-text" id="inputGroup-sizing-sm">$</span>
								</div>
								<input type="number" min="0" step=".01" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm" id="editImporteFacturacion" placeholder="Importe">
							</div>
						</div>
					</div>
				</div>
				
			</form>
		</div>
		<div class="modal-footer">
			<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
			<button type="button" class="btn btn-info" id="editarFacturacion" onclick=editFacturacion()>Guardar</button>
		</div>
		</div>
	</div>
</div>
<!-- Fin Modal Editar Facturacion -->


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
<script src="js/proyectos.js"></script>


</body>

</html>