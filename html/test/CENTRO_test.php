<?php

//Clase : CENTRO_test
//Creado el : 20-11-2019
//Creado por: grvidal
//Fichero de test de unidad de la entidad CENTRO
//	Saca por pantalla el resultado de los test
//-------------------------------------------------------
	include '../Model/CENTRO_Model.php';

// function CENTRO_Register_test()
// Valida:
//		usuario ya existe
//		el usuario no existe
//		

function CENTRO_ADD_test()
{

	global $ERRORS_array_test;
// creo array de almacen de test individual
	$CENTRO_array_test1 = array();

// Comprobar el login existe
	$CENTRO_array_test1['entidad'] = 'CENTRO';	
	$CENTRO_array_test1['metodo'] = 'ADD';
	$CENTRO_array_test1['error'] = 'El usuario ya existe';
	$CENTRO_array_test1['error_esperado'] = 'Inserción fallida: el elemento ya existe';
	$CENTRO_array_test1['error_obtenido'] = '';
	$CENTRO_array_test1['resultado'] = '';

	
	// Relleno los datos de usuario	
	$login = 'miusuario';
	$codEdi = 'CodEdi';
	$nombre = 'minombre'; 
	$apellidos = 'miapellido';
	$email = 'miemail';
// creo el modelo
	$CENTRO = new CENTRO_Model($login,$codEdi,$nombre,$email,$apellidos);
// inserto la tupla
	$CENTRO->ADD();

	$CENTRO_array_test1['error_obtenido'] = $CENTRO->ADD();
	if ($CENTRO_array_test1['error_obtenido'] === $CENTRO_array_test1['error_esperado'])
	{
		$CENTRO_array_test1['resultado'] = 'OK';
	}
	else
	{
		$CENTRO_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test, $CENTRO_array_test1);

	$CENTRO->DELETE();	


// Comprobar error en la inserción
	$CENTRO_array_test1['entidad'] = 'CENTRO';	
	$CENTRO_array_test1['metodo'] = 'ADD';
	$CENTRO_array_test1['error'] = 'Error en la inserción';
	$CENTRO_array_test1['error_esperado'] = 'Error de gestor de base de datos';
	$CENTRO_array_test1['error_obtenido'] = '';
	$CENTRO_array_test1['resultado'] = '';
	
	$login = 'jrodeiro\' , \'lklkjlkjasdasdadasds';
	$codEdi = 'CodEdi23';
	$nombre = 'javkdfalkj'; 
	$apellidos = 'rodeiro';
	$email = 'jrodeiro';

	$CENTRO = new CENTRO_Model($login,$codEdi,$nombre,$apellidos,'');
	$CENTRO_array_test1['error_obtenido'] = $CENTRO->ADD();
	if ($CENTRO_array_test1['error_obtenido'] === $CENTRO_array_test1['error_esperado'])
	{
		$CENTRO_array_test1['resultado'] = 'OK';
	}
	else
	{
		$CENTRO_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test, $CENTRO_array_test1);	

	$CENTRO->DELETE();

// Comprobar Inserción realizada con éxito
	$CENTRO_array_test1['entidad'] = 'CENTRO';	
	$CENTRO_array_test1['metodo'] = 'ADD';
	$CENTRO_array_test1['error'] = 'Inserción realizada con éxito';
	$CENTRO_array_test1['error_esperado'] = 'Inserción realizada con éxito';
	$CENTRO_array_test1['error_obtenido'] = '';
	$CENTRO_array_test1['resultado'] = '';
	
	$login = 'jrodeiro1';
	$codEdi = 'CodEdi';
	$nombre = 'javi'; 
	$apellidos = 'rodeiro';
	$email = 'jrodeiro1';

	$CENTRO = new CENTRO_Model($login,$codEdi,$nombre,$apellidos,$email);
	$CENTRO_array_test1['error_obtenido'] = $CENTRO->ADD();
	if ($CENTRO_array_test1['error_obtenido'] === $CENTRO_array_test1['error_esperado'])
	{
		$CENTRO_array_test1['resultado'] = 'OK';
	}
	else
	{
		$CENTRO_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test, $CENTRO_array_test1);

	$CENTRO->DELETE();


}


// function CENTRO_RellenaDatos_test()
// Valida:
//		el usuario a rellenar no existe
//		Devuelve recordset
//		

