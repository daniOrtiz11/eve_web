<!DOCTYPE html>
	<html>
		<head>
		
			<title>Contacta</title>
		    <link rel="stylesheet" type="text/css" href="miembros.css" />
			<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/> 
			
		</head>
		
		<body>
		<div id="menuDiv1">
		<a href="../principal.php" > <img src="../img/logoeve.png" id="imagen"/> </a>
			<p>Bienvenido a Eve.</p>
				<ul id="menu1">
					<li><a class="texto" href='../Registro/registro.php'>Regístrate</a>
					<a href='../Registro/registro.php'><img id="perfil" src="../img/perfil.png"></li></a>
					<li><a class="texto" href='../Inicio/iniciosesion.php'>Login</a>
					<a href='../Inicio/iniciosesion.php'><img id="salir" src="../img/salir.png"></li></a>
				</ul>
			
		</div>		
		<div id="menuDiv2">
			<ul id="menu2">
					<?php echo "<li><a href='../principal.php'>";?>Todos los eventos</a></li>
					<?php echo "<li><a href='miembros.php'>";?>¿Quiénes somos?</a></li>
					<?php echo "<li><a href='contacto.php'>";?>Contacta con nosotros</a></li>
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