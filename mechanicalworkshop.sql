SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema mechanicalworkshop
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema mechanicalworkshop
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `mechanicalworkshop` DEFAULT CHARACTER SET utf8 ;
USE `mechanicalworkshop` ;

-- -----------------------------------------------------
-- Table `mechanicalworkshop`.`person`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mechanicalworkshop`.`person` (
  `id_person` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(155) NOT NULL,
  `email` VARCHAR(255) NOT NULL,
  `password` VARCHAR(50) NOT NULL,
  `profile` VARCHAR(45) NOT NULL,
  `cpf` VARCHAR(14) NOT NULL,
  `rg` VARCHAR(10) NOT NULL,
  `phone` VARCHAR(15) NOT NULL,

  PRIMARY KEY (`id_person`),
  UNIQUE INDEX `idperson_UNIQUE` (`id_person` ASC)
) ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `mechanicalworkshop`.`admin`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mechanicalworkshop`.`admin` (
  `person_id_person` INT UNSIGNED NOT NULL,
  INDEX `fk_admin_person_idx` (`person_id_person` ASC),
  CONSTRAINT `fk_admin_person`
    FOREIGN KEY (`person_id_person`)
    REFERENCES `mechanicalworkshop`.`person` (`id_person`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mechanicalworkshop`.`mechanic`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mechanicalworkshop`.`mechanic` (
  `person_id_person` INT UNSIGNED NOT NULL,
  `status` TINYINT NOT NULL,
  `specialty` VARCHAR(100) NOT NULL,
  INDEX `fk_mechanic_person1_idx` (`person_id_person` ASC),
  CONSTRAINT `fk_mechanic_person1`
    FOREIGN KEY (`person_id_person`)
    REFERENCES `mechanicalworkshop`.`person` (`id_person`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mechanicalworkshop`.`verification_code`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mechanicalworkshop`.`verification_code` (
  `code` INT NOT NULL,
  `code_used` TINYINT NOT NULL,
  `code_time` TIMESTAMP(6) NOT NULL,
  `person_id_person` INT UNSIGNED NOT NULL,
  INDEX `fk_verification_code_person1_idx` (`person_id_person` ASC),
  CONSTRAINT `fk_verification_code_person1`
    FOREIGN KEY (`person_id_person`)
    REFERENCES `mechanicalworkshop`.`person` (`id_person`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mechanicalworkshop`.`client`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mechanicalworkshop`.`client` (
  `id_client` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(155) NOT NULL,
  `email` VARCHAR(255) NOT NULL,
  `cpf` VARCHAR(11) NOT NULL,
  `rg` VARCHAR(10) NOT NULL,
  `address` VARCHAR(255) NOT NULL,
  `phone` VARCHAR(15) NOT NULL,
  PRIMARY KEY (`id_client`),
  UNIQUE INDEX `idclient_UNIQUE` (`id_client` ASC),
  UNIQUE INDEX `email_UNIQUE` (`email` ASC),
  UNIQUE INDEX `cpf_UNIQUE` (`cpf` ASC),
  UNIQUE INDEX `rg_UNIQUE` (`rg` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mechanicalworkshop`.`vehicle`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mechanicalworkshop`.`vehicle` (
  `id_vehicle` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(155) NOT NULL,
  `color` VARCHAR(155) NOT NULL,
  `license_plate` VARCHAR(255) NOT NULL,
  `model` VARCHAR(155) NOT NULL,
  `mileage` VARCHAR(155) NOT NULL,
  PRIMARY KEY (`id_vehicle`),
  UNIQUE INDEX `idvehicle_UNIQUE` (`id_vehicle` ASC),
  UNIQUE INDEX `license_plate_UNIQUE` (`license_plate` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mechanicalworkshop`.`vehicle_client`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mechanicalworkshop`.`vehicle_client` (
  `client_id_client_fk` INT UNSIGNED NOT NULL,
  `vehicle_id_vehicle_fk` INT UNSIGNED NOT NULL,
  INDEX `fk_client_has_vehicle_vehicle1_idx` (`vehicle_id_vehicle_fk` ASC),
  INDEX `fk_client_has_vehicle_client1_idx` (`client_id_client_fk` ASC),
  CONSTRAINT `fk_client_has_vehicle_client1`
    FOREIGN KEY (`client_id_client_fk`)
    REFERENCES `mechanicalworkshop`.`client` (`id_client`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_client_has_vehicle_vehicle1`
    FOREIGN KEY (`vehicle_id_vehicle_fk`)
    REFERENCES `mechanicalworkshop`.`vehicle` (`id_vehicle`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mechanicalworkshop`.`part`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mechanicalworkshop`.`part` (
  `id_part` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(155) NOT NULL,
  `type` VARCHAR(155) NOT NULL,
  `manufacturer` VARCHAR(155) NOT NULL,
  `quantity` VARCHAR(100) NOT NULL,
  `cost` VARCHAR(100) NOT NULL,
  `manufacture_year` VARCHAR(100) NOT NULL,
  PRIMARY KEY (`id_part`),
  UNIQUE INDEX `idpart_UNIQUE` (`id_part` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mechanicalworkshop`.`mechanic_team`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mechanicalworkshop`.`mechanic_team` (
  `id_mechanic_team` INT UNSIGNED NOT NULL,
  `name` VARCHAR(155) NOT NULL,
  `function` VARCHAR(155) NOT NULL,
  `mechanic_person_id_person` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`id_mechanic_team`),
  UNIQUE INDEX `idmechanic_team_UNIQUE` (`id_mechanic_team` ASC),
  INDEX `fk_mechanic_team_mechanic1_idx` (`mechanic_person_id_person` ASC),
  CONSTRAINT `fk_mechanic_team_mechanic1`
    FOREIGN KEY (`mechanic_person_id_person`)
    REFERENCES `mechanicalworkshop`.`mechanic` (`person_id_person`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mechanicalworkshop`.`service_order`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mechanicalworkshop`.`service_order` (
  `id_service_order` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `part_id_part` INT UNSIGNED NOT NULL,
  `entry_date` DATETIME NOT NULL,
  `exit_date` DATETIME NOT NULL,
  `defect_description` VARCHAR(255) NOT NULL,
  `vehicle_id_vehicle_fk` INT UNSIGNED NOT NULL,
  `client_id_client_fk` INT UNSIGNED NOT NULL,
  `admin_person_id_person_fk` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`id_service_order`),
  UNIQUE INDEX `id_service_order_UNIQUE` (`id_service_order` ASC) VISIBLE,
  INDEX `fk_service_order_vehicle1_idx` (`vehicle_id_vehicle_fk` ASC) VISIBLE,
  INDEX `fk_service_order_client1_idx` (`client_id_client_fk` ASC) VISIBLE,
  INDEX `fk_service_order_admin1_idx` (`admin_person_id_person_fk` ASC) VISIBLE,
  CONSTRAINT `fk_service_order_vehicle1`
    FOREIGN KEY (`vehicle_id_vehicle_fk`)
    REFERENCES `mechanicalworkshop`.`vehicle` (`id_vehicle`),
  CONSTRAINT `fk_service_order_client1`
    FOREIGN KEY (`client_id_client_fk`)
    REFERENCES `mechanicalworkshop`.`client` (`id_client`),
  CONSTRAINT `fk_service_order_admin1`
    FOREIGN KEY (`admin_person_id_person_fk`)
    REFERENCES `mechanicalworkshop`.`admin` (`person_id_person`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `mechanicalworkshop`.`part_service_order`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mechanicalworkshop`.`part_service_order` (
  `part_id_part` INT UNSIGNED NOT NULL,
  `service_order_id_service_order` INT UNSIGNED NOT NULL,
  INDEX `fk_part_has_service_order_service_order1_idx` (`service_order_id_service_order` ASC),
  INDEX `fk_part_has_service_order_part1_idx` (`part_id_part` ASC),
  UNIQUE INDEX `part_id_part_UNIQUE` (`part_id_part` ASC),
  UNIQUE INDEX `service_order_id_service_order_UNIQUE` (`service_order_id_service_order` ASC),
  CONSTRAINT `fk_part_has_service_order_part1`
    FOREIGN KEY (`part_id_part`)
    REFERENCES `mechanicalworkshop`.`part` (`id_part`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_part_has_service_order_service_order1`
    FOREIGN KEY (`service_order_id_service_order`)
    REFERENCES `mechanicalworkshop`.`service_order` (`id_service_order`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
