<?php
//Clase : TITULACION_test
//Creado el : 20-11-2019
//Creado por: grvidal
//Fichero de test de unidad de la entidad TITULACION
//	Saca por pantalla el resultado de los test
//-------------------------------------------------------
	include '../Model/TITULACION_Model.php';

// function TITULACION_Register_test()
// Valida:
//		usuario ya existe
//		el usuario no existe
//		

function TITULACION_ADD_test()
{

	global $ERRORS_array_test;
// creo array de almacen de test individual
	$TITULACION_array_test1 = array();

// Comprobar el codigo existe
	$TITULACION_array_test1['entidad'] = 'TITULACION';	
	$TITULACION_array_test1['metodo'] = 'ADD';
	$TITULACION_array_test1['error'] = 'El usuario ya existe';
	$TITULACION_array_test1['error_esperado'] = 'Inserción fallida: el elemento ya existe';
	$TITULACION_array_test1['error_obtenido'] = '';
	$TITULACION_array_test1['resultado'] = '';

	
	// Relleno los datos de usuario	
	$login = 'codTest';
	$CodCent = 'CodCent';
	$nombre = 'nom'; 
	$resp = 'resp';
// creo el modelo
	$TITULACION = new TITULACION_Model($login,$CodCent,$nombre,$resp);
// inserto la tupla
	echo $TITULACION->ADD();

	$TITULACION_array_test1['error_obtenido'] = $TITULACION->ADD();
	if ($TITULACION_array_test1['error_obtenido'] === $TITULACION_array_test1['error_esperado'])
	{
		$TITULACION_array_test1['resultado'] = 'OK';
	}
	else
	{
		$TITULACION_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test, $TITULACION_array_test1);

	$TITULACION->DELETE();	


// Comprobar error en la inserción
	$TITULACION_array_test1['entidad'] = 'TITULACION';	
	$TITULACION_array_test1['metodo'] = 'ADD';
	$TITULACION_array_test1['error'] = 'Error en la inserción';
	$TITULACION_array_test1['error_esperado'] = 'Error de gestor de base de datos';
	$TITULACION_array_test1['error_obtenido'] = '';
	$TITULACION_array_test1['resultado'] = '';
	
	$login = 'jo\',\'lds';
	$CodCent = 'CodCent';
	$nombre = 'javkdfalkj'; 
	$resp = 'rodeiro';

	$TITULACION = new TITULACION_Model($login,$CodCent,$nombre,$resp);
	$TITULACION_array_test1['error_obtenido'] = $TITULACION->ADD();
	if ($TITULACION_array_test1['error_obtenido'] === $TITULACION_array_test1['error_esperado'])
	{
		$TITULACION_array_test1['resultado'] = 'OK';
	}
	else
	{
		$TITULACION_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test, $TITULACION_array_test1);	

	$TITULACION->DELETE();

// Comprobar Inserción realizada con éxito
	$TITULACION_array_test1['entidad'] = 'TITULACION';	
	$TITULACION_array_test1['metodo'] = 'ADD';
	$TITULACION_array_test1['error'] = 'Inserción realizada con éxito';
	$TITULACION_array_test1['error_esperado'] = 'Inserción realizada con éxito';
	$TITULACION_array_test1['error_obtenido'] = '';
	$TITULACION_array_test1['resultado'] = '';
	
	$login = 'jrodeiro1';
	$CodCent = 'CodCent';
	$nombre = 'javi'; 
	$resp = 'rodeiro';

	$TITULACION = new TITULACION_Model($login,$CodCent,$nombre,$resp);
	$TITULACION_array_test1['error_obtenido'] = $TITULACION->ADD();
	if ($TITULACION_array_test1['error_obtenido'] === $TITULACION_array_test1['error_esperado'])
	{
		$TITULACION_array_test1['resultado'] = 'OK';
	}
	else
	{
		$TITULACION_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test, $TITULACION_array_test1);

	$TITULACION->DELETE();


}


// function TITULACION_RellenaDatos_test()
// Valida:
//		el usuario a rellenar no existe
//		Devuelve recordset
//		

