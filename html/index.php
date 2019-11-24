<?php
//Clase : index.php
//Creado el : 10-11-2019
//Creado por: grvidal
//Archivo que se abre al establecer conexion con la web
//redirigue dependiendo si el usuario esta autentificado
//-------------------------------------------------------
//entrada a la aplicacion


error_reporting(E_PARSE);
//se va usar la session de la conexion
session_start();

//funcion de autenticacion
include './Functions/Authentication.php';

//si no ha pasado por el login de forma correcta
if (!IsAuthenticated()){
	header('Location:./Controller/Login_Controller.php');
}
//si ha pasado por el login de forma correcta 
else{
	header('Location:./Controller/Index_Controller.php');
}

?>
