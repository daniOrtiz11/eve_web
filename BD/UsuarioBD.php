<?php
function getUsuario($id){
		$mysqli = new mysqli("127.0.0.1", "root","", "u569800724_evebd");
		/*$mysqli = new mysqli("127.0.0.1", "root","", "eve");*/
		if ( mysqli_connect_errno() ) {
		die("ERROR: No se estableció la conexión. ". mysqli_connect_error());
		}
		$acentos = $mysqli->query("SET NAMES 'utf8'");
		$query="SELECT * FROM usuario WHERE id ='$id'";
		$resultado=$mysqli->query($query) or die($mysqli->error. " en la línea ".(__LINE__-1));
		$numregistros=$resultado->num_rows;	
		$arr = array();
		if($numregistros  == 1){
			while($fila = $resultado->fetch_row()){
				$arr = $fila;
			}
		}
		$mysqli->close();
		return $arr;
		}
		
function buscarUser($correo){
			set_time_limit(0);
		$mysqli = new mysqli("localhost", "root","", "u569800724_evebd");
		if ( mysqli_connect_errno() ) {
		die("ERROR: No se estableció la conexión. ". mysqli_connect_error());
		}
		$acentos = $mysqli->query("SET NAMES 'utf8'");
		$query="SELECT * FROM usuario WHERE correo ='$correo'";
		$resultado=$mysqli->query($query) or die($mysqli->error. " en la línea ".(__LINE__-1));
		$numregistros=$resultado->num_rows;	
		$arr = array();
		if($numregistros  == 1){
			while($fila = $resultado->fetch_row()){
				$arr = $fila;
			}
		}
		$mysqli->close();
		return $arr;
	
}
		
