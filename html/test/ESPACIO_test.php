<?php
//Clase : ESPACIO_test
//Creado el : 20-11-2019
//Creado por: grvidal
//Fichero de test de unidad de la entidad ESPACIO
//	Saca por pantalla el resultado de los test
//-------------------------------------------------------
	include '../Model/ESPACIO_Model.php';

// function ESPACIO_Register_test()
// Valida:
//		usuario ya existe
//		el usuario no existe
//		

function ESPACIO_ADD_test()
{

	global $ERRORS_array_test;
// creo array de almacen de test individual
	$ESPACIO_array_test1 = array();

// Comprobar el codigo existe
    $ESPACIO_array_test1['entidad'] = 'ESPACIO';
    $ESPACIO_array_test1['tipo'] = 'P_UNITARIA';
	$ESPACIO_array_test1['metodo'] = 'ADD';
	$ESPACIO_array_test1['error'] = 'El usuario ya existe';
	$ESPACIO_array_test1['error_esperado'] = 'Inserción fallida: el elemento ya existe';
	$ESPACIO_array_test1['error_obtenido'] = '';
	$ESPACIO_array_test1['resultado'] = '';

	
	// Relleno los datos de usuario	
	$codEsp = 'codEsp';
	$codEDI = 'CodEdi';
	$codCent = 'CodCent'; 
	$tipo = 'PAS';
	$superficie = '12';
	$numInv = '2';
// creo el modelo
	$ESPACIO = new ESPACIO_Model($codEsp,$codEDI,$codCent,$tipo,$superficie,$numInv);
// inserto la tupla
	$ESPACIO->ADD();

	$ESPACIO_array_test1['error_obtenido'] = $ESPACIO->ADD();
	if ($ESPACIO_array_test1['error_obtenido'] === $ESPACIO_array_test1['error_esperado'])
	{
		$ESPACIO_array_test1['resultado'] = 'OK';
	}
	else
	{
		$ESPACIO_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test, $ESPACIO_array_test1);

	$ESPACIO->DELETE();	


// Comprobar Inserción realizada con éxito
	$ESPACIO_array_test1['entidad'] = 'ESPACIO';
    $ESPACIO_array_test1['tipo'] = 'P_UNITARIA';	
	$ESPACIO_array_test1['metodo'] = 'ADD';
	$ESPACIO_array_test1['error'] = 'Inserción realizada con éxito';
	$ESPACIO_array_test1['error_esperado'] = 'Inserción realizada con éxito';
	$ESPACIO_array_test1['error_obtenido'] = '';
	$ESPACIO_array_test1['resultado'] = '';
	
	// Relleno los datos de usuario	
	$codEsp = 'codEsp';
	$codEDI = 'CodEdi';
	$codCent = 'CodCent'; 
	$tipo = 'PAS';
	$superficie = '12';
	$numInv = '2';
// creo el modelo
	$ESPACIO = new ESPACIO_Model($codEsp,$codEDI,$codCent,$tipo,$superficie,$numInv);
	$ESPACIO_array_test1['error_obtenido'] = $ESPACIO->ADD();
	if ($ESPACIO_array_test1['error_obtenido'] === $ESPACIO_array_test1['error_esperado'])
	{
		$ESPACIO_array_test1['resultado'] = 'OK';
	}
	else
	{
		$ESPACIO_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test, $ESPACIO_array_test1);

	$ESPACIO->DELETE();


}


// function ESPACIO_RellenaDatos_test()
// Valida:
//		el usuario a rellenar no existe
//		Devuelve recordset
//		

function ESPACIO_RellenaDatos_test()
{

	global $ERRORS_array_test;
// creo array de almacen de test individual
	$ESPACIO_array_test1 = array();


// Comprobar devuelve recordset
//----------------------------------------------
	$ESPACIO_array_test1['entidad'] = 'ESPACIO';
    $ESPACIO_array_test1['tipo'] = 'P_UNITARIA';	
	$ESPACIO_array_test1['metodo'] = 'RellenaDatos';
	$ESPACIO_array_test1['error'] = 'Devuelve el recordset';
	$ESPACIO_array_test1['error_esperado'] = 'array';
	$ESPACIO_array_test1['error_obtenido'] = '';
	$ESPACIO_array_test1['resultado'] = '';
	
	// Relleno los datos de usuario	
	$codEsp = 'codEsp';
	$codEDI = 'CodEdi';
	$codCent = 'CodCent'; 
	$tipo = 'PAS';
	$superficie = '12';
	$numInv = '2';
// creo el modelo
	$ESPACIO = new ESPACIO_Model($codEsp,$codEDI,$codCent,$tipo,$superficie,$numInv);
	$ESPACIO->ADD();


	$ESPACIO_array_test1['error_obtenido'] = gettype($ESPACIO->RellenaDatos());
	if ($ESPACIO_array_test1['error_obtenido'] === $ESPACIO_array_test1['error_esperado'])
	{
		$ESPACIO_array_test1['resultado'] = 'OK';
	}
	else
	{
		$ESPACIO_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test, $ESPACIO_array_test1);

	$ESPACIO->DELETE();

}

