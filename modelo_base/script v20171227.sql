-- MySQL Script generated by MySQL Workbench
-- Wed Dec 27 19:45:35 2017
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema construtora
-- -----------------------------------------------------
DROP SCHEMA IF EXISTS `construtora` ;

-- -----------------------------------------------------
-- Schema construtora
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `construtora` DEFAULT CHARACTER SET utf8 ;
USE `construtora` ;

-- -----------------------------------------------------
-- Table `construtora`.`construtora`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `construtora`.`construtora` ;

CREATE TABLE IF NOT EXISTS `construtora`.`construtora` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NOT NULL,
  `responsavel` VARCHAR(45) NULL,
  `telefone` VARCHAR(45) NULL,
  `celular` VARCHAR(45) NULL,
  `status` SMALLINT(1) NULL DEFAULT 1,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `construtora`.`cliente`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `construtora`.`cliente` ;

CREATE TABLE IF NOT EXISTS `construtora`.`cliente` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NOT NULL,
  `telefone` VARCHAR(20) NULL,
  `celular` VARCHAR(45) NULL,
  `construtora_id` INT NOT NULL,
  `status` SMALLINT(1) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`),
  INDEX `fk_cliente_construtora1_idx` (`construtora_id` ASC),
  CONSTRAINT `fk_cliente_construtora1`
    FOREIGN KEY (`construtora_id`)
    REFERENCES `construtora`.`construtora` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `construtora`.`endereco`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `construtora`.`endereco` ;

CREATE TABLE IF NOT EXISTS `construtora`.`endereco` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `cep` VARCHAR(10) NULL,
  `logradouro` VARCHAR(50) NOT NULL,
  `complemento` VARCHAR(45) NULL,
  `bairro` VARCHAR(45) NULL,
  `cidade` VARCHAR(45) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `construtora`.`orcamento`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `construtora`.`orcamento` ;

CREATE TABLE IF NOT EXISTS `construtora`.`orcamento` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `cliente_id` INT NOT NULL,
  `endereco_id` INT NOT NULL,
  `data` DATE NULL,
  `valor` FLOAT NULL,
  `status` SMALLINT(1) NOT NULL DEFAULT 1,
  INDEX `fk_orcamento_endereco1_idx` (`endereco_id` ASC),
  PRIMARY KEY (`id`),
  INDEX `fk_orcamento_cliente1_idx` (`cliente_id` ASC),
  CONSTRAINT `fk_orcamento_endereco1`
    FOREIGN KEY (`endereco_id`)
    REFERENCES `construtora`.`endereco` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_orcamento_cliente1`
    FOREIGN KEY (`cliente_id`)
    REFERENCES `construtora`.`cliente` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `construtora`.`grupo_servico`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `construtora`.`grupo_servico` ;

CREATE TABLE IF NOT EXISTS `construtora`.`grupo_servico` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `descricao` VARCHAR(45) NOT NULL,
  `status` SMALLINT(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `construtora`.`itens_orcamento`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `construtora`.`itens_orcamento` ;

CREATE TABLE IF NOT EXISTS `construtora`.`itens_orcamento` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `orcamento_id` INT NOT NULL,
  `grupo_servico_id` INT NOT NULL,
  `sequencia` INT NULL,
  `descricao` VARCHAR(45) NULL,
  `detalhe` VARCHAR(200) NULL,
  `valor` FLOAT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_itens_orcamento_orcamento1_idx` (`orcamento_id` ASC),
  INDEX `fk_itens_orcamento_grupo_servico1_idx` (`grupo_servico_id` ASC),
  CONSTRAINT `fk_itens_orcamento_orcamento1`
    FOREIGN KEY (`orcamento_id`)
    REFERENCES `construtora`.`orcamento` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_itens_orcamento_grupo_servico1`
    FOREIGN KEY (`grupo_servico_id`)
    REFERENCES `construtora`.`grupo_servico` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `construtora`.`usuario`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `construtora`.`usuario` ;

CREATE TABLE IF NOT EXISTS `construtora`.`usuario` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `construtora_id` INT NULL,
  `cliente_id` INT NULL,
  `nome` VARCHAR(45) NOT NULL,
  `login` VARCHAR(45) NOT NULL,
  `email` VARCHAR(45) NOT NULL,
  `senha` VARCHAR(45) NULL,
  `status` SMALLINT(1) NULL DEFAULT 1,
  PRIMARY KEY (`id`),
  INDEX `fk_usuario_construtora1_idx` (`construtora_id` ASC),
  INDEX `fk_usuario_cliente1_idx` (`cliente_id` ASC),
  CONSTRAINT `fk_usuario_construtora1`
    FOREIGN KEY (`construtora_id`)
    REFERENCES `construtora`.`construtora` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_usuario_cliente1`
    FOREIGN KEY (`cliente_id`)
    REFERENCES `construtora`.`cliente` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
