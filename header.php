<header id="header" class="fixed-top header" role="banner">
	<a class="navbar-brand navbar-bg" href="index.php"><img class="img-fluid float-right img-logo" src="images/logo/logoBlanco.png" alt="logo"></a>
	<div class="container">
		<nav class="navbar navbar-expand-lg navbar-dark">
			<button class="navbar-toggler ml-auto border-0 rounded-0 text-white" type="button" data-toggle="collapse"
				data-target="#navigation" aria-controls="navigation" aria-expanded="false" aria-label="Toggle navigation">
				<span class="fa fa-bars"></span>
			</button>

			<div class="collapse navbar-collapse text-center" id="navigation">
				<ul class="navbar-nav ml-auto">
					<li class="nav-item">
						<a class="nav-link" href="index.php">Home</a></a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="contacto.php">Contacto</a></a>
					</li>
					<?php
						if(isset($_SESSION['email'])){
					?>
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true"
							aria-expanded="false">
							Facturación
						</a>
						<div class="dropdown-menu">
							<a class="dropdown-item" href="agencias.php">Agencias</a>
							<a class="dropdown-item" href="proyectos.php">Proyectos</a>
							<a class="dropdown-item" href="facturacion.php">Facturación</a>
						</div>
					</li>
					<li class="nav-item">
						<a href="cerrarSesion.php" class="nav-link">
							<i class="fa fa-sign-out"></i>
						</a>
					</li>
					<?php
						}else{
					?>
					<li class="nav-item">
						<a class="nav-link" href="" data-toggle="modal" data-target="#modalLogin" onclick="return false;">
							<i class="fa fa-user"></i>
						</a>
					</li>
					<?php
						}
					?>
				</ul>
			</div>
		</nav>
	</div>
</header>