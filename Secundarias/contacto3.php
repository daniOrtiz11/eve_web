<?php
if(isset($_POST['email'])) {

// Debes editar las pr�ximas dos l�neas de c�digo de acuerdo con tus preferencias
$email_to = "macl34@msn.com";
$email_subject = "Contacto desde el sitio web";

// Aqu� se deber�an validar los datos ingresados por el usuario
if(!isset($_POST['name']) ||
!isset($_POST['email']) ||
!isset($_POST['mensaje'])) {

echo "<b>Ocurri� un error y el formulario no ha sido enviado. </b><br />";
echo "Por favor, vuelva atr�s y verifique la informaci�n ingresada<br />";
die();
}

  $first_name = $_POST['name']; // requerido
 
  $email_from = $_POST['email']; // requerido

  $message = $_POST['mensaje']; // requerido
 
  $error_message = "Error";

$email_message = "Detalles del formulario de contacto:\n\n";
$email_message .= "Nombre: " . $first_name . "\n";
$email_message .= "E-mail: " . $email_from . "\n";
$email_message .= "Comentarios: " . $message . "\n\n";


// Ahora se env�a el e-mail usando la funci�n mail() de PHP
$headers = 'From: '.$email_from."\r\n".
'Reply-To: '.$email_from."\r\n" .
'X-Mailer: PHP/' . phpversion();
@mail($email_to, $email_subject, $email_message, $headers);

echo "�El formulario se ha enviado con �xito!";
}
?>