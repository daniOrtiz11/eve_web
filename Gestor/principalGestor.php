<!DOCTYPE html>
<?php require_once '..\BD\eventoBD.php'; 
session_start();
?>
	<html>
	
	
		<head>
		
			<title> Eve </title>
		    <link rel="stylesheet" type="text/css" href="../Inicio/principalRegistrado.css" />
			<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/> 
			
			
			<script language="JavaScript"> 
			function lanzarAyuda(){ 
			window.open("Secundarias/ayuda.html","ventana1","width=1150,height=900,scrollbars=YES") 
			} 
			</script>
		</head>
		
		<body>
			<?php
			$arrayEventos = array();
			$ubicacion = $_SESSION['userubicacion'];
			$id = $_SESSION["userid"];

			$arrayEventos = getEventosPropios($id);
			?>
		
		<div id="menuDiv1">
		<a <?php echo "href='principalGestor.php?ubi=$ubicacion'"; ?> > <img src="../img/logoeve.png" id="imagen"/> </a>
			<p>Bienvenido, <?php echo $_SESSION["usernombre"] ?>.</p>
				<ul id="menu1">
					<li><a class="texto" href='../Eventos/creacionevento.php'>Crear</a>
					<a href='../Eventos/creacionevento.php'><img id="buscar" src="../img/2784.png"></li></a>
					<li><a class="texto" <?php echo "href='../Perfil/verperfil.php?id=0'>"?>Ver perfil</a>
					<a <?php echo "href='../Perfil/verperfil.php?id=0'"?>><img id="perfil" src="../img/perfil.png"></li></a>
					<li><a class="texto" href='../Inicio/cerrarSesion.php'>Salir</a>
					<a href='../inicio/cerrarSesion.php'><img id="salir" src="../img/salir.png"></li></a>
				</ul>
		</div>		
		 <div id="menuDiv2">
			<p>Página principal del gestor desde la que puede modificar sus eventos  </p>
		</div>	
			
				<div id="cabecera">
					<div id="infoCabecera">
						<h2>Elige tu evento</h2>
						<p>¡Asiste, vive experiencias únicas y conoce gente nueva!</p>
						<form method="GET" id="formCiudad" action="principalGestor.php">
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
					<?php 
					if(sizeof($arrayEventos) > 0)
					{
					echo "<h2>Eventos propios</h2>";
					for($i=0; $i<sizeof($arrayEventos);$i++)
					{
						$array = array();
						$array= getEvento($arrayEventos[$i]);
						
						$date = new DateTime($array[2]);?>
						<li>
							<div id="imgEvento" style="background-image: url(<?php echo "../BD/obtenerFotoEvento.php?id=$array[0]"?>)">
								<h3><?php echo $array[6];?> €</h3>
							</div>
							<div id="titEvento">
								<h3><?php echo $array[5];?></h3>
							</div>
							<p><?php echo $array[1];?>, <?php echo date_format($date, 'd-m-Y');?></p>
							<a <?php echo "<a href='../Eventos/modificarEvento.php?id=$array[0]'>"; ?> <button id="eventoBoton">Modificar evento</button> </a>
						</li>
				<?php } ?>
				<?php }else echo "<h2>Aún no tienes eventos creados.</h2>"; ?>
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
					
				</div>
		</body>
		
	</html>