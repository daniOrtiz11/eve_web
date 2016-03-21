<?php require_once '..\BD\UsuarioBD.php'; ?>
 
<?php
$idact = $_GET['id'];
EliminarUser($idact);
header('Location: admin.php');


?>