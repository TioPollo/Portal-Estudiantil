<?php 

	session_start();
	
 	if (isset($_POST["rut"]) ) {	
 		$rut = $_POST["rut"];
 		$pass = $_POST["pass"];
 		$nombre = $_POST["nombre"];
 		$ap1 = $_POST["ap1"];
 		$ap2 = $_POST["ap2"];
 		$tipo = $_POST["tipo"];
 		$pass2 = md5($pass);
 		global $conexion;
		$conexion = mysqli_connect('localhost','root','','intranet');
		$respuesta = mysqli_query($conexion,"SELECT * FROM `usuarios` WHERE rut = '".$rut."'");
 		if ($respuesta->num_rows>0) {
 			echo 1;	
 		}
 		else
 		{
 			$query = "INSERT INTO usuarios(rut, Nombre, APaterno, AMaterno, tipo, pass) VALUES ('$rut','$nombre','$ap1','$ap2',$tipo,'$pass2')";
 			if ($conexion->query($query) === TRUE) {
 				echo 2;
 			}
 			else{
 				echo "Error: " . $query . "<br>" . $conexion->error;
 			}
 			
 		}


 		mysqli_close($conexion);
 	}
 	else
 	{
 		header("location: ../vision.php");
 	}


?>