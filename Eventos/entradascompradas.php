<!DOCTYPE html>
<?php require_once '..\BD\eventoBD.php'; 
require_once '..\BD\UsuarioBD.php';
session_start();
?>
	<html>
	
	
		<head>
		
			<title> Eve </title>
		    <link rel="stylesheet" type="text/css" href="../Inicio/principalRegistrado.css" />
			<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/> 
			
		</head>
		
		<body>
			<?php
			$ubiUsuario = $_SESSION['userubicacion'];
			$usuario = array();
			$entradas = array();
			$usuario = getUsuario($_SESSION["userid"]);	
			$entradas = getEventosComprados($_SESSION["userid"]);

			?>
		
		<div id="menuDiv1">
		<a <?php echo "href='../Inicio/principalRegistrado.php?ubi=$ubiUsuario'"; ?> > <img src="../img/logoeve.png" id="imagen"/> </a>
			<p>Bienvenido, <?php echo $_SESSION["usernombre"] ?>.</p>
				<ul id="menu1">
					<?php echo"<li><a class='texto' href='../eventos/entradascompradas.php'>Entradas</a>" ?>
					<?php echo "<a href='../eventos/entradascompradas.php'><img id='entrada' src='../img/ticket-icon.png'></li></a>"?>
					<li><a class="texto" href='../Mensajes/mensajes.php'>Mensajes</a>
					<a href='../Mensajes/mensajes.php'><img id="mensaje" src="../img/mensaje.png"></li></a>
					<li><a class="texto" <?php echo "href='../Perfil/verperfil.php?id=0'>"?>Ver perfil</a>
					<a <?php echo "href='../Perfil/verperfil.php?id=0'"?>><img id="perfil" src="../img/perfil.png"></li></a>
					<li><a class="texto" href='../inicio/cerrarSesion.php'>Salir</a>
					<a href='../inicio/cerrarSesion.php'><img id="salir" src="../img/salir.png"></li></a>
				</ul>
		</div>		
		<div id="menuDiv2">
			<ul id="menu2">
					<?php echo "<li><a href='../Inicio/principalRegistrado.php?ubi=all'>";?>Todos los eventos</a></li>
					<?php echo "<li><a href='../Secundarias/miembrosR.php'>";?>¿Quiénes somos?</a></li>
					<?php echo "<li><a href='../Secundarias/contactoR.php'>";?>Contacta con nosotros</a></li>
				</ul>
		</div>		
			
				
				<div id="eventoscomprados">
					
					<?php 
					if(sizeof($entradas) > 0)
					{
					echo "<h2>Eventos a los que asistiré</h2>";
					for($i=0; $i<sizeof($entradas);$i++)
					{
						$array = array();
						$array= getEvento($entradas[$i]);
						$date = new DateTime($array[2]);?>
						<li>
							<div id="imgEvento" style="background-image: url(<?php echo "../BD/obtenerFotoEvento.php?id=$array[0]"?>)">
								<h3><?php echo $array[6];?> €</h3>
							</div>
							<div id="titEvento">
								<h3><?php echo $array[5];?></h3>
							</div>
							<p><?php echo $array[1];?>, <?php echo date_format($date, 'd-m-Y');?></p>
							<form action="../Eventos/descripcion.php" method="GET">
							<button type="submit" name="id" id="eventoBoton" <?php echo "value=$array[0]";?>>Ver evento</button>
							</form>
						</li>
				<?php } ?>
				<?php }else echo "<h2>No hay entradas compradas.</h2>"; ?>
					
				</div>

		</body>
	</html>