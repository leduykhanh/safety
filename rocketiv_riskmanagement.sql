-- MySQL dump 10.13  Distrib 5.5.49, for Linux (x86_64)
--
-- Host: localhost    Database: rocketiv_riskmanagement
-- ------------------------------------------------------
-- Server version	5.5.49-cll-lve

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
-- Table structure for table `actionofficer`
--

DROP TABLE IF EXISTS `actionofficer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `actionofficer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `hazardid` int(11) NOT NULL,
  `name` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=519 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `actionofficer`
--

LOCK TABLES `actionofficer` WRITE;
/*!40000 ALTER TABLE `actionofficer` DISABLE KEYS */;
INSERT INTO `actionofficer` (`id`, `hazardid`, `name`) VALUES (476,476,''),(477,477,''),(478,478,''),(479,479,''),(480,480,''),(481,481,''),(482,482,''),(483,483,''),(484,484,''),(485,485,'Billy Tan'),(486,485,'Hong Ka Lim'),(487,485,'Lee Hon Joo'),(488,486,'Yu Hong Gu'),(489,487,'Don Yeo'),(490,488,''),(491,489,''),(492,490,''),(493,491,''),(494,492,''),(495,493,'Billy Tan'),(496,493,'Hong Ka Lim'),(497,493,'Lee Hon Joo'),(498,494,'Yu Hong Gu'),(499,495,'Don Yeo'),(500,496,'officer one'),(501,497,'officer one'),(502,498,'officer one'),(503,499,'Billy Tan'),(504,499,'Hong Ka Lim'),(505,499,'Lee Hon Joo'),(506,500,'Yu Hong Gu'),(507,501,'Don Yeo'),(508,502,'sdvdsvs'),(509,503,'sdvdsvs'),(510,504,'officer one'),(511,505,''),(512,506,''),(513,507,''),(514,508,'officer one'),(515,509,'officer one'),(516,510,'officer one'),(517,511,'officer one'),(518,512,'');
/*!40000 ALTER TABLE `actionofficer` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `approvingmanager`
--

DROP TABLE IF EXISTS `approvingmanager`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `approvingmanager` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `email` text NOT NULL,
  `designation` text NOT NULL,
  `image` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `approvingmanager`
--

LOCK TABLES `approvingmanager` WRITE;
/*!40000 ALTER TABLE `approvingmanager` DISABLE KEYS */;
INSERT INTO `approvingmanager` (`id`, `name`, `email`, `designation`, `image`) VALUES (1,'Julius Lim','Julius@qe.com.sg','manager','julius.png'),(2,'julius','julius@qe.com.sg','manager','julius.png'),(3,'mrphpguru','mrphpguru@gmail.com','manager','sign.png'),(4,'suraj prakash','suraj@awwws.com','tester','suraj.png'),(5,'James','safety@qe.com.sg','RA Leader','james.png'),(6,'colin tan','colintan@rocketiva.com','manager','Colin-signatu.png');
/*!40000 ALTER TABLE `approvingmanager` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `hazard`
--

DROP TABLE IF EXISTS `hazard`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hazard` (
  `hazard_id` int(11) NOT NULL AUTO_INCREMENT,
  `work_id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `security` varchar(200) NOT NULL,
  `securitysecond` text NOT NULL,
  `accident` varchar(200) NOT NULL,
  `likehood` varchar(200) NOT NULL,
  `likehoodsecond` text NOT NULL,
  `risk_control` text NOT NULL,
  `risk_label` varchar(200) NOT NULL,
  `risk_additional` text NOT NULL,
  `action_officer` varchar(200) NOT NULL,
  `action_date` datetime NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`hazard_id`)
) ENGINE=InnoDB AUTO_INCREMENT=513 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hazard`
--

LOCK TABLES `hazard` WRITE;
/*!40000 ALTER TABLE `hazard` DISABLE KEYS */;
INSERT INTO `hazard` (`hazard_id`, `work_id`, `name`, `security`, `securitysecond`, `accident`, `likehood`, `likehoodsecond`, `risk_control`, `risk_label`, `risk_additional`, `action_officer`, `action_date`, `status`) VALUES (491,393,'awfawf','3','-',' awfwf','3','-','a','','','','2016-01-01 00:00:00',0),(492,394,'oxygen deficiency and flammable gases ','4','-',' awfwfawf','2','-','awfawf','','','','2016-01-01 00:00:00',0),(497,398,'hazard one','5','5',' no injury','5','4','adadvadv','','avasv','','2016-01-01 00:00:00',0),(499,400,'Injuring of finger','5','4','Broken finger','5','4','Wear gloves','','Get another person to supervise','','2016-11-07 00:00:00',0),(500,400,'Straining of eyes','2','-','Blindness','4','-','Wear Glasses','','','','2016-03-04 00:00:00',0),(501,401,'Accident','4','-','Killing passer-bys','3','-','Install traffic lights','','','','2016-03-03 00:00:00',0),(503,403,'sdvdsv','5','5',' sdvsdv','5','5','sdvsdv','','sdvdsv','','2016-01-01 00:00:00',0),(505,405,'sharp edges','5','5',' cuts','3','2','hand gloves','','check on ladder','','2016-01-01 00:00:00',0),(506,405,'electric shock','-','-',' ','-','-','','','','','2016-01-01 00:00:00',0),(507,406,'efewfwe','4','-','jhgyg','3','-','yiyg','','','','2016-01-01 00:00:00',0),(508,407,'hazard one','5','5',' no injury','5','4','adadvadv','','avasv','','2016-01-01 00:00:00',0),(511,410,'hazard one','5','5',' no injury','5','4','adadvadv','','avasv','','2016-01-01 00:00:00',0),(512,411,'da','5','5',' da','-','-','dad','','ad','','2016-01-01 00:00:00',0);
/*!40000 ALTER TABLE `hazard` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ramember`
--

DROP TABLE IF EXISTS `ramember`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ramember` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `riskid` int(11) NOT NULL,
  `name` text NOT NULL,
  `stauts` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=177 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ramember`
--

LOCK TABLES `ramember` WRITE;
/*!40000 ALTER TABLE `ramember` DISABLE KEYS */;
INSERT INTO `ramember` (`id`, `riskid`, `name`, `stauts`) VALUES (156,55,'awf',0),(157,56,'awf',0),(162,57,'testing mail function',0),(164,54,'James Tan',0),(165,54,'Lee Hock Guan',0),(166,54,'Gideon Kuah',0),(168,59,'sdgdsv',0),(170,53,'peter',0),(171,53,'jane',0),(172,60,'testing mail function',0),(175,58,'testing mail function',0),(176,61,'daad',0);
/*!40000 ALTER TABLE `ramember` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `riskassessment`
--

DROP TABLE IF EXISTS `riskassessment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `riskassessment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `createdBy` int(11) NOT NULL,
  `location` longtext NOT NULL,
  `process` longtext NOT NULL,
  `createdDate` datetime NOT NULL,
  `approveDate` datetime NOT NULL,
  `revisionDate` datetime NOT NULL,
  `approveBy` int(11) NOT NULL,
  `approverEmail` text NOT NULL,
  `status` int(11) NOT NULL COMMENT '0 outstanding 1 for draft 2 approved 3 archive',
  `NotifySignatureAdded` int(11) NOT NULL,
  `whenViewed` int(11) NOT NULL,
  `whenSignatureAdded` int(11) NOT NULL,
  `asTemplate` int(11) NOT NULL,
  `sendAttachment` int(11) NOT NULL,
  `signingReminders` int(11) NOT NULL,
  `sendReminder` int(11) NOT NULL,
  `afterFirstReminder` int(11) NOT NULL,
  `ecpireReminder` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=62 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `riskassessment`
--

LOCK TABLES `riskassessment` WRITE;
/*!40000 ALTER TABLE `riskassessment` DISABLE KEYS */;
INSERT INTO `riskassessment` (`id`, `createdBy`, `location`, `process`, `createdDate`, `approveDate`, `revisionDate`, `approveBy`, `approverEmail`, `status`, `NotifySignatureAdded`, `whenViewed`, `whenSignatureAdded`, `asTemplate`, `sendAttachment`, `signingReminders`, `sendReminder`, `afterFirstReminder`, `ecpireReminder`) VALUES (53,23,'warehouse','change lightbulb','2019-04-27 00:00:00','2016-04-27 10:52:29','2019-04-27 10:52:29',23,'Julius@qe.com.sg',2,0,0,0,0,0,0,0,0,0),(54,15,'Warehouse','Operation of Fork lift','2016-04-28 00:00:00','2016-05-09 13:26:15','2016-05-11 13:26:15',23,'Julius@qe.com.sg',2,0,0,0,0,0,0,0,0,0),(55,23,'warehouse','afwf','2016-05-04 00:00:00','2016-05-04 07:08:12','2019-05-04 07:08:12',23,'Julius@qe.com.sg',2,0,0,0,0,0,0,0,0,0),(56,15,'faf','af','2016-05-04 00:00:00','2016-05-04 07:27:29','2016-05-05 07:27:29',23,'Julius@qe.com.sg',2,0,0,0,0,0,0,0,0,0),(57,15,'kolkata','testing mail','2016-05-10 00:00:00','2016-05-09 09:46:05','2016-05-10 09:46:05',21,'suraj@awwws.com',2,0,0,0,0,0,0,0,0,0),(58,15,'kolkata','testing mail','2016-05-09 00:00:00','0000-00-00 00:00:00','2019-05-09 13:25:19',21,'suraj@awwws.com',0,0,0,0,0,0,0,0,0,0),(59,15,'dagvdv','sdvsdv','2016-05-17 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00',0,'',0,0,0,0,0,0,0,0,0,0),(60,15,'kolkata','testing mail','2016-07-05 08:13:35','0000-00-00 00:00:00','2019-07-05 08:13:35',21,'suraj@awwws.com',0,0,0,0,0,0,0,0,0,0),(61,26,'aaa','aaaa','2016-08-29 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00',0,'',0,0,0,0,0,0,0,0,0,0);
/*!40000 ALTER TABLE `riskassessment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `signing`
--

DROP TABLE IF EXISTS `signing`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `signing` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `riskid` int(11) NOT NULL,
  `name` text NOT NULL,
  `designation` text NOT NULL,
  `email` text NOT NULL,
  `signature` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=107 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `signing`
--

LOCK TABLES `signing` WRITE;
/*!40000 ALTER TABLE `signing` DISABLE KEYS */;
INSERT INTO `signing` (`id`, `riskid`, `name`, `designation`, `email`, `signature`) VALUES (8,5,'julius','manager','julius@qe.com.sg','julius.png'),(14,8,'mrphpguru','manager','mrphpguru@gmail.com','sign.png'),(17,9,'julius','manager','julius@qe.com.sg','julius.png'),(24,10,'Julius Lim','manager','Julius@qe.com.sg','julius.png'),(26,11,'Julius Lim','manager','Julius@qe.com.sg','julius.png'),(30,13,'julius','manager','julius@qe.com.sg','julius.png'),(31,12,'julius','manager','julius@qe.com.sg','julius.png'),(33,14,'Julius Lim','manager','Julius@qe.com.sg','julius.png'),(35,15,'julius','manager','julius@qe.com.sg','julius.png'),(37,16,'Julius Lim','manager','Julius@qe.com.sg','julius.png'),(38,6,'mrphpguru','manager','mrphpguru@gmail.com','sign.png'),(39,17,'mrphpguru','manager','','sign.png'),(41,18,'julius','manager','julius@qe.com.sg','julius.png'),(42,19,'julius','manager','','julius.png'),(43,20,'julius','manager','','julius.png'),(44,21,'julius','manager','','julius.png'),(45,22,'mrphpguru','manager','','sign.png'),(48,23,'mrphpguru','manager','mrphpguru@gmail.com','sign.png'),(49,24,'Julius Lim','manager','Julius@qe.com.sg','julius.png'),(50,25,'Julius Lim','manager','','julius.png'),(51,26,'Julius Lim','manager','','julius.png'),(52,27,'Julius Lim','manager','Julius@qe.com.sg','julius.png'),(54,28,'Julius Lim','manager','Julius@qe.com.sg','julius.png'),(55,29,'Julius Lim','manager','','julius.png'),(56,30,'suraj prakash','tester','','suraj.png'),(57,31,'Julius Lim','manager','Julius@qe.com.sg','julius.png'),(58,32,'Julius Lim','manager','Julius@qe.com.sg','julius.png'),(59,1,'julius','manager','julius@qe.com.sg','julius.png'),(60,7,'suraj prakash','tester','suraj@awwws.com','suraj.png'),(62,33,'Julius Lim','manager','Julius@qe.com.sg','julius.png'),(64,3,'suraj prakash','tester','suraj@awwws.com','suraj.png'),(65,35,'suraj prakash','tester','suraj@awwws.com','suraj.png'),(66,36,'suraj prakash','tester','suraj@awwws.com','suraj.png'),(67,42,'suraj prakash','tester','suraj@awwws.com','suraj.png'),(68,2,'suraj prakash','tester','suraj@awwws.com','suraj.png'),(69,43,'suraj prakash','tester','suraj@awwws.com','suraj.png'),(73,44,'Julius Lim','manager','Julius@qe.com.sg','julius.png'),(76,46,'julius','manager','','julius.png'),(79,48,'suraj prakash','tester','suraj@awwws.com','suraj.png'),(81,34,'suraj prakash','tester','suraj@awwws.com','suraj.png'),(83,50,'suraj prakash','tester','suraj@awwws.com','suraj.png'),(87,47,'suraj prakash','tester','suraj@awwws.com','suraj.png'),(88,4,'suraj prakash','tester','suraj@awwws.com','suraj.png'),(89,49,'suraj prakash','tester','suraj@awwws.com','suraj.png'),(90,45,'Julius Lim','manager','Julius@qe.com.sg','julius.png'),(91,51,'suraj prakash','tester','suraj@awwws.com','suraj.png'),(92,52,'suraj prakash','tester','suraj@awwws.com','suraj.png'),(95,53,'Julius Lim','manager','Julius@qe.com.sg','julius.png'),(97,55,'Julius Lim','manager','Julius@qe.com.sg','julius.png'),(99,56,'Julius Lim','manager','Julius@qe.com.sg','julius.png'),(101,57,'suraj prakash','tester','suraj@awwws.com','suraj.png'),(103,54,'Julius Lim','manager','Julius@qe.com.sg','julius.png'),(104,60,'suraj prakash','tester','','suraj.png'),(105,58,'Julius Lim','manager','Julius@qe.com.sg','julius.png'),(106,61,'Julius Lim','manager','Julius@qe.com.sg','julius.png');
/*!40000 ALTER TABLE `signing` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `staff_login`
--

DROP TABLE IF EXISTS `staff_login`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `staff_login` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `name` varchar(200) NOT NULL,
  `designation` text NOT NULL,
  `age` int(11) NOT NULL,
  `sex` varchar(11) NOT NULL,
  `signature` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `staff_login`
--

LOCK TABLES `staff_login` WRITE;
/*!40000 ALTER TABLE `staff_login` DISABLE KEYS */;
INSERT INTO `staff_login` (`id`, `email`, `password`, `name`, `designation`, `age`, `sex`, `signature`) VALUES (1,'mrphpguru@gmail.com','password123','Suraj Prakash','project manager',0,'','signature.jpg'),(14,'citrus1982@gmail..com','colintan','Colin Tan','Manager',0,'','signature.jpg'),(15,'colintan@rocketiva.com','colintan','Michael Ong','Manager',0,'','signature.jpg'),(16,'citrus1982@gmail.com','Vo*q','Colin Tan','',0,'','signature.jpg'),(17,'rajesh@awwws.com','password','Rajesh kumar','Developer',26,'male','signature.jpg'),(21,'suraj@awwws.com','Mw1I','suraj','',0,'','signature.jpg'),(23,'Julius@qe.com.sg','Qesafety123','rajesh','',0,'','Julius.png'),(24,'surajprakash1603@gmail.com','o!CJ','suraj prakash','',0,'','signature.jpg'),(25,'julius@qe.com.sg','Qesafety123','Julius Lim','Manager',0,'','Julius.png'),(26,'safety@qe.com.sg','Qesafety123','James','RA Leader',0,'','james.png');
/*!40000 ALTER TABLE `staff_login` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `workactivity`
--

DROP TABLE IF EXISTS `workactivity`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `workactivity` (
  `work_id` int(11) NOT NULL AUTO_INCREMENT,
  `riskId` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `created_by` varchar(200) NOT NULL,
  `created_on` datetime NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`work_id`)
) ENGINE=InnoDB AUTO_INCREMENT=412 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `workactivity`
--

LOCK TABLES `workactivity` WRITE;
/*!40000 ALTER TABLE `workactivity` DISABLE KEYS */;
INSERT INTO `workactivity` (`work_id`, `riskId`, `name`, `created_by`, `created_on`, `status`) VALUES (393,55,'faw','rajesh','2016-05-04 07:07:55',0),(394,56,'awf','Michael Ong','2016-05-04 07:26:29',0),(398,57,'work activity one','Michael Ong','2016-05-09 11:20:00',0),(400,54,'Lifting heavy boxes','Michael Ong','2016-05-09 13:25:33',0),(401,54,'Driving along the warehouse','Michael Ong','2016-05-09 13:25:33',0),(403,59,'sdvdsv','Michael Ong','2016-07-05 07:32:14',0),(405,53,'carry ladder','Michael Ong','2016-07-05 07:56:23',0),(406,53,'climb on the ladder','Michael Ong','2016-07-05 07:56:23',0),(407,60,'work activity one','Michael Ong','2016-07-05 08:13:35',0),(410,58,'work activity one','Michael Ong','2016-07-12 17:10:34',0),(411,61,'adad','James','2016-08-29 09:05:40',0);
/*!40000 ALTER TABLE `workactivity` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'rocketiv_riskmanagement'
--

--
-- Dumping routines for database 'rocketiv_riskmanagement'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-08-30 10:29:10
