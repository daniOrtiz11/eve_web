<?php
require_once '..\BD\UsuarioBD.php'; 
session_start();

$ubi = $_SESSION["userubicacion"];

if ( isset($_POST['form']) ) {
	$nombre = isset($_POST['name']) ? $_POST['name'] : null ;
	$apell = isset($_POST['apellidos']) ? $_POST['apellidos'] : null ;
	$contra = isset($_POST['pass']) ? $_POST['pass'] : null ;
	$telf = isset($_POST['tel']) ? $_POST['tel'] : null ;
	$ubica = isset($_POST['ubicacion']) ? $_POST['ubicacion'] : null ;
	$fecha = isset($_POST['cumple']) ? $_POST['cumple'] : null ;
	$correo = isset($_POST['email']) ? $_POST['email'] : null ;

	
	if($nombre != null)
		modNombre($correo, $nombre);
	if($apell != null)
		modApellidos($correo, $apell);
	if($contra != null)
		modUserPass($correo, $contra);
	if($telf != null)
		modTelefono($correo, $telf);
	if($ubica != null)
		modUbicacion($correo, $ubica);
	if($fecha != null)
		modNacimiento($correo, $fecha);
		
	header("Location: ../Inicio/principalRegistrado.php?ubi=$ubi");
}

?>