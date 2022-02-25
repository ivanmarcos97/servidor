-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3307
-- Tiempo de generación: 25-02-2022 a las 10:31:36
-- Versión del servidor: 10.3.14-MariaDB
-- Versión de PHP: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `turismodwes`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alojamiento`
--

DROP TABLE IF EXISTS `alojamiento`;
CREATE TABLE IF NOT EXISTS `alojamiento` (
  `id_aloj` varchar(4) NOT NULL,
  `tipo` enum('hotel','hostal','pension','rural') DEFAULT NULL,
  `categoria` smallint(6) DEFAULT NULL,
  `localidad` varchar(25) DEFAULT NULL,
  `reformado` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id_aloj`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `alojamiento`
--

INSERT INTO `alojamiento` (`id_aloj`, `tipo`, `categoria`, `localidad`, `reformado`) VALUES
('hos1', 'hostal', 1, 'Briviesca', 0),
('hot1', 'hotel', 1, 'Burgos', 0),
('hot2', 'hotel', 1, 'Burgos', 1),
('hot3', 'hotel', 2, 'Miranda de Ebro', 1),
('hot4', 'hotel', 3, 'Burgos', 1),
('pen1', 'pension', 1, 'Aranda de Duero', 0),
('rur1', 'rural', 1, 'Briviesca', 0),
('rur2', 'rural', 1, 'Sedano', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alojar`
--

DROP TABLE IF EXISTS `alojar`;
CREATE TABLE IF NOT EXISTS `alojar` (
  `id_aloj` varchar(4) NOT NULL,
  `dni` varchar(11) NOT NULL,
  `fecha_i` date DEFAULT NULL,
  `fecha_f` date DEFAULT NULL,
  PRIMARY KEY (`id_aloj`,`dni`),
  KEY `fk_alojar_turista` (`dni`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `alojar`
--

INSERT INTO `alojar` (`id_aloj`, `dni`, `fecha_i`, `fecha_f`) VALUES
('hot1', '11', '2000-01-30', '2000-02-01'),
('hot1', '22', '2014-01-30', '2014-02-15'),
('hot2', '22', '2000-01-30', '2000-02-01'),
('hot2', '33', '2000-01-30', '2000-02-01'),
('hot3', '44', '2000-01-30', '2000-02-01'),
('pen1', '11', '2010-06-24', '2010-06-30'),
('rur1', '44', '2000-03-15', '2000-03-20');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `turista`
--

DROP TABLE IF EXISTS `turista`;
CREATE TABLE IF NOT EXISTS `turista` (
  `dni` varchar(11) NOT NULL,
  `origen` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`dni`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `turista`
--

INSERT INTO `turista` (`dni`, `origen`) VALUES
('11', 'Madrid'),
('22', 'Sevilla'),
('33', 'Barcelona'),
('44', 'Don Benito'),
('55', 'Villanueva de la Serena'),
('66', 'Salamanca');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `alojar`
--
ALTER TABLE `alojar`
  ADD CONSTRAINT `fk_alojar_alojamiento` FOREIGN KEY (`id_aloj`) REFERENCES `alojamiento` (`id_aloj`),
  ADD CONSTRAINT `fk_alojar_turista` FOREIGN KEY (`dni`) REFERENCES `turista` (`dni`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
