<?php
//Clase : MENSAJES_Model
//Creado el : 20-06-2020
//Creado por: grvidal
//Modelo de usuarios para realizar las acciones sobre la base de datos
//-------------------------------------------------------

class MENSAJES_Model {

	var $id;
	var $idInter;
	var $contenido;
	var $fecha;
	var $loginUsuario;

	var $mysqli;

//Constructor de la clase
//Recive como entrada los datos persnales y crea la clase USUARIO_Model
function __construct($id,$idInter,$contenido,$fecha,$loginUsuario){
	$this->id = $id;
	$this->idInter = $idInter;
	$this->contenido = $contenido;
	$this->fecha = $fecha;
	$this->loginUsuario = $loginUsuario;

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
			from MENSAJES
			where ID_INTERCAMBIO = '".$this->idInter."', AND
					CONTENIDO = '".$this->contenido."' AND
					FECHA = '".$this->fecha."' AND 
					LOGIN_USUARIO = '".$this->loginUsuario."' ";

		$result = $this->mysqli->query($sql);
		if ($result->num_rows == 1){  // el elemento ya existe
				return '00001';
		}


	$sql = "INSERT INTO MENSAJES (
			CONTENIDO,
			ID_INTERCAMBIO,
			FECHA,
			LOGIN_USUARIO) 
				VALUES (
					'".$this->idInter."',
					'".$this->contenido."',
					'".$this->fecha."',
					'".$this->loginUsuario."' )";

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
    		FROM MENSAJES
			INNER JOIN PRODUCTOS ON MENSAJES.ID_PRODUCTO = PRODUCTOS.ID
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

// se recogen el ultimo mensaje de las conversaciones
function SHOW_ALL(){
	$sql = "SELECT * 
			FROM MENSAJES
			GROUP BY ID_INTERCAMBIO
			ORDER BY FECHA DESC";
	return $this->mysqli->query($sql);
}

// se recogen el ultimo mensaje de las conversaciones, junto con los titulos de los productos
function SHOW_ALL_BYGROUPS(){
	$sql = "SELECT ID_INTERCAMBIO, CONTENIDO, 
				LOGIN_USUARIO, ID_PRODUCTO1,
				ID_PRODUCTO2, FECHA, prod1.TITULO AS TITULO1, prod2.TITULO AS TITULO2
			FROM MENSAJES
			INNER JOIN INTERCAMBIO ON MENSAJES.ID_INTERCAMBIO = INTERCAMBIO.ID
			INNER JOIN PRODUCTOS prod1 ON ( prod1.ID = INTERCAMBIO.ID_PRODUCTO1)
			INNER JOIN PRODUCTOS prod2 ON ( prod2.ID = INTERCAMBIO.ID_PRODUCTO2)
			where FECHA in (
			    SELECT  MAX(FECHA)
						FROM MENSAJES
			            ORDER BY FECHA ASC )
			GROUP BY ID_INTERCAMBIO";

			/*

SELECT ID, contenido , ID_INTERCAMBIO, FECHA
FROM MENSAJES
where FECHA in (
    SELECT  MAX(FECHA)
			FROM MENSAJES
            ORDER BY FECHA ASC )
GROUP BY ID_INTERCAMBIO

			*/
	return $this->mysqli->query($sql);
}

// se recogen el ultimo mensaje de las conversaciones
function SHOW_ALL_BYGROUPS_Users(){
	$sql = "SELECT ID_INTERCAMBIO, CONTENIDO, 
					LOGIN_USUARIO, ID_PRODUCTO1,
					ID_PRODUCTO2 
			FROM MENSAJES
			INNER JOIN PRODUCTOS ON MENSAJES.ID_INTERCAMBIO = INTERCAMBIO.ID
			GROUP BY ID_INTERCAMBIO
			ORDER BY FECHA DESC";
	return $this->mysqli->query($sql);
}

//funcion DELETE : comprueba que la tupla a borrar existe y una vez
// verificado la borra
function DELETE()
{
	$sql = "SELECT *
			FROM MENSAJES
			WHERE (ID = '$this->id')";

	$obj = $this->mysqli->query($sql);

	//Comprobacion de que la tupla es unica
	if( mysqli_num_rows($obj) == 1 ){

		$sql = "DELETE 
   			FROM MENSAJES
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

	$sql = "SELECT * ,MENSAJES.ID AS ID
			FROM MENSAJES
			INNER JOIN PRODUCTOS ON PRODUCTOS.ID = MENSAJES.ID_PRODUCTO
			WHERE ( MENSAJES.ID = '$this->id')";

	$toRet = $this->mysqli->query($sql);
	return $toRet ? $toRet->fetch_array() : '00015';
}


// funcion Edit: realizar el update de una tupla despues de comprobar que existe
function EDIT()
{

	$sql = "SELECT ID 
				FROM MENSAJES
				WHERE (ID = '$this->id')";

//se comprueba que el dni o el email no estan repetidos en otros usuarios
	$response = $this->mysqli->query($sql)->num_rows;
	if ($response == 1) {
		$sql = "UPDATE MENSAJES
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