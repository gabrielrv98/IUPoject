<?php
//Clase : PROF_TITULACION_test
//Creado el : 20-11-2019
//Creado por: grvidal
//Fichero de test de unidad de la entidad PROF_TITULACION
//	Saca por pantalla el resultado de los test
//-------------------------------------------------------
	include '../Model/PROF_TITULACION_Model.php';

// function PROF_TITULACION_Register_test()
// Valida:
//		usuario ya existe
//		el usuario no existe
//		

function PROF_TITULACION_ADD_test()
{

	global $ERRORS_array_test;
// creo array de almacen de test individual
	$PROF_TITULACION_array_test1 = array();

// Comprobar el codigo existe
    $PROF_TITULACION_array_test1['entidad'] = 'PROF_TITULACION';
    $PROF_TITULACION_array_test1['tipo'] = 'P_UNITARIA';
	$PROF_TITULACION_array_test1['metodo'] = 'ADD';
	$PROF_TITULACION_array_test1['error'] = 'El usuario ya existe';
	$PROF_TITULACION_array_test1['error_esperado'] = 'Inserción fallida: el elemento ya existe';
	$PROF_TITULACION_array_test1['error_obtenido'] = '';
	$PROF_TITULACION_array_test1['resultado'] = '';

	
	// Relleno los datos de usuario	
	$DNI = '09635517N';
	$codTit = 'codTest';
	$year = '2019-2020';
// creo el modelo
	$PROF_TITULACION = new PROF_TITULACION_Model($DNI,$codTit,$year);
// inserto la tupla
	$PROF_TITULACION->ADD();

	$PROF_TITULACION_array_test1['error_obtenido'] = $PROF_TITULACION->ADD();
	if ($PROF_TITULACION_array_test1['error_obtenido'] === $PROF_TITULACION_array_test1['error_esperado'])
	{
		$PROF_TITULACION_array_test1['resultado'] = 'OK';
	}
	else
	{
		$PROF_TITULACION_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test, $PROF_TITULACION_array_test1);

	echo $PROF_TITULACION->DELETE();	


// Comprobar Inserción realizada con éxito
	$PROF_TITULACION_array_test1['entidad'] = 'PROF_TITULACION';
    $PROF_TITULACION_array_test1['tipo'] = 'P_UNITARIA';	
	$PROF_TITULACION_array_test1['metodo'] = 'ADD';
	$PROF_TITULACION_array_test1['error'] = 'Inserción realizada con éxito';
	$PROF_TITULACION_array_test1['error_esperado'] = 'Inserción realizada con éxito';
	$PROF_TITULACION_array_test1['error_obtenido'] = '';
	$PROF_TITULACION_array_test1['resultado'] = '';
	
	// Relleno los datos de usuario	
	$DNI = '09635517N';
	$codTit = 'codTest';
	$year = '2019-2020';
// creo el modelo
	$PROF_TITULACION = new PROF_TITULACION_Model($DNI,$codTit,$year);

	$PROF_TITULACION_array_test1['error_obtenido'] = $PROF_TITULACION->ADD();
	if ($PROF_TITULACION_array_test1['error_obtenido'] === $PROF_TITULACION_array_test1['error_esperado'])
	{
		$PROF_TITULACION_array_test1['resultado'] = 'OK';
	}
	else
	{
		$PROF_TITULACION_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test, $PROF_TITULACION_array_test1);

	$PROF_TITULACION->DELETE();


}


// function PROF_TITULACION_RellenaDatos_test()
// Valida:
//		Devuelve recordset
//		

function PROF_TITULACION_RellenaDatos_test()
{

	global $ERRORS_array_test;
// creo array de almacen de test individual
	$PROF_TITULACION_array_test1 = array();


// Comprobar devuelve recordset
//----------------------------------------------
	$PROF_TITULACION_array_test1['entidad'] = 'PROF_TITULACION';
    $PROF_TITULACION_array_test1['tipo'] = 'P_UNITARIA';	
	$PROF_TITULACION_array_test1['metodo'] = 'RellenaDatos';
	$PROF_TITULACION_array_test1['error'] = 'Devuelve el recordset';
	$PROF_TITULACION_array_test1['error_esperado'] = 'array';
	$PROF_TITULACION_array_test1['error_obtenido'] = '';
	$PROF_TITULACION_array_test1['resultado'] = '';
	
	// Relleno los datos de usuario	
	$DNI = '09635517N';
	$codTit = 'codTest';
	$year = '2019-2020';
// creo el modelo
	$PROF_TITULACION = new PROF_TITULACION_Model($DNI,$codTit,$year); 

	$PROF_TITULACION->ADD();


	$PROF_TITULACION_array_test1['error_obtenido'] = gettype($PROF_TITULACION->RellenaDatos());
	if ($PROF_TITULACION_array_test1['error_obtenido'] === $PROF_TITULACION_array_test1['error_esperado'])
	{
		$PROF_TITULACION_array_test1['resultado'] = 'OK';
	}
	else
	{
		$PROF_TITULACION_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test, $PROF_TITULACION_array_test1);

	$PROF_TITULACION->DELETE();

}

