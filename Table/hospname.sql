-- MySQL Administrator dump 1.4
--
-- ------------------------------------------------------
-- Server version	5.5.5-10.0.14-MariaDB


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


--
-- Create schema love4203
--

CREATE DATABASE IF NOT EXISTS love4203;
USE love4203;

--
-- Temporary table structure for view `accident`
--
DROP TABLE IF EXISTS `accident`;
DROP VIEW IF EXISTS `accident`;
CREATE TABLE `accident` (
  `HOSPCODE` varchar(5),
  `PID` varchar(15),
  `SEQ` varchar(16),
  `DATETIME_SERV` datetime,
  `DATETIME_AE` datetime,
  `AETYPE` varchar(2),
  `AEPLACE` varchar(2),
  `TYPEIN_AE` varchar(1),
  `TRAFFIC` varchar(1),
  `VEHICLE` varchar(2),
  `ALCOHOL` varchar(1),
  `NACROTIC_DRUG` varchar(1),
  `BELT` varchar(1),
  `HELMET` varchar(1),
  `AIRWAY` varchar(1),
  `STOPBLEED` varchar(1),
  `SPLINT` varchar(1),
  `FLUID` varchar(1),
  `URGENCY` varchar(1),
  `COMA_EYE` varchar(1),
  `COMA_SPEAK` varchar(1),
  `COMA_MOVEMENT` varchar(1),
  `D_UPDATE` datetime
);

--
-- Temporary table structure for view `address`
--
DROP TABLE IF EXISTS `address`;
DROP VIEW IF EXISTS `address`;
CREATE TABLE `address` (
  `HOSPCODE` varchar(5),
  `PID` varchar(15),
  `ADDRESSTYPE` varchar(1),
  `HOUSE_ID` varchar(11),
  `HOUSETYPE` varchar(1),
  `ROOMNO` varchar(10),
  `CONDO` varchar(75),
  `HOUSENO` varchar(75),
  `SOISUB` varchar(255),
  `SOIMAIN` varchar(255),
  `ROAD` varchar(255),
  `VILLANAME` varchar(255),
  `VILLAGE` varchar(2),
  `TAMBON` varchar(2),
  `AMPUR` varchar(2),
  `CHANGWAT` varchar(2),
  `TELEPHONE` varchar(15),
  `MOBILE` varchar(15),
  `D_UPDATE` datetime
);

--
-- Temporary table structure for view `admission`
--
DROP TABLE IF EXISTS `admission`;
DROP VIEW IF EXISTS `admission`;
CREATE TABLE `admission` (
  `HOSPCODE` varchar(5),
  `PID` varchar(15),
  `SEQ` varchar(16),
  `AN` varchar(9),
  `DATETIME_ADMIT` datetime,
  `WARDADMIT` varchar(5),
  `INSTYPE` varchar(4),
  `TYPEIN` varchar(1),
  `REFERINHOSP` varchar(5),
  `CAUSEIN` varchar(1),
  `ADMITWEIGHT` decimal(5,1),
  `ADMITHEIGHT` int(3),
  `DATETIME_DISCH` datetime,
  `WARDDISCH` varchar(5),
  `DISCHSTATUS` varchar(1),
  `DISCHTYPE` varchar(1),
  `REFEROUTHOSP` varchar(5),
  `CAUSEOUT` varchar(1),
  `COST` decimal(11,2),
  `PRICE` decimal(11,2),
  `PAYPRICE` decimal(11,2),
  `ACTUALPAY` decimal(11,2),
  `PROVIDER` varchar(15),
  `D_UPDATE` datetime,
  `DRG` varchar(5),
  `RW` decimal(11,4),
  `ADJRW` decimal(11,4),
  `ERROR` varchar(2),
  `WARNING` varchar(4),
  `ACTLOS` int(4),
  `GROUPER_VERSION` varchar(20)
);

--
-- Temporary table structure for view `anc`
--
DROP TABLE IF EXISTS `anc`;
DROP VIEW IF EXISTS `anc`;
CREATE TABLE `anc` (
  `HOSPCODE` varchar(5),
  `PID` varchar(15),
  `SEQ` varchar(16),
  `DATE_SERV` date,
  `GRAVIDA` varchar(2),
  `ANCNO` varchar(1),
  `GA` varchar(2),
  `ANCRESULT` varchar(1),
  `ANCPLACE` varchar(5),
  `PROVIDER` varchar(15),
  `D_UPDATE` datetime
);

--
-- Temporary table structure for view `appointment`
--
DROP TABLE IF EXISTS `appointment`;
DROP VIEW IF EXISTS `appointment`;
CREATE TABLE `appointment` (
  `HOSPCODE` varchar(5),
  `PID` varchar(15),
  `AN` varchar(9),
  `SEQ` varchar(16),
  `DATE_SERV` date,
  `CLINIC` varchar(5),
  `APDATE` date,
  `APTYPE` varchar(3),
  `APDIAG` varchar(6),
  `PROVIDER` varchar(15),
  `D_UPDATE` datetime
);

--
-- Temporary table structure for view `card`
--
DROP TABLE IF EXISTS `card`;
DROP VIEW IF EXISTS `card`;
CREATE TABLE `card` (
  `HOSPCODE` varchar(5),
  `PID` varchar(15),
  `INSTYPE_OLD` varchar(2),
  `INSTYPE_NEW` varchar(4),
  `INSID` varchar(18),
  `STARTDATE` date,
  `EXPIREDATE` date,
  `MAIN` varchar(5),
  `SUB` varchar(5),
  `D_UPDATE` datetime
);

--
-- Temporary table structure for view `care_refer`
--
DROP TABLE IF EXISTS `care_refer`;
DROP VIEW IF EXISTS `care_refer`;
CREATE TABLE `care_refer` (
  `hospcode` varchar(5),
  `referid` varchar(10),
  `referid_province` varchar(10),
  `caretype` varchar(1),
  `d_update` datetime
);

--
-- Temporary table structure for view `charge_ipd`
--
DROP TABLE IF EXISTS `charge_ipd`;
DROP VIEW IF EXISTS `charge_ipd`;
CREATE TABLE `charge_ipd` (
  `HOSPCODE` varchar(5),
  `PID` varchar(15),
  `AN` varchar(9),
  `DATETIME_ADMIT` datetime,
  `WARDSTAY` varchar(5),
  `CHARGEITEM` varchar(2),
  `CHARGELIST` varchar(6),
  `QUANTITY` int(11),
  `INSTYPE` varchar(4),
  `COST` decimal(11,2),
  `PRICE` decimal(11,2),
  `PAYPRICE` decimal(11,2),
  `D_UPDATE` datetime
);

--
-- Temporary table structure for view `charge_opd`
--
DROP TABLE IF EXISTS `charge_opd`;
DROP VIEW IF EXISTS `charge_opd`;
CREATE TABLE `charge_opd` (
  `HOSPCODE` varchar(5),
  `PID` varchar(15),
  `SEQ` varchar(16),
  `DATE_SERV` date,
  `CLINIC` varchar(5),
  `CHARGEITEM` varchar(2),
  `CHARGELIST` varchar(6),
  `QUANTITY` int(11),
  `INSTYPE` varchar(4),
  `COST` decimal(11,2),
  `PRICE` decimal(11,2),
  `PAYPRICE` decimal(11,2),
  `D_UPDATE` datetime
);

--
-- Temporary table structure for view `chronic`
--
DROP TABLE IF EXISTS `chronic`;
DROP VIEW IF EXISTS `chronic`;
CREATE TABLE `chronic` (
  `HOSPCODE` varchar(5),
  `PID` varchar(15),
  `DATE_DIAG` date,
  `CHRONIC` varchar(6),
  `HOSP_DX` varchar(5),
  `HOSP_RX` varchar(5),
  `DATE_DISCH` date,
  `TYPEDISCH` varchar(2),
  `D_UPDATE` datetime
);

--
-- Temporary table structure for view `chronicfu`
--
DROP TABLE IF EXISTS `chronicfu`;
DROP VIEW IF EXISTS `chronicfu`;
CREATE TABLE `chronicfu` (
  `HOSPCODE` varchar(5),
  `PID` varchar(15),
  `SEQ` varchar(16),
  `DATE_SERV` date,
  `WEIGHT` mediumint(9),
  `HEIGHT` smallint(6),
  `WAIST_CM` smallint(6),
  `SBP` smallint(6),
  `DBP` smallint(6),
  `FOOT` char(1),
  `RETINA` char(1),
  `PROVIDER` varchar(15),
  `D_UPDATE` datetime
);

--
-- Temporary table structure for view `clinical_refer`
--
DROP TABLE IF EXISTS `clinical_refer`;
DROP VIEW IF EXISTS `clinical_refer`;
CREATE TABLE `clinical_refer` (
  `hospcode` varchar(5),
  `referid` varchar(10),
  `referid_province` varchar(10),
  `datetime_assess` datetime,
  `clinicalcode` varchar(6),
  `clinicalname` varchar(255),
  `clinicalvalue` int(6),
  `clinicalresult` varchar(255),
  `d_update` datetime
);

--
-- Temporary table structure for view `community_activity`
--
DROP TABLE IF EXISTS `community_activity`;
DROP VIEW IF EXISTS `community_activity`;
CREATE TABLE `community_activity` (
  `HOSPCODE` varchar(5),
  `VID` varchar(8),
  `DATE_START` date,
  `DATE_FINISH` date,
  `COMACTIVITY` varchar(7),
  `PROVIDER` varchar(15),
  `D_UPDATE` datetime
);

--
-- Temporary table structure for view `community_service`
--
DROP TABLE IF EXISTS `community_service`;
DROP VIEW IF EXISTS `community_service`;
CREATE TABLE `community_service` (
  `HOSPCODE` varchar(5),
  `PID` varchar(15),
  `SEQ` varchar(16),
  `DATE_SERV` date,
  `COMSERVICE` varchar(7),
  `PROVIDER` varchar(15),
  `D_UPDATE` datetime
);

--
-- Temporary table structure for view `death`
--
DROP TABLE IF EXISTS `death`;
DROP VIEW IF EXISTS `death`;
CREATE TABLE `death` (
  `HOSPCODE` varchar(5),
  `PID` varchar(15),
  `HOSPDEATH` varchar(5),
  `AN` varchar(9),
  `SEQ` varchar(16),
  `DDEATH` date,
  `CDEATH_A` varchar(6),
  `CDEATH_B` varchar(6),
  `CDEATH_C` varchar(6),
  `CDEATH_D` varchar(6),
  `ODISEASE` varchar(6),
  `CDEATH` varchar(6),
  `PREGDEATH` varchar(1),
  `PDEATH` varchar(1),
  `PROVIDER` varchar(15),
  `D_UPDATE` datetime
);

--
-- Temporary table structure for view `dental`
--
DROP TABLE IF EXISTS `dental`;
DROP VIEW IF EXISTS `dental`;
CREATE TABLE `dental` (
  `HOSPCODE` varchar(5),
  `PID` varchar(15),
  `SEQ` varchar(16),
  `DATE_SERV` date,
  `DENTTYPE` varchar(1),
  `SERVPLACE` varchar(1),
  `PTEETH` int(2),
  `PCARIES` int(2),
  `PFILLING` int(2),
  `PEXTRACT` int(2),
  `DTEETH` int(2),
  `DCARIES` int(2),
  `DFILLING` int(2),
  `DEXTRACT` int(2),
  `NEED_FLUORIDE` char(1),
  `NEED_SCALING` char(1),
  `NEED_SEALANT` int(2),
  `NEED_PFILLING` int(2),
  `NEED_DFILLING` int(2),
  `NEED_PEXTRACT` int(2),
  `NEED_DEXTRACT` int(2),
  `NPROSTHESIS` char(1),
  `PERMANENT_PERMANENT` smallint(6),
  `PERMANENT_PROSTHESIS` smallint(6),
  `PROSTHESIS_PROSTHESIS` smallint(6),
  `GUM` varchar(6),
  `SCHOOLTYPE` char(1),
  `CLASS` char(1),
  `PROVIDER` varchar(15),
  `D_UPDATE` datetime
);

--
-- Temporary table structure for view `diagnosis_ipd`
--
DROP TABLE IF EXISTS `diagnosis_ipd`;
DROP VIEW IF EXISTS `diagnosis_ipd`;
CREATE TABLE `diagnosis_ipd` (
  `HOSPCODE` varchar(5),
  `PID` varchar(15),
  `AN` varchar(9),
  `DATETIME_ADMIT` datetime,
  `WARDDIAG` varchar(5),
  `DIAGTYPE` char(1),
  `DIAGCODE` varchar(6),
  `PROVIDER` varchar(15),
  `D_UPDATE` datetime
);

--
-- Temporary table structure for view `diagnosis_opd`
--
DROP TABLE IF EXISTS `diagnosis_opd`;
DROP VIEW IF EXISTS `diagnosis_opd`;
CREATE TABLE `diagnosis_opd` (
  `HOSPCODE` varchar(5),
  `PID` varchar(15),
  `SEQ` varchar(16),
  `DATE_SERV` date,
  `DIAGTYPE` varchar(1),
  `DIAGCODE` varchar(6),
  `CLINIC` varchar(5),
  `PROVIDER` varchar(15),
  `D_UPDATE` datetime
);

--
-- Temporary table structure for view `disability`
--
DROP TABLE IF EXISTS `disability`;
DROP VIEW IF EXISTS `disability`;
CREATE TABLE `disability` (
  `HOSPCODE` varchar(5),
  `DISABID` varchar(13),
  `PID` varchar(15),
  `DISABTYPE` char(1),
  `DISABCAUSE` char(1),
  `DIAGCODE` varchar(6),
  `DATE_DETECT` date,
  `DATE_DISAB` date,
  `D_UPDATE` datetime
);

--
-- Temporary table structure for view `drug_ipd`
--
DROP TABLE IF EXISTS `drug_ipd`;
DROP VIEW IF EXISTS `drug_ipd`;
CREATE TABLE `drug_ipd` (
  `HOSPCODE` varchar(5),
  `PID` varchar(15),
  `AN` varchar(9),
  `DATETIME_ADMIT` datetime,
  `WARDSTAY` varchar(5),
  `TYPEDRUG` char(1),
  `DIDSTD` varchar(24),
  `DNAME` varchar(255),
  `DATESTART` date,
  `DATEFINISH` date,
  `AMOUNT` int(12),
  `UNIT` varchar(3),
  `UNIT_PACKING` varchar(20),
  `DRUGPRICE` decimal(11,2),
  `DRUGCOST` decimal(11,2),
  `PROVIDER` varchar(15),
  `D_UPDATE` datetime
);

