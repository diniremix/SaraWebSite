-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.5.16 - MySQL Community Server (GPL)
-- Server OS:                    Win32
-- HeidiSQL version:             7.0.0.4053
-- Date/time:                    2012-11-13 10:46:05
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET FOREIGN_KEY_CHECKS=0 */;

-- Dumping structure for table saradb.matriculas
CREATE TABLE IF NOT EXISTS `matriculas` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `identif` varchar(15) NOT NULL,
  `nombres` varchar(25) NOT NULL,
  `apellidos` varchar(25) NOT NULL,
  `sexo` int(1) NOT NULL,
  `estcivil` int(1) NOT NULL,
  `estrato` int(1) NOT NULL,
  `diresid` varchar(50) NOT NULL,
  `telefono` varchar(12) NOT NULL,
  `cicfes` varchar(50) NOT NULL,
  `annopres` varchar(4) NOT NULL,
  `email` varchar(30) NOT NULL,
  `ciudad` varchar(30) NOT NULL,
  `npin` varchar(50) NOT NULL,
  `Estado` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Dumping data for table saradb.matriculas: 1 rows
/*!40000 ALTER TABLE `matriculas` DISABLE KEYS */;
INSERT INTO `matriculas` (`id`, `identif`, `nombres`, `apellidos`, `sexo`, `estcivil`, `estrato`, `diresid`, `telefono`, `cicfes`, `annopres`, `email`, `ciudad`, `npin`, `Estado`) VALUES
	(1, '78596325672', 'demo', 'demo', 1, 1, 1, 'Calle de los vientos', '5553216', 'SN25698', '2001', 'demo@sara.edu.co', 'rohan', 'ac85g5h6e8d4dc6s8', 1);
/*!40000 ALTER TABLE `matriculas` ENABLE KEYS */;


-- Dumping structure for table saradb.pines
CREATE TABLE IF NOT EXISTS `pines` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `npines` varchar(255) NOT NULL,
  `estado` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

-- Dumping data for table saradb.pines: 3 rows
/*!40000 ALTER TABLE `pines` DISABLE KEYS */;
INSERT INTO `pines` (`id`, `npines`, `estado`) VALUES
	(22, '7ef921d7734b55c03bf788f8b9500c6b', 1),
	(16, '063480dbff2b7b6ccdc1b22f3cf90783', 1),
	(23, 'ba4c9b73ac37c48cd2fec192f0b1c4d0', 1);
/*!40000 ALTER TABLE `pines` ENABLE KEYS */;


-- Dumping structure for table saradb.tiposusuarios
CREATE TABLE IF NOT EXISTS `tiposusuarios` (
  `id` int(1) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(15) NOT NULL,
  `descripcion` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Dumping data for table saradb.tiposusuarios: 1 rows
/*!40000 ALTER TABLE `tiposusuarios` DISABLE KEYS */;
INSERT INTO `tiposusuarios` (`id`, `nombre`, `descripcion`) VALUES
	(1, 'demo', 'administrador');
/*!40000 ALTER TABLE `tiposusuarios` ENABLE KEYS */;


-- Dumping structure for table saradb.usuarios
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `identificacion` varchar(20) NOT NULL,
  `nombres` varchar(25) NOT NULL,
  `apellidos` varchar(25) NOT NULL,
  `email` varchar(255) NOT NULL,
  `user` varchar(15) NOT NULL,
  `contrasenna` varchar(255) NOT NULL,
  `usuario_tipo` int(1) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;

-- Dumping data for table saradb.usuarios: 1 rows
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` (`id`, `identificacion`, `nombres`, `apellidos`, `email`, `user`, `contrasenna`, `usuario_tipo`) VALUES
	(1, '12345', 'administrador', 'SARA', 'admin@sara.co', 'demo', 'demo', 1);
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
/*!40014 SET FOREIGN_KEY_CHECKS=1 */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
