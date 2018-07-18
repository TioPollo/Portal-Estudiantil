<?php 
require 'funciones/funciones.php';

conectar();
$r1 = verificar();
desconectar();

 if (isset($_SESSION["rut"]) &&  $_SESSION["tipo"]==4) {
 	
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
	<script src="js/seve.js"></script>
	<script>
		$(document).ready(function(){
			$("#txtRut").focus();


			$("#btn2").click(function(){
				var select = $("#Tipo").val();
				var select2 = $("#asig").val();
				if(select==0)
				{
					document.querySelector('#lbl1').innerText = '*Error. Seleccione un curso.';
					return false;
				}
				else
				{
					if(select2==0)
					{
						document.querySelector('#lbl2').innerText = '*Error. Seleccione un curso.';
						return false;
					}
					else
					{
						return true;
					}
				}
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
 						<?php if ($r1==1) {
 							echo '<li ><a href="#" class="dropdown-toggle" data-toggle="dropdown"><img src="img/img5.png" id="img1">
							<ul class="dropdown-menu" id="muser">
					          <li><a href="intranet.php">Intranet</a></li>
					          <li class="divider"></li>
					          <li><a href="sdestroy.php">Cerrar sesión</a></li>
					        </ul>
 						</li>';
 						}
 						elseif ($r1==2) {
 						 	echo '<li class="active"><a href="login.php"><img src="img/img5.png" id="img1"></a></li>';
 						 } ?>
 					</ul> 					
	 				</div>
 				</div>
 			</div>
 		</nav>
 	</header>

	<div class="container">
		
		<?php 
		$rut = $_SESSION["rut"];
			global $conexion;
			$conexion = mysqli_connect('localhost','root','','intranet');
			$conexion2 = mysqli_query($conexion, "SET NAMES 'utf8'");
			$respuesta = mysqli_query($conexion,"SELECT * FROM `anotacion` WHERE rut_alumno = '$rut'");
			if ($respuesta->num_rows>0) {
				?>
				<h1>Anotaciones</h1>
					<table id="tabla3" >
						<tr>
							<td>Tipo</td>
							<td>Anotación</td>
						</tr>
				<?php 
				while ($c=mysqli_fetch_array($respuesta)) {
					if ($c["tipo"]==1) {
						echo '<tr>
								<td>Negativa</td>
								<td>'.$c["anotacion"].'</td>
							</tr>';
					}
					else{
						echo '<tr>
								<td>Positiva</td>
								<td>'.$c["anotacion"].'</td>
							</tr>';
					}
				}
	 		}
	 		else
	 		{
	 			?>
					<h3>No tienes anotaciones registradas actualmente.</h3>
	 			<?php 
	 		}
		 ?>
		</table>
		 </br>
</br>
<a href="intranet.php">Volver</a>
	</div>



<footer class="container-fluid text-center ">
  <p>Fonos: +56 2 2583 6570 | +56 2 2583 6571</p>
</footer>
</body>