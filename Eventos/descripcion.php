<!DOCTYPE html>
<?php require_once '..\BD\eventoBD.php'; 
require_once '..\BD\UsuarioBD.php'; 
session_start();?>

	<html>
	
		<head>
			<title>Descripcion</title>
		    <link rel="stylesheet" type="text/css" href="estiloEventos.css" />
			<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/> 
		</head>
		
		<body>
		
			<?php 
				$id = $_GET["id"];
				$arr = array();
				$arr = getEvento($id); 
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
					<li><a class="texto" href='../inicio/cerrarSesion.php'>Salir</a>
					<a href='../inicio/cerrarSesion.php'><img id="salir" src="../img/salir.png"></li></a>
				</ul>
		</div>		
							
			<div id="menuDiv2">
				<ul id="menu2">
					<?php echo "<li><a href='descripcion.php?id=$id'>";?>Descripción</a></li>
					<?php echo "<li><a href='entradas.php?id=$id'>";?>Entradas</a></li>
					<?php echo "<li><a href='asistentes.php?id=$id'>";?>Asistentes</a></li>
					<?php echo "<li><a href='valoracion.php?id=$id'>";?>Valoraciones</a></li>
				</ul>
			</div>		
				

				
				<div id="contenedorDescripcion">
				
				<div id="NombreEvento">
					<h1><?php echo $arr[5] ?></h1>
				</div>
				<?php
					$_SESSION["idFE"] = $arr[0];
				?>	
				<div id="fotoEvento">

						<img id="fotoevento" <?php echo "src='../BD/obtenerFotoEvento.php?id=$arr[0]'"?>/> 
				</div>
				
				<div id="descripcionEvento">
					<p><?php echo $arr[4] ?></p>
				</div>

			

				
				<div id="datos">
					<div id="contenidodatos">
						<p id="ubicacion">
								<h4>Ubicación:</h4> <?php echo $arr[8] ?>
						</p>
						<p id="fecha">
								<?php $date = new DateTime($arr[2]); ?>
								<h4>Fecha del evento:</h4> <?php echo date_format($date, 'd-m-Y'); ?>
						</p>
						<p id="precio">
								<h4>Precio:</h4> <?php echo $arr[6] ?> €
						</p>
						<p id="numasist">
								<h4>Aforo máximo:</h4> <?php echo $arr[7] ?> Personas.
						</p>
					</div>
				</div>

					<iframe id="bordemapa" name="window" <?php echo "src='https://maps.google.com/?q=$arr[8]&output=embed'"; ?>></iframe>
			
			</div>
		</body>
	</html>