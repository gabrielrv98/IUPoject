<?php 
//Clase : PROFESOR_VALIDACON_test.php
//Creado el : 20-11-2019
//Creado por: grvidal
//Fichero de test de unidad de la entidad TITULACION
//	Saca por pantalla el resultado de los test
//-------------------------------------------------------


// function PROFESOR_comprobar_dni_test()
// Valida:
//		dni correcto
//		dni demasiado largo
//		dni demasiado corto
//		dni vacio
//	
function PROFESOR_comprobar_dni_test()
{
	global $ERRORS_array_test;
// creo array de almacen de test individual
	$PROFESOR_array_test1 = array();

// dni correcto
//----------------------------------------------
	$PROFESOR_array_test1['tipo'] = 'VALIDACION';
	$PROFESOR_array_test1['entidad'] = 'PROFESOR';	
	$PROFESOR_array_test1['metodo'] = 'dni';
	$PROFESOR_array_test1['error'] = 'correcto';
	$PROFESOR_array_test1['error_esperado'] = 'true';
	$PROFESOR_array_test1['error_obtenido'] = '';
	$PROFESOR_array_test1['resultado'] = '';
	$dni = '25166583Y';
	// creo el modelo
	$PROFESOR = new PROFESOR_Model($dni,'','','','');

	if ($PROFESOR->comprobar_dni()) $res = 'true';
	else $res = 'false';

	$PROFESOR_array_test1['error_obtenido'] = $res;
	if ($PROFESOR_array_test1['error_obtenido'] === $PROFESOR_array_test1['error_esperado'])
	{
		$PROFESOR_array_test1['resultado'] = 'OK';
	}
	else
	{
		$PROFESOR_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test, $PROFESOR_array_test1);


	//dni forrmato erroneo
	$PROFESOR_array_test1['tipo'] = 'VALIDACION';
	$PROFESOR_array_test1['entidad'] = 'PROFESOR';	
	$PROFESOR_array_test1['metodo'] = 'dni';
	$PROFESOR_array_test1['error'] = 'formato erroneo';
	$PROFESOR_array_test1['error_esperado'] = '00010';
	$PROFESOR_array_test1['error_obtenido'] = '';
	$PROFESOR_array_test1['resultado'] = '';

	// Relleno los datos de PROFESOR	
	$dni = '44';
	// creo el modelo
	$PROFESOR = new PROFESOR_Model($dni,'','','','');

	$result = $PROFESOR->comprobar_dni();
	$PROFESOR_array_test1['error_obtenido'] = $result[1];
	if ($PROFESOR_array_test1['error_obtenido'] === $PROFESOR_array_test1['error_esperado'])
	{
		$PROFESOR_array_test1['resultado'] = 'OK';
	}
	else
	{
		$PROFESOR_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test, $PROFESOR_array_test1);

}

// function PROFESOR_comprobar_nombre_test()
// Valida:
//		nombre correcto
//		nombre demasiado largo
//		nombre demasiado corto
//		nombre vacio
//		nombre inesperado

