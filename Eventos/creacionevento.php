<html>
	<?php
session_start();
?>
		<head>
			<title> Crear Evento </title>
		    <link rel="stylesheet" type="text/css" href="creagestor.css" />
		</head>
		
		<body>
			<div id="menuDiv1">
			<a href="../Gestor/principalGestor.php" > <img src="../img/logoeve.png" id="imagen"/> </a>
			<p>Bienvenido, <?php echo $_SESSION["usernombre"] ?>.</p>
				<ul id="menu1">
					<li><a class="texto" <?php echo "href='../Perfil/verperfil.php?id=0'>"?>Ver perfil</a>
					<a <?php echo "href='../Perfil/verperfil.php?id=0'"?>><img id="perfil" src="../img/perfil.png"></li></a>
					<li><a class="texto" href='../Inicio/cerrarSesion.php'>Salir</a>
					<a href='../principal.php'><img id="salir" src="../img/salir.png"></li></a>
				</ul>
			
		</div>	
		<div id="menuDiv2">
				
					<p>Crea eventos en EVE desde una manera rápida y sencilla! </p>

			</div>	
			<div id="contenedor">
				<form action="creaEvento.php" name="f1" method="POST" enctype="multipart/form-data"> 
					<div> 
						<ul>
							<div id="titulo">
								<h1> Crea un Evento! </h1>
								</div>
							<div id = "fotoEvento2">
								<img id="fotoEvento2" src="../img/idea.jpg" />
								<!--<input type="file"  name="foto"  class="subirfoto">		-->
							</div>
							<li>
								<label for="name"><h3>Título:</h3><span class="required">*</span> </label> 
								<input type="text" name="titulo" id="nombre" placeholder="Título del evento" autofocus required />
							</li> 
							
								</br>
							<li>
								<label for="descripcion"><h3>Descripción:</h3><span class="required">*</span> </label>
								<textarea rows="4" cols="50" name="descripcion" placeholder="Descripción del evento" required> </textarea>
							</li>
								</br>
							<li>
								<label for="fecha"><h3>Fecha del evento:</h3><span class="required">*</span> </label>
								<input type="date" name="date" step="1" min="2015-01-01"  required> <br/>
							</li>
							<div id = "fotoEvento2">
								<img id="fotoEvento2" src="../img/negocio.jpg" />
								<!--<input type="file"  name="foto"  class="subirfoto">		-->
							</div>
								</br>
							<li>
								<label><h3>Ubicacion</h3><span class="required">*</span> </label>
								<select id="ubicacion" name="ubic" class="ubicacion" required> <br/>
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
								<label for="precio"><h3>Precio:</h3></label>
								<input type="text" name="precio" placeholder="Precio"  /> <br/>
							</li>
								<br/>
							<li>
								<label for="localizacion"><h3>Localización:</h3></label>
								<input type="text" name="localizacion" class="localizacion" required> 
							</li>
								</br>
							 <li> 
								<label for="asist"><h3>Número de asistentes máximo:</h3></label> 
								<input type="text" name="asist" placeholder="Max. Asistentes" > <br/>
							</li>
							 	</br>	
							 	
							<li>
								<label for="imagen"><h3>Foto del evento</h3> <span class="required">*</span></label>
								<input name="imagen" type="file" id ="imagenS" />
								
							</li>
								</br>	

							 
								<button id="submit" class="submit" type="submit" name="form">Crear evento</button> 
							 
							 	</br>	
							 
								<input id="acepto" type="checkbox" name="acepto" value="marque_casilla" required /> 
								<span class="required">*</span> Al crear el evento estás aceptando las políticas de seguridad y 
								condiciones del servicio.<br />
						
								<p class="required">1- Todos los campos marcados con * son obligatorios </p> 
							
						 </ul> 
					 </div> 
				 </form>
			</div>
		</body>
	</html