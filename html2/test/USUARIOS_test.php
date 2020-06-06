<?php
//Clase : USUARIOS_test
//Creado el : 20-11-2019
//Creado por: grvidal
//Fichero de test de unidad de la entidad USUARIOS
//	Saca por pantalla el resultado de los test
//-------------------------------------------------------
	include '../Model/USUARIOS_Model.php';

// function USUARIOS_Login_test()
// Valida:
//		login no existente
//		password no correcta para el login
//		login correcto

function USUARIOS_login_test()
{

	global $ERRORS_array_test;
// creo array de almacen de test individual
	$USUARIOS_array_test1 = array();

// Comprobar el login no existe
//-------------------------------------------------------------------------------
	$USUARIOS_array_test1['tipo'] = 'P_UNITARIA';
	$USUARIOS_array_test1['entidad'] = 'USUARIOS';	
	$USUARIOS_array_test1['metodo'] = 'login';
	$USUARIOS_array_test1['error'] = 'El login no existe';
	$USUARIOS_array_test1['error_esperado'] = 'El login no existe';
	$USUARIOS_array_test1['error_obtenido'] = '';
	$USUARIOS_array_test1['resultado'] = '';
	
	$login = 'loginerror';
	$USUARIOS = new USUARIOS_Model($login,'1234','88516567D','nom','apel','123123123',
		'e@e.es','1960-08-10','','hombre');
	$USUARIOS_array_test1['error_obtenido'] = $USUARIOS->login();
	if ($USUARIOS_array_test1['error_obtenido'] === $USUARIOS_array_test1['error_esperado'])
	{
		$USUARIOS_array_test1['resultado'] = 'OK';
	}
	else
	{
		$USUARIOS_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test, $USUARIOS_array_test1);

// Comprobar La password para este usuario no es correcta
//-------------------------------------------------------------------------------
	$USUARIOS_array_test1['tipo'] = 'P_UNITARIA';
	$USUARIOS_array_test1['entidad'] = 'USUARIOS';	
	$USUARIOS_array_test1['metodo'] = 'login';
	$USUARIOS_array_test1['error'] = 'La password para este usuario no es correcta';
	$USUARIOS_array_test1['error_esperado'] = 'La password para este usuario no es correcta';
	$USUARIOS_array_test1['error_obtenido'] = '';
	$USUARIOS_array_test1['resultado'] = '';
	
	// Relleno los datos de usuario	
	$login = 'miusuario';
	$password = 'mipassword';
	$dni = '13170208V';
	$nombre = 'minombre'; 
	$apellidos = 'miapellido';
	$tlf = '123123123';
	$email = 'miemail@uvigo.es';
	$bday = '1111-11-11';
	$sexo = 'hombre';
// creo el modelo
	$USUARIOS = new USUARIOS_Model($login,$password,$dni,$nombre,$apellidos,$tlf,$email,$bday,'',$sexo);

// inserto la tupla
	$USUARIOS->ADD();
// cambio la password en el objeto modelo usuario
	$USUARIOS->password = 'passwordfalsa';

	$USUARIOS_array_test1['error_obtenido'] = $USUARIOS->login();
	if ($USUARIOS_array_test1['error_obtenido'] === $USUARIOS_array_test1['error_esperado'])
	{
		$USUARIOS_array_test1['resultado'] = 'OK';
	}
	else
	{
		$USUARIOS_array_test1['resultado'] = 'FALSE';
	}
	
	array_push($ERRORS_array_test, $USUARIOS_array_test1);		
// elimino la tupla
	$USUARIOS->DELETE();

// Comprobar login exitoso
//-------------------------------------------------------------------------------
	$USUARIOS_array_test1['tipo'] = 'P_UNITARIA';
	$USUARIOS_array_test1['entidad'] = 'USUARIOS';	
	$USUARIOS_array_test1['metodo'] = 'login';
	$USUARIOS_array_test1['error'] = 'Login Correcto';
	$USUARIOS_array_test1['error_esperado'] = true;
	$USUARIOS_array_test1['error_obtenido'] = '';
	$USUARIOS_array_test1['resultado'] = '';

// Relleno los datos de usuario	
	$login = 'miusuario';
	$password = 'mipassword';
	$dni = '13170208V';
	$nombre = 'minombre'; 
	$apellidos = 'miapellido';
	$tlf = '123123123';
	$email = 'miemail@uvigo.es';
	$bday = '1111-11-11';
	$sexo = 'hombre';
// creo el modelo
	$USUARIOS = new USUARIOS_Model($login,$password,$dni,$nombre,$apellidos,$tlf,$email,$bday,'',$sexo);
// inserto la tupla
	$USUARIOS->ADD();
// pruebo el login
	$USUARIOS_array_test1['error_obtenido'] = $USUARIOS->login();
	if ($USUARIOS_array_test1['error_obtenido'] === $USUARIOS_array_test1['error_esperado'])
	{
		$USUARIOS_array_test1['resultado'] = 'OK';
	}
	else
	{
		$USUARIOS_array_test1['resultado'] = 'FALSE';
	}
	
	array_push($ERRORS_array_test, $USUARIOS_array_test1);	
// elimino la tupla
	$USUARIOS->DELETE();

}