function PROFESOR_comprobar_nombre_test()
{
	global $ERRORS_array_test;
// creo array de almacen de test individual
	$PROFESOR_array_test1 = array();

// nombre correcto
//----------------------------------------------
	$PROFESOR_array_test1['tipo'] = 'VALIDACION';
	$PROFESOR_array_test1['entidad'] = 'PROFESOR';	
	$PROFESOR_array_test1['metodo'] = 'nombre';
	$PROFESOR_array_test1['error'] = 'correcto';
	$PROFESOR_array_test1['error_esperado'] = 'true';
	$PROFESOR_array_test1['error_obtenido'] = '';
	$PROFESOR_array_test1['resultado'] = '';
	$nombre = 'nombre';
	// creo el modelo
	$PROFESOR = new PROFESOR_Model('',$nombre,'','','');

	if ($PROFESOR->comprobar_nombre()) $res = 'true';
	else $res = 'false';

	$PROFESOR_array_test1['error_obtenido'] = $res;
	if ($PROFESOR_array_test1['error_obtenido'] === $PROFESOR_array_test1['error_esperado'])
	{
		$PROFESOR_array_test1['resultado'] = 'OK';
	}
	else
	{
		$PROFESOR_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test, $PROFESOR_array_test1);


	//nombre demasiado largo
	$PROFESOR_array_test1['tipo'] = 'VALIDACION';
	$PROFESOR_array_test1['entidad'] = 'PROFESOR';	
	$PROFESOR_array_test1['metodo'] = 'nombre';
	$PROFESOR_array_test1['error'] = 'demasiado largo';
	$PROFESOR_array_test1['error_esperado'] = '00002';
	$PROFESOR_array_test1['error_obtenido'] = '';
	$PROFESOR_array_test1['resultado'] = '';

	// Relleno los datos de PROFESOR	
	$nombre = 'miPROFESOResElMasLargoDelMundoYCabraEnLaBaseDeDatosPorqueSoyGenial';
	// creo el modelo
	$PROFESOR = new PROFESOR_Model('',$nombre,'','','');

	$result = $PROFESOR->comprobar_nombre();
	$PROFESOR_array_test1['error_obtenido'] = $result[1];
	if ($PROFESOR_array_test1['error_obtenido'] === $PROFESOR_array_test1['error_esperado'])
	{
		$PROFESOR_array_test1['resultado'] = 'OK';
	}
	else
	{
		$PROFESOR_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test, $PROFESOR_array_test1);

	//nombre demasiado corto
	$PROFESOR_array_test1['tipo'] = 'VALIDACION';
	$PROFESOR_array_test1['entidad'] = 'PROFESOR';	
	$PROFESOR_array_test1['metodo'] = 'nombre';
	$PROFESOR_array_test1['error'] = 'demasiado corto';
	$PROFESOR_array_test1['error_esperado'] = '00003';
	$PROFESOR_array_test1['error_obtenido'] = '';
	$PROFESOR_array_test1['resultado'] = '';

	// Relleno los datos de PROFESOR	
	$nombre = 'm';
	// creo el modelo
	$PROFESOR = new PROFESOR_Model('',$nombre,'','','');

	$result = $PROFESOR->comprobar_nombre();
	$PROFESOR_array_test1['error_obtenido'] = $result[1];
	if ($PROFESOR_array_test1['error_obtenido'] === $PROFESOR_array_test1['error_esperado'])
	{
		$PROFESOR_array_test1['resultado'] = 'OK';
	}
	else
	{
		$PROFESOR_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test, $PROFESOR_array_test1);

	//nombre vacio
	$PROFESOR_array_test1['tipo'] = 'VALIDACION';
	$PROFESOR_array_test1['entidad'] = 'PROFESOR';	
	$PROFESOR_array_test1['metodo'] = 'nombre';
	$PROFESOR_array_test1['error'] = 'vacio';
	$PROFESOR_array_test1['error_esperado'] = '00001';
	$PROFESOR_array_test1['error_obtenido'] = '';
	$PROFESOR_array_test1['resultado'] = '';

	// Relleno los datos de PROFESOR	
	$nombre = '';
	// creo el modelo
	$PROFESOR = new PROFESOR_Model('',$nombre,'','','');

	$result = $PROFESOR->comprobar_nombre();
	$PROFESOR_array_test1['error_obtenido'] = $result[1];
	if ($PROFESOR_array_test1['error_obtenido'] === $PROFESOR_array_test1['error_esperado'])
	{
		$PROFESOR_array_test1['resultado'] = 'OK';
	}
	else
	{
		$PROFESOR_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test, $PROFESOR_array_test1);


	//nombre formato erroneo
	$PROFESOR_array_test1['tipo'] = 'VALIDACION';
	$PROFESOR_array_test1['entidad'] = 'PROFESOR';	
	$PROFESOR_array_test1['metodo'] = 'nombre';
	$PROFESOR_array_test1['error'] = 'formato erroneo';
	$PROFESOR_array_test1['error_esperado'] = '00030';
	$PROFESOR_array_test1['error_obtenido'] = '';
	$PROFESOR_array_test1['resultado'] = '';

	// Relleno los datos de PROFESOR	
	$nombre = 'mi|pass.14';
	// creo el modelo
	$PROFESOR = new PROFESOR_Model('',$nombre,'','','');

	$result = $PROFESOR->comprobar_nombre();
	$PROFESOR_array_test1['error_obtenido'] = $result[1];
	if ($PROFESOR_array_test1['error_obtenido'] === $PROFESOR_array_test1['error_esperado'])
	{
		$PROFESOR_array_test1['resultado'] = 'OK';
	}
	else
	{
		$PROFESOR_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test, $PROFESOR_array_test1);
}
// function PROFESOR_comprobar_apellido_test()
// Valida:
//		apellido correcto
//		apellido demasiado largo
//		apellido demasiado corto
//		apellido vacio
//		apellido inesperado

