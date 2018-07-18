<?php 
require 'funciones/funciones.php';

conectar();
$r1 = verificar();
desconectar();

 if (isset($_SESSION["rut"])) {

 }
 else{
	header("location: index.php");
 }

 ?>

<html lang="en">
 <head>
 	<meta charset="UTF-8">
 	<title>Liceo Maipú</title>
 	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
 	<link rel="stylesheet" href="css/bootstrap.min.css">
 	<link rel="stylesheet" href="css/login.css">
 	
 	<script src="js/jquery.js"></script>
 	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="themes/default/default.css" type="text/css" media="screen" />
	<link rel="stylesheet" href="css/nivo-slider.css" type="text/css" media="screen" />
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
	<script type="text/javascript" src="js/jquery.nivo.slider.js"></script>

	<script>
		$(document).ready(function(){
			$("#hr1").click(function(){
				location.href = "registrarusuario.php";
			});

			$("#hr2").click(function(){
				location.href = "registrarcurso.php";
			});

			$("#hr3").click(function(){
				location.href = "veralumnos.php";
			});

			$("#hr4").click(function(){
				location.href = "agregarnoticia.php";
			});

			$("#hr5").click(function(){
				location.href = "registrarnotas.php";
			});

			$("#hr6").click(function(){
				location.href = "agregaranotaciones.php";
			});

			$("#hr7").click(function(){
				location.href = "vernotas.php";
			});

			$("#hr8").click(function(){
				location.href = "veranotaciones.php";
			});

			$("#hr9").click(function(){
				location.href = "registrarcurso2.php";
			});
		});

	</script>

</head>
<body>
	<header>
 		<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation" id="header1">
 			<div class="container">
 				<div class="navbar-header">
 					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navegacion">
 						<span class="sr-only">Desplegar barra</span>
 						<span class="icon-bar"></span>
 						<span class="icon-bar"></span>
 						<span class="icon-bar"></span>
 					</button>
 					<a href="index.php" class="navbar-brand" >Liceo Maipú</a>
 				</div>
 				<div class="collapse navbar-collapse" id="navegacion">
 					<ul class="nav navbar-nav navbar-right">
 						<li ><a href="index.php">Inicio</a></li>
 						<li ><a href="quienessomos.php">¿Quiénes Somos?</a></li>
 						<li ><a href="vision.php">Visión</a></li>
 						<li ><a href="ubicacion.php">Ubicación</a></li>
						<li class="active"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><img src="img/img5.png" id="img1">
							<ul class="dropdown-menu" id="muser">
					          <li><a href="intranet.php">Intranet</a></li>
					          <li class="divider"></li>
					          <li><a href="sdestroy.php">Cerrar sesión</a></li>
					        </ul>
 						</li>';
	
 					</ul> 					
	 				</div>
 				</div>
 			</div>
 		</nav>
 	</header>


	<?php
		switch ($_SESSION["tipo"]) {
		    case 1:
		    	?>
				<div class="container">
					<h1>Intranet Administrador WEB</h1>
					<div class="hr" id="hr1"><p>Registrar Usuario</p></div>
					<div class="hr" id="hr2"><p>Asignar Curso a Alumno</p></div>
					<div class="hr" id="hr9"><p>Asignar curso y asignatura a profesor</p></div>
					<div class="hr" id="hr3"><p>Ver Alumnos por curso</p></div>
					<div class="hr" id="hr4"><p>Agregar Noticias</p></div>
				</div>
		    	<?php 
		    break;
		    case 2:
		    	?>
					<div class="container">
						<h1>Intranet Administrativo</h1>
						<div class="hr" id="hr2"><p>Asignar Curso a Alumno</p></div>
						<div class="hr" id="hr9"><p>Asignar curso y asignatura a profesor</p></div>
						<div class="hr" id="hr3"><p>Ver Alumnos por curso</p></div>
						<div class="hr" id="hr4"><p>Agregar Noticias</p></div>
						<div class="hr" id="hr6"><p>Agregar Anotaciones</p></div>
					</div>
		    	<?php 
		    break;
		    case 3:
		    	?>
					<div class="container">
						<h1>Intranet Docente</h1>
						<div class="hr" id="hr3"><p>Ver Alumnos por curso</p></div>
						<div class="hr" id="hr5"><p>Gestionar Notas</p></div>
					</div>
		    	<?php 
		    break;
		    case 4:
		    	?>
					<div class="container">
						<h1>Intranet Alumno</h1>
						<div class="hr" id="hr7"><p>Ver Mis notas</p></div>
						<div class="hr" id="hr8"><p>Ver Mis anotaciones</p></div>
					</div>
		    	<?php 
		    break;


		}
?>

<footer class="container-fluid text-center ">
  <p>Fonos: +56 2 2583 6570 | +56 2 2583 6571</p>
</footer>

</body>
	