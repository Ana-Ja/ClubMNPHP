-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         5.6.26 - MySQL Community Server (GPL)
-- SO del servidor:              Win32
-- HeidiSQL Versión:             9.3.0.4994
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Volcando estructura de base de datos para videoclub
CREATE DATABASE IF NOT EXISTS `videoclub` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `videoclub`;


-- Volcando estructura para tabla videoclub.alquileres
CREATE TABLE IF NOT EXISTS `alquileres` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `IdSocio` int(11) NOT NULL DEFAULT '0',
  `IdCopia` int(11) NOT NULL DEFAULT '0',
  `FechaAlquiler` date NOT NULL DEFAULT '0000-00-00',
  `FechaDevolucion` date NOT NULL DEFAULT '0000-00-00',
  `FechaDevolucionReal` date NOT NULL DEFAULT '0000-00-00',
  PRIMARY KEY (`Id`),
  KEY `FK_alquileres_socios` (`IdSocio`),
  KEY `FK_alquileres_copias` (`IdCopia`),
  CONSTRAINT `FK_alquileres_copias` FOREIGN KEY (`IdCopia`) REFERENCES `copias` (`Id`),
  CONSTRAINT `FK_alquileres_socios` FOREIGN KEY (`IdSocio`) REFERENCES `socios` (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- La exportación de datos fue deseleccionada.


-- Volcando estructura para tabla videoclub.copias
CREATE TABLE IF NOT EXISTS `copias` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `IdPelicula` int(11) NOT NULL DEFAULT '0',
  `Ref` varchar(10) NOT NULL DEFAULT '0',
  `Estado` varchar(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (`Id`),
  KEY `FK_copias_peliculas` (`IdPelicula`),
  CONSTRAINT `FK_copias_peliculas` FOREIGN KEY (`IdPelicula`) REFERENCES `peliculas` (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- La exportación de datos fue deseleccionada.


-- Volcando estructura para tabla videoclub.peliculas
CREATE TABLE IF NOT EXISTS `peliculas` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Titulo` varchar(50) NOT NULL DEFAULT '0',
  `Desc` varchar(50) NOT NULL DEFAULT '0',
  `Ref` varchar(10) NOT NULL DEFAULT '0',
  `Director` varchar(50) NOT NULL DEFAULT '0',
  `FechaProduccion` year(4) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- La exportación de datos fue deseleccionada.


-- Volcando estructura para tabla videoclub.socios
CREATE TABLE IF NOT EXISTS `socios` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(50) NOT NULL DEFAULT '0',
  `Apellidos` varchar(50) NOT NULL DEFAULT '0',
  `DNI` varchar(50) NOT NULL DEFAULT '0',
  `Telefono` varchar(50) NOT NULL DEFAULT '0',
  `Direccion` varchar(50) NOT NULL DEFAULT '0',
  `Fecha` date NOT NULL DEFAULT '0000-00-00',
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- La exportación de datos fue deseleccionada.
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
