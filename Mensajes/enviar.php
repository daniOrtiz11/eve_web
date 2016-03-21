<!DOCTYPE html>
<?php require_once '..\BD\mensajesBD.php'; 
require_once '..\BD\compatibilidadesBD.php';
require_once '..\BD\UsuarioBD.php';
session_start();
?>
	<html>
	
	
		<head>
		
			<title>Enviar mensaje</title>
		    <link rel="stylesheet" type="text/css" href="mensajes.css" />
			<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/> 
		</head>
		
		<body>
			<?php 
				$ubi = $_SESSION['userubicacion'];
				$receptorId=$_POST['id'];
			?>
			
		<div id="menuDiv1">
		<a <?php echo "href='../Inicio/principalRegistrado.php?ubi=$ubi'"; ?> > <img src="../img/logoeve.png" id="imagen"/> </a>
			<p>Bienvenido, <?php echo $_SESSION["usernombre"] ?>.</p>
				<ul id="menu1">
					<li><a class="texto" href='buscar.php'>Entradas</a>
					<a href='buscar.php'><img id="entrada" src="../img/ticket-icon.png"></li></a>
					<li><a class="texto" href='../Mensajes/mensajes.php'>Mensajes</a>
					<a href='../Mensajes/mensajes.php'><img id="mensaje" src="../img/mensaje.png"></li></a>
					<li><a class="texto" href='../Perfil/verperfil.php'>Ver perfil</a>
					<a href='../Perfil/verperfil.php'><img id="perfil" src="../img/perfil.png"></li></a>
					<li><a class="texto" href='cerrarSesion.php'>Salir</a>
					<a href='../principal.php'><img id="salir" src="../img/salir.png"></li></a>
				</ul>
		</div>		
		<div id="menuDiv2">
			<ul id="menu2">
					<?php echo "<li><a href='entradas.php'>";?>Todos los eventos</a></li>
					<?php echo "<li><a href='../Secundarias/miembrosR.php'>";?>¿Quiénes somos?</a></li>
					<?php echo "<li><a href='../Secundarias/contactoR.php'>";?>Contacta con nosotros</a></li>
				</ul>
		</div>		
				
				<?php
				$receptor = array();
				$receptor = getUsuario($receptorId);
				?>

				<div id="contenedor">
					<div id="contenedorEnviar">			
						<h2>Enviar mensaje a <?php echo $receptor[10]; ?></h2>
							<div>
							 <form method="POST"<?php echo "action='procesarMensaje.php'"; ?>>
								<textarea name="mensaje" cols="60" rows="6" required>Escribe aquí tu mensaje...</textarea> <br/>
								<input type="hidden" name="receptor" <?php echo "value='$receptorId'"; ?>/>
								<input type="submit" name="id" id="botonEnviar" value="Enviar mensaje" />
								<button id="reset" type="reset">Empieza de nuevo</button>
							</form>
							</div>			
					</div>		
				</div>

		</body>
		
	</html>
	
					