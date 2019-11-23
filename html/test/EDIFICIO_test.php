<?php
// Autor : jrodeiro
// Fecha : 23/9/2019
// Descripción : 
//	Fichero de test de unidad de la entidad EDIFICIO
//	Saca por pantalla el resultado de los test
// incluir el modelo de la entidad EDIFICIO
	include '../Model/EDIFICIO_Model.php';

// function EDIFICIO_Register_test()
// Valida:
//		usuario ya existe
//		el usuario no existe
//		

function EDIFICIO_ADD_test()
{

	global $ERRORS_array_test;
// creo array de almacen de test individual
	$EDIFICIO_array_test1 = array();

// Comprobar el login existe
	$EDIFICIO_array_test1['entidad'] = 'EDIFICIO';	
	$EDIFICIO_array_test1['metodo'] = 'ADD';
	$EDIFICIO_array_test1['error'] = 'El usuario ya existe';
	$EDIFICIO_array_test1['error_esperado'] = 'Inserción fallida: el elemento ya existe';
	$EDIFICIO_array_test1['error_obtenido'] = '';
	$EDIFICIO_array_test1['resultado'] = '';
	
	// Relleno los datos de usuario	
	$login = 'miusuario';
	$password = 'mipassword';
	$nombre = 'minombre'; 
	$apellidos = 'miapellido';
	$email = 'campus';
// creo el modelo
	$EDIFICIO = new EDIFICIO_Model($login,$password,$nombre,$email);
// inserto la tupla
	$EDIFICIO->ADD();

	$EDIFICIO_array_test1['error_obtenido'] = $EDIFICIO->ADD();
	if ($EDIFICIO_array_test1['error_obtenido'] === $EDIFICIO_array_test1['error_esperado'])
	{
		$EDIFICIO_array_test1['resultado'] = 'OK';
	}
	else
	{
		$EDIFICIO_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test, $EDIFICIO_array_test1);

	$EDIFICIO->DELETE();	


// Comprobar error en la inserción
	$EDIFICIO_array_test1['entidad'] = 'EDIFICIO';	
	$EDIFICIO_array_test1['metodo'] = 'ADD';
	$EDIFICIO_array_test1['error'] = 'Error en la inserción';
	$EDIFICIO_array_test1['error_esperado'] = 'Error de gestor de base de datos';
	$EDIFICIO_array_test1['error_obtenido'] = '';
	$EDIFICIO_array_test1['resultado'] = '';
	
	$login = 'jrodeirolklkjlkj';
	$password = 'javi';
	$nombre = 'javi\' ,\'kdfalkj';  
	$campus = 'campus';

	$EDIFICIO = new EDIFICIO_Model($login,$password,$nombre,$campus);
	$EDIFICIO_array_test1['error_obtenido'] = $EDIFICIO->ADD();
	if ($EDIFICIO_array_test1['error_obtenido'] === $EDIFICIO_array_test1['error_esperado'])
	{
		$EDIFICIO_array_test1['resultado'] = 'OK';
	}
	else
	{
		$EDIFICIO_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test, $EDIFICIO_array_test1);	

	$EDIFICIO->DELETE();

// Comprobar Inserción realizada con éxito
	$EDIFICIO_array_test1['entidad'] = 'EDIFICIO';	
	$EDIFICIO_array_test1['metodo'] = 'ADD';
	$EDIFICIO_array_test1['error'] = 'Inserción realizada con éxito';
	$EDIFICIO_array_test1['error_esperado'] = 'Inserción realizada con éxito';
	$EDIFICIO_array_test1['error_obtenido'] = '';
	$EDIFICIO_array_test1['resultado'] = '';
	
	$login = 'jrodeiro1';
	$password = 'javi';
	$nombre = 'javi'; 
	$apellidos = 'rodeiro';

	$EDIFICIO = new EDIFICIO_Model($login,$password,$nombre,$apellidos);
	$EDIFICIO_array_test1['error_obtenido'] = $EDIFICIO->ADD();
	if ($EDIFICIO_array_test1['error_obtenido'] === $EDIFICIO_array_test1['error_esperado'])
	{
		$EDIFICIO_array_test1['resultado'] = 'OK';
	}
	else
	{
		$EDIFICIO_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test, $EDIFICIO_array_test1);

	$EDIFICIO->DELETE();


}


// function EDIFICIO_RellenaDatos_test()
// Valida:
//		el usuario a rellenar no existe
//		Devuelve recordset
//		

