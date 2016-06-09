-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema prosdevTodo
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema prosdevTodo
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `prosdevTodo` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `prosdevTodo` ;

-- -----------------------------------------------------
-- Table `prosdevTodo`.`user`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `prosdevTodo`.`user` (
  `iduser` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NOT NULL,
  `email` VARCHAR(45) NOT NULL,
  `password` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`iduser`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `prosdevTodo`.`task`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `prosdevTodo`.`task` (
  `idTask` INT NOT NULL AUTO_INCREMENT,
  `idUser` INT NOT NULL,
  `task` VARCHAR(45) NOT NULL,
  `description` VARCHAR(150) NULL,
  `deadline` DATE NOT NULL,
  `worktag` TINYINT(1) NOT NULL DEFAULT 0,
  `schooltag` TINYINT(1) NOT NULL DEFAULT 0,
  `familytag` TINYINT(1) NOT NULL DEFAULT 0,
  `personaltag` TINYINT(1) NOT NULL DEFAULT 0,
  `notag` TINYINT(1) NOT NULL DEFAULT 1,
  `usertag` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idTask`))
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
