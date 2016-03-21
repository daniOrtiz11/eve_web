<!DOCTYPE html>
<?php require_once '..\BD\UsuarioBD.php'; ?>
<?php
session_start();
?>
	<html>
	
		<head>
			<title>Perfil </title>
		    <link rel="stylesheet" type="text/css" href="verperfil.css" />
		</head>
		
		<body>
			<?php
		$tipo = $_SESSION["usertipo"];
		if($tipo == 3){
		$ref = "href='../Admin/admin.php'";
		}
		else{
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
				
					<p>Desde aquí se puede ver el perfil del usuario  </p>

			</div>	
			<div id="contenedor">
			

				<form action="modPerfil.php" method="POST"> 
					<div> 
						<ul>
								<div id="titulo">
								<h1> Perfil </h1>
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
								<label  for="name"><h3> Nombre: </h3></label>
								<input type="text" name="name" placeholder= <?php echo $usuario[10]  ?> OnFocus="this.blur()"/> <br/>
								<div id="fotoPerfil">
								<img <?php echo "src='../BD/obtenerFoto.php?id=$usuario[0]'";?>/>
								</div>
							</li> 
							 
							<li>
								<label for="apellidos"><h3>Apellidos: </h3></label>
								<input type="text" name="apellidos" placeholder=<?php echo $usuario[11]  ?> OnFocus="this.blur()"/> <br/>
							</li>
							 
							<li>
								<label for="sexo"><h3>Sexo: </h3></label>
								<input type="text" name="sexo" placeholder=<?php echo $usuario[12]  ?> OnFocus="this.blur()"/> <br/>
							</li>
							 <br/>
							<li> 
								<label for="email"><h3>Correo electrónico: </h3></label>
								<input type="email" name="email" value = <?php echo $usuario[8]  ?>  OnFocus="this.blur()"/> <br/>
							</li> 
							 
							 <li> 
								<label for="tipo"><h3>Tipo: </h3></label>
								<?php
								if($usuario[1] == 1)
								$tipo = 'Cliente';
								else if($usuario[1] == 2)
								$tipo = 'Gestor';
								else if($usuario[1] == 3)
								$tipo = 'Administrador';
								?>
								<input type="text" name="tipo" value = <?php echo $tipo  ?>  OnFocus="this.blur()"/> <br/>
							</li> 
							 
							<li>
							<?php $edad = getFechaNacimiento($usuario[0]);?>
								<label for="nacimiento"><h3>Edad(años): </h3></label>
								<input type="text" name="cumple" placeholder=<?php echo $edad ?> OnFocus="this.blur()" => <br/>
							</li>
							 
							<li>
								<label for="ubicacion"><h3>Ubicacion: </h3></label>
								<input type="text" name="ubicacion" placeholder=<?php echo $usuario[2]  ?> OnFocus="this.blur()"/> <br/>
							</li>
		
							 
							 <li> 
								<label for="telefono"><h3>Telefono: </h3></label>
								<input type="text" name="telef" placeholder=<?php echo $usuario[13]  ?> OnFocus="this.blur()"/> <br/>
								 <br/>
							</li>
						 </ul> 
					 </div> 
				 </form>
			</div>
		</body>
	</html>