// function PROF_TITULACION_Delete_test()
// Valida:
//		Borrado realizado con exito
//		Error de gestor de base de datos
//		

function PROF_TITULACION_Delete_test()
{

	global $ERRORS_array_test;
// creo array de almacen de test individual
	$PROF_TITULACION_array_test1 = array();

// Usuario no encontrado
//--------------------------------------------------
	$PROF_TITULACION_array_test1['entidad'] = 'PROF_TITULACION';
    $PROF_TITULACION_array_test1['tipo'] = 'P_UNITARIA';	
	$PROF_TITULACION_array_test1['metodo'] = 'Delete';
	$PROF_TITULACION_array_test1['error'] = 'Usuario no encontrado';
	$PROF_TITULACION_array_test1['error_esperado'] = 'Error de gestor de base de datos';
	$PROF_TITULACION_array_test1['error_obtenido'] = '';
	$PROF_TITULACION_array_test1['resultado'] = '';
	
	// Relleno los datos de usuario	
	$DNI = '09635517N';
	$codTit = 'codTest';
	$year = '2019-2020';
// creo el modelo
	$PROF_TITULACION = new PROF_TITULACION_Model($DNI,$codTit,$year);

//Elimino al usuario
	$PROF_TITULACION_array_test1['error_obtenido'] = $PROF_TITULACION->DELETE();
	if ($PROF_TITULACION_array_test1['error_obtenido'] === $PROF_TITULACION_array_test1['error_esperado'])
	{
		$PROF_TITULACION_array_test1['resultado'] = 'OK';
	}
	else
	{
		$PROF_TITULACION_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test, $PROF_TITULACION_array_test1);

// Usuario eliminado
//----------------------------------------------
	$PROF_TITULACION_array_test1['entidad'] = 'PROF_TITULACION';
    $PROF_TITULACION_array_test1['tipo'] = 'P_UNITARIA';	
	$PROF_TITULACION_array_test1['metodo'] = 'Delete';
	$PROF_TITULACION_array_test1['error'] = 'Eliminado';
	$PROF_TITULACION_array_test1['error_esperado'] = 'Borrado realizado con éxito';
	$PROF_TITULACION_array_test1['error_obtenido'] = '';
	$PROF_TITULACION_array_test1['resultado'] = '';
	
	// Relleno los datos de usuario	
	$DNI = '09635517N';
	$codTit = 'codTest';
	$year = '2019-2020';
// creo el modelo
	$PROF_TITULACION = new PROF_TITULACION_Model($DNI,$codTit,$year);
	$PROF_TITULACION->ADD();

	$PROF_TITULACION_array_test1['error_obtenido'] = $PROF_TITULACION->DELETE();
	if ($PROF_TITULACION_array_test1['error_obtenido'] === $PROF_TITULACION_array_test1['error_esperado'])
	{
		$PROF_TITULACION_array_test1['resultado'] = 'OK';
	}
	else
	{
		$PROF_TITULACION_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test, $PROF_TITULACION_array_test1);

	$PROF_TITULACION->DELETE();

}


