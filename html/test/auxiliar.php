<?php
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

PROFESOR_comprobar_departamento_test();

?>
