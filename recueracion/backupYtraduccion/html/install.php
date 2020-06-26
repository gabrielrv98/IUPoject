<?php
//Clase : install.php
//Creado el : 2-10-2019
//Creado por: grvidal
//Desconecta al usuario y le redirije a la pagina principal
//--------------------------------

function installBD($usuario,$pass){
	include_once 'Model/config.php';

	$respuesta = array();//array donde se almacenaran las respuestas de las consultas

	$sql = "DROP DATABASE IF EXISTS `TIMEEXCHANGE`;";

	$mysqli = @mysqli_connect(host, $usuario, $pass);

	if (!$mysqli) {
		return 'loginErroneoBD';
	}

	if ($mysqli->connect_errno ) {// comprueba si hubo algun error
	 	array_push($respuesta, $mysqli->connect_errno);

	}else if ($mysqli->query($sql) === TRUE) {// si la consulta fue correcta
	 	
		  array_push($respuesta, "dbeliminada");
	} else {
		  $cadena = "Error elimnando bd: " . $mysqli->error;
		   array_push($respuesta, $cadena);
	}

	//
	// creamos la base de datos
	//
	
	//Cramos la base de datos
	$sql = "CREATE DATABASE TIMEEXCHANGE DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;";
	if ($mysqli->connect_errno ) {// comprueba si hubo algun error
		array_push($respuesta,  $mysqli->connect_errno);

	}else if ($mysqli->query($sql) === TRUE) {// si la consulta fue correcta
	 	
		  array_push($respuesta, "dbcreadaBien");
	} else {
		  $cadena = "Error creando bd: " . $mysqli->error;
		   array_push($respuesta, $cadena);
	}
	

	//
	// DAMOS PERMISO USO Y BORRAMOS EL USUARIO QUE QUEREMOS CREAR POR SI EXISTE
	//
	$sql = "DROP USER `iu2018`@`localhost`; ";	
	if ($mysqli->query($sql) === TRUE) {// si la consulta fue correcta
	 	
		  array_push($respuesta, "userEliminado");
	} else {
		  $cadena = "Error elimnando usuario: " . $mysqli->error;
		   array_push($respuesta, $cadena);
	}
	//
	// CREAMOS EL USUARIO 
	//
	$sql = "CREATE USER  `iu2018`@`localhost` IDENTIFIED BY 'pass2018';";
	
	if ($mysqli->query($sql) === TRUE) {// si la consulta fue correcta
	 	
		  array_push($respuesta, "userEliminado");
	} else {
		  $cadena = "Error elimnando usuario: " . $mysqli->error;
		   array_push($respuesta, $cadena);
	}
	$mysqli->close();
	//
	// Y LE DAMOS PASSWORD,DAMOS PERMISO DE USO Y DAMOS PERMISOS SOBRE LA BASE DE DATOS.
	//
	$sql = "GRANT USAGE ON *.* TO `iu2018`@`localhost` REQUIRE NONE WITH MAX_QUERIES_PER_HOUR 0 MAX_CONNECTIONS_PER_HOUR 0 MAX_UPDATES_PER_HOUR 0 MAX_USER_CONNECTIONS 0;";
	$mysqli = new mysqli(host, $usuario, $pass, BD);
		if ($mysqli->query($sql) === TRUE) {// si la consulta fue correcta
		 	
			  array_push($respuesta, "userEspecificandoCar");
		} else {
			  $cadena = "Error especificando caracteristicas del usuario: " . $mysqli->error;
			   array_push($respuesta, $cadena);
		}
	$sql = "GRANT ALL PRIVILEGES ON `".BD."`.* TO `iu2018`@`localhost` WITH GRANT OPTION; ";
		if ($mysqli->query($sql) === TRUE) {// si la consulta fue correcta
		 	
			  array_push($respuesta, "userPermisosDados");
		} else {
			  $cadena = "Error dando permisos al usuario: " . $mysqli->error;
			   array_push($respuesta, $cadena);
		}



	$sql =" CREATE TABLE `USUARIOS` (

	`LOGIN` varchar(15) NOT NULL,

	`PASSWORD` varchar(128) NOT NULL,

	`DNI` varchar(9) NOT NULL,

	`NOMBRE` varchar(30) NOT NULL,

	`APELLIDOS` varchar(50) NOT NULL,

	`TELEFONO` varchar(11) NOT NULL,

	`EMAIL` varchar(60) NOT NULL,

	`FECHANACIMIENTO` date NOT NULL,

	`SEXO` enum('hombre','mujer') NOT NULL,

	`ALERGIAS` varchar(50),

	`DIRECCION` varchar(250),

	`CODIGO_POSTAL` varchar(5),

	`ACTIVADO` enum('activado','desactivado') NOT NULL,

	`TIPO_USUARIO` enum('admin','usuario') NOT NULL,

	PRIMARY KEY (`LOGIN`),

	UNIQUE KEY `DNI` (`DNI`),

	UNIQUE KEY `EMAIL` (`EMAIL`)

	) ENGINE=MyISAM DEFAULT CHARSET=utf8;
	";

	if ($mysqli->connect_errno ) {
	 	array_push($respuesta,  $mysqli->connect_errno);

	}else if ($mysqli->query($sql) === TRUE) {// si la consulta fue correcta
	 	
		  array_push($respuesta, "USUARIOCreado");
	} else {
		  $cadena = "Error creando USUARIOS: " . $mysqli->error;
		   array_push($respuesta, $cadena);
	}


	// ////////////////////////////////////////////////////////

	//
	// Estructura de tabla para la tabla `PRODUCTOS`
	//
	// ID autogenerado
	// titulo del producto
	// descripcion del producto
	// foto del producto
	// dni del vendedor
	// origen, el tipo de origen
	// horas_unidades, horas o undades del producto
	// estado actual del producto
	$sql = " CREATE TABLE `PRODUCTOS` (

	`ID` int NOT NULL AUTO_INCREMENT,

	`TITULO` varchar(50) NOT NULL,

	`DESCRIPCION` varchar(200) NOT NULL,

	`FOTO` varchar(50),

	`VENDEDOR_DNI` varchar(9) NOT NULL,

	`ORIGEN` enum('fabricado_a_mano','cultivado','trabajo') NOT NULL,

	`HORAS_UNIDADES` int NOT NULL,

	`ESTADO` enum('tramite','vendido') DEFAULT 'tramite' NOT NULL,

	PRIMARY KEY (`ID`)

	) ENGINE=MyISAM DEFAULT CHARSET=utf8;
	";
	if ($mysqli->query($sql) === TRUE) {// si la consulta fue correcta
	 	
		  array_push($respuesta, "PRODUCTOSCreado");
	} else {
		  $cadena = "Error creando PRODUCTOS: " . $mysqli->error;
		   array_push($respuesta, $cadena);
	}
	// ////////////////////////////////////////////////////////

	//
	// Estructura de tabla para la tabla `CATEGORIAS`
	//

	$sql = "CREATE TABLE `CATEGORIAS` (

	`ID` int NOT NULL AUTO_INCREMENT,

	`NOMBRE_CATEGORIA` varchar(50) NOT NULL,

	PRIMARY KEY (`ID`),

	UNIQUE KEY `NOMBRE_CATEGORIA` (`NOMBRE_CATEGORIA`)

	) ENGINE=MyISAM DEFAULT CHARSET=utf8;
	";
	if ($mysqli->query($sql) === TRUE) {// si la consulta fue correcta
	 	
		  array_push($respuesta, "CATEGORIASCreado");
	} else {
		  $cadena = "Error creando CATEGORIAS: " . $mysqli->error;
		   array_push($respuesta, $cadena);
	}
	// ////////////////////////////////////////////////////////

	//
	// Estructura de tabla para la tabla `CATEGORIAS`
	//

	$sql ="CREATE TABLE  `PRODUCTOS_CATEGORIAS` (

	`ID_PRODUCTO` int NOT NULL,

	`ID_CATEGORIA` int NOT NULL

	) ENGINE=MyISAM DEFAULT CHARSET=utf8;
	";
	if ($mysqli->query($sql) === TRUE) {// si la consulta fue correcta
	 	
		  array_push($respuesta, "PRODUCTOS_CATEGORIASCreado");
	} else {
		  $cadena = "Error creando PRODUCTOS_CATEGORIAS: " . $mysqli->error;
		   array_push($respuesta, $cadena);
	}
	// ////////////////////////////////////////////////////////

	//
	// Estructura de tabla para la tabla `INTERCAMBIO`
	//
	// ID autogenerado
	// ID_PRODUCTO1 id del producto1
	// ID_PRODUCTO2 id del producto2
	// ACCEPT1 estado de aceptacion del user 1
	// ACCEPT2 estado de aceptacion del user 2
	// UNIDADES1 unidades del producto 1
	// UNIDADES2 unidades del producto 2
	$sql = "CREATE TABLE  `INTERCAMBIO` (

	`ID` int NOT NULL AUTO_INCREMENT,

	`ID_PRODUCTO1` int NOT NULL,

	`ID_PRODUCTO2` int NOT NULL,

	`UNIDADES1` int NOT NULL,

	`UNIDADES2` int NOT NULL,

	`ACCEPT1` enum('aceptado','denegado') DEFAULT 'denegado' NOT NULL,

	`ACCEPT2` enum('aceptado','denegado') DEFAULT 'denegado' NOT NULL,

	PRIMARY KEY (`ID`)

	) ENGINE=MyISAM DEFAULT CHARSET=utf8;
	";
	if ($mysqli->query($sql) === TRUE) {// si la consulta fue correcta
	 	
		  array_push($respuesta, "INTERCAMBIOCreado");
	} else {
		  $cadena = "Error creando INTERCAMBIO: " . $mysqli->error;
		   array_push($respuesta, $cadena);
	}
	// ////////////////////////////////////////////////////////

	//
	// Estructura de tabla para la tabla `VALORACIONES`
	//
	// ID autogenerado
	// ID_PRODUCTO id del producto
	// ID_INTERCAMBIO ID del intercambio
	// PUNTUACION puntuacion del producto
	// COMENTARIO comentarios acerca del producto
	$sql = "CREATE TABLE  `VALORACIONES` (

	`ID` int NOT NULL AUTO_INCREMENT,

	`ID_PRODUCTO` int NOT NULL,

	`ID_INTERCAMBIO` int NOT NULL,

	`PUNTUACION` int NOT NULL,

	`COMENTARIO` varchar(100) NOT NULL,

	PRIMARY KEY (`ID`)

	) ENGINE=MyISAM DEFAULT CHARSET=utf8;
	";
	if ($mysqli->query($sql) === TRUE) {// si la consulta fue correcta
	 	
		  array_push($respuesta, "VALORACIONESCreado");
	} else {
		  $cadena = "Error creando valoraciones: " . $mysqli->error;
		   array_push($respuesta, $cadena);
	}
	// ////////////////////////////////////////////////////////

	//
	// Estructura de tabla para la tabla `MENSAJE`
	//
	// ID autogenerado
	// ID_MSJMANAGER ID del MENSAJE MANAGER
	// CONTENIDO del del mensaje
	// VENDEDOR_ACCEPT estado de aceptacion del vendedor
	// COMPRADOR_ACCEPT estado de aceptacion del comprador
	// COMPRADOR_DNI dni del comprador
	$sql ="CREATE TABLE  `MENSAJES` (

	`ID` int NOT NULL AUTO_INCREMENT,

	`ID_INTERCAMBIO` int NOT NULL,

	`CONTENIDO` varchar(200) NOT NULL,

	`FECHA` datetime NOT NULL,

	`LOGIN_USUARIO` varchar(15) NOT NULL,

	PRIMARY KEY (`ID`) 

	) ENGINE=MyISAM DEFAULT CHARSET=utf8;
	";
	if ($mysqli->query($sql) === TRUE) {// si la consulta fue correcta
	 	
		  array_push($respuesta, "MENSAJESCreado");
	} else {
		  $cadena = "Error creando mensajes: " . $mysqli->error;
		   array_push($respuesta, $cadena);
	}
	// ////////////////////////////////////////////////////////

	//
	// Usuario administrador con login admin y contraseña admin
	//
	$sql ="INSERT INTO USUARIOS (
				login,
				password,
				dni,
				nombre,
				apellidos,
				telefono,
				email,
				FechaNacimiento,
				sexo,
				activado,
				tipo_usuario) 
					VALUES (
						'admin',
						'admin',
						'00000001R',
						'Admin',
						'Admin',
						'000000000',
						'admin@email.com',
						'2000-01-01',
						'mujer',
						'activado',
						'admin'
						);";


	 if ($mysqli->query($sql) === TRUE) {// si la consulta fue correcta
	 	
		  array_push($respuesta, "USUARIOSINICIALESCreado");
	} else {
		  $cadena = "Error creando usuarios iniciales: " . $mysqli->error;
		   array_push($respuesta, $cadena);
	}

	$sql ="INSERT INTO USUARIOS (
				login,
				password,
				dni,
				nombre,
				apellidos,
				telefono,
				email,
				FechaNacimiento,
				sexo,
				activado,
				tipo_usuario) 
					VALUES (
						'user',
						'user',
						'00000002W',
						'UsuarioNombre',
						'UsuarioContraseña',
						'000000000',
						'user@email.com',
						'2000-01-01',
						'hombre',
						'activado',
						'usuario'
						);";


	 if ($mysqli->query($sql) === TRUE) {// si la consulta fue correcta
	 	
		  array_push($respuesta, "USUARIOSINICIALESCreado");
	} else {
		  $cadena = "Error creando usuarios iniciales: " . $mysqli->error;
		   array_push($respuesta, $cadena);
	}

	$mysqli->close();
	 	
	return $respuesta;
	 

}



?>