--
-- Temporary table structure for view `drug_opd`
--
DROP TABLE IF EXISTS `drug_opd`;
DROP VIEW IF EXISTS `drug_opd`;
CREATE TABLE `drug_opd` (
  `HOSPCODE` varchar(5),
  `PID` varchar(15),
  `SEQ` varchar(16),
  `DATE_SERV` date,
  `CLINIC` varchar(5),
  `DIDSTD` varchar(24),
  `DNAME` varchar(255),
  `AMOUNT` int(12),
  `UNIT` varchar(3),
  `UNIT_PACKING` varchar(20),
  `DRUGPRICE` decimal(11,2),
  `DRUGCOST` decimal(11,2),
  `PROVIDER` varchar(15),
  `D_UPDATE` datetime
);

--
-- Temporary table structure for view `drug_refer`
--
DROP TABLE IF EXISTS `drug_refer`;
DROP VIEW IF EXISTS `drug_refer`;
CREATE TABLE `drug_refer` (
  `hospcode` varchar(5),
  `referid` varchar(10),
  `referid_province` varchar(10),
  `datetime_dstart` datetime,
  `datetime_dfinish` datetime,
  `didstd` varchar(24),
  `dname` varchar(255),
  `ddescription` varchar(255),
  `d_update` datetime
);

--
-- Temporary table structure for view `drugallergy`
--
DROP TABLE IF EXISTS `drugallergy`;
DROP VIEW IF EXISTS `drugallergy`;
CREATE TABLE `drugallergy` (
  `HOSPCODE` varchar(5),
  `PID` varchar(15),
  `DATERECORD` date,
  `DRUGALLERGY` varchar(24),
  `DNAME` varchar(255),
  `TYPEDX` char(1),
  `ALEVEL` char(1),
  `SYMPTOM` varchar(2),
  `INFORMANT` char(1),
  `INFORMHOSP` varchar(5),
  `D_UPDATE` datetime
);

--
-- Temporary table structure for view `epi`
--
DROP TABLE IF EXISTS `epi`;
DROP VIEW IF EXISTS `epi`;
CREATE TABLE `epi` (
  `HOSPCODE` varchar(5),
  `PID` varchar(15),
  `SEQ` varchar(16),
  `DATE_SERV` date,
  `VACCINETYPE` varchar(3),
  `VACCINEPLACE` varchar(5),
  `PROVIDER` varchar(15),
  `D_UPDATE` datetime
);

--
-- Temporary table structure for view `fp`
--
DROP TABLE IF EXISTS `fp`;
DROP VIEW IF EXISTS `fp`;
CREATE TABLE `fp` (
  `HOSPCODE` varchar(5),
  `PID` varchar(15),
  `SEQ` varchar(16),
  `DATE_SERV` date,
  `FPTYPE` char(1),
  `FPPLACE` varchar(5),
  `PROVIDER` varchar(15),
  `D_UPDATE` datetime
);

--
-- Temporary table structure for view `functional`
--
DROP TABLE IF EXISTS `functional`;
DROP VIEW IF EXISTS `functional`;
CREATE TABLE `functional` (
  `HOSPCODE` varchar(5),
  `PID` varchar(15),
  `SEQ` varchar(16),
  `DATE_SERV` date,
  `FUNCTIONAL_TEST` varchar(2),
  `TESTRESULT` varchar(3),
  `DEPENDENT` char(1),
  `PROVIDER` varchar(15),
  `D_UPDATE` datetime
);

--
-- Temporary table structure for view `home`
--
DROP TABLE IF EXISTS `home`;
DROP VIEW IF EXISTS `home`;
CREATE TABLE `home` (
  `HOSPCODE` varchar(5),
  `HID` varchar(14),
  `HOUSE_ID` varchar(11),
  `HOUSETYPE` varchar(1),
  `ROOMNO` varchar(10),
  `CONDO` varchar(75),
  `HOUSE` varchar(75),
  `SOISUB` varchar(255),
  `SOIMAIN` varchar(255),
  `ROAD` varchar(255),
  `VILLANAME` varchar(255),
  `VILLAGE` varchar(2),
  `TAMBON` varchar(2),
  `AMPUR` varchar(2),
  `CHANGWAT` varchar(2),
  `TELEPHONE` varchar(15),
  `LATITUDE` decimal(10,6),
  `LONGITUDE` decimal(10,6),
  `NFAMILY` varchar(2),
  `LOCATYPE` varchar(1),
  `VHVID` varchar(15),
  `HEADID` varchar(15),
  `TOILET` varchar(1),
  `WATER` varchar(1),
  `WATERTYPE` varchar(1),
  `GARBAGE` varchar(1),
  `HOUSING` varchar(1),
  `DURABILITY` varchar(1),
  `CLEANLINESS` varchar(1),
  `VENTILATION` varchar(1),
  `LIGHT` varchar(1),
  `WATERTM` varchar(1),
  `MFOOD` varchar(1),
  `BCONTROL` varchar(1),
  `ACONTROL` varchar(1),
  `CHEMICAL` varchar(1),
  `OUTDATE` date,
  `D_UPDATE` datetime
);

--
-- Temporary table structure for view `icf`
--
DROP TABLE IF EXISTS `icf`;
DROP VIEW IF EXISTS `icf`;
CREATE TABLE `icf` (
  `HOSPCODE` varchar(5),
  `DISABID` varchar(13),
  `PID` varchar(15),
  `SEQ` varchar(16),
  `DATE_SERV` date,
  `ICF` varchar(6),
  `QUALIFIER` char(1),
  `PROVIDER` varchar(15),
  `D_UPDATE` datetime
);

--
-- Temporary table structure for view `investigation_refer`
--
DROP TABLE IF EXISTS `investigation_refer`;
DROP VIEW IF EXISTS `investigation_refer`;
CREATE TABLE `investigation_refer` (
  `hospcode` varchar(5),
  `referid` varchar(10),
  `referid_province` varchar(10),
  `datetime_invest` datetime,
  `investcode` varchar(6),
  `investname` varchar(255),
  `datetime_report` datetime,
  `investvalue` decimal(6,2),
  `investresult` varchar(255),
  `d_update` datetime
);

--
-- Temporary table structure for view `labfu`
--
DROP TABLE IF EXISTS `labfu`;
DROP VIEW IF EXISTS `labfu`;
CREATE TABLE `labfu` (
  `HOSPCODE` varchar(5),
  `PID` varchar(15),
  `SEQ` varchar(16),
  `DATE_SERV` date,
  `LABTEST` varchar(7),
  `LABRESULT` decimal(6,2),
  `D_UPDATE` datetime
);

--
-- Temporary table structure for view `labor`
--
DROP TABLE IF EXISTS `labor`;
DROP VIEW IF EXISTS `labor`;
CREATE TABLE `labor` (
  `HOSPCODE` varchar(5),
  `PID` varchar(15),
  `GRAVIDA` varchar(2),
  `LMP` date,
  `EDC` date,
  `BDATE` date,
  `BRESULT` varchar(6),
  `BPLACE` char(1),
  `BHOSP` varchar(5),
  `BTYPE` char(1),
  `BDOCTOR` char(1),
  `LBORN` int(1),
  `SBORN` int(1),
  `D_UPDATE` datetime
);

--
-- Temporary table structure for view `ncdscreen`
--
DROP TABLE IF EXISTS `ncdscreen`;
DROP VIEW IF EXISTS `ncdscreen`;
CREATE TABLE `ncdscreen` (
  `HOSPCODE` varchar(5),
  `PID` varchar(15),
  `SEQ` varchar(16),
  `DATE_SERV` date,
  `SERVPLACE` varchar(1),
  `SMOKE` varchar(1),
  `ALCOHOL` varchar(1),
  `DMFAMILY` varchar(1),
  `HTFAMILY` varchar(1),
  `WEIGHT` decimal(5,1),
  `HEIGHT` int(3),
  `WAIST_CM` int(3),
  `SBP_1` int(3),
  `DBP_1` int(3),
  `SBP_2` int(3),
  `DBP_2` int(3),
  `BSLEVEL` int(6),
  `BSTEST` char(1),
  `SCREENPLACE` varchar(5),
  `PROVIDER` varchar(15),
  `D_UPDATE` datetime
);

--
-- Temporary table structure for view `newborn`
--
DROP TABLE IF EXISTS `newborn`;
DROP VIEW IF EXISTS `newborn`;
CREATE TABLE `newborn` (
  `HOSPCODE` varchar(5),
  `PID` varchar(15),
  `MPID` varchar(15),
  `GRAVIDA` varchar(2),
  `GA` varchar(2),
  `BDATE` date,
  `BTIME` varchar(6),
  `BPLACE` char(1),
  `BHOSP` varchar(5),
  `BIRTHNO` char(1),
  `BTYPE` char(1),
  `BDOCTOR` char(1),
  `BWEIGHT` int(4),
  `ASPHYXIA` char(1),
  `VITK` char(1),
  `TSH` char(1),
  `TSHRESULT` decimal(5,1),
  `D_UPDATE` datetime
);

--
-- Temporary table structure for view `newborncare`
--
DROP TABLE IF EXISTS `newborncare`;
DROP VIEW IF EXISTS `newborncare`;
CREATE TABLE `newborncare` (
  `HOSPCODE` varchar(5),
  `PID` varchar(15),
  `SEQ` varchar(16),
  `BDATE` date,
  `BCARE` date,
  `BCPLACE` varchar(5),
  `BCARERESULT` char(1),
  `FOOD` char(1),
  `PROVIDER` varchar(15),
  `D_UPDATE` datetime
);

--
-- Temporary table structure for view `nutrition`
--
DROP TABLE IF EXISTS `nutrition`;
DROP VIEW IF EXISTS `nutrition`;
CREATE TABLE `nutrition` (
  `HOSPCODE` varchar(5),
  `PID` varchar(15),
  `SEQ` varchar(16),
  `DATE_SERV` date,
  `NUTRITIONPLACE` varchar(5),
  `WEIGHT` decimal(5,1),
  `HEIGHT` int(3),
  `HEADCIRCUM` int(3),
  `CHILDDEVELOP` char(1),
  `FOOD` char(1),
  `BOTTLE` char(1),
  `PROVIDER` varchar(15),
  `D_UPDATE` datetime
);

--
-- Temporary table structure for view `person`
--
DROP TABLE IF EXISTS `person`;
DROP VIEW IF EXISTS `person`;
CREATE TABLE `person` (
  `HOSPCODE` varchar(5),
  `CID` varchar(13),
  `PID` varchar(15),
  `HID` varchar(14),
  `PRENAME` varchar(3),
  `NAME` varchar(50),
  `LNAME` varchar(50),
  `HN` varchar(15),
  `SEX` varchar(1),
  `BIRTH` date,
  `MSTATUS` char(1),
  `OCCUPATION_OLD` varchar(3),
  `OCCUPATION_NEW` varchar(4),
  `RACE` varchar(3),
  `NATION` varchar(3),
  `RELIGION` varchar(2),
  `EDUCATION` varchar(2),
  `FSTATUS` varchar(1),
  `FATHER` varchar(13),
  `MOTHER` varchar(13),
  `COUPLE` varchar(13),
  `VSTATUS` varchar(1),
  `MOVEIN` date,
  `DISCHARGE` varchar(1),
  `DDISCHARGE` date,
  `ABOGROUP` varchar(1),
  `RHGROUP` varchar(1),
  `LABOR` varchar(2),
  `PASSPORT` varchar(8),
  `TYPEAREA` varchar(1),
  `D_UPDATE` datetime
);

--
-- Temporary table structure for view `postnatal`
--
DROP TABLE IF EXISTS `postnatal`;
DROP VIEW IF EXISTS `postnatal`;
CREATE TABLE `postnatal` (
  `HOSPCODE` varchar(5),
  `PID` varchar(15),
  `SEQ` varchar(16),
  `GRAVIDA` varchar(2),
  `BDATE` date,
  `PPCARE` date,
  `PPPLACE` varchar(5),
  `PPRESULT` char(1),
  `PROVIDER` varchar(15),
  `D_UPDATE` datetime
);

--
-- Temporary table structure for view `prenatal`
--
DROP TABLE IF EXISTS `prenatal`;
DROP VIEW IF EXISTS `prenatal`;
CREATE TABLE `prenatal` (
  `HOSPCODE` varchar(5),
  `PID` varchar(15),
  `GRAVIDA` varchar(2),
  `LMP` date,
  `EDC` date,
  `VDRL_RESULT` char(1),
  `HB_RESULT` char(1),
  `HIV_RESULT` char(1),
  `DATE_HCT` date,
  `HCT_RESULT` int(2),
  `THALASSEMIA` char(1),
  `D_UPDATE` datetime
);

--
-- Temporary table structure for view `procedure_ipd`
--
DROP TABLE IF EXISTS `procedure_ipd`;
DROP VIEW IF EXISTS `procedure_ipd`;
CREATE TABLE `procedure_ipd` (
  `HOSPCODE` varchar(5),
  `PID` varchar(15),
  `AN` varchar(9),
  `DATETIME_ADMIT` datetime,
  `WARDSTAY` varchar(5),
  `PROCEDCODE` varchar(7),
  `TIMESTART` datetime,
  `TIMEFINISH` datetime,
  `SERVICEPRICE` decimal(11,2),
  `PROVIDER` varchar(15),
  `D_UPDATE` datetime
);

--
-- Temporary table structure for view `procedure_opd`
--
DROP TABLE IF EXISTS `procedure_opd`;
DROP VIEW IF EXISTS `procedure_opd`;
CREATE TABLE `procedure_opd` (
  `HOSPCODE` varchar(5),
  `PID` varchar(15),
  `SEQ` varchar(16),
  `DATE_SERV` date,
  `CLINIC` varchar(5),
  `PROCEDCODE` varchar(7),
  `SERVICEPRICE` decimal(11,2),
  `PROVIDER` varchar(15),
  `D_UPDATE` datetime
);

--
-- Temporary table structure for view `procedure_refer`
--
DROP TABLE IF EXISTS `procedure_refer`;
DROP VIEW IF EXISTS `procedure_refer`;
CREATE TABLE `procedure_refer` (
  `hospcode` varchar(5),
  `referid` varchar(10),
  `referid_province` varchar(10),
  `timestart` datetime,
  `timefinish` datetime,
  `procedurename` varchar(255),
  `procedcode` varchar(7),
  `pdescription` varchar(255),
  `procedresult` varchar(255),
  `provider` varchar(15),
  `d_update` datetime
);

--
-- Temporary table structure for view `provider`
--
DROP TABLE IF EXISTS `provider`;
DROP VIEW IF EXISTS `provider`;
CREATE TABLE `provider` (
  `HOSPCODE` varchar(5),
  `PROVIDER` varchar(15),
  `REGISTERNO` varchar(15),
  `COUNCIL` varchar(2),
  `CID` varchar(13),
  `PRENAME` varchar(20),
  `NAME` varchar(50),
  `LNAME` varchar(50),
  `SEX` varchar(1),
  `BIRTH` date,
  `PROVIDERTYPE` varchar(2),
  `STARTDATE` date,
  `OUTDATE` date,
  `MOVEFROM` varchar(5),
  `MOVETO` varchar(5),
  `D_UPDATE` datetime
);

