<!DOCTYPE html>
	<html>
		<head>
			<title> Registro </title>
		    <link rel="stylesheet" type="text/css" href="registro.css" />
			<script>
			  function validarSiNumero(numero){
				if (!/^([0-9])*$/.test(numero))
				  alert("El valor " + numero + " no es un número");
			  }

			</script>
			
			<script>
			  function digitos20(numero){
				longitud = numero.length;
				if (longitud > '20')
					alert("Como máximo el correo puede tener 20 caracteres.");
				}
			</script>
			
			<script> 
				function comprobarClave(){ 
					pass = document.f1.pass.value 
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
				
					<p>Regístrate en Eve y disfruta de todas nuestras ventajas!  </p>

			</div>		
			<div id="contenedor">
			
				<form action="formRegis.php" method="POST" name="f1" enctype="multipart/form-data"> 
					<div> 
						<ul>
							<div id="titulo">
								<h1> Registro </h1>
								</div>
							<div id = "fotoEvento">
								<img id="fotoEvento" src="../img/festivalTit.jpg" />
								<!--<input type="file"  name="foto"  class="subirfoto">		-->
								</div>
							<li>
								<label for="name"><h3>Nombre:</h3><span class="required">*</span> </label> 
								<input type="text" name="nombre" id="nombre" placeholder="Tu nombre" autofocus required />
							</li> 
								</br>
							<li>
								<label for="apellido"><h3>Apellidos:</h3><span class="required">*</span> </label>
								<input type="text" name="apell" placeholder="Tus apellidos" required />
							</li>
								</br>
							<li>
								<label for="nacimiento"><h3>Fecha de nacimiento:</h3><span class="required">*</span> </label>
								<input type="date" name="cumple_control" step="1" min="1912-01-01" max="1997-12-31" placeholder="1997-01-01" required> <br/>
							</li>
								</br>
							<li>
								<label><h3>Sexo</h3><span class="required">*</span> </label>
								<select id="sexo" name="sexo"  class="sexo" required>
								<option>Hombre</option>
								<option>Mujer</option>
								</select>
							</li>
							<div id = "fotoEvento2">
								<img id="fotoEvento2" src="../img/socialTit.jpg" />
								<!--<input type="file"  name="foto"  class="subirfoto">		-->
							</div>
								</br>								
							 <li> 
								<label for="email"><h3>Correo electrónico:</h3><span class="required">*</span> </label>
								<input type="email" name="email" onchange="digitos20(this.value)" placeholder="anonimo@tucorreo.com" required />
							 </li> 
								</br>		
							
							 <li> 
								<label for="password"><h3>Contraseña:</h3><span class="required">*</span> </label> 
								<input type="password" name="pass" pattern=".{6,}" required> 
							</li>
								</br>	
							<li>
								<label for="password"><h3>Repita la contraseña: </h3><span class="required">*</span> </label>
								<input type="password" name="clave2" onchange="comprobarClave()" pattern=".{6,}" required>								
							 </li> 
							 	</br>	
							 <li>
								<label><h3>Pregunta secreta</h3><span class="required">*</span> </label>
								<select id="pregunta" class="psecreta" name="preg" required>
								<option>Lugar de nacimiento.</option>
								<option>Nombre de la primera mascota.</option>
								<option>Canción preferida.</option>
								<option>Nombre de su mejor amigo.</option>
								<option>Equipo deportivo preferido.</option>
								</select>
							</li>
								<div id = "fotoEvento3">
								<img id="fotoEvento3" src="../img/votaTit.jpg" />
								<!--<input type="file"  name="foto"  class="subirfoto">		-->
								</div>
								</br>	
							<li>
								<label><h3>Respuesta secreta:<h3><span class="required">*</span></label>
								<input id="respuesta" name="resp" type="text" id="respuesta" required/>
							</li>
							 	</br>	
								
							 <li> 
								<label for="phone"><h3>Teléfono:</h3><span class="required">*</span></label> 
								<input type="tel" name="telef" onkeyup="validarSiNumero(this.value)">
							</li>
								</br>	
							<li>
								<label for="imagen"><h3>Foto de perfil </h3><span class="required">*</span></label>
								<input name="imagen" type="file" id ="iMagen" />
								
							</li>
								</br>	
							<li>
								<label><h3>Ubicacion</h3><span class="required">*</span> </label>
								<select id="ubicacion" name="ubic"  class="ubicacion" required>
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
								</br>	
							<li>
								<input id="gestor" type="checkbox" name="gestor" value="gestor">
								<label for="check">¿Quieres ser gestor? <span id="infogestor">(2)</span> </label>
							</li>
							 	</br>	
							 <li> 
								<button id="submit" class="submit" type="submit" name="form">Regístrate</button> 
								<button id="reset" class="reset" type="reset">Empieza de nuevo</button>
							 </li> 
							 	</br>	
							 <li>
								<input id="acepto" type="checkbox" name="acepto" value="marque_casilla" required /> 
								<span class="required">*</span> Al registrarte estás aceptando las políticas de seguridad y 
								condiciones del servicio, incluyendo el uso de cookies.<br />
						
								<p class="required">1- Todos los campos marcados con * son obligatorios </p> 
								<p id="infogestor">2- Al seleccionar la casilla "Quiero ser gestor", hará que se envíe el formulario al moderador, el cual estudiará su caso y se pondrá
								en contacto con usted lo antes posible. </p>
							</li>
						 </ul> 
					 </div> 
				 </form>
			</div>
		</body>
	</html>