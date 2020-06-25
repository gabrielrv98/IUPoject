
<?php

//Clase : INTERCAMBIO_Model
//Creado el : 15-06-2020
//Creado por: grvidal
//Modelo de intercambio para realizar las acciones sobre la base de datos
//-------------------------------------------------------

class INTERCAMBIOS_Model {

	var $id;
	var $idProd1;
	var $idProd2;
	var $unidades1;
	var $unidades2;
	var $accept1;
	var $accept2;
	var $mysqli;

//Constructor de la clase
//Recive como entrada los datos persnales y crea la clase INTERCAMBIOS_Model
function __construct($id,$idProd1,$idProd2,$unidades1,$unidades2,$accept1,$accept2){
	$this->id = $id;
	$this->idProd1 = $idProd1;
	$this->idProd2 = $idProd2;
	$this->unidades1 = $unidades1;
	$this->unidades2 = $unidades2;
	$this->accept1 = $accept1;
	$this->accept2 = $accept2; 

	include_once '../Model/Access_DB.php';
	$this->mysqli = ConnectDB();
}

//Metodo ADD
//Inserta en la tabla  de la bd  los valores
// de los atributos del objeto. Los productos se pueden
// subir todas las veces que quieras ya que es en base a las existencias
// e intención del vendedor.
function ADD()
{	

	if($this->accept1 == '') $this->accept1 = 'denegado';//si el estado de aceptacion1 esta vacio se recoloca a denegado
	if($this->accept2 == '') $this->accept2 = 'denegado';//si el estado de aceptacion2 esta vacio se recoloca a denegado


	$sql = "INSERT INTO INTERCAMBIO (
			ID_PRODUCTO1,
			ID_PRODUCTO2,
			UNIDADES1,
			UNIDADES2,
			ACCEPT1,
			ACCEPT2) 
				VALUES (
					'".$this->idProd1."',
					'".$this->idProd2."',
					'".$this->unidades1."',
					'".$this->unidades2."',
					'".$this->accept1."',
					'".$this->accept2."'
					)";