// function USUARIOS_Register_test()
// Valida:
//		usuario ya existe
//		el usuario no existe
//		

function USUARIOS_Registrar_test()
{

	global $ERRORS_array_test;
// creo array de almacen de test individual
	$USUARIOS_array_test1 = array();

// Comprobar el login existe
//----------------------------------------------------------------------------	
	$USUARIOS_array_test1['tipo'] = 'P_UNITARIA';
	$USUARIOS_array_test1['entidad'] = 'USUARIOS';	
	$USUARIOS_array_test1['metodo'] = 'register';
	$USUARIOS_array_test1['error'] = 'El usuario ya existe';
	$USUARIOS_array_test1['error_esperado'] = 'El usuario ya existe';
	$USUARIOS_array_test1['error_obtenido'] = '';
	$USUARIOS_array_test1['resultado'] = '';
	
	// Relleno los datos de usuario	
	$login = 'miusuario';
	$password = 'mipassword';
	$dni = '13170208V';
	$nombre = 'minombre'; 
	$apellidos = 'miapellido';
	$tlf = '123123123';
	$email = 'miemail@uvigo.es';
	$bday = '1111-11-11';
	$sexo = 'hombre';
// creo el modelo
	$USUARIOS = new USUARIOS_Model($login,$password,$dni,$nombre,$apellidos,$tlf,$email,$bday,'',$sexo);
// inserto la tupla
	$USUARIOS->ADD();

	$USUARIOS_array_test1['error_obtenido'] = $USUARIOS->register();
	if ($USUARIOS_array_test1['error_obtenido'] === $USUARIOS_array_test1['error_esperado'])
	{
		$USUARIOS_array_test1['resultado'] = 'OK';
	}
	else
	{
		$USUARIOS_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test, $USUARIOS_array_test1);

	$USUARIOS->DELETE();	

// Comprobar el usuario no exist
//-------------------------------------------------------------------------	
	$USUARIOS_array_test1['tipo'] = 'P_UNITARIA';
	$USUARIOS_array_test1['entidad'] = 'USUARIOS';	
	$USUARIOS_array_test1['metodo'] = 'register';
	$USUARIOS_array_test1['error'] = 'El usuario no existe';
	$USUARIOS_array_test1['error_esperado'] = true;
	$USUARIOS_array_test1['error_obtenido'] = '';
	$USUARIOS_array_test1['resultado'] = '';

	$login = 'miusuario';
	$password = 'mipassword';
	$dni = '13170208V';
	$nombre = 'minombre'; 
	$apellidos = 'miapellido';
	$tlf = '123123123';
	$email = 'miemail@uvigo.es';
	$bday = '1111-11-11';
	$sexo = 'hombre';
// creo el modelo
	$USUARIOS = new USUARIOS_Model($login,$password,$dni,$nombre,$apellidos,$tlf,$email,$bday,'',$sexo);
	$USUARIOS_array_test1['error_obtenido'] = $USUARIOS->register();
	if ($USUARIOS_array_test1['error_obtenido'] === $USUARIOS_array_test1['error_esperado'])
	{
		$USUARIOS_array_test1['resultado'] = 'OK';
	}
	else
	{
		$USUARIOS_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test, $USUARIOS_array_test1);

// Comprobar error en la inserción
//-----------------------------------------------------------------------------------	
	$USUARIOS_array_test1['tipo'] = 'P_UNITARIA';
	$USUARIOS_array_test1['entidad'] = 'USUARIOS';	
	$USUARIOS_array_test1['metodo'] = 'registrar';
	$USUARIOS_array_test1['error'] = 'Error en la inserción';
	$USUARIOS_array_test1['error_esperado'] = 'Error de gestor de base de datos';
	$USUARIOS_array_test1['error_obtenido'] = '';
	$USUARIOS_array_test1['resultado'] = '';
	
	$login = 'jrodeiro887';
	$password = 'javi';
	$nombre = 'javi\' , \' kdfalkj'; 
	$apellidos = 'rodeiro';
	$email = 'jrodeiro@uvigo.es';

	$USUARIOS = new USUARIOS_Model($login,$password,$nombre,$apellidos,$email,'','','','','');
	$USUARIOS_array_test1['error_obtenido'] = $USUARIOS->registrar();
	if ($USUARIOS_array_test1['error_obtenido'] === $USUARIOS_array_test1['error_esperado'])
	{
		$USUARIOS_array_test1['resultado'] = 'OK';
	}
	else
	{
		$USUARIOS_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test, $USUARIOS_array_test1);	

	$USUARIOS->DELETE();

// Comprobar Inserción realizada con éxito
//------------------------------------------------------------------------------------------
	$USUARIOS_array_test1['tipo'] = 'P_UNITARIA';
	$USUARIOS_array_test1['entidad'] = 'USUARIOS';	
	$USUARIOS_array_test1['metodo'] = 'registrar';
	$USUARIOS_array_test1['error'] = 'Inserción realizada con éxito';
	$USUARIOS_array_test1['error_esperado'] = 'Inserción realizada con éxito';
	$USUARIOS_array_test1['error_obtenido'] = '';
	$USUARIOS_array_test1['resultado'] = '';
	
	$login = 'jrodeiro1';
	$password = 'javi';
	$nombre = 'javi'; 
	$apellidos = 'rodeiro';
	$email = 'jrodeiro1@uvigo.es';

	$USUARIOS = new USUARIOS_Model($login,$password,$nombre,$apellidos,$email,'','','','','');
	$USUARIOS_array_test1['error_obtenido'] = $USUARIOS->registrar();
	if ($USUARIOS_array_test1['error_obtenido'] === $USUARIOS_array_test1['error_esperado'])
	{
		$USUARIOS_array_test1['resultado'] = 'OK';
	}
	else
	{
		$USUARIOS_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test, $USUARIOS_array_test1);

	$USUARIOS->DELETE();


}

