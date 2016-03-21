
<?php 
require_once '..\BD\eventoBD.php'; 
require_once '..\BD\socialBD.php'; 
require_once '..\BD\UsuarioBD.php'; 
session_start();


$idUser1=$_SESSION["userid"];
$idUser2= $_GET["idU"];
$idEvento = $_GET["idE"];
$like = $_GET["like"];
$cont = $_GET["cont"];
$array = array();
$data = array();
$arrAsistentesAux = array();
$data['compatibles'] = false;

if($like == 1){
insertCompatible($idUser1, $idUser2);
if(insertCompatibilidad($idUser1, $idUser2)){
	$data['compatibles'] = true;
	}
}

$arrAsistentesAux = getAsistentes($idEvento, $idUser1);

	for($i=0; $i < sizeof($arrAsistentesAux); $i++ ){ //Crea un array con los asistentes ha los que no se les ha dado like
		if(!haDadoLike($idUser1,$arrAsistentesAux[$i])){
			$array[] = $arrAsistentesAux[$i];
			}
		}
	if(sizeof($array) != 0 && $cont < sizeof($array)){
		$arrayUser = array();
		$arrayUser = getUsuario($array[$cont]);
		$data['id'] = $arrayUser[0];
		$data['nombre'] = $arrayUser[10];
		$data['edad'] = getFechaNacimiento($arrayUser[0]);
		$data['ubicacion'] = $arrayUser[2];
		$data['error'] = false;
	}else{
		$data['error'] = true;
	}
	
	
    echo json_encode($data);
	


?>