--
-- Temporary table structure for view `refer_history`
--
DROP TABLE IF EXISTS `refer_history`;
DROP VIEW IF EXISTS `refer_history`;
CREATE TABLE `refer_history` (
  `hospcode` varchar(5),
  `referid` varchar(10),
  `referid_province` varchar(10),
  `pid` varchar(15),
  `seq` varchar(16),
  `an` varchar(9),
  `referid_origin` varchar(10),
  `hospcode_origin` varchar(5),
  `datetime_serv` datetime,
  `datetime_admit` datetime,
  `datetime_refer` datetime,
  `clinic_refer` varchar(5),
  `hosp_destination` varchar(5),
  `chiefcomp` varchar(255),
  `physicalexam` varchar(255),
  `diagfirst` varchar(255),
  `diaglast` varchar(255),
  `pstatus` varchar(255),
  `ptype` varchar(1),
  `emergency` varchar(1),
  `ptypedis` varchar(2),
  `causeout` varchar(1),
  `request` varchar(255),
  `provider` varchar(15),
  `d_update` datetime
);

--
-- Temporary table structure for view `refer_result`
--
DROP TABLE IF EXISTS `refer_result`;
DROP VIEW IF EXISTS `refer_result`;
CREATE TABLE `refer_result` (
  `hospcode` varchar(5),
  `referid_source` varchar(10),
  `referid_province` varchar(10),
  `hosp_source` varchar(5),
  `refer_result` varchar(1),
  `datetime_in` datetime,
  `pid_in` varchar(15),
  `an_in` varchar(9),
  `reason` varchar(255),
  `d_update` datetime
);

--
-- Temporary table structure for view `rehabilitation`
--
DROP TABLE IF EXISTS `rehabilitation`;
DROP VIEW IF EXISTS `rehabilitation`;
CREATE TABLE `rehabilitation` (
  `HOSPCODE` varchar(5),
  `PID` varchar(15),
  `SEQ` varchar(16),
  `AN` varchar(9),
  `DATE_ADMIT` datetime,
  `DATE_SERV` date,
  `DATE_START` date,
  `DATE_FINISH` date,
  `REHABCODE` varchar(7),
  `AT_DEVICE` varchar(10),
  `AT_NO` int(2),
  `REHABPLACE` varchar(5),
  `PROVIDER` varchar(15),
  `D_UPDATE` datetime
);

--
-- Temporary table structure for view `service`
--
DROP TABLE IF EXISTS `service`;
DROP VIEW IF EXISTS `service`;
CREATE TABLE `service` (
  `HOSPCODE` varchar(5),
  `PID` varchar(15),
  `HN` varchar(15),
  `SEQ` varchar(16),
  `DATE_SERV` date,
  `TIME_SERV` varchar(6),
  `LOCATION` varchar(1),
  `INTIME` varchar(1),
  `INSTYPE` varchar(4),
  `INSID` varchar(18),
  `MAIN` varchar(5),
  `TYPEIN` varchar(1),
  `REFERINHOSP` varchar(5),
  `CAUSEIN` varchar(1),
  `CHIEFCOMP` text,
  `SERVPLACE` varchar(1),
  `BTEMP` double(4,1),
  `SBP` int(3),
  `DBP` int(3),
  `PR` int(3),
  `RR` int(3),
  `TYPEOUT` varchar(1),
  `REFEROUTHOSP` varchar(5),
  `CAUSEOUT` varchar(1),
  `COST` decimal(11,2),
  `PRICE` decimal(11,2),
  `PAYPRICE` double(11,0),
  `ACTUALPAY` decimal(11,2),
  `D_UPDATE` datetime
);

--
-- Temporary table structure for view `specialpp`
--
DROP TABLE IF EXISTS `specialpp`;
DROP VIEW IF EXISTS `specialpp`;
CREATE TABLE `specialpp` (
  `HOSPCODE` varchar(5),
  `PID` varchar(15),
  `SEQ` varchar(16),
  `DATE_SERV` date,
  `SERVPLACE` char(1),
  `PPSPECIAL` varchar(6),
  `PPSPLACE` varchar(5),
  `PROVIDER` varchar(15),
  `D_UPDATE` datetime
);

--
-- Temporary table structure for view `surveillance`
--
DROP TABLE IF EXISTS `surveillance`;
DROP VIEW IF EXISTS `surveillance`;
CREATE TABLE `surveillance` (
  `HOSPCODE` varchar(5),
  `PID` varchar(15),
  `SEQ` varchar(16),
  `DATE_SERV` date,
  `AN` varchar(9),
  `DATETIME_ADMIT` datetime,
  `SYNDROME` varchar(4),
  `DIAGCODE` varchar(6),
  `CODE506` varchar(2),
  `DIAGCODELAST` varchar(6),
  `CODE506LAST` varchar(2),
  `ILLDATE` date,
  `ILLHOUSE` varchar(75),
  `ILLVILLAGE` varchar(2),
  `ILLTAMBON` varchar(2),
  `ILLAMPUR` varchar(2),
  `ILLCHANGWAT` varchar(2),
  `LATITUDE` decimal(10,6),
  `LONGITUDE` decimal(10,6),
  `PTSTATUS` char(1),
  `DATE_DEATH` date,
  `COMPLICATION` varchar(3),
  `ORGANISM` varchar(4),
  `PROVIDER` varchar(15),
  `D_UPDATE` datetime
);

--
-- Temporary table structure for view `village`
--
DROP TABLE IF EXISTS `village`;
DROP VIEW IF EXISTS `village`;
CREATE TABLE `village` (
  `HOSPCODE` varchar(5),
  `VID` varchar(8),
  `NTRADITIONAL` int(4),
  `NMONK` int(4),
  `NRELIGIONLEADER` int(4),
  `NBROADCAST` int(2),
  `NRADIO` int(2),
  `NPCHC` int(2),
  `NCLINIC` int(3),
  `NDRUGSTORE` int(3),
  `NCHILDCENTER` int(3),
  `NPSCHOOL` int(2),
  `NSSCHOOL` int(2),
  `NTEMPLE` int(2),
  `NRELIGIOUSPLACE` int(2),
  `NMARKET` int(2),
  `NSHOP` int(3),
  `NFOODSHOP` int(3),
  `NSTALL` int(3),
  `NRAINTANK` int(3),
  `NCHICKENFARM` int(3),
  `NPIGFARM` int(3),
  `WASTEWATER` char(1),
  `GARBAGE` char(1),
  `NFACTORY` int(3),
  `LATITUDE` decimal(10,6),
  `LONGITUDE` decimal(10,6),
  `OUTDATE` date,
  `NUMACTUALLY` int(2),
  `RISKTYPE` int(3),
  `NUMSTATELESS` int(3),
  `NEXERCISECLUB` int(3),
  `NOLDERLYCLUB` int(3),
  `NDISABLECLUB` int(3),
  `NNUMBERONECLUB` int(3),
  `D_UPDATE` datetime
);

--
-- Temporary table structure for view `woman`
--
DROP TABLE IF EXISTS `woman`;
DROP VIEW IF EXISTS `woman`;
CREATE TABLE `woman` (
  `HOSPCODE` varchar(5),
  `PID` varchar(15),
  `FPTYPE` varchar(1),
  `NOFPCAUSE` char(1),
  `TOTALSON` int(2),
  `NUMBERSON` int(2),
  `ABORTION` int(2),
  `STILLBIRTH` int(2),
  `D_UPDATE` datetime
);

--
-- Definition of table `hospname`
--

