<?php
 require_once '..\BD\eventoBD.php'; 
  session_start();

	// variable global para controlar el error al fallar el registro
	
  /* Comprueba si se ha invocado el script PHP como resultado del envío de un formulario
   */
  if ( isset($_POST['form']) ) {
    // Sí, procesamos el formulario
    
    // Obtenemos el usuario del formulario
    $titulo = isset($_POST['titulo']) ? $_POST['titulo'] : null ;
	$descripcion = isset($_POST['descripcion']) ? $_POST['descripcion'] : null ;
    $date = isset($_POST['date']) ? $_POST['date'] : null ;
	$ubicacion = isset($_POST['ubic']) ? $_POST['ubic'] : null ;
    $precio = isset($_POST['precio']) ? $_POST['precio'] : null ;
	$localizacion = isset($_POST['localizacion']) ? $_POST['localizacion'] : null ;
	$num_asistentes = isset($_POST['asist']) ? $_POST['asist'] : null ;
    $foto = isset($_POST['imagen']) ? $_POST['imagen'] : null ;
	$atencion_admin = true;
	
	$tipo_imagen = '';	
	
	if (!isset($_FILES['imagen'])){
    $data = null;
	}
	else
	{
		$permitidos = array("image/jpg", "image/jpeg", "image/gif", "image/png");
		$limite_kb = 16384;
		if (in_array($_FILES['imagen']['type'], $permitidos) && $_FILES['imagen']['size'] <= $limite_kb * 1024){
	
			// Archivo temporal
			$imagen_temporal = $_FILES['imagen']['tmp_name'];
	 
			// Tipo de archivo
			$tipo_imagen = $_FILES['imagen']['type'];
	 
			// Leemos el contenido del archivo temporal en binario.
			$fp = fopen($imagen_temporal, 'r+b');
			$data = fread($fp, filesize($imagen_temporal));
			fclose($fp);
	 
			//Podríamos utilizar también la siguiente instrucción en lugar de las 3 anteriores.
			// $data=file_get_contents($imagen_temporal);
	 
			// Escapamos los caracteres para que se puedan almacenar en la base de datos correctamente.
			$data = mysql_escape_string($data);
		}
		else{
			$data = null;
			}
	}
	
	$error = insertarEventoBD($titulo, $descripcion, $date, $ubicacion, $precio, $localizacion, $num_asistentes, $data, $tipo_imagen, $atencion_admin);
	
	if($error == 1){
	   echo '<script language="javascript">
			alert("Ha habido un error, debe ser que alguien ya está usando ese correo electrónico1!");
	   </script>'; 
	  header('Location: creacionevento.php');
	}
	else {
		$id_Us = $_SESSION["userid"];	
		
		$evento = getEventobyTit($titulo);
		$id_Ev = $evento[0];
		$error2 = gestiona_evento($id_Us, $id_Ev);
		
		if($error2 == 1){
			echo '<script language="javascript">
			alert("Ha habido un error, debe ser que alguien ya está usando ese correo electrónico1!");
		</script>'; 
		header('Location: creacionevento.php');
		}
		else 
		  header('Location: ../Gestor/principalGestor.php');
	}
   }
   
?>