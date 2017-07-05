-- MySQL Workbench Synchronization
-- Generated: 2017-06-29 10:27
-- Model: New Model
-- Version: 1.0
-- Project: Name of the project
-- Author: DJOROUS

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

CREATE TABLE IF NOT EXISTS `clinica`.`especialidades` (
  `id_especialidade` SMALLINT(5) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(100) NOT NULL,
  PRIMARY KEY (`id_especialidade`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COMMENT = 'Tabela das especialidades'
PACK_KEYS = 0
ROW_FORMAT = DEFAULT;

CREATE TABLE IF NOT EXISTS `clinica`.`pessoas` (
  `id_pessoa` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(120) NOT NULL,
  `cpf` BIGINT(12) ZEROFILL UNSIGNED NOT NULL,
  `rg` VARCHAR(20) NULL DEFAULT NULL,
  `crm` VARCHAR(12) NULL DEFAULT NULL,
  `data_nascimento` DATE NOT NULL,
  `idade` INT(2) NOT NULL,
  `tipo_pessoa` ENUM('Paciente', 'Atendente', 'Médico', 'Admin') NOT NULL,
  `senha` VARCHAR(200) NOT NULL,
  `ativo` ENUM('S', 'N') NOT NULL DEFAULT 'S',
  `data_cadastro` DATETIME NOT NULL,
  `estado_civil_id` SMALLINT(6) NOT NULL,
  `especialidade_id` SMALLINT(5) UNSIGNED NOT NULL,
  `orgao_expedidor_id` SMALLINT(5) UNSIGNED NOT NULL,
  `endereco_id` INT(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`id_pessoa`),
  INDEX `fk_tb_pessoa_tb_estado_civil1_idx` USING BTREE (`estado_civil_id` ASC),
  INDEX `fk_tb_pessoa_tb_especialidade1_idx` USING BTREE (`especialidade_id` ASC),
  INDEX `fk_tb_pessoa_tb_orgao_expedidor1_idx` USING BTREE (`orgao_expedidor_id` ASC),
  INDEX `fk_tb_pessoa_tb_endereco1_idx` USING BTREE (`endereco_id` ASC),
  CONSTRAINT `fk_tb_pessoa_tb_estado_civil`
    FOREIGN KEY (`estado_civil_id`)
    REFERENCES `clinica`.`estados_civis` (`id_estado_civil`)
    ON DELETE RESTRICT
    ON UPDATE CASCADE,
  CONSTRAINT `fk_tb_pessoa_tb_especialidade`
    FOREIGN KEY (`especialidade_id`)
    REFERENCES `clinica`.`especialidades` (`id_especialidade`)
    ON DELETE RESTRICT
    ON UPDATE CASCADE,
  CONSTRAINT `fk_tb_pessoa_tb_orgao_expedidor`
    FOREIGN KEY (`orgao_expedidor_id`)
    REFERENCES `clinica`.`orgaos_expedidores` (`id_orgao_expedidor`)
    ON DELETE RESTRICT
    ON UPDATE CASCADE,
  CONSTRAINT `fk_tb_pessoa_tb_endereco`
    FOREIGN KEY (`endereco_id`)
    REFERENCES `clinica`.`enderecos` (`id_endereco`)
    ON DELETE RESTRICT
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COMMENT = 'Tabela com os dados dos pacientes'
PACK_KEYS = 0
ROW_FORMAT = DEFAULT;

CREATE TABLE IF NOT EXISTS `clinica`.`agendas_medicos` (
  `id_agenda_medico` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `inicio` DATETIME NOT NULL,
  `termino` DATETIME NOT NULL,
  `turno_agenda_id` INT(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`id_agenda_medico`),
  INDEX `fk_tb_agenda_medico_tb_turno_agenda_medico1_idx` USING BTREE (`turno_agenda_id` ASC),
  CONSTRAINT `fk_tb_agenda_medico_tb_turno_agenda_medico`
    FOREIGN KEY (`turno_agenda_id`)
    REFERENCES `clinica`.`turnos_agendas_medicos` (`id_turno_agenda`)
    ON DELETE RESTRICT
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COMMENT = 'Tabela de escala do medico'
PACK_KEYS = 0
ROW_FORMAT = DEFAULT;

CREATE TABLE IF NOT EXISTS `clinica`.`consultas` (
  `id_consulta` INT(11) NOT NULL AUTO_INCREMENT,
  `data_consulta` DATETIME NOT NULL,
  `anamnese` TEXT NULL DEFAULT NULL,
  `peso_paciente` DOUBLE NULL DEFAULT NULL,
  `altura_paciente` DOUBLE NULL DEFAULT NULL,
  `cigarro` ENUM('S', 'N') NULL DEFAULT NULL,
  `bebida` ENUM('S', 'N') NULL DEFAULT NULL,
  `turno_agenda_id` INT(10) UNSIGNED NOT NULL,
  `tipo_consulta_id` INT(11) NOT NULL,
  `pessoa_id` INT(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`id_consulta`),
  INDEX `fk_tb_consulta_tb_turno_agenda_medico1_idx` (`turno_agenda_id` ASC),
  INDEX `fk_tb_consulta_tb_tipo_consulta1_idx` (`tipo_consulta_id` ASC),
  INDEX `fk_tb_consulta_tb_pessoa1_idx` (`pessoa_id` ASC),
  CONSTRAINT `fk_tb_consulta_tb_turno_agenda_medico1`
    FOREIGN KEY (`turno_agenda_id`)
    REFERENCES `clinica`.`turnos_agendas_medicos` (`id_turno_agenda`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tb_consulta_tb_tipo_consulta1`
    FOREIGN KEY (`tipo_consulta_id`)
    REFERENCES `clinica`.`tipos_consultas` (`id_tipo_consulta`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tb_consulta_tb_pessoa1`
    FOREIGN KEY (`pessoa_id`)
    REFERENCES `clinica`.`pessoas` (`id_pessoa`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COMMENT = 'Tabela consulta'
PACK_KEYS = 0
ROW_FORMAT = DEFAULT;

CREATE TABLE IF NOT EXISTS `clinica`.`turnos_agendas_medicos` (
  `id_turno_agenda` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `descricao` VARCHAR(30) NOT NULL,
  `pessoa_id` INT(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`id_turno_agenda`),
  INDEX `fk_tb_turno_agenda_medico_tb_pessoa1_idx` USING BTREE (`pessoa_id` ASC),
  CONSTRAINT `fk_tb_turno_agenda_medico_tb_pessoa`
    FOREIGN KEY (`pessoa_id`)
    REFERENCES `clinica`.`pessoas` (`id_pessoa`)
    ON DELETE RESTRICT
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COMMENT = 'Tabela do turno com a escala do medico'
PACK_KEYS = 0
ROW_FORMAT = DEFAULT;

CREATE TABLE IF NOT EXISTS `clinica`.`tipos_consultas` (
  `id_tipo_consulta` INT(11) NOT NULL AUTO_INCREMENT,
  `descricao` VARCHAR(20) NOT NULL,
  PRIMARY KEY (`id_tipo_consulta`),
  INDEX `ConsultaParticular_FKIndex2` (`descricao` ASC))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COMMENT = 'Tabela das consultas particulares'
PACK_KEYS = 0
ROW_FORMAT = DEFAULT;

CREATE TABLE IF NOT EXISTS `clinica`.`planos_saudes` (
  `id_plano_saude` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nome_plano` VARCHAR(70) NOT NULL,
  PRIMARY KEY (`id_plano_saude`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COMMENT = 'Tabela do plano de saude'
PACK_KEYS = 0
ROW_FORMAT = DEFAULT;

CREATE TABLE IF NOT EXISTS `clinica`.`cidades` (
  `id_cidade` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `cidade` VARCHAR(45) NOT NULL,
  `uf_id` TINYINT(3) UNSIGNED NOT NULL,
  PRIMARY KEY (`id_cidade`),
  INDEX `fk_cidades_ufs_idx` USING BTREE (`uf_id` ASC),
  CONSTRAINT `fk_cidades_ufs`
    FOREIGN KEY (`uf_id`)
    REFERENCES `clinica`.`ufs` (`id_uf`)
    ON DELETE RESTRICT
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `clinica`.`ufs` (
  `id_uf` TINYINT(3) UNSIGNED NOT NULL AUTO_INCREMENT,
  `uf` VARCHAR(2) NULL DEFAULT NULL,
  PRIMARY KEY (`id_uf`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `clinica`.`bairros` (
  `id_bairro` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `bairro` VARCHAR(45) NOT NULL,
  `cidade_id` INT(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`id_bairro`),
  INDEX `fk_bairros_cidades_idx` USING BTREE (`cidade_id` ASC),
  CONSTRAINT `fk_bairros_cidades`
    FOREIGN KEY (`cidade_id`)
    REFERENCES `clinica`.`cidades` (`id_cidade`)
    ON DELETE RESTRICT
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `clinica`.`enderecos` (
  `id_endereco` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `complemento` VARCHAR(100) NOT NULL,
  `numero` VARCHAR(12) NOT NULL,
  `cep` INT(8) NOT NULL,
  `bairro_id` INT(10) UNSIGNED NOT NULL,
  `logradouro_id` SMALLINT(5) UNSIGNED NOT NULL,
  PRIMARY KEY (`id_endereco`),
  INDEX `fk_tb_endereco_tb_bairro_idx` USING BTREE (`bairro_id` ASC),
  INDEX `fk_tb_endereco_tb_logradouro_idx` USING BTREE (`logradouro_id` ASC),
  CONSTRAINT `fk_tb_endereco_tb_bairro`
    FOREIGN KEY (`bairro_id`)
    REFERENCES `clinica`.`bairros` (`id_bairro`)
    ON DELETE RESTRICT
    ON UPDATE CASCADE,
  CONSTRAINT `fk_tb_endereco_tb_logradouro`
    FOREIGN KEY (`logradouro_id`)
    REFERENCES `clinica`.`logradouros` (`id_logradouro`)
    ON DELETE RESTRICT
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COMMENT = '		';

CREATE TABLE IF NOT EXISTS `clinica`.`logradouros` (
  `id_logradouro` SMALLINT(5) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(90) NOT NULL,
  PRIMARY KEY (`id_logradouro`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `clinica`.`estados_civis` (
  `id_estado_civil` SMALLINT(6) NOT NULL AUTO_INCREMENT,
  `descricao` VARCHAR(40) NOT NULL,
  PRIMARY KEY (`id_estado_civil`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `clinica`.`orgaos_expedidores` (
  `id_orgao_expedidor` SMALLINT(5) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(130) NOT NULL,
  PRIMARY KEY (`id_orgao_expedidor`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `clinica`.`emails` (
  `id_email` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `email` VARCHAR(150) NOT NULL,
  `pessoa_id` INT(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`id_email`),
  INDEX `fk_tb_email_tb_pessoa1_idx` USING BTREE (`pessoa_id` ASC),
  CONSTRAINT `fk_tb_email_tb_pessoa`
    FOREIGN KEY (`pessoa_id`)
    REFERENCES `clinica`.`pessoas` (`id_pessoa`)
    ON DELETE RESTRICT
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COMMENT = '	';

CREATE TABLE IF NOT EXISTS `clinica`.`telefones` (
  `id_telefone` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `fone_fixo` INT(11) NULL DEFAULT NULL,
  `fone_celular` INT(11) NULL DEFAULT NULL,
  `fone_trabalho` INT(11) NULL DEFAULT NULL,
  `pessoa_id` INT(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`id_telefone`),
  INDEX `fk_tb_telefone_tb_pessoa1_idx` USING BTREE (`pessoa_id` ASC),
  CONSTRAINT `fk_tb_telefone_tb_pessoa`
    FOREIGN KEY (`pessoa_id`)
    REFERENCES `clinica`.`pessoas` (`id_pessoa`)
    ON DELETE RESTRICT
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `clinica`.`permissoes` (
  `id_permissao` TINYINT(3) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(70) NULL DEFAULT NULL,
  `pessoa_id` INT(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`id_permissao`),
  INDEX `fk_tb_permissao_tb_pessoa1_idx` USING BTREE (`pessoa_id` ASC),
  CONSTRAINT `fk_tb_permissao_tb_pessoa`
    FOREIGN KEY (`pessoa_id`)
    REFERENCES `clinica`.`pessoas` (`id_pessoa`)
    ON DELETE RESTRICT
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `clinica`.`tipos_planos` (
  `id_tipo_plano` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `tipo_plano` VARCHAR(70) NOT NULL,
  `numero_carteira` BIGINT(12) NOT NULL,
  `data_validade` DATE NOT NULL,
  `ativo` ENUM('S', 'N') NOT NULL DEFAULT 'S',
  `plano_saude_id` INT(10) UNSIGNED NOT NULL,
  `pessoa_id` INT(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`id_tipo_plano`),
  INDEX `fk_tb_tipo_plano_tb_plano_saude1_idx` USING BTREE (`plano_saude_id` ASC),
  INDEX `fk_tb_tipo_plano_tb_pessoa1_idx` USING BTREE (`pessoa_id` ASC),
  CONSTRAINT `fk_tb_tipo_plano_tb_plano_saude`
    FOREIGN KEY (`plano_saude_id`)
    REFERENCES `clinica`.`planos_saudes` (`id_plano_saude`)
    ON DELETE RESTRICT
    ON UPDATE CASCADE,
  CONSTRAINT `fk_tb_tipo_plano_tb_pessoa`
    FOREIGN KEY (`pessoa_id`)
    REFERENCES `clinica`.`pessoas` (`id_pessoa`)
    ON DELETE RESTRICT
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `clinica`.`receitas` (
  `id_receita` INT(11) NOT NULL AUTO_INCREMENT,
  `descricao` TEXT NOT NULL,
  `consulta_id` INT(11) NOT NULL,
  PRIMARY KEY (`id_receita`),
  INDEX `fk_tb_receita_tb_consulta1_idx` USING BTREE (`consulta_id` ASC),
  CONSTRAINT `fk_tb_receita_tb_consulta`
    FOREIGN KEY (`consulta_id`)
    REFERENCES `clinica`.`consultas` (`id_consulta`)
    ON DELETE RESTRICT
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `clinica`.`exames` (
  `id_exame` INT(11) NOT NULL AUTO_INCREMENT,
  `nome_exame` VARCHAR(80) NOT NULL,
  PRIMARY KEY (`id_exame`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `clinica`.`tipos_exames` (
  `id_tipo_exame` INT(11) NOT NULL AUTO_INCREMENT,
  `descricao` VARCHAR(200) NOT NULL,
  `consulta_id` INT(11) NOT NULL,
  `exame_id` INT(11) NOT NULL,
  PRIMARY KEY (`id_tipo_exame`),
  INDEX `fk_tb_tipo_exame_tb_consulta1_idx` USING BTREE (`consulta_id` ASC),
  INDEX `fk_tb_tipo_exame_tb_exame1_idx` USING BTREE (`exame_id` ASC),
  CONSTRAINT `fk_tb_tipo_exame_tb_consulta`
    FOREIGN KEY (`consulta_id`)
    REFERENCES `clinica`.`consultas` (`id_consulta`)
    ON DELETE RESTRICT
    ON UPDATE CASCADE,
  CONSTRAINT `fk_tb_tipo_exame_tb_exame`
    FOREIGN KEY (`exame_id`)
    REFERENCES `clinica`.`exames` (`id_exame`)
    ON DELETE RESTRICT
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `clinica`.`medicamentos` (
  `id_medicamento` INT(11) NOT NULL AUTO_INCREMENT,
  `nome_generico` VARCHAR(100) NOT NULL,
  `nome_fabrica` VARCHAR(100) NOT NULL,
  `fabricante_id` INT(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`id_medicamento`),
  INDEX `fk_tb_medicamento_tb_fabricante1_idx` USING BTREE (`fabricante_id` ASC),
  CONSTRAINT `fk_tb_medicamento_tb_fabricante`
    FOREIGN KEY (`fabricante_id`)
    REFERENCES `clinica`.`fabricantes` (`id_fabricante`)
    ON DELETE RESTRICT
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `clinica`.`fabricantes` (
  `id_fabricante` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nome_fabricante` VARCHAR(100) NOT NULL,
  PRIMARY KEY (`id_fabricante`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `clinica`.`medicamentos_receitas` (
  `id_medicamento_receita` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `quantidade` SMALLINT(5) UNSIGNED NOT NULL,
  `medicamento_id` INT(11) NOT NULL,
  `receita_id` INT(11) NOT NULL,
  PRIMARY KEY (`id_medicamento_receita`),
  INDEX `fk_tb_medicamento_receita_tb_medicamento1_idx` USING BTREE (`medicamento_id` ASC),
  INDEX `fk_tb_medicamento_receita_tb_receita1_idx` USING BTREE (`receita_id` ASC),
  CONSTRAINT `fk_tb_medicamento_receita_tb_medicamento`
    FOREIGN KEY (`medicamento_id`)
    REFERENCES `clinica`.`medicamentos` (`id_medicamento`)
    ON DELETE RESTRICT
    ON UPDATE CASCADE,
  CONSTRAINT `fk_tb_medicamento_receita_tb_receita`
    FOREIGN KEY (`receita_id`)
    REFERENCES `clinica`.`receitas` (`id_receita`)
    ON DELETE RESTRICT
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

DROP TABLE IF EXISTS `clinica`.`phinxlog` ;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
