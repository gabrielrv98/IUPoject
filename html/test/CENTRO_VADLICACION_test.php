<?php

// function CENTRO_comprobar_centro_test()
// Valida:
//		Codcentro correcto
//		Codcentro demasiado largo
//		Codcentro demasiado corto
//		Codcentro vacio
//		Codcentro inesperado

function CENTRO_comprobar_centro_test()
{
	global $ERRORS_array_test;
// creo array de almacen de test individual
	$CENTRO_array_test1 = array();

// Codcentro correcto
//----------------------------------------------
	$CENTRO_array_test1['tipo'] = 'VALIDACION';
	$CENTRO_array_test1['entidad'] = 'CENTRO';	
	$CENTRO_array_test1['metodo'] = 'Codcentro';
	$CENTRO_array_test1['error'] = 'correcto';
	$CENTRO_array_test1['error_esperado'] = 'true';
	$CENTRO_array_test1['error_obtenido'] = '';
	$CENTRO_array_test1['resultado'] = '';
	$codCent = 'codCent';
	// creo el modelo
	$CENTRO = new CENTRO_Model($codCent,'','','','');

	if ($CENTRO->comprobar_centro()) $res = 'true';
	else $res = 'false';

	$CENTRO_array_test1['error_obtenido'] = $res;
	if ($CENTRO_array_test1['error_obtenido'] === $CENTRO_array_test1['error_esperado'])
	{
		$CENTRO_array_test1['resultado'] = 'OK';
	}
	else
	{
		$CENTRO_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test, $CENTRO_array_test1);


	//Codcentro demasiado largo
	$CENTRO_array_test1['tipo'] = 'VALIDACION';
	$CENTRO_array_test1['entidad'] = 'CENTRO';	
	$CENTRO_array_test1['metodo'] = 'Codcentro';
	$CENTRO_array_test1['error'] = 'demasiado largo';
	$CENTRO_array_test1['error_esperado'] = '00002';
	$CENTRO_array_test1['error_obtenido'] = '';
	$CENTRO_array_test1['resultado'] = '';

	// Relleno los datos de CENTRO	
	$codCent = 'miCENTROesElMasLargoDelMundoYCabraEnLaBaseDeDatosPorqueSoyGenial';
	// creo el modelo
	$CENTRO = new CENTRO_Model($codCent,'','','','');

	$result = $CENTRO->comprobar_centro();
	$CENTRO_array_test1['error_obtenido'] = $result[1];
	if ($CENTRO_array_test1['error_obtenido'] === $CENTRO_array_test1['error_esperado'])
	{
		$CENTRO_array_test1['resultado'] = 'OK';
	}
	else
	{
		$CENTRO_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test, $CENTRO_array_test1);

	//Codcentro demasiado corto
	$CENTRO_array_test1['tipo'] = 'VALIDACION';
	$CENTRO_array_test1['entidad'] = 'CENTRO';	
	$CENTRO_array_test1['metodo'] = 'Codcentro';
	$CENTRO_array_test1['error'] = 'demasiado corto';
	$CENTRO_array_test1['error_esperado'] = '00003';
	$CENTRO_array_test1['error_obtenido'] = '';
	$CENTRO_array_test1['resultado'] = '';

	// Relleno los datos de CENTRO	
	$codCent = 'm';
	// creo el modelo
	$CENTRO = new CENTRO_Model($codCent,'','','','');

	$result = $CENTRO->comprobar_centro();
	$CENTRO_array_test1['error_obtenido'] = $result[1];
	if ($CENTRO_array_test1['error_obtenido'] === $CENTRO_array_test1['error_esperado'])
	{
		$CENTRO_array_test1['resultado'] = 'OK';
	}
	else
	{
		$CENTRO_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test, $CENTRO_array_test1);

	//Codcentro vacio
	$CENTRO_array_test1['tipo'] = 'VALIDACION';
	$CENTRO_array_test1['entidad'] = 'CENTRO';	
	$CENTRO_array_test1['metodo'] = 'Codcentro';
	$CENTRO_array_test1['error'] = 'vacio';
	$CENTRO_array_test1['error_esperado'] = '00001';
	$CENTRO_array_test1['error_obtenido'] = '';
	$CENTRO_array_test1['resultado'] = '';

	// Relleno los datos de CENTRO	
	$codCent = '';
	// creo el modelo
	$CENTRO = new CENTRO_Model($codCent,'','','','');

	$result = $CENTRO->comprobar_centro();
	$CENTRO_array_test1['error_obtenido'] = $result[1];
	if ($CENTRO_array_test1['error_obtenido'] === $CENTRO_array_test1['error_esperado'])
	{
		$CENTRO_array_test1['resultado'] = 'OK';
	}
	else
	{
		$CENTRO_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test, $CENTRO_array_test1);


	//Codcentro formato erroneo
	$CENTRO_array_test1['tipo'] = 'VALIDACION';
	$CENTRO_array_test1['entidad'] = 'CENTRO';	
	$CENTRO_array_test1['metodo'] = 'Codcentro';
	$CENTRO_array_test1['error'] = 'formato erroneo';
	$CENTRO_array_test1['error_esperado'] = '00040';
	$CENTRO_array_test1['error_obtenido'] = '';
	$CENTRO_array_test1['resultado'] = '';

	// Relleno los datos de CENTRO	
	$codCent = 'mi|pass.14';
	// creo el modelo
	$CENTRO = new CENTRO_Model($codCent,'','','','');

	$result = $CENTRO->comprobar_centro();
	$CENTRO_array_test1['error_obtenido'] = $result[1];
	if ($CENTRO_array_test1['error_obtenido'] === $CENTRO_array_test1['error_esperado'])
	{
		$CENTRO_array_test1['resultado'] = 'OK';
	}
	else
	{
		$CENTRO_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test, $CENTRO_array_test1);
}


