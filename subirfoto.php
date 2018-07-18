<?php 

	session_start();
	if (isset($_POST["txtTitulo"])) {
		$titulo= $_POST["txtTitulo"];
		$comentario = $_POST["txtNoticia"];
			$foto = $_FILES["foto"]["name"];
			$ruta = $_FILES["foto"]["tmp_name"];
			$destino="img/Noticias2/".$titulo.".jpg";
			$servername = "localhost";
			$username = "root";
			$password = "";
			$dbname = "intranet";


		    $conn = new mysqli($servername, $username, $password, $dbname);
			// Check connection
			if ($conn->connect_error) {
			    die("Connection failed: " . $conn->connect_error);
			} 

			if($ruta!="")
			{
				copy($ruta,$destino);
				$sql = "INSERT INTO `noticias2`(`titulo`, `comentario`, `imagen`) VALUES ('$titulo','$comentario','$destino')";
				if ($conn->query($sql) === TRUE) {
				    header("location: index.php");
				} 
				else {
				    echo "Error: " . $sql . "<br>" . $conn->error;
				}
			}
			else
			{
				$sql = "INSERT INTO `noticias2`(`titulo`, `comentario`) VALUES ('$titulo','$comentario')";
				if ($conn->query($sql) === TRUE) {
				    header("location: index.php");
				} 
				else {
				    echo "Error: " . $sql . "<br>" . $conn->error;
				}
			}
		
	}
	else
	{
		header("location: index.php");
	}
	
 ?>