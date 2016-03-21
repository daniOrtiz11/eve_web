<!DOCTYPE html>
<?php require_once '..\BD\UsuarioBD.php'; ?>
<?php
session_start();
?>
	<html>
	
		<head>
			<title> Admin</title>
			<link rel="stylesheet" type="text/css" href="../Admin/estiloadmin.css" />
			
		</head>
		
		<body>
				<div id="menuDiv1">
			<br>
		<a href='admin.php' > <img src="../img/logoeve.png" id="imagen"/> </a>
				<p>Bienvenido, <?php echo $_SESSION["usernombre"] ?>.</p>
				<ul id="menu1">
					<li><a class="texto" <?php echo "href='../Perfil/verperfil.php?id=0'>"?>Ver perfil</a>
					<a <?php echo "href='../Perfil/verperfil.php?id=0'"?>><img id="perfil" src="../img/perfil.png"></li></a>
					<li><a class="texto" href='../Inicio/cerrarSesion.php'>Salir</a>
					<a href='../principal.php'><img id="salir" src="../img/salir.png"></li></a>
				</ul>
			
		</div>	
				<div id="menuDiv2">
				 <ul id="menu">
                <?php echo "<li><a href='adminUsers.php'>Gestionar Usuarios</a></li>"; ?>
                    <?php echo "<li><a href='adminEventos.php'>Gestionar Eventos</a></li>"; ?>
                    <?php echo "<li><a href='adminTipoGestor.php'>Peticiones Gestor</a></li>"; ?>
					<?php echo "<li><a href='adminPetGestor.php'>Peticiones Eventos</a></li>"; ?>
					<?php echo "<li><a href='admin.php'>Inicio Administrador</a></li>"; ?>
					<br>
                </ul>
				</div>
				<div id="contenedor">				
				<div id="titulo">
					<h1> Admin </h1>	
					<h2>Instrucciones para administrador </h2>
					</div>
				<div id="instrucciones">
					<h3>
					<ol><u>Gestionar usuarios.</u> Apartado desde el que se puede ver, modificar y eliminar los usuarios existentes (salvo administradores)</ol>
					<br>
					<ol><u>Gestionar eventos.</u> Apartado desde el que se puede ver, modificar y eliminar los eventos existentes</ol>
					<br>
					<ol><u>Peticiones gestor.</u> Apartado desde el que se puede aceptar/denegar a los usuarios que quieren ser gestores de eventos</ol>
					<br>
					<ol><u>Gestionar usuarios.</u> Apartado desde el que se puede aceptar/denegar los eventos que han pedido los gestores que sean subidos</ol>
					</h3>
				</div>
				</div>
		</body>
	</html>