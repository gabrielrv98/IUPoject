<?php
// function EDIFICIO_comprobar_edificio_test()
// Valida:
//		CodEdificio correcto
//		CodEdificio demasiado largo
//		CodEdificio demasiado corto
//		CodEdificio vacio
//		CodEdificio inesperado

function EDIFICIO_comprobar_edificio_test()
{
	global $ERRORS_array_test;
// creo array de almacen de test individual
	$EDIFICIO_array_test1 = array();

// CodEdificio correcto
//----------------------------------------------
	$EDIFICIO_array_test1['tipo'] = 'VALIDACION';
	$EDIFICIO_array_test1['entidad'] = 'EDIFICIO';	
	$EDIFICIO_array_test1['metodo'] = 'CodEdificio';
	$EDIFICIO_array_test1['error'] = 'correcto';
	$EDIFICIO_array_test1['error_esperado'] = 'true';
	$EDIFICIO_array_test1['error_obtenido'] = '';
	$EDIFICIO_array_test1['resultado'] = '';

	$CodEdificio = 'codEsp';
	// creo el modelo
	$EDIFICIO = new EDIFICIO_Model($CodEdificio,'','','');

	if ($EDIFICIO->comprobar_edificio()) $res = 'true';
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


	//CodEdificio demasiado largo
	$EDIFICIO_array_test1['tipo'] = 'VALIDACION';
	$EDIFICIO_array_test1['entidad'] = 'EDIFICIO';	
	$EDIFICIO_array_test1['metodo'] = 'CodEdificio';
	$EDIFICIO_array_test1['error'] = 'demasiado largo';
	$EDIFICIO_array_test1['error_esperado'] = '00002';
	$EDIFICIO_array_test1['error_obtenido'] = '';
	$EDIFICIO_array_test1['resultado'] = '';

	// Relleno los datos de EDIFICIO	
	$CodEdificio = 'miEDIFICIOesElMasLargoDelMundoYCabraEnLaBaseDeDatosPorqueSoyGenial';
	// creo el modelo
	$EDIFICIO = new EDIFICIO_Model($CodEdificio,'','','');

	$result = $EDIFICIO->comprobar_edificio();
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

	//CodEdificio demasiado corto
	$EDIFICIO_array_test1['tipo'] = 'VALIDACION';
	$EDIFICIO_array_test1['entidad'] = 'EDIFICIO';	
	$EDIFICIO_array_test1['metodo'] = 'CodEdificio';
	$EDIFICIO_array_test1['error'] = 'demasiado corto';
	$EDIFICIO_array_test1['error_esperado'] = '00003';
	$EDIFICIO_array_test1['error_obtenido'] = '';
	$EDIFICIO_array_test1['resultado'] = '';

	// Relleno los datos de EDIFICIO	
	$CodEdificio = 'm';
	// creo el modelo
	$EDIFICIO = new EDIFICIO_Model($CodEdificio,'','','');

	$result = $EDIFICIO->comprobar_edificio();
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

	//CodEdificio vacio
	$EDIFICIO_array_test1['tipo'] = 'VALIDACION';
	$EDIFICIO_array_test1['entidad'] = 'EDIFICIO';	
	$EDIFICIO_array_test1['metodo'] = 'CodEdificio';
	$EDIFICIO_array_test1['error'] = 'vacio';
	$EDIFICIO_array_test1['error_esperado'] = '00001';
	$EDIFICIO_array_test1['error_obtenido'] = '';
	$EDIFICIO_array_test1['resultado'] = '';

	// Relleno los datos de EDIFICIO	
	$CodEdificio = '';
	// creo el modelo
	$EDIFICIO = new EDIFICIO_Model($CodEdificio,'','','');

	$result = $EDIFICIO->comprobar_edificio();
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


	//CodEdificio formato erroneo
	$EDIFICIO_array_test1['tipo'] = 'VALIDACION';
	$EDIFICIO_array_test1['entidad'] = 'EDIFICIO';	
	$EDIFICIO_array_test1['metodo'] = 'CodEdificio';
	$EDIFICIO_array_test1['error'] = 'formato erroneo';
	$EDIFICIO_array_test1['error_esperado'] = '00040';
	$EDIFICIO_array_test1['error_obtenido'] = '';
	$EDIFICIO_array_test1['resultado'] = '';

	// Relleno los datos de EDIFICIO	
	$CodEdificio = 'mi|pass.14';
	// creo el modelo
	$EDIFICIO = new EDIFICIO_Model($CodEdificio,'','','');

	$result = $EDIFICIO->comprobar_edificio();
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


// function EDIFICIO_comprobar_nombre_test()
// Valida:
//		nombre correcto
//		nombre demasiado largo
//		nombre demasiado corto
//		nombre vacio
//		nombre formato incorrecto

function EDIFICIO_comprobar_nombre_test()
{
	global $ERRORS_array_test;
// creo array de almacen de test individual
	$EDIFICIO_array_test1 = array();

	//nombre correcta
	$EDIFICIO_array_test1['tipo'] = 'VALIDACION';
	$EDIFICIO_array_test1['entidad'] = 'EDIFICIO';	
	$EDIFICIO_array_test1['metodo'] = 'nombre';
	$EDIFICIO_array_test1['error'] = 'correcto';
	$EDIFICIO_array_test1['error_esperado'] = 'true';
	$EDIFICIO_array_test1['error_obtenido'] = '';
	$EDIFICIO_array_test1['resultado'] = '';

	// Relleno los datos de edificio	
	$nombre = 'mipass';
	// creo el modelo
	$EDIFICIO = new EDIFICIO_Model('',$nombre,'','');

	if ($EDIFICIO->comprobar_nombre()) $res = 'true';
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

	//nombre vacia
	$EDIFICIO_array_test1['tipo'] = 'VALIDACION';
	$EDIFICIO_array_test1['entidad'] = 'EDIFICIO';	
	$EDIFICIO_array_test1['metodo'] = 'nombre';
	$EDIFICIO_array_test1['error'] = 'vacio';
	$EDIFICIO_array_test1['error_esperado'] = '00001';
	$EDIFICIO_array_test1['error_obtenido'] = '';
	$EDIFICIO_array_test1['resultado'] = '';

	// Relleno los datos de edificio	
	$nombre = '';
	// creo el modelo
	$EDIFICIO = new EDIFICIO_Model('',$nombre,'','');
	$result = $EDIFICIO->comprobar_nombre();
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

	//nombre muy larga
	$EDIFICIO_array_test1['tipo'] = 'VALIDACION';
	$EDIFICIO_array_test1['entidad'] = 'EDIFICIO';	
	$EDIFICIO_array_test1['metodo'] = 'nombre';
	$EDIFICIO_array_test1['error'] = 'muy largo';
	$EDIFICIO_array_test1['error_esperado'] = '00002';
	$EDIFICIO_array_test1['error_obtenido'] = '';
	$EDIFICIO_array_test1['resultado'] = '';

	// Relleno los datos de edificio	
	$nombre = 'passGenialMaravillosaDelMundoGenialYRequeteGenialasdadasdasdasdasdasdasdasdasdasdasdsadqwdsdsfsdf';
	// creo el modelo
	$EDIFICIO = new EDIFICIO_Model('',$nombre,'','');

	$result = $EDIFICIO->comprobar_nombre();
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

	//nombre muy corta
	$EDIFICIO_array_test1['tipo'] = 'VALIDACION';
	$EDIFICIO_array_test1['entidad'] = 'EDIFICIO';	
	$EDIFICIO_array_test1['metodo'] = 'nombre';
	$EDIFICIO_array_test1['error'] = 'muy corto';
	$EDIFICIO_array_test1['error_esperado'] = '00003';
	$EDIFICIO_array_test1['error_obtenido'] = '';
	$EDIFICIO_array_test1['resultado'] = '';

	// Relleno los datos de edificio	
	$nombre = 'a';
	// creo el modelo
	$EDIFICIO = new EDIFICIO_Model('',$nombre,'','');

	$result = $EDIFICIO->comprobar_nombre();
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

	//nombre erronea
	$EDIFICIO_array_test1['tipo'] = 'VALIDACION';
	$EDIFICIO_array_test1['entidad'] = 'EDIFICIO';	
	$EDIFICIO_array_test1['metodo'] = 'nombre';
	$EDIFICIO_array_test1['error'] = 'erronea';
	$EDIFICIO_array_test1['error_esperado'] = '00030';
	$EDIFICIO_array_test1['error_obtenido'] = '';
	$EDIFICIO_array_test1['resultado'] = '';

	// Relleno los datos de edificio	
	$nombre = 'a|349)==?';
	// creo el modelo
	$EDIFICIO = new EDIFICIO_Model('',$nombre,'','');

	$result = $EDIFICIO->comprobar_nombre();
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

// function EDIFICIO_comprobar_direccion_test()
// Valida:
//		Direccion correcto
//		Direccion demasiado largo
//		Direccion demasiado corto
//		Direccion vacio
//		Direccion formato incorrecto

function EDIFICIO_comprobar_direccion_test()
{
	global $ERRORS_array_test;
// creo array de almacen de test individual
	$EDIFICIO_array_test1 = array();

	//Direccion correcta
	$EDIFICIO_array_test1['tipo'] = 'VALIDACION';
	$EDIFICIO_array_test1['entidad'] = 'EDIFICIO';	
	$EDIFICIO_array_test1['metodo'] = 'Direccion';
	$EDIFICIO_array_test1['error'] = 'correcto';
	$EDIFICIO_array_test1['error_esperado'] = 'true';
	$EDIFICIO_array_test1['error_obtenido'] = '';
	$EDIFICIO_array_test1['resultado'] = '';

	// Relleno los datos de edificio	
	$direc = 'direcciongenialº2';
	// creo el modelo
	$EDIFICIO = new EDIFICIO_Model('','',$direc,'');

	if ($EDIFICIO->comprobar_direccion()) $res = 'true';
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

	//Direccion vacia
	$EDIFICIO_array_test1['tipo'] = 'VALIDACION';
	$EDIFICIO_array_test1['entidad'] = 'EDIFICIO';	
	$EDIFICIO_array_test1['metodo'] = 'Direccion';
	$EDIFICIO_array_test1['error'] = 'vacio';
	$EDIFICIO_array_test1['error_esperado'] = '00001';
	$EDIFICIO_array_test1['error_obtenido'] = '';
	$EDIFICIO_array_test1['resultado'] = '';

	// Relleno los datos de edificio	
	$direc = '';
	// creo el modelo
	$EDIFICIO = new EDIFICIO_Model('','',$direc,'');
	$result = $EDIFICIO->comprobar_direccion();
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

	//Direccion muy larga
	$EDIFICIO_array_test1['tipo'] = 'VALIDACION';
	$EDIFICIO_array_test1['entidad'] = 'EDIFICIO';	
	$EDIFICIO_array_test1['metodo'] = 'Direccion';
	$EDIFICIO_array_test1['error'] = 'muy largo';
	$EDIFICIO_array_test1['error_esperado'] = '00002';
	$EDIFICIO_array_test1['error_obtenido'] = '';
	$EDIFICIO_array_test1['resultado'] = '';

	// Relleno los datos de edificio	
	$direc = 'passGenialMaravillosaDelMundoGenialYReqasdasjdasljdklasjdkljaskldjkasljdkluete Genialasdasdasdasdasdasdarwefasaddsadasdasdasdasjhdakjhsdkjhskjlhfakjlshdfjkklshdfh ksdfshfjdhkjfashfksfkhfdas';
	// creo el modelo
	$EDIFICIO = new EDIFICIO_Model('','',$direc,'');

	$result = $EDIFICIO->comprobar_direccion();
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

	//Direccion muy corta
	$EDIFICIO_array_test1['tipo'] = 'VALIDACION';
	$EDIFICIO_array_test1['entidad'] = 'EDIFICIO';	
	$EDIFICIO_array_test1['metodo'] = 'Direccion';
	$EDIFICIO_array_test1['error'] = 'muy corto';
	$EDIFICIO_array_test1['error_esperado'] = '00003';
	$EDIFICIO_array_test1['error_obtenido'] = '';
	$EDIFICIO_array_test1['resultado'] = '';

	// Relleno los datos de edificio	
	$direc = 'a';
	// creo el modelo
	$EDIFICIO = new EDIFICIO_Model('','',$direc,'');

	$result = $EDIFICIO->comprobar_direccion();
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

	//Direccion erronea
	$EDIFICIO_array_test1['tipo'] = 'VALIDACION';
	$EDIFICIO_array_test1['entidad'] = 'EDIFICIO';	
	$EDIFICIO_array_test1['metodo'] = 'Direccion';
	$EDIFICIO_array_test1['error'] = 'erronea';
	$EDIFICIO_array_test1['error_esperado'] = '00050';
	$EDIFICIO_array_test1['error_obtenido'] = '';
	$EDIFICIO_array_test1['resultado'] = '';

	// Relleno los datos de edificio	
	$direc = 'a|349)==?_';
	// creo el modelo
	$EDIFICIO = new EDIFICIO_Model('','',$direc,'');

	$result = $EDIFICIO->comprobar_direccion();
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

// function EDIFICIO_comprobar_campus_test()
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
	$campus = 'campus';
	// creo el modelo
	$EDIFICIO = new EDIFICIO_Model('','','',$campus);


	if ($EDIFICIO->comprobar_campus() == 'true') $res = 'true';
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
	$EDIFICIO = new EDIFICIO_Model('','','',$campus);
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
	$EDIFICIO = new EDIFICIO_Model('','','',$campus);

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
	$EDIFICIO = new EDIFICIO_Model('','','',$campus);

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
	$EDIFICIO_array_test1['error_esperado'] = '00030';
	$EDIFICIO_array_test1['error_obtenido'] = '';
	$EDIFICIO_array_test1['resultado'] = '';

	// Relleno los datos de edificio	
	$campus = 'a|349)==?_';
	// creo el modelo
	$EDIFICIO = new EDIFICIO_Model('','','',$campus);

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


	EDIFICIO_comprobar_edificio_test();
	EDIFICIO_comprobar_nombre_test();
	EDIFICIO_comprobar_direccion_test();
	EDIFICIO_comprobar_campus_test();
?>
