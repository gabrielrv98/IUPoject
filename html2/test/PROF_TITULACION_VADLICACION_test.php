<?php
//Clase : PROF_TITULACION__Validacion_test.php
//Creado el : 23-11-2019
//Creado por: grvidal
//Fichero de test de unidad de la entidad TITULACION
//	Saca por pantalla el resultado de los test
//-------------------------------------------------------


// function PROF_TITULACION_comprobar_dni_test()
// Valida:
//		dni correcto
//		dni formato erroneo
//	
function PROF_TITULACION_comprobar_dni_test()
{
	global $ERRORS_array_test;
// creo array de almacen de test individual
	$PROF_TITULACION_array_test1 = array();

// dni correcto
//----------------------------------------------
	$PROF_TITULACION_array_test1['tipo'] = 'VALIDACION';
	$PROF_TITULACION_array_test1['entidad'] = 'PROF_TITULACION';	
	$PROF_TITULACION_array_test1['metodo'] = 'dni';
	$PROF_TITULACION_array_test1['error'] = 'correcto';
	$PROF_TITULACION_array_test1['error_esperado'] = 'true';
	$PROF_TITULACION_array_test1['error_obtenido'] = '';
	$PROF_TITULACION_array_test1['resultado'] = '';
	$dni = '25166583Y';
	// creo el modelo
	$PROF_TITULACION = new PROF_TITULACION_Model($dni,'','');

	if ($PROF_TITULACION->comprobar_dni()) $res = 'true';
	else $res = 'false';

	$PROF_TITULACION_array_test1['error_obtenido'] = $res;
	if ($PROF_TITULACION_array_test1['error_obtenido'] === $PROF_TITULACION_array_test1['error_esperado'])
	{
		$PROF_TITULACION_array_test1['resultado'] = 'OK';
	}
	else
	{
		$PROF_TITULACION_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test, $PROF_TITULACION_array_test1);


	//dni forrmato erroneo
	$PROF_TITULACION_array_test1['tipo'] = 'VALIDACION';
	$PROF_TITULACION_array_test1['entidad'] = 'PROF_TITULACION';	
	$PROF_TITULACION_array_test1['metodo'] = 'dni';
	$PROF_TITULACION_array_test1['error'] = 'formato erroneo';
	$PROF_TITULACION_array_test1['error_esperado'] = '00010';
	$PROF_TITULACION_array_test1['error_obtenido'] = '';
	$PROF_TITULACION_array_test1['resultado'] = '';

	// Relleno los datos de PROF_TITULACION	
	$dni = '44';
	// creo el modelo
	$PROF_TITULACION = new PROF_TITULACION_Model($dni,'','');

	$result = $PROF_TITULACION->comprobar_dni();
	$PROF_TITULACION_array_test1['error_obtenido'] = $result[1];
	if ($PROF_TITULACION_array_test1['error_obtenido'] === $PROF_TITULACION_array_test1['error_esperado'])
	{
		$PROF_TITULACION_array_test1['resultado'] = 'OK';
	}
	else
	{
		$PROF_TITULACION_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test, $PROF_TITULACION_array_test1);

}