function PROFESOR_comprobar_apellido_test()
{
	global $ERRORS_array_test;
// creo array de almacen de test individual
	$PROFESOR_array_test1 = array();

// apellido correcto
//----------------------------------------------
	$PROFESOR_array_test1['tipo'] = 'VALIDACION';
	$PROFESOR_array_test1['entidad'] = 'PROFESOR';	
	$PROFESOR_array_test1['metodo'] = 'apellido';
	$PROFESOR_array_test1['error'] = 'correcto';
	$PROFESOR_array_test1['error_esperado'] = 'true';
	$PROFESOR_array_test1['error_obtenido'] = '';
	$PROFESOR_array_test1['resultado'] = '';
	$apellido = 'apellido';
	// creo el modelo
	$PROFESOR = new PROFESOR_Model('','',$apellido,'','');

	if ($PROFESOR->comprobar_apellido()) $res = 'true';
	else $res = 'false';

	$PROFESOR_array_test1['error_obtenido'] = $res;
	if ($PROFESOR_array_test1['error_obtenido'] === $PROFESOR_array_test1['error_esperado'])
	{
		$PROFESOR_array_test1['resultado'] = 'OK';
	}
	else
	{
		$PROFESOR_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test, $PROFESOR_array_test1);


	//apellido demasiado largo
	$PROFESOR_array_test1['tipo'] = 'VALIDACION';
	$PROFESOR_array_test1['entidad'] = 'PROFESOR';	
	$PROFESOR_array_test1['metodo'] = 'apellido';
	$PROFESOR_array_test1['error'] = 'demasiado largo';
	$PROFESOR_array_test1['error_esperado'] = '00002';
	$PROFESOR_array_test1['error_obtenido'] = '';
	$PROFESOR_array_test1['resultado'] = '';

	// Relleno los datos de PROFESOR	
	$apellido = 'miPROFESOResElMasLargoDelMundoYCabraEnLaBaseDeDatosPorqueSoyGenial';
	// creo el modelo
	$PROFESOR = new PROFESOR_Model('','',$apellido,'','');

	$result = $PROFESOR->comprobar_apellido();
	$PROFESOR_array_test1['error_obtenido'] = $result[1];
	if ($PROFESOR_array_test1['error_obtenido'] === $PROFESOR_array_test1['error_esperado'])
	{
		$PROFESOR_array_test1['resultado'] = 'OK';
	}
	else
	{
		$PROFESOR_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test, $PROFESOR_array_test1);

	//apellido demasiado corto
	$PROFESOR_array_test1['tipo'] = 'VALIDACION';
	$PROFESOR_array_test1['entidad'] = 'PROFESOR';	
	$PROFESOR_array_test1['metodo'] = 'apellido';
	$PROFESOR_array_test1['error'] = 'demasiado corto';
	$PROFESOR_array_test1['error_esperado'] = '00003';
	$PROFESOR_array_test1['error_obtenido'] = '';
	$PROFESOR_array_test1['resultado'] = '';

	// Relleno los datos de PROFESOR	
	$apellido = 'm';
	// creo el modelo
	$PROFESOR = new PROFESOR_Model('','',$apellido,'','');

	$result = $PROFESOR->comprobar_apellido();
	$PROFESOR_array_test1['error_obtenido'] = $result[1];
	if ($PROFESOR_array_test1['error_obtenido'] === $PROFESOR_array_test1['error_esperado'])
	{
		$PROFESOR_array_test1['resultado'] = 'OK';
	}
	else
	{
		$PROFESOR_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test, $PROFESOR_array_test1);

	//apellido vacio
	$PROFESOR_array_test1['tipo'] = 'VALIDACION';
	$PROFESOR_array_test1['entidad'] = 'PROFESOR';	
	$PROFESOR_array_test1['metodo'] = 'apellido';
	$PROFESOR_array_test1['error'] = 'vacio';
	$PROFESOR_array_test1['error_esperado'] = '00001';
	$PROFESOR_array_test1['error_obtenido'] = '';
	$PROFESOR_array_test1['resultado'] = '';

	// Relleno los datos de PROFESOR	
	$apellido = '';
	// creo el modelo
	$PROFESOR = new PROFESOR_Model('','',$apellido,'','');

	$result = $PROFESOR->comprobar_apellido();
	$PROFESOR_array_test1['error_obtenido'] = $result[1];
	if ($PROFESOR_array_test1['error_obtenido'] === $PROFESOR_array_test1['error_esperado'])
	{
		$PROFESOR_array_test1['resultado'] = 'OK';
	}
	else
	{
		$PROFESOR_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test, $PROFESOR_array_test1);


	//apellido formato erroneo
	$PROFESOR_array_test1['tipo'] = 'VALIDACION';
	$PROFESOR_array_test1['entidad'] = 'PROFESOR';	
	$PROFESOR_array_test1['metodo'] = 'apellido';
	$PROFESOR_array_test1['error'] = 'formato erroneo';
	$PROFESOR_array_test1['error_esperado'] = '00030';
	$PROFESOR_array_test1['error_obtenido'] = '';
	$PROFESOR_array_test1['resultado'] = '';

	// Relleno los datos de PROFESOR	
	$apellido = 'mi|pass.14';
	// creo el modelo
	$PROFESOR = new PROFESOR_Model('','',$apellido,'','');

	$result = $PROFESOR->comprobar_apellido();
	$PROFESOR_array_test1['error_obtenido'] = $result[1];
	if ($PROFESOR_array_test1['error_obtenido'] === $PROFESOR_array_test1['error_esperado'])
	{
		$PROFESOR_array_test1['resultado'] = 'OK';
	}
	else
	{
		$PROFESOR_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test, $PROFESOR_array_test1);
}
// function PROFESOR_comprobar_area_test()
// Valida:
//		area correcto
//		area demasiado largo
//		area demasiado corto
//		area vacio
//		area inesperado

