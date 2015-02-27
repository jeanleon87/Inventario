-- -------------------------------------------
SET AUTOCOMMIT=0;
START TRANSACTION;
SET SQL_QUOTE_SHOW_CREATE = 1;
SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
-- -------------------------------------------
-- -------------------------------------------
-- START BACKUP
-- -------------------------------------------
-- -------------------------------------------
-- TABLE `categoria`
-- -------------------------------------------
DROP TABLE IF EXISTS `categoria`;
CREATE TABLE IF NOT EXISTS `categoria` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `categoria` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8;

-- -------------------------------------------
-- TABLE `detalle`
-- -------------------------------------------
DROP TABLE IF EXISTS `detalle`;
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
  KEY `fk_detalle_transaccion1_idx` (`transaccion_id`),
  CONSTRAINT `fk_detalle_producto1` FOREIGN KEY (`producto_id`) REFERENCES `producto` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_detalle_transaccion1` FOREIGN KEY (`transaccion_id`) REFERENCES `transaccion` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- -------------------------------------------
-- TABLE `producto`
-- -------------------------------------------
DROP TABLE IF EXISTS `producto`;
CREATE TABLE IF NOT EXISTS `producto` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `producto` varchar(100) NOT NULL,
  `descripcion` varchar(255) DEFAULT NULL,
  `subcategoria_id` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_producto_subcategoria1_idx` (`subcategoria_id`),
  CONSTRAINT `fk_producto_subcategoria1` FOREIGN KEY (`subcategoria_id`) REFERENCES `subcategoria` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- -------------------------------------------
