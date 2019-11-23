<?php

//Clase : USUARIOS_Modelo
//Creado el : 2-10-2019
//Creado por: grvidal
//Modelo de usuarios para realizar las acciones sobre la base de datos
//-------------------------------------------------------

class ESPACIO_Model {

	var $espacio;
	var $edificio;
	var $centro;
	var $tipo;
	var $superficie;
	var $nInventario;
	var $mysqli;

//Constructor de la clase
//Se inicializan las columnas de la tupla
function __construct($espacio,$edificio,$centro,$tipo,$superficie,$nInventario){
	$this->espacio = $espacio;
	$this->edificio = $edificio;
	$this->centro = $centro;
	$this->tipo = $tipo;
	$this->superficie = $superficie;
	$this->nInventario = $nInventario;

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
    		FROM ESPACIO
    		WHERE ( ";

    $or = false;

    	if($this->espacio != ''){// se mira si la variable espacio vino vacia
	    	$sql = $sql . "CODESPACIO LIKE '%" .$this->espacio. "%'";	//si hay algo se escribe la cadena sql
	    	$or = true; //el disparador se activa
	    } 

	    if ( $this->edificio != '' ){
	    	if ($or) $sql = $sql . ' AND '; //si el disparador se activa se añade la cadena OR a la secuencia sql
	    	else $or = true;
	    	$sql = $sql . "CODEDIFICIO LIKE '%" .$this->edificio. "%'";
	    	
	    }   

	   if ( $this->centro != '' ){
	   		if ($or) $sql = $sql . ' AND ';
	    	else $or = true;

	    	$sql = $sql . "CODCENTRO LIKE '%" .$this->centro. "%'";
	    } 
	    if ( $this->tipo != '' ){
	    	if ($or) $sql = $sql . ' AND ';
	    	else $or = true;

	    	$sql = $sql . "TIPO LIKE '%" .$this->tipo. "%'";
	    } 
	    if ( $this->superficie != '' ){
	    	if ($or) $sql = $sql . ' AND ';
	    	else $or = true;

	    	$sql = $sql . "SUPERFICIEESPACIO LIKE '%" .$this->superficie. "%'";
	    } 

	    if ( $this->nInventario != '' ){
	    	if ($or) $sql = $sql . ' AND ';
	    	else $or = true;

	    	$sql = $sql . "NUMINVENTARIOESPACIO LIKE '%" .$this->nInventario. "%'";
	    } 

	    if (!$or) $sql = $sql . '1';

    

    $sql = $sql . " )";


    $toRet =  $this->mysqli->query($sql);
    return ($toRet) ? $toRet : 'Error de gestor de base de datos';
}

// se recojen todas las tuplas de la base de datos y se pasan como array
function SHOW_ALL(){
	$sql = "SELECT * 
			FROM ESPACIO";
	return $this->mysqli->query($sql);
}
//funcion DELETE : comprueba que la tupla a borrar existe y una vez
// verificado la borra
function DELETE()
{

	//Compruebo que la tupla a eliminar existe
	$sql = "SELECT *
			FROM ESPACIO
			WHERE (CODESPACIO = '$this->espacio' &&
					CODEDIFICIO = '$this->edificio' &&
					CODCENTRO = '$this->centro' &&
					TIPO = '$this->tipo' &&
					SUPERFICIEESPACIO = '$this->superficie' &&
					NUMINVENTARIOESPACIO = '$this->nInventario' )";

	$obj = $this->mysqli->query($sql);

	if( mysqli_num_rows($obj) == 1 ){

		//Compruebo que no existe ningun espacio siendo usado por un profesor
		$sql = "SELECT *
				FROM PROF_ESPACIO
				WHERE CODESPACIO = '$this->espacio'";
		$obj = $this->mysqli->query($sql);

		if(mysqli_num_rows($obj)  == 0){

			$sql = "DELETE 
	   			FROM ESPACIO
	   			WHERE (CODESPACIO = '$this->espacio')";

	   		return $this->mysqli->query($sql) ? 'Borrado realizado con éxito' : 'errorDelete';
		}
	}
	return 'Error de gestor de base de datos';
    
}

function getProfesores(){
	$sql = "SELECT * 
			FROM PROF_ESPACIO
			WHERE (CODESPACIO = '$this->espacio')";

	return $this->mysqli->query($sql); 
}
 
// funcion RellenaDatos: recupera todos los atributos de una tupla a partir de su clave
function RellenaDatos()
{

	$sql = "SELECT * 
			FROM ESPACIO
			WHERE (CODESPACIO = '$this->espacio')";

	$toRet = $this->mysqli->query($sql);
	return $toRet ? $toRet->fetch_array() : 'Error de gestor de base de datos';
    
}

// funcion Edit: realizar el update de una tupla si centro existe o si va vacio
function EDIT()
{

		if ($this->centro != '') {
				$sql = "SELECT *
				FROM CENTRO
				WHERE CODCENTRO = '$this->centro'";

				$obj = $this->mysqli->query($sql);

				if (mysqli_num_rows($obj) == 0) {
					return 'Error de gestor de base de datos';
				}
		}

		$sql = "UPDATE ESPACIO
			SET TIPO = '$this->tipo',
				SUPERFICIEESPACIO = '$this->superficie',
				NUMINVENTARIOESPACIO = '$this->nInventario',
				CODCENTRO = '$this->centro'

			WHERE ( CODESPACIO = '$this->espacio' AND 
					CODEDIFICIO = '$this->edificio')";

		$result = $this->mysqli->query($sql);

		if($result = 1) return 'Actualización realizada con éxito';
		else return 'Error de gestor de base de datos';
	

}


//funcion para obtener una lista con los nombres y los codigos de los edificios
function getEdificios(){
	$sql = "SELECT NOMBREEDIFICIO, 
					CODEDIFICIO
			FROM EDIFICIO
			WHERE 1";
	return $this->mysqli->query($sql);
}

//funcion para obtener una lista con los nombres y los codigos de los edificios
function getCentros(){
	$sql = "SELECT NOMBRECENTRO, 
					CODCENTRO
			FROM CENTRO
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
		from ESPACIO 
		where CODESPACIO = '$this->espacio'";

		$result = $this->mysqli->query($sql);
		if ($result->num_rows == 1){  // existe el usuario
				return 'Inserción fallida: el elemento ya existe';
		}
		else{
	    		return true; //no existe el usuario
		}

	}

//ccomprueba la integridad y luego llama a upload
function registrar(){

		$sql = "SELECT *
				FROM EDIFICIO
				WHERE CODEDIFICIO = '$this->edificio'";

		$obj = $this->mysqli->query($sql);

		if (mysqli_num_rows($obj) == 1) {

			if ($this->centro != '') {
				$sql = "SELECT *
				FROM CENTRO
				WHERE CODCENTRO = '$this->centro'";

				$obj = $this->mysqli->query($sql);

				if (mysqli_num_rows($obj) == 1) {
					return $this->upload();
				}
			}else return $this->upload();
		}
		
		return 'Error de gestor de base de datos';
				
	}


	public function upload()
	{
		$sql = "INSERT INTO ESPACIO (
						CODESPACIO,
						CODEDIFICIO,
						CODCENTRO,
						TIPO,
						SUPERFICIEESPACIO,
						NUMINVENTARIOESPACIO) 
					VALUES (
						'$this->espacio',
						'$this->edificio',
						'$this->centro',
						'$this->tipo',					
						'$this->superficie',
						'$this->nInventario')
						";
			if ($this->mysqli->query($sql)) {
				return 'Inserción realizada con exito'; //operacion de insertado correcta
			}else return 'Error de gestor de base de datos';
	}

}//fin de clase

?> 