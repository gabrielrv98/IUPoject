<?php

//Clase : TITULACION_Modelo
//Creado el : 02-10-2019
//Creado por: grvidal
//-------------------------------------------------------

class TITULACION_Model {

	var $titulacion;
	var $centro;
	var $nombre;
	var $responsable;
	var $mysqli;

//Constructor de la clase
//Se inicializan las columnas de la tupla
function __construct($titulacion,$centro,$nombre,$responsable){
	$this->titulacion = $titulacion;
	$this->centro = $centro;
	$this->nombre = $nombre;
	$this->responsable = $responsable;

	include_once '../Model/Access_DB.php';
	$this->mysqli = ConnectDB();
}


//comprueba que sean solo letras y numeros
function comprobar_titulacion()
{
	$array = array();
	$array[0] = 'codeTitulation';

	$this->titulacion = trim($this->titulacion);

	if(empty($this->titulacion)){//comprobamos si esta vacio
		$array[1] = "00001";
		$array[2] = "paramVacio";

		return $array;

	}else if(strlen($this->titulacion) > 10){//comprobamos si es muy larga
		$array[1] = "00002";
		$array[2] = "toolong";

		return $array;

	}else if(strlen($this->titulacion) < 3){//comprobamos si es muy corta
		$array[1] = "00003";
		$array[2] = "tooshortNoNNum";

		return $array;

	}else if( !preg_match('/^[a-z0-9]*$/i', $this->titulacion) ){//comprobamos si coincide con la expresion esperada
		$array[1] = "00060";
		$array[2] = "alfNum";

		return $array;
	}

	return true;
}


//comprueba que sean solo letras y numeros
function comprobar_centro()
{
	$array = array();
	$array[0] = 'codeCenter';

	$this->centro = trim($this->centro);

	if(empty($this->centro)){//comprobamos si esta vacio
		$array[1] = "00001";
		$array[2] = "paramVacio";

		return $array;

	}else if(strlen($this->centro) > 10){//comprobamos si es muy larga
		$array[1] = "00002";
		$array[2] = "toolong";

		return $array;

	}else if(strlen($this->centro) < 3){//comprobamos si es muy corta
		$array[1] = "00003";
		$array[2] = "tooshortNoNNum";

		return $array;

	}else if( !preg_match('/^[a-z0-9-]*$/i', $this->centro) ){//comprobamos si coincide con la expresion esperada
		$array[1] = "00040";
		$array[2] = "alfNumguion";

		return $array;
	}

	return true;
}

//comprueba que sean solo letras y espacios
function comprobar_nombre()
{
	$array = array();
	$array[0] = 'nameTitulation';

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

//comprueba que sean solo letras y espacios
function comprobar_responsable()
{
	$array = array();
	$array[0] = 'responsableTitulation';

	$this->responsable = trim($this->responsable);

	if(empty($this->responsable)){//comprobamos si esta vacio
		$array[1] = "00001";
		$array[2] = "paramVacio";

		return $array;

	}else if(strlen($this->responsable) > 60){//comprobamos si es muy larga
		$array[1] = "00002";
		$array[2] = "toolong";

		return $array;

	}else if(strlen($this->responsable) < 3){//comprobamos si es muy corta
		$array[1] = "00003";
		$array[2] = "tooshortNoNNum";

		return $array;

	}else if( !preg_match('/^[a-z ]*$/i', $this->responsable) ){//comprobamos si coincide con la expresion esperada
		$array[1] = "00030";
		$array[2] = "textonly";

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
    		FROM TITULACION
    		WHERE ( ";

    $or = false;

    	if($this->titulacion != ''){
	    	$sql = $sql . "CODTITULACION LIKE '%" .$this->titulacion. "%'";
	    	$or = true;
	    } 

	    if ( $this->centro != '' ){
	    	if ($or) $sql = $sql . ' AND ';
	    	else $or = true;
	    	$sql = $sql . "CODCENTRO LIKE '%" .$this->centro. "%'";
	    	
	    }   

	   if ( $this->nombre != '' ){
	   		if ($or) $sql =$sql .  ' AND ';
	    	else $or = true;

	    	$sql = $sql . "NOMBRETITULACION LIKE '%" .$this->nombre. "%'";
	    } 
	    if ( $this->responsable != '' ){
	    	if ($or) $sql = $sql . ' AND ';
	    	else $or = true;

	    	$sql = $sql . "RESPONSABLETITULACION LIKE '%" .$this->responsable. "%'";
	    } 

	    if (!$or) $sql = $sql . '1';

    

    $sql = $sql . " )";
    $toRet = $this->mysqli->query($sql);
	return $toRet ? $toRet : 'Error de gestor de base de datos';
}


// se recojen todas las tuplas de la base de datos y se pasan como array
function SHOW_ALL(){
	$sql = "SELECT * 
			FROM TITULACION";
	return $this->mysqli->query($sql);
}

//comprueba los atributos que utilizara add
function comprobar_atributos_DELETE(){
	$array = array();
	$correcto = true;

	$aux = $this->comprobar_titulacion();
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
//Busco si titulacion existe con todas las caracteristicas
	$sql = "SELECT *
			FROM TITULACION
			WHERE (CODTITULACION = '$this->titulacion' AND
					CODCENTRO = '$this->centro' AND
				NOMBRETITULACION = '$this->nombre' AND
			RESPONSABLETITULACION = '$this->responsable')";

	$obj = $this->mysqli->query($sql);

	if( mysqli_num_rows($obj) == 1 ){

		$sql = "SELECT *
			FROM PROF_TITULACION
			WHERE (CODTITULACION = '$this->titulacion')";

		$obj = $this->mysqli->query($sql);

		if( mysqli_num_rows($obj) == 0 ){
			$sql = "DELETE 
   			FROM TITULACION
   			WHERE (CODTITULACION = '$this->titulacion')";

   			return $this->mysqli->query($sql) ? 'Borrado realizado con éxito' : 'errorDelete';
		}
		
	}
	return 'Error de gestor de base de datos';
	//return 'La titulacion no existe';
    
}

function getProfTit(){
	$sql = "SELECT * 
			FROM PROF_TITULACION
			WHERE (CODTITULACION = '$this->titulacion')";

	$toRet = $this->mysqli->query($sql);
	return $toRet;
}

//comprueba los atributos que utilizara Rellena datos
function comprobar_atributos_RellenaDatos(){
	$array = array();
	$correcto = true;

	$aux = $this->comprobar_titulacion();
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
			FROM TITULACION
			WHERE (CODTITULACION = '$this->titulacion')";

	$toRet = $this->mysqli->query($sql);
	return $toRet ? $toRet->fetch_array() : 'Error de gestor de base de datos';
}

//comprueba los atributos que utilizara edit
function comprobar_atributos_EDIT(){
	$array = array();
	$correcto = true;

	$aux = $this->comprobar_titulacion();
	if ($aux !== true) {
		$array[0] = $aux;
		$correcto = false;
	}

	$aux = $this->comprobar_centro();
	if ($aux !== true) {
		$array[1] = $aux;
		$correcto = false;
	}

	$aux = $this->comprobar_nombre();
	if ($aux !== true) {
		$array[2] = $aux;
		$correcto = false;
	}

	$aux = $this->comprobar_responsable();
	if ($aux !== true) {
		$array[3] = $aux;
		$correcto = false;
	}

	return $correcto == true ? true : $array; 
}

// funcion Edit: realizar el update de una tupla despues de comprobar que existe
function EDIT()
{

	$check = $this->comprobar_atributos_EDIT();

	//si algun atributo no cumple las restricciones
	if ($check !== true) return $check;

	$sql =  "SELECT *
			FROM TITULACION
			WHERE CODTITULACION = '$this->titulacion'";

	$response = $this->mysqli->query($sql)->num_rows;
	if ($response == 1) {

		$sql = "UPDATE TITULACION
			SET NOMBRETITULACION = '$this->nombre',
				RESPONSABLETITULACION = '$this->responsable'
			WHERE ( CODTITULACION = '$this->titulacion')";

		$result = $this->mysqli->query($sql);

		if($result = 1) return 'Actualización realizada con éxito';
	}
	return 'Error de gestor de base de datos';
}


function getCentros(){
	$sql = "SELECT CODCENTRO,
					NOMBRECENTRO
			FROM CENTRO
			WHERE (1)";
	return $this->mysqli->query($sql);
}

//comprueba los atributos que utilizara edit
function comprobar_atributos_ADD(){
	$array = array();
	$correcto = true;

	$aux = $this->comprobar_titulacion();
	if ($aux !== true) {
		$array[0] = $aux;
		$correcto = false;
	}

	$aux = $this->comprobar_centro();
	if ($aux !== true) {
		$array[1] = $aux;
		$correcto = false;
	}

	$aux = $this->comprobar_nombre();
	if ($aux !== true) {
		$array[2] = $aux;
		$correcto = false;
	}

	$aux = $this->comprobar_responsable();
	if ($aux !== true) {
		$array[3] = $aux;
		$correcto = false;
	}

	return $correcto == true ? true : $array; 
}

//Metodo ADD
//Inserta en la tabla  de la bd  los valores
// de los atributos del objeto. Comprueba si la clave/s esta vacia y si 
//existe ya en la tabla
function ADD(){


	$comprobarParam = $this->comprobar_atributos_ADD();
	//si algun atributo no cumple las restricciones
	if ($comprobarParam !== true) return $comprobarParam;
	
	
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
		from TITULACION 
		where CODTITULACION = '$this->titulacion'";

		$result = $this->mysqli->query($sql);
		if ($result->num_rows == 1){  // existe el usuario
				return 'Inserción fallida: el elemento ya existe';
		}
		else{
	    		return true; //no existe el usuario
		}

	}

function registrar(){

			
		$sql = "SELECT *
				FROM CENTRO
				WHERE CODCENTRO = '$this->centro'";

		$obj = $this->mysqli->query($sql);

		if (mysqli_num_rows($obj) == 1) {
			$sql = "INSERT INTO TITULACION (
				CODTITULACION,
				CODCENTRO,
				NOMBRETITULACION,
				RESPONSABLETITULACION) 
					VALUES (
						'$this->titulacion',
						'$this->centro',
						'$this->nombre',
						'$this->responsable')
						";
			if ($this->mysqli->query($sql)) 
				return 'Inserción realizada con éxito'; //operacion de insertado correcta
			
		} 
			return 'Error de gestor de base de datos'; 		
	}

}//fin de clase

?> 