// function USUARIOS_Register_test()
// Valida:
//		usuario ya existe
//		el usuario no existe
//		

function USUARIOS_ADD_test()
{

	global $ERRORS_array_test;
// creo array de almacen de test individual
	$USUARIOS_array_test1 = array();

// Comprobar el login existe
//------------------------------------------------------------------------------------------
	$USUARIOS_array_test1['tipo'] = 'P_UNITARIA';	
	$USUARIOS_array_test1['entidad'] = 'USUARIOS';	
	$USUARIOS_array_test1['metodo'] = 'ADD';
	$USUARIOS_array_test1['error'] = 'El usuario ya existe';
	$USUARIOS_array_test1['error_esperado'] = 'Inserción fallida: el elemento ya existe';
	$USUARIOS_array_test1['error_obtenido'] = '';
	$USUARIOS_array_test1['resultado'] = '';
	
	// Relleno los datos de usuario	
	$login = 'miusuario';
	$password = 'mipassword';
	$dni = '13170208V';
	$nombre = 'minombre'; 
	$apellidos = 'miapellido';
	$tlf = '123123123';
	$email = 'miemail@uvigo.es';
	$bday = '1111-11-11';
	$sexo = 'hombre';
// creo el modelo
	$USUARIOS = new USUARIOS_Model($login,$password,$dni,$nombre,$apellidos,$tlf,$email,$bday,'',$sexo);
// inserto la tupla
	$USUARIOS->ADD();

	$USUARIOS_array_test1['error_obtenido'] = $USUARIOS->ADD();
	if ($USUARIOS_array_test1['error_obtenido'] === $USUARIOS_array_test1['error_esperado'])
	{
		$USUARIOS_array_test1['resultado'] = 'OK';
	}
	else
	{
		$USUARIOS_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test, $USUARIOS_array_test1);

	$USUARIOS->DELETE();	

// Comprobar Inserción realizada con éxito
//------------------------------------------------------------------------------------------
	$USUARIOS_array_test1['tipo'] = 'P_UNITARIA';	
	$USUARIOS_array_test1['entidad'] = 'USUARIOS';	
	$USUARIOS_array_test1['metodo'] = 'ADD';
	$USUARIOS_array_test1['error'] = 'Inserción realizada con éxito';
	$USUARIOS_array_test1['error_esperado'] = 'Inserción realizada con éxito';
	$USUARIOS_array_test1['error_obtenido'] = '';
	$USUARIOS_array_test1['resultado'] = '';
	
	// Relleno los datos de usuario	
	$login = 'miusuario';
	$password = 'mipassword';
	$dni = '13170208V';
	$nombre = 'minombre'; 
	$apellidos = 'miapellido';
	$tlf = '123123123';
	$email = 'miemail@uvigo.es';
	$bday = '1111-11-11';
	$sexo = 'hombre';
	// creo el modelo
	$USUARIOS = new USUARIOS_Model($login,$password,$dni,$nombre,$apellidos,$tlf,$email,$bday,'',$sexo);
	$USUARIOS_array_test1['error_obtenido'] = $USUARIOS->ADD();
	if ($USUARIOS_array_test1['error_obtenido'] === $USUARIOS_array_test1['error_esperado'])
	{
		$USUARIOS_array_test1['resultado'] = 'OK';
	}
	else
	{
		$USUARIOS_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test, $USUARIOS_array_test1);

	$USUARIOS->DELETE();


}

