<?php
//Clase : Login_Controller
//Creado el : 2-10-2019
//Creado por: grvidal
//Comprueba que existe la base de datos, si existe que el login es correcto,
// sino la crea 
//-------------------------------------------------------

session_start();
include_once '../Model/Access_DB.php';
include_once '../View/Login_View.php';

if(!isset($_REQUEST['login']) && !(isset($_REQUEST['password']))){//si no hay datos por post
	
	if ( ConnectDB() == false) {// si la conexion con la base de datos falla es que hay que crearla
		include '../View/install_View.php';
		new install();
	}else{
		
		$login = new Login();// se muestra el login
	}

	
}
else{
	
	include_once '../View/MESSAGE_View.php';
	if ( ConnectDB() == false) {// si la conexion falla, es decir no hay base de datos
			
		include '../install.php';
	
		$resp = installBD($_REQUEST['login'],$_REQUEST['password']);//se ejecuta el script que instala la BD  
		new MESSAGE($resp, './Login_Controller.php');
		unset($_REQUEST);
		
	}else{
		include '../Model/USUARIOS_Model.php';
		$usuario = new USUARIOS_Model($_REQUEST['login'],$_REQUEST['password'],'','','','','','','','','','','','');
		$respuesta = $usuario->login();

		if ($respuesta == '00011'){
			//session_start();
			$_SESSION['login'] = $_REQUEST['login'];
			header('Location:../index.php');
		}
		else{

			new MESSAGE($respuesta, './Login_Controller.php');
		}
	}

		

}

?>