// function PROF_TITULACION_comprobar_titulacion_test()
// Valida:
//		titulacion correcto
//		titulacion demasiado largo
//		titulacion demasiado corto
//		titulacion vacio
//		titulacion formato erroneo
//	
function PROF_TITULACION_comprobar_titulacion_test()
{
	global $ERRORS_array_test;
// creo array de almacen de test individual
	$PROF_TITULACION_array_test1 = array();

// CodTitulacion correcto
//----------------------------------------------
	$PROF_TITULACION_array_test1['tipo'] = 'VALIDACION';
	$PROF_TITULACION_array_test1['entidad'] = 'PROF_TITULACION';	
	$PROF_TITULACION_array_test1['metodo'] = 'CodTitulacion';
	$PROF_TITULACION_array_test1['error'] = 'correcto';
	$PROF_TITULACION_array_test1['error_esperado'] = 'true';
	$PROF_TITULACION_array_test1['error_obtenido'] = '';
	$PROF_TITULACION_array_test1['resultado'] = '';
	$CodTitulacion = 'codTit';
	// creo el modelo
	$PROF_TITULACION = new PROF_TITULACION_Model('',$CodTitulacion,'');

	if ($PROF_TITULACION->comprobar_titulacion()) $res = 'true';
	else $res = 'false';

	$PROF_TITULACION_array_test1['error_obtenido'] = $res;
	if ($PROF_TITULACION_array_test1['error_obtenido'] === $PROF_TITULACION_array_test1['error_esperado'])
	{
		$PROF_TITULACION_array_test1['resultado'] = 'OK';
	}
	else
	{
		$PROF_TITULACION_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test, $PROF_TITULACION_array_test1);


	//CodTitulacion demasiado largo
	$PROF_TITULACION_array_test1['tipo'] = 'VALIDACION';
	$PROF_TITULACION_array_test1['entidad'] = 'PROF_TITULACION';	
	$PROF_TITULACION_array_test1['metodo'] = 'CodTitulacion';
	$PROF_TITULACION_array_test1['error'] = 'demasiado largo';
	$PROF_TITULACION_array_test1['error_esperado'] = '00002';
	$PROF_TITULACION_array_test1['error_obtenido'] = '';
	$PROF_TITULACION_array_test1['resultado'] = '';

	// Relleno los datos de PROF_TITULACION	
	$CodTitulacion = 'miPROF_TITULACIONesElMasLargoDelMundoYCabraEnLaBaseDeDatosPorqueSoyGenial';
	// creo el modelo
	$PROF_TITULACION = new PROF_TITULACION_Model('',$CodTitulacion,'');

	$result = $PROF_TITULACION->comprobar_titulacion();
	$PROF_TITULACION_array_test1['error_obtenido'] = $result[1];
	if ($PROF_TITULACION_array_test1['error_obtenido'] === $PROF_TITULACION_array_test1['error_esperado'])
	{
		$PROF_TITULACION_array_test1['resultado'] = 'OK';
	}
	else
	{
		$PROF_TITULACION_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test, $PROF_TITULACION_array_test1);

	//CodTitulacion demasiado corto
	$PROF_TITULACION_array_test1['tipo'] = 'VALIDACION';
	$PROF_TITULACION_array_test1['entidad'] = 'PROF_TITULACION';	
	$PROF_TITULACION_array_test1['metodo'] = 'CodTitulacion';
	$PROF_TITULACION_array_test1['error'] = 'demasiado corto';
	$PROF_TITULACION_array_test1['error_esperado'] = '00003';
	$PROF_TITULACION_array_test1['error_obtenido'] = '';
	$PROF_TITULACION_array_test1['resultado'] = '';

	// Relleno los datos de PROF_TITULACION	
	$CodTitulacion = 'm';
	// creo el modelo
	$PROF_TITULACION = new PROF_TITULACION_Model('',$CodTitulacion,'');

	$result = $PROF_TITULACION->comprobar_titulacion();
	$PROF_TITULACION_array_test1['error_obtenido'] = $result[1];
	if ($PROF_TITULACION_array_test1['error_obtenido'] === $PROF_TITULACION_array_test1['error_esperado'])
	{
		$PROF_TITULACION_array_test1['resultado'] = 'OK';
	}
	else
	{
		$PROF_TITULACION_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test, $PROF_TITULACION_array_test1);

	//CodTitulacion vacio
	$PROF_TITULACION_array_test1['tipo'] = 'VALIDACION';
	$PROF_TITULACION_array_test1['entidad'] = 'PROF_TITULACION';	
	$PROF_TITULACION_array_test1['metodo'] = 'CodTitulacion';
	$PROF_TITULACION_array_test1['error'] = 'vacio';
	$PROF_TITULACION_array_test1['error_esperado'] = '00001';
	$PROF_TITULACION_array_test1['error_obtenido'] = '';
	$PROF_TITULACION_array_test1['resultado'] = '';

	// Relleno los datos de PROF_TITULACION	
	$CodTitulacion = '';
	// creo el modelo
	$PROF_TITULACION = new PROF_TITULACION_Model('',$CodTitulacion,'');

	$result = $PROF_TITULACION->comprobar_titulacion();
	$PROF_TITULACION_array_test1['error_obtenido'] = $result[1];
	if ($PROF_TITULACION_array_test1['error_obtenido'] === $PROF_TITULACION_array_test1['error_esperado'])
	{
		$PROF_TITULACION_array_test1['resultado'] = 'OK';
	}
	else
	{
		$PROF_TITULACION_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test, $PROF_TITULACION_array_test1);


	//CodTitulacion formato erroneo
	$PROF_TITULACION_array_test1['tipo'] = 'VALIDACION';
	$PROF_TITULACION_array_test1['entidad'] = 'PROF_TITULACION';	
	$PROF_TITULACION_array_test1['metodo'] = 'CodTitulacion';
	$PROF_TITULACION_array_test1['error'] = 'formato erroneo';
	$PROF_TITULACION_array_test1['error_esperado'] = '00060';
	$PROF_TITULACION_array_test1['error_obtenido'] = '';
	$PROF_TITULACION_array_test1['resultado'] = '';

	// Relleno los datos de PROF_TITULACION	
	$CodTitulacion = 'mi|pass.14';
	// creo el modelo
	$PROF_TITULACION = new PROF_TITULACION_Model('',$CodTitulacion,'');

	$result = $PROF_TITULACION->comprobar_titulacion();
	$PROF_TITULACION_array_test1['error_obtenido'] = $result[1];
	if ($PROF_TITULACION_array_test1['error_obtenido'] === $PROF_TITULACION_array_test1['error_esperado'])
	{
		$PROF_TITULACION_array_test1['resultado'] = 'OK';
	}
	else
	{
		$PROF_TITULACION_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test, $PROF_TITULACION_array_test1);
}