function CENTRO_RellenaDatos_test()
{

	global $ERRORS_array_test;
// creo array de almacen de test individual
	$CENTRO_array_test1 = array();

// Comprobar el login no existe
//--------------------------------------------------
	$CENTRO_array_test1['entidad'] = 'CENTRO';	
	$CENTRO_array_test1['metodo'] = 'RellenaDatos';
	$CENTRO_array_test1['error'] = 'El usuario a rellenar no existe';
	$CENTRO_array_test1['error_esperado'] = 'Error de gestor de base de datos';
	$CENTRO_array_test1['error_obtenido'] = '';
	$CENTRO_array_test1['resultado'] = '';
	
	// Relleno los datos de usuario	
	$login = 'hola\' , \' que tal';
	$codigo = 'CodEdi';
	
// creo el modelo
	$CENTRO = new CENTRO_Model($login,$codigo,'nom','dir','resp');

	$CENTRO_array_test1['error_obtenido'] = $CENTRO->RellenaDatos();
	if ($CENTRO_array_test1['error_obtenido'] == $CENTRO_array_test1['error_esperado'])
	{
		$CENTRO_array_test1['resultado'] = 'OK';
	}
	else
	{
		$CENTRO_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test, $CENTRO_array_test1);

// Comprobar devuelve recordset
//----------------------------------------------
	$CENTRO_array_test1['entidad'] = 'CENTRO';	
	$CENTRO_array_test1['metodo'] = 'RellenaDatos';
	$CENTRO_array_test1['error'] = 'Devuelve el recordset';
	$CENTRO_array_test1['error_esperado'] = 'array';
	$CENTRO_array_test1['error_obtenido'] = '';
	$CENTRO_array_test1['resultado'] = '';
	
	$login = 'jrodeiro1';
	$codEdi = 'CodEdi';
	$nombre = 'javi'; 
	$apellidos = 'rodeiro';
	$email = 'jrodeiro1';

	$CENTRO = new CENTRO_Model($login,$codEdi,$nombre,$apellidos,$email);
	$CENTRO->ADD();


	$CENTRO_array_test1['error_obtenido'] = gettype($CENTRO->RellenaDatos());
	if ($CENTRO_array_test1['error_obtenido'] === $CENTRO_array_test1['error_esperado'])
	{
		$CENTRO_array_test1['resultado'] = 'OK';
	}
	else
	{
		$CENTRO_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test, $CENTRO_array_test1);

	$CENTRO->DELETE();

}

// function CENTRO_Delete_test()
// Valida:
//		Borrado realizado con exito
//		Error de gestor de base de datos
//		

function CENTRO_Delete_test()
{

	global $ERRORS_array_test;
// creo array de almacen de test individual
	$CENTRO_array_test1 = array();

// Usuario no encontrado
//--------------------------------------------------
	$CENTRO_array_test1['entidad'] = 'CENTRO';	
	$CENTRO_array_test1['metodo'] = 'Delete';
	$CENTRO_array_test1['error'] = 'Usuario no encontrado';
	$CENTRO_array_test1['error_esperado'] = 'Error de gestor de base de datos';
	$CENTRO_array_test1['error_obtenido'] = '';
	$CENTRO_array_test1['resultado'] = '';
	
	// Relleno los datos de usuario	
	$login = 'grvidal25';
	$codEdi = 'CodEdi';
	
// creo el modelo
	$CENTRO = new CENTRO_Model($login,$codEdi,'nom','dir','resp');

//Elimino al usuario
	$CENTRO_array_test1['error_obtenido'] = $CENTRO->DELETE();
	if ($CENTRO_array_test1['error_obtenido'] === $CENTRO_array_test1['error_esperado'])
	{
		$CENTRO_array_test1['resultado'] = 'OK';
	}
	else
	{
		$CENTRO_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test, $CENTRO_array_test1);

// Usuario eliminado
//----------------------------------------------
	$CENTRO_array_test1['entidad'] = 'CENTRO';	
	$CENTRO_array_test1['metodo'] = 'Delete';
	$CENTRO_array_test1['error'] = 'Eliminado';
	$CENTRO_array_test1['error_esperado'] = 'Borrado realizado con éxito';
	$CENTRO_array_test1['error_obtenido'] = '';
	$CENTRO_array_test1['resultado'] = '';
	
	$login = 'grvidal25';
	$codEdi = 'CodEdi';
	$CENTRO = new CENTRO_Model($login,$codEdi,'nom','dir','resp');
	$CENTRO->ADD();

	$CENTRO_array_test1['error_obtenido'] = $CENTRO->DELETE();
	if ($CENTRO_array_test1['error_obtenido'] === $CENTRO_array_test1['error_esperado'])
	{
		$CENTRO_array_test1['resultado'] = 'OK';
	}
	else
	{
		$CENTRO_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test, $CENTRO_array_test1);

	$CENTRO->DELETE();

}


