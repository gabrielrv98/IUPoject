<?php
//Clase : TITULACION__Validacion_test.php
//Creado el : 20-11-2019
//Creado por: grvidal
//Fichero de test de unidad de la entidad TITULACION
//	Saca por pantalla el resultado de los test
//-------------------------------------------------------


// function TITULACION_comprobar_tituacion_test()
// Valida:
//		codTITULACION correcto
//		codTITULACION demasiado largo
//		codTITULACION demasiado corto
//		codTITULACION vacio
//		codTITULACION inesperado

function TITULACION_comprobar_TITULACION_test()
{
	global $ERRORS_array_test;
// creo array de almacen de test individual
	$TITULACION_array_test1 = array();

// codTITULACION correcto
//----------------------------------------------
	$TITULACION_array_test1['tipo'] = 'VALIDACION';
	$TITULACION_array_test1['entidad'] = 'TITULACION';	
	$TITULACION_array_test1['metodo'] = 'CodTITULACION';
	$TITULACION_array_test1['error'] = 'correcto';
	$TITULACION_array_test1['error_esperado'] = 'true';
	$TITULACION_array_test1['error_obtenido'] = '';
	$TITULACION_array_test1['resultado'] = '';
	$codTITULACION = 'codTit';
	// creo el modelo
	$TITULACION = new TITULACION_Model($codTITULACION,'','','');

	if ($TITULACION->comprobar_TITULACION()) $res = 'true';
	else $res = 'false';

	$TITULACION_array_test1['error_obtenido'] = $res;
	if ($TITULACION_array_test1['error_obtenido'] === $TITULACION_array_test1['error_esperado'])
	{
		$TITULACION_array_test1['resultado'] = 'OK';
	}
	else
	{
		$TITULACION_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test, $TITULACION_array_test1);


	//codTITULACION demasiado largo
	$TITULACION_array_test1['tipo'] = 'VALIDACION';
	$TITULACION_array_test1['entidad'] = 'TITULACION';	
	$TITULACION_array_test1['metodo'] = 'CodTITULACION';
	$TITULACION_array_test1['error'] = 'demasiado largo';
	$TITULACION_array_test1['error_esperado'] = '00002';
	$TITULACION_array_test1['error_obtenido'] = '';
	$TITULACION_array_test1['resultado'] = '';

	// Relleno los datos de TITULACION	
	$login = 'miTITULACIONesElMasLargoDelMundoYCabraEnLaBaseDeDatosPorqueSoyGenial';
	// creo el modelo
	$TITULACION = new TITULACION_Model($login,'','','');

	$result = $TITULACION->comprobar_TITULACION();
	$TITULACION_array_test1['error_obtenido'] = $result[1];
	if ($TITULACION_array_test1['error_obtenido'] === $TITULACION_array_test1['error_esperado'])
	{
		$TITULACION_array_test1['resultado'] = 'OK';
	}
	else
	{
		$TITULACION_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test, $TITULACION_array_test1);

	//codTITULACION demasiado corto
	$TITULACION_array_test1['tipo'] = 'VALIDACION';
	$TITULACION_array_test1['entidad'] = 'TITULACION';	
	$TITULACION_array_test1['metodo'] = 'CodTITULACION';
	$TITULACION_array_test1['error'] = 'demasiado corto';
	$TITULACION_array_test1['error_esperado'] = '00003';
	$TITULACION_array_test1['error_obtenido'] = '';
	$TITULACION_array_test1['resultado'] = '';

	// Relleno los datos de TITULACION	
	$login = 'm';
	// creo el modelo
	$TITULACION = new TITULACION_Model($login,'','','');

	$result = $TITULACION->comprobar_TITULACION();
	$TITULACION_array_test1['error_obtenido'] = $result[1];
	if ($TITULACION_array_test1['error_obtenido'] === $TITULACION_array_test1['error_esperado'])
	{
		$TITULACION_array_test1['resultado'] = 'OK';
	}
	else
	{
		$TITULACION_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test, $TITULACION_array_test1);

	//codTITULACION vacio
	$TITULACION_array_test1['tipo'] = 'VALIDACION';
	$TITULACION_array_test1['entidad'] = 'TITULACION';	
	$TITULACION_array_test1['metodo'] = 'codTITULACION';
	$TITULACION_array_test1['error'] = 'vacio';
	$TITULACION_array_test1['error_esperado'] = '00001';
	$TITULACION_array_test1['error_obtenido'] = '';
	$TITULACION_array_test1['resultado'] = '';

	// Relleno los datos de TITULACION	
	$login = '';
	// creo el modelo
	$TITULACION = new TITULACION_Model($login,'','','');

	$result = $TITULACION->comprobar_TITULACION();
	$TITULACION_array_test1['error_obtenido'] = $result[1];
	if ($TITULACION_array_test1['error_obtenido'] === $TITULACION_array_test1['error_esperado'])
	{
		$TITULACION_array_test1['resultado'] = 'OK';
	}
	else
	{
		$TITULACION_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test, $TITULACION_array_test1);


	//codTITULACION formato erroneo
	$TITULACION_array_test1['tipo'] = 'VALIDACION';
	$TITULACION_array_test1['entidad'] = 'TITULACION';	
	$TITULACION_array_test1['metodo'] = 'CodTITULACION';
	$TITULACION_array_test1['error'] = 'formato erroneo';
	$TITULACION_array_test1['error_esperado'] = '00060';
	$TITULACION_array_test1['error_obtenido'] = '';
	$TITULACION_array_test1['resultado'] = '';

	// Relleno los datos de TITULACION	
	$CodTITULACION = 'mi|pass.14';
	// creo el modelo
	$TITULACION = new TITULACION_Model($CodTITULACION,'','','');

	$result = $TITULACION->comprobar_TITULACION();
	$TITULACION_array_test1['error_obtenido'] = $result[1];
	if ($TITULACION_array_test1['error_obtenido'] === $TITULACION_array_test1['error_esperado'])
	{
		$TITULACION_array_test1['resultado'] = 'OK';
	}
	else
	{
		$TITULACION_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test, $TITULACION_array_test1);
}