// function ESPACIO_Delete_test()
// Valida:
//		Borrado realizado con exito
//		Error de gestor de base de datos
//		

function ESPACIO_Delete_test()
{

	global $ERRORS_array_test;
// creo array de almacen de test individual
	$ESPACIO_array_test1 = array();

// Usuario no encontrado
//--------------------------------------------------
	$ESPACIO_array_test1['entidad'] = 'ESPACIO';
    $ESPACIO_array_test1['tipo'] = 'P_UNITARIA';	
	$ESPACIO_array_test1['metodo'] = 'Delete';
	$ESPACIO_array_test1['error'] = 'Usuario no encontrado';
	$ESPACIO_array_test1['error_esperado'] = 'Error de gestor de base de datos';
	$ESPACIO_array_test1['error_obtenido'] = '';
	$ESPACIO_array_test1['resultado'] = '';
	
	// Relleno los datos de usuario	
	$codEsp = 'codESp';
	
// creo el modelo
	$ESPACIO = new ESPACIO_Model($codEsp,'','','','','');

//Elimino al usuario
	$ESPACIO_array_test1['error_obtenido'] = $ESPACIO->DELETE();
	if ($ESPACIO_array_test1['error_obtenido'] === $ESPACIO_array_test1['error_esperado'])
	{
		$ESPACIO_array_test1['resultado'] = 'OK';
	}
	else
	{
		$ESPACIO_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test, $ESPACIO_array_test1);

// Usuario eliminado
//----------------------------------------------
	$ESPACIO_array_test1['entidad'] = 'ESPACIO';
    $ESPACIO_array_test1['tipo'] = 'P_UNITARIA';	
	$ESPACIO_array_test1['metodo'] = 'Delete';
	$ESPACIO_array_test1['error'] = 'Eliminado';
	$ESPACIO_array_test1['error_esperado'] = 'Borrado realizado con éxito';
	$ESPACIO_array_test1['error_obtenido'] = '';
	$ESPACIO_array_test1['resultado'] = '';
	
	// Relleno los datos de usuario	
	$codEsp = 'codEsp';
	$codEDI = 'CodEdi';
	$codCent = 'CodCent'; 
	$tipo = 'PAS';
	$superficie = '12';
	$numInv = '2';
// creo el modelo
	$ESPACIO = new ESPACIO_Model($codEsp,$codEDI,$codCent,$tipo,$superficie,$numInv);
	$ESPACIO->ADD();

	$ESPACIO_array_test1['error_obtenido'] = $ESPACIO->DELETE();
	if ($ESPACIO_array_test1['error_obtenido'] === $ESPACIO_array_test1['error_esperado'])
	{
		$ESPACIO_array_test1['resultado'] = 'OK';
	}
	else
	{
		$ESPACIO_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test, $ESPACIO_array_test1);

	$ESPACIO->DELETE();

}


function ESPACIO_Edit_test()
{

	global $ERRORS_array_test;
// creo array de almacen de test individual
	$ESPACIO_array_test1 = array();

// Comprobar el login no existe
//--------------------------------------------------
	$ESPACIO_array_test1['entidad'] = 'ESPACIO';
    $ESPACIO_array_test1['tipo'] = 'P_UNITARIA';	
	$ESPACIO_array_test1['metodo'] = 'Edit';
	$ESPACIO_array_test1['error'] = 'ESPACIO no existente';
	$ESPACIO_array_test1['error_esperado'] = 'Error de gestor de base de datos';
	$ESPACIO_array_test1['error_obtenido'] = '';
	$ESPACIO_array_test1['resultado'] = '';
	
	// Relleno los datos de usuario	
	$codEsp = 'codEsp';
	$codEDI = 'CodEdi';
	$codCent = 'CodCent'; 
	$tipo = 'PAS';
	$superficie = '12';
	$numInv = '2';
// creo el modelo
	$ESPACIO = new ESPACIO_Model($codEsp,$codEDI,$codCent,$tipo,$superficie,$numInv);

//Intento editar la tupla
	$ESPACIO_array_test1['error_obtenido'] = $ESPACIO->EDIT();
	if ($ESPACIO_array_test1['error_obtenido'] === $ESPACIO_array_test1['error_esperado'])
	{
		$ESPACIO_array_test1['resultado'] = 'OK';
	}
	else
	{
		$ESPACIO_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test, $ESPACIO_array_test1);

// El usuario no existe en la base de datos
//----------------------------------------------
	$ESPACIO_array_test1['entidad'] = 'ESPACIO';
    $ESPACIO_array_test1['tipo'] = 'P_UNITARIA';	
	$ESPACIO_array_test1['metodo'] = 'Edit';
	$ESPACIO_array_test1['error'] = 'La tupla se ha actualizado';
	$ESPACIO_array_test1['error_esperado'] = 'Actualización realizada con éxito';
	$ESPACIO_array_test1['error_obtenido'] = '';
	$ESPACIO_array_test1['resultado'] = '';
	
	// Relleno los datos de usuario	
	$codEsp = 'codEsp';
	$codEDI = 'CodEdi';
	$codCent = 'CodCent'; 
	$tipo = 'PAS';
	$superficie = '12';
	$numInv = '2';
// creo el modelo
	$ESPACIO = new ESPACIO_Model($codEsp,$codEDI,$codCent,$tipo,$superficie,$numInv);
	
	//Lo añado a la base de datos
	$ESPACIO->ADD();
	
	$ESPACIO_array_test1['error_obtenido'] = $ESPACIO->EDIT();
	if ($ESPACIO_array_test1['error_obtenido'] === $ESPACIO_array_test1['error_esperado'])
	{
		$ESPACIO_array_test1['resultado'] = 'OK';
	}
	else
	{
		$ESPACIO_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test, $ESPACIO_array_test1);

	$ESPACIO->DELETE();

}

