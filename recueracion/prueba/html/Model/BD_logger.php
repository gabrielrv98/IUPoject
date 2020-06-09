<?php
//Clase : BD_logger.js
//Creado el : 2-06-2020
//Creado por: grvidal
//Guarda el usuario, el dia y la hora, asi como la edicion que hizo sobre la BD
//-------------------------------------------------------

//insert delete update
//abre un archivo y guarda el usuario que hizo la edicio, junto con la hora y el dia y la consulta SQL que realizo
function writeAndLog($querry,$usuario){
	$myfile = fopen("../Files/loggDB.txt", "a");//se abre el archivo donde se guardara el log en modo append para no sobreescribir los datos 
	$txt = $usuario ." ; ". date('l jS \of F Y h:i:s A') . " ; " . $querry . "  \n" ;// se construye la cadena del log
	fwrite($myfile, $txt);// se escribe el archivo
	fclose($myfile);//se cierra el archivo

	include_once '../Model/Access_DB.php';// se ejecuta la conexion con la BD
	$mysqli = ConnectDB();

	return $mysqli->query($querry); // se devuelve el resultado de la consulta
}

?>