// function CENTRO_comprobar_edificio_test()
// Valida:
//		CodEdificio correcto
//		CodEdificio demasiado largo
//		CodEdificio demasiado corto
//		CodEdificio vacio
//		CodEdificio inesperado

function CENTRO_comprobar_edificio_test()
{
	global $ERRORS_array_test;
// creo array de almacen de test individual
	$CENTRO_array_test1 = array();

// CodEdificio correcto
//----------------------------------------------
	$CENTRO_array_test1['tipo'] = 'VALIDACION';
	$CENTRO_array_test1['entidad'] = 'CENTRO';	
	$CENTRO_array_test1['metodo'] = 'CodEdificio';
	$CENTRO_array_test1['error'] = 'correcto';
	$CENTRO_array_test1['error_esperado'] = 'true';
	$CENTRO_array_test1['error_obtenido'] = '';
	$CENTRO_array_test1['resultado'] = '';

	$CodEdificio = 'codEsp';
	// creo el modelo
	$CENTRO = new CENTRO_Model('',$CodEdificio,'','','');

	if ($CENTRO->comprobar_edificio()) $res = 'true';
	else $res = 'false';

	$CENTRO_array_test1['error_obtenido'] = $res;
	if ($CENTRO_array_test1['error_obtenido'] === $CENTRO_array_test1['error_esperado'])
	{
		$CENTRO_array_test1['resultado'] = 'OK';
	}
	else
	{
		$CENTRO_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test, $CENTRO_array_test1);


	//CodEdificio demasiado largo
	$CENTRO_array_test1['tipo'] = 'VALIDACION';
	$CENTRO_array_test1['entidad'] = 'CENTRO';	
	$CENTRO_array_test1['metodo'] = 'CodEdificio';
	$CENTRO_array_test1['error'] = 'demasiado largo';
	$CENTRO_array_test1['error_esperado'] = '00002';
	$CENTRO_array_test1['error_obtenido'] = '';
	$CENTRO_array_test1['resultado'] = '';

	// Relleno los datos de CENTRO	
	$CodEdificio = 'miCENTROesElMasLargoDelMundoYCabraEnLaBaseDeDatosPorqueSoyGenial';
	// creo el modelo
	$CENTRO = new CENTRO_Model('',$CodEdificio,'','','');

	$result = $CENTRO->comprobar_edificio();
	$CENTRO_array_test1['error_obtenido'] = $result[1];
	if ($CENTRO_array_test1['error_obtenido'] === $CENTRO_array_test1['error_esperado'])
	{
		$CENTRO_array_test1['resultado'] = 'OK';
	}
	else
	{
		$CENTRO_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test, $CENTRO_array_test1);

	//CodEdificio demasiado corto
	$CENTRO_array_test1['tipo'] = 'VALIDACION';
	$CENTRO_array_test1['entidad'] = 'CENTRO';	
	$CENTRO_array_test1['metodo'] = 'CodEdificio';
	$CENTRO_array_test1['error'] = 'demasiado corto';
	$CENTRO_array_test1['error_esperado'] = '00003';
	$CENTRO_array_test1['error_obtenido'] = '';
	$CENTRO_array_test1['resultado'] = '';

	// Relleno los datos de CENTRO	
	$CodEdificio = 'm';
	// creo el modelo
	$CENTRO = new CENTRO_Model('',$CodEdificio,'','','');

	$result = $CENTRO->comprobar_edificio();
	$CENTRO_array_test1['error_obtenido'] = $result[1];
	if ($CENTRO_array_test1['error_obtenido'] === $CENTRO_array_test1['error_esperado'])
	{
		$CENTRO_array_test1['resultado'] = 'OK';
	}
	else
	{
		$CENTRO_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test, $CENTRO_array_test1);

	//CodEdificio vacio
	$CENTRO_array_test1['tipo'] = 'VALIDACION';
	$CENTRO_array_test1['entidad'] = 'CENTRO';	
	$CENTRO_array_test1['metodo'] = 'CodEdificio';
	$CENTRO_array_test1['error'] = 'vacio';
	$CENTRO_array_test1['error_esperado'] = '00001';
	$CENTRO_array_test1['error_obtenido'] = '';
	$CENTRO_array_test1['resultado'] = '';

	// Relleno los datos de CENTRO	
	$CodEdificio = '';
	// creo el modelo
	$CENTRO = new CENTRO_Model('',$CodEdificio,'','','');

	$result = $CENTRO->comprobar_edificio();
	$CENTRO_array_test1['error_obtenido'] = $result[1];
	if ($CENTRO_array_test1['error_obtenido'] === $CENTRO_array_test1['error_esperado'])
	{
		$CENTRO_array_test1['resultado'] = 'OK';
	}
	else
	{
		$CENTRO_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test, $CENTRO_array_test1);


	//CodEdificio formato erroneo
	$CENTRO_array_test1['tipo'] = 'VALIDACION';
	$CENTRO_array_test1['entidad'] = 'CENTRO';	
	$CENTRO_array_test1['metodo'] = 'CodEdificio';
	$CENTRO_array_test1['error'] = 'formato erroneo';
	$CENTRO_array_test1['error_esperado'] = '00040';
	$CENTRO_array_test1['error_obtenido'] = '';
	$CENTRO_array_test1['resultado'] = '';

	// Relleno los datos de CENTRO	
	$CodEdificio = 'mi|pass.14';
	// creo el modelo
	$CENTRO = new CENTRO_Model('',$CodEdificio,'','','');

	$result = $CENTRO->comprobar_edificio();
	$CENTRO_array_test1['error_obtenido'] = $result[1];
	if ($CENTRO_array_test1['error_obtenido'] === $CENTRO_array_test1['error_esperado'])
	{
		$CENTRO_array_test1['resultado'] = 'OK';
	}
	else
	{
		$CENTRO_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test, $CENTRO_array_test1);
}

