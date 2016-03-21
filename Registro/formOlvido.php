<?php
<?php require_once '..\BD\UsuarioBD.php'; ?>


if ( isset($_POST['form']) ) {
    // Sí, procesamos el formulario
    
    // Obtenemos el usuario del formulario
    $correo = isset($_POST['email']) ? $_POST['email'] : null ;
	$pregunta = isset($_POST['preg']) ? $_POST['preg'] : null ;
    $respuesta = isset($_POST['resp']) ? $_POST['resp'] : null ;
	$pass1 = isset($_POST['clave1']) ? $_POST['clave1'] : null ;
    $pass2 = isset($_POST['clave2']) ? $_POST['clave2'] : null ;
	
	if($pass1 == $pass2){ //contrasenas identicas
		
		$user = buscarUser($correo);
		if($user == null){ //no existe ese usuario
		header('Location: olvido_contrasena.php');
		}
		else{ //existe usuario
		if($pregunta == $user[6] && $respuesta == $user[5]){ //coinciden preg y resp
			modUserPass($correo, $pass1);
			header('Location: ../Inicio/iniciosesion.php');
		}
		else{ // no coinciden preg y resp
		header('Location: olvido_contrasena.php');
		}
		}
		
	}
	else{ //contrasenas distintas
	header('Location: olvido_contrasena.php');
	}
	
	}
else{
	header('Location: registro.php');
	}
?>