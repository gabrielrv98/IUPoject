<?php
//Clase : Espacio_Controller
//Creado el : 2-10-2019
//Creado por: grvidal
//Cambia el idioma a traves de una variable de session 
//-------------------------------------------------------
session_start();
$idioma = $_POST['idioma'];
$_SESSION['idioma'] = $idioma;
header('Location:' . $_SERVER["HTTP_REFERER"]);
?>