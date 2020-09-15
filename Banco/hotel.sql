# Host: localhost  (Version 5.7.26)
# Date: 2020-09-15 00:28:55
# Generator: MySQL-Front 6.0  (Build 2.20)


#
# Structure for table "cliente"
#

DROP TABLE IF EXISTS `cliente`;
CREATE TABLE `cliente` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `idade` int(11) DEFAULT NULL,
  `sexo` char(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

#
# Data for table "cliente"
#

/*!40000 ALTER TABLE `cliente` DISABLE KEYS */;
INSERT INTO `cliente` VALUES (4,'Marcelo',19,'M');
/*!40000 ALTER TABLE `cliente` ENABLE KEYS */;

#
# Structure for table "funcionario"
#

DROP TABLE IF EXISTS `funcionario`;
CREATE TABLE `funcionario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `telefone` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

#
# Data for table "funcionario"
#

/*!40000 ALTER TABLE `funcionario` DISABLE KEYS */;
INSERT INTO `funcionario` VALUES (7,'Renato','71 9999 9999'),(8,'Vitinho','71 986686456');
/*!40000 ALTER TABLE `funcionario` ENABLE KEYS */;

#
# Structure for table "quarto"
#

DROP TABLE IF EXISTS `quarto`;
CREATE TABLE `quarto` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(100) NOT NULL,
  `disponibilidade` varchar(30) NOT NULL,
  `valor` decimal(9,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

#
# Data for table "quarto"
#

/*!40000 ALTER TABLE `quarto` DISABLE KEYS */;
INSERT INTO `quarto` VALUES (4,'TOP','Ocupado',90.00),(5,'Quarto de Luxo','Ocupado',250.00),(6,'Normal','Livre',75.00);
/*!40000 ALTER TABLE `quarto` ENABLE KEYS */;

#
# Structure for table "reserva"
#

DROP TABLE IF EXISTS `reserva`;
CREATE TABLE `reserva` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_func` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `id_quarto` int(11) NOT NULL,
  `data_ini` date NOT NULL,
  `data_fim` date DEFAULT NULL,
  `qtd_dias` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_reserva_func` (`id_func`),
  KEY `fk_reserva_cli` (`id_cliente`),
  KEY `fk_reserva_quarto` (`id_quarto`)
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

#
# Data for table "reserva"
#

/*!40000 ALTER TABLE `reserva` DISABLE KEYS */;
INSERT INTO `reserva` VALUES (9,6,4,4,'2020-07-18',NULL,7),(10,6,4,4,'2020-07-18',NULL,5),(18,7,4,5,'2020-07-19','2020-07-24',NULL),(19,6,4,4,'2020-07-20','2020-07-30',NULL),(20,6,4,4,'2020-07-20','2020-07-25',NULL),(21,6,4,4,'2020-07-20','2020-07-29',NULL),(22,6,4,5,'2020-07-21','2020-07-31',NULL);
/*!40000 ALTER TABLE `reserva` ENABLE KEYS */;
