<?php
 require_once '..\BD\eventoBD.php'; 


if ( isset($_POST['form']) ) {
	$titulo = isset($_POST['titulo']) ? $_POST['titulo'] : null ;
	$descrip = isset($_POST['descripcion']) ? $_POST['descripcion'] : null ;
	$fecha = isset($_POST['date']) ? $_POST['date'] : null ;
	$precio = isset($_POST['precio']) ? $_POST['precio'] : null ;
	$ubica = isset($_POST['ubic']) ? $_POST['ubic'] : null ;
	$asist = isset($_POST['asist']) ? $_POST['asist'] : null ;
	$idE = isset($_POST['idEv']) ? $_POST['idEv'] : null ;
	
	
	
	if($titulo != null)
		modTitulo($idE, $titulo);
	if($descrip != null)
		modDescrip($idE, $descrip);
	if($fecha != null)
		modFechaE($idE, $fecha);
	if($precio != null)
		modPrecio($idE, $precio);
	if($ubica != null)
		modUbicacionE($idE, $ubica);
	if($asist != null)
		modAsist($idE, $asist);
		
	$tipo = $_SESSION["usertipo"];
		if($tipo == 3){
		header('Location: ../Admin/admin.php');
		}
		else
		header('Location: ../Gestor/principalGestor.php');
}

?>