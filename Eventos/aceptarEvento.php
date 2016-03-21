<?php require_once '..\BD\eventoBD.php'; ?>
 
<?php
$idact = $_GET['id'];
AceptarEvento($idact);
header('Location: ../Admin/adminPetGestor.php');


?>