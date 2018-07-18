<?php 
require 'funciones/funciones.php';

conectar();
$r1 = verificar();
desconectar();

 if (isset($_SESSION["rut"]) &&  $_SESSION["tipo"]==2) {
 	
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


			$("#btnReg").click(function(){
				document.querySelector('#lbl2').innerText = '';
				document.querySelector('#lbl1').innerText = '';
				var select = $("#select2").val();
				var rut = $("#Rut").val();
				var ano = $("#Anotacion").val();
				if (rut=="") {
					document.querySelector('#lbl2').innerText = '*Error. Campo rut vacío.';
				}
				else if(ano=="")
				{
					document.querySelector('#lbl3').innerText = '*Error. Campo anotación vacío.';
				}
				else if(select==0)
				{
					document.querySelector('#lbl1').innerText = '*Error. Seleccione un tipo de anotación.';
				}
				else
				{
					$.ajax({
					type:'POST',
					url:'funciones/registrar5.php',
					data:('rut='+rut+'&ano='+ano+'&select='+select),
					success:function(resp){
						if (resp==1) {
							document.querySelector('#lbl2').innerText = '*Error. Rut no registrado o no es alumno.';
							$("#Rut").focus();
						}
						else if(resp==2){
							alert("Anotación registrada correctamente.");
							$("#Rut").val("");
							$("#Anotacion").val("");
							$("#select2").val(0);
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
			<label id="h11">Registrar Anotación</label>
		</div>

		<table id="tabla2">
			<tr>
				<td>
					<input id="Rut" PlaceHolder="Rut Alumno"/>
					
				</td>
				<td><label id="lbl2" class="labels"></label></td>
				
			</tr>
			<tr>
				<td><textarea id="Anotacion" cols="30" rows="10" MaxLegnth="500" PlaceHolder="Anotación..."></textarea></td>
				<td><label id="lbl3" class="labels"></label></td>
			</tr>
			<tr>
				<td>
					<select id="select2">
						<option value="0">Seleccionar</option>
						<option value="1">Negativa</option>
						<option value="2">Positiva</option>
					</select>
					<label id="lbl1" class="labels"></label>
				</td>
			</tr>
			<tr>
				<td><button id="btnReg">Registrar</button></td>
			</tr>
		</table>

	</div>

<footer class="container-fluid text-center ">
  <p>Fonos: +56 2 2583 6570 | +56 2 2583 6571</p>
</footer>
</body>