function EDIFICIO_RellenaDatos_test()
{

	global $ERRORS_array_test;
// creo array de almacen de test individual
	$EDIFICIO_array_test1 = array();

// Comprobar el login no existe
//--------------------------------------------------
	$EDIFICIO_array_test1['entidad'] = 'EDIFICIO';	
	$EDIFICIO_array_test1['metodo'] = 'RellenaDatos';
	$EDIFICIO_array_test1['error'] = 'El usuario a rellenar no existe';
	$EDIFICIO_array_test1['error_esperado'] = 'Error de gestor de base de datos';
	$EDIFICIO_array_test1['error_obtenido'] = '';
	$EDIFICIO_array_test1['resultado'] = '';
	
	// Relleno los datos de usuario	
	$login = 'javi ,\'hola';
	
// creo el modelo
	$EDIFICIO = new EDIFICIO_Model($login,'','','');


	$EDIFICIO_array_test1['error_obtenido'] = $EDIFICIO->RellenaDatos();
	if ($EDIFICIO_array_test1['error_obtenido'] === $EDIFICIO_array_test1['error_esperado'])
	{
		$EDIFICIO_array_test1['resultado'] = 'OK';
	}
	else
	{
		$EDIFICIO_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test, $EDIFICIO_array_test1);

// Comprobar devuelve recordset
//----------------------------------------------
	$EDIFICIO_array_test1['entidad'] = 'EDIFICIO';	
	$EDIFICIO_array_test1['metodo'] = 'RellenaDatos';
	$EDIFICIO_array_test1['error'] = 'Devuelve el recordset';
	$EDIFICIO_array_test1['error_esperado'] = 'array';
	$EDIFICIO_array_test1['error_obtenido'] = '';
	$EDIFICIO_array_test1['resultado'] = '';
	
	$login = 'jrodeiro1';
	$password = 'javi';
	$nombre = 'javi'; 
	$apellidos = 'rodeiro';
	$email = 'campus';

	$EDIFICIO = new EDIFICIO_Model($login,$password,$nombre,$apellidos);
	$EDIFICIO_array_test1['error_obtenido'] = $EDIFICIO->ADD();


	$EDIFICIO_array_test1['error_obtenido'] = gettype($EDIFICIO->RellenaDatos());
	if ($EDIFICIO_array_test1['error_obtenido'] === $EDIFICIO_array_test1['error_esperado'])
	{
		$EDIFICIO_array_test1['resultado'] = 'OK';
	}
	else
	{
		$EDIFICIO_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test, $EDIFICIO_array_test1);

	$EDIFICIO->DELETE();

}

// function EDIFICIO_Delete_test()
// Valida:
//		Borrado realizado con exito
//		Error de gestor de base de datos
//		

function EDIFICIO_Delete_test()
{

	global $ERRORS_array_test;
// creo array de almacen de test individual
	$EDIFICIO_array_test1 = array();

// Usuario no encontrado
//--------------------------------------------------
	$EDIFICIO_array_test1['entidad'] = 'EDIFICIO';	
	$EDIFICIO_array_test1['metodo'] = 'Delete';
	$EDIFICIO_array_test1['error'] = 'Usuario no encontrado';
	$EDIFICIO_array_test1['error_esperado'] = 'Error de gestor de base de datos';
	$EDIFICIO_array_test1['error_obtenido'] = '';
	$EDIFICIO_array_test1['resultado'] = '';
	
	// Relleno los datos de usuario	
	$login = 'grvidal25';
	
// creo el modelo
	$EDIFICIO = new EDIFICIO_Model($login,'','','');

//Elimino al usuario
	$EDIFICIO_array_test1['error_obtenido'] = $EDIFICIO->DELETE();
	if ($EDIFICIO_array_test1['error_obtenido'] === $EDIFICIO_array_test1['error_esperado'])
	{
		$EDIFICIO_array_test1['resultado'] = 'OK';
	}
	else
	{
		$EDIFICIO_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test, $EDIFICIO_array_test1);

// Usuario eliminado
//----------------------------------------------
	$EDIFICIO_array_test1['entidad'] = 'EDIFICIO';	
	$EDIFICIO_array_test1['metodo'] = 'Edit';
	$EDIFICIO_array_test1['error'] = 'Eliminado';
	$EDIFICIO_array_test1['error_esperado'] = 'Borrado realizado con éxito';
	$EDIFICIO_array_test1['error_obtenido'] = '';
	$EDIFICIO_array_test1['resultado'] = '';
	
	$login = 'grvidal25';

	$EDIFICIO = new EDIFICIO_Model($login,'','','');
	$EDIFICIO->ADD();

	$EDIFICIO_array_test1['error_obtenido'] = $EDIFICIO->DELETE();
	if ($EDIFICIO_array_test1['error_obtenido'] === $EDIFICIO_array_test1['error_esperado'])
	{
		$EDIFICIO_array_test1['resultado'] = 'OK';
	}
	else
	{
		$EDIFICIO_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test, $EDIFICIO_array_test1);

	$EDIFICIO->DELETE();

}


