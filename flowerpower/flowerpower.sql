-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS = @@UNIQUE_CHECKS, UNIQUE_CHECKS = 0;
SET @OLD_FOREIGN_KEY_CHECKS = @@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS = 0;
SET @OLD_SQL_MODE = @@SQL_MODE, SQL_MODE =
        'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema flowerpower
-- -----------------------------------------------------
DROP SCHEMA IF EXISTS `flowerpower`;

-- -----------------------------------------------------
-- Schema flowerpower
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `flowerpower` DEFAULT CHARACTER SET utf8;
USE `flowerpower`;

-- -----------------------------------------------------
-- Table `flowerpower`.`winkel`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `flowerpower`.`winkel`;

CREATE TABLE IF NOT EXISTS `flowerpower`.`winkel`
(
    `idwinkel`   INT          NOT NULL AUTO_INCREMENT,
    `naam`       VARCHAR(45)  NOT NULL,
    `adres`      VARCHAR(254) NULL,
    `huisnummer` VARCHAR(45)  NULL,
    `postcode`   VARCHAR(6)   NULL,
    `plaats`     VARCHAR(45)  NULL,
    `telefoon`   VARCHAR(10)  NULL,
    `email`      VARCHAR(254) NULL,
    `afbeelding` VARCHAR(45)  NULL,
    PRIMARY KEY (`idwinkel`)
)
    ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `flowerpower`.`klant`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `flowerpower`.`klant`;

CREATE TABLE IF NOT EXISTS `flowerpower`.`klant`
(
    `idklant`       INT          NOT NULL AUTO_INCREMENT,
    `naam`          VARCHAR(45)  NULL,
    `tussenvoegsel` VARCHAR(45)  NULL,
    `achternaam`    VARCHAR(45)  NULL,
    `adres`         VARCHAR(254) NULL,
    `huisnummer`    INT(10)      NULL,
    `postcode`      VARCHAR(6)   NULL,
    `plaats`        VARCHAR(45)  NULL,
    `telefoon`      INT(10)      NULL,
    `email`         VARCHAR(254) NULL,
    `geboortedatum` VARCHAR(45)  NULL,
    `wachtwoord`    VARCHAR(45)  NOT NULL,
    PRIMARY KEY (`idklant`)
)
    ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `flowerpower`.`medewerker`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `flowerpower`.`medewerker`;

CREATE TABLE IF NOT EXISTS `flowerpower`.`medewerker`
(
    `idmedewerker`   INT         NOT NULL AUTO_INCREMENT,
    `naam`           VARCHAR(45) NULL,
    `tussenvoegsel`  VARCHAR(45) NULL,
    `achternaam`     VARCHAR(45) NULL,
    `rol`            VARCHAR(45) NULL,
    `wachtwoord`     VARCHAR(45) NOT NULL,
    `email`          VARCHAR(45) NULL,
    `telefoonnummer` VARCHAR(10) NULL,
    `geboortedatum`  VARCHAR(45) NULL,
    PRIMARY KEY (`idmedewerker`)
)
    ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `flowerpower`.`categorie`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `flowerpower`.`categorie`;

CREATE TABLE IF NOT EXISTS `flowerpower`.`categorie`
(
    `idcategorie` INT                             NOT NULL AUTO_INCREMENT,
    `naam`        VARCHAR(45)                     NOT NULL,
    `afbeelding`  VARCHAR(45)                     NOT NULL,
    `bg`          ENUM ('BLOEMEN', 'GELEGENHEID') NOT NULL,
    PRIMARY KEY (`idcategorie`)
)
    ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `flowerpower`.`artikel`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `flowerpower`.`artikel`;

CREATE TABLE IF NOT EXISTS `flowerpower`.`artikel`
(
    `idartikel`    INT                             NOT NULL AUTO_INCREMENT,
    `naam`         VARCHAR(45)                     NULL,
    `omschrijving` VARCHAR(254)                    NULL,
    `prijs`        VARCHAR(45)                     NULL,
    `afbeelding`   VARCHAR(45)                     NULL,
    `idcategorie`  INT                             NOT NULL,
    `bg`           ENUM ('BLOEMEN', 'GELEGENHEID') NOT NULL,
    PRIMARY KEY (`idartikel`),
    INDEX `fk_artikel_categorieën1_idx` (`idcategorie` ASC),
    CONSTRAINT `fk_artikel_categorieën1`
        FOREIGN KEY (`idcategorie`)
            REFERENCES `flowerpower`.`categorie` (`idcategorie`)
            ON DELETE NO ACTION
            ON UPDATE NO ACTION
)
    ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `flowerpower`.`factuur`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `flowerpower`.`factuur`;

CREATE TABLE IF NOT EXISTS `flowerpower`.`factuur`
(
    `idfactuur`    INT                NOT NULL AUTO_INCREMENT,
    `idklant`      INT                NOT NULL,
    `datum`        DATE               NULL,
    `afgehaald`    ENUM ('JA', 'NEE') NOT NULL,
    `idmedewerker` INT                NULL,
    PRIMARY KEY (`idfactuur`),
    INDEX `fk_factuur_klant_idx` (`idklant` ASC),
    INDEX `fk_factuur_medewerker1_idx` (`idmedewerker` ASC),
    CONSTRAINT `fk_factuur_klant`
        FOREIGN KEY (`idklant`)
            REFERENCES `flowerpower`.`klant` (`idklant`)
            ON DELETE NO ACTION
            ON UPDATE NO ACTION,
    CONSTRAINT `fk_factuur_medewerker1`
        FOREIGN KEY (`idmedewerker`)
            REFERENCES `flowerpower`.`medewerker` (`idmedewerker`)
            ON DELETE NO ACTION
            ON UPDATE NO ACTION
)
    ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `flowerpower`.`artikel_has_factuur`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `flowerpower`.`artikel_has_factuur`;

CREATE TABLE IF NOT EXISTS `flowerpower`.`artikel_has_factuur`
(
    `artikel_idartikel` INT         NOT NULL,
    `factuur_idfactuur` INT         NOT NULL,
    `aantal`            INT         NULL,
    `totaalPrijs`       VARCHAR(45) NOT NULL,
    PRIMARY KEY (`artikel_idartikel`, `factuur_idfactuur`),
    INDEX `fk_artikel_has_factuur_factuur1_idx` (`factuur_idfactuur` ASC),
    INDEX `fk_artikel_has_factuur_artikel1_idx` (`artikel_idartikel` ASC),
    CONSTRAINT `fk_artikel_has_factuur_artikel1`
        FOREIGN KEY (`artikel_idartikel`)
            REFERENCES `flowerpower`.`artikel` (`idartikel`)
            ON DELETE NO ACTION
            ON UPDATE NO ACTION,
    CONSTRAINT `fk_artikel_has_factuur_factuur1`
        FOREIGN KEY (`factuur_idfactuur`)
            REFERENCES `flowerpower`.`factuur` (`idfactuur`)
            ON DELETE NO ACTION
            ON UPDATE NO ACTION
)
    ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `flowerpower`.`contact`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `flowerpower`.`contact`;

CREATE TABLE IF NOT EXISTS `flowerpower`.`contact`
(
    `idcontact` INT         NOT NULL AUTO_INCREMENT,
    `naam`      VARCHAR(45) NULL,
    `telefoon`  VARCHAR(45) NULL,
    `email`     VARCHAR(45) NULL,
    `notitie`   VARCHAR(45) NULL,
    PRIMARY KEY (`idcontact`)
)
    ENGINE = InnoDB;


SET SQL_MODE = @OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS = @OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS = @OLD_UNIQUE_CHECKS;