// function CENTRO_comprobar_nombre_test()
// Valida:
//		nombre correcto
//		nombre demasiado largo
//		nombre demasiado corto
//		nombre vacio
//		nombre inesperado

function CENTRO_comprobar_nombre_test()
{
	global $ERRORS_array_test;
// creo array de almacen de test individual
	$CENTRO_array_test1 = array();

// nombre correcto
//----------------------------------------------
	$CENTRO_array_test1['tipo'] = 'VALIDACION';
	$CENTRO_array_test1['entidad'] = 'CENTRO';	
	$CENTRO_array_test1['metodo'] = 'Nombre';
	$CENTRO_array_test1['error'] = 'correcto';
	$CENTRO_array_test1['error_esperado'] = 'true';
	$CENTRO_array_test1['error_obtenido'] = '';
	$CENTRO_array_test1['resultado'] = '';
	$nombre = 'nombre';
	// creo el modelo
	$CENTRO = new CENTRO_Model('','',$nombre,'','');

	if ($CENTRO->comprobar_nombre()) $res = 'true';
	else $res = 'false';

	$CENTRO_array_test1['error_obtenido'] = $res;
	if ($CENTRO_array_test1['error_obtenido'] === $CENTRO_array_test1['error_esperado'])
	{
		$CENTRO_array_test1['resultado'] = 'OK';
	}
	else
	{
		$CENTRO_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test, $CENTRO_array_test1);


	//nombre demasiado largo
	$CENTRO_array_test1['tipo'] = 'VALIDACION';
	$CENTRO_array_test1['entidad'] = 'CENTRO';	
	$CENTRO_array_test1['metodo'] = 'Nombre';
	$CENTRO_array_test1['error'] = 'demasiado largo';
	$CENTRO_array_test1['error_esperado'] = '00002';
	$CENTRO_array_test1['error_obtenido'] = '';
	$CENTRO_array_test1['resultado'] = '';

	// Relleno los datos de CENTRO	
	$nombre = 'miCENTROesElMasLargoDelMundoYCabraEnLaBaseDeDatosPorqueSoyGenial';
	// creo el modelo
	$CENTRO = new CENTRO_Model('','',$nombre,'','');

	$result = $CENTRO->comprobar_nombre();
	$CENTRO_array_test1['error_obtenido'] = $result[1];
	if ($CENTRO_array_test1['error_obtenido'] === $CENTRO_array_test1['error_esperado'])
	{
		$CENTRO_array_test1['resultado'] = 'OK';
	}
	else
	{
		$CENTRO_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test, $CENTRO_array_test1);

	//nombre demasiado corto
	$CENTRO_array_test1['tipo'] = 'VALIDACION';
	$CENTRO_array_test1['entidad'] = 'CENTRO';	
	$CENTRO_array_test1['metodo'] = 'Nombre';
	$CENTRO_array_test1['error'] = 'demasiado corto';
	$CENTRO_array_test1['error_esperado'] = '00003';
	$CENTRO_array_test1['error_obtenido'] = '';
	$CENTRO_array_test1['resultado'] = '';

	// Relleno los datos de CENTRO	
	$nombre = 'm';
	// creo el modelo
	$CENTRO = new CENTRO_Model('','',$nombre,'','');

	$result = $CENTRO->comprobar_nombre();
	$CENTRO_array_test1['error_obtenido'] = $result[1];
	if ($CENTRO_array_test1['error_obtenido'] === $CENTRO_array_test1['error_esperado'])
	{
		$CENTRO_array_test1['resultado'] = 'OK';
	}
	else
	{
		$CENTRO_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test, $CENTRO_array_test1);

	//nombre vacio
	$CENTRO_array_test1['tipo'] = 'VALIDACION';
	$CENTRO_array_test1['entidad'] = 'CENTRO';	
	$CENTRO_array_test1['metodo'] = 'Nombre';
	$CENTRO_array_test1['error'] = 'vacio';
	$CENTRO_array_test1['error_esperado'] = '00001';
	$CENTRO_array_test1['error_obtenido'] = '';
	$CENTRO_array_test1['resultado'] = '';

	// Relleno los datos de CENTRO	
	$nombre = '';
	// creo el modelo
	$CENTRO = new CENTRO_Model('','',$nombre,'','');

	$result = $CENTRO->comprobar_nombre();
	$CENTRO_array_test1['error_obtenido'] = $result[1];
	if ($CENTRO_array_test1['error_obtenido'] === $CENTRO_array_test1['error_esperado'])
	{
		$CENTRO_array_test1['resultado'] = 'OK';
	}
	else
	{
		$CENTRO_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test, $CENTRO_array_test1);


	//nombre formato erroneo
	$CENTRO_array_test1['tipo'] = 'VALIDACION';
	$CENTRO_array_test1['entidad'] = 'CENTRO';	
	$CENTRO_array_test1['metodo'] = 'Nombre';
	$CENTRO_array_test1['error'] = 'formato erroneo';
	$CENTRO_array_test1['error_esperado'] = '00030';
	$CENTRO_array_test1['error_obtenido'] = '';
	$CENTRO_array_test1['resultado'] = '';

	// Relleno los datos de CENTRO	
	$nombre = 'mi|pass.14';
	// creo el modelo
	$CENTRO = new CENTRO_Model('','',$nombre,'','');

	$result = $CENTRO->comprobar_nombre();
	$CENTRO_array_test1['error_obtenido'] = $result[1];
	if ($CENTRO_array_test1['error_obtenido'] === $CENTRO_array_test1['error_esperado'])
	{
		$CENTRO_array_test1['resultado'] = 'OK';
	}
	else
	{
		$CENTRO_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test, $CENTRO_array_test1);
}


