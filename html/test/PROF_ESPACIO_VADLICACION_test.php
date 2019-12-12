<?php
//Clase : PROF_ESPACIO_Validacion_test.php
//Creado el : 23-11-2019
//Creado por: grvidal
//Fichero de test de unidad de la entidad PROF_ESPACIO
//	Saca por pantalla el resultado de los test
//-------------------------------------------------------


// function PROF_ESPACIO_comprobar_dni_test()
// Valida:
//		dni correcto
//		dni formato erroneo
//	
function PROF_ESPACIO_comprobar_dni_test()
{
	global $ERRORS_array_test;
// creo array de almacen de test individual
	$PROF_ESPACIO_array_test1 = array();

// dni correcto
//----------------------------------------------
	$PROF_ESPACIO_array_test1['tipo'] = 'VALIDACION';
	$PROF_ESPACIO_array_test1['entidad'] = 'PROF_ESPACIO';	
	$PROF_ESPACIO_array_test1['metodo'] = 'dni';
	$PROF_ESPACIO_array_test1['error'] = 'correcto';
	$PROF_ESPACIO_array_test1['error_esperado'] = 'true';
	$PROF_ESPACIO_array_test1['error_obtenido'] = '';
	$PROF_ESPACIO_array_test1['resultado'] = '';
	$dni = '25166583Y';
	// creo el modelo
	$PROF_ESPACIO = new PROF_ESPACIO_Model($dni,'');

	if ($PROF_ESPACIO->comprobar_dni()) $res = 'true';
	else $res = 'false';

	$PROF_ESPACIO_array_test1['error_obtenido'] = $res;
	if ($PROF_ESPACIO_array_test1['error_obtenido'] === $PROF_ESPACIO_array_test1['error_esperado'])
	{
		$PROF_ESPACIO_array_test1['resultado'] = 'OK';
	}
	else
	{
		$PROF_ESPACIO_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test, $PROF_ESPACIO_array_test1);


	//dni forrmato erroneo
	$PROF_ESPACIO_array_test1['tipo'] = 'VALIDACION';
	$PROF_ESPACIO_array_test1['entidad'] = 'PROF_ESPACIO';	
	$PROF_ESPACIO_array_test1['metodo'] = 'dni';
	$PROF_ESPACIO_array_test1['error'] = 'formato erroneo';
	$PROF_ESPACIO_array_test1['error_esperado'] = '00010';
	$PROF_ESPACIO_array_test1['error_obtenido'] = '';
	$PROF_ESPACIO_array_test1['resultado'] = '';

	// Relleno los datos de PROF_ESPACIO	
	$dni = '44';
	// creo el modelo
	$PROF_ESPACIO = new PROF_ESPACIO_Model($dni,'');

	$result = $PROF_ESPACIO->comprobar_dni();
	$PROF_ESPACIO_array_test1['error_obtenido'] = $result[1];
	if ($PROF_ESPACIO_array_test1['error_obtenido'] === $PROF_ESPACIO_array_test1['error_esperado'])
	{
		$PROF_ESPACIO_array_test1['resultado'] = 'OK';
	}
	else
	{
		$PROF_ESPACIO_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test, $PROF_ESPACIO_array_test1);

}


