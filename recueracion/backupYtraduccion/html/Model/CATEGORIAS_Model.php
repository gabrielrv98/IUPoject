<?php
//Clase : CATEGORIAS_Model
//Creado el : 8-06-2020
//Creado por: grvidal
//Modelo de usuarios para realizar las acciones sobre la base de datos
//-------------------------------------------------------

class CATEGORIAS_Model {

	var $id;
	var $nombre;

	var $mysqli;

//Constructor de la clase
//Recive como entrada los datos persnales y crea la clase USUARIO_Model
function __construct($id,$nombre){
	$this->id = $id;
	$this->nombre = $nombre;

	include_once '../Model/Access_DB.php';
	$this->mysqli = ConnectDB();
}

//Metodo ADD
//Inserta en la tabla  de la bd  los valores
// de los atributos del objeto. Comprueba si la clave/s esta vacia y si 
//existe ya en la tabla
function ADD()
{	
	$sql = "select * from CATEGORIAS where NOMBRE_CATEGORIA = '".$this->nombre."'";

		$result = $this->mysqli->query($sql);
		if ($result->num_rows == 1){  // el elemento ya existe
				return '00001';
		}


	$sql = "INSERT INTO CATEGORIAS (
			NOMBRE_CATEGORIA) 
				VALUES (
					'".$this->nombre."'
					)";

		include '../Model/BD_logger.php';//se incluye el archivo con el log
		if (!writeAndLog($sql)) {//llama al metodo para loggear la consulta y si la salida es false devuelve Error de insercion
			return '00003';
		}
		else{
			return '00002'; //operacion de insertado correcta
		}
}

//funcion de destrucción del objeto: se ejecuta automaticamente
//al finalizar el script
function __destruct()
{

}


//funcion SEARCH: hace una búsqueda en la tabla con
//los datos proporcionados. Si van vacios devuelve todos
function SEARCH()
{
    $sql = "SELECT * 
    		FROM CATEGORIAS
    		WHERE ( ";

    $or = false;

    	if($this->id != ''){
	    	$sql = $sql . "ID LIKE '%" .$this->id. "%'";
	    	$or = true;
	    } 

	    if ( $this->nombre != '' ){
	    	if ($or) $sql = $sql . ' AND ';
	    	else $or = true;
	    	$sql = $sql . "NOMBRE_CATEGORIA LIKE '%" .$this->nombre. "%'";
	    	
	    }   

	    if (!$or) $sql = $sql . '1';

    

    $sql = $sql . " )";
    $toRet = $this->mysqli->query($sql);
    return $toRet ? $toRet : '00004 ';
}

// se recojen todas las tuplas de la base de datos y se pasan como array
function SHOW_ALL(){
	$sql = "SELECT * 
			FROM CATEGORIAS";
	return $this->mysqli->query($sql);
}

//funcion DELETE : comprueba que la tupla a borrar existe y una vez
// verificado la borra
function DELETE()
{
	$sql = "SELECT *
			FROM CATEGORIAS
			WHERE (ID = '$this->id')";

	$obj = $this->mysqli->query($sql);

	//Comprobacion de que la tupla es unica
	if( mysqli_num_rows($obj) == 1 ){

		$sql = "SELECT *
				FROM PRODUCTOS_CATEGORIAS
				WHERE (ID_CATEGORIA = '$this->id')";

		$obj = $this->mysqli->query($sql);
		if( mysqli_num_rows($obj) <= 0 ){
			$sql = "DELETE 
	   			FROM CATEGORIAS
	   			WHERE ID = '$this->id'"; 

	   		include '../Model/BD_logger.php';//se incluye el archivo con el log
	   		//se reliza el log del delete	
	   		if (writeAndLog($sql)) return '00005'; 
	   	}
	}
	return '00006';
}

// funcion RellenaDatos: recupera todos los atributos de una tupla a partir de su clave
function RellenaDatos()
{

	$sql = "SELECT * 
			FROM CATEGORIAS
			WHERE ( ID = '$this->id')";


	$toRet = $this->mysqli->query($sql);
	return $toRet ? $toRet->fetch_array() : '00015';
}

//comprueba si la categoria tiene productos asociados, en caso afirmativo devuelve false
function esEliminable(){

	$sql = "SELECT * 
			FROM PRODUCTOS_CATEGORIAS
			WHERE ( ID_CATEGORIA = '$this->id')";


	$toRet = $this->mysqli->query($sql);
	return $toRet->num_rows <= 0 ? 'true' : 'false';
}

// funcion Edit: realizar el update de una tupla despues de comprobar que existe
function EDIT()
{

	$sql = "SELECT ID 
				FROM CATEGORIAS
				WHERE (ID = '$this->id')";

//se comprueba que el dni o el email no estan repetidos en otros usuarios
	$response = $this->mysqli->query($sql)->num_rows;
	if ($response == 1) {
		$sql = "UPDATE CATEGORIAS
			SET NOMBRE_CATEGORIA = '$this->nombre'

			WHERE (ID = '$this->id')";
		include '../Model/BD_logger.php';//se incluye el archivo con el log
		$result = writeAndLog($sql); // se realiza el log

		if($result = 1) return '00007';// si la actualizacion fue existosa
	}
	return '00008';// si el numero de tuplas de vuelta es mayor que 1 o la actualizacion tuvo un error
}

}//fin de clase

?> 