// function TITULACION_comprobar_centro_test()
// Valida:
//		Codcentro correcto
//		Codcentro demasiado largo
//		Codcentro demasiado corto
//		Codcentro vacio
//		Codcentro inesperado

function TITULACION_comprobar_centro_test()
{
	global $ERRORS_array_test;
// creo array de almacen de test individual
	$TITULACION_array_test1 = array();

// Codcentro correcto
//----------------------------------------------
	$TITULACION_array_test1['tipo'] = 'VALIDACION';
	$TITULACION_array_test1['entidad'] = 'TITULACION';	
	$TITULACION_array_test1['metodo'] = 'Codcentro';
	$TITULACION_array_test1['error'] = 'correcto';
	$TITULACION_array_test1['error_esperado'] = 'true';
	$TITULACION_array_test1['error_obtenido'] = '';
	$TITULACION_array_test1['resultado'] = '';
	$Codcentro = 'codCent';
	// creo el modelo
	$TITULACION = new TITULACION_Model('',$Codcentro,'','');

	if ($TITULACION->comprobar_centro()) $res = 'true';
	else $res = 'false';

	$TITULACION_array_test1['error_obtenido'] = $res;
	if ($TITULACION_array_test1['error_obtenido'] === $TITULACION_array_test1['error_esperado'])
	{
		$TITULACION_array_test1['resultado'] = 'OK';
	}
	else
	{
		$TITULACION_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test, $TITULACION_array_test1);


	//Codcentro demasiado largo
	$TITULACION_array_test1['tipo'] = 'VALIDACION';
	$TITULACION_array_test1['entidad'] = 'TITULACION';	
	$TITULACION_array_test1['metodo'] = 'Codcentro';
	$TITULACION_array_test1['error'] = 'demasiado largo';
	$TITULACION_array_test1['error_esperado'] = '00002';
	$TITULACION_array_test1['error_obtenido'] = '';
	$TITULACION_array_test1['resultado'] = '';

	// Relleno los datos de TITULACION	
	$codCent = 'miTITULACIONesElMasLargoDelMundoYCabraEnLaBaseDeDatosPorqueSoyGenial';
	// creo el modelo
	$TITULACION = new TITULACION_Model('',$codCent,'','');

	$result = $TITULACION->comprobar_centro();
	$TITULACION_array_test1['error_obtenido'] = $result[1];
	if ($TITULACION_array_test1['error_obtenido'] === $TITULACION_array_test1['error_esperado'])
	{
		$TITULACION_array_test1['resultado'] = 'OK';
	}
	else
	{
		$TITULACION_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test, $TITULACION_array_test1);

	//Codcentro demasiado corto
	$TITULACION_array_test1['tipo'] = 'VALIDACION';
	$TITULACION_array_test1['entidad'] = 'TITULACION';	
	$TITULACION_array_test1['metodo'] = 'Codcentro';
	$TITULACION_array_test1['error'] = 'demasiado corto';
	$TITULACION_array_test1['error_esperado'] = '00003';
	$TITULACION_array_test1['error_obtenido'] = '';
	$TITULACION_array_test1['resultado'] = '';

	// Relleno los datos de TITULACION	
	$codCent = 'm';
	// creo el modelo
	$TITULACION = new TITULACION_Model('',$codCent,'','');

	$result = $TITULACION->comprobar_centro();
	$TITULACION_array_test1['error_obtenido'] = $result[1];
	if ($TITULACION_array_test1['error_obtenido'] === $TITULACION_array_test1['error_esperado'])
	{
		$TITULACION_array_test1['resultado'] = 'OK';
	}
	else
	{
		$TITULACION_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test, $TITULACION_array_test1);

	//Codcentro vacio
	$TITULACION_array_test1['tipo'] = 'VALIDACION';
	$TITULACION_array_test1['entidad'] = 'TITULACION';	
	$TITULACION_array_test1['metodo'] = 'Codcentro';
	$TITULACION_array_test1['error'] = 'vacio';
	$TITULACION_array_test1['error_esperado'] = '00001';
	$TITULACION_array_test1['error_obtenido'] = '';
	$TITULACION_array_test1['resultado'] = '';

	// Relleno los datos de TITULACION	
	$codCent = '';
	// creo el modelo
	$TITULACION = new TITULACION_Model('',$codCent,'','');

	$result = $TITULACION->comprobar_centro();
	$TITULACION_array_test1['error_obtenido'] = $result[1];
	if ($TITULACION_array_test1['error_obtenido'] === $TITULACION_array_test1['error_esperado'])
	{
		$TITULACION_array_test1['resultado'] = 'OK';
	}
	else
	{
		$TITULACION_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test, $TITULACION_array_test1);


	//Codcentro formato erroneo
	$TITULACION_array_test1['tipo'] = 'VALIDACION';
	$TITULACION_array_test1['entidad'] = 'TITULACION';	
	$TITULACION_array_test1['metodo'] = 'Codcentro';
	$TITULACION_array_test1['error'] = 'formato erroneo';
	$TITULACION_array_test1['error_esperado'] = '00040';
	$TITULACION_array_test1['error_obtenido'] = '';
	$TITULACION_array_test1['resultado'] = '';

	// Relleno los datos de TITULACION	
	$Codcentro = 'mi|pass.14';
	// creo el modelo
	$TITULACION = new TITULACION_Model('',$Codcentro,'','');

	$result = $TITULACION->comprobar_centro();
	$TITULACION_array_test1['error_obtenido'] = $result[1];
	if ($TITULACION_array_test1['error_obtenido'] === $TITULACION_array_test1['error_esperado'])
	{
		$TITULACION_array_test1['resultado'] = 'OK';
	}
	else
	{
		$TITULACION_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test, $TITULACION_array_test1);
}
// function TITULACION_comprobar_nombre_test()
// Valida:
//		nombre correcto
//		nombre demasiado largo
//		nombre demasiado corto
//		nombre vacio
//		nombre inesperado

