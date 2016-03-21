<?php require_once '..\BD\UsuarioBD.php'; ?>
 
<?php
$idact = $_GET['id'];
eliminarUser($idact);
header('Location: adminTipoGestor.php');


?>