function CENTRO_Edit_test()
{

	global $ERRORS_array_test;
// creo array de almacen de test individual
	$CENTRO_array_test1 = array();

// Comprobar el login no existe
//--------------------------------------------------
	$CENTRO_array_test1['entidad'] = 'CENTRO';	
	$CENTRO_array_test1['metodo'] = 'Edit';
	$CENTRO_array_test1['error'] = 'Usuario no existente';
	$CENTRO_array_test1['error_esperado'] = 'Error de gestor de base de datos';
	$CENTRO_array_test1['error_obtenido'] = '';
	$CENTRO_array_test1['resultado'] = '';
	
	// Relleno los datos de usuario	
	$login = 'grvidal25';
	$codEdi = 'CodEdi';
	
// creo el modelo sin añadirlo a la base de datos
	$editado = new CENTRO_Model($login,$codEdi,'nom','dir','resp');

//Intento editar la tupla
	$CENTRO_array_test1['error_obtenido'] = $editado->EDIT();
	if ($CENTRO_array_test1['error_obtenido'] === $CENTRO_array_test1['error_esperado'])
	{
		$CENTRO_array_test1['resultado'] = 'OK';
	}
	else
	{
		$CENTRO_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test, $CENTRO_array_test1);

// El usuario no existe en la base de datos
//----------------------------------------------
	$CENTRO_array_test1['entidad'] = 'CENTRO';	
	$CENTRO_array_test1['metodo'] = 'Edit';
	$CENTRO_array_test1['error'] = 'La tupla se ha actualizado';
	$CENTRO_array_test1['error_esperado'] = 'Actualización realizada con éxito';
	$CENTRO_array_test1['error_obtenido'] = '';
	$CENTRO_array_test1['resultado'] = '';
	
	$login = 'grvidal25';
	$codEdi = 'CodEdi';

	$CENTRO = new CENTRO_Model($login,$codEdi,'nom','dir','resp');
	
	//Lo añado a la base de datos
	$CENTRO->ADD();
	$CENTRO_array_test1['error_obtenido'] = $CENTRO->EDIT();
	if ($CENTRO_array_test1['error_obtenido'] === $CENTRO_array_test1['error_esperado'])
	{
		$CENTRO_array_test1['resultado'] = 'OK';
	}
	else
	{
		$CENTRO_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test, $CENTRO_array_test1);

	$CENTRO->DELETE();

}

function CENTRO_Search_test()
{

	global $ERRORS_array_test;
// creo array de almacen de test individual
	$CENTRO_array_test1 = array();

// Comprobar el centro error
//--------------------------------------------------
	$CENTRO_array_test1['entidad'] = 'CENTRO';	
	$CENTRO_array_test1['metodo'] = 'Search';
	$CENTRO_array_test1['error'] = 'Error de gestor de base de datos';
	$CENTRO_array_test1['error_esperado'] = 'Error de gestor de base de datos';
	$CENTRO_array_test1['error_obtenido'] = '';
	$CENTRO_array_test1['resultado'] = '';
	
	// Relleno los datos de usuario	
	$login = 'grvidal25\' , \'asd';
	$codEdi = 'CodEdi';
	
// creo el modelo sin añadirlo a la base de datos
	$CENTRO = new CENTRO_Model($login,$codEdi,'nom','dir','resp');

//Intento buscar la tupla
	$CENTRO_array_test1['error_obtenido'] = $CENTRO->SEARCH();
	if ($CENTRO_array_test1['error_obtenido'] === $CENTRO_array_test1['error_esperado'])
	{
		$CENTRO_array_test1['resultado'] = 'OK';
	}
	else
	{
		$CENTRO_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test, $CENTRO_array_test1);

// encontrar el centro en search
//----------------------------------------------
	$CENTRO_array_test1['entidad'] = 'CENTRO';	
	$CENTRO_array_test1['metodo'] = 'Search';
	$CENTRO_array_test1['error'] = 'Devuelve el recordset';
	$CENTRO_array_test1['error_esperado'] = 'array';
	$CENTRO_array_test1['error_obtenido'] = '';
	$CENTRO_array_test1['resultado'] = '';
	
	$login = 'miCenTest';
	$codEdi = 'CodEdi';

	$CENTRO = new CENTRO_Model($login,$codEdi,'nom','dir','resp');
	
	//Lo añado a la base de datos
	$CENTRO->ADD();

	$CENTRO_array_test1['error_obtenido'] = gettype($CENTRO->SEARCH()->fetch_array());
	if ($CENTRO_array_test1['error_obtenido'] === $CENTRO_array_test1['error_esperado'])
	{
		$CENTRO_array_test1['resultado'] = 'OK';
	}
	else
	{
		$CENTRO_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test, $CENTRO_array_test1);

	$CENTRO->DELETE();

}

	
	
	CENTRO_ADD_test();
	CENTRO_RellenaDatos_test();
	CENTRO_Edit_test();
	CENTRO_Delete_test();
	CENTRO_Search_test();
	$CENTRO = new CENTRO_Model("CodCent","CodEdi",'nom','dir','resp');
	$CENTRO->ADD();

?>


