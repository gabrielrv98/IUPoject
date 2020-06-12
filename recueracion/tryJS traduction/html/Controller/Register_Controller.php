<?php
//Clase : Register_Controller
//Creado el : 4-06-2020
//Creado por: grvidal
//Registra un nuevo usuario
//-------------------------------------------------------

session_start();
include_once '../Locale/Strings_'.$_SESSION['idioma'].'.php';

//session_start();
if(!isset($_POST['login'])){// si la variable login no existe se muestra la interfaz de registro
	include '../View/Register_View.php';
	$register = new Register();
}
else{// si la variable esta puesta ( una vez que en la vista de registro se la da a submit)
		
	include '../Model/USUARIOS_Model.php';
	$usuario = new USUARIOS_Model($_REQUEST['login'],$_REQUEST['password'],$_REQUEST['nombre'],
		$_REQUEST['apellidos'],$_REQUEST['email'],$_REQUEST['DNI'],$_REQUEST['tlf'],$_REQUEST['fechaNacimiento'],$_REQUEST['alergias'],$_REQUEST['direccion'],$_REQUEST['cp'],$_REQUEST['sexo'],'usuario');// se Crea el nuevo usuario

	$respuesta = $usuario->Register();// Se registra y se guarda la respusta
	include '../View/MESSAGE_View.php';

	if ($respuesta == 'true'){// si se registro correctamente se muestra
		$respuesta = $usuario->registrar();
		
	}
new MESSAGE($respuesta, './Login_Controller.php');
}

?>

