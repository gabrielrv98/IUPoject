<?php
//Clase : Index_controler
//Creado el : 2-06-2020
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
	include '../Model/PRODUCTOS_Model.php';
	$product = new PRODUCTOS_Model('','','','','','tramite');
	$product = $product->SEARCH();
	new Index($product);
}

?>