function TITULACION_comprobar_nombre_test()
{
	global $ERRORS_array_test;
// creo array de almacen de test individual
	$TITULACION_array_test1 = array();

// nombre correcto
//----------------------------------------------
	$TITULACION_array_test1['tipo'] = 'VALIDACION';
	$TITULACION_array_test1['entidad'] = 'TITULACION';	
	$TITULACION_array_test1['metodo'] = 'nombre';
	$TITULACION_array_test1['error'] = 'correcto';
	$TITULACION_array_test1['error_esperado'] = 'true';
	$TITULACION_array_test1['error_obtenido'] = '';
	$TITULACION_array_test1['resultado'] = '';
	$nombre = 'codCent';
	// creo el modelo
	$TITULACION = new TITULACION_Model('','',$nombre,'');

	if ($TITULACION->comprobar_nombre()) $res = 'true';
	else $res = 'false';

	$TITULACION_array_test1['error_obtenido'] = $res;
	if ($TITULACION_array_test1['error_obtenido'] === $TITULACION_array_test1['error_esperado'])
	{
		$TITULACION_array_test1['resultado'] = 'OK';
	}
	else
	{
		$TITULACION_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test, $TITULACION_array_test1);


	//nombre demasiado largo
	$TITULACION_array_test1['tipo'] = 'VALIDACION';
	$TITULACION_array_test1['entidad'] = 'TITULACION';	
	$TITULACION_array_test1['metodo'] = 'nombre';
	$TITULACION_array_test1['error'] = 'demasiado largo';
	$TITULACION_array_test1['error_esperado'] = '00002';
	$TITULACION_array_test1['error_obtenido'] = '';
	$TITULACION_array_test1['resultado'] = '';

	// Relleno los datos de TITULACION	
	$nombre = 'miTITULACIONesElMasLargoDelMundoYCabraEnLaBaseDeDatosPorqueSoyGenial';
	// creo el modelo
	$TITULACION = new TITULACION_Model('','',$nombre,'');

	$result = $TITULACION->comprobar_nombre();
	$TITULACION_array_test1['error_obtenido'] = $result[1];
	if ($TITULACION_array_test1['error_obtenido'] === $TITULACION_array_test1['error_esperado'])
	{
		$TITULACION_array_test1['resultado'] = 'OK';
	}
	else
	{
		$TITULACION_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test, $TITULACION_array_test1);

	//nombre demasiado corto
	$TITULACION_array_test1['tipo'] = 'VALIDACION';
	$TITULACION_array_test1['entidad'] = 'TITULACION';	
	$TITULACION_array_test1['metodo'] = 'nombre';
	$TITULACION_array_test1['error'] = 'demasiado corto';
	$TITULACION_array_test1['error_esperado'] = '00003';
	$TITULACION_array_test1['error_obtenido'] = '';
	$TITULACION_array_test1['resultado'] = '';

	// Relleno los datos de TITULACION	
	$nombre = 'm';
	// creo el modelo
	$TITULACION = new TITULACION_Model('','',$nombre,'');

	$result = $TITULACION->comprobar_nombre();
	$TITULACION_array_test1['error_obtenido'] = $result[1];
	if ($TITULACION_array_test1['error_obtenido'] === $TITULACION_array_test1['error_esperado'])
	{
		$TITULACION_array_test1['resultado'] = 'OK';
	}
	else
	{
		$TITULACION_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test, $TITULACION_array_test1);

	//nombre vacio
	$TITULACION_array_test1['tipo'] = 'VALIDACION';
	$TITULACION_array_test1['entidad'] = 'TITULACION';	
	$TITULACION_array_test1['metodo'] = 'nombre';
	$TITULACION_array_test1['error'] = 'vacio';
	$TITULACION_array_test1['error_esperado'] = '00001';
	$TITULACION_array_test1['error_obtenido'] = '';
	$TITULACION_array_test1['resultado'] = '';

	// Relleno los datos de TITULACION	
	$nombre = '';
	// creo el modelo
	$TITULACION = new TITULACION_Model('','',$nombre,'');

	$result = $TITULACION->comprobar_nombre();
	$TITULACION_array_test1['error_obtenido'] = $result[1];
	if ($TITULACION_array_test1['error_obtenido'] === $TITULACION_array_test1['error_esperado'])
	{
		$TITULACION_array_test1['resultado'] = 'OK';
	}
	else
	{
		$TITULACION_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test, $TITULACION_array_test1);


	//nombre formato erroneo
	$TITULACION_array_test1['tipo'] = 'VALIDACION';
	$TITULACION_array_test1['entidad'] = 'TITULACION';	
	$TITULACION_array_test1['metodo'] = 'nombre';
	$TITULACION_array_test1['error'] = 'formato erroneo';
	$TITULACION_array_test1['error_esperado'] = '00030';
	$TITULACION_array_test1['error_obtenido'] = '';
	$TITULACION_array_test1['resultado'] = '';

	// Relleno los datos de TITULACION	
	$nombre = 'mi|pass.14';
	// creo el modelo
	$TITULACION = new TITULACION_Model('','',$nombre,'');

	$result = $TITULACION->comprobar_nombre();
	$TITULACION_array_test1['error_obtenido'] = $result[1];
	if ($TITULACION_array_test1['error_obtenido'] === $TITULACION_array_test1['error_esperado'])
	{
		$TITULACION_array_test1['resultado'] = 'OK';
	}
	else
	{
		$TITULACION_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test, $TITULACION_array_test1);
}

