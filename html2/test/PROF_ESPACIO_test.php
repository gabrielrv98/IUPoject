<?php
//Clase : PROF_ESPACIO_test
//Creado el : 20-11-2019
//Creado por: grvidal
//Fichero de test de unidad de la entidad PROF_ESPACIO
//	Saca por pantalla el resultado de los test
//-------------------------------------------------------
	include '../Model/PROF_ESPACIO_Model.php';

// function PROF_ESPACIO_Register_test()
// Valida:
//		usuario ya existe
//		el usuario no existe
//		

function PROF_ESPACIO_ADD_test()
{

	global $ERRORS_array_test;
// creo array de almacen de test individual
	$PROF_ESPACIO_array_test1 = array();

// Comprobar el codigo existe
    $PROF_ESPACIO_array_test1['entidad'] = 'PROF_ESPACIO';
    $PROF_ESPACIO_array_test1['tipo'] = 'P_UNITARIA';
	$PROF_ESPACIO_array_test1['metodo'] = 'ADD';
	$PROF_ESPACIO_array_test1['error'] = 'El usuario ya existe';
	$PROF_ESPACIO_array_test1['error_esperado'] = 'Inserción fallida: el elemento ya existe';
	$PROF_ESPACIO_array_test1['error_obtenido'] = '';
	$PROF_ESPACIO_array_test1['resultado'] = '';

	
	// Relleno los datos de usuario	
	$DNI = '09635517N';
	$codEsp = 'codEsp';
	
// creo el modelo
	$PROF_ESPACIO = new PROF_ESPACIO_Model($DNI,$codEsp);
// inserto la tupla
	$PROF_ESPACIO->ADD();

	$PROF_ESPACIO_array_test1['error_obtenido'] = $PROF_ESPACIO->ADD();
	if ($PROF_ESPACIO_array_test1['error_obtenido'] === $PROF_ESPACIO_array_test1['error_esperado'])
	{
		$PROF_ESPACIO_array_test1['resultado'] = 'OK';
	}
	else
	{
		$PROF_ESPACIO_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test, $PROF_ESPACIO_array_test1);

	$PROF_ESPACIO->DELETE();	


// Comprobar Inserción realizada con éxito
	$PROF_ESPACIO_array_test1['entidad'] = 'PROF_ESPACIO';
    $PROF_ESPACIO_array_test1['tipo'] = 'P_UNITARIA';	
	$PROF_ESPACIO_array_test1['metodo'] = 'ADD';
	$PROF_ESPACIO_array_test1['error'] = 'Inserción realizada con éxito';
	$PROF_ESPACIO_array_test1['error_esperado'] = 'Inserción realizada con éxito';
	$PROF_ESPACIO_array_test1['error_obtenido'] = '';
	$PROF_ESPACIO_array_test1['resultado'] = '';
	
	// Relleno los datos de usuario	
	$DNI = '09635517N';
	$codEsp = 'codEsp';
	
// creo el modelo
	$PROF_ESPACIO = new PROF_ESPACIO_Model($DNI,$codEsp);

	$PROF_ESPACIO_array_test1['error_obtenido'] = $PROF_ESPACIO->ADD();
	if ($PROF_ESPACIO_array_test1['error_obtenido'] === $PROF_ESPACIO_array_test1['error_esperado'])
	{
		$PROF_ESPACIO_array_test1['resultado'] = 'OK';
	}
	else
	{
		$PROF_ESPACIO_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test, $PROF_ESPACIO_array_test1);

	$PROF_ESPACIO->DELETE();


}


// function PROF_ESPACIO_RellenaDatos_test()
// Valida:
//		Devuelve recordset
//		

function PROF_ESPACIO_RellenaDatos_test()
{

	global $ERRORS_array_test;
// creo array de almacen de test individual
	$PROF_ESPACIO_array_test1 = array();


// Comprobar devuelve recordset
//----------------------------------------------
	$PROF_ESPACIO_array_test1['entidad'] = 'PROF_ESPACIO';
    $PROF_ESPACIO_array_test1['tipo'] = 'P_UNITARIA';	
	$PROF_ESPACIO_array_test1['metodo'] = 'RellenaDatos';
	$PROF_ESPACIO_array_test1['error'] = 'Devuelve el recordset';
	$PROF_ESPACIO_array_test1['error_esperado'] = 'array';
	$PROF_ESPACIO_array_test1['error_obtenido'] = '';
	$PROF_ESPACIO_array_test1['resultado'] = '';
	
	// Relleno los datos de usuario	
	$DNI = '09635517N';
	$codEsp = 'codEsp';
	
// creo el modelo
	$PROF_ESPACIO = new PROF_ESPACIO_Model($DNI,$codEsp); 

	$PROF_ESPACIO->ADD();


	$PROF_ESPACIO_array_test1['error_obtenido'] = gettype($PROF_ESPACIO->RellenaDatos());
	if ($PROF_ESPACIO_array_test1['error_obtenido'] === $PROF_ESPACIO_array_test1['error_esperado'])
	{
		$PROF_ESPACIO_array_test1['resultado'] = 'OK';
	}
	else
	{
		$PROF_ESPACIO_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test, $PROF_ESPACIO_array_test1);

	$PROF_ESPACIO->DELETE();

}