// function PROF_TITULACION_comprobar_year_test()
// Valida:
//		year correcto
//		year formato erroneo
//	
function PROF_TITULACION_comprobar_year_test()
{
	global $ERRORS_array_test;
// creo array de almacen de test individual
	$PROF_TITULACION_array_test1 = array();

// año correcto
//----------------------------------------------
	$PROF_TITULACION_array_test1['tipo'] = 'VALIDACION';
	$PROF_TITULACION_array_test1['entidad'] = 'PROF_TITULACION';	
	$PROF_TITULACION_array_test1['metodo'] = 'año';
	$PROF_TITULACION_array_test1['error'] = 'correcto';
	$PROF_TITULACION_array_test1['error_esperado'] = 'true';
	$PROF_TITULACION_array_test1['error_obtenido'] = '';
	$PROF_TITULACION_array_test1['resultado'] = '';
	$year = '2010-2011';
	// creo el modelo
	$PROF_TITULACION = new PROF_TITULACION_Model('','',$year);

	if ($PROF_TITULACION->comprobar_anhoAcademico()) $res = 'true';
	else $res = 'false';

	$PROF_TITULACION_array_test1['error_obtenido'] = $res;
	if ($PROF_TITULACION_array_test1['error_obtenido'] === $PROF_TITULACION_array_test1['error_esperado'])
	{
		$PROF_TITULACION_array_test1['resultado'] = 'OK';
	}
	else
	{
		$PROF_TITULACION_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test, $PROF_TITULACION_array_test1);


	//año formato erroneo
	$PROF_TITULACION_array_test1['tipo'] = 'VALIDACION';
	$PROF_TITULACION_array_test1['entidad'] = 'PROF_TITULACION';	
	$PROF_TITULACION_array_test1['metodo'] = 'año';
	$PROF_TITULACION_array_test1['error'] = 'formato erroneo';
	$PROF_TITULACION_array_test1['error_esperado'] = '00110';
	$PROF_TITULACION_array_test1['error_obtenido'] = '';
	$PROF_TITULACION_array_test1['resultado'] = '';

	// Relleno los datos de PROF_TITULACION	
	$year = 'mi|pass.14';
	// creo el modelo
	$PROF_TITULACION = new PROF_TITULACION_Model('','',$year);

	$result = $PROF_TITULACION->comprobar_anhoAcademico();
	$PROF_TITULACION_array_test1['error_obtenido'] = $result[1];
	if ($PROF_TITULACION_array_test1['error_obtenido'] === $PROF_TITULACION_array_test1['error_esperado'])
	{
		$PROF_TITULACION_array_test1['resultado'] = 'OK';
	}
	else
	{
		$PROF_TITULACION_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test, $PROF_TITULACION_array_test1);
}


