<!DOCTYPE html>
<?php require_once '..\BD\eventoBD.php'; ?>
<?php
session_start();
?>

	<html>
	
		<head>
			<title> Modificar Evento </title>
		    <link rel="stylesheet" type="text/css" href="modEvento.css" />
		</head>
		
		<body>
			<?php
		$tipo = $_SESSION["usertipo"];
		if($tipo == 3){
		$ref = "href='../Admin/admin.php'";
		}
		else{
		$ubicacion = $_SESSION['userubicacion'];
		$ref = "href='../Gestor/principalGestor.php?ubi=$ubicacion'";}
		?>
			<div id="menuDiv1">
			<br>
		<a <?php echo $ref; ?> > <img src="../img/logoeve.png" id="imagen"/> </a>
				<p>Bienvenido, <?php echo $_SESSION["usernombre"] ?>.</p>
				<ul id="menu1">
					<li><a class="texto" href='../Inicio/cerrarSesion.php'>Salir</a>
					<a href='../principal.php'><img id="salir" src="../img/salir.png"></li></a>
				</ul>
			
		</div>		
		<div id="menuDiv2">
				
					<p>Desde aquí puede modificar el evento </p>

			</div>		
			<div id="contenedor">

				<form action="modEvento.php" method="POST"> 
					<div> 
						<ul>
							<div id="titulo">
								<h1> Modificar Evento  </h1>
								</div>
						
							<?php 
								$id = $_GET["id"];
								$arr = array();
								$arr = getEvento($id); 		
							?>
							<li>
								<label  for="titulo"> <h3>Titulo:</h3></label>
								<input type="text" name="titulo" /> <br/>
								<label for="descripcionAntigua"><h3>Título antiguo:</h3></label>
								<div id="descripcionEvento">
									<p><?php echo $arr[5] ?></p>
								</div>
								
								<?php
								$_SESSION["idFE"] = $arr[0];
								?>
								<div id="fotoPerfil">
									<img id="fotoevento" <?php echo "src='../BD/obtenerFotoEvento.php?id=$arr[0]'"?>/>  
								</div>
							</li> 
							  <br/>
							<li>
								<label for="descripcion"><h3>Descripción:</h3></label>
								<textarea rows="4" cols="50" name="descripcion" ></textarea> <br/>
								<label for="descripcionAntigua"><h3>Descripción antigua:</h3></label>
								<div id="descripcionEvento">
									<p><?php echo $arr[4] ?></p>
								</div>
							</li>
							<li>
								<label for="nacimiento"><h3>Fecha:</h3></label>
								<input type="date" name="date" step="1" min="2015-01-01"/> <p>(Actual)</p> <?php echo $arr[2]  ?><br/>
							</li>
							 <br/>
							<li>
								<label><h3>Ubicación</h3><span class="required">*</span> </label>
								<select id="ubicacion" name="ubic"  placeholder=<?php echo $arr[1]  ?> class="ubicacion" required> <br/>
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
								<label for="precio"><h3>Precio:</h3></label>
								<input type="text" name="precio" placeholder=<?php echo $arr[6]  ?>  > <br/>
							</li>
							<br/>
							 <li> 
								<label for="asist"><h3>Número de asistentes máximo:</h3></label> 
								<input type="text" name="asist" placeholder=<?php echo $arr[7]  ?>  > <br/>
								 <br/>
								 <input type="hidden" name="idEv" value=<?php echo $arr[0]  ?>><br>
								<button id="submit" class="submit" name="form" type="submit"> Guardar </submit></a>
							</li>
						 </ul> 
					 </div> 
				 </form>
			</div>
		</body>
	</html>