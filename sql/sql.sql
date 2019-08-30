# Host: localhost  (Version 5.5.5-10.1.13-MariaDB)
# Date: 2019-08-30 13:53:00
# Generator: MySQL-Front 6.1  (Build 1.26)


#
# Structure for table "candidatos"
#

DROP TABLE IF EXISTS `candidatos`;
CREATE TABLE `candidatos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  `email` varchar(80) NOT NULL,
  `telefone` varchar(20) NOT NULL,
  `celular` varchar(20) NOT NULL,
  `dtNascimento` date DEFAULT NULL,
  `faculdade` tinyint(11) DEFAULT NULL,
  `pretSalario` varchar(30) DEFAULT NULL,
  `resumoHab` text,
  `ativo` tinyint(11) DEFAULT '1',
  `lixeira` tinyint(11) DEFAULT '0',
  `destaque` tinyint(11) DEFAULT '0',
  `dtCadastro` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

#
# Data for table "candidatos"
#

INSERT INTO `candidatos` VALUES (1,'sdfasdfasdfa','teste@teste.com','(51)6161-6516','(65)16516-5165','1997-10-01',1,'R$5.444,44','sadfasdfasdfasdf',1,0,0,'2019-08-30 03:29:06'),(2,'Danielle Grosse','mozao@mozao.com','(21)6516-5165','(16)51516-5165','1997-10-01',1,'R$2.500,00','  ',1,0,0,'2019-08-30 12:47:10');

#
# Structure for table "users"
#

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `email` varchar(80) NOT NULL,
  `password` varchar(40) NOT NULL,
  `dtCadastro` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

#
# Data for table "users"
#

INSERT INTO `users` VALUES (1,'Junior Cintra','apspvcintraj@gmail.com','89794b621a313bb59eed0d9f0f4e8205',NULL);