// function PROF_TITULACION_comprobar_ADD()
// Valida:
//		atributos OK
//		atributos name y login mal

function PROF_TITULACION_comprobar_ADD()
{
	global $ERRORS_array_test;
// creo array de almacen de test individual
	$PROF_TITULACION_array_test1 = array();

	//sexo correcto
	$PROF_TITULACION_array_test1['tipo'] = 'VALIDACION';
	$PROF_TITULACION_array_test1['entidad'] = 'PROF_TITULACION';	
	$PROF_TITULACION_array_test1['metodo'] = 'comprobar_atributos_ADD';
	$PROF_TITULACION_array_test1['error'] = 'correcto';
	$PROF_TITULACION_array_test1['error_esperado'] = 'true';
	$PROF_TITULACION_array_test1['error_obtenido'] = '';
	$PROF_TITULACION_array_test1['resultado'] = '';

	// creo el modelo
	$PROF_TITULACION = new PROF_TITULACION_Model('88516567D','name','2018-2019');
	$PROF_TITULACION_array_test1['error_obtenido'] = $PROF_TITULACION->comprobar_atributos_ADD() == 1 ? 'true' : 'false';
	if ($PROF_TITULACION_array_test1['error_obtenido'] === $PROF_TITULACION_array_test1['error_esperado'])
	{
		$PROF_TITULACION_array_test1['resultado'] = 'OK';
	}
	else
	{
		$PROF_TITULACION_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test, $PROF_TITULACION_array_test1);

	//sexo vacia
	$PROF_TITULACION_array_test1['tipo'] = 'VALIDACION';
	$PROF_TITULACION_array_test1['entidad'] = 'PROF_TITULACION';	
	$PROF_TITULACION_array_test1['metodo'] = 'comprobar_atributos_ADD';
	$PROF_TITULACION_array_test1['error'] = 'DNI y codigo titulacion erroneos';
	$PROF_TITULACION_array_test1['error_esperado'] = 'dni-00010-dniError-codeTitulation-00060-alfNum-';
	$PROF_TITULACION_array_test1['error_obtenido'] = '';
	$PROF_TITULACION_array_test1['resultado'] = '';

	// creo el modelo
	$PROF_TITULACION = new PROF_TITULACION_Model('8851567D','na1me!','2018-2019');
	$array = $PROF_TITULACION->comprobar_atributos_ADD();
	//var_dump($array);
	foreach ($array as $key ) {
		foreach ($key as $key2) {
			$result .= $key2.'-';
		}
	}
	$PROF_TITULACION_array_test1['error_obtenido'] = $result;
	if ($PROF_TITULACION_array_test1['error_obtenido'] === $PROF_TITULACION_array_test1['error_esperado'])
	{
		$PROF_TITULACION_array_test1['resultado'] = 'OK';
	}
	else
	{
		$PROF_TITULACION_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test, $PROF_TITULACION_array_test1);

	
}

// function PROF_TITULACION_comprobar_EDIT()
// Valida:
//		atributos OK
//		atributos area y departamento mal

