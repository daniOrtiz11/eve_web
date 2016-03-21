<?php
// Conexion a la base de datos

session_start();


$mysqli = new mysqli("127.0.0.1", "root","", "u569800724_evebd");
		if ( mysqli_connect_errno() ) {
		die("ERROR: No se estableció la conexión. ". mysqli_connect_error());
		}
 

$idAct = $_GET["id"];
if ($idAct >= 0)
{
    // Consulta de búsqueda de la imagen.
    $query = "SELECT foto, tipo_imagen FROM evento WHERE id='$idAct'";
    $resultado = $resultado=$mysqli->query($query) or die($mysqli->error. " en la línea ".(__LINE__-1));
  //  $datos = mysql_fetch_assoc($resultado);

 $numregistros=$resultado->num_rows;	
		if($numregistros == 1){
			while($fila = $resultado->fetch_row()){
				$imagen = $fila[0];
				$tipo = $fila[1];		
			}
 }
   // $imagen = $datos['foto']; // Datos binarios de la imagen.
    //$tipo = $datos['tipo_imagen'];  // Mime Type de la imagen.
    // Mandamos las cabeceras al navegador indicando el tipo de datos que vamos a enviar.
    header('Content-type: $tipo');
    // A continuación enviamos el contenido binario de la imagen.
	if($imagen != null)
   echo $imagen;
   else
   echo null;
}
?>