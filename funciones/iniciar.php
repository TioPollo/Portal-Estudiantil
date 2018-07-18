<?php 

	session_start();
	
 	if (isset($_POST["rut"]) ) {	
 		$rut = $_POST["rut"];
 		$pass = md5($_POST["pass"]);
 		global $conexion;
		$conexion = mysqli_connect('localhost','root','','intranet');
		$respuesta = mysqli_query($conexion,"SELECT * FROM `usuarios` WHERE rut = '".$rut."' AND pass = '".$pass."'");
		
 		if ($respuesta->num_rows>0) {
 			$_SESSION["rut"] = $rut;
 			while($c=mysqli_fetch_array($respuesta))
			{
				$_SESSION['tipo'] = $c['tipo'];
			}
 			echo 1;	
 		}
 		else
 		{
 			echo 2;
 		}


 		mysqli_close($conexion);
 	}
 	else
 	{
 		header("location: ../vision.php");
 	}


?>