function PROFESOR_comprobar_area_test()
{
	global $ERRORS_array_test;
// creo array de almacen de test individual
	$PROFESOR_array_test1 = array();

// area correcto
//----------------------------------------------
	$PROFESOR_array_test1['tipo'] = 'VALIDACION';
	$PROFESOR_array_test1['entidad'] = 'PROFESOR';	
	$PROFESOR_array_test1['metodo'] = 'area';
	$PROFESOR_array_test1['error'] = 'correcto';
	$PROFESOR_array_test1['error_esperado'] = 'true';
	$PROFESOR_array_test1['error_obtenido'] = '';
	$PROFESOR_array_test1['resultado'] = '';
	$area = 'area';
	// creo el modelo
	$PROFESOR = new PROFESOR_Model('','','',$area,'');

	if ($PROFESOR->comprobar_area()) $res = 'true';
	else $res = 'false';

	$PROFESOR_array_test1['error_obtenido'] = $res;
	if ($PROFESOR_array_test1['error_obtenido'] === $PROFESOR_array_test1['error_esperado'])
	{
		$PROFESOR_array_test1['resultado'] = 'OK';
	}
	else
	{
		$PROFESOR_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test, $PROFESOR_array_test1);


	//area demasiado largo
	$PROFESOR_array_test1['tipo'] = 'VALIDACION';
	$PROFESOR_array_test1['entidad'] = 'PROFESOR';	
	$PROFESOR_array_test1['metodo'] = 'area';
	$PROFESOR_array_test1['error'] = 'demasiado largo';
	$PROFESOR_array_test1['error_esperado'] = '00002';
	$PROFESOR_array_test1['error_obtenido'] = '';
	$PROFESOR_array_test1['resultado'] = '';

	// Relleno los datos de PROFESOR	
	$area = 'miPROFESOResElMasLargoDelMundoYCabraEnLaBaseDeDatosPorqueSoyGenial';
	// creo el modelo
	$PROFESOR = new PROFESOR_Model('','','',$area,'');

	$result = $PROFESOR->comprobar_area();
	$PROFESOR_array_test1['error_obtenido'] = $result[1];
	if ($PROFESOR_array_test1['error_obtenido'] === $PROFESOR_array_test1['error_esperado'])
	{
		$PROFESOR_array_test1['resultado'] = 'OK';
	}
	else
	{
		$PROFESOR_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test, $PROFESOR_array_test1);

	//area demasiado corto
	$PROFESOR_array_test1['tipo'] = 'VALIDACION';
	$PROFESOR_array_test1['entidad'] = 'PROFESOR';	
	$PROFESOR_array_test1['metodo'] = 'area';
	$PROFESOR_array_test1['error'] = 'demasiado corto';
	$PROFESOR_array_test1['error_esperado'] = '00003';
	$PROFESOR_array_test1['error_obtenido'] = '';
	$PROFESOR_array_test1['resultado'] = '';

	// Relleno los datos de PROFESOR	
	$area = 'm';
	// creo el modelo
	$PROFESOR = new PROFESOR_Model('','','',$area,'');

	$result = $PROFESOR->comprobar_area();
	$PROFESOR_array_test1['error_obtenido'] = $result[1];
	if ($PROFESOR_array_test1['error_obtenido'] === $PROFESOR_array_test1['error_esperado'])
	{
		$PROFESOR_array_test1['resultado'] = 'OK';
	}
	else
	{
		$PROFESOR_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test, $PROFESOR_array_test1);

	//area vacio
	$PROFESOR_array_test1['tipo'] = 'VALIDACION';
	$PROFESOR_array_test1['entidad'] = 'PROFESOR';	
	$PROFESOR_array_test1['metodo'] = 'area';
	$PROFESOR_array_test1['error'] = 'vacio';
	$PROFESOR_array_test1['error_esperado'] = '00001';
	$PROFESOR_array_test1['error_obtenido'] = '';
	$PROFESOR_array_test1['resultado'] = '';

	// Relleno los datos de PROFESOR	
	$area = '';
	// creo el modelo
	$PROFESOR = new PROFESOR_Model('','','',$area,'');

	$result = $PROFESOR->comprobar_area();
	$PROFESOR_array_test1['error_obtenido'] = $result[1];
	if ($PROFESOR_array_test1['error_obtenido'] === $PROFESOR_array_test1['error_esperado'])
	{
		$PROFESOR_array_test1['resultado'] = 'OK';
	}
	else
	{
		$PROFESOR_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test, $PROFESOR_array_test1);


	//area formato erroneo
	$PROFESOR_array_test1['tipo'] = 'VALIDACION';
	$PROFESOR_array_test1['entidad'] = 'PROFESOR';	
	$PROFESOR_array_test1['metodo'] = 'area';
	$PROFESOR_array_test1['error'] = 'formato erroneo';
	$PROFESOR_array_test1['error_esperado'] = '00030';
	$PROFESOR_array_test1['error_obtenido'] = '';
	$PROFESOR_array_test1['resultado'] = '';

	// Relleno los datos de PROFESOR	
	$area = 'mi|pass.14';
	// creo el modelo
	$PROFESOR = new PROFESOR_Model('','','',$area,'');

	$result = $PROFESOR->comprobar_area();
	$PROFESOR_array_test1['error_obtenido'] = $result[1];
	if ($PROFESOR_array_test1['error_obtenido'] === $PROFESOR_array_test1['error_esperado'])
	{
		$PROFESOR_array_test1['resultado'] = 'OK';
	}
	else
	{
		$PROFESOR_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test, $PROFESOR_array_test1);
}

