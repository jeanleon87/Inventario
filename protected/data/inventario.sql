-- phpMyAdmin SQL Dump
-- version 3.4.10.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 01-03-2015 a las 06:03:36
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=27 ;

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
(25, 'Mantequilla y Mayonesa'),
(26, 'Computacion');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=270 ;

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
(19, 1420070400, 0.00, 8.00, 'Creacion del producto', 10, 3),
(20, 1420070400, 0.00, 9.00, 'Creacion del producto', 11, 3),
(21, 1420070400, 0.00, 84.00, 'Creacion del producto', 12, 3),
(22, 1420070400, 0.00, 2.00, 'Creacion del producto', 13, 3),
(23, 1420070400, 0.00, 0.00, 'Creacion del producto', 14, 3),
(24, 1420070400, 0.00, 14.00, 'Creacion del producto', 15, 3),
(25, 1420070400, 0.00, 4.00, 'Creacion del producto', 16, 3),
(26, 1420070400, 0.00, 10.00, 'Creacion del producto', 17, 3),
(27, 1420070400, 0.00, 640.00, 'Creacion del producto', 18, 3),
(28, 1420070400, 0.00, 50.00, 'Creacion del producto', 19, 3),
(29, 1420070400, 0.00, 5.00, 'Creacion del producto', 20, 3),
(30, 1420070400, 0.00, 5.00, 'Creacion del producto', 21, 3),
(31, 1420070400, 0.00, 2.00, 'Creacion del producto', 22, 3),
(32, 1420070400, 0.00, 4.00, 'Creacion del producto', 23, 3),
(33, 1420070400, 0.00, 7.00, 'Creacion del producto', 24, 3),
(34, 1420070400, 0.00, 4.00, 'Creacion del producto', 25, 3),
(35, 1420070400, 0.00, 3.00, 'Creacion del producto', 26, 3),
(36, 1420070400, 0.00, 1.00, 'Creacion del producto', 27, 3),
(37, 1420070400, 0.00, 44.00, 'Creacion del producto', 28, 3),
(38, 1421452800, 0.00, -4.00, '', 28, 2),
(39, 1420070400, 0.00, 7.00, 'Creacion del producto', 29, 3),
(40, 1421798400, 0.00, -2.00, 'Biblioteca y Cocina', 29, 2),
(41, 1420070400, 0.00, 1.00, 'Creacion del producto', 30, 3),
(42, 1420070400, 0.00, 4.00, 'Creacion del producto', 31, 3),
(43, 1421539200, 0.00, -1.00, '', 31, 2),
(44, 1420070400, 0.00, 4.00, 'Creacion del producto', 32, 3),
(45, 1423267200, 15.00, 1.00, '', 32, 1),
(46, 1423612800, 52.00, 1.00, '', 30, 1),
(47, 1420070400, 0.00, 3.00, 'Creacion del producto', 33, 3),
(48, 1422576000, 0.00, -1.00, '', 33, 2),
(49, 1420070400, 0.00, 1.00, 'Creacion del producto', 34, 3),
(50, 1424736000, 0.00, -1.00, '', 34, 2),
(51, 1420070400, 0.00, 5.00, 'Creacion del producto', 35, 3),
(52, 1420070400, 0.00, 1.00, 'Creacion del producto', 36, 3),
(53, 1420070400, 0.00, 2.00, 'Creacion del producto', 37, 3),
(54, 1420070400, 0.00, 2.00, 'Creacion del producto', 38, 3),
(55, 1422057600, 0.00, -1.00, '', 38, 2),
(56, 1420070400, 0.00, 5.00, 'Creacion del producto', 39, 3),
(57, 1420675200, 0.00, -1.00, 'Vendida a Mama', 39, 2),
(58, 1420848000, 65.00, 2.00, '', 39, 1),
(59, 1423958400, 0.00, -1.00, '', 39, 2),
(60, 1420070400, 0.00, 5.00, 'Creacion del producto', 40, 3),
(61, 1420848000, 57.00, 1.00, '', 40, 1),
(62, 1422057600, 0.00, -1.00, '', 40, 2),
(63, 1423958400, 0.00, -1.00, '', 40, 2),
(64, 1424995200, 0.00, -1.00, '', 40, 2),
(65, 1421539200, 0.00, -2.00, '', 19, 2),
(66, 1422144000, 0.00, -1.00, 'Jean', 17, 2),
(67, 1421020800, 0.00, -1.00, 'Casa', 10, 2),
(68, 1421539200, 0.00, -1.00, '', 12, 2),
(69, 1423872000, 0.00, -3.00, '', 12, 2),
(70, 1420416000, 0.00, -1.00, '', 16, 2),
(71, 1420070400, 253.33, 3.00, 'Creacion del producto', 41, 3),
(72, 1424995200, 72.00, 4.00, '', 24, 1),
(73, 1422057600, 0.00, -1.00, '', 26, 2),
(74, 1420070400, 0.00, 4.00, 'Creacion del producto', 42, 3),
(75, 1420070400, 0.00, 27.40, 'Creacion del producto', 43, 3),
(76, 1421366400, 0.00, -1.00, '', 43, 2),
(77, 1420070400, 0.00, 4.00, 'Creacion del producto', 44, 3),
(78, 1423526400, 0.00, -1.00, '', 44, 2),
(79, 1420070400, 0.00, 3.00, 'Creacion del producto', 45, 3),
(80, 1423526400, 0.00, -1.00, '', 45, 2),
(81, 1424908800, 85.00, 1.00, '', 45, 1),
(82, 1420070400, 0.00, 4.00, 'Creacion del producto', 46, 3),
(83, 1420070400, 0.00, 2.00, 'Creacion del producto', 47, 3),
(84, 1420070400, 0.00, 1.00, 'Creacion del producto', 48, 3),
(85, 1424908800, 118.00, 1.00, '', 48, 1),
(86, 1420070400, 0.00, 5.00, 'Creacion del producto', 49, 3),
(87, 1420329600, 0.00, -1.00, '', 49, 2),
(88, 1420070400, 68.00, 1.00, 'Creacion del producto', 50, 3),
(89, 1423958400, 0.00, -1.00, '', 50, 2),
(90, 1420070400, 0.00, 4.00, 'Creacion del producto', 51, 3),
(91, 1421539200, 0.00, -1.00, '', 51, 2),
(92, 1420070400, 0.00, 3.00, 'Creacion del producto', 52, 3),
(93, 1420070400, 0.00, 3.00, 'Creacion del producto', 53, 3),
(94, 1420070400, 0.00, 2.00, 'Creacion del producto', 54, 3),
(95, 1420070400, 0.00, 7.00, 'Creacion del producto', 55, 3),
(96, 1420070400, 0.00, 8.00, 'Creacion del producto', 56, 3),
(97, 1420070400, 0.00, 2.00, 'Creacion del producto', 57, 3),
(98, 1420070400, 0.00, 1.00, 'Creacion del producto', 58, 3),
(99, 1420070400, 0.00, 6.00, 'Creacion del producto', 59, 3),
(100, 1420070400, 0.00, 6.00, 'Creacion del producto', 60, 3),
(101, 1420070400, 112.00, 1.00, 'Creacion del producto', 61, 3),
(102, 1420070400, 0.00, 1.00, 'Creacion del producto', 62, 3),
(103, 1420070400, 0.00, 1.00, 'Creacion del producto', 63, 3),
(104, 1420070400, 0.00, 2.00, 'Creacion del producto', 64, 3),
(105, 1421625600, 0.00, -1.00, '', 64, 2),
(106, 1420070400, 0.00, 11.00, 'Creacion del producto', 65, 3),
(107, 1422748800, 0.00, -1.00, 'Jean', 65, 2),
(108, 1420070400, 0.00, 6.00, 'Creacion del producto', 66, 3),
(109, 1420675200, 0.00, -1.00, '', 66, 2),
(110, 1420070400, 0.00, 21.00, 'Creacion del producto', 67, 3),
(111, 1422748800, 0.00, -1.00, 'Jean', 67, 2),
(112, 1420070400, 0.00, 21.00, 'Creacion del producto', 68, 3),
(113, 1420070400, 0.00, 71.00, 'Creacion del producto', 69, 3),
(114, 1420070400, 0.00, 14.00, 'Creacion del producto', 70, 3),
(115, 1420070400, 0.00, 25.00, 'Creacion del producto', 71, 3),
(116, 1420070400, 0.00, 0.00, 'Creacion del producto', 72, 3),
(117, 1420070400, 0.00, 1.00, 'Creacion del producto', 73, 3),
(118, 1420070400, 0.00, 0.00, 'Creacion del producto', 74, 3),
(119, 1420070400, 0.00, 0.00, 'Creacion del producto', 75, 3),
(120, 1420070400, 0.00, 0.00, 'Creacion del producto', 76, 3),
(121, 1420070400, 0.00, 0.00, 'Creacion del producto', 77, 3),
(122, 1420070400, 0.00, 0.00, 'Creacion del producto', 78, 3),
(123, 1420070400, 0.00, 0.00, 'Creacion del producto', 79, 3),
(124, 1422316800, 0.00, -1.00, 'Duracion 79 dias del 10/11/14 al 27/01/15', 73, 2),
(125, 1420070400, 0.00, 3.00, 'Creacion del producto', 80, 3),
(126, 1420070400, 0.00, 10.00, 'Creacion del producto', 81, 3),
(127, 1421107200, 0.00, -1.00, '', 81, 2),
(128, 1421452800, 0.00, -1.00, '', 81, 2),
(129, 1423008000, 0.00, -1.00, '', 81, 2),
(130, 1424822400, 0.00, -1.00, '', 80, 2),
(131, 1420070400, 0.00, 4.00, 'Creacion del producto', 82, 3),
(132, 1420070400, 0.00, 0.00, 'Creacion del producto', 83, 3),
(133, 1420070400, 0.00, 1.00, 'Creacion del producto', 84, 3),
(134, 1423526400, 43.00, 2.00, '', 83, 1),
(135, 1423526400, 0.00, -1.00, 'Mama', 83, 2),
(136, 1423526400, 0.00, -1.00, 'Mama', 82, 2),
(137, 1423612800, 27.00, 2.00, '', 82, 1),
(138, 1424217600, 27.00, 1.00, '', 83, 1),
(139, 1420070400, 0.00, 1.00, 'Creacion del producto', 85, 3),
(140, 1420070400, 0.00, 10.00, 'Creacion del producto', 86, 3),
(141, 1420848000, 12.40, 4.00, '', 86, 1),
(142, 1423526400, 0.00, -1.00, '', 86, 2),
(143, 1422057600, 0.00, -1.00, '', 86, 2),
(144, 1422576000, 0.00, -1.00, '', 86, 2),
(145, 1423267200, 12.40, 2.00, '', 86, 1),
(146, 1423267200, 0.00, -1.00, '', 86, 2),
(147, 1424822400, 0.00, -1.00, '', 86, 2),
(148, 1424908800, 19.00, 1.00, '', 86, 1),
(149, 1420070400, 0.00, 1.00, 'Creacion del producto', 87, 3),
(150, 1420070400, 0.00, 4.00, 'Creacion del producto', 88, 3),
(151, 1420070400, 0.00, 25.00, 'Creacion del producto', 89, 3),
(152, 1420675200, 9.33, 30.00, '', 89, 1),
(153, 1422144000, 0.00, -34.00, '', 89, 2),
(154, 1422403200, 0.00, -4.00, '', 89, 2),
(155, 1422489600, 8.66, 30.00, '', 89, 1),
(156, 1422489600, 0.00, -20.00, '', 89, 2),
(157, 1424822400, 0.00, -27.00, '', 89, 2),
(158, 1424908800, 8.66, 30.00, '', 89, 1),
(159, 1424908800, 0.00, -2.00, '', 89, 2),
(160, 1420070400, 0.00, 78.00, 'Creacion del producto', 90, 3),
(161, 1420070400, 0.00, 52.40, 'Creacion del producto', 91, 3),
(162, 1421452800, 0.00, -1.00, '', 90, 2),
(163, 1422489600, 12.50, 4.00, '', 90, 1),
(164, 1424044800, 0.00, -1.00, '', 90, 2),
(165, 1420070400, 0.00, 5.80, 'Creacion del producto', 92, 3),
(166, 1420070400, 0.00, 13.00, 'Creacion del producto', 93, 3),
(167, 1424736000, 0.00, -0.80, '', 92, 2),
(168, 1423526400, 0.00, -1.00, 'Jean', 93, 2),
(169, 1420070400, 0.00, 3.00, 'Creacion del producto', 94, 3),
(170, 1420848000, 36.50, 1.00, '', 94, 1),
(171, 1422662400, 36.50, 2.00, '', 94, 1),
(172, 1422921600, 0.00, -1.00, '', 94, 2),
(173, 1423267200, 36.50, 2.00, '', 94, 1),
(174, 1423353600, 0.00, -1.00, '', 94, 2),
(175, 1420070400, 0.00, 5.00, 'Creacion del producto', 95, 3),
(176, 1420070400, 0.00, 16.00, 'Creacion del producto', 96, 3),
(177, 1420070400, 0.00, 2.00, 'Creacion del producto', 97, 3),
(178, 1423612800, 240.00, 2.00, '', 97, 1),
(179, 1423612800, 0.00, -1.00, '', 97, 2),
(180, 1423612800, 0.00, -1.00, '', 97, 2),
(181, 1420070400, 0.00, 11.00, 'Creacion del producto', 98, 3),
(182, 1420329600, 0.00, -1.00, '', 98, 2),
(183, 1421539200, 0.00, -1.00, '', 98, 2),
(184, 1422576000, 0.00, -1.00, '', 98, 2),
(185, 1423353600, 0.00, -1.00, '', 98, 2),
(186, 1420070400, 0.00, 3.00, 'Creacion del producto', 99, 3),
(187, 1420070400, 0.00, 2.00, 'Creacion del producto', 100, 3),
(188, 1425081600, 0.00, -1.00, '', 94, 2),
(189, 1420070400, 0.00, 21.00, 'Creacion del producto', 101, 3),
(190, 1420329600, 0.00, -1.00, '', 101, 2),
(191, 1420848000, 36.40, 1.00, '', 101, 1),
(192, 1422316800, 0.00, -1.00, '', 101, 2),
(193, 1423612800, 44.00, 1.00, '', 101, 1),
(194, 1424908800, 0.00, -1.00, '', 101, 2),
(195, 1420070400, 0.00, 9.00, 'Creacion del producto', 102, 3),
(196, 1421539200, 0.00, -1.00, '', 102, 2),
(197, 1423180800, 0.00, -1.00, 'Vendida Mama', 102, 2),
(198, 1423612800, 40.00, 4.00, '', 102, 1),
(199, 1423612800, 0.00, -1.00, 'Vendida Mama', 102, 2),
(200, 1420070400, 0.00, 5.00, 'Creacion del producto', 103, 3),
(201, 1420070400, 0.00, 3.00, 'Creacion del producto', 104, 3),
(202, 1421884800, 0.00, -1.00, '', 104, 2),
(203, 1420070400, 0.00, 7.00, 'Creacion del producto', 105, 3),
(204, 1422921600, 35.00, 1.00, '', 105, 1),
(205, 1422921600, 0.00, -1.00, 'Mama', 105, 2),
(206, 1420070400, 0.00, 172.00, 'Creacion del producto', 106, 3),
(207, 1420070400, 0.00, 3.00, 'Creacion del producto', 107, 3),
(208, 1420070400, 0.00, 36.00, 'Creacion del producto', 108, 3),
(209, 1420329600, 0.00, -4.00, '', 106, 2),
(210, 1422662400, 0.00, -4.00, '', 106, 2),
(211, 1424217600, 15.00, 4.00, '', 106, 1),
(212, 1420070400, 0.00, 1.00, 'Creacion del producto', 109, 3),
(213, 1424390400, 0.00, -1.00, '', 108, 2),
(214, 1420070400, 0.00, 14.00, 'Creacion del producto', 110, 3),
(215, 1424908800, 0.00, -2.00, 'Teclado', 110, 2),
(216, 1420070400, 0.00, 13.00, 'Creacion del producto', 111, 3),
(217, 1422144000, 0.00, -2.00, 'Mouse', 111, 2),
(218, 1420070400, 0.00, 27.00, 'Creacion del producto', 112, 3),
(219, 1420070400, 0.00, 8.00, 'Creacion del producto', 113, 3),
(220, 1420329600, 0.00, -1.00, '', 113, 2),
(221, 1421020800, 0.00, -1.00, '', 113, 2),
(222, 1421539200, 0.00, -1.00, '', 113, 2),
(223, 1421452800, 60.00, 1.00, '', 113, 1),
(224, 1421625600, 50.00, 1.00, '', 113, 1),
(225, 1422489600, 33.00, 3.00, '', 113, 1),
(226, 1422662400, 0.00, -1.00, '', 113, 2),
(227, 1423612800, 33.60, 2.00, '', 113, 1),
(228, 1424995200, 0.00, -1.00, '', 113, 2),
(229, 1424476800, 0.00, -1.00, '', 113, 2),
(230, 1424476800, 0.00, -1.00, '', 102, 2),
(231, 1420070400, 0.00, 2.90, 'Creacion del producto (Pollo entero)', 114, 3),
(232, 1422662400, 41.00, 1.27, 'Cuellos', 114, 1),
(233, 1423267200, 41.00, 1.20, 'Cuellos', 114, 1),
(234, 1423267200, 230.00, 0.80, 'Pechuga', 114, 1),
(235, 1423612800, 107.00, 3.85, 'Pollo entero', 114, 1),
(236, 1420070400, 0.00, 3.00, 'Creacion del producto', 115, 3),
(237, 1420070400, 0.00, 7.00, 'Creacion del producto', 116, 3),
(238, 1420675200, 0.00, -1.00, '', 116, 2),
(239, 1422662400, 0.00, -1.00, '', 116, 2),
(240, 1420070400, 0.00, 4.00, 'Creacion del producto', 117, 3),
(241, 1420070400, 0.00, 11.00, 'Creacion del producto', 118, 3),
(242, 1421020800, 11.77, 4.00, '', 117, 1),
(243, 1421020800, 0.00, -1.00, 'MAma', 117, 2),
(244, 1423094400, 0.00, -1.00, '', 118, 2),
(245, 1420070400, 0.00, 3.00, 'Creacion del producto', 119, 3),
(246, 1420070400, 0.00, 3.00, 'Creacion del producto', 120, 3),
(247, 1420848000, 62.00, 2.00, '', 120, 1),
(248, 1420848000, 0.00, -1.00, 'Mama', 120, 2),
(249, 1422057600, 0.00, -1.00, '', 120, 2),
(250, 1422662400, 62.00, 1.00, '', 120, 1),
(251, 1422662400, 0.00, -1.00, '', 120, 2),
(252, 1423267200, 70.00, 1.00, '', 120, 1),
(253, 1423958400, 0.00, -1.00, '', 120, 2),
(254, 1420070400, 0.00, 3.00, 'Creacion del producto', 121, 3),
(255, 1420416000, 0.00, -1.00, 'Q10', 121, 2),
(256, 1420070400, 0.00, 0.00, 'Creacion del producto', 122, 3),
(257, 1420070400, 0.00, 0.00, 'Creacion del producto', 123, 3),
(258, 1420070400, 0.00, 0.00, 'Creacion del producto', 124, 3),
(259, 1420848000, 300.00, 0.58, '', 122, 1),
(260, 1420848000, 300.00, 0.68, '', 123, 1),
(261, 1422662400, 330.00, 0.42, '', 123, 1),
(262, 1420848000, 315.00, 0.50, '', 124, 1),
(263, 1422662400, 366.00, 0.36, '', 124, 1),
(264, 1420070400, 0.00, 0.00, 'Creacion del producto', 125, 3),
(265, 1420848000, 103.56, 1.00, '', 125, 1),
(266, 1423267200, 182.00, 1.00, '', 125, 1),
(267, 1423958400, 0.00, -1.00, '1/2 Casa 1/2 Jean', 125, 2),
(268, 1420070400, 0.00, 0.00, 'Creacion del producto', 126, 3);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=127 ;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`id`, `producto`, `descripcion`, `subcategoria_id`) VALUES
(1, 'Atun', 'unds', 29),
(2, 'Arroz', 'Kgs', 32),
(3, 'Avena', '', 61),
(4, 'Azucar', 'Kgs', 33),
(5, 'Aceite Vegetal', 'lts', 21),
(6, 'Aceite de Oliva', 'lts', 22),
(7, 'Alcohol', '', 62),
(8, 'Algodon', '', 62),
(9, 'Acondicionador', '', 48),
(10, 'Copitos', 'caja', 48),
(11, 'Inyectadoras', '', 62),
(12, 'Jabon de Baño', 'und', 48),
(13, 'Jabon Intimo', '', 48),
(14, 'Shampoo', '', 48),
(15, 'Prestobarbas', '', 48),
(16, 'Compacto Facial', '', 47),
(17, 'Cepillo de Dientes', 'unds', 48),
(18, 'Protectores Diarios', 'unds', 48),
(19, 'Crema Dental', '', 48),
(20, 'Hilo Dental', '', 48),
(21, 'Talco', '', 48),
(22, 'Cepillo Ducha', '', 48),
(23, 'Lapiz Labial', '', 47),
(24, 'Lapiz de Ceja', '', 47),
(25, 'Lima de Uñas', '', 47),
(26, 'Tinte para Cabello', '', 47),
(27, 'Agua Oxigenada', 'lts', 47),
(28, 'Bolsas Plasticas', '', 50),
(29, 'Bombillos', '', 49),
(30, 'Cubitos Caja Grande', '', 25),
(31, 'Cubitos Caja Pequeña', '', 25),
(32, 'Sopas Maggie', '', 27),
(33, 'Kellogs', '', 35),
(34, 'Mani', '', 63),
(35, 'Uvas Pasas', 'Cajas', 63),
(36, 'Cotufas', '', 63),
(37, 'Ajonjoli', '', 63),
(38, 'Linaza', '', 63),
(39, 'Cafe', '', 8),
(40, 'Coca cola', '', 15),
(41, 'Crema Ponds', '', 47),
(42, 'Cepillo de Barrer', '', 50),
(43, 'Cloro', 'lts', 50),
(44, 'Cinta de Embalar', '', 53),
(45, 'Tirro', '', 53),
(46, 'Cinta pegante', '', 53),
(47, 'Teipe', '', 53),
(48, 'Teflon', '', 53),
(49, 'Cheese Wiz', '', 28),
(50, 'Mostaza', '', 28),
(51, 'Maiz', '', 28),
(52, 'Inglesa', '', 65),
(53, 'Soya', '', 65),
(54, 'Heinz 57', '', 66),
(55, 'Tomate', '', 66),
(56, 'Pasta de Tomate', '', 66),
(57, 'Agridulce', '', 66),
(58, 'Barbecue', '', 65),
(59, 'Bologna', '', 67),
(60, 'Sardina', '', 68),
(61, 'Chocolate', '', 9),
(62, 'Pimienta', '', 26),
(63, 'Ajo', '', 26),
(64, 'Carmencita', '', 26),
(65, 'Enguaje', '', 50),
(66, 'Esponjas', '', 50),
(67, 'Pañitos Cocina', '', 50),
(68, 'Velas Grandes', '', 57),
(69, 'Fosforos', '', 58),
(70, 'Velas Medianas', '', 57),
(71, 'Velas Pequeñas', '', 57),
(72, 'Hidrosuroeste', '', 39),
(73, 'PDVGAS', '', 40),
(74, 'CORPOELEC', '', 41),
(75, 'CANTV', '', 42),
(76, 'INTERCABLE', '', 43),
(77, 'Vigilante', '', 44),
(78, 'MOVISTAR', '', 45),
(79, 'Jardinero', '', 46),
(80, 'Saladas', '', 6),
(81, 'Dulces', '', 6),
(82, 'Caraota ', '', 36),
(83, 'Arvejas', '', 36),
(84, 'Lentejas', '', 36),
(85, 'Gelatina', '', 7),
(86, 'Harina Pan', '', 17),
(87, 'Harina Trigo', '', 18),
(88, 'Maizina Americana', '', 20),
(89, 'Huevos', '', 69),
(90, 'Jabon de Pasta', '', 50),
(91, 'Jabon en Polvo', '', 50),
(92, 'Jabon Lavaplatos Liquido', '', 50),
(93, 'Jabon Lavaplatos Axion', '', 50),
(94, 'Yukery', '', 14),
(95, 'Kerosene', '', 49),
(96, 'Ligas', '', 53),
(97, 'Leche en Polvo', '', 11),
(98, 'Pastoreña', '', 12),
(99, 'Condensada', '', 13),
(100, 'Enguaje Bucal', '', 48),
(101, 'Mayonesa', '', 60),
(102, 'Mantequilla', '', 59),
(103, 'Limpiahornos MAS', '', 50),
(104, 'Desinfectante MAS', '', 50),
(105, 'Fideos', '', 31),
(106, 'Papel Higienico', '', 49),
(107, 'Papel aluminio', '', 49),
(108, 'Toallin cocina', '', 49),
(109, 'Papel Film', '', 49),
(110, 'Pilas AAA', '', 49),
(111, 'Pilas AA', '', 49),
(112, 'Pilas D', '', 49),
(113, 'Panela', '', 10),
(114, 'Pollo', '', 2),
(115, 'Refrigerante Motor', '', 55),
(116, 'Insecticida Raid', '', 49),
(117, 'Sal ', '', 34),
(118, 'Sal Marina', '', 34),
(119, 'Vinagre', '', 23),
(120, 'Yogurt', '', 16),
(121, 'Varias', 'Q10, Glucosamine, Betacarotene', 52),
(122, 'Molida', '', 1),
(123, 'Guisar', '', 1),
(124, 'Asar', '', 1),
(125, 'Mortadela', '', 4),
(126, 'Cartucho HP60', '', 70);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=71 ;

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
(28, 'Amarillas', 8),
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
(62, 'Insumos', 21),
(63, 'Frutos Secos', 14),
(64, 'Cremas', 19),
(65, 'Negras', 8),
(66, 'Rojas', 8),
(67, 'Enlatadas', 8),
(68, 'Sardinas', 9),
(69, 'Huevos', 1),
(70, 'Consumibles', 26);

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
