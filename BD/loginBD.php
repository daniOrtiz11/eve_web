<!DOCTYPE html>
<?php
session_start();
?>
<html>

	<head>
		<title>Procesar Login</title>
	</head>

	<body>
		<?php
		$mysqli = new mysqli("127.0.0.1", "root","", "u569800724_evebd");
		/*$mysqli = new mysqli("127.0.0.1", "root","", "eve");*/
		if ( mysqli_connect_errno() ) {
		die("ERROR: No se estableció la conexión. ". mysqli_connect_error());
		}
		
		$usuario=$_REQUEST["email"];
		$query="SELECT pass FROM usuario WHERE correo='$usuario'";
		$resultado=$mysqli->query($query) or die($mysqli->error. " en la línea ".(__LINE__-1));
		$numregistros=$resultado->num_rows;	
		if($numregistros !=0){
			while ($fila = $resultado->fetch_row()){
				$passwordBD = $fila[0];
			}
			
		$password=$_REQUEST["clave"];
		if (password_verify($password, $passwordBD)==true){
			$query="SELECT id, nombre, ubicacion, tipo FROM usuario WHERE correo = '$usuario' AND pass = '$passwordBD'";
		$resultado=$mysqli->query($query) or die($mysqli->error. " en la línea ".(__LINE__-1));
		$numregistros=$resultado->num_rows;	
		if($numregistros == 1){
			while($fila = $resultado->fetch_row()){
				$_SESSION["userid"] = $fila[0];
				$_SESSION["usernombre"] = $fila[1];
				$_SESSION["userubicacion"] = $fila[2];
				$_SESSION["usertipo"] = $fila[3];
			}
			if($_SESSION["usertipo"] == 3)
			header('Location: ../Admin/admin.php');
			else if($_SESSION["usertipo"] == 2){
			$ubi=$_SESSION['userubicacion'];
			header ("Location: ../Gestor/principalGestor.php?ubi=$ubi");
			}
			else{
			$ubi=$_SESSION['userubicacion'];
			header ("Location: ../Inicio/principalRegistrado.php?ubi=$ubi");
			}
			}else{
			header('Location: ../Inicio/iniciosesion.php');
			}
			}else{
			header('Location: ../Inicio/iniciosesion.php');
		}
		}

		$mysqli->close();
		?>
	</body>
</html>
