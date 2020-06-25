<?php
//Clase : VALORACIONES_Model
//Creado el : 18-06-2020
//Creado por: grvidal
//Modelo de usuarios para realizar las acciones sobre la base de datos
//-------------------------------------------------------

class VALORACIONES_Model {

	var $id;
	var $idProd;
	var $idInter;
	var $puntuacion;
	var $coment;

	var $mysqli;

//Constructor de la clase
//Recive como entrada los datos persnales y crea la clase USUARIO_Model
function __construct($id,$idProd,$idInter,$puntuacion,$coment){
	$this->id = $id;
	$this->idProd = $idProd;
	$this->idInter = $idInter;
	$this->puntuacion = $puntuacion;
	$this->coment = $coment;

	include_once '../Model/Access_DB.php';
	$this->mysqli = ConnectDB();
}

//Metodo ADD
//Inserta en la tabla  de la bd  los valores
// de los atributos del objeto. Comprueba si la clave/s esta vacia y si 
//existe ya en la tabla
function ADD()
{	
	$sql = "SELECT * 
			from VALORACIONES
			where ID_PRODUCTO = '".$this->idProd."' AND
					ID_INTERCAMBIO = '".$this->idInter."'";

		$result = $this->mysqli->query($sql);
		if ($result->num_rows == 1){  // el elemento ya existe
				return '00001';
		}


	$sql = "INSERT INTO VALORACIONES (
			ID_PRODUCTO,
			ID_INTERCAMBIO,
			PUNTUACION,
			COMENTARIO) 
				VALUES (
					'".$this->idProd."',
					'".$this->idInter."',
					'".$this->puntuacion."',
					'".$this->coment."' )";

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
    		FROM VALORACIONES
			INNER JOIN PRODUCTOS ON VALORACIONES.ID_PRODUCTO = PRODUCTOS.ID
    		WHERE ( ";

    $or = false;

    	if($this->id != ''){
	    	$sql = $sql . "ID LIKE '%" .$this->id. "%'";
	    	$or = true;
	    } 

	    if ( $this->idInter != '' ){
	    	if ($or) $sql = $sql . ' AND ';
	    	else $or = true;
	    	$sql = $sql . "ID_INTERCAMBIO LIKE '%" .$this->idInter. "%'";
	    	
	    }  
	    if ( $this->idProd != '' ){
	    	if ($or) $sql = $sql . ' AND ';
	    	else $or = true;
	    	$sql = $sql . "ID_PRODUCTO LIKE '%" .$this->idProd. "%'";
	    	
	    }
	    if ( $this->coment != '' ){
	    	if ($or) $sql = $sql . ' AND ';
	    	else $or = true;
	    	$sql = $sql . "COMENTARIO LIKE '%" .$this->coment. "%'";
	    	
	    }
	    if ( $this->puntuacion != '' ){
	    	if ($or) $sql = $sql . ' AND ';
	    	else $or = true;
	    	$sql = $sql . "PUNTUACION LIKE '%" .$this->puntuacion. "%'";
	    	
	    } 


	    if (!$or) $sql = $sql . '1';

    

    $sql = $sql . " )";
    $toRet = $this->mysqli->query($sql);
    return $toRet ? $toRet : '00004 ';
}

// se recojen todas las tuplas de la base de datos y se pasan como array
function SHOW_ALL(){
	$sql = "SELECT * , VALORACIONES.ID AS ID
			FROM VALORACIONES
			INNER JOIN PRODUCTOS ON VALORACIONES.ID_PRODUCTO = PRODUCTOS.ID";
	return $this->mysqli->query($sql);
}

//funcion DELETE : comprueba que la tupla a borrar existe y una vez
// verificado la borra
function DELETE()
{
	$sql = "SELECT *
			FROM VALORACIONES
			WHERE (ID = '$this->id')";

	$obj = $this->mysqli->query($sql);

	//Comprobacion de que la tupla es unica
	if( mysqli_num_rows($obj) == 1 ){

		$sql = "DELETE 
   			FROM VALORACIONES
   			WHERE ID = '$this->id'"; 

   		include '../Model/BD_logger.php';//se incluye el archivo con el log
   		//se reliza el log del delete	
   		if (writeAndLog($sql)) return '00005'; 
	}
	return '00006';
}

// funcion RellenaDatos: recupera todos los atributos de una tupla a partir de su clave
function RellenaDatos()
{

	$sql = "SELECT * ,VALORACIONES.ID AS ID
			FROM VALORACIONES
			INNER JOIN PRODUCTOS ON PRODUCTOS.ID = VALORACIONES.ID_PRODUCTO
			WHERE ( VALORACIONES.ID = '$this->id')";

	$toRet = $this->mysqli->query($sql);
	return $toRet ? $toRet->fetch_array() : '00015';
}


// funcion Edit: realizar el update de una tupla despues de comprobar que existe
function EDIT()
{

	$sql = "SELECT ID 
				FROM VALORACIONES
				WHERE (ID = '$this->id')";

//se comprueba que el dni o el email no estan repetidos en otros usuarios
	$response = $this->mysqli->query($sql)->num_rows;
	if ($response == 1) {
		$sql = "UPDATE VALORACIONES
			SET PUNTUACION = '$this->puntuacion',
				COMENTARIO = '$this->coment'
			WHERE (ID = '$this->id')";
		include '../Model/BD_logger.php';//se incluye el archivo con el log
		$result = writeAndLog($sql); // se realiza el log

		if($result = 1) return '00007';// si la actualizacion fue existosa
	}
	return '00008';// si el numero de tuplas de vuelta es mayor que 1 o la actualizacion tuvo un error
}

}//fin de clase

?> 