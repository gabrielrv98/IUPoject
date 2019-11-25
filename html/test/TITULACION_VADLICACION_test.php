<?php
//Clase : TITULACION_test
//Creado el : 20-11-2019
//Creado por: grvidal
//Fichero de test de unidad de la entidad TITULACION
//	Saca por pantalla el resultado de los test
//-------------------------------------------------------


// function TITULACION_comprobar_tituacion_test()
// Valida:
//		codTitulacion correcto
//		codTitulacion demasiado largo
//		codTitulacion demasiado corto
//		codTitulacion vacio
//		codTitulacion inesperado

function TITULACION_comprobar_titulacion_test()
{
	global $ERRORS_array_test;
// creo array de almacen de test individual
	$TITULACION_array_test1 = array();

// codTitulacion correcto
//----------------------------------------------
	$TITULACION_array_test1['tipo'] = 'VALIDACION';
	$TITULACION_array_test1['entidad'] = 'TITULACION';	
	$TITULACION_array_test1['metodo'] = 'CodTitulacion';
	$TITULACION_array_test1['error'] = 'correcto';
	$TITULACION_array_test1['error_esperado'] = 'true';
	$TITULACION_array_test1['error_obtenido'] = '';
	$TITULACION_array_test1['resultado'] = '';
	$codTitulacion = 'codTit';
	// creo el modelo
	$TITULACION = new TITULACION_Model($codTitulacion,'','','');

	if ($TITULACION->comprobar_titulacion()) $res = 'true';
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


	//codTitulacion demasiado largo
	$TITULACION_array_test1['tipo'] = 'VALIDACION';
	$TITULACION_array_test1['entidad'] = 'TITULACION';	
	$TITULACION_array_test1['metodo'] = 'CodTitulacion';
	$TITULACION_array_test1['error'] = 'demasiado largo';
	$TITULACION_array_test1['error_esperado'] = '00002';
	$TITULACION_array_test1['error_obtenido'] = '';
	$TITULACION_array_test1['resultado'] = '';

	// Relleno los datos de TITULACION	
	$login = 'miTITULACIONesElMasLargoDelMundoYCabraEnLaBaseDeDatosPorqueSoyGenial';
	// creo el modelo
	$TITULACION = new TITULACION_Model($login,'','','');

	$result = $TITULACION->comprobar_titulacion();
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

	//codTitulacion demasiado corto
	$TITULACION_array_test1['tipo'] = 'VALIDACION';
	$TITULACION_array_test1['entidad'] = 'TITULACION';	
	$TITULACION_array_test1['metodo'] = 'CodTitulacion';
	$TITULACION_array_test1['error'] = 'demasiado corto';
	$TITULACION_array_test1['error_esperado'] = '00003';
	$TITULACION_array_test1['error_obtenido'] = '';
	$TITULACION_array_test1['resultado'] = '';

	// Relleno los datos de TITULACION	
	$login = 'm';
	// creo el modelo
	$TITULACION = new TITULACION_Model($login,'','','');

	$result = $TITULACION->comprobar_titulacion();
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

	//codTitulacion vacio
	$TITULACION_array_test1['tipo'] = 'VALIDACION';
	$TITULACION_array_test1['entidad'] = 'TITULACION';	
	$TITULACION_array_test1['metodo'] = 'codTitulacion';
	$TITULACION_array_test1['error'] = 'vacio';
	$TITULACION_array_test1['error_esperado'] = '00001';
	$TITULACION_array_test1['error_obtenido'] = '';
	$TITULACION_array_test1['resultado'] = '';

	// Relleno los datos de TITULACION	
	$login = '';
	// creo el modelo
	$TITULACION = new TITULACION_Model($login,'','','');

	$result = $TITULACION->comprobar_titulacion();
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


	//codTitulacion formato erroneo
	$TITULACION_array_test1['tipo'] = 'VALIDACION';
	$TITULACION_array_test1['entidad'] = 'TITULACION';	
	$TITULACION_array_test1['metodo'] = 'CodTitulacion';
	$TITULACION_array_test1['error'] = 'formato erroneo';
	$TITULACION_array_test1['error_esperado'] = '00060';
	$TITULACION_array_test1['error_obtenido'] = '';
	$TITULACION_array_test1['resultado'] = '';

	// Relleno los datos de TITULACION	
	$CodTitulacion = 'mi|pass.14';
	// creo el modelo
	$TITULACION = new TITULACION_Model($CodTitulacion,'','','');

	$result = $TITULACION->comprobar_titulacion();
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



	TITULACION_comprobar_titulacion_test();
	TITULACION_comprobar_centro_test();

?>