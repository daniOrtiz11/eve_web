<!DOCTYPE html>

<?php 
session_start();
?>
	<html>
		<head>
		
			<title>Contacta</title>
		    <link rel="stylesheet" type="text/css" href="miembrosR.css" />
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
		<div id="contenedor">
		
				<form id="contacto" method="post" name="contactform" action="contacto3.php">
					<div>
						<ul>
							<li>
								<h1>Contacto:</h1> 
							</li>
							
							<li>
								<label for="name">Nombre:<span class="required">*</span> </label> 
								<input type="text" name="name" placeholder="Tu nombre" autofocus required />
							</li>
							<li> 
								<label for="email">Correo electrónico:<span class="required">*</span> </label>
								<input type="email" name="email" placeholder="anonimo@tucorreo.com" required />
							 </li> 			
							<li>
								<input type="radio" name="motivo_consulta" value="sugerencia" checked>Sugerencia
									<br/>
								<input type="radio" name="motivo_consulta" value="evaluación">Evaluación
									<br/>
								<input type="radio" name="motivo_consulta" value="crítica" >Crítica
									<br/>
							</li>
							<li>
								<label for="mensaje">Mensaje:<span class="required">*</span> </label>
								<textarea name="mensaje" cols="60" rows="6" required/> </textarea> <br />
							</li>
							<li>
								<a href="../principal.php"> <button id="submit" name="submit" type="submit">Enviar</button></a>
								<button id="reset" type="reset">Empieza de nuevo</button>
							</li>
						</ul>
					</div>
				</form>
				</div>
		</body>
	</html>