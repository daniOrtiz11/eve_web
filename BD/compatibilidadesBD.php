<?php

    function getCompatibilidades($idUser){
        $mysqli = new mysqli("127.0.0.1", "root","", "u569800724_evebd");

		if ( mysqli_connect_errno() ) {
		  die("ERROR: No se estableció la conexión. ". mysqli_connect_error());
		}
		$acentos = $mysqli->query("SET NAMES 'utf8'");
        $query="SELECT * FROM compatible WHERE (id_u1='$idUser') OR (id_u2='$idUser' )";
        $resultado=$mysqli->query($query) or die($mysqli->error. " en la línea ".(__LINE__-1));
        $numregistros=$resultado->num_rows;	
        $arr = array();
        if($numregistros  != 0){
			while($fila = $resultado->fetch_row()){
				$arr[] = $fila[0];
			}
		}
		$mysqli->close();
		return $arr;
    }
	function getCompatibles($idUser){
        $mysqli = new mysqli("127.0.0.1", "root","", "u569800724_evebd");

		if ( mysqli_connect_errno() ) {
		  die("ERROR: No se estableció la conexión. ". mysqli_connect_error());
		}
		$acentos = $mysqli->query("SET NAMES 'utf8'");
        $query="SELECT id_u1, id_u2 FROM compatibilidad WHERE (id_u1='$idUser') OR (id_u2='$idUser' )";
        $resultado=$mysqli->query($query) or die($mysqli->error. " en la línea ".(__LINE__-1));
        $numregistros=$resultado->num_rows;	
        $arr = array();
        if($numregistros  != 0){
			while($fila = $resultado->fetch_row()){
				if($fila[0] != $idUser)
				$arr[] = $fila[0];
				else
				$arr[] = $fila[1];
			}
		}
		$mysqli->close();
		return $arr;
    }
?>