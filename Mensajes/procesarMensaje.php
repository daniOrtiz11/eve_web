<?php
session_start();
require_once '..\BD\mensajesBD.php'; 
$id_u = $_SESSION["userid"];
$receptor= $_REQUEST["receptor"];
$texto = $_REQUEST["mensaje"];
insertarMensaje($id_u, $receptor, $texto);
header ("Location: mensajes.php");
?>	
		