function ESPACIO_Search_test()
{

	global $ERRORS_array_test;
// creo array de almacen de test individual
	$ESPACIO_array_test1 = array();

// Comprobar el ESPACIO error
//--------------------------------------------------
	$ESPACIO_array_test1['entidad'] = 'ESPACIO';
    $ESPACIO_array_test1['tipo'] = 'P_UNITARIA';	
	$ESPACIO_array_test1['metodo'] = 'Search';
	$ESPACIO_array_test1['error'] = 'Error de gestor de base de datos';
	$ESPACIO_array_test1['error_esperado'] = 'Error de gestor de base de datos';
	$ESPACIO_array_test1['error_obtenido'] = '';
	$ESPACIO_array_test1['resultado'] = '';
	
	// Relleno los datos de usuario	
	$login = 'grvidal25\' , \'asd';
	$codEDI = 'CodEdi';
	
// creo el modelo sin añadirlo a la base de datos
	$ESPACIO = new ESPACIO_Model($login,$codEDI,'','','','');

//Intento buscar la tupla
	$ESPACIO_array_test1['error_obtenido'] = $ESPACIO->SEARCH();
	if ($ESPACIO_array_test1['error_obtenido'] === $ESPACIO_array_test1['error_esperado'])
	{
		$ESPACIO_array_test1['resultado'] = 'OK';
	}
	else
	{
		$ESPACIO_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test, $ESPACIO_array_test1);

// encontrar el ESPACIO en search
//----------------------------------------------
	$ESPACIO_array_test1['entidad'] = 'ESPACIO';
    $ESPACIO_array_test1['tipo'] = 'P_UNITARIA';	
	$ESPACIO_array_test1['metodo'] = 'Search';
	$ESPACIO_array_test1['error'] = 'Devuelve el recordset';
	$ESPACIO_array_test1['error_esperado'] = 'array';
	$ESPACIO_array_test1['error_obtenido'] = '';
	$ESPACIO_array_test1['resultado'] = '';
	
	// Relleno los datos de usuario	
	$codEsp = 'codEsp';
	$codEDI = 'CodEdi';
	$codCent = 'CodCent'; 
	$tipo = 'PAS';
	$superficie = '12';
	$numInv = '2';
// creo el modelo
	$ESPACIO = new ESPACIO_Model($codEsp,$codEDI,$codCent,$tipo,$superficie,$numInv);
	
	//Lo añado a la base de datos
	$ESPACIO->ADD();

	$ESPACIO_array_test1['error_obtenido'] = gettype($ESPACIO->SEARCH()->fetch_array());
	if ($ESPACIO_array_test1['error_obtenido'] === $ESPACIO_array_test1['error_esperado'])
	{
		$ESPACIO_array_test1['resultado'] = 'OK';
	}
	else
	{
		$ESPACIO_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test, $ESPACIO_array_test1);

	$ESPACIO->DELETE();

}

	
	
	ESPACIO_ADD_test();
	ESPACIO_RellenaDatos_test();
	ESPACIO_Edit_test();
	ESPACIO_Delete_test();
	ESPACIO_Search_test();

	// Relleno los datos de usuario	
	$codEsp = 'codEsp';
	$codEDI = 'CodEdi';
	$codCent = 'CodCent'; 
	$tipo = 'PAS';
	$superficie = '12';
	$numInv = '2';
// creo el modelo
	$ESPACIO = new ESPACIO_Model($codEsp,$codEDI,$codCent,$tipo,$superficie,$numInv);
	$ESPACIO->ADD();

?>


