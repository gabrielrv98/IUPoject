
<?php

//Clase : PROF_ESPACIO_Modelo
//Creado el : 4-10-2019
//Creado por: grvidal
//Modelo de usuarios para realizar las acciones sobre la base de datos
//-------------------------------------------------------

class PROF_ESPACIO_Model {

	var $DNI;
	var $codEspacio;

	var $mysqli;

//Constructor de la clase
//

function __construct($DNI,$codEspacio){
	$this->DNI = $DNI;
	$this->codEspacio = $codEspacio;

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
    		FROM PROF_ESPACIO
    		WHERE ( ";

    $or = false;

    	if($this->DNI != ''){
	    	$sql = $sql . "DNI LIKE '%" .$this->DNI. "%'";
	    	$or = true;
	    } 

	    if ( $this->codEspacio != '' ){
	    	if ($or) $sql = $sql . ' AND ';
	    	else $or = true;
	    	$sql = $sql . "CODESPACIO LIKE '%" .$this->codEspacio. "%'";
	    	
	    }   
	    

	    if (!$or) $sql = $sql . '1';

    

    $sql = $sql . " )";
    $toRet = $this->mysqli->query($sql);
    return $toRet ? $toRet : 'Error de gestor de base de datos';
}

// se recojen todas las tuplas de la base de datos y se pasan como array
function SHOW_ALL(){
	$sql = "SELECT * 
			FROM PROF_ESPACIO";
	return $this->mysqli->query($sql);
}
//funcion DELETE : comprueba que la tupla a borrar existe y una vez
// verificado la borra
function DELETE()
{
	$sql = "SELECT *
			FROM PROF_ESPACIO
			WHERE ( DNI = '$this->DNI' &&
					CODESPACIO = '$this->codEspacio'
		)";

	$obj = $this->mysqli->query($sql);

	if( mysqli_num_rows($obj) == 1 ){

		$sql = "DELETE 
   			FROM PROF_ESPACIO
   			WHERE ( DNI = '$this->DNI' &&
					CODESPACIO = '$this->codEspacio')";

   		return $this->mysqli->query($sql) ? 'Borrado realizado con éxito' : 'errorDelete';
	}else return 'Error de gestor de base de datos';
    
}

// funcion RellenaDatos: recupera todos los atributos de una tupla a partir de su clave
function RellenaDatos()
{

	$sql = "SELECT * 
			FROM PROF_ESPACIO
			WHERE ( DNI = '$this->DNI' &&
					CODESPACIO = '$this->codEspacio'
		)";

	$toRet = $this->mysqli->query($sql);
	return $toRet ? $toRet->fetch_array() : 'Error de gestor de base de datos';
    
}

// funcion Edit: realizar el update de una tupla despues de comprobar que existe
function EDIT()
{

	$sql = "SELECT * 
				FROM PROF_ESPACIO
				WHERE (CODESPACIO = '$this->codEspacio' AND DNI = '$this->DNI'
					)";

//se comprueba que el dni o el codigo de la ESPACIO no estan repetidos en otro PROF_ESPACIO
	$response = $this->mysqli->query($sql)->num_rows;
	if ($response == 1) {
		
		//esta clase no tiene datos que no sean claves foraneas
		return 'Actualización realizada con éxito';
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

//Metodo getEspacios
//obtiene los codigos de los Espacio
function getEspacios(){

	$sql = "SELECT *
			FROM ESPACIO
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
	else return 'Inserción fallida: el elemento ya existe'; 
    
}



//Metodo Register
//Busca algun usuario con las mismas claves primarias, 
//si lo encuentra devuelve una cadena sino true
function Register(){

		$sql = "SELECT * 
				FROM PROF_ESPACIO 
				where (CODESPACIO = '$this->codEspacio' AND DNI = '$this->DNI'
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
				FROM ESPACIO
				WHERE CODESPACIO = '$this->codEspacio' ";

		$obj2 = $this->mysqli->query($sql);

		if (mysqli_num_rows($obj) == 1 && mysqli_num_rows($obj2) == 1) {
			$sql = "INSERT INTO PROF_ESPACIO (
				DNI,
				CODESPACIO
				) 
				VALUES (
					'$this->DNI',
					'$this->codEspacio')";
					

			if ($this->mysqli->query($sql)) 
				return 'Inserción realizada con exito'; //operacion de insertado correcta
			
		} 
			return 'Error de gestor de base de datos';		
	}


}//fin de clase

?> 