// function CENTRO_comprobar_direccion_test()
// Valida:
//		Direccion correcto
//		Direccion demasiado largo
//		Direccion demasiado corto
//		Direccion vacio
//		Direccion formato incorrecto

function CENTRO_comprobar_direccion_test()
{
	global $ERRORS_array_test;
// creo array de almacen de test individual
	$CENTRO_array_test1 = array();

	//Direccion correcta
	$CENTRO_array_test1['tipo'] = 'VALIDACION';
	$CENTRO_array_test1['entidad'] = 'CENTRO';	
	$CENTRO_array_test1['metodo'] = 'Direccion';
	$CENTRO_array_test1['error'] = 'correcto';
	$CENTRO_array_test1['error_esperado'] = 'true';
	$CENTRO_array_test1['error_obtenido'] = '';
	$CENTRO_array_test1['resultado'] = '';

	// Relleno los datos de edificio	
	$direc = 'direcciongenialº2';
	// creo el modelo
	$CENTRO = new CENTRO_Model('','','',$direc,'');

	if ($CENTRO->comprobar_direccion()) $res = 'true';
		else $res = 'false';
	$CENTRO_array_test1['error_obtenido'] = $res;
	if ($CENTRO_array_test1['error_obtenido'] === $CENTRO_array_test1['error_esperado'])
	{
		$CENTRO_array_test1['resultado'] = 'OK';
	}
	else
	{
		$CENTRO_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test, $CENTRO_array_test1);

	//Direccion vacia
	$CENTRO_array_test1['tipo'] = 'VALIDACION';
	$CENTRO_array_test1['entidad'] = 'CENTRO';	
	$CENTRO_array_test1['metodo'] = 'Direccion';
	$CENTRO_array_test1['error'] = 'vacio';
	$CENTRO_array_test1['error_esperado'] = '00001';
	$CENTRO_array_test1['error_obtenido'] = '';
	$CENTRO_array_test1['resultado'] = '';

	// Relleno los datos de edificio	
	$direc = '';
	// creo el modelo
	$CENTRO = new CENTRO_Model('','','',$direc,'');
	$result = $CENTRO->comprobar_direccion();
	$CENTRO_array_test1['error_obtenido'] = $result[1];
	if ($CENTRO_array_test1['error_obtenido'] === $CENTRO_array_test1['error_esperado'])
	{
		$CENTRO_array_test1['resultado'] = 'OK';
	}
	else
	{
		$CENTRO_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test, $CENTRO_array_test1);

	//Direccion muy larga
	$CENTRO_array_test1['tipo'] = 'VALIDACION';
	$CENTRO_array_test1['entidad'] = 'CENTRO';	
	$CENTRO_array_test1['metodo'] = 'Direccion';
	$CENTRO_array_test1['error'] = 'muy largo';
	$CENTRO_array_test1['error_esperado'] = '00002';
	$CENTRO_array_test1['error_obtenido'] = '';
	$CENTRO_array_test1['resultado'] = '';

	// Relleno los datos de edificio	
	$direc = 'passGenialMaravillosaDelMundoGenialYReqasdasjdasljdklasjdkljaskldjkasljdkluete Genialasdasdasdasdasdasdarwefasaddsadasdasdasdasjhdakjhsdkjhskjlhfakjlshdfjkklshdfh ksdfshfjdhkjfashfksfkhfdas';
	// creo el modelo
	$CENTRO = new CENTRO_Model('','','',$direc,'');

	$result = $CENTRO->comprobar_direccion();
	$CENTRO_array_test1['error_obtenido'] = $result[1];
	if ($CENTRO_array_test1['error_obtenido'] === $CENTRO_array_test1['error_esperado'])
	{
		$CENTRO_array_test1['resultado'] = 'OK';
	}
	else
	{
		$CENTRO_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test, $CENTRO_array_test1);

	//Direccion muy corta
	$CENTRO_array_test1['tipo'] = 'VALIDACION';
	$CENTRO_array_test1['entidad'] = 'CENTRO';	
	$CENTRO_array_test1['metodo'] = 'Direccion';
	$CENTRO_array_test1['error'] = 'muy corto';
	$CENTRO_array_test1['error_esperado'] = '00003';
	$CENTRO_array_test1['error_obtenido'] = '';
	$CENTRO_array_test1['resultado'] = '';

	// Relleno los datos de edificio	
	$direc = 'a';
	// creo el modelo
	$CENTRO = new CENTRO_Model('','','',$direc,'');

	$result = $CENTRO->comprobar_direccion();
	$CENTRO_array_test1['error_obtenido'] = $result[1];
	if ($CENTRO_array_test1['error_obtenido'] === $CENTRO_array_test1['error_esperado'])
	{
		$CENTRO_array_test1['resultado'] = 'OK';
	}
	else
	{
		$CENTRO_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test, $CENTRO_array_test1);

	//Direccion erronea
	$CENTRO_array_test1['tipo'] = 'VALIDACION';
	$CENTRO_array_test1['entidad'] = 'CENTRO';	
	$CENTRO_array_test1['metodo'] = 'Direccion';
	$CENTRO_array_test1['error'] = 'erronea';
	$CENTRO_array_test1['error_esperado'] = '00050';
	$CENTRO_array_test1['error_obtenido'] = '';
	$CENTRO_array_test1['resultado'] = '';

	// Relleno los datos de edificio	
	$direc = 'a|349)==?_';
	// creo el modelo
	$CENTRO = new CENTRO_Model('','','',$direc,'');

	$result = $CENTRO->comprobar_direccion();
	$CENTRO_array_test1['error_obtenido'] = $result[1];
	if ($CENTRO_array_test1['error_obtenido'] === $CENTRO_array_test1['error_esperado'])
	{
		$CENTRO_array_test1['resultado'] = 'OK';
	}
	else
	{
		$CENTRO_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test, $CENTRO_array_test1);
}


