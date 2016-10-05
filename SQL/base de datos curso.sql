-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         5.6.16 - MySQL Community Server (GPL)
-- SO del servidor:              Win32
-- HeidiSQL Versión:             8.1.0.4623
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Volcando estructura de base de datos para webconcesionario
DROP DATABASE IF EXISTS `webconcesionario`;
CREATE DATABASE IF NOT EXISTS `webconcesionario` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `webconcesionario`;


-- Volcando estructura para tabla webconcesionario.clientes
DROP TABLE IF EXISTS `clientes`;
CREATE TABLE IF NOT EXISTS `clientes` (
  `codigocliente` int(11) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `fechadenacimiento` datetime DEFAULT NULL,
  `sexo` varchar(1) DEFAULT NULL,
  PRIMARY KEY (`codigocliente`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla webconcesionario.clientes: ~7 rows (aproximadamente)
DELETE FROM `clientes`;
/*!40000 ALTER TABLE `clientes` DISABLE KEYS */;
INSERT INTO `clientes` (`codigocliente`, `nombre`, `fechadenacimiento`, `sexo`) VALUES
	(1, 'Tntonio Moreno', '1980-10-05 00:00:00', 'T'),
	(2, 'Tlberto Galdeano', '1965-06-25 00:00:00', 'T'),
	(3, 'Tna Trujillo', '1970-01-08 00:00:00', 'T'),
	(4, 'Taula Reyes', '1972-10-15 00:00:00', 'T'),
	(5, 'Tarmen Delgado', '1975-10-05 00:00:00', 'T'),
	(6, 'Tedro Busani', '1965-06-10 00:00:00', 'T'),
	(7, 'Tgnacio Perez', '1972-06-15 00:00:00', 'T');
/*!40000 ALTER TABLE `clientes` ENABLE KEYS */;


-- Volcando estructura para tabla webconcesionario.revisiones
DROP TABLE IF EXISTS `revisiones`;
CREATE TABLE IF NOT EXISTS `revisiones` (
  `matricula` varchar(8) NOT NULL DEFAULT '',
  `codigorevision` varchar(2) NOT NULL DEFAULT '',
  `fecharevision` datetime DEFAULT NULL,
  `fecharecogida` datetime DEFAULT NULL,
  PRIMARY KEY (`codigorevision`,`matricula`),
  KEY `vehiculosrevisiones` (`matricula`),
  CONSTRAINT `vehiculosrevisiones_matricula_vehiculos_matricula` FOREIGN KEY (`matricula`) REFERENCES `vehiculos` (`matricula`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla webconcesionario.revisiones: ~14 rows (aproximadamente)
DELETE FROM `revisiones`;
/*!40000 ALTER TABLE `revisiones` DISABLE KEYS */;
INSERT INTO `revisiones` (`matricula`, `codigorevision`, `fecharevision`, `fecharecogida`) VALUES
	('4589-BWZ', 'AR', '2010-04-10 00:00:00', '2010-04-12 00:00:00'),
	('5696-BTK', 'AR', '2010-01-08 00:00:00', '2010-01-10 00:00:00'),
	('3025-BDF', 'CA', '2010-06-29 00:00:00', '2010-07-05 00:00:00'),
	('4589-BWZ', 'CA', '2010-04-10 00:00:00', '2010-04-12 00:00:00'),
	('5696-BTK', 'CA', '2010-05-26 00:00:00', '2010-05-30 00:00:00'),
	('2365-BUH', 'PA', '2010-02-01 00:00:00', '2010-02-02 00:00:00'),
	('2563-BJK', 'PA', '2010-08-10 00:00:00', '2010-08-14 00:00:00'),
	('3025-BDF', 'PA', '2010-06-29 00:00:00', '2010-07-05 00:00:00'),
	('4589-BWZ', 'PA', '2010-09-15 00:00:00', '2010-09-25 00:00:00'),
	('5696-BTK', 'PA', '2010-05-26 00:00:00', '2010-05-29 00:00:00'),
	('2365-BUH', 'RF', '2010-05-25 00:00:00', '2010-06-01 00:00:00'),
	('2545-BWW', 'RF', '2010-03-03 00:00:00', '2010-03-05 00:00:00'),
	('3025-BDF', 'RF', '2010-06-29 00:00:00', '2010-07-05 00:00:00'),
	('4589-BWZ', 'RF', '2010-09-15 00:00:00', '2010-09-25 00:00:00');
/*!40000 ALTER TABLE `revisiones` ENABLE KEYS */;


-- Volcando estructura para tabla webconcesionario.vehiculos
DROP TABLE IF EXISTS `vehiculos`;
CREATE TABLE IF NOT EXISTS `vehiculos` (
  `matricula` varchar(8) NOT NULL DEFAULT '',
  `fechadeventa` datetime DEFAULT NULL,
  `fechamatriculacion` datetime DEFAULT NULL,
  `preciodeventa` double DEFAULT NULL,
  `codigocliente` int(11) DEFAULT NULL,
  `tasa` double DEFAULT NULL,
  PRIMARY KEY (`matricula`),
  KEY `clientesvehiculos` (`codigocliente`),
  CONSTRAINT `clientesvehiculos_codigocliente_clientes_codigocliente` FOREIGN KEY (`codigocliente`) REFERENCES `clientes` (`codigocliente`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla webconcesionario.vehiculos: ~7 rows (aproximadamente)
DELETE FROM `vehiculos`;
/*!40000 ALTER TABLE `vehiculos` DISABLE KEYS */;
INSERT INTO `vehiculos` (`matricula`, `fechadeventa`, `fechamatriculacion`, `preciodeventa`, `codigocliente`, `tasa`) VALUES
	('2365-BUH', '2009-03-25 00:00:00', '2009-03-25 00:00:00', 23658.25, 3, 236.5825),
	('2545-BWW', '2009-06-05 00:00:00', '2009-06-15 00:00:00', 15265.58, 5, 152.6558),
	('2563-BJK', '2009-02-02 00:00:00', '2009-02-03 00:00:00', 19526.36, 1, 195.2636),
	('3025-BDF', '2009-05-01 00:00:00', '2009-05-01 00:00:00', 30256.23, 1, 302.5623),
	('3932-BVK', '2009-04-04 00:00:00', '2009-04-06 00:00:00', 29652.45, 4, 296.5245),
	('4589-BWZ', '2009-06-15 00:00:00', '2009-06-15 00:00:00', 31256.58, 6, 312.5658),
	('5696-BTK', '2009-03-15 00:00:00', '2009-03-16 00:00:00', 15895.12, 2, 158.9512);
/*!40000 ALTER TABLE `vehiculos` ENABLE KEYS */;


-- Volcando estructura de base de datos para webempresa
DROP DATABASE IF EXISTS `webempresa`;
CREATE DATABASE IF NOT EXISTS `webempresa` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `webempresa`;


-- Volcando estructura para tabla webempresa.departamentos
DROP TABLE IF EXISTS `departamentos`;
CREATE TABLE IF NOT EXISTS `departamentos` (
  `nombre_dpto` varchar(255) NOT NULL,
  `num_dpto` int(11) NOT NULL,
  `nif_jefe` varchar(9) NOT NULL,
  `fecha_inicio_jefe` datetime DEFAULT NULL,
  PRIMARY KEY (`nombre_dpto`),
  UNIQUE KEY `nif_jefe` (`nif_jefe`),
  UNIQUE KEY `num_dpto` (`num_dpto`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla webempresa.departamentos: ~4 rows (aproximadamente)
DELETE FROM `departamentos`;
/*!40000 ALTER TABLE `departamentos` DISABLE KEYS */;
INSERT INTO `departamentos` (`nombre_dpto`, `num_dpto`, `nif_jefe`, `fecha_inicio_jefe`) VALUES
	('Administracion', 2, '12345672B', '2000-01-01 00:00:00'),
	('Desarrollo', 3, '12345673C', '2000-01-01 00:00:00'),
	('Direccion', 1, '12345671A', '2000-01-01 00:00:00'),
	('Investigacion', 4, '12345674D', '2005-06-01 00:00:00');
/*!40000 ALTER TABLE `departamentos` ENABLE KEYS */;


-- Volcando estructura para tabla webempresa.empleados
DROP TABLE IF EXISTS `empleados`;
CREATE TABLE IF NOT EXISTS `empleados` (
  `nif` varchar(9) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `apellidos` longtext NOT NULL,
  `fecha_ncto` datetime DEFAULT NULL,
  `direccion` longtext,
  `sexo` varchar(255) DEFAULT NULL,
  `salario` int(11) DEFAULT NULL,
  `nif_superv` varchar(9) DEFAULT NULL,
  `num_dpto` int(11) DEFAULT NULL,
  PRIMARY KEY (`nif`),
  KEY `empleadonif_superv` (`nif_superv`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla webempresa.empleados: ~8 rows (aproximadamente)
DELETE FROM `empleados`;
/*!40000 ALTER TABLE `empleados` DISABLE KEYS */;
INSERT INTO `empleados` (`nif`, `nombre`, `apellidos`, `fecha_ncto`, `direccion`, `sexo`, `salario`, `nif_superv`, `num_dpto`) VALUES
	('12345671A', 'Javier', 'Lopez', '1960-01-01 00:00:00', 'C/Mayor 1', 'H', 26500, NULL, 1),
	('12345672B', 'Maria', 'Sanchez', '1965-02-01 00:00:00', 'C/Carlos III, 2', 'M', 25000, NULL, 2),
	('12345673C', 'Ana', 'Villaverde', '1968-03-02 00:00:00', 'C/Salsipuedes, 4', 'M', 24000, NULL, 3),
	('12345674D', 'Miguel', 'Vallejo', '1975-06-04 00:00:00', 'C/Leyre, 6', 'H', 22000, NULL, 4),
	('12345675E', 'Julian', 'Caballero', '1978-08-24 00:00:00', 'C/Estafeta, 9', 'H', 21400, NULL, 3),
	('12345676F', 'Elena', 'Gomez', '1986-06-08 00:00:00', 'C/Iturrama, 47', 'M', 19500, NULL, 4),
	('12345677G', 'Amaia', 'Goñi', '1982-07-05 00:00:00', 'C/San Jorge, 25', 'M', 18000, NULL, NULL),
	('12345678H', 'Carlos', 'Muñiz', '1979-11-16 00:00:00', 'C/Rio Elorz, 15', 'H', 15900, NULL, NULL);
/*!40000 ALTER TABLE `empleados` ENABLE KEYS */;


-- Volcando estructura para tabla webempresa.familiares
DROP TABLE IF EXISTS `familiares`;
CREATE TABLE IF NOT EXISTS `familiares` (
  `nif` varchar(9) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `sexo` varchar(255) DEFAULT NULL,
  `fecha_ncto` datetime DEFAULT NULL,
  `parentesco` varchar(255) DEFAULT NULL,
  KEY `nif` (`nif`),
  KEY `nombre` (`nombre`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla webempresa.familiares: ~11 rows (aproximadamente)
DELETE FROM `familiares`;
/*!40000 ALTER TABLE `familiares` DISABLE KEYS */;
INSERT INTO `familiares` (`nif`, `nombre`, `sexo`, `fecha_ncto`, `parentesco`) VALUES
	('12345671A', 'Amaia', 'M', '1966-12-21 00:00:00', 'Esposa'),
	('12345673C', 'Daniel', 'H', '1970-04-14 00:00:00', 'Esposo'),
	('12345674D', 'Edurne', 'M', '1978-02-18 00:00:00', 'Esposa'),
	('12345673C', 'Francisco', 'H', '2004-09-06 00:00:00', 'Hijo'),
	('12345672B', 'Juan', 'H', '1992-05-21 00:00:00', 'Hijo'),
	('12345672B', 'Juan Jose', 'H', '1962-03-08 00:00:00', 'Esposo'),
	('12345671A', 'Marta', 'M', '1990-01-01 00:00:00', 'Hija'),
	('12345674D', 'Paula', 'M', '1998-06-05 00:00:00', 'Hija'),
	('12345671A', 'Paula', 'M', '1995-08-17 00:00:00', 'Hija'),
	('12345673C', 'Ramon', 'H', '1997-04-23 00:00:00', 'Hijo'),
	('12345672B', 'Raul', 'H', '2001-11-23 00:00:00', 'Hijo');
/*!40000 ALTER TABLE `familiares` ENABLE KEYS */;


-- Volcando estructura para tabla webempresa.localizaciones
DROP TABLE IF EXISTS `localizaciones`;
CREATE TABLE IF NOT EXISTS `localizaciones` (
  `num_dpto` int(11) NOT NULL,
  `localizacion` varchar(255) NOT NULL,
  PRIMARY KEY (`num_dpto`,`localizacion`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla webempresa.localizaciones: ~4 rows (aproximadamente)
DELETE FROM `localizaciones`;
/*!40000 ALTER TABLE `localizaciones` DISABLE KEYS */;
INSERT INTO `localizaciones` (`num_dpto`, `localizacion`) VALUES
	(1, 'Pamplona'),
	(2, 'Donosti'),
	(3, 'Madrid'),
	(4, 'Barcelona');
/*!40000 ALTER TABLE `localizaciones` ENABLE KEYS */;


-- Volcando estructura para tabla webempresa.proyectos
DROP TABLE IF EXISTS `proyectos`;
CREATE TABLE IF NOT EXISTS `proyectos` (
  `nombre_proy` varchar(255) NOT NULL,
  `num_proy` int(11) NOT NULL,
  `localizacion` varchar(255) DEFAULT NULL,
  `num_dpto` int(11) NOT NULL,
  PRIMARY KEY (`num_proy`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla webempresa.proyectos: ~6 rows (aproximadamente)
DELETE FROM `proyectos`;
/*!40000 ALTER TABLE `proyectos` DISABLE KEYS */;
INSERT INTO `proyectos` (`nombre_proy`, `num_proy`, `localizacion`, `num_dpto`) VALUES
	('Dir-01', 11, 'Pamplona', 1),
	('Dir-02', 12, 'Pamplona', 1),
	('Adm-01', 21, 'Donosti', 2),
	('Adm-01', 22, 'Donosti', 2),
	('Des-01', 31, 'Madrid', 3),
	('Inv-01', 41, 'Barcelona', 4);
/*!40000 ALTER TABLE `proyectos` ENABLE KEYS */;


-- Volcando estructura para tabla webempresa.trabaja_en
DROP TABLE IF EXISTS `trabaja_en`;
CREATE TABLE IF NOT EXISTS `trabaja_en` (
  `nif` varchar(9) NOT NULL,
  `num_proy` int(11) NOT NULL DEFAULT '0',
  `horas` int(11) NOT NULL,
  PRIMARY KEY (`nif`,`num_proy`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla webempresa.trabaja_en: ~9 rows (aproximadamente)
DELETE FROM `trabaja_en`;
/*!40000 ALTER TABLE `trabaja_en` DISABLE KEYS */;
INSERT INTO `trabaja_en` (`nif`, `num_proy`, `horas`) VALUES
	('12345671A', 11, 40),
	('12345672B', 21, 40),
	('12345673C', 31, 40),
	('12345674D', 41, 40),
	('12345675E', 21, 20),
	('12345675E', 31, 20),
	('12345676F', 41, 40),
	('12345677G', 31, 40),
	('12345678H', 31, 40);
/*!40000 ALTER TABLE `trabaja_en` ENABLE KEYS */;


-- Volcando estructura de base de datos para webtransportes
DROP DATABASE IF EXISTS `webtransportes`;
CREATE DATABASE IF NOT EXISTS `webtransportes` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `webtransportes`;


-- Volcando estructura para tabla webtransportes.autobuses
DROP TABLE IF EXISTS `autobuses`;
CREATE TABLE IF NOT EXISTS `autobuses` (
  `matricula` varchar(8) NOT NULL DEFAULT '',
  `numerodeplazas` int(11) DEFAULT NULL,
  `disponible` tinyint(1) NOT NULL,
  PRIMARY KEY (`matricula`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla webtransportes.autobuses: ~5 rows (aproximadamente)
DELETE FROM `autobuses`;
/*!40000 ALTER TABLE `autobuses` DISABLE KEYS */;
INSERT INTO `autobuses` (`matricula`, `numerodeplazas`, `disponible`) VALUES
	('1256-BCK', 15, 1),
	('3025-BCK', 60, 0),
	('3325-BFD', 62, 1),
	('4859-BBG', 50, 0),
	('5896-BBF', 50, 1);
/*!40000 ALTER TABLE `autobuses` ENABLE KEYS */;


-- Volcando estructura para tabla webtransportes.calles
DROP TABLE IF EXISTS `calles`;
CREATE TABLE IF NOT EXISTS `calles` (
  `codcalle` varchar(4) NOT NULL DEFAULT '',
  `nombrecalle` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`codcalle`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla webtransportes.calles: ~15 rows (aproximadamente)
DELETE FROM `calles`;
/*!40000 ALTER TABLE `calles` DISABLE KEYS */;
INSERT INTO `calles` (`codcalle`, `nombrecalle`) VALUES
	('ca00', 'Carlos III'),
	('ca01', 'Olite'),
	('ca02', 'Rio Salado'),
	('ca03', 'Rio Alzania'),
	('ca04', 'Tafalla'),
	('ca05', 'San Juan'),
	('ca06', 'San Nicolas'),
	('ca07', 'San Gregorio'),
	('cp00', 'Plaza Merindades'),
	('cp01', 'Plaza Obispo Irurita'),
	('cp02', 'Plaza de la cruz'),
	('cp03', 'Plaza del castillo'),
	('cv00', 'Avda. Bayona'),
	('cv01', 'Avda. Pio XII'),
	('cv02', 'Avda. Blasco Ibañez');
/*!40000 ALTER TABLE `calles` ENABLE KEYS */;


-- Volcando estructura para tabla webtransportes.conductores
DROP TABLE IF EXISTS `conductores`;
CREATE TABLE IF NOT EXISTS `conductores` (
  `codconductor` int(11) NOT NULL,
  `dni` varchar(12) DEFAULT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `direccion` varchar(50) DEFAULT NULL,
  `lugardenacimiento` varchar(50) DEFAULT NULL,
  `disponible` tinyint(1) NOT NULL,
  PRIMARY KEY (`codconductor`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla webtransportes.conductores: ~7 rows (aproximadamente)
DELETE FROM `conductores`;
/*!40000 ALTER TABLE `conductores` DISABLE KEYS */;
INSERT INTO `conductores` (`codconductor`, `dni`, `nombre`, `direccion`, `lugardenacimiento`, `disponible`) VALUES
	(1, '11.234.567 B', 'Victor', 'Avda. Pio XII, 33', 'Pamplona', 0),
	(2, '12.345.678 C', 'Ana Maria', 'Rio Alzania 17,5', 'Pamplona', 1),
	(3, '33.427.797 B', 'Jose Maria', 'San Pedro 15', 'Pamplona', 0),
	(4, '33.427.798 A', 'Alfonso', 'San Juan, 39 - 3º', 'Pamplona', 0),
	(5, '33.427.799 B', 'Luis', 'Carlos III, 63', 'Pamplona', 1),
	(6, '33.427.800 Z', 'Pedro', 'Carlos III, 8', 'Madrid', 1),
	(7, '12.345.678 B', 'Juan', 'Carlos III, 8', 'Madrid', 1);
/*!40000 ALTER TABLE `conductores` ENABLE KEYS */;


-- Volcando estructura para tabla webtransportes.itinerario_interurbano
DROP TABLE IF EXISTS `itinerario_interurbano`;
CREATE TABLE IF NOT EXISTS `itinerario_interurbano` (
  `codrutainterurbana` varchar(4) NOT NULL DEFAULT '',
  `codpueblo` varchar(4) NOT NULL DEFAULT '',
  PRIMARY KEY (`codrutainterurbana`,`codpueblo`),
  KEY `puebloscomposicionrutasinterurbanas` (`codpueblo`),
  KEY `rutas_interurbanascomposicionrutasinterurbanas` (`codrutainterurbana`),
  CONSTRAINT `puebloscomposicionrutasinterurbanas_codpueblo_pueblos_codpueblo` FOREIGN KEY (`CodPueblo`) REFERENCES `pueblos` (`codpueblo`) ON UPDATE CASCADE,
  CONSTRAINT `rutas_interurbanascomposicionrutasinterurbanas_codrutainterurban` FOREIGN KEY (`CodRutaInterurbana`) REFERENCES `lineas_interurbanas` (`codrutainterurbana`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla webtransportes.itinerario_interurbano: ~15 rows (aproximadamente)
DELETE FROM `itinerario_interurbano`;
/*!40000 ALTER TABLE `itinerario_interurbano` DISABLE KEYS */;
INSERT INTO `itinerario_interurbano` (`codrutainterurbana`, `codpueblo`) VALUES
	('I000', 'ALSA'),
	('I002', 'CARC'),
	('I004', 'CINT'),
	('I004', 'FITE'),
	('I002', 'LODO'),
	('I001', 'OLIT'),
	('I002', 'OLIT'),
	('I004', 'OLIT'),
	('I000', 'PERL'),
	('I002', 'PERL'),
	('I004', 'PERL'),
	('I004', 'TAFL'),
	('I003', 'TUDL'),
	('I005', 'TUDL'),
	('I006', 'TUDL');
/*!40000 ALTER TABLE `itinerario_interurbano` ENABLE KEYS */;


-- Volcando estructura para tabla webtransportes.itinerario_urbano
DROP TABLE IF EXISTS `itinerario_urbano`;
CREATE TABLE IF NOT EXISTS `itinerario_urbano` (
  `codrutaurbana` varchar(4) NOT NULL DEFAULT '',
  `codcalle` varchar(4) NOT NULL DEFAULT '',
  PRIMARY KEY (`codrutaurbana`,`codcalle`),
  KEY `callescomposicionrutasurbanas` (`codcalle`),
  KEY `rutas_urbanascomposicionrutasurbanas` (`codrutaurbana`),
  CONSTRAINT `callescomposicionrutasurbanas_codcalle_calles_codcalle` FOREIGN KEY (`CodCalle`) REFERENCES `calles` (`codcalle`) ON UPDATE CASCADE,
  CONSTRAINT `rutas_urbanascomposicionrutasurbanas_codrutaurbana_lineas_urbana` FOREIGN KEY (`CodRutaUrbana`) REFERENCES `lineas_urbanas` (`codrutaurbana`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla webtransportes.itinerario_urbano: ~16 rows (aproximadamente)
DELETE FROM `itinerario_urbano`;
/*!40000 ALTER TABLE `itinerario_urbano` DISABLE KEYS */;
INSERT INTO `itinerario_urbano` (`codrutaurbana`, `codcalle`) VALUES
	('U000', 'ca00'),
	('U002', 'ca00'),
	('U000', 'ca01'),
	('U003', 'ca02'),
	('U003', 'ca03'),
	('U000', 'ca04'),
	('U000', 'ca05'),
	('U001', 'ca06'),
	('U001', 'ca07'),
	('U003', 'cp00'),
	('U002', 'cp02'),
	('U002', 'cp03'),
	('U004', 'cv00'),
	('U004', 'cv01'),
	('U002', 'cv02'),
	('U004', 'cv02');
/*!40000 ALTER TABLE `itinerario_urbano` ENABLE KEYS */;


-- Volcando estructura para tabla webtransportes.lineas_interurbanas
DROP TABLE IF EXISTS `lineas_interurbanas`;
CREATE TABLE IF NOT EXISTS `lineas_interurbanas` (
  `codrutainterurbana` varchar(4) NOT NULL DEFAULT '',
  `kmsrecorridos` int(11) DEFAULT NULL,
  `preciobillete` double DEFAULT NULL,
  PRIMARY KEY (`codrutainterurbana`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla webtransportes.lineas_interurbanas: ~7 rows (aproximadamente)
DELETE FROM `lineas_interurbanas`;
/*!40000 ALTER TABLE `lineas_interurbanas` DISABLE KEYS */;
INSERT INTO `lineas_interurbanas` (`codrutainterurbana`, `kmsrecorridos`, `preciobillete`) VALUES
	('I000', 125, 10),
	('I001', 26, 2.08),
	('I002', 124, 9.92),
	('I003', 210, 16.8),
	('I004', 186, 14.88),
	('I005', 250, 20),
	('I006', 86, 6.88);
/*!40000 ALTER TABLE `lineas_interurbanas` ENABLE KEYS */;


-- Volcando estructura para tabla webtransportes.lineas_urbanas
DROP TABLE IF EXISTS `lineas_urbanas`;
CREATE TABLE IF NOT EXISTS `lineas_urbanas` (
  `codrutaurbana` varchar(4) NOT NULL DEFAULT '',
  `numeroparadas` int(11) DEFAULT NULL,
  `preciobillete` double DEFAULT NULL,
  `campaña` varchar(1) DEFAULT NULL,
  PRIMARY KEY (`codrutaurbana`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla webtransportes.lineas_urbanas: ~5 rows (aproximadamente)
DELETE FROM `lineas_urbanas`;
/*!40000 ALTER TABLE `lineas_urbanas` DISABLE KEYS */;
INSERT INTO `lineas_urbanas` (`codrutaurbana`, `numeroparadas`, `preciobillete`, `campaña`) VALUES
	('U000', 25, 1.84, 'P'),
	('U001', 40, 2.94, 'V'),
	('U002', 26, 1.91, 'V'),
	('U003', 35, 2.57, 'V'),
	('U004', 45, 3.31, 'O');
/*!40000 ALTER TABLE `lineas_urbanas` ENABLE KEYS */;


-- Volcando estructura para tabla webtransportes.pueblos
DROP TABLE IF EXISTS `pueblos`;
CREATE TABLE IF NOT EXISTS `pueblos` (
  `codpueblo` varchar(4) NOT NULL DEFAULT '',
  `nombrepueblo` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`codpueblo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla webtransportes.pueblos: ~13 rows (aproximadamente)
DELETE FROM `pueblos`;
/*!40000 ALTER TABLE `pueblos` DISABLE KEYS */;
INSERT INTO `pueblos` (`codpueblo`, `nombrepueblo`) VALUES
	('ALSA', 'ALSASUA'),
	('CARC', 'CARCAR'),
	('CAST', 'CASTEJON'),
	('CINT', 'CINTRUENIGO'),
	('ESTE', 'ESTELLA'),
	('FITE', 'FITERO'),
	('LODO', 'LODOSA'),
	('LOSA', 'LOS ARCOS'),
	('OLIT', 'OLITE'),
	('PERL', 'PERALTA'),
	('TAFL', 'TAFALLA'),
	('TUDL', 'TUDELA'),
	('VILL', 'VILLAVA');
/*!40000 ALTER TABLE `pueblos` ENABLE KEYS */;


-- Volcando estructura para tabla webtransportes.rutas
DROP TABLE IF EXISTS `rutas`;
CREATE TABLE IF NOT EXISTS `rutas` (
  `codconductor` int(11) DEFAULT NULL,
  `matricula` varchar(8) NOT NULL DEFAULT '',
  `horadesalida` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `codrutaurbana` varchar(4) DEFAULT NULL,
  `codrutainterurbana` varchar(4) DEFAULT NULL,
  PRIMARY KEY (`matricula`,`horadesalida`),
  KEY `autobusesasignaciones` (`matricula`),
  KEY `conductoresasignaciones` (`codconductor`),
  KEY `rutas_interurbanasasignaciones` (`codrutainterurbana`),
  KEY `rutas_urbanasasignaciones` (`codrutaurbana`),
  CONSTRAINT `autobusesasignaciones_matricula_autobuses_matricula` FOREIGN KEY (`matricula`) REFERENCES `autobuses` (`matricula`) ON UPDATE CASCADE,
  CONSTRAINT `conductoresasignaciones_codconductor_conductores_codconductor` FOREIGN KEY (`codconductor`) REFERENCES `conductores` (`codconductor`) ON UPDATE CASCADE,
  CONSTRAINT `rutas_interurbanasasignaciones_codrutainterurbana_lineas_interur` FOREIGN KEY (`codrutainterurbana`) REFERENCES `lineas_interurbanas` (`codrutainterurbana`) ON UPDATE CASCADE,
  CONSTRAINT `rutas_urbanasasignaciones_codrutaurbana_lineas_urbanas_codrutaur` FOREIGN KEY (`codrutaurbana`) REFERENCES `lineas_urbanas` (`codrutaurbana`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla webtransportes.rutas: ~14 rows (aproximadamente)
DELETE FROM `rutas`;
/*!40000 ALTER TABLE `rutas` DISABLE KEYS */;
INSERT INTO `rutas` (`codconductor`, `matricula`, `horadesalida`, `codrutaurbana`, `codrutainterurbana`) VALUES
	(4, '3325-BFD', '2005-09-04 09:00:00', 'U004', NULL),
	(4, '3325-BFD', '2005-09-05 09:00:00', NULL, 'I002'),
	(3, '3325-BFD', '2005-09-05 12:00:00', NULL, 'I002'),
	(5, '3325-BFD', '2005-09-05 16:00:00', 'U004', NULL),
	(2, '3325-BFD', '2005-09-06 09:30:00', NULL, 'I003'),
	(6, '3325-BFD', '2005-09-07 09:00:00', NULL, 'I002'),
	(3, '3325-BFD', '2005-09-08 09:00:00', NULL, 'I003'),
	(4, '3325-BFD', '2005-09-08 16:00:00', NULL, 'I002'),
	(3, '4859-BBG', '2005-09-06 09:00:00', 'U000', NULL),
	(4, '4859-BBG', '2005-09-06 16:00:00', 'U004', NULL),
	(6, '4859-BBG', '2005-09-07 16:00:00', 'U002', NULL),
	(2, '5896-BBF', '2005-09-06 13:00:00', 'U000', NULL),
	(3, '5896-BBF', '2005-09-06 16:00:00', 'U003', NULL),
	(3, '5896-BBF', '2005-09-08 10:00:00', 'U002', NULL);
/*!40000 ALTER TABLE `rutas` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