// function TITULACION_comprobar_responsable_test()
// Valida:
//		responsable correcto
//		responsable demasiado largo
//		responsable demasiado corto
//		responsable vacio
//		responsable inesperado

function TITULACION_comprobar_responsable_test()
{
	global $ERRORS_array_test;
// creo array de almacen de test individual
	$TITULACION_array_test1 = array();

// responsable correcto
//----------------------------------------------
	$TITULACION_array_test1['tipo'] = 'VALIDACION';
	$TITULACION_array_test1['entidad'] = 'TITULACION';	
	$TITULACION_array_test1['metodo'] = 'responsable';
	$TITULACION_array_test1['error'] = 'correcto';
	$TITULACION_array_test1['error_esperado'] = 'true';
	$TITULACION_array_test1['error_obtenido'] = '';
	$TITULACION_array_test1['resultado'] = '';
	$responsable = 'codCent';
	// creo el modelo
	$TITULACION = new TITULACION_Model('','','',$responsable);

	if ($TITULACION->comprobar_responsable()) $res = 'true';
	else $res = 'false';

	$TITULACION_array_test1['error_obtenido'] = $res;
	if ($TITULACION_array_test1['error_obtenido'] === $TITULACION_array_test1['error_esperado'])
	{
		$TITULACION_array_test1['resultado'] = 'OK';
	}
	else
	{
		$TITULACION_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test, $TITULACION_array_test1);


	//responsable demasiado largo
	$TITULACION_array_test1['tipo'] = 'VALIDACION';
	$TITULACION_array_test1['entidad'] = 'TITULACION';	
	$TITULACION_array_test1['metodo'] = 'responsable';
	$TITULACION_array_test1['error'] = 'demasiado largo';
	$TITULACION_array_test1['error_esperado'] = '00002';
	$TITULACION_array_test1['error_obtenido'] = '';
	$TITULACION_array_test1['resultado'] = '';

	// Relleno los datos de TITULACION	
	$responsable = 'miTITULACIONesElMasLargoDelMundoYCabraEnLaBaseDeDatosPorqueSoyGenial';
	// creo el modelo
	$TITULACION = new TITULACION_Model('','','',$responsable);

	$result = $TITULACION->comprobar_responsable();
	$TITULACION_array_test1['error_obtenido'] = $result[1];
	if ($TITULACION_array_test1['error_obtenido'] === $TITULACION_array_test1['error_esperado'])
	{
		$TITULACION_array_test1['resultado'] = 'OK';
	}
	else
	{
		$TITULACION_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test, $TITULACION_array_test1);

	//responsable demasiado corto
	$TITULACION_array_test1['tipo'] = 'VALIDACION';
	$TITULACION_array_test1['entidad'] = 'TITULACION';	
	$TITULACION_array_test1['metodo'] = 'responsable';
	$TITULACION_array_test1['error'] = 'demasiado corto';
	$TITULACION_array_test1['error_esperado'] = '00003';
	$TITULACION_array_test1['error_obtenido'] = '';
	$TITULACION_array_test1['resultado'] = '';

	// Relleno los datos de TITULACION	
	$responsable = 'm';
	// creo el modelo
	$TITULACION = new TITULACION_Model('','','',$responsable);

	$result = $TITULACION->comprobar_responsable();
	$TITULACION_array_test1['error_obtenido'] = $result[1];
	if ($TITULACION_array_test1['error_obtenido'] === $TITULACION_array_test1['error_esperado'])
	{
		$TITULACION_array_test1['resultado'] = 'OK';
	}
	else
	{
		$TITULACION_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test, $TITULACION_array_test1);

	//responsable vacio
	$TITULACION_array_test1['tipo'] = 'VALIDACION';
	$TITULACION_array_test1['entidad'] = 'TITULACION';	
	$TITULACION_array_test1['metodo'] = 'responsable';
	$TITULACION_array_test1['error'] = 'vacio';
	$TITULACION_array_test1['error_esperado'] = '00001';
	$TITULACION_array_test1['error_obtenido'] = '';
	$TITULACION_array_test1['resultado'] = '';

	// Relleno los datos de TITULACION	
	$responsable = '';
	// creo el modelo
	$TITULACION = new TITULACION_Model('','','',$responsable);

	$result = $TITULACION->comprobar_responsable();
	$TITULACION_array_test1['error_obtenido'] = $result[1];
	if ($TITULACION_array_test1['error_obtenido'] === $TITULACION_array_test1['error_esperado'])
	{
		$TITULACION_array_test1['resultado'] = 'OK';
	}
	else
	{
		$TITULACION_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test, $TITULACION_array_test1);


	//responsable formato erroneo
	$TITULACION_array_test1['tipo'] = 'VALIDACION';
	$TITULACION_array_test1['entidad'] = 'TITULACION';	
	$TITULACION_array_test1['metodo'] = 'responsable';
	$TITULACION_array_test1['error'] = 'formato erroneo';
	$TITULACION_array_test1['error_esperado'] = '00030';
	$TITULACION_array_test1['error_obtenido'] = '';
	$TITULACION_array_test1['resultado'] = '';

	// Relleno los datos de TITULACION	
	$responsable = 'mi|pass.14';
	// creo el modelo
	$TITULACION = new TITULACION_Model('','','',$responsable);

	$result = $TITULACION->comprobar_responsable();
	$TITULACION_array_test1['error_obtenido'] = $result[1];
	if ($TITULACION_array_test1['error_obtenido'] === $TITULACION_array_test1['error_esperado'])
	{
		$TITULACION_array_test1['resultado'] = 'OK';
	}
	else
	{
		$TITULACION_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test, $TITULACION_array_test1);
}


