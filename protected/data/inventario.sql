-- phpMyAdmin SQL Dump
-- version 3.4.10.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 23-02-2015 a las 02:36:22
-- Versión del servidor: 5.5.20
-- Versión de PHP: 5.3.10

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `inventario`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE IF NOT EXISTS `categoria` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `categoria` varchar(100) NOT NULL,
  `estado_id` int(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_categoria_estado_idx` (`estado_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`id`, `categoria`, `estado_id`) VALUES
(1, 'Alimentos', 1),
(2, 'Jabon', 1),
(3, 'Higiene', 1),
(4, 'Viveres', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle`
--

CREATE TABLE IF NOT EXISTS `detalle` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `fecha` bigint(20) NOT NULL,
  `precio` float(5,2) NOT NULL,
  `cantidad` int(10) NOT NULL,
  `exento` tinyint(1) DEFAULT NULL,
  `comentario` varchar(255) DEFAULT NULL,
  `producto_id` int(10) NOT NULL,
  `transaccion_id` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_detalle_producto1_idx` (`producto_id`),
  KEY `fk_detalle_transaccion1_idx` (`transaccion_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `detalle`
--

INSERT INTO `detalle` (`id`, `fecha`, `precio`, `cantidad`, `exento`, `comentario`, `producto_id`, `transaccion_id`) VALUES
(3, 1423699200, 400.00, 2, 1, 'asad', 1, 1),
(4, 1424476800, 444.00, 33, NULL, '', 2, 2),
(5, 1424563200, 999.99, 4, NULL, '44', 1, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado`
--

CREATE TABLE IF NOT EXISTS `estado` (
  `id` int(1) NOT NULL AUTO_INCREMENT,
  `estado` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `estado`
--

INSERT INTO `estado` (`id`, `estado`) VALUES
(1, 'Activo'),
(2, 'Inactivo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE IF NOT EXISTS `producto` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `producto` varchar(100) NOT NULL,
  `descripcion` varchar(255) DEFAULT NULL,
  `estado_id` int(1) NOT NULL,
  `categoria_id` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_producto_estado1_idx` (`estado_id`),
  KEY `fk_producto_categoria1_idx` (`categoria_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`id`, `producto`, `descripcion`, `estado_id`, `categoria_id`) VALUES
(1, 'azucar', 'cazta 1Kg', 1, 1),
(2, 'Atun', 'margarita 184g', 1, 1),
(3, 'Las llaves', 'pasta', 1, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `transaccion`
--

CREATE TABLE IF NOT EXISTS `transaccion` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `transaccion` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `transaccion`
--

INSERT INTO `transaccion` (`id`, `transaccion`) VALUES
(1, 'Ingreso'),
(2, 'Egreso');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD CONSTRAINT `fk_categoria_estado` FOREIGN KEY (`estado_id`) REFERENCES `estado` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `detalle`
--
ALTER TABLE `detalle`
  ADD CONSTRAINT `fk_detalle_producto1` FOREIGN KEY (`producto_id`) REFERENCES `producto` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_detalle_transaccion1` FOREIGN KEY (`transaccion_id`) REFERENCES `transaccion` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `fk_producto_categoria1` FOREIGN KEY (`categoria_id`) REFERENCES `categoria` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_producto_estado1` FOREIGN KEY (`estado_id`) REFERENCES `estado` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
