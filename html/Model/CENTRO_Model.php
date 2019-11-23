<?php

//Clase : CENTRO_Modelo
//Creado el : 2-10-2019
//Creado por: grvidal
//Modelo de usuarios para realizar las acciones sobre la base de datos
//-------------------------------------------------------

class CENTRO_Model {

	var $centro;
	var $edificio;
	var $nombre;
	var $direccion;
	var $responsable;

	var $mysqli;

//Constructor de la clase
//Se inicializan las columnas de la tupla
function __construct($centro,$edificio,$nombre,$direccion,$responsable){
	$this->centro = $centro;
	$this->edificio = $edificio;
	$this->nombre = $nombre;
	$this->direccion = $direccion;
	$this->responsable = $responsable;

	include_once '../Model/Access_DB.php';
	$this->mysqli = ConnectDB();
}

//funcion de destrucción del objeto: se ejecuta automaticamente
//al finalizar el script
function __destruct()
{

}

//devuelve todas las titulaciones que la entidad tenga asociadas
function getTitulaciones(){
	$sql = "SELECT * 
			FROM TITULACION
			WHERE (CODCENTRO = '$this->centro')";

	$toRet = $this->mysqli->query($sql);
	return $toRet;
}

//devuelve todas los espacios que la entidad tenga asociadas
function getEspacios(){
	$sql = "SELECT * 
			FROM ESPACIO
			WHERE (CODCENTRO = '$this->centro')";

	$toRet = $this->mysqli->query($sql);
	return $toRet;
}
//funcion SEARCH: hace una búsqueda en la tabla con
//los datos proporcionados. Si van vacios devuelve todos
function SEARCH()
{

    $sql = "SELECT * 
    		FROM CENTRO
    		WHERE ( ";

    $or = false;

    	if($this->centro != ''){// se mira si la variable centro vino vacia
	    	$sql = $sql . "CODCENTRO LIKE '%" .$this->centro. "%'";	//si hay algo se escribe la cadena sql
	    	$or = true; //el disparador se activa
	    } 

	    if ( $this->edificio != '' ){
	    	if ($or) $sql = $sql . ' AND ';
	    	else $or = true;

	    	$sql = $sql . "CODEDIFICIO LIKE '%" .$this->edificio. "%'";
	    } 

	    if ( $this->nombre != '' ){
	    	if ($or) $sql = $sql . ' AND '; //si el disparador se activa se añade la cadena AND a la secuencia sql
	    	else $or = true;
	    	$sql = $sql . "NOMBRECENTRO LIKE '%" .$this->nombre. "%'";
	    	
	    }   

	   if ( $this->direccion != '' ){
	   		if ($or) $sql = $sql . ' AND ';
	    	else $or = true;

	    	$sql = $sql . "DIRECCIONCENTRO LIKE '%" .$this->direccion. "%'";
	    } 
	    if ( $this->responsable  != '' ){
	    	if ($or) $sql = $sql . ' AND ';
	    	else $or = true;

	    	$sql = $sql . "RESPONSABLECENTRO LIKE '%" .$this->responsable . "%'";
	    } 


	    if (!$or) $sql = $sql . '1';

    

    $sql = $sql . " )";

    $toRet =  $this->mysqli->query($sql);
    return ($toRet) ? $toRet : 'Error de gestor de base de datos';
}

// se recojen todas las tuplas de la base de datos y se pasan como array
function SHOW_ALL(){
	$sql = "SELECT * 
			FROM CENTRO";
	return $this->mysqli->query($sql);
}
//funcion DELETE : comprueba que la tupla a borrar existe y una vez
// verificado la borra
function DELETE()
{
//Busco si centro existe con todas las caracteristicas
	$sql = "SELECT *
			FROM CENTRO
			WHERE (CODCENTRO = '$this->centro')";

	$obj = $this->mysqli->query($sql);

	if( mysqli_num_rows($obj) == 1 ){
//Busco si hay alguna titulacion que este en este centro
		$sql = "SELECT *
			FROM TITULACION
			WHERE (CODCENTRO = '$this->centro')";

		$obj = $this->mysqli->query($sql);
		
		if( mysqli_num_rows($obj) == 0 ){

			$sql = "SELECT *
				FROM ESPACIO
				WHERE (CODCENTRO = '$this->centro')";

		 	$obj = $this->mysqli->query($sql);

		 	if (mysqli_num_rows($obj) == 0) {
		 		$sql = "DELETE 
	   			FROM CENTRO
	   			WHERE (CODCENTRO = '$this->centro')";

	   			return $this->mysqli->query($sql) ? 'Borrado realizado con éxito' : 'errorDelete';
		 	}
			
		}
	}
	return 'Error de gestor de base de datos';
    
}

// funcion RellenaDatos: recupera todos los atributos de una tupla a partir de su clave
function RellenaDatos()
{

	$sql = "SELECT * 
			FROM CENTRO
			WHERE (CODCENTRO = '$this->centro' )";

	$toRet = $this->mysqli->query($sql);
	return $toRet ? $toRet->fetch_array() : 'Error de gestor de base de datos';
}

// funcion Edit: realizar el update de una tupla 
function EDIT()
{

	$sql = "SELECT *
			FROM CENTRO
			WHERE (CODCENTRO = '$this->centro' AND
					CODEDIFICIO = '$this->edificio') ";

	//se comprueba que el edificio existe
	$response = $this->mysqli->query($sql);
	if (mysqli_num_rows($response) == 1) {	
		$sql = "UPDATE CENTRO
				SET NOMBRECENTRO = '$this->nombre',
					DIRECCIONCENTRO = '$this->direccion',
					RESPONSABLECENTRO = '$this->responsable'

			WHERE ( CODCENTRO = '$this->centro' AND
					CODEDIFICIO = '$this->edificio')";

		$result = $this->mysqli->query($sql);

		if($result = 1) return 'Actualización realizada con éxito';

	}
	return 'Error de gestor de base de datos';

}

//funcion para obtener una lista con los nombres y los codigos de los edificios
function getEdificios(){
	$sql = "SELECT NOMBREEDIFICIO, 
					CODEDIFICIO
			FROM EDIFICIO
			WHERE 1";
	return $this->mysqli->query($sql);
}

//Metodo ADD
//Inserta en la tabla  de la bd  los valores
// de los atributos del objeto. Comprueba si la clave/s esta vacia y si 
//existe ya en la tabla
function ADD(){

	// si el usuario no existe se devolveria true a toRet
	$toRet = $this->Register();
	if($toRet == 'true'){
		// se devuelve la cadena diciendo el exito de la insercion
		return $this->registrar();
	} 
	//se devuelve una cadena con de fallo de insercion
	else return $toRet;
    
}



//Metodo Register
//Busca algun usuario con las mismas claves primarias, 
//si lo encuentra devuelve una cadena sino true
function Register(){

		$sql = "SELECT * 
		FROM CENTRO 
		WHERE (CODCENTRO = '$this->centro')";

		$result = $this->mysqli->query($sql);
		if ($result->num_rows == 1){  // existe el usuario
				return 'Inserción fallida: el elemento ya existe';
		}else{
	    		return true; //no existe el usuario
		}

	}

function registrar(){

			
		$sql = "SELECT *
				FROM EDIFICIO
				WHERE CODEDIFICIO = '$this->edificio'";
		$obj = $this->mysqli->query($sql);

		if (mysqli_num_rows($obj) == 1) {
			$sql = "INSERT INTO CENTRO (
						CODCENTRO,
						CODEDIFICIO,
						NOMBRECENTRO,
						DIRECCIONCENTRO,
						RESPONSABLECENTRO) 
					VALUES (
						'$this->centro',
						'$this->edificio',
						'$this->nombre',
						'$this->direccion',
						'$this->responsable')
						";
			if ($this->mysqli->query($sql)) {
				return 'Inserción realizada con éxito'; //operacion de insertado correcta
			}
		}
		
		return 'Error de gestor de base de datos';
	}

}//fin de clase

?> 