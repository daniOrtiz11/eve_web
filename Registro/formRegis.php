<?php
 require_once '..\BD\registroBD.php'; 

	// variable global para controlar el error al fallar el registro
	
  /* Comprueba si se ha invocado el script PHP como resultado del envío de un formulario
   */
  if ( isset($_POST['form']) ) {
    // Sí, procesamos el formulario
    
    // Obtenemos el usuario del formulario
    $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : null ;
	$apellidos = isset($_POST['apell']) ? $_POST['apell'] : null ;
    $nacimiento = isset($_POST['cumple_control']) ? $_POST['cumple_control'] : null ;
	$correo = isset($_POST['email']) ? $_POST['email'] : null ;
    $pass = isset($_POST['pass']) ? $_POST['pass'] : null ;
	$pregunta = isset($_POST['preg']) ? $_POST['preg'] : null ;
	$respuesta = isset($_POST['resp']) ? $_POST['resp'] : null ;
	$telefono = isset($_POST['telef']) ? $_POST['telef'] : null ;
    $foto = isset($_POST['imagen']) ? $_POST['imagen'] : null ;
	$ubicacion = isset($_POST['ubic']) ? $_POST['ubic'] : null ;
	$gestor = isset($_POST['gestor']) ? $_POST['gestor'] : null ;
	$sexo = isset($_POST['sexo']) ? $_POST['sexo'] : null ;
	
	if($gestor == null)
	$atencion_admin = false;
	else
	$atencion_admin = true;
	
	$tipo_imagen = '';
    /* Este código es equivalente
    $pass = $_POST['pass'] ?: null ;
    */
	$pass2 = isset($_POST['clave2']) ? $_POST['clave2'] : null ;
	
	if($pass2 == $pass){
	
		$password = password_hash($pass, PASSWORD_DEFAULT);
	
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
	
	$error = insertarBD($nombre, $apellidos, $nacimiento, $correo, $password, $pregunta, $respuesta, $telefono, $data, $tipo_imagen, $ubicacion, $atencion_admin, $sexo);

	
	if($error == 1){
			
		  header('Location: registro.php');
	}
	else
		  header('Location: ../principal.php');
   }
   else{
		header('Location: registro.php');
	
  }
}  
  else {
    header('Location: registro.php');
  }
?>