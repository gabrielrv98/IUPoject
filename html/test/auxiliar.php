<?php
// function USUARIOS_comprobar_sexo_test()
// Valida:
//		sexo correcto
//		sexo vacio
//		sexo formato incorrecto

function USUARIOS_comprobar_sexo_test()
{
	global $ERRORS_array_test;
// creo array de almacen de test individual
	$USUARIO_array_test1 = array();

	//sexo correcto
	$USUARIO_array_test1['tipo'] = 'VALIDACION';
	$USUARIO_array_test1['entidad'] = 'USUARIO';	
	$USUARIO_array_test1['metodo'] = 'sexo';
	$USUARIO_array_test1['error'] = 'sexo correcto';
	$USUARIO_array_test1['error_esperado'] = 'true';
	$USUARIO_array_test1['error_obtenido'] = '';
	$USUARIO_array_test1['resultado'] = '';

	// Relleno los datos de usuario	
	$sexo = 'hombre';
	// creo el modelo
	$USUARIO = new USUARIOS_Model('','','','','','','','','',$sexo);

	if ($USUARIO->comprobar_sexo()) $res = 'true';
		else $res = 'false';
	$USUARIO_array_test1['error_obtenido'] = $res;
	if ($USUARIO_array_test1['error_obtenido'] === $USUARIO_array_test1['error_esperado'])
	{
		$USUARIO_array_test1['resultado'] = 'OK';
	}
	else
	{
		$USUARIO_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test, $USUARIO_array_test1);

	//sexo vacia
	$USUARIO_array_test1['tipo'] = 'VALIDACION';
	$USUARIO_array_test1['entidad'] = 'USUARIO';	
	$USUARIO_array_test1['metodo'] = 'sexo';
	$USUARIO_array_test1['error'] = 'sexo vacio';
	$USUARIO_array_test1['error_esperado'] = '00001';
	$USUARIO_array_test1['error_obtenido'] = '';
	$USUARIO_array_test1['resultado'] = '';

	// Relleno los datos de usuario	
	$sexo = '';
	// creo el modelo
	$USUARIO = new USUARIOS_Model('','','','','','','','','',$sexo);
	$result = $USUARIO->comprobar_sexo();
	$USUARIO_array_test1['error_obtenido'] = $result[1];
	if ($USUARIO_array_test1['error_obtenido'] === $USUARIO_array_test1['error_esperado'])
	{
		$USUARIO_array_test1['resultado'] = 'OK';
	}
	else
	{
		$USUARIO_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test, $USUARIO_array_test1);

	//sexo formato incorrecto
	$USUARIO_array_test1['tipo'] = 'VALIDACION';
	$USUARIO_array_test1['entidad'] = 'USUARIO';	
	$USUARIO_array_test1['metodo'] = 'sexo';
	$USUARIO_array_test1['error'] = 'sexo formato incorrecto';
	$USUARIO_array_test1['error_esperado'] = '00002';
	$USUARIO_array_test1['error_obtenido'] = '';
	$USUARIO_array_test1['resultado'] = '';

	// Relleno los datos de usuario	
	$sexo = 'ojala';
	// creo el modelo
	$USUARIO = new USUARIOS_Model('','','','','','','','','',$sexo);

	$result = $USUARIO->comprobar_sexo();
	$USUARIO_array_test1['error_obtenido'] = $result[1];
	if ($USUARIO_array_test1['error_obtenido'] === $USUARIO_array_test1['error_esperado'])
	{
		$USUARIO_array_test1['resultado'] = 'OK';
	}
	else
	{
		$USUARIO_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test, $USUARIO_array_test1);


}



?>