// function PROF_ESPACIO_Delete_test()
// Valida:
//		Borrado realizado con exito
//		Error de gestor de base de datos
//		

function PROF_ESPACIO_Delete_test()
{

	global $ERRORS_array_test;
// creo array de almacen de test individual
	$PROF_ESPACIO_array_test1 = array();

// Usuario no encontrado
//--------------------------------------------------
	$PROF_ESPACIO_array_test1['entidad'] = 'PROF_ESPACIO';
    $PROF_ESPACIO_array_test1['tipo'] = 'P_UNITARIA';	
	$PROF_ESPACIO_array_test1['metodo'] = 'Delete';
	$PROF_ESPACIO_array_test1['error'] = 'Usuario no encontrado';
	$PROF_ESPACIO_array_test1['error_esperado'] = 'Error de gestor de base de datos';
	$PROF_ESPACIO_array_test1['error_obtenido'] = '';
	$PROF_ESPACIO_array_test1['resultado'] = '';
	
	// Relleno los datos de usuario	
	$DNI = '09635517N';
	$codEsp = 'codEsp';
	
// creo el modelo
	$PROF_ESPACIO = new PROF_ESPACIO_Model($DNI,$codEsp);

//Elimino al usuario
	$PROF_ESPACIO_array_test1['error_obtenido'] = $PROF_ESPACIO->DELETE();
	if ($PROF_ESPACIO_array_test1['error_obtenido'] === $PROF_ESPACIO_array_test1['error_esperado'])
	{
		$PROF_ESPACIO_array_test1['resultado'] = 'OK';
	}
	else
	{
		$PROF_ESPACIO_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test, $PROF_ESPACIO_array_test1);

// Usuario eliminado
//----------------------------------------------
	$PROF_ESPACIO_array_test1['entidad'] = 'PROF_ESPACIO';
    $PROF_ESPACIO_array_test1['tipo'] = 'P_UNITARIA';	
	$PROF_ESPACIO_array_test1['metodo'] = 'Delete';
	$PROF_ESPACIO_array_test1['error'] = 'Eliminado';
	$PROF_ESPACIO_array_test1['error_esperado'] = 'Borrado realizado con éxito';
	$PROF_ESPACIO_array_test1['error_obtenido'] = '';
	$PROF_ESPACIO_array_test1['resultado'] = '';
	
	// Relleno los datos de usuario	
	$DNI = '09635517N';
	$codEsp = 'codEsp';
	
// creo el modelo
	$PROF_ESPACIO = new PROF_ESPACIO_Model($DNI,$codEsp);
	$PROF_ESPACIO->ADD();

	$PROF_ESPACIO_array_test1['error_obtenido'] = $PROF_ESPACIO->DELETE();
	if ($PROF_ESPACIO_array_test1['error_obtenido'] === $PROF_ESPACIO_array_test1['error_esperado'])
	{
		$PROF_ESPACIO_array_test1['resultado'] = 'OK';
	}
	else
	{
		$PROF_ESPACIO_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test, $PROF_ESPACIO_array_test1);

	$PROF_ESPACIO->DELETE();

}


