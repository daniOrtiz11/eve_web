﻿<!DOCTYPE html>
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
					<h2>Gestion de peticiones de gestor </h2>
					<br>
					</div>
					<div id="listaEventos">
					<?php 
							$usuarios = array();
							$usuarios = getUsuariosG();
							
							foreach($usuarios as $valor){
							$arr = array();
							$arr = getUsuario($valor); 
							?>
				<div id="personas">
						<ul>
							
							<li>
								<?php echo "<a href='../Perfil/verperfilV.php?id=$valor'>"; ?> <h2><?php echo $arr[10] ?> </h2> 	</a>
								<?php
								$_SESSION["idF"] = $arr[0];
								?>
								<?php echo "<a href='../Perfil/verperfilV.php?id=$valor'>"; ?>  <img id="fotoEvento" src="../img/Misc-User-icon.png"/></a>
								 <a <?php echo "<a href='aceptarGestor.php?id=$arr[0]'>"; ?> <button id="aceptar">Aceptar</button> </a>
								 <a <?php echo "<a href='rechazarGestor.php?id=$arr[0]'>"; ?> <button id="rechazar">Rechazar</button> </a>
								 
							</li>
							
						<?php } ?>
						</ul>
				</div>
				</div>
				</div>
		</body>
	</html>