-- gabrielrv - 1/06/2020
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

`DIRECCION` varchar(250),

`CODIGO_POSTAL` varchar(5),

`ACTIVADO` enum('activado','desactivado') NOT NULL,

`TIPO_USUARIO` enum('admin','usuario') NOT NULL,

PRIMARY KEY (`LOGIN`),

UNIQUE KEY `DNI` (`DNI`),

UNIQUE KEY `EMAIL` (`EMAIL`)

) ENGINE=MyISAM DEFAULT CHARSET=utf8;


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `CATEGORIAS`
--
-- ID autogenerado
-- titulo del producto
-- descripcion del producto
-- foto del producto
-- dni del vendedor
-- origen, el tipo de origen
-- horas_unidades, horas o undades del producto
-- estado actual del producto
CREATE TABLE IF NOT EXISTS `PRODUCTOS` (

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
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `CATEGORIAS`
--

CREATE TABLE IF NOT EXISTS `CATEGORIAS` (

`ID` int NOT NULL AUTO_INCREMENT,

`NOMBRE_CATEGORIA` varchar(50) NOT NULL,

PRIMARY KEY (`ID`),

UNIQUE KEY `NOMBRE_CATEGORIA` (`NOMBRE_CATEGORIA`)

) ENGINE=MyISAM DEFAULT CHARSET=utf8;
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `CATEGORIAS`
--

CREATE TABLE IF NOT EXISTS `PRODUCTOS_CATEGORIAS` (

`ID_PRODUCTO` int NOT NULL,

`ID_CATEGORIA` int NOT NULL

) ENGINE=MyISAM DEFAULT CHARSET=utf8;
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `INTERCAMBIO`
--
-- ID autogenerado
-- ID_PRODUCTO1 id del producto1
-- ID_PRODUCTO2 id del producto2
-- ACCEPT1 estado de aceptacion del user 1
-- ACCEPT2 estado de aceptacion del user 2
-- UNIDADES1 unidades del producto 1
-- UNIDADES2 unidades del producto 2
CREATE TABLE IF NOT EXISTS `INTERCAMBIO` (

`ID` int NOT NULL AUTO_INCREMENT,

`ID_PRODUCTO1` int NOT NULL,

`ID_PRODUCTO2` int NOT NULL,

`UNIDADES1` int NOT NULL,

`UNIDADES2` int NOT NULL,

`ACCEPT1` enum('aceptado','denegado') DEFAULT 'denegado' NOT NULL,

`ACCEPT2` enum('aceptado','denegado') DEFAULT 'denegado' NOT NULL,

PRIMARY KEY (`ID`)

) ENGINE=MyISAM DEFAULT CHARSET=utf8;
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `VALORACIONES`
--
-- ID autogenerado
-- ID_PRODUCTO id del producto
-- ID_INTERCAMBIO ID del intercambio
-- PUNTUACION puntuacion del producto
-- COMENTARIO comentarios acerca del producto
CREATE TABLE IF NOT EXISTS `VALORACIONES` (

`ID` int NOT NULL AUTO_INCREMENT,

`ID_PRODUCTO` int NOT NULL,

`ID_INTERCAMBIO` int NOT NULL,

`PUNTUACION` int NOT NULL,

`COMENTARIO` varchar(100) NOT NULL,

PRIMARY KEY (`ID`)

) ENGINE=MyISAM DEFAULT CHARSET=utf8;
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `MENSAJE`
--
-- ID autogenerado
-- ID_MSJMANAGER ID del MENSAJE MANAGER
-- CONTENIDO del del mensaje
-- VENDEDOR_ACCEPT estado de aceptacion del vendedor
-- COMPRADOR_ACCEPT estado de aceptacion del comprador
-- COMPRADOR_DNI dni del comprador
CREATE TABLE IF NOT EXISTS `MENSAJES` (

`ID` int NOT NULL AUTO_INCREMENT,

`ID_INTERCAMBIO` int NOT NULL,

`CONTENIDO` varchar(200) NOT NULL,

`FECHA` datetime NOT NULL,

`LOGIN_USUARIO` varchar(15) NOT NULL,

PRIMARY KEY (`ID`) 

) ENGINE=MyISAM DEFAULT CHARSET=utf8;
-- --------------------------------------------------------

--
-- Usuario administrador con login admin y contraseña admin
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
					'Admin',
					'Admin',
					'000000000',
					'admin@email.com',
					'0000-00-00',
					'mujer',
					'activado',
					'admin'
					);
