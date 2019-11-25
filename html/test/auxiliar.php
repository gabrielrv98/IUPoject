<?php

// function EDIFICIO_comproba_atributos_test()
// Valida:
//		Campus correcto
//		Campus demasiado largo
//		Campus demasiado corto
//		Campus vacio
//		Campus formato incorrecto

function EDIFICIO_comprobar_campus_test()
{
	global $ERRORS_array_test;
// creo array de almacen de test individual
	$EDIFICIO_array_test1 = array();

	//Campus correcta
	$EDIFICIO_array_test1['tipo'] = 'VALIDACION';
	$EDIFICIO_array_test1['entidad'] = 'EDIFICIO';	
	$EDIFICIO_array_test1['metodo'] = 'Campus';
	$EDIFICIO_array_test1['error'] = 'correcto';
	$EDIFICIO_array_test1['error_esperado'] = 'true';
	$EDIFICIO_array_test1['error_obtenido'] = '';
	$EDIFICIO_array_test1['resultado'] = '';

	// Relleno los datos de edificio	
	$campus = 'direcciongenialº2';
	// creo el modelo
	$EDIFICIO = new EDIFICIO_Model('','',$campus,'');

	if ($EDIFICIO->comprobar_campus()) $res = 'true';
		else $res = 'false';
	$EDIFICIO_array_test1['error_obtenido'] = $res;
	if ($EDIFICIO_array_test1['error_obtenido'] === $EDIFICIO_array_test1['error_esperado'])
	{
		$EDIFICIO_array_test1['resultado'] = 'OK';
	}
	else
	{
		$EDIFICIO_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test, $EDIFICIO_array_test1);

	//Campus vacia
	$EDIFICIO_array_test1['tipo'] = 'VALIDACION';
	$EDIFICIO_array_test1['entidad'] = 'EDIFICIO';	
	$EDIFICIO_array_test1['metodo'] = 'Campus';
	$EDIFICIO_array_test1['error'] = 'vacio';
	$EDIFICIO_array_test1['error_esperado'] = '00001';
	$EDIFICIO_array_test1['error_obtenido'] = '';
	$EDIFICIO_array_test1['resultado'] = '';

	// Relleno los datos de edificio	
	$campus = '';
	// creo el modelo
	$EDIFICIO = new EDIFICIO_Model('','',$campus,'');
	$result = $EDIFICIO->comprobar_campus();
	$EDIFICIO_array_test1['error_obtenido'] = $result[1];
	if ($EDIFICIO_array_test1['error_obtenido'] === $EDIFICIO_array_test1['error_esperado'])
	{
		$EDIFICIO_array_test1['resultado'] = 'OK';
	}
	else
	{
		$EDIFICIO_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test, $EDIFICIO_array_test1);

	//Campus muy larga
	$EDIFICIO_array_test1['tipo'] = 'VALIDACION';
	$EDIFICIO_array_test1['entidad'] = 'EDIFICIO';	
	$EDIFICIO_array_test1['metodo'] = 'Campus';
	$EDIFICIO_array_test1['error'] = 'muy largo';
	$EDIFICIO_array_test1['error_esperado'] = '00002';
	$EDIFICIO_array_test1['error_obtenido'] = '';
	$EDIFICIO_array_test1['resultado'] = '';

	// Relleno los datos de edificio	
	$campus = 'passGenialMaravillosaDelMundoGenialYRequeteGenialasdasdasdasdasdasdarwefasaddsadasdasdasdasdas';
	// creo el modelo
	$EDIFICIO = new EDIFICIO_Model('','',$campus,'');

	$result = $EDIFICIO->comprobar_campus();
	$EDIFICIO_array_test1['error_obtenido'] = $result[1];
	if ($EDIFICIO_array_test1['error_obtenido'] === $EDIFICIO_array_test1['error_esperado'])
	{
		$EDIFICIO_array_test1['resultado'] = 'OK';
	}
	else
	{
		$EDIFICIO_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test, $EDIFICIO_array_test1);

	//Campus muy corta
	$EDIFICIO_array_test1['tipo'] = 'VALIDACION';
	$EDIFICIO_array_test1['entidad'] = 'EDIFICIO';	
	$EDIFICIO_array_test1['metodo'] = 'Campus';
	$EDIFICIO_array_test1['error'] = 'muy corto';
	$EDIFICIO_array_test1['error_esperado'] = '00003';
	$EDIFICIO_array_test1['error_obtenido'] = '';
	$EDIFICIO_array_test1['resultado'] = '';

	// Relleno los datos de edificio	
	$campus = 'a';
	// creo el modelo
	$EDIFICIO = new EDIFICIO_Model('','',$campus,'');

	$result = $EDIFICIO->comprobar_campus();
	$EDIFICIO_array_test1['error_obtenido'] = $result[1];
	if ($EDIFICIO_array_test1['error_obtenido'] === $EDIFICIO_array_test1['error_esperado'])
	{
		$EDIFICIO_array_test1['resultado'] = 'OK';
	}
	else
	{
		$EDIFICIO_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test, $EDIFICIO_array_test1);

	//Campus erronea
	$EDIFICIO_array_test1['tipo'] = 'VALIDACION';
	$EDIFICIO_array_test1['entidad'] = 'EDIFICIO';	
	$EDIFICIO_array_test1['metodo'] = 'Campus';
	$EDIFICIO_array_test1['error'] = 'erronea';
	$EDIFICIO_array_test1['error_esperado'] = '00050';
	$EDIFICIO_array_test1['error_obtenido'] = '';
	$EDIFICIO_array_test1['resultado'] = '';

	// Relleno los datos de edificio	
	$campus = 'a|349)==?_';
	// creo el modelo
	$EDIFICIO = new EDIFICIO_Model('','',$campus,'');

	$result = $EDIFICIO->comprobar_campus();
	$EDIFICIO_array_test1['error_obtenido'] = $result[1];
	if ($EDIFICIO_array_test1['error_obtenido'] === $EDIFICIO_array_test1['error_esperado'])
	{
		$EDIFICIO_array_test1['resultado'] = 'OK';
	}
	else
	{
		$EDIFICIO_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test, $EDIFICIO_array_test1);
}

?>