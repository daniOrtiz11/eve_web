<!DOCTYPE html>
<?php require_once 'BD\eventoBD.php'; 
?>
	<html>
	
	
		<head>
		
			<title> Eve </title>
		    <link rel="stylesheet" type="text/css" href="principal.css" />
			<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/> 
		</head>
		
		<body>
		
		<div id="menuDiv1">
		<a href="principal.php" > <img src="img/logoeve.png" id="imagen"/> </a>
			<p>Bienvenido a Eve.</p>
				<ul id="menu1">
					<li><a class="texto" href='Registro/registro.php'>Regístrate</a>
					<a href='Registro/registro.php'><img id="perfil" src="img/perfil.png"></li></a>
					<li><a class="texto" href='Inicio/iniciosesion.php'>Login</a>
					<a href='Inicio/iniciosesion.php'><img id="salir" src="img/salir.png"></li></a>
				</ul>
			
		</div>		
		<div id="menuDiv2">
			<ul id="menu2">
					<?php echo "<li><a href='principal.php'>";?>Todos los eventos</a></li>
					<?php echo "<li><a href='Secundarias/miembros.php'>";?>¿Quiénes somos?</a></li>
					<?php echo "<li><a href='Secundarias/contacto.php'>";?>Contacta con nosotros</a></li>
			</ul>
		</div>		
			
				<div id="cabecera">
					<div id="infoCabecera">
						<h2>Elige tu evento</h2>
						<p>¡Asiste, vive experiencias únicas y conoce gente nueva!</p>
						<form method="GET" id="formCiudad" action="principal.php">
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
						<input type="image" id="imgCiudad"src="img/buscarCiudad.png"/>
						</form>
					</div>
				</div>	
				
				<?php
				if(isset($_GET['ubi'])){
				$ubicacion=ucfirst($_GET["ubi"]);
				$arrayEventos = getEventosUbicacion($ubicacion);	
				}else{
				$arrayEventos = getEventos();	
				}
				$masVendidos=array();
				$masVendidos=getTopVendidos();
				?>

				<div id="contenedor">
					<div id="masVendidos">
					<h2>Más vendidos</h2>
					<img src="img/masVendidos.png"/>
					<?php if(sizeof($masVendidos) !=0){
					$evVendidos = getEvento($masVendidos[0]);
					$entradas = getEntradasVendidas($masVendidos[0]);					
					?>
					<div id="cajaV" >
						<img id="winner" src="img/winner.png">
						<div id="titEv">
							<p><?php echo $evVendidos[5];?></p></br>
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
								<p><?php echo $evVendidos[5];?></p></br>
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
					if(!isset($_GET['ubi'])){echo "<h2>Todos los eventos</h2>";
					}else echo "<h2>Eventos en $ubicacion </h2>";
					for($i=0; $i<sizeof($arrayEventos);$i++)
					{
						$array = array();
						$array= getEvento($arrayEventos[$i]);
						if($array[9] == false){
						$date = new DateTime($array[2]);?>
						<li>
							<div id="imgEvento" style="background-image: url(<?php echo "BD/obtenerFotoEvento.php?id=$array[0]"?>)">
								<h3><?php echo $array[6];?> €</h3>
							</div>
							<div id="titEvento">
								<h3><?php echo $array[5];?></h3>
							</div>
							<p><?php echo $array[1];?>, <?php echo date_format($date, 'd-m-Y');?></p>
							<form action="Inicio/iniciosesion.php">
							<button type="submit" name="id" id="eventoBoton">Ver evento</button>
							</form>
						</li>
				<?php }} ?>
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
						<img src="img/mejoresValorados.png"/>
					</div>
					<?php if(sizeof($eventos) != 0){
					$ev = getEvento($eventos[0]); ?>
					<div id="caja">
						<img id="winner" src="img/winner.png">
						<div id="titEv">
							<p><?php echo $ev[5];?></p></br>
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
								<p><?php echo $ev[5];?></p></br>
							</div>
							<h3><?php echo $ev[6];?> €</h3> 
						</div>
					<?php } 
					}else echo "<h2>Aún no hay eventos valorados.</h2>"; ?>
					
					</div>
				</div>				
		</body>
		
	</html>