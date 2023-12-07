-- MySQL dump 10.13  Distrib 8.0.33, for Linux (x86_64)
--
-- Host: localhost    Database: heos
-- ------------------------------------------------------
-- Server version	8.0.33

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `146eee176vimal71`
--

DROP TABLE IF EXISTS `146eee176vimal71`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `146eee176vimal71` (
  `recordId` bigint NOT NULL AUTO_INCREMENT,
  `studentid` varchar(20) DEFAULT NULL,
  `studentname` varchar(75) DEFAULT NULL,
  `Test` int DEFAULT NULL,
  `total` int DEFAULT NULL,
  `status` varchar(6) DEFAULT NULL,
  PRIMARY KEY (`recordId`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `146eee176vimal71`
--

LOCK TABLES `146eee176vimal71` WRITE;
/*!40000 ALTER TABLE `146eee176vimal71` DISABLE KEYS */;
INSERT INTO `146eee176vimal71` VALUES (1,'Aug2008EEE62','Mr.Alex Pandien',0,0,'Pass'),(2,'Aug2008EEE67','Mr.Justin Doss',43,43,'Pass'),(3,'Aug2008EEE57','Mr.Karthik Vimalraj',27,27,'Pass');
/*!40000 ALTER TABLE `146eee176vimal71` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `agentmaster`
--

DROP TABLE IF EXISTS `agentmaster`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `agentmaster` (
  `AgentId` bigint NOT NULL AUTO_INCREMENT,
  `AgentCode` varchar(5) NOT NULL DEFAULT '',
  `AgentName` varchar(50) DEFAULT NULL,
  `AgentCategory` varchar(25) DEFAULT NULL,
  `MainAgentCode` varchar(5) DEFAULT NULL,
  `AgentAddress` varchar(250) NOT NULL DEFAULT '',
  `AgentMailId` varchar(50) DEFAULT NULL,
  `AgentPhNo` varchar(50) DEFAULT NULL,
  `AgentMobileNo` varchar(50) DEFAULT NULL,
  `AgentFaxNo` varchar(50) DEFAULT NULL,
  `AgentCommission` double DEFAULT NULL,
  `AgentAccountNo` varchar(50) DEFAULT NULL,
  `AgentModeOfPayment` varchar(50) NOT NULL DEFAULT '',
  `PaymentDurationNo` int NOT NULL DEFAULT '0',
  `PaymentDuration` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`AgentId`)
) ENGINE=MyISAM AUTO_INCREMENT=225 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `agentmaster`
--

LOCK TABLES `agentmaster` WRITE;
/*!40000 ALTER TABLE `agentmaster` DISABLE KEYS */;
INSERT INTO `agentmaster` VALUES (139,'MUK01','Karthik','Main Agent','Main','No 1 Esplanade Police lane, Near Chennai House,  Chennai 108+++','as@sd.com','4343334','55','',12,'2345','Account Transaction',12,'Week once'),(141,'SSM58','Jeppiaar','Main Agent','Main','Chennai+++','ssm581@yahoo.com','323','9884221384','323',56,'602201198626','Account Transaction',23,'Month Once'),(165,'SDF23','Wenki','Sub Agent','SDF23','7,chinna street,vizag nagar,\\r\\nchennai-88','sdf5@yahoo.com','234432','9988445566','91442343434',66,'','Cash',6666,'Month Once'),(163,'SWE45','Sekar','Sub Agent','SSM58','34,raja street,park lane,\\r\\nchennai-90','swe55@yahoo.com','2223455','9955667722','9144222334455',55,'','Account Transaction',5500,'Month Once'),(192,'KAR05','Karthik','Sub Agent','DSDS','30/21, brindavan,4th st chetpet chennai','kartyvimy@gmail.com','30920921','9884926974','5463365698',12,'123365546689','Cash',22,'Month Once'),(166,'FGH76','Ffff','Sub Agent','Main','34,krish kar street,single line,\\r\\nchennai-08','fer54@yahoo.com','2345678','9988223344','914433333333',59,'03456','Cheque',333,'Week once'),(167,'DER56','Shikar','Sub Agent','MANI5','44,manlore street,shimoga cott,chennai-7','der45@yahoo.co.in','0442234456','9876543210','91442345666',32,'2233','Account Transaction',666,'Week once'),(211,'MANI5','Baska','Sub Agent','DSDS','vb','dad@as.com','423433','333','',89,'2334','Account Transaction',123,'Days'),(218,'SRINI','Srini','Sub Agent','DSDS','chennai','srini@yaho.com','23233','9884027580','',45,'32343','Account Transaction',20,'Week once'),(224,'DSDS','SawEA.          SAV','Sub Agent','SWE45','ssss Aas','Dss@xs.co.in','3233','23234','232435',43,'32323','Account Transaction',343,'--Select--');
/*!40000 ALTER TABLE `agentmaster` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `applicantdetails`
--

DROP TABLE IF EXISTS `applicantdetails`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `applicantdetails` (
  `recordid` bigint NOT NULL AUTO_INCREMENT,
  `title` varchar(8) DEFAULT NULL,
  `firstname` varchar(30) DEFAULT NULL,
  `middlename` varchar(30) DEFAULT NULL,
  `lastname` varchar(30) DEFAULT NULL,
  `intake` varchar(15) DEFAULT NULL,
  `levelofeducation` varchar(10) DEFAULT NULL,
  `experience` tinyint NOT NULL DEFAULT '0',
  `course` varchar(50) NOT NULL DEFAULT '',
  `mailid` varchar(80) NOT NULL DEFAULT '',
  `applicantid` varchar(25) DEFAULT NULL,
  `password` varchar(20) DEFAULT NULL,
  `countryresidence` varchar(30) DEFAULT NULL,
  `ipaddress` varchar(15) DEFAULT NULL,
  `address` varchar(225) DEFAULT NULL,
  `postcode` varchar(8) DEFAULT NULL,
  `citizenof` varchar(8) DEFAULT NULL,
  `phonenumber` varchar(30) DEFAULT NULL,
  `mobilenumber` varchar(25) DEFAULT NULL,
  `faxnumber` varchar(30) DEFAULT NULL,
  `dateofbirth` date DEFAULT NULL,
  `passportnumber` varchar(30) DEFAULT NULL,
  `passportcopy` varchar(30) DEFAULT NULL,
  `photocopy` varchar(30) DEFAULT NULL,
  `course1` varchar(50) DEFAULT NULL,
  `institute1` varchar(50) DEFAULT NULL,
  `duration1` int DEFAULT NULL,
  `grade1` char(2) DEFAULT NULL,
  `course2` varchar(50) DEFAULT NULL,
  `institute2` varchar(50) DEFAULT NULL,
  `duration2` int DEFAULT NULL,
  `grade2` char(2) DEFAULT NULL,
  `employer1` varchar(50) DEFAULT NULL,
  `designation1` varchar(45) DEFAULT NULL,
  `startdate1` date DEFAULT NULL,
  `enddate1` date DEFAULT NULL,
  `employer2` varchar(50) DEFAULT NULL,
  `designation2` varchar(45) DEFAULT NULL,
  `startdate2` date DEFAULT NULL,
  `enddate2` date DEFAULT NULL,
  `refname1` varchar(50) DEFAULT NULL,
  `refoccupation1` varchar(45) DEFAULT NULL,
  `refinstitution1` varchar(50) DEFAULT NULL,
  `refrelationship1` varchar(45) DEFAULT NULL,
  `refphonenumber1` varchar(30) DEFAULT NULL,
  `refemail1` varchar(80) DEFAULT NULL,
  `refname2` varchar(50) DEFAULT NULL,
  `refoccupation2` varchar(45) DEFAULT NULL,
  `refinstitution2` varchar(50) DEFAULT NULL,
  `refrelationship2` varchar(45) DEFAULT NULL,
  `refphonenumber2` varchar(30) DEFAULT NULL,
  `refemail2` varchar(80) DEFAULT NULL,
  `STATUS` tinyint DEFAULT NULL,
  `visa` tinyint DEFAULT NULL,
  `appfill` tinyint DEFAULT '0',
  PRIMARY KEY (`recordid`,`mailid`)
) ENGINE=InnoDB AUTO_INCREMENT=64 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `applicantdetails`
--

LOCK TABLES `applicantdetails` WRITE;
/*!40000 ALTER TABLE `applicantdetails` DISABLE KEYS */;
INSERT INTO `applicantdetails` VALUES (49,'Mr','karthik','','Ramalingam','Aug2008','Level1',0,'MECH','karthikfriend@gmail.com','Aug2008MECH2','ZiKDsqk','IND','192.168.15.38','Old Mahabalipuram road,\\r\\nJeppiaar Nagr,\\r\\nChennai','600119','IND','24500640','9888844444','24500640','1982-02-08','PASS789','Sunset1.jpg','Winter.jpg','SSLC','Govt.Hr.Sec School',10,'B','+2','Govt.Hr.Sec School',10,'B','','',NULL,NULL,'','',NULL,NULL,'Paul Edward','Employee','Jeppiaar Technologies','Friends','9888855555','paul@gmail.com','','','','','','',0,0,1),(50,'Mr','Karthik','','Vimalraj','Aug2008','Level1',1,'EEE','karthi@gmail.com','Aug2008EEE3','nMj0HPVR','IND','192.168.15.38','Old Mahabalipuram road, Jeppiaar Nagr, Chennai','600119','IND','24500640','9888844444','24500640','1982-02-08','PASS789','Sunset1.jpg','Winter.jpg','SSLC','Govt.Hr.Sec School',10,'B','+2','Govt.Hr.Sec School',10,'B','','',NULL,NULL,'','',NULL,NULL,'Paul Edward','Employee','Jeppiaar Technologies','Friends','9888855555','paul@gmail.com','','','','','','',0,0,1),(51,'Mr','Daniel','','Samraj','Aug2008','Level1',1,'ECE','danie@gmail.com','Aug2008ECE4','ZcL8QKw','IND','192.168.15.38','Old Mahabalipuram road, Jeppiaar Nagr, Chennai','600119','IND','24500640','9888844444','24500640','1982-02-08','PASS789','Sunset1.jpg','Winter.jpg','SSLC','Govt.Hr.Sec School',10,'B','+2','Govt.Hr.Sec School',10,'B','','',NULL,NULL,'','',NULL,NULL,'Paul Edward','Employee','Jeppiaar Technologies','Friends','9888855555','paul@gmail.com','','','','','','',0,0,1),(52,'Mr','Omkarnath','','Tiwary','Aug2008','Level2',0,'IT','omkarnat@gmail.com','Aug2008IT5','8bC3h6U','IND','192.168.15.38','Old Mahabalipuram road, Jeppiaar Nagr, Chennai','600119','IND','24500640','9888844444','24500640','1982-02-08','PASS789','Sunset1.jpg','Winter.jpg','SSLC','Govt.Hr.Sec School',10,'B','+2','Govt.Hr.Sec School',10,'B','','',NULL,NULL,'','',NULL,NULL,'Paul Edward','Employee','Jeppiaar Technologies','Friends','9888855555','paul@gmail.com','','','','','','',0,0,1),(53,'Mr','Tarun','','Kumar','Aug2008','Level2',1,'MCA','taru@gmail.com','Aug2008MCA6','gueBORsy','IND','192.168.15.38','Old Mahabalipuram road, Jeppiaar Nagr, Chennai','600119','IND','24500640','9888844444','24500640','1982-02-08','PASS789','Sunset1.jpg','Winter.jpg','SSLC','Govt.Hr.Sec School',10,'B','+2','Govt.Hr.Sec School',10,'B','','',NULL,NULL,'','',NULL,NULL,'Paul Edward','Employee','Jeppiaar Technologies','Friends','9888855555','paul@gmail.com','','','','','','',0,0,1),(54,'Mr','Mahesh','','','Aug2008','Level1',0,'MECH','karthikfrien@gmail.com','Aug2008MECH7','ZiKDsqk','IND','192.168.15.38','Old Mahabalipuram road, Jeppiaar Nagr, Chennai','600119','IND','24500640','9888844444','24500640','1982-02-08','PASS789','Sunset1.jpg','Winter.jpg','SSLC','Govt.Hr.Sec School',10,'B','+2','Govt.Hr.Sec School',10,'B','','',NULL,NULL,'','',NULL,NULL,'Paul Edward','Employee','Jeppiaar Technologies','Friends','9888855555','paul@gmail.com','','','','','','',0,0,1),(55,'Mr','Alex','','Pandien','Aug2008','Level1',1,'EEE','karth@gmail.com','Aug2008EEE8','nMj0HPVR','IND','192.168.15.38','Old Mahabalipuram road, Jeppiaar Nagr, Chennai','600119','IND','24500640','9888844444','24500640','1982-02-08','PASS789','Sunset1.jpg','Winter.jpg','SSLC','Govt.Hr.Sec School',10,'B','+2','Govt.Hr.Sec School',10,'B','','',NULL,NULL,'','',NULL,NULL,'Paul Edward','Employee','Jeppiaar Technologies','Friends','9888855555','paul@gmail.com','','','','','','',0,0,1),(56,'Mr','Srijith','','','Aug2008','Level1',1,'ECE','dani@gmail.com','Aug2008ECE9','ZcL8QKw','IND','192.168.15.38','Old Mahabalipuram road, Jeppiaar Nagr, Chennai','600119','IND','24500640','9888844444','24500640','1982-02-08','PASS789','Sunset1.jpg','Winter.jpg','SSLC','Govt.Hr.Sec School',10,'B','+2','Govt.Hr.Sec School',10,'B','','',NULL,NULL,'','',NULL,NULL,'Paul Edward','Employee','Jeppiaar Technologies','Friends','9888855555','paul@gmail.com','','','','','','',0,0,1),(57,'Mr','Senthil','','Kumar','Aug2008','Level2',0,'IT','omkarna@gmail.com','Aug2008IT10','8bC3h6U','IND','192.168.15.38','Old Mahabalipuram road, Jeppiaar Nagr, Chennai','600119','IND','24500640','9888844444','24500640','1982-02-08','PASS789','Sunset1.jpg','Winter.jpg','SSLC','Govt.Hr.Sec School',10,'B','+2','Govt.Hr.Sec School',10,'B','','',NULL,NULL,'','',NULL,NULL,'Paul Edward','Employee','Jeppiaar Technologies','Friends','9888855555','paul@gmail.com','','','','','','',0,0,1),(58,'Mr','Sahji','','','Aug2008','Level2',1,'MCA','tar@gmail.com','Aug2008MCA11','gueBORsy','IND','192.168.15.38','Old Mahabalipuram road, Jeppiaar Nagr, Chennai','600119','IND','24500640','9888844444','24500640','1982-02-08','PASS789','Sunset1.jpg','Winter.jpg','SSLC','Govt.Hr.Sec School',10,'B','+2','Govt.Hr.Sec School',10,'B','','',NULL,NULL,'','',NULL,NULL,'Paul Edward','Employee','Jeppiaar Technologies','Friends','9888855555','paul@gmail.com','','','','','','',0,0,1),(59,'Mr','Manika','','Sudar','Aug2008','Level1',0,'MECH','karthikfrie@gmail.com','Aug2008MECH12','ZiKDsqk','IND','192.168.15.38','Old Mahabalipuram road, Jeppiaar Nagr, Chennai','600119','IND','24500640','9888844444','24500640','1982-02-08','PASS789','Sunset1.jpg','Winter.jpg','SSLC','Govt.Hr.Sec School',10,'B','+2','Govt.Hr.Sec School',10,'B','','',NULL,NULL,'','',NULL,NULL,'Paul Edward','Employee','Jeppiaar Technologies','Friends','9888855555','paul@gmail.com','','','','','','',0,0,1),(60,'Mr','Justin','','Doss','Aug2008','Level1',1,'EEE','kart@gmail.com','Aug2008EEE13','nMj0HPVR','IND','192.168.15.38','Old Mahabalipuram road, Jeppiaar Nagr, Chennai','600119','IND','24500640','9888844444','24500640','1982-02-08','PASS789','Sunset1.jpg','Winter.jpg','SSLC','Govt.Hr.Sec School',10,'B','+2','Govt.Hr.Sec School',10,'B','','',NULL,NULL,'','',NULL,NULL,'Paul Edward','Employee','Jeppiaar Technologies','Friends','9888855555','paul@gmail.com','','','','','','',0,0,1),(61,'Mr','Ramesh','','','Aug2008','Level1',1,'ECE','dan@gmail.com','Aug2008ECE14','ZcL8QKw','IND','192.168.15.38','Old Mahabalipuram road, Jeppiaar Nagr, Chennai','600119','IND','24500640','9888844444','24500640','1982-02-08','PASS789','Sunset1.jpg','Winter.jpg','SSLC','Govt.Hr.Sec School',10,'B','+2','Govt.Hr.Sec School',10,'B','','',NULL,NULL,'','',NULL,NULL,'Paul Edward','Employee','Jeppiaar Technologies','Friends','9888855555','paul@gmail.com','','','','','','',0,0,1),(62,'Mr','Babu','','','Aug2008','Level2',0,'IT','omkarn@gmail.com','Aug2008IT15','8bC3h6U','IND','192.168.15.38','Old Mahabalipuram road, Jeppiaar Nagr, Chennai','600119','IND','24500640','9888844444','24500640','1982-02-08','PASS789','Sunset1.jpg','Winter.jpg','SSLC','Govt.Hr.Sec School',10,'B','+2','Govt.Hr.Sec School',10,'B','','',NULL,NULL,'','',NULL,NULL,'Paul Edward','Employee','Jeppiaar Technologies','Friends','9888855555','paul@gmail.com','','','','','','',0,0,1),(63,'Mr','John','','Berkman','Aug2008','Level2',1,'MCA','ta@gmail.com','Aug2008MCA16','gueBORsy','IND','192.168.15.38','Old Mahabalipuram road, Jeppiaar Nagr, Chennai','600119','IND','24500640','9888844444','24500640','1982-02-08','PASS789','Sunset1.jpg','Winter.jpg','SSLC','Govt.Hr.Sec School',10,'B','+2','Govt.Hr.Sec School',10,'B','','',NULL,NULL,'','',NULL,NULL,'Paul Edward','Employee','Jeppiaar Technologies','Friends','9888855555','paul@gmail.com','','','','','','',0,0,1);
/*!40000 ALTER TABLE `applicantdetails` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `arreardetails`
--

DROP TABLE IF EXISTS `arreardetails`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `arreardetails` (
  `RecordId` int NOT NULL AUTO_INCREMENT,
  `Intake` varchar(50) DEFAULT NULL,
  `CourseCode` varchar(50) DEFAULT NULL,
  `Term` int DEFAULT NULL,
  `SubjectCode` varchar(50) DEFAULT NULL,
  `NoOfStudents` int DEFAULT NULL,
  `Criteria` varchar(50) DEFAULT NULL,
  `ExamNameId` int DEFAULT NULL,
  `SectionId` int DEFAULT NULL,
  PRIMARY KEY (`RecordId`)
) ENGINE=MyISAM AUTO_INCREMENT=82 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `arreardetails`
--

LOCK TABLES `arreardetails` WRITE;
/*!40000 ALTER TABLE `arreardetails` DISABLE KEYS */;
INSERT INTO `arreardetails` VALUES (78,'Aug2008','NAT',3,'MAT03',1,'Assestment1',1,42),(77,'Aug2008','sci14',1,'C',1,'Assestment1',4,43),(2,'Aug2008','sci14',1,'C',3,'Assestment1',32,50),(65,'Aug2008','MCA02',2,'Java',1,'Sam',32,51),(69,'Aug2008','sci14',1,'C',3,'Sam',33,52),(81,'Aug2008','IT',1,'ENG104',3,'Sam',34,44),(74,'Aug2008','sci14',1,'C',1,'Sam',32,71),(79,'Aug2008','sci14',1,'OOPS',1,'Sam',4,46);
/*!40000 ALTER TABLE `arreardetails` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `assestmentdetails`
--

DROP TABLE IF EXISTS `assestmentdetails`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `assestmentdetails` (
  `AssestmenId` int NOT NULL AUTO_INCREMENT,
  `Criteria` varchar(50) DEFAULT NULL,
  `AssestmentType` varchar(50) DEFAULT NULL,
  `Marks` int NOT NULL DEFAULT '0',
  `DefaultMark` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`AssestmenId`)
) ENGINE=MyISAM AUTO_INCREMENT=66 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `assestmentdetails`
--

LOCK TABLES `assestmentdetails` WRITE;
/*!40000 ALTER TABLE `assestmentdetails` DISABLE KEYS */;
INSERT INTO `assestmentdetails` VALUES (64,'Vimal','Test',45,0),(61,'Sam','Assignment',5,0),(57,'Sam','Theory',75,0),(59,'Sam','Practical',20,0),(12,'Assestment1','Presentation',35,25),(56,'Saas','Qw3',43,0),(15,'Sam','Performance',25,0),(16,'karthik','Assignment',20,0),(17,'karthik','Theory',60,0),(55,'karthik','Practical',20,0),(65,'Assestment1','Practical',40,30);
/*!40000 ALTER TABLE `assestmentdetails` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `aug2008_level1_eee_1_eee601_sam`
--

DROP TABLE IF EXISTS `aug2008_level1_eee_1_eee601_sam`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `aug2008_level1_eee_1_eee601_sam` (
  `RecordId` bigint NOT NULL AUTO_INCREMENT,
  `UniversityName` varchar(50) DEFAULT NULL,
  `studentid` varchar(50) DEFAULT NULL,
  `studentname` varchar(50) DEFAULT NULL,
  `Theory` bigint DEFAULT NULL,
  `Practical` bigint DEFAULT NULL,
  `Assignment` bigint DEFAULT NULL,
  `Total` bigint DEFAULT NULL,
  `Pass` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`RecordId`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `aug2008_level1_eee_1_eee601_sam`
--

LOCK TABLES `aug2008_level1_eee_1_eee601_sam` WRITE;
/*!40000 ALTER TABLE `aug2008_level1_eee_1_eee601_sam` DISABLE KEYS */;
INSERT INTO `aug2008_level1_eee_1_eee601_sam` VALUES (1,'Anna university','Aug2008EEE57','Mr.Karthik Vimalraj',25,15,11,51,'pass'),(2,'Anna university','Aug2008EEE62','Mr.Alex Pandien',25,15,13,53,'pass'),(3,'Anna university','Aug2008EEE67','Mr.Justin Doss',25,15,14,54,'pass');
/*!40000 ALTER TABLE `aug2008_level1_eee_1_eee601_sam` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `aug2008_level1_eee_a_1_midterm`
--

DROP TABLE IF EXISTS `aug2008_level1_eee_a_1_midterm`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `aug2008_level1_eee_a_1_midterm` (
  `ExamId` bigint NOT NULL AUTO_INCREMENT,
  `Section` varchar(5) DEFAULT NULL,
  `TermNo` varchar(50) DEFAULT NULL,
  `NameOfTheExam` varchar(50) DEFAULT NULL,
  `SubjectCode` varchar(50) DEFAULT NULL,
  `Day` varchar(50) DEFAULT NULL,
  `SlotName` varchar(50) DEFAULT NULL,
  `Arrear` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`ExamId`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `aug2008_level1_eee_a_1_midterm`
--

LOCK TABLES `aug2008_level1_eee_a_1_midterm` WRITE;
/*!40000 ALTER TABLE `aug2008_level1_eee_a_1_midterm` DISABLE KEYS */;
INSERT INTO `aug2008_level1_eee_a_1_midterm` VALUES (1,'A','1','MidTerm','EEE03','2008-08-13','Morning','1'),(2,'A','1','MidTerm','EEE02','2008-08-13','Evening','1'),(3,'A','1','MidTerm','EEE601','2008/08/13','Morning','1');
/*!40000 ALTER TABLE `aug2008_level1_eee_a_1_midterm` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `aug2008_level1_mech_2_eee503_assestment1`
--

DROP TABLE IF EXISTS `aug2008_level1_mech_2_eee503_assestment1`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `aug2008_level1_mech_2_eee503_assestment1` (
  `RecordId` bigint NOT NULL AUTO_INCREMENT,
  `UniversityName` varchar(50) DEFAULT NULL,
  `studentid` varchar(50) DEFAULT NULL,
  `studentname` varchar(50) DEFAULT NULL,
  `Theory` bigint DEFAULT NULL,
  `Practical` bigint DEFAULT NULL,
  `Assignment` bigint DEFAULT NULL,
  `Total` bigint DEFAULT NULL,
  `Pass` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`RecordId`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `aug2008_level1_mech_2_eee503_assestment1`
--

LOCK TABLES `aug2008_level1_mech_2_eee503_assestment1` WRITE;
/*!40000 ALTER TABLE `aug2008_level1_mech_2_eee503_assestment1` DISABLE KEYS */;
INSERT INTO `aug2008_level1_mech_2_eee503_assestment1` VALUES (1,'Hghh','Aug2008MECH56','Mr.karthik Ramalingam',35,35,3,73,'pass'),(2,'Hghh','Aug2008MECH61','Mr.Mahesh',35,35,35,105,'pass'),(3,'Hghh','Aug2008MECH66','Mr.Manika Sudar',35,3,38,76,'pass');
/*!40000 ALTER TABLE `aug2008_level1_mech_2_eee503_assestment1` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `aug2008_level2_it_1_eee601_saas`
--

DROP TABLE IF EXISTS `aug2008_level2_it_1_eee601_saas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `aug2008_level2_it_1_eee601_saas` (
  `RecordId` bigint NOT NULL AUTO_INCREMENT,
  `UniversityName` varchar(50) DEFAULT NULL,
  `studentid` varchar(50) DEFAULT NULL,
  `studentname` varchar(50) DEFAULT NULL,
  `Theory` bigint DEFAULT NULL,
  `Practical` bigint DEFAULT NULL,
  `Assignment` bigint DEFAULT NULL,
  `Total` bigint DEFAULT NULL,
  `Pass` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`RecordId`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `aug2008_level2_it_1_eee601_saas`
--

LOCK TABLES `aug2008_level2_it_1_eee601_saas` WRITE;
/*!40000 ALTER TABLE `aug2008_level2_it_1_eee601_saas` DISABLE KEYS */;
INSERT INTO `aug2008_level2_it_1_eee601_saas` VALUES (1,'Birla university','Aug2008IT59','Mr.Omkarnath Tiwary',43,43,43,129,'pass'),(2,'Birla university','Aug2008IT64','Mr.Senthil Kumar',43,43,43,129,'pass'),(3,'Birla university','Aug2008IT69','Mr.Babu',43,43,43,129,'pass'),(4,'Birla university','Aug2008IT59','Mr.Omkarnath Tiwary',43,43,43,129,'pass'),(5,'Birla university','Aug2008IT64','Mr.Senthil Kumar',43,43,43,129,'pass'),(6,'Birla university','Aug2008IT69','Mr.Babu',43,43,43,129,'pass');
/*!40000 ALTER TABLE `aug2008_level2_it_1_eee601_saas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `aug2008_level2_it_2_mf331_sam`
--

DROP TABLE IF EXISTS `aug2008_level2_it_2_mf331_sam`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `aug2008_level2_it_2_mf331_sam` (
  `RecordId` bigint NOT NULL AUTO_INCREMENT,
  `UniversityName` varchar(50) DEFAULT NULL,
  `studentid` varchar(50) DEFAULT NULL,
  `studentname` varchar(50) DEFAULT NULL,
  `Theory` bigint DEFAULT NULL,
  `Practical` bigint DEFAULT NULL,
  `Assignment` bigint DEFAULT NULL,
  `Total` bigint DEFAULT NULL,
  `Pass` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`RecordId`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `aug2008_level2_it_2_mf331_sam`
--

LOCK TABLES `aug2008_level2_it_2_mf331_sam` WRITE;
/*!40000 ALTER TABLE `aug2008_level2_it_2_mf331_sam` DISABLE KEYS */;
INSERT INTO `aug2008_level2_it_2_mf331_sam` VALUES (1,'Annamalai University','Aug2008IT59','Mr.Omkarnath Tiwary',25,25,5,55,'pass'),(2,'Annamalai University','Aug2008IT64','Mr.Senthil Kumar',25,25,5,55,'pass'),(3,'Annamalai University','Aug2008IT69','Mr.Babu',25,25,5,55,'pass');
/*!40000 ALTER TABLE `aug2008_level2_it_2_mf331_sam` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `aug2008_level2_it_a_2_midterm`
--

DROP TABLE IF EXISTS `aug2008_level2_it_a_2_midterm`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `aug2008_level2_it_a_2_midterm` (
  `ExamId` bigint NOT NULL AUTO_INCREMENT,
  `Section` varchar(5) DEFAULT NULL,
  `TermNo` varchar(50) DEFAULT NULL,
  `NameOfTheExam` varchar(50) DEFAULT NULL,
  `SubjectCode` varchar(50) DEFAULT NULL,
  `Day` varchar(50) DEFAULT NULL,
  `SlotName` varchar(50) DEFAULT NULL,
  `Arrear` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`ExamId`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `aug2008_level2_it_a_2_midterm`
--

LOCK TABLES `aug2008_level2_it_a_2_midterm` WRITE;
/*!40000 ALTER TABLE `aug2008_level2_it_a_2_midterm` DISABLE KEYS */;
INSERT INTO `aug2008_level2_it_a_2_midterm` VALUES (3,'A','2','MidTerm','C206','2008-09-10','Morning','2'),(2,'A','2','MidTerm','ENG104','2008-08-13','Morning','1');
/*!40000 ALTER TABLE `aug2008_level2_it_a_2_midterm` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `aug2008_level2_it_b_2_midterm`
--

DROP TABLE IF EXISTS `aug2008_level2_it_b_2_midterm`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `aug2008_level2_it_b_2_midterm` (
  `ExamId` bigint NOT NULL AUTO_INCREMENT,
  `Section` varchar(5) DEFAULT NULL,
  `TermNo` varchar(50) DEFAULT NULL,
  `NameOfTheExam` varchar(50) DEFAULT NULL,
  `SubjectCode` varchar(50) DEFAULT NULL,
  `Day` varchar(50) DEFAULT NULL,
  `SlotName` varchar(50) DEFAULT NULL,
  `Arrear` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`ExamId`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `aug2008_level2_it_b_2_midterm`
--

LOCK TABLES `aug2008_level2_it_b_2_midterm` WRITE;
/*!40000 ALTER TABLE `aug2008_level2_it_b_2_midterm` DISABLE KEYS */;
INSERT INTO `aug2008_level2_it_b_2_midterm` VALUES (1,'B','2','MidTerm','C206','2008-08-13','Morning','2');
/*!40000 ALTER TABLE `aug2008_level2_it_b_2_midterm` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `balance`
--

DROP TABLE IF EXISTS `balance`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `balance` (
  `recordid` bigint NOT NULL AUTO_INCREMENT,
  `accountnumber` bigint NOT NULL DEFAULT '0',
  `accountname` varchar(80) DEFAULT NULL,
  `bankname` varchar(100) DEFAULT NULL,
  `branchname` varchar(50) DEFAULT NULL,
  `total` double DEFAULT NULL,
  `balance` double NOT NULL DEFAULT '0',
  `curdate` date DEFAULT NULL,
  `lastbalance` double NOT NULL DEFAULT '0',
  `lastdate` date DEFAULT NULL,
  `tablename` varchar(80) DEFAULT NULL,
  PRIMARY KEY (`recordid`)
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `balance`
--

LOCK TABLES `balance` WRITE;
/*!40000 ALTER TABLE `balance` DISABLE KEYS */;
INSERT INTO `balance` VALUES (33,101,'Srinivasan','ICICI','Adyar',-188,20000,'2006-05-11',20000,'2006-05-11','ICICI101'),(46,110,'ramalingam','SBI','Chennai',6000,6000,'2008-09-10',6000,'2008-09-10','SBI110'),(48,1000,'sundar','Stand','Cee',1000,1000,'2008-09-12',1000,'2008-09-12','Stand1000');
/*!40000 ALTER TABLE `balance` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bankdetails`
--

DROP TABLE IF EXISTS `bankdetails`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `bankdetails` (
  `recordid` bigint(100) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `accountnumber` bigint DEFAULT NULL,
  `accountname` varchar(75) DEFAULT NULL,
  `balance` double DEFAULT NULL,
  `bankname` varchar(80) DEFAULT NULL,
  `branchname` varchar(80) DEFAULT NULL,
  `sortcode` varchar(20) DEFAULT NULL,
  `branchaddress` varchar(250) NOT NULL DEFAULT '',
  `opendate` date DEFAULT NULL,
  `contactperson` varchar(80) DEFAULT NULL,
  `phonenumber` varchar(50) DEFAULT NULL,
  `faxnumber` varchar(50) DEFAULT NULL,
  `website` varchar(80) DEFAULT NULL,
  `BalanceDate` date DEFAULT NULL,
  PRIMARY KEY (`recordid`)
) ENGINE=MyISAM AUTO_INCREMENT=139 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bankdetails`
--

LOCK TABLES `bankdetails` WRITE;
/*!40000 ALTER TABLE `bankdetails` DISABLE KEYS */;
INSERT INTO `bankdetails` VALUES (0000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000060,101,'Srinivasan',20000,'ICICI','Adyar','12-34-56','21/4 Sathyabama Univ,\\r\\nChennai 119.','2006-05-11','Sam','323','343434','www.g.com','2008-06-18'),(0000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000132,110,'ramalingam',6000,'SBI','Chennai','12-34-56','Jeppiaar tech','2008-09-10','Suresh','24500640','24500640','www.sbi.com','2008-09-10'),(0000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000138,1000,'sundar',1000,'Stand','Cee','12-12-12','bang','2008-09-12','','','','','2008-09-13');
/*!40000 ALTER TABLE `bankdetails` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `billdetails`
--

DROP TABLE IF EXISTS `billdetails`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `billdetails` (
  `recordid` bigint NOT NULL AUTO_INCREMENT,
  `invoicenumber` varchar(50) DEFAULT NULL,
  `quantity1` int DEFAULT NULL,
  `particular1` varchar(150) DEFAULT NULL,
  `price1` double DEFAULT NULL,
  `amount1` double DEFAULT NULL,
  `quantity2` int DEFAULT NULL,
  `particular2` varchar(150) DEFAULT NULL,
  `price2` double DEFAULT NULL,
  `amount2` double DEFAULT NULL,
  `quantity3` int DEFAULT NULL,
  `particular3` varchar(150) DEFAULT NULL,
  `price3` double DEFAULT NULL,
  `amount3` double DEFAULT NULL,
  `quantity4` int DEFAULT NULL,
  `particular4` varchar(150) DEFAULT NULL,
  `price4` double DEFAULT NULL,
  `amount4` double DEFAULT NULL,
  `quantity5` int DEFAULT NULL,
  `particular5` varchar(150) DEFAULT NULL,
  `price5` double DEFAULT NULL,
  `amount5` double DEFAULT NULL,
  `quantity6` int DEFAULT NULL,
  `particular6` varchar(150) DEFAULT NULL,
  `price6` double DEFAULT NULL,
  `amount6` double DEFAULT NULL,
  `quantity7` int DEFAULT NULL,
  `particular7` varchar(150) DEFAULT NULL,
  `price7` double DEFAULT NULL,
  `amount7` double DEFAULT NULL,
  `quantity8` int DEFAULT NULL,
  `particular8` varchar(150) DEFAULT NULL,
  `price8` double DEFAULT NULL,
  `amount8` double DEFAULT NULL,
  `quantity9` int DEFAULT NULL,
  `particular9` varchar(150) DEFAULT NULL,
  `price9` double DEFAULT NULL,
  `amount9` double DEFAULT NULL,
  `quantity10` int DEFAULT NULL,
  `particular10` varchar(150) DEFAULT NULL,
  `price10` double DEFAULT NULL,
  `amount10` double DEFAULT NULL,
  `quantity11` int DEFAULT NULL,
  `particular11` varchar(150) DEFAULT NULL,
  `price11` double DEFAULT NULL,
  `amount11` double DEFAULT NULL,
  `quantity12` int DEFAULT NULL,
  `particular12` varchar(150) DEFAULT NULL,
  `price12` double DEFAULT NULL,
  `amount12` double DEFAULT NULL,
  `quantity13` int DEFAULT NULL,
  `particular13` varchar(150) DEFAULT NULL,
  `price13` double DEFAULT NULL,
  `amount13` double DEFAULT NULL,
  `quantity14` int DEFAULT NULL,
  `particular14` varchar(150) DEFAULT NULL,
  `price14` double DEFAULT NULL,
  `amount14` double DEFAULT NULL,
  `quantity15` int DEFAULT NULL,
  `particular15` varchar(150) DEFAULT NULL,
  `price15` double DEFAULT NULL,
  `amount15` double DEFAULT NULL,
  `quantity16` int DEFAULT NULL,
  `particular16` varchar(150) DEFAULT NULL,
  `price16` double DEFAULT NULL,
  `amount16` double DEFAULT NULL,
  `quantity17` int DEFAULT NULL,
  `particular17` varchar(150) DEFAULT NULL,
  `price17` double DEFAULT NULL,
  `amount17` double DEFAULT NULL,
  `quantity18` int DEFAULT NULL,
  `particular18` varchar(150) DEFAULT NULL,
  `price18` double DEFAULT NULL,
  `amount18` double DEFAULT NULL,
  `quantity19` int DEFAULT NULL,
  `particular19` varchar(150) DEFAULT NULL,
  `price19` double DEFAULT NULL,
  `amount19` double DEFAULT NULL,
  `quantity20` int DEFAULT NULL,
  `particular20` varchar(150) DEFAULT NULL,
  `price20` double DEFAULT NULL,
  `amount20` double DEFAULT NULL,
  `others` double DEFAULT NULL,
  `taxamount` double DEFAULT NULL,
  `total` double DEFAULT NULL,
  PRIMARY KEY (`recordid`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `billdetails`
--

LOCK TABLES `billdetails` WRITE;
/*!40000 ALTER TABLE `billdetails` DISABLE KEYS */;
INSERT INTO `billdetails` VALUES (1,'201',1,'Laptop',100,100,0,'',0,0,0,'',0,0,0,'',0,0,0,'',0,0,0,'',0,0,0,'',0,0,0,'',0,0,0,'',0,0,0,'',0,0,0,'',0,0,0,'',0,0,0,'',0,0,0,'',0,0,0,'',0,0,0,'',0,0,0,'',0,0,0,'',0,0,0,'',0,0,0,'',0,0,0,0,100),(2,'2544',1,'Periparals',1500,1500,0,'',0,0,0,'',0,0,0,'',0,0,0,'',0,0,0,'',0,0,0,'',0,0,0,'',0,0,0,'',0,0,0,'',0,0,0,'',0,0,0,'',0,0,0,'',0,0,0,'',0,0,0,'',0,0,0,'',0,0,0,'',0,0,0,'',0,0,0,'',0,0,0,'',0,0,0,0,1500),(3,'8987897978',1,'',4545,4545,2,'',433,866,0,'',0,0,0,'',0,0,0,'',0,0,0,'',0,0,0,'',0,0,0,'',0,0,0,'',0,0,0,'',0,0,0,'',0,0,0,'',0,0,0,'',0,0,0,'',0,0,0,'',0,0,0,'',0,0,0,'',0,0,0,'',0,0,0,'',0,0,0,'',0,0,12.5,45.12,5468.62);
/*!40000 ALTER TABLE `billdetails` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bookissue`
--

DROP TABLE IF EXISTS `bookissue`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `bookissue` (
  `IssueId` bigint NOT NULL AUTO_INCREMENT,
  `UserId` varchar(50) DEFAULT NULL,
  `BookCode` varchar(50) DEFAULT NULL,
  `dateofissue` date DEFAULT NULL,
  `dateofexpiry` date DEFAULT NULL,
  PRIMARY KEY (`IssueId`)
) ENGINE=MyISAM AUTO_INCREMENT=150 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bookissue`
--

LOCK TABLES `bookissue` WRITE;
/*!40000 ALTER TABLE `bookissue` DISABLE KEYS */;
INSERT INTO `bookissue` VALUES (149,'Aug2008ECE68','SAM02','2008-10-04','2008-10-18'),(148,'Aug2008IT59','mat05','2008-10-04','2008-10-18'),(147,'Aug2008MECH56','oops','2008-10-03','2008-10-17');
/*!40000 ALTER TABLE `bookissue` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bookmaster`
--

DROP TABLE IF EXISTS `bookmaster`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `bookmaster` (
  `BookNo` bigint NOT NULL AUTO_INCREMENT,
  `BookCode` varchar(50) DEFAULT NULL,
  `Title` varchar(100) NOT NULL DEFAULT '',
  `Author` varchar(150) NOT NULL DEFAULT '',
  `PublicationId` int NOT NULL DEFAULT '0',
  `IsbnNo` bigint DEFAULT NULL,
  `NoofCopy` bigint DEFAULT NULL,
  `Price` double DEFAULT NULL,
  `RackNoId` int NOT NULL DEFAULT '0',
  `CheckCD` int NOT NULL DEFAULT '0',
  `ReferenceBook` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`BookNo`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bookmaster`
--

LOCK TABLES `bookmaster` WRITE;
/*!40000 ALTER TABLE `bookmaster` DISABLE KEYS */;
INSERT INTO `bookmaster` VALUES (1,'OOPS','Object oriented','Balaguru swamy',2,90897969,35,200,5,1,0),(2,'MAT05','Mathematics 5th Sem','John Joseph',4,7695585,50,500,2,0,1),(3,'SAM02','Solid Mechanics','Bohre',5,4564478,65,566,4,1,0),(4,'JAV01','Complete Reference Java','Daniel Samraj',2,7869756565,600,600,2,1,1);
/*!40000 ALTER TABLE `bookmaster` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cohortdetails`
--

DROP TABLE IF EXISTS `cohortdetails`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cohortdetails` (
  `CohortID` bigint NOT NULL AUTO_INCREMENT,
  `Intake` varchar(100) NOT NULL DEFAULT '0',
  `StartDate` date DEFAULT NULL,
  `ExtensionDate1` date DEFAULT NULL,
  `ExtensionDate2` date DEFAULT NULL,
  PRIMARY KEY (`CohortID`,`Intake`)
) ENGINE=MyISAM AUTO_INCREMENT=47 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cohortdetails`
--

LOCK TABLES `cohortdetails` WRITE;
/*!40000 ALTER TABLE `cohortdetails` DISABLE KEYS */;
INSERT INTO `cohortdetails` VALUES (46,'Aug2008','2008-08-03','2008-08-05','2008-08-23'),(29,'Feb2009','2008-05-22','2008-05-30','2008-05-31'),(30,'May2009','2008-02-13','2008-05-23','2008-05-24');
/*!40000 ALTER TABLE `cohortdetails` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `collegedetails`
--

DROP TABLE IF EXISTS `collegedetails`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `collegedetails` (
  `Collegeid` bigint NOT NULL AUTO_INCREMENT,
  `Collegename` varchar(100) NOT NULL DEFAULT '',
  `Collegelogo` text,
  `Templatedesign` text,
  `Letterheaddimensions` text NOT NULL,
  `Location` varchar(200) DEFAULT NULL,
  `Address` varchar(200) DEFAULT NULL,
  `CountryID` int DEFAULT NULL,
  `faxno` decimal(20,0) DEFAULT NULL,
  `phoneno` varchar(20) NOT NULL DEFAULT '0',
  `email` varchar(100) NOT NULL DEFAULT '',
  `website` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`Collegeid`)
) ENGINE=MyISAM AUTO_INCREMENT=207 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `collegedetails`
--

LOCK TABLES `collegedetails` WRITE;
/*!40000 ALTER TABLE `collegedetails` DISABLE KEYS */;
INSERT INTO `collegedetails` VALUES (193,'Srr Engineering College','SRR ENGINEERING COLLEGE.JPG','Template1','A4','Chennai','Sam1+Sam2+Sam3+Sam4',23,34455,'982829','dsa@Srr.org','www.srr.in'),(173,'Panimalar Engineering College','SAMRAJ.JPG','Template1','A4','Chennai','ddd+aaa+sss+ffff',4,2323,'45454','fdf@f.com','eee@g.vcom'),(192,'SRM','SRM.JPG','Template1','A4','station','CHENNAI+++',19,434534,'87383744','ssm581@yahoo.com','www.sa.com'),(195,'Jeppiaar Engineering College','JEPPIAAR ENGINEERING COLLEGE.JPG','Template4','A4','Chennai','JprNgr1+JprNgr2+JprNgr3+JprNgr4',23,21941,'98404','dsam@g.org','www.je.org'),(197,'St Joseph','ST JOSEPH.JPG','Template2','A4','Chennai','jpr ngr1+jpr ngr2+jpr ngr3+jpr ngr4',23,323,'55555','as@g.com','www.stjoseph.com'),(198,'Hindustan Engineering College','SAM.JPG','Template2','A4','aa','aa+aa+aa+aa',4,232,'3232','web@g.com','www.sa.com'),(199,'MNM Jain College','AS.JPG','Template1','A4','as','sas+sa+as+asa',4,2323,'323','we@sd.com','www.sas.com'),(200,'Stella Marys','SAMD.JPG','Template1','A4','sa','sas+sas+sa+sa',35,132,'31232','a2@d.com','www.ss.com'),(204,'Infant Jesus','INFANT JESUS.JPG','Template1','A4','Chennai','No 1 Esplanade   police lane,\\r\\nNear Chennai House,\\r\\nChennai 600108',34,3443,'3434','jesus@god.com','www.IJesus.com'),(202,'Queen Marys','WER.JPG','Template1','A3','er','er+we+we+we',13,2354,'34534','wer','wer'),(205,'AMET','AMET.JPG','Template1','A4','Chennai','No1 East Cost Road,\\r\\nChennai 600108',8,222,'42323','dsa@gmail.com','www.Sam.com'),(206,'Sathyabama','SAA.JPG','Template2','A3','aaaaaaaaaa','aaa',1,323,'12323','zs@w.com','www.fd.com');
/*!40000 ALTER TABLE `collegedetails` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `countdetails`
--

DROP TABLE IF EXISTS `countdetails`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `countdetails` (
  `intake` varchar(40) NOT NULL DEFAULT '',
  `application` int DEFAULT '0',
  `student` int DEFAULT '0',
  `staff` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `countdetails`
--

LOCK TABLES `countdetails` WRITE;
/*!40000 ALTER TABLE `countdetails` DISABLE KEYS */;
INSERT INTO `countdetails` VALUES ('Nov2008',121,83,21),('Aug2008',16,71,15),('Feb2009',22,34,23),('staff',0,0,12);
/*!40000 ALTER TABLE `countdetails` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `countrydepositdetails`
--

DROP TABLE IF EXISTS `countrydepositdetails`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `countrydepositdetails` (
  `CountryDepositDetailsId` int NOT NULL AUTO_INCREMENT,
  `CountryId` int NOT NULL DEFAULT '0',
  `CourseId` int NOT NULL DEFAULT '0',
  `Deposit` double DEFAULT NULL,
  `Fees` double DEFAULT NULL,
  PRIMARY KEY (`CountryDepositDetailsId`)
) ENGINE=MyISAM AUTO_INCREMENT=54 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `countrydepositdetails`
--

LOCK TABLES `countrydepositdetails` WRITE;
/*!40000 ALTER TABLE `countrydepositdetails` DISABLE KEYS */;
INSERT INTO `countrydepositdetails` VALUES (37,1,71,100,100),(38,4,44,125,255),(29,19,71,60000,70000),(36,14,74,2312312,12122),(35,19,83,3232,32323),(34,23,83,1223232,323123),(32,5,52,2333,3232),(40,5,45,5000,4000),(39,10,71,23000,2350),(41,4,45,3545,345345),(42,3,71,5000,2000),(43,5,44,3333,44444),(44,11,74,454554545,454545545),(45,6,45,233232,323232),(46,2,95,3434,4343),(47,39,74,232,323),(49,0,0,0,0),(50,4,0,0,0),(51,0,44,0,0),(52,5,0,0,0),(53,11,71,564,4545);
/*!40000 ALTER TABLE `countrydepositdetails` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `countrydetails`
--

DROP TABLE IF EXISTS `countrydetails`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `countrydetails` (
  `CountryId` bigint NOT NULL AUTO_INCREMENT,
  `Countrycode` varchar(5) NOT NULL DEFAULT '',
  `CountryName` varchar(50) DEFAULT NULL,
  `Nationality` varchar(50) NOT NULL DEFAULT '',
  PRIMARY KEY (`CountryId`)
) ENGINE=MyISAM AUTO_INCREMENT=42 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `countrydetails`
--

LOCK TABLES `countrydetails` WRITE;
/*!40000 ALTER TABLE `countrydetails` DISABLE KEYS */;
INSERT INTO `countrydetails` VALUES (35,'RUS','Russia','Russian'),(4,'JA','Japan','Japaneses'),(5,'US','United States','American'),(34,'ISR','Israel','Israielians'),(32,'CH','Chinna','Chineses'),(19,'AUS','Australia','Australia'),(23,'IND','India','Indians'),(41,'JM','Jajajaja','Jajajajaians'),(36,'EUR','Europe','Europian'),(1,'AF','Afghanistan','Afghanistanis'),(2,'AL','Albania','Albanian'),(3,'AG','Algeria','Algerian'),(6,'AS','American Samoa','American Samoani'),(7,'AN','Andorra','Andorran'),(8,'AO','Angola','Angolian'),(9,'AI','Anguilla','Anguillan'),(10,'AT','Antarctica','Antarctican'),(11,'AB','Antigua and Barbuda','Barbudan'),(12,'AR','Argentina','Argentinan'),(13,'AM','Armenia','Armenian'),(14,'AU','Aruba','Aruban'),(15,'AA','Australia','Australian'),(16,'AUU','Austria','Austrian'),(17,'AZ','Azerbaijan','Azerbaijanian'),(18,'BA','Bahamas','Bahamasan'),(20,'BH','Bahrain','Bahrainian'),(21,'BG','Bangladesh','Bangladeshian'),(22,'BR','Barbados','Barbadosan'),(38,'MDR','Madagaskar','Madagaskarian');
/*!40000 ALTER TABLE `countrydetails` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `coursedetails`
--

DROP TABLE IF EXISTS `coursedetails`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `coursedetails` (
  `CourseId` bigint NOT NULL AUTO_INCREMENT,
  `CourseCode` varchar(10) NOT NULL DEFAULT '',
  `CourseName` varchar(50) DEFAULT NULL,
  `CourseDuration` varchar(10) NOT NULL DEFAULT '0',
  `ModeOfCourse` varchar(50) NOT NULL DEFAULT '0',
  `UniversityId` int NOT NULL DEFAULT '0',
  `MarkSchemeId` int NOT NULL DEFAULT '0',
  `Scholarship` varchar(50) DEFAULT NULL,
  `DefaultDeposit` double DEFAULT NULL,
  `DefaultFees` double DEFAULT NULL,
  `NoOfSubjects` int DEFAULT NULL,
  `LevelOfTheCourse` varchar(50) DEFAULT NULL,
  `MaximumInstalments` int DEFAULT NULL,
  `NoOfTerms` int NOT NULL DEFAULT '0',
  `experience` tinyint NOT NULL DEFAULT '0',
  PRIMARY KEY (`CourseId`),
  KEY `UniversityId` (`UniversityId`)
) ENGINE=MyISAM AUTO_INCREMENT=97 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `coursedetails`
--

LOCK TABLES `coursedetails` WRITE;
/*!40000 ALTER TABLE `coursedetails` DISABLE KEYS */;
INSERT INTO `coursedetails` VALUES (44,'EEE','Electricals And Electronics','35 Months','Part Time',1,69,'No',35435,67,34,'Level1',88,8,0),(45,'MECH','Mechanical Engineering','4 Years','Part Time',96,55,'Yes',100,450,4,'Level1',4,8,0),(74,'ECE','Electronics And Communication Engineering','34 Months','Full Time',96,55,'Yes',3000,4.7,2,'Level1',2,8,0),(71,'MCA','Master of Computer Applicaion','2 Years','Part Time',6,70,'Yes',450000,20000,45,'Level2',6,6,1),(52,'IT','Information Technology','36 Months','Part Time',6,68,'Yes',30000,23,2,'Level2',30000,8,0),(83,'MSESE','Software Engineering','4 Years','Full Time',96,0,'Yes',90000,9000,89,'Level3',76,5,1),(94,'BECSE','Computer Science And Engineering','4 Years','Part Time',99,69,'Yes',100000,10,50,'Level3',10,10,1),(95,'MBA','Master Of Bussiness Administration','2 Years','Full Time',1,68,'Yes',2305,5000,23,'Level4',5,4,0),(96,'NAT','Aeronautical Engineering','23 Months','Full Time',1,1,'Yes',35000,3000,35,'Level5',3,8,1);
/*!40000 ALTER TABLE `coursedetails` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `customerdetails`
--

DROP TABLE IF EXISTS `customerdetails`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `customerdetails` (
  `recordid` bigint NOT NULL AUTO_INCREMENT,
  `customerid` varchar(50) NOT NULL DEFAULT '',
  `customername` varchar(50) DEFAULT NULL,
  `customeraddress` varchar(160) DEFAULT NULL,
  `contactperson` varchar(50) DEFAULT NULL,
  `phonenumber` varchar(50) DEFAULT NULL,
  `faxnumber` varchar(50) DEFAULT NULL,
  `emailid` varchar(50) DEFAULT NULL,
  `accountnumber` varchar(50) DEFAULT NULL,
  `bankname` varchar(50) DEFAULT NULL,
  `branchname` varchar(50) DEFAULT NULL,
  `ProductDetails` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`recordid`,`customerid`)
) ENGINE=MyISAM AUTO_INCREMENT=80 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `customerdetails`
--

LOCK TABLES `customerdetails` WRITE;
/*!40000 ALTER TABLE `customerdetails` DISABLE KEYS */;
INSERT INTO `customerdetails` VALUES (71,'CH01','Chidambaram','No 21 VRD Nagar,\\r\\nNear Puthukoil, Madhavaram,\\r\\nChennai 600060','Chidambranar','743843','473749','chid@gmail.com','768283','Indian','Chid','Water Bottles'),(72,'DA05','Daniel','No 21 VRD Nagar,\\r\\nMadhavaram,\\r\\nNear Moolakadai,\\r\\nChennai 600060','DanielSamraj','938484','03445','dan@gmail.com','63383','ICICI','Parrys',''),(61,'Vel01','vel','sd1+++','sahana','22222','234234','sd2@gmail.com','234234','sdsad','seres',NULL),(73,'MA04','Mahendran','No:19,Sivan Koil Street,\\r\\nKodambakkam,\\r\\nChennai-600024','Banu','9884221384','2412','ssm581@yahoo.com','602201198626','HDFC','Chennai','Chicken Supplier'),(74,'ED05','Paul edward','sd+sd+sd+ds','Steve edward','9876','6565','asd@g.com','6565','sad','Esa','Books'),(79,'S','Yrty','cf','Tytry','5654','565','y54ytr','78678','yugtjugtjy','Ghjtgjgtj','Tytryty');
/*!40000 ALTER TABLE `customerdetails` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `deposit`
--

DROP TABLE IF EXISTS `deposit`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `deposit` (
  `recordid` bigint NOT NULL AUTO_INCREMENT,
  `depositamount` double DEFAULT NULL,
  `depositaccount` int DEFAULT NULL,
  `depositby` varchar(100) DEFAULT NULL,
  `reference` varchar(150) DEFAULT NULL,
  `mode` varchar(40) DEFAULT NULL,
  `number` int DEFAULT NULL,
  `dddate` date DEFAULT NULL,
  `bankname` varchar(50) DEFAULT NULL,
  `branch` varchar(50) DEFAULT NULL,
  `ddto` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`recordid`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `deposit`
--

LOCK TABLES `deposit` WRITE;
/*!40000 ALTER TABLE `deposit` DISABLE KEYS */;
INSERT INTO `deposit` VALUES (1,50000,2147483647,'senthil','kumar','Cash',0,'2008-05-07','','','daniel'),(2,100,9883,'Balaji','Srini','Cash',0,'2008-05-23','','','JET SOFT'),(3,15000,102,'Balaji','Srini','Cash',0,'2008-05-23','','','Jetsoft'),(4,10000,101,'Karthik','Karthik','Cheque',12577,'2008-04-26','','','Karthik'),(5,9,101,'gfhdf','564ty56','Cash',0,'2008-07-02','','','3463trt'),(6,2000,9894,'srinilinux','srinilinux','Cheque',12345,'2008-07-26','','','srinilinux'),(7,2000,9894,'srinilinux','srinilinux','Cash',0,'2008-07-22','','','srinilinux'),(8,8000,987,'Mr.X','Y to A','Cash',0,'2008-08-26','','','Sba'),(9,10000,9875,'Srini','Mahi','Cash',0,'2008-09-01','','','Chennai'),(10,10000,987,'dsa','sss','Cheque',2147483647,'2008-09-24','','','322'),(11,220,101,'srinivasan','srinivasan','Cheque',987654321,'2008-09-11','','','srinivasan');
/*!40000 ALTER TABLE `deposit` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `embassyaddress`
--

DROP TABLE IF EXISTS `embassyaddress`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `embassyaddress` (
  `EmbassyAddressId` int NOT NULL AUTO_INCREMENT,
  `CountryId` int DEFAULT NULL,
  `EmbassyCode` varchar(30) NOT NULL DEFAULT '',
  `Address` varchar(250) NOT NULL DEFAULT '',
  PRIMARY KEY (`EmbassyAddressId`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `embassyaddress`
--

LOCK TABLES `embassyaddress` WRITE;
/*!40000 ALTER TABLE `embassyaddress` DISABLE KEYS */;
INSERT INTO `embassyaddress` VALUES (2,23,'IndChennai','No 1 Esplanade Police Lane,\\r\\nNear Chennai House,\\r\\nChennai 600108'),(3,4,'JaCohima','No 21 VRD Nagar,\\r\\nMadhavaram,\\r\\nNear Puthu Koil,\\r\\nChennai 600060.'),(4,5,'ICH','No 24/7 Naramudi street,\\r\\nECR Road,\\r\\nChennai 600118'),(5,19,'ECH','No 45, Rajiv Gandhi Roan,\\r\\nSydney,\\r\\nKanchipuram dist,\\r\\nAustralia 45'),(6,8,'JES','No 235, Pondicherry road,\\r\\nVen Kustam Street,\\r\\nAngola 129'),(7,10,'PEN','245 Penguin Market,\\r\\nPenguin Street,\\r\\nAntartica 235');
/*!40000 ALTER TABLE `embassyaddress` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `examnames`
--

DROP TABLE IF EXISTS `examnames`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `examnames` (
  `ExamName` varchar(30) DEFAULT NULL,
  `ExamNameId` int NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`ExamNameId`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `examnames`
--

LOCK TABLES `examnames` WRITE;
/*!40000 ALTER TABLE `examnames` DISABLE KEYS */;
INSERT INTO `examnames` VALUES ('Midterm',1),('Public',4),('Final',3);
/*!40000 ALTER TABLE `examnames` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `examttslot`
--

DROP TABLE IF EXISTS `examttslot`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `examttslot` (
  `SlotId` int NOT NULL AUTO_INCREMENT,
  `ExamNameId` int NOT NULL DEFAULT '0',
  `SlotName` varchar(50) DEFAULT NULL,
  `FromTime` varchar(20) DEFAULT NULL,
  `ToTime` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`SlotId`)
) ENGINE=MyISAM AUTO_INCREMENT=37 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `examttslot`
--

LOCK TABLES `examttslot` WRITE;
/*!40000 ALTER TABLE `examttslot` DISABLE KEYS */;
INSERT INTO `examttslot` VALUES (1,1,'Morning','1:00','3:00'),(4,3,'Morning','0:40','1:30'),(32,3,'Afternoon','1:15','4:15'),(33,3,'Evening','10:00','1:00'),(34,4,'Afternoon','0:15','0:45'),(35,1,'Evening','0:35','0:25'),(36,4,'Morning','0:20','1:10');
/*!40000 ALTER TABLE `examttslot` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `feb2009_level1_eee_1_eee601_vimal`
--

DROP TABLE IF EXISTS `feb2009_level1_eee_1_eee601_vimal`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `feb2009_level1_eee_1_eee601_vimal` (
  `RecordId` bigint NOT NULL AUTO_INCREMENT,
  `UniversityName` varchar(50) DEFAULT NULL,
  `studentid` varchar(50) DEFAULT NULL,
  `studentname` varchar(50) DEFAULT NULL,
  `Theory` bigint DEFAULT NULL,
  `Practical` bigint DEFAULT NULL,
  `Assignment` bigint DEFAULT NULL,
  `Total` bigint DEFAULT NULL,
  `Pass` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`RecordId`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `feb2009_level1_eee_1_eee601_vimal`
--

LOCK TABLES `feb2009_level1_eee_1_eee601_vimal` WRITE;
/*!40000 ALTER TABLE `feb2009_level1_eee_1_eee601_vimal` DISABLE KEYS */;
/*!40000 ALTER TABLE `feb2009_level1_eee_1_eee601_vimal` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `feb2009_level1_eee_a_3_midterm`
--

DROP TABLE IF EXISTS `feb2009_level1_eee_a_3_midterm`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `feb2009_level1_eee_a_3_midterm` (
  `ExamId` bigint NOT NULL AUTO_INCREMENT,
  `Section` varchar(5) DEFAULT NULL,
  `TermNo` varchar(50) DEFAULT NULL,
  `NameOfTheExam` varchar(50) DEFAULT NULL,
  `SubjectCode` varchar(50) DEFAULT NULL,
  `Day` varchar(50) DEFAULT NULL,
  `SlotName` varchar(50) DEFAULT NULL,
  `Arrear` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`ExamId`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `feb2009_level1_eee_a_3_midterm`
--

LOCK TABLES `feb2009_level1_eee_a_3_midterm` WRITE;
/*!40000 ALTER TABLE `feb2009_level1_eee_a_3_midterm` DISABLE KEYS */;
/*!40000 ALTER TABLE `feb2009_level1_eee_a_3_midterm` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `firstyear_be_aug2008_a`
--

DROP TABLE IF EXISTS `firstyear_be_aug2008_a`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `firstyear_be_aug2008_a` (
  `timetableid` bigint NOT NULL AUTO_INCREMENT,
  `timetablename` varchar(50) DEFAULT NULL,
  `coursecode` varchar(50) DEFAULT NULL,
  `term` varchar(50) DEFAULT NULL,
  `todaydate` date DEFAULT NULL,
  `day` varchar(50) DEFAULT NULL,
  `week` varchar(50) DEFAULT NULL,
  `slot` varchar(50) DEFAULT NULL,
  `subject` varchar(50) DEFAULT NULL,
  `staff` varchar(50) DEFAULT NULL,
  `roomno` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`timetableid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `firstyear_be_aug2008_a`
--

LOCK TABLES `firstyear_be_aug2008_a` WRITE;
/*!40000 ALTER TABLE `firstyear_be_aug2008_a` DISABLE KEYS */;
/*!40000 ALTER TABLE `firstyear_be_aug2008_a` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `firstyear_sci14_aug2008_b`
--

DROP TABLE IF EXISTS `firstyear_sci14_aug2008_b`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `firstyear_sci14_aug2008_b` (
  `timetableid` bigint NOT NULL AUTO_INCREMENT,
  `timetablename` varchar(50) DEFAULT NULL,
  `coursecode` varchar(50) DEFAULT NULL,
  `term` varchar(50) DEFAULT NULL,
  `day` varchar(50) DEFAULT NULL,
  `week` varchar(50) DEFAULT NULL,
  `slot` varchar(50) DEFAULT NULL,
  `subject` varchar(50) DEFAULT NULL,
  `staff` varchar(50) DEFAULT NULL,
  `roomno` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`timetableid`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `firstyear_sci14_aug2008_b`
--

LOCK TABLES `firstyear_sci14_aug2008_b` WRITE;
/*!40000 ALTER TABLE `firstyear_sci14_aug2008_b` DISABLE KEYS */;
INSERT INTO `firstyear_sci14_aug2008_b` VALUES (1,'FIRSTYEAR','Sci14','Aug2008','1','1','1','NA','NA','NA'),(2,'FIRSTYEAR','Sci14','Aug2008','1','1','2','NA','NA','NA'),(3,'FIRSTYEAR','Sci14','Aug2008','1','1','3','NA','NA','NA'),(4,'FIRSTYEAR','Sci14','Aug2008','2','1','1','NA','NA','NA'),(5,'FIRSTYEAR','Sci14','Aug2008','2','1','2','NA','NA','NA'),(6,'FIRSTYEAR','Sci14','Aug2008','2','1','3','NA','NA','NA'),(7,'FIRSTYEAR','Sci14','Aug2008','3','1','1','NA','NA','NA'),(8,'FIRSTYEAR','Sci14','Aug2008','3','1','2','NA','NA','NA'),(9,'FIRSTYEAR','Sci14','Aug2008','3','1','3','NA','NA','NA'),(10,'FIRSTYEAR','Sci14','Aug2008','4','1','1','','',''),(11,'FIRSTYEAR','Sci14','Aug2008','4','1','1','','',''),(12,'FIRSTYEAR','Sci14','Aug2008','4','1','1','','',''),(13,'firstyear','Sci14','Aug2008','4','1','1','ObjectOrientedprg','eree','studio');
/*!40000 ALTER TABLE `firstyear_sci14_aug2008_b` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `firstyearsci14aug2008b`
--

DROP TABLE IF EXISTS `firstyearsci14aug2008b`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `firstyearsci14aug2008b` (
  `timetableid` bigint NOT NULL AUTO_INCREMENT,
  `timetablename` varchar(50) DEFAULT NULL,
  `coursecode` varchar(50) DEFAULT NULL,
  `term` varchar(50) DEFAULT NULL,
  `day` varchar(50) DEFAULT NULL,
  `week` varchar(50) DEFAULT NULL,
  `slot` varchar(50) DEFAULT NULL,
  `subject` varchar(50) DEFAULT NULL,
  `staff` varchar(50) DEFAULT NULL,
  `roomno` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`timetableid`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `firstyearsci14aug2008b`
--

LOCK TABLES `firstyearsci14aug2008b` WRITE;
/*!40000 ALTER TABLE `firstyearsci14aug2008b` DISABLE KEYS */;
INSERT INTO `firstyearsci14aug2008b` VALUES (1,'firstyear','sci14','Aug2008','1','1','1','NA','NA','NA'),(2,'firstyear','sci14','Aug2008','1','1','2','NA','NA','NA'),(3,'firstyear','sci14','Aug2008','1','1','3','NA','NA','NA'),(4,'firstyear','sci14','Aug2008','2','1','1','NA','NA','NA'),(5,'firstyear','sci14','Aug2008','2','1','2','NA','NA','NA'),(6,'firstyear','sci14','Aug2008','2','1','3','NA','NA','NA'),(7,'firstyear','sci14','Aug2008','3','1','1','NA','NA','NA'),(8,'firstyear','sci14','Aug2008','3','1','2','NA','NA','NA'),(9,'firstyear','sci14','Aug2008','3','1','3','NA','NA','NA');
/*!40000 ALTER TABLE `firstyearsci14aug2008b` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `icici101`
--

DROP TABLE IF EXISTS `icici101`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `icici101` (
  `recordid` bigint unsigned NOT NULL AUTO_INCREMENT,
  `crdr` varchar(50) DEFAULT NULL,
  `remarks` varchar(200) DEFAULT NULL,
  `currentdate` date DEFAULT NULL,
  `amount` double DEFAULT NULL,
  `balance` double DEFAULT NULL,
  PRIMARY KEY (`recordid`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `icici101`
--

LOCK TABLES `icici101` WRITE;
/*!40000 ALTER TABLE `icici101` DISABLE KEYS */;
INSERT INTO `icici101` VALUES (1,'Dr','Pettycash','2008-05-23',11,9989),(4,'Dr','may','2008-05-23',1300,8689),(6,'Dr','Refund','2008-05-23',100,8589),(7,'Dr','Daniel','2008-05-24',10,8579),(8,'Dr','Daniel','2008-05-23',10,8569),(9,'Dr','Pettycash','2008-05-27',1000,9000),(10,'Dr','Pettycash','2008-05-27',1000,8000),(11,'Dr','Pettycash','2008-08-26',100,19872),(12,'Dr','Pettycash','2008-08-26',250,19622),(13,'Dr','Pettycash','2008-08-26',150,19472);
/*!40000 ALTER TABLE `icici101` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `icici_pro6022`
--

DROP TABLE IF EXISTS `icici_pro6022`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `icici_pro6022` (
  `recordid` bigint unsigned NOT NULL AUTO_INCREMENT,
  `crdr` varchar(50) DEFAULT NULL,
  `remarks` varchar(200) DEFAULT NULL,
  `currentdate` date DEFAULT NULL,
  `amount` double DEFAULT NULL,
  `balance` double DEFAULT NULL,
  PRIMARY KEY (`recordid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `icici_pro6022`
--

LOCK TABLES `icici_pro6022` WRITE;
/*!40000 ALTER TABLE `icici_pro6022` DISABLE KEYS */;
/*!40000 ALTER TABLE `icici_pro6022` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `infrastructuredetails`
--

DROP TABLE IF EXISTS `infrastructuredetails`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `infrastructuredetails` (
  `HallIId` bigint NOT NULL AUTO_INCREMENT,
  `HallName` varchar(50) DEFAULT NULL,
  `HallCapacity` int DEFAULT NULL,
  `ComputerFacility` int DEFAULT NULL,
  PRIMARY KEY (`HallIId`)
) ENGINE=MyISAM AUTO_INCREMENT=54 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `infrastructuredetails`
--

LOCK TABLES `infrastructuredetails` WRITE;
/*!40000 ALTER TABLE `infrastructuredetails` DISABLE KEYS */;
INSERT INTO `infrastructuredetails` VALUES (33,'Old',7,1),(32,'studio',10,0),(35,'A1',5,1),(38,'SAT100',2,1),(39,'SAM007',5,0),(40,'Sam23',3,1),(43,'Auditorium',21,0),(44,'New Block',80,0),(53,'Gdfg',5,1);
/*!40000 ALTER TABLE `infrastructuredetails` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `karthik_be_may2008_a`
--

DROP TABLE IF EXISTS `karthik_be_may2008_a`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `karthik_be_may2008_a` (
  `timetableid` bigint NOT NULL AUTO_INCREMENT,
  `timetablename` varchar(50) DEFAULT NULL,
  `coursecode` varchar(50) DEFAULT NULL,
  `term` varchar(50) DEFAULT NULL,
  `todaydate` date DEFAULT NULL,
  `day` varchar(50) DEFAULT NULL,
  `week` varchar(50) DEFAULT NULL,
  `slot` varchar(50) DEFAULT NULL,
  `subject` varchar(50) DEFAULT NULL,
  `staff` varchar(50) DEFAULT NULL,
  `roomno` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`timetableid`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `karthik_be_may2008_a`
--

LOCK TABLES `karthik_be_may2008_a` WRITE;
/*!40000 ALTER TABLE `karthik_be_may2008_a` DISABLE KEYS */;
INSERT INTO `karthik_be_may2008_a` VALUES (1,'KARTHIK','be','May2008','2008-05-01','4','1','1','Holiday','Holiday','Holiday'),(2,'KARTHIK','be','May2008','2008-05-01','4','1','3','Holiday','Holiday','Holiday'),(3,'KARTHIK','be','May2008','2008-05-02','4','1','2','Holiday','Holiday','Holiday');
/*!40000 ALTER TABLE `karthik_be_may2008_a` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `khus_sci14_aug2008_b`
--

DROP TABLE IF EXISTS `khus_sci14_aug2008_b`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `khus_sci14_aug2008_b` (
  `timetableid` bigint NOT NULL AUTO_INCREMENT,
  `timetablename` varchar(50) DEFAULT NULL,
  `coursecode` varchar(50) DEFAULT NULL,
  `term` varchar(50) DEFAULT NULL,
  `todaydate` date DEFAULT NULL,
  `day` varchar(50) DEFAULT NULL,
  `week` varchar(50) DEFAULT NULL,
  `slot` varchar(50) DEFAULT NULL,
  `subject` varchar(50) DEFAULT NULL,
  `staff` varchar(50) DEFAULT NULL,
  `roomno` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`timetableid`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `khus_sci14_aug2008_b`
--

LOCK TABLES `khus_sci14_aug2008_b` WRITE;
/*!40000 ALTER TABLE `khus_sci14_aug2008_b` DISABLE KEYS */;
INSERT INTO `khus_sci14_aug2008_b` VALUES (1,'khus','sci14','Aug2008','2008-07-10','4','1','1','Holiday','Holiday','Holiday'),(2,'khus','sci14','Aug2008','2008-07-10','4','1','2','Holiday','Holiday','Holiday');
/*!40000 ALTER TABLE `khus_sci14_aug2008_b` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `leavemaster`
--

DROP TABLE IF EXISTS `leavemaster`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `leavemaster` (
  `LeaveId` bigint NOT NULL AUTO_INCREMENT,
  `TypeofLeave` varchar(50) DEFAULT NULL,
  `Intake` varchar(50) DEFAULT NULL,
  `Course` varchar(50) DEFAULT NULL,
  `Section` char(1) DEFAULT NULL,
  `Date1` date DEFAULT NULL,
  `Date2` date DEFAULT NULL,
  `Slot` tinyint DEFAULT NULL,
  `LeaveReason` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`LeaveId`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `leavemaster`
--

LOCK TABLES `leavemaster` WRITE;
/*!40000 ALTER TABLE `leavemaster` DISABLE KEYS */;
INSERT INTO `leavemaster` VALUES (9,'General','May2008','be','B','2008-04-28','2008-04-30',0,'Sam Birth day'),(10,'Slot','May2008','be','A','2008-05-02','2008-05-02',2,'Chumma'),(11,'Slot','May2008','be','A','2008-05-01','2008-05-01',3,'www'),(12,'Slot','May2008','be','A','2008-05-01','2008-05-01',1,'www'),(13,'partial','May2008','be','A','2008-05-07','2008-05-07',0,'www'),(14,'General','May2008','be','B','2008-06-07','2008-06-08',0,'EEE'),(15,'Slot','May2008','be','A','2008-06-05','2008-06-05',3,'ghj'),(16,'Slot','May2008','be','B','2008-05-07','2008-05-07',2,'Chumma'),(17,'Slot','May2008','be','A','2008-05-06','2008-05-06',2,'Chumma'),(18,'Slot','May2008','be','A','2008-05-08','2008-05-08',1,'Sam Birth day'),(19,'Slot','May2008','be','A','2008-05-10','2008-05-10',3,'Sam Birth day'),(20,'Slot','May2008','be','A','2008-05-09','2008-05-09',2,'Slot'),(21,'Slot','May2008','be','B','2008-05-01','2008-05-01',2,'uuuu'),(22,'General','Aug2008','sci14','b','2008-07-10','2008-07-10',0,'jgftftyftyf'),(23,'Slot','Aug2008','EEE','A','2008-08-18','2008-08-18',2,'BD'),(24,'Partial','Feb2009','EEE','n',NULL,NULL,0,'');
/*!40000 ALTER TABLE `leavemaster` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `markschemedetails`
--

DROP TABLE IF EXISTS `markschemedetails`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `markschemedetails` (
  `MarkSchemeId` int NOT NULL AUTO_INCREMENT,
  `MarkSchemeName` varchar(50) DEFAULT NULL,
  `MarkSchemeCycleNo` bigint DEFAULT NULL,
  `Upperlimit1` float DEFAULT NULL,
  `Symbol1` varchar(30) DEFAULT NULL,
  `Lowerlimit1` float DEFAULT NULL,
  `Grade1` varchar(5) DEFAULT NULL,
  `Upperlimit2` float DEFAULT NULL,
  `Symbol2` varchar(30) DEFAULT NULL,
  `Lowerlimit2` float DEFAULT NULL,
  `Grade2` varchar(5) DEFAULT NULL,
  `Upperlimit3` float DEFAULT NULL,
  `Symbol3` varchar(30) DEFAULT NULL,
  `Lowerlimit3` float DEFAULT NULL,
  `Grade3` varchar(5) DEFAULT NULL,
  `Upperlimit4` float DEFAULT NULL,
  `Symbol4` varchar(30) DEFAULT NULL,
  `Lowerlimit4` float DEFAULT NULL,
  `Grade4` varchar(5) DEFAULT NULL,
  `Upperlimit5` float DEFAULT NULL,
  `Symbol5` varchar(30) DEFAULT NULL,
  `Lowerlimit5` float DEFAULT NULL,
  `Grade5` varchar(5) DEFAULT NULL,
  `Upperlimit6` float DEFAULT NULL,
  `Symbol6` varchar(30) DEFAULT NULL,
  `Lowerlimit6` float DEFAULT NULL,
  `Grade6` varchar(5) DEFAULT NULL,
  `Upperlimit7` float DEFAULT NULL,
  `Symbol7` varchar(30) DEFAULT NULL,
  `Lowerlimit7` float DEFAULT NULL,
  `Grade7` varchar(5) DEFAULT NULL,
  `Upperlimit8` float DEFAULT NULL,
  `Symbol8` varchar(30) DEFAULT NULL,
  `Lowerlimit8` float DEFAULT NULL,
  `Grade8` varchar(5) DEFAULT NULL,
  `Upperlimit9` float DEFAULT NULL,
  `Symbol9` varchar(30) DEFAULT NULL,
  `Lowerlimit9` float DEFAULT NULL,
  `Grade9` varchar(5) DEFAULT NULL,
  `Upperlimit10` float DEFAULT NULL,
  `Symbol10` varchar(30) DEFAULT NULL,
  `Lowerlimit10` float DEFAULT NULL,
  `Grade10` varchar(5) DEFAULT NULL,
  `Upperlimit11` float DEFAULT NULL,
  `Symbol11` varchar(30) DEFAULT NULL,
  `Lowerlimit11` float DEFAULT NULL,
  `Grade11` varchar(5) DEFAULT NULL,
  `Upperlimit12` float DEFAULT NULL,
  `Symbol12` varchar(30) DEFAULT NULL,
  `Lowerlimit12` float DEFAULT NULL,
  `Grade12` varchar(5) DEFAULT NULL,
  `Upperlimit13` float DEFAULT NULL,
  `Symbol13` varchar(30) DEFAULT NULL,
  `Lowerlimit13` float DEFAULT NULL,
  `Grade13` varchar(5) DEFAULT NULL,
  `Upperlimit14` float DEFAULT NULL,
  `Symbol14` varchar(30) DEFAULT NULL,
  `Lowerlimit14` float DEFAULT NULL,
  `Grade14` varchar(5) DEFAULT NULL,
  `Upperlimit15` float DEFAULT NULL,
  `Symbol15` varchar(30) DEFAULT NULL,
  `Lowerlimit15` float DEFAULT NULL,
  `Grade15` varchar(5) DEFAULT NULL,
  `Upperlimit16` float DEFAULT NULL,
  `Symbol16` varchar(30) DEFAULT NULL,
  `Lowerlimit16` float DEFAULT NULL,
  `Grade16` varchar(5) DEFAULT NULL,
  `Upperlimit17` float DEFAULT NULL,
  `Symbol17` varchar(30) DEFAULT NULL,
  `Lowerlimit17` float DEFAULT NULL,
  `Grade17` varchar(5) DEFAULT NULL,
  `Upperlimit18` float DEFAULT NULL,
  `Symbol18` varchar(30) DEFAULT NULL,
  `Lowerlimit18` float DEFAULT NULL,
  `Grade18` varchar(5) DEFAULT NULL,
  `Upperlimit19` float DEFAULT NULL,
  `Symbol19` varchar(30) DEFAULT NULL,
  `Lowerlimit19` float DEFAULT NULL,
  `Grade19` varchar(5) DEFAULT NULL,
  `Upperlimit20` float DEFAULT NULL,
  `Symbol20` varchar(30) DEFAULT NULL,
  `Lowerlimit20` float DEFAULT NULL,
  `Grade20` varchar(5) DEFAULT NULL,
  PRIMARY KEY (`MarkSchemeId`)
) ENGINE=MyISAM AUTO_INCREMENT=83 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `markschemedetails`
--

LOCK TABLES `markschemedetails` WRITE;
/*!40000 ALTER TABLE `markschemedetails` DISABLE KEYS */;
INSERT INTO `markschemedetails` VALUES (1,'Percentage',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(55,'ssm',2,3,'LessThan',5,'f',2,'LessThanEqualto',1,'e',0,'NA',0,'NA',0,'NA',0,'NA',0,'NA',0,'NA',0,'NA',0,'NA',0,'NA',0,'NA',0,'NA',0,'NA',0,'NA',0,'NA',0,'NA',0,'NA',0,'NA',0,'NA',0,'NA',0,'NA',0,'NA',0,'NA',0,'NA',0,'NA',0,'NA',0,'NA',0,'NA',0,'NA',0,'NA',0,'NA',0,'NA',0,'NA',0,'NA',0,'NA',0,'NA',0,'NA'),(68,'MarSch',2,23,'LessThan',45,'A',45,'LessThan',100,'B',0,'NA',0,'NA',0,'NA',0,'NA',0,'NA',0,'NA',0,'NA',0,'NA',0,'NA',0,'NA',0,'NA',0,'NA',0,'NA',0,'NA',0,'NA',0,'NA',0,'NA',0,'NA',0,'NA',0,'NA',0,'NA',0,'NA',0,'NA',0,'NA',0,'NA',0,'NA',0,'NA',0,'NA',0,'NA',0,'NA',0,'NA',0,'NA',0,'NA',0,'NA',0,'NA',0,'NA'),(69,'MARSCHE',2,50,'LessThan',80,'A',80,'LessThan',100,'B',0,'NA',0,'NA',0,'NA',0,'NA',0,'NA',0,'NA',0,'NA',0,'NA',0,'NA',0,'NA',0,'NA',0,'NA',0,'NA',0,'NA',0,'NA',0,'NA',0,'NA',0,'NA',0,'NA',0,'NA',0,'NA',0,'NA',0,'NA',0,'NA',0,'NA',0,'NA',0,'NA',0,'NA',0,'NA',0,'NA',0,'NA',0,'NA',0,'NA',0,'NA',0,'NA',0,'NA'),(70,'srinivasan',4,0,'LessThan',40,'Fail',40,'LessThan',60,'seocn',60,'LessThan',75,'first',75,'LessThanEqualto',100,'Fisrt',0,'NA',0,'NA',0,'NA',0,'NA',0,'NA',0,'NA',0,'NA',0,'NA',0,'NA',0,'NA',0,'NA',0,'NA',0,'NA',0,'NA',0,'NA',0,'NA',0,'NA',0,'NA',0,'NA',0,'NA',0,'NA',0,'NA',0,'NA',0,'NA',0,'NA',0,'NA',0,'NA',0,'NA',0,'NA',0,'NA',0,'NA',0,'NA'),(82,'Karthik',2,0,'NA',0,'NA',0,'NA',0,'NA',0,'NA',0,'NA',0,'NA',0,'NA',0,'NA',0,'NA',0,'NA',0,'NA',0,'NA',0,'NA',0,'NA',0,'NA',0,'NA',0,'NA',0,'NA',0,'NA',0,'NA',0,'NA',0,'NA',0,'NA',0,'NA',0,'NA',0,'NA',0,'NA',0,'NA',0,'NA',0,'NA',0,'NA',0,'NA',0,'NA',0,'NA',0,'NA',0,'NA',0,'NA',0,'NA',0,'NA');
/*!40000 ALTER TABLE `markschemedetails` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `menumaster`
--

DROP TABLE IF EXISTS `menumaster`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `menumaster` (
  `MenuId` int NOT NULL AUTO_INCREMENT,
  `MenuName` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`MenuId`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `menumaster`
--

LOCK TABLES `menumaster` WRITE;
/*!40000 ALTER TABLE `menumaster` DISABLE KEYS */;
INSERT INTO `menumaster` VALUES (1,'Masters'),(2,'Timetable'),(3,'Attendance'),(4,'Finance'),(5,'Library'),(6,'ExamTimetable'),(7,'StudentDetails'),(8,'StaffDetails');
/*!40000 ALTER TABLE `menumaster` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `menurights`
--

DROP TABLE IF EXISTS `menurights`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `menurights` (
  `UserId` int DEFAULT NULL,
  `UserType` varchar(50) DEFAULT NULL,
  `MenuId` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `menurights`
--

LOCK TABLES `menurights` WRITE;
/*!40000 ALTER TABLE `menurights` DISABLE KEYS */;
INSERT INTO `menurights` VALUES (1,'Admin',3),(1,'Admin',4),(1,'Admin',1),(1,'Admin',2),(1,'Admin',6),(1,'Admin',5),(1,'Admin',8),(1,'Admin',7);
/*!40000 ALTER TABLE `menurights` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `omkar_be_may2009_a`
--

DROP TABLE IF EXISTS `omkar_be_may2009_a`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `omkar_be_may2009_a` (
  `timetableid` bigint NOT NULL AUTO_INCREMENT,
  `timetablename` varchar(50) DEFAULT NULL,
  `coursecode` varchar(50) DEFAULT NULL,
  `term` varchar(50) DEFAULT NULL,
  `todaydate` date DEFAULT NULL,
  `day` varchar(50) DEFAULT NULL,
  `week` varchar(50) DEFAULT NULL,
  `slot` varchar(50) DEFAULT NULL,
  `subject` varchar(50) DEFAULT NULL,
  `staff` varchar(50) DEFAULT NULL,
  `roomno` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`timetableid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `omkar_be_may2009_a`
--

LOCK TABLES `omkar_be_may2009_a` WRITE;
/*!40000 ALTER TABLE `omkar_be_may2009_a` DISABLE KEYS */;
/*!40000 ALTER TABLE `omkar_be_may2009_a` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `omkarbemay2009a`
--

DROP TABLE IF EXISTS `omkarbemay2009a`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `omkarbemay2009a` (
  `timetableid` bigint NOT NULL AUTO_INCREMENT,
  `timetablename` varchar(50) DEFAULT NULL,
  `coursecode` varchar(50) DEFAULT NULL,
  `term` varchar(50) DEFAULT NULL,
  `day` varchar(50) DEFAULT NULL,
  `week` varchar(50) DEFAULT NULL,
  `slot` varchar(50) DEFAULT NULL,
  `subject` varchar(50) DEFAULT NULL,
  `staff` varchar(50) DEFAULT NULL,
  `roomno` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`timetableid`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `omkarbemay2009a`
--

LOCK TABLES `omkarbemay2009a` WRITE;
/*!40000 ALTER TABLE `omkarbemay2009a` DISABLE KEYS */;
INSERT INTO `omkarbemay2009a` VALUES (1,'OMKAR','be','May2009','1','1','1','NA','NA','NA'),(2,'OMKAR','be','May2009','2','1','1','NA','NA','NA'),(3,'OMKAR','be','May2009','3','1','1','NA','NA','NA'),(4,'OMKAR','be','May2009','4','1','1','NA','NA','NA'),(5,'OMKAR','be','May2009','5','1','1','NA','NA','NA'),(6,'OMKAR','be','May2009','6','1','1','NA','NA','NA');
/*!40000 ALTER TABLE `omkarbemay2009a` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `paymentdetails`
--

DROP TABLE IF EXISTS `paymentdetails`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `paymentdetails` (
  `recordid` bigint NOT NULL AUTO_INCREMENT,
  `amount` double DEFAULT NULL,
  `accountnumber` varchar(50) DEFAULT NULL,
  `description` varchar(70) DEFAULT NULL,
  `paymode` varchar(50) DEFAULT NULL,
  `cdnumber` int DEFAULT NULL,
  `cddate` date DEFAULT NULL,
  `bankname` varchar(50) DEFAULT NULL,
  `branch` varchar(50) DEFAULT NULL,
  `towhom` varchar(50) DEFAULT NULL,
  `done` varchar(6) DEFAULT NULL,
  PRIMARY KEY (`recordid`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `paymentdetails`
--

LOCK TABLES `paymentdetails` WRITE;
/*!40000 ALTER TABLE `paymentdetails` DISABLE KEYS */;
INSERT INTO `paymentdetails` VALUES (1,20000,'602201198626',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(2,10000,'101','Deposit','Cheque',12577,'2008-04-26','','','Karthik','no'),(3,2000,'9894','Deposit','Cheque',12345,'2008-07-26','','','srinilinux','no'),(4,28,'101','Pendings','Cheque',10001,'2008-08-26','','','DA05','no'),(5,10000,'987','Deposit','Cheque',2147483647,'2008-09-24','','','322','no'),(6,220,'101','Deposit','Cheque',987654321,'2008-09-11','','','srinivasan','no');
/*!40000 ALTER TABLE `paymentdetails` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `paythis`
--

DROP TABLE IF EXISTS `paythis`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `paythis` (
  `recordid` bigint DEFAULT NULL,
  `onoff` varchar(10) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `paythis`
--

LOCK TABLES `paythis` WRITE;
/*!40000 ALTER TABLE `paythis` DISABLE KEYS */;
INSERT INTO `paythis` VALUES (2,'off'),(3,'off'),(4,'off'),(5,'off'),(6,'off');
/*!40000 ALTER TABLE `paythis` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `persondetails`
--

DROP TABLE IF EXISTS `persondetails`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `persondetails` (
  `recordid` bigint NOT NULL AUTO_INCREMENT,
  `personid` varchar(50) DEFAULT NULL,
  `personname` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`recordid`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `persondetails`
--

LOCK TABLES `persondetails` WRITE;
/*!40000 ALTER TABLE `persondetails` DISABLE KEYS */;
INSERT INTO `persondetails` VALUES (1,'ACCSC12','William'),(2,'ACECE45','Jackson'),(3,'ACCS23','Roy');
/*!40000 ALTER TABLE `persondetails` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pettycash`
--

DROP TABLE IF EXISTS `pettycash`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `pettycash` (
  `recordid` bigint NOT NULL AUTO_INCREMENT,
  `persionid` varchar(50) NOT NULL DEFAULT '',
  `personname` varchar(30) DEFAULT NULL,
  `accountnumber` int DEFAULT NULL,
  `pettyamount` double DEFAULT NULL,
  `pettydate` date DEFAULT NULL,
  `pettycarry` double DEFAULT NULL,
  PRIMARY KEY (`recordid`,`persionid`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pettycash`
--

LOCK TABLES `pettycash` WRITE;
/*!40000 ALTER TABLE `pettycash` DISABLE KEYS */;
INSERT INTO `pettycash` VALUES (1,'23','sam',9883,NULL,NULL,NULL),(2,'ACCSC12','William',101,11,'2008-05-23',0),(3,'ACCSC12','William',101,1000,'2008-05-27',0),(4,'ACCSC12','William',101,1000,'2008-05-27',0),(5,'ACECE45','Jackson',9894,1100,'2008-08-26',0),(6,'ACCS23','Roy',101,100,'2008-08-26',0),(7,'ACCSC12','William',101,250,'2008-08-26',0),(8,'ACECE45','Jackson',101,150,'2008-08-26',0),(9,'ACCS23','Roy',9894,150,'2008-08-26',0);
/*!40000 ALTER TABLE `pettycash` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `publicationdetails`
--

DROP TABLE IF EXISTS `publicationdetails`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `publicationdetails` (
  `PublicationNameId` int NOT NULL AUTO_INCREMENT,
  `PublicationName` varchar(100) NOT NULL DEFAULT '',
  PRIMARY KEY (`PublicationNameId`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `publicationdetails`
--

LOCK TABLES `publicationdetails` WRITE;
/*!40000 ALTER TABLE `publicationdetails` DISABLE KEYS */;
INSERT INTO `publicationdetails` VALUES (5,'Tata'),(2,'Mc Graw'),(4,'Osborne');
/*!40000 ALTER TABLE `publicationdetails` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `purchase`
--

DROP TABLE IF EXISTS `purchase`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `purchase` (
  `recordid` bigint NOT NULL AUTO_INCREMENT,
  `invoicenumber` varchar(50) DEFAULT NULL,
  `customerid` varchar(50) DEFAULT NULL,
  `customername` varchar(80) DEFAULT NULL,
  `billamount` double DEFAULT NULL,
  `billdate` date DEFAULT NULL,
  `paidamount` double NOT NULL DEFAULT '0',
  `paydate` date DEFAULT NULL,
  PRIMARY KEY (`recordid`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `purchase`
--

LOCK TABLES `purchase` WRITE;
/*!40000 ALTER TABLE `purchase` DISABLE KEYS */;
INSERT INTO `purchase` VALUES (2,'201','DA05','Daniel',100,'2008-03-20',100,NULL),(3,'2544','Vel01','vel',1500,'2008-04-23',0,'2008-04-24'),(4,'8987897978','S','Yrty',5468,'2008-09-04',0,'2008-09-05');
/*!40000 ALTER TABLE `purchase` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rack`
--

DROP TABLE IF EXISTS `rack`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `rack` (
  `RackId` int NOT NULL AUTO_INCREMENT,
  `RackNo` varchar(20) NOT NULL DEFAULT '',
  `NoofBooks` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`RackId`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rack`
--

LOCK TABLES `rack` WRITE;
/*!40000 ALTER TABLE `rack` DISABLE KEYS */;
INSERT INTO `rack` VALUES (4,'AC',100),(2,'AB',1000),(5,'AA',50);
/*!40000 ALTER TABLE `rack` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `random`
--

DROP TABLE IF EXISTS `random`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `random` (
  `sno` bigint NOT NULL AUTO_INCREMENT,
  `recordid` int DEFAULT NULL,
  `invoicenumber` varchar(30) DEFAULT NULL,
  `whichdue` int DEFAULT NULL,
  `dueamount` double DEFAULT NULL,
  `ckbx` varchar(5) DEFAULT NULL,
  `accountnumber` int DEFAULT NULL,
  PRIMARY KEY (`sno`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `random`
--

LOCK TABLES `random` WRITE;
/*!40000 ALTER TABLE `random` DISABLE KEYS */;
/*!40000 ALTER TABLE `random` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `refund`
--

DROP TABLE IF EXISTS `refund`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `refund` (
  `recordid` bigint NOT NULL AUTO_INCREMENT,
  `studentid` varchar(80) NOT NULL DEFAULT '',
  `paidamount` double DEFAULT NULL,
  `refundamount` double DEFAULT NULL,
  `accountnumber` bigint DEFAULT NULL,
  `mode` varchar(50) DEFAULT NULL,
  `cdnumber` int DEFAULT '0',
  `dddate` date DEFAULT NULL,
  `bankname` varchar(50) DEFAULT NULL,
  `branch` varchar(50) DEFAULT NULL,
  `towhom` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`recordid`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `refund`
--

LOCK TABLES `refund` WRITE;
/*!40000 ALTER TABLE `refund` DISABLE KEYS */;
INSERT INTO `refund` VALUES (3,'1',1000,100,101,'Cash',0,'2008-05-23','','','1');
/*!40000 ALTER TABLE `refund` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `registrationfeesdetails`
--

DROP TABLE IF EXISTS `registrationfeesdetails`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `registrationfeesdetails` (
  `RegistrationFeesId` bigint NOT NULL AUTO_INCREMENT,
  `RegistrationFees` bigint NOT NULL DEFAULT '0',
  `LibraryFine` bigint DEFAULT NULL,
  PRIMARY KEY (`RegistrationFeesId`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `registrationfeesdetails`
--

LOCK TABLES `registrationfeesdetails` WRITE;
/*!40000 ALTER TABLE `registrationfeesdetails` DISABLE KEYS */;
INSERT INTO `registrationfeesdetails` VALUES (1,1,20),(2,0,NULL);
/*!40000 ALTER TABLE `registrationfeesdetails` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `salary`
--

DROP TABLE IF EXISTS `salary`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `salary` (
  `recordid` bigint NOT NULL AUTO_INCREMENT,
  `salarymonth` varchar(30) DEFAULT NULL,
  `accountnumber` int DEFAULT NULL,
  `salarytotal` double DEFAULT NULL,
  `mode` varchar(20) DEFAULT NULL,
  `cdnumber` int DEFAULT NULL,
  `cdbankname` varchar(50) DEFAULT NULL,
  `cdbranch` varchar(50) DEFAULT NULL,
  `cddate` date DEFAULT NULL,
  `cdto` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`recordid`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `salary`
--

LOCK TABLES `salary` WRITE;
/*!40000 ALTER TABLE `salary` DISABLE KEYS */;
INSERT INTO `salary` VALUES (4,'may',101,1300,'Cash',0,'','','2008-05-23','may'),(5,'',0,0,'Cash',0,'','',NULL,'');
/*!40000 ALTER TABLE `salary` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sbnm1515`
--

DROP TABLE IF EXISTS `sbnm1515`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sbnm1515` (
  `recordid` bigint unsigned NOT NULL AUTO_INCREMENT,
  `crdr` varchar(50) DEFAULT NULL,
  `remarks` varchar(200) DEFAULT NULL,
  `currentdate` date DEFAULT NULL,
  `amount` double DEFAULT NULL,
  `balance` double DEFAULT NULL,
  PRIMARY KEY (`recordid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sbnm1515`
--

LOCK TABLES `sbnm1515` WRITE;
/*!40000 ALTER TABLE `sbnm1515` DISABLE KEYS */;
/*!40000 ALTER TABLE `sbnm1515` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `screenmaster`
--

DROP TABLE IF EXISTS `screenmaster`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `screenmaster` (
  `ScreenId` bigint NOT NULL AUTO_INCREMENT,
  `ScreenName` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`ScreenId`)
) ENGINE=MyISAM AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `screenmaster`
--

LOCK TABLES `screenmaster` WRITE;
/*!40000 ALTER TABLE `screenmaster` DISABLE KEYS */;
INSERT INTO `screenmaster` VALUES (21,'AgentDetails'),(2,'BankDetails'),(3,'AssestmentDetails'),(4,'CohortDetails'),(6,'CollegeDetails'),(7,'CountryDepositDetails'),(8,'CountryDetail'),(9,'CourseDetails'),(10,'EmbassyAddress'),(11,'ExaminationTimeTable'),(12,'ExamTTSlot'),(13,'InfrastructureDetails'),(14,'MarkSchemeDetails'),(15,'RegistrationFeesDetails'),(16,'ScreenMaster'),(17,'SectionMaster'),(18,'SubjectCreditDetails'),(19,'SupplierDetails'),(20,'UniversityDetails'),(22,'ExamName'),(23,'BookDetails'),(24,'MenuMaster'),(25,'MenuRights'),(26,'PublicationDetails'),(27,'RackDetails'),(28,'ScreenRights'),(29,'UserCreation'),(30,'UserTypeMaster');
/*!40000 ALTER TABLE `screenmaster` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `screenrights`
--

DROP TABLE IF EXISTS `screenrights`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `screenrights` (
  `UserId` int DEFAULT NULL,
  `UserType` varchar(50) DEFAULT NULL,
  `ScreenId` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `screenrights`
--

LOCK TABLES `screenrights` WRITE;
/*!40000 ALTER TABLE `screenrights` DISABLE KEYS */;
INSERT INTO `screenrights` VALUES (2,'Agent',17),(2,'Agent',18),(2,'Agent',19),(2,'Agent',20),(1,'Admin',21),(1,'Admin',3),(1,'Admin',2),(1,'Admin',4),(1,'Admin',6),(1,'Admin',7),(1,'Admin',8),(1,'Admin',9),(1,'Admin',10),(1,'Admin',11),(1,'Admin',12),(1,'Admin',13),(1,'Admin',14),(1,'Admin',15),(1,'Admin',16),(1,'Admin',17),(1,'Admin',18),(1,'Admin',19),(1,'Admin',20),(1,'Admin',23),(1,'Admin',22),(1,'Admin',24),(1,'Admin',25),(1,'Admin',26),(1,'Admin',27),(1,'Admin',28),(1,'Admin',29),(1,'Admin',30);
/*!40000 ALTER TABLE `screenrights` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sectionmaster`
--

DROP TABLE IF EXISTS `sectionmaster`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sectionmaster` (
  `SectionId` int NOT NULL AUTO_INCREMENT,
  `Intake` varchar(50) DEFAULT NULL,
  `CourseCode` varchar(50) DEFAULT NULL,
  `LevelOfCourse` varchar(50) DEFAULT NULL,
  `Section` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`SectionId`)
) ENGINE=MyISAM AUTO_INCREMENT=76 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sectionmaster`
--

LOCK TABLES `sectionmaster` WRITE;
/*!40000 ALTER TABLE `sectionmaster` DISABLE KEYS */;
INSERT INTO `sectionmaster` VALUES (42,'Aug2008','MECH','Level1','D'),(69,'May2009','IT','Level2','A'),(43,'Aug2008','IT','Level2','A'),(52,'Aug2008','IT','Level2','B'),(51,'Aug2008','EEE','Level1','B'),(50,'Aug2008','MSESE','Level3','F'),(44,'Aug2008','MBA','Level4','A'),(71,'Aug2008','EEE','Level1','A'),(45,'Aug2008','NAT','Level5','A'),(46,'Aug2008','MCA','Level2','A'),(47,'Aug2008','MECH','Level1','A'),(72,'Nov2008','IT','Level2','E'),(54,'Aug2008','BECSE','Level3','B'),(55,'Aug2008','MBA','Level4','B'),(57,'Aug2008','MCA','Level2','B'),(58,'Aug2008','MECH','Level1','B'),(59,'Aug2008','ECE','Level1','A'),(61,'Aug2008','IT','Level2','C'),(63,'Aug2008','BECSE','Level3','C'),(64,'Aug2008','MBA','Level4','C'),(65,'Aug2008','NAT','Level5','C'),(66,'Aug2008','MCA','Level2','C'),(67,'Aug2008','MECH','Level1','E'),(68,'Aug2008','ECE','Level1','B'),(75,'Feb2009','EEE','Level1','A');
/*!40000 ALTER TABLE `sectionmaster` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `slotrepeat`
--

DROP TABLE IF EXISTS `slotrepeat`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `slotrepeat` (
  `week` int NOT NULL DEFAULT '0',
  `boolean` tinyint NOT NULL DEFAULT '0',
  PRIMARY KEY (`week`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `slotrepeat`
--

LOCK TABLES `slotrepeat` WRITE;
/*!40000 ALTER TABLE `slotrepeat` DISABLE KEYS */;
INSERT INTO `slotrepeat` VALUES (1,0),(2,0),(3,0),(4,0),(5,0),(6,0),(7,0),(8,0),(9,0),(10,0),(11,0),(12,0),(13,0),(14,0),(15,0),(16,0),(17,0),(18,0),(19,0),(20,0),(21,0),(22,0),(23,0),(24,0),(25,0),(26,0),(27,0),(28,0),(29,0),(30,0),(31,0),(32,0);
/*!40000 ALTER TABLE `slotrepeat` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `srini_eee_aug2008_a`
--

DROP TABLE IF EXISTS `srini_eee_aug2008_a`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `srini_eee_aug2008_a` (
  `timetableid` bigint NOT NULL AUTO_INCREMENT,
  `timetablename` varchar(50) DEFAULT NULL,
  `coursecode` varchar(50) DEFAULT NULL,
  `term` varchar(50) DEFAULT NULL,
  `todaydate` date DEFAULT NULL,
  `day` varchar(50) DEFAULT NULL,
  `week` varchar(50) DEFAULT NULL,
  `slot` varchar(50) DEFAULT NULL,
  `subject` varchar(50) DEFAULT NULL,
  `staff` varchar(50) DEFAULT NULL,
  `roomno` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`timetableid`)
) ENGINE=MyISAM AUTO_INCREMENT=34 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `srini_eee_aug2008_a`
--

LOCK TABLES `srini_eee_aug2008_a` WRITE;
/*!40000 ALTER TABLE `srini_eee_aug2008_a` DISABLE KEYS */;
INSERT INTO `srini_eee_aug2008_a` VALUES (3,'SRINI','EEE','Aug2008','2008-08-27','3','2','1','ENG107','syam','h2'),(4,'SRINI','EEE','Aug2008','2008-09-03','3','3','1','ENG107','syam','h2'),(5,'SRINI','EEE','Aug2008','2008-09-10','3','4','1','ENG107','syam','h2'),(6,'SRINI','EEE','Aug2008','2008-09-17','3','5','1','ENG107','syam','h2'),(7,'SRINI','EEE','Aug2008','2008-09-24','3','6','1','ENG107','syam','h2'),(8,'SRINI','EEE','Aug2008','2008-10-01','3','7','1','ENG107','syam','h2'),(9,'SRINI','EEE','Aug2008','2008-10-08','3','8','1','ENG107','syam','h2'),(10,'SRINI','EEE','Aug2008','2008-10-15','3','9','1','ENG107','syam','h2'),(11,'SRINI','EEE','Aug2008','2008-10-22','3','10','1','ENG107','syam','h2'),(12,'SRINI','EEE','Aug2008','2008-10-29','3','11','1','ENG107','syam','h2'),(13,'SRINI','EEE','Aug2008','2008-11-05','3','12','1','ENG107','syam','h2'),(14,'SRINI','EEE','Aug2008','2008-11-12','3','13','1','ENG105','syam','h2'),(15,'SRINI','EEE','Aug2008','2008-11-19','3','14','1','ENG105','syam','h2'),(16,'SRINI','EEE','Aug2008','2008-11-26','3','15','1','ENG105','syam','h2'),(17,'SRINI','EEE','Aug2008','2008-12-03','3','16','1','ENG105','syam','h2'),(18,'SRINI','EEE','Aug2008','2008-12-10','3','17','1','ENG105','syam','h2'),(19,'SRINI','EEE','Aug2008','2008-12-17','3','18','1','ENG105','syam','h2'),(20,'SRINI','EEE','Aug2008','2008-12-24','3','19','1','ENG105','syam','h2'),(21,'SRINI','EEE','Aug2008','2008-12-31','3','20','1','ENG105','syam','h2'),(22,'SRINI','EEE','Aug2008','2009-01-07','3','21','1','ENG105','syam','h2'),(23,'SRINI','EEE','Aug2008','2009-01-14','3','22','1','ENG105','syam','h2'),(24,'SRINI','EEE','Aug2008','2009-01-21','3','23','1','ENG105','syam','h2'),(25,'SRINI','EEE','Aug2008','2009-01-28','3','24','1','ENG105','syam','h2'),(26,'SRINI','EEE','Aug2008','2009-02-04','3','25','1','ENG105','syam','h2'),(27,'SRINI','EEE','Aug2008','2009-02-11','3','26','1','ENG105','syam','h2'),(28,'SRINI','EEE','Aug2008','2009-02-18','3','27','1','ENG105','syam','h2'),(29,'SRINI','EEE','Aug2008','2009-02-25','3','28','1','ENG105','syam','h2'),(30,'SRINI','EEE','Aug2008','2009-03-04','3','29','1','ENG105','syam','h2'),(31,'SRINI','EEE','Aug2008','2009-03-11','3','30','1','ENG105','syam','h2'),(32,'SRINI','EEE','Aug2008','2009-03-18','3','31','1','ENG105','syam','h2'),(33,'SRINI','EEE','Aug2008','2009-03-25','3','32','1','ENG105','syam','h2');
/*!40000 ALTER TABLE `srini_eee_aug2008_a` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `srini_mech_aug2008_a`
--

DROP TABLE IF EXISTS `srini_mech_aug2008_a`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `srini_mech_aug2008_a` (
  `timetableid` bigint NOT NULL AUTO_INCREMENT,
  `timetablename` varchar(50) DEFAULT NULL,
  `coursecode` varchar(50) DEFAULT NULL,
  `term` varchar(50) DEFAULT NULL,
  `todaydate` date DEFAULT NULL,
  `day` varchar(50) DEFAULT NULL,
  `week` varchar(50) DEFAULT NULL,
  `slot` varchar(50) DEFAULT NULL,
  `subject` varchar(50) DEFAULT NULL,
  `staff` varchar(50) DEFAULT NULL,
  `roomno` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`timetableid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `srini_mech_aug2008_a`
--

LOCK TABLES `srini_mech_aug2008_a` WRITE;
/*!40000 ALTER TABLE `srini_mech_aug2008_a` DISABLE KEYS */;
/*!40000 ALTER TABLE `srini_mech_aug2008_a` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `srini_mech_aug2008_b`
--

DROP TABLE IF EXISTS `srini_mech_aug2008_b`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `srini_mech_aug2008_b` (
  `timetableid` bigint NOT NULL AUTO_INCREMENT,
  `timetablename` varchar(50) DEFAULT NULL,
  `coursecode` varchar(50) DEFAULT NULL,
  `term` varchar(50) DEFAULT NULL,
  `todaydate` date DEFAULT NULL,
  `day` varchar(50) DEFAULT NULL,
  `week` varchar(50) DEFAULT NULL,
  `slot` varchar(50) DEFAULT NULL,
  `subject` varchar(50) DEFAULT NULL,
  `staff` varchar(50) DEFAULT NULL,
  `roomno` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`timetableid`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `srini_mech_aug2008_b`
--

LOCK TABLES `srini_mech_aug2008_b` WRITE;
/*!40000 ALTER TABLE `srini_mech_aug2008_b` DISABLE KEYS */;
INSERT INTO `srini_mech_aug2008_b` VALUES (1,'SRINI','MECH','Aug2008','2008-08-21','4','1','3','','',''),(2,'SRINI','MECH','Aug2008','2008-10-02','4','7','3','','',''),(3,'SRINI','MECH','Aug2008','2008-10-30','4','11','3','','',''),(4,'SRINI','MECH','Aug2008','2008-11-27','4','15','3','','',''),(5,'SRINI','MECH','Aug2008','2008-12-25','4','19','3','','',''),(6,'SRINI','MECH','Aug2008','2009-02-05','4','25','3','','',''),(7,'SRINI','MECH','Aug2008','2009-03-12','4','30','3','','','');
/*!40000 ALTER TABLE `srini_mech_aug2008_b` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `srinimca02may2008a`
--

DROP TABLE IF EXISTS `srinimca02may2008a`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `srinimca02may2008a` (
  `timetableid` bigint NOT NULL AUTO_INCREMENT,
  `timetablename` varchar(50) DEFAULT NULL,
  `coursecode` varchar(50) DEFAULT NULL,
  `term` varchar(50) DEFAULT NULL,
  `day` varchar(50) DEFAULT NULL,
  `week` varchar(50) DEFAULT NULL,
  `slot` varchar(50) DEFAULT NULL,
  `subject` varchar(50) DEFAULT NULL,
  `staff` varchar(50) DEFAULT NULL,
  `roomno` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`timetableid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `srinimca02may2008a`
--

LOCK TABLES `srinimca02may2008a` WRITE;
/*!40000 ALTER TABLE `srinimca02may2008a` DISABLE KEYS */;
/*!40000 ALTER TABLE `srinimca02may2008a` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `staffattendence`
--

DROP TABLE IF EXISTS `staffattendence`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `staffattendence` (
  `attendenceid` int NOT NULL AUTO_INCREMENT,
  `staffid` varchar(50) DEFAULT NULL,
  `department` varchar(50) DEFAULT NULL,
  `attendancedate` date DEFAULT NULL,
  `attendancestatus` varchar(50) DEFAULT NULL,
  `reason` varchar(50) NOT NULL DEFAULT '',
  `present` text,
  PRIMARY KEY (`attendenceid`)
) ENGINE=MyISAM AUTO_INCREMENT=53 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `staffattendence`
--

LOCK TABLES `staffattendence` WRITE;
/*!40000 ALTER TABLE `staffattendence` DISABLE KEYS */;
INSERT INTO `staffattendence` VALUES (48,'23','IT','2008-08-07','A','-','*25*26*27*28*29*30*31*32*33*34*35*36*'),(46,'23','IT','2008-08-04','A','-','*24*25*26*27*28*29*30*31*32*33*34*35*36*'),(47,'22','IT','2008-08-07','A','-','*25*26*27*28*29*30*31*32*33*34*35*36*'),(51,'35','IT','2008-08-31','A','-','*22*23*24*25*26*27*28*29*30*31*32*33*'),(50,'34','IT','2008-08-31','A','-','*22*23*24*25*26*27*28*29*30*31*32*33*'),(49,'24','IT','2008-08-07','A','-','*25*26*27*28*29*30*31*32*33*34*35*36*'),(38,'AP','IT','2008-07-31','AP','-','*22sit227*44sit224*34sit225***Dr*Dr*Mr*Mr*Mr*Mr*Mr*'),(39,'22','IT','2008-08-01','A','-','*24*25*26*27*28*29*30*31*32*33*34*35*36*'),(40,'23','IT','2008-08-01','A','-','*24*25*26*27*28*29*30*31*32*33*34*35*36*'),(43,'22','IT','2008-08-02','A','-','*24*25*26*27*28*29*30*31*32*33*34*35*36*'),(42,'AP','IT','2008-08-06','AP','-','*22*23*24*25*26*27*28*29*30*31*32*33*34*35*36*'),(44,'23','IT','2008-08-02','A','-','*24*25*26*27*28*29*30*31*32*33*34*35*36*'),(45,'22','IT','2008-08-04','A','-','*24*25*26*27*28*29*30*31*32*33*34*35*36*'),(52,'36','IT','2008-08-31','A','-','*22*23*24*25*26*27*28*29*30*31*32*33*');
/*!40000 ALTER TABLE `staffattendence` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `staffattendencemark`
--

DROP TABLE IF EXISTS `staffattendencemark`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `staffattendencemark` (
  `attendenceid` int NOT NULL AUTO_INCREMENT,
  `staffinformationid` int DEFAULT NULL,
  `coursecode` varchar(50) DEFAULT NULL,
  `present` varchar(200) DEFAULT NULL,
  `absent` varchar(200) DEFAULT NULL,
  `leavereason` text NOT NULL,
  `date` date DEFAULT NULL,
  PRIMARY KEY (`attendenceid`)
) ENGINE=MyISAM AUTO_INCREMENT=75 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `staffattendencemark`
--

LOCK TABLES `staffattendencemark` WRITE;
/*!40000 ALTER TABLE `staffattendencemark` DISABLE KEYS */;
INSERT INTO `staffattendencemark` VALUES (61,0,'EEE','*EEE9*EEE8*EEE2*','*EEE10*EEE11*EEE7*EEE6*','*2*1*1*2*','2008-08-25'),(56,0,'IT','*IT5*IT16*','*IT4*IT3*','*1*3*','2008-08-29'),(59,0,'EEE','*EEE8*','*EEE10*EEE11*EEE9*EEE7*EEE6*EEE2*','*1*1*4*2*3*','2008-08-01'),(60,0,'IT','*IT5*IT16*','*IT4*IT3*','*1*2*','2008-08-01'),(62,0,'EEE','*EEE8*','*EEE10*EEE11*EEE9*EEE7*EEE6*EEE2*','*1*1*4*2*3*','2008-08-01'),(63,0,'EEE','*EEE10*EEE8*EEE7*EEE6*EEE2*','*EEE10*EEE11*EEE9*EEE8*EEE7*EEE6*EEE2*','*1*3*','2008-09-09'),(70,0,'EEE','*EEE9*EEE8*EEE7*','*EEE10*EEE11*EEE6*EEE2*','*2*3*2*3*','2008-09-10'),(69,0,'IT','*IT3*IT16*','*IT5*IT4*','*1*2*','2008-09-10'),(71,0,'EEE','*EEE10*EEE8*EEE6*','*EEE11*EEE9*EEE7*EEE2*','*1*1*2*3*4*','2008-09-14'),(72,0,'EEE','*EEE11*EEE8*EEE6*','*EEE10*EEE9*EEE7*EEE2*','*1*3*3*4*','2008-09-13'),(74,0,'EEE','238*237*232*239*241','236*240','2*3','2008-09-20');
/*!40000 ALTER TABLE `staffattendencemark` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `staffavailabilitytimetable`
--

DROP TABLE IF EXISTS `staffavailabilitytimetable`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `staffavailabilitytimetable` (
  `staffavailabilityid` bigint NOT NULL AUTO_INCREMENT,
  `staffid` varchar(35) NOT NULL DEFAULT '',
  `coursecode` varchar(25) DEFAULT NULL,
  `subjectcode` varchar(25) DEFAULT NULL,
  `availability` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`staffavailabilityid`)
) ENGINE=MyISAM AUTO_INCREMENT=368 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `staffavailabilitytimetable`
--

LOCK TABLES `staffavailabilitytimetable` WRITE;
/*!40000 ALTER TABLE `staffavailabilitytimetable` DISABLE KEYS */;
INSERT INTO `staffavailabilitytimetable` VALUES (342,'EEE7','IT','ENG107','1.2.3.4.5.6.7.'),(344,'EEE11','MECH','ME338','1.2.3.4.'),(345,'EEE10','EEE','EEE702','1.6.7.'),(346,'EEE10','EEE','EEE601','1.6.7.'),(347,'EEE10','EEE','EEE801','1.2.3.4.5.6.7.'),(348,'EEE10','EEE','EEE502','1.2.3.4.5.6.7.'),(355,'IT4','IT','IT082','1.'),(350,'EEE10','MECH','MF331','1.2.3.4.5.6.7.'),(351,'EEE10','MECH','ME331','1.2.3.4.5.6.7.'),(352,'EEE10','EEE','EEE502','1.2.3.'),(353,'EEE10','EEE','EEE805','1.2.3.'),(356,'IT4','IT','IT072','1.'),(366,'EEE9','EEE','EEE703','1.3.5.7'),(367,'EEE9','EEE','EEE502','1.3.5.7');
/*!40000 ALTER TABLE `staffavailabilitytimetable` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `staffpersonalinformation`
--

DROP TABLE IF EXISTS `staffpersonalinformation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `staffpersonalinformation` (
  `staffinformationid` bigint NOT NULL AUTO_INCREMENT,
  `staffid` varchar(50) NOT NULL DEFAULT '',
  `name` varchar(50) DEFAULT NULL,
  `designation` varchar(50) DEFAULT NULL,
  `typeofjob` varchar(50) DEFAULT NULL,
  `gender` varchar(50) DEFAULT NULL,
  `boodgroup` varchar(50) DEFAULT NULL,
  `age` int DEFAULT NULL,
  `maritalstatus` varchar(50) DEFAULT NULL,
  `dateofbirth` date DEFAULT NULL,
  `dateofjoining` date DEFAULT NULL,
  `mailid` varchar(50) DEFAULT NULL,
  `password` varchar(20) DEFAULT NULL,
  `presentaddress` varchar(50) DEFAULT NULL,
  `permanentaddress` varchar(50) DEFAULT NULL,
  `mobileno` varchar(50) DEFAULT NULL,
  `phoneno` varchar(50) DEFAULT NULL,
  `religion` varchar(50) DEFAULT NULL,
  `community` varchar(50) DEFAULT NULL,
  `degree` varchar(50) DEFAULT NULL,
  `specification` varchar(50) DEFAULT NULL,
  `institutename` varchar(100) DEFAULT NULL,
  `universityname` varchar(100) DEFAULT NULL,
  `duration` varchar(10) DEFAULT NULL,
  `percentage` bigint DEFAULT NULL,
  `degree1` varchar(50) DEFAULT NULL,
  `specification1` varchar(100) DEFAULT NULL,
  `institutename1` varchar(50) DEFAULT NULL,
  `universityname1` varchar(50) DEFAULT NULL,
  `duration1` varchar(10) DEFAULT NULL,
  `percentage1` bigint DEFAULT NULL,
  `compname` varchar(50) NOT NULL DEFAULT '',
  `subject` varchar(50) DEFAULT NULL,
  `compdesignation` varchar(50) DEFAULT NULL,
  `years` tinyint DEFAULT NULL,
  `rewards` varchar(50) DEFAULT NULL,
  `reference` varchar(50) DEFAULT NULL,
  `address` varchar(50) DEFAULT NULL,
  `compname1` varchar(50) DEFAULT NULL,
  `subject1` varchar(30) DEFAULT NULL,
  `compdesignation1` varchar(50) DEFAULT NULL,
  `years1` tinyint DEFAULT NULL,
  `rewards1` varchar(50) DEFAULT NULL,
  `reference1` varchar(50) DEFAULT NULL,
  `address1` varchar(50) DEFAULT NULL,
  `department` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`staffinformationid`,`staffid`)
) ENGINE=MyISAM AUTO_INCREMENT=242 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `staffpersonalinformation`
--

LOCK TABLES `staffpersonalinformation` WRITE;
/*!40000 ALTER TABLE `staffpersonalinformation` DISABLE KEYS */;
INSERT INTO `staffpersonalinformation` VALUES (240,'EEE10','tarun','Lecturer','Permanent','Male','none',25,'Married','2003-08-16',NULL,'s@yahoo.co.in','XnndS','sfsfs','fsfsf','7575','757575','hi','m','B.TECH','csc','sathyaba','deemed','4',78,'','','','','',0,'','','',0,'','','','','','',0,'','','','EEE'),(241,'EEE11','syam','Professor','Permanent','Male','none',24,'Unmarried','1998-08-21',NULL,'s@gmail.com','EuyUP','erere','ere','6866','8686','hindu','fe','b.tech','it','sathyabama','deemed','4',78,'','','','','',0,'','','',0,'','','','','','',0,'','','','EEE'),(239,'EEE9','srini','Professor','Permanent','Male','none',23,'Unmarried','1999-08-12',NULL,'s1@gmail.com','vkDiA','hfh','fhfhf','676868','6868686','hindu','hhf','Btech','mca','sathyaba','deemed','4',67,'','','','','',0,'','','',0,'','','','','','',0,'','','','EEE'),(238,'EEE8','karthick','Professor','Permanent','Male','none',24,'Married','1985-08-16',NULL,'s@gmail.com','zRmH','sfsfs','sfsfs','9575575757','57757575','hin','yad','mba','mba','sathyabama','demmwed','2',80,'','','','','',0,'','','',0,'','','','','','',0,'','','','EEE'),(237,'EEE7','sita','Lecturer','Permanent','Female','none',25,'Unmarried','2002-08-03',NULL,'s@gmail.com','ZTVsP','ghhfh','hfh','788242422','242454546','hindu','bra','b.tech','CSC','sathy','demmed','4',70,'','','','','',0,'sathyabama','math,phy','lect',2,'','','','','','',0,'','','','EEE'),(236,'EEE6','omkar','Professor','Permanent','Male','none',25,'Unmarried','1992-08-21',NULL,'s@gmail.com','AwYnx','plot.176','ara,','9884277243','062424424','hindu','brahmin','b.tech','IT','sathyabama','deemed','4',69,'','','','','',0,'srm','english','lect',2,'dggd','mr karthick','adyar','','','',0,'','','','EEE'),(235,'IT5','hari','Lecturer','none','Male','AB+',0,'Married','2008-08-05',NULL,'','avmJt','','-do-','','','','','','','','','',0,'','','','','',0,'','','',0,'','','','','','',0,'','','','IT'),(234,'IT4','omkar','none','none','Male','O+',25,'none','2008-08-15',NULL,'s@gmail.com','NnjII','','-do-','8878','8787','','','','','','','',0,'','','','','',0,'','','',0,'','','','','','',0,'','','','IT'),(233,'IT3','SHYAM','Lecturer','Permanent','Male','none',25,'Unmarried','2008-08-10',NULL,'S@GMAO.COM','EhWev','ghghg','ghghg','949664564','464646446','HI','hghg','','','','','',0,'','','','','',0,'','','',0,'','','','','','',0,'','','','IT'),(232,'EEE2','sonu','Professor','Permanent','Male','none',24,'Unmarried','2008-08-06',NULL,'s@gmail.com','MrhvI','plot no.175','ggf','9884277243','565657','hindu','brahmin','b.tech','IT','SATHYABAMA','SATHYABAMA','4',67,'b.tech','CSC','SATHYABAMA','SATHYABAMA','2',67,'JEPP','JAVA','LECT',2,'HHF','FHFH','FHFHFHF','JEPP','JAVA','LECT',2,'HGF','GFHFH','FHFHJFH','EEE'),(231,'IT16','sila','none','none','Male','none',0,'none',NULL,NULL,'','AwfXs','','-do-','','','','','','','','','',0,'','','','','',0,'','','',0,'','','','','','',0,'','','','IT');
/*!40000 ALTER TABLE `staffpersonalinformation` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `staffqualificationdetails`
--

DROP TABLE IF EXISTS `staffqualificationdetails`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `staffqualificationdetails` (
  `degree` varchar(50) DEFAULT NULL,
  `staffid` varchar(20) NOT NULL DEFAULT '',
  `specification` varchar(100) DEFAULT NULL,
  `institutename` varchar(100) DEFAULT NULL,
  `universityname` varchar(100) DEFAULT NULL,
  `duration` varchar(50) NOT NULL DEFAULT '',
  `percentage` bigint DEFAULT NULL,
  `degree1` varchar(50) DEFAULT NULL,
  `specification1` varchar(100) DEFAULT NULL,
  `institutename1` varchar(100) DEFAULT NULL,
  `universityname1` varchar(100) DEFAULT NULL,
  `duration1` varchar(50) NOT NULL DEFAULT '',
  `percentage1` bigint DEFAULT NULL,
  `name` varchar(50) NOT NULL DEFAULT '',
  `subject` varchar(50) NOT NULL DEFAULT '',
  `designation` varchar(50) NOT NULL DEFAULT '',
  `years` tinyint NOT NULL DEFAULT '0',
  `rewards` varchar(50) NOT NULL DEFAULT '',
  `reference` varchar(50) NOT NULL DEFAULT '',
  `address` varchar(50) NOT NULL DEFAULT '',
  `name1` varchar(50) NOT NULL DEFAULT '',
  `subject1` varchar(50) NOT NULL DEFAULT '',
  `designation1` varchar(50) NOT NULL DEFAULT '',
  `years1` tinyint NOT NULL DEFAULT '0',
  `rewards1` varchar(50) NOT NULL DEFAULT '',
  `reference1` varchar(50) NOT NULL DEFAULT '',
  `address1` varchar(50) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `staffqualificationdetails`
--

LOCK TABLES `staffqualificationdetails` WRITE;
/*!40000 ALTER TABLE `staffqualificationdetails` DISABLE KEYS */;
INSERT INTO `staffqualificationdetails` VALUES ('ghgh','','hfhghg','hghjhjh','gjgjg','45',56,'ghggh','dddd','dadad','ddadada','67',53,'','','',0,'','','','','','',0,'','',''),('gfg','','hghg','ghghg','ghghg','8',566,'fgfg','gfgfg','gfgf','gfgfg','2',34,'fdfd','dd','ffdfd',2,'dffd','fdf','dfdfd','fdfd','fdfd','fdfd',2,'fdfdfd','fdggf','fggf'),('b.tech','','tyy','yttyt','yty','34',56,'b.tfd','jj','hjh','jhj','78',78,'b.tech','hg','hgh',1,'ff','fd','dfdfd','bd','dffd','fdfd',3,'dsds','sdfsf','fsf'),('b.tech','','ghh','hghg','ghghg','2',78,'hgd','iiy','iyi','iyi','4',89,'tiwary','gdgd','ggd',2,'gg','gfgf','gfgf','','','',0,'','',''),('b','','thghg','ghghg','hghg','2',78,'bhu','jjgj','gjgj','gjgj','1',89,'','','',0,'','','','','','',0,'','',''),('b','','ggf','fgfg','gfgf','1',89,'n','hghg','hghg','ghghg','2',90,'','','',0,'','','','','','',0,'','',''),('b.tech','','ggf','gfg','gfg','3',89,'df','jjhj','jhj','hjhj','8',90,'','','fgfg',3,'gdg','dgdg','dgdgd','ggd','dgdg','dgdg',3,'dggdgd','gdg','dgdgdg'),('b.tech','','ggf','gfg','gfg','3',89,'df','jjhj','jhj','hjhj','8',90,'fhfhf','fhfh','fgfg',3,'gdg','dgdg','dgdgd','ggd','dgdg','dgdg',3,'dggdgd','gdg','dgdgdg'),('b.tech','','grr','trtrtr','rtrtr','2',89,'b.tech','gfgfg','gfgf','fgfg','1',80,'ffdfd','fdfd','dfdfd',2,'dsdfsf','rwwrrw','rwrw','wrrwrw','rwrwr','rrw',4,'gfgg','grrrtr','rtrtrt'),('gfg','22sit224','jgjgj','jgjg','gjgj','6',78,'hfhf','ghjkghjkh','hkhkh','hkhkh','1',90,'ggdfg','gdgd','gdgd',4,'gdgdg','dgdgd','gdgd','dgdgd','gddgd','dgdg',8,'fhhf','hffhf','fhfhf'),('gfg','22sit224','jgjgj','jgjg','gjgj','6',78,'hfhf','ghjkghjkh','hkhkh','hkhkh','1',90,'ggdfg','gdgd','gdgd',4,'gdgdg','dgdgd','gdgd','dgdgd','gddgd','dgdg',8,'fhhf','hffhf','fhfhf'),('gfg','22sit224','jgjgj','jgjg','gjgj','6',78,'hfhf','ghjkghjkh','hkhkh','hkhkh','1',90,'ggdfg','gdgd','gdgd',4,'gdgdg','dgdgd','gdgd','dgdgd','gddgd','dgdg',8,'fhhf','hffhf','fhfhf'),('gfg','22sit224','jgjgj','jgjg','gjgj','6',78,'hfhf','ghjkghjkh','hkhkh','hkhkh','1',90,'ggdfg','gdgd','gdgd',4,'gdgdg','dgdgd','gdgd','dgdgd','gddgd','dgdg',8,'fhhf','hffhf','fhfhf'),('gfg','22sit224','jgjgj','jgjg','gjgj','6',78,'hfhf','ghjkghjkh','hkhkh','hkhkh','1',90,'ggdfg','gdgd','gdgd',4,'gdgdg','dgdgd','gdgd','dgdgd','gddgd','dgdg',8,'fhhf','hffhf','fhfhf'),('gfg','22sit224','jgjgj','jgjg','gjgj','6',78,'hfhf','ghjkghjkh','hkhkh','hkhkh','1',90,'ggdfg','gdgd','gdgd',4,'gdgdg','dgdgd','gdgd','dgdgd','gddgd','dgdg',8,'fhhf','hffhf','fhfhf'),('gfg','22sit224','jgjgj','jgjg','gjgj','6',78,'hfhf','ghjkghjkh','hkhkh','hkhkh','1',90,'ggdfg','gdgd','gdgd',4,'gdgdg','dgdgd','gdgd','dgdgd','gddgd','dgdg',8,'fhhf','hffhf','fhfhf'),('gfg','22sit224','jgjgj','jgjg','gjgj','6',78,'hfhf','ghjkghjkh','hkhkh','hkhkh','1',90,'ggdfg','gdgd','gdgd',4,'gdgdg','dgdgd','gdgd','dgdgd','gddgd','dgdg',8,'fhhf','hffhf','fhfhf'),('gfg','22sit224','jgjgj','jgjg','gjgj','6',78,'hfhf','ghjkghjkh','hkhkh','hkhkh','1',90,'ggdfg','gdgd','gdgd',4,'gdgdg','dgdgd','gdgd','dgdgd','gddgd','dgdg',8,'fhhf','hffhf','fhfhf'),('gfg','22sit224','jgjgj','jgjg','gjgj','6',78,'hfhf','ghjkghjkh','hkhkh','hkhkh','1',90,'ggdfg','gdgd','gdgd',4,'gdgdg','dgdgd','gdgd','dgdgd','gddgd','dgdg',8,'fhhf','hffhf','fhfhf'),('gfg','22sit224','jgjgj','jgjg','gjgj','6',78,'hfhf','ghjkghjkh','hkhkh','hkhkh','1',90,'ggdfg','gdgd','gdgd',4,'gdgdg','dgdgd','gdgd','dgdgd','gddgd','dgdg',8,'fhhf','hffhf','fhfhf'),('b.tech','22sit226','hjhjh','hjhjh','jhjh','6',89,'hffh','hfhf','hfhf','fhfhfh','1',89,'sdsds','sdsds','sdsd',2,'daq','eqeq','eqeq','eqeq','eqeq','eq',3,'eqereq','qeqeq','eqqqeq'),('','','','','','',0,'','','','','',0,'','','',0,'','','','','','',0,'','',''),('','','','','','',0,'','','','','',0,'','','',0,'','','','','','',0,'','',''),('rte','','543srt','yyhrtyrty','ryeryertert','4',45,'trert','765grthy','tytytry','yhtrytytry','6',45,'','','',0,'','','','','','',0,'','',''),('br','34sit225','g','gfgfg','fgfg','1',67,'fg','hgh','hgh','hgh','3',56,'gg','fg','fgf',4,'3','hth','hfhf','hff','fhff','fhfhf',4,'5','ghfhf','fhfhf'),('','','','','','',0,'','','','','',0,'','','',0,'','','','','','',0,'','',''),('','','','','','',0,'','','','','',0,'','','',0,'','','','','','',0,'','',''),('','','','','','',0,'','','','','',0,'','','',0,'','','','','','',0,'','',''),('','','','','','',0,'','','','','',0,'','','',0,'','','','','','',0,'','','');
/*!40000 ALTER TABLE `staffqualificationdetails` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `stand1000`
--

DROP TABLE IF EXISTS `stand1000`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `stand1000` (
  `recordid` bigint unsigned NOT NULL AUTO_INCREMENT,
  `crdr` varchar(50) DEFAULT NULL,
  `remarks` varchar(200) DEFAULT NULL,
  `currentdate` date DEFAULT NULL,
  `amount` double DEFAULT NULL,
  `balance` double DEFAULT NULL,
  PRIMARY KEY (`recordid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `stand1000`
--

LOCK TABLES `stand1000` WRITE;
/*!40000 ALTER TABLE `stand1000` DISABLE KEYS */;
/*!40000 ALTER TABLE `stand1000` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `studattendencemark`
--

DROP TABLE IF EXISTS `studattendencemark`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `studattendencemark` (
  `attendenceid` int NOT NULL AUTO_INCREMENT,
  `intake` text NOT NULL,
  `coursecode` varchar(50) NOT NULL DEFAULT '',
  `present` text NOT NULL,
  `absent` text NOT NULL,
  `leavereason` text NOT NULL,
  `date` date DEFAULT NULL,
  `subjectcode` varchar(50) DEFAULT NULL,
  `section` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`attendenceid`)
) ENGINE=MyISAM AUTO_INCREMENT=66 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `studattendencemark`
--

LOCK TABLES `studattendencemark` WRITE;
/*!40000 ALTER TABLE `studattendencemark` DISABLE KEYS */;
INSERT INTO `studattendencemark` VALUES (41,'Aug2008','EEE','*Aug2008EEE67*','*Aug2008EEE57*','*1*','2008-09-03','ENG105','A'),(40,'Aug2008','EEE','*Aug2008EEE57*','*Aug2008EEE67*','*1*','2008-08-27','ENG105','A'),(65,'Aug2008','EEE','15*25','*','*','2008-09-17','ENG107','A');
/*!40000 ALTER TABLE `studattendencemark` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `student`
--

DROP TABLE IF EXISTS `student`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `student` (
  `recordid` bigint NOT NULL AUTO_INCREMENT,
  `studentid` varchar(20) NOT NULL DEFAULT '',
  `studentpwd` varchar(20) DEFAULT NULL,
  `studentname` varchar(50) DEFAULT NULL,
  `intake` varchar(15) DEFAULT NULL,
  `nextintake` varchar(10) DEFAULT NULL,
  `levelofeducation` varchar(30) DEFAULT NULL,
  `mailid` varchar(50) DEFAULT NULL,
  `coursecode` varchar(50) NOT NULL DEFAULT '',
  `section` char(1) DEFAULT NULL,
  `countryresidence` varchar(30) DEFAULT NULL,
  `addreassline1` varchar(220) DEFAULT NULL,
  `addressline2` varchar(220) DEFAULT NULL,
  `postcode` varchar(8) DEFAULT NULL,
  `citizenof` varchar(8) DEFAULT NULL,
  `phonenumber` varchar(30) DEFAULT NULL,
  `mobilenumber` varchar(25) DEFAULT NULL,
  `faxnumber` varchar(30) DEFAULT NULL,
  `dateofbirth` date DEFAULT NULL,
  `passportnumber` varchar(30) DEFAULT NULL,
  `course1` varchar(50) DEFAULT NULL,
  `institute1` varchar(50) DEFAULT NULL,
  `duration1` int DEFAULT NULL,
  `grade1` char(2) DEFAULT NULL,
  `course2` varchar(50) DEFAULT NULL,
  `institute2` varchar(50) DEFAULT NULL,
  `duration2` int DEFAULT NULL,
  `grade2` char(2) DEFAULT NULL,
  `employer1` varchar(50) DEFAULT NULL,
  `designation1` varchar(45) DEFAULT NULL,
  `startdate1` date DEFAULT NULL,
  `enddate1` date DEFAULT NULL,
  `employer2` varchar(50) DEFAULT NULL,
  `designation2` varchar(45) DEFAULT NULL,
  `startdate2` date DEFAULT NULL,
  `enddate2` date DEFAULT NULL,
  `refname1` varchar(50) DEFAULT NULL,
  `refoccupation1` varchar(45) DEFAULT NULL,
  `refinstitution1` varchar(50) DEFAULT NULL,
  `refrelationship1` varchar(45) DEFAULT NULL,
  `refphonenumber1` varchar(30) DEFAULT NULL,
  `refemail1` varchar(80) DEFAULT NULL,
  `refname2` varchar(50) DEFAULT NULL,
  `refoccupation2` varchar(45) DEFAULT NULL,
  `refinstitution2` varchar(50) DEFAULT NULL,
  `refrelationship2` varchar(45) DEFAULT NULL,
  `refphonenumber2` varchar(30) DEFAULT NULL,
  `refemail2` varchar(80) DEFAULT NULL,
  `transferbranch` varchar(15) DEFAULT NULL,
  `courseamount` double DEFAULT NULL,
  `feepaid` double DEFAULT NULL,
  `fine` double DEFAULT NULL,
  `examfee` double DEFAULT NULL,
  `visa` tinyint DEFAULT NULL,
  `englishclass` tinyint DEFAULT NULL,
  `discontinued` tinyint DEFAULT NULL,
  `agentid` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`recordid`,`studentid`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `student`
--

LOCK TABLES `student` WRITE;
/*!40000 ALTER TABLE `student` DISABLE KEYS */;
INSERT INTO `student` VALUES (14,'Aug2008MECH56','x4TQEB','Mr.karthik Ramalingam','Aug2008','Aug2008','Level1','karthikfriend@gmail.com','MECH','A','IND','Old Mahabalipuram road, Jeppiaar Nagr, Chennai','','600119','IND','24500640','9888844444','24500640','1982-02-08','PASS789','SSLC','Govt.Hr.Sec School',10,'B','+2','Govt.Hr.Sec School',10,'B','','',NULL,NULL,'','',NULL,NULL,'Paul Edward','Employee','Jeppiaar Technologies','Friends','9888855555','paul@gmail.com','','','','','','','MECH',450,420,0,0,1,0,1,'SA'),(15,'Aug2008EEE57','w9Iajb','Mr.Karthik Vimalraj','Aug2008','Aug2008','Level1','karthi@gmail.com','EEE','A','IND','Old Mahabalipuram road, Jeppiaar Nagr, Chennai','','600119','IND','24500640','9888844444','24500640','1982-02-08','PASS789','SSLC','Govt.Hr.Sec School',10,'B','+2','Govt.Hr.Sec School',10,'B','','',NULL,NULL,'','',NULL,NULL,'Paul Edward','Employee','Jeppiaar Technologies','Friends','9888855555','paul@gmail.com','','','','','','','EEE',67,67,0,0,1,0,1,'MUK01'),(16,'Aug2008ECE58','iKCKPK','Mr.Daniel Samraj','Aug2008','Aug2008','Level1','danie@gmail.com','ECE','A','IND','Old Mahabalipuram road, Jeppiaar Nagr, Chennai','','600119','IND','24500640','9888844444','24500640','1982-02-08','PASS789','SSLC','Govt.Hr.Sec School',10,'B','+2','Govt.Hr.Sec School',10,'B','','',NULL,NULL,'','',NULL,NULL,'Paul Edward','Employee','Jeppiaar Technologies','Friends','9888855555','paul@gmail.com','','','','','','','ECE',4.7,4.7,0,0,1,0,1,'JAN14'),(17,'Aug2008IT59','k2n00Q','Mr.Omkarnath Tiwary','Aug2008','Aug2008','Level2','omkarnat@gmail.com','IT','A','AF','Old Mahabalipuram road, Jeppiaar Nagr, Chennai','','600119','AF','24500640','9888844444','24500640','1982-02-08','PASS789','SSLC','Govt.Hr.Sec School',10,'B','+2','Govt.Hr.Sec School',10,'B','','',NULL,NULL,'','',NULL,NULL,'Paul Edward','Employee','Jeppiaar Technologies','Friends','9888855555','paul@gmail.com','','','','','','','IT',23,22,0,0,1,0,1,'SSM58'),(18,'Aug2008MCA60','6IFPYN','Mr.Tarun Kumar','Aug2008','Aug2008','Level2','taru@gmail.com','MCA','A','AN','Old Mahabalipuram road, Jeppiaar Nagr, Chennai','','600119','AN','24500640','9888844444','24500640','1982-02-08','PASS789','SSLC','Govt.Hr.Sec School',10,'B','+2','Govt.Hr.Sec School',10,'B','','',NULL,NULL,'','',NULL,NULL,'Paul Edward','Employee','Jeppiaar Technologies','Friends','9888855555','paul@gmail.com','','','','','','','MCA',20000,19000,0,0,1,0,1,'FGH76'),(19,'Aug2008MECH61','dOYyqo','Mr.Mahesh','Aug2008','Aug2008','Level1','karthikfrien@gmail.com','MECH','A','BG','Old Mahabalipuram road, Jeppiaar Nagr, Chennai','','600119','BG','24500640','9888844444','24500640','1982-02-08','PASS789','SSLC','Govt.Hr.Sec School',10,'B','+2','Govt.Hr.Sec School',10,'B','','',NULL,NULL,'','',NULL,NULL,'Paul Edward','Employee','Jeppiaar Technologies','Friends','9888855555','paul@gmail.com','','','','','','','MECH',450,450,0,0,1,0,1,'SWE45'),(20,'Aug2008EEE62','kakv4u','Mr.Alex Pandien','Aug2008','Aug2008','Level1','karth@gmail.com','EEE','A','DN','Old Mahabalipuram road, Jeppiaar Nagr, Chennai','','600119','DN','24500640','9888844444','24500640','1982-02-08','PASS789','SSLC','Govt.Hr.Sec School',10,'B','+2','Govt.Hr.Sec School',10,'B','','',NULL,NULL,'','',NULL,NULL,'Paul Edward','Employee','Jeppiaar Technologies','Friends','9888855555','paul@gmail.com','','','','','','','EEE',67,66,0,0,1,0,1,'MUK01'),(21,'Aug2008ECE63','pRdiXY','Mr.Srijith','Aug2008','Aug2008','Level1','dani@gmail.com','ECE','A','GA','Old Mahabalipuram road, Jeppiaar Nagr, Chennai','','600119','GA','24500640','9888844444','24500640','1982-02-08','PASS789','SSLC','Govt.Hr.Sec School',10,'B','+2','Govt.Hr.Sec School',10,'B','','',NULL,NULL,'','',NULL,NULL,'Paul Edward','Employee','Jeppiaar Technologies','Friends','9888855555','paul@gmail.com','','','','','','','ECE',4.7,4.7,0,0,1,0,1,'MAH14'),(22,'Aug2008IT64','DS5JuR','Mr.Senthil Kumar','Aug2008','Aug2008','Level2','omkarna@gmail.com','IT','A','KAZ','Old Mahabalipuram road, Jeppiaar Nagr, Chennai','','600119','KAZ','24500640','9888844444','24500640','1982-02-08','PASS789','SSLC','Govt.Hr.Sec School',10,'B','+2','Govt.Hr.Sec School',10,'B','','',NULL,NULL,'','',NULL,NULL,'Paul Edward','Employee','Jeppiaar Technologies','Friends','9888855555','paul@gmail.com','','','','','','','IT',23,23,0,0,1,0,1,'DER56'),(23,'Aug2008MCA65','nioFfL','Mr.Sahji','Aug2008','Aug2008','Level2','tar@gmail.com','MCA','A','VAT','Old Mahabalipuram road, Jeppiaar Nagr, Chennai','','600119','VAT','24500640','9888844444','24500640','1982-02-08','PASS789','SSLC','Govt.Hr.Sec School',10,'B','+2','Govt.Hr.Sec School',10,'B','','',NULL,NULL,'','',NULL,NULL,'Paul Edward','Employee','Jeppiaar Technologies','Friends','9888855555','paul@gmail.com','','','','','','','MCA',20000,20000,0,0,1,0,1,'FGH76'),(24,'Aug2008MECH66','83VmL0','Mr.Manika Sudar','Aug2008','Aug2008','Level1','karthikfrie@gmail.com','MECH','A','SKN','Old Mahabalipuram road, Jeppiaar Nagr, Chennai','','600119','SKN','24500640','9888844444','24500640','1982-02-08','PASS789','SSLC','Govt.Hr.Sec School',10,'B','+2','Govt.Hr.Sec School',10,'B','','',NULL,NULL,'','',NULL,NULL,'Paul Edward','Employee','Jeppiaar Technologies','Friends','9888855555','paul@gmail.com','','','','','','','MECH',450,450,0,0,1,0,1,'JAN14'),(25,'Aug2008EEE67','TromQh','Mr.Justin Doss','Aug2008','Aug2008','Level1','kart@gmail.com','EEE','A','TI','Old Mahabalipuram road, Jeppiaar Nagr, Chennai','','600119','TI','24500640','9888844444','24500640','1982-02-08','PASS789','SSLC','Govt.Hr.Sec School',10,'B','+2','Govt.Hr.Sec School',10,'B','','',NULL,NULL,'','',NULL,NULL,'Paul Edward','Employee','Jeppiaar Technologies','Friends','9888855555','paul@gmail.com','','','','','','','EEE',67,67,0,0,1,0,1,'SWE45'),(26,'Aug2008ECE68','dvwd5d','Mr.Ramesh','Aug2008','Aug2008','Level1','dan@gmail.com','ECE','A','LOA','Old Mahabalipuram road, Jeppiaar Nagr, Chennai','','600119','LOA','24500640','9888844444','24500640','1982-02-08','PASS789','SSLC','Govt.Hr.Sec School',10,'B','+2','Govt.Hr.Sec School',10,'B','','',NULL,NULL,'','',NULL,NULL,'Paul Edward','Employee','Jeppiaar Technologies','Friends','9888855555','paul@gmail.com','','','','','','','ECE',4.7,4.7,0,0,1,0,1,'MUK01'),(27,'Aug2008IT69','ruQVbX','Mr.Babu','Aug2008','Aug2008','Level2','omkarn@gmail.com','IT','A','CM','Old Mahabalipuram road, Jeppiaar Nagr, Chennai','','600119','CM','24500640','9888844444','24500640','1982-02-08','PASS789','SSLC','Govt.Hr.Sec School',10,'B','+2','Govt.Hr.Sec School',10,'B','','',NULL,NULL,'','',NULL,NULL,'Paul Edward','Employee','Jeppiaar Technologies','Friends','9888855555','paul@gmail.com','','','','','','','IT',23,23,0,0,1,0,1,'SSM58'),(28,'Aug2008MCA70','Ypvi7Y','Mr.John Berkman','Aug2008','Aug2008','Level2','ta@gmail.com','MCA','A','GA','Old Mahabalipuram road, Jeppiaar Nagr, Chennai','','600119','GA','24500640','9888844444','24500640','1982-02-08','PASS789','SSLC','Govt.Hr.Sec School',10,'B','+2','Govt.Hr.Sec School',10,'B','','',NULL,NULL,'','',NULL,NULL,'Paul Edward','Employee','Jeppiaar Technologies','Friends','9888855555','paul@gmail.com','','','','','','','MCA',20000,20000,0,0,1,0,1,'MUK01');
/*!40000 ALTER TABLE `student` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `studentfinanace`
--

DROP TABLE IF EXISTS `studentfinanace`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `studentfinanace` (
  `recordid` bigint NOT NULL AUTO_INCREMENT,
  `studentid` varchar(50) DEFAULT NULL,
  `registrationid` varchar(50) DEFAULT NULL,
  `studentname` varchar(50) DEFAULT NULL,
  `branchname` varchar(50) DEFAULT NULL,
  `intake` varchar(50) DEFAULT NULL,
  `totalfeeamount` float DEFAULT NULL,
  `initialdeposit` float DEFAULT NULL,
  `nextpaydate` date DEFAULT NULL,
  `dueamount` float DEFAULT NULL,
  `balance` float DEFAULT NULL,
  `fineamount` float DEFAULT NULL,
  `exambookfee` float DEFAULT NULL,
  `transferofbranch` varchar(50) DEFAULT NULL,
  `discontinued` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`recordid`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `studentfinanace`
--

LOCK TABLES `studentfinanace` WRITE;
/*!40000 ALTER TABLE `studentfinanace` DISABLE KEYS */;
INSERT INTO `studentfinanace` VALUES (11,'1','1','Mr.balaji Ram Ram','matric','2008-02-08',25000,5000,NULL,20000,20000,0,0,'no','no'),(12,'2','1','Mr.balaji Ram Ram','UG','2008-02-08',25000,10000,NULL,15000,15000,0,0,'no','no'),(13,'9','8','Mr.balaji Ram Ram','matric','2008-02-08',25000,4350,NULL,20650,20650,0,0,'no','no'),(14,'10','9','Mr.omkar nath tiwary','UG','2008-02-26',25000,5600,NULL,19400,19400,0,0,'no','no'),(15,'11','10','Mr.balaji Ram Ram','UG','2008-02-08',25000,11000,NULL,14000,14000,0,0,'no','no'),(16,'12','11','Mr.balaji Ram Ram','UG','2008-02-08',25000,1000,NULL,24000,24000,0,0,'no','no'),(17,'13','12','Mr.balaji Ram Ram','matric','2008-02-08',25000,20000,NULL,5000,5000,0,0,'no','no'),(18,'18','7','Mr.balaji Ram Ram','UG','2008-02-08',25000,1100,NULL,23900,23900,0,0,'no','no'),(19,'19','8','Mr.balaji Ram Ram','matric','2008-02-08',25000,1100,NULL,23900,23900,0,0,'no','no'),(20,'20','9','Mr.balaji Ram Ram','matric','2008-02-08',25000,0,NULL,25000,25000,0,0,'no','no'),(21,'1','1','Mr.balaji Ram Ram','matric','2008-02-08',25000,0,NULL,25000,25000,0,0,'','no'),(22,'2','1','Mr.balaji Ram Ram','UG','2008-02-08',25000,0,NULL,25000,25000,0,0,'','no'),(23,'9','8','Mr.balaji Ram Ram','matric','2008-02-08',25000,0,NULL,25000,25000,0,0,'','no'),(24,'10','9','Mr.omkar nath tiwary','UG','2008-02-26',25000,0,NULL,25000,25000,0,0,'','no'),(25,'11','10','Mr.balaji Ram Ram','UG','2008-02-08',25000,0,NULL,25000,25000,0,0,'','no'),(26,'12','11','Mr.balaji Ram Ram','UG','2008-02-08',25000,0,NULL,25000,25000,0,0,'','no'),(27,'13','12','Mr.balaji Ram Ram','matric','2008-02-08',25000,0,NULL,25000,25000,0,0,'','no'),(28,'18','7','Mr.balaji Ram Ram','UG','2008-02-08',25000,0,NULL,25000,25000,0,0,'','no'),(29,'19','8','Mr.balaji Ram Ram','matric','2008-02-08',25000,0,NULL,25000,25000,0,0,'','no'),(30,'20','9','Mr.balaji Ram Ram','matric','2008-02-08',25000,0,NULL,25000,25000,0,0,'','no'),(31,'21','10','.','','',0,0,NULL,0,0,0,0,'no','0'),(32,'22','11','Mr.sonu nath tiwary','IT','2008-02-11',15000,3400,NULL,11600,11600,0,0,'yes','0');
/*!40000 ALTER TABLE `studentfinanace` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `studentsubject`
--

DROP TABLE IF EXISTS `studentsubject`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `studentsubject` (
  `recordid` bigint NOT NULL AUTO_INCREMENT,
  `studentid` varchar(15) DEFAULT NULL,
  `subjectcode` varchar(15) DEFAULT NULL,
  `termno` int DEFAULT NULL,
  `mark` int DEFAULT NULL,
  `reason` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`recordid`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `studentsubject`
--

LOCK TABLES `studentsubject` WRITE;
/*!40000 ALTER TABLE `studentsubject` DISABLE KEYS */;
INSERT INTO `studentsubject` VALUES (6,'Aug2008ECE58','ENG103',2,91,'ECE'),(7,'Aug2008EEE62','EEE601',1,71,'EEE');
/*!40000 ALTER TABLE `studentsubject` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `subjectcreditdetails`
--

DROP TABLE IF EXISTS `subjectcreditdetails`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `subjectcreditdetails` (
  `SubjectCreditId` int NOT NULL AUTO_INCREMENT,
  `SubjectCode` varchar(20) NOT NULL DEFAULT '',
  `SubjectName` varchar(100) DEFAULT NULL,
  `NormalCredit` int NOT NULL DEFAULT '0',
  `EctsCredit` int DEFAULT NULL,
  `CourseCode` varchar(10) NOT NULL DEFAULT '',
  `TermNumber` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`SubjectCreditId`,`SubjectCode`)
) ENGINE=MyISAM AUTO_INCREMENT=145 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `subjectcreditdetails`
--

LOCK TABLES `subjectcreditdetails` WRITE;
/*!40000 ALTER TABLE `subjectcreditdetails` DISABLE KEYS */;
INSERT INTO `subjectcreditdetails` VALUES (74,'EEE502','',2,10,'ECE',1),(75,'EEE503','Field Theory',4,3,'EEE',2),(76,'EEE601','Analog & Digital Electronics',45,2,'EEE',1),(77,'EEE604','Electrical Energy Systems',5,3,'EEE',6),(78,'EEE702','Power Electronics',5,3,'EEE',7),(79,'EEE703','Control Systems',5,4,'EEE',7),(80,'EEE801','Industrial Engineering',10,5,'EEE',8),(81,'EEE805','CAD/CAM',5,3,'EEE',8),(82,'ME331','Design of Machine Elements',2,4,'MECH',1),(83,'ME335','Computer Aided Design',4,23,'MECH',1),(84,'MF331','Engineering Metrology',45,2,'MECH',2),(85,'ME336','Dynamics Lab',5,0,'MECH',2),(86,'ME337','Thermal Engineering Laboratory I',5,3,'MECH',3),(87,'ME338','Computer Aided Manufacturing',5,4,'MECH',3),(88,'ME339','Design of Jigs, Fixtures and Press Tools',10,5,'MECH',4),(89,'ME340','Heat and Mass Transfer',5,3,'MECH',4),(90,'ME341','Hydraulic and Pneumatic Controls',2,4,'MECH',5),(91,'ME342','Design of Transmission Systems',4,23,'MECH',5),(92,'ME343','CAM Laboratory',45,2,'MECH',6),(93,'ME344','Thermal Engineering Laboratory II',5,0,'MECH',6),(94,'CE071','Principles of Environmental Science and Engineering',5,3,'MECH',7),(95,'GE035','Power Plant Engineering',5,4,'MECH',7),(96,'ME433','Mechatronics',10,5,'MECH',8),(97,'ME434','Microprocessor Lab',5,3,'MECH',8),(98,'ENG103','Engineering Mechanics',2,4,'ECE',1),(99,'ENG104','Engineering Graphics',4,23,'ECE',1),(100,'ENG106','Engineering Physics',45,2,'ECE',2),(101,'ENG107','Engineering Chemistry',5,0,'ECE',2),(102,'ECE302','Electrical Circuits and Network Theory',5,3,'ECE',3),(103,'ECE305','Solid State Devices',5,4,'ECE',3),(104,'ECE403','Electronic Circuits',10,5,'ECE',4),(105,'ECE405','Digital Electronics',5,3,'ECE',4),(106,'ECE503','Linear Integrated Circuits',2,4,'ECE',5),(107,'ECE504','Electromagnetic Theory',4,23,'ECE',5),(108,'ECE603','Integrated Circuit Technology',45,2,'ECE',6),(109,'ECE604','Microwave Engineering',5,0,'ECE',6),(110,'ECE702','Radiation and Propagation',5,3,'ECE',7),(111,'ECE704','Electronic Instrumentation',5,4,'ECE',7),(112,'ECE802','Modern Communication Systems',10,5,'ECE',8),(113,'ECE803','Radar and Navigation Aids',5,3,'ECE',8),(114,'MA533','Mathematical Foundations of Computer Science',2,4,'MCA',1),(115,'MC503','Data Structures',4,23,'MCA',1),(116,'MC502','Data Communication and Networking',45,2,'MCA',2),(117,'MC506','Operating System',5,0,'MCA',2),(118,'MC601','Data Base System Concepts',5,3,'MCA',3),(119,'MC605','Software Engineering',5,4,'MCA',3),(120,'MC602','Unix and Network Programming',10,5,'MCA',4),(121,'MC608','Multimedia Systems',5,3,'MCA',4),(122,'MC701','Programming in ASP .Net',2,4,'MCA',5),(123,'MC703','Distributed Date Base Systems',4,23,'MCA',5),(124,'MC705','Web Technology',45,2,'MCA',6),(125,'MC606','Advanced Java Programming',5,0,'MCA',6),(126,'C107','ENGINEERING DRAWING',2,4,'IT',1),(127,'C108','WORKSHOP PRACTICE',4,23,'IT',1),(128,'C206','ENGINEERING MECHANICS',45,2,'IT',2),(129,'IT033','Data structures & Algorithms',5,0,'IT',2),(130,'IT034','Digital Techniques',5,3,'IT',3),(131,'IT031','Discrete mathematics',5,4,'IT',3),(132,'IT041','Numerical Techniques',10,5,'IT',4),(133,'IT045','Database Management System',5,3,'IT',4),(134,'IT051','Probability Theory & its application',2,4,'IT',5),(135,'IT056','Software Engineering',4,23,'IT',5),(136,'IT061','Data Communication',45,2,'IT',6),(137,'IT062','Computer Graphics',5,0,'IT',6),(138,'IT071','Engineering Economics & Management',2,4,'IT',7),(139,'IT072','Graph Theory & Applications',4,23,'IT',7),(140,'IT081','High speed Networks',45,2,'IT',8),(141,'IT082','Distributed Computing',5,0,'IT',8),(144,'DSA','Gf',4,34,'NAT',0);
/*!40000 ALTER TABLE `subjectcreditdetails` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `timetablesettings`
--

DROP TABLE IF EXISTS `timetablesettings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `timetablesettings` (
  `SettingsId` int NOT NULL AUTO_INCREMENT,
  `TimeTableName` varchar(30) DEFAULT NULL,
  `Intake` varchar(50) DEFAULT NULL,
  `CourseCode` varchar(20) NOT NULL DEFAULT '',
  `FromDate` date DEFAULT NULL,
  `ToDate` date DEFAULT NULL,
  `FromDay` varchar(30) DEFAULT NULL,
  `ToDay` varchar(30) DEFAULT NULL,
  `NumberOfSlots` int NOT NULL DEFAULT '0',
  `FromTime1` varchar(50) DEFAULT NULL,
  `ToTime1` varchar(50) DEFAULT NULL,
  `FromTime2` varchar(50) DEFAULT NULL,
  `ToTime2` varchar(50) DEFAULT NULL,
  `FromTime3` varchar(50) DEFAULT NULL,
  `ToTime3` varchar(50) DEFAULT NULL,
  `FromTime4` varchar(50) DEFAULT NULL,
  `ToTime4` varchar(50) DEFAULT NULL,
  `FromTime5` varchar(50) DEFAULT NULL,
  `ToTime5` varchar(50) DEFAULT NULL,
  `FromTime6` varchar(50) DEFAULT NULL,
  `ToTime6` varchar(50) DEFAULT NULL,
  `FromTime7` varchar(50) DEFAULT NULL,
  `ToTime7` varchar(50) DEFAULT NULL,
  `FromTime8` varchar(50) DEFAULT NULL,
  `ToTime8` varchar(50) DEFAULT NULL,
  `FromTime9` varchar(50) DEFAULT NULL,
  `ToTime9` varchar(50) DEFAULT NULL,
  `FromTime10` varchar(50) DEFAULT NULL,
  `ToTime10` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`SettingsId`)
) ENGINE=MyISAM AUTO_INCREMENT=91 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `timetablesettings`
--

LOCK TABLES `timetablesettings` WRITE;
/*!40000 ALTER TABLE `timetablesettings` DISABLE KEYS */;
INSERT INTO `timetablesettings` VALUES (90,'SRINI','Aug2008','MECH','2008-08-20','2009-03-20','Monday','Saturday',3,'8:00','8:45','9:00','9:45','10:00','10:45','','','','','','','','','','','','','',''),(89,'SRINI','Aug2008','EEE','2008-08-20','2009-03-20','Monday','Saturday',3,'8:00','8:45','9:00','9:45','10:00','10:45','','','','','','','','','','','','','','');
/*!40000 ALTER TABLE `timetablesettings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `universitydetails`
--

DROP TABLE IF EXISTS `universitydetails`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `universitydetails` (
  `UniversityId` int NOT NULL AUTO_INCREMENT,
  `UniversityCode` varchar(5) NOT NULL DEFAULT '',
  `UniversityName` varchar(100) DEFAULT NULL,
  `UniversityAddress` varchar(250) NOT NULL DEFAULT '',
  `UniversityState` varchar(50) DEFAULT NULL,
  `CountryId` int NOT NULL DEFAULT '0',
  `UniversityPincode` varchar(50) DEFAULT NULL,
  `UniversityPhoneNumber` varchar(50) DEFAULT NULL,
  `UniversityFaxNumber` varchar(50) DEFAULT NULL,
  `UniversityMailId` varchar(50) DEFAULT NULL,
  `UniversityWebsiteName` varchar(50) DEFAULT NULL,
  `ContactPersonName` varchar(50) DEFAULT NULL,
  `ContactPersonMailId` varchar(50) DEFAULT NULL,
  `ContactPersonPhoneNumber` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`UniversityId`),
  KEY `UniversityName` (`UniversityName`)
) ENGINE=MyISAM AUTO_INCREMENT=126 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `universitydetails`
--

LOCK TABLES `universitydetails` WRITE;
/*!40000 ALTER TABLE `universitydetails` DISABLE KEYS */;
INSERT INTO `universitydetails` VALUES (124,'SSM58','MADRAS UNIVERSITY','CHENNAI','Fg',23,'7676','5554','445','ssmQ@yaho.com','www.maduniv.com','Kk','sdas@jdf.vnv','988989898'),(125,'SATHY','ST MARY','CHENNA','TAMILNAD',23,'60011','83839','838839','SATHYAB@SATY.COM','www.google.co.in','Prabaka','PRAB@AS.CO','839390'),(99,'ANAU','Anna university','main street+++','TN',5,'23123123','2321312','32222','anna@yahoo.com','www.anna.com','ravi','anna@yahoo.com','2131231'),(1,'UKU','UK University','Sam1+Sam2+Sam3+Sam4','TN',23,'613501','2321312','32222','uk@yahoo.com','www.uk.com','Samraj','Sam@g.com','9876543'),(6,'SATU','Sathyabama University','line1+line2+line3+line4','TN',4,'613501','67890','999','Sat@yah.com','www.Sat.com','Samraj','Sam@g.com','9876543'),(96,'ANLU','Annamalai University','Sam1+Sam2+Sam3+Sam4','TamilNadu',19,'600012','67890','67890','Sam@g.com','www.sa.com','Samraj','Sam@g.com','9876543');
/*!40000 ALTER TABLE `universitydetails` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usercreation`
--

DROP TABLE IF EXISTS `usercreation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `usercreation` (
  `UserId` int NOT NULL AUTO_INCREMENT,
  `UserName` varchar(50) DEFAULT NULL,
  `Password` varchar(50) DEFAULT NULL,
  `UserType` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`UserId`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usercreation`
--

LOCK TABLES `usercreation` WRITE;
/*!40000 ALTER TABLE `usercreation` DISABLE KEYS */;
INSERT INTO `usercreation` VALUES (1,'sam','sam',1),(2,'srini','srini',1),(4,'karthi','karthi',1),(5,'rkarthi','rkarthi',3),(6,'tiwary','tiwary',1),(7,'raj','raj',2);
/*!40000 ALTER TABLE `usercreation` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usertypemaster`
--

DROP TABLE IF EXISTS `usertypemaster`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `usertypemaster` (
  `UserId` int NOT NULL AUTO_INCREMENT,
  `UserType` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`UserId`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usertypemaster`
--

LOCK TABLES `usertypemaster` WRITE;
/*!40000 ALTER TABLE `usertypemaster` DISABLE KEYS */;
INSERT INTO `usertypemaster` VALUES (1,'Admin'),(2,'Agent'),(3,'Student'),(5,'Aplicant'),(6,'Staff');
/*!40000 ALTER TABLE `usertypemaster` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-12-07  8:51:56
