<!DOCTYPE html>
<?php require_once '..\BD\mensajesBD.php'; 
require_once '..\BD\compatibilidadesBD.php';
require_once '..\BD\UsuarioBD.php';
session_start();
?>
	<html>
	
	
		<head>
		
			<title> Eve </title>
		    <link rel="stylesheet" type="text/css" href="mensajes.css" />
			<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/> 
		</head>
		
		<body>
			<?php 
				$ubi = $_SESSION['userubicacion'];
			?>
			
		<div id="menuDiv1">
		<a <?php echo "href='../Inicio/principalRegistrado.php?ubi=$ubi'"; ?> > <img src="../img/logoeve.png" id="imagen"/> </a>
			<p>Bienvenido, <?php echo $_SESSION["usernombre"] ?>.</p>
				<ul id="menu1">
					<?php echo"<li><a class='texto' href='../eventos/entradascompradas.php?ubi=$ubi'>Entradas</a>" ?>
					<?php echo "<a href='../eventos/entradascompradas.php?ubi=$ubi'><img id='entrada' src='../img/ticket-icon.png'></li></a>"?>
					<li><a class="texto" href='../Mensajes/mensajes.php'>Mensajes</a>
					<a href='../Mensajes/mensajes.php'><img id="mensaje" src="../img/mensaje.png"></li></a>
					<li><a class="texto" <?php echo "href='../Perfil/verperfil.php?id=0'>"?>Ver perfil</a>
					<a <?php echo "href='../Perfil/verperfil.php?id=0'"?>><img id="perfil" src="../img/perfil.png"></li></a>
					<li><a class="texto" href='../Inicio/cerrarSesion.php'>Salir</a>
					<a href='../Inicio/cerrarSesion.php'><img id="salir" src="../img/salir.png"></li></a>
				</ul>
		</div>		
		<div id="menuDiv2">
			<ul id="menu2">
					<?php echo "<li><a href='../Inicio/principalRegistrado.php?ubi=all'>";?>Todos los eventos</a></li>
					<?php echo "<li><a href='../Secundarias/miembrosR.php'>";?>¿Quiénes somos?</a></li>
					<?php echo "<li><a href='../Secundarias/contactoR.php'>";?>Contacta con nosotros</a></li>
				</ul>
		</div>		
				
				<?php
				$compatibles = array();
				$compatibles = getCompatibles($_SESSION["userid"]);
				$arrayMensajes = array();
				$arrayMensajes = getMensajes($_SESSION["userid"]);
				$numMensajes=sizeof($arrayMensajes)/2;
				?>

				<div id="contenedor">
					<div id="compatibilidad">			
						<div id="contenedorRecibidos">
						<h2>Bandeja de entrada</h2>
							<div id="recibidos">
								<?php if(sizeof($arrayMensajes)!= 0){ 
								for($i=0; $i<$numMensajes;$i++)
								{
								$cont=($i*2);//Lo usamos para acceder al array (mensaje, emisor)
								$emisor=array();
								$emisor=getUsuario($arrayMensajes[$cont+1]);
								?>
								<div id="caja">
									<div id="datos">
										<img <?php echo "src='../BD/obtenerFoto.php?id=$emisor[0]'";?>/>
										<p><?php echo $emisor[10] ?></p>
									</div>
									<div id="texto">
										<p><?php echo $arrayMensajes[$cont] ?></p>
									</div>
									<div id="responder">
									<form action="../Mensajes/enviar.php" method="POST">
										<input type="hidden" name="id"  <?php echo "value=$emisor[0]";?> />
										<input type="image" src="../img/responder.png" id="responderImg" />
									</form>
									</div>
								</div>
								<?php } 
								} else{ ?>
								<h2>No tienes mensajes</h2>
								<?php } ?>
							</div>
						</div>
						
						<div id="contenedorGente">
						<h2>Personas compatibles: <?php echo sizeof($compatibles); ?></h2>
							<div id="gente">
							<?php if(sizeof($compatibles)!= 0){ 
								for($i=0; $i<sizeof($compatibles);$i++)
								{
								$persona=array();
								$persona=getUsuario($compatibles[$i]);
								?>
								<div id="cajaPersona">
									<img <?php echo "src='../BD/obtenerFoto.php?id=$persona[0]'";?>/>
									<p><?php echo $persona[10] ?></p>
									<form action="../Mensajes/enviar.php" method="POST">
										<input type="hidden" name="id"  <?php echo "value=$persona[0]";?> />
										<input type="submit" id="boton" value="Enviar mensaje"/>
									</form>
								</div>
								<?php } 
								} ?>
							</div>
						</div>
					</div>
				</div>

		</body>
		
	</html>