<?php 
require 'funciones/funciones.php';

conectar();
$r1 = verificar();
desconectar();

 if (isset($_SESSION["rut"]) &&  $_SESSION["tipo"]==1 || $_SESSION["tipo"]==2) {
 	
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
				document.querySelector('#lbl1').innerText = '';
				document.querySelector('#lbl2').innerText = '';
				document.querySelector('#lbl3').innerText = '';
				var select = $("#Tipo").val();
				var select2 = $("#asig").val();
				var rut = $("#Rut").val();
				if (rut=="") {
					document.querySelector('#lbl3').innerText = '*Error. Campo rut vacío';
				}
				else if(select==0)
				{
					document.querySelector('#lbl1').innerText = '*Error. Seleccione un curso.';

				}
				else if (select2==0) {
					document.querySelector('#lbl2').innerText = '*Error. Seleccione una asignatura.';
				}
				else
				{
					$.ajax({
						type:'POST',
						url:'funciones/registrar6.php',
						data:('rut='+rut+'&select1='+select+'&select2='+select2),
						success:function(resp){
							if (resp==1) {
								document.querySelector('#lbl3').innerText = '*Error. Rut no registrado o no es profesor.';
								$("#Rut").focus();
							}
							else if(resp==2){
								alert("Profesor asignado correctamente.");
								$("#Rut").val("");
								$("#Tipo").val(0);
								$("#asig").val(0);
								$("#txtRut").focus();
							}
							else if (resp==3) {
								document.querySelector('#lbl3').innerText = '*Error. Profesor ya asignado para dicha asignatura y curso.';
								$("#Rut").focus();
							}
							else{
								alert(resp);
							}
						}
					})
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
		<div id="titulo">
			<label id="h11">Asignar Profesor</label>
		</div>
		<div id="mid">
			<div id="mid2">
				<div class="block">
						<input type="text" id="Rut">
						<label id="lbl3" class="labels"></label>
						<select class="inputs" name="tipo" id="Tipo">
							<option value="0">Seleccionar Curso</option>
							<option value="1">7° Básico</option>
							<option value="2">8° Básico</option>
							<option value="3">I° Medio</option>
							<option value="4">II° Medio</option>
							<option value="5">III° Medio</option>
							<option value="6">IV° Medio</option>
						</select>
						<label id="lbl1" class="labels"></label>
						<select class="inputs" name="Asignatura" id="asig">
							<option value="0">Seleccionar Asignatura</option>
							<option value="1">Lenguaje y Comunicación</option>
							<option value="2">Matemáticas</option>
							<option value="3">Biología</option>
							<option value="4">Física</option>
							<option value="5">Química</option>
							<option value="6">Educación física</option>
							<option value="7">Historia<ption>
							<option value="8">Artes Visuales</option>
							<option value="9">Artes Musicales</option>
							<option value="10">Consejo de Curso</option>
							<option value="11">Tecnología</option>
						</select>
						<label id="lbl2" class="labels"></label>
						<input type="button" id="btn2" value="Asignar">
					</form>
				</div>
			</div>
		</div>
	</div>

<footer class="container-fluid text-center ">
  <p>Fonos: +56 2 2583 6570 | +56 2 2583 6571</p>
</footer>
</body>