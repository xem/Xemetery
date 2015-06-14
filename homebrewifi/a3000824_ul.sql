-- MySQL dump 10.13  Distrib 5.1.57, for redhat-linux-gnu (x86_64)
--
-- Host: localhost    Database: a3000824_ul
-- ------------------------------------------------------
-- Server version	5.1.57
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `homebrew`
--

DROP TABLE IF EXISTS `homebrew`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `homebrew` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `nom` varchar(128) NOT NULL,
  `version` varchar(10) NOT NULL,
  `auteur` varchar(64) NOT NULL,
  `site` varchar(256) NOT NULL,
  `date` date NOT NULL,
  `note` float(4,4) NOT NULL,
  `votes` int(10) NOT NULL,
  `telechargements` int(10) NOT NULL,
  `code` varchar(20) NOT NULL,
  `fichier` varchar(255) NOT NULL,
  `public` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=111150 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `homebrew`
--

LOCK TABLES `homebrew` WRITE;
/*!40000 ALTER TABLE `homebrew` DISABLE KEYS */;
INSERT INTO `homebrew` VALUES (111140,'Sokoban Touch &amp; Go!','14/10/10','maRk2512','http://www.palib-dev.com','2010-11-06',0.0000,0,0,'A A A A R &rarr; ','Sokoban Touch & Go!.nds',1),(111142,'Bilou: Apple Assault','1.4','PypeBros','http://sylvainhb.blogspot.com/search/label/apple%20assault','2011-01-04',0.0000,0,0,'A A A A R B ','appleassault-ld.nds',1),(111143,'ZXDS','092b1','Patrik Rak','http://zxds.raxoft.cz/','2011-01-08',0.0000,0,0,'A A A A R L ','zxds_092b1.zip',1),(111144,'Bunjalloo','0.8','quirkysoft','http://code.google.com/p/quirkysoft/','2011-02-23',0.0000,0,0,'A A A A R R ','bunjalloo-0.8.zip',1),(111145,'GameUp','3','Supercard Team','http://gameup.supercard.fr/index.php?lang=eng','2011-02-23',0.0000,0,0,'A A A A R X ','GameUPv3.zip',1),(111146,'Homebrew Menu','0.2.0','Team DevkitPro','http://devkitpro.org','2011-02-23',0.0000,0,0,'A A A A R Y ','hbmenu.zip',1),(111147,'FroggerDS','1.0','King Dodongo','http://gbatemp.net','2011-02-23',0.0000,0,0,'A A A A R &uarr; ','FroggerDS.zip',1),(111148,'Stopwatch DS','0.2','foxy4','http://site officiel','2011-02-23',0.0000,0,0,'A A A A R &darr; ','StopwatchDS.zip',1),(111149,'Stopwatch DS *nouveau lien*','0.2','foxy4','http://www.google.com','2011-02-23',0.0000,0,0,'A A A A R &larr; ','Stopwatch DS v0.2.nds',1);
/*!40000 ALTER TABLE `homebrew` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-04-12  2:56:41
