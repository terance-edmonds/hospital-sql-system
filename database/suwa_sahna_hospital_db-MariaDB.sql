-- MySQL dump 10.13  Distrib 8.0.26, for Win64 (x86_64)
--
-- Host: localhost    Database: suwa_sahana_hospital_db
-- ------------------------------------------------------
-- Server version	8.0.26

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Temporary view structure for view `diagnose_view`
--

DROP TABLE IF EXISTS `diagnose_view`;
/*!50001 DROP VIEW IF EXISTS `diagnose_view`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `diagnose_view` AS SELECT 
 1 AS `diagnose_id`,
 1 AS `name`*/;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `diagnostics`
--

DROP TABLE IF EXISTS `diagnostics`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `diagnostics` (
  `diagnose_id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  PRIMARY KEY (`diagnose_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `doctor`
--

DROP TABLE IF EXISTS `doctor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `doctor` (
  `doctor_id` int NOT NULL,
  `dea_no` varchar(45) NOT NULL,
  `specialty_area` varchar(45) NOT NULL,
  PRIMARY KEY (`doctor_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Temporary view structure for view `doctor_view`
--

DROP TABLE IF EXISTS `doctor_view`;
/*!50001 DROP VIEW IF EXISTS `doctor_view`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `doctor_view` AS SELECT 
 1 AS `doctor_id`,
 1 AS `dea_no`,
 1 AS `specialty_area`*/;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `drug`
--

DROP TABLE IF EXISTS `drug`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `drug` (
  `drug_id` int NOT NULL AUTO_INCREMENT,
  `drug_type` varchar(45) NOT NULL,
  `drug_name` varchar(45) NOT NULL,
  `unit_cost` decimal(10,2) NOT NULL,
  PRIMARY KEY (`drug_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Temporary view structure for view `drug_view`
--

DROP TABLE IF EXISTS `drug_view`;
/*!50001 DROP VIEW IF EXISTS `drug_view`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `drug_view` AS SELECT 
 1 AS `drug_id`,
 1 AS `drug_type`,
 1 AS `drug_name`,
 1 AS `unit_cost`*/;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `employee`
--

DROP TABLE IF EXISTS `employee`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `employee` (
  `employee_id` int NOT NULL AUTO_INCREMENT,
  `employee_name` varchar(45) NOT NULL,
  `employee_address` varchar(45) NOT NULL,
  `working_status` varchar(45) NOT NULL,
  `contact_number` int NOT NULL,
  `category` varchar(45) NOT NULL,
  `role` varchar(45) NOT NULL,
  PRIMARY KEY (`employee_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Temporary view structure for view `employee_doctor_view`
--

DROP TABLE IF EXISTS `employee_doctor_view`;
/*!50001 DROP VIEW IF EXISTS `employee_doctor_view`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `employee_doctor_view` AS SELECT 
 1 AS `doctor_id`,
 1 AS `employee_name`,
 1 AS `contact_number`,
 1 AS `dea_no`,
 1 AS `specialty_area`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `employee_medical_view`
--

DROP TABLE IF EXISTS `employee_medical_view`;
/*!50001 DROP VIEW IF EXISTS `employee_medical_view`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `employee_medical_view` AS SELECT 
 1 AS `employee_id`,
 1 AS `medical_staff_id`,
 1 AS `employee_name`,
 1 AS `working_status`,
 1 AS `role`,
 1 AS `joined_date`,
 1 AS `resigned_date`,
 1 AS `mcr_number`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `employee_nonmedical_attendance_view`
--

DROP TABLE IF EXISTS `employee_nonmedical_attendance_view`;
/*!50001 DROP VIEW IF EXISTS `employee_nonmedical_attendance_view`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `employee_nonmedical_attendance_view` AS SELECT 
 1 AS `employee_id`,
 1 AS `non_medical_staff_id`,
 1 AS `employee_name`,
 1 AS `hourly_charge_rate`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `employee_nonmedical_view`
--

DROP TABLE IF EXISTS `employee_nonmedical_view`;
/*!50001 DROP VIEW IF EXISTS `employee_nonmedical_view`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `employee_nonmedical_view` AS SELECT 
 1 AS `employee_id`,
 1 AS `non_medical_staff_id`,
 1 AS `contract_no`,
 1 AS `employee_name`,
 1 AS `working_status`,
 1 AS `role`,
 1 AS `start_date`,
 1 AS `end_date`*/;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `employee_work_hours`
--

DROP TABLE IF EXISTS `employee_work_hours`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `employee_work_hours` (
  `work_hours_id` int NOT NULL AUTO_INCREMENT,
  `employee_id` varchar(45) NOT NULL,
  `work_hours_per_week` varchar(45) NOT NULL,
  `patient_care_unit_id` int NOT NULL,
  PRIMARY KEY (`work_hours_id`),
  KEY `patient_care_unit_id _idx` (`patient_care_unit_id`),
  CONSTRAINT `patient_care_unit_id` FOREIGN KEY (`patient_care_unit_id`) REFERENCES `patient_care_unit` (`patient_care_unit_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Temporary view structure for view `employee_work_hours_view`
--

DROP TABLE IF EXISTS `employee_work_hours_view`;
/*!50001 DROP VIEW IF EXISTS `employee_work_hours_view`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `employee_work_hours_view` AS SELECT 
 1 AS `work_hours_id`,
 1 AS `employee_id`,
 1 AS `work_hours_per_week`,
 1 AS `patient_care_unit_id`,
 1 AS `patient_care_unit_name`,
 1 AS `employee_name`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `employees_view`
--

DROP TABLE IF EXISTS `employees_view`;
/*!50001 DROP VIEW IF EXISTS `employees_view`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `employees_view` AS SELECT 
 1 AS `employee_id`,
 1 AS `employee_name`,
 1 AS `employee_address`,
 1 AS `working_status`,
 1 AS `contact_number`,
 1 AS `category`,
 1 AS `role`*/;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `medical_staff`
--

DROP TABLE IF EXISTS `medical_staff`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `medical_staff` (
  `medical_staff_id` int NOT NULL AUTO_INCREMENT,
  `joined_date` date NOT NULL,
  `resigned_date` varchar(45) DEFAULT NULL,
  `employee_id` int NOT NULL,
  `mcr_number` varchar(45) NOT NULL,
  PRIMARY KEY (`medical_staff_id`),
  UNIQUE KEY `employee_id_UNIQUE` (`employee_id`),
  KEY `employee_id1_idx` (`employee_id`),
  CONSTRAINT `employee_id1` FOREIGN KEY (`employee_id`) REFERENCES `employee` (`employee_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `non_medical_attendance`
--

DROP TABLE IF EXISTS `non_medical_attendance`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `non_medical_attendance` (
  `non_medial_attendance_id` int NOT NULL AUTO_INCREMENT,
  `employee_id` int NOT NULL,
  `hourly_charge_rate` decimal(10,2) NOT NULL,
  PRIMARY KEY (`non_medial_attendance_id`),
  KEY `employee_id_idx` (`employee_id`),
  CONSTRAINT `employee_id` FOREIGN KEY (`employee_id`) REFERENCES `employee` (`employee_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `non_medical_staff`
--

DROP TABLE IF EXISTS `non_medical_staff`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `non_medical_staff` (
  `non_medical_staff_id` int NOT NULL AUTO_INCREMENT,
  `contract_no` int NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `employee_id` int NOT NULL,
  PRIMARY KEY (`non_medical_staff_id`),
  KEY `employee_id2_idx` (`employee_id`),
  CONSTRAINT `employee_id2` FOREIGN KEY (`employee_id`) REFERENCES `employee` (`employee_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `patient`
--

DROP TABLE IF EXISTS `patient`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `patient` (
  `patient_id` int NOT NULL AUTO_INCREMENT,
  `patient_name` varchar(45) NOT NULL,
  `patient_dob` date NOT NULL,
  `patient_type` varchar(45) NOT NULL DEFAULT 'In Patient',
  PRIMARY KEY (`patient_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `patient_admit`
--

DROP TABLE IF EXISTS `patient_admit`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `patient_admit` (
  `patient_admit_id` int NOT NULL AUTO_INCREMENT,
  `patient_id` int NOT NULL,
  `ward_id` int NOT NULL,
  `doctor_id` int NOT NULL,
  `admit_datetime` datetime NOT NULL,
  `discharged_datetime` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`patient_admit_id`),
  KEY `patient_id_idx` (`patient_id`),
  KEY `ward_id_idx` (`ward_id`),
  KEY `doctor_id2_idx` (`doctor_id`),
  CONSTRAINT `doctor_id2` FOREIGN KEY (`doctor_id`) REFERENCES `employee` (`employee_id`),
  CONSTRAINT `patient_id2` FOREIGN KEY (`patient_id`) REFERENCES `patient` (`patient_id`),
  CONSTRAINT `ward_id1` FOREIGN KEY (`ward_id`) REFERENCES `ward` (`ward_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Temporary view structure for view `patient_admit_view`
--

DROP TABLE IF EXISTS `patient_admit_view`;
/*!50001 DROP VIEW IF EXISTS `patient_admit_view`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `patient_admit_view` AS SELECT 
 1 AS `patient_admit_id`,
 1 AS `patient_id`,
 1 AS `ward_id`,
 1 AS `doctor_id`,
 1 AS `admit_datetime`,
 1 AS `discharged_datetime`,
 1 AS `patient_name`*/;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `patient_care_unit`
--

DROP TABLE IF EXISTS `patient_care_unit`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `patient_care_unit` (
  `patient_care_unit_id` int NOT NULL AUTO_INCREMENT,
  `employee_id` int NOT NULL,
  `name` varchar(45) NOT NULL,
  `type` varchar(45) NOT NULL,
  PRIMARY KEY (`patient_care_unit_id`),
  UNIQUE KEY `employee_id_UNIQUE` (`employee_id`),
  KEY `employee_id1_idx` (`employee_id`),
  CONSTRAINT `employee_id3` FOREIGN KEY (`employee_id`) REFERENCES `employee` (`employee_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `patient_care_unit_staff`
--

DROP TABLE IF EXISTS `patient_care_unit_staff`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `patient_care_unit_staff` (
  `patient_care_unit_staff_id` int NOT NULL AUTO_INCREMENT,
  `patient_care_unit_id` int NOT NULL,
  `employee_id` int NOT NULL,
  PRIMARY KEY (`patient_care_unit_staff_id`),
  KEY `patient_care_unit1_idx` (`patient_care_unit_id`),
  KEY `employee_id1_idx` (`employee_id`),
  CONSTRAINT `employee_id4` FOREIGN KEY (`employee_id`) REFERENCES `employee` (`employee_id`),
  CONSTRAINT `patient_care_unit1` FOREIGN KEY (`patient_care_unit_id`) REFERENCES `patient_care_unit` (`patient_care_unit_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Temporary view structure for view `patient_care_unit_staff_view`
--

DROP TABLE IF EXISTS `patient_care_unit_staff_view`;
/*!50001 DROP VIEW IF EXISTS `patient_care_unit_staff_view`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `patient_care_unit_staff_view` AS SELECT 
 1 AS `patient_care_unit_staff_id`,
 1 AS `patient_care_unit_id`,
 1 AS `patient_care_unit_name`,
 1 AS `patient_care_unit_type`,
 1 AS `employee_id`,
 1 AS `employee_name`,
 1 AS `employee_role`,
 1 AS `employee_category`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `patient_care_unit_view`
--

DROP TABLE IF EXISTS `patient_care_unit_view`;
/*!50001 DROP VIEW IF EXISTS `patient_care_unit_view`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `patient_care_unit_view` AS SELECT 
 1 AS `patient_care_unit_id`,
 1 AS `patient_care_unit_name`,
 1 AS `patient_care_unit_type`,
 1 AS `employee_id`,
 1 AS `employee_name`,
 1 AS `employee_role`*/;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `patient_diagnose`
--

DROP TABLE IF EXISTS `patient_diagnose`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `patient_diagnose` (
  `patient_diagnose_id` int NOT NULL AUTO_INCREMENT,
  `patient_admit_id` int NOT NULL,
  `diagnose_id` int NOT NULL,
  `date_time` datetime NOT NULL,
  `description` longtext NOT NULL,
  PRIMARY KEY (`patient_diagnose_id`),
  KEY `patient_admit_id_idx` (`patient_admit_id`),
  KEY `diagnose_id_idx` (`diagnose_id`),
  CONSTRAINT `diagnose_id` FOREIGN KEY (`diagnose_id`) REFERENCES `diagnostics` (`diagnose_id`),
  CONSTRAINT `patient_admit_id` FOREIGN KEY (`patient_admit_id`) REFERENCES `patient_admit` (`patient_admit_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Temporary view structure for view `patient_diagnose_view`
--

DROP TABLE IF EXISTS `patient_diagnose_view`;
/*!50001 DROP VIEW IF EXISTS `patient_diagnose_view`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `patient_diagnose_view` AS SELECT 
 1 AS `patient_diagnose_id`,
 1 AS `patient_admit_id`,
 1 AS `diagnose_id`,
 1 AS `date_time`,
 1 AS `description`*/;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `patient_emergency_contact`
--

DROP TABLE IF EXISTS `patient_emergency_contact`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `patient_emergency_contact` (
  `patient_emg_id` int NOT NULL AUTO_INCREMENT,
  `patient_id` int NOT NULL,
  `pec_first_name` varchar(45) NOT NULL,
  `pec_last_name` varchar(45) NOT NULL,
  `pec_relationship` varchar(45) NOT NULL,
  `pec_address` varchar(45) NOT NULL,
  `pec_contact_no` int NOT NULL,
  PRIMARY KEY (`patient_emg_id`),
  KEY `patient_id_idx` (`patient_id`),
  CONSTRAINT `patient_id` FOREIGN KEY (`patient_id`) REFERENCES `patient` (`patient_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `patient_insurance`
--

DROP TABLE IF EXISTS `patient_insurance`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `patient_insurance` (
  `patient_insurance_id` int NOT NULL AUTO_INCREMENT,
  `patient_emg_id` int NOT NULL,
  `company_name` varchar(45) NOT NULL,
  `branch` varchar(45) NOT NULL,
  `subscriber_first_name` varchar(45) NOT NULL,
  `subscriber_last_name` varchar(45) NOT NULL,
  `subscriber_relationship` varchar(45) NOT NULL,
  `subscriber_address` varchar(45) NOT NULL,
  `subscriber_contact_no` int NOT NULL,
  PRIMARY KEY (`patient_insurance_id`),
  KEY `patient_emg_id_idx` (`patient_emg_id`),
  CONSTRAINT `patinet_emg_id` FOREIGN KEY (`patient_emg_id`) REFERENCES `patient_emergency_contact` (`patient_emg_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Temporary view structure for view `patient_insurance_view`
--

DROP TABLE IF EXISTS `patient_insurance_view`;
/*!50001 DROP VIEW IF EXISTS `patient_insurance_view`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `patient_insurance_view` AS SELECT 
 1 AS `patient_insurance_id`,
 1 AS `patient_emg_id`,
 1 AS `company_name`,
 1 AS `branch`,
 1 AS `subscriber_first_name`,
 1 AS `subscriber_last_name`,
 1 AS `subscriber_relationship`,
 1 AS `subscriber_address`,
 1 AS `subscriber_contact_no`,
 1 AS `patient_id`*/;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `patient_opd`
--

DROP TABLE IF EXISTS `patient_opd`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `patient_opd` (
  `patient_opd_id` int NOT NULL AUTO_INCREMENT,
  `patient_id` int NOT NULL,
  `arrival_datetime` datetime NOT NULL,
  PRIMARY KEY (`patient_opd_id`),
  KEY `patient_id1_idx` (`patient_id`),
  CONSTRAINT `patient_id3` FOREIGN KEY (`patient_id`) REFERENCES `patient` (`patient_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Temporary view structure for view `patient_opd_view`
--

DROP TABLE IF EXISTS `patient_opd_view`;
/*!50001 DROP VIEW IF EXISTS `patient_opd_view`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `patient_opd_view` AS SELECT 
 1 AS `patient_opd_id`,
 1 AS `patient_id`,
 1 AS `arrival_datetime`,
 1 AS `patient_name`*/;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `patient_visit`
--

DROP TABLE IF EXISTS `patient_visit`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `patient_visit` (
  `patient_visit_id` int NOT NULL AUTO_INCREMENT,
  `patient_id` int NOT NULL,
  `nurse_id` int NOT NULL,
  `weight` varchar(45) NOT NULL,
  `blood_pressure` varchar(45) NOT NULL,
  `pulse` varchar(45) NOT NULL,
  `temperature` varchar(45) NOT NULL,
  `symptoms` text NOT NULL,
  `date_time` datetime NOT NULL,
  PRIMARY KEY (`patient_visit_id`),
  KEY `patient_id_idx` (`patient_id`),
  KEY `nurse_id_idx` (`nurse_id`),
  CONSTRAINT `nurse_id` FOREIGN KEY (`nurse_id`) REFERENCES `employee` (`employee_id`),
  CONSTRAINT `patient_id_visit` FOREIGN KEY (`patient_id`) REFERENCES `patient` (`patient_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Temporary view structure for view `patient_visit_view`
--

DROP TABLE IF EXISTS `patient_visit_view`;
/*!50001 DROP VIEW IF EXISTS `patient_visit_view`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `patient_visit_view` AS SELECT 
 1 AS `patient_visit_id`,
 1 AS `patient_id`,
 1 AS `nurse_id`,
 1 AS `weight`,
 1 AS `blood_pressure`,
 1 AS `pulse`,
 1 AS `temperature`,
 1 AS `symptoms`,
 1 AS `date_time`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `patients_emergency_contacts_view`
--

DROP TABLE IF EXISTS `patients_emergency_contacts_view`;
/*!50001 DROP VIEW IF EXISTS `patients_emergency_contacts_view`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `patients_emergency_contacts_view` AS SELECT 
 1 AS `patient_emg_id`,
 1 AS `patient_id`,
 1 AS `pec_first_name`,
 1 AS `pec_last_name`,
 1 AS `pec_relationship`,
 1 AS `pec_address`,
 1 AS `pec_contact_no`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `patients_view`
--

DROP TABLE IF EXISTS `patients_view`;
/*!50001 DROP VIEW IF EXISTS `patients_view`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `patients_view` AS SELECT 
 1 AS `patient_id`,
 1 AS `patient_name`,
 1 AS `patient_dob`,
 1 AS `patient_type`*/;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `treatment`
--

DROP TABLE IF EXISTS `treatment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `treatment` (
  `treatment_id` int NOT NULL AUTO_INCREMENT,
  `doctor_id` int NOT NULL,
  `patient_id` int NOT NULL,
  `type` varchar(45) NOT NULL,
  `date_time` datetime NOT NULL,
  PRIMARY KEY (`treatment_id`),
  KEY `doctor_id_idx` (`doctor_id`),
  KEY `patient_id6_idx` (`patient_id`),
  CONSTRAINT `doctor_id` FOREIGN KEY (`doctor_id`) REFERENCES `doctor` (`doctor_id`),
  CONSTRAINT `patient_id6` FOREIGN KEY (`patient_id`) REFERENCES `patient` (`patient_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `treatment_drug`
--

DROP TABLE IF EXISTS `treatment_drug`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `treatment_drug` (
  `drug_test_id` int NOT NULL AUTO_INCREMENT,
  `treatment_id` int NOT NULL,
  `drug_id` int NOT NULL,
  `drug_cost` int NOT NULL,
  PRIMARY KEY (`drug_test_id`),
  KEY `treatment_id1_idx` (`treatment_id`),
  KEY `drug_id2_idx` (`drug_id`),
  CONSTRAINT `drug_id2` FOREIGN KEY (`drug_id`) REFERENCES `drug` (`drug_id`),
  CONSTRAINT `treatment_id1` FOREIGN KEY (`treatment_id`) REFERENCES `treatment` (`treatment_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Temporary view structure for view `treatment_drug_view`
--

DROP TABLE IF EXISTS `treatment_drug_view`;
/*!50001 DROP VIEW IF EXISTS `treatment_drug_view`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `treatment_drug_view` AS SELECT 
 1 AS `drug_test_id`,
 1 AS `drug_id`,
 1 AS `drug_cost`,
 1 AS `treatment_id`,
 1 AS `type`*/;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `treatment_test`
--

DROP TABLE IF EXISTS `treatment_test`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `treatment_test` (
  `test_id` int NOT NULL AUTO_INCREMENT,
  `test_name` varchar(45) NOT NULL,
  `test_cost` decimal(10,2) NOT NULL,
  `treatment_id` int NOT NULL,
  PRIMARY KEY (`test_id`),
  KEY `treatment_id_idx` (`treatment_id`),
  CONSTRAINT `treatment_id` FOREIGN KEY (`treatment_id`) REFERENCES `treatment` (`treatment_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Temporary view structure for view `treatment_test_view`
--

DROP TABLE IF EXISTS `treatment_test_view`;
/*!50001 DROP VIEW IF EXISTS `treatment_test_view`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `treatment_test_view` AS SELECT 
 1 AS `test_id`,
 1 AS `test_name`,
 1 AS `test_cost`,
 1 AS `treatment_id`,
 1 AS `type`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `treatment_view`
--

DROP TABLE IF EXISTS `treatment_view`;
/*!50001 DROP VIEW IF EXISTS `treatment_view`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `treatment_view` AS SELECT 
 1 AS `treatment_id`,
 1 AS `doctor_id`,
 1 AS `patient_id`,
 1 AS `type`,
 1 AS `date_time`*/;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(45) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username_UNIQUE` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `vendors`
--

DROP TABLE IF EXISTS `vendors`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `vendors` (
  `vendor_id` int NOT NULL AUTO_INCREMENT,
  `vendor_name` varchar(45) NOT NULL,
  `vendor_address` varchar(45) NOT NULL,
  `vendor_contact_no` int NOT NULL,
  `vendor_register_no` int NOT NULL,
  PRIMARY KEY (`vendor_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `vendors_drug`
--

DROP TABLE IF EXISTS `vendors_drug`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `vendors_drug` (
  `vendors_drug_id` int NOT NULL AUTO_INCREMENT,
  `vendor_id` int NOT NULL,
  `drug_id` int NOT NULL,
  `quantity` int NOT NULL,
  `supplied_date` date NOT NULL,
  PRIMARY KEY (`vendors_drug_id`),
  KEY `vendor_id_idx` (`vendor_id`),
  KEY `drug_id1_idx` (`drug_id`),
  CONSTRAINT `drug_id1` FOREIGN KEY (`drug_id`) REFERENCES `drug` (`drug_id`),
  CONSTRAINT `vendor_id` FOREIGN KEY (`vendor_id`) REFERENCES `vendors` (`vendor_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Temporary view structure for view `vendors_drug_view`
--

DROP TABLE IF EXISTS `vendors_drug_view`;
/*!50001 DROP VIEW IF EXISTS `vendors_drug_view`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `vendors_drug_view` AS SELECT 
 1 AS `vendors_drug_id`,
 1 AS `vendor_id`,
 1 AS `vendor_name`,
 1 AS `drug_id`,
 1 AS `drug_name`,
 1 AS `drug_unit_cost`,
 1 AS `quantity`,
 1 AS `supplied_date`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `vendors_view`
--

DROP TABLE IF EXISTS `vendors_view`;
/*!50001 DROP VIEW IF EXISTS `vendors_view`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `vendors_view` AS SELECT 
 1 AS `vendor_id`,
 1 AS `vendor_name`,
 1 AS `vendor_address`,
 1 AS `vendor_contact_no`,
 1 AS `vendor_register_no`*/;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `ward`
--

DROP TABLE IF EXISTS `ward`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ward` (
  `ward_id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  PRIMARY KEY (`ward_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `ward_bed`
--

DROP TABLE IF EXISTS `ward_bed`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ward_bed` (
  `ward_bed_id` int NOT NULL AUTO_INCREMENT,
  `ward_id` int NOT NULL,
  `bed_code` int NOT NULL,
  PRIMARY KEY (`ward_bed_id`),
  KEY `ward_id1_idx` (`ward_id`),
  CONSTRAINT `ward_id2` FOREIGN KEY (`ward_id`) REFERENCES `ward` (`ward_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Temporary view structure for view `ward_bed_view`
--

DROP TABLE IF EXISTS `ward_bed_view`;
/*!50001 DROP VIEW IF EXISTS `ward_bed_view`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `ward_bed_view` AS SELECT 
 1 AS `ward_bed_id`,
 1 AS `ward_id`,
 1 AS `ward_name`,
 1 AS `bed_code`*/;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `ward_patient_bed`
--

DROP TABLE IF EXISTS `ward_patient_bed`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ward_patient_bed` (
  `ward_patient_bed_id` int NOT NULL AUTO_INCREMENT,
  `ward_bed_id` int NOT NULL,
  `patient_id` int NOT NULL,
  PRIMARY KEY (`ward_patient_bed_id`),
  KEY `ward_bed_id1_idx` (`ward_bed_id`),
  KEY `patient_id1_idx` (`patient_id`),
  CONSTRAINT `patient_id1` FOREIGN KEY (`patient_id`) REFERENCES `patient` (`patient_id`),
  CONSTRAINT `ward_bed_id1` FOREIGN KEY (`ward_bed_id`) REFERENCES `ward_bed` (`ward_bed_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Temporary view structure for view `ward_patient_bed_view`
--

DROP TABLE IF EXISTS `ward_patient_bed_view`;
/*!50001 DROP VIEW IF EXISTS `ward_patient_bed_view`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `ward_patient_bed_view` AS SELECT 
 1 AS `ward_patient_bed_id`,
 1 AS `ward_bed_id`,
 1 AS `patient_id`,
 1 AS `ward_id`,
 1 AS `ward_name`,
 1 AS `bed_code`,
 1 AS `patient_name`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `ward_view`
--

DROP TABLE IF EXISTS `ward_view`;
/*!50001 DROP VIEW IF EXISTS `ward_view`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `ward_view` AS SELECT 
 1 AS `ward_id`,
 1 AS `name`*/;
SET character_set_client = @saved_cs_client;

--
-- Final view structure for view `diagnose_view`
--

/*!50001 DROP VIEW IF EXISTS `diagnose_view`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `diagnose_view` AS select `diagnostics`.`diagnose_id` AS `diagnose_id`,`diagnostics`.`name` AS `name` from `diagnostics` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `doctor_view`
--

/*!50001 DROP VIEW IF EXISTS `doctor_view`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `doctor_view` AS select `doctor`.`doctor_id` AS `doctor_id`,`doctor`.`dea_no` AS `dea_no`,`doctor`.`specialty_area` AS `specialty_area` from `doctor` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `drug_view`
--

/*!50001 DROP VIEW IF EXISTS `drug_view`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `drug_view` AS select `drug`.`drug_id` AS `drug_id`,`drug`.`drug_type` AS `drug_type`,`drug`.`drug_name` AS `drug_name`,`drug`.`unit_cost` AS `unit_cost` from `drug` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `employee_doctor_view`
--

/*!50001 DROP VIEW IF EXISTS `employee_doctor_view`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `employee_doctor_view` AS select `doctor`.`doctor_id` AS `doctor_id`,`employee`.`employee_name` AS `employee_name`,`employee`.`contact_number` AS `contact_number`,`doctor`.`dea_no` AS `dea_no`,`doctor`.`specialty_area` AS `specialty_area` from (`doctor` join `employee` on((`doctor`.`doctor_id` = `employee`.`employee_id`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `employee_medical_view`
--

/*!50001 DROP VIEW IF EXISTS `employee_medical_view`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `employee_medical_view` AS select `employee`.`employee_id` AS `employee_id`,`medical_staff`.`medical_staff_id` AS `medical_staff_id`,`employee`.`employee_name` AS `employee_name`,`employee`.`working_status` AS `working_status`,`employee`.`role` AS `role`,`medical_staff`.`joined_date` AS `joined_date`,`medical_staff`.`resigned_date` AS `resigned_date`,`medical_staff`.`mcr_number` AS `mcr_number` from (`employee` join `medical_staff` on((`medical_staff`.`employee_id` = `employee`.`employee_id`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `employee_nonmedical_attendance_view`
--

/*!50001 DROP VIEW IF EXISTS `employee_nonmedical_attendance_view`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `employee_nonmedical_attendance_view` AS select `employee_nonmedical_view`.`employee_id` AS `employee_id`,`employee_nonmedical_view`.`non_medical_staff_id` AS `non_medical_staff_id`,`employee_nonmedical_view`.`employee_name` AS `employee_name`,`non_medical_attendance`.`hourly_charge_rate` AS `hourly_charge_rate` from (`employee_nonmedical_view` join `non_medical_attendance` on((`non_medical_attendance`.`employee_id` = `employee_nonmedical_view`.`employee_id`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `employee_nonmedical_view`
--

/*!50001 DROP VIEW IF EXISTS `employee_nonmedical_view`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `employee_nonmedical_view` AS select `employee`.`employee_id` AS `employee_id`,`non_medical_staff`.`non_medical_staff_id` AS `non_medical_staff_id`,`non_medical_staff`.`contract_no` AS `contract_no`,`employee`.`employee_name` AS `employee_name`,`employee`.`working_status` AS `working_status`,`employee`.`role` AS `role`,`non_medical_staff`.`start_date` AS `start_date`,`non_medical_staff`.`end_date` AS `end_date` from (`employee` join `non_medical_staff` on((`non_medical_staff`.`employee_id` = `employee`.`employee_id`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `employee_work_hours_view`
--

/*!50001 DROP VIEW IF EXISTS `employee_work_hours_view`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `employee_work_hours_view` AS select `employee_work_hours`.`work_hours_id` AS `work_hours_id`,`employee_work_hours`.`employee_id` AS `employee_id`,`employee_work_hours`.`work_hours_per_week` AS `work_hours_per_week`,`employee_work_hours`.`patient_care_unit_id` AS `patient_care_unit_id`,`patient_care_unit`.`name` AS `patient_care_unit_name`,`employee`.`employee_name` AS `employee_name` from ((`employee_work_hours` join `employee` on((`employee`.`employee_id` = `employee_work_hours`.`employee_id`))) join `patient_care_unit` on((`employee_work_hours`.`patient_care_unit_id` = `patient_care_unit`.`patient_care_unit_id`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `employees_view`
--

/*!50001 DROP VIEW IF EXISTS `employees_view`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `employees_view` AS select `employee`.`employee_id` AS `employee_id`,`employee`.`employee_name` AS `employee_name`,`employee`.`employee_address` AS `employee_address`,`employee`.`working_status` AS `working_status`,`employee`.`contact_number` AS `contact_number`,`employee`.`category` AS `category`,`employee`.`role` AS `role` from `employee` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `patient_admit_view`
--

/*!50001 DROP VIEW IF EXISTS `patient_admit_view`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `patient_admit_view` AS select `patient_admit`.`patient_admit_id` AS `patient_admit_id`,`patient_admit`.`patient_id` AS `patient_id`,`patient_admit`.`ward_id` AS `ward_id`,`patient_admit`.`doctor_id` AS `doctor_id`,`patient_admit`.`admit_datetime` AS `admit_datetime`,`patient_admit`.`discharged_datetime` AS `discharged_datetime`,`patient`.`patient_name` AS `patient_name` from (`patient_admit` join `patient` on((`patient_admit`.`patient_id` = `patient`.`patient_id`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `patient_care_unit_staff_view`
--

/*!50001 DROP VIEW IF EXISTS `patient_care_unit_staff_view`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `patient_care_unit_staff_view` AS select `patient_care_unit_staff`.`patient_care_unit_staff_id` AS `patient_care_unit_staff_id`,`patient_care_unit`.`patient_care_unit_id` AS `patient_care_unit_id`,`patient_care_unit`.`name` AS `patient_care_unit_name`,`patient_care_unit`.`type` AS `patient_care_unit_type`,`employee`.`employee_id` AS `employee_id`,`employee`.`employee_name` AS `employee_name`,`employee`.`role` AS `employee_role`,`employee`.`category` AS `employee_category` from ((`patient_care_unit_staff` join `patient_care_unit` on((`patient_care_unit_staff`.`patient_care_unit_id` = `patient_care_unit`.`patient_care_unit_id`))) join `employee` on((`employee`.`employee_id` = `patient_care_unit_staff`.`employee_id`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `patient_care_unit_view`
--

/*!50001 DROP VIEW IF EXISTS `patient_care_unit_view`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `patient_care_unit_view` AS select `patient_care_unit`.`patient_care_unit_id` AS `patient_care_unit_id`,`patient_care_unit`.`name` AS `patient_care_unit_name`,`patient_care_unit`.`type` AS `patient_care_unit_type`,`employee`.`employee_id` AS `employee_id`,`employee`.`employee_name` AS `employee_name`,`employee`.`role` AS `employee_role` from (`patient_care_unit` join `employee` on((`patient_care_unit`.`employee_id` = `employee`.`employee_id`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `patient_diagnose_view`
--

/*!50001 DROP VIEW IF EXISTS `patient_diagnose_view`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `patient_diagnose_view` AS select `patient_diagnose`.`patient_diagnose_id` AS `patient_diagnose_id`,`patient_diagnose`.`patient_admit_id` AS `patient_admit_id`,`patient_diagnose`.`diagnose_id` AS `diagnose_id`,`patient_diagnose`.`date_time` AS `date_time`,`patient_diagnose`.`description` AS `description` from `patient_diagnose` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `patient_insurance_view`
--

/*!50001 DROP VIEW IF EXISTS `patient_insurance_view`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `patient_insurance_view` AS select `patient_insurance`.`patient_insurance_id` AS `patient_insurance_id`,`patient_insurance`.`patient_emg_id` AS `patient_emg_id`,`patient_insurance`.`company_name` AS `company_name`,`patient_insurance`.`branch` AS `branch`,`patient_insurance`.`subscriber_first_name` AS `subscriber_first_name`,`patient_insurance`.`subscriber_last_name` AS `subscriber_last_name`,`patient_insurance`.`subscriber_relationship` AS `subscriber_relationship`,`patient_insurance`.`subscriber_address` AS `subscriber_address`,`patient_insurance`.`subscriber_contact_no` AS `subscriber_contact_no`,`patient_emergency_contact`.`patient_id` AS `patient_id` from (`patient_insurance` join `patient_emergency_contact` on((`patient_emergency_contact`.`patient_emg_id` = `patient_insurance`.`patient_emg_id`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `patient_opd_view`
--

/*!50001 DROP VIEW IF EXISTS `patient_opd_view`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `patient_opd_view` AS select `patient_opd`.`patient_opd_id` AS `patient_opd_id`,`patient_opd`.`patient_id` AS `patient_id`,`patient_opd`.`arrival_datetime` AS `arrival_datetime`,`patient`.`patient_name` AS `patient_name` from (`patient_opd` join `patient` on((`patient_opd`.`patient_id` = `patient`.`patient_id`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `patient_visit_view`
--

/*!50001 DROP VIEW IF EXISTS `patient_visit_view`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `patient_visit_view` AS select `patient_visit`.`patient_visit_id` AS `patient_visit_id`,`patient_visit`.`patient_id` AS `patient_id`,`patient_visit`.`nurse_id` AS `nurse_id`,`patient_visit`.`weight` AS `weight`,`patient_visit`.`blood_pressure` AS `blood_pressure`,`patient_visit`.`pulse` AS `pulse`,`patient_visit`.`temperature` AS `temperature`,`patient_visit`.`symptoms` AS `symptoms`,`patient_visit`.`date_time` AS `date_time` from `patient_visit` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `patients_emergency_contacts_view`
--

/*!50001 DROP VIEW IF EXISTS `patients_emergency_contacts_view`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `patients_emergency_contacts_view` AS select `patient_emergency_contact`.`patient_emg_id` AS `patient_emg_id`,`patient_emergency_contact`.`patient_id` AS `patient_id`,`patient_emergency_contact`.`pec_first_name` AS `pec_first_name`,`patient_emergency_contact`.`pec_last_name` AS `pec_last_name`,`patient_emergency_contact`.`pec_relationship` AS `pec_relationship`,`patient_emergency_contact`.`pec_address` AS `pec_address`,`patient_emergency_contact`.`pec_contact_no` AS `pec_contact_no` from `patient_emergency_contact` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `patients_view`
--

/*!50001 DROP VIEW IF EXISTS `patients_view`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `patients_view` AS select `patient`.`patient_id` AS `patient_id`,`patient`.`patient_name` AS `patient_name`,`patient`.`patient_dob` AS `patient_dob`,`patient`.`patient_type` AS `patient_type` from `patient` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `treatment_drug_view`
--

/*!50001 DROP VIEW IF EXISTS `treatment_drug_view`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `treatment_drug_view` AS select `treatment_drug`.`drug_test_id` AS `drug_test_id`,`treatment_drug`.`drug_id` AS `drug_id`,`treatment_drug`.`drug_cost` AS `drug_cost`,`treatment_drug`.`treatment_id` AS `treatment_id`,`treatment`.`type` AS `type` from (`treatment_drug` join `treatment` on((`treatment_drug`.`treatment_id` = `treatment`.`treatment_id`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `treatment_test_view`
--

/*!50001 DROP VIEW IF EXISTS `treatment_test_view`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `treatment_test_view` AS select `treatment_test`.`test_id` AS `test_id`,`treatment_test`.`test_name` AS `test_name`,`treatment_test`.`test_cost` AS `test_cost`,`treatment_test`.`treatment_id` AS `treatment_id`,`treatment`.`type` AS `type` from (`treatment_test` join `treatment` on((`treatment_test`.`treatment_id` = `treatment`.`treatment_id`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `treatment_view`
--

/*!50001 DROP VIEW IF EXISTS `treatment_view`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `treatment_view` AS select `treatment`.`treatment_id` AS `treatment_id`,`treatment`.`doctor_id` AS `doctor_id`,`treatment`.`patient_id` AS `patient_id`,`treatment`.`type` AS `type`,`treatment`.`date_time` AS `date_time` from `treatment` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `vendors_drug_view`
--

/*!50001 DROP VIEW IF EXISTS `vendors_drug_view`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `vendors_drug_view` AS select `vendors_drug`.`vendors_drug_id` AS `vendors_drug_id`,`vendors`.`vendor_id` AS `vendor_id`,`vendors`.`vendor_name` AS `vendor_name`,`drug`.`drug_id` AS `drug_id`,`drug`.`drug_name` AS `drug_name`,`drug`.`unit_cost` AS `drug_unit_cost`,`vendors_drug`.`quantity` AS `quantity`,`vendors_drug`.`supplied_date` AS `supplied_date` from ((`vendors_drug` join `vendors` on((`vendors`.`vendor_id` = `vendors_drug`.`vendor_id`))) join `drug` on((`drug`.`drug_id` = `vendors_drug`.`drug_id`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `vendors_view`
--

/*!50001 DROP VIEW IF EXISTS `vendors_view`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `vendors_view` AS select `vendors`.`vendor_id` AS `vendor_id`,`vendors`.`vendor_name` AS `vendor_name`,`vendors`.`vendor_address` AS `vendor_address`,`vendors`.`vendor_contact_no` AS `vendor_contact_no`,`vendors`.`vendor_register_no` AS `vendor_register_no` from `vendors` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `ward_bed_view`
--

/*!50001 DROP VIEW IF EXISTS `ward_bed_view`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `ward_bed_view` AS select `ward_bed`.`ward_bed_id` AS `ward_bed_id`,`ward_bed`.`ward_id` AS `ward_id`,`ward`.`name` AS `ward_name`,`ward_bed`.`bed_code` AS `bed_code` from (`ward_bed` join `ward` on((`ward_bed`.`ward_id` = `ward`.`ward_id`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `ward_patient_bed_view`
--

/*!50001 DROP VIEW IF EXISTS `ward_patient_bed_view`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `ward_patient_bed_view` AS select `ward_patient_bed`.`ward_patient_bed_id` AS `ward_patient_bed_id`,`ward_patient_bed`.`ward_bed_id` AS `ward_bed_id`,`ward_patient_bed`.`patient_id` AS `patient_id`,`ward_bed`.`ward_id` AS `ward_id`,`ward`.`name` AS `ward_name`,`ward_bed`.`bed_code` AS `bed_code`,`patient`.`patient_name` AS `patient_name` from (((`ward_patient_bed` join `ward_bed` on((`ward_bed`.`ward_bed_id` = `ward_patient_bed`.`ward_bed_id`))) join `ward` on((`ward_bed`.`ward_id` = `ward`.`ward_id`))) join `patient` on((`ward_patient_bed`.`patient_id` = `patient`.`patient_id`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `ward_view`
--

/*!50001 DROP VIEW IF EXISTS `ward_view`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `ward_view` AS select `ward`.`ward_id` AS `ward_id`,`ward`.`name` AS `name` from `ward` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-09-18 12:46:16
