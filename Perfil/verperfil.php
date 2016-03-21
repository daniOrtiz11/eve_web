<!DOCTYPE html>
<?php require_once '..\BD\UsuarioBD.php'; ?>
<?php
session_start();
?>
	<html>
	
		<head>
			<title> Pefil </title>
		    <link rel="stylesheet" type="text/css" href="verperfil.css" />
			<!-- <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/> -->
		</head>
		
		<body>
			<?php 
				$usuario = array();
				$usuario = getUsuario($_SESSION["userid"]);			
			?>
		<?php
		$tipo = $_SESSION["usertipo"];
		if($tipo == 3){
		$ref = "href='../Admin/admin.php'";
		}
		if($tipo == 2){
		$ubicacion = $_SESSION['userubicacion'];
		$ref = "href='../Gestor/principalGestor.php?ubi=$ubicacion'";
		}
		if($tipo == 1){
		$ubicacion = $_SESSION['userubicacion'];
		$ref = "href='../Inicio/principalRegistrado.php?ubi=$ubicacion'";}
		?>
			<div id="menuDiv1">
			<br>
		<a <?php echo $ref; ?> > <img src="../img/logoeve.png" id="imagen"/> </a>
				<p>Bienvenido, <?php echo $_SESSION["usernombre"] ?>.</p>
				<ul id="menu1">
					
					<?php
					if($tipo == 1){	
					echo"<li><a class='texto' href='../eventos/entradascompradas.php?ubi=$ubicacion'>Entradas</a>" ;
					echo "<a href='../eventos/entradascompradas.php?ubi=$ubicacion'><img id='entrada' src='../img/ticket-icon.png'></li></a>";
					
					echo"<li><a class='texto' href='../Mensajes/mensajes.php'>Mensajes</a>";
					echo"<a href='../Mensajes/mensajes.php'><img id='mensaje' src='../img/mensaje.png'></li></a>";
					}
					?>
					<li><a class="texto" href='../Inicio/cerrarSesion.php'>Salir</a>
					<a href='../Inicio/cerrarSesion.php'><img id="salir" src="../img/salir.png"></li></a>
				</ul>
			
		</div>		
		<div id="menuDiv2">
				
					<p>Desde aquí puede ver/modificar su perfil  </p>

			</div>		
			<div id="contenedor">

				<form action="modPerfil.php" method="POST"> 
					<div> 
						<ul>
								<div id="titulo">
								<h1> Perfil de <?php echo $usuario[10] ?> </h1>
								</div>
							<?php 
							$usuario = array();
							$idact = $_GET["id"];
							if($idact == 0)
							$usuario = getUsuario($_SESSION["userid"]);	
							else
							$usuario = getUsuario($idact);		
							?>
							<li>
								<label  for="name"> <h3> Nombre: </h3></label>
								<input type="text" name="name" placeholder= <?php echo $usuario[10]  ?> /> <br/>
								<div id = "fotoPerfil">
								<img id="fotoperfil" <?php echo "src='../BD/obtenerFoto.php?id=$usuario[0]'"; ?> />
								<!--<input type="file"  name="foto"  class="subirfoto">		-->
								</div>
							</li> 
							  <br/>
							<li>
								<label for="apellidos"><h3> Apellidos:</h3></label>
								<input type="text" name="apellidos" placeholder=<?php echo $usuario[11]  ?> /> <br/>
							</li>
							 <br/>
							<li> 
								<label for="email"><h3>Correo electrónico: <h3></label>
								<input type="email" name="email" value = <?php echo $usuario[8]  ?>  OnFocus="this.blur()"/> <br/>
							</li> 
							 <br/>
							<li>
								<label for="nacimiento"><h3>Fecha de nacimiento:<h3></label>
								<input type="date" name="cumple" step="1" min="1912-01-01" max="1997-12-31"  /> <br/>
								<p> Actual: <?php echo $usuario[9] ?></p>
							</li>
							 <br/>
							 <li> 
								<label for="password"><h3>Contraseña:</h3></label> 
								<input type="password" name="pass" pattern=".{6,}" placeholder="******"> <br/>
							</li>
							 <br/>
							<li>
								<label><h3>Ubicacion</h3><span class="required"></span> </label>
								<select id="ubicacion" name="ubicacion"  placeholder=<?php echo $usuario[2]  ?> class="ubicacion" required> <br/>
								<option>Madrid</option>
								<option>Barcelona</option>
								<option>Valencia</option>
								<option>Galicia</option>
								<option>P. de Asturias</option>
								<option>Cantabria</option>
								<option>Castilla y Leon</option>
								<option>P. Vasco</option>
								<option>La Rioja</option>
								<option>Navarra</option>
								<option>Aragón</option>
								<option>Cataluña</option>
								<option>Comunidad de Madrid</option>
								<option>Extremadura</option>
								<option>Castilla - La Mancha</option>
								<option>Com. Valenciana</option>
								<option>Murcia</option>
								<option>Islas Baleares</option>
								<option>Andalucía</option>
								<option>Islas Canarias</option>
								<option>Ceuta</option>
								<option>Melilla</option>
								</select>
							</li>
		
							 <br/>
							 <li> 
								<label for="phone"><h3>Teléfono:</h3></label> 
								<input type="tel" name="tel" placeholder=<?php echo $usuario[13]  ?>  > <br/>
								 <br/>
								<button id="submit" class="submit" name="form" type="submit"> Guardar Datos</submit></a>
							</li>
						 </ul> 
					 </div> 
				 </form>
			</div>
		</body>
	</html>