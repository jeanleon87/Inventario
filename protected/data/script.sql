SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

DROP SCHEMA IF EXISTS `Inventario` ;
CREATE SCHEMA IF NOT EXISTS `Inventario` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `Inventario` ;

-- -----------------------------------------------------
-- Table `Inventario`.`estado`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `Inventario`.`estado` ;

CREATE TABLE IF NOT EXISTS `Inventario`.`estado` (
  `id` INT(1) NOT NULL AUTO_INCREMENT,
  `estado` VARCHAR(10) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Inventario`.`categoria`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `Inventario`.`categoria` ;

CREATE TABLE IF NOT EXISTS `Inventario`.`categoria` (
  `id` INT(10) NOT NULL AUTO_INCREMENT,
  `categoria` VARCHAR(100) NOT NULL,
  `estado_id` INT(1) NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_categoria_estado_idx` (`estado_id` ASC),
  CONSTRAINT `fk_categoria_estado`
    FOREIGN KEY (`estado_id`)
    REFERENCES `Inventario`.`estado` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Inventario`.`producto`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `Inventario`.`producto` ;

CREATE TABLE IF NOT EXISTS `Inventario`.`producto` (
  `id` INT(10) NOT NULL AUTO_INCREMENT,
  `producto` VARCHAR(100) NOT NULL,
  `descripcion` VARCHAR(255) NULL,
  `estado_id` INT(1) NOT NULL,
  `categoria_id` INT(10) NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_producto_estado1_idx` (`estado_id` ASC),
  INDEX `fk_producto_categoria1_idx` (`categoria_id` ASC),
  CONSTRAINT `fk_producto_estado1`
    FOREIGN KEY (`estado_id`)
    REFERENCES `Inventario`.`estado` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_producto_categoria1`
    FOREIGN KEY (`categoria_id`)
    REFERENCES `Inventario`.`categoria` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Inventario`.`transaccion`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `Inventario`.`transaccion` ;

CREATE TABLE IF NOT EXISTS `Inventario`.`transaccion` (
  `id` INT(10) NOT NULL AUTO_INCREMENT,
  `transaccion` VARCHAR(100) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Inventario`.`detalle`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `Inventario`.`detalle` ;

CREATE TABLE IF NOT EXISTS `Inventario`.`detalle` (
  `id` INT(10) NOT NULL AUTO_INCREMENT,
  `fecha` BIGINT(20) NOT NULL,
  `precio` FLOAT(5,2) NOT NULL,
  `cantidad` INT(10) NOT NULL,
  `exento` TINYINT(1) NULL,
  `producto_id` INT(10) NOT NULL,
  `transaccion_id` INT(10) NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_detalle_producto1_idx` (`producto_id` ASC),
  INDEX `fk_detalle_transaccion1_idx` (`transaccion_id` ASC),
  CONSTRAINT `fk_detalle_producto1`
    FOREIGN KEY (`producto_id`)
    REFERENCES `Inventario`.`producto` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_detalle_transaccion1`
    FOREIGN KEY (`transaccion_id`)
    REFERENCES `Inventario`.`transaccion` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
