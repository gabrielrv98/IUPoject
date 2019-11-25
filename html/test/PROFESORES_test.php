<?php
//Clase : PROFESOR_test
//Creado el : 20-11-2019
//Creado por: grvidal
//Fichero de test de unidad de la entidad PROFESOR
//	Saca por pantalla el resultado de los test
//-------------------------------------------------------
	include '../Model/PROFESOR_Model.php';

// function PROFESOR_Register_test()
// Valida:
//		usuario ya existe
//		el usuario no existe
//		

function PROFESOR_ADD_test()
{

	global $ERRORS_array_test;
// creo array de almacen de test individual
	$PROFESOR_array_test1 = array();

// Comprobar el codigo existe
    $PROFESOR_array_test1['entidad'] = 'PROFESOR';
    $PROFESOR_array_test1['tipo'] = 'P_UNITARIA';
	$PROFESOR_array_test1['metodo'] = 'ADD';
	$PROFESOR_array_test1['error'] = 'El usuario ya existe';
	$PROFESOR_array_test1['error_esperado'] = 'Inserción fallida: el elemento ya existe';
	$PROFESOR_array_test1['error_obtenido'] = '';
	$PROFESOR_array_test1['resultado'] = '';

	
	// Relleno los datos de usuario	
	$DNI = '09635517N';
	$nombre = 'nombre';
	$apellido = 'apellido'; 
	$area = 'area';
	$dep = 'dep';
// creo el modelo
	$PROFESOR = new PROFESOR_Model($DNI,$nombre,$apellido,$area,$dep);
// inserto la tupla
	$PROFESOR->ADD();

	$PROFESOR_array_test1['error_obtenido'] = $PROFESOR->ADD();
	if ($PROFESOR_array_test1['error_obtenido'] === $PROFESOR_array_test1['error_esperado'])
	{
		$PROFESOR_array_test1['resultado'] = 'OK';
	}
	else
	{
		$PROFESOR_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test, $PROFESOR_array_test1);

	echo $PROFESOR->DELETE();	


// Comprobar Inserción realizada con éxito
	$PROFESOR_array_test1['entidad'] = 'PROFESOR';
    $PROFESOR_array_test1['tipo'] = 'P_UNITARIA';	
	$PROFESOR_array_test1['metodo'] = 'ADD';
	$PROFESOR_array_test1['error'] = 'Inserción realizada con éxito';
	$PROFESOR_array_test1['error_esperado'] = 'Inserción realizada con éxito';
	$PROFESOR_array_test1['error_obtenido'] = '';
	$PROFESOR_array_test1['resultado'] = '';
	
	// Relleno los datos de usuario	
	$DNI = '09635517N';
	$nombre = 'nombre';
	$apellido = 'apellido'; 
	$area = 'area';
	$dep = 'dep';
// creo el modelo
	$PROFESOR = new PROFESOR_Model($DNI,$nombre,$apellido,$area,$dep);
	$PROFESOR_array_test1['error_obtenido'] = $PROFESOR->ADD();
	if ($PROFESOR_array_test1['error_obtenido'] === $PROFESOR_array_test1['error_esperado'])
	{
		$PROFESOR_array_test1['resultado'] = 'OK';
	}
	else
	{
		$PROFESOR_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test, $PROFESOR_array_test1);

	$PROFESOR->DELETE();


}


// function PROFESOR_RellenaDatos_test()
// Valida:
//		Devuelve recordset
//		

function PROFESOR_RellenaDatos_test()
{

	global $ERRORS_array_test;
// creo array de almacen de test individual
	$PROFESOR_array_test1 = array();


// Comprobar devuelve recordset
//----------------------------------------------
	$PROFESOR_array_test1['entidad'] = 'PROFESOR';
    $PROFESOR_array_test1['tipo'] = 'P_UNITARIA';	
	$PROFESOR_array_test1['metodo'] = 'RellenaDatos';
	$PROFESOR_array_test1['error'] = 'Devuelve el recordset';
	$PROFESOR_array_test1['error_esperado'] = 'array';
	$PROFESOR_array_test1['error_obtenido'] = '';
	$PROFESOR_array_test1['resultado'] = '';
	
	// Relleno los datos de usuario	
	$DNI = '09635517N';
	$nombre = 'nombre';
	$apellido = 'apellido'; 
	$area = 'area';
	$dep = 'dep';
// creo el modelo
	$PROFESOR = new PROFESOR_Model($DNI,$nombre,$apellido,$area,$dep);
	$PROFESOR->ADD();


	$PROFESOR_array_test1['error_obtenido'] = gettype($PROFESOR->RellenaDatos());
	if ($PROFESOR_array_test1['error_obtenido'] === $PROFESOR_array_test1['error_esperado'])
	{
		$PROFESOR_array_test1['resultado'] = 'OK';
	}
	else
	{
		$PROFESOR_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test, $PROFESOR_array_test1);

	$PROFESOR->DELETE();

}