// function CENTRO_comprobar_responsable_test()
// Valida:
//		responsable correcto
//		responsable demasiado largo
//		responsable demasiado corto
//		responsable vacio
//		responsable inesperado

function CENTRO_comprobar_responsable_test()
{
	global $ERRORS_array_test;
// creo array de almacen de test individual
	$CENTRO_array_test1 = array();

// responsable correcto
//----------------------------------------------
	$CENTRO_array_test1['tipo'] = 'VALIDACION';
	$CENTRO_array_test1['entidad'] = 'CENTRO';	
	$CENTRO_array_test1['metodo'] = 'responsable';
	$CENTRO_array_test1['error'] = 'correcto';
	$CENTRO_array_test1['error_esperado'] = 'true';
	$CENTRO_array_test1['error_obtenido'] = '';
	$CENTRO_array_test1['resultado'] = '';
	$responsable = 'codCent';
	// creo el modelo
	$CENTRO = new CENTRO_Model('','','','',$responsable);

	if ($CENTRO->comprobar_responsable()) $res = 'true';
	else $res = 'false';

	$CENTRO_array_test1['error_obtenido'] = $res;
	if ($CENTRO_array_test1['error_obtenido'] === $CENTRO_array_test1['error_esperado'])
	{
		$CENTRO_array_test1['resultado'] = 'OK';
	}
	else
	{
		$CENTRO_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test, $CENTRO_array_test1);


	//responsable demasiado largo
	$CENTRO_array_test1['tipo'] = 'VALIDACION';
	$CENTRO_array_test1['entidad'] = 'CENTRO';	
	$CENTRO_array_test1['metodo'] = 'responsable';
	$CENTRO_array_test1['error'] = 'demasiado largo';
	$CENTRO_array_test1['error_esperado'] = '00002';
	$CENTRO_array_test1['error_obtenido'] = '';
	$CENTRO_array_test1['resultado'] = '';

	// Relleno los datos de CENTRO	
	$responsable = 'miCENTROesElMasLargoDelMundoYCabraEnLaBaseDeDatosPorqueSoyGenial';
	// creo el modelo
	$CENTRO = new CENTRO_Model('','','','',$responsable);

	$result = $CENTRO->comprobar_responsable();
	$CENTRO_array_test1['error_obtenido'] = $result[1];
	if ($CENTRO_array_test1['error_obtenido'] === $CENTRO_array_test1['error_esperado'])
	{
		$CENTRO_array_test1['resultado'] = 'OK';
	}
	else
	{
		$CENTRO_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test, $CENTRO_array_test1);

	//responsable demasiado corto
	$CENTRO_array_test1['tipo'] = 'VALIDACION';
	$CENTRO_array_test1['entidad'] = 'CENTRO';	
	$CENTRO_array_test1['metodo'] = 'responsable';
	$CENTRO_array_test1['error'] = 'demasiado corto';
	$CENTRO_array_test1['error_esperado'] = '00003';
	$CENTRO_array_test1['error_obtenido'] = '';
	$CENTRO_array_test1['resultado'] = '';

	// Relleno los datos de CENTRO	
	$responsable = 'm';
	// creo el modelo
	$CENTRO = new CENTRO_Model('','','','',$responsable);

	$result = $CENTRO->comprobar_responsable();
	$CENTRO_array_test1['error_obtenido'] = $result[1];
	if ($CENTRO_array_test1['error_obtenido'] === $CENTRO_array_test1['error_esperado'])
	{
		$CENTRO_array_test1['resultado'] = 'OK';
	}
	else
	{
		$CENTRO_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test, $CENTRO_array_test1);

	//responsable vacio
	$CENTRO_array_test1['tipo'] = 'VALIDACION';
	$CENTRO_array_test1['entidad'] = 'CENTRO';	
	$CENTRO_array_test1['metodo'] = 'responsable';
	$CENTRO_array_test1['error'] = 'vacio';
	$CENTRO_array_test1['error_esperado'] = '00001';
	$CENTRO_array_test1['error_obtenido'] = '';
	$CENTRO_array_test1['resultado'] = '';

	// Relleno los datos de CENTRO	
	$responsable = '';
	// creo el modelo
	$CENTRO = new CENTRO_Model('','','','',$responsable);

	$result = $CENTRO->comprobar_responsable();
	$CENTRO_array_test1['error_obtenido'] = $result[1];
	if ($CENTRO_array_test1['error_obtenido'] === $CENTRO_array_test1['error_esperado'])
	{
		$CENTRO_array_test1['resultado'] = 'OK';
	}
	else
	{
		$CENTRO_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test, $CENTRO_array_test1);


	//responsable formato erroneo
	$CENTRO_array_test1['tipo'] = 'VALIDACION';
	$CENTRO_array_test1['entidad'] = 'CENTRO';	
	$CENTRO_array_test1['metodo'] = 'responsable';
	$CENTRO_array_test1['error'] = 'formato erroneo';
	$CENTRO_array_test1['error_esperado'] = '00030';
	$CENTRO_array_test1['error_obtenido'] = '';
	$CENTRO_array_test1['resultado'] = '';

	// Relleno los datos de CENTRO	
	$responsable = 'mi|pass.14';
	// creo el modelo
	$CENTRO = new CENTRO_Model('','','','',$responsable);

	$result = $CENTRO->comprobar_responsable();
	$CENTRO_array_test1['error_obtenido'] = $result[1];
	if ($CENTRO_array_test1['error_obtenido'] === $CENTRO_array_test1['error_esperado'])
	{
		$CENTRO_array_test1['resultado'] = 'OK';
	}
	else
	{
		$CENTRO_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test, $CENTRO_array_test1);
}



