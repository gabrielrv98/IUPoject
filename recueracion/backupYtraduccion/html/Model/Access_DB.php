<?php
//Clase : CATEGORIAS_Model
//Creado el : 2-06-2020
//Creado por: grvidal
//datos de acceso a la base de datos
//-------------------------------------------------------


function ConnectDB()
{
    $mysqli = new mysqli("localhost", 'iu2018', 'pass2018' , 'IU2018');
    	
	if ($mysqli->connect_errno) {
		include './MESSAGE_View.php';
		new MESSAGE("Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error, './index.php');
		return false;
	}
	else{
		return $mysqli;
	}
}

?>
