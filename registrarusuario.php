<?php 
require 'funciones/funciones.php';

conectar();
$r1 = verificar();
desconectar();

 if (isset($_SESSION["rut"]) && $_SESSION["tipo"]==1) {
 	
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
				document.querySelector('#lbl4').innerText = '';
				document.querySelector('#lbl5').innerText = '';
				document.querySelector('#lbl6').innerText = '';
				var rut = $("#txtRut").val();
				var nombre = $("#txtNombre").val();
				var ap1 = $("#txtAp1").val();
				var ap2 = $("#txtAp2").val();
				var pass = $("#txtPass").val();
				var select = $("#Tipo").val();

				if(validaRut(rut)==false)
				{
					document.querySelector('#lbl1').innerText = '*Error. Formato de rut incorrecto.';
					$("#txtRut").focus();
				}
				else if(nombre.length<3)
				{
					document.querySelector('#lbl2').innerText = '*Error. Nombre entre 3 a 30 carácteres.';
					$("#txtNombre").focus();
				}
				else if(ap1.length<3)
				{
					document.querySelector('#lbl3').innerText = '*Error. Apellido entre 3 a 30 carácteres.';
					$("#txtAp1").focus();
				}
				else if(ap2.length<3)
				{
					document.querySelector('#lbl4').innerText = '*Error. Apellido entre 3 a 30 carácteres.';
					$("#txtAp2").focus();
				}
				else if(pass.length<3)
				{
					document.querySelector('#lbl5').innerText = '*Error. Contraseña entre 3 a 20 carácteres.';
					$("#txtPass").focus();
				}
				else if(select==0)
				{
					document.querySelector('#lbl6').innerText = '*Error. Seleccione una opción válida.';
					$("#Tipo").focus();
				}
				else
				{
					$.ajax({
					type:'POST',
					url:'funciones/registrar1.php',
					data:('rut='+rut+'&pass='+pass+'&nombre='+nombre+'&ap1='+ap1+'&ap2='+ap2+'&tipo='+select),
					success:function(resp){
						if (resp==1) {
							document.querySelector('#lbl1').innerText = '*Error. Rut ya registrado.';
							$("#txtRut").focus();
						}
						else if(resp==2){
							alert("Usuario registrado correctamente.");
							$("#txtRut").val("");
							$("#txtNombre").val("");
							$("#txtAp1").val("");
							$("#txtAp2").val("");
							$("#txtPass").val("");
							$("#Tipo").val(0);
							$("#txtRut").focus();
						}
						else{
							alert(resp);
						}
					}
				})
				}

			});

			$("#txtNombre").bind('keypress', function(event) {
			  var regex = new RegExp("^[a-zA-Z ]+$");
			  var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
			  if (!regex.test(key)) {
			    event.preventDefault();
			    return false;
			  }
			});

			$("#txtAp1").bind('keypress', function(event) {
			  var regex = new RegExp("^[a-zA-Z ]+$");
			  var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
			  if (!regex.test(key)) {
			    event.preventDefault();
			    return false;
			  }
			});

			$("#txtAp2").bind('keypress', function(event) {
			  var regex = new RegExp("^[a-zA-Z ]+$");
			  var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
			  if (!regex.test(key)) {
			    event.preventDefault();
			    return false;
			  }
			});

			$("#txtPass").bind('keypress', function(event) {
			  var regex = new RegExp("^[a-zA-Z0-9]+$");
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
			<label id="h11">Registrar usuario</label>
		</div>
		<div id="mid">
			<div id="mid2">
				<div class="block">
					<input id="txtRut" class="inputs" type="text" placeHolder="RUT"></input>
					<label id="lbl1" class="labels"></label>
				</div>
				<div class="block">
					<input id="txtNombre" class="inputs" type="text" placeHolder="Nombre" MaxLength="30"></input>
					<label id="lbl2" class="labels"></label>
				</div>
				<div class="block">
					<input id="txtAp1" class="inputs" type="text" placeHolder="Apellido Paterno" MaxLength="30"></input>
					<label id="lbl3" class="labels"></label>
				</div>
				<div class="block">
					<input id="txtAp2" class="inputs" type="text" placeHolder="Apellido Materno" MaxLength="30"></input>
					<label id="lbl4" class="labels"></label>
				</div>
				<div class="block">
					<input id="txtPass" class="inputs" type="text" placeHolder="Contraseña" MaxLength="20"></input>
					<label id="lbl5" class="labels"></label>
				</div>
				<div class="block">
					<select class="inputs" name="tipo" id="Tipo">
						<option value="0">Seleccionar</option>
						<option value="1">Administrador Página</option>
						<option value="2">Administrador Colegio</option>
						<option value="3">Docente</option>
						<option value="4">Alumno</option>
					</select>
				<label id="lbl6" class="labels"></label>
				</div>
				<input type="button" id="btn2" value="Registrar">
			</div>
		</div>
			

		</div>
		
	</div>
 	
 	<footer class="container-fluid text-center ">
	  <p>Footer Text</p>
	</footer>
</body>