// function PROF_ESPACIO_comprobar_codEspacio_test()
// Valida:
//		ESPACIO correcto
//		ESPACIO demasiado largo
//		ESPACIO demasiado corto
//		ESPACIO vacio
//		ESPACIO formato erroneo
//	
function PROF_ESPACIO_comprobar_codEspacio_test()
{
	global $ERRORS_array_test;
// creo array de almacen de test individual
	$PROF_ESPACIO_array_test1 = array();

// CodESPACIO correcto
//----------------------------------------------
	$PROF_ESPACIO_array_test1['tipo'] = 'VALIDACION';
	$PROF_ESPACIO_array_test1['entidad'] = 'PROF_ESPACIO';	
	$PROF_ESPACIO_array_test1['metodo'] = 'CodESPACIO';
	$PROF_ESPACIO_array_test1['error'] = 'correcto';
	$PROF_ESPACIO_array_test1['error_esperado'] = 'true';
	$PROF_ESPACIO_array_test1['error_obtenido'] = '';
	$PROF_ESPACIO_array_test1['resultado'] = '';
	$CodESPACIO = 'codTit';
	// creo el modelo
	$PROF_ESPACIO = new PROF_ESPACIO_Model('',$CodESPACIO);

	if ($PROF_ESPACIO->comprobar_codEspacio()) $res = 'true';
	else $res = 'false';

	$PROF_ESPACIO_array_test1['error_obtenido'] = $res;
	if ($PROF_ESPACIO_array_test1['error_obtenido'] === $PROF_ESPACIO_array_test1['error_esperado'])
	{
		$PROF_ESPACIO_array_test1['resultado'] = 'OK';
	}
	else
	{
		$PROF_ESPACIO_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test, $PROF_ESPACIO_array_test1);


	//CodESPACIO demasiado largo
	$PROF_ESPACIO_array_test1['tipo'] = 'VALIDACION';
	$PROF_ESPACIO_array_test1['entidad'] = 'PROF_ESPACIO';	
	$PROF_ESPACIO_array_test1['metodo'] = 'CodESPACIO';
	$PROF_ESPACIO_array_test1['error'] = 'demasiado largo';
	$PROF_ESPACIO_array_test1['error_esperado'] = '00002';
	$PROF_ESPACIO_array_test1['error_obtenido'] = '';
	$PROF_ESPACIO_array_test1['resultado'] = '';

	// Relleno los datos de PROF_ESPACIO	
	$CodESPACIO = 'miPROF_ESPACIOesElMasLargoDelMundoYCabraEnLaBaseDeDatosPorqueSoyGenial';
	// creo el modelo
	$PROF_ESPACIO = new PROF_ESPACIO_Model('',$CodESPACIO);

	$result = $PROF_ESPACIO->comprobar_codEspacio();
	$PROF_ESPACIO_array_test1['error_obtenido'] = $result[1];
	if ($PROF_ESPACIO_array_test1['error_obtenido'] === $PROF_ESPACIO_array_test1['error_esperado'])
	{
		$PROF_ESPACIO_array_test1['resultado'] = 'OK';
	}
	else
	{
		$PROF_ESPACIO_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test, $PROF_ESPACIO_array_test1);

	//CodESPACIO demasiado corto
	$PROF_ESPACIO_array_test1['tipo'] = 'VALIDACION';
	$PROF_ESPACIO_array_test1['entidad'] = 'PROF_ESPACIO';	
	$PROF_ESPACIO_array_test1['metodo'] = 'CodESPACIO';
	$PROF_ESPACIO_array_test1['error'] = 'demasiado corto';
	$PROF_ESPACIO_array_test1['error_esperado'] = '00003';
	$PROF_ESPACIO_array_test1['error_obtenido'] = '';
	$PROF_ESPACIO_array_test1['resultado'] = '';

	// Relleno los datos de PROF_ESPACIO	
	$CodESPACIO = 'm';
	// creo el modelo
	$PROF_ESPACIO = new PROF_ESPACIO_Model('',$CodESPACIO);

	$result = $PROF_ESPACIO->comprobar_codEspacio();
	$PROF_ESPACIO_array_test1['error_obtenido'] = $result[1];
	if ($PROF_ESPACIO_array_test1['error_obtenido'] === $PROF_ESPACIO_array_test1['error_esperado'])
	{
		$PROF_ESPACIO_array_test1['resultado'] = 'OK';
	}
	else
	{
		$PROF_ESPACIO_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test, $PROF_ESPACIO_array_test1);

	//CodESPACIO vacio
	$PROF_ESPACIO_array_test1['tipo'] = 'VALIDACION';
	$PROF_ESPACIO_array_test1['entidad'] = 'PROF_ESPACIO';	
	$PROF_ESPACIO_array_test1['metodo'] = 'CodESPACIO';
	$PROF_ESPACIO_array_test1['error'] = 'vacio';
	$PROF_ESPACIO_array_test1['error_esperado'] = '00001';
	$PROF_ESPACIO_array_test1['error_obtenido'] = '';
	$PROF_ESPACIO_array_test1['resultado'] = '';

	// Relleno los datos de PROF_ESPACIO	
	$CodESPACIO = '';
	// creo el modelo
	$PROF_ESPACIO = new PROF_ESPACIO_Model('',$CodESPACIO);

	$result = $PROF_ESPACIO->comprobar_codEspacio();
	$PROF_ESPACIO_array_test1['error_obtenido'] = $result[1];
	if ($PROF_ESPACIO_array_test1['error_obtenido'] === $PROF_ESPACIO_array_test1['error_esperado'])
	{
		$PROF_ESPACIO_array_test1['resultado'] = 'OK';
	}
	else
	{
		$PROF_ESPACIO_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test, $PROF_ESPACIO_array_test1);


	//CodESPACIO formato erroneo
	$PROF_ESPACIO_array_test1['tipo'] = 'VALIDACION';
	$PROF_ESPACIO_array_test1['entidad'] = 'PROF_ESPACIO';	
	$PROF_ESPACIO_array_test1['metodo'] = 'CodESPACIO';
	$PROF_ESPACIO_array_test1['error'] = 'formato erroneo';
	$PROF_ESPACIO_array_test1['error_esperado'] = '00060';
	$PROF_ESPACIO_array_test1['error_obtenido'] = '';
	$PROF_ESPACIO_array_test1['resultado'] = '';

	// Relleno los datos de PROF_ESPACIO	
	$CodESPACIO = 'mi|pass.14';
	// creo el modelo
	$PROF_ESPACIO = new PROF_ESPACIO_Model('',$CodESPACIO);

	$result = $PROF_ESPACIO->comprobar_codEspacio();
	$PROF_ESPACIO_array_test1['error_obtenido'] = $result[1];
	if ($PROF_ESPACIO_array_test1['error_obtenido'] === $PROF_ESPACIO_array_test1['error_esperado'])
	{
		$PROF_ESPACIO_array_test1['resultado'] = 'OK';
	}
	else
	{
		$PROF_ESPACIO_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test, $PROF_ESPACIO_array_test1);
}

