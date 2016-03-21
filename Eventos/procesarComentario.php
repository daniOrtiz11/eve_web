<?php
session_start();
require_once '..\BD\eventoBD.php'; 
$id_u = $_SESSION["userid"];
$id_e = $_REQUEST["id_e"];
$puntos = $_REQUEST["voto"];
$comentario = $_REQUEST["com"];
insertarComentario($id_u, $id_e, $puntos, $comentario);
header ("Location: valoracion.php?id=$id_e");
?>