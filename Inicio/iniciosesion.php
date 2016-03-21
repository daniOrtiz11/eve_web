<!DOCTYPE html>
	<html>
	
		<head>
			<title> Inicio sesión </title>
		    <link rel="stylesheet" type="text/css" href="iniciosesion.css" />
		</head>
		
		<body>
		
			<div id="contenedor">
			
				<div id="cabecera">
					<p id="cliente">Cliente</p>
					<a href="../principal.php"> <img src="../img/logoeve.png" /> </a> 	
				</div>
				
				<form action="../BD/loginBD.php" class="inicia_sesion" id="inicia_sesion">
					<div>
						<ul>
							<li>
								<h1 id="cartelbienvenida"> Bienvenido a Eve!  </h1> 
								<h2>INICIA SESIÓN </h2>
							</li>
						<div id="blanco">	
							<li>
								<input id="campoinicia" type="email" name="email" placeholder="Correo electrónico" autofocus required /> <br/>
							</li>
							
							<li>
								<input id="campoinicia" type="password" name="clave" placeholder="Contraseña" pattern=".{6,}" autofocus required /> <br/> <br/>
							</li>
							
							<li>	
								<button id="submit" class="submit" type="submit"> Entrar </submit>
							</li>
						
							<li>
								<a href="../Registro/olvido_contrasena.php" id="olvido">¿Olvidaste tu contraseña?</a> 
							</li>
						</div>
					</div>
				</form>
			</div>
		
		</body>
	</html>
				