// function PROF_ESPACIO_comprobar_ADD()
// Valida:
//		atributos OK
//		atributos name y login mal

function PROF_ESPACIO_comprobar_ADD()
{
	global $ERRORS_array_test;
// creo array de almacen de test individual
	$PROF_ESPACIO_array_test1 = array();

	//sexo correcto
	$PROF_ESPACIO_array_test1['tipo'] = 'VALIDACION';
	$PROF_ESPACIO_array_test1['entidad'] = 'PROF_ESPACIO';	
	$PROF_ESPACIO_array_test1['metodo'] = 'comprobar_atributos_ADD';
	$PROF_ESPACIO_array_test1['error'] = 'correcto';
	$PROF_ESPACIO_array_test1['error_esperado'] = 'true';
	$PROF_ESPACIO_array_test1['error_obtenido'] = '';
	$PROF_ESPACIO_array_test1['resultado'] = '';

	// creo el modelo
	$PROF_ESPACIO = new PROF_ESPACIO_Model('88516567D','name');
	$PROF_ESPACIO_array_test1['error_obtenido'] = $PROF_ESPACIO->comprobar_atributos_ADD() == 1 ? 'true' : 'false';
	if ($PROF_ESPACIO_array_test1['error_obtenido'] === $PROF_ESPACIO_array_test1['error_esperado'])
	{
		$PROF_ESPACIO_array_test1['resultado'] = 'OK';
	}
	else
	{
		$PROF_ESPACIO_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test, $PROF_ESPACIO_array_test1);

	//sexo vacia
	$PROF_ESPACIO_array_test1['tipo'] = 'VALIDACION';
	$PROF_ESPACIO_array_test1['entidad'] = 'PROF_ESPACIO';	
	$PROF_ESPACIO_array_test1['metodo'] = 'comprobar_atributos_ADD';
	$PROF_ESPACIO_array_test1['error'] = 'DNI y codigo espacio erroneos';
	$PROF_ESPACIO_array_test1['error_esperado'] = 'dni-00010-dniError-codEspacio-00060-alfNumguion-';
	$PROF_ESPACIO_array_test1['error_obtenido'] = '';
	$PROF_ESPACIO_array_test1['resultado'] = '';

	// creo el modelo
	$PROF_ESPACIO = new PROF_ESPACIO_Model('88567D','na1me!');
	$array = $PROF_ESPACIO->comprobar_atributos_ADD();
	//var_dump($array);
	foreach ($array as $key ) {
		foreach ($key as $key2) {
			$result .= $key2.'-';
		}
	}
	$PROF_ESPACIO_array_test1['error_obtenido'] = $result;
	if ($PROF_ESPACIO_array_test1['error_obtenido'] === $PROF_ESPACIO_array_test1['error_esperado'])
	{
		$PROF_ESPACIO_array_test1['resultado'] = 'OK';
	}
	else
	{
		$PROF_ESPACIO_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test, $PROF_ESPACIO_array_test1);

	
}

// function PROF_ESPACIO_comprobar_EDIT()
// Valida:
//		atributos OK
//		atributos area y departamento mal

