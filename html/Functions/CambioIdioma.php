<?php

//Clase : CabmioIdioma.php
//Creado el : 15-10-2019
//Creado por: grvidal
//Cambia el idioma
//-------------------------------------------------------

session_start();
$idioma = $_POST['idioma'];
$_SESSION['idioma'] = $idioma;
header('Location:' . $_SERVER["HTTP_REFERER"]);
?>