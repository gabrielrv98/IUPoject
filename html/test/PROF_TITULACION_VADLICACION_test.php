<?php
//Clase : PROF_TITULACION__Validacion_test.php
//Creado el : 23-11-2019
//Creado por: grvidal
//Fichero de test de unidad de la entidad TITULACION
//	Saca por pantalla el resultado de los test
//-------------------------------------------------------


// function PROF_TITULACION_comprobar_dni_test()
// Valida:
//		dni correcto
//		dni formato erroneo
//	
function PROF_TITULACION_comprobar_dni_test()
{
	global $ERRORS_array_test;
// creo array de almacen de test individual
	$PROF_TITULACION_array_test1 = array();

// dni correcto
//----------------------------------------------
	$PROF_TITULACION_array_test1['tipo'] = 'VALIDACION';
	$PROF_TITULACION_array_test1['entidad'] = 'PROF_TITULACION';	
	$PROF_TITULACION_array_test1['metodo'] = 'dni';
	$PROF_TITULACION_array_test1['error'] = 'correcto';
	$PROF_TITULACION_array_test1['error_esperado'] = 'true';
	$PROF_TITULACION_array_test1['error_obtenido'] = '';
	$PROF_TITULACION_array_test1['resultado'] = '';
	$dni = '25166583Y';
	// creo el modelo
	$PROF_TITULACION = new PROF_TITULACION_Model($dni,'','');

	if ($PROF_TITULACION->comprobar_dni()) $res = 'true';
	else $res = 'false';

	$PROF_TITULACION_array_test1['error_obtenido'] = $res;
	if ($PROF_TITULACION_array_test1['error_obtenido'] === $PROF_TITULACION_array_test1['error_esperado'])
	{
		$PROF_TITULACION_array_test1['resultado'] = 'OK';
	}
	else
	{
		$PROF_TITULACION_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test, $PROF_TITULACION_array_test1);


	//dni forrmato erroneo
	$PROF_TITULACION_array_test1['tipo'] = 'VALIDACION';
	$PROF_TITULACION_array_test1['entidad'] = 'PROF_TITULACION';	
	$PROF_TITULACION_array_test1['metodo'] = 'dni';
	$PROF_TITULACION_array_test1['error'] = 'formato erroneo';
	$PROF_TITULACION_array_test1['error_esperado'] = '00010';
	$PROF_TITULACION_array_test1['error_obtenido'] = '';
	$PROF_TITULACION_array_test1['resultado'] = '';

	// Relleno los datos de PROF_TITULACION	
	$dni = '44';
	// creo el modelo
	$PROF_TITULACION = new PROF_TITULACION_Model($dni,'','');

	$result = $PROF_TITULACION->comprobar_dni();
	$PROF_TITULACION_array_test1['error_obtenido'] = $result[1];
	if ($PROF_TITULACION_array_test1['error_obtenido'] === $PROF_TITULACION_array_test1['error_esperado'])
	{
		$PROF_TITULACION_array_test1['resultado'] = 'OK';
	}
	else
	{
		$PROF_TITULACION_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test, $PROF_TITULACION_array_test1);

}


