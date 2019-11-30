<?php
//Clase : Global_test.php
//Creado el : 10-11-2019
//Creado por: grvidal
//Testing de las funcionalidades globales
//-------------------------------------------------------
include '../Model/config.php';
//error_reporting(E_PARSE);

function ExisteBD()
{

	global $ERRORS_array_test;

// creo array de almacen de test individual
	$global_array_test = array();

//Gestor no levantado
	//------------------------------------------
	$global_array_test['tipo'] = 'GLOBAL';
	$global_array_test['entidad'] = 'GENERAL';	
	$global_array_test['metodo'] = 'BD';
	$global_array_test['error'] = 'Usuario no existe';
	$global_array_test['error_esperado'] = "Access denied for user 'miUser'@'localhost' (using password: YES)";
	$global_array_test['error_obtenido'] = '';
	$global_array_test['resultado'] = '';

	$mysqli = new mysqli(host, "miUser", pass , BD);
    	
	/* Comprueba la conexión */
	if ($mysqli->connect_errno) {
    	 $global_array_test['error_obtenido'] = $mysqli->connect_error;
    }


   	if ($global_array_test['error_esperado'] === $global_array_test['error_obtenido'] )
	{
		$global_array_test['resultado'] = 'OK';
	}
	else
	{
		$global_array_test['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test, $global_array_test);

// usuario o contraseña no es correcto
//-------------------------------------------------------------------------------
	$global_array_test['tipo'] = 'GLOBAL';
	$global_array_test['entidad'] = 'GENERAL';	
	$global_array_test['metodo'] = 'BD';
	$global_array_test['error'] = 'Usuario contraseña erronea';
	$global_array_test['error_esperado'] = "Access denied for user 'iu2018'@'localhost' (using password: YES)";
	$global_array_test['error_obtenido'] = '';
	$global_array_test['resultado'] = '';

	$mysqli = new mysqli(host, user, 'aaaa' , BD);
    	
	/* Comprueba la conexión */
    $global_array_test['error_obtenido'] = $mysqli->connect_error;
    


   	if ($global_array_test['error_obtenido'] === $global_array_test['error_esperado'])
	{
		$global_array_test['resultado'] = 'OK';
	}
	else
	{
		$global_array_test['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test, $global_array_test);


//NO existe el host
	//------------------------------------------
	$global_array_test['tipo'] = 'GLOBAL';
	$global_array_test['entidad'] = 'GENERAL';	
	$global_array_test['metodo'] = 'BD';
	$global_array_test['error'] = 'La direccion no existe';
	$global_array_test['error_esperado'] = "php_network_getaddresses: getaddrinfo failed: Name or service not known";
	$global_array_test['error_obtenido'] = '';
	$global_array_test['resultado'] = '';

	$mysqli = new mysqli("miHost", user, pass , BD);
    	
	/* Comprueba la conexión */
	if ($mysqli->connect_errno) {
    	 $global_array_test['error_obtenido'] = $mysqli->connect_error;
    }


   	
   	if ($global_array_test['error_esperado'] === $global_array_test['error_obtenido'])
	{
		$global_array_test['resultado'] = 'OK';
	}
	else
	{
		$global_array_test['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test, $global_array_test);

	//NO existe la BD
	//------------------------------------------
	$global_array_test['tipo'] = 'GLOBAL';
	$global_array_test['entidad'] = 'GENERAL';	
	$global_array_test['metodo'] = 'BD';
	$global_array_test['error'] = 'No existe la bd';
	$global_array_test['error_esperado'] = "Access denied for user 'iu2018'@'localhost' to database 'oo'";
	$global_array_test['error_obtenido'] = '';
	$global_array_test['resultado'] = '';

	$mysqli = new mysqli(host, user, pass , 'oo');
    	
	/* Comprueba la conexión */
	if ($mysqli->connect_errno) {
    	 $global_array_test['error_obtenido'] = $mysqli->connect_error;
    }


   	if ( $global_array_test['error_esperado'] === $global_array_test['error_obtenido'] )
	{
		$global_array_test['resultado'] = 'OK';
	}
	else
	{
		$global_array_test['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test, $global_array_test);


	

}




function ExistenTablas()
{
	global $ERRORS_array_test;

// creo array de almacen de test individual
	$global_array_test = array();

//Existe la tabla usuarios
	//------------------------------------------
	$global_array_test['tipo'] = 'GLOBAL';
	$global_array_test['entidad'] = 'GENERAL';	
	$global_array_test['metodo'] = 'BD';
	$global_array_test['error'] = 'Existe tabla usuarios';
	$global_array_test['error_esperado'] = "array";
	$global_array_test['error_obtenido'] = '';
	$global_array_test['resultado'] = '';

	$mysqli = new mysqli(host, user, pass , BD);
    	
	/* Comprueba la conexión */
	$mysqli->connect_errno;
	$sql = "SELECT *
			FROM USUARIOS";
	$array = $mysqli->query($sql);
	$global_array_test['error_obtenido'] = gettype($array->fetch_array());
   	if ($global_array_test['error_esperado'] === $global_array_test['error_obtenido'] )
	{
		$global_array_test['resultado'] = 'OK';
	}
	else
	{
		$global_array_test['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test, $global_array_test);

//Existe la tabla Titulacion
	//------------------------------------------
	$global_array_test['tipo'] = 'GLOBAL';
	$global_array_test['entidad'] = 'GENERAL';	
	$global_array_test['metodo'] = 'BD';
	$global_array_test['error'] = 'Existe tabla titulacion';
	$global_array_test['error_esperado'] = "array";
	$global_array_test['error_obtenido'] = '';
	$global_array_test['resultado'] = '';

	$mysqli = new mysqli(host, user, pass , BD);
    	
	/* Comprueba la conexión */
	$mysqli->connect_errno;
	$sql = "SELECT *
			FROM TITULACION";
	$array = $mysqli->query($sql);
	$global_array_test['error_obtenido'] = gettype($array->fetch_array());
   	if ($global_array_test['error_esperado'] === $global_array_test['error_obtenido'] )
	{
		$global_array_test['resultado'] = 'OK';
	}
	else
	{
		$global_array_test['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test, $global_array_test);


	//Existe la tabla prof_titulacion
	//------------------------------------------
	$global_array_test['tipo'] = 'GLOBAL';
	$global_array_test['entidad'] = 'GENERAL';	
	$global_array_test['metodo'] = 'BD';
	$global_array_test['error'] = 'Existe tabla prof_titulacion';
	$global_array_test['error_esperado'] = "array";
	$global_array_test['error_obtenido'] = '';
	$global_array_test['resultado'] = '';

	$mysqli = new mysqli(host, user, pass , BD);
    	
	/* Comprueba la conexión */
	$mysqli->connect_errno;
	$sql = "SELECT *
			FROM PROF_TITULACION";
	$array = $mysqli->query($sql);
	$global_array_test['error_obtenido'] = gettype($array->fetch_array());
   	if ($global_array_test['error_esperado'] === $global_array_test['error_obtenido'] )
	{
		$global_array_test['resultado'] = 'OK';
	}
	else
	{
		$global_array_test['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test, $global_array_test);

	//Existe la tabla prof_espacio
	//------------------------------------------
	$global_array_test['tipo'] = 'GLOBAL';
	$global_array_test['entidad'] = 'GENERAL';	
	$global_array_test['metodo'] = 'BD';
	$global_array_test['error'] = 'Existe tabla prof_espacio';
	$global_array_test['error_esperado'] = "array";
	$global_array_test['error_obtenido'] = '';
	$global_array_test['resultado'] = '';

	$mysqli = new mysqli(host, user, pass , BD);
    	
	/* Comprueba la conexión */
	$mysqli->connect_errno;
	$sql = "SELECT *
			FROM PROF_ESPACIO";
	$array = $mysqli->query($sql);
	$global_array_test['error_obtenido'] = gettype($array->fetch_array());
   	if ($global_array_test['error_esperado'] === $global_array_test['error_obtenido'] )
	{
		$global_array_test['resultado'] = 'OK';
	}
	else
	{
		$global_array_test['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test, $global_array_test);


	//Existe la tabla Profesor
	//------------------------------------------
	$global_array_test['tipo'] = 'GLOBAL';
	$global_array_test['entidad'] = 'GENERAL';	
	$global_array_test['metodo'] = 'BD';
	$global_array_test['error'] = 'Existe tabla Profesor';
	$global_array_test['error_esperado'] = "array";
	$global_array_test['error_obtenido'] = '';
	$global_array_test['resultado'] = '';

	$mysqli = new mysqli(host, user, pass , BD);
    	
	/* Comprueba la conexión */
	$mysqli->connect_errno;
	$sql = "SELECT *
			FROM PROFESOR";
	$array = $mysqli->query($sql);
	$global_array_test['error_obtenido'] = gettype($array->fetch_array());
   	if ($global_array_test['error_esperado'] === $global_array_test['error_obtenido'] )
	{
		$global_array_test['resultado'] = 'OK';
	}
	else
	{
		$global_array_test['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test, $global_array_test);


	//Existe la tabla Espacio
	//------------------------------------------
	$global_array_test['tipo'] = 'GLOBAL';
	$global_array_test['entidad'] = 'GENERAL';	
	$global_array_test['metodo'] = 'BD';
	$global_array_test['error'] = 'Existe tabla Espacio';
	$global_array_test['error_esperado'] = "array";
	$global_array_test['error_obtenido'] = '';
	$global_array_test['resultado'] = '';

	$mysqli = new mysqli(host, user, pass , BD);
    	
	/* Comprueba la conexión */
	$mysqli->connect_errno;
	$sql = "SELECT *
			FROM ESPACIO";
	$array = $mysqli->query($sql);
	$global_array_test['error_obtenido'] = gettype($array->fetch_array());
   	if ($global_array_test['error_esperado'] === $global_array_test['error_obtenido'] )
	{
		$global_array_test['resultado'] = 'OK';
	}
	else
	{
		$global_array_test['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test, $global_array_test);

	//Existe la tabla Edificio
	//------------------------------------------
	$global_array_test['tipo'] = 'GLOBAL';
	$global_array_test['entidad'] = 'GENERAL';	
	$global_array_test['metodo'] = 'BD';
	$global_array_test['error'] = 'Existe tabla Edificio';
	$global_array_test['error_esperado'] = "array";
	$global_array_test['error_obtenido'] = '';
	$global_array_test['resultado'] = '';

	$mysqli = new mysqli(host, user, pass , BD);
    	
	/* Comprueba la conexión */
	$mysqli->connect_errno;
	$sql = "SELECT *
			FROM EDIFICIO";
	$array = $mysqli->query($sql);
	$global_array_test['error_obtenido'] = gettype($array->fetch_array());
   	if ($global_array_test['error_esperado'] === $global_array_test['error_obtenido'] )
	{
		$global_array_test['resultado'] = 'OK';
	}
	else
	{
		$global_array_test['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test, $global_array_test);

	//Existe la tabla Centro
	//------------------------------------------
	$global_array_test['tipo'] = 'GLOBAL';
	$global_array_test['entidad'] = 'GENERAL';	
	$global_array_test['metodo'] = 'BD';
	$global_array_test['error'] = 'Existe tabla Centro';
	$global_array_test['error_esperado'] = "array";
	$global_array_test['error_obtenido'] = '';
	$global_array_test['resultado'] = '';

	$mysqli = new mysqli(host, user, pass , BD);
    	
	/* Comprueba la conexión */
	$mysqli->connect_errno;
	$sql = "SELECT *
			FROM CENTRO";
	$array = $mysqli->query($sql);
	$global_array_test['error_obtenido'] = gettype($array->fetch_array());
   	if ($global_array_test['error_esperado'] === $global_array_test['error_obtenido'] )
	{
		$global_array_test['resultado'] = 'OK';
	}
	else
	{
		$global_array_test['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test, $global_array_test);
}

ExisteBD();
ExistenTablas();

?>