function TITULACION_RellenaDatos_test()
{

	global $ERRORS_array_test;
// creo array de almacen de test individual
	$TITULACION_array_test1 = array();

// Comprobar el login no existe
//--------------------------------------------------
	$TITULACION_array_test1['entidad'] = 'TITULACION';	
	$TITULACION_array_test1['metodo'] = 'RellenaDatos';
	$TITULACION_array_test1['error'] = 'El usuario a rellenar no existe';
	$TITULACION_array_test1['error_esperado'] = 'Error de gestor de base de datos';
	$TITULACION_array_test1['error_obtenido'] = '';
	$TITULACION_array_test1['resultado'] = '';
	
	// Relleno los datos de usuario	
	$login = 'hola\' , \' tu';
	$codigo = 'CodCent';
	
// creo el modelo
	$TITULACION = new TITULACION_Model($login,$codigo,'nom','resp');

	$TITULACION_array_test1['error_obtenido'] = $TITULACION->RellenaDatos();
	if ($TITULACION_array_test1['error_obtenido'] == $TITULACION_array_test1['error_esperado'])
	{
		$TITULACION_array_test1['resultado'] = 'OK';
	}
	else
	{
		$TITULACION_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test, $TITULACION_array_test1);

// Comprobar devuelve recordset
//----------------------------------------------
	$TITULACION_array_test1['entidad'] = 'TITULACION';	
	$TITULACION_array_test1['metodo'] = 'RellenaDatos';
	$TITULACION_array_test1['error'] = 'Devuelve el recordset';
	$TITULACION_array_test1['error_esperado'] = 'array';
	$TITULACION_array_test1['error_obtenido'] = '';
	$TITULACION_array_test1['resultado'] = '';
	
	$login = 'jrodeiro1';
	$CodCent = 'CodCent';
	$nombre = 'javi'; 
	$resp = 'rodeiro';

	$TITULACION = new TITULACION_Model($login,$CodCent,$nombre,$resp);
	$TITULACION->ADD();


	$TITULACION_array_test1['error_obtenido'] = gettype($TITULACION->RellenaDatos());
	if ($TITULACION_array_test1['error_obtenido'] === $TITULACION_array_test1['error_esperado'])
	{
		$TITULACION_array_test1['resultado'] = 'OK';
	}
	else
	{
		$TITULACION_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test, $TITULACION_array_test1);

	$TITULACION->DELETE();

}

// function TITULACION_Delete_test()
// Valida:
//		Borrado realizado con exito
//		Error de gestor de base de datos
//		

function TITULACION_Delete_test()
{

	global $ERRORS_array_test;
// creo array de almacen de test individual
	$TITULACION_array_test1 = array();

// Usuario no encontrado
//--------------------------------------------------
	$TITULACION_array_test1['entidad'] = 'TITULACION';	
	$TITULACION_array_test1['metodo'] = 'Delete';
	$TITULACION_array_test1['error'] = 'Usuario no encontrado';
	$TITULACION_array_test1['error_esperado'] = 'Error de gestor de base de datos';
	$TITULACION_array_test1['error_obtenido'] = '';
	$TITULACION_array_test1['resultado'] = '';
	
	// Relleno los datos de usuario	
	$login = 'grvidal25';
	
// creo el modelo
	$TITULACION = new TITULACION_Model($login,'','','','');

//Elimino al usuario
	$TITULACION_array_test1['error_obtenido'] = $TITULACION->DELETE();
	if ($TITULACION_array_test1['error_obtenido'] === $TITULACION_array_test1['error_esperado'])
	{
		$TITULACION_array_test1['resultado'] = 'OK';
	}
	else
	{
		$TITULACION_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test, $TITULACION_array_test1);

// Usuario eliminado
//----------------------------------------------
	$TITULACION_array_test1['entidad'] = 'TITULACION';	
	$TITULACION_array_test1['metodo'] = 'Delete';
	$TITULACION_array_test1['error'] = 'Eliminado';
	$TITULACION_array_test1['error_esperado'] = 'Borrado realizado con éxito';
	$TITULACION_array_test1['error_obtenido'] = '';
	$TITULACION_array_test1['resultado'] = '';
	
	$login = 'grvidal25';
	$codCent = 'CodCent';

	$TITULACION = new TITULACION_Model($login,$codCent,'','','');
	$TITULACION->ADD();

	$TITULACION_array_test1['error_obtenido'] = $TITULACION->DELETE();
	if ($TITULACION_array_test1['error_obtenido'] === $TITULACION_array_test1['error_esperado'])
	{
		$TITULACION_array_test1['resultado'] = 'OK';
	}
	else
	{
		$TITULACION_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test, $TITULACION_array_test1);

	$TITULACION->DELETE();

}


