<!DOCTYPE html>
<?php require_once '..\BD\eventoBD.php'; 
require_once '..\BD\UsuarioBD.php'; 
session_start();?>

	<html>
	
		<head>
			<title>Entradas</title>
		    <link rel="stylesheet" type="text/css" href="estiloEventos.css" />
			<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/> 
		</head>
		
		<body>
			<?php 
				$id = $_GET["id"];
				$arr = array();
				$arr = getEvento($id); 
				$entradasVendidas = getEntradasVendidas($id);
				$entradasDisponibles = $arr[7] - $entradasVendidas;
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
				
				<div id="contenedorEntradas">
				
				<div id="NombreEvento">
					<img src="../img/tickets.png"> <h1>Entradas</h1>
				</div>
				
				
				
				<div id="entradasDiv">

								<h3><b>Precio de entrada:</b> <?php echo $arr[6] ?> Euros.</h3>

								<h3><b>Entradas vendidas:</b> <?php echo $entradasVendidas ?>.</h3>

								<h3><b>Entradas disponibles:</b> <?php echo $entradasDisponibles ?>.</h3>

								<h3><b>Aforo máximo:</b> <?php echo $arr[7] ?> Personas.</h3>
							
						</div>				
				<div id="compraDiv">
					<?php if($entradasDisponibles > 0){ ?>
							<h3>¿Cuantas entradas desea comprar?</h3>
						<form <?php echo "action='../Secundarias/pasarelaentrada.php?idE=$id'";?> method="POST">
					<?php if($entradasDisponibles > 10){ ?>
							Número de entradas: <input type="number" name="numeroE" min="1" max="10" required="required"/></br>
					<?php	}else{ ?>
							Número de entradas: <input type="number" name="numeroE" min="1" <?php echo "max='$entradasDisponibles'";?> required="required"/></br>
					<?php	} ?>
							<input type="image" src="../img/compraEntradas.png" alt="Submit Form" id="botonComprar"/>
						</form>
						
						<?php } else{ ?>
							<img id="agotadas" src="../img/agotadas.png"/>
						<?php }?>
				</div>
					
			</div>
		</body>
	</html>