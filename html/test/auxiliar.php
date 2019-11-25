<?php
// function TITULACION_comproba_atributos_test()
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


	//Codcentro formato erroneo
	$TITULACION_array_test1['tipo'] = 'VALIDACION';
	$TITULACION_array_test1['entidad'] = 'TITULACION';	
	$TITULACION_array_test1['metodo'] = 'Codcentro';
	$TITULACION_array_test1['error'] = 'formato erroneo';
	$TITULACION_array_test1['error_esperado'] = '00060';
	$TITULACION_array_test1['error_obtenido'] = '';
	$TITULACION_array_test1['resultado'] = '';

	// Relleno los datos de TITULACION	
	$Codcentro = 'mi|pass.14';
	// creo el modelo
	$TITULACION = new TITULACION_Model($Codcentro,'','','');

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



?>
