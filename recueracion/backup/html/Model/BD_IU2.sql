-- jrodeiro - 7/10/2017
-- script de creación de la bd, usuario, asignación de privilegios a ese usuario sobre la bd
-- creación de tabla e insert sobre la misma.
--
-- CREAR LA BD BORRANDOLA SI YA EXISTIESE
--
DROP DATABASE IF EXISTS `IU2018`;
CREATE DATABASE `IU2018` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
--
-- SELECCIONAMOS PARA USAR
--
USE `IU2018`;
--
-- DAMOS PERMISO USO Y BORRAMOS EL USUARIO QUE QUEREMOS CREAR POR SI EXISTE
--
GRANT USAGE ON * . * TO `iu2018`@`localhost`;
	DROP USER `iu2018`@`localhost`;
--
-- CREAMOS EL USUARIO Y LE DAMOS PASSWORD,DAMOS PERMISO DE USO Y DAMOS PERMISOS SOBRE LA BASE DE DATOS.
--
CREATE USER IF NOT EXISTS `iu2018`@`localhost` IDENTIFIED BY 'pass2018';
GRANT USAGE ON *.* TO `iu2018`@`localhost` REQUIRE NONE WITH MAX_QUERIES_PER_HOUR 0 MAX_CONNECTIONS_PER_HOUR 0 MAX_UPDATES_PER_HOUR 0 MAX_USER_CONNECTIONS 0;
GRANT ALL PRIVILEGES ON `IU2018`.* TO `iu2018`@`localhost` WITH GRANT OPTION;
--
-- Estructura de tabla para la tabla `datos`
--
CREATE TABLE IF NOT EXISTS `USUARIOS` (

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

`DIRECCION` varchar(250) NOT NULL,

`CODIGO_POSTAL` varchar(5) NOT NULL,

`ACTIVADO` enum('activado','desactivado') NOT NULL,

`TIPO_USUARIO` enum('admin','usuario') NOT NULL,

PRIMARY KEY (`LOGIN`),

UNIQUE KEY `DNI` (`DNI`),

UNIQUE KEY `EMAIL` (`EMAIL`)

) ENGINE=MyISAM DEFAULT CHARSET=utf8;
--
-- Índices para tablas volcadas
--
--
-- Indices de la tabla `datos`
--

INSERT INTO USUARIOS (
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
					'Admin1',
					'Admin',
					'000000000',
					'admin@email.com',
					'0000-00-00',
					'mujer',
					'activado',
					'admin'
					);