// function PROFESOR_Delete_test()
// Valida:
//		Borrado realizado con exito
//		Error de gestor de base de datos
//		

function PROFESOR_Delete_test()
{

	global $ERRORS_array_test;
// creo array de almacen de test individual
	$PROFESOR_array_test1 = array();

// Usuario no encontrado
//--------------------------------------------------
	$PROFESOR_array_test1['entidad'] = 'PROFESOR';
    $PROFESOR_array_test1['tipo'] = 'P_UNITARIA';	
	$PROFESOR_array_test1['metodo'] = 'Delete';
	$PROFESOR_array_test1['error'] = 'Usuario no encontrado';
	$PROFESOR_array_test1['error_esperado'] = 'Error de gestor de base de datos';
	$PROFESOR_array_test1['error_obtenido'] = '';
	$PROFESOR_array_test1['resultado'] = '';
	
	// Relleno los datos de usuario	
	$DNI = '09635517N';
	$nombre = 'nombre';
	$apellido = 'apellido'; 
	$area = 'area';
	$dep = 'dep';
// creo el modelo
	$PROFESOR = new PROFESOR_Model($DNI,$nombre,$apellido,$area,$dep);

//Elimino al usuario
	$PROFESOR_array_test1['error_obtenido'] = $PROFESOR->DELETE();
	if ($PROFESOR_array_test1['error_obtenido'] === $PROFESOR_array_test1['error_esperado'])
	{
		$PROFESOR_array_test1['resultado'] = 'OK';
	}
	else
	{
		$PROFESOR_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test, $PROFESOR_array_test1);

// Usuario eliminado
//----------------------------------------------
	$PROFESOR_array_test1['entidad'] = 'PROFESOR';
    $PROFESOR_array_test1['tipo'] = 'P_UNITARIA';	
	$PROFESOR_array_test1['metodo'] = 'Delete';
	$PROFESOR_array_test1['error'] = 'Eliminado';
	$PROFESOR_array_test1['error_esperado'] = 'Borrado realizado con éxito';
	$PROFESOR_array_test1['error_obtenido'] = '';
	$PROFESOR_array_test1['resultado'] = '';
	
	// Relleno los datos de usuario	
	$DNI = '09635517N';
	$nombre = 'nombre';
	$apellido = 'apellido'; 
	$area = 'area';
	$dep = 'dep';
// creo el modelo
	$PROFESOR = new PROFESOR_Model($DNI,$nombre,$apellido,$area,$dep);
	$PROFESOR->ADD();

	$PROFESOR_array_test1['error_obtenido'] = $PROFESOR->DELETE();
	if ($PROFESOR_array_test1['error_obtenido'] === $PROFESOR_array_test1['error_esperado'])
	{
		$PROFESOR_array_test1['resultado'] = 'OK';
	}
	else
	{
		$PROFESOR_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test, $PROFESOR_array_test1);

	$PROFESOR->DELETE();

}


function PROFESOR_Edit_test()
{

	global $ERRORS_array_test;
// creo array de almacen de test individual
	$PROFESOR_array_test1 = array();

// Comprobar el login no existe
//--------------------------------------------------
	$PROFESOR_array_test1['entidad'] = 'PROFESOR';
    $PROFESOR_array_test1['tipo'] = 'P_UNITARIA';	
	$PROFESOR_array_test1['metodo'] = 'Edit';
	$PROFESOR_array_test1['error'] = 'PROFESOR no existente';
	$PROFESOR_array_test1['error_esperado'] = 'Error de gestor de base de datos';
	$PROFESOR_array_test1['error_obtenido'] = '';
	$PROFESOR_array_test1['resultado'] = '';
	
	// Relleno los datos de usuario	
	$DNI = '09635517N';
	$nombre = 'nombre';
	$apellido = 'apellido'; 
	$area = 'area';
	$dep = 'dep';
// creo el modelo
	$PROFESOR = new PROFESOR_Model($DNI,$nombre,$apellido,$area,$dep);

//Intento editar la tupla
	$PROFESOR_array_test1['error_obtenido'] = $PROFESOR->EDIT();
	if ($PROFESOR_array_test1['error_obtenido'] === $PROFESOR_array_test1['error_esperado'])
	{
		$PROFESOR_array_test1['resultado'] = 'OK';
	}
	else
	{
		$PROFESOR_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test, $PROFESOR_array_test1);

// El usuario no existe en la base de datos
//----------------------------------------------
	$PROFESOR_array_test1['entidad'] = 'PROFESOR';
    $PROFESOR_array_test1['tipo'] = 'P_UNITARIA';	
	$PROFESOR_array_test1['metodo'] = 'Edit';
	$PROFESOR_array_test1['error'] = 'La tupla se ha actualizado';
	$PROFESOR_array_test1['error_esperado'] = 'Actualización realizada con éxito';
	$PROFESOR_array_test1['error_obtenido'] = '';
	$PROFESOR_array_test1['resultado'] = '';
	
	// Relleno los datos de usuario	
	$DNI = '09635517N';
	$nombre = 'nombre';
	$apellido = 'apellido'; 
	$area = 'area';
	$dep = 'dep';
// creo el modelo
	$PROFESOR = new PROFESOR_Model($DNI,$nombre,$apellido,$area,$dep);
	
	//Lo añado a la base de datos
	$PROFESOR->ADD();
	
	$PROFESOR_array_test1['error_obtenido'] = $PROFESOR->EDIT();
	if ($PROFESOR_array_test1['error_obtenido'] === $PROFESOR_array_test1['error_esperado'])
	{
		$PROFESOR_array_test1['resultado'] = 'OK';
	}
	else
	{
		$PROFESOR_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test, $PROFESOR_array_test1);

	$PROFESOR->DELETE();

}