DROP TABLE IF EXISTS `hospname`;
CREATE TABLE `hospname` (
  `id` int(11) NOT NULL,
  `hospname` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `hospname`
--

/*!40000 ALTER TABLE `hospname` DISABLE KEYS */;
INSERT INTO `hospname` (`id`,`hospname`) VALUES 
 (4688,'รพสต.ธาตุ'),
 (4689,'รพสต.สงเปือย'),
 (4690,'รพสต.โพน'),
 (4691,'รพสต.ศรีโพนแท่น'),
 (4692,'รพสต.นาป่าหนาด'),
 (4693,'รพสต.ท่าบม'),
 (4694,'รพสต.นาจาน'),
 (4695,'รพสต.ท่าดีหมี'),
 (4696,'รพสต.คกเลาใต้'),
 (4697,'รพสต.ผาแบ่น'),
 (4698,'รพสต.บุฮม'),
 (4699,'รพสต.หินตั้ง'),
 (4700,'รพสต.หาดทรายขาว');
/*!40000 ALTER TABLE `hospname` ENABLE KEYS */;


--
-- Definition of view `accident`
--

DROP TABLE IF EXISTS `accident`;
DROP VIEW IF EXISTS `accident`;
CREATE ALGORITHM=UNDEFINED DEFINER=`loeimoph`@`%` SQL SECURITY DEFINER VIEW `accident` AS select `hdc`.`accident`.`HOSPCODE` AS `HOSPCODE`,`hdc`.`accident`.`PID` AS `PID`,`hdc`.`accident`.`SEQ` AS `SEQ`,`hdc`.`accident`.`DATETIME_SERV` AS `DATETIME_SERV`,`hdc`.`accident`.`DATETIME_AE` AS `DATETIME_AE`,`hdc`.`accident`.`AETYPE` AS `AETYPE`,`hdc`.`accident`.`AEPLACE` AS `AEPLACE`,`hdc`.`accident`.`TYPEIN_AE` AS `TYPEIN_AE`,`hdc`.`accident`.`TRAFFIC` AS `TRAFFIC`,`hdc`.`accident`.`VEHICLE` AS `VEHICLE`,`hdc`.`accident`.`ALCOHOL` AS `ALCOHOL`,`hdc`.`accident`.`NACROTIC_DRUG` AS `NACROTIC_DRUG`,`hdc`.`accident`.`BELT` AS `BELT`,`hdc`.`accident`.`HELMET` AS `HELMET`,`hdc`.`accident`.`AIRWAY` AS `AIRWAY`,`hdc`.`accident`.`STOPBLEED` AS `STOPBLEED`,`hdc`.`accident`.`SPLINT` AS `SPLINT`,`hdc`.`accident`.`FLUID` AS `FLUID`,`hdc`.`accident`.`URGENCY` AS `URGENCY`,`hdc`.`accident`.`COMA_EYE` AS `COMA_EYE`,`hdc`.`accident`.`COMA_SPEAK` AS `COMA_SPEAK`,`hdc`.`accident`.`COMA_MOVEMENT` AS `COMA_MOVEMENT`,`hdc`.`accident`.`D_UPDATE` AS `D_UPDATE` from `hdc`.`accident` where (`hdc`.`accident`.`HOSPCODE` in ('04688','04689','04690','04691','046927','04693','04694','04695','04696','04697','04698','04699','04700','11031','13924'));

--
-- Definition of view `address`
--

DROP TABLE IF EXISTS `address`;
DROP VIEW IF EXISTS `address`;
CREATE ALGORITHM=UNDEFINED DEFINER=`loeimoph`@`%` SQL SECURITY DEFINER VIEW `address` AS select `hdc`.`address`.`HOSPCODE` AS `HOSPCODE`,`hdc`.`address`.`PID` AS `PID`,`hdc`.`address`.`ADDRESSTYPE` AS `ADDRESSTYPE`,`hdc`.`address`.`HOUSE_ID` AS `HOUSE_ID`,`hdc`.`address`.`HOUSETYPE` AS `HOUSETYPE`,`hdc`.`address`.`ROOMNO` AS `ROOMNO`,`hdc`.`address`.`CONDO` AS `CONDO`,`hdc`.`address`.`HOUSENO` AS `HOUSENO`,`hdc`.`address`.`SOISUB` AS `SOISUB`,`hdc`.`address`.`SOIMAIN` AS `SOIMAIN`,`hdc`.`address`.`ROAD` AS `ROAD`,`hdc`.`address`.`VILLANAME` AS `VILLANAME`,`hdc`.`address`.`VILLAGE` AS `VILLAGE`,`hdc`.`address`.`TAMBON` AS `TAMBON`,`hdc`.`address`.`AMPUR` AS `AMPUR`,`hdc`.`address`.`CHANGWAT` AS `CHANGWAT`,`hdc`.`address`.`TELEPHONE` AS `TELEPHONE`,`hdc`.`address`.`MOBILE` AS `MOBILE`,`hdc`.`address`.`D_UPDATE` AS `D_UPDATE` from `hdc`.`address` where (`hdc`.`address`.`HOSPCODE` in ('04688','04689','04690','04691','046927','04693','04694','04695','04696','04697','04698','04699','04700','11031','13924'));

--
-- Definition of view `admission`
--

DROP TABLE IF EXISTS `admission`;
DROP VIEW IF EXISTS `admission`;
CREATE ALGORITHM=UNDEFINED DEFINER=`loeimoph`@`%` SQL SECURITY DEFINER VIEW `admission` AS select `hdc`.`admission`.`HOSPCODE` AS `HOSPCODE`,`hdc`.`admission`.`PID` AS `PID`,`hdc`.`admission`.`SEQ` AS `SEQ`,`hdc`.`admission`.`AN` AS `AN`,`hdc`.`admission`.`DATETIME_ADMIT` AS `DATETIME_ADMIT`,`hdc`.`admission`.`WARDADMIT` AS `WARDADMIT`,`hdc`.`admission`.`INSTYPE` AS `INSTYPE`,`hdc`.`admission`.`TYPEIN` AS `TYPEIN`,`hdc`.`admission`.`REFERINHOSP` AS `REFERINHOSP`,`hdc`.`admission`.`CAUSEIN` AS `CAUSEIN`,`hdc`.`admission`.`ADMITWEIGHT` AS `ADMITWEIGHT`,`hdc`.`admission`.`ADMITHEIGHT` AS `ADMITHEIGHT`,`hdc`.`admission`.`DATETIME_DISCH` AS `DATETIME_DISCH`,`hdc`.`admission`.`WARDDISCH` AS `WARDDISCH`,`hdc`.`admission`.`DISCHSTATUS` AS `DISCHSTATUS`,`hdc`.`admission`.`DISCHTYPE` AS `DISCHTYPE`,`hdc`.`admission`.`REFEROUTHOSP` AS `REFEROUTHOSP`,`hdc`.`admission`.`CAUSEOUT` AS `CAUSEOUT`,`hdc`.`admission`.`COST` AS `COST`,`hdc`.`admission`.`PRICE` AS `PRICE`,`hdc`.`admission`.`PAYPRICE` AS `PAYPRICE`,`hdc`.`admission`.`ACTUALPAY` AS `ACTUALPAY`,`hdc`.`admission`.`PROVIDER` AS `PROVIDER`,`hdc`.`admission`.`D_UPDATE` AS `D_UPDATE`,`hdc`.`admission`.`DRG` AS `DRG`,`hdc`.`admission`.`RW` AS `RW`,`hdc`.`admission`.`ADJRW` AS `ADJRW`,`hdc`.`admission`.`ERROR` AS `ERROR`,`hdc`.`admission`.`WARNING` AS `WARNING`,`hdc`.`admission`.`ACTLOS` AS `ACTLOS`,`hdc`.`admission`.`GROUPER_VERSION` AS `GROUPER_VERSION` from `hdc`.`admission` where (`hdc`.`admission`.`HOSPCODE` in ('04688','04689','04690','04691','046927','04693','04694','04695','04696','04697','04698','04699','04700','11031','13924'));

--
-- Definition of view `anc`
--

DROP TABLE IF EXISTS `anc`;
DROP VIEW IF EXISTS `anc`;
CREATE ALGORITHM=UNDEFINED DEFINER=`loeimoph`@`%` SQL SECURITY DEFINER VIEW `anc` AS select `hdc`.`anc`.`HOSPCODE` AS `HOSPCODE`,`hdc`.`anc`.`PID` AS `PID`,`hdc`.`anc`.`SEQ` AS `SEQ`,`hdc`.`anc`.`DATE_SERV` AS `DATE_SERV`,`hdc`.`anc`.`GRAVIDA` AS `GRAVIDA`,`hdc`.`anc`.`ANCNO` AS `ANCNO`,`hdc`.`anc`.`GA` AS `GA`,`hdc`.`anc`.`ANCRESULT` AS `ANCRESULT`,`hdc`.`anc`.`ANCPLACE` AS `ANCPLACE`,`hdc`.`anc`.`PROVIDER` AS `PROVIDER`,`hdc`.`anc`.`D_UPDATE` AS `D_UPDATE` from `hdc`.`anc` where (`hdc`.`anc`.`HOSPCODE` in ('04688','04689','04690','04691','046927','04693','04694','04695','04696','04697','04698','04699','04700','11031','13924'));

--
-- Definition of view `appointment`
--

DROP TABLE IF EXISTS `appointment`;
DROP VIEW IF EXISTS `appointment`;
CREATE ALGORITHM=UNDEFINED DEFINER=`loeimoph`@`%` SQL SECURITY DEFINER VIEW `appointment` AS select `hdc`.`appointment`.`HOSPCODE` AS `HOSPCODE`,`hdc`.`appointment`.`PID` AS `PID`,`hdc`.`appointment`.`AN` AS `AN`,`hdc`.`appointment`.`SEQ` AS `SEQ`,`hdc`.`appointment`.`DATE_SERV` AS `DATE_SERV`,`hdc`.`appointment`.`CLINIC` AS `CLINIC`,`hdc`.`appointment`.`APDATE` AS `APDATE`,`hdc`.`appointment`.`APTYPE` AS `APTYPE`,`hdc`.`appointment`.`APDIAG` AS `APDIAG`,`hdc`.`appointment`.`PROVIDER` AS `PROVIDER`,`hdc`.`appointment`.`D_UPDATE` AS `D_UPDATE` from `hdc`.`appointment` where (`hdc`.`appointment`.`HOSPCODE` in ('04688','04689','04690','04691','046927','04693','04694','04695','04696','04697','04698','04699','04700','11031','13924'));

--
-- Definition of view `card`
--

DROP TABLE IF EXISTS `card`;
DROP VIEW IF EXISTS `card`;
CREATE ALGORITHM=UNDEFINED DEFINER=`loeimoph`@`%` SQL SECURITY DEFINER VIEW `card` AS select `hdc`.`card`.`HOSPCODE` AS `HOSPCODE`,`hdc`.`card`.`PID` AS `PID`,`hdc`.`card`.`INSTYPE_OLD` AS `INSTYPE_OLD`,`hdc`.`card`.`INSTYPE_NEW` AS `INSTYPE_NEW`,`hdc`.`card`.`INSID` AS `INSID`,`hdc`.`card`.`STARTDATE` AS `STARTDATE`,`hdc`.`card`.`EXPIREDATE` AS `EXPIREDATE`,`hdc`.`card`.`MAIN` AS `MAIN`,`hdc`.`card`.`SUB` AS `SUB`,`hdc`.`card`.`D_UPDATE` AS `D_UPDATE` from `hdc`.`card` where (`hdc`.`card`.`HOSPCODE` in ('04688','04689','04690','04691','046927','04693','04694','04695','04696','04697','04698','04699','04700','11031','13924'));

--
-- Definition of view `care_refer`
--

DROP TABLE IF EXISTS `care_refer`;
DROP VIEW IF EXISTS `care_refer`;
CREATE ALGORITHM=UNDEFINED DEFINER=`loeimoph`@`%` SQL SECURITY DEFINER VIEW `care_refer` AS select `hdc`.`care_refer`.`hospcode` AS `hospcode`,`hdc`.`care_refer`.`referid` AS `referid`,`hdc`.`care_refer`.`referid_province` AS `referid_province`,`hdc`.`care_refer`.`caretype` AS `caretype`,`hdc`.`care_refer`.`d_update` AS `d_update` from `hdc`.`care_refer` where (`hdc`.`care_refer`.`hospcode` in ('04688','04689','04690','04691','046927','04693','04694','04695','04696','04697','04698','04699','04700','11031','13924'));

--
-- Definition of view `charge_ipd`
--

DROP TABLE IF EXISTS `charge_ipd`;
DROP VIEW IF EXISTS `charge_ipd`;
CREATE ALGORITHM=UNDEFINED DEFINER=`loeimoph`@`%` SQL SECURITY DEFINER VIEW `charge_ipd` AS select `hdc`.`charge_ipd`.`HOSPCODE` AS `HOSPCODE`,`hdc`.`charge_ipd`.`PID` AS `PID`,`hdc`.`charge_ipd`.`AN` AS `AN`,`hdc`.`charge_ipd`.`DATETIME_ADMIT` AS `DATETIME_ADMIT`,`hdc`.`charge_ipd`.`WARDSTAY` AS `WARDSTAY`,`hdc`.`charge_ipd`.`CHARGEITEM` AS `CHARGEITEM`,`hdc`.`charge_ipd`.`CHARGELIST` AS `CHARGELIST`,`hdc`.`charge_ipd`.`QUANTITY` AS `QUANTITY`,`hdc`.`charge_ipd`.`INSTYPE` AS `INSTYPE`,`hdc`.`charge_ipd`.`COST` AS `COST`,`hdc`.`charge_ipd`.`PRICE` AS `PRICE`,`hdc`.`charge_ipd`.`PAYPRICE` AS `PAYPRICE`,`hdc`.`charge_ipd`.`D_UPDATE` AS `D_UPDATE` from `hdc`.`charge_ipd` where (`hdc`.`charge_ipd`.`HOSPCODE` in ('04688','04689','04690','04691','046927','04693','04694','04695','04696','04697','04698','04699','04700','11031','13924'));

--
-- Definition of view `charge_opd`
--

DROP TABLE IF EXISTS `charge_opd`;
DROP VIEW IF EXISTS `charge_opd`;
CREATE ALGORITHM=UNDEFINED DEFINER=`loeimoph`@`%` SQL SECURITY DEFINER VIEW `charge_opd` AS select `hdc`.`charge_opd`.`HOSPCODE` AS `HOSPCODE`,`hdc`.`charge_opd`.`PID` AS `PID`,`hdc`.`charge_opd`.`SEQ` AS `SEQ`,`hdc`.`charge_opd`.`DATE_SERV` AS `DATE_SERV`,`hdc`.`charge_opd`.`CLINIC` AS `CLINIC`,`hdc`.`charge_opd`.`CHARGEITEM` AS `CHARGEITEM`,`hdc`.`charge_opd`.`CHARGELIST` AS `CHARGELIST`,`hdc`.`charge_opd`.`QUANTITY` AS `QUANTITY`,`hdc`.`charge_opd`.`INSTYPE` AS `INSTYPE`,`hdc`.`charge_opd`.`COST` AS `COST`,`hdc`.`charge_opd`.`PRICE` AS `PRICE`,`hdc`.`charge_opd`.`PAYPRICE` AS `PAYPRICE`,`hdc`.`charge_opd`.`D_UPDATE` AS `D_UPDATE` from `hdc`.`charge_opd` where (`hdc`.`charge_opd`.`HOSPCODE` in ('04688','04689','04690','04691','046927','04693','04694','04695','04696','04697','04698','04699','04700','11031','13924'));

--
-- Definition of view `chronic`
--

DROP TABLE IF EXISTS `chronic`;
DROP VIEW IF EXISTS `chronic`;
CREATE ALGORITHM=UNDEFINED DEFINER=`loeimoph`@`%` SQL SECURITY DEFINER VIEW `chronic` AS select `hdc`.`chronic`.`HOSPCODE` AS `HOSPCODE`,`hdc`.`chronic`.`PID` AS `PID`,`hdc`.`chronic`.`DATE_DIAG` AS `DATE_DIAG`,`hdc`.`chronic`.`CHRONIC` AS `CHRONIC`,`hdc`.`chronic`.`HOSP_DX` AS `HOSP_DX`,`hdc`.`chronic`.`HOSP_RX` AS `HOSP_RX`,`hdc`.`chronic`.`DATE_DISCH` AS `DATE_DISCH`,`hdc`.`chronic`.`TYPEDISCH` AS `TYPEDISCH`,`hdc`.`chronic`.`D_UPDATE` AS `D_UPDATE` from `hdc`.`chronic` where (`hdc`.`chronic`.`HOSPCODE` in ('04688','04689','04690','04691','046927','04693','04694','04695','04696','04697','04698','04699','04700','11031','13924'));

--
-- Definition of view `chronicfu`
--

DROP TABLE IF EXISTS `chronicfu`;
DROP VIEW IF EXISTS `chronicfu`;
CREATE ALGORITHM=UNDEFINED DEFINER=`loeimoph`@`%` SQL SECURITY DEFINER VIEW `chronicfu` AS select `hdc`.`chronicfu`.`HOSPCODE` AS `HOSPCODE`,`hdc`.`chronicfu`.`PID` AS `PID`,`hdc`.`chronicfu`.`SEQ` AS `SEQ`,`hdc`.`chronicfu`.`DATE_SERV` AS `DATE_SERV`,`hdc`.`chronicfu`.`WEIGHT` AS `WEIGHT`,`hdc`.`chronicfu`.`HEIGHT` AS `HEIGHT`,`hdc`.`chronicfu`.`WAIST_CM` AS `WAIST_CM`,`hdc`.`chronicfu`.`SBP` AS `SBP`,`hdc`.`chronicfu`.`DBP` AS `DBP`,`hdc`.`chronicfu`.`FOOT` AS `FOOT`,`hdc`.`chronicfu`.`RETINA` AS `RETINA`,`hdc`.`chronicfu`.`PROVIDER` AS `PROVIDER`,`hdc`.`chronicfu`.`D_UPDATE` AS `D_UPDATE` from `hdc`.`chronicfu` where (`hdc`.`chronicfu`.`HOSPCODE` in ('04688','04689','04690','04691','046927','04693','04694','04695','04696','04697','04698','04699','04700','11031','13924'));

--
-- Definition of view `clinical_refer`
--

DROP TABLE IF EXISTS `clinical_refer`;
DROP VIEW IF EXISTS `clinical_refer`;
CREATE ALGORITHM=UNDEFINED DEFINER=`loeimoph`@`%` SQL SECURITY DEFINER VIEW `clinical_refer` AS select `hdc`.`clinical_refer`.`hospcode` AS `hospcode`,`hdc`.`clinical_refer`.`referid` AS `referid`,`hdc`.`clinical_refer`.`referid_province` AS `referid_province`,`hdc`.`clinical_refer`.`datetime_assess` AS `datetime_assess`,`hdc`.`clinical_refer`.`clinicalcode` AS `clinicalcode`,`hdc`.`clinical_refer`.`clinicalname` AS `clinicalname`,`hdc`.`clinical_refer`.`clinicalvalue` AS `clinicalvalue`,`hdc`.`clinical_refer`.`clinicalresult` AS `clinicalresult`,`hdc`.`clinical_refer`.`d_update` AS `d_update` from `hdc`.`clinical_refer` where (`hdc`.`clinical_refer`.`hospcode` in ('04688','04689','04690','04691','046927','04693','04694','04695','04696','04697','04698','04699','04700','11031','13924'));

--
-- Definition of view `community_activity`
--

DROP TABLE IF EXISTS `community_activity`;
DROP VIEW IF EXISTS `community_activity`;
CREATE ALGORITHM=UNDEFINED DEFINER=`loeimoph`@`%` SQL SECURITY DEFINER VIEW `community_activity` AS select `hdc`.`community_activity`.`HOSPCODE` AS `HOSPCODE`,`hdc`.`community_activity`.`VID` AS `VID`,`hdc`.`community_activity`.`DATE_START` AS `DATE_START`,`hdc`.`community_activity`.`DATE_FINISH` AS `DATE_FINISH`,`hdc`.`community_activity`.`COMACTIVITY` AS `COMACTIVITY`,`hdc`.`community_activity`.`PROVIDER` AS `PROVIDER`,`hdc`.`community_activity`.`D_UPDATE` AS `D_UPDATE` from `hdc`.`community_activity` where (`hdc`.`community_activity`.`HOSPCODE` in ('04688','04689','04690','04691','046927','04693','04694','04695','04696','04697','04698','04699','04700','11031','13924'));

--
-- Definition of view `community_service`
--

DROP TABLE IF EXISTS `community_service`;
DROP VIEW IF EXISTS `community_service`;
CREATE ALGORITHM=UNDEFINED DEFINER=`loeimoph`@`%` SQL SECURITY DEFINER VIEW `community_service` AS select `hdc`.`community_service`.`HOSPCODE` AS `HOSPCODE`,`hdc`.`community_service`.`PID` AS `PID`,`hdc`.`community_service`.`SEQ` AS `SEQ`,`hdc`.`community_service`.`DATE_SERV` AS `DATE_SERV`,`hdc`.`community_service`.`COMSERVICE` AS `COMSERVICE`,`hdc`.`community_service`.`PROVIDER` AS `PROVIDER`,`hdc`.`community_service`.`D_UPDATE` AS `D_UPDATE` from `hdc`.`community_service` where (`hdc`.`community_service`.`HOSPCODE` in ('04688','04689','04690','04691','046927','04693','04694','04695','04696','04697','04698','04699','04700','11031','13924'));

--
-- Definition of view `death`
--

DROP TABLE IF EXISTS `death`;
DROP VIEW IF EXISTS `death`;
CREATE ALGORITHM=UNDEFINED DEFINER=`loeimoph`@`%` SQL SECURITY DEFINER VIEW `death` AS select `hdc`.`death`.`HOSPCODE` AS `HOSPCODE`,`hdc`.`death`.`PID` AS `PID`,`hdc`.`death`.`HOSPDEATH` AS `HOSPDEATH`,`hdc`.`death`.`AN` AS `AN`,`hdc`.`death`.`SEQ` AS `SEQ`,`hdc`.`death`.`DDEATH` AS `DDEATH`,`hdc`.`death`.`CDEATH_A` AS `CDEATH_A`,`hdc`.`death`.`CDEATH_B` AS `CDEATH_B`,`hdc`.`death`.`CDEATH_C` AS `CDEATH_C`,`hdc`.`death`.`CDEATH_D` AS `CDEATH_D`,`hdc`.`death`.`ODISEASE` AS `ODISEASE`,`hdc`.`death`.`CDEATH` AS `CDEATH`,`hdc`.`death`.`PREGDEATH` AS `PREGDEATH`,`hdc`.`death`.`PDEATH` AS `PDEATH`,`hdc`.`death`.`PROVIDER` AS `PROVIDER`,`hdc`.`death`.`D_UPDATE` AS `D_UPDATE` from `hdc`.`death` where (`hdc`.`death`.`HOSPCODE` in ('04688','04689','04690','04691','046927','04693','04694','04695','04696','04697','04698','04699','04700','11031','13924'));

--
-- Definition of view `dental`
--

DROP TABLE IF EXISTS `dental`;
DROP VIEW IF EXISTS `dental`;
CREATE ALGORITHM=UNDEFINED DEFINER=`loeimoph`@`%` SQL SECURITY DEFINER VIEW `dental` AS select `hdc`.`dental`.`HOSPCODE` AS `HOSPCODE`,`hdc`.`dental`.`PID` AS `PID`,`hdc`.`dental`.`SEQ` AS `SEQ`,`hdc`.`dental`.`DATE_SERV` AS `DATE_SERV`,`hdc`.`dental`.`DENTTYPE` AS `DENTTYPE`,`hdc`.`dental`.`SERVPLACE` AS `SERVPLACE`,`hdc`.`dental`.`PTEETH` AS `PTEETH`,`hdc`.`dental`.`PCARIES` AS `PCARIES`,`hdc`.`dental`.`PFILLING` AS `PFILLING`,`hdc`.`dental`.`PEXTRACT` AS `PEXTRACT`,`hdc`.`dental`.`DTEETH` AS `DTEETH`,`hdc`.`dental`.`DCARIES` AS `DCARIES`,`hdc`.`dental`.`DFILLING` AS `DFILLING`,`hdc`.`dental`.`DEXTRACT` AS `DEXTRACT`,`hdc`.`dental`.`NEED_FLUORIDE` AS `NEED_FLUORIDE`,`hdc`.`dental`.`NEED_SCALING` AS `NEED_SCALING`,`hdc`.`dental`.`NEED_SEALANT` AS `NEED_SEALANT`,`hdc`.`dental`.`NEED_PFILLING` AS `NEED_PFILLING`,`hdc`.`dental`.`NEED_DFILLING` AS `NEED_DFILLING`,`hdc`.`dental`.`NEED_PEXTRACT` AS `NEED_PEXTRACT`,`hdc`.`dental`.`NEED_DEXTRACT` AS `NEED_DEXTRACT`,`hdc`.`dental`.`NPROSTHESIS` AS `NPROSTHESIS`,`hdc`.`dental`.`PERMANENT_PERMANENT` AS `PERMANENT_PERMANENT`,`hdc`.`dental`.`PERMANENT_PROSTHESIS` AS `PERMANENT_PROSTHESIS`,`hdc`.`dental`.`PROSTHESIS_PROSTHESIS` AS `PROSTHESIS_PROSTHESIS`,`hdc`.`dental`.`GUM` AS `GUM`,`hdc`.`dental`.`SCHOOLTYPE` AS `SCHOOLTYPE`,`hdc`.`dental`.`CLASS` AS `CLASS`,`hdc`.`dental`.`PROVIDER` AS `PROVIDER`,`hdc`.`dental`.`D_UPDATE` AS `D_UPDATE` from `hdc`.`dental` where (`hdc`.`dental`.`HOSPCODE` in ('04688','04689','04690','04691','046927','04693','04694','04695','04696','04697','04698','04699','04700','11031','13924'));

--
-- Definition of view `diagnosis_ipd`
--

DROP TABLE IF EXISTS `diagnosis_ipd`;
DROP VIEW IF EXISTS `diagnosis_ipd`;
CREATE ALGORITHM=UNDEFINED DEFINER=`loeimoph`@`%` SQL SECURITY DEFINER VIEW `diagnosis_ipd` AS select `hdc`.`diagnosis_ipd`.`HOSPCODE` AS `HOSPCODE`,`hdc`.`diagnosis_ipd`.`PID` AS `PID`,`hdc`.`diagnosis_ipd`.`AN` AS `AN`,`hdc`.`diagnosis_ipd`.`DATETIME_ADMIT` AS `DATETIME_ADMIT`,`hdc`.`diagnosis_ipd`.`WARDDIAG` AS `WARDDIAG`,`hdc`.`diagnosis_ipd`.`DIAGTYPE` AS `DIAGTYPE`,`hdc`.`diagnosis_ipd`.`DIAGCODE` AS `DIAGCODE`,`hdc`.`diagnosis_ipd`.`PROVIDER` AS `PROVIDER`,`hdc`.`diagnosis_ipd`.`D_UPDATE` AS `D_UPDATE` from `hdc`.`diagnosis_ipd` where (`hdc`.`diagnosis_ipd`.`HOSPCODE` in ('04688','04689','04690','04691','046927','04693','04694','04695','04696','04697','04698','04699','04700','11031','13924'));

--
-- Definition of view `diagnosis_opd`
--

DROP TABLE IF EXISTS `diagnosis_opd`;
DROP VIEW IF EXISTS `diagnosis_opd`;
CREATE ALGORITHM=UNDEFINED DEFINER=`loeimoph`@`%` SQL SECURITY DEFINER VIEW `diagnosis_opd` AS select `hdc`.`diagnosis_opd`.`HOSPCODE` AS `HOSPCODE`,`hdc`.`diagnosis_opd`.`PID` AS `PID`,`hdc`.`diagnosis_opd`.`SEQ` AS `SEQ`,`hdc`.`diagnosis_opd`.`DATE_SERV` AS `DATE_SERV`,`hdc`.`diagnosis_opd`.`DIAGTYPE` AS `DIAGTYPE`,`hdc`.`diagnosis_opd`.`DIAGCODE` AS `DIAGCODE`,`hdc`.`diagnosis_opd`.`CLINIC` AS `CLINIC`,`hdc`.`diagnosis_opd`.`PROVIDER` AS `PROVIDER`,`hdc`.`diagnosis_opd`.`D_UPDATE` AS `D_UPDATE` from `hdc`.`diagnosis_opd` where (`hdc`.`diagnosis_opd`.`HOSPCODE` in ('04688','04689','04690','04691','046927','04693','04694','04695','04696','04697','04698','04699','04700','11031','13924'));

--
-- Definition of view `disability`
--

DROP TABLE IF EXISTS `disability`;
DROP VIEW IF EXISTS `disability`;
CREATE ALGORITHM=UNDEFINED DEFINER=`loeimoph`@`%` SQL SECURITY DEFINER VIEW `disability` AS select `hdc`.`disability`.`HOSPCODE` AS `HOSPCODE`,`hdc`.`disability`.`DISABID` AS `DISABID`,`hdc`.`disability`.`PID` AS `PID`,`hdc`.`disability`.`DISABTYPE` AS `DISABTYPE`,`hdc`.`disability`.`DISABCAUSE` AS `DISABCAUSE`,`hdc`.`disability`.`DIAGCODE` AS `DIAGCODE`,`hdc`.`disability`.`DATE_DETECT` AS `DATE_DETECT`,`hdc`.`disability`.`DATE_DISAB` AS `DATE_DISAB`,`hdc`.`disability`.`D_UPDATE` AS `D_UPDATE` from `hdc`.`disability` where (`hdc`.`disability`.`HOSPCODE` in ('04688','04689','04690','04691','046927','04693','04694','04695','04696','04697','04698','04699','04700','11031','13924'));

--
-- Definition of view `drug_ipd`
--

DROP TABLE IF EXISTS `drug_ipd`;
DROP VIEW IF EXISTS `drug_ipd`;
CREATE ALGORITHM=UNDEFINED DEFINER=`loeimoph`@`%` SQL SECURITY DEFINER VIEW `drug_ipd` AS select `hdc`.`drug_ipd`.`HOSPCODE` AS `HOSPCODE`,`hdc`.`drug_ipd`.`PID` AS `PID`,`hdc`.`drug_ipd`.`AN` AS `AN`,`hdc`.`drug_ipd`.`DATETIME_ADMIT` AS `DATETIME_ADMIT`,`hdc`.`drug_ipd`.`WARDSTAY` AS `WARDSTAY`,`hdc`.`drug_ipd`.`TYPEDRUG` AS `TYPEDRUG`,`hdc`.`drug_ipd`.`DIDSTD` AS `DIDSTD`,`hdc`.`drug_ipd`.`DNAME` AS `DNAME`,`hdc`.`drug_ipd`.`DATESTART` AS `DATESTART`,`hdc`.`drug_ipd`.`DATEFINISH` AS `DATEFINISH`,`hdc`.`drug_ipd`.`AMOUNT` AS `AMOUNT`,`hdc`.`drug_ipd`.`UNIT` AS `UNIT`,`hdc`.`drug_ipd`.`UNIT_PACKING` AS `UNIT_PACKING`,`hdc`.`drug_ipd`.`DRUGPRICE` AS `DRUGPRICE`,`hdc`.`drug_ipd`.`DRUGCOST` AS `DRUGCOST`,`hdc`.`drug_ipd`.`PROVIDER` AS `PROVIDER`,`hdc`.`drug_ipd`.`D_UPDATE` AS `D_UPDATE` from `hdc`.`drug_ipd` where (`hdc`.`drug_ipd`.`HOSPCODE` in ('04688','04689','04690','04691','046927','04693','04694','04695','04696','04697','04698','04699','04700','11031','13924'));

--
-- Definition of view `drug_opd`
--

DROP TABLE IF EXISTS `drug_opd`;
DROP VIEW IF EXISTS `drug_opd`;
CREATE ALGORITHM=UNDEFINED DEFINER=`loeimoph`@`%` SQL SECURITY DEFINER VIEW `drug_opd` AS select `hdc`.`drug_opd`.`HOSPCODE` AS `HOSPCODE`,`hdc`.`drug_opd`.`PID` AS `PID`,`hdc`.`drug_opd`.`SEQ` AS `SEQ`,`hdc`.`drug_opd`.`DATE_SERV` AS `DATE_SERV`,`hdc`.`drug_opd`.`CLINIC` AS `CLINIC`,`hdc`.`drug_opd`.`DIDSTD` AS `DIDSTD`,`hdc`.`drug_opd`.`DNAME` AS `DNAME`,`hdc`.`drug_opd`.`AMOUNT` AS `AMOUNT`,`hdc`.`drug_opd`.`UNIT` AS `UNIT`,`hdc`.`drug_opd`.`UNIT_PACKING` AS `UNIT_PACKING`,`hdc`.`drug_opd`.`DRUGPRICE` AS `DRUGPRICE`,`hdc`.`drug_opd`.`DRUGCOST` AS `DRUGCOST`,`hdc`.`drug_opd`.`PROVIDER` AS `PROVIDER`,`hdc`.`drug_opd`.`D_UPDATE` AS `D_UPDATE` from `hdc`.`drug_opd` where (`hdc`.`drug_opd`.`HOSPCODE` in ('04688','04689','04690','04691','046927','04693','04694','04695','04696','04697','04698','04699','04700','11031','13924'));

--
-- Definition of view `drug_refer`
--

DROP TABLE IF EXISTS `drug_refer`;
DROP VIEW IF EXISTS `drug_refer`;
CREATE ALGORITHM=UNDEFINED DEFINER=`loeimoph`@`%` SQL SECURITY DEFINER VIEW `drug_refer` AS select `hdc`.`drug_refer`.`hospcode` AS `hospcode`,`hdc`.`drug_refer`.`referid` AS `referid`,`hdc`.`drug_refer`.`referid_province` AS `referid_province`,`hdc`.`drug_refer`.`datetime_dstart` AS `datetime_dstart`,`hdc`.`drug_refer`.`datetime_dfinish` AS `datetime_dfinish`,`hdc`.`drug_refer`.`didstd` AS `didstd`,`hdc`.`drug_refer`.`dname` AS `dname`,`hdc`.`drug_refer`.`ddescription` AS `ddescription`,`hdc`.`drug_refer`.`d_update` AS `d_update` from `hdc`.`drug_refer` where (`hdc`.`drug_refer`.`hospcode` in ('04688','04689','04690','04691','046927','04693','04694','04695','04696','04697','04698','04699','04700','11031','13924'));

--
-- Definition of view `drugallergy`
--

DROP TABLE IF EXISTS `drugallergy`;
DROP VIEW IF EXISTS `drugallergy`;
CREATE ALGORITHM=UNDEFINED DEFINER=`loeimoph`@`%` SQL SECURITY DEFINER VIEW `drugallergy` AS select `hdc`.`drugallergy`.`HOSPCODE` AS `HOSPCODE`,`hdc`.`drugallergy`.`PID` AS `PID`,`hdc`.`drugallergy`.`DATERECORD` AS `DATERECORD`,`hdc`.`drugallergy`.`DRUGALLERGY` AS `DRUGALLERGY`,`hdc`.`drugallergy`.`DNAME` AS `DNAME`,`hdc`.`drugallergy`.`TYPEDX` AS `TYPEDX`,`hdc`.`drugallergy`.`ALEVEL` AS `ALEVEL`,`hdc`.`drugallergy`.`SYMPTOM` AS `SYMPTOM`,`hdc`.`drugallergy`.`INFORMANT` AS `INFORMANT`,`hdc`.`drugallergy`.`INFORMHOSP` AS `INFORMHOSP`,`hdc`.`drugallergy`.`D_UPDATE` AS `D_UPDATE` from `hdc`.`drugallergy` where (`hdc`.`drugallergy`.`HOSPCODE` in ('04688','04689','04690','04691','046927','04693','04694','04695','04696','04697','04698','04699','04700','11031','13924'));

--
-- Definition of view `epi`
--

DROP TABLE IF EXISTS `epi`;
DROP VIEW IF EXISTS `epi`;
CREATE ALGORITHM=UNDEFINED DEFINER=`loeimoph`@`%` SQL SECURITY DEFINER VIEW `epi` AS select `hdc`.`epi`.`HOSPCODE` AS `HOSPCODE`,`hdc`.`epi`.`PID` AS `PID`,`hdc`.`epi`.`SEQ` AS `SEQ`,`hdc`.`epi`.`DATE_SERV` AS `DATE_SERV`,`hdc`.`epi`.`VACCINETYPE` AS `VACCINETYPE`,`hdc`.`epi`.`VACCINEPLACE` AS `VACCINEPLACE`,`hdc`.`epi`.`PROVIDER` AS `PROVIDER`,`hdc`.`epi`.`D_UPDATE` AS `D_UPDATE` from `hdc`.`epi` where (`hdc`.`epi`.`HOSPCODE` in ('04688','04689','04690','04691','046927','04693','04694','04695','04696','04697','04698','04699','04700','11031','13924'));

--
-- Definition of view `fp`
--

DROP TABLE IF EXISTS `fp`;
DROP VIEW IF EXISTS `fp`;
CREATE ALGORITHM=UNDEFINED DEFINER=`loeimoph`@`%` SQL SECURITY DEFINER VIEW `fp` AS select `hdc`.`fp`.`HOSPCODE` AS `HOSPCODE`,`hdc`.`fp`.`PID` AS `PID`,`hdc`.`fp`.`SEQ` AS `SEQ`,`hdc`.`fp`.`DATE_SERV` AS `DATE_SERV`,`hdc`.`fp`.`FPTYPE` AS `FPTYPE`,`hdc`.`fp`.`FPPLACE` AS `FPPLACE`,`hdc`.`fp`.`PROVIDER` AS `PROVIDER`,`hdc`.`fp`.`D_UPDATE` AS `D_UPDATE` from `hdc`.`fp` where (`hdc`.`fp`.`HOSPCODE` in ('04688','04689','04690','04691','046927','04693','04694','04695','04696','04697','04698','04699','04700','11031','13924'));

--
-- Definition of view `functional`
--

DROP TABLE IF EXISTS `functional`;
DROP VIEW IF EXISTS `functional`;
CREATE ALGORITHM=UNDEFINED DEFINER=`loeimoph`@`%` SQL SECURITY DEFINER VIEW `functional` AS select `hdc`.`functional`.`HOSPCODE` AS `HOSPCODE`,`hdc`.`functional`.`PID` AS `PID`,`hdc`.`functional`.`SEQ` AS `SEQ`,`hdc`.`functional`.`DATE_SERV` AS `DATE_SERV`,`hdc`.`functional`.`FUNCTIONAL_TEST` AS `FUNCTIONAL_TEST`,`hdc`.`functional`.`TESTRESULT` AS `TESTRESULT`,`hdc`.`functional`.`DEPENDENT` AS `DEPENDENT`,`hdc`.`functional`.`PROVIDER` AS `PROVIDER`,`hdc`.`functional`.`D_UPDATE` AS `D_UPDATE` from `hdc`.`functional` where (`hdc`.`functional`.`HOSPCODE` in ('04688','04689','04690','04691','046927','04693','04694','04695','04696','04697','04698','04699','04700','11031','13924'));

--
-- Definition of view `home`
--

DROP TABLE IF EXISTS `home`;
DROP VIEW IF EXISTS `home`;
CREATE ALGORITHM=UNDEFINED DEFINER=`loeimoph`@`%` SQL SECURITY DEFINER VIEW `home` AS select `hdc`.`home`.`HOSPCODE` AS `HOSPCODE`,`hdc`.`home`.`HID` AS `HID`,`hdc`.`home`.`HOUSE_ID` AS `HOUSE_ID`,`hdc`.`home`.`HOUSETYPE` AS `HOUSETYPE`,`hdc`.`home`.`ROOMNO` AS `ROOMNO`,`hdc`.`home`.`CONDO` AS `CONDO`,`hdc`.`home`.`HOUSE` AS `HOUSE`,`hdc`.`home`.`SOISUB` AS `SOISUB`,`hdc`.`home`.`SOIMAIN` AS `SOIMAIN`,`hdc`.`home`.`ROAD` AS `ROAD`,`hdc`.`home`.`VILLANAME` AS `VILLANAME`,`hdc`.`home`.`VILLAGE` AS `VILLAGE`,`hdc`.`home`.`TAMBON` AS `TAMBON`,`hdc`.`home`.`AMPUR` AS `AMPUR`,`hdc`.`home`.`CHANGWAT` AS `CHANGWAT`,`hdc`.`home`.`TELEPHONE` AS `TELEPHONE`,`hdc`.`home`.`LATITUDE` AS `LATITUDE`,`hdc`.`home`.`LONGITUDE` AS `LONGITUDE`,`hdc`.`home`.`NFAMILY` AS `NFAMILY`,`hdc`.`home`.`LOCATYPE` AS `LOCATYPE`,`hdc`.`home`.`VHVID` AS `VHVID`,`hdc`.`home`.`HEADID` AS `HEADID`,`hdc`.`home`.`TOILET` AS `TOILET`,`hdc`.`home`.`WATER` AS `WATER`,`hdc`.`home`.`WATERTYPE` AS `WATERTYPE`,`hdc`.`home`.`GARBAGE` AS `GARBAGE`,`hdc`.`home`.`HOUSING` AS `HOUSING`,`hdc`.`home`.`DURABILITY` AS `DURABILITY`,`hdc`.`home`.`CLEANLINESS` AS `CLEANLINESS`,`hdc`.`home`.`VENTILATION` AS `VENTILATION`,`hdc`.`home`.`LIGHT` AS `LIGHT`,`hdc`.`home`.`WATERTM` AS `WATERTM`,`hdc`.`home`.`MFOOD` AS `MFOOD`,`hdc`.`home`.`BCONTROL` AS `BCONTROL`,`hdc`.`home`.`ACONTROL` AS `ACONTROL`,`hdc`.`home`.`CHEMICAL` AS `CHEMICAL`,`hdc`.`home`.`OUTDATE` AS `OUTDATE`,`hdc`.`home`.`D_UPDATE` AS `D_UPDATE` from `hdc`.`home` where (`hdc`.`home`.`HOSPCODE` in ('04688','04689','04690','04691','046927','04693','04694','04695','04696','04697','04698','04699','04700','11031','13924'));

--
-- Definition of view `icf`
--

DROP TABLE IF EXISTS `icf`;
DROP VIEW IF EXISTS `icf`;
CREATE ALGORITHM=UNDEFINED DEFINER=`loeimoph`@`%` SQL SECURITY DEFINER VIEW `icf` AS select `hdc`.`icf`.`HOSPCODE` AS `HOSPCODE`,`hdc`.`icf`.`DISABID` AS `DISABID`,`hdc`.`icf`.`PID` AS `PID`,`hdc`.`icf`.`SEQ` AS `SEQ`,`hdc`.`icf`.`DATE_SERV` AS `DATE_SERV`,`hdc`.`icf`.`ICF` AS `ICF`,`hdc`.`icf`.`QUALIFIER` AS `QUALIFIER`,`hdc`.`icf`.`PROVIDER` AS `PROVIDER`,`hdc`.`icf`.`D_UPDATE` AS `D_UPDATE` from `hdc`.`icf` where (`hdc`.`icf`.`HOSPCODE` in ('04688','04689','04690','04691','046927','04693','04694','04695','04696','04697','04698','04699','04700','11031','13924'));

--
-- Definition of view `investigation_refer`
--

DROP TABLE IF EXISTS `investigation_refer`;
DROP VIEW IF EXISTS `investigation_refer`;
CREATE ALGORITHM=UNDEFINED DEFINER=`loeimoph`@`%` SQL SECURITY DEFINER VIEW `investigation_refer` AS select `hdc`.`investigation_refer`.`hospcode` AS `hospcode`,`hdc`.`investigation_refer`.`referid` AS `referid`,`hdc`.`investigation_refer`.`referid_province` AS `referid_province`,`hdc`.`investigation_refer`.`datetime_invest` AS `datetime_invest`,`hdc`.`investigation_refer`.`investcode` AS `investcode`,`hdc`.`investigation_refer`.`investname` AS `investname`,`hdc`.`investigation_refer`.`datetime_report` AS `datetime_report`,`hdc`.`investigation_refer`.`investvalue` AS `investvalue`,`hdc`.`investigation_refer`.`investresult` AS `investresult`,`hdc`.`investigation_refer`.`d_update` AS `d_update` from `hdc`.`investigation_refer` where (`hdc`.`investigation_refer`.`hospcode` in ('04688','04689','04690','04691','046927','04693','04694','04695','04696','04697','04698','04699','04700','11031','13924'));

--
-- Definition of view `labfu`
--

DROP TABLE IF EXISTS `labfu`;
DROP VIEW IF EXISTS `labfu`;
CREATE ALGORITHM=UNDEFINED DEFINER=`loeimoph`@`%` SQL SECURITY DEFINER VIEW `labfu` AS select `hdc`.`labfu`.`HOSPCODE` AS `HOSPCODE`,`hdc`.`labfu`.`PID` AS `PID`,`hdc`.`labfu`.`SEQ` AS `SEQ`,`hdc`.`labfu`.`DATE_SERV` AS `DATE_SERV`,`hdc`.`labfu`.`LABTEST` AS `LABTEST`,`hdc`.`labfu`.`LABRESULT` AS `LABRESULT`,`hdc`.`labfu`.`D_UPDATE` AS `D_UPDATE` from `hdc`.`labfu` where (`hdc`.`labfu`.`HOSPCODE` in ('04688','04689','04690','04691','046927','04693','04694','04695','04696','04697','04698','04699','04700','11031','13924'));

--
-- Definition of view `labor`
--

DROP TABLE IF EXISTS `labor`;
DROP VIEW IF EXISTS `labor`;
CREATE ALGORITHM=UNDEFINED DEFINER=`loeimoph`@`%` SQL SECURITY DEFINER VIEW `labor` AS select `hdc`.`labor`.`HOSPCODE` AS `HOSPCODE`,`hdc`.`labor`.`PID` AS `PID`,`hdc`.`labor`.`GRAVIDA` AS `GRAVIDA`,`hdc`.`labor`.`LMP` AS `LMP`,`hdc`.`labor`.`EDC` AS `EDC`,`hdc`.`labor`.`BDATE` AS `BDATE`,`hdc`.`labor`.`BRESULT` AS `BRESULT`,`hdc`.`labor`.`BPLACE` AS `BPLACE`,`hdc`.`labor`.`BHOSP` AS `BHOSP`,`hdc`.`labor`.`BTYPE` AS `BTYPE`,`hdc`.`labor`.`BDOCTOR` AS `BDOCTOR`,`hdc`.`labor`.`LBORN` AS `LBORN`,`hdc`.`labor`.`SBORN` AS `SBORN`,`hdc`.`labor`.`D_UPDATE` AS `D_UPDATE` from `hdc`.`labor` where (`hdc`.`labor`.`HOSPCODE` in ('04688','04689','04690','04691','046927','04693','04694','04695','04696','04697','04698','04699','04700','11031','13924'));

--
-- Definition of view `ncdscreen`
--

DROP TABLE IF EXISTS `ncdscreen`;
DROP VIEW IF EXISTS `ncdscreen`;
CREATE ALGORITHM=UNDEFINED DEFINER=`loeimoph`@`%` SQL SECURITY DEFINER VIEW `ncdscreen` AS select `hdc`.`ncdscreen`.`HOSPCODE` AS `HOSPCODE`,`hdc`.`ncdscreen`.`PID` AS `PID`,`hdc`.`ncdscreen`.`SEQ` AS `SEQ`,`hdc`.`ncdscreen`.`DATE_SERV` AS `DATE_SERV`,`hdc`.`ncdscreen`.`SERVPLACE` AS `SERVPLACE`,`hdc`.`ncdscreen`.`SMOKE` AS `SMOKE`,`hdc`.`ncdscreen`.`ALCOHOL` AS `ALCOHOL`,`hdc`.`ncdscreen`.`DMFAMILY` AS `DMFAMILY`,`hdc`.`ncdscreen`.`HTFAMILY` AS `HTFAMILY`,`hdc`.`ncdscreen`.`WEIGHT` AS `WEIGHT`,`hdc`.`ncdscreen`.`HEIGHT` AS `HEIGHT`,`hdc`.`ncdscreen`.`WAIST_CM` AS `WAIST_CM`,`hdc`.`ncdscreen`.`SBP_1` AS `SBP_1`,`hdc`.`ncdscreen`.`DBP_1` AS `DBP_1`,`hdc`.`ncdscreen`.`SBP_2` AS `SBP_2`,`hdc`.`ncdscreen`.`DBP_2` AS `DBP_2`,`hdc`.`ncdscreen`.`BSLEVEL` AS `BSLEVEL`,`hdc`.`ncdscreen`.`BSTEST` AS `BSTEST`,`hdc`.`ncdscreen`.`SCREENPLACE` AS `SCREENPLACE`,`hdc`.`ncdscreen`.`PROVIDER` AS `PROVIDER`,`hdc`.`ncdscreen`.`D_UPDATE` AS `D_UPDATE` from `hdc`.`ncdscreen` where (`hdc`.`ncdscreen`.`HOSPCODE` in ('04688','04689','04690','04691','046927','04693','04694','04695','04696','04697','04698','04699','04700','11031','13924'));

--
-- Definition of view `newborn`
--

DROP TABLE IF EXISTS `newborn`;
DROP VIEW IF EXISTS `newborn`;
CREATE ALGORITHM=UNDEFINED DEFINER=`loeimoph`@`%` SQL SECURITY DEFINER VIEW `newborn` AS select `hdc`.`newborn`.`HOSPCODE` AS `HOSPCODE`,`hdc`.`newborn`.`PID` AS `PID`,`hdc`.`newborn`.`MPID` AS `MPID`,`hdc`.`newborn`.`GRAVIDA` AS `GRAVIDA`,`hdc`.`newborn`.`GA` AS `GA`,`hdc`.`newborn`.`BDATE` AS `BDATE`,`hdc`.`newborn`.`BTIME` AS `BTIME`,`hdc`.`newborn`.`BPLACE` AS `BPLACE`,`hdc`.`newborn`.`BHOSP` AS `BHOSP`,`hdc`.`newborn`.`BIRTHNO` AS `BIRTHNO`,`hdc`.`newborn`.`BTYPE` AS `BTYPE`,`hdc`.`newborn`.`BDOCTOR` AS `BDOCTOR`,`hdc`.`newborn`.`BWEIGHT` AS `BWEIGHT`,`hdc`.`newborn`.`ASPHYXIA` AS `ASPHYXIA`,`hdc`.`newborn`.`VITK` AS `VITK`,`hdc`.`newborn`.`TSH` AS `TSH`,`hdc`.`newborn`.`TSHRESULT` AS `TSHRESULT`,`hdc`.`newborn`.`D_UPDATE` AS `D_UPDATE` from `hdc`.`newborn` where (`hdc`.`newborn`.`HOSPCODE` in ('04688','04689','04690','04691','046927','04693','04694','04695','04696','04697','04698','04699','04700','11031','13924'));

--
-- Definition of view `newborncare`
--

DROP TABLE IF EXISTS `newborncare`;
DROP VIEW IF EXISTS `newborncare`;
CREATE ALGORITHM=UNDEFINED DEFINER=`loeimoph`@`%` SQL SECURITY DEFINER VIEW `newborncare` AS select `hdc`.`newborncare`.`HOSPCODE` AS `HOSPCODE`,`hdc`.`newborncare`.`PID` AS `PID`,`hdc`.`newborncare`.`SEQ` AS `SEQ`,`hdc`.`newborncare`.`BDATE` AS `BDATE`,`hdc`.`newborncare`.`BCARE` AS `BCARE`,`hdc`.`newborncare`.`BCPLACE` AS `BCPLACE`,`hdc`.`newborncare`.`BCARERESULT` AS `BCARERESULT`,`hdc`.`newborncare`.`FOOD` AS `FOOD`,`hdc`.`newborncare`.`PROVIDER` AS `PROVIDER`,`hdc`.`newborncare`.`D_UPDATE` AS `D_UPDATE` from `hdc`.`newborncare` where (`hdc`.`newborncare`.`HOSPCODE` in ('04688','04689','04690','04691','046927','04693','04694','04695','04696','04697','04698','04699','04700','11031','13924'));

--
-- Definition of view `nutrition`
--

DROP TABLE IF EXISTS `nutrition`;
DROP VIEW IF EXISTS `nutrition`;
CREATE ALGORITHM=UNDEFINED DEFINER=`loeimoph`@`%` SQL SECURITY DEFINER VIEW `nutrition` AS select `hdc`.`nutrition`.`HOSPCODE` AS `HOSPCODE`,`hdc`.`nutrition`.`PID` AS `PID`,`hdc`.`nutrition`.`SEQ` AS `SEQ`,`hdc`.`nutrition`.`DATE_SERV` AS `DATE_SERV`,`hdc`.`nutrition`.`NUTRITIONPLACE` AS `NUTRITIONPLACE`,`hdc`.`nutrition`.`WEIGHT` AS `WEIGHT`,`hdc`.`nutrition`.`HEIGHT` AS `HEIGHT`,`hdc`.`nutrition`.`HEADCIRCUM` AS `HEADCIRCUM`,`hdc`.`nutrition`.`CHILDDEVELOP` AS `CHILDDEVELOP`,`hdc`.`nutrition`.`FOOD` AS `FOOD`,`hdc`.`nutrition`.`BOTTLE` AS `BOTTLE`,`hdc`.`nutrition`.`PROVIDER` AS `PROVIDER`,`hdc`.`nutrition`.`D_UPDATE` AS `D_UPDATE` from `hdc`.`nutrition` where (`hdc`.`nutrition`.`HOSPCODE` in ('04688','04689','04690','04691','046927','04693','04694','04695','04696','04697','04698','04699','04700','11031','13924'));

--
-- Definition of view `person`
--

DROP TABLE IF EXISTS `person`;
DROP VIEW IF EXISTS `person`;
CREATE ALGORITHM=UNDEFINED DEFINER=`loeimoph`@`%` SQL SECURITY DEFINER VIEW `person` AS select `hdc`.`person`.`HOSPCODE` AS `HOSPCODE`,`hdc`.`person`.`CID` AS `CID`,`hdc`.`person`.`PID` AS `PID`,`hdc`.`person`.`HID` AS `HID`,`hdc`.`person`.`PRENAME` AS `PRENAME`,`hdc`.`person`.`NAME` AS `NAME`,`hdc`.`person`.`LNAME` AS `LNAME`,`hdc`.`person`.`HN` AS `HN`,`hdc`.`person`.`SEX` AS `SEX`,`hdc`.`person`.`BIRTH` AS `BIRTH`,`hdc`.`person`.`MSTATUS` AS `MSTATUS`,`hdc`.`person`.`OCCUPATION_OLD` AS `OCCUPATION_OLD`,`hdc`.`person`.`OCCUPATION_NEW` AS `OCCUPATION_NEW`,`hdc`.`person`.`RACE` AS `RACE`,`hdc`.`person`.`NATION` AS `NATION`,`hdc`.`person`.`RELIGION` AS `RELIGION`,`hdc`.`person`.`EDUCATION` AS `EDUCATION`,`hdc`.`person`.`FSTATUS` AS `FSTATUS`,`hdc`.`person`.`FATHER` AS `FATHER`,`hdc`.`person`.`MOTHER` AS `MOTHER`,`hdc`.`person`.`COUPLE` AS `COUPLE`,`hdc`.`person`.`VSTATUS` AS `VSTATUS`,`hdc`.`person`.`MOVEIN` AS `MOVEIN`,`hdc`.`person`.`DISCHARGE` AS `DISCHARGE`,`hdc`.`person`.`DDISCHARGE` AS `DDISCHARGE`,`hdc`.`person`.`ABOGROUP` AS `ABOGROUP`,`hdc`.`person`.`RHGROUP` AS `RHGROUP`,`hdc`.`person`.`LABOR` AS `LABOR`,`hdc`.`person`.`PASSPORT` AS `PASSPORT`,`hdc`.`person`.`TYPEAREA` AS `TYPEAREA`,`hdc`.`person`.`D_UPDATE` AS `D_UPDATE` from `hdc`.`person` where (`hdc`.`person`.`HOSPCODE` in ('04688','04689','04690','04691','046927','04693','04694','04695','04696','04697','04698','04699','04700','11031','13924'));

--
-- Definition of view `postnatal`
--

DROP TABLE IF EXISTS `postnatal`;
DROP VIEW IF EXISTS `postnatal`;
CREATE ALGORITHM=UNDEFINED DEFINER=`loeimoph`@`%` SQL SECURITY DEFINER VIEW `postnatal` AS select `hdc`.`postnatal`.`HOSPCODE` AS `HOSPCODE`,`hdc`.`postnatal`.`PID` AS `PID`,`hdc`.`postnatal`.`SEQ` AS `SEQ`,`hdc`.`postnatal`.`GRAVIDA` AS `GRAVIDA`,`hdc`.`postnatal`.`BDATE` AS `BDATE`,`hdc`.`postnatal`.`PPCARE` AS `PPCARE`,`hdc`.`postnatal`.`PPPLACE` AS `PPPLACE`,`hdc`.`postnatal`.`PPRESULT` AS `PPRESULT`,`hdc`.`postnatal`.`PROVIDER` AS `PROVIDER`,`hdc`.`postnatal`.`D_UPDATE` AS `D_UPDATE` from `hdc`.`postnatal` where (`hdc`.`postnatal`.`HOSPCODE` in ('04688','04689','04690','04691','046927','04693','04694','04695','04696','04697','04698','04699','04700','11031','13924'));

--
-- Definition of view `prenatal`
--

DROP TABLE IF EXISTS `prenatal`;
DROP VIEW IF EXISTS `prenatal`;
CREATE ALGORITHM=UNDEFINED DEFINER=`loeimoph`@`%` SQL SECURITY DEFINER VIEW `prenatal` AS select `hdc`.`prenatal`.`HOSPCODE` AS `HOSPCODE`,`hdc`.`prenatal`.`PID` AS `PID`,`hdc`.`prenatal`.`GRAVIDA` AS `GRAVIDA`,`hdc`.`prenatal`.`LMP` AS `LMP`,`hdc`.`prenatal`.`EDC` AS `EDC`,`hdc`.`prenatal`.`VDRL_RESULT` AS `VDRL_RESULT`,`hdc`.`prenatal`.`HB_RESULT` AS `HB_RESULT`,`hdc`.`prenatal`.`HIV_RESULT` AS `HIV_RESULT`,`hdc`.`prenatal`.`DATE_HCT` AS `DATE_HCT`,`hdc`.`prenatal`.`HCT_RESULT` AS `HCT_RESULT`,`hdc`.`prenatal`.`THALASSEMIA` AS `THALASSEMIA`,`hdc`.`prenatal`.`D_UPDATE` AS `D_UPDATE` from `hdc`.`prenatal` where (`hdc`.`prenatal`.`HOSPCODE` in ('04688','04689','04690','04691','046927','04693','04694','04695','04696','04697','04698','04699','04700','11031','13924'));

--
-- Definition of view `procedure_ipd`
--

DROP TABLE IF EXISTS `procedure_ipd`;
DROP VIEW IF EXISTS `procedure_ipd`;
CREATE ALGORITHM=UNDEFINED DEFINER=`loeimoph`@`%` SQL SECURITY DEFINER VIEW `procedure_ipd` AS select `hdc`.`procedure_ipd`.`HOSPCODE` AS `HOSPCODE`,`hdc`.`procedure_ipd`.`PID` AS `PID`,`hdc`.`procedure_ipd`.`AN` AS `AN`,`hdc`.`procedure_ipd`.`DATETIME_ADMIT` AS `DATETIME_ADMIT`,`hdc`.`procedure_ipd`.`WARDSTAY` AS `WARDSTAY`,`hdc`.`procedure_ipd`.`PROCEDCODE` AS `PROCEDCODE`,`hdc`.`procedure_ipd`.`TIMESTART` AS `TIMESTART`,`hdc`.`procedure_ipd`.`TIMEFINISH` AS `TIMEFINISH`,`hdc`.`procedure_ipd`.`SERVICEPRICE` AS `SERVICEPRICE`,`hdc`.`procedure_ipd`.`PROVIDER` AS `PROVIDER`,`hdc`.`procedure_ipd`.`D_UPDATE` AS `D_UPDATE` from `hdc`.`procedure_ipd` where (`hdc`.`procedure_ipd`.`HOSPCODE` in ('04688','04689','04690','04691','046927','04693','04694','04695','04696','04697','04698','04699','04700','11031','13924'));

--
-- Definition of view `procedure_opd`
--

DROP TABLE IF EXISTS `procedure_opd`;
DROP VIEW IF EXISTS `procedure_opd`;
CREATE ALGORITHM=UNDEFINED DEFINER=`loeimoph`@`%` SQL SECURITY DEFINER VIEW `procedure_opd` AS select `hdc`.`procedure_opd`.`HOSPCODE` AS `HOSPCODE`,`hdc`.`procedure_opd`.`PID` AS `PID`,`hdc`.`procedure_opd`.`SEQ` AS `SEQ`,`hdc`.`procedure_opd`.`DATE_SERV` AS `DATE_SERV`,`hdc`.`procedure_opd`.`CLINIC` AS `CLINIC`,`hdc`.`procedure_opd`.`PROCEDCODE` AS `PROCEDCODE`,`hdc`.`procedure_opd`.`SERVICEPRICE` AS `SERVICEPRICE`,`hdc`.`procedure_opd`.`PROVIDER` AS `PROVIDER`,`hdc`.`procedure_opd`.`D_UPDATE` AS `D_UPDATE` from `hdc`.`procedure_opd` where (`hdc`.`procedure_opd`.`HOSPCODE` in ('04688','04689','04690','04691','046927','04693','04694','04695','04696','04697','04698','04699','04700','11031','13924'));

--
-- Definition of view `procedure_refer`
--

DROP TABLE IF EXISTS `procedure_refer`;
DROP VIEW IF EXISTS `procedure_refer`;
CREATE ALGORITHM=UNDEFINED DEFINER=`loeimoph`@`%` SQL SECURITY DEFINER VIEW `procedure_refer` AS select `hdc`.`procedure_refer`.`hospcode` AS `hospcode`,`hdc`.`procedure_refer`.`referid` AS `referid`,`hdc`.`procedure_refer`.`referid_province` AS `referid_province`,`hdc`.`procedure_refer`.`timestart` AS `timestart`,`hdc`.`procedure_refer`.`timefinish` AS `timefinish`,`hdc`.`procedure_refer`.`procedurename` AS `procedurename`,`hdc`.`procedure_refer`.`procedcode` AS `procedcode`,`hdc`.`procedure_refer`.`pdescription` AS `pdescription`,`hdc`.`procedure_refer`.`procedresult` AS `procedresult`,`hdc`.`procedure_refer`.`provider` AS `provider`,`hdc`.`procedure_refer`.`d_update` AS `d_update` from `hdc`.`procedure_refer` where (`hdc`.`procedure_refer`.`hospcode` in ('04688','04689','04690','04691','046927','04693','04694','04695','04696','04697','04698','04699','04700','11031','13924'));

--
-- Definition of view `provider`
--

DROP TABLE IF EXISTS `provider`;
DROP VIEW IF EXISTS `provider`;
CREATE ALGORITHM=UNDEFINED DEFINER=`loeimoph`@`%` SQL SECURITY DEFINER VIEW `provider` AS select `hdc`.`provider`.`HOSPCODE` AS `HOSPCODE`,`hdc`.`provider`.`PROVIDER` AS `PROVIDER`,`hdc`.`provider`.`REGISTERNO` AS `REGISTERNO`,`hdc`.`provider`.`COUNCIL` AS `COUNCIL`,`hdc`.`provider`.`CID` AS `CID`,`hdc`.`provider`.`PRENAME` AS `PRENAME`,`hdc`.`provider`.`NAME` AS `NAME`,`hdc`.`provider`.`LNAME` AS `LNAME`,`hdc`.`provider`.`SEX` AS `SEX`,`hdc`.`provider`.`BIRTH` AS `BIRTH`,`hdc`.`provider`.`PROVIDERTYPE` AS `PROVIDERTYPE`,`hdc`.`provider`.`STARTDATE` AS `STARTDATE`,`hdc`.`provider`.`OUTDATE` AS `OUTDATE`,`hdc`.`provider`.`MOVEFROM` AS `MOVEFROM`,`hdc`.`provider`.`MOVETO` AS `MOVETO`,`hdc`.`provider`.`D_UPDATE` AS `D_UPDATE` from `hdc`.`provider` where (`hdc`.`provider`.`HOSPCODE` in ('04688','04689','04690','04691','046927','04693','04694','04695','04696','04697','04698','04699','04700','11031','13924'));

--
-- Definition of view `refer_history`
--

DROP TABLE IF EXISTS `refer_history`;
DROP VIEW IF EXISTS `refer_history`;
CREATE ALGORITHM=UNDEFINED DEFINER=`loeimoph`@`%` SQL SECURITY DEFINER VIEW `refer_history` AS select `hdc`.`refer_history`.`hospcode` AS `hospcode`,`hdc`.`refer_history`.`referid` AS `referid`,`hdc`.`refer_history`.`referid_province` AS `referid_province`,`hdc`.`refer_history`.`pid` AS `pid`,`hdc`.`refer_history`.`seq` AS `seq`,`hdc`.`refer_history`.`an` AS `an`,`hdc`.`refer_history`.`referid_origin` AS `referid_origin`,`hdc`.`refer_history`.`hospcode_origin` AS `hospcode_origin`,`hdc`.`refer_history`.`datetime_serv` AS `datetime_serv`,`hdc`.`refer_history`.`datetime_admit` AS `datetime_admit`,`hdc`.`refer_history`.`datetime_refer` AS `datetime_refer`,`hdc`.`refer_history`.`clinic_refer` AS `clinic_refer`,`hdc`.`refer_history`.`hosp_destination` AS `hosp_destination`,`hdc`.`refer_history`.`chiefcomp` AS `chiefcomp`,`hdc`.`refer_history`.`physicalexam` AS `physicalexam`,`hdc`.`refer_history`.`diagfirst` AS `diagfirst`,`hdc`.`refer_history`.`diaglast` AS `diaglast`,`hdc`.`refer_history`.`pstatus` AS `pstatus`,`hdc`.`refer_history`.`ptype` AS `ptype`,`hdc`.`refer_history`.`emergency` AS `emergency`,`hdc`.`refer_history`.`ptypedis` AS `ptypedis`,`hdc`.`refer_history`.`causeout` AS `causeout`,`hdc`.`refer_history`.`request` AS `request`,`hdc`.`refer_history`.`provider` AS `provider`,`hdc`.`refer_history`.`d_update` AS `d_update` from `hdc`.`refer_history` where (`hdc`.`refer_history`.`hospcode` in ('04688','04689','04690','04691','046927','04693','04694','04695','04696','04697','04698','04699','04700','11031','13924'));

--
-- Definition of view `refer_result`
--

DROP TABLE IF EXISTS `refer_result`;
DROP VIEW IF EXISTS `refer_result`;
CREATE ALGORITHM=UNDEFINED DEFINER=`loeimoph`@`%` SQL SECURITY DEFINER VIEW `refer_result` AS select `hdc`.`refer_result`.`hospcode` AS `hospcode`,`hdc`.`refer_result`.`referid_source` AS `referid_source`,`hdc`.`refer_result`.`referid_province` AS `referid_province`,`hdc`.`refer_result`.`hosp_source` AS `hosp_source`,`hdc`.`refer_result`.`refer_result` AS `refer_result`,`hdc`.`refer_result`.`datetime_in` AS `datetime_in`,`hdc`.`refer_result`.`pid_in` AS `pid_in`,`hdc`.`refer_result`.`an_in` AS `an_in`,`hdc`.`refer_result`.`reason` AS `reason`,`hdc`.`refer_result`.`d_update` AS `d_update` from `hdc`.`refer_result` where (`hdc`.`refer_result`.`hospcode` in ('04688','04689','04690','04691','046927','04693','04694','04695','04696','04697','04698','04699','04700','11031','13924'));

--
-- Definition of view `rehabilitation`
--

DROP TABLE IF EXISTS `rehabilitation`;
DROP VIEW IF EXISTS `rehabilitation`;
CREATE ALGORITHM=UNDEFINED DEFINER=`loeimoph`@`%` SQL SECURITY DEFINER VIEW `rehabilitation` AS select `hdc`.`rehabilitation`.`HOSPCODE` AS `HOSPCODE`,`hdc`.`rehabilitation`.`PID` AS `PID`,`hdc`.`rehabilitation`.`SEQ` AS `SEQ`,`hdc`.`rehabilitation`.`AN` AS `AN`,`hdc`.`rehabilitation`.`DATE_ADMIT` AS `DATE_ADMIT`,`hdc`.`rehabilitation`.`DATE_SERV` AS `DATE_SERV`,`hdc`.`rehabilitation`.`DATE_START` AS `DATE_START`,`hdc`.`rehabilitation`.`DATE_FINISH` AS `DATE_FINISH`,`hdc`.`rehabilitation`.`REHABCODE` AS `REHABCODE`,`hdc`.`rehabilitation`.`AT_DEVICE` AS `AT_DEVICE`,`hdc`.`rehabilitation`.`AT_NO` AS `AT_NO`,`hdc`.`rehabilitation`.`REHABPLACE` AS `REHABPLACE`,`hdc`.`rehabilitation`.`PROVIDER` AS `PROVIDER`,`hdc`.`rehabilitation`.`D_UPDATE` AS `D_UPDATE` from `hdc`.`rehabilitation` where (`hdc`.`rehabilitation`.`HOSPCODE` in ('04688','04689','04690','04691','046927','04693','04694','04695','04696','04697','04698','04699','04700','11031','13924'));

--
-- Definition of view `service`
--

DROP TABLE IF EXISTS `service`;
DROP VIEW IF EXISTS `service`;
CREATE ALGORITHM=UNDEFINED DEFINER=`loeimoph`@`%` SQL SECURITY DEFINER VIEW `service` AS select `hdc`.`service`.`HOSPCODE` AS `HOSPCODE`,`hdc`.`service`.`PID` AS `PID`,`hdc`.`service`.`HN` AS `HN`,`hdc`.`service`.`SEQ` AS `SEQ`,`hdc`.`service`.`DATE_SERV` AS `DATE_SERV`,`hdc`.`service`.`TIME_SERV` AS `TIME_SERV`,`hdc`.`service`.`LOCATION` AS `LOCATION`,`hdc`.`service`.`INTIME` AS `INTIME`,`hdc`.`service`.`INSTYPE` AS `INSTYPE`,`hdc`.`service`.`INSID` AS `INSID`,`hdc`.`service`.`MAIN` AS `MAIN`,`hdc`.`service`.`TYPEIN` AS `TYPEIN`,`hdc`.`service`.`REFERINHOSP` AS `REFERINHOSP`,`hdc`.`service`.`CAUSEIN` AS `CAUSEIN`,`hdc`.`service`.`CHIEFCOMP` AS `CHIEFCOMP`,`hdc`.`service`.`SERVPLACE` AS `SERVPLACE`,`hdc`.`service`.`BTEMP` AS `BTEMP`,`hdc`.`service`.`SBP` AS `SBP`,`hdc`.`service`.`DBP` AS `DBP`,`hdc`.`service`.`PR` AS `PR`,`hdc`.`service`.`RR` AS `RR`,`hdc`.`service`.`TYPEOUT` AS `TYPEOUT`,`hdc`.`service`.`REFEROUTHOSP` AS `REFEROUTHOSP`,`hdc`.`service`.`CAUSEOUT` AS `CAUSEOUT`,`hdc`.`service`.`COST` AS `COST`,`hdc`.`service`.`PRICE` AS `PRICE`,`hdc`.`service`.`PAYPRICE` AS `PAYPRICE`,`hdc`.`service`.`ACTUALPAY` AS `ACTUALPAY`,`hdc`.`service`.`D_UPDATE` AS `D_UPDATE` from `hdc`.`service` where (`hdc`.`service`.`HOSPCODE` in ('04688','04689','04690','04691','046927','04693','04694','04695','04696','04697','04698','04699','04700','11031','13924'));

--
-- Definition of view `specialpp`
--

DROP TABLE IF EXISTS `specialpp`;
DROP VIEW IF EXISTS `specialpp`;
CREATE ALGORITHM=UNDEFINED DEFINER=`loeimoph`@`%` SQL SECURITY DEFINER VIEW `specialpp` AS select `hdc`.`specialpp`.`HOSPCODE` AS `HOSPCODE`,`hdc`.`specialpp`.`PID` AS `PID`,`hdc`.`specialpp`.`SEQ` AS `SEQ`,`hdc`.`specialpp`.`DATE_SERV` AS `DATE_SERV`,`hdc`.`specialpp`.`SERVPLACE` AS `SERVPLACE`,`hdc`.`specialpp`.`PPSPECIAL` AS `PPSPECIAL`,`hdc`.`specialpp`.`PPSPLACE` AS `PPSPLACE`,`hdc`.`specialpp`.`PROVIDER` AS `PROVIDER`,`hdc`.`specialpp`.`D_UPDATE` AS `D_UPDATE` from `hdc`.`specialpp` where (`hdc`.`specialpp`.`HOSPCODE` in ('04688','04689','04690','04691','046927','04693','04694','04695','04696','04697','04698','04699','04700','11031','13924'));

--
-- Definition of view `surveillance`
--

DROP TABLE IF EXISTS `surveillance`;
DROP VIEW IF EXISTS `surveillance`;
CREATE ALGORITHM=UNDEFINED DEFINER=`loeimoph`@`%` SQL SECURITY DEFINER VIEW `surveillance` AS select `hdc`.`surveillance`.`HOSPCODE` AS `HOSPCODE`,`hdc`.`surveillance`.`PID` AS `PID`,`hdc`.`surveillance`.`SEQ` AS `SEQ`,`hdc`.`surveillance`.`DATE_SERV` AS `DATE_SERV`,`hdc`.`surveillance`.`AN` AS `AN`,`hdc`.`surveillance`.`DATETIME_ADMIT` AS `DATETIME_ADMIT`,`hdc`.`surveillance`.`SYNDROME` AS `SYNDROME`,`hdc`.`surveillance`.`DIAGCODE` AS `DIAGCODE`,`hdc`.`surveillance`.`CODE506` AS `CODE506`,`hdc`.`surveillance`.`DIAGCODELAST` AS `DIAGCODELAST`,`hdc`.`surveillance`.`CODE506LAST` AS `CODE506LAST`,`hdc`.`surveillance`.`ILLDATE` AS `ILLDATE`,`hdc`.`surveillance`.`ILLHOUSE` AS `ILLHOUSE`,`hdc`.`surveillance`.`ILLVILLAGE` AS `ILLVILLAGE`,`hdc`.`surveillance`.`ILLTAMBON` AS `ILLTAMBON`,`hdc`.`surveillance`.`ILLAMPUR` AS `ILLAMPUR`,`hdc`.`surveillance`.`ILLCHANGWAT` AS `ILLCHANGWAT`,`hdc`.`surveillance`.`LATITUDE` AS `LATITUDE`,`hdc`.`surveillance`.`LONGITUDE` AS `LONGITUDE`,`hdc`.`surveillance`.`PTSTATUS` AS `PTSTATUS`,`hdc`.`surveillance`.`DATE_DEATH` AS `DATE_DEATH`,`hdc`.`surveillance`.`COMPLICATION` AS `COMPLICATION`,`hdc`.`surveillance`.`ORGANISM` AS `ORGANISM`,`hdc`.`surveillance`.`PROVIDER` AS `PROVIDER`,`hdc`.`surveillance`.`D_UPDATE` AS `D_UPDATE` from `hdc`.`surveillance` where (`hdc`.`surveillance`.`HOSPCODE` in ('04688','04689','04690','04691','046927','04693','04694','04695','04696','04697','04698','04699','04700','11031','13924'));

--
-- Definition of view `village`
--

DROP TABLE IF EXISTS `village`;
DROP VIEW IF EXISTS `village`;
CREATE ALGORITHM=UNDEFINED DEFINER=`loeimoph`@`%` SQL SECURITY DEFINER VIEW `village` AS select `hdc`.`village`.`HOSPCODE` AS `HOSPCODE`,`hdc`.`village`.`VID` AS `VID`,`hdc`.`village`.`NTRADITIONAL` AS `NTRADITIONAL`,`hdc`.`village`.`NMONK` AS `NMONK`,`hdc`.`village`.`NRELIGIONLEADER` AS `NRELIGIONLEADER`,`hdc`.`village`.`NBROADCAST` AS `NBROADCAST`,`hdc`.`village`.`NRADIO` AS `NRADIO`,`hdc`.`village`.`NPCHC` AS `NPCHC`,`hdc`.`village`.`NCLINIC` AS `NCLINIC`,`hdc`.`village`.`NDRUGSTORE` AS `NDRUGSTORE`,`hdc`.`village`.`NCHILDCENTER` AS `NCHILDCENTER`,`hdc`.`village`.`NPSCHOOL` AS `NPSCHOOL`,`hdc`.`village`.`NSSCHOOL` AS `NSSCHOOL`,`hdc`.`village`.`NTEMPLE` AS `NTEMPLE`,`hdc`.`village`.`NRELIGIOUSPLACE` AS `NRELIGIOUSPLACE`,`hdc`.`village`.`NMARKET` AS `NMARKET`,`hdc`.`village`.`NSHOP` AS `NSHOP`,`hdc`.`village`.`NFOODSHOP` AS `NFOODSHOP`,`hdc`.`village`.`NSTALL` AS `NSTALL`,`hdc`.`village`.`NRAINTANK` AS `NRAINTANK`,`hdc`.`village`.`NCHICKENFARM` AS `NCHICKENFARM`,`hdc`.`village`.`NPIGFARM` AS `NPIGFARM`,`hdc`.`village`.`WASTEWATER` AS `WASTEWATER`,`hdc`.`village`.`GARBAGE` AS `GARBAGE`,`hdc`.`village`.`NFACTORY` AS `NFACTORY`,`hdc`.`village`.`LATITUDE` AS `LATITUDE`,`hdc`.`village`.`LONGITUDE` AS `LONGITUDE`,`hdc`.`village`.`OUTDATE` AS `OUTDATE`,`hdc`.`village`.`NUMACTUALLY` AS `NUMACTUALLY`,`hdc`.`village`.`RISKTYPE` AS `RISKTYPE`,`hdc`.`village`.`NUMSTATELESS` AS `NUMSTATELESS`,`hdc`.`village`.`NEXERCISECLUB` AS `NEXERCISECLUB`,`hdc`.`village`.`NOLDERLYCLUB` AS `NOLDERLYCLUB`,`hdc`.`village`.`NDISABLECLUB` AS `NDISABLECLUB`,`hdc`.`village`.`NNUMBERONECLUB` AS `NNUMBERONECLUB`,`hdc`.`village`.`D_UPDATE` AS `D_UPDATE` from `hdc`.`village` where (`hdc`.`village`.`HOSPCODE` in ('04688','04689','04690','04691','046927','04693','04694','04695','04696','04697','04698','04699','04700','11031','13924'));

--
-- Definition of view `woman`
--

DROP TABLE IF EXISTS `woman`;
DROP VIEW IF EXISTS `woman`;
CREATE ALGORITHM=UNDEFINED DEFINER=`loeimoph`@`%` SQL SECURITY DEFINER VIEW `woman` AS select `hdc`.`women`.`HOSPCODE` AS `HOSPCODE`,`hdc`.`women`.`PID` AS `PID`,`hdc`.`women`.`FPTYPE` AS `FPTYPE`,`hdc`.`women`.`NOFPCAUSE` AS `NOFPCAUSE`,`hdc`.`women`.`TOTALSON` AS `TOTALSON`,`hdc`.`women`.`NUMBERSON` AS `NUMBERSON`,`hdc`.`women`.`ABORTION` AS `ABORTION`,`hdc`.`women`.`STILLBIRTH` AS `STILLBIRTH`,`hdc`.`women`.`D_UPDATE` AS `D_UPDATE` from `hdc`.`women` where (`hdc`.`women`.`HOSPCODE` in ('04688','04689','04690','04691','046927','04693','04694','04695','04696','04697','04698','04699','04700','11031','13924'));



/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
