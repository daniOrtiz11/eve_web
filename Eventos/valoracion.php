<!DOCTYPE html>
<?php require_once '..\BD\eventoBD.php'; 
require_once '..\BD\UsuarioBD.php'; 
session_start();?>

	<html>
	
		<head>
			<title>Valoracion</title>
		    <link rel="stylesheet" type="text/css" href="estiloEventos.css" />
			<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/> 
			
			<script type="text/javascript" src="../js/jquery-1.9.1.min.js"></script>
			
			<script>
			$(document).ready(function(){		
				$("input[name=voto]").change(function(){
				$(".puntos").text(this.value + "/5 puntos.");
				});
				
				$("#votoBoton").click(function(){
				alert("Comentario publicado");
				});
			});
			</script>
		</head>
		
		<body>
			
				
				<?php 
				$id = $_GET["id"];
				$arr = array();
				$arr = getEvento($id); 
				$ubi = $_SESSION['userubicacion'];
				?>
				
					<div id="menuDiv1">
		<a <?php echo "href='../Inicio/principalRegistrado.php?ubi=$ubi'"; ?> > <img src="../img/logoeve.png" id="imagen"/> </a>
			<p>Bienvenido, <?php echo $_SESSION["usernombre"] ?>.</p>
				<ul id="menu1">
					<?php echo"<li><a class='texto' href='../eventos/entradascompradas.php'>Entradas</a>" ?>
					<?php echo "<a href='../eventos/entradascompradas.php'><img id='entrada' src='../img/ticket-icon.png'></li></a>"?>
					<li><a class="texto" href='../Mensajes/mensajes.php'>Mensajes</a>
					<a href='../Mensajes/mensajes.php'><img id="mensaje" src="../img/mensaje.png"></li></a>
					<li><a class="texto" <?php echo "href='../Perfil/verperfil.php?id=0'>"?>Ver perfil</a>
					<a <?php echo "href='../Perfil/verperfil.php?id=0'"?>><img id="perfil" src="../img/perfil.png"></li></a>
					<li><a class="texto" href='../inicio/cerrarSesion.php'>Salir</a>
					<a href='../inicio/cerrarSesion.php'><img id="salir" src="../img/salir.png"></li></a>
				</ul>
		</div>	
				
			<div id="menuDiv2">
				<ul id="menu2">
					<?php echo "<li><a href='descripcion.php?id=$id'>";?>Descripción</a></li>
					<?php echo "<li><a href='entradas.php?id=$id'>";?>Entradas</a></li>
					<?php echo "<li><a href='asistentes.php?id=$id'>";?>Asistentes</a></li>
					<?php echo "<li><a href='valoracion.php?id=$id'>";?>Valoraciones</a></li>
				</ul>
			</div>	
				
				
				<div id="contenedorComentarios">
				
					<h1>Valoraciones</h1>
		
				
			<?php 
				  $arrComentarios = array();
				  $arrUser = array();
				  $arrComentarios = getComentarios($id);
				  $max=sizeof($arrComentarios);
				 if($max!=0){ }
				  $i=0;
				  if($max == 0){ ?>
					  <h2>No hay comentarios ni valoraciones.</h2>
				  <?php } 
				  while($i < $max){
				  $arrUser = getUsuario($arrComentarios[$i]);
				  ?>
				 <div id="cajaComentario">
				 <li>
				   <div id="userInfo">
				    <h3><?php echo $arrUser[10] ?></h3>
					<img <?php echo "src='../BD/obtenerFoto.php?id=$arrUser[0]'"; ?> /> 
				   </div>
				   <div id="val">
					  
					<?php 
						$j=0;
						$aux=$i+1;
						$points= 5-$arrComentarios[$aux]; //Calculamos las estrellas vacias que hay que mostrar
						while($j < $arrComentarios[$aux]){?>
						<img src="../img/estrella2.png" />
					<?php $j++;}
					    $j=0; 
						while($j < $points){?>
						<img src="../img/estrella1.png" />
					<?php $j++;} 
						 $aux=$aux+1;?>   
					 <p><?php echo $arrComentarios[$aux]; ?></p>
				  <?php $i = $i+3;}?>
				  </div>
				 </li>
				</div>
			 <div id="comentario">
			<?php if(asisteEvento($_SESSION["userid"], $id)){ 
					if(!isComentario($_SESSION["userid"], $id)){ ?>
						<form type="post" action="procesarComentario.php">
						<h2>Valoración del evento
						<input type="hidden" name="id_e" value="<?php echo $id ?>">
						<input type="radio" name="voto" value="1">
						<input type="radio" name="voto" value="2">
						<input type="radio" name="voto" value="3">
						<input type="radio" name="voto" value="4">
						<input type="radio" name="voto" value="5">
						<strong class=puntos>0/5 puntos.</strong> </h2>
						<textarea name="com" rows="10" cols="100">Escribe aquí tu opinión sobre el evento...</textarea> <br/>
						<input type="submit" id="votoBoton" value="Enviar">
						</form>
			 <?php }else{ ?>
			 <h2>Ya has dado tu valoración.</h2>
			<?php }
			 }else{ ?>
			<h2>Debes asistir al evento para poder publicar comentarios y valoraciones.</h2>
			<?php }?>
		</div>	
			</div>
		</body>
	</html>