function PROF_ESPACIO_comprobar_EDIT()
{
	global $ERRORS_array_test;
// creo array de almacen de test individual
	$PROF_ESPACIO_array_test1 = array();

	//sexo correcto
	$PROF_ESPACIO_array_test1['tipo'] = 'VALIDACION';
	$PROF_ESPACIO_array_test1['entidad'] = 'PROF_ESPACIO';	
	$PROF_ESPACIO_array_test1['metodo'] = 'comprobar_atributos_EDIT';
	$PROF_ESPACIO_array_test1['error'] = 'correcto';
	$PROF_ESPACIO_array_test1['error_esperado'] = 'true';
	$PROF_ESPACIO_array_test1['error_obtenido'] = '';
	$PROF_ESPACIO_array_test1['resultado'] = '';

	// creo el modelo
	$PROF_ESPACIO = new PROF_ESPACIO_Model('88516567D','name');

	$PROF_ESPACIO_array_test1['error_obtenido'] = $PROF_ESPACIO->comprobar_atributos_EDIT() == 1 ? 'true' : 'false';
	if ($PROF_ESPACIO_array_test1['error_obtenido'] === $PROF_ESPACIO_array_test1['error_esperado'])
	{
		$PROF_ESPACIO_array_test1['resultado'] = 'OK';
	}
	else
	{
		$PROF_ESPACIO_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test, $PROF_ESPACIO_array_test1);

	//sexo vacia
	$PROF_ESPACIO_array_test1['tipo'] = 'VALIDACION';
	$PROF_ESPACIO_array_test1['entidad'] = 'PROF_ESPACIO';	
	$PROF_ESPACIO_array_test1['metodo'] = 'comprobar_atributos_EDIT';
	$PROF_ESPACIO_array_test1['error'] = 'Codigo espacio y dni erroneos';
	$PROF_ESPACIO_array_test1['error_esperado'] = 'dni-00010-dniError-codEspacio-00060-alfNumguion-';
	$PROF_ESPACIO_array_test1['error_obtenido'] = '';
	$PROF_ESPACIO_array_test1['resultado'] = '';

	// creo el modelo
	$PROF_ESPACIO = new PROF_ESPACIO_Model('885567D','name1!');
	$array = $PROF_ESPACIO->comprobar_atributos_EDIT();
	//var_dump($array);
	foreach ($array as $key ) {
		foreach ($key as $key2) {
			$result .= $key2.'-';
		}
	}
	$PROF_ESPACIO_array_test1['error_obtenido'] = $result;
	if ($PROF_ESPACIO_array_test1['error_obtenido'] === $PROF_ESPACIO_array_test1['error_esperado'])
	{
		$PROF_ESPACIO_array_test1['resultado'] = 'OK';
	}
	else
	{
		$PROF_ESPACIO_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test, $PROF_ESPACIO_array_test1);

	
}

// function PROF_ESPACIO_comprobar_DELETE()
// Valida:
//		atributos OK
//		atributos name y login mal

function PROF_ESPACIO_comprobar_DELETE()
{
	global $ERRORS_array_test;
// creo array de almacen de test individual
	$PROF_ESPACIO_array_test1 = array();

	//sexo correcto
	$PROF_ESPACIO_array_test1['tipo'] = 'VALIDACION';
	$PROF_ESPACIO_array_test1['entidad'] = 'PROF_ESPACIO';	
	$PROF_ESPACIO_array_test1['metodo'] = 'comprobar_atributos_DELETE';
	$PROF_ESPACIO_array_test1['error'] = 'correcto';
	$PROF_ESPACIO_array_test1['error_esperado'] = 'true';
	$PROF_ESPACIO_array_test1['error_obtenido'] = '';
	$PROF_ESPACIO_array_test1['resultado'] = '';

	// creo el modelo
	$PROF_ESPACIO = new PROF_ESPACIO_Model('88516567D','codeTit','');

	$PROF_ESPACIO_array_test1['error_obtenido'] = $PROF_ESPACIO->comprobar_atributos_DELETE() == 1 ? 'true' : 'false';
	if ($PROF_ESPACIO_array_test1['error_obtenido'] === $PROF_ESPACIO_array_test1['error_esperado'])
	{
		$PROF_ESPACIO_array_test1['resultado'] = 'OK';
	}
	else
	{
		$PROF_ESPACIO_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test, $PROF_ESPACIO_array_test1);

	//sexo vacia
	$PROF_ESPACIO_array_test1['tipo'] = 'VALIDACION';
	$PROF_ESPACIO_array_test1['entidad'] = 'PROF_ESPACIO';	
	$PROF_ESPACIO_array_test1['metodo'] = 'comprobar_atributos_DELETE';
	$PROF_ESPACIO_array_test1['error'] = 'DNI y codigo del espacio erroneos';
	$PROF_ESPACIO_array_test1['error_esperado'] = 'dni-00010-dniError-codEspacio-00060-alfNumguion-';
	$PROF_ESPACIO_array_test1['error_obtenido'] = '';
	$PROF_ESPACIO_array_test1['resultado'] = '';

	// creo el modelo
	$PROF_ESPACIO = new PROF_ESPACIO_Model('81657D','code!!','');
	$array = $PROF_ESPACIO->comprobar_atributos_DELETE();
	//var_dump($array);
	foreach ($array as $key ) {
		foreach ($key as $key2) {
			$result .= $key2.'-';
		}
	}
	$PROF_ESPACIO_array_test1['error_obtenido'] = $result;
	if ($PROF_ESPACIO_array_test1['error_obtenido'] === $PROF_ESPACIO_array_test1['error_esperado'])
	{
		$PROF_ESPACIO_array_test1['resultado'] = 'OK';
	}
	else
	{
		$PROF_ESPACIO_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test, $PROF_ESPACIO_array_test1);
}