// function TITULACION_comprobar_ADD()
// Valida:
//		atributos OK
//		atributos name y login mal

function TITULACION_comprobar_ADD()
{
	global $ERRORS_array_test;
// creo array de almacen de test individual
	$TITULACION_array_test1 = array();

	//sexo correcto
	$TITULACION_array_test1['tipo'] = 'VALIDACION';
	$TITULACION_array_test1['entidad'] = 'TITULACION';	
	$TITULACION_array_test1['metodo'] = 'comprobar_atributos_ADD';
	$TITULACION_array_test1['error'] = 'correcto';
	$TITULACION_array_test1['error_esperado'] = 'true';
	$TITULACION_array_test1['error_obtenido'] = '';
	$TITULACION_array_test1['resultado'] = '';

	// creo el modelo
	$TITULACION = new TITULACION_Model('CoddTit','Centro','nombre','responsable');

	$TITULACION_array_test1['error_obtenido'] = $TITULACION->comprobar_atributos_ADD() == 1 ? 'true' : 'false';
	if ($TITULACION_array_test1['error_obtenido'] === $TITULACION_array_test1['error_esperado'])
	{
		$TITULACION_array_test1['resultado'] = 'OK';
	}
	else
	{
		$TITULACION_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test, $TITULACION_array_test1);

	//sexo vacia
	$TITULACION_array_test1['tipo'] = 'VALIDACION';
	$TITULACION_array_test1['entidad'] = 'TITULACION';	
	$TITULACION_array_test1['metodo'] = 'comprobar_atributos_ADD';
	$TITULACION_array_test1['error'] = 'Codigo TITULACION y centro erroneos';
	$TITULACION_array_test1['error_esperado'] = 'codeTitulation-00060-alfNum-codeCenter-00040-alfNumguion-';
	$TITULACION_array_test1['error_obtenido'] = '';
	$TITULACION_array_test1['resultado'] = '';

	// creo el modelo
	$TITULACION = new TITULACION_Model('CoddTit!','Centro??','codeCenter','responsable');
	$array = $TITULACION->comprobar_atributos_ADD();
	//var_dump($array);
	foreach ($array as $key ) {
		foreach ($key as $key2) {
			$result .= $key2.'-';
		}
	}
	$TITULACION_array_test1['error_obtenido'] = $result;
	if ($TITULACION_array_test1['error_obtenido'] === $TITULACION_array_test1['error_esperado'])
	{
		$TITULACION_array_test1['resultado'] = 'OK';
	}
	else
	{
		$TITULACION_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test, $TITULACION_array_test1);

	
}

