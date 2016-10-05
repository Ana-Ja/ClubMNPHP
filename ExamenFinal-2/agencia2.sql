-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         5.6.26 - MySQL Community Server (GPL)
-- SO del servidor:              Win32
-- HeidiSQL Versión:             9.3.0.4984
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Volcando estructura de base de datos para agencia
CREATE DATABASE IF NOT EXISTS `agencia` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `agencia`;


-- Volcando estructura para tabla agencia.clientehotelpaquete
CREATE TABLE IF NOT EXISTS `clientehotelpaquete` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idCliente` int(11) NOT NULL DEFAULT '0',
  `idHotel` int(11) NOT NULL DEFAULT '0',
  `idPaquete` int(11) NOT NULL DEFAULT '0',
  `fInicio` date NOT NULL DEFAULT '0000-00-00',
  `fFin` date NOT NULL DEFAULT '0000-00-00',
  `npersonas` int(11) NOT NULL DEFAULT '0',
  `precioTotal` double NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `FK_clientehotelpaquete_clientes` (`idCliente`),
  KEY `FK_clientehotelpaquete_hotel` (`idHotel`),
  KEY `FK_clientehotelpaquete_paquetes` (`idPaquete`),
  CONSTRAINT `FK_clientehotelpaquete_clientes` FOREIGN KEY (`idCliente`) REFERENCES `clientes` (`id`),
  CONSTRAINT `FK_clientehotelpaquete_hotel` FOREIGN KEY (`idHotel`) REFERENCES `hotel` (`id`),
  CONSTRAINT `FK_clientehotelpaquete_paquetes` FOREIGN KEY (`idPaquete`) REFERENCES `paquetes` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla agencia.clientehotelpaquete: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `clientehotelpaquete` DISABLE KEYS */;
/*!40000 ALTER TABLE `clientehotelpaquete` ENABLE KEYS */;


-- Volcando estructura para tabla agencia.clientes
CREATE TABLE IF NOT EXISTS `clientes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL DEFAULT '0',
  `direccion` varchar(50) NOT NULL DEFAULT '0',
  `dni` varchar(50) NOT NULL DEFAULT '0',
  `telefono` varchar(50) NOT NULL DEFAULT '0',
  `correo` varchar(50) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla agencia.clientes: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `clientes` DISABLE KEYS */;
/*!40000 ALTER TABLE `clientes` ENABLE KEYS */;


-- Volcando estructura para tabla agencia.hotel
CREATE TABLE IF NOT EXISTS `hotel` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) DEFAULT NULL,
  `estrellas` tinyint(4) DEFAULT NULL,
  `direccion` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla agencia.hotel: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `hotel` DISABLE KEYS */;
INSERT INTO `hotel` (`id`, `nombre`, `estrellas`, `direccion`) VALUES
	(1, 'nh pamplona', 2, NULL),
	(2, 'AC TUDELA', 4, NULL);
/*!40000 ALTER TABLE `hotel` ENABLE KEYS */;


-- Volcando estructura para tabla agencia.hotelpaquetes
CREATE TABLE IF NOT EXISTS `hotelpaquetes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idHotel` int(11) NOT NULL DEFAULT '0',
  `idPaquete` int(11) NOT NULL DEFAULT '0',
  `ndias` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `FK_hotelpaquetes_hotel` (`idHotel`),
  KEY `FK_hotelpaquetes_paquetes` (`idPaquete`),
  CONSTRAINT `FK_hotelpaquetes_hotel` FOREIGN KEY (`idHotel`) REFERENCES `hotel` (`id`),
  CONSTRAINT `FK_hotelpaquetes_paquetes` FOREIGN KEY (`idPaquete`) REFERENCES `paquetes` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla agencia.hotelpaquetes: ~4 rows (aproximadamente)
/*!40000 ALTER TABLE `hotelpaquetes` DISABLE KEYS */;
INSERT INTO `hotelpaquetes` (`id`, `idHotel`, `idPaquete`, `ndias`) VALUES
	(1, 1, 1, 7),
	(2, 1, 2, 5),
	(3, 2, 3, 7),
	(4, 2, 4, 4);
/*!40000 ALTER TABLE `hotelpaquetes` ENABLE KEYS */;


-- Volcando estructura para tabla agencia.hotelpaquetesservicios
CREATE TABLE IF NOT EXISTS `hotelpaquetesservicios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idHotel` int(11) DEFAULT '0',
  `idPaquete` int(11) DEFAULT '0',
  `idServicios` int(11) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `FK_hotelpaquetesservicios_hotel` (`idHotel`),
  KEY `FK_hotelpaquetesservicios_paquetes` (`idPaquete`),
  KEY `FK_hotelpaquetesservicios_servicios` (`idServicios`),
  CONSTRAINT `FK_hotelpaquetesservicios_hotel` FOREIGN KEY (`idHotel`) REFERENCES `hotel` (`id`),
  CONSTRAINT `FK_hotelpaquetesservicios_paquetes` FOREIGN KEY (`idPaquete`) REFERENCES `paquetes` (`id`),
  CONSTRAINT `FK_hotelpaquetesservicios_servicios` FOREIGN KEY (`idServicios`) REFERENCES `servicios` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla agencia.hotelpaquetesservicios: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `hotelpaquetesservicios` DISABLE KEYS */;
/*!40000 ALTER TABLE `hotelpaquetesservicios` ENABLE KEYS */;


-- Volcando estructura para tabla agencia.hotelservicios
CREATE TABLE IF NOT EXISTS `hotelservicios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idHotel` int(11) DEFAULT '0',
  `idServicios` int(11) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `FK_hotelservicios_hotel` (`idHotel`),
  KEY `FK_hotelservicios_servicios` (`idServicios`),
  CONSTRAINT `FK_hotelservicios_hotel` FOREIGN KEY (`idHotel`) REFERENCES `hotel` (`id`),
  CONSTRAINT `FK_hotelservicios_servicios` FOREIGN KEY (`idServicios`) REFERENCES `servicios` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla agencia.hotelservicios: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `hotelservicios` DISABLE KEYS */;
/*!40000 ALTER TABLE `hotelservicios` ENABLE KEYS */;


-- Volcando estructura para tabla agencia.paquetes
CREATE TABLE IF NOT EXISTS `paquetes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla agencia.paquetes: ~4 rows (aproximadamente)
/*!40000 ALTER TABLE `paquetes` DISABLE KEYS */;
INSERT INTO `paquetes` (`id`, `nombre`) VALUES
	(1, 'solo desayuno'),
	(2, 'solo comida'),
	(3, 'solo cena'),
	(4, 'todo incluido');
/*!40000 ALTER TABLE `paquetes` ENABLE KEYS */;


-- Volcando estructura para tabla agencia.servicios
CREATE TABLE IF NOT EXISTS `servicios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla agencia.servicios: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `servicios` DISABLE KEYS */;
/*!40000 ALTER TABLE `servicios` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