function PROF_TITULACION_Edit_test()
{

	global $ERRORS_array_test;
// creo array de almacen de test individual
	$PROF_TITULACION_array_test1 = array();

// Comprobar el login no existe
//--------------------------------------------------
	$PROF_TITULACION_array_test1['entidad'] = 'PROF_TITULACION';
    $PROF_TITULACION_array_test1['tipo'] = 'P_UNITARIA';	
	$PROF_TITULACION_array_test1['metodo'] = 'Edit';
	$PROF_TITULACION_array_test1['error'] = 'PROF_TITULACION no existente';
	$PROF_TITULACION_array_test1['error_esperado'] = 'Error de gestor de base de datos';
	$PROF_TITULACION_array_test1['error_obtenido'] = '';
	$PROF_TITULACION_array_test1['resultado'] = '';
	
	// Relleno los datos de usuario	
	$DNI = '09635517N';
	$codTit = 'codTest';
	$year = '2019-2020';
// creo el modelo
	$PROF_TITULACION = new PROF_TITULACION_Model($DNI,$codTit,$year);

//Intento editar la tupla
	$PROF_TITULACION_array_test1['error_obtenido'] = $PROF_TITULACION->EDIT();
	if ($PROF_TITULACION_array_test1['error_obtenido'] === $PROF_TITULACION_array_test1['error_esperado'])
	{
		$PROF_TITULACION_array_test1['resultado'] = 'OK';
	}
	else
	{
		$PROF_TITULACION_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test, $PROF_TITULACION_array_test1);

// El usuario no existe en la base de datos
//----------------------------------------------
	$PROF_TITULACION_array_test1['entidad'] = 'PROF_TITULACION';
    $PROF_TITULACION_array_test1['tipo'] = 'P_UNITARIA';	
	$PROF_TITULACION_array_test1['metodo'] = 'Edit';
	$PROF_TITULACION_array_test1['error'] = 'La tupla se ha actualizado';
	$PROF_TITULACION_array_test1['error_esperado'] = 'Actualización realizada con éxito';
	$PROF_TITULACION_array_test1['error_obtenido'] = '';
	$PROF_TITULACION_array_test1['resultado'] = '';
	
	// Relleno los datos de usuario	
	$DNI = '09635517N';
	$codTit = 'codTest';
	$year = '2019-2020';
// creo el modelo
	$PROF_TITULACION = new PROF_TITULACION_Model($DNI,$codTit,$year);
	
	//Lo añado a la base de datos
	$PROF_TITULACION->ADD();
	
	$PROF_TITULACION_array_test1['error_obtenido'] = $PROF_TITULACION->EDIT();
	if ($PROF_TITULACION_array_test1['error_obtenido'] === $PROF_TITULACION_array_test1['error_esperado'])
	{
		$PROF_TITULACION_array_test1['resultado'] = 'OK';
	}
	else
	{
		$PROF_TITULACION_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test, $PROF_TITULACION_array_test1);

	$PROF_TITULACION->DELETE();

}

function PROF_TITULACION_Search_test()
{

	global $ERRORS_array_test;
// creo array de almacen de test individual
	$PROF_TITULACION_array_test1 = array();

// Comprobar el PROF_TITULACION error
//--------------------------------------------------
	$PROF_TITULACION_array_test1['entidad'] = 'PROF_TITULACION';
    $PROF_TITULACION_array_test1['tipo'] = 'P_UNITARIA';	
	$PROF_TITULACION_array_test1['metodo'] = 'Search';
	$PROF_TITULACION_array_test1['error'] = 'Error de gestor de base de datos';
	$PROF_TITULACION_array_test1['error_esperado'] = 'Error de gestor de base de datos';
	$PROF_TITULACION_array_test1['error_obtenido'] = '';
	$PROF_TITULACION_array_test1['resultado'] = '';
	
	
	// Relleno los datos de usuario	
	$DNI = '0963\' , \'5517N';
	$codTit = 'codTest';
	$year = '2019-2020';
// creo el modelo
	$PROF_TITULACION = new PROF_TITULACION_Model($DNI,$codTit,$year);

//Intento buscar la tupla
	$PROF_TITULACION_array_test1['error_obtenido'] = $PROF_TITULACION->SEARCH();
	if ($PROF_TITULACION_array_test1['error_obtenido'] === $PROF_TITULACION_array_test1['error_esperado'])
	{
		$PROF_TITULACION_array_test1['resultado'] = 'OK';
	}
	else
	{
		$PROF_TITULACION_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test, $PROF_TITULACION_array_test1);

// encontrar el PROF_TITULACION en search
//----------------------------------------------
	$PROF_TITULACION_array_test1['entidad'] = 'PROF_TITULACION';
    $PROF_TITULACION_array_test1['tipo'] = 'P_UNITARIA';	
	$PROF_TITULACION_array_test1['metodo'] = 'Search';
	$PROF_TITULACION_array_test1['error'] = 'Devuelve el recordset';
	$PROF_TITULACION_array_test1['error_esperado'] = 'array';
	$PROF_TITULACION_array_test1['error_obtenido'] = '';
	$PROF_TITULACION_array_test1['resultado'] = '';
	
	// Relleno los datos de usuario	
	$DNI = '09635517N';
	$codTit = 'codTest';
	$year = '2019-2020';
// creo el modelo
	$PROF_TITULACION = new PROF_TITULACION_Model($DNI,$codTit,$year);
	
	//Lo añado a la base de datos
	$PROF_TITULACION->ADD();

	$PROF_TITULACION_array_test1['error_obtenido'] = gettype($PROF_TITULACION->SEARCH()->fetch_array());
	if ($PROF_TITULACION_array_test1['error_obtenido'] === $PROF_TITULACION_array_test1['error_esperado'])
	{
		$PROF_TITULACION_array_test1['resultado'] = 'OK';
	}
	else
	{
		$PROF_TITULACION_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test, $PROF_TITULACION_array_test1);

	$PROF_TITULACION->DELETE();

}

	
	PROF_TITULACION_ADD_test();
	PROF_TITULACION_RellenaDatos_test();
	PROF_TITULACION_Edit_test();
	PROF_TITULACION_Delete_test();
	PROF_TITULACION_Search_test();


?>


