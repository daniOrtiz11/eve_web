<?php		
		function insertCompatible($idUser1, $idUser2){
		$mysqli = new mysqli("127.0.0.1", "root","", "u569800724_evebd");
		/*$mysqli = new mysqli("127.0.0.1", "root","", "eve");*/
		if ( mysqli_connect_errno() ) {
		die("ERROR: No se estableció la conexión. ". mysqli_connect_error());
		}
		$acentos = $mysqli->query("SET NAMES 'utf8'");
		$query="INSERT INTO compatible VALUES ('$idUser1','$idUser2')";
		$resultado=$mysqli->query($query) or die($mysqli->error. " en la línea ".(__LINE__-1));
		$mysqli->close();
		}
		
		function insertCompatibilidad($idUser1, $idUser2){ //Inserta en compatibilidad si los usuarios son compatibles
		$mysqli = new mysqli("127.0.0.1", "root","", "u569800724_evebd");
		/*$mysqli = new mysqli("127.0.0.1", "root","", "eve");*/
		if ( mysqli_connect_errno() ) {
		die("ERROR: No se estableció la conexión. ". mysqli_connect_error());
		}
		$acentos = $mysqli->query("SET NAMES 'utf8'");
		$query="SELECT * FROM compatible WHERE (id_u1='$idUser1' AND id_u2='$idUser2') OR (id_u1='$idUser2' AND id_u2='$idUser1')";
		$resultado=$mysqli->query($query) or die($mysqli->error. " en la línea ".(__LINE__-1));
		$numregistros=$resultado->num_rows;	
		if($numregistros == 2){
			$query="INSERT INTO compatibilidad(id_u1, id_u2) VALUES ('$idUser1','$idUser2')";
		    $resultado=$mysqli->query($query) or die($mysqli->error. " en la línea ".(__LINE__-1));
			$mysqli->close();
			return true;
		}else{
		$mysqli->close();
		return false;
		}
		}
		
		function sonCompatibles($idUser1, $idUser2){ //Devuelve true si son compatibles
		$mysqli = new mysqli("127.0.0.1", "root","", "u569800724_evebd");
		/*$mysqli = new mysqli("127.0.0.1", "root","", "eve");*/
		if ( mysqli_connect_errno() ) {
		die("ERROR: No se estableció la conexión. ". mysqli_connect_error());
		}
		$acentos = $mysqli->query("SET NAMES 'utf8'");
		$query="SELECT id FROM compatibilidad WHERE (id_u1='$idUser1' AND id_u2='$idUser2') OR (id_u1='$idUser2' AND id_u2='$idUser1')";
		$resultado=$mysqli->query($query) or die($mysqli->error. " en la línea ".(__LINE__-1));
		$numregistros=$resultado->num_rows;	
		if($numregistros == 1){
			$mysqli->close();
			return true;
		}else{
		$mysqli->close();
		return false;
		}
		}
		
		function haDadoLike($idUser1, $idUser2){ //Devuelve true si el usuario1 ha dado like al usuario2
		$mysqli = new mysqli("127.0.0.1", "root","", "u569800724_evebd");
		/*$mysqli = new mysqli("127.0.0.1", "root","", "eve");*/
		if ( mysqli_connect_errno() ) {
		die("ERROR: No se estableció la conexión. ". mysqli_connect_error());
		}
		$acentos = $mysqli->query("SET NAMES 'utf8'");
		$query="SELECT * FROM compatible WHERE id_u1='$idUser1' AND id_u2='$idUser2'";
		$resultado=$mysqli->query($query) or die($mysqli->error. " en la línea ".(__LINE__-1));
		$numregistros=$resultado->num_rows;	
		if($numregistros == 1){
			$mysqli->close();
			return true;
		}else{
		$mysqli->close();
		return false;
		}
		}
		
?>