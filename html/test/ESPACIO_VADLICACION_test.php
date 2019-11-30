<?php

// function ESPACIO_comprobar_tituacion_test()
// Valida:
//		codEspacio correcto
//		codEspacio demasiado largo
//		codEspacio demasiado corto
//		codEspacio vacio
//		codEspacio inesperado

function ESPACIO_comprobar_codEspacio_test()
{
	global $ERRORS_array_test;
// creo array de almacen de test individual
	$ESPACIO_array_test1 = array();

// codEspacio correcto
//----------------------------------------------
	$ESPACIO_array_test1['tipo'] = 'VALIDACION';
	$ESPACIO_array_test1['entidad'] = 'ESPACIO';	
	$ESPACIO_array_test1['metodo'] = 'CodEspacio';
	$ESPACIO_array_test1['error'] = 'correcto';
	$ESPACIO_array_test1['error_esperado'] = 'true';
	$ESPACIO_array_test1['error_obtenido'] = '';
	$ESPACIO_array_test1['resultado'] = '';

	$codEspacio = 'codEsp';
	// creo el modelo
	$ESPACIO = new ESPACIO_Model($codEspacio,'','','','','');

	if ($ESPACIO->comprobar_codEspacio()) $res = 'true';
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


	//codEspacio demasiado largo
	$ESPACIO_array_test1['tipo'] = 'VALIDACION';
	$ESPACIO_array_test1['entidad'] = 'ESPACIO';	
	$ESPACIO_array_test1['metodo'] = 'CodEspacio';
	$ESPACIO_array_test1['error'] = 'demasiado largo';
	$ESPACIO_array_test1['error_esperado'] = '00002';
	$ESPACIO_array_test1['error_obtenido'] = '';
	$ESPACIO_array_test1['resultado'] = '';

	// Relleno los datos de ESPACIO	
	$codEspacio = 'miESPACIOesElMasLargoDelMundoYCabraEnLaBaseDeDatosPorqueSoyGenial';
	// creo el modelo
	$ESPACIO = new ESPACIO_Model($codEspacio,'','','','','');

	$result = $ESPACIO->comprobar_codEspacio();
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

	//codEspacio demasiado corto
	$ESPACIO_array_test1['tipo'] = 'VALIDACION';
	$ESPACIO_array_test1['entidad'] = 'ESPACIO';	
	$ESPACIO_array_test1['metodo'] = 'CodEspacio';
	$ESPACIO_array_test1['error'] = 'demasiado corto';
	$ESPACIO_array_test1['error_esperado'] = '00003';
	$ESPACIO_array_test1['error_obtenido'] = '';
	$ESPACIO_array_test1['resultado'] = '';

	// Relleno los datos de ESPACIO	
	$codEspacio = 'm';
	// creo el modelo
	$ESPACIO = new ESPACIO_Model($codEspacio,'','','','','');

	$result = $ESPACIO->comprobar_codEspacio();
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



	//codEspacio formato erroneo
	$ESPACIO_array_test1['tipo'] = 'VALIDACION';
	$ESPACIO_array_test1['entidad'] = 'ESPACIO';	
	$ESPACIO_array_test1['metodo'] = 'CodEspacio';
	$ESPACIO_array_test1['error'] = 'formato erroneo';
	$ESPACIO_array_test1['error_esperado'] = '00040';
	$ESPACIO_array_test1['error_obtenido'] = '';
	$ESPACIO_array_test1['resultado'] = '';

	// Relleno los datos de ESPACIO	
	$codEspacio = 'mi|pass.14';
	// creo el modelo
	$ESPACIO = new ESPACIO_Model($codEspacio,'','','','','');

	$result = $ESPACIO->comprobar_codEspacio();
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

// function ESPACIO_comprobar_edificio_test()
// Valida:
//		CodEdificio correcto
//		CodEdificio demasiado largo
//		CodEdificio demasiado corto
//		CodEdificio vacio
//		CodEdificio inesperado

function ESPACIO_comprobar_edificio_test()
{
	global $ERRORS_array_test;
// creo array de almacen de test individual
	$ESPACIO_array_test1 = array();

// CodEdificio correcto
//----------------------------------------------
	$ESPACIO_array_test1['tipo'] = 'VALIDACION';
	$ESPACIO_array_test1['entidad'] = 'ESPACIO';	
	$ESPACIO_array_test1['metodo'] = 'CodEdificio';
	$ESPACIO_array_test1['error'] = 'correcto';
	$ESPACIO_array_test1['error_esperado'] = 'true';
	$ESPACIO_array_test1['error_obtenido'] = '';
	$ESPACIO_array_test1['resultado'] = '';

	$CodEdificio = 'codEsp';
	// creo el modelo
	$ESPACIO = new ESPACIO_Model('',$CodEdificio,'','','','');

	if ($ESPACIO->comprobar_edificio()) $res = 'true';
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


	//CodEdificio demasiado largo
	$ESPACIO_array_test1['tipo'] = 'VALIDACION';
	$ESPACIO_array_test1['entidad'] = 'ESPACIO';	
	$ESPACIO_array_test1['metodo'] = 'CodEdificio';
	$ESPACIO_array_test1['error'] = 'demasiado largo';
	$ESPACIO_array_test1['error_esperado'] = '00002';
	$ESPACIO_array_test1['error_obtenido'] = '';
	$ESPACIO_array_test1['resultado'] = '';

	// Relleno los datos de ESPACIO	
	$CodEdificio = 'miESPACIOesElMasLargoDelMundoYCabraEnLaBaseDeDatosPorqueSoyGenial';
	// creo el modelo
	$ESPACIO = new ESPACIO_Model('',$CodEdificio,'','','','');

	$result = $ESPACIO->comprobar_edificio();
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

	//CodEdificio demasiado corto
	$ESPACIO_array_test1['tipo'] = 'VALIDACION';
	$ESPACIO_array_test1['entidad'] = 'ESPACIO';	
	$ESPACIO_array_test1['metodo'] = 'CodEdificio';
	$ESPACIO_array_test1['error'] = 'demasiado corto';
	$ESPACIO_array_test1['error_esperado'] = '00003';
	$ESPACIO_array_test1['error_obtenido'] = '';
	$ESPACIO_array_test1['resultado'] = '';

	// Relleno los datos de ESPACIO	
	$CodEdificio = 'm';
	// creo el modelo
	$ESPACIO = new ESPACIO_Model('',$CodEdificio,'','','','');

	$result = $ESPACIO->comprobar_edificio();
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

	//CodEdificio vacio
	$ESPACIO_array_test1['tipo'] = 'VALIDACION';
	$ESPACIO_array_test1['entidad'] = 'ESPACIO';	
	$ESPACIO_array_test1['metodo'] = 'CodEdificio';
	$ESPACIO_array_test1['error'] = 'vacio';
	$ESPACIO_array_test1['error_esperado'] = '00001';
	$ESPACIO_array_test1['error_obtenido'] = '';
	$ESPACIO_array_test1['resultado'] = '';

	// Relleno los datos de ESPACIO	
	$CodEdificio = '';
	// creo el modelo
	$ESPACIO = new ESPACIO_Model('',$CodEdificio,'','','','');

	$result = $ESPACIO->comprobar_edificio();
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


	//CodEdificio formato erroneo
	$ESPACIO_array_test1['tipo'] = 'VALIDACION';
	$ESPACIO_array_test1['entidad'] = 'ESPACIO';	
	$ESPACIO_array_test1['metodo'] = 'CodEdificio';
	$ESPACIO_array_test1['error'] = 'formato erroneo';
	$ESPACIO_array_test1['error_esperado'] = '00040';
	$ESPACIO_array_test1['error_obtenido'] = '';
	$ESPACIO_array_test1['resultado'] = '';

	// Relleno los datos de ESPACIO	
	$CodEdificio = 'mi|pass.14';
	// creo el modelo
	$ESPACIO = new ESPACIO_Model('',$CodEdificio,'','','','');

	$result = $ESPACIO->comprobar_edificio();
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

// function ESPACIO_comprobar_centro_test()
// Valida:
//		CodCentro correcto
//		CodCentro demasiado largo
//		CodCentro demasiado corto
//		CodCentro vacio
//		CodCentro inesperado

function ESPACIO_comprobar_centro_test()
{
	global $ERRORS_array_test;
// creo array de almacen de test individual
	$ESPACIO_array_test1 = array();

// CodCentro correcto
//----------------------------------------------
	$ESPACIO_array_test1['tipo'] = 'VALIDACION';
	$ESPACIO_array_test1['entidad'] = 'ESPACIO';	
	$ESPACIO_array_test1['metodo'] = 'CodCentro';
	$ESPACIO_array_test1['error'] = 'correcto';
	$ESPACIO_array_test1['error_esperado'] = 'true';
	$ESPACIO_array_test1['error_obtenido'] = '';
	$ESPACIO_array_test1['resultado'] = '';

	$CodCentro = 'codEsp';
	// creo el modelo
	$ESPACIO = new ESPACIO_Model('','',$CodCentro,'','','');

	if ($ESPACIO->comprobar_centro()) $res = 'true';
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


	//CodCentro demasiado largo
	$ESPACIO_array_test1['tipo'] = 'VALIDACION';
	$ESPACIO_array_test1['entidad'] = 'ESPACIO';	
	$ESPACIO_array_test1['metodo'] = 'CodCentro';
	$ESPACIO_array_test1['error'] = 'demasiado largo';
	$ESPACIO_array_test1['error_esperado'] = '00002';
	$ESPACIO_array_test1['error_obtenido'] = '';
	$ESPACIO_array_test1['resultado'] = '';

	// Relleno los datos de ESPACIO	
	$CodCentro = 'miESPACIOesElMasLargoDelMundoYCabraEnLaBaseDeDatosPorqueSoyGenial';
	// creo el modelo
	$ESPACIO = new ESPACIO_Model('','',$CodCentro,'','','');

	$result = $ESPACIO->comprobar_centro();
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

	//CodCentro demasiado corto
	$ESPACIO_array_test1['tipo'] = 'VALIDACION';
	$ESPACIO_array_test1['entidad'] = 'ESPACIO';	
	$ESPACIO_array_test1['metodo'] = 'CodCentro';
	$ESPACIO_array_test1['error'] = 'demasiado corto';
	$ESPACIO_array_test1['error_esperado'] = '00003';
	$ESPACIO_array_test1['error_obtenido'] = '';
	$ESPACIO_array_test1['resultado'] = '';

	// Relleno los datos de ESPACIO	
	$CodCentro = 'm';
	// creo el modelo
	$ESPACIO = new ESPACIO_Model('','',$CodCentro,'','','');

	$result = $ESPACIO->comprobar_centro();
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

	//CodCentro vacio
	$ESPACIO_array_test1['tipo'] = 'VALIDACION';
	$ESPACIO_array_test1['entidad'] = 'ESPACIO';	
	$ESPACIO_array_test1['metodo'] = 'CodCentro';
	$ESPACIO_array_test1['error'] = 'vacio';
	$ESPACIO_array_test1['error_esperado'] = '00001';
	$ESPACIO_array_test1['error_obtenido'] = '';
	$ESPACIO_array_test1['resultado'] = '';

	// Relleno los datos de ESPACIO	
	$CodCentro = '';
	// creo el modelo
	$ESPACIO = new ESPACIO_Model('','',$CodCentro,'','','');

	$result = $ESPACIO->comprobar_centro();
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


	//CodCentro formato erroneo
	$ESPACIO_array_test1['tipo'] = 'VALIDACION';
	$ESPACIO_array_test1['entidad'] = 'ESPACIO';	
	$ESPACIO_array_test1['metodo'] = 'CodCentro';
	$ESPACIO_array_test1['error'] = 'formato erroneo';
	$ESPACIO_array_test1['error_esperado'] = '00040';
	$ESPACIO_array_test1['error_obtenido'] = '';
	$ESPACIO_array_test1['resultado'] = '';

	// Relleno los datos de ESPACIO	
	$CodCentro = 'mi|pass.14';
	// creo el modelo
	$ESPACIO = new ESPACIO_Model('','',$CodCentro,'','','');

	$result = $ESPACIO->comprobar_centro();
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

// function ESPACIO_comprobar_superficie_test()
// Valida:
//		Superficie correcto
//		Superficie demasiado largo
//		Superficie demasiado corto
//		Superficie inesperado

function ESPACIO_comprobar_superficie_test()
{
	global $ERRORS_array_test;
// creo array de almacen de test individual
	$ESPACIO_array_test1 = array();

// Superficie correcto
//----------------------------------------------
	$ESPACIO_array_test1['tipo'] = 'VALIDACION';
	$ESPACIO_array_test1['entidad'] = 'ESPACIO';	
	$ESPACIO_array_test1['metodo'] = 'Superficie';
	$ESPACIO_array_test1['error'] = 'correcto';
	$ESPACIO_array_test1['error_esperado'] = 'true';
	$ESPACIO_array_test1['error_obtenido'] = '';
	$ESPACIO_array_test1['resultado'] = '';

	$Superficie = '2';
	// creo el modelo
	$ESPACIO = new ESPACIO_Model('','','','',$Superficie,'');

	if ($ESPACIO->comprobar_superficie()) $res = 'true';
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


	//Superficie demasiado largo
	$ESPACIO_array_test1['tipo'] = 'VALIDACION';
	$ESPACIO_array_test1['entidad'] = 'ESPACIO';	
	$ESPACIO_array_test1['metodo'] = 'Superficie';
	$ESPACIO_array_test1['error'] = 'demasiado largo';
	$ESPACIO_array_test1['error_esperado'] = '00002';
	$ESPACIO_array_test1['error_obtenido'] = '';
	$ESPACIO_array_test1['resultado'] = '';

	// Relleno los datos de ESPACIO	
	$Superficie = '1231232132123213123213123';
	// creo el modelo
	$ESPACIO = new ESPACIO_Model('','','','',$Superficie,'');

	$result = $ESPACIO->comprobar_superficie();
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

	//Superficie demasiado corto
	$ESPACIO_array_test1['tipo'] = 'VALIDACION';
	$ESPACIO_array_test1['entidad'] = 'ESPACIO';	
	$ESPACIO_array_test1['metodo'] = 'Superficie';
	$ESPACIO_array_test1['error'] = 'demasiado corto';
	$ESPACIO_array_test1['error_esperado'] = '00004';
	$ESPACIO_array_test1['error_obtenido'] = '';
	$ESPACIO_array_test1['resultado'] = '';

	// Relleno los datos de ESPACIO	
	$Superficie = '';
	// creo el modelo
	$ESPACIO = new ESPACIO_Model('','','','',$Superficie,'');

	$result = $ESPACIO->comprobar_superficie();
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


	//Superficie formato erroneo
	$ESPACIO_array_test1['tipo'] = 'VALIDACION';
	$ESPACIO_array_test1['entidad'] = 'ESPACIO';	
	$ESPACIO_array_test1['metodo'] = 'Superficie';
	$ESPACIO_array_test1['error'] = 'formato erroneo';
	$ESPACIO_array_test1['error_esperado'] = '00070';
	$ESPACIO_array_test1['error_obtenido'] = '';
	$ESPACIO_array_test1['resultado'] = '';

	// Relleno los datos de ESPACIO	
	$Superficie = 'a';
	// creo el modelo
	$ESPACIO = new ESPACIO_Model('','','','',$Superficie,'');

	$result = $ESPACIO->comprobar_superficie();
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

// function ESPACIO_comprobar_nInventario_test()
// Valida:
//		Numero de inventario correcto
//		Numero de inventario demasiado largo
//		Numero de inventario demasiado corto
//		Numero de inventario inesperado

function ESPACIO_comprobar_nInventario_test()
{
	global $ERRORS_array_test;
// creo array de almacen de test individual
	$ESPACIO_array_test1 = array();

// Numero de inventario correcto
//----------------------------------------------
	$ESPACIO_array_test1['tipo'] = 'VALIDACION';
	$ESPACIO_array_test1['entidad'] = 'ESPACIO';	
	$ESPACIO_array_test1['metodo'] = 'Numero de inventario';
	$ESPACIO_array_test1['error'] = 'correcto';
	$ESPACIO_array_test1['error_esperado'] = 'true';
	$ESPACIO_array_test1['error_obtenido'] = '';
	$ESPACIO_array_test1['resultado'] = '';

	$nInventario = '2';
	// creo el modelo
	$ESPACIO = new ESPACIO_Model('','','','','',$nInventario);

	if ($ESPACIO->comprobar_nInventario()) $res = 'true';
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


	//Numero de inventario demasiado largo
	$ESPACIO_array_test1['tipo'] = 'VALIDACION';
	$ESPACIO_array_test1['entidad'] = 'ESPACIO';	
	$ESPACIO_array_test1['metodo'] = 'Numero de inventario';
	$ESPACIO_array_test1['error'] = 'demasiado largo';
	$ESPACIO_array_test1['error_esperado'] = '00002';
	$ESPACIO_array_test1['error_obtenido'] = '';
	$ESPACIO_array_test1['resultado'] = '';

	// Relleno los datos de ESPACIO	
	$nInventario = '1231232132123213123213123';
	// creo el modelo
	$ESPACIO = new ESPACIO_Model('','','','','',$nInventario);

	$result = $ESPACIO->comprobar_nInventario();
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

	//Numero de inventario demasiado corto
	$ESPACIO_array_test1['tipo'] = 'VALIDACION';
	$ESPACIO_array_test1['entidad'] = 'ESPACIO';	
	$ESPACIO_array_test1['metodo'] = 'Numero de inventario';
	$ESPACIO_array_test1['error'] = 'demasiado corto';
	$ESPACIO_array_test1['error_esperado'] = '00004';
	$ESPACIO_array_test1['error_obtenido'] = '';
	$ESPACIO_array_test1['resultado'] = '';

	// Relleno los datos de ESPACIO	
	$nInventario = '';
	// creo el modelo
	$ESPACIO = new ESPACIO_Model('','','','','',$nInventario);

	$result = $ESPACIO->comprobar_nInventario();
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


	//Numero de inventario formato erroneo
	$ESPACIO_array_test1['tipo'] = 'VALIDACION';
	$ESPACIO_array_test1['entidad'] = 'ESPACIO';	
	$ESPACIO_array_test1['metodo'] = 'Numero de inventario';
	$ESPACIO_array_test1['error'] = 'formato erroneo';
	$ESPACIO_array_test1['error_esperado'] = '00070';
	$ESPACIO_array_test1['error_obtenido'] = '';
	$ESPACIO_array_test1['resultado'] = '';

	// Relleno los datos de ESPACIO	
	$nInventario = 'a';
	// creo el modelo
	$ESPACIO = new ESPACIO_Model('','','','','',$nInventario);

	$result = $ESPACIO->comprobar_nInventario();
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


	ESPACIO_comprobar_codEspacio_test();
	ESPACIO_comprobar_edificio_test();
	ESPACIO_comprobar_centro_test();
	ESPACIO_comprobar_tipo_test();
	ESPACIO_comprobar_superficie_test();
	ESPACIO_comprobar_nInventario_test();

?>