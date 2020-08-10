<?php
//Clase : Desconectar.php
//Creado el : 2-10-2019
//Creado por: grvidal
//Desconecta al usuario y le redirije a la pagina principal
//-------------------------------------------------------

session_start();
session_destroy();
header('Location:../index.php');

?>
