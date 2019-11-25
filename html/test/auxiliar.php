<?php
// function ESPACIO_comprobar_tipo_test()
// Valida:
//		Tipo correcto
//		Tipo vacio
//		Tipo inesperado

function ESPACIO_comprobar_tipo_test()
{
	global $ERRORS_array_test;
// creo array de almacen de test individual
	$ESPACIO_array_test1 = array();

// Tipo correcto
//----------------------------------------------
	$ESPACIO_array_test1['tipo'] = 'VALIDACION';
	$ESPACIO_array_test1['entidad'] = 'ESPACIO';	
	$ESPACIO_array_test1['metodo'] = 'Tipo';
	$ESPACIO_array_test1['error'] = 'correcto';
	$ESPACIO_array_test1['error_esperado'] = 'true';
	$ESPACIO_array_test1['error_obtenido'] = '';
	$ESPACIO_array_test1['resultado'] = '';

	$tipo = 'PAS';
	// creo el modelo
	$ESPACIO = new ESPACIO_Model('','','',$tipo,'','');

	if ($ESPACIO->comprobar_tipo()) $res = 'true';
	else $res = 'false';

	$ESPACIO_array_test1['error_obtenido'] = $res;
	if ($ESPACIO_array_test1['error_obtenido'] === $ESPACIO_array_test1['error_esperado'])
	{
		$ESPACIO_array_test1['resultado'] = 'OK';
	}
	else
	{
		$ESPACIO_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test, $ESPACIO_array_test1);

	//Tipo vacio
	$ESPACIO_array_test1['tipo'] = 'VALIDACION';
	$ESPACIO_array_test1['entidad'] = 'ESPACIO';	
	$ESPACIO_array_test1['metodo'] = 'Tipo';
	$ESPACIO_array_test1['error'] = 'vacio';
	$ESPACIO_array_test1['error_esperado'] = '00001';
	$ESPACIO_array_test1['error_obtenido'] = '';
	$ESPACIO_array_test1['resultado'] = '';

	// Relleno los datos de ESPACIO	
	$tipo = '';
	// creo el modelo
	$ESPACIO = new ESPACIO_Model('','','',$tipo,'','');

	$result = $ESPACIO->comprobar_tipo();
	$ESPACIO_array_test1['error_obtenido'] = $result[1];
	if ($ESPACIO_array_test1['error_obtenido'] === $ESPACIO_array_test1['error_esperado'])
	{
		$ESPACIO_array_test1['resultado'] = 'OK';
	}
	else
	{
		$ESPACIO_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test, $ESPACIO_array_test1);


	//Tipo formato erroneo
	$ESPACIO_array_test1['tipo'] = 'VALIDACION';
	$ESPACIO_array_test1['entidad'] = 'ESPACIO';	
	$ESPACIO_array_test1['metodo'] = 'Tipo';
	$ESPACIO_array_test1['error'] = 'formato erroneo';
	$ESPACIO_array_test1['error_esperado'] = '00080';
	$ESPACIO_array_test1['error_obtenido'] = '';
	$ESPACIO_array_test1['resultado'] = '';

	// Relleno los datos de ESPACIO	
	$tipo = 'a';
	// creo el modelo
	$ESPACIO = new ESPACIO_Model('','','',$tipo,'','');

	$result = $ESPACIO->comprobar_tipo();
	$ESPACIO_array_test1['error_obtenido'] = $result[1];
	if ($ESPACIO_array_test1['error_obtenido'] === $ESPACIO_array_test1['error_esperado'])
	{
		$ESPACIO_array_test1['resultado'] = 'OK';
	}
	else
	{
		$ESPACIO_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test, $ESPACIO_array_test1);
}


?>
