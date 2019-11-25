<?php

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


?>
