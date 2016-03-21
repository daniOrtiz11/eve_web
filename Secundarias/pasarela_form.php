<?php require_once '..\BD\eventoBD.php'; 
 require_once '..\BD\UsuarioBD.php'; 
session_start();?>

<?php 

	$idE = $_GET['idE'];
	$num = $_GET['num'];
	
	asistirEvento($_SESSION["userid"], $idE, $num);
?>	
<script>
	alert("Entrada pagada satisfactoriamente!");
</script>";
<?php 
	header("Location: ../Eventos/descripcion.php?id=$idE")
?>	