function EDIFICIO_Edit_test()
{

	global $ERRORS_array_test;
// creo array de almacen de test individual
	$EDIFICIO_array_test1 = array();

// Comprobar el login no existe
//--------------------------------------------------
	$EDIFICIO_array_test1['entidad'] = 'EDIFICIO';	
	$EDIFICIO_array_test1['metodo'] = 'Edit';
	$EDIFICIO_array_test1['error'] = 'Usuario no existente';
	$EDIFICIO_array_test1['error_esperado'] = 'Error de gestor de base de datos';
	$EDIFICIO_array_test1['error_obtenido'] = '';
	$EDIFICIO_array_test1['resultado'] = '';
	
	// Relleno los datos de usuario	
	$login = 'grvidal25';
	
// creo el modelo sin añadirlo a la base de datos
	$editado = new EDIFICIO_Model($login,'1','2','3');

//Intento editar la tupla
	$EDIFICIO_array_test1['error_obtenido'] = $editado->EDIT();
	if ($EDIFICIO_array_test1['error_obtenido'] === $EDIFICIO_array_test1['error_esperado'])
	{
		$EDIFICIO_array_test1['resultado'] = 'OK';
	}
	else
	{
		$EDIFICIO_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test, $EDIFICIO_array_test1);

// El usuario no existe en la base de datos
//----------------------------------------------
	$EDIFICIO_array_test1['entidad'] = 'EDIFICIO';	
	$EDIFICIO_array_test1['metodo'] = 'Edit';
	$EDIFICIO_array_test1['error'] = 'La tupla se ha actualizado';
	$EDIFICIO_array_test1['error_esperado'] = 'Actualización realizada con éxito';
	$EDIFICIO_array_test1['error_obtenido'] = '';
	$EDIFICIO_array_test1['resultado'] = '';
	
	$login = 'grvidal25';

	$EDIFICIO = new EDIFICIO_Model($login,'nom','dir','campus');
	
	//Lo añado a la base de datos
	$EDIFICIO->ADD();
	$EDIFICIO_array_test1['error_obtenido'] = $EDIFICIO->EDIT();
	if ($EDIFICIO_array_test1['error_obtenido'] === $EDIFICIO_array_test1['error_esperado'])
	{
		$EDIFICIO_array_test1['resultado'] = 'OK';
	}
	else
	{
		$EDIFICIO_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test, $EDIFICIO_array_test1);

	$EDIFICIO->DELETE();

}

function EDIFICIO_Search_test()
{

	global $ERRORS_array_test;
// creo array de almacen de test individual
	$EDIFICIO_array_test1 = array();

// Comprobar el login no existe
//--------------------------------------------------
	$EDIFICIO_array_test1['entidad'] = 'EDIFICIO';	
	$EDIFICIO_array_test1['metodo'] = 'Search';
	$EDIFICIO_array_test1['error'] = 'Error de gestor de base de datos';
	$EDIFICIO_array_test1['error_esperado'] = 'Error de gestor de base de datos';
	$EDIFICIO_array_test1['error_obtenido'] = '';
	$EDIFICIO_array_test1['resultado'] = '';
	
	// Relleno los datos de usuario	
	$login = 'grvidal25\' , \'asd';
	
// creo el modelo sin añadirlo a la base de datos
	$EDIFICIO = new EDIFICIO_Model($login,'','','');

//Intento editar la tupla
	$EDIFICIO_array_test1['error_obtenido'] = $EDIFICIO->SEARCH();
	if ($EDIFICIO_array_test1['error_obtenido'] === $EDIFICIO_array_test1['error_esperado'])
	{
		$EDIFICIO_array_test1['resultado'] = 'OK';
	}
	else
	{
		$EDIFICIO_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test, $EDIFICIO_array_test1);

// El usuario no existe en la base de datos
//----------------------------------------------
	$EDIFICIO_array_test1['entidad'] = 'EDIFICIO';	
	$EDIFICIO_array_test1['metodo'] = 'Search';
	$EDIFICIO_array_test1['error'] = 'Devuelve el recordset';
	$EDIFICIO_array_test1['error_esperado'] = 'array';
	$EDIFICIO_array_test1['error_obtenido'] = '';
	$EDIFICIO_array_test1['resultado'] = '';
	
	$login = 'miCenTest';
	$nomEdi = 'nomEdi';

	$EDIFICIO = new EDIFICIO_Model($login,$nomEdi,'nom','dir');
	
	//Lo añado a la base de datos
	$EDIFICIO->ADD();

	$EDIFICIO_array_test1['error_obtenido'] = gettype($EDIFICIO->SEARCH()->fetch_array());
	if ($EDIFICIO_array_test1['error_obtenido'] === $EDIFICIO_array_test1['error_esperado'])
	{
		$EDIFICIO_array_test1['resultado'] = 'OK';
	}
	else
	{
		$EDIFICIO_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test, $EDIFICIO_array_test1);

	$EDIFICIO->DELETE();

}

	
	EDIFICIO_RellenaDatos_test();
	EDIFICIO_Edit_test();
	EDIFICIO_ADD_test();
	EDIFICIO_Delete_test();
	EDIFICIO_Search_test();
	//Es necesario edificios para poder seguir haciendo el test
	$EDIFICIO_TEST = new EDIFICIO_Model("CodEdi","NombreEdi","DirEdi","Campus");
	$EDIFICIO_TEST->ADD();

?>