function EliminarUser($id){
/*$mysqli = new mysqli("127.0.0.1", "root","", "eve");*/
		$mysqli = new mysqli("127.0.0.1", "root","", "u569800724_evebd");
		if ( mysqli_connect_errno() ) {
		die("ERROR: No se estableció la conexión. ". mysqli_connect_error());
		}
		$query="DELETE FROM usuario where id = '$id'";
		$resultado=$mysqli->query($query) or die($mysqli->error. " en la línea ".(__LINE__-1));
}
function getUsuarios(){
/*$mysqli = new mysqli("127.0.0.1", "root","", "eve");*/
		$mysqli = new mysqli("127.0.0.1", "root","", "u569800724_evebd");
		if ( mysqli_connect_errno() ) {
		die("ERROR: No se estableció la conexión. ". mysqli_connect_error());
		}
	
		$query="SELECT id FROM usuario WHERE tipo = 1 OR tipo = 2";
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

function aceptarGestor($id){
/*$mysqli = new mysqli("127.0.0.1", "root","", "eve");*/
$mysqli = new mysqli("127.0.0.1", "root","", "u569800724_evebd");
		if ( mysqli_connect_errno() ) {
		die("ERROR: No se estableció la conexión. ". mysqli_connect_error());
		}
		
	$query="UPDATE usuario SET tipo = 2, atencion_admin = false WHERE id = '$id'";
	$resultado=$mysqli->query($query);
	$mysqli->close();
}
function rechazarGestor($id){
/*$mysqli = new mysqli("127.0.0.1", "root","", "eve");*/
$mysqli = new mysqli("127.0.0.1", "root","", "u569800724_evebd");
		if ( mysqli_connect_errno() ) {
		die("ERROR: No se estableció la conexión. ". mysqli_connect_error());
		}
		
	$query="UPDATE usuario SET atencion_admin = false WHERE id = '$id'";
	$resultado=$mysqli->query($query);
	$mysqli->close();
}
function getUsuariosG(){
/*$mysqli = new mysqli("127.0.0.1", "root","", "eve");*/
		$mysqli = new mysqli("127.0.0.1", "root","", "u569800724_evebd");
		if ( mysqli_connect_errno() ) {
		die("ERROR: No se estableció la conexión. ". mysqli_connect_error());
		}
	
		$query="SELECT id FROM usuario WHERE atencion_admin = 1";
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
	function modUserPass($correo, $pass1){
	/*$mysqli = new mysqli("127.0.0.1", "root","", "eve");*/
	$mysqli = new mysqli("127.0.0.1", "root","", "u569800724_evebd");
		if ( mysqli_connect_errno() ) {
		die("ERROR: No se estableció la conexión. ". mysqli_connect_error());
		}
		
	$password = password_hash($pass1, PASSWORD_DEFAULT);
	$query="UPDATE usuario SET pass = '$password' WHERE correo = '$correo'";
	$resultado=$mysqli->query($query);
	$mysqli->close();
}
	function modNombre($correo, $nombre1){
	/*$mysqli = new mysqli("127.0.0.1", "root","", "eve");*/
	$mysqli = new mysqli("127.0.0.1", "root","", "u569800724_evebd");
		if ( mysqli_connect_errno() ) {
		die("ERROR: No se estableció la conexión. ". mysqli_connect_error());
		}
		
	$query="UPDATE usuario SET nombre = '$nombre1' WHERE correo = '$correo'";
	$resultado=$mysqli->query($query);
	$mysqli->close();
}
	function modUbicacion($correo, $ubic1){
	/*$mysqli = new mysqli("127.0.0.1", "root","", "eve");*/
	$mysqli = new mysqli("127.0.0.1", "root","", "u569800724_evebd");
		if ( mysqli_connect_errno() ) {
		die("ERROR: No se estableció la conexión. ". mysqli_connect_error());
		}
		
	$query="UPDATE usuario SET ubicacion = '$ubic1' WHERE correo = '$correo'";
	$resultado=$mysqli->query($query);
	$mysqli->close();
}
	function modNacimiento($correo, $nacimiento1){
	/*$mysqli = new mysqli("127.0.0.1", "root","", "eve");*/
	$mysqli = new mysqli("127.0.0.1", "root","", "u569800724_evebd");
		if ( mysqli_connect_errno() ) {
		die("ERROR: No se estableció la conexión. ". mysqli_connect_error());
		}
		
	$query="UPDATE usuario SET fecha_n = '$nacimiento1' WHERE correo = '$correo'";
	$resultado=$mysqli->query($query);
	$mysqli->close();
}
	function modApellidos($correo, $apell1){
	/*$mysqli = new mysqli("127.0.0.1", "root","", "eve");*/
	$mysqli = new mysqli("127.0.0.1", "root","", "u569800724_evebd");
		if ( mysqli_connect_errno() ) {
		die("ERROR: No se estableció la conexión. ". mysqli_connect_error());
		}
		
	$query="UPDATE usuario SET apellidos = '$apell1' WHERE correo = '$correo'";
	$resultado=$mysqli->query($query);
	$mysqli->close();
}
	function modTelefono($correo, $telef1){
	/*$mysqli = new mysqli("127.0.0.1", "root","", "eve");*/
	$mysqli = new mysqli("127.0.0.1", "root","", "u569800724_evebd");
		if ( mysqli_connect_errno() ) {
		die("ERROR: No se estableció la conexión. ". mysqli_connect_error());
		}
		
	$query="UPDATE usuario SET telefono = '$telef1' WHERE correo = '$correo'";
	$resultado=$mysqli->query($query);
	$mysqli->close();
}
	function getFechaNacimiento($id){
		/*$mysqli = new mysqli("127.0.0.1", "root","", "eve");*/
		$mysqli = new mysqli("127.0.0.1", "root","", "u569800724_evebd");
		if ( mysqli_connect_errno() ) {
		die("ERROR: No se estableció la conexión. ". mysqli_connect_error());
		}
     	$acentos = $mysqli->query("SET NAMES 'utf8'");
		$query="SELECT fecha_n FROM usuario WHERE id ='$id'";
		$resultado=$mysqli->query($query) or die($mysqli->error. " en la línea ".(__LINE__-1));
		$numregistros=$resultado->num_rows;	
		if($numregistros  == 1){
			while($fila = $resultado->fetch_row()){
				$fecha = $fila[0];
			}
		}
		$mysqli->close();
		list($ano, $mes, $dia) = explode("-", $fecha); //Devuelve un array de strings con las separaciones en '-'
		$edad = date("Y")-$ano; //Devuelve el año actual y le quita el de la fecha
		$mes = date("m")-$mes; //Devuelve el mes actual y le quita el de la fecha
		$dia = date("d")-$dia; //Devuelve el dia actual y le quita el de la fecha
		if($mes==0 && $dia < 0 || $mes < 0) $edad--;
		return $edad;
}
?>