// function PROFESOR_comprobar_departamento_test()
// Valida:
//		departamento correcto
//		departamento demasiado largo
//		departamento demasiado corto
//		departamento vacio
//		departamento inesperado

function PROFESOR_comprobar_departamento_test()
{
	global $ERRORS_array_test;
// creo array de almacen de test individual
	$PROFESOR_array_test1 = array();

// departamento correcto
//----------------------------------------------
	$PROFESOR_array_test1['tipo'] = 'VALIDACION';
	$PROFESOR_array_test1['entidad'] = 'PROFESOR';	
	$PROFESOR_array_test1['metodo'] = 'departamento';
	$PROFESOR_array_test1['error'] = 'correcto';
	$PROFESOR_array_test1['error_esperado'] = 'true';
	$PROFESOR_array_test1['error_obtenido'] = '';
	$PROFESOR_array_test1['resultado'] = '';
	$departamento = 'departamento';
	// creo el modelo
	$PROFESOR = new PROFESOR_Model('','','','',$departamento);

	if ($PROFESOR->comprobar_departamento()) $res = 'true';
	else $res = 'false';

	$PROFESOR_array_test1['error_obtenido'] = $res;
	if ($PROFESOR_array_test1['error_obtenido'] === $PROFESOR_array_test1['error_esperado'])
	{
		$PROFESOR_array_test1['resultado'] = 'OK';
	}
	else
	{
		$PROFESOR_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test, $PROFESOR_array_test1);


	//departamento demasiado largo
	$PROFESOR_array_test1['tipo'] = 'VALIDACION';
	$PROFESOR_array_test1['entidad'] = 'PROFESOR';	
	$PROFESOR_array_test1['metodo'] = 'departamento';
	$PROFESOR_array_test1['error'] = 'demasiado largo';
	$PROFESOR_array_test1['error_esperado'] = '00002';
	$PROFESOR_array_test1['error_obtenido'] = '';
	$PROFESOR_array_test1['resultado'] = '';

	// Relleno los datos de PROFESOR	
	$departamento = 'miPROFESOResElMasLargoDelMundoYCabraEnLaBaseDeDatosPorqueSoyGenial';
	// creo el modelo
	$PROFESOR = new PROFESOR_Model('','','','',$departamento);

	$result = $PROFESOR->comprobar_departamento();
	$PROFESOR_array_test1['error_obtenido'] = $result[1];
	if ($PROFESOR_array_test1['error_obtenido'] === $PROFESOR_array_test1['error_esperado'])
	{
		$PROFESOR_array_test1['resultado'] = 'OK';
	}
	else
	{
		$PROFESOR_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test, $PROFESOR_array_test1);

	//departamento demasiado corto
	$PROFESOR_array_test1['tipo'] = 'VALIDACION';
	$PROFESOR_array_test1['entidad'] = 'PROFESOR';	
	$PROFESOR_array_test1['metodo'] = 'departamento';
	$PROFESOR_array_test1['error'] = 'demasiado corto';
	$PROFESOR_array_test1['error_esperado'] = '00003';
	$PROFESOR_array_test1['error_obtenido'] = '';
	$PROFESOR_array_test1['resultado'] = '';

	// Relleno los datos de PROFESOR	
	$departamento = 'm';
	// creo el modelo
	$PROFESOR = new PROFESOR_Model('','','','',$departamento);

	$result = $PROFESOR->comprobar_departamento();
	$PROFESOR_array_test1['error_obtenido'] = $result[1];
	if ($PROFESOR_array_test1['error_obtenido'] === $PROFESOR_array_test1['error_esperado'])
	{
		$PROFESOR_array_test1['resultado'] = 'OK';
	}
	else
	{
		$PROFESOR_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test, $PROFESOR_array_test1);

	//departamento vacio
	$PROFESOR_array_test1['tipo'] = 'VALIDACION';
	$PROFESOR_array_test1['entidad'] = 'PROFESOR';	
	$PROFESOR_array_test1['metodo'] = 'departamento';
	$PROFESOR_array_test1['error'] = 'vacio';
	$PROFESOR_array_test1['error_esperado'] = '00001';
	$PROFESOR_array_test1['error_obtenido'] = '';
	$PROFESOR_array_test1['resultado'] = '';

	// Relleno los datos de PROFESOR	
	$departamento = '';
	// creo el modelo
	$PROFESOR = new PROFESOR_Model('','','','',$departamento);

	$result = $PROFESOR->comprobar_departamento();
	$PROFESOR_array_test1['error_obtenido'] = $result[1];
	if ($PROFESOR_array_test1['error_obtenido'] === $PROFESOR_array_test1['error_esperado'])
	{
		$PROFESOR_array_test1['resultado'] = 'OK';
	}
	else
	{
		$PROFESOR_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test, $PROFESOR_array_test1);


	//departamento formato erroneo
	$PROFESOR_array_test1['tipo'] = 'VALIDACION';
	$PROFESOR_array_test1['entidad'] = 'PROFESOR';	
	$PROFESOR_array_test1['metodo'] = 'departamento';
	$PROFESOR_array_test1['error'] = 'formato erroneo';
	$PROFESOR_array_test1['error_esperado'] = '00030';
	$PROFESOR_array_test1['error_obtenido'] = '';
	$PROFESOR_array_test1['resultado'] = '';

	// Relleno los datos de PROFESOR	
	$departamento = 'mi|pass.14';
	// creo el modelo
	$PROFESOR = new PROFESOR_Model('','','','',$departamento);

	$result = $PROFESOR->comprobar_departamento();
	$PROFESOR_array_test1['error_obtenido'] = $result[1];
	if ($PROFESOR_array_test1['error_obtenido'] === $PROFESOR_array_test1['error_esperado'])
	{
		$PROFESOR_array_test1['resultado'] = 'OK';
	}
	else
	{
		$PROFESOR_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test, $PROFESOR_array_test1);
}



	PROFESOR_comprobar_dni_test();
	PROFESOR_comprobar_nombre_test();
	PROFESOR_comprobar_apellido_test();	
	PROFESOR_comprobar_area_test();
	PROFESOR_comprobar_departamento_test();



?>