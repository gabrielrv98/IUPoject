<?php
//Clase : USUARIOS_test
//Creado el : 20-11-2019
//Creado por: grvidal
//Fichero de test de unidad de la entidad USUARIOS
//	Saca por pantalla el resultado de los test
//-------------------------------------------------------

// function USUARIOS_comproba_atributos_test()
// Valida:
//		Login correcto
//		Login demasiado largo
//		Login demasiado corto
//		Login vacio
//		Login inesperado

function USUARIOS_comprobar_login_test()
{
	global $ERRORS_array_test;
// creo array de almacen de test individual
	$USUARIO_array_test1 = array();

// Login correcto
//----------------------------------------------
	$USUARIO_array_test1['tipo'] = 'VALIDACION';
	$USUARIO_array_test1['entidad'] = 'USUARIO';	
	$USUARIO_array_test1['metodo'] = 'login';
	$USUARIO_array_test1['error'] = 'correcto';
	$USUARIO_array_test1['error_esperado'] = 'true';
	$USUARIO_array_test1['error_obtenido'] = '';
	$USUARIO_array_test1['resultado'] = '';
	$login = 'miusuario';
	// creo el modelo
	$USUARIO = new USUARIOS_Model($login,'','','','','','','','','');

	if ($USUARIO->comprobar_login()) $res = 'true';
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


	//Login demasiado largo
	$USUARIO_array_test1['tipo'] = 'VALIDACION';
	$USUARIO_array_test1['entidad'] = 'USUARIO';	
	$USUARIO_array_test1['metodo'] = 'login';
	$USUARIO_array_test1['error'] = 'demasiado largo';
	$USUARIO_array_test1['error_esperado'] = '00002';
	$USUARIO_array_test1['error_obtenido'] = '';
	$USUARIO_array_test1['resultado'] = '';

	// Relleno los datos de usuario	
	$login = 'miusuarioesElMasLargoDelMundoYCabraEnLaBaseDeDatosPorqueSoyGenial';
	// creo el modelo
	$USUARIO = new USUARIOS_Model($login,'','','','','','','','','');

	$result = $USUARIO->comprobar_login();
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

	//Login demasiado corto
	$USUARIO_array_test1['tipo'] = 'VALIDACION';
	$USUARIO_array_test1['entidad'] = 'USUARIO';	
	$USUARIO_array_test1['metodo'] = 'login';
	$USUARIO_array_test1['error'] = 'demasiado corto';
	$USUARIO_array_test1['error_esperado'] = '00003';
	$USUARIO_array_test1['error_obtenido'] = '';
	$USUARIO_array_test1['resultado'] = '';

	// Relleno los datos de usuario	
	$login = 'm';
	// creo el modelo
	$USUARIO = new USUARIOS_Model($login,'','','','','','','','','');

	$result = $USUARIO->comprobar_login();
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

	//Login vacio
	$USUARIO_array_test1['tipo'] = 'VALIDACION';
	$USUARIO_array_test1['entidad'] = 'USUARIO';	
	$USUARIO_array_test1['metodo'] = 'login';
	$USUARIO_array_test1['error'] = 'vacio';
	$USUARIO_array_test1['error_esperado'] = '00001';
	$USUARIO_array_test1['error_obtenido'] = '';
	$USUARIO_array_test1['resultado'] = '';

	// Relleno los datos de usuario	
	$login = '';
	// creo el modelo
	$USUARIO = new USUARIOS_Model($login,'','','','','','','','','');

	$result = $USUARIO->comprobar_login();
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


	//Login sin numeros
	$USUARIO_array_test1['tipo'] = 'VALIDACION';
	$USUARIO_array_test1['entidad'] = 'USUARIO';	
	$USUARIO_array_test1['metodo'] = 'login';
	$USUARIO_array_test1['error'] = 'formato erroneo';
	$USUARIO_array_test1['error_esperado'] = '00090';
	$USUARIO_array_test1['error_obtenido'] = '';
	$USUARIO_array_test1['resultado'] = '';

	// Relleno los datos de usuario	
	$login = 'mi|usuio14';
	// creo el modelo
	$USUARIO = new USUARIOS_Model($login,'','','','','','','','','');

	$result = $USUARIO->comprobar_login();
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

// function USUARIOS_comproba_atributos_test()
// Valida:
//		Password correcto
//		Password demasiado largo
//		Password demasiado corto
//		Password vacio
//		Password inesperado

function USUARIOS_comprobar_password_test()
{
	global $ERRORS_array_test;
// creo array de almacen de test individual
	$USUARIO_array_test1 = array();

	//Password correcta
	$USUARIO_array_test1['tipo'] = 'VALIDACION';
	$USUARIO_array_test1['entidad'] = 'USUARIO';	
	$USUARIO_array_test1['metodo'] = 'password';
	$USUARIO_array_test1['error'] = 'correcta';
	$USUARIO_array_test1['error_esperado'] = 'true';
	$USUARIO_array_test1['error_obtenido'] = '';
	$USUARIO_array_test1['resultado'] = '';

	// Relleno los datos de usuario	
	$pass = 'mipass';
	// creo el modelo
	$USUARIO = new USUARIOS_Model('',$pass,'','','','','','','','');

	if ($USUARIO->comprobar_password()) $res = 'true';
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

	//Password vacia
	$USUARIO_array_test1['tipo'] = 'VALIDACION';
	$USUARIO_array_test1['entidad'] = 'USUARIO';	
	$USUARIO_array_test1['metodo'] = 'password';
	$USUARIO_array_test1['error'] = 'vacia';
	$USUARIO_array_test1['error_esperado'] = '00001';
	$USUARIO_array_test1['error_obtenido'] = '';
	$USUARIO_array_test1['resultado'] = '';

	// Relleno los datos de usuario	
	$pass = '';
	// creo el modelo
	$USUARIO = new USUARIOS_Model('',$pass,'','','','','','','','');
	$result = $USUARIO->comprobar_password();
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

	//Password muy larga
	$USUARIO_array_test1['tipo'] = 'VALIDACION';
	$USUARIO_array_test1['entidad'] = 'USUARIO';	
	$USUARIO_array_test1['metodo'] = 'password';
	$USUARIO_array_test1['error'] = 'muy larga';
	$USUARIO_array_test1['error_esperado'] = '00002';
	$USUARIO_array_test1['error_obtenido'] = '';
	$USUARIO_array_test1['resultado'] = '';

	// Relleno los datos de usuario	
	$pass = 'passGenialMaravillosaDelMundoGenialYRequeteGenial';
	// creo el modelo
	$USUARIO = new USUARIOS_Model('',$pass,'','','','','','','','');

	$result = $USUARIO->comprobar_password();
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

	//Password muy corta
	$USUARIO_array_test1['tipo'] = 'VALIDACION';
	$USUARIO_array_test1['entidad'] = 'USUARIO';	
	$USUARIO_array_test1['metodo'] = 'password';
	$USUARIO_array_test1['error'] = 'muy corta';
	$USUARIO_array_test1['error_esperado'] = '00003';
	$USUARIO_array_test1['error_obtenido'] = '';
	$USUARIO_array_test1['resultado'] = '';

	// Relleno los datos de usuario	
	$pass = 'a';
	// creo el modelo
	$USUARIO = new USUARIOS_Model('',$pass,'','','','','','','','');

	$result = $USUARIO->comprobar_password();
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

	//Password erronea
	$USUARIO_array_test1['tipo'] = 'VALIDACION';
	$USUARIO_array_test1['entidad'] = 'USUARIO';	
	$USUARIO_array_test1['metodo'] = 'password';
	$USUARIO_array_test1['error'] = 'erronea';
	$USUARIO_array_test1['error_esperado'] = '00090';
	$USUARIO_array_test1['error_obtenido'] = '';
	$USUARIO_array_test1['resultado'] = '';

	// Relleno los datos de usuario	
	$pass = 'a|349)==?';
	// creo el modelo
	$USUARIO = new USUARIOS_Model('',$pass,'','','','','','','','');

	$result = $USUARIO->comprobar_password();
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


// function USUARIOS_comproba_atributos_test()
// Valida:
//		DNI correcto
//		DNI vacio
//		DNI formato incorrecto

function USUARIOS_comprobar_dni_test()
{
	global $ERRORS_array_test;
// creo array de almacen de test individual
	$USUARIO_array_test1 = array();

	//dni correcta
	$USUARIO_array_test1['tipo'] = 'VALIDACION';
	$USUARIO_array_test1['entidad'] = 'USUARIO';	
	$USUARIO_array_test1['metodo'] = 'dni';
	$USUARIO_array_test1['error'] = 'correcto';
	$USUARIO_array_test1['error_esperado'] = 'true';
	$USUARIO_array_test1['error_obtenido'] = '';
	$USUARIO_array_test1['resultado'] = '';

	// Relleno los datos de usuario	
	$dni = '25166583Y';
	// creo el modelo
	$USUARIO = new USUARIOS_Model('','',$dni,'','','','','','','');

	if ($USUARIO->comprobar_dni()) $res = 'true';
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

	//dni vacio
	$USUARIO_array_test1['tipo'] = 'VALIDACION';
	$USUARIO_array_test1['entidad'] = 'USUARIO';	
	$USUARIO_array_test1['metodo'] = 'dni';
	$USUARIO_array_test1['error'] = 'vacia';
	$USUARIO_array_test1['error_esperado'] = '00001';
	$USUARIO_array_test1['error_obtenido'] = '';
	$USUARIO_array_test1['resultado'] = '';

	// Relleno los datos de usuario	
	$dni = '';
	// creo el modelo
	$USUARIO = new USUARIOS_Model('','',$dni,'','','','','','','');
	$result = $USUARIO->comprobar_dni();
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

	//dni no coincide
	$USUARIO_array_test1['tipo'] = 'VALIDACION';
	$USUARIO_array_test1['entidad'] = 'USUARIO';	
	$USUARIO_array_test1['metodo'] = 'dni';
	$USUARIO_array_test1['error'] = 'no coincide con lo esperado';
	$USUARIO_array_test1['error_esperado'] = '00010';
	$USUARIO_array_test1['error_obtenido'] = '';
	$USUARIO_array_test1['resultado'] = '';

	// Relleno los datos de usuario	
	$dni = '2516583Y';
	// creo el modelo
	$USUARIO = new USUARIOS_Model('','',$dni,'','','','','','','');

	$result = $USUARIO->comprobar_dni();
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


// function USUARIOS_comproba_atributos_test()
// Valida:
//		nombre correcto
//		nombre demasiado largo
//		nombre demasiado corto
//		nombre vacio
//		nombre formato incorrecto

function USUARIOS_comprobar_nombre_test()
{
	global $ERRORS_array_test;
// creo array de almacen de test individual
	$USUARIO_array_test1 = array();

	//nombre correcta
	$USUARIO_array_test1['tipo'] = 'VALIDACION';
	$USUARIO_array_test1['entidad'] = 'USUARIO';	
	$USUARIO_array_test1['metodo'] = 'nombre';
	$USUARIO_array_test1['error'] = 'correcto';
	$USUARIO_array_test1['error_esperado'] = 'true';
	$USUARIO_array_test1['error_obtenido'] = '';
	$USUARIO_array_test1['resultado'] = '';

	// Relleno los datos de usuario	
	$nombre = 'mipass';
	// creo el modelo
	$USUARIO = new USUARIOS_Model('','','',$nombre,'','','','','','');

	if ($USUARIO->comprobar_nombre()) $res = 'true';
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

	//nombre vacia
	$USUARIO_array_test1['tipo'] = 'VALIDACION';
	$USUARIO_array_test1['entidad'] = 'USUARIO';	
	$USUARIO_array_test1['metodo'] = 'nombre';
	$USUARIO_array_test1['error'] = 'vacio';
	$USUARIO_array_test1['error_esperado'] = '00001';
	$USUARIO_array_test1['error_obtenido'] = '';
	$USUARIO_array_test1['resultado'] = '';

	// Relleno los datos de usuario	
	$nombre = '';
	// creo el modelo
	$USUARIO = new USUARIOS_Model('','','',$nombre,'','','','','','');
	$result = $USUARIO->comprobar_nombre();
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

	//nombre muy larga
	$USUARIO_array_test1['tipo'] = 'VALIDACION';
	$USUARIO_array_test1['entidad'] = 'USUARIO';	
	$USUARIO_array_test1['metodo'] = 'nombre';
	$USUARIO_array_test1['error'] = 'muy largo';
	$USUARIO_array_test1['error_esperado'] = '00002';
	$USUARIO_array_test1['error_obtenido'] = '';
	$USUARIO_array_test1['resultado'] = '';

	// Relleno los datos de usuario	
	$nombre = 'passGenialMaravillosaDelMundoGenialYRequeteGenial';
	// creo el modelo
	$USUARIO = new USUARIOS_Model('','','',$nombre,'','','','','','');

	$result = $USUARIO->comprobar_nombre();
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

	//nombre muy corta
	$USUARIO_array_test1['tipo'] = 'VALIDACION';
	$USUARIO_array_test1['entidad'] = 'USUARIO';	
	$USUARIO_array_test1['metodo'] = 'nombre';
	$USUARIO_array_test1['error'] = 'muy corto';
	$USUARIO_array_test1['error_esperado'] = '00003';
	$USUARIO_array_test1['error_obtenido'] = '';
	$USUARIO_array_test1['resultado'] = '';

	// Relleno los datos de usuario	
	$nombre = 'a';
	// creo el modelo
	$USUARIO = new USUARIOS_Model('','','',$nombre,'','','','','','');

	$result = $USUARIO->comprobar_nombre();
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

	//nombre erronea
	$USUARIO_array_test1['tipo'] = 'VALIDACION';
	$USUARIO_array_test1['entidad'] = 'USUARIO';	
	$USUARIO_array_test1['metodo'] = 'nombre';
	$USUARIO_array_test1['error'] = 'erronea';
	$USUARIO_array_test1['error_esperado'] = '00030';
	$USUARIO_array_test1['error_obtenido'] = '';
	$USUARIO_array_test1['resultado'] = '';

	// Relleno los datos de usuario	
	$nombre = 'a|349)==?';
	// creo el modelo
	$USUARIO = new USUARIOS_Model('','','',$nombre,'','','','','','');

	$result = $USUARIO->comprobar_nombre();
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

// function USUARIOS_comproba_atributos_test()
// Valida:
//		apellido correcto
//		apellido demasiado largo
//		apellido demasiado corto
//		apellido vacio
//		apellido formato incorrecto

function USUARIOS_comprobar_apellido_test()
{
	global $ERRORS_array_test;
// creo array de almacen de test individual
	$USUARIO_array_test1 = array();

	//apellido correcto
	$USUARIO_array_test1['tipo'] = 'VALIDACION';
	$USUARIO_array_test1['entidad'] = 'USUARIO';	
	$USUARIO_array_test1['metodo'] = 'apellido';
	$USUARIO_array_test1['error'] = 'correcto';
	$USUARIO_array_test1['error_esperado'] = 'true';
	$USUARIO_array_test1['error_obtenido'] = '';
	$USUARIO_array_test1['resultado'] = '';

	// Relleno los datos de usuario	
	$apellido = 'apellido';
	// creo el modelo
	$USUARIO = new USUARIOS_Model('','','','',$apellido,'','','','','');

	if ($USUARIO->comprobar_apellidos()) $res = 'true';
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

	//apellido vacia
	$USUARIO_array_test1['tipo'] = 'VALIDACION';
	$USUARIO_array_test1['entidad'] = 'USUARIO';	
	$USUARIO_array_test1['metodo'] = 'apellido';
	$USUARIO_array_test1['error'] = 'vacio';
	$USUARIO_array_test1['error_esperado'] = '00001';
	$USUARIO_array_test1['error_obtenido'] = '';
	$USUARIO_array_test1['resultado'] = '';

	// Relleno los datos de usuario	
	$apellido = '';
	// creo el modelo
	$USUARIO = new USUARIOS_Model('','','','',$apellido,'','','','','');
	$result = $USUARIO->comprobar_apellidos();
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

	//apellido muy larga
	$USUARIO_array_test1['tipo'] = 'VALIDACION';
	$USUARIO_array_test1['entidad'] = 'USUARIO';	
	$USUARIO_array_test1['metodo'] = 'apellido';
	$USUARIO_array_test1['error'] = 'muy largo';
	$USUARIO_array_test1['error_esperado'] = '00002';
	$USUARIO_array_test1['error_obtenido'] = '';
	$USUARIO_array_test1['resultado'] = '';

	// Relleno los datos de usuario	
	$apellido = 'passGenialMaravillosaDelMundoGenialYRequeteGenialhsadhasdhuashdashdkjhaskjdasjkhd asdhjash dkjashdkj hkasjd as hdkjsahd jkash jdhsjka hdkjashk hahdkjahs djasdj kjsajdhkjash jkh dkjhash dkjashd';
	// creo el modelo
	$USUARIO = new USUARIOS_Model('','','','',$apellido,'','','','','');

	$result = $USUARIO->comprobar_apellidos();
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

	//apellido muy corta
	$USUARIO_array_test1['tipo'] = 'VALIDACION';
	$USUARIO_array_test1['entidad'] = 'USUARIO';	
	$USUARIO_array_test1['metodo'] = 'apellido';
	$USUARIO_array_test1['error'] = 'muy corto';
	$USUARIO_array_test1['error_esperado'] = '00003';
	$USUARIO_array_test1['error_obtenido'] = '';
	$USUARIO_array_test1['resultado'] = '';

	// Relleno los datos de usuario	
	$apellido = 'a';
	// creo el modelo
	$USUARIO = new USUARIOS_Model('','','','',$apellido,'','','','','');

	$result = $USUARIO->comprobar_apellidos();
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

	//apellido erronea
	$USUARIO_array_test1['tipo'] = 'VALIDACION';
	$USUARIO_array_test1['entidad'] = 'USUARIO';	
	$USUARIO_array_test1['metodo'] = 'apellido';
	$USUARIO_array_test1['error'] = 'erroneo';
	$USUARIO_array_test1['error_esperado'] = '00030';
	$USUARIO_array_test1['error_obtenido'] = '';
	$USUARIO_array_test1['resultado'] = '';

	// Relleno los datos de usuario	
	$apellido = 'a|349)==?';
	// creo el modelo
	$USUARIO = new USUARIOS_Model('','','','',$apellido,'','','','','');

	$result = $USUARIO->comprobar_apellidos();
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

// function USUARIOS_comprobar_tlf_test()
// Valida:
//		telefono correcto
//		telefono vacio
//		telefono formato incorrecto

function USUARIOS_comprobar_tlf_test()
{
	global $ERRORS_array_test;
// creo array de almacen de test individual
	$USUARIO_array_test1 = array();

	//telefono correcto
	$USUARIO_array_test1['tipo'] = 'VALIDACION';
	$USUARIO_array_test1['entidad'] = 'USUARIO';	
	$USUARIO_array_test1['metodo'] = 'telefono';
	$USUARIO_array_test1['error'] = 'correcto';
	$USUARIO_array_test1['error_esperado'] = 'true';
	$USUARIO_array_test1['error_obtenido'] = '';
	$USUARIO_array_test1['resultado'] = '';

	// Relleno los datos de usuario	
	$telefono = '123123132';
	// creo el modelo
	$USUARIO = new USUARIOS_Model('','','','','',$telefono,'','','','');

	if ($USUARIO->comprobar_tlf()) $res = 'true';
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

	//telefono vacia
	$USUARIO_array_test1['tipo'] = 'VALIDACION';
	$USUARIO_array_test1['entidad'] = 'USUARIO';	
	$USUARIO_array_test1['metodo'] = 'telefono';
	$USUARIO_array_test1['error'] = 'vacio';
	$USUARIO_array_test1['error_esperado'] = '00001';
	$USUARIO_array_test1['error_obtenido'] = '';
	$USUARIO_array_test1['resultado'] = '';

	// Relleno los datos de usuario	
	$telefono = '';
	// creo el modelo
	$USUARIO = new USUARIOS_Model('','','','','',$telefono,'','','','');
	$result = $USUARIO->comprobar_tlf();
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

	//telefono incorrecto
	$USUARIO_array_test1['tipo'] = 'VALIDACION';
	$USUARIO_array_test1['entidad'] = 'USUARIO';	
	$USUARIO_array_test1['metodo'] = 'telefono';
	$USUARIO_array_test1['error'] = 'incorrecto';
	$USUARIO_array_test1['error_esperado'] = '00070';
	$USUARIO_array_test1['error_obtenido'] = '';
	$USUARIO_array_test1['resultado'] = '';

	// Relleno los datos de usuario	
	$telefono = '1234';
	// creo el modelo
	$USUARIO = new USUARIOS_Model('','','','','',$telefono,'','','','');

	$result = $USUARIO->comprobar_tlf();
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

// function USUARIOS_comprobar_email_test()
// Valida:
//		email correcto
//		email demasiado largo
//		email demasiado corto
//		email vacio
//		email formato incorrecto

function USUARIOS_comprobar_email_test()
{
	global $ERRORS_array_test;
// creo array de almacen de test individual
	$USUARIO_array_test1 = array();

	//email correcto
	$USUARIO_array_test1['tipo'] = 'VALIDACION';
	$USUARIO_array_test1['entidad'] = 'USUARIO';	
	$USUARIO_array_test1['metodo'] = 'email';
	$USUARIO_array_test1['error'] = 'correcto';
	$USUARIO_array_test1['error_esperado'] = 'true';
	$USUARIO_array_test1['error_obtenido'] = '';
	$USUARIO_array_test1['resultado'] = '';

	// Relleno los datos de usuario	
	$email = 'usuario@correo.es';
	// creo el modelo
	$USUARIO = new USUARIOS_Model('','','','','','',$email,'','','');

	if ($USUARIO->comprobar_email()) $res = 'true';
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

	//email vacia
	$USUARIO_array_test1['tipo'] = 'VALIDACION';
	$USUARIO_array_test1['entidad'] = 'USUARIO';	
	$USUARIO_array_test1['metodo'] = 'email';
	$USUARIO_array_test1['error'] = 'vacio';
	$USUARIO_array_test1['error_esperado'] = '00001';
	$USUARIO_array_test1['error_obtenido'] = '';
	$USUARIO_array_test1['resultado'] = '';

	// Relleno los datos de usuario	
	$email = '';
	// creo el modelo
	$USUARIO = new USUARIOS_Model('','','','','','',$email,'','','');
	$result = $USUARIO->comprobar_email();
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

	//email demasiado largo
	$USUARIO_array_test1['tipo'] = 'VALIDACION';
	$USUARIO_array_test1['entidad'] = 'USUARIO';	
	$USUARIO_array_test1['metodo'] = 'email';
	$USUARIO_array_test1['error'] = 'demasiado largo';
	$USUARIO_array_test1['error_esperado'] = '00002';
	$USUARIO_array_test1['error_obtenido'] = '';
	$USUARIO_array_test1['resultado'] = '';

	// Relleno los datos de usuario	
	$email = 'usuariiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiios@uvigooooooooooooooooooooo.es';
	// creo el modelo
	$USUARIO = new USUARIOS_Model('','','','','','',$email,'','','');

	$result = $USUARIO->comprobar_email();
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

	//email demasiado corto
	$USUARIO_array_test1['tipo'] = 'VALIDACION';
	$USUARIO_array_test1['entidad'] = 'USUARIO';	
	$USUARIO_array_test1['metodo'] = 'email';
	$USUARIO_array_test1['error'] = 'demasiado corto';
	$USUARIO_array_test1['error_esperado'] = '00003';
	$USUARIO_array_test1['error_obtenido'] = '';
	$USUARIO_array_test1['resultado'] = '';

	// Relleno los datos de usuario	
	$email = 'u@';
	// creo el modelo
	$USUARIO = new USUARIOS_Model('','','','','','',$email,'','','');

	$result = $USUARIO->comprobar_email();
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

	//email formato incorrecto
	$USUARIO_array_test1['tipo'] = 'VALIDACION';
	$USUARIO_array_test1['entidad'] = 'USUARIO';	
	$USUARIO_array_test1['metodo'] = 'email';
	$USUARIO_array_test1['error'] = 'formato incorrecto';
	$USUARIO_array_test1['error_esperado'] = '00120';
	$USUARIO_array_test1['error_obtenido'] = '';
	$USUARIO_array_test1['resultado'] = '';

	// Relleno los datos de usuario	
	$email = 'ImailIncorrecto';
	// creo el modelo
	$USUARIO = new USUARIOS_Model('','','','','','',$email,'','','');

	$result = $USUARIO->comprobar_email();
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

// function USUARIOS_comprobar_fecha_test()
// Valida:
//		fecha correcto
//		fecha vacio
//		fecha formato incorrecto

function USUARIOS_comprobar_fecha_test()
{
	global $ERRORS_array_test;
// creo array de almacen de test individual
	$USUARIO_array_test1 = array();

	//fecha correcto
	$USUARIO_array_test1['tipo'] = 'VALIDACION';
	$USUARIO_array_test1['entidad'] = 'USUARIO';	
	$USUARIO_array_test1['metodo'] = 'fecha';
	$USUARIO_array_test1['error'] = 'correcto';
	$USUARIO_array_test1['error_esperado'] = 'true';
	$USUARIO_array_test1['error_obtenido'] = '';
	$USUARIO_array_test1['resultado'] = '';

	// Relleno los datos de usuario	
	$fecha = '2001-15-20';
	// creo el modelo
	$USUARIO = new USUARIOS_Model('','','','','','','',$fecha,'','');

	if ($USUARIO->comprobar_fecha()) $res = 'true';
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

	//fecha vacia
	$USUARIO_array_test1['tipo'] = 'VALIDACION';
	$USUARIO_array_test1['entidad'] = 'USUARIO';	
	$USUARIO_array_test1['metodo'] = 'fecha';
	$USUARIO_array_test1['error'] = 'vacio';
	$USUARIO_array_test1['error_esperado'] = '00001';
	$USUARIO_array_test1['error_obtenido'] = '';
	$USUARIO_array_test1['resultado'] = '';

	// Relleno los datos de usuario	
	$fecha = '';
	// creo el modelo
	$USUARIO = new USUARIOS_Model('','','','','','','',$fecha,'','');
	$result = $USUARIO->comprobar_fecha();
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

	//fecha formato incorrecto
	$USUARIO_array_test1['tipo'] = 'VALIDACION';
	$USUARIO_array_test1['entidad'] = 'USUARIO';	
	$USUARIO_array_test1['metodo'] = 'fecha';
	$USUARIO_array_test1['error'] = 'formato incorrecto';
	$USUARIO_array_test1['error_esperado'] = '00020';
	$USUARIO_array_test1['error_obtenido'] = '';
	$USUARIO_array_test1['resultado'] = '';

	// Relleno los datos de usuario	
	$fecha = '13.12-1992';
	// creo el modelo
	$USUARIO = new USUARIOS_Model('','','','','','','',$fecha,'','');

	$result = $USUARIO->comprobar_fecha();
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
	$USUARIO_array_test1['error'] = 'correcto';
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
	$USUARIO_array_test1['error'] = 'vacio';
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
	$USUARIO_array_test1['error'] = 'formato incorrecto';
	$USUARIO_array_test1['error_esperado'] = '00100';
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

// function USUARIOS_comprobar_ADD()
// Valida:
//		atributos OK
//		atributos name y login mal

function USUARIOS_comprobar_ADD()
{
	global $ERRORS_array_test;
// creo array de almacen de test individual
	$USUARIO_array_test1 = array();

	//sexo correcto
	$USUARIO_array_test1['tipo'] = 'VALIDACION';
	$USUARIO_array_test1['entidad'] = 'USUARIO';	
	$USUARIO_array_test1['metodo'] = 'comprobar_atributos_ADD';
	$USUARIO_array_test1['error'] = 'correcto';
	$USUARIO_array_test1['error_esperado'] = 'true';
	$USUARIO_array_test1['error_obtenido'] = '';
	$USUARIO_array_test1['resultado'] = '';

	// creo el modelo
	$USUARIOS = new USUARIOS_Model('loginerror','1234','88516567D','nom','apel','123123123',
		'e@e.es','1960-08-10','','hombre');

	$USUARIO_array_test1['error_obtenido'] = $USUARIOS->comprobar_atributos_ADD() == 1 ? 'true' : 'false';
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
	$USUARIO_array_test1['metodo'] = 'comprobar_atributos_ADD';
	$USUARIO_array_test1['error'] = 'login y nombre erroneos';
	$USUARIO_array_test1['error_esperado'] = 'login-00090-textonly-name-00030-textonly-';
	$USUARIO_array_test1['error_obtenido'] = '';
	$USUARIO_array_test1['resultado'] = '';

	// creo el modelo
	$USUARIOS = new USUARIOS_Model('login espacio','1234','88516567D','n0mbr3','apel','123123123',
		'e@e.es','1960-08-10','','hombre');
	$array = $USUARIOS->comprobar_atributos_ADD();
	//var_dump($array);
	foreach ($array as $key ) {
		foreach ($key as $key2) {
			$result .= $key2.'-';
		}
	}
	$USUARIO_array_test1['error_obtenido'] = $result;
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

// function USUARIOS_comprobar_EDIT()
// Valida:
//		atributos OK
//		atributos name y login mal

function USUARIOS_comprobar_EDIT()
{
	global $ERRORS_array_test;
// creo array de almacen de test individual
	$USUARIO_array_test1 = array();

	//sexo correcto
	$USUARIO_array_test1['tipo'] = 'VALIDACION';
	$USUARIO_array_test1['entidad'] = 'USUARIO';	
	$USUARIO_array_test1['metodo'] = 'comprobar_atributos_EDIT';
	$USUARIO_array_test1['error'] = 'correcto';
	$USUARIO_array_test1['error_esperado'] = 'true';
	$USUARIO_array_test1['error_obtenido'] = '';
	$USUARIO_array_test1['resultado'] = '';

	// creo el modelo
	$USUARIOS = new USUARIOS_Model('loginerror','1234','88516567D','nom','apel','123123123',
		'e@e.es','1960-08-10','','hombre');

	$USUARIO_array_test1['error_obtenido'] = $USUARIOS->comprobar_atributos_EDIT() == 1 ? 'true' : 'false';
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
	$USUARIO_array_test1['metodo'] = 'comprobar_atributos_EDIT';
	$USUARIO_array_test1['error'] = 'password y apellidos erroneos';
	$USUARIO_array_test1['error_esperado'] = 'password-00090-textonly-surname-00030-textonly-';
	$USUARIO_array_test1['error_obtenido'] = '';
	$USUARIO_array_test1['resultado'] = '';

	// creo el modelo
	$USUARIOS = new USUARIOS_Model('login','1234 manuel','88516567D','nombre','apel1id0s','123123123',
		'e@e.es','1960-08-10','','hombre');
	$array = $USUARIOS->comprobar_atributos_EDIT();
	//var_dump($array);
	foreach ($array as $key ) {
		foreach ($key as $key2) {
			$result .= $key2.'-';
		}
	}
	$USUARIO_array_test1['error_obtenido'] = $result;
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

// function USUARIOS_comprobar_DELETE()
// Valida:
//		atributos OK
//		atributos name y login mal

function USUARIOS_comprobar_DELETE()
{
	global $ERRORS_array_test;
// creo array de almacen de test individual
	$USUARIO_array_test1 = array();

	//sexo correcto
	$USUARIO_array_test1['tipo'] = 'VALIDACION';
	$USUARIO_array_test1['entidad'] = 'USUARIO';	
	$USUARIO_array_test1['metodo'] = 'comprobar_atributos_DELETE';
	$USUARIO_array_test1['error'] = 'correcto';
	$USUARIO_array_test1['error_esperado'] = 'true';
	$USUARIO_array_test1['error_obtenido'] = '';
	$USUARIO_array_test1['resultado'] = '';

	// creo el modelo
	$USUARIOS = new USUARIOS_Model('login','','','','','',
		'','','','');

	$USUARIO_array_test1['error_obtenido'] = $USUARIOS->comprobar_atributos_DELETE() == 1 ? 'true' : 'false';
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
	$USUARIO_array_test1['metodo'] = 'comprobar_atributos_DELETE';
	$USUARIO_array_test1['error'] = 'login erroneos';
	$USUARIO_array_test1['error_esperado'] = 'login-00090-textonly-';
	$USUARIO_array_test1['error_obtenido'] = '';
	$USUARIO_array_test1['resultado'] = '';

	// creo el modelo
	$USUARIOS = new USUARIOS_Model('login espacio','','','','','',
		'','','','');
	$array = $USUARIOS->comprobar_atributos_DELETE();
	//var_dump($array);
	foreach ($array as $key ) {
		foreach ($key as $key2) {
			$result .= $key2.'-';
		}
	}
	$USUARIO_array_test1['error_obtenido'] = $result;
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


// function USUARIOS_comprobar_RellenaDatos()
// Valida:
//		atributos OK
//		atributos name y login mal

function USUARIOS_comprobar_RellenaDatos()
{
	global $ERRORS_array_test;
// creo array de almacen de test individual
	$USUARIO_array_test1 = array();

	//sexo correcto
	$USUARIO_array_test1['tipo'] = 'VALIDACION';
	$USUARIO_array_test1['entidad'] = 'USUARIO';	
	$USUARIO_array_test1['metodo'] = 'comprobar_atributos_RellenaDatos';
	$USUARIO_array_test1['error'] = 'correcto';
	$USUARIO_array_test1['error_esperado'] = 'true';
	$USUARIO_array_test1['error_obtenido'] = '';
	$USUARIO_array_test1['resultado'] = '';

	// creo el modelo
	$USUARIOS = new USUARIOS_Model('login','','','','','',
		'','','','');

	$USUARIO_array_test1['error_obtenido'] = $USUARIOS->comprobar_atributos_RellenaDatos() == 1 ? 'true' : 'false';
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
	$USUARIO_array_test1['metodo'] = 'comprobar_atributos_ADD';
	$USUARIO_array_test1['error'] = 'login y nombre erroneos';
	$USUARIO_array_test1['error_esperado'] = 'login-00090-textonly-';
	$USUARIO_array_test1['error_obtenido'] = '';
	$USUARIO_array_test1['resultado'] = '';

	// creo el modelo
	$USUARIOS = new USUARIOS_Model('login espacio','','','','','',
		'','','','');
	$array = $USUARIOS->comprobar_atributos_RellenaDatos();
	//var_dump($array);
	foreach ($array as $key ) {
		foreach ($key as $key2) {
			$result .= $key2.'-';
		}
	}
	$USUARIO_array_test1['error_obtenido'] = $result;
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

	USUARIOS_comprobar_login_test();
	USUARIOS_comprobar_password_test();
	USUARIOS_comprobar_dni_test();
	USUARIOS_comprobar_nombre_test();
	USUARIOS_comprobar_apellido_test();
	USUARIOS_comprobar_tlf_test();
	USUARIOS_comprobar_email_test(); 
	USUARIOS_comprobar_fecha_test();
	USUARIOS_comprobar_sexo_test();


	USUARIOS_comprobar_ADD();
	USUARIOS_comprobar_EDIT();
	USUARIOS_comprobar_DELETE();
	USUARIOS_comprobar_RellenaDatos();

?>