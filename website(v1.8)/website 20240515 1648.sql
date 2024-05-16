-- MySQL Administrator dump 1.4
--
-- ------------------------------------------------------
-- Server version	5.5.5-10.4.28-MariaDB


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


--
-- Create schema website
--

CREATE DATABASE IF NOT EXISTS website;
USE website;

--
-- Definition of table `produto`
--

DROP TABLE IF EXISTS `produto`;
CREATE TABLE `produto` (
  `idproduto` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `produto` varchar(80) NOT NULL,
  `img` varchar(230) NOT NULL,
  `valor` int(10) unsigned NOT NULL,
  `descricao` varchar(255) NOT NULL,
  PRIMARY KEY (`idproduto`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `produto`
--

/*!40000 ALTER TABLE `produto` DISABLE KEYS */;
INSERT INTO `produto` (`idproduto`,`produto`,`img`,`valor`,`descricao`) VALUES 
 (1,'Camera Kanon','cameras1.png',3500,''),
 (2,'Camera Sony','cameras2.png',5100,''),
 (3,'Celulares Iphone 14','celulares1.png',5600,''),
 (4,'Celulares Sansung Galaxy','celulares2.png',3600,''),
 (5,'Fone de Ouvido Air Pods','fones1.png',2500,''),
 (6,'Fone de Ouvido Black Pods','fones2.png',2200,''),
 (7,'Notebook Sansung i5','notebooks1.png',3500,''),
 (8,'Notebook Acer i8','notebooks2.png',3200,'');
/*!40000 ALTER TABLE `produto` ENABLE KEYS */;


--
-- Definition of table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE `usuario` (
  `idusuario` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(80) NOT NULL,
  `email` varchar(140) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `img` varchar(160) NOT NULL,
  `tipo` char(1) NOT NULL DEFAULT 'U',
  PRIMARY KEY (`idusuario`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `usuario`
--

/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` (`idusuario`,`nome`,`email`,`senha`,`img`,`tipo`) VALUES 
 (1,'joao','email@hotmail.com','$2y$14$0wSC7jjkvUYxoZYmOM.MnOlMTGwnGVyKseeFzEGpNNx4l0dZLJtSm','default.png','A');
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;




/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
