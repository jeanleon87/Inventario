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
  `estado_id` int(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_categoria_estado_idx` (`estado_id`),
  CONSTRAINT `fk_categoria_estado` FOREIGN KEY (`estado_id`) REFERENCES `estado` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- -------------------------------------------
-- TABLE `detalle`
-- -------------------------------------------
DROP TABLE IF EXISTS `detalle`;
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
  KEY `fk_detalle_transaccion1_idx` (`transaccion_id`),
  CONSTRAINT `fk_detalle_producto1` FOREIGN KEY (`producto_id`) REFERENCES `producto` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_detalle_transaccion1` FOREIGN KEY (`transaccion_id`) REFERENCES `transaccion` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- -------------------------------------------
-- TABLE `estado`
-- -------------------------------------------
DROP TABLE IF EXISTS `estado`;
CREATE TABLE IF NOT EXISTS `estado` (
  `id` int(1) NOT NULL AUTO_INCREMENT,
  `estado` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- -------------------------------------------
-- TABLE `producto`
-- -------------------------------------------
DROP TABLE IF EXISTS `producto`;
CREATE TABLE IF NOT EXISTS `producto` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `producto` varchar(100) NOT NULL,
  `descripcion` varchar(255) DEFAULT NULL,
  `estado_id` int(1) NOT NULL,
  `categoria_id` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_producto_estado1_idx` (`estado_id`),
  KEY `fk_producto_categoria1_idx` (`categoria_id`),
  CONSTRAINT `fk_producto_categoria1` FOREIGN KEY (`categoria_id`) REFERENCES `categoria` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_producto_estado1` FOREIGN KEY (`estado_id`) REFERENCES `estado` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

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
INSERT INTO `categoria` (`id`,`categoria`,`estado_id`) VALUES
('1','Alimentos','1');



-- -------------------------------------------
-- TABLE DATA detalle
-- -------------------------------------------
INSERT INTO `detalle` (`id`,`fecha`,`precio`,`cantidad`,`exento`,`comentario`,`producto_id`,`transaccion_id`) VALUES
('1','1424908800','0.00','0','0','Creacion del producto','1','3');
INSERT INTO `detalle` (`id`,`fecha`,`precio`,`cantidad`,`exento`,`comentario`,`producto_id`,`transaccion_id`) VALUES
('2','1422835200','100.00','2','','','1','1');



-- -------------------------------------------
-- TABLE DATA estado
-- -------------------------------------------
INSERT INTO `estado` (`id`,`estado`) VALUES
('1','Activo');
INSERT INTO `estado` (`id`,`estado`) VALUES
('2','Inactivo');



-- -------------------------------------------
-- TABLE DATA producto
-- -------------------------------------------
INSERT INTO `producto` (`id`,`producto`,`descripcion`,`estado_id`,`categoria_id`) VALUES
('1','Atun','','1','1');



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
