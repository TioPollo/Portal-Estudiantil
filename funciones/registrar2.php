<?php 

	session_start();
	
 	if (isset($_POST["rut"]) ) {	
 		$rut = $_POST["rut"];
 		$curso = $_POST["curso"];
 		global $conexion;
		$conexion = mysqli_connect('localhost','root','','intranet');
		$respuesta = mysqli_query($conexion,"SELECT * FROM `usuarios` WHERE rut = '".$rut."' AND tipo = 4");
		$respuesta2 = mysqli_query($conexion,"SELECT * FROM `alumno_curso` WHERE rut_alumno = '".$rut."'");
		$respuesta3 = mysqli_query($conexion,"SELECT * FROM `alumno_curso` WHERE id_curso = ".$curso);
		if ($respuesta3->num_rows>30) {
			echo 4;
		}
		else
		{
			if ($respuesta->num_rows>0) {
	 			if ($respuesta2->num_rows>0) {
	 				echo 1;
	 			}
	 			else
	 			{
	 				$query = "INSERT INTO alumno_curso(rut_alumno, id_curso) VALUES ('$rut',$curso)";
		 			if ($conexion->query($query) === TRUE) {
		 				$respuesta4 = mysqli_query($conexion,"SELECT * FROM `profesor_asignatura` WHERE curso = ".$curso);
		 				if ($respuesta4->num_rows>0) {
		 					while ($c=mysqli_fetch_array($respuesta4)) {
		 						$prof = $c["id"];
		 						$query2 = "INSERT INTO notas(rut_alumno, profe_asig) VALUES ('$rut',$prof)";
		 						if ($conexion->query($query2)===TRUE) {

		 						}
		 					}		
		 				}
		 				echo 2;
		 			}
		 			else{
		 				echo "Error: " . $query . "<br>" . $conexion->error;
		 			}
	 			}
	 			
	 		}
	 		else
	 		{
	 			echo 3;
	 		}
		}
 		


 		mysqli_close($conexion);
 	}
 	else
 	{
 		header("location: ../vision.php");
 	}


?>