-- phpMyAdmin SQL Dump
-- version 3.4.10.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 27-02-2015 a las 05:16:24
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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=26 ;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`id`, `categoria`) VALUES
(1, 'Carnes y Embutidos'),
(2, 'Galletas y Gelatinas'),
(3, 'Cafe, Chocolate y Panela'),
(4, 'Lacteos, Jugos, Refrescos'),
(5, 'Harinas'),
(6, 'Aceites y Vinagres'),
(7, 'Condimentos, Cubitos, Especies y Sopas'),
(8, 'Salsas'),
(9, 'Enlatados y Conservas'),
(11, 'Pastas y Arroces'),
(13, 'Azucar y Sal'),
(14, 'Cereales y Granos'),
(17, 'Licores'),
(18, 'Servicios'),
(19, 'Cosmética y Aseo Personal'),
(20, 'Hogar y Limpieza'),
(21, 'Medicinas y Vitaminas'),
(22, 'Articulos de Oficina'),
(23, 'Vehiculo'),
(24, 'Velas y Fosforos'),
(25, 'Mantequilla y Mayonesa');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle`
--

CREATE TABLE IF NOT EXISTS `detalle` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `fecha` bigint(20) NOT NULL,
  `precio` float(5,2) NOT NULL,
  `cantidad` float(5,2) NOT NULL,
  `comentario` varchar(255) DEFAULT NULL,
  `producto_id` int(10) NOT NULL,
  `transaccion_id` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_detalle_producto1_idx` (`producto_id`),
  KEY `fk_detalle_transaccion1_idx` (`transaccion_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=37 ;

--
-- Volcado de datos para la tabla `detalle`
--

INSERT INTO `detalle` (`id`, `fecha`, `precio`, `cantidad`, `comentario`, `producto_id`, `transaccion_id`) VALUES
(1, 1420070400, 0.00, 28.00, 'Creacion del producto', 1, 3),
(2, 1420934400, 0.00, -1.00, 'Casa', 1, 2),
(3, 1422144000, 0.00, -3.00, 'Casa y Jean', 1, 2),
(4, 1420070400, 0.00, 9.00, 'Creacion del producto', 2, 3),
(5, 1422316800, 0.00, -2.00, 'Casa y Mama', 2, 2),
(6, 1423872000, 0.00, -1.00, '', 2, 2),
(7, 1424908800, 0.00, -1.00, 'Mama', 2, 2),
(8, 1424908800, 43.90, 1.00, '', 2, 1),
(9, 1420070400, 0.00, 3.00, 'Creacion del producto', 3, 3),
(10, 1420070400, 0.00, 33.00, 'Creacion del producto', 4, 3),
(11, 1420416000, 0.00, -1.00, 'Vendida a Darlyng', 4, 2),
(12, 1422144000, 0.00, -1.00, 'Casa', 4, 2),
(13, 1420070400, 0.00, 12.00, 'Creacion del producto', 5, 3),
(14, 1420070400, 0.00, 1.00, 'Creacion del producto', 6, 3),
(15, 1421366400, 0.00, -1.00, 'Casa', 6, 2),
(16, 1420070400, 0.00, 2.00, 'Creacion del producto', 7, 3),
(17, 1420070400, 0.00, 5.00, 'Creacion del producto', 8, 3),
(18, 1420070400, 0.00, 0.00, 'Creacion del producto', 9, 3),
(19, 1420070400, 0.00, 0.00, 'Creacion del producto', 10, 3),
(20, 1420070400, 0.00, 0.00, 'Creacion del producto', 11, 3),
(21, 1420070400, 0.00, 0.00, 'Creacion del producto', 12, 3),
(22, 1420070400, 0.00, 0.00, 'Creacion del producto', 13, 3),
(23, 1420070400, 0.00, 0.00, 'Creacion del producto', 14, 3),
(24, 1420070400, 0.00, 0.00, 'Creacion del producto', 15, 3),
(25, 1420070400, 0.00, 0.00, 'Creacion del producto', 16, 3),
(26, 1420070400, 0.00, 0.00, 'Creacion del producto', 17, 3),
(27, 1420070400, 0.00, 0.00, 'Creacion del producto', 18, 3),
(28, 1420070400, 0.00, 0.00, 'Creacion del producto', 19, 3),
(29, 1420070400, 0.00, 0.00, 'Creacion del producto', 20, 3),
(30, 1420070400, 0.00, 0.00, 'Creacion del producto', 21, 3),
(31, 1420070400, 0.00, 0.00, 'Creacion del producto', 22, 3),
(32, 1420070400, 0.00, 0.00, 'Creacion del producto', 23, 3),
(33, 1420070400, 0.00, 0.00, 'Creacion del producto', 24, 3),
(34, 1420070400, 0.00, 0.00, 'Creacion del producto', 25, 3),
(35, 1420070400, 0.00, 0.00, 'Creacion del producto', 26, 3),
(36, 1420070400, 0.00, 0.00, 'Creacion del producto', 27, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE IF NOT EXISTS `producto` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `producto` varchar(100) NOT NULL,
  `descripcion` varchar(255) DEFAULT NULL,
  `subcategoria_id` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_producto_subcategoria1_idx` (`subcategoria_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=28 ;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`id`, `producto`, `descripcion`, `subcategoria_id`) VALUES
(1, 'Atun', '', 29),
(2, 'Arroz', '', 32),
(3, 'Avena', '', 61),
(4, 'Azucar', 'Kgs', 33),
(5, 'Aceite Vegetal', '', 21),
(6, 'Aceite de Oliva', '', 22),
(7, 'Alcohol', '', 62),
(8, 'Algodon', '', 62),
(9, 'Acondicionador', '', 48),
(10, 'Copitos', '', 48),
(11, 'Inyectadoras', '', 62),
(12, 'Jabon de Baño', '', 48),
(13, 'Jabon Intimo', '', 48),
(14, 'Shampoo', '', 48),
(15, 'Prestobarbas', '', 48),
(16, 'Compacto Facial', '', 47),
(17, 'Cepillo de Dientes', '', 48),
(18, 'Protectores Diarios', '', 48),
(19, 'Crema Dental', '', 48),
(20, 'Hilo Dental', '', 48),
(21, 'Talco', '', 48),
(22, 'Cepillo Ducha', '', 48),
(23, 'Lapiz Labial', '', 47),
(24, 'Lapiz de Ceja', '', 47),
(25, 'Lima de Uñas', '', 47),
(26, 'Tinte para Cabello', '', 47),
(27, 'Agua Oxigenada', '', 47);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `subcategoria`
--

CREATE TABLE IF NOT EXISTS `subcategoria` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `subcategoria` varchar(100) NOT NULL,
  `categoria_id` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_subcategoria_categoria1_idx` (`categoria_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=63 ;

--
-- Volcado de datos para la tabla `subcategoria`
--

INSERT INTO `subcategoria` (`id`, `subcategoria`, `categoria_id`) VALUES
(1, 'Carnes', 1),
(2, 'Pollo', 1),
(3, 'Tocino', 1),
(4, 'Mortadela', 1),
(5, 'Queso', 1),
(6, 'Galletas', 2),
(7, 'Gelatinas', 2),
(8, 'Cafe', 3),
(9, 'Chocolate', 3),
(10, 'Panela', 3),
(11, 'Leche en Polvo', 4),
(12, 'Leche Liquida', 4),
(13, 'Leche Condensada', 4),
(14, 'Jugos', 4),
(15, 'Refrescos', 4),
(16, 'Yogurt', 4),
(17, 'Pan', 5),
(18, 'Trigo', 5),
(19, 'Cachapas', 5),
(20, 'Maizina', 5),
(21, 'Vegetal', 6),
(22, 'Oliva', 6),
(23, 'Vinagre', 6),
(24, 'Condimentos', 7),
(25, 'Cubitos', 7),
(26, 'Especias', 7),
(27, 'Sopas', 7),
(28, 'Varias', 8),
(29, 'Enlatados', 9),
(30, 'Conservas', 9),
(31, 'Pastas', 11),
(32, 'Arroces', 11),
(33, 'Azucar', 13),
(34, 'Sal', 13),
(35, 'Cereales', 14),
(36, 'Granos', 14),
(37, 'Whisky', 17),
(38, 'Vinos', 17),
(39, 'Agua (HSO)', 18),
(40, 'Gas (PDVGAS)', 18),
(41, 'Luz (CORPOELEC)', 18),
(42, 'Telefono (CANTV)', 18),
(43, 'Tv Cable (INTERCABLE)', 18),
(44, 'Vigilante Barrio', 18),
(45, 'Recarga Movistar', 18),
(46, 'Jardinero', 18),
(47, 'Cosmetica', 19),
(48, 'Aseo Personal', 19),
(49, 'Hogar', 20),
(50, 'Limpieza', 20),
(51, 'Medicina', 21),
(52, 'Vitaminas', 21),
(53, 'Varios', 22),
(54, 'Repuestos', 23),
(55, 'Liquidos', 23),
(56, 'Accesorios', 23),
(57, 'Velas', 24),
(58, 'Fosforos', 24),
(59, 'Mantequillas', 25),
(60, 'Mayonesas', 25),
(61, 'Avenas', 14),
(62, 'Insumos', 21);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `transaccion`
--

CREATE TABLE IF NOT EXISTS `transaccion` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `transaccion` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `transaccion`
--

INSERT INTO `transaccion` (`id`, `transaccion`) VALUES
(1, 'Ingreso'),
(2, 'Egreso'),
(3, 'Asiento Inicial');

--
-- Restricciones para tablas volcadas
--

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
  ADD CONSTRAINT `fk_producto_subcategoria1` FOREIGN KEY (`subcategoria_id`) REFERENCES `subcategoria` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `subcategoria`
--
ALTER TABLE `subcategoria`
  ADD CONSTRAINT `fk_subcategoria_categoria1` FOREIGN KEY (`categoria_id`) REFERENCES `categoria` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
