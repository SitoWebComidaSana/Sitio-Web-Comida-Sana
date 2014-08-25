
-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 24-08-2014 a las 17:42:27
-- Versión del servidor: 5.1.69
-- Versión de PHP: 5.2.17

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `u882124156_food`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cabecera_pedido`
--

CREATE TABLE IF NOT EXISTS `cabecera_pedido` (
  `cped_codigo` int(11) NOT NULL,
  `usu_codigo` int(11) NOT NULL,
  `pag_codigo` int(11) NOT NULL,
  `cped_hora_inicio` datetime NOT NULL,
  `cped_hora_fin` datetime NOT NULL,
  PRIMARY KEY (`cped_codigo`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_pedido`
--

CREATE TABLE IF NOT EXISTS `detalle_pedido` (
  `dped_linea` int(11) NOT NULL,
  `cped_codigo` int(11) NOT NULL,
  `cod_plato` int(11) NOT NULL,
  `dped_cantidad` int(11) NOT NULL,
  PRIMARY KEY (`dped_linea`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `directorio_direccion`
--

CREATE TABLE IF NOT EXISTS `directorio_direccion` (
  `ddir_linea` int(11) NOT NULL,
  `usu_codigo` int(11) NOT NULL,
  `ddir_sector` varchar(50) NOT NULL,
  `ddir_calle_principal` varchar(50) NOT NULL,
  `ddir_calle_transversal` varchar(50) NOT NULL,
  `ddir_numero` int(11) NOT NULL,
  `ddir_observacion` varchar(50) NOT NULL,
  `ddir_estado` int(11) NOT NULL,
  PRIMARY KEY (`ddir_linea`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `directorio_direccion`
--

INSERT INTO `directorio_direccion` (`ddir_linea`, `usu_codigo`, `ddir_sector`, `ddir_calle_principal`, `ddir_calle_transversal`, `ddir_numero`, `ddir_observacion`, `ddir_estado`) VALUES
(1, 19, 'sur', 'portete', '17', 155, 'Casasaaaaaaaaaaaaaaaaa', 1),
(2, 11, '2222', '22999222', '2222', 2222, '2222', 1),
(0, 19, '3', '3', '3', 3, '3', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `directorio_telefonico`
--

CREATE TABLE IF NOT EXISTS `directorio_telefonico` (
  `dtel_linea` int(11) NOT NULL AUTO_INCREMENT,
  `usu_codigo` int(11) NOT NULL,
  `dtel_tipo` varchar(50) NOT NULL,
  `dtel_codigo_de_area` varchar(11) NOT NULL,
  `dtel_numero` varchar(11) NOT NULL,
  `dtel_localidad` varchar(20) NOT NULL,
  `dtel_observacion` varchar(50) NOT NULL,
  `dtel_estado` int(11) NOT NULL,
  PRIMARY KEY (`dtel_linea`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Volcado de datos para la tabla `directorio_telefonico`
--

INSERT INTO `directorio_telefonico` (`dtel_linea`, `usu_codigo`, `dtel_tipo`, `dtel_codigo_de_area`, `dtel_numero`, `dtel_localidad`, `dtel_observacion`, `dtel_estado`) VALUES
(1, 19, 'Movil', '593', '121341231', 'Personal', 'N. N.', 1),
(2, 11, 'Convencional', '07', '2147483647', 'Casa', '', 1),
(3, 19, 'Convencional', '593', '2986532', 'Casa', 'N. N.', 1),
(4, 19, 'Convencional', '593', '25844414', 'Trabajo', 'Almuerzo', 1),
(5, 11, 'Movil', '593', '54545121548', 'Personal', 'N. N.', 1),
(6, 11, 'Movil', '593', '251545451', 'Trabajo', 'N. N.', 1),
(7, 11, 'Movil', '99', '0985264623', 'Personal', 'ninguna', 1),
(8, 19, 'Hipertension', '', '', 'Enfermedad', '', 1),
(9, 19, 'Hipertension', '', '', 'Salud', '', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `enfermedad`
--

CREATE TABLE IF NOT EXISTS `enfermedad` (
  `enf_codigo` int(11) NOT NULL,
  `enf_descripcion` varchar(50) NOT NULL,
  `enf_estado` int(11) NOT NULL,
  PRIMARY KEY (`enf_codigo`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `enfermedad`
--

INSERT INTO `enfermedad` (`enf_codigo`, `enf_descripcion`, `enf_estado`) VALUES
(1, 'Hipertension', 1),
(2, 'Sobrepeso', 1),
(3, 'Diabetes', 1),
(4, 'Cancer', 1),
(5, 'Osteoporosis', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `forma_de_pago`
--

CREATE TABLE IF NOT EXISTS `forma_de_pago` (
  `pag_codigo` int(11) NOT NULL,
  `pag_descripcion` varchar(50) NOT NULL,
  `pag_estado` int(11) NOT NULL,
  PRIMARY KEY (`pag_codigo`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ingrediente`
--

CREATE TABLE IF NOT EXISTS `ingrediente` (
  `ing_codigo` int(11) NOT NULL,
  `ing_descripcion` varchar(50) NOT NULL,
  `ing_estado` int(11) NOT NULL,
  PRIMARY KEY (`ing_codigo`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `ingrediente`
--

INSERT INTO `ingrediente` (`ing_codigo`, `ing_descripcion`, `ing_estado`) VALUES
(1, 'Aguacate', 1),
(2, 'Banana', 1),
(3, 'Cebolla', 1),
(4, 'Choclo Desgranado', 1),
(5, 'Col Morada', 1),
(6, 'Frutillas', 1),
(7, 'Kiwi', 1),
(8, 'Lechuga Crespa', 1),
(9, 'Lechuga Romana', 1),
(10, 'Melon', 1),
(11, 'Pavo', 1),
(12, 'Pollo', 1),
(13, 'Queso Cheddar', 1),
(14, 'Pan Integral', 1),
(15, 'Sandia', 1),
(16, 'Tomate', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ingredientes_por_plato`
--

CREATE TABLE IF NOT EXISTS `ingredientes_por_plato` (
  `ixp_linea` int(11) NOT NULL,
  `pla_codigo` int(11) NOT NULL,
  `ing_codigo` int(11) NOT NULL,
  `ixp_cantidad` varchar(50) NOT NULL,
  PRIMARY KEY (`ixp_linea`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `ingredientes_por_plato`
--

INSERT INTO `ingredientes_por_plato` (`ixp_linea`, `pla_codigo`, `ing_codigo`, `ixp_cantidad`) VALUES
(1, 1, 12, '1 libra'),
(2, 1, 16, '2 rodajas'),
(3, 1, 3, '20 gr'),
(4, 2, 14, '2 rebanadas'),
(5, 2, 11, '2 libras'),
(6, 3, 9, '300 gr'),
(7, 3, 1, '200 gr'),
(8, 3, 3, '500 gr'),
(9, 3, 4, '600 gr'),
(10, 3, 12, '2 lib'),
(11, 4, 8, '200 gr'),
(12, 4, 5, '400 gr'),
(13, 4, 12, '3 libras'),
(14, 5, 14, '5 rebanadas'),
(15, 5, 13, '1/4 libra'),
(16, 5, 11, '5 libras'),
(17, 5, 3, '200 gr'),
(18, 6, 15, '400 gr'),
(19, 6, 10, '300 gr'),
(20, 6, 6, '1 libra'),
(21, 6, 7, '400 gr'),
(22, 6, 2, '600 gr');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `plato`
--

CREATE TABLE IF NOT EXISTS `plato` (
  `pla_codigo` int(11) NOT NULL,
  `pla_nombre` varchar(50) NOT NULL,
  `pla_descripcion` varchar(50) NOT NULL,
  `pla_estado` int(11) NOT NULL,
  PRIMARY KEY (`pla_codigo`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `plato`
--

INSERT INTO `plato` (`pla_codigo`, `pla_nombre`, `pla_descripcion`, `pla_estado`) VALUES
(1, 'Pinches de Pollo', 'Pollo marinado con pimientos y tomates asados ', 1),
(2, 'Rol de pavo al sésamo', 'Rollitos de pan rellenos de pavo con semillas de s', 1),
(3, 'Tacos veraniegos', 'Cama de lechuga rellena de aguacate, tomate, pollo', 1),
(4, 'Green Salad', 'Ensalada de lechuga romana y col morada', 1),
(5, 'Sandwich de Pavo Cesar ', 'Pan integral con queso cheddar y pavo', 1),
(6, 'Ensalada Primavera', 'Ensalada con kiwi, melón y sandia', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `recomendacion`
--

CREATE TABLE IF NOT EXISTS `recomendacion` (
  `rec_codigo` int(11) DEFAULT NULL,
  `pla_codigo` int(11) DEFAULT NULL,
  `enf_codigo` int(11) DEFAULT NULL,
  `rec_observacion` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `recomendacion`
--

INSERT INTO `recomendacion` (`rec_codigo`, `pla_codigo`, `enf_codigo`, `rec_observacion`) VALUES
(9, 4, 3, 'ninguna'),
(8, 3, 3, 'ninguna'),
(6, 1, 2, 'ninguna'),
(7, 2, 2, 'ninguna'),
(1, 1, 1, 'ninguna '),
(2, 2, 1, 'ninguna'),
(3, 3, 1, 'ninguna'),
(4, 4, 1, 'ninguna'),
(5, 5, 1, 'ninguna'),
(10, 5, 3, 'ninguna'),
(11, 6, 4, 'ninguna'),
(12, 5, 4, 'ninguna'),
(13, 4, 4, 'ninguna'),
(14, 1, 5, 'ninguna'),
(15, 2, 5, 'ninguna'),
(16, 3, 5, 'ninguna'),
(17, 4, 5, 'ninguna');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `usu_codigo` int(11) NOT NULL AUTO_INCREMENT,
  `usu_nombre` varchar(50) NOT NULL,
  `usu_apellido` varchar(50) NOT NULL,
  `usu_fecha_nacimiento` date NOT NULL DEFAULT '0000-00-00',
  `usu_correo` varchar(50) NOT NULL,
  `usu_clave` varchar(50) NOT NULL,
  `usu_fecha_creacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `usu_estado` int(11) NOT NULL,
  `usu_motivo_registro` varchar(30) NOT NULL,
  `usu_sexo` varchar(10) NOT NULL,
  PRIMARY KEY (`usu_codigo`),
  UNIQUE KEY `usu_correo` (`usu_correo`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=25 ;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`usu_codigo`, `usu_nombre`, `usu_apellido`, `usu_fecha_nacimiento`, `usu_correo`, `usu_clave`, `usu_fecha_creacion`, `usu_estado`, `usu_motivo_registro`, `usu_sexo`) VALUES
(11, 'Erwin', 'Garcia Liberio', '0000-00-00', 'soportetecnico@tecnosecurity.com.ec', 'YXBmbWNwbDI5MDY=', '2014-08-03 16:10:45', 1, '', ''),
(19, 'Adriana', 'Mejia', '1991-08-30', 'ramejia@espol.edu.ec', 'MTIzNDU=', '2014-08-10 19:32:11', 1, 'Salud', 'Femenino'),
(22, 'Stefy', 'D', '1991-03-31', 'geesdiaz@espol.edu.ec', 'QmIxOTExMjAxMA==', '2014-08-12 14:59:11', 1, 'Salud', 'Femenino'),
(13, 'jinna', 'salazar', '2014-08-28', 'gricelsv@hotmail.com', 'MTIz', '2014-08-07 15:06:27', 1, '', ''),
(14, 'Stefany', 'Diaz', '1991-03-31', 'stefydiazc@gmail.com', '', '2014-08-07 15:06:34', 1, '', ''),
(21, 'unouno', 'unopunop', '2000-03-20', 'uno@dos.asasxasxsx', 'YXNhcw==', '2014-08-10 20:57:12', 1, 'Salud', 'Masculino'),
(23, 'r', 'r', '2000-01-01', 'r@as.asd', 'eA==', '2014-08-24 01:16:59', 1, 'Salud', 'Masculino'),
(24, 'Erwin', 'Liberio', '1990-01-01', 'erwin_luis_garcia@hotmail.com', 'U295ZWxtZWpvcjE5OTA=', '2014-08-24 17:32:23', 1, 'Enfermedad', 'Masculino');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario_x_enfermedad`
--

CREATE TABLE IF NOT EXISTS `usuario_x_enfermedad` (
  `uxe_linea` int(11) NOT NULL,
  `usu_codigo` int(11) NOT NULL,
  `enf_codigo` int(11) NOT NULL,
  `uxe_observacion` varchar(50) NOT NULL,
  PRIMARY KEY (`uxe_linea`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='los usuario podran tener varias enfermedades';

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
