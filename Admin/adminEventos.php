<!DOCTYPE html>
<?php require_once '..\BD\eventoBD.php'; ?>
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
					<h2>Gestión de eventos</h2>
					<br>
					</div>
					<div id="listaEventos">
					<?php 
							$eventos = array();
                            $eventos = getEventos();
                             
                            foreach($eventos as $valor){
                            $arr = array();
                            $arr = getEvento($valor); 
							?>
				<div id="personas">
						<ul>
							
							<li>
								<?php echo "<a href='../Eventos/descripcionV.php?id=$valor'>"; ?> <h2><?php echo $arr[5] ?> </h2> 	</a>
								<?php echo "<a href='../Eventos/descripcionV.php?id=$valor'>"; ?>  <img id="fotoEvento" src="../img/evento-icon.jpg"/></a>
								 <a <?php echo "<a href='../Eventos/descripcionV.php?id=$valor'>"; ?> <button id="aceptar">Ver Evento</button> </a>
								 <a <?php echo "<a href='../Eventos/modificarEvento.php?id=$arr[0]'>"; ?> <button id="rechazar">Modificar</button> </a>
								  <a <?php echo "<a href='../Eventos/eliminarEvento.php?id=$arr[0]'>"; ?> <button id="modificar">Eliminar</button> </a>
								  <br>
								<br>
								 
							</li>
							
						<?php } ?>
						</ul>
				</div>
				</div>
				</div>
		</body>
	</html>