function TITULACION_Edit_test()
{

	global $ERRORS_array_test;
// creo array de almacen de test individual
	$TITULACION_array_test1 = array();

// Comprobar el login no existe
//--------------------------------------------------
	$TITULACION_array_test1['entidad'] = 'TITULACION';	
	$TITULACION_array_test1['metodo'] = 'Edit';
	$TITULACION_array_test1['error'] = 'Titulacion no existente';
	$TITULACION_array_test1['error_esperado'] = 'Error de gestor de base de datos';
	$TITULACION_array_test1['error_obtenido'] = '';
	$TITULACION_array_test1['resultado'] = '';
	
	// Relleno los datos de usuario	
	$login = 'grvidal25';
	$CodCent = 'CodCent';
	
// creo el modelo sin añadirlo a la base de datos
	$editado = new TITULACION_Model($login,$CodCent,'nom','dir','resp');

//Intento editar la tupla
	$TITULACION_array_test1['error_obtenido'] = $editado->EDIT();
	if ($TITULACION_array_test1['error_obtenido'] === $TITULACION_array_test1['error_esperado'])
	{
		$TITULACION_array_test1['resultado'] = 'OK';
	}
	else
	{
		$TITULACION_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test, $TITULACION_array_test1);

// El usuario no existe en la base de datos
//----------------------------------------------
	$TITULACION_array_test1['entidad'] = 'TITULACION';	
	$TITULACION_array_test1['metodo'] = 'Edit';
	$TITULACION_array_test1['error'] = 'La tupla se ha actualizado';
	$TITULACION_array_test1['error_esperado'] = 'Actualización realizada con éxito';
	$TITULACION_array_test1['error_obtenido'] = '';
	$TITULACION_array_test1['resultado'] = '';
	
	$login = 'grvidal25';
	$CodCent = 'CodCent';

	$TITULACION = new TITULACION_Model($login,$CodCent,'nom','dir','resp');
	
	//Lo añado a la base de datos
	$TITULACION->ADD();
	$TITULACION = new TITULACION_Model($login,$CodCent,'nom2','dir2','resp2');
	$TITULACION_array_test1['error_obtenido'] = $TITULACION->EDIT();
	if ($TITULACION_array_test1['error_obtenido'] === $TITULACION_array_test1['error_esperado'])
	{
		$TITULACION_array_test1['resultado'] = 'OK';
	}
	else
	{
		$TITULACION_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test, $TITULACION_array_test1);

	$TITULACION->DELETE();

}

function TITULACION_Search_test()
{

	global $ERRORS_array_test;
// creo array de almacen de test individual
	$TITULACION_array_test1 = array();

// Comprobar el TITULACION error
//--------------------------------------------------
	$TITULACION_array_test1['entidad'] = 'TITULACION';	
	$TITULACION_array_test1['metodo'] = 'Search';
	$TITULACION_array_test1['error'] = 'Error de gestor de base de datos';
	$TITULACION_array_test1['error_esperado'] = 'Error de gestor de base de datos';
	$TITULACION_array_test1['error_obtenido'] = '';
	$TITULACION_array_test1['resultado'] = '';
	
	// Relleno los datos de usuario	
	$login = 'grvidal25\' , \'asd';
	$CodCent = 'CodCent';
	
// creo el modelo sin añadirlo a la base de datos
	$TITULACION = new TITULACION_Model($login,$CodCent,'','','');

//Intento buscar la tupla
	$TITULACION_array_test1['error_obtenido'] = $TITULACION->SEARCH();
	if ($TITULACION_array_test1['error_obtenido'] === $TITULACION_array_test1['error_esperado'])
	{
		$TITULACION_array_test1['resultado'] = 'OK';
	}
	else
	{
		$TITULACION_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test, $TITULACION_array_test1);

// encontrar el TITULACION en search
//----------------------------------------------
	$TITULACION_array_test1['entidad'] = 'TITULACION';	
	$TITULACION_array_test1['metodo'] = 'Search';
	$TITULACION_array_test1['error'] = 'Devuelve el recordset';
	$TITULACION_array_test1['error_esperado'] = 'array';
	$TITULACION_array_test1['error_obtenido'] = '';
	$TITULACION_array_test1['resultado'] = '';
	
	$login = 'miCenTest';
	$CodCent = 'CodCent';

	$TITULACION = new TITULACION_Model($login,$CodCent,'nom','dir','resp');
	
	//Lo añado a la base de datos
	$TITULACION->ADD();

	$TITULACION_array_test1['error_obtenido'] = gettype($TITULACION->SEARCH()->fetch_array());
	if ($TITULACION_array_test1['error_obtenido'] === $TITULACION_array_test1['error_esperado'])
	{
		$TITULACION_array_test1['resultado'] = 'OK';
	}
	else
	{
		$TITULACION_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test, $TITULACION_array_test1);

	$TITULACION->DELETE();

}

	
	
	TITULACION_ADD_test();
	TITULACION_RellenaDatos_test();
	TITULACION_Edit_test();
	TITULACION_Delete_test();
	TITULACION_Search_test();

	//search

?>


