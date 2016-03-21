<?php		
		function getMensajes($idUser){
		$mysqli = new mysqli("127.0.0.1", "root","", "u569800724_evebd");
		/*$mysqli = new mysqli("127.0.0.1", "root","", "eve");*/
		if ( mysqli_connect_errno() ) {
		die("ERROR: No se estableció la conexión. ". mysqli_connect_error());
		}
		$acentos = $mysqli->query("SET NAMES 'utf8'");
		$query="SELECT mensaje, emisor FROM mensajes WHERE receptor='$idUser'";
		$resultado=$mysqli->query($query) or die($mysqli->error. " en la línea ".(__LINE__-1));
		$numregistros=$resultado->num_rows;	
		$arr = array();
		if($numregistros  != 0){
			while($fila = $resultado->fetch_row()){
				$arr[] = $fila[0];
				$arr[] = $fila[1];
			}
		}
		$mysqli->close();
		return $arr;
		}
		
		function insertarMensaje($emisor, $receptor, $texto){
		$mysqli = new mysqli("127.0.0.1", "root","", "u569800724_evebd");
			if ( mysqli_connect_errno() ) {
			die("ERROR: No se estableció la conexión. ". mysqli_connect_error());
			}
		$err = 0;
		$acentos = $mysqli->query("SET NAMES 'utf8'");
		$query="INSERT INTO mensajes (mensaje, emisor, receptor) VALUES ('$texto', '$emisor', '$receptor' )";
		$resultado=$mysqli->query($query) or $err = 1;
		
		$mysqli->close();
		return $err;
		}
	
?>