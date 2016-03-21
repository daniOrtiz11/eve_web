
<!DOCTYPE html>

	<html>
	
	
		<head>
		
			<title>Miembros</title>
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
				<div id="intro">
				<h1> ¿Quiénes somos? </h1>
				<p> Somos un grupo de estudiantes de la Universidad Complutense de Madrid, y estamos haciendo un proyecto para la asignatura <span>Aplicaciones web</span>. 
				Los integrantes somos los siguientes: </p>
				</div>
					<ul class="descripcion">
						<li>
							<h2 id="Pablo"> Pablo Blanco Peris </h2>
							<img src="../img/pablo.jpg">
							<h3> Email: </h3> 
							<p>pabblanc@ucm.es</p>
							<h3> Descripción: </h3> 
							<p>Miembro fundador de Eve.
							La idea original del logo es mía. </p> <br/>
						</li>
						<li>
							<h2 id="Maria"> Maria Solana González </h2>
							<img src="../img/maria.jpg">
							<h3> Email: </h3> 
							<p>masolana@ucm.es</p>

							<h3> Descripción: </h3> 
							<p>Miembro fundador de Eve. 
							La que dibuja del grupo. 
							Integrante agobiada y responsable.  </p> <br/>
						</li>
						<li>
							<h2 id="Daniel"> Daniel Ortiz Sánchez </h2>
							<img src="../img/daniel.jpg">
							<h3> Email: </h3> 
							<p>danortiz@ucm.es</p>
					 
							<h3> Descripción: </h3> 
							<p>Miembro fundador de Eve.
							Diseñador de esta página.</p> <br/>
						</li>
						<li>
							<h2 id="Maurizio"> Maurizio Martin Corradini </h2>
							<img src="../img/maurizio.jpg">
							<h3> Email: </h3> 
							<p>maurimar@ucm.es</p>

							<h3> Descripción: </h3> 
							<p>Miembro fundador de Eve. 
							Con el buscador de google hago milagros.</p> <br/>
						</li>
						<li>
							<h2 id="Javier"> Javier Martín-Pozuelo Salvador </h2>
							<img src="../img/javier.jpg">
							<h3> Email: </h3> 
							<p>javima10@ucm.es</p>

							<h3> Descripción: </h3> 
							<p>Miembro fundador de Eve. 
							Hago los logos con fondos transparentes.</p> <br/>
						</li>
						<li>
							<h2 id="Victor"> Victor Rodriguez Carreño </h2>
							<img src="../img/victor.jpg">
							<h3> Email: </h3> 
							<p>virodrig@ucm.es</p>

							<h3> Descripción: </h3> 
							<p>Miembro fundador de Eve.
							Soy el que más propiedades tiene en el google drive del proyecto.</p> <br/>
						</li>
					</ul>
				
			</div>
	
		</body>
		
	</html>