// function USUARIOS_RellenaDatos_test()
// Valida:
//		tupla
//	
function USUARIOS_RellenaDatos_test()
{

	global $ERRORS_array_test;
// creo array de almacen de test individual
	$USUARIOS_array_test1 = array();

// Comprobar devuelve recordset
//----------------------------------------------
	$USUARIOS_array_test1['tipo'] = 'P_UNITARIA';
	$USUARIOS_array_test1['entidad'] = 'USUARIOS';	
	$USUARIOS_array_test1['metodo'] = 'RellenaDatos';
	$USUARIOS_array_test1['error'] = 'Devuelve el recordset';
	$USUARIOS_array_test1['error_esperado'] = 'array';
	$USUARIOS_array_test1['error_obtenido'] = '';
	$USUARIOS_array_test1['resultado'] = '';
	
	// Relleno los datos de usuario	
	$login = 'miusuario';
	$password = 'mipassword';
	$dni = '13170208V';
	$nombre = 'minombre'; 
	$apellidos = 'miapellido';
	$tlf = '123123123';
	$email = 'miemail@uvigo.es';
	$bday = '1111-11-11';
	$sexo = 'hombre';
	// creo el modelo
	$USUARIOS = new USUARIOS_Model($login,$password,$dni,$nombre,$apellidos,$tlf,$email,$bday,'',$sexo);
	$USUARIOS_array_test1['error_obtenido'] = $USUARIOS->ADD();


	$USUARIOS_array_test1['error_obtenido'] = gettype($USUARIOS->RellenaDatos());
	if ($USUARIOS_array_test1['error_obtenido'] === $USUARIOS_array_test1['error_esperado'])
	{
		$USUARIOS_array_test1['resultado'] = 'OK';
	}
	else
	{
		$USUARIOS_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test, $USUARIOS_array_test1);

	$USUARIOS->DELETE();

}



// function USUARIOS_Edit_test()
// Valida:
//		Usuario no existe
//		Editado correctamente
function USUARIOS_Edit_test()
{

	global $ERRORS_array_test;
// creo array de almacen de test individual
	$USUARIOS_array_test1 = array();

// Comprobar el login no existe
//--------------------------------------------------
	$USUARIOS_array_test1['tipo'] = 'P_UNITARIA';
	$USUARIOS_array_test1['entidad'] = 'USUARIOS';	
	$USUARIOS_array_test1['metodo'] = 'Edit';
	$USUARIOS_array_test1['error'] = 'Usuario no existente';
	$USUARIOS_array_test1['error_esperado'] = 'Error de gestor de base de datos';
	$USUARIOS_array_test1['error_obtenido'] = '';
	$USUARIOS_array_test1['resultado'] = '';
	
	// Relleno los datos de usuario	
	$login = 'miusuario';
	$password = 'mipassword';
	$dni = '13170208V';
	$nombre = 'minombre'; 
	$apellidos = 'miapellido';
	$tlf = '123123123';
	$email = 'miemail@uvigo.es';
	$bday = '1111-11-11';
	$sexo = 'hombre';
	// creo el modelo
	$USUARIOS = new USUARIOS_Model($login,$password,$dni,$nombre,$apellidos,$tlf,$email,$bday,'',$sexo);

//Intento editar la tupla
	$USUARIOS_array_test1['error_obtenido'] = $USUARIOS->EDIT();
	if ($USUARIOS_array_test1['error_obtenido'] === $USUARIOS_array_test1['error_esperado'])
	{
		$USUARIOS_array_test1['resultado'] = 'OK';
	}
	else
	{
		$USUARIOS_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test, $USUARIOS_array_test1);

// El usuario no existe en la base de datos
//----------------------------------------------
	$USUARIOS_array_test1['tipo'] = 'P_UNITARIA';
	$USUARIOS_array_test1['entidad'] = 'USUARIOS';	
	$USUARIOS_array_test1['metodo'] = 'Edit';
	$USUARIOS_array_test1['error'] = 'La tupla se ha actualizado';
	$USUARIOS_array_test1['error_esperado'] = 'Actualización realizada con éxito';
	$USUARIOS_array_test1['error_obtenido'] = '';
	$USUARIOS_array_test1['resultado'] = '';
	
	// Relleno los datos de usuario	
	$login = 'miusuario';
	$password = 'mipassword';
	$dni = '13170208V';
	$nombre = 'minombre'; 
	$apellidos = 'miapellido';
	$tlf = '123123123';
	$email = 'miemail@uvigo.es';
	$bday = '1111-11-11';
	$sexo = 'hombre';
	// creo el modelo
	$USUARIOS = new USUARIOS_Model($login,$password,$dni,$nombre,$apellidos,$tlf,$email,$bday,'',$sexo);
	
	//Lo añado a la base de datos
	$USUARIOS->ADD();
	$USUARIOS_array_test1['error_obtenido'] = $USUARIOS->EDIT();
	if ($USUARIOS_array_test1['error_obtenido'] === $USUARIOS_array_test1['error_esperado'])
	{
		$USUARIOS_array_test1['resultado'] = 'OK';
	}
	else
	{
		$USUARIOS_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test, $USUARIOS_array_test1);

	$USUARIOS->DELETE();

}


