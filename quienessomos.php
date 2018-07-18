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
 						<li class="active"><a href="quienessomos.php">¿Quiénes Somos?</a></li>
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
 						 	echo '<li ><a href="login.php"><img src="img/img5.png" id="img1"></a></li>';
 						 } ?>
 					</ul>
 					
 					
	 				</div>
 				</div>
 			</div>
 		</nav>
 	</header>

 	<div class="container">
 		<div class="slider-wrapper theme-default ">
	 		<div id="slider" class="nivoSlider"> 
				<img src="img/img9.jpg" alt=""> 
			</div>
 		</div>
 	</div>
 	
	
 	<div class="container-fluid" id="mid">
		<div class="container">    
		  <div class="row content" id="well">
		    <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 " id="hola"> 
		    	<div class="posteo">
		    		<h1>Acerca de nosotros</h1>
				    <hr class="hr1">
				    <p>El Liceo Municipal  de Maipú “Alcalde  Gonzalo Pérez Llona“, identificado por la comunidad local como “Liceo Maipú”, ubicado desde sus inicios en Camino a Melipilla N° 8720, comuna de Maipú,   fue fundado un 02 de Abril de 1962, siendo Alcalde en esa época Don José Luís Infante Larraín.<p>
					<p>En dicho período, la comuna sólo tenía 16.000 habitantes, era el Maipú tradicional  y pueblerino, en  el cual la mayoría de sus habitantes, vivían   en  casas quintas y en los primeros conjuntos habitacionales, que se construían. Entonces, el liceo no era físicamente una secuencia de salas, con patios y gimnasio, sino más bien una antigua casa patronal del Fundo Santa Adela, propiedad que don Serafín Zamora dona al liceo.</p>
					<p>Precisamente, el Alcalde pretendió y llevó a la práctica, un proyecto de comuna autónoma. Tal concepción explica que  la comuna tuviera  servicio propio de locomoción, de agua potable, de recreación, de aseo y jardines entre otros. Especial importancia tuvo el desarrollo educacional, lo que se tradujo en la creación del primer Liceo Municipal del país.</p>
					<p>Han pasado 50 años y el liceo mantiene su espíritu y su sello distintivo, atender a la diversidad de estudiantes de Maipú y comunas aledañas, y su  misión es Educar y Formar a los jóvenes que ingresan al establecimiento, en la modalidad Humanístico Científica, desarrollando en ellos las competencias que les permita su ingreso a la Educación superior. En el transcurso de estos años han pasado destacados personajes, tales como, políticos, destacados escritores de libros de historia, médicos, una gran cantidad de funcionarios municipales, dueños de medios de difusión, familiares de funcionarios de la municipalidad y una gran gama de personalidades a nivel local y nacional.</p>
				    <div class="imagen3"></div>
				    
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

	</div>




<footer class="container-fluid text-center ">
  <p>Footer Text</p>
</footer>
 	
 </body>
 </html>