// function TITULACION_comprobar_EDIT()
// Valida:
//		atributos OK
//		atributos name y login mal

function TITULACION_comprobar_EDIT()
{
	global $ERRORS_array_test;
// creo array de almacen de test individual
	$TITULACION_array_test1 = array();

	//sexo correcto
	$TITULACION_array_test1['tipo'] = 'VALIDACION';
	$TITULACION_array_test1['entidad'] = 'TITULACION';	
	$TITULACION_array_test1['metodo'] = 'comprobar_atributos_EDIT';
	$TITULACION_array_test1['error'] = 'correcto';
	$TITULACION_array_test1['error_esperado'] = 'true';
	$TITULACION_array_test1['error_obtenido'] = '';
	$TITULACION_array_test1['resultado'] = '';

	// creo el modelo
	$TITULACION = new TITULACION_Model('CoddTit','Centro','nombre','responsable');

	$TITULACION_array_test1['error_obtenido'] = $TITULACION->comprobar_atributos_EDIT() == 1 ? 'true' : 'false';
	if ($TITULACION_array_test1['error_obtenido'] === $TITULACION_array_test1['error_esperado'])
	{
		$TITULACION_array_test1['resultado'] = 'OK';
	}
	else
	{
		$TITULACION_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test, $TITULACION_array_test1);

	//sexo vacia
	$TITULACION_array_test1['tipo'] = 'VALIDACION';
	$TITULACION_array_test1['entidad'] = 'TITULACION';	
	$TITULACION_array_test1['metodo'] = 'comprobar_atributos_EDIT';
	$TITULACION_array_test1['error'] = 'Nombre y responsable erroneos';
	$TITULACION_array_test1['error_esperado'] = 'nameTitulation-00030-textonly-responsableTitulation-00030-textonly-';
	$TITULACION_array_test1['error_obtenido'] = '';
	$TITULACION_array_test1['resultado'] = '';

	// creo el modelo
	$TITULACION = new TITULACION_Model('CoddTit','Centro','codeCenter!!','responsable2');
	$array = $TITULACION->comprobar_atributos_EDIT();
	//var_dump($array);
	foreach ($array as $key ) {
		foreach ($key as $key2) {
			$result .= $key2.'-';
		}
	}
	$TITULACION_array_test1['error_obtenido'] = $result;
	if ($TITULACION_array_test1['error_obtenido'] === $TITULACION_array_test1['error_esperado'])
	{
		$TITULACION_array_test1['resultado'] = 'OK';
	}
	else
	{
		$TITULACION_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test, $TITULACION_array_test1);

	
}

