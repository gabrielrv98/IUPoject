<?php
//Clase : Register_Controller
//Creado el : 2-10-2019
//Creado por: grvidal
//Registra un nuevo usuario
//-------------------------------------------------------

session_start();
include_once '../Locale/Strings_'.$_SESSION['idioma'].'.php';

//session_start();
if(!isset($_POST['login'])){
	include '../View/Register_View.php';
	$register = new Register();
}
else{
		
	include '../Model/USUARIOS_Model.php';
	$usuario = new USUARIOS_Model($_REQUEST['login'],$_REQUEST['password'],$_REQUEST['DNI'],$_REQUEST['nombre'],$_REQUEST['apellidos'],$_REQUEST['tlf'],$_REQUEST['email'],$_REQUEST['bday'],$_REQUEST['foto'],$_REQUEST['sexo']);
	$respuesta = $usuario->Register();

	if ($respuesta == 'true'){
		$respuesta = $usuario->registrar();
		Include '../View/MESSAGE_View.php';
		new MESSAGE($respuesta, './Login_Controller.php');
	}
	else{
		include '../View/MESSAGE_View.php';
		new MESSAGE($respuesta, './Login_Controller.php');
	}

}

?>

