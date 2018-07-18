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
	if (isset($_POST["actualizar"])) {
		$conexion = mysqli_connect('localhost','root','','intranet');
		$cont3 = 0;
		$cont4 = 0;
		$cont5 = 0;
		foreach ($_POST["rut"] as $contador2) {
			$cont5++;
			if ($_POST["n1"][$contador2]==0 || $_POST["n2"][$contador2]==0 || $_POST["n3"][$contador2]==0 || $_POST["n4"][$contador2]==0 || $_POST["n5"][$contador2]==0 || $_POST["n1"][$contador2]>=1 || $_POST["n1"][$contador2]<=7 || $_POST["n2"][$contador2]>=1 || $_POST["n2"][$contador2]<=7 || $_POST["n3"][$contador2]>=1 || $_POST["n3"][$contador2]<=7 || $_POST["n4"][$contador2]>=1 || $_POST["n4"][$contador2]<=7 || $_POST["n5"][$contador2]>=1 || $_POST["n5"][$contador2]<=7) {
				
			}
			else
			{
				$cont3++;
			}
		}
		if ($cont3!=0) {
			echo "<h2>*ERROR. Asegúrese que los valores de las notas fluctúen entre 1 y 7 o en su defecto, sea 0.</h2>";
		}
		else
		{
			foreach ($_POST["rut"] as $contador) {
				$cont = 0;
				$cont2 = 0;
				if ($_POST["n1"][$contador]==0) {
					
				}
				else
				{
					$cont++;
					$cont2= $cont2 +$_POST["n1"][$contador];
				}
				if ($_POST["n2"][$contador]==0) {
					
				}
				else
				{
					$cont++;
					$cont2= $cont2 +$_POST["n2"][$contador];
				}
				if ($_POST["n3"][$contador]==0) {
			
				}
				else
				{
					$cont++;
					$cont2= $cont2 +$_POST["n3"][$contador];
				}
				if ($_POST["n4"][$contador]==0) {
		
				}
				else
				{
					$cont++;
					$cont2= $cont2 +$_POST["n4"][$contador];
				}
				if ($_POST["n5"][$contador]==0) {

				}
				else
				{
					$cont++;
					$cont2= $cont2 +$_POST["n5"][$contador];
				}
				if ($cont==0) {
					$cont4++;
				}
				else
				{
					$promedio = $cont2/$cont;
					$idnota= $_POST["id"][$contador];
					$n1 = $_POST["n1"][$contador];
					$n2 = $_POST["n2"][$contador];
					$n3 = $_POST["n3"][$contador];
					$n4 = $_POST["n4"][$contador];
					$n5 = $_POST["n5"][$contador];

					$actualizar = $conexion->query("UPDATE notas SET nota1 = $n1, nota2 = $n2, nota3 = $n3, nota4 = $n4, nota5 = $n5, promedio = $promedio WHERE id = $idnota");
				}
			}
		}
		if ($actualizar==true) {
			header("location: registrarnotas.php");
		}
		else
		{
			if ($cont4==$cont5) {
				echo "<h2>Registros no fueron actualizados, debido a que no existió ningún cambio.</h2>";
			}
		}
		
		
	}
	else
	{
		header("location: index.php");
	}
?>
</br>
</br>
<a href="registrarnotas.php">Volver</a>
</div>




<footer class="container-fluid text-center ">
  <p>Fonos: +56 2 2583 6570 | +56 2 2583 6571</p>
</footer>
</body>