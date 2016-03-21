
<?php	
   
		function insertarEventoBD($titulo, $descripcion, $date, $ubicacion, $precio, $localizacion, $num_asistentes, $foto, $tipo_imagen, $gestor){
		$mysqli = new mysqli("127.0.0.1", "root","", "u569800724_evebd");
			if ( mysqli_connect_errno() ) {
			die("ERROR: No se estableció la conexión. ". mysqli_connect_error());
			}
		$err = 0;
		$acentos = $mysqli->query("SET NAMES 'utf8'");
		$query="INSERT INTO evento (id, ubicacion, fecha, tipo, descripcion, titulo, precio, num_asistentes, localizacion, atencion_admin, foto, tipo_imagen) VALUES (null, '$ubicacion', '$date', 1, '$descripcion', '$titulo', '$precio', '$num_asistentes', '$localizacion', 1, '$foto', '$tipo_imagen')";
		$resultado=$mysqli->query($query) or $err = 1;
		
		$mysqli->close();
		return $err;
}
		function gestiona_evento($id_Us, $id_Ev){
		$mysqli = new mysqli("127.0.0.1", "root","", "u569800724_evebd");
			if ( mysqli_connect_errno() ) {
			die("ERROR: No se estableció la conexión. ". mysqli_connect_error());
			}
		$err = 0;
		$acentos = $mysqli->query("SET NAMES 'utf8'");
		$query="INSERT INTO gest_eventos(id_Us, id_Ev, duracion) VALUES ('$id_Us', '$id_Ev', null)";
		$resultado=$mysqli->query($query) or $err = 1;
		
		$mysqli->close();
		return $err;	
		}
		
		function getEvento($id){
		$mysqli = new mysqli("127.0.0.1", "root","", "u569800724_evebd");
		if ( mysqli_connect_errno() ) {
		die("ERROR: No se estableció la conexión. ". mysqli_connect_error());
		}
		$acentos = $mysqli->query("SET NAMES 'utf8'");
		$query="SELECT * FROM evento WHERE id ='$id'";
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
		function getEventobyTit($titulo){
		$mysqli = new mysqli("127.0.0.1", "root","", "u569800724_evebd");
		if ( mysqli_connect_errno() ) {
		die("ERROR: No se estableció la conexión. ". mysqli_connect_error());
		}
		$acentos = $mysqli->query("SET NAMES 'utf8'");
		$query="SELECT * FROM evento WHERE titulo ='$titulo'";
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
		function getEventosComprados($id){
		$mysqli = new mysqli("127.0.0.1", "root","", "u569800724_evebd");
		/*$mysqli = new mysqli("127.0.0.1", "root","", "eve");*/
		if ( mysqli_connect_errno() ) {
		die("ERROR: No se estableció la conexión. ". mysqli_connect_error());
		}
		$acentos = $mysqli->query("SET NAMES 'utf8'");
		$query="SELECT DISTINCT id_e FROM entradas WHERE id_u ='$id'";
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

		function getEventosPropios($id){
		$mysqli = new mysqli("127.0.0.1", "root","", "u569800724_evebd");
		/*$mysqli = new mysqli("127.0.0.1", "root","", "eve");*/
		if ( mysqli_connect_errno() ) {
		die("ERROR: No se estableció la conexión. ". mysqli_connect_error());
		}
		$acentos = $mysqli->query("SET NAMES 'utf8'");
		$query="SELECT id_Ev FROM gest_eventos WHERE id_Us ='$id'";
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
		
		function getEventos(){
		$mysqli = new mysqli("127.0.0.1", "root","", "u569800724_evebd");
		/*$mysqli = new mysqli("127.0.0.1", "root","", "eve");*/
		if ( mysqli_connect_errno() ) {
		die("ERROR: No se estableció la conexión. ". mysqli_connect_error());
		}
		$acentos = $mysqli->query("SET NAMES 'utf8'");
		$query="SELECT id FROM evento";
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
		function getEventosUbicacion($ubicacion){
		/*$mysqli = new mysqli("127.0.0.1", "root","", "eve");*/
		$mysqli = new mysqli("127.0.0.1", "root","", "u569800724_evebd");
		if ( mysqli_connect_errno() ) {
		die("ERROR: No se estableció la conexión. ". mysqli_connect_error());
		}
		$acentos = $mysqli->query("SET NAMES 'utf8'");
		$query="SELECT id FROM evento WHERE ubicacion ='$ubicacion'";
		$resultado=$mysqli->query($query) or die($mysqli->error. " en la línea ".(__LINE__-1));
		$numregistros=$resultado->num_rows;	
		$arr = array();
		if($numregistros != 0){
			while($fila = $resultado->fetch_row()){
				$arr[] = $fila[0];
			}
		}
		$mysqli->close();
		return $arr;
		}
		function getUbicacionesEvento(){
		/*$mysqli = new mysqli("127.0.0.1", "root","", "eve");*/
		$mysqli = new mysqli("127.0.0.1", "root","", "u569800724_evebd");
		if ( mysqli_connect_errno() ) {
		die("ERROR: No se estableció la conexión. ". mysqli_connect_error());
		}
		$acentos = $mysqli->query("SET NAMES 'utf8'");
		$query="SELECT DISTINCT ubicacion FROM evento";
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
		function getTopValorados(){
		/*$mysqli = new mysqli("127.0.0.1", "root","", "eve");*/
		$mysqli = new mysqli("127.0.0.1", "root","", "u569800724_evebd");
		if ( mysqli_connect_errno() ) {
		die("ERROR: No se estableció la conexión. ". mysqli_connect_error());
		}
		$acentos = $mysqli->query("SET NAMES 'utf8'");
		$query="SELECT id_e, SUM(votacion) AS total FROM asiste
				GROUP BY id_e
				ORDER BY total DESC";
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
		function getTopVendidos(){
		/*
		$mysqli = new mysqli("127.0.0.1", "root","", "eve");*/
		$mysqli = new mysqli("127.0.0.1", "root","", "u569800724_evebd");
		if ( mysqli_connect_errno() ) {
		die("ERROR: No se estableció la conexión. ". mysqli_connect_error());
		}
		$acentos = $mysqli->query("SET NAMES 'utf8'");
		$query="SELECT id_e, SUM(num) AS total FROM entradas
				GROUP BY id_e
				ORDER BY total DESC";
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
		function getValoracion($id){
		/*$mysqli = new mysqli("127.0.0.1", "root","", "eve");*/
		$mysqli = new mysqli("127.0.0.1", "root","", "u569800724_evebd");
		if ( mysqli_connect_errno() ) {
		die("ERROR: No se estableció la conexión. ". mysqli_connect_error());
		}
		$acentos = $mysqli->query("SET NAMES 'utf8'");
		$query="SELECT votacion FROM asiste WHERE id_e ='$id'";
		$resultado=$mysqli->query($query) or die($mysqli->error. " en la línea ".(__LINE__-1));
		$numregistros=$resultado->num_rows;	
		$puntos = 0;
		if($numregistros  != 0){
			while($fila = $resultado->fetch_row()){
				$puntos = $puntos + $fila[0];
			}
		}
		$mysqli->close();
		return $arr;
		}
			
		function insertarComentario($idUsuario, $idEvento, $votacion, $comentario){
		$mysqli = new mysqli("127.0.0.1", "root","", "u569800724_evebd");
		/*$mysqli = new mysqli("127.0.0.1", "root","", "eve");*/
		if ( mysqli_connect_errno() ) {
		die("ERROR: No se estableció la conexión. ". mysqli_connect_error());
		}
		$acentos = $mysqli->query("SET NAMES 'utf8'");
		$query="INSERT INTO asiste VALUES ('$idUsuario','$idEvento',$votacion,'$comentario')";
		$resultado=$mysqli->query($query) or die($mysqli->error. " en la línea ".(__LINE__-1));
		$mysqli->close();
		}
		
		function asisteEvento($idUsuario, $idEvento){
		$mysqli = new mysqli("127.0.0.1", "root","", "u569800724_evebd");
		/*$mysqli = new mysqli("127.0.0.1", "root","", "eve");*/
		if ( mysqli_connect_errno() ) {
		die("ERROR: No se estableció la conexión. ". mysqli_connect_error());
		}
		$acentos = $mysqli->query("SET NAMES 'utf8'");
		$query="SELECT id_u FROM entradas WHERE (id_u='$idUsuario') AND (id_e='$idEvento')";
		$resultado=$mysqli->query($query) or die($mysqli->error. " en la línea ".(__LINE__-1));
		$numregistros=$resultado->num_rows;	
		if($numregistros  != 0){
			return true;
		}
		$mysqli->close();
		return false;
		}
		
		function asistirEvento($idUsuario, $idEvento, $num){
        $mysqli = new mysqli("127.0.0.1", "root","", "u569800724_evebd");
		/*$mysqli = new mysqli("127.0.0.1", "root","", "eve");*/
        if ( mysqli_connect_errno() ) {
        die("ERROR: No se estableció la conexión. ". mysqli_connect_error());
        }
		$acentos = $mysqli->query("SET NAMES 'utf8'");
		$query="INSERT INTO entradas VALUES ('$idUsuario' , '$idEvento' , '$num')";
		$resultado=$mysqli->query($query) or die($mysqli->error. " en la línea ".(__LINE__-1));
		$mysqli->close();
        }
		
		function getComentarios($idEvento){
		$mysqli = new mysqli("127.0.0.1", "root","", "u569800724_evebd");
		/*$mysqli = new mysqli("127.0.0.1", "root","", "eve");*/
		if ( mysqli_connect_errno() ) {
		die("ERROR: No se estableció la conexión. ". mysqli_connect_error());
		}
		$acentos = $mysqli->query("SET NAMES 'utf8'");
		$query="SELECT id_u, votacion, comentarios FROM asiste WHERE id_e='$idEvento'";
		$resultado=$mysqli->query($query) or die($mysqli->error. " en la línea ".(__LINE__-1));
		$numregistros=$resultado->num_rows;	
		$arr = array();
		if($numregistros  != 0){
			while($fila = $resultado->fetch_row()){
				$arr[] = $fila[0];
				$arr[] = $fila[1];
				$arr[] = $fila[2];
			}
		}
		$mysqli->close();
		return $arr;		
		}
		
		function isComentario($idUser, $idEvento){
		$mysqli = new mysqli("127.0.0.1", "root","", "u569800724_evebd");
		/*$mysqli = new mysqli("127.0.0.1", "root","", "eve");*/
		if ( mysqli_connect_errno() ) {
		die("ERROR: No se estableció la conexión. ". mysqli_connect_error());
		}
		$acentos = $mysqli->query("SET NAMES 'utf8'");
		$query="SELECT * FROM asiste WHERE id_u='$idUser' AND id_e='$idEvento'";
		$resultado=$mysqli->query($query) or die($mysqli->error. " en la línea ".(__LINE__-1));
		$numregistros=$resultado->num_rows;	
		$mysqli->close();
		if($numregistros  != 0){
			return true;
			}else
		return false;
		}
		
		
		function getEntradasVendidas($idEvento){
			$mysqli = new mysqli("127.0.0.1", "root","", "u569800724_evebd");
		/*$mysqli = new mysqli("127.0.0.1", "root","", "eve");*/
		if ( mysqli_connect_errno() ) {
		die("ERROR: No se estableció la conexión. ". mysqli_connect_error());
		}
		$acentos = $mysqli->query("SET NAMES 'utf8'");
		$query="SELECT num FROM entradas WHERE id_e='$idEvento'";
		$resultado=$mysqli->query($query) or die($mysqli->error. " en la línea ".(__LINE__-1));
		$numregistros=$resultado->num_rows;	
		$entradas = 0;
		if($numregistros  != 0){
			while($fila = $resultado->fetch_row()){
				$entradas = $entradas + $fila[0];			
			}
		}
		$mysqli->close();
		return $entradas;
		}
		
		function getAsistentes($idEvento, $idUser){
		$mysqli = new mysqli("127.0.0.1", "root","", "u569800724_evebd");
		/*$mysqli = new mysqli("127.0.0.1", "root","", "eve");*/
		if ( mysqli_connect_errno() ) {
		die("ERROR: No se estableció la conexión. ". mysqli_connect_error());
		}
		$acentos = $mysqli->query("SET NAMES 'utf8'");
		$query="SELECT id_u FROM entradas WHERE (id_e ='$idEvento') AND (id_u != '$idUser')";
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
		function EliminarEvento($id){
		$mysqli = new mysqli("127.0.0.1", "root","", "u569800724_evebd");
		/*$mysqli = new mysqli("127.0.0.1", "root","", "eve");*/
		if ( mysqli_connect_errno() ) {
		die("ERROR: No se estableció la conexión. ". mysqli_connect_error());
		}
		$query="DELETE FROM evento where id = '$id'";
		$resultado=$mysqli->query($query) or die($mysqli->error. " en la línea ".(__LINE__-1));
}
		function getEventosG(){
		$mysqli = new mysqli("127.0.0.1", "root","", "u569800724_evebd");
		/*$mysqli = new mysqli("127.0.0.1", "root","", "eve");*/
		if ( mysqli_connect_errno() ) {
		die("ERROR: No se estableció la conexión. ". mysqli_connect_error());
		}
	
		$query="SELECT id FROM evento WHERE atencion_admin = 1";
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
		function aceptarEvento($id){
$mysqli = new mysqli("127.0.0.1", "root","", "u569800724_evebd");
/*$mysqli = new mysqli("127.0.0.1", "root","", "eve");*/
		if ( mysqli_connect_errno() ) {
		die("ERROR: No se estableció la conexión. ". mysqli_connect_error());
		}
		
	$query="UPDATE evento SET atencion_admin = false WHERE id = '$id'";
	$resultado=$mysqli->query($query);
	$mysqli->close();
}
	
		function modTitulo($idE, $titulo){
		$mysqli = new mysqli("127.0.0.1", "root","", "u569800724_evebd");
		/*$mysqli = new mysqli("127.0.0.1", "root","", "eve");*/
			if ( mysqli_connect_errno() ) {
			die("ERROR: No se estableció la conexión. ". mysqli_connect_error());
			}
			
		$query="UPDATE evento SET titulo = '$titulo' WHERE id = '$idE'";
		$resultado=$mysqli->query($query);
		$mysqli->close();
		}
		function modDescrip($idE, $descrip){
		$mysqli = new mysqli("127.0.0.1", "root","", "u569800724_evebd");
		/*$mysqli = new mysqli("127.0.0.1", "root","", "eve");*/
			if ( mysqli_connect_errno() ) {
			die("ERROR: No se estableció la conexión. ". mysqli_connect_error());
			}
			
		$query="UPDATE evento SET descripcion = '$descrip' WHERE id = '$idE'";
		$resultado=$mysqli->query($query);
		$mysqli->close();
		}
		function modPrecio($idE, $precio){
		$mysqli = new mysqli("127.0.0.1", "root","", "u569800724_evebd");
		/*$mysqli = new mysqli("127.0.0.1", "root","", "eve");*/
			if ( mysqli_connect_errno() ) {
			die("ERROR: No se estableció la conexión. ". mysqli_connect_error());
			}
			
		$query="UPDATE evento SET precio = '$precio' WHERE id = '$idE'";
		$resultado=$mysqli->query($query);
		$mysqli->close();
		}
		function modFechaE($idE, $fecha){
		$mysqli = new mysqli("127.0.0.1", "root","", "u569800724_evebd");
		/*$mysqli = new mysqli("127.0.0.1", "root","", "eve");*/
			if ( mysqli_connect_errno() ) {
			die("ERROR: No se estableció la conexión. ". mysqli_connect_error());
			}
			
		$query="UPDATE evento SET fecha = '$fecha' WHERE id = '$idE'";
		$resultado=$mysqli->query($query);
		$mysqli->close();
		}
		function modUbicacionE($idE, $ubica){
		$mysqli = new mysqli("127.0.0.1", "root","", "u569800724_evebd");
		/*$mysqli = new mysqli("127.0.0.1", "root","", "eve");*/
			if ( mysqli_connect_errno() ) {
			die("ERROR: No se estableció la conexión. ". mysqli_connect_error());
			}
			
		$query="UPDATE evento SET ubicacion = '$ubica' WHERE id = '$idE'";
		$resultado=$mysqli->query($query);
		$mysqli->close();
		}
		function modAsist($idE, $asist){
		$mysqli = new mysqli("127.0.0.1", "root","", "u569800724_evebd");
		/*$mysqli = new mysqli("127.0.0.1", "root","", "eve");*/
			if ( mysqli_connect_errno() ) {
			die("ERROR: No se estableció la conexión. ". mysqli_connect_error());
			}
			
		$query="UPDATE evento SET num_asistentes = '$asist' WHERE id = '$idE'";
		$resultado=$mysqli->query($query);
		$mysqli->close();
		}
?>