function PROF_TITULACION_comprobar_EDIT()
{
	global $ERRORS_array_test;
// creo array de almacen de test individual
	$PROF_TITULACION_array_test1 = array();

	//sexo correcto
	$PROF_TITULACION_array_test1['tipo'] = 'VALIDACION';
	$PROF_TITULACION_array_test1['entidad'] = 'PROF_TITULACION';	
	$PROF_TITULACION_array_test1['metodo'] = 'comprobar_atributos_EDIT';
	$PROF_TITULACION_array_test1['error'] = 'correcto';
	$PROF_TITULACION_array_test1['error_esperado'] = 'true';
	$PROF_TITULACION_array_test1['error_obtenido'] = '';
	$PROF_TITULACION_array_test1['resultado'] = '';

	// creo el modelo
	$PROF_TITULACION = new PROF_TITULACION_Model('88516567D','name','2018-2019');

	$PROF_TITULACION_array_test1['error_obtenido'] = $PROF_TITULACION->comprobar_atributos_EDIT() == 1 ? 'true' : 'false';
	if ($PROF_TITULACION_array_test1['error_obtenido'] === $PROF_TITULACION_array_test1['error_esperado'])
	{
		$PROF_TITULACION_array_test1['resultado'] = 'OK';
	}
	else
	{
		$PROF_TITULACION_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test, $PROF_TITULACION_array_test1);

	//sexo vacia
	$PROF_TITULACION_array_test1['tipo'] = 'VALIDACION';
	$PROF_TITULACION_array_test1['entidad'] = 'PROF_TITULACION';	
	$PROF_TITULACION_array_test1['metodo'] = 'comprobar_atributos_EDIT';
	$PROF_TITULACION_array_test1['error'] = 'Codigo titulacin y año erroneos';
	$PROF_TITULACION_array_test1['error_esperado'] = 'codeTitulation-00060-alfNum-ANHOACADEMICO-00110-anhoAcadCode-';
	$PROF_TITULACION_array_test1['error_obtenido'] = '';
	$PROF_TITULACION_array_test1['resultado'] = '';

	// creo el modelo
	$PROF_TITULACION = new PROF_TITULACION_Model('88516567D','name1!','2018019');
	$array = $PROF_TITULACION->comprobar_atributos_EDIT();
	//var_dump($array);
	foreach ($array as $key ) {
		foreach ($key as $key2) {
			$result .= $key2.'-';
		}
	}
	$PROF_TITULACION_array_test1['error_obtenido'] = $result;
	if ($PROF_TITULACION_array_test1['error_obtenido'] === $PROF_TITULACION_array_test1['error_esperado'])
	{
		$PROF_TITULACION_array_test1['resultado'] = 'OK';
	}
	else
	{
		$PROF_TITULACION_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test, $PROF_TITULACION_array_test1);

	
}

// function PROF_TITULACION_comprobar_DELETE()
// Valida:
//		atributos OK
//		atributos name y login mal

function PROF_TITULACION_comprobar_DELETE()
{
	global $ERRORS_array_test;
// creo array de almacen de test individual
	$PROF_TITULACION_array_test1 = array();

	//sexo correcto
	$PROF_TITULACION_array_test1['tipo'] = 'VALIDACION';
	$PROF_TITULACION_array_test1['entidad'] = 'PROF_TITULACION';	
	$PROF_TITULACION_array_test1['metodo'] = 'comprobar_atributos_DELETE';
	$PROF_TITULACION_array_test1['error'] = 'correcto';
	$PROF_TITULACION_array_test1['error_esperado'] = 'true';
	$PROF_TITULACION_array_test1['error_obtenido'] = '';
	$PROF_TITULACION_array_test1['resultado'] = '';

	// creo el modelo
	$PROF_TITULACION = new PROF_TITULACION_Model('88516567D','codeTit','');

	$PROF_TITULACION_array_test1['error_obtenido'] = $PROF_TITULACION->comprobar_atributos_DELETE() == 1 ? 'true' : 'false';
	if ($PROF_TITULACION_array_test1['error_obtenido'] === $PROF_TITULACION_array_test1['error_esperado'])
	{
		$PROF_TITULACION_array_test1['resultado'] = 'OK';
	}
	else
	{
		$PROF_TITULACION_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test, $PROF_TITULACION_array_test1);

	//sexo vacia
	$PROF_TITULACION_array_test1['tipo'] = 'VALIDACION';
	$PROF_TITULACION_array_test1['entidad'] = 'PROF_TITULACION';	
	$PROF_TITULACION_array_test1['metodo'] = 'comprobar_atributos_DELETE';
	$PROF_TITULACION_array_test1['error'] = 'DNI y codigo de la titulacion erroneos';
	$PROF_TITULACION_array_test1['error_esperado'] = 'dni-00010-dniError-codeTitulation-00060-alfNum-';
	$PROF_TITULACION_array_test1['error_obtenido'] = '';
	$PROF_TITULACION_array_test1['resultado'] = '';

	// creo el modelo
	$PROF_TITULACION = new PROF_TITULACION_Model('81657D','code!!','');
	$array = $PROF_TITULACION->comprobar_atributos_DELETE();
	//var_dump($array);
	foreach ($array as $key ) {
		foreach ($key as $key2) {
			$result .= $key2.'-';
		}
	}
	$PROF_TITULACION_array_test1['error_obtenido'] = $result;
	if ($PROF_TITULACION_array_test1['error_obtenido'] === $PROF_TITULACION_array_test1['error_esperado'])
	{
		$PROF_TITULACION_array_test1['resultado'] = 'OK';
	}
	else
	{
		$PROF_TITULACION_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test, $PROF_TITULACION_array_test1);
}