// function CENTRO_comprobar_ADD()
// Valida:
//		atributos OK
//		atributos name y codigo mal

function CENTRO_comprobar_ADD()
{
	global $ERRORS_array_test;
// creo array de almacen de test individual
	$CENTRO_array_test1 = array();

	//sexo correcto
	$CENTRO_array_test1['tipo'] = 'VALIDACION';
	$CENTRO_array_test1['entidad'] = 'CENTRO';	
	$CENTRO_array_test1['metodo'] = 'comprobar_atributos_ADD';
	$CENTRO_array_test1['error'] = 'correcto';
	$CENTRO_array_test1['error_esperado'] = 'true';
	$CENTRO_array_test1['error_obtenido'] = '';
	$CENTRO_array_test1['resultado'] = '';

	// Relleno los datos de usuario	
	$centro = 'miusuario';
	$codEdi = 'CodEdi';
	$nombre = 'minombre'; 
	$direccion = 'miapellido';
	$responsable = 'miemail';
// creo el modelo
	$CENTRO = new CENTRO_Model($centro,$codEdi,$nombre,$direccion,$responsable);

	$CENTRO_array_test1['error_obtenido'] = $CENTRO->comprobar_atributos_ADD() == 1 ? 'true' : 'false';
	if ($CENTRO_array_test1['error_obtenido'] === $CENTRO_array_test1['error_esperado'])
	{
		$CENTRO_array_test1['resultado'] = 'OK';
	}
	else
	{
		$CENTRO_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test, $CENTRO_array_test1);

	//sexo vacia
	$CENTRO_array_test1['tipo'] = 'VALIDACION';
	$CENTRO_array_test1['entidad'] = 'CENTRO';	
	$CENTRO_array_test1['metodo'] = 'comprobar_atributos_ADD';
	$CENTRO_array_test1['error'] = 'Codigo y nombre del edificio erroneos';
	$CENTRO_array_test1['error_esperado'] = 'CodEdificio-00002-toolong-NomCentro-00030-textonly-';
	$CENTRO_array_test1['error_obtenido'] = '';
	$CENTRO_array_test1['resultado'] = '';

	// Relleno los datos de usuario	
	$centro = 'miusuario';
	$codEdi = 'CodEdiasdasdasdasdasdasdasdadsd';
	$nombre = 'minre!!1'; 
	$direccion = 'miapellido';
	$responsable = 'miemail';
// creo el modelo
	$CENTRO = new CENTRO_Model($centro,$codEdi,$nombre,$direccion,$responsable);

	$array = $CENTRO->comprobar_atributos_ADD();
	//var_dump($array);
	foreach ($array as $key ) {
		foreach ($key as $key2) {
			$result .= $key2.'-';
		}
	}
	$CENTRO_array_test1['error_obtenido'] = $result;
	if ($CENTRO_array_test1['error_obtenido'] === $CENTRO_array_test1['error_esperado'])
	{
		$CENTRO_array_test1['resultado'] = 'OK';
	}
	else
	{
		$CENTRO_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test, $CENTRO_array_test1);

	
}

