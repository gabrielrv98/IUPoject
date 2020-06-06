<?php

//Clase : Desconectar.php
//Creado el : 15-10-2019
//Creado por: grvidal
//Desconecta la base de datos
//-------------------------------------------------------

session_start();
session_destroy();
header('Location:../index.php');

?>