// function TITULACION_comprobar_DELETE()
// Valida:
//		atributos OK
//		atributos name y login mal

function TITULACION_comprobar_DELETE()
{
	global $ERRORS_array_test;
// creo array de almacen de test individual
	$TITULACION_array_test1 = array();

	//sexo correcto
	$TITULACION_array_test1['tipo'] = 'VALIDACION';
	$TITULACION_array_test1['entidad'] = 'TITULACION';	
	$TITULACION_array_test1['metodo'] = 'comprobar_atributos_DELETE';
	$TITULACION_array_test1['error'] = 'correcto';
	$TITULACION_array_test1['error_esperado'] = 'true';
	$TITULACION_array_test1['error_obtenido'] = '';
	$TITULACION_array_test1['resultado'] = '';

	// creo el modelo
	$TITULACION = new TITULACION_Model('codTit','','','');

	$TITULACION_array_test1['error_obtenido'] = $TITULACION->comprobar_atributos_DELETE() == 1 ? 'true' : 'false';
	if ($TITULACION_array_test1['error_obtenido'] === $TITULACION_array_test1['error_esperado'])
	{
		$TITULACION_array_test1['resultado'] = 'OK';
	}
	else
	{
		$TITULACION_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test, $TITULACION_array_test1);

	//sexo vacia
	$TITULACION_array_test1['tipo'] = 'VALIDACION';
	$TITULACION_array_test1['entidad'] = 'TITULACION';	
	$TITULACION_array_test1['metodo'] = 'comprobar_atributos_DELETE';
	$TITULACION_array_test1['error'] = 'Codigo de la TITULACION erroneo';
	$TITULACION_array_test1['error_esperado'] = 'codeTitulation-00060-alfNum-';
	$TITULACION_array_test1['error_obtenido'] = '';
	$TITULACION_array_test1['resultado'] = '';

	// creo el modelo
	$TITULACION = new TITULACION_Model('lo no','','','');
	$array = $TITULACION->comprobar_atributos_DELETE();
	//var_dump($array);
	foreach ($array as $key ) {
		foreach ($key as $key2) {
			$result .= $key2.'-';
		}
	}
	$TITULACION_array_test1['error_obtenido'] = $result;
	if ($TITULACION_array_test1['error_obtenido'] === $TITULACION_array_test1['error_esperado'])
	{
		$TITULACION_array_test1['resultado'] = 'OK';
	}
	else
	{
		$TITULACION_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test, $TITULACION_array_test1);
}


