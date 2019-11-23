<?php
//Clase : Index_controler
//Creado el : 2-10-2017
//Creado por: grvidal
//Comprueba si el usuario esta autentificado y si es asi lo muestra la vista general
//-------------------------------------------------------

//session
session_start();
//incluir funcion autenticacion
include '../Functions/Authentication.php';
//si no esta autenticado
if (!IsAuthenticated()){
	header('Location: ../index.php');
}
//esta autenticado
else{
	include '../View/users_index_View.php';
	new Index();
}

?>