function PROF_ESPACIO_Edit_test()
{

	global $ERRORS_array_test;
// creo array de almacen de test individual
	$PROF_ESPACIO_array_test1 = array();

// Comprobar el login no existe
//--------------------------------------------------
	$PROF_ESPACIO_array_test1['entidad'] = 'PROF_ESPACIO';
    $PROF_ESPACIO_array_test1['tipo'] = 'P_UNITARIA';	
	$PROF_ESPACIO_array_test1['metodo'] = 'Edit';
	$PROF_ESPACIO_array_test1['error'] = 'PROF_ESPACIO no existente';
	$PROF_ESPACIO_array_test1['error_esperado'] = 'Error de gestor de base de datos';
	$PROF_ESPACIO_array_test1['error_obtenido'] = '';
	$PROF_ESPACIO_array_test1['resultado'] = '';
	
	// Relleno los datos de usuario	
	$DNI = '09635517N';
	$codEsp = 'codEsp';
	
// creo el modelo
	$PROF_ESPACIO = new PROF_ESPACIO_Model($DNI,$codEsp);

//Intento editar la tupla
	$PROF_ESPACIO_array_test1['error_obtenido'] = $PROF_ESPACIO->EDIT();
	if ($PROF_ESPACIO_array_test1['error_obtenido'] === $PROF_ESPACIO_array_test1['error_esperado'])
	{
		$PROF_ESPACIO_array_test1['resultado'] = 'OK';
	}
	else
	{
		$PROF_ESPACIO_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test, $PROF_ESPACIO_array_test1);

// El usuario no existe en la base de datos
//----------------------------------------------
	$PROF_ESPACIO_array_test1['entidad'] = 'PROF_ESPACIO';
    $PROF_ESPACIO_array_test1['tipo'] = 'P_UNITARIA';	
	$PROF_ESPACIO_array_test1['metodo'] = 'Edit';
	$PROF_ESPACIO_array_test1['error'] = 'La tupla se ha actualizado';
	$PROF_ESPACIO_array_test1['error_esperado'] = 'Actualización realizada con éxito';
	$PROF_ESPACIO_array_test1['error_obtenido'] = '';
	$PROF_ESPACIO_array_test1['resultado'] = '';
	
	// Relleno los datos de usuario	
	$DNI = '09635517N';
	$codEsp = 'codEsp';
	
// creo el modelo
	$PROF_ESPACIO = new PROF_ESPACIO_Model($DNI,$codEsp);
	
	//Lo añado a la base de datos
	$PROF_ESPACIO->ADD();
	
	$PROF_ESPACIO_array_test1['error_obtenido'] = $PROF_ESPACIO->EDIT();
	if ($PROF_ESPACIO_array_test1['error_obtenido'] === $PROF_ESPACIO_array_test1['error_esperado'])
	{
		$PROF_ESPACIO_array_test1['resultado'] = 'OK';
	}
	else
	{
		$PROF_ESPACIO_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test, $PROF_ESPACIO_array_test1);

	$PROF_ESPACIO->DELETE();

}

function PROF_ESPACIO_Search_test()
{

	global $ERRORS_array_test;
// creo array de almacen de test individual
	$PROF_ESPACIO_array_test1 = array();

// Comprobar el PROF_ESPACIO error
//--------------------------------------------------
	$PROF_ESPACIO_array_test1['entidad'] = 'PROF_ESPACIO';
    $PROF_ESPACIO_array_test1['tipo'] = 'P_UNITARIA';	
	$PROF_ESPACIO_array_test1['metodo'] = 'Search';
	$PROF_ESPACIO_array_test1['error'] = 'Error de gestor de base de datos';
	$PROF_ESPACIO_array_test1['error_esperado'] = 'Error de gestor de base de datos';
	$PROF_ESPACIO_array_test1['error_obtenido'] = '';
	$PROF_ESPACIO_array_test1['resultado'] = '';
	
	
	// Relleno los datos de usuario	
	$DNI = '0963\' , \'5517N';
	$codEsp = 'codEsp';
	
// creo el modelo
	$PROF_ESPACIO = new PROF_ESPACIO_Model($DNI,$codEsp);

//Intento buscar la tupla
	$PROF_ESPACIO_array_test1['error_obtenido'] = $PROF_ESPACIO->SEARCH();
	if ($PROF_ESPACIO_array_test1['error_obtenido'] === $PROF_ESPACIO_array_test1['error_esperado'])
	{
		$PROF_ESPACIO_array_test1['resultado'] = 'OK';
	}
	else
	{
		$PROF_ESPACIO_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test, $PROF_ESPACIO_array_test1);

// encontrar el PROF_ESPACIO en search
//----------------------------------------------
	$PROF_ESPACIO_array_test1['entidad'] = 'PROF_ESPACIO';
    $PROF_ESPACIO_array_test1['tipo'] = 'P_UNITARIA';	
	$PROF_ESPACIO_array_test1['metodo'] = 'Search';
	$PROF_ESPACIO_array_test1['error'] = 'Devuelve el recordset';
	$PROF_ESPACIO_array_test1['error_esperado'] = 'array';
	$PROF_ESPACIO_array_test1['error_obtenido'] = '';
	$PROF_ESPACIO_array_test1['resultado'] = '';
	
	// Relleno los datos de usuario	
	$DNI = '09635517N';
	$codEsp = 'codEsp';
	
// creo el modelo
	$PROF_ESPACIO = new PROF_ESPACIO_Model($DNI,$codEsp);
	
	//Lo añado a la base de datos
	$PROF_ESPACIO->ADD();

	$PROF_ESPACIO_array_test1['error_obtenido'] = gettype($PROF_ESPACIO->SEARCH()->fetch_array());
	if ($PROF_ESPACIO_array_test1['error_obtenido'] === $PROF_ESPACIO_array_test1['error_esperado'])
	{
		$PROF_ESPACIO_array_test1['resultado'] = 'OK';
	}
	else
	{
		$PROF_ESPACIO_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test, $PROF_ESPACIO_array_test1);

	$PROF_ESPACIO->DELETE();

}

	
	PROF_ESPACIO_ADD_test();
	PROF_ESPACIO_RellenaDatos_test();
	PROF_ESPACIO_Edit_test();
	PROF_ESPACIO_Delete_test();
	PROF_ESPACIO_Search_test();


?>


