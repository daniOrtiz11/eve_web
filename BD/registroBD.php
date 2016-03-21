<?php


function insertarBD($nombre, $apellidos, $nacimiento, $correo, $pass, $pregunta, $respuesta, $telefono, $foto, $tipo_imagen, $ubicacion, $atencion_admin, $sexo){
	$mysqli = new mysqli("127.0.0.1", "root","", "u569800724_evebd");
		if ( mysqli_connect_errno() ) {
		die("ERROR: No se estableció la conexión. ". mysqli_connect_error());
		}
	$err = 0;
	$acentos = $mysqli->query("SET NAMES 'utf8'");
	$query="INSERT INTO usuario (id, tipo, ubicacion, foto, tipo_imagen, R_S, P_S, pass, correo, fecha_n, nombre, apellidos, telefono, atencion_admin, sexo) VALUES (null, 1, '$ubicacion', '$foto', '$tipo_imagen', '$respuesta', '$pregunta', '$pass', '$correo', '$nacimiento', '$nombre', '$apellidos', '$telefono', '$atencion_admin', '$sexo')";
	//$resultado=$mysqli->query($query) or die('Correo electrónico ya en uso, inténtelo con otro');
	$resultado=$mysqli->query($query) or $err = 1;
	
	$mysqli->close();
	return $err;
}

function buscarUserbyCorreo($correo){
	$arr = null;
	$mysqli = new mysqli("127.0.0.1", "root","", "u569800724_evebd");
		if ( mysqli_connect_errno() ) {
		die("ERROR: No se estableció la conexión. ". mysqli_connect_error());
		}
	$acentos = $mysqli->query("SET NAMES 'utf8'");
	$query="SELECT * FROM usuario WHERE correo = '$correo'";
		$resultado=$mysqli->query($query);
		$numregistros=$resultado->num_rows;	
		if($numregistros == 1){
			while($fila = $resultado->fetch_row()){
				$idU = $fila[0];	$arr[] = $idU;
				$tipoU = $fila[1];	$arr[] = $tipoU;
				$ubicU = $fila[2];	$arr[] = $ubicU;
				$fotoU = $fila[3];	$arr[] = $fotoU;
				$tipo_imagenU = $fila[4];	$arr[] = $tipo_imagenU;
				$respU = $fila[5];	$arr[] = $respU;
				$pregU = $fila[6];	$arr[] = $pregU;
				$passU = $fila[7];	$arr[] = $passU;
				$correoU = $fila[8];	$arr[] = $correoU;
				$fechaU = $fila[9];	    $arr[] = $fechaU;
				$nombreU = $fila[10];	$arr[] = $nombreU;
				$apellU = $fila[11];	$arr[] = $apellU;
				$telefU = $fila[12];	$arr[] = $telefU;
				$aten = $fila[13];		$arr[] = $aten;
				$sex = $fila[14];		$arr[] = $sex;
			}
			}
		
	$mysqli->close();
	return $arr;
}


?>