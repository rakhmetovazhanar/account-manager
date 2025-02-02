-- MySQL Script generated by MySQL Workbench
-- Mon Feb  3 02:40:44 2025
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
-- -----------------------------------------------------
-- Schema zimalabdb
-- -----------------------------------------------------
DROP SCHEMA IF EXISTS `zimalabdb` ;

-- -----------------------------------------------------
-- Schema zimalabdb
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `zimalabdb` DEFAULT CHARACTER SET utf8mb4 ;
USE `zimalabdb` ;

-- -----------------------------------------------------
-- Table `zimalabdb`.`accounts`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `zimalabdb`.`accounts` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `first_name` VARCHAR(50) NOT NULL,
  `last_name` VARCHAR(50) NOT NULL,
  `email` VARCHAR(100) NOT NULL,
  `company` VARCHAR(100) NULL DEFAULT NULL,
  `position` VARCHAR(100) NULL DEFAULT NULL,
  `phone1` VARCHAR(20) NULL DEFAULT NULL,
  `phone2` VARCHAR(20) NULL DEFAULT NULL,
  `phone3` VARCHAR(20) NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `email` (`email` ASC) VISIBLE)
ENGINE = InnoDB
AUTO_INCREMENT = 60
DEFAULT CHARACTER SET = utf8mb4;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
