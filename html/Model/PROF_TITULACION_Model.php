
<?php

//Clase : PROF_TITULACION_Modelo
//Creado el : 4-10-2019
//Creado por: grvidal
//Modelo de usuarios para realizar las acciones sobre la base de datos
//-------------------------------------------------------

class PROF_TITULACION_Model {

	var $DNI;
	var $codTitulacion;
	var $anhoAcademico;

	var $mysqli;

//Constructor de la clase
//

function __construct($DNI,$codTitulacion,$anhoAcademico){
	$this->DNI = $DNI;
	$this->codTitulacion = $codTitulacion;
	$this->anhoAcademico = $anhoAcademico;

	include_once '../Model/Access_DB.php';
	$this->mysqli = ConnectDB();
}

//comprueba que el dni tenga formato correcto y la letra este bien
function comprobar_dni()
{
	$array = array();
	$array[0] = "dni";
	$letras =  array('T', 'R', 'W', 'A', 'G', 'M', 'Y', 'F', 'P', 'D', 'X', 'B', 'N', 'J', 'Z', 'S', 'Q', 'V', 'H', 'L', 'C', 'K', 'E', 'T');
    

	$this->DNI = trim($this->DNI);

	if(empty($this->DNI)){//comprobamos si esta vacio
		$array[1] = "00001";
		$array[2] = "paramVacio";

		return $array;

	}else if( !preg_match('/^\d{8}[A-Z]$/', $this->DNI) ){//comprobamos si coincide con la expresion esperada
		$array[1] = "00010";
		$array[2] = "dniError";

		return $array;
	}else if (substr($this->DNI, -1) != $letras[substr($this->DNI, 0,-1) % 23] ){
		$array[1] = "00010";
		$array[2] = "dniError";

		return $array;
	}

	return true;
}

//comprueba que sean solo letras y numeros
function comprobar_titulacion()
{
	$array = array();
	$array[0] = 'codeTitulation';

	$this->codTitulacion = trim($this->codTitulacion);

	if(empty($this->codTitulacion)){//comprobamos si esta vacio
		$array[1] = "00001";
		$array[2] = "paramVacio";

		return $array;

	}else if(strlen($this->codTitulacion) > 10){//comprobamos si es muy larga
		$array[1] = "00002";
		$array[2] = "toolong";

		return $array;

	}else if(strlen($this->codTitulacion) < 3){//comprobamos si es muy corta
		$array[1] = "00003";
		$array[2] = "tooshortNoNNum";

		return $array;

	}else if( !preg_match('/^[a-z0-9]*$/i', $this->codTitulacion) ){//comprobamos si coincide con la expresion esperada
		$array[1] = "00060";
		$array[2] = "alfNum";

		return $array;
	}

	return true;
}

//comprueba que sean solo letras y numeros
function comprobar_anhoAcademico()
{
	$array = array();
	$array[0] = 'ANHOACADEMICO';

	$this->anhoAcademico = trim($this->anhoAcademico);

	if(empty($this->anhoAcademico)){//comprobamos si esta vacio
		$array[1] = "00001";
		$array[2] = "paramVacio";

		return $array;

	}else if( !preg_match('/^[0-9]{4}-[0-9]{4}$/i', $this->anhoAcademico) ){//comprobamos si coincide con la expresion esperada
		$array[1] = "00110";
		$array[2] = "anhoAcadCode";

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
    		FROM PROF_TITULACION
    		WHERE ( ";

    $or = false;

    if($this->DNI != ''){ //si existe dni se añade a la querry, y se actualiza $or
	   	$sql = $sql . "DNI LIKE '%" .$this->DNI. "%'";
	   	$or = true;
	}
	if ( $this->codTitulacion != '' ){// si existe codTitulacion 
		if ($or) $sql = $sql . ' AND '; //si $or es true, hay una cadena anterior por lo que se añade AND
	   	else $or = true;	//como codTitulacion no es vacio la siguiente peticion tendra que llevar AND
	   	$sql = $sql . "CODTITULACION LIKE '%" .$this->codTitulacion. "%'";
	}   
	if ( $this->anhoAcademico != '' ){
	  	if ($or) $sql = $sql .  ' AND ';
	   	else $or = true;
	   	$sql = $sql . "ANHOACADEMICO LIKE '%" .$this->anhoAcademico. "%'";
	} 
	   
    if (!$or) $sql = $sql . '1';

    $sql = $sql . " )";
    $toRet = $this->mysqli->query($sql);
    return $toRet ? $toRet : 'Error de gestor de base de datos';
}

// se recojen todas las tuplas de la base de datos y se pasan como array
function SHOW_ALL(){
	$sql = "SELECT * 
			FROM PROF_TITULACION";
	return $this->mysqli->query($sql);
}

//comprueba los atributos que utilizara add
function comprobar_atributos_DELETE(){
	$array = array();
	$correcto = true;

	$aux = $this->comprobar_dni();
	if ($aux !== true) {
		$array[0] = $aux;
		$correcto = false;
	}

	$aux = $this->comprobar_titulacion();
	if ($aux !== true) {
		$array[1] = $aux;
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

	$sql = "SELECT *
			FROM PROF_TITULACION
			WHERE ( DNI = '$this->DNI' AND
					CODTITULACION = '$this->codTitulacion'
		)";

	$obj = $this->mysqli->query($sql);

	if( mysqli_num_rows($obj) == 1 ){

		$sql = "DELETE 
   			FROM PROF_TITULACION
   			WHERE ( DNI = '$this->DNI' AND
					CODTITULACION = '$this->codTitulacion')";

   		return $this->mysqli->query($sql) ? 'Borrado realizado con éxito' : 'errorDelete';
	}else return 'Error de gestor de base de datos';
    
}

//comprueba los atributos que utilizara add
function comprobar_atributos_RellenaDatos(){
	$array = array();
	$correcto = true;

	$aux = $this->comprobar_dni();
	if ($aux !== true) {
		$array[0] = $aux;
		$correcto = false;
	}

	$aux = $this->comprobar_titulacion();
	if ($aux !== true) {
		$array[1] = $aux;
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
			FROM PROF_TITULACION
			WHERE ( DNI = '$this->DNI' &&
					CODTITULACION = '$this->codTitulacion'
		)";

	$toRet = $this->mysqli->query($sql);
	return $toRet ? $toRet->fetch_array() : 'Error de gestor de base de datos';
    
}


//comprueba los atributos que utilizara add
function comprobar_atributos_EDIT(){
	$array = array();
	$correcto = true;

	$aux = $this->comprobar_dni();
	if ($aux !== true) {
		$array[0] = $aux;
		$correcto = false;
	}

	$aux = $this->comprobar_titulacion();
	if ($aux !== true) {
		$array[1] = $aux;
		$correcto = false;
	}

	$aux = $this->comprobar_anhoAcademico();
	if ($aux !== true) {
		$array[1] = $aux;
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

	$sql = "SELECT * 
				FROM PROF_TITULACION
				WHERE (CODTITULACION = '$this->codTitulacion' AND DNI = '$this->DNI'
					)";

//se comprueba que el dni o el codigo de la titulacion no estan repetidos en otro PROF_TITULACION
	$response = $this->mysqli->query($sql)->num_rows;
	if ($response == 1) {
		
		$sql = "UPDATE PROF_TITULACION
			SET ANHOACADEMICO = '$this->anhoAcademico'
			WHERE (CODTITULACION = '$this->codTitulacion' AND DNI = '$this->DNI'
					)";

		$result = $this->mysqli->query($sql);

		if($result = 1) return 'Actualización realizada con éxito';
	}
	return 'Error de gestor de base de datos';
    

}

//Metodo getProfesores
//obtiene los dnis de los profesores 
function getProfesores(){

	$sql = "SELECT *
			FROM PROFESOR
			WHERE 1";
	return $this->mysqli->query($sql);
}

//Metodo getTitulaciones
//obtiene los codigos de los Titulaciones
function getTitulaciones(){

	$sql = "SELECT *
			FROM TITULACION
			WHERE 1";
	return $this->mysqli->query($sql);
}

//comprueba los atributos que utilizara add
function comprobar_atributos_ADD(){
	$array = array();
	$correcto = true;

	$aux = $this->comprobar_dni();
	if ($aux !== true) {
		$array[0] = $aux;
		$correcto = false;
	}

	$aux = $this->comprobar_titulacion();
	if ($aux !== true) {
		$array[1] = $aux;
		$correcto = false;
	}

	$aux = $this->comprobar_anhoAcademico();
	if ($aux !== true) {
		$array[1] = $aux;
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
	else return 'Inserción fallida: el elemento ya existe'; 
    
}



//Metodo Register
//Busca algun usuario con las mismas claves primarias, 
//si lo encuentra devuelve una cadena sino true
function Register(){

		$sql = "SELECT * 
				FROM PROF_TITULACION 
				where (CODTITULACION = '$this->codTitulacion' AND DNI = '$this->DNI'
					)";


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
				FROM PROFESOR
				WHERE DNI = '$this->DNI' ";

		$obj = $this->mysqli->query($sql);

		$sql = "SELECT *
				FROM TITULACION
				WHERE CODTITULACION = '$this->codTitulacion' ";

		$obj2 = $this->mysqli->query($sql);

		if (mysqli_num_rows($obj) == 1 && mysqli_num_rows($obj2) == 1) {
			$sql = "INSERT INTO PROF_TITULACION (
					DNI,
					CODTITULACION,
					ANHOACADEMICO) 
				VALUES (
					'$this->DNI',
					'$this->codTitulacion',
					'$this->anhoAcademico')";
					

			if ($this->mysqli->query($sql)) 
				return 'Inserción realizada con éxito'; //operacion de insertado correcta
			
		} 
			return 'Error de gestor de base de datos';		
	}

}//fin de clase

?> 