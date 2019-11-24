﻿<?php

//Clase : USUARIOS_Modelo
//Creado el : 2-10-2019
//Creado por: grvidal
//Modelo de usuarios para realizar las acciones sobre la base de datos
//-------------------------------------------------------

class PROFESOR_Model {

	var $dni;
	var $nombre;
	var $apellido;
	var $area;
	var $departamento;
	var $mysqli;

//Constructor de la clase
//Se inicializan las columnas de la tupla
function __construct($dni,$nombre,$apellido,$area,$departamento){
	$this->dni = $dni;
	$this->nombre = $nombre;
	$this->apellido = $apellido;
	$this->area = $area;
	$this->departamento = $departamento;

	include_once '../Model/Access_DB.php';
	$this->mysqli = ConnectDB();
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
    		FROM PROFESOR
    		WHERE ( ";

    $or = false;

    	if($this->dni != ''){
	    	$sql = $sql . "DNI LIKE '%" .$this->dni. "%'";
	    	$or = true;
	    } 

	    if ( $this->nombre != '' ){
	    	if ($or) $sql = $sql . ' AND ';
	    	else $or = true;
	    	$sql = $sql . "NOMBREPROFESOR LIKE '%" .$this->nombre. "%'";
	    	
	    }   

	   if ( $this->apellido != '' ){
	   		if ($or) $sql = $sql . ' AND ';
	    	else $or = true;

	    	$sql = $sql . "APELLIDOSPROFESOR LIKE '%" .$this->apellido. "%'";
	    } 
	    if ( $this->area != '' ){
	    	if ($or) $sql = $sql . ' AND ';
	    	else $or = true;

	    	$sql = $sql . "AREAPROFESOR LIKE '%" .$this->area. "%'";
	    } 
	    if ( $this->departamento != '' ){
	    	if ($or) $sql = $sql . ' AND ';
	    	else $or = true;

	    	$sql = $sql . "DEPARTAMENTOPROFESOR LIKE '%" .$this->departamento. "%'";
	    } 

	    if (!$or) $sql = $sql . '1';

    

    $sql = $sql . " )";
    $toRet = $this->mysqli->query($sql);
    return $toRet ? $toRet : 'Error de gestor de base de datos';
}

// se recojen todas las tuplas de la base de datos y se pasan como array
function SHOW_ALL(){
	$sql = "SELECT * 
			FROM PROFESOR";
	return $this->mysqli->query($sql);
}
//funcion DELETE : comprueba que la tupla a borrar existe y una vez
// verificado la borra
function DELETE()
{
//Busco si profesor existe con todas las caracteristicas
	$sql = "SELECT *
			FROM PROFESOR
			WHERE (DNI = '$this->dni' AND
					NOMBREPROFESOR = '$this->nombre' AND
					APELLIDOSPROFESOR = '$this->apellido' AND
					AREAPROFESOR = '$this->area' AND
					DEPARTAMENTOPROFESOR = '$this->departamento' )";

	$obj = $this->mysqli->query($sql);

	if( mysqli_num_rows($obj) == 1 ){

		$sql = "SELECT *
			FROM PROF_ESPACIO
			WHERE (DNI = '$this->dni')";

		$obj = $this->mysqli->query($sql);

		$sql = "SELECT *
			FROM PROF_TITULACION
			WHERE (DNI = '$this->dni')";

		$obj2 = $this->mysqli->query($sql);

		if( mysqli_num_rows($obj) == 0 && mysqli_num_rows($obj2) == 0 ){
			$sql = "DELETE 
   			FROM PROFESOR
   			WHERE (DNI = '$this->dni')";

   			return $this->mysqli->query($sql) ? 'Borrado realizado con éxito' : 'errorDelete';
		}
	} 
	return 'Error de gestor de base de datos';
	//return 'El profesor no existe';
    
}

// funcion RellenaDatos: recupera todos los atributos de una tupla a partir de su clave
function RellenaDatos()
{

	$sql = "SELECT * 
			FROM PROFESOR
			WHERE (DNI = '$this->dni')";

	$toRet = $this->mysqli->query($sql);
	return $toRet ? $toRet->fetch_array() : 'Error de gestor de base de datos';
    
}

function getTitulaciones(){

	$sql = "SELECT * 
			FROM PROF_TITULACION
			WHERE (DNI = '$this->dni')";

	$toRet = $this->mysqli->query($sql);
	return $toRet;
}

function getEspacios(){

	$sql = "SELECT * 
			FROM PROF_ESPACIO
			WHERE (DNI = '$this->dni')";

	$toRet = $this->mysqli->query($sql);
	return $toRet;
}

// funcion Edit: realizar el update de una tupla 
function EDIT()
{
	$sql =  "SELECT *
			FROM PROFESOR
			WHERE DNI = '$this->dni'";

	$response = $this->mysqli->query($sql)->num_rows;
	if ($response == 1) {


		$sql = "UPDATE PROFESOR
			SET NOMBREPROFESOR = '$this->nombre',
				APELLIDOSPROFESOR = '$this->apellido',
				AREAPROFESOR = '$this->area',
				DEPARTAMENTOPROFESOR = '$this->departamento'

			WHERE ( DNI = '".$this->dni."')";

		$result = $this->mysqli->query($sql);

		if($result = 1) return 'Actualización realizada con éxito';
	}
	return 'Error de gestor de base de datos';

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
	else return 'Inserción fallida: el elemento ya existe'; 
    
}



//Metodo Register
//Busca algun usuario con las mismas claves primarias, 
//si lo encuentra devuelve una cadena sino true
function Register(){

		$sql = "SELECT * 
			FROM PROFESOR 
			WHERE DNI = '$this->dni'";

		$result = $this->mysqli->query($sql);
		if ($result->num_rows == 1){  // existe el usuario
				return 'Inserción fallida: el elemento ya existe';
		}
		else{
	    		return true; //no existe el usuario
		}

	}

function registrar(){

			
		$sql = "INSERT INTO PROFESOR (
			DNI,
			NOMBREPROFESOR,
			APELLIDOSPROFESOR,
			AREAPROFESOR,
			DEPARTAMENTOPROFESOR) 
				VALUES (
					'$this->dni',
					'$this->nombre',
					'$this->apellido',
					'$this->area',
					'$this->departamento')
					";
		if (!$this->mysqli->query($sql)) {
			return 'Error de gestor de base de datos';
		}
		else{
			return 'Inserción realizada con exito'; //operacion de insertado correcta
		}		
	}

}//fin de clase

?> 