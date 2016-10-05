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

-- Volcando estructura de base de datos para facebu
CREATE DATABASE IF NOT EXISTS `facebu` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `facebu`;


-- Volcando estructura para tabla facebu.contactos
CREATE TABLE IF NOT EXISTS `contactos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idSolicitante` int(11) DEFAULT '0',
  `idAmigo` int(11) DEFAULT '0',
  `fechaSolicitud` datetime DEFAULT CURRENT_TIMESTAMP,
  `fechaAceptacion` datetime DEFAULT NULL,
  `fechaFin` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_contactos_usuarios` (`idSolicitante`),
  KEY `FK_contactos_usuarios_2` (`idAmigo`),
  CONSTRAINT `FK_contactos_usuarios` FOREIGN KEY (`idSolicitante`) REFERENCES `usuarios` (`id`),
  CONSTRAINT `FK_contactos_usuarios_2` FOREIGN KEY (`idAmigo`) REFERENCES `usuarios` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- La exportación de datos fue deseleccionada.


-- Volcando estructura para tabla facebu.grupos
CREATE TABLE IF NOT EXISTS `grupos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idAdministrador` int(11) NOT NULL DEFAULT '0',
  `nombre` varchar(50) NOT NULL DEFAULT '0',
  `descripcion` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- La exportación de datos fue deseleccionada.


-- Volcando estructura para tabla facebu.miembros
CREATE TABLE IF NOT EXISTS `miembros` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idUsuario` int(11) DEFAULT '0',
  `idGrupo` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- La exportación de datos fue deseleccionada.


-- Volcando estructura para tabla facebu.publicaciones
CREATE TABLE IF NOT EXISTS `publicaciones` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `titulo` varchar(50) NOT NULL,
  `texto` text,
  `foto` varchar(50) DEFAULT NULL,
  `idUsuario` int(11) NOT NULL,
  `fechaPublicacion` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `visibilidad` tinyint(3) unsigned NOT NULL COMMENT '0-todos, 1- Amigos, 2 - Personalizado, 3 - sólo yo',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- La exportación de datos fue deseleccionada.


-- Volcando estructura para tabla facebu.usuarios
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(50) NOT NULL DEFAULT '0',
  `Apellidos` varchar(50) NOT NULL DEFAULT '0',
  `mail` varchar(50) NOT NULL DEFAULT '0',
  `fechaRegistro` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `estado` int(11) DEFAULT '0',
  `foto` varchar(50) DEFAULT '0',
  `fechaSolicitud` datetime DEFAULT NULL,
  `pass` varchar(32) DEFAULT NULL,
  `fechaBaja` datetime DEFAULT NULL,
  `token` varchar(32) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `correo` (`mail`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- La exportación de datos fue deseleccionada.


-- Volcando estructura para tabla facebu.visibilidad
CREATE TABLE IF NOT EXISTS `visibilidad` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idPublicacion` int(11) unsigned NOT NULL DEFAULT '0',
  `idContacto` int(11) DEFAULT NULL,
  `idGrupo` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_visibilidad_publicaciones` (`idPublicacion`),
  KEY `FK_visibilidad_grupos` (`idGrupo`),
  KEY `FK_visibilidad_contactos` (`idContacto`),
  CONSTRAINT `FK_visibilidad_contactos` FOREIGN KEY (`idContacto`) REFERENCES `usuarios` (`id`),
  CONSTRAINT `FK_visibilidad_grupos` FOREIGN KEY (`idGrupo`) REFERENCES `grupos` (`id`),
  CONSTRAINT `FK_visibilidad_publicaciones` FOREIGN KEY (`idPublicacion`) REFERENCES `publicaciones` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- La exportación de datos fue deseleccionada.
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
