-- MySQL Administrator dump 1.4
--
-- ------------------------------------------------------
-- Server version	5.0.41-community-nt


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


--
-- Create schema banco_tcc_fusa
--

CREATE DATABASE IF NOT EXISTS banco_tcc_fusa;
USE banco_tcc_fusa;

--
-- Definition of table `agendas`
--

DROP TABLE IF EXISTS `agendas`;
CREATE TABLE `agendas` (
  `cd_agenda` int(11) NOT NULL auto_increment,
  `dt_agenda` date NOT NULL,
  `ds_agenda` longtext NOT NULL,
  `nm_agenda` varchar(45) NOT NULL,
  `nm_endereco_agenda` varchar(200) NOT NULL,
  `nm_local_agenda` varchar(45) NOT NULL,
  `cd_usuario` int(11) NOT NULL,
  `nm_horario_agenda` varchar(50) NOT NULL,
  PRIMARY KEY  (`cd_agenda`),
  KEY `fk_agendas_usuarios1` (`cd_usuario`),
  CONSTRAINT `fk_agendas_usuarios1` FOREIGN KEY (`cd_usuario`) REFERENCES `usuarios` (`cd_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `agendas`
--

/*!40000 ALTER TABLE `agendas` DISABLE KEYS */;
/*!40000 ALTER TABLE `agendas` ENABLE KEYS */;


--
-- Definition of table `albuns`
--

DROP TABLE IF EXISTS `albuns`;
CREATE TABLE `albuns` (
  `cd_album` int(11) NOT NULL auto_increment,
  `nm_album` varchar(45) NOT NULL,
  `dt_album` date NOT NULL,
  PRIMARY KEY  (`cd_album`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `albuns`
--

/*!40000 ALTER TABLE `albuns` DISABLE KEYS */;
INSERT INTO `albuns` (`cd_album`,`nm_album`,`dt_album`) VALUES 
 (1,'Perfil Helio Fernando','2012-09-19'),
 (2,'Perfil Rafael Alves','2012-09-25'),
 (3,'Perfil Leonardo','2012-09-05'),
 (4,'Perfil Anna Amex','2012-05-06'),
 (5,'Perfil banda','2012-05-06'),
 (6,'Perfil Visitante','2012-05-06'),
 (7,'Fotos Helio','2012-05-06'),
 (8,'Foto Produtor','2012-05-06'),
 (9,'Perfil MIKA','2012-05-06'),
 (10,' Perfil La','2012-07-05'),
 (11,'Perfil Gotye','2012-07-05'),
 (12,' Perfil Adam','2012-07-05'),
 (13,'Perfil James','2012-07-05'),
 (14,'Perfil Jesse','2012-07-05'),
 (15,'Perfil Matt','2012-07-05'),
 (16,'Perfil Mickey','2012-07-05'),
 (17,'Perfil Cubbie','2012-07-05'),
 (18,'Perfil Mark Foster','2012-07-05'),
 (19,'Perfil Mark Pontius','2012-07-05'),
 (20,'Perfil Apl','2012-07-05'),
 (21,'Perfil Fergie','2012-07-05'),
 (22,'Perfil Taboo','2012-07-05'),
 (23,'Perfil Will','2012-07-05'),
 (24,'Perfil Marcio','2012-07-05'),
 (25,'Perfil Paula','2012-07-05'),
 (26,'Fotos Mika','2012-07-05'),
 (27,'Fotos La','2012-11-27'),
 (28,'Fotos Gotye','2012-11-27'),
 (29,'Fotos Adam','2012-11-27'),
 (30,'Fotos James','2012-11-27'),
 (31,'Fotos Jesse','2012-11-27'),
 (32,'Fotos Matt','2012-11-27'),
 (33,'Fotos Mickey','2012-11-27'),
 (34,'Fotos Cubbie','2012-11-27'),
 (35,'Fotos Mark Foster','2012-11-27'),
 (36,'Fotos Mark Pontius','2012-11-27'),
 (37,'Fotos Apl','2012-11-27'),
 (38,'Fotos Fergie','2012-11-27'),
 (39,'Fotos Taboo','2012-11-27'),
 (40,'Fotos Will','2012-11-27');
/*!40000 ALTER TABLE `albuns` ENABLE KEYS */;


--
-- Definition of table `atualizacoes`
--

DROP TABLE IF EXISTS `atualizacoes`;
CREATE TABLE `atualizacoes` (
  `nm_link` longtext NOT NULL,
  `cd_usuario` int(11) NOT NULL,
  `cd_situacao_atualizacao` int(11) NOT NULL,
  `cd_atualizacao` int(11) NOT NULL auto_increment,
  `cd_tipo_atualizacao` varchar(45) NOT NULL,
  `cd_link` int(10) unsigned NOT NULL,
  `qt_atualizacao` int(10) unsigned NOT NULL,
  `cd_remetente_atualizacao` int(10) unsigned NOT NULL,
  `cd_diverso` int(10) unsigned NOT NULL,
  PRIMARY KEY  (`cd_atualizacao`,`cd_usuario`),
  KEY `fk_atualizacoes_usuarios` (`cd_usuario`),
  CONSTRAINT `fk_atualizacoes_usuarios` FOREIGN KEY (`cd_usuario`) REFERENCES `usuarios` (`cd_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `atualizacoes`
--

/*!40000 ALTER TABLE `atualizacoes` DISABLE KEYS */;
INSERT INTO `atualizacoes` (`nm_link`,`cd_usuario`,`cd_situacao_atualizacao`,`cd_atualizacao`,`cd_tipo_atualizacao`,`cd_link`,`qt_atualizacao`,`cd_remetente_atualizacao`,`cd_diverso`) VALUES 
 ('HÃ¡;;e;;novos comentarios sobre seu video PUMPED UP KICKS;;e;;/Fusa/HTML/Banda/videos/index.php?id=',5,1,1,'1',5,1,1,9),
 ('HÃ¡;;e;;novos comentarios sobre seu video PUMPED UP KICKS;;e;;/Fusa/HTML/Banda/videos/index.php?id=',5,1,2,'1',5,1,1,10),
 ('HÃ¡;;e;;novos lyrics ;;e;;/Fusa/HTML/Solo/lyrics/index.php?id=',1,1,3,'2',1,1,7,12),
 ('HÃ¡;;e;;novos comentarios sobre seu video OPPA GANGNAM STYLE;;e;;/Fusa/HTML/Solo/videos/index.php?id=',1,1,4,'1',1,1,7,11),
 ('HÃ¡;;e;;novos comentarios sobre seu video PUMPED UP KICKS;;e;;/Fusa/HTML/Banda/videos/index.php?id=',5,0,5,'1',5,1,7,12),
 ('HÃ¡;;e;;novos lyrics ;;e;;/Fusa/HTML/Solo/lyrics/index.php?id=',1,1,6,'2',1,1,7,13),
 ('HÃ¡;;e;;novos lyrics ;;e;;/Fusa/HTML/Banda/lyrics/index.php?id=',5,1,7,'2',5,1,7,14),
 (';;e;;TYGA aceitou seu convite;;e;;/Fusa/HTML/solo/profile/profile.php?id=',5,1,9,'5',4,1,5,35),
 (';;e;;Cubbie aceitou seu convite;;e;;/Fusa/HTML/solo/profile/profile.php?id=',5,0,10,'5',16,1,5,88);
/*!40000 ALTER TABLE `atualizacoes` ENABLE KEYS */;


--
-- Definition of table `comentarios_fotos`
--

DROP TABLE IF EXISTS `comentarios_fotos`;
CREATE TABLE `comentarios_fotos` (
  `cd_comentario_foto` int(11) NOT NULL auto_increment,
  `ds_comentario_foto` longtext NOT NULL,
  `dt_comentario_foto` date NOT NULL,
  `cd_foto` int(11) NOT NULL,
  `cd_remetente_foto` int(11) NOT NULL,
  `nm_horario_foto` varchar(5) NOT NULL,
  PRIMARY KEY  (`cd_comentario_foto`),
  KEY `fk_comentarios_fotos_fotos1_idx` (`cd_foto`),
  KEY `fk_comentarios_fotos_usuario1_idx` (`cd_remetente_foto`),
  CONSTRAINT `fk_comentarios_fotos_fotos1` FOREIGN KEY (`cd_foto`) REFERENCES `fotos` (`cd_foto`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_comentarios_fotos_usuario1` FOREIGN KEY (`cd_remetente_foto`) REFERENCES `usuarios` (`cd_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comentarios_fotos`
--

/*!40000 ALTER TABLE `comentarios_fotos` DISABLE KEYS */;
/*!40000 ALTER TABLE `comentarios_fotos` ENABLE KEYS */;


--
-- Definition of table `comentarios_videos`
--

DROP TABLE IF EXISTS `comentarios_videos`;
CREATE TABLE `comentarios_videos` (
  `cd_comentario_video` int(11) NOT NULL auto_increment,
  `cd_video` int(11) NOT NULL,
  `cd_remetente_video` int(11) NOT NULL,
  `dt_comentario_video` date NOT NULL,
  `ds_comentario_video` longtext NOT NULL,
  `nm_horario_video` varchar(5) NOT NULL,
  PRIMARY KEY  (`cd_comentario_video`),
  KEY `fk_comentarios_videos_videos1_idx` (`cd_video`),
  KEY `fk_comentarios_videos_usuario1_idx` (`cd_remetente_video`),
  CONSTRAINT `fk_comentarios_videos_usuario1` FOREIGN KEY (`cd_remetente_video`) REFERENCES `usuarios` (`cd_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_comentarios_videos_videos1` FOREIGN KEY (`cd_video`) REFERENCES `videos` (`cd_video`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comentarios_videos`
--

/*!40000 ALTER TABLE `comentarios_videos` DISABLE KEYS */;
INSERT INTO `comentarios_videos` (`cd_comentario_video`,`cd_video`,`cd_remetente_video`,`dt_comentario_video`,`ds_comentario_video`,`nm_horario_video`) VALUES 
 (2,1,4,'2012-10-12','oi','19:23'),
 (3,1,1,'2012-10-19','oi','07:26'),
 (4,1,1,'2012-10-21','oi2','15:00'),
 (5,1,1,'2012-10-21','oi3','15:00'),
 (6,5,1,'2012-10-21','oi','17:54'),
 (7,5,2,'2012-10-21','oi','18:00'),
 (8,5,5,'2012-10-21','legal','21:30'),
 (9,5,1,'2012-11-18','oi</br>oi','02:17'),
 (10,5,1,'2012-11-18','o','02:17'),
 (11,1,7,'2012-11-21','oi','21:38'),
 (12,5,7,'2012-11-21','oi','21:46');
/*!40000 ALTER TABLE `comentarios_videos` ENABLE KEYS */;


--
-- Definition of table `contatos`
--

DROP TABLE IF EXISTS `contatos`;
CREATE TABLE `contatos` (
  `cd_contato` int(11) NOT NULL auto_increment,
  `cd_remetente_contato` int(11) NOT NULL,
  `cd_receptor_contato` int(11) NOT NULL,
  `cd_situacao_contato` int(11) NOT NULL,
  `dt_convite` date NOT NULL,
  `nm_horario_convite` varchar(5) NOT NULL,
  `nm_instrumento` varchar(100) default NULL,
  PRIMARY KEY  (`cd_contato`,`cd_remetente_contato`,`cd_receptor_contato`),
  KEY `fk_amigos_usuario1` (`cd_remetente_contato`),
  KEY `fk_amigos_usuario2` (`cd_receptor_contato`),
  CONSTRAINT `fk_amigos_usuario1` FOREIGN KEY (`cd_remetente_contato`) REFERENCES `usuarios` (`cd_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_amigos_usuario2` FOREIGN KEY (`cd_receptor_contato`) REFERENCES `usuarios` (`cd_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contatos`
--

/*!40000 ALTER TABLE `contatos` DISABLE KEYS */;
INSERT INTO `contatos` (`cd_contato`,`cd_remetente_contato`,`cd_receptor_contato`,`cd_situacao_contato`,`dt_convite`,`nm_horario_convite`,`nm_instrumento`) VALUES 
 (2,3,1,1,'2012-09-28','21:00',NULL),
 (5,3,2,1,'2012-09-27','11:00',NULL),
 (6,4,2,1,'2012-09-27','9:00',NULL),
 (7,1,3,1,'2012-08-25','8:00',NULL),
 (8,2,3,1,'2012-09-25','8:30',NULL),
 (9,4,3,1,'2012-05-06','9:30',NULL),
 (11,2,4,1,'2012-05-05','5:50',NULL),
 (12,3,4,1,'2012-02-02','13:30',NULL),
 (25,1,2,1,'2012-10-11','19:00',NULL),
 (26,2,1,1,'2012-10-11','19:00',NULL),
 (34,1,4,0,'2012-11-22','22:48',NULL),
 (36,8,9,1,'2012-11-23','12:25',NULL),
 (37,9,8,1,'2012-11-23','11:25',NULL),
 (38,8,10,1,'2012-11-23','10:25',NULL),
 (39,10,8,1,'2012-11-23','11:55',NULL),
 (40,11,12,1,'2012-11-23','11:55',NULL),
 (41,11,13,1,'2012-11-23','11:55',NULL),
 (42,11,14,1,'2012-11-23','11:55',NULL),
 (43,11,15,1,'2012-11-23','11:55',NULL),
 (44,12,11,1,'2012-11-23','11:55',NULL),
 (45,12,13,1,'2012-11-23','11:55',NULL),
 (56,12,14,1,'2012-11-23','11:55',NULL),
 (57,12,15,1,'2012-11-23','11:55',NULL),
 (58,13,11,1,'2012-11-23','11:55',NULL),
 (59,13,12,1,'2012-11-23','11:55',NULL),
 (60,13,14,1,'2012-11-23','11:55',NULL),
 (61,13,15,1,'2012-11-23','11:55',NULL),
 (62,14,11,1,'2012-11-23','11:55',NULL),
 (63,14,12,1,'2012-11-23','11:55',NULL),
 (64,14,13,1,'2012-11-23','11:55',NULL),
 (65,14,15,1,'2012-11-23','11:55',NULL),
 (66,15,11,1,'2012-11-23','11:55',NULL),
 (67,15,12,1,'2012-11-23','11:55',NULL),
 (68,15,13,1,'2012-11-23','11:55',NULL),
 (69,15,14,1,'2012-11-23','11:55',NULL),
 (70,16,17,1,'2012-11-25','11:57',NULL),
 (71,16,18,1,'2012-11-25','11:57',NULL),
 (72,17,16,1,'2012-11-25','11:57',NULL),
 (73,17,18,1,'2012-11-25','11:57',NULL),
 (74,18,16,1,'2012-11-25','11:57',NULL),
 (75,18,17,1,'2012-11-25','11:57',NULL),
 (76,19,20,1,'2012-11-26','11:56',NULL),
 (77,19,21,1,'2012-11-26','11:56',NULL),
 (78,19,22,1,'2012-11-26','11:56',NULL),
 (79,20,19,1,'2012-11-26','11:56',NULL),
 (80,20,21,1,'2012-11-26','11:56',NULL),
 (81,20,22,1,'2012-11-26','11:56',NULL),
 (82,21,19,1,'2012-11-26','11:56',NULL),
 (83,21,20,1,'2012-11-26','11:56',NULL),
 (84,21,22,1,'2012-11-26','11:56',NULL),
 (85,22,19,1,'2012-11-26','11:56',NULL),
 (86,22,20,1,'2012-11-26','11:56',NULL),
 (87,22,21,1,'2012-11-26','11:56',NULL),
 (88,5,16,3,'2012-11-27','11:06','3;;e;;guitarra');
/*!40000 ALTER TABLE `contatos` ENABLE KEYS */;


--
-- Definition of table `estrela`
--

DROP TABLE IF EXISTS `estrela`;
CREATE TABLE `estrela` (
  `cd_estrela` int(11) NOT NULL auto_increment,
  `cd_video` int(11) NOT NULL,
  `cd_remetente_estrela` int(11) NOT NULL,
  `dt_estrela` date NOT NULL,
  PRIMARY KEY  (`cd_estrela`),
  KEY `fk_estrela_videos1` (`cd_video`),
  KEY `fk_estrela_usuarios1` (`cd_remetente_estrela`),
  CONSTRAINT `fk_estrela_usuarios1` FOREIGN KEY (`cd_remetente_estrela`) REFERENCES `usuarios` (`cd_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_estrela_videos1` FOREIGN KEY (`cd_video`) REFERENCES `videos` (`cd_video`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `estrela`
--

/*!40000 ALTER TABLE `estrela` DISABLE KEYS */;
INSERT INTO `estrela` (`cd_estrela`,`cd_video`,`cd_remetente_estrela`,`dt_estrela`) VALUES 
 (1,1,4,'2012-10-12'),
 (2,1,2,'2012-10-12'),
 (3,2,1,'2012-10-19'),
 (4,1,1,'2012-10-21'),
 (5,5,1,'2012-10-21'),
 (6,5,2,'2012-10-21'),
 (7,1,6,'2012-11-10');
/*!40000 ALTER TABLE `estrela` ENABLE KEYS */;


--
-- Definition of table `fotos`
--

DROP TABLE IF EXISTS `fotos`;
CREATE TABLE `fotos` (
  `cd_foto` int(11) NOT NULL auto_increment,
  `nm_destino_foto` longtext NOT NULL,
  `ds_foto` longtext NOT NULL,
  `cd_usuario` int(11) NOT NULL,
  `cd_album` int(11) NOT NULL,
  `cd_situacao_perfil` int(11) NOT NULL,
  `dt_foto` date NOT NULL,
  PRIMARY KEY  (`cd_foto`),
  KEY `fk_fotos_usuario1_idx` (`cd_usuario`),
  KEY `fk_fotos_album1_idx` (`cd_album`),
  CONSTRAINT `fk_fotos_album1` FOREIGN KEY (`cd_album`) REFERENCES `albuns` (`cd_album`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_fotos_usuario1` FOREIGN KEY (`cd_usuario`) REFERENCES `usuarios` (`cd_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fotos`
--

/*!40000 ALTER TABLE `fotos` DISABLE KEYS */;
INSERT INTO `fotos` (`cd_foto`,`nm_destino_foto`,`ds_foto`,`cd_usuario`,`cd_album`,`cd_situacao_perfil`,`dt_foto`) VALUES 
 (1,'1/HTML/albuns/1/1.jpg','Legal',1,1,1,'2012-09-19'),
 (2,'2/HTML/albuns/2/2.jpg','comentario1',2,2,1,'2012-02-19'),
 (3,'3/HTML/albuns/3/3.jpg','comentario2',3,3,1,'2012-05-02'),
 (4,'4/HTML/albuns/4/4.jpg','comentario3',4,4,1,'2012-07-05'),
 (5,'5/HTML/albuns/5/5.jpg','COMENTARIO 5',5,5,1,'2012-07-05'),
 (6,'6/HTML/albuns/6/6.jpg','Comentario 6',6,6,1,'2012-07-05'),
 (7,'1/HTML/albuns/7/7.jpg','comentarios',1,7,0,'2012-07-05'),
 (8,'7/HTML/albuns/8/8.jpg','comentario',7,8,1,'2012-07-05'),
 (9,'8/HTML/albuns/9/9.jpg','comentario',8,9,1,'2012-07-05'),
 (10,'9/HTML/albuns/10/10.jpg','comentario',9,10,1,'2012-07-05'),
 (11,'10/HTML/albuns/11/11.jpg','comentario',10,11,1,'2012-07-05'),
 (12,'11/HTML/albuns/12/12.jpg','comentario',11,12,1,'2012-07-05'),
 (13,'12/HTML/albuns/13/13.jpg','comentario',12,13,1,'2012-07-05'),
 (14,'13/HTML/albuns/14/14.jpg','comentario',13,14,1,'2012-07-05'),
 (15,'14/HTML/albuns/15/15.jpg','comentario',14,15,1,'2012-07-05'),
 (16,'15/HTML/albuns/16/16.jpg','comentario',15,16,1,'2012-07-05'),
 (17,'16/HTML/albuns/17/17.jpg','comentario',16,17,1,'2012-07-05'),
 (18,'17/HTML/albuns/18/18.jpg','comentario',17,18,1,'2012-07-05'),
 (19,'18/HTML/albuns/19/19.jpg','comentario',18,19,1,'2012-07-05'),
 (20,'19/HTML/albuns/20/20.jpg','comentario',19,20,1,'2012-07-05'),
 (21,'20/HTML/albuns/21/21.jpg','comentario',20,21,1,'2012-07-05'),
 (22,'21/HTML/albuns/22/22.jpg','comentario',21,22,1,'2012-07-05'),
 (23,'22/HTML/albuns/23/23.jpg','comentario',22,23,1,'2012-07-05'),
 (24,'23/HTML/albuns/24/24.jpg','comentario',23,24,1,'2012-07-05'),
 (25,'24/HTML/albuns/25/25.jpg','comentario',24,25,1,'2012-07-05'),
 (26,'8/HTML/albuns/26/26.jpg','comentario',8,26,0,'2012-07-05'),
 (27,'8/HTML/albuns/26/27.jpg','fotos',8,26,0,'2012-11-27'),
 (28,'9/HTML/albuns/27/28.jpg','fotos',9,27,0,'2012-11-27'),
 (29,'10/HTML/albuns/28/29.jpg','fotos',10,28,0,'2012-11-27'),
 (30,'11/HTML/albuns/29/30.jpg','fotos',11,29,0,'2012-11-27'),
 (31,'12/HTML/albuns/30/31.jpg','fotos',12,30,0,'2012-11-27'),
 (32,'13/HTML/albuns/31/32.jpg','fotos',13,31,0,'2012-11-27'),
 (33,'14/HTML/albuns/32/33.jpg','fotos',14,32,0,'2012-11-27'),
 (34,'15/HTML/albuns/33/34.jpg','fotos',15,33,0,'2012-11-27'),
 (35,'16/HTML/albuns/34/35.jpg','fotos',16,34,0,'2012-11-27'),
 (36,'17/HTML/albuns/35/36.jpg','fotos',17,35,0,'2012-11-27'),
 (37,'18/HTML/albuns/36/37.jpg','fotos',18,36,0,'2012-11-27'),
 (38,'19/HTML/albuns/37/38.jpg','fotos',19,37,0,'2012-11-27'),
 (39,'20/HTML/albuns/38/39.jpg','fotos',20,38,0,'2012-11-27'),
 (40,'21/HTML/albuns/39/40.jpg','fotos',21,39,0,'2012-11-27'),
 (41,'22/HTML/albuns/40/41.jpg','fotos',22,40,0,'2012-11-27');
/*!40000 ALTER TABLE `fotos` ENABLE KEYS */;


--
-- Definition of table `musicas`
--

DROP TABLE IF EXISTS `musicas`;
CREATE TABLE `musicas` (
  `cd_musica` int(11) NOT NULL auto_increment,
  `nm_musica` varchar(45) NOT NULL,
  `nm_destino_musica` longtext NOT NULL,
  `cd_usuario` int(11) NOT NULL,
  `cd_estilo` int(11) NOT NULL,
  PRIMARY KEY  (`cd_musica`),
  KEY `fk_musicas_usuarios1` (`cd_usuario`),
  KEY `fk_musicas_tipos_estilos1` (`cd_estilo`),
  CONSTRAINT `fk_musicas_tipos_estilos1` FOREIGN KEY (`cd_estilo`) REFERENCES `tipos_estilos` (`cd_estilo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_musicas_usuarios1` FOREIGN KEY (`cd_usuario`) REFERENCES `usuarios` (`cd_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `musicas`
--

/*!40000 ALTER TABLE `musicas` DISABLE KEYS */;
INSERT INTO `musicas` (`cd_musica`,`nm_musica`,`nm_destino_musica`,`cd_usuario`,`cd_estilo`) VALUES 
 (1,'Gangnam Style','/Fusa/HTML/Usuarios/1/HTML/musicas/1.mp3',1,1),
 (3,'Acima do Sol','/Fusa/HTML/Usuarios/5/HTML/musicas/3.mp3',5,1),
 (4,'Sutilmente','/Fusa/HTML/Usuarios/5/HTML/musicas/4.mp3',5,2),
 (5,'Um Minuto','/Fusa/HTML/Usuarios/2/HTML/musicas/5.mp3',2,1),
 (6,'Tchau e Bença','/Fusa/HTML/Usuarios/2/HTML/musicas/6.mp3',2,1),
 (7,'Faded','/Fusa/HTML/Usuarios/4/HTML/musicas/7.mp3',4,10),
 (8,'In This Thang ','/Fusa/HTML/Usuarios/4/HTML/musicas/8.mp3',4,10);
/*!40000 ALTER TABLE `musicas` ENABLE KEYS */;


--
-- Definition of table `produtor`
--

DROP TABLE IF EXISTS `produtor`;
CREATE TABLE `produtor` (
  `cd_produtor` int(11) NOT NULL auto_increment,
  `nm_produtor` varchar(100) NOT NULL,
  `nm_endereco_produtor` longtext NOT NULL,
  `nm_cep_produtor` int(11) NOT NULL,
  `nm_telefone1_produtor` varchar(20) NOT NULL,
  `nm_telefone2_produtor` varchar(20) default NULL,
  `nm_estado_produtor` varchar(80) NOT NULL,
  `nm_cidade_produtor` varchar(100) NOT NULL,
  `cd_cpf_produtor` varchar(20) NOT NULL,
  PRIMARY KEY  (`cd_produtor`,`cd_cpf_produtor`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produtor`
--

/*!40000 ALTER TABLE `produtor` DISABLE KEYS */;
INSERT INTO `produtor` (`cd_produtor`,`nm_produtor`,`nm_endereco_produtor`,`nm_cep_produtor`,`nm_telefone1_produtor`,`nm_telefone2_produtor`,`nm_estado_produtor`,`nm_cidade_produtor`,`cd_cpf_produtor`) VALUES 
 (7,'Produtor','Rua lala',55632856,'(13)3256-8989','(13)4569-1254','SAO PAULO','SANTOS','123456789'),
 (23,'Marcio Castro','Rua Santos',11023562,'(13)3245-4545','(13)3215-5445','SAO PAULO','SANTOS','987654321'),
 (24,'Paula de Oliveira','Rua Santos',11026985,'(13)3245-4512','(13)3215-4565','SAO PAULO','SANTOS','');
/*!40000 ALTER TABLE `produtor` ENABLE KEYS */;


--
-- Definition of table `propostas`
--

DROP TABLE IF EXISTS `propostas`;
CREATE TABLE `propostas` (
  `cd_proposta` int(11) NOT NULL auto_increment,
  `cd_produtor` int(11) default NULL,
  `cd_cpf_produtor` varchar(20) default NULL,
  `ds_proposta` longtext NOT NULL,
  `cd_usuario` int(11) default NULL,
  `cd_tipo_proposta` int(11) NOT NULL,
  `cd_situacao_proposta` int(10) unsigned NOT NULL,
  PRIMARY KEY  (`cd_proposta`),
  KEY `fk_propostas_produtor1` (`cd_produtor`,`cd_cpf_produtor`),
  KEY `fk_propostas_usuarios1` (`cd_usuario`),
  KEY `fk_propostas_tipos_propostas1` (`cd_tipo_proposta`),
  CONSTRAINT `fk_propostas_produtor1` FOREIGN KEY (`cd_produtor`, `cd_cpf_produtor`) REFERENCES `produtor` (`cd_produtor`, `cd_cpf_produtor`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_propostas_tipos_propostas1` FOREIGN KEY (`cd_tipo_proposta`) REFERENCES `tipos_propostas` (`cd_tipo_proposta`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_propostas_usuarios1` FOREIGN KEY (`cd_usuario`) REFERENCES `usuarios` (`cd_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `propostas`
--

/*!40000 ALTER TABLE `propostas` DISABLE KEYS */;
INSERT INTO `propostas` (`cd_proposta`,`cd_produtor`,`cd_cpf_produtor`,`ds_proposta`,`cd_usuario`,`cd_tipo_proposta`,`cd_situacao_proposta`) VALUES 
 (1,7,NULL,'oi 1',1,2,1),
 (2,24,NULL,'legal',1,2,0);
/*!40000 ALTER TABLE `propostas` ENABLE KEYS */;


--
-- Definition of table `recados`
--

DROP TABLE IF EXISTS `recados`;
CREATE TABLE `recados` (
  `cd_recado` int(11) NOT NULL auto_increment,
  `ds_recado` longtext NOT NULL,
  `dt_recado` date NOT NULL,
  `cd_remetente_recado` int(11) NOT NULL,
  `cd_receptor_recado` int(11) NOT NULL,
  `nm_horario_recado` varchar(5) NOT NULL,
  PRIMARY KEY  (`cd_recado`,`cd_receptor_recado`,`cd_remetente_recado`),
  KEY `fk_recados_usuario1_idx` (`cd_remetente_recado`),
  KEY `fk_recados_usuario2_idx` (`cd_receptor_recado`),
  CONSTRAINT `fk_recados_usuario1` FOREIGN KEY (`cd_remetente_recado`) REFERENCES `usuarios` (`cd_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_recados_usuario2` FOREIGN KEY (`cd_receptor_recado`) REFERENCES `usuarios` (`cd_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `recados`
--

/*!40000 ALTER TABLE `recados` DISABLE KEYS */;
INSERT INTO `recados` (`cd_recado`,`ds_recado`,`dt_recado`,`cd_remetente_recado`,`cd_receptor_recado`,`nm_horario_recado`) VALUES 
 (2,'oi','2012-10-12',1,1,'20:41'),
 (3,'oi3','2012-10-12',2,1,'20:42'),
 (4,'oi5','2012-10-15',1,1,'21:36'),
 (6,'oi2','2012-10-17',1,5,'21:36'),
 (7,'oi','2012-10-17',1,5,'21:57'),
 (9,'louco','2012-10-17',1,5,'21:58'),
 (10,'oi','2012-10-17',1,1,'22:01'),
 (11,'oi','2012-10-17',1,5,'22:02'),
 (12,'oi','2012-11-21',7,1,'21:27'),
 (13,'oi</br>oi</br>','2012-11-21',7,1,'21:47'),
 (14,'hj','2012-11-21',7,5,'21:51');
/*!40000 ALTER TABLE `recados` ENABLE KEYS */;


--
-- Definition of table `referencias`
--

DROP TABLE IF EXISTS `referencias`;
CREATE TABLE `referencias` (
  `cd_referencia` int(11) NOT NULL auto_increment,
  `cd_usuario` int(11) NOT NULL,
  `ds_referencia` longtext NOT NULL,
  `nm_destino_referencia` longtext NOT NULL,
  PRIMARY KEY  (`cd_referencia`),
  KEY `fk_referencias_usuario1` (`cd_usuario`),
  CONSTRAINT `fk_referencias_usuario1` FOREIGN KEY (`cd_usuario`) REFERENCES `usuarios` (`cd_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `referencias`
--

/*!40000 ALTER TABLE `referencias` DISABLE KEYS */;
INSERT INTO `referencias` (`cd_referencia`,`cd_usuario`,`ds_referencia`,`nm_destino_referencia`) VALUES 
 (15,5,'Me inspiro nele!','../../Usuarios/5/HTML/referencias/imagens/15.jpg'),
 (16,1,'Muito Show','../../Usuarios/1/HTML/referencias/imagens/16.jpg');
/*!40000 ALTER TABLE `referencias` ENABLE KEYS */;


--
-- Definition of table `status`
--

DROP TABLE IF EXISTS `status`;
CREATE TABLE `status` (
  `cd_status` int(11) NOT NULL auto_increment,
  `nm_status` varchar(50) NOT NULL,
  PRIMARY KEY  (`cd_status`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `status`
--

/*!40000 ALTER TABLE `status` DISABLE KEYS */;
INSERT INTO `status` (`cd_status`,`nm_status`) VALUES 
 (1,'DISPONÍVEL PARA UMA BANDA'),
 (2,'SOLO'),
 (3,'BANDA'),
 (4,'VISITANTE'),
 (5,'Produtor');
/*!40000 ALTER TABLE `status` ENABLE KEYS */;


--
-- Definition of table `tipos_atualizacoes`
--

DROP TABLE IF EXISTS `tipos_atualizacoes`;
CREATE TABLE `tipos_atualizacoes` (
  `cd_atualizacao` int(11) NOT NULL,
  `nm_atualizacao` varchar(50) NOT NULL,
  PRIMARY KEY  (`cd_atualizacao`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tipos_atualizacoes`
--

/*!40000 ALTER TABLE `tipos_atualizacoes` DISABLE KEYS */;
INSERT INTO `tipos_atualizacoes` (`cd_atualizacao`,`nm_atualizacao`) VALUES 
 (1,'comentario_video'),
 (2,'lyrics'),
 (3,'curtir_video'),
 (4,'confirmacao_convite_banda'),
 (5,'confirmacao_convite_contato'),
 (6,'confirmacao_convite_produtor');
/*!40000 ALTER TABLE `tipos_atualizacoes` ENABLE KEYS */;


--
-- Definition of table `tipos_estilos`
--

DROP TABLE IF EXISTS `tipos_estilos`;
CREATE TABLE `tipos_estilos` (
  `cd_estilo` int(11) NOT NULL auto_increment,
  `nm_estilo` varchar(45) NOT NULL,
  PRIMARY KEY  (`cd_estilo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tipos_estilos`
--

/*!40000 ALTER TABLE `tipos_estilos` DISABLE KEYS */;
INSERT INTO `tipos_estilos` (`cd_estilo`,`nm_estilo`) VALUES 
 (1,'SAMBA'),
 (2,'ROCK'),
 (3,'PUNK'),
 (4,'FUNK'),
 (5,'PAGODE'),
 (6,'SETARNEJO'),
 (7,'FORRÓ'),
 (8,'K-POP'),
 (9,'POP'),
 (10,'HIP-HOP');
/*!40000 ALTER TABLE `tipos_estilos` ENABLE KEYS */;


--
-- Definition of table `tipos_instrumentos`
--

DROP TABLE IF EXISTS `tipos_instrumentos`;
CREATE TABLE `tipos_instrumentos` (
  `cd_instrumento` int(11) NOT NULL auto_increment,
  `nm_instrumento` varchar(45) NOT NULL,
  PRIMARY KEY  (`cd_instrumento`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tipos_instrumentos`
--

/*!40000 ALTER TABLE `tipos_instrumentos` DISABLE KEYS */;
INSERT INTO `tipos_instrumentos` (`cd_instrumento`,`nm_instrumento`) VALUES 
 (1,'pandeiro'),
 (2,'bateria'),
 (3,'guitarra'),
 (4,'violao'),
 (5,'cantor(a)'),
 (6,'piano'),
 (7,'baixo');
/*!40000 ALTER TABLE `tipos_instrumentos` ENABLE KEYS */;


--
-- Definition of table `tipos_propostas`
--

DROP TABLE IF EXISTS `tipos_propostas`;
CREATE TABLE `tipos_propostas` (
  `cd_tipo_proposta` int(11) NOT NULL auto_increment,
  `nm_tipo_proposta` varchar(50) NOT NULL,
  PRIMARY KEY  (`cd_tipo_proposta`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tipos_propostas`
--

/*!40000 ALTER TABLE `tipos_propostas` DISABLE KEYS */;
INSERT INTO `tipos_propostas` (`cd_tipo_proposta`,`nm_tipo_proposta`) VALUES 
 (1,'Convite Banda'),
 (2,'Convite Produtor');
/*!40000 ALTER TABLE `tipos_propostas` ENABLE KEYS */;


--
-- Definition of table `tipos_usuarios`
--

DROP TABLE IF EXISTS `tipos_usuarios`;
CREATE TABLE `tipos_usuarios` (
  `cd_tipo_usuario` int(11) NOT NULL auto_increment,
  `nm_tipo_usuario` varchar(45) NOT NULL,
  PRIMARY KEY  (`cd_tipo_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tipos_usuarios`
--

/*!40000 ALTER TABLE `tipos_usuarios` DISABLE KEYS */;
INSERT INTO `tipos_usuarios` (`cd_tipo_usuario`,`nm_tipo_usuario`) VALUES 
 (1,'SOLO'),
 (2,'BANDA'),
 (3,'VISITANTE'),
 (4,'PRODUTOR');
/*!40000 ALTER TABLE `tipos_usuarios` ENABLE KEYS */;


--
-- Definition of table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE `usuarios` (
  `cd_usuario` int(11) NOT NULL auto_increment,
  `nm_usuario` longtext NOT NULL,
  `nm_estado` longtext NOT NULL,
  `nm_cidade` longtext NOT NULL,
  `nm_login` varchar(70) NOT NULL,
  `nm_senha` varchar(10) NOT NULL,
  `produtor_cd_produtor` int(11) default NULL,
  `produtor_cd_cpf_produtor` varchar(20) default NULL,
  `dt_nascimento` date NOT NULL,
  `cd_status` int(11) NOT NULL,
  `nm_telefone` varchar(20) NOT NULL,
  `cd_tipo_usuario` int(11) NOT NULL,
  `cd_sexo` int(10) unsigned default NULL,
  PRIMARY KEY  (`cd_usuario`),
  KEY `fk_usuarios_produtor1` (`produtor_cd_produtor`,`produtor_cd_cpf_produtor`),
  KEY `fk_usuarios_status1` (`cd_status`),
  KEY `fk_usuarios_tipos_usuarios1` (`cd_tipo_usuario`),
  CONSTRAINT `fk_usuarios_produtor1` FOREIGN KEY (`produtor_cd_produtor`, `produtor_cd_cpf_produtor`) REFERENCES `produtor` (`cd_produtor`, `cd_cpf_produtor`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_usuarios_status1` FOREIGN KEY (`cd_status`) REFERENCES `status` (`cd_status`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_usuarios_tipos_usuarios1` FOREIGN KEY (`cd_tipo_usuario`) REFERENCES `tipos_usuarios` (`cd_tipo_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usuarios`
--

/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` (`cd_usuario`,`nm_usuario`,`nm_estado`,`nm_cidade`,`nm_login`,`nm_senha`,`produtor_cd_produtor`,`produtor_cd_cpf_produtor`,`dt_nascimento`,`cd_status`,`nm_telefone`,`cd_tipo_usuario`,`cd_sexo`) VALUES 
 (1,'JAE SONG','SAO PAULO','SANTOS','HELIO@HOTMAIL.COM','123',NULL,NULL,'1994-09-02',1,'(13)6589-8965',1,1),
 (2,'THIAGUINHO','SAO PAULO','SANTOS','RAFAEL@HOTMAIL.COM','123',NULL,NULL,'1994-07-01',1,'(13)3658-3256',1,1),
 (3,'BRITNEY SPEARS','SAO PAULO','SANTOS','ANNA@HOTMAIL.COM','123',NULL,NULL,'1994-02-25',2,'(13)3256-6585',1,0),
 (4,'TYGA','SAO PAULO','SANTOS','LEONARDO@HOTMAIL.COM','123',NULL,NULL,'1994-05-25',1,'(13)3258-8596',1,1),
 (5,'FOSTER THE PEOPLE','SAO PAULO','SANTOS','BANDA@HOTMAIL.COM','123',NULL,NULL,'1994-05-21',3,'(13)3265-6565',2,2),
 (6,'Visitante','SAO PAULO','SANTOS','VISITANTE@HOTMAIL.COM','123',NULL,NULL,'1994-05-21',4,'(13)3265-6565',3,1),
 (7,'Produtor','SAO PAULO','SANTOS','PRODUTOR@HOTMAIL.COM','123',NULL,NULL,'1994-02-25',5,'(13)3565-8596',4,1),
 (8,'Mika','SAO PAULO','SANTOS','MIKA@HOTMAIL.COM','123',NULL,NULL,'1994-05-25',2,'(13)3256-5645',1,1),
 (9,'La Roux','SAO PAULO','SANTOS','LA@HOTMAIL.COM','123',NULL,NULL,'1994-05-25',2,'(13)3248-9856',1,0),
 (10,'Gotye','SAO PAULO','SANTOS','GOTYE@HOTMAIL.COM','123',NULL,NULL,'1985-02-09',2,'(13)3245-7854',1,1),
 (11,'Adam Levine','SAO PAULO','SANTOS','ADAM@HOTMAIL.COM','123',NULL,NULL,'1975-02-06',1,'(13)3246-8551',1,1),
 (12,'James Valentine','SAO PAULO','SANTOS','JAMES@HOTMAIL.COM','123',NULL,NULL,'1971-09-17',1,'(13)3265-5645',1,1),
 (13,'Jesse Carmichael','SAO PAULO','SANTOS','JESSE@HOTMAIL.COM','123',NULL,NULL,'1961-05-21',1,'(13)3245-5489',1,1),
 (14,'Matt Flynn','SAO PAULO','SANTOS','MATT@HOTMAIL.COM','123',NULL,NULL,'1957-05-23',1,'(13)3256-6545',1,1),
 (15,'Mickey Madden','SAO PAULO','SANTOS','MICKEY@HOTMAIL.COM','123',NULL,NULL,'1967-01-25',1,'(13)3245-6578',1,1),
 (16,'Cubbie','SAO PAULO','SANTOS','CUBBIE@HOTMAIL.COM','123',NULL,NULL,'1985-02-06',1,'(13)3245-4296',1,1),
 (17,'Mark Foster','SAO PAULO','SANTOS','MARK@HOTMAIL.COM','123',NULL,NULL,'1967-03-17',1,'(13)3245-5179',1,1),
 (18,'Mark Pontius','SAO PAULO','SANTOS','Pontius@HOTMAIL.COM','123',NULL,NULL,'1975-02-15',1,'(13)3241-5642',1,1),
 (19,'Apl.de.ap','SAO PAULO','SANTOS','Apl@HOTMAIL.COM','123',NULL,NULL,'1975-06-18',1,'(13)3241-9571',1,1),
 (20,'Fergie','SAO PAULO','SANTOS','FERGIE@HOTMAIL.COM','123',NULL,NULL,'1971-03-21',1,'(13)3245-7431',1,0),
 (21,'Taboo','SAO PAULO','SANTOS','TABOO@HOTMAIL.COM','123',NULL,NULL,'1973-02-15',1,'(13)3249-2356',1,1),
 (22,'Will.Iam','SAO PAULO','SANTOS','WILL@HOTMAIL.COM','123',NULL,NULL,'1975-01-16',1,'(13)3215-1755',1,1),
 (23,'Marcio Castro','SAO PAULO','SANTOS','MARCIO@HOTMAIL.COM','123',NULL,NULL,'1961-02-03',5,'(13)3212-5487',4,1),
 (24,'Paula de Oliveira','SAO PAULO','SANTOS','PAULA@HOTMAIL.COM','123',NULL,NULL,'1953-11-05',5,'(13)3275-5123',4,0);
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;


--
-- Definition of table `usuarios_bandas`
--

DROP TABLE IF EXISTS `usuarios_bandas`;
CREATE TABLE `usuarios_bandas` (
  `cd_instrumento` int(11) NOT NULL,
  `cd_banda` int(11) NOT NULL,
  `cd_usuario` int(11) NOT NULL,
  PRIMARY KEY  (`cd_banda`,`cd_usuario`),
  KEY `fk_usuario_banda_tipo_instrumento1_idx` (`cd_instrumento`),
  KEY `fk_usuarios_bandas_usuarios1` (`cd_banda`),
  KEY `fk_usuarios_bandas_usuarios2` (`cd_usuario`),
  CONSTRAINT `fk_usuarios_bandas_usuarios1` FOREIGN KEY (`cd_banda`) REFERENCES `usuarios` (`cd_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_usuarios_bandas_usuarios2` FOREIGN KEY (`cd_usuario`) REFERENCES `usuarios` (`cd_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_usuario_banda_tipo_instrumento1` FOREIGN KEY (`cd_instrumento`) REFERENCES `tipos_instrumentos` (`cd_instrumento`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usuarios_bandas`
--

/*!40000 ALTER TABLE `usuarios_bandas` DISABLE KEYS */;
INSERT INTO `usuarios_bandas` (`cd_instrumento`,`cd_banda`,`cd_usuario`) VALUES 
 (3,5,16);
/*!40000 ALTER TABLE `usuarios_bandas` ENABLE KEYS */;


--
-- Definition of table `usuarios_estilos`
--

DROP TABLE IF EXISTS `usuarios_estilos`;
CREATE TABLE `usuarios_estilos` (
  `cd_estilo` int(11) NOT NULL,
  `cd_usuario` int(11) NOT NULL,
  PRIMARY KEY  (`cd_estilo`,`cd_usuario`),
  KEY `fk_usuario_estilo_tipo_estilo_idx` (`cd_estilo`),
  KEY `fk_usuario_estilo_usuario1_idx` (`cd_usuario`),
  CONSTRAINT `fk_usuario_estilo_tipo_estilo` FOREIGN KEY (`cd_estilo`) REFERENCES `tipos_estilos` (`cd_estilo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_usuario_estilo_usuario1` FOREIGN KEY (`cd_usuario`) REFERENCES `usuarios` (`cd_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usuarios_estilos`
--

/*!40000 ALTER TABLE `usuarios_estilos` DISABLE KEYS */;
INSERT INTO `usuarios_estilos` (`cd_estilo`,`cd_usuario`) VALUES 
 (1,1),
 (1,6),
 (2,5),
 (2,6),
 (2,11),
 (2,12),
 (2,13),
 (2,14),
 (2,15),
 (2,16),
 (2,17),
 (2,18),
 (3,6),
 (4,4),
 (4,6),
 (5,2),
 (9,3),
 (9,8),
 (9,9),
 (9,10),
 (10,19),
 (10,20),
 (10,21),
 (10,22);
/*!40000 ALTER TABLE `usuarios_estilos` ENABLE KEYS */;


--
-- Definition of table `usuarios_instrumentos`
--

DROP TABLE IF EXISTS `usuarios_instrumentos`;
CREATE TABLE `usuarios_instrumentos` (
  `cd_usuario` int(11) NOT NULL,
  `cd_instrumento` int(11) NOT NULL,
  PRIMARY KEY  (`cd_usuario`,`cd_instrumento`),
  KEY `fk_usuarios_has_tipos_instrumentos_tipos_instrumentos1` (`cd_instrumento`),
  CONSTRAINT `fk_usuarios_has_tipos_instrumentos_tipos_instrumentos1` FOREIGN KEY (`cd_instrumento`) REFERENCES `tipos_instrumentos` (`cd_instrumento`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_usuarios_has_tipos_instrumentos_usuarios1` FOREIGN KEY (`cd_usuario`) REFERENCES `usuarios` (`cd_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usuarios_instrumentos`
--

/*!40000 ALTER TABLE `usuarios_instrumentos` DISABLE KEYS */;
INSERT INTO `usuarios_instrumentos` (`cd_usuario`,`cd_instrumento`) VALUES 
 (14,2),
 (18,2),
 (12,3),
 (16,3),
 (4,4),
 (1,5),
 (2,5),
 (3,5),
 (8,5),
 (9,5),
 (10,5),
 (11,5),
 (17,5),
 (19,5),
 (20,5),
 (21,5),
 (22,5),
 (13,6),
 (15,7);
/*!40000 ALTER TABLE `usuarios_instrumentos` ENABLE KEYS */;


--
-- Definition of table `videos`
--

DROP TABLE IF EXISTS `videos`;
CREATE TABLE `videos` (
  `cd_video` int(11) NOT NULL auto_increment,
  `nm_video` longtext NOT NULL,
  `dt_video` date NOT NULL,
  `cd_usuario` int(11) NOT NULL,
  `cd_estilo` int(11) NOT NULL,
  `nm_destino_video` longtext NOT NULL,
  `nm_horario_video` varchar(5) NOT NULL,
  `nm_destino_print` longtext NOT NULL,
  `ds_video` longtext NOT NULL,
  PRIMARY KEY  (`cd_video`),
  KEY `fk_videos_usuario1_idx` (`cd_usuario`),
  KEY `fk_videos_tipo_estilo1_idx` (`cd_estilo`),
  CONSTRAINT `fk_videos_tipo_estilo1` FOREIGN KEY (`cd_estilo`) REFERENCES `tipos_estilos` (`cd_estilo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_videos_usuario1` FOREIGN KEY (`cd_usuario`) REFERENCES `usuarios` (`cd_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `videos`
--

/*!40000 ALTER TABLE `videos` DISABLE KEYS */;
INSERT INTO `videos` (`cd_video`,`nm_video`,`dt_video`,`cd_usuario`,`cd_estilo`,`nm_destino_video`,`nm_horario_video`,`nm_destino_print`,`ds_video`) VALUES 
 (1,'OPPA GANGNAM STYLE','2012-11-19',1,8,'../../Usuarios/1/HTML/videos/1/video/1.mp4','19:05','../../Usuarios/1/HTML/videos/1/print/1.jpg','legal'),
 (2,'BUQUE DE FLORES','2012-11-15',2,5,'../../Usuarios/2/HTML/videos/2/video/2.mp4','17:00','../../Usuarios/2/HTML/videos/2/print/2.jpg','legal'),
 (3,'HOLD IT AGAINST ME','2012-03-25',3,3,'../../Usuarios/3/HTML/videos/3/video/3.mp4','15:00','../../Usuarios/3/HTML/videos/3/print/3.jpg','legal'),
 (4,'FADED','2012-05-06',4,4,'../../Usuarios/4/HTML/videos/4/video/4.mp4','12:00','../../Usuarios/4/HTML/videos/4/print/4.jpg','legal'),
 (5,'PUMPED UP KICKS','2012-05-21',5,1,'../../Usuarios/5/HTML/videos/5/video/5.mp4','20:00','../../Usuarios/5/HTML/videos/5/print/5.jpg','legal');
/*!40000 ALTER TABLE `videos` ENABLE KEYS */;


--
-- Definition of table `visualizacoes`
--

DROP TABLE IF EXISTS `visualizacoes`;
CREATE TABLE `visualizacoes` (
  `cd_video` int(11) NOT NULL,
  `qt_visualizacao` int(11) NOT NULL,
  PRIMARY KEY  (`cd_video`),
  KEY `fk_visualizacoes_videos1` (`cd_video`),
  CONSTRAINT `fk_visualizacoes_videos1` FOREIGN KEY (`cd_video`) REFERENCES `videos` (`cd_video`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `visualizacoes`
--

/*!40000 ALTER TABLE `visualizacoes` DISABLE KEYS */;
INSERT INTO `visualizacoes` (`cd_video`,`qt_visualizacao`) VALUES 
 (1,900);
/*!40000 ALTER TABLE `visualizacoes` ENABLE KEYS */;




/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
