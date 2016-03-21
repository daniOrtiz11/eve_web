<!DOCTYPE html>
<?php require_once '..\BD\eventoBD.php'; 
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
			$arrayEventos = array();
			$ubicacion=ucfirst($_GET["ubi"]);
			if($ubicacion != 'All'){ //Si es All muestra todos los eventos
			$arrayEventos = getEventosUbicacion($ubicacion);
			}else{
			$arrayEventos = getEventos();
			} ?>
		
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
			
				<div id="cabecera">
					<div id="infoCabecera">
						<h2>Elige tu evento</h2>
						<p>¡Asiste, vive experiencias únicas y conoce gente nueva!</p>
						<form method="GET" id="formCiudad" action="principalRegistrado.php">
						<input type="text" name="ubi" id="inputCiudad" list="buscarCiudades" placeholder=" Busca tu ciudad..."/>
							<datalist id="buscarCiudades">
							<?php
							$arrayUbi = array();
							$arrayUbi = getUbicacionesEvento();
							for($j=0; $j<sizeof($arrayUbi); $j++)
							{
							echo "<option value='$arrayUbi[$j]'>";
							 } ?>
							</datalist>
						<input type="image" id="imgCiudad"src="../img/buscarCiudad.png"/>
						</form>
					</div>
				</div>	
				

				<?php
				$masVendidos=array();
				$masVendidos=getTopVendidos();
				?>

				<div id="contenedor">
					<div id="masVendidos">
					<h2>Más vendidos</h2>
					<img src="../img/masVendidos.png"/>
					<?php if(sizeof($masVendidos) !=0){
					$evVendidos = getEvento($masVendidos[0]);
					$entradas = getEntradasVendidas($masVendidos[0]);					
					?>
					<div id="cajaV" >
						<img id="winner" src="../img/winner.png">
						<div id="titEv">
						<?php echo "<a href='../Eventos/descripcion.php?id=$masVendidos[0]'";?><p><?php echo $evVendidos[5];?></p></a></br>
						</div>
						<h3><?php echo $entradas;?> asistentes</h3> 
					</div>
					<?php 
					for($i=1; $i<5; $i++) { 
					$evVendidos = getEvento($masVendidos[$i]);
					$entradas = getEntradasVendidas($masVendidos[$i]);
					?>
						<div id="cajaV">
							<?php $puesto = $i + 1; ?>
							<div id="titEv">
								<h2><?php echo $puesto;?>. </h2>
							<?php echo "<a href='../Eventos/descripcion.php?id=$masVendidos[$i]'";?><p><?php echo $evVendidos[5];?></p></a></br>
							</div>
							<h3><?php echo $entradas;?> asistentes</h3> 
						</div>
					<?php } ?>
					<?php }else echo "<h2>Aún no hay eventos comprados.</h2>"; ?>
					</div>
					</div>
					
					<div id="eventos">
					<div id="listaEventos">
					<?php 
					if(sizeof($arrayEventos) > 0)
					{
					if($ubicacion != 'All')echo "<h2>Eventos en $ubicacion</h2>";
					else echo "<h2>Todos los eventos</h2>";
					for($i=0; $i<sizeof($arrayEventos);$i++)
					{
						$array = array();
						$array= getEvento($arrayEventos[$i]);
						if($array[9] == false){
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
				<?php } }?>
				<?php }else echo "<h2>No hay eventos en tu ciudad, puedes buscar en otras.</h2>"; ?>
					</div>
					</div>
					
					<?php
					$eventos=array();
					$eventos=getTopValorados();
					?>
					<div id="mejoresValorados">
					<div id="tituloValorados">
						<h2>Mejor valorados</h2>
						<img src="../img/mejoresValorados.png"/>
					</div>
					<?php if(sizeof($eventos) != 0){
					$ev = getEvento($eventos[0]); ?>
					<div id="caja">
						<img id="winner" src="../img/winner.png">
						<div id="titEv">
						<?php echo "<a href='../Eventos/descripcion.php?id=$eventos[0]'";?><p><?php echo $ev[5];?></p></a></br>
						</div>
						<h3><?php echo $ev[6];?> €</h3> 
					</div>
					<?php 
					for($i=1; $i<5; $i++) { 
					$ev = getEvento($eventos[$i]);
					?>
						<div id="caja">
							<?php $puesto = $i + 1; ?>
							<div id="titEv">
								<h2><?php echo $puesto;?></h2>
							<?php echo "<a href='../Eventos/descripcion.php?id=$eventos[$i]'";?><p><?php echo $ev[5];?></p></a></br>
							</div>
							<h3><?php echo $ev[6];?> €</h3> 
						</div>
					<?php } ?>
					<?php }else echo "<h2>Aún no hay eventos valorados.</h2>"; ?>
					</div>
					

		</body>
		
	</html>