// function CENTRO_comprobar_EDIT()
// Valida:
//		atributos OK
//		atributos area y departamento mal

function CENTRO_comprobar_EDIT()
{
	global $ERRORS_array_test;
// creo array de almacen de test individual
	$CENTRO_array_test1 = array();

	//sexo correcto
	$CENTRO_array_test1['tipo'] = 'VALIDACION';
	$CENTRO_array_test1['entidad'] = 'CENTRO';	
	$CENTRO_array_test1['metodo'] = 'comprobar_atributos_EDIT';
	$CENTRO_array_test1['error'] = 'correcto';
	$CENTRO_array_test1['error_esperado'] = 'true';
	$CENTRO_array_test1['error_obtenido'] = '';
	$CENTRO_array_test1['resultado'] = '';

	// Relleno los datos de usuario	
	$centro = 'miusuario';
	$codEdi = 'CodEdi';
	$nombre = 'minombre'; 
	$direccion = 'miapellido';
	$responsable = 'miemail';
	// creo el modelo
	$CENTRO = new CENTRO_Model($centro,$codEdi,$nombre,$direccion,$responsable);

	$CENTRO_array_test1['error_obtenido'] = $CENTRO->comprobar_atributos_EDIT() == 1 ? 'true' : 'false';
	if ($CENTRO_array_test1['error_obtenido'] === $CENTRO_array_test1['error_esperado'])
	{
		$CENTRO_array_test1['resultado'] = 'OK';
	}
	else
	{
		$CENTRO_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test, $CENTRO_array_test1);

	//sexo vacia
	$CENTRO_array_test1['tipo'] = 'VALIDACION';
	$CENTRO_array_test1['entidad'] = 'CENTRO';	
	$CENTRO_array_test1['metodo'] = 'comprobar_atributos_EDIT';
	$CENTRO_array_test1['error'] = 'Direccion y campus erroneos';
	$CENTRO_array_test1['error_esperado'] = 'DirCentro-00050-dirError-RespCentro-00030-textonly-';
	$CENTRO_array_test1['error_obtenido'] = '';
	$CENTRO_array_test1['resultado'] = '';

	// Relleno los datos de usuario	
	$centro = 'miusuario';
	$codEdi = 'CodEdi';
	$nombre = 'minombre'; 
	$direccion = 'miDire!!Creo';
	$responsable = 'miemail1';
// creo el modelo
	$CENTRO = new CENTRO_Model($centro,$codEdi,$nombre,$direccion,$responsable);
	$array = $CENTRO->comprobar_atributos_EDIT();
	//var_dump($array);
	foreach ($array as $key ) {
		foreach ($key as $key2) {
			$result .= $key2.'-';
		}
	}
	$CENTRO_array_test1['error_obtenido'] = $result;
	if ($CENTRO_array_test1['error_obtenido'] === $CENTRO_array_test1['error_esperado'])
	{
		$CENTRO_array_test1['resultado'] = 'OK';
	}
	else
	{
		$CENTRO_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test, $CENTRO_array_test1);

	
}

// function CENTRO_comprobar_DELETE()
// Valida:
//		atributos OK
//		atributos name y login mal

