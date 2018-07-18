<?php 
require 'funciones/funciones.php';

conectar();
$r1 = verificar();
desconectar();


 ?>


<html lang="en">
 <head>
 	<meta charset="UTF-8">
 	<title>Liceo Maipú</title>
 	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
 	<link rel="stylesheet" href="css/bootstrap.min.css">
 	<link rel="stylesheet" href="css/nosotros.css">
 	
 	<script src="js/jquery.js"></script>
 	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="themes/default/default.css" type="text/css" media="screen" />
	<link rel="stylesheet" href="css/nivo-slider.css" type="text/css" media="screen" />
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
	<script type="text/javascript" src="js/jquery.nivo.slider.js"></script>


	<script type="text/javascript">
		$(window).load(function() {
			$('#slider').nivoSlider({
			effect: 'fade',
			animSpeed: 800,
			pauseTime: 2000,
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
 						<li class="active"><a href="vision.php">Visión</a></li>
 						<li ><a href="ubicacion.php">Ubicación</a></li>
 						<?php if ($r1==1) {
 							echo '<li ><a href="#" class="dropdown-toggle" data-toggle="dropdown"><img src="img/img5.png" id="img1">
							<ul class="dropdown-menu" id="muser">
					          <li><a href="intranet.php">Intranet</a></li>
					          <li class="divider"></li>
					          <li><a href="index.php">Cerrar sesión</a></li>
					        </ul>
 						</li>';
 						}
 						elseif ($r1==2) {
 						 	echo '<li ><a href="login.php"><img src="img/img5.png" id="img1"></a></li>';
 						 } ?>
 					</ul>
 					
 					
	 				</div>
 				</div>
 			</div>
 		</nav>
 	</header> 
 	
	
 	<div class="container-fluid" id="mid">
		<div class="container">    
		  <div class="row content" id="well">
		    <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 " id="hola"> 
		    	<div class="posteo">
		    		<h1>Vision</h1>
				    <hr class="hr1">
				    <p>Educar a alumnas y alumnos en un marco valórico, académico e integral, capaces de descubrir y orientar sus potencialidades e intereses que le permitan enfrentar con éxito el desarrollo de su proyecto de vida para alcanzar su plena felicidad.</p>
		    	</div>
		    	<div class="posteo">
		    		<h1>Mision</h1>
				    <hr class="hr1">
				    <p>Educar a alumnas y alumnos con proyección de futuro, mediante acciones que los estimulen a comprometerse con su formación y desarrollo personal:</p>
				    <p>•  Fomentando y orientando las prácticas de los valores propios de la convivencia escolar y social.</p>
				    <p>•  Desarrollando las habilidades cognitivas que le permitan alcanzar aprendizajes superiores.</p>
				    <p>•  Promoviendo el interés para acrecentar su acervo cultural.</p>
				    <p>•  Propiciando un ambiente que favorezca el desarrollo armónico de las competencias cognitivas, afectivas y psicomotoras. y, favoreciendo la participación y el compromiso de la familia en el proceso educativo.</p>
				    <div class="imagen2"></div>
				    
		    	</div>
		    </div>
		    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 sidenav">
		    	<?php 
		    		$conexion = mysqli_connect('localhost','root','','intranet');
		    		$conexion2 = mysqli_query($conexion, "SET NAMES 'utf8'");
					$respuesta = mysqli_query($conexion,"SELECT * FROM `noticias`");
			 		if ($respuesta->num_rows>0) {
			 			while($c=mysqli_fetch_array($respuesta))
						{
							if ($c['imagen']==null) {
								echo '<div class="well">
							        <div class="well3">
							        	<h4 id="h41">'.$c['titulo'].'</h4>
							        	<p>'.$c['comentario'].'</p>
							        </div>
							      </div>';
							}
							else
							{
								echo '<div class="well">
							        <div class="well1">
							        	<h4 id="h41">'.$c['titulo'].'</h4>
							        	<p>'.$c['comentario'].'</p>
							        </div>
							        <img  class="well2" src="'.$c['imagen'].'">
							      </div>';
							}
							
						}
			 		}
			 		else
			 		{
			 			echo "<h3>No hay noticias actualmente.</h3>";
			 		}
		    	?>
		      </div>
		</div>

	</div>




<footer class="container-fluid text-center ">
  <p>Fonos: +56 2 2583 6570 | +56 2 2583 6571</p>
</footer>
 	
 </body>
 </html>