		include_once'../Model/BD_logger.php';//se incluye el archivo con el log
		if (!writeAndLog($sql)) {//llama al metodo para loggear la consulta y si la salida es false devuelve Error de insercion
			return '00003';

		}else{

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
    $sql = "SELECT prod1.TITULO AS TITULO1, prod1.ID AS ID1, 
    		prod2.TITULO AS TITULO2, prod2.ID AS ID2, INTERCAMBIO.ID,
					UNIDADES1, UNIDADES2, ACCEPT1, ACCEPT2
    		FROM INTERCAMBIO
    		INNER JOIN PRODUCTOS prod1 ON prod1.ID = INTERCAMBIO.ID_PRODUCTO1
    		INNER JOIN PRODUCTOS prod2 ON prod2.ID = INTERCAMBIO.ID_PRODUCTO2
    		WHERE ( ";

    $or = false;

	    if ( $this->idProd1 != '' ){
	    	if ($or) $sql = $sql . ' AND ';
	    	else $or = true;
	    	$sql = $sql . "ID_PRODUCTO1 = '" .$this->idProd1. "'";
	    	
	    }   

	   if ( $this->idProd2 != ''   ){
	   		if ($or) $sql = $sql .  ' AND ';
	    	else $or = true;

	    	$sql = $sql . "ID_PRODUCTO1 = '" .$this->idProd2. "'";
	    } 
	    if ( $this->unidades1 != '' ){
	    	if ($or) $sql = $sql . ' AND ';
	    	else $or = true;

	    	$sql = $sql . "UNIDADES1 => '" .$this->unidades1. "'";
	    } 
	    if ( $this->unidades2 != '' ){
	    	if ($or) $sql = $sql . ' AND ';
	    	else $or = true;

	    	$sql = $sql . "UNIDADES2 => '%" .$this->unidades2. "%'";
	    } 
	    if ( $this->accept1 != '' ){
	    	if ($or) $sql = $sql . ' AND ';
	    	else $or = true;

	    	$sql = $sql . "ACCEPT1 = '" .$this->accept1. "'";
	    } 
	    if ( $this->accept2 != '' ){
	    	if ($or) $sql = $sql .' AND ';
	    	else $or = true;

	    	$sql = $sql . "ACCEPT2 = '" .$this->accept2. "'";
	    } 

	    if (!$or) $sql = $sql . '1';

    

    $sql = $sql . " )";
    $toRet = $this->mysqli->query($sql);
    return $toRet ? $toRet : '00004';
}

//funcion SEARCH_USUARIO: hace una búsqueda en la tabla con
//los datos proporcionados donde el usuario tenga algo que ver
function SEARCH_USUARIO($dni)
{
    $sql = "SELECT INTERCAMBIO.ID AS ID, prod1.TITULO AS TITULO1, prod1.ID AS ID1,
    				prod2.TITULO AS TITULO2, prod2.ID AS ID2,
					UNIDADES1, UNIDADES2, ACCEPT1, ACCEPT2
    		FROM INTERCAMBIO
    		INNER JOIN PRODUCTOS prod1 ON prod1.ID = INTERCAMBIO.ID_PRODUCTO1
    		INNER JOIN PRODUCTOS prod2 ON prod2.ID = INTERCAMBIO.ID_PRODUCTO2
    		WHERE ( ";

    $or = false;

	    if ( $this->idProd1 != '' ){
	    	if ($or) $sql = $sql . ' AND ';
	    	else $or = true;
	    	$sql = $sql . "ID_PRODUCTO1 = '" .$this->idProd1. "'";
	    	
	    }   

	   if ( $this->idProd2 != '' ){
	   		if ($or) $sql = $sql .  ' AND ';
	    	else $or = true;

	    	$sql = $sql . "ID_PRODUCTO2 = '" .$this->idProd2. "'";
	    } 
	    if ( $this->unidades1 != '' ){
	    	if ($or) $sql = $sql . ' AND ';
	    	else $or = true;

	    	$sql = $sql . "UNIDADES1 LIKE '%" .$this->unidades1. "%'";
	    } 
	    if ( $this->unidades2 != '' ){
	    	if ($or) $sql = $sql . ' AND ';
	    	else $or = true;

	    	$sql = $sql . "UNIDADES2 LIKE '%" .$this->unidades2. "%'";
	    } 
	    if ( $this->accept1 != '' ){
	    	if ($or) $sql = $sql . ' AND ';
	    	else $or = true;

	    	$sql = $sql . "ACCEPT1 = '" .$this->accept1. "'";
	    } 
	    if ( $this->accept2 != '' ){
	    	if ($or) $sql = $sql .' AND ';
	    	else $or = true;

	    	$sql = $sql . "ACCEPT2 = '" .$this->accept2. "'";
	    } 
	    if ( $or ) $sql = $sql .' AND ';
	     
		$sql = $sql . "prod1.VENDEDOR_DNI = '" .$dni. "' OR
						prod2.VENDEDOR_DNI = '" .$dni. "'";
    

    $sql = $sql . " )";
    $toRet = $this->mysqli->query($sql);
    return $toRet ? $toRet : '00004';
}


// se recojen todas las tuplas de la base de datos y se pasan como array
function SHOW_ALL(){
	$sql = "SELECT prod1.TITULO AS TITULO1, prod1.ID AS ID1, prod2.TITULO AS TITULO2, prod2.ID AS ID2, INTERCAMBIO.ID,
					UNIDADES1, UNIDADES2, ACCEPT1, ACCEPT2
				FROM INTERCAMBIO
				INNER JOIN PRODUCTOS prod1 ON prod1.ID = INTERCAMBIO.ID_PRODUCTO1
				INNER JOIN PRODUCTOS prod2 ON prod2.ID = INTERCAMBIO.ID_PRODUCTO2";
	return $this->mysqli->query($sql);
}

//funcion DELETE : comprueba que la tupla a borrar existe y una vez
// verificado la borra
function DELETE()
{
	$sql = "SELECT *
			FROM INTERCAMBIO
			WHERE (ID = '$this->id')";

	$obj = $this->mysqli->query($sql);

	//Comprobacion de que la tupla es unica
	if( mysqli_num_rows($obj) == 1 ){

		$sql = "SELECT *
			FROM MENSAJES
			WHERE (ID_INTERCAMBIO = '$this->id')";
		$obj = $this->mysqli->query($sql);

		if( mysqli_num_rows($obj) <= 0 ){

			$sql = "DELETE 
	   			FROM INTERCAMBIO
	   			WHERE ID = '$this->id'"; 

	   		include_once'../Model/BD_logger.php';//se incluye el archivo con el log
	   		//se reliza el log del delete	
	   		if (writeAndLog($sql)) return '00005';
   		}
   			
	}
	 return '00006';
}

// funcion RellenaDatos: recupera todos los atributos de una tupla a partir de su clave
function RellenaDatos()
{

	$sql = "SELECT INTERCAMBIO.ID, ID_PRODUCTO1, ID_PRODUCTO2, 
				UNIDADES1, UNIDADES2, 
				ACCEPT1, ACCEPT2,
				prod1.TITULO AS TITULO1,
				prod1.VENDEDOR_DNI AS DNI1,
				prod2.TITULO AS TITULO2,
				prod2.VENDEDOR_DNI AS DNI2
			FROM INTERCAMBIO
			INNER JOIN PRODUCTOS prod1 ON prod1.ID = INTERCAMBIO.ID_PRODUCTO1
			INNER JOIN PRODUCTOS prod2 ON prod2.ID = INTERCAMBIO.ID_PRODUCTO2
			WHERE ( INTERCAMBIO.ID = '$this->id')";


	$toRet = $this->mysqli->query($sql);
	return $toRet ? $toRet->fetch_array() : '00015';
}


// funcion Edit: realizar el update de una tupla despues de comprobar que existe
function EDIT()
{

	$sql = "SELECT ID 
				FROM INTERCAMBIO
				WHERE (ID = '$this->id')";

//se comprueba que la tupla existe

	$response = $this->mysqli->query($sql)->num_rows;
	if ($response == 1) {

		include_once '../Model/USUARIOS_Model.php';
		$usuario = new USUARIOS_Model($_SESSION['login'],'','','','','','','','','','','','','');
		$intercambio = new INTERCAMBIOS_Model($this->id,'','','','','','');//creamos el objeto Antiguo
		$datosIntercambio = $intercambio->RellenaDatos();

		if(!$usuario->isAdmin()){
			
			if ($usuario->getDNI() == $intercambio->getDNIPord1()){// si eres el propietario del producto 1
				$cambio = false; // no es necesario resetear el estado de aceptacion del otro usuario

				if($datosIntercambio['ID_PRODUCTO1'] != $this->idProd1)// si el usuario cambio su producto
					$cambio = true;
				if($datosIntercambio['UNIDADES1'] != $this->unidades1)// si el usuario cambio sus unidades
					$cambio = true;

				if($cambio == true) $this->accept2 = 'denegado';// se resetea el estado de aceptacion del otro usuario para que confirme que le interesa el cambio

			}else if($usuario->getDNI() == $intercambio->getDNIPord2()){// si eres el propietario del producto 2
				$cambio = false; // no es necesario resetear el estado de aceptacion del otro usuario

				if($datosIntercambio['ID_PRODUCTO2'] != $this->idProd2)// si el usuario cambio su producto
					$cambio = true;
				if($datosIntercambio['UNIDADES2'] != $this->unidades2)// si el usuario cambio sus unidades
					$cambio = true;

				if($cambio == true) $this->accept1 = 'denegado';// se resetea el estado de aceptacion del otro usuario para que confirme que le interesa el cambio

			}
		}
		$sql = "UPDATE INTERCAMBIO
			SET ID_PRODUCTO1 = '$this->idProd1',
				ID_PRODUCTO2 = '$this->idProd2',
				UNIDADES1 = '$this->unidades1',
				UNIDADES2 = '$this->unidades2',	
				ACCEPT1 = '$this->accept1',
				ACCEPT2 = '$this->accept2'

			WHERE (ID = '$this->id')";
		include_once'../Model/BD_logger.php';//se incluye el archivo con el log
		$result = writeAndLog($sql); // se realiza el log

		if($result = 1) return '00007';// si la actualizacion fue existosa
	}
	return '00008';// si el numero de tuplas de vuelta es mayor que 1 o la actualizacion tuvo un error
}


//funcion getDNIPord1(): devuelve el DNI del producto 1
function getDNIPord1(){

	$sql = "SELECT VENDEDOR_DNI
			FROM PRODUCTOS
			INNER JOIN INTERCAMBIO ON INTERCAMBIO.ID_PRODUCTO1 = PRODUCTOS.ID
			WHERE ( INTERCAMBIO.ID = '$this->id')";
	$resultado = $this->mysqli->query($sql);
	$resultado = $resultado-> fetch_array();
	return $resultado['VENDEDOR_DNI'];
}

//comprueba si el intercambio se puede eliminar, si tienes mensajes asociados o valoraciones devolvera false
function esEliminable(){

	$sql = "SELECT *
			FROM MENSAJES
			WHERE ID_INTERCAMBIO = '$this->id'";
	$resultado = $this->mysqli->query($sql);

	if ($resultado->num_rows <= 0) {
		$sql = "SELECT *
				FROM VALORACIONES
				WHERE ID_INTERCAMBIO = '$this->id'";
		$resultado = $this->mysqli->query($sql);

		if ($resultado->num_rows <= 0)  return 'true';
	}
	return 'false';
}

//funcion getDNIPord2(): devuelve el DNI del producto 2
function getDNIPord2(){

	$sql = "SELECT VENDEDOR_DNI
			FROM PRODUCTOS
			INNER JOIN INTERCAMBIO ON INTERCAMBIO.ID_PRODUCTO2 = PRODUCTOS.ID
			WHERE ( INTERCAMBIO.ID = '$this->id')";
	$resultado = $this->mysqli->query($sql);
	$resultado = $resultado-> fetch_array();
	return $resultado['VENDEDOR_DNI'];
}


//funcion getDNIS(): devuelve ambos DNI
function getDNIS(){

	$sql = "SELECT prod1.VENDEDOR_DNI AS DNI1 , prod2.VENDEDOR_DNI AS DNI2
			FROM INTERCAMBIO
			INNER JOIN PRODUCTOS as prod1 ON INTERCAMBIO.ID_PRODUCTO1 = prod1.ID
			INNER JOIN PRODUCTOS as prod2 ON INTERCAMBIO.ID_PRODUCTO2 = prod2.ID
			WHERE ( INTERCAMBIO.ID = '$this->id')";

	$resultado = $this->mysqli->query($sql);
	$resultado = $resultado-> fetch_array();
	return $resultado;
}

//funcion getConversaciones(): devuelve las conversaciones posibles
function getConversacionesPosibles(){

	$sql = "SELECT INTERCAMBIO.ID , prod1.TITULO AS TITULO1,
				prod2.TITULO AS TITULO2, prod1.VENDEDOR_DNI AS DNI1,
				prod2.VENDEDOR_DNI AS DNI2, user1.LOGIN AS LOGIN1, user2.LOGIN AS LOGIN2
			FROM INTERCAMBIO
			INNER JOIN PRODUCTOS AS prod1 ON INTERCAMBIO.ID_PRODUCTO1 = prod1.ID
			INNER JOIN PRODUCTOS AS prod2 ON INTERCAMBIO.ID_PRODUCTO2 = prod2.ID
            INNER JOIN USUARIOS AS user1 ON prod1.VENDEDOR_DNI = user1.DNI
            INNER JOIN USUARIOS AS user2 ON prod2.VENDEDOR_DNI = user2.DNI
			WHERE ( INTERCAMBIO.ACCEPT1 = 'denegado' OR 
					INTERCAMBIO.ACCEPT2 = 'denegado')";
	$resultado = $this->mysqli->query($sql);
	return $resultado;
}

//funcion getConversacionConID(): devuelve la conversacoin con el id y unos datos
//para mayor facilidad visual
function getConversacionConID(){

	$sql = "SELECT INTERCAMBIO.ID , prod1.TITULO AS TITULO1,
				prod2.TITULO AS TITULO2, prod1.VENDEDOR_DNI AS DNI1,
				prod2.VENDEDOR_DNI AS DNI2, user1.LOGIN AS LOGIN1, user2.LOGIN AS LOGIN2
			FROM INTERCAMBIO
			INNER JOIN PRODUCTOS AS prod1 ON INTERCAMBIO.ID_PRODUCTO1 = prod1.ID
			INNER JOIN PRODUCTOS AS prod2 ON INTERCAMBIO.ID_PRODUCTO2 = prod2.ID
            INNER JOIN USUARIOS AS user1 ON prod1.VENDEDOR_DNI = user1.DNI
            INNER JOIN USUARIOS AS user2 ON prod2.VENDEDOR_DNI = user2.DNI
			WHERE INTERCAMBIO.ID = '$this->id' ";

			
	$resultado = $this->mysqli->query($sql);
	return $resultado;
}

//funcion comprobarAccept(): devuelve true si aun se puede enviar mensajes
//comprueba que alguno de los dos aun no ha aceptado, 
//en una conversacion aceptada no se pueden añadir mensajes
function comprobarAccept(){

	$sql = "SELECT INTERCAMBIO.ID 
			FROM INTERCAMBIO
			WHERE ( INTERCAMBIO.ACCEPT1 = 'denegado' OR 
					INTERCAMBIO.ACCEPT2 = 'denegado') AND
					INTERCAMBIO.ID = '$this->id' ";
	$resultado = $this->mysqli->query($sql);

	//Comprobacion de que la tupla es unica
	if( mysqli_num_rows($resultado) == 1 ){
		return true;
	}else return false;
}

//devuelve los titulos a partir del id del producto
function getTitulo(){

	$sql = "SELECT prod1.TITULO AS TITULO1,
					prod2.TITULO AS TITULO2, INTERCAMBIO.ID
			FROM INTERCAMBIO
			INNER JOIN PRODUCTOS prod1 ON prod1.ID = INTERCAMBIO.ID_PRODUCTO1
			INNER JOIN PRODUCTOS prod2 ON prod2.ID = INTERCAMBIO.ID_PRODUCTO2
			WHERE INTERCAMBIO.ID = '$this->id'";
	$toRet = $this->mysqli->query($sql);
 
	if ($toRet) {// si la busqueda fue existosa
		$toRet = $toRet->fetch_array();
		return $toRet;
	}else return 'Titulo error';

}

//devuelve los intercambios mejores valorados junto con su ID, la suma de las 
//puntuaciones asi como los titulos y unidades intercambiados
function getMejoresIntercambios(){

	$sql = "SELECT INTERCAMBIO.ID, SUM(PUNTUACION) AS PUNTUACION1, 
			prod1.TITULO AS TITULO1, INTERCAMBIO.UNIDADES1 AS UNIDADES1, 
			prod2.TITULO AS TITULO2, INTERCAMBIO.UNIDADES2 AS UNIDADES2
	FROM `INTERCAMBIO`
	INNER JOIN VALORACIONES ON VALORACIONES.ID_INTERCAMBIO = INTERCAMBIO.ID
    INNER JOIN PRODUCTOS AS prod1 ON prod1.ID = INTERCAMBIO.ID_PRODUCTO1
    INNER JOIN PRODUCTOS AS prod2 ON prod2.ID = INTERCAMBIO.ID_PRODUCTO2
    
    GROUP BY INTERCAMBIO.ID
    ORDER BY PUNTUACION1 DESC";
	$toRet = $this->mysqli->query($sql);
 
	return $toRet;

}

//devuelve las valoraciones del intercambio
function getValoraciones1(){

	$sql = "SELECT PUNTUACION, VALORACIONES.ID AS ID
		FROM `VALORACIONES` 
		INNER JOIN INTERCAMBIO ON VALORACIONES.ID_INTERCAMBIO = INTERCAMBIO.ID 
		INNER JOIN PRODUCTOS ON PRODUCTOS.ID = INTERCAMBIO.ID_PRODUCTO1
		WHERE VALORACIONES.ID_INTERCAMBIO = '13' AND
	INTERCAMBIO.ID_PRODUCTO1 = VALORACIONES.ID_PRODUCTO";
	$toRet = $this->mysqli->query($sql);
 
	return $toRet->fetch_array();

}

//devuelve las valoraciones del intercambio
function getValoraciones2(){

	$sql = "SELECT PUNTUACION, VALORACIONES.ID AS ID
		FROM `VALORACIONES` 
		INNER JOIN INTERCAMBIO ON VALORACIONES.ID_INTERCAMBIO = INTERCAMBIO.ID 
		INNER JOIN PRODUCTOS ON PRODUCTOS.ID = INTERCAMBIO.ID_PRODUCTO2
		WHERE VALORACIONES.ID_INTERCAMBIO = '13' AND
	INTERCAMBIO.ID_PRODUCTO2 = VALORACIONES.ID_PRODUCTO";
	$toRet = $this->mysqli->query($sql);
 
	return $toRet->fetch_array();

}

}//fin de clase

?> 