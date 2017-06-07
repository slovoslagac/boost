-- MySQL Script generated by MySQL Workbench
-- 06/08/17 00:28:14
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema doorkeeper
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema doorkeeper
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `doorkeeper` DEFAULT CHARACTER SET utf8 ;
USE `doorkeeper` ;

-- -----------------------------------------------------
-- Table `doorkeeper`.`orders`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `doorkeeper`.`orders` (
  `id` INT(5) NOT NULL AUTO_INCREMENT,
  `boostusername` VARCHAR(50) NOT NULL,
  `server` INT(5) NOT NULL,
  `startdiv` INT(5) NOT NULL,
  `enddiv` INT(5) NOT NULL,
  `points` INT(10) NOT NULL,
  `price` INT(10) NOT NULL,
  `status` INT(1) NULL,
  `playerid` INT(5) NULL,
  `create_time` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `unique` (`boostusername` ASC, `server` ASC, `startdiv` ASC),
  INDEX `index1` (`id` ASC))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `doorkeeper`.`ranks`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `doorkeeper`.`ranks` (
  `id` INT(5) NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NOT NULL,
  `order` INT(5) NOT NULL,
  `shortname` VARCHAR(10) NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `unique` (`name` ASC),
  INDEX `index1` (`id` ASC))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `doorkeeper`.`servers`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `doorkeeper`.`servers` (
  `id` INT(5) NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NOT NULL,
  `shortname` VARCHAR(10) NOT NULL,
  `shortname2` VARCHAR(10) NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `unique` (`name` ASC),
  INDEX `index1` (`id` ASC))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `doorkeeper`.`users`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `doorkeeper`.`users` (
  `id` INT(5) NOT NULL AUTO_INCREMENT,
  `username` VARCHAR(45) NOT NULL,
  `name` VARCHAR(45) NOT NULL,
  `email` VARCHAR(100) NOT NULL,
  `password` VARCHAR(45) NOT NULL,
  `ggusername` VARCHAR(45) NULL,
  `ggpassword` VARCHAR(45) NULL,
  `status` INT(1) NULL,
  `create_time` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
  INDEX `index1` (`id` ASC),
  UNIQUE INDEX `unique` (`email` ASC),
  PRIMARY KEY (`id`));


-- -----------------------------------------------------
-- Table `doorkeeper`.`apiSummoners`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `doorkeeper`.`apiSummoners` (
  `id` INT(5) NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NOT NULL,
  `status` INT(1) NULL,
  `profileiconid` INT(5) NULL,
  `summonerLevel` INT(5) NULL,
  `accountid` INT(5) NULL,
  `summonerid` INT(5) NULL,
  `revisiondate` VARCHAR(15) NULL,
  `create_time` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
  INDEX `index1` (`id` ASC),
  PRIMARY KEY (`id`));


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;