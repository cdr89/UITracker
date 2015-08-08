SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

DROP SCHEMA IF EXISTS `uitracker` ;
CREATE SCHEMA IF NOT EXISTS `uitracker` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `uitracker` ;

-- -----------------------------------------------------
-- Table `uitracker`.`UserEvent`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `uitracker`.`UserEvent` ;

CREATE TABLE IF NOT EXISTS `uitracker`.`UserEvent` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `category` VARCHAR(45) NOT NULL,
  `action` VARCHAR(45) NOT NULL,
  `label` VARCHAR(45) NULL,
  `value` VARCHAR(45) NULL,
  `userId` INT NULL,
  `userToken` VARCHAR(45) NULL,
  `ipAddress` VARCHAR(45) NOT NULL,
  `dateTime` DATETIME NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
