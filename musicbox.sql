-- MySQL dump 10.13  Distrib 5.1.41, for Win32 (ia32)
--
-- Host: localhost    Database: musicbox
-- ------------------------------------------------------
-- Server version	5.1.41-community

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `chuname`
--

DROP TABLE IF EXISTS `chuname`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `chuname` (
  `no` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id` int(11) DEFAULT NULL,
  `name` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`no`),
  UNIQUE KEY `Index1` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `chuname`
--

LOCK TABLES `chuname` WRITE;
/*!40000 ALTER TABLE `chuname` DISABLE KEYS */;
INSERT INTO `chuname` VALUES (1,1,'1980년대'),(2,2,'1990년대'),(3,3,'2000년대'),(4,4,'2010년대'),(5,5,'비올 때 듣는 노래'),(6,6,'노래방 인기곡'),(7,7,'사랑 노래'),(8,8,'여행 노래'),(9,9,'크리스마스 노래'),(10,10,'여름 노래');
/*!40000 ALTER TABLE `chuname` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `member`
--

DROP TABLE IF EXISTS `member`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `member` (
  `no` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id` varchar(20) DEFAULT NULL,
  `pw` varchar(100) DEFAULT NULL,
  `name` varchar(20) DEFAULT NULL,
  `insdt` datetime DEFAULT NULL,
  `lastdt` datetime DEFAULT NULL,
  PRIMARY KEY (`no`),
  UNIQUE KEY `Index1` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `member`
--

LOCK TABLES `member` WRITE;
/*!40000 ALTER TABLE `member` DISABLE KEYS */;
INSERT INTO `member` VALUES (1,'kildong','7110eda4d09e062aa5e4a390b0a572ac0d2c0220','홍길동','2021-11-27 08:41:09',NULL);
/*!40000 ALTER TABLE `member` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `music`
--

DROP TABLE IF EXISTS `music`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `music` (
  `no` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(30) DEFAULT NULL,
  `genre` varchar(10) DEFAULT NULL,
  `tag` varchar(100) DEFAULT NULL,
  `singer` varchar(20) DEFAULT NULL,
  `chuid` int(11) DEFAULT NULL,
  `likecount` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`no`)
) ENGINE=MyISAM AUTO_INCREMENT=151 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `music`
--

LOCK TABLES `music` WRITE;
/*!40000 ALTER TABLE `music` DISABLE KEYS */;
INSERT INTO `music` VALUES (1,'개똥벌레',NULL,NULL,'신형원',1,0),(2,'그것만이 내세상',NULL,NULL,'들국화',1,0),(3,'안녕이라고 말하지마',NULL,NULL,'이승철',1,0),(4,'매일매일 기다려',NULL,NULL,'티삼스',1,0),(5,'담다디',NULL,NULL,'이상은',1,0),(6,'널 그리며',NULL,NULL,'박남정',1,0),(7,'바람바람바람',NULL,NULL,'김범룡',1,0),(8,'한번만 더',NULL,NULL,'박성신',1,0),(9,'새들처럼',NULL,NULL,'변진섭',1,0),(10,'토요일은 밤이 좋아',NULL,NULL,'김종찬',1,0),(11,'빙글빙글',NULL,NULL,'나미',1,0),(12,'바다에 누워',NULL,NULL,'높은음자리',1,0),(13,'아파트',NULL,NULL,'윤수일',1,0),(14,'여행을 떠나요',NULL,NULL,'조용필',1,0),(15,'희야',NULL,NULL,'부활',1,0),(16,'내사랑 내곁에',NULL,NULL,'김현식',2,0),(17,'POSION',NULL,NULL,'엄정화',2,0),(18,'희망사항',NULL,NULL,'변진섭',2,0),(19,'달팽이',NULL,NULL,'패닉',2,0),(20,'잘못된 만남',NULL,NULL,'김건모',2,0),(21,'사랑할수록',NULL,NULL,'부활',2,0),(22,'달의 몰락',NULL,NULL,'김현철',2,0),(23,'기억의 습작',NULL,NULL,'전람회',2,0),(24,'마지막 콘서트',NULL,NULL,'이승철',2,0),(25,'너의 결혼식',NULL,NULL,'윤종신',2,0),(26,'마법의 성',NULL,NULL,'더 클래식',2,0),(27,'난 알아요',NULL,NULL,'서태지와 아이들',2,0),(28,'슬픈 인연',NULL,NULL,'015B',2,0),(29,'칵테일 사랑',NULL,NULL,'마로니에',2,0),(30,'난 행복해',NULL,NULL,'이소라',2,0),(31,'GEE',NULL,NULL,'소녀시대',3,0),(32,'주문 ',NULL,NULL,'동방신기',3,0),(33,'거짓말',NULL,NULL,'빅뱅',3,0),(34,'Tell me',NULL,NULL,'원더걸스',3,0),(35,'Never Ending Story',NULL,NULL,'부활',3,0),(36,'죄와벌',NULL,NULL,'SG워너비',3,0),(37,'I don\'t care',NULL,NULL,'2NE1',3,0),(38,'아틸란티스 소녀',NULL,NULL,'보아',3,0),(39,'좋은 사람',NULL,NULL,'박효신',3,0),(40,'10Minutes',NULL,NULL,'이효리',3,0),(41,'길',NULL,NULL,'god',3,0),(42,'비행기',NULL,NULL,'거북이',3,0),(43,'열정',NULL,NULL,'SE7EN',3,0),(44,'아시나요',NULL,NULL,'조성모',3,0),(45,'벌써 일년',NULL,NULL,'브라운 아이즈',3,0),(46,'벚꽃엔딩',NULL,NULL,'버스커 버스커',4,0),(47,'야생화',NULL,NULL,'박효신',4,0),(48,'어디에도',NULL,NULL,'엠씨더맥스',4,0),(49,'바람기억',NULL,NULL,'나얼',4,0),(50,'선물',NULL,NULL,'멜로망스',4,0),(51,'좋니',NULL,NULL,'윤종신',4,0),(52,'너를 만나',NULL,NULL,'폴킴',4,0),(53,'뱅뱅뱅',NULL,NULL,'빅뱅',4,0),(54,'D',NULL,NULL,'DEAN',4,0),(55,'DNA',NULL,NULL,'방탄 소년단',4,0),(56,'사랑을 했다',NULL,NULL,'IKON',4,0),(57,'썸',NULL,NULL,'소유,정기고',4,0),(58,'금요일에 만나요',NULL,NULL,'아이유',4,0),(59,'걱정 말아요 그대',NULL,NULL,'이적',4,0),(60,'CHEER UP ',NULL,NULL,'트와이스',4,0),(61,'우산',NULL,NULL,'에픽하이',5,0),(62,'비와 당신',NULL,NULL,'럼블피쉬',5,0),(63,'천둥',NULL,NULL,'FTISLAND',5,0),(64,'비도 오고 그래서',NULL,NULL,'헤이즈',5,0),(65,'비',NULL,NULL,'폴킴',5,0),(66,'비가 내리는 날에는 ',NULL,NULL,'윤하',5,0),(67,'RAIN',NULL,NULL,'이적',5,0),(68,'장마',NULL,NULL,'정인',5,0),(69,'어푸',NULL,NULL,'아이유',5,0),(70,'사랑비',NULL,NULL,'김태우',5,0),(71,'여우야',NULL,NULL,'조이',5,0),(72,'비가 오잖아',NULL,NULL,'소유, 오반',5,0),(73,'비가 오는 날엔',NULL,NULL,'비스트',5,0),(74,'일기',NULL,NULL,'버즈',5,0),(75,'소녀',NULL,NULL,'오혁',5,0),(76,'가시',NULL,NULL,'버즈',6,0),(77,'연예인',NULL,NULL,'싸이',6,0),(78,'아로하',NULL,NULL,'쿨',6,0),(79,'순정',NULL,NULL,'코요태',6,0),(80,'노래방에서',NULL,NULL,'장범준',6,0),(81,'오래된 노래',NULL,NULL,'스탠딩 에그',6,0),(82,'오늘도 빛나는 너에게',NULL,NULL,'마크툽',6,0),(83,'사랑TWO',NULL,NULL,'YB(윤도현 밴드)',6,0),(84,'내사람',NULL,NULL,'SG워너비',6,0),(85,'사랑앓이',NULL,NULL,'FTISLAND',6,0),(86,'총맞은 것처럼',NULL,NULL,'백지영',6,0),(87,'광화문에서',NULL,NULL,'규현',6,0),(88,'행복한 나를',NULL,NULL,'허각',6,0),(89,'스물다섯, 스물하나',NULL,NULL,'자우림',6,0),(90,'비밀번호 486',NULL,NULL,'윤하',6,0),(91,'All for you',NULL,NULL,'정은지,허각',7,0),(92,'밤하늘의 별을',NULL,NULL,'경서',7,0),(93,'진심이 담긴 노래',NULL,NULL,'케이시',7,0),(94,'있잖아',NULL,NULL,'폴킴',7,0),(95,'니가 보고싶은 밤',NULL,NULL,'윤딴딴',7,0),(96,'좋아 좋아',NULL,NULL,'조정석',7,0),(97,'운명',NULL,NULL,'김성균,도희',7,0),(98,'당신만이',NULL,NULL,'곽진언,김필,임도혁',7,0),(99,'Dream',NULL,NULL,'백현,수지',7,0),(100,'LOVE DAY',NULL,NULL,'양요섭, 정은지',7,0),(101,'청혼',NULL,NULL,'노을',7,0),(102,'나는 너 좋아',NULL,NULL,'장범준',7,0),(103,'화려하지 않은 고백',NULL,NULL,'규현',7,0),(104,'고백',NULL,NULL,'뜨거운 감자',7,0),(105,'널 생각해',NULL,NULL,'원 모어 찬스',7,0),(106,'여행',NULL,NULL,'볼빨간 사춘기',8,0),(107,'여행을 떠나요',NULL,NULL,'이승기',8,0),(108,'강남 스타일',NULL,NULL,'싸이',8,0),(109,'What makes you beautiful',NULL,NULL,'One Direction',8,0),(110,'Dynamite',NULL,NULL,'방탄소년단',8,0),(111,'Credit',NULL,NULL,'릴보이',8,0),(112,'Just the way you are',NULL,NULL,'Bruno Mars',8,0),(113,'풍선',NULL,NULL,'동방신기',8,0),(114,'아주NICE',NULL,NULL,'세븐틴',8,0),(115,'We like 2 party',NULL,NULL,'빅뱅',8,0),(116,'서커스',NULL,NULL,'MC몽',8,0),(117,'Love me right',NULL,NULL,'엑소',8,0),(118,'Call me Maybe',NULL,NULL,'Carly Rae Jepsen',8,0),(119,'살짝 설렜어',NULL,NULL,'오마이걸',8,0),(120,'Beautiful',NULL,NULL,'비스트',8,0),(121,'미리 메리 크리스마스',NULL,NULL,'아이유',9,0),(122,'크리스마스니까',NULL,NULL,'젤리피쉬 엔터테이먼트',9,0),(123,'겨울 고백',NULL,NULL,'젤리피쉬 엔터테이먼트',9,0),(124,'All I want for Christmas is yo',NULL,NULL,'Mariah Carey',9,0),(125,'Last Christmas',NULL,NULL,'Ariana Grande',9,0),(126,'White Chirstmas',NULL,NULL,'Kelly Clarkson',9,0),(127,'일년전에',NULL,NULL,'장현승,정은지,김남주',9,0),(128,'Santa tell me',NULL,NULL,'Ariana Grande',9,0),(129,'Snowman',NULL,NULL,'Sia',9,0),(130,'첫 눈',NULL,NULL,'엑소',9,0),(131,'Text Me Merry Christmas',NULL,NULL,'Straight No Chaser',9,0),(132,'Must Have Love',NULL,NULL,'가인,김용준',9,0),(133,'첫 겨울이니까',NULL,NULL,'성시경,아이유',9,0),(134,'울면 안돼',NULL,NULL,'비투비',9,0),(135,'메리-크리',NULL,NULL,'보아',9,0),(136,'아틀란티스 소녀',NULL,NULL,'보아',10,0),(137,'Sea of Love',NULL,NULL,'플라이 투더 스카이',10,0),(138,'니가 참 좋아',NULL,NULL,'쥬얼리',10,0),(139,'So hot',NULL,NULL,'원더걸스',10,0),(140,'팥빙수',NULL,NULL,'윤종신',10,0),(141,'냉면',NULL,NULL,'명카드라이브',10,0),(142,'아이스크림',NULL,NULL,'MC몽',10,0),(143,'파도',NULL,NULL,'유엔',10,0),(144,'으라차차',NULL,NULL,'럼블피쉬',10,0),(145,'우린 제법 잘 어울려요',NULL,NULL,'성시경',10,0),(146,'롤린',NULL,NULL,'브레이브 걸스',10,0),(147,'나에게로 떠나는 여행',NULL,NULL,'버즈',10,0),(148,'애상',NULL,NULL,'쿨',10,0),(149,'해변의 여인',NULL,NULL,'쿨',10,0),(150,'Hot Summer',NULL,NULL,'f(x)',10,0);
/*!40000 ALTER TABLE `music` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `musiclike`
--

DROP TABLE IF EXISTS `musiclike`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `musiclike` (
  `music_no` int(10) unsigned NOT NULL,
  `member_id` varchar(20) NOT NULL,
  `insdt` datetime DEFAULT NULL,
  PRIMARY KEY (`music_no`,`member_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `musiclike`
--

LOCK TABLES `musiclike` WRITE;
/*!40000 ALTER TABLE `musiclike` DISABLE KEYS */;
/*!40000 ALTER TABLE `musiclike` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-11-28  9:43:37
