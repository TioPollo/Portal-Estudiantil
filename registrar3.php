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

			$("#btn4").click(function(){
				$('.input3').removeAttr("disabled");
				$('.input4').removeAttr("disabled");
				return true;
			});

			$(".input2").bind('keypress', function(event) {
			  var regex = new RegExp("^[.0-9]+$");
			  var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
			  if (!regex.test(key)) {
			    event.preventDefault();
			    return false;
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

<div class="container">
	<?php
	if (isset($_POST["tipo"])) {
		$curso = $_POST["tipo"];
 		$asignatura = $_POST["Asignatura"];
 		$prof = $_SESSION["rut"];
 		global $conexion;
		$conexion = mysqli_connect('localhost','root','','intranet');
		$respuesta = mysqli_query($conexion,"SELECT * FROM `profesor_asignatura` WHERE rut_profesor = '$prof' AND asignatura = $asignatura AND curso = $curso");
		if ($respuesta->num_rows>0) {
			while($c=mysqli_fetch_array($respuesta))
			{
				$id = $c["id"];
			}
			$respuesta2 = mysqli_query($conexion, "SELECT * FROM `notas` WHERE profe_asig = $id");
			if ($respuesta2->num_rows>0) {
				?>
					<section>
						<form method="POST" action="registrar4.php">
							<table id="tabla1">
								<tr>
									<td>ID Nota</td>
									<td>Rut Alumno</td>
									<td>Nombre</td>
									<td>Nota 1</td>
									<td>Nota 2</td>
									<td>Nota 3</td>
									<td>Nota 4</td>
									<td>Nota 5</td>
									<td>Promedio</td>
								</tr>
							
				<?php
				while($c2=mysqli_fetch_array($respuesta2))
				{
					$rut = $c2["rut_alumno"];
					$respuesta3 = mysqli_query($conexion, "SELECT * FROM `usuarios` WHERE rut = '$rut'");
					while($c3=mysqli_fetch_array($respuesta3))
					{
						echo '<tr>
								<td><input class="input4" name="id['.$c3['rut'].']" value="'.$c2['id'].'" disabled/></td>
								<td><input class="input3" name="rut['.$c3['rut'].']" value="'.$c3['rut'].'" disabled/></td>
								<td>'.$c3["Nombre"] .' '.$c3["APaterno"].' '. $c3["AMaterno"].'</td>
								<td><input class="input2" name="n1['.$c3['rut'].']" value="'.$c2['nota1'].'" MaxLength="3"/></td>
								<td><input class="input2" name="n2['.$c3['rut'].']" value="'.$c2['nota2'].'" MaxLength="3"/></td>
								<td><input class="input2" name="n3['.$c3['rut'].']" value="'.$c2['nota3'].'" MaxLength="3"/></td>
								<td><input class="input2" name="n4['.$c3['rut'].']" value="'.$c2['nota4'].'" MaxLength="3"/></td>
								<td><input class="input2" name="n5['.$c3['rut'].']" value="'.$c2['nota5'].'" MaxLength="3"/></td>
								<td>'.$c2["promedio"].'</td>
							</tr>';
					}
				}
				?>
							</table>
							<input type="submit" id="btn4" name="actualizar" value="Registrar Notas" class="btn btn-info">
						</form>
					
				<?php 
			}
			else
			{
				echo "<h3>No existen alumnos registrados en este curso y/o asignatura.</h3>";
			}
		}
		else
		{
			echo "<h3>No puede ingresar notas porque la asignatura o el curso no coinciden con sus registros.</h3>";
		}
	}
	else
	{
		header("location: intranet.php");
	}
?>


</section>
</div>




<footer class="container-fluid text-center ">
  <p>Fonos: +56 2 2583 6570 | +56 2 2583 6571</p>
</footer>
</body>
	