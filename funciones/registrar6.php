<?php 

session_start();
	
 	if (isset($_POST["rut"]) ) {	
 		$rut = $_POST["rut"];
 		$select1 = $_POST["select1"];
 		$select2 = $_POST["select2"];
 		global $conexion;
		$conexion = mysqli_connect('localhost','root','','intranet');
		$respuesta = mysqli_query($conexion,"SELECT * FROM `usuarios` WHERE rut = '$rut' AND tipo = 3");
		if ($respuesta->num_rows>0) {
			$respuesta2 = mysqli_query($conexion,"SELECT * FROM `profesor_asignatura` WHERE rut_profesor = '$rut' AND asignatura = $select2 AND curso = $select1");
			if ($respuesta2->num_rows>0) {
				echo 3;
			}
			else
			{
				$query = "INSERT INTO profesor_asignatura(rut_profesor,asignatura,curso) VALUES ('$rut',$select2,$select1)";
	 			if ($conexion->query($query) === TRUE) {
	 				echo 2;
	 			}
	 			else{
	 				echo "Error: " . $query . "<br>" . $conexion->error;
	 			}
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