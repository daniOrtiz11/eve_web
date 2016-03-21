<!DOCTYPE html>
<?php require_once '..\BD\eventoBD.php'; 
require_once '..\BD\UsuarioBD.php'; 
require_once '..\BD\socialBD.php'; 
session_start();?>

	<html>
	
		<head>
			<title>Asistentes</title>
		    <link rel="stylesheet" type="text/css" href="estiloEventos.css" />
			<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/> 
			<script type="text/javascript" src="../js/jquery-1.9.1.min.js"></script>
			
			<script>
			function siguienteAsistente(data){
				var json = eval('(' + data + ')'); //Parsear la cadena JSON en un array de objetos asociativo
				if(json.compatibles){
								alert("Sois compatibles, ya os podeís enviar mensajes!");
							}
						if(json.error){
							$("#like").hide();
							$("#nolike").hide();
							$("#volver").show();
							alert("No hay más asistentes");
						}else{
							document.getElementById("idU").value = json.id;
							document.getElementById("person").src = "../BD/obtenerFoto.php?id="+json.id;
							document.getElementById("nombre").value = json.nombre;
							document.getElementById("edad").value = json.edad;
							document.getElementById("ubi").value = json.ubicacion;
						}	
			}
			
			
			$(document).ready(function(){
				var cont = 1;
				$("#volver").hide();
				$("#like").click(function(){
					var url = "procesarAsistentes.php?idU=" + $("#idU").val() + "&idE=" + $("#idE").val() + "&cont=" + cont + "&like=1";
					$.get(url,function(data,status){
						cont++;
						siguienteAsistente(data);	
					});
				});
				$("#nolike").click(function(){
					var url = "procesarAsistentes.php?idU=" + $("#idU").val() + "&idE=" + $("#idE").val() + "&cont=" + cont +"&like=0";
					$.get(url,function(data,status){
						cont++;
						siguienteAsistente(data);	
					});
				});
			});
			</script>
			
		</head>
		
		<body>
				<?php 
				$id = $_GET["id"];
				$idU = $_SESSION["userid"];
				$ubi = $_SESSION['userubicacion'];
				$arr = array();
				$arr = getEvento($id); 
				$arrAsistentesAux = array();
				$arrAsistentes = array();
				$arrAsistentesAux = getAsistentes($id, $idU);
				for($i=0; $i < sizeof($arrAsistentesAux); $i++ ){ //Crea un array con los asistentes ha los que no se les ha dado like
					if(!haDadoLike($idU,$arrAsistentesAux[$i])){
						$arrAsistentes[] = $arrAsistentesAux[$i];
					}
				}
				if(sizeof($arrAsistentes) != 0){
				$arrayUser = array();
				$arrayUser = getUsuario($arrAsistentes[0]);
				}
				?>
				
					<div id="menuDiv1">
		<a <?php echo "href='../Inicio/principalRegistrado.php?ubi=$ubi'"; ?> > <img src="../img/logoeve.png" id="imagen"/> </a>
			<p>Bienvenido, <?php echo $_SESSION["usernombre"] ?>.</p>
				<ul id="menu1">
					<?php echo"<li><a class='texto' href='../eventos/entradascompradas.php?ubi=$ubi'>Entradas</a>" ?>
					<?php echo "<a href='../eventos/entradascompradas.php?ubi=$ubi'><img id='entrada' src='../img/ticket-icon.png'></li></a>"?>
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
				
				<div id="contenedorAsistentes">
				<?php if(asisteEvento($_SESSION["userid"], $id)){ ?>
				
					<?php if(sizeof($arrAsistentes) != 0){ ?>
					<img src="../img/like-dislike.png"/ id="like-dislike">
					
					<div id="asistentesDiv">
									<?php $edad = getFechaNacimiento($arrayUser[0]);?>
									<p><b>Nombre: </b><input type="text" id="nombre" <?php echo "value='$arrayUser[10]'";?> size="16"; /></p>

									<p><b>Edad: </b><input type="text" id="edad" <?php echo "value='$edad'";?> size="1"/>años.</p>
								<div id="ubicacionAsist">
									<img src="../img/map.png"/><input type="text" id="ubi" <?php echo "value='$arrayUser[2]'";?>/>
								</div>
					</div>
						
							<input type="hidden" id="idU" <?php echo "value='$arrayUser[0]'";?>/>
							<input type="hidden" id="idE" <?php echo "value='$id'";?>/>
							<img <?php echo "src='../BD/obtenerFoto.php?id=$arrayUser[0]'";?> id="person"/>
							<img src="../img/marco.png" id="marco"/>
							<input type="image" src="../img/like-icon.png" id="like" title="Me gusta"/>
							<?php echo "<a href='asistentes.php?id=$id'>"; ?><img src="../img/volver.png" id="volver" title="Empezar de nuevo"/></a>
							<input type="image" src="../img/dislike-icon.png" id="nolike" title="No me gusta"/> 
					<div id=info>
					<img src="../img/info.png" id="infoFoto">
					<p><b>Si eres compatible con esta persona podrás comunicarte con ella.</b></p>
					</div>
					<?php }else
					echo "<h2>No hay más asistentes en este evento</h2>"?>
				<?php }else{?>
			<h2>Debes asistir al evento para poder ver a los asistentes.</h2>
			<?php }?>
			</div>
		</body>
	</html>