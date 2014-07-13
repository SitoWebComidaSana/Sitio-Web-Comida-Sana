-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         6.0.4-alpha-community-log - MySQL Community Server (GPL)
-- SO del servidor:              Win32
-- HeidiSQL Versión:             8.3.0.4694
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Volcando estructura de base de datos para comida
DROP DATABASE IF EXISTS `comida`;
CREATE DATABASE IF NOT EXISTS `comida` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `comida`;


-- Volcando estructura para tabla comida.cabecera_pedido
DROP TABLE IF EXISTS `cabecera_pedido`;
CREATE TABLE IF NOT EXISTS `cabecera_pedido` (
  `cped_codigo` int(11) NOT NULL,
  `usu_codigo` int(11) NOT NULL,
  `pag_codigo` int(11) NOT NULL,
  `cped_hora_inicio` datetime NOT NULL,
  `cped_hora_fin` datetime NOT NULL,
  PRIMARY KEY (`cped_codigo`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- La exportación de datos fue deseleccionada.


-- Volcando estructura para tabla comida.detalle_pedido
DROP TABLE IF EXISTS `detalle_pedido`;
CREATE TABLE IF NOT EXISTS `detalle_pedido` (
  `dped_linea` int(11) NOT NULL,
  `cped_codigo` int(11) NOT NULL,
  `cod_plato` int(11) NOT NULL,
  `dped_cantidad` int(11) NOT NULL,
  PRIMARY KEY (`dped_linea`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- La exportación de datos fue deseleccionada.


-- Volcando estructura para tabla comida.directorio_direccion
DROP TABLE IF EXISTS `directorio_direccion`;
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

-- La exportación de datos fue deseleccionada.


-- Volcando estructura para tabla comida.directorio_telefonico
DROP TABLE IF EXISTS `directorio_telefonico`;
CREATE TABLE IF NOT EXISTS `directorio_telefonico` (
  `dtel_linea` int(11) NOT NULL,
  `usu_codigo` int(11) NOT NULL,
  `dtel_tipo` varchar(50) NOT NULL,
  `dtel_codigo_de_area` int(11) NOT NULL,
  `dtel_numero` int(11) NOT NULL,
  `dtel_estado` int(11) NOT NULL,
  PRIMARY KEY (`dtel_linea`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- La exportación de datos fue deseleccionada.


-- Volcando estructura para tabla comida.enfermedad
DROP TABLE IF EXISTS `enfermedad`;
CREATE TABLE IF NOT EXISTS `enfermedad` (
  `enf_codigo` int(11) NOT NULL,
  `enf_descripcion` varchar(50) NOT NULL,
  `enf_estado` int(11) NOT NULL,
  PRIMARY KEY (`enf_codigo`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- La exportación de datos fue deseleccionada.


-- Volcando estructura para tabla comida.forma_de_pago
DROP TABLE IF EXISTS `forma_de_pago`;
CREATE TABLE IF NOT EXISTS `forma_de_pago` (
  `pag_codigo` int(11) NOT NULL,
  `pag_descripcion` varchar(50) NOT NULL,
  `pag_estado` int(11) NOT NULL,
  PRIMARY KEY (`pag_codigo`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- La exportación de datos fue deseleccionada.


-- Volcando estructura para tabla comida.ingrediente
DROP TABLE IF EXISTS `ingrediente`;
CREATE TABLE IF NOT EXISTS `ingrediente` (
  `ing_codigo` int(11) NOT NULL,
  `ing_descripcion` varchar(50) NOT NULL,
  `ing_estado` int(11) NOT NULL,
  PRIMARY KEY (`ing_codigo`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- La exportación de datos fue deseleccionada.


-- Volcando estructura para tabla comida.ingredientes_por_plato
DROP TABLE IF EXISTS `ingredientes_por_plato`;
CREATE TABLE IF NOT EXISTS `ingredientes_por_plato` (
  `ixp_linea` int(11) NOT NULL,
  `pla_codigo` int(11) NOT NULL,
  `ing_codigo` int(11) NOT NULL,
  `ixp_cantidad` int(11) NOT NULL,
  PRIMARY KEY (`ixp_linea`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- La exportación de datos fue deseleccionada.


-- Volcando estructura para tabla comida.plato
DROP TABLE IF EXISTS `plato`;
CREATE TABLE IF NOT EXISTS `plato` (
  `pla_codigo` int(11) NOT NULL,
  `pla_nombre` varchar(50) NOT NULL,
  `pla_descripcion` varchar(50) NOT NULL,
  `pla_estado` int(11) NOT NULL,
  PRIMARY KEY (`pla_codigo`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- La exportación de datos fue deseleccionada.


-- Volcando estructura para tabla comida.recomendacion
DROP TABLE IF EXISTS `recomendacion`;
CREATE TABLE IF NOT EXISTS `recomendacion` (
  `rec_codigo` int(11) DEFAULT NULL,
  `pla_codigo` int(11) DEFAULT NULL,
  `enf_codigo` int(11) DEFAULT NULL,
  `rec_observacion` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- La exportación de datos fue deseleccionada.


-- Volcando estructura para tabla comida.usuario
DROP TABLE IF EXISTS `usuario`;
CREATE TABLE IF NOT EXISTS `usuario` (
  `usu_codigo` int(11) NOT NULL,
  `usu_nombre` varchar(50) NOT NULL,
  `usu_apellido` varchar(50) NOT NULL,
  `usu_fecha_nacimiento` varchar(50) NOT NULL,
  `usu_correo` varchar(50) NOT NULL,
  `usu_clave` varchar(50) NOT NULL,
  `usu_estado` int(11) NOT NULL,
  PRIMARY KEY (`usu_codigo`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- La exportación de datos fue deseleccionada.


-- Volcando estructura para tabla comida.usuario_x_enfermedad
DROP TABLE IF EXISTS `usuario_x_enfermedad`;
CREATE TABLE IF NOT EXISTS `usuario_x_enfermedad` (
  `uxe_linea` int(11) NOT NULL,
  `usu_codigo` int(11) NOT NULL,
  `enf_codigo` int(11) NOT NULL,
  `uxe_observacion` varchar(50) NOT NULL,
  PRIMARY KEY (`uxe_linea`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='los usuario podran tener varias enfermedades';

-- La exportación de datos fue deseleccionada.
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