// function TITULACION_comprobar_RellenaDatos()
// Valida:
//		atributos OK
//		atributos name y login mal

function TITULACION_comprobar_RellenaDatos()
{
	global $ERRORS_array_test;
// creo array de almacen de test individual
	$TITULACION_array_test1 = array();

	//sexo correcto
	$TITULACION_array_test1['tipo'] = 'VALIDACION';
	$TITULACION_array_test1['entidad'] = 'TITULACION';	
	$TITULACION_array_test1['metodo'] = 'comprobar_atributos_RellenaDatos';
	$TITULACION_array_test1['error'] = 'correcto';
	$TITULACION_array_test1['error_esperado'] = 'true';
	$TITULACION_array_test1['error_obtenido'] = '';
	$TITULACION_array_test1['resultado'] = '';

	// creo el modelo
	$TITULACION = new TITULACION_Model('login','','','','','',
		'','','','');

	$TITULACION_array_test1['error_obtenido'] = $TITULACION->comprobar_atributos_RellenaDatos() == 1 ? 'true' : 'false';
	if ($TITULACION_array_test1['error_obtenido'] === $TITULACION_array_test1['error_esperado'])
	{
		$TITULACION_array_test1['resultado'] = 'OK';
	}
	else
	{
		$TITULACION_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test, $TITULACION_array_test1);

	//sexo vacia
	$TITULACION_array_test1['tipo'] = 'VALIDACION';
	$TITULACION_array_test1['entidad'] = 'TITULACION';	
	$TITULACION_array_test1['metodo'] = 'comprobar_atributos_RellenaDatos';
	$TITULACION_array_test1['error'] = 'Cdigo de la titulacion erroneo';
	$TITULACION_array_test1['error_esperado'] = 'codeTitulation-00002-toolong-';
	$TITULACION_array_test1['error_obtenido'] = '';
	$TITULACION_array_test1['resultado'] = '';

	// creo el modelo
	$TITULACION = new TITULACION_Model('login espacio','','','');
	$array = $TITULACION->comprobar_atributos_RellenaDatos();
	//var_dump($array);
	foreach ($array as $key ) {
		foreach ($key as $key2) {
			$result .= $key2.'-';
		}
	}
	$TITULACION_array_test1['error_obtenido'] = $result;
	if ($TITULACION_array_test1['error_obtenido'] === $TITULACION_array_test1['error_esperado'])
	{
		$TITULACION_array_test1['resultado'] = 'OK';
	}
	else
	{
		$TITULACION_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test, $TITULACION_array_test1);
}
	
	TITULACION_comprobar_TITULACION_test();
	TITULACION_comprobar_centro_test();
	TITULACION_comprobar_nombre_test();
	TITULACION_comprobar_responsable_test();

	TITULACION_comprobar_ADD();
	TITULACION_comprobar_EDIT();
	TITULACION_comprobar_DELETE();
	TITULACION_comprobar_RellenaDatos();
?>