// function PROF_TITULACION_comprobar_titulacion_test()
// Valida:
//		titulacion correcto
//		titulacion demasiado largo
//		titulacion demasiado corto
//		titulacion vacio
//		titulacion formato erroneo
//	
function PROF_TITULACION_comprobar_titulacion_test()
{
	global $ERRORS_array_test;
// creo array de almacen de test individual
	$PROF_TITULACION_array_test1 = array();

// CodTitulacion correcto
//----------------------------------------------
	$PROF_TITULACION_array_test1['tipo'] = 'VALIDACION';
	$PROF_TITULACION_array_test1['entidad'] = 'PROF_TITULACION';	
	$PROF_TITULACION_array_test1['metodo'] = 'CodTitulacion';
	$PROF_TITULACION_array_test1['error'] = 'correcto';
	$PROF_TITULACION_array_test1['error_esperado'] = 'true';
	$PROF_TITULACION_array_test1['error_obtenido'] = '';
	$PROF_TITULACION_array_test1['resultado'] = '';
	$CodTitulacion = 'codTit';
	// creo el modelo
	$PROF_TITULACION = new PROF_TITULACION_Model('',$CodTitulacion,'');

	if ($PROF_TITULACION->comprobar_titulacion()) $res = 'true';
	else $res = 'false';

	$PROF_TITULACION_array_test1['error_obtenido'] = $res;
	if ($PROF_TITULACION_array_test1['error_obtenido'] === $PROF_TITULACION_array_test1['error_esperado'])
	{
		$PROF_TITULACION_array_test1['resultado'] = 'OK';
	}
	else
	{
		$PROF_TITULACION_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test, $PROF_TITULACION_array_test1);


	//CodTitulacion demasiado largo
	$PROF_TITULACION_array_test1['tipo'] = 'VALIDACION';
	$PROF_TITULACION_array_test1['entidad'] = 'PROF_TITULACION';	
	$PROF_TITULACION_array_test1['metodo'] = 'CodTitulacion';
	$PROF_TITULACION_array_test1['error'] = 'demasiado largo';
	$PROF_TITULACION_array_test1['error_esperado'] = '00002';
	$PROF_TITULACION_array_test1['error_obtenido'] = '';
	$PROF_TITULACION_array_test1['resultado'] = '';

	// Relleno los datos de PROF_TITULACION	
	$CodTitulacion = 'miPROF_TITULACIONesElMasLargoDelMundoYCabraEnLaBaseDeDatosPorqueSoyGenial';
	// creo el modelo
	$PROF_TITULACION = new PROF_TITULACION_Model('',$CodTitulacion,'');

	$result = $PROF_TITULACION->comprobar_titulacion();
	$PROF_TITULACION_array_test1['error_obtenido'] = $result[1];
	if ($PROF_TITULACION_array_test1['error_obtenido'] === $PROF_TITULACION_array_test1['error_esperado'])
	{
		$PROF_TITULACION_array_test1['resultado'] = 'OK';
	}
	else
	{
		$PROF_TITULACION_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test, $PROF_TITULACION_array_test1);

	//CodTitulacion demasiado corto
	$PROF_TITULACION_array_test1['tipo'] = 'VALIDACION';
	$PROF_TITULACION_array_test1['entidad'] = 'PROF_TITULACION';	
	$PROF_TITULACION_array_test1['metodo'] = 'CodTitulacion';
	$PROF_TITULACION_array_test1['error'] = 'demasiado corto';
	$PROF_TITULACION_array_test1['error_esperado'] = '00003';
	$PROF_TITULACION_array_test1['error_obtenido'] = '';
	$PROF_TITULACION_array_test1['resultado'] = '';

	// Relleno los datos de PROF_TITULACION	
	$CodTitulacion = 'm';
	// creo el modelo
	$PROF_TITULACION = new PROF_TITULACION_Model('',$CodTitulacion,'');

	$result = $PROF_TITULACION->comprobar_titulacion();
	$PROF_TITULACION_array_test1['error_obtenido'] = $result[1];
	if ($PROF_TITULACION_array_test1['error_obtenido'] === $PROF_TITULACION_array_test1['error_esperado'])
	{
		$PROF_TITULACION_array_test1['resultado'] = 'OK';
	}
	else
	{
		$PROF_TITULACION_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test, $PROF_TITULACION_array_test1);

	//CodTitulacion vacio
	$PROF_TITULACION_array_test1['tipo'] = 'VALIDACION';
	$PROF_TITULACION_array_test1['entidad'] = 'PROF_TITULACION';	
	$PROF_TITULACION_array_test1['metodo'] = 'CodTitulacion';
	$PROF_TITULACION_array_test1['error'] = 'vacio';
	$PROF_TITULACION_array_test1['error_esperado'] = '00001';
	$PROF_TITULACION_array_test1['error_obtenido'] = '';
	$PROF_TITULACION_array_test1['resultado'] = '';

	// Relleno los datos de PROF_TITULACION	
	$CodTitulacion = '';
	// creo el modelo
	$PROF_TITULACION = new PROF_TITULACION_Model('',$CodTitulacion,'');

	$result = $PROF_TITULACION->comprobar_titulacion();
	$PROF_TITULACION_array_test1['error_obtenido'] = $result[1];
	if ($PROF_TITULACION_array_test1['error_obtenido'] === $PROF_TITULACION_array_test1['error_esperado'])
	{
		$PROF_TITULACION_array_test1['resultado'] = 'OK';
	}
	else
	{
		$PROF_TITULACION_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test, $PROF_TITULACION_array_test1);


	//CodTitulacion formato erroneo
	$PROF_TITULACION_array_test1['tipo'] = 'VALIDACION';
	$PROF_TITULACION_array_test1['entidad'] = 'PROF_TITULACION';	
	$PROF_TITULACION_array_test1['metodo'] = 'CodTitulacion';
	$PROF_TITULACION_array_test1['error'] = 'formato erroneo';
	$PROF_TITULACION_array_test1['error_esperado'] = '00060';
	$PROF_TITULACION_array_test1['error_obtenido'] = '';
	$PROF_TITULACION_array_test1['resultado'] = '';

	// Relleno los datos de PROF_TITULACION	
	$CodTitulacion = 'mi|pass.14';
	// creo el modelo
	$PROF_TITULACION = new PROF_TITULACION_Model('',$CodTitulacion,'');

	$result = $PROF_TITULACION->comprobar_titulacion();
	$PROF_TITULACION_array_test1['error_obtenido'] = $result[1];
	if ($PROF_TITULACION_array_test1['error_obtenido'] === $PROF_TITULACION_array_test1['error_esperado'])
	{
		$PROF_TITULACION_array_test1['resultado'] = 'OK';
	}
	else
	{
		$PROF_TITULACION_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test, $PROF_TITULACION_array_test1);
}