// function PROF_TITULACION_comprobar_RellenaDatos()
// Valida:
//		atributos OK
//		atributos name y login mal

function PROF_TITULACION_comprobar_RellenaDatos()
{
	global $ERRORS_array_test;
// creo array de almacen de test individual
	$PROF_TITULACION_array_test1 = array();

	//sexo correcto
	$PROF_TITULACION_array_test1['tipo'] = 'VALIDACION';
	$PROF_TITULACION_array_test1['entidad'] = 'PROF_TITULACION';	
	$PROF_TITULACION_array_test1['metodo'] = 'comprobar_atributos_RellenaDatos';
	$PROF_TITULACION_array_test1['error'] = 'correcto';
	$PROF_TITULACION_array_test1['error_esperado'] = 'true';
	$PROF_TITULACION_array_test1['error_obtenido'] = '';
	$PROF_TITULACION_array_test1['resultado'] = '';

	// creo el modelo
	$PROF_TITULACION = new PROF_TITULACION_Model('88516567D','codeTit','');

	$PROF_TITULACION_array_test1['error_obtenido'] = $PROF_TITULACION->comprobar_atributos_RellenaDatos() == 1 ? 'true' : 'false';
	if ($PROF_TITULACION_array_test1['error_obtenido'] === $PROF_TITULACION_array_test1['error_esperado'])
	{
		$PROF_TITULACION_array_test1['resultado'] = 'OK';
	}
	else
	{
		$PROF_TITULACION_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test, $PROF_TITULACION_array_test1);

	//sexo vacia
	$PROF_TITULACION_array_test1['tipo'] = 'VALIDACION';
	$PROF_TITULACION_array_test1['entidad'] = 'PROF_TITULACION';	
	$PROF_TITULACION_array_test1['metodo'] = 'comprobar_atributos_RellenaDatos';
	$PROF_TITULACION_array_test1['error'] = 'DNI y codigo de la titulacion erroneos';
	$PROF_TITULACION_array_test1['error_esperado'] = 'dni-00010-dniError-codeTitulation-00002-toolong-';
	$PROF_TITULACION_array_test1['error_obtenido'] = '';
	$PROF_TITULACION_array_test1['resultado'] = '';

	// creo el modelo
	$PROF_TITULACION = new PROF_TITULACION_Model('81657D','codeasdasdasdasdsad','');
	$array = $PROF_TITULACION->comprobar_atributos_RellenaDatos();
	//var_dump($array);
	foreach ($array as $key ) {
		foreach ($key as $key2) {
			$result .= $key2.'-';
		}
	}
	$PROF_TITULACION_array_test1['error_obtenido'] = $result;
	if ($PROF_TITULACION_array_test1['error_obtenido'] === $PROF_TITULACION_array_test1['error_esperado'])
	{
		$PROF_TITULACION_array_test1['resultado'] = 'OK';
	}
	else
	{
		$PROF_TITULACION_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test, $PROF_TITULACION_array_test1);
}


	PROF_TITULACION_comprobar_dni_test();
	PROF_TITULACION_comprobar_titulacion_test();
	PROF_TITULACION_comprobar_year_test();

	PROF_TITULACION_comprobar_ADD();
	PROF_TITULACION_comprobar_EDIT();
	PROF_TITULACION_comprobar_DELETE();
	PROF_TITULACION_comprobar_RellenaDatos();

?>