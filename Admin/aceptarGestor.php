<?php require_once '..\BD\UsuarioBD.php'; ?>
 
<?php
$idact = $_GET['id'];
aceptarGestor($idact);
header('Location: adminTipoGestor.php');


?>