// function PROF_TITULACION_comprobar_year_test()
// Valida:
//		year correcto
//		year formato erroneo
//	
function PROF_TITULACION_comprobar_year_test()
{
	global $ERRORS_array_test;
// creo array de almacen de test individual
	$PROF_TITULACION_array_test1 = array();

// año correcto
//----------------------------------------------
	$PROF_TITULACION_array_test1['tipo'] = 'VALIDACION';
	$PROF_TITULACION_array_test1['entidad'] = 'PROF_TITULACION';	
	$PROF_TITULACION_array_test1['metodo'] = 'año';
	$PROF_TITULACION_array_test1['error'] = 'correcto';
	$PROF_TITULACION_array_test1['error_esperado'] = 'true';
	$PROF_TITULACION_array_test1['error_obtenido'] = '';
	$PROF_TITULACION_array_test1['resultado'] = '';
	$year = '2010-2011';
	// creo el modelo
	$PROF_TITULACION = new PROF_TITULACION_Model('','',$year);

	if ($PROF_TITULACION->comprobar_anhoAcademico()) $res = 'true';
	else $res = 'false';

	$PROF_TITULACION_array_test1['error_obtenido'] = $res;
	if ($PROF_TITULACION_array_test1['error_obtenido'] === $PROF_TITULACION_array_test1['error_esperado'])
	{
		$PROF_TITULACION_array_test1['resultado'] = 'OK';
	}
	else
	{
		$PROF_TITULACION_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test, $PROF_TITULACION_array_test1);


	//año formato erroneo
	$PROF_TITULACION_array_test1['tipo'] = 'VALIDACION';
	$PROF_TITULACION_array_test1['entidad'] = 'PROF_TITULACION';	
	$PROF_TITULACION_array_test1['metodo'] = 'año';
	$PROF_TITULACION_array_test1['error'] = 'formato erroneo';
	$PROF_TITULACION_array_test1['error_esperado'] = '00110';
	$PROF_TITULACION_array_test1['error_obtenido'] = '';
	$PROF_TITULACION_array_test1['resultado'] = '';

	// Relleno los datos de PROF_TITULACION	
	$year = 'mi|pass.14';
	// creo el modelo
	$PROF_TITULACION = new PROF_TITULACION_Model('','',$year);

	$result = $PROF_TITULACION->comprobar_anhoAcademico();
	$PROF_TITULACION_array_test1['error_obtenido'] = $result[1];
	if ($PROF_TITULACION_array_test1['error_obtenido'] === $PROF_TITULACION_array_test1['error_esperado'])
	{
		$PROF_TITULACION_array_test1['resultado'] = 'OK';
	}
	else
	{
		$PROF_TITULACION_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test, $PROF_TITULACION_array_test1);
}

	PROF_TITULACION_comprobar_dni_test();
	PROF_TITULACION_comprobar_titulacion_test();
	PROF_TITULACION_comprobar_year_test();

?>