// function USUARIOS_Search_test()
// Valida:
//		Error de gestor de base de datos
//		Recordset con la busqueda
function USUARIOS_Search_test()
{

	global $ERRORS_array_test;
// creo array de almacen de test individual
	$USUARIOS_array_test1 = array();

// Comprobar el login no existe
//--------------------------------------------------
	$USUARIOS_array_test1['tipo'] = 'P_UNITARIA';
	$USUARIOS_array_test1['entidad'] = 'USUARIO';	
	$USUARIOS_array_test1['metodo'] = 'Search';
	$USUARIOS_array_test1['error'] = 'Error de gestor de base de datos';
	$USUARIOS_array_test1['error_esperado'] = 'Error de gestor de base de datos';
	$USUARIOS_array_test1['error_obtenido'] = '';
	$USUARIOS_array_test1['resultado'] = '';
	
	// Relleno los datos de usuario	
	$login = 'grvidal25\' , \'asd';
	
// creo el modelo sin añadirlo a la base de datos
	$USUARIOS = new USUARIOS_Model($login,'1234','88516567D','nom','apel','123123123',
		'e@e.es','1960-08-10','','hombre');

	$USUARIOS_array_test1['error_obtenido'] = $USUARIOS->SEARCH();
	if ($USUARIOS_array_test1['error_obtenido'] === $USUARIOS_array_test1['error_esperado'])
	{
		$USUARIOS_array_test1['resultado'] = 'OK';
	}
	else
	{
		$USUARIOS_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test, $USUARIOS_array_test1);

// Recordset con la busqueda
//----------------------------------------------
	$USUARIOS_array_test1['tipo'] = 'P_UNITARIA';
	$USUARIOS_array_test1['entidad'] = 'USUARIO';	
	$USUARIOS_array_test1['metodo'] = 'Search';
	$USUARIOS_array_test1['error'] = 'Devuelve el recordset';
	$USUARIOS_array_test1['error_esperado'] = 'array';
	$USUARIOS_array_test1['error_obtenido'] = '';
	$USUARIOS_array_test1['resultado'] = '';
	
	// Relleno los datos de usuario	
	$login = 'miusuario';
	$password = 'mipassword';
	$dni = '13170208V';
	$nombre = 'minombre'; 
	$apellidos = 'miapellido';
	$tlf = '123123123';
	$email = 'miemail@uvigo.es';
	$bday = '1111-11-11';
	$sexo = 'hombre';
	// creo el modelo
	$USUARIOS = new USUARIOS_Model($login,$password,$dni,$nombre,$apellidos,$tlf,$email,$bday,'',$sexo);
	//Lo añado a la base de datos
	$USUARIOS->ADD();

	$USUARIOS_array_test1['error_obtenido'] = gettype($USUARIOS->SEARCH()->fetch_array());
	if ($USUARIOS_array_test1['error_obtenido'] === $USUARIOS_array_test1['error_esperado'])
	{
		$USUARIOS_array_test1['resultado'] = 'OK';
	}
	else
	{
		$USUARIOS_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test, $USUARIOS_array_test1);

	$USUARIOS->DELETE();

}


	USUARIOS_login_test();
	USUARIOS_Registrar_test();
	USUARIOS_ADD_test();
	USUARIOS_RellenaDatos_test();
	USUARIOS_Edit_test();
	USUARIOS_Search_test();

?>


