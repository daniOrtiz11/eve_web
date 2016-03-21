<?php require_once '..\BD\eventoBD.php'; ?>
 
<?php
$idact = $_GET['id'];
EliminarEvento($idact);
header('Location: ../Admin/adminPetGestor.php');


?>