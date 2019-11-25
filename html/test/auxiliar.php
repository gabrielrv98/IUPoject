<?php
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

TITULACION_comprobar_nombre_test();

?>