function CENTRO_comprobar_DELETE()
{
	global $ERRORS_array_test;
// creo array de almacen de test individual
	$CENTRO_array_test1 = array();

	//sexo correcto
	$CENTRO_array_test1['tipo'] = 'VALIDACION';
	$CENTRO_array_test1['entidad'] = 'CENTRO';	
	$CENTRO_array_test1['metodo'] = 'comprobar_atributos_DELETE';
	$CENTRO_array_test1['error'] = 'correcto';
	$CENTRO_array_test1['error_esperado'] = 'true';
	$CENTRO_array_test1['error_obtenido'] = '';
	$CENTRO_array_test1['resultado'] = '';

	// Relleno los datos de usuario	
	$centro = 'miusuario';
// creo el modelo
	$CENTRO = new CENTRO_Model($centro,'','','','');

	$CENTRO_array_test1['error_obtenido'] = $CENTRO->comprobar_atributos_DELETE() == 1 ? 'true' : 'false';
	if ($CENTRO_array_test1['error_obtenido'] === $CENTRO_array_test1['error_esperado'])
	{
		$CENTRO_array_test1['resultado'] = 'OK';
	}
	else
	{
		$CENTRO_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test, $CENTRO_array_test1);

	//sexo vacia
	$CENTRO_array_test1['tipo'] = 'VALIDACION';
	$CENTRO_array_test1['entidad'] = 'CENTRO';	
	$CENTRO_array_test1['metodo'] = 'comprobar_atributos_DELETE';
	$CENTRO_array_test1['error'] = 'Codigo del centro erroneo';
	$CENTRO_array_test1['error_esperado'] = 'CodCentro-00040-alfNumguion-';
	$CENTRO_array_test1['error_obtenido'] = '';
	$CENTRO_array_test1['resultado'] = '';

	// Relleno los datos de usuario	
	$centro = 'miusuario!';
// creo el modelo
	$CENTRO = new CENTRO_Model($centro,'','','','');
	$array = $CENTRO->comprobar_atributos_DELETE();
	//var_dump($array);
	foreach ($array as $key ) {
		foreach ($key as $key2) {
			$result .= $key2.'-';
		}
	}
	$CENTRO_array_test1['error_obtenido'] = $result;
	if ($CENTRO_array_test1['error_obtenido'] === $CENTRO_array_test1['error_esperado'])
	{
		$CENTRO_array_test1['resultado'] = 'OK';
	}
	else
	{
		$CENTRO_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test, $CENTRO_array_test1);
}


// function CENTRO_comprobar_RellenaDatos()
// Valida:
//		atributos OK
//		atributos name y login mal

function CENTRO_comprobar_RellenaDatos()
{
	global $ERRORS_array_test;
// creo array de almacen de test individual
	$CENTRO_array_test1 = array();

	//sexo correcto
	$CENTRO_array_test1['tipo'] = 'VALIDACION';
	$CENTRO_array_test1['entidad'] = 'CENTRO';	
	$CENTRO_array_test1['metodo'] = 'comprobar_atributos_RellenaDatos';
	$CENTRO_array_test1['error'] = 'correcto';
	$CENTRO_array_test1['error_esperado'] = 'true';
	$CENTRO_array_test1['error_obtenido'] = '';
	$CENTRO_array_test1['resultado'] = '';

	// Relleno los datos de usuario	
	$centro = 'miusuario';
// creo el modelo
	$CENTRO = new CENTRO_Model($centro,'','','','');

	$CENTRO_array_test1['error_obtenido'] = $CENTRO->comprobar_atributos_RellenaDatos() == 1 ? 'true' : 'false';
	if ($CENTRO_array_test1['error_obtenido'] === $CENTRO_array_test1['error_esperado'])
	{
		$CENTRO_array_test1['resultado'] = 'OK';
	}
	else
	{
		$CENTRO_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test, $CENTRO_array_test1);

	//sexo vacia
	$CENTRO_array_test1['tipo'] = 'VALIDACION';
	$CENTRO_array_test1['entidad'] = 'CENTRO';	
	$CENTRO_array_test1['metodo'] = 'comprobar_atributos_RellenaDatos';
	$CENTRO_array_test1['error'] = 'Codigo del edificio erroneos';
	$CENTRO_array_test1['error_esperado'] = 'CodCentro-00040-alfNumguion-';
	$CENTRO_array_test1['error_obtenido'] = '';
	$CENTRO_array_test1['resultado'] = '';

	// Relleno los datos de usuario	
	$centro = 'miusuario!';
// creo el modelo
	$CENTRO = new CENTRO_Model($centro,'','','','');
	$array = $CENTRO->comprobar_atributos_RellenaDatos();
	//var_dump($array);
	foreach ($array as $key ) {
		foreach ($key as $key2) {
			$result .= $key2.'-';
		}
	}
	$CENTRO_array_test1['error_obtenido'] = $result;
	if ($CENTRO_array_test1['error_obtenido'] === $CENTRO_array_test1['error_esperado'])
	{
		$CENTRO_array_test1['resultado'] = 'OK';
	}
	else
	{
		$CENTRO_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test, $CENTRO_array_test1);
}

	CENTRO_comprobar_centro_test();
	CENTRO_comprobar_edificio_test();
	CENTRO_comprobar_nombre_test();
	CENTRO_comprobar_direccion_test();
	CENTRO_comprobar_responsable_test();

	CENTRO_comprobar_ADD();
	CENTRO_comprobar_EDIT();
	CENTRO_comprobar_DELETE();
	CENTRO_comprobar_RellenaDatos();
?>