-- TABLE `subcategoria`
-- -------------------------------------------
DROP TABLE IF EXISTS `subcategoria`;
CREATE TABLE IF NOT EXISTS `subcategoria` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `subcategoria` varchar(100) NOT NULL,
  `categoria_id` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_subcategoria_categoria1_idx` (`categoria_id`),
  CONSTRAINT `fk_subcategoria_categoria1` FOREIGN KEY (`categoria_id`) REFERENCES `categoria` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=62 DEFAULT CHARSET=utf8;

-- -------------------------------------------
-- TABLE `transaccion`
-- -------------------------------------------
DROP TABLE IF EXISTS `transaccion`;
CREATE TABLE IF NOT EXISTS `transaccion` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `transaccion` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- -------------------------------------------
-- TABLE DATA categoria
-- -------------------------------------------
INSERT INTO `categoria` (`id`,`categoria`) VALUES
('1','Carnes y Embutidos');
INSERT INTO `categoria` (`id`,`categoria`) VALUES
('2','Galletas y Gelatinas');
INSERT INTO `categoria` (`id`,`categoria`) VALUES
('3','Cafe, Chocolate y Panela');
INSERT INTO `categoria` (`id`,`categoria`) VALUES
('4','Lacteos, Jugos, Refrescos');
INSERT INTO `categoria` (`id`,`categoria`) VALUES
('5','Harinas');
INSERT INTO `categoria` (`id`,`categoria`) VALUES
('6','Aceites y Vinagres');
INSERT INTO `categoria` (`id`,`categoria`) VALUES
('7','Condimentos, Cubitos, Especies y Sopas');
INSERT INTO `categoria` (`id`,`categoria`) VALUES
('8','Salsas');
INSERT INTO `categoria` (`id`,`categoria`) VALUES
('9','Enlatados y Conservas');
INSERT INTO `categoria` (`id`,`categoria`) VALUES
('11','Pastas y Arroces');
INSERT INTO `categoria` (`id`,`categoria`) VALUES
('13','Azucar y Sal');
INSERT INTO `categoria` (`id`,`categoria`) VALUES
('14','Cereales y Granos');
INSERT INTO `categoria` (`id`,`categoria`) VALUES
('17','Licores');
INSERT INTO `categoria` (`id`,`categoria`) VALUES
('18','Servicios');
INSERT INTO `categoria` (`id`,`categoria`) VALUES
('19','Cosmética y Aseo Personal');
INSERT INTO `categoria` (`id`,`categoria`) VALUES
('20','Hogar y Limpieza');
INSERT INTO `categoria` (`id`,`categoria`) VALUES
('21','Medicinas y Vitaminas');
INSERT INTO `categoria` (`id`,`categoria`) VALUES
('22','Articulos de Oficina');
INSERT INTO `categoria` (`id`,`categoria`) VALUES
('23','Vehiculo');
INSERT INTO `categoria` (`id`,`categoria`) VALUES
('24','Velas y Fosforos');
INSERT INTO `categoria` (`id`,`categoria`) VALUES
('25','Mantequilla y Mayonesa');



-- -------------------------------------------
-- TABLE DATA detalle
-- -------------------------------------------
INSERT INTO `detalle` (`id`,`fecha`,`precio`,`cantidad`,`comentario`,`producto_id`,`transaccion_id`) VALUES
('1','1420070400','0.00','28.00','Creacion del producto','1','3');
INSERT INTO `detalle` (`id`,`fecha`,`precio`,`cantidad`,`comentario`,`producto_id`,`transaccion_id`) VALUES
('2','1420934400','0.00','-1.00','Casa','1','2');
INSERT INTO `detalle` (`id`,`fecha`,`precio`,`cantidad`,`comentario`,`producto_id`,`transaccion_id`) VALUES
('3','1422144000','0.00','-3.00','Casa y Jean','1','2');
INSERT INTO `detalle` (`id`,`fecha`,`precio`,`cantidad`,`comentario`,`producto_id`,`transaccion_id`) VALUES
('4','1420070400','0.00','9.00','Creacion del producto','2','3');
INSERT INTO `detalle` (`id`,`fecha`,`precio`,`cantidad`,`comentario`,`producto_id`,`transaccion_id`) VALUES
('5','1422316800','0.00','-2.00','Casa y Mama','2','2');
INSERT INTO `detalle` (`id`,`fecha`,`precio`,`cantidad`,`comentario`,`producto_id`,`transaccion_id`) VALUES
('6','1423872000','0.00','-1.00','','2','2');
INSERT INTO `detalle` (`id`,`fecha`,`precio`,`cantidad`,`comentario`,`producto_id`,`transaccion_id`) VALUES
('7','1424908800','0.00','-1.00','Mama','2','2');
INSERT INTO `detalle` (`id`,`fecha`,`precio`,`cantidad`,`comentario`,`producto_id`,`transaccion_id`) VALUES
('8','1424908800','43.90','1.00','','2','1');
INSERT INTO `detalle` (`id`,`fecha`,`precio`,`cantidad`,`comentario`,`producto_id`,`transaccion_id`) VALUES
('9','1420070400','0.00','3.00','Creacion del producto','3','3');
INSERT INTO `detalle` (`id`,`fecha`,`precio`,`cantidad`,`comentario`,`producto_id`,`transaccion_id`) VALUES
('10','1420070400','0.00','33.00','Creacion del producto','4','3');



-- -------------------------------------------
-- TABLE DATA producto
-- -------------------------------------------
INSERT INTO `producto` (`id`,`producto`,`descripcion`,`subcategoria_id`) VALUES
('1','Atun','','29');
INSERT INTO `producto` (`id`,`producto`,`descripcion`,`subcategoria_id`) VALUES
('2','Arroz','','32');
INSERT INTO `producto` (`id`,`producto`,`descripcion`,`subcategoria_id`) VALUES
('3','Avena','','61');
INSERT INTO `producto` (`id`,`producto`,`descripcion`,`subcategoria_id`) VALUES
('4','Azucar','','33');



-- -------------------------------------------
-- TABLE DATA subcategoria
-- -------------------------------------------
INSERT INTO `subcategoria` (`id`,`subcategoria`,`categoria_id`) VALUES
('1','Carnes','1');
INSERT INTO `subcategoria` (`id`,`subcategoria`,`categoria_id`) VALUES
('2','Pollo','1');
INSERT INTO `subcategoria` (`id`,`subcategoria`,`categoria_id`) VALUES
('3','Tocino','1');
INSERT INTO `subcategoria` (`id`,`subcategoria`,`categoria_id`) VALUES
('4','Mortadela','1');
INSERT INTO `subcategoria` (`id`,`subcategoria`,`categoria_id`) VALUES
('5','Queso','1');
INSERT INTO `subcategoria` (`id`,`subcategoria`,`categoria_id`) VALUES
('6','Galletas','2');
INSERT INTO `subcategoria` (`id`,`subcategoria`,`categoria_id`) VALUES
('7','Gelatinas','2');
INSERT INTO `subcategoria` (`id`,`subcategoria`,`categoria_id`) VALUES
('8','Cafe','3');
INSERT INTO `subcategoria` (`id`,`subcategoria`,`categoria_id`) VALUES
('9','Chocolate','3');
INSERT INTO `subcategoria` (`id`,`subcategoria`,`categoria_id`) VALUES
('10','Panela','3');
INSERT INTO `subcategoria` (`id`,`subcategoria`,`categoria_id`) VALUES
('11','Leche en Polvo','4');
INSERT INTO `subcategoria` (`id`,`subcategoria`,`categoria_id`) VALUES
('12','Leche Liquida','4');
INSERT INTO `subcategoria` (`id`,`subcategoria`,`categoria_id`) VALUES
('13','Leche Condensada','4');
INSERT INTO `subcategoria` (`id`,`subcategoria`,`categoria_id`) VALUES
('14','Jugos','4');
INSERT INTO `subcategoria` (`id`,`subcategoria`,`categoria_id`) VALUES
('15','Refrescos','4');
INSERT INTO `subcategoria` (`id`,`subcategoria`,`categoria_id`) VALUES
('16','Yogurt','4');
INSERT INTO `subcategoria` (`id`,`subcategoria`,`categoria_id`) VALUES
('17','Pan','5');
INSERT INTO `subcategoria` (`id`,`subcategoria`,`categoria_id`) VALUES
('18','Trigo','5');
INSERT INTO `subcategoria` (`id`,`subcategoria`,`categoria_id`) VALUES
('19','Cachapas','5');
INSERT INTO `subcategoria` (`id`,`subcategoria`,`categoria_id`) VALUES
('20','Maizina','5');
INSERT INTO `subcategoria` (`id`,`subcategoria`,`categoria_id`) VALUES
('21','Vegetal','6');
INSERT INTO `subcategoria` (`id`,`subcategoria`,`categoria_id`) VALUES
('22','Oliva','6');
INSERT INTO `subcategoria` (`id`,`subcategoria`,`categoria_id`) VALUES
('23','Vinagre','6');
INSERT INTO `subcategoria` (`id`,`subcategoria`,`categoria_id`) VALUES
('24','Condimentos','7');
INSERT INTO `subcategoria` (`id`,`subcategoria`,`categoria_id`) VALUES
('25','Cubitos','7');
INSERT INTO `subcategoria` (`id`,`subcategoria`,`categoria_id`) VALUES
('26','Especias','7');
INSERT INTO `subcategoria` (`id`,`subcategoria`,`categoria_id`) VALUES
('27','Sopas','7');
INSERT INTO `subcategoria` (`id`,`subcategoria`,`categoria_id`) VALUES
('28','Varias','8');
INSERT INTO `subcategoria` (`id`,`subcategoria`,`categoria_id`) VALUES
('29','Enlatados','9');
INSERT INTO `subcategoria` (`id`,`subcategoria`,`categoria_id`) VALUES
('30','Conservas','9');
INSERT INTO `subcategoria` (`id`,`subcategoria`,`categoria_id`) VALUES
('31','Pastas','11');
INSERT INTO `subcategoria` (`id`,`subcategoria`,`categoria_id`) VALUES
('32','Arroces','11');
INSERT INTO `subcategoria` (`id`,`subcategoria`,`categoria_id`) VALUES
('33','Azucar','13');
INSERT INTO `subcategoria` (`id`,`subcategoria`,`categoria_id`) VALUES
('34','Sal','13');
INSERT INTO `subcategoria` (`id`,`subcategoria`,`categoria_id`) VALUES
('35','Cereales','14');
INSERT INTO `subcategoria` (`id`,`subcategoria`,`categoria_id`) VALUES
('36','Granos','14');
INSERT INTO `subcategoria` (`id`,`subcategoria`,`categoria_id`) VALUES
('37','Whisky','17');
INSERT INTO `subcategoria` (`id`,`subcategoria`,`categoria_id`) VALUES
('38','Vinos','17');
INSERT INTO `subcategoria` (`id`,`subcategoria`,`categoria_id`) VALUES
('39','Agua (HSO)','18');
INSERT INTO `subcategoria` (`id`,`subcategoria`,`categoria_id`) VALUES
('40','Gas (PDVGAS)','18');
INSERT INTO `subcategoria` (`id`,`subcategoria`,`categoria_id`) VALUES
('41','Luz (CORPOELEC)','18');
INSERT INTO `subcategoria` (`id`,`subcategoria`,`categoria_id`) VALUES
('42','Telefono (CANTV)','18');
INSERT INTO `subcategoria` (`id`,`subcategoria`,`categoria_id`) VALUES
('43','Tv Cable (INTERCABLE)','18');
INSERT INTO `subcategoria` (`id`,`subcategoria`,`categoria_id`) VALUES
('44','Vigilante Barrio','18');
INSERT INTO `subcategoria` (`id`,`subcategoria`,`categoria_id`) VALUES
('45','Recarga Movistar','18');
INSERT INTO `subcategoria` (`id`,`subcategoria`,`categoria_id`) VALUES
('46','Jardinero','18');
INSERT INTO `subcategoria` (`id`,`subcategoria`,`categoria_id`) VALUES
('47','Cosmetica','19');
INSERT INTO `subcategoria` (`id`,`subcategoria`,`categoria_id`) VALUES
('48','Aseo Personal','19');
INSERT INTO `subcategoria` (`id`,`subcategoria`,`categoria_id`) VALUES
('49','Hogar','20');
INSERT INTO `subcategoria` (`id`,`subcategoria`,`categoria_id`) VALUES
('50','Limpieza','20');
INSERT INTO `subcategoria` (`id`,`subcategoria`,`categoria_id`) VALUES
('51','Medicina','21');
INSERT INTO `subcategoria` (`id`,`subcategoria`,`categoria_id`) VALUES
('52','Vitaminas','21');
INSERT INTO `subcategoria` (`id`,`subcategoria`,`categoria_id`) VALUES
('53','Varios','22');
INSERT INTO `subcategoria` (`id`,`subcategoria`,`categoria_id`) VALUES
('54','Repuestos','23');
INSERT INTO `subcategoria` (`id`,`subcategoria`,`categoria_id`) VALUES
('55','Liquidos','23');
INSERT INTO `subcategoria` (`id`,`subcategoria`,`categoria_id`) VALUES
('56','Accesorios','23');
INSERT INTO `subcategoria` (`id`,`subcategoria`,`categoria_id`) VALUES
('57','Velas','24');
INSERT INTO `subcategoria` (`id`,`subcategoria`,`categoria_id`) VALUES
('58','Fosforos','24');
INSERT INTO `subcategoria` (`id`,`subcategoria`,`categoria_id`) VALUES
('59','Mantequillas','25');
INSERT INTO `subcategoria` (`id`,`subcategoria`,`categoria_id`) VALUES
('60','Mayonesas','25');
INSERT INTO `subcategoria` (`id`,`subcategoria`,`categoria_id`) VALUES
('61','Avenas','14');



-- -------------------------------------------
-- TABLE DATA transaccion
-- -------------------------------------------
INSERT INTO `transaccion` (`id`,`transaccion`) VALUES
('1','Ingreso');
INSERT INTO `transaccion` (`id`,`transaccion`) VALUES
('2','Egreso');
INSERT INTO `transaccion` (`id`,`transaccion`) VALUES
('3','Asiento Inicial');



-- -------------------------------------------
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
COMMIT;
-- -------------------------------------------
-- -------------------------------------------
-- END BACKUP
-- -------------------------------------------