function PROFESOR_Search_test()
{

	global $ERRORS_array_test;
// creo array de almacen de test individual
	$PROFESOR_array_test1 = array();

// Comprobar el PROFESOR error
//--------------------------------------------------
	$PROFESOR_array_test1['entidad'] = 'PROFESOR';
    $PROFESOR_array_test1['tipo'] = 'P_UNITARIA';	
	$PROFESOR_array_test1['metodo'] = 'Search';
	$PROFESOR_array_test1['error'] = 'Error de gestor de base de datos';
	$PROFESOR_array_test1['error_esperado'] = 'Error de gestor de base de datos';
	$PROFESOR_array_test1['error_obtenido'] = '';
	$PROFESOR_array_test1['resultado'] = '';
	
	// Relleno los datos de usuario	
	$DNI = '09635517N';
	$nombre = 'grvidal25\' , \'asd';
	$apellido = 'apellido'; 
	$area = 'area';
	$dep = 'dep';
// creo el modelo
	$PROFESOR = new PROFESOR_Model($DNI,$nombre,$apellido,$area,$dep);

//Intento buscar la tupla
	$PROFESOR_array_test1['error_obtenido'] = $PROFESOR->SEARCH();
	if ($PROFESOR_array_test1['error_obtenido'] === $PROFESOR_array_test1['error_esperado'])
	{
		$PROFESOR_array_test1['resultado'] = 'OK';
	}
	else
	{
		$PROFESOR_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test, $PROFESOR_array_test1);

// encontrar el PROFESOR en search
//----------------------------------------------
	$PROFESOR_array_test1['entidad'] = 'PROFESOR';
    $PROFESOR_array_test1['tipo'] = 'P_UNITARIA';	
	$PROFESOR_array_test1['metodo'] = 'Search';
	$PROFESOR_array_test1['error'] = 'Devuelve el recordset';
	$PROFESOR_array_test1['error_esperado'] = 'array';
	$PROFESOR_array_test1['error_obtenido'] = '';
	$PROFESOR_array_test1['resultado'] = '';
	
	// Relleno los datos de usuario	
	$DNI = '09635517N';
	$nombre = 'grvidalasd';
	$apellido = 'apellido'; 
	$area = 'area';
	$dep = 'dep';
// creo el modelo
	$PROFESOR = new PROFESOR_Model($DNI,$nombre,$apellido,$area,$dep);
	
	//Lo añado a la base de datos
	$PROFESOR->ADD();

	$PROFESOR_array_test1['error_obtenido'] = gettype($PROFESOR->SEARCH()->fetch_array());
	if ($PROFESOR_array_test1['error_obtenido'] === $PROFESOR_array_test1['error_esperado'])
	{
		$PROFESOR_array_test1['resultado'] = 'OK';
	}
	else
	{
		$PROFESOR_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test, $PROFESOR_array_test1);

	$PROFESOR->DELETE();

}

	
	PROFESOR_ADD_test();
	PROFESOR_RellenaDatos_test();
	PROFESOR_Edit_test();
	PROFESOR_Delete_test();
	PROFESOR_Search_test();

	// creo el modelo
	$PROFESOR = new PROFESOR_Model('09635517N','grvidalasd','apellido','area','dep');
	$PROFESOR->ADD();

?>


