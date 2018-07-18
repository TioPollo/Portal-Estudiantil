<?php 

function verificar(){

	session_start();

	if (isset($_SESSION["rut"])) {
		return 1;
	}
	else{
		return 2;
	}

}

function conectar(){

	global $conexion;
	$conexion = mysqli_connect('localhost','root','','intranet');
}

function desconectar(){

	global $conexion;
	mysqli_close($conexion);
}


?>