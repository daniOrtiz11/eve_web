<!DOCTYPE html>
	<html>
	
		<head>
			<title> Cambio contraseña </title>
		    <link rel="stylesheet" type="text/css" href="olvido_contrasena.css" />
			<script> 
				function comprobarClave(){ 
					pass = document.f1.clave1.value 
					clave2 = document.f1.clave2.value
 
				if (pass != clave2) 
					alert("Las dos claves son distintas! \nVuelva a escribir las contraseñas.") ;
				}

			</script> 
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
				
					<p>¿Olvidó su contraseña? No pasa nada. Conteste a unas preguntas y cámbiela.  </p>

			</div>		
			<div id="contenedor">
				
				
				<form action="formOlvido.php" method="POST">
					<div>
						<div id="titulo">
								<h1> Olvido de contraseña </h1>
								</div>
						<ul>
							<li>
								<label for="email"><h3>Correo electrónico:</h3><span class="required">*</span> </label>
								<input type="email" name="email" placeholder="anonimo@tucorreo.com" autofocus required />
							</li>
							</br>	
							<li>
								<label><h3>Seleccione la pregunta secreta.</h3><span class="required">*</span> </label>
								<select id="pregunta" class="psecreta" name="preg" required>
								<option>Lugar de nacimiento.</option>
								<option>Nombre de la primera mascota.</option>
								<option>Canción preferida.</option>
								<option>Nombre de su mejor amigo.</option>
								<option>Equipo deportivo preferido.</option>
								</select>
							</li>
							</br>	
							<li>
								<label><h3>Respuesta de la pregunta secreta:</h3><span class="required">*</span></label>
								<input id="cambiopass" type="text" id="respuesta" name="resp" required/>
							</li>
							</br>	
							<li>
								<label for="password"><h3>Introduzca su nueva contraseña:</h3><span class="required">*</span> </label>
								<input type="password" name="clave1" pattern=".{6,}" required> 
							</li>
							</br>	
							<li>
								<label for="password"><h3>Repita su nueva contraseña:</h3><span class="required">*</span> </label>
								<input type="password" name="clave2" onchange="comprobarClave()" pattern=".{6,}" required>  </br></br>							
							</li>
							</br>	
							<li>
								<button id="submit" class="submit" name="form" type="submit"> Entrar </submit></a>
								<button id="reset" class="reset" type="reset">Empieza de nuevo</button>
							 </li> 
							 </br>	
							 <li>
								<input id="acepto" type="checkbox" name="acepto" value="marque_casilla" required /> 
								<span class="required">*</span> Al registrarte estás aceptando las políticas de seguridad y 
								condiciones del servicio, incluyendo el uso de cookies.<br />
						
								<p class="required">1- Todos los campos marcados con * son obligatorios </p> 
							</li>
							
							
					</div>
				</form>
			</div>
		</body>
	</html>
				