// function PROF_ESPACIO_comprobar_RellenaDatos()
// Valida:
//		atributos OK
//		atributos name y login mal

function PROF_ESPACIO_comprobar_RellenaDatos()
{
	global $ERRORS_array_test;
// creo array de almacen de test individual
	$PROF_ESPACIO_array_test1 = array();

	//sexo correcto
	$PROF_ESPACIO_array_test1['tipo'] = 'VALIDACION';
	$PROF_ESPACIO_array_test1['entidad'] = 'PROF_ESPACIO';	
	$PROF_ESPACIO_array_test1['metodo'] = 'comprobar_atributos_RellenaDatos';
	$PROF_ESPACIO_array_test1['error'] = 'correcto';
	$PROF_ESPACIO_array_test1['error_esperado'] = 'true';
	$PROF_ESPACIO_array_test1['error_obtenido'] = '';
	$PROF_ESPACIO_array_test1['resultado'] = '';

	// creo el modelo
	$PROF_ESPACIO = new PROF_ESPACIO_Model('88516567D','codeTit','');

	$PROF_ESPACIO_array_test1['error_obtenido'] = $PROF_ESPACIO->comprobar_atributos_RellenaDatos() == 1 ? 'true' : 'false';
	if ($PROF_ESPACIO_array_test1['error_obtenido'] === $PROF_ESPACIO_array_test1['error_esperado'])
	{
		$PROF_ESPACIO_array_test1['resultado'] = 'OK';
	}
	else
	{
		$PROF_ESPACIO_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test, $PROF_ESPACIO_array_test1);

	//sexo vacia
	$PROF_ESPACIO_array_test1['tipo'] = 'VALIDACION';
	$PROF_ESPACIO_array_test1['entidad'] = 'PROF_ESPACIO';	
	$PROF_ESPACIO_array_test1['metodo'] = 'comprobar_atributos_RellenaDatos';
	$PROF_ESPACIO_array_test1['error'] = 'DNI y codigo de la ESPACIO erroneos';
	$PROF_ESPACIO_array_test1['error_esperado'] = 'dni-00010-dniError-codEspacio-00002-toolong-';
	$PROF_ESPACIO_array_test1['error_obtenido'] = '';
	$PROF_ESPACIO_array_test1['resultado'] = '';

	// creo el modelo
	$PROF_ESPACIO = new PROF_ESPACIO_Model('81657D','codeasdasdasdasdsad','');
	$array = $PROF_ESPACIO->comprobar_atributos_RellenaDatos();
	//var_dump($array);
	foreach ($array as $key ) {
		foreach ($key as $key2) {
			$result .= $key2.'-';
		}
	}
	$PROF_ESPACIO_array_test1['error_obtenido'] = $result;
	if ($PROF_ESPACIO_array_test1['error_obtenido'] === $PROF_ESPACIO_array_test1['error_esperado'])
	{
		$PROF_ESPACIO_array_test1['resultado'] = 'OK';
	}
	else
	{
		$PROF_ESPACIO_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test, $PROF_ESPACIO_array_test1);
}


	PROF_ESPACIO_comprobar_dni_test();
	PROF_ESPACIO_comprobar_codEspacio_test();

	PROF_ESPACIO_comprobar_ADD();
	PROF_ESPACIO_comprobar_EDIT();
	PROF_ESPACIO_comprobar_DELETE();
	PROF_ESPACIO_comprobar_RellenaDatos();

?>