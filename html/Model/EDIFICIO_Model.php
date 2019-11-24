<?php

//Clase : EDIFICIO_Modelo
//Creado el : 2-10-2019
//Creado por: grvidal
//Modelo de usuarios para realizar las acciones sobre la base de datos
//-------------------------------------------------------

class EDIFICIO_Model {

	var $codigo;
	var $nombre;
	var $direccion;
	var $campus;

	var $mysqli;

//Constructor de la clase
//Se inicializan las columnas de la tupla
function __construct($codigo,$nombre,$direccion,$campus){
	$this->codigo = $codigo;
	$this->nombre = $nombre;
	$this->direccion = $direccion;
	$this->campus = $campus;

	include_once '../Model/Access_DB.php';
	$this->mysqli = ConnectDB();
}


//comprueba que sean solo letras y espacios
function comprobar_campus()
{
	$array = array();
	$array[0] = 'CampusEdifio';

	$this->campus = trim($this->campus);

	if(empty($this->campus)){//comprobamos si esta vacio
		$array[1] = "00001";
		$array[2] = "paramVacio";

		return $array;

	}else if(strlen($this->campus) > 10){//comprobamos si es muy larga
		$array[1] = "00002";
		$array[2] = "toolong";

		return $array;

	}else if(strlen($this->campus) < 3){//comprobamos si es muy corta
		$array[1] = "00003";
		$array[2] = "tooshortNoNNum";

		return $array;

	}else if( !preg_match('/^[a-z ]*$/i', $this->campus) ){//comprobamos si coincide con la expresion esperada
		$array[1] = "00030";
		$array[2] = "textonly";

		return $array;
	}

	return true;
}


//comprueba que sean solo letras y espacios
function comprobar_direccion()
{
	$array = array();
	$array[0] = 'DirEdificio';

	$this->direccion = trim($this->direccion);

	if(empty($this->direccion)){//comprobamos si esta vacio
		$array[1] = "00001";
		$array[2] = "paramVacio";

		return $array;

	}else if(strlen($this->direccion) > 150){//comprobamos si es muy larga
		$array[1] = "00002";
		$array[2] = "toolong";

		return $array;

	}else if(strlen($this->direccion) < 3){//comprobamos si es muy corta
		$array[1] = "00003";
		$array[2] = "tooshortNoNNum";

		return $array;

	}else if( !preg_match('/^[a-zñ0-9-\/ºª ]*$/i', $this->direccion) ){//comprobamos si coincide con la expresion esperada
		$array[1] = "00050";
		$array[2] = "dirError";

		return $array;
	}

	return true;
}

//comprueba que sean solo letras y espacios
function comprobar_nombre()
{
	$array = array();
	$array[0] = 'NomEdificio';

	$this->nombre = trim($this->nombre);

	if(empty($this->nombre)){//comprobamos si esta vacio
		$array[1] = "00001";
		$array[2] = "paramVacio";

		return $array;

	}else if(strlen($this->nombre) > 50){//comprobamos si es muy larga
		$array[1] = "00002";
		$array[2] = "toolong";

		return $array;

	}else if(strlen($this->nombre) < 3){//comprobamos si es muy corta
		$array[1] = "00003";
		$array[2] = "tooshortNoNNum";

		return $array;

	}else if( !preg_match('/^[a-z ]*$/i', $this->nombre) ){//comprobamos si coincide con la expresion esperada
		$array[1] = "00030";
		$array[2] = "textonly";

		return $array;
	}

	return true;
}

//comprueba que sean solo letras y numeros
function comprobar_edificio()
{
	$array = array();
	$array[0] = 'CodEdificio';

	$this->codigo = trim($this->codigo);

	if(empty($this->codigo)){//comprobamos si esta vacio
		$array[1] = "00001";
		$array[2] = "paramVacio";

		return $array;

	}else if(strlen($this->codigo) > 10){//comprobamos si es muy larga
		$array[1] = "00002";
		$array[2] = "toolong";

		return $array;

	}else if(strlen($this->codigo) < 3){//comprobamos si es muy corta
		$array[1] = "00003";
		$array[2] = "tooshortNoNNum";

		return $array;

	}else if( !preg_match('/^[a-z0-9-]*$/i', $this->codigo) ){//comprobamos si coincide con la expresion esperada
		$array[1] = "00040";
		$array[2] = "alfNumguion";

		return $array;
	}

	return true;
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
    		FROM EDIFICIO
    		WHERE ( ";

    $or = false;

    	if($this->codigo != ''){// se mira si la variable codigo vino vacia
	    	$sql = $sql . "CODEDIFICIO LIKE '%" .$this->codigo. "%'";	//si hay algo se escribe la cadena sql
	    	$or = true; //el disparador se activa
	    } 

	    if ( $this->nombre != '' ){
	    	if ($or) $sql = $sql . ' AND '; //si el disparador se activa se añade la cadena AND a la secuencia sql
	    	else $or = true;
	    	$sql = $sql . "NOMBREEDIFICIO LIKE '%" .$this->nombre. "%'";
	    	
	    }   

	   if ( $this->direccion != '' ){
	   		if ($or) $sql = $sql . ' AND ';
	    	else $or = true;

	    	$sql = $sql . "DIRECCIONEDIFICIO LIKE '%" .$this->direccion. "%'";
	    } 
	    if ( $this->campus != '' ){
	    	if ($or) $sql = $sql . ' AND ';
	    	else $or = true;

	    	$sql = $sql . "CAMPUSEDIFICIO LIKE '%" .$this->campus. "%'";
	    } 

	    if (!$or) $sql = $sql . '1';

    

    $sql = $sql . " )";

    $toRet =  $this->mysqli->query($sql);
    return ($toRet) ? $toRet : 'Error de gestor de base de datos';
}

// se recojen todas las tuplas de la base de datos y se pasan como array
function SHOW_ALL(){
	$sql = "SELECT * 
			FROM EDIFICIO";
	return $this->mysqli->query($sql);
}

//comprueba los atributos que utilizara add
function comprobar_atributos_DELETE(){
	$array = array();
	$correcto = true;

	$aux = $this->comprobar_edificio();
	if ($aux !== true) {
		$array[0] = $aux;
		$correcto = false;
	}

	return $correcto == true ? true : $array; 
}

//funcion DELETE : comprueba que la tupla a borrar existe y una vez
// verificado la borra
function DELETE()
{
	$check = $this->comprobar_atributos_DELETE();
	//si algun atributo no cumple las restricciones
	if ($check !== true) return $check;
//Busco si edificio existe con todas las caracteristicas
	$sql = "SELECT *
			FROM EDIFICIO
			WHERE (CODEDIFICIO = '$this->codigo')";

	$obj = $this->mysqli->query($sql);

	if( mysqli_num_rows($obj) == 1 ){
//Busco si hay algun centro que este en este edificio
		$sql = "SELECT *
			FROM CENTRO
			WHERE (CODEDIFICIO = '$this->codigo' )";
		$obj = $this->mysqli->query($sql);

//Busco si hay alguna sala en este edificio
		$sql = "SELECT *
			FROM ESPACIO
			WHERE (CODEDIFICIO = '$this->codigo' )";

		$obj2 = $this->mysqli->query($sql);
//compruebo que no hay coincidencias
		if( mysqli_num_rows($obj) == 0 && mysqli_num_rows($obj2) == 0){

			$sql = "DELETE 
	   			FROM EDIFICIO
	   			WHERE (CODEDIFICIO = '$this->codigo')";

	   		return $this->mysqli->query($sql) ? 'Borrado realizado con éxito' : 'errorDelete';
   		}
	}
	return 'Error de gestor de base de datos';
    
}

//comprueba los atributos que utilizara add
function comprobar_atributos_RellenaDatos(){
	$array = array();
	$correcto = true;

	$aux = $this->comprobar_edificio();
	if ($aux !== true) {
		$array[0] = $aux;
		$correcto = false;
	}

	return $correcto == true ? true : $array; 
}

// funcion RellenaDatos: recupera todos los atributos de una tupla a partir de su clave
function RellenaDatos()
{
	$check = $this->comprobar_atributos_RellenaDatos();
	//si algun atributo no cumple las restricciones
	if ($check !== true) return $check;

	$sql = "SELECT * 
			FROM EDIFICIO
			WHERE (CODEDIFICIO = '$this->codigo')";

	$toRet = $this->mysqli->query($sql);
	return $toRet ? $toRet->fetch_array() : 'Error de gestor de base de datos';
    
}

function getCentros(){
	$sql = "SELECT * 
			FROM CENTRO
			WHERE (CODEDIFICIO = '$this->codigo')";

	$toRet = $this->mysqli->query($sql); 
	return $toRet;
}

function getEspacios(){
	$sql = "SELECT * 
			FROM ESPACIO
			WHERE (CODEDIFICIO = '$this->codigo')";

	$toRet = $this->mysqli->query($sql);
	return $toRet;
}


//comprueba los atributos que utilizara add
function comprobar_atributos_EDIT(){
	$array = array();
	$correcto = true;

	$aux = $this->comprobar_edificio();
	if ($aux !== true) {
		$array[0] = $aux;
		$correcto = false;
	}

	$aux = $this->comprobar_nombre();
	if ($aux !== true) {
		$array[0] = $aux;
		$correcto = false;
	}

	$aux = $this->comprobar_direccion();
	if ($aux !== true) {
		$array[0] = $aux;
		$correcto = false;
	}

	$aux = $this->comprobar_campus();
	if ($aux !== true) {
		$array[0] = $aux;
		$correcto = false;
	}

	return $correcto == true ? true : $array; 
}

// funcion Edit: realizar el update de una tupla 
function EDIT()
{

	$check = $this->comprobar_atributos_EDIT();
	//si algun atributo no cumple las restricciones
	if ($check !== true) return $check;

	$sql = "SELECT *
			FROM EDIFICIO
			WHERE (CODEDIFICIO = '$this->codigo') ";

	//se comprueba que el edificio existe
	$response = $this->mysqli->query($sql);
	if ($response->num_rows == 1) {
		$sql = "UPDATE EDIFICIO
			SET NOMBREEDIFICIO = '$this->nombre',
				DIRECCIONEDIFICIO = '$this->direccion',
				CAMPUSEDIFICIO = '$this->campus'

			WHERE ( CODEDIFICIO = '$this->codigo')";

		$result = $this->mysqli->query($sql);

		if($result = 1) return 'Actualización realizada con éxito';
	}
	return 'Error de gestor de base de datos';
}

//comprueba los atributos que utilizara add
function comprobar_atributos_ADD(){
	$array = array();
	$correcto = true;

	$aux = $this->comprobar_edificio();
	if ($aux !== true) {
		$array[0] = $aux;
		$correcto = false;
	}

	$aux = $this->comprobar_nombre();
	if ($aux !== true) {
		$array[0] = $aux;
		$correcto = false;
	}

	$aux = $this->comprobar_direccion();
	if ($aux !== true) {
		$array[0] = $aux;
		$correcto = false;
	}

	$aux = $this->comprobar_campus();
	if ($aux !== true) {
		$array[0] = $aux;
		$correcto = false;
	}

	return $correcto == true ? true : $array; 
}

//Metodo ADD
//Inserta en la tabla  de la bd  los valores
// de los atributos del objeto. Comprueba si la clave/s esta vacia y si 
//existe ya en la tabla
function ADD(){

	$check = $this->comprobar_atributos_ADD();
	//si algun atributo no cumple las restricciones
	if ($check !== true) return $check;

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
		from EDIFICIO 
		where CODEDIFICIO = '$this->codigo'";

		$result = $this->mysqli->query($sql);
		if ($result->num_rows == 1){  // existe el usuario
				return 'Inserción fallida: el elemento ya existe';
		}
		else{
	    		return true; //no existe el usuario
		}

	}

function registrar(){

			
		$sql = "INSERT INTO EDIFICIO (
					CODEDIFICIO,
					NOMBREEDIFICIO,
					DIRECCIONEDIFICIO,
					CAMPUSEDIFICIO) 
				VALUES (
					'$this->codigo',
					'$this->nombre',
					'$this->direccion',
					'$this->campus')
					";
		if (!$this->mysqli->query($sql)) {
			return 'Error de gestor de base de datos';
		}
		else{
			return 'Inserción realizada con éxito'; //operacion de insertado correcta
		}		
	}

}//fin de clase

?> 