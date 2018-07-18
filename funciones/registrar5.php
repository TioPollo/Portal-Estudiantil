<?php 

	session_start();
	
 	if (isset($_POST["rut"]) ) {	
 		$rut = $_POST["rut"];
 		$ano = $_POST["ano"];
 		$select = $_POST["select"];
 		global $conexion;
		$conexion = mysqli_connect('localhost','root','','intranet');
		$respuesta = mysqli_query($conexion,"SELECT * FROM `usuarios` WHERE rut = '".$rut."' AND tipo = 4");
		if ($respuesta->num_rows>0) {
			$query = "INSERT INTO anotacion(anotacion,tipo,rut_alumno) VALUES ('$ano',$select,'$rut')";
 			if ($conexion->query($query) === TRUE) {
 				echo 2;
 			}
 			else{
 				echo "Error: " . $query . "<br>" . $conexion->error;
 			}
		}
		else
		{
			echo 1;
		}
 		


 		mysqli_close($conexion);
 	}
